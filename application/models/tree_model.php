<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Modle
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
class Tree_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function  save_config(){
		return array('main'=>array(
				'table_name'=>'tree_node',
				'primary_key'=>'id'
			));

	}

	function valid_config(){
		return array(
					array(
						'field'=>'main[name]',
						'label'=>'字段名称',
						'rules'=>'required',
					)					
					
				);
	}

	/**
	 * [fetch_select 模块内使用]
	 * @param  [type] $treeId  [description]
	 * @param  string $v_field [description]
	 * @return [type]          [description]
	 */
	function fetch_select($treeId=null,$v_field='name'){
		$treeId = $treeId?$treeId:$this->get_root();
		return $this->init_form->array_re_index($this->db->select("id,name as init_name",false)->select('LEVEL,CONCAT(REPEAT("│ ",LEVEL),"├─",NAME) as name',false)->from('tree_node')->where('treeId',$treeId)->order_by('leftId','asc')->get()->result_array(),'id',$v_field);
	}

	/**
	 * [fetch_select_query 模块外使用]
	 * @param  [type] $treeId [description]
	 * @return [type]         [description]
	 */
	function fetch_select_query($treeId=null){
		$treeId = $treeId?$treeId:$this->get_root();
		$ls =  $this->init_form->array_re_index($this->db->select("id,name as init_name,leftId,rightId",false)->select('LEVEL,CONCAT(REPEAT("│ ",LEVEL),"├─",NAME) as name',false)->from('tree_node')->where('treeId',$treeId)->order_by('leftId','asc')->get()->result_array(),'id');
		$ls_new = array();
		foreach($ls as $v){
			$ds = $this->db->select("group_concat(id) as ids",false)->from('tree_node')->where('treeId',$treeId)->where('leftId <= '.$v[leftId].' and rightId >= '.$v[rightId])->get()->first_row('array');
			$ls_new[$ds[ids]] = $v[name];
		}
		return $ls_new;

	}

	function fetch_belong_ids($id){
		$ds = $this->detail($id);
		$r = $this->db->select("group_concat(id) as ids",false)->from('tree_node')->where('treeId',$ds[treeId])->where('leftId <= '.$ds[leftId].' and rightId >= '.$ds[rightId])->get()->first_row('array');
		return  $r[ids];
	}

	//detail
	function detail($id,$key=null){
	
		$ds = $this->db->select('*',false)->from('tree_node')->where('id',$id)->get()->first_row('array');
		return $key?$ds[$key]:$ds;
	}

	//detail
	function tree_detail($treeId,$key=null){
		$ds = $this->db->select("*")->from("tree_node")->where(array('pid'=>0,'treeId'=>$treeId))->get()->first_row('array');
		return $key?$ds[$key]:$ds;
	}







	function get_root(){

		return get_cookie('tree_root_id');
	}

	function set_root($id){
		$cookie = array(
               'name'   => 'tree_root_id',
               'value'  => $id,
               'expire' => '86500',
               'domain' => '',
               'path'   => '/'
              
           );	
		set_cookie($cookie);
		
	}

	/**
	 * 添加根节点
	 * @param [type] $treeId
	 * @param [type] $code
	 * @param [type] $name
	 */
	function add_tree_root_node($code,$name){
		try {
			$aff = 0;	
			$sql = "SELECT ifnull(max(treeId),0)+1 as treeId  FROM ".$this->db->dbprefix."tree_node WHERE   pid = 0";
			$v = $this->db->query($sql)->first_row('array');
			$treeId = $v['treeId'];	
			$this->db->query('START TRANSACTION');
			$sql = "INSERT INTO ".$this->db->dbprefix."tree_node(code,name,pid,leftId,rightId,level,treeId) VALUES ('$code','$name',0,1,2,0,$treeId)";
			$this->db->query($sql);
			$aff = $this->db->affected_rows();
			if($aff==1){
				$insert_id =  $this->db->insert_id();
				$this->db->query('COMMIT');
			}else{
				$this->db->query('ROLLBACK');
			}
			return $insert_id;

		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 1);
			
		}
	}


/**
	 * 添加根节点
	 * @param [type] $treeId
	 * @param [type] $code
	 * @param [type] $name
	 */
	function edit_tree_root_node($id,$code,$name){
		try {
			$aff = 0;
			
			$this->db->query('START TRANSACTION');
			$sql = "update ".$this->db->dbprefix."tree_node set name='".$name."' where id= ".$id;
			$this->db->query($sql);
			$aff = $this->db->affected_rows();
			if($aff==1){
				$this->db->query('COMMIT');
			}else{
				$this->db->query('ROLLBACK');
			}

		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 1);
			
		}
	}




	/**
	 * 添加节点
	 * @param [type] $pid
	 * @param [type] $code
	 * @param [type] $name
	 */
	function add_tree_node($pid,$code,$name){
		try{

			if(empty($pid) || empty($name) ){
				throw new Exception("parameter error", 1);
			}
			$af = 0;
			$sql = "  SELECT rightId as vRightId,treeId as vTreeId,level as vLevel     FROM ".$this->db->dbprefix."tree_node WHERE id= $pid ";
			$v = $this->db->query($sql)->first_row('array');
			if(empty($v)){
				throw new Exception("指定的节点不存在");
			}
			$this->db->query("START TRANSACTION");

			//更新右侧节点的left值
			$sql = "UPDATE ".$this->db->dbprefix."tree_node     SET leftId=leftId+2     WHERE treeId = ".$v['vTreeId']." AND leftId >".$v["vRightId"]." ";
			$query = $this->db->query($sql);
			$aff = $this->db->affected_rows();
			$af += $aff;

			//更新右侧节点的right值
			$sql = "UPDATE ".$this->db->dbprefix."tree_node   SET rightId=rightId+2     WHERE treeId = ".$v['vTreeId']." AND rightId >= ".$v['vRightId']." ";
			$query = $this->db->query($sql);
			$aff = $this->db->affected_rows();
			$af += $aff;
			//增加节点自己
			$sql = " INSERT INTO ".$this->db->dbprefix."tree_node(code,name,pid,leftId,rightId,level,treeId) VALUES ('$code','$name',$pid,$v[vRightId],".($v[vRightId]+1).",".($v[vLevel]+1).",$v[vTreeId])";
    		$query = $this->db->query($sql);
    		$insert_id = $this->db->insert_id();
    		$aff = $this->db->affected_rows();
			$af += $aff;
			if($af>=2){
				$this->db->query("COMMIT");
				return $insert_id;
			}else{
				$this->db->query("ROLLBACK");
				throw new Exception("insert error", 1);
				
			}

		}catch(Exception $e){
			throw new Exception($e->getMessage());
			
		}

	
	}

	
	/**
	 * 删除节点
	 * @param  [type] $node_id
	 * @return [type]
	 */
	function delete_tree_node($node_id){
		try {

			$af = 0; 
			if(empty($node_id)){
				throw new Exception("parameter error", 1);
			}
			$sql = "  SELECT leftId as vLeftId,rightId as vRightId,treeId as vTreeId,level as vLevel     FROM ".$this->db->dbprefix."tree_node WHERE id= $node_id ";
			$v = $this->db->query($sql)->first_row('array');
			if(empty($v)){
				throw new Exception("要删除的节点不存在");
			}
			if($v['vLeftId']==1){
				throw new Exception("根节点不能删除");
			}
			$this->db->query("START TRANSACTION");
			//删除节点和子节点
			$sql = " DELETE  FROM ".$this->db->dbprefix."tree_node   WHERE treeId = $v[vTreeId]    AND leftId BETWEEN $v[vLeftId] AND $v[vRightId] ";
        	$this->db->query($sql);
        	$aff = $this->db->affected_rows();
        	$af += $aff;
        	//更新右侧节点left值
        	$sql = " UPDATE ".$this->db->dbprefix."tree_node    SET leftId=leftId-($v[vRightId]-$v[vLeftId]+1)     WHERE treeId = $v[vTreeId] AND leftId>$v[vLeftId] ";
        	$this->db->query($sql);
        	$aff = $this->db->affected_rows();
        	$af += $aff;
        	//更新右侧节点的right值
        	$sql = " UPDATE ".$this->db->dbprefix."tree_node    SET rightId=rightId-($v[vRightId]-$v[vLeftId]+1)     WHERE treeId = $v[vTreeId] AND rightId>$v[vLeftId] ";
    		$this->db->query($sql);
        	$aff = $this->db->affected_rows();
        	$af += $aff;

        	if($af>=2){
				$this->db->query("COMMIT");
				
			}else{
				$this->db->query("ROLLBACK");
				throw new Exception("delete error", 1);
				
			}


		} catch (Exception $e) {
			throw new Exception($e->getMessage());	
		}
	}

	/**
	 * 编辑节点
	 * @param  [type] $node_id
	 * @param  [type] $pid
	 * @param  [type] $code
	 * @param  [type] $name
	 * @return [type]
	 */
	function edit_tree_node($node_id,$pid,$code,$name){
		$r = $this->move_tree_node($node_id,$pid);
		if($r="1000"){
			$sql = "UPDATE ".$this->db->dbprefix."tree_node SET code = '$code',name = '$name' WHERE id= $node_id";
			$this->db->query($sql);
		}
	}

	/**
	 * 移动节点
	 * @param  [type] $node_id
	 * @param  [type] $target_id
	 * @return [type]
	 */
	function move_tree_node($node_id,$target_id){
		try {

			 $sql = "SELECT leftId as vLeftId,rightId as vRightId,treeId as vTreeId,pid as vPid,level as vLevel  FROM ".$this->db->dbprefix."tree_node     WHERE id= $node_id";
			 $v = $this->db->query($sql)->first_row('array');
			 if(empty($v)){
					throw new Exception("要移动的节点不存在");
			 }
			 if($v[vLeftId]==1){
					throw new Exception("根节点不能移动");
			 }
			 if ($node_id==$target_id) {
			 	throw new Exception("不能移动到自己");
			 }
			 if ($v[vPid]==$target_id) {
			 	//throw new Exception("目标节点是要移动节点的父节点，不需要移动");
			 	return 1000;
			 }
			 $sql = " SELECT leftId as vTargetLeftId,rightId as vTargetRightId,level as vTargetLevel  FROM ".$this->db->dbprefix."tree_node  WHERE treeId = $v[vTreeId] AND id= $target_id ";
			 $vt = $this->db->query($sql)->first_row('array');
			 if(empty($vt[vTargetLeftId])){
			 	throw new Exception("目标节点不存在");
			 }
			 if($vt[vTargetLeftId]>$v[vLeftId] && $vt[vTargetLeftId]<$v[vRightId] ){
			 	throw new Exception("目标节点不能是要移动节点的子节点");
			 }

			 $this->db->query('START TRANSACTION');
			 //目标节点在右边
			 $vg = $this->db->query(" SELECT treeId as vGroupTreeId, GROUP_CONCAT(CAST(id AS CHAR)) as vGroupIdStr   FROM ".$this->db->dbprefix."tree_node  WHERE treeId = $v[vTreeId] AND leftId BETWEEN $v[vLeftId] AND $v[vRightId]  GROUP BY treeId ")->first_row('array');
			 //目标节点是当前节点所在路径上的节点的话，比较特殊，与移动到右侧节点的处理相同
			 if($vt[vTargetLeftId]>$v[vLeftId] OR ($vt[vTargetLeftId] < $v[vLeftId] AND $vt[vTargetRightId] > $v[vRightId])){
			 	   $vDiff = $vt[vTargetRightId] - 1 - $v[vRightId]; /*左右值的差值*/
	   			   $vLevelDiff = $vt[vTargetLevel] + 1 - $v[vLevel]; /*Level的差值*/
	   			    //更新小树杈的left、right和level
	               $sql = "UPDATE ".$this->db->dbprefix."tree_node   SET leftId=leftId +$vDiff,rightId=rightId + $vDiff,level = level + $vLevelDiff WHERE treeId = $v[vTreeId]  AND leftId BETWEEN $v[vLeftId] AND $v[vRightId]";
	               $this->db->query($sql);
	   			   //更新移动节点的父ID 
	        	   $sql = "UPDATE ".$this->db->dbprefix."tree_node  SET pid = $target_id WHERE id= $node_id; ";
	        	   $this->db->query($sql);
	        	   //插入位置左侧的节点的left值和right值要减小
	        	   $vDiff = $v[vRightId]-$v[vLeftId]+1;
	        	   // left>移动节点原right值 and left<目标节点原right值，并且不是小树杈上的节点
	        	   $sql =" UPDATE ".$this->db->dbprefix."tree_node SET leftId=leftId- $vDiff WHERE treeId = $v[vTreeId] AND leftId>$v[vRightId] AND leftId< $vt[vTargetRightId] AND NOT FIND_IN_SET(CAST(id AS CHAR),'$vg[vGroupIdStr]')";
	        	   $this->db->query($sql);
	        	   //right>移动节点原right值 and right<目标节点原right值，并且不是小树杈上的节点
	        	   $sql = " UPDATE ".$this->db->dbprefix."tree_node SET rightId=rightId- $vDiff WHERE treeId = $v[vTreeId] AND rightId>$v[vRightId] AND rightId< $vt[vTargetRightId] AND NOT FIND_IN_SET(CAST(id AS CHAR),'$vg[vGroupIdStr]')";
	        	   $this->db->query($sql);
			}else{
				   //目标节点在左边
				   $vDiff = $v[vLeftId] - $vt[vTargetRightId]; /*左右值的差值*/
			       $vLevelDiff = $vt[vTargetLevel] + 1 - $v[vLevel]; /*Level的差值*/
			        
			       /* 更新小树杈的left、right和level*/
			       $sql = " UPDATE ".$this->db->dbprefix."tree_node SET leftId=leftId -$vDiff, rightId=rightId - $vDiff, level = level + $vLevelDiff WHERE treeId = $v[vTreeId] AND leftId BETWEEN $v[vLeftId] AND $v[vRightId]";
			       $this->db->query($sql);
			       /* 更新移动节点的父ID */
			       $sql = "UPDATE ".$this->db->dbprefix."tree_node SET pid = $target_id WHERE id= $node_id";
			       $this->db->query($sql);
			       /*插入位置右侧的节点的left值和right值要增大*/
			       $vDiff = $v[vRightId]-$v[vLeftId]+1;
			       /* left>目标节点原right值 and left<移动节点原right值，并且不是小树杈上的节点*/
			       $sql = "UPDATE ".$this->db->dbprefix."tree_node SET leftId=leftId+ $vDiff WHERE treeId = $v[vTreeId] AND leftId>$vt[vTargetRightId] AND leftId< $v[vRightId] AND NOT FIND_IN_SET(CAST(id AS CHAR),'$vg[vGroupIdStr]')";
			       $this->db->query($sql);     
			       /* right>=目标节点原right值 and right<移动节点原right值，并且不是小树杈上的节点*/
			       $sql = "UPDATE ".$this->db->dbprefix."tree_node SET rightId=rightId+ $vDiff WHERE treeId = $v[vTreeId] AND rightId>=$vt[vTargetRightId] AND rightId< $v[vRightId] AND NOT FIND_IN_SET(CAST(id AS CHAR),'$vg[vGroupIdStr]')";
			       $this->db->query($sql);
			}
			$this->db->query('COMMIT');
			return 1000;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}





}




?>