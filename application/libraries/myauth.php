<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Library
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
 class Myauth{
 	function __construct(){
		$CI = &get_instance();
		$uid = get_cookie('user_id');
		//只调用中文数据库 	
		$this->mycache =  $CI->mycache;
		$this->ds = $CI->load->database('zh',true);
		$CI->load->library('mydb',null,'mydb2');
		$CI->mydb2->setDs($this->ds);
		$this->mydb2 = $CI->mydb2;
			
			
 	}
 	
 	function ds(){
 		return $this->ds;
 	}
 	/**
 	 * 判断是否有权限访问各功能模块
 	 * @parameter $auth ,之间用逗号分隔，字符来自cache数据层级
 	 */
 	function execute_auth($auth=null){
 		$uid = get_cookie('user_id');
 		if(empty($uid)){ 
 			echo "<script language='javascript'>parent.location.href='".site_url("admin")."';</script>";
 			exit();
 		}
 		if($auth):
 			$uid = $this->fetch_auth('user_id');
 			$sql = "select a.rights,a.role_id from ".$this->ds->dbprefix."roles as a  inner join ".$this->ds->dbprefix."admins as b on a.role_id=b.group_id where b.admin_id=".$uid." ";
		    $db_rights =  $this->ds->query($sql)->first_row("array");
		    $config =  &get_config();
		    if($db_rights['role_id'] == $config['admin_role_id']) return true;
		    $righs = $this->fetch_auth('user_rights');
		    if(strpos($auth,',')!==false){
		    	$auth = '$righs['.str_replace(',','][detail][',$auth).']';
		    	
		    }else{
		    	$auth = '$righs['.$auth.']';
		    }
 			eval("\$flag=$auth;");
			if(!$flag){
				throw new Exception('抱歉，无此权限');	
			}
		endif;
 	}	
 	
 	
 	/**
 	 * 处理登陆
 	 */ 	
 	function process_login($session_data){
    
 		foreach($session_data as $k=>$v){
 			$cookie = array(
                   'name'   => $k,
                   'value'  => $v,
                   'expire' => time()+3600,
                   'domain' => '',
                   'path'   => '/',
               ); 
       	
           set_cookie($cookie);   
          
 			
 		}
 		
 		
 		
 		
 		
 		
 		
 	} 
 	
 	/**
 	 * 处理登出
 	 */
 	function process_logout($session_data,$url="."){ 
 		foreach($session_data as $k){
 				delete_cookie($k);
 		}  	
 		redirect($url);
 	}
 	
 	/**
 	 * 获取登陆信息
 	 */
 	function fetch_auth($type=null){
 		$uid = get_cookie('user_id');
 		
 		$sql = "select a.rights from ".$this->ds->dbprefix."roles as a  inner join ".$this->ds->dbprefix."admins as b on a.role_id=b.group_id where b.admin_id=".$uid." ";
		$db_rights =  $this->ds->query($sql)->first_row("array"); 
		
 	 	$auth_info =  array(
 			'user_name'=>get_cookie('user_name'),
 			'user_id'=>$uid,
 			//'user_rights'=>unserialize(get_cookie('user_rights')), //cookie获取权限
 			'user_rights'=>unserialize($db_rights['rights']), //数据库获取权限
 			
 		); 
 		
 		return $type?$auth_info[$type]:$auth_info;
 	}
 	
 	
 	//查询用户信息
 	function db_user($field=null){
 		$CI = &get_instance();
 		$id = $this->fetch_auth('user_id');
 		if($id){
 				$CI->load->model('Roles_model');
 				$group = $CI->Roles_model->fetch_roles_list();
				$sql = "select a.* from ".$this->ds->dbprefix."admins as a  where a.admin_id=".$id." ";
				$user_info =  $this->ds->query($sql)->first_row("array");
				$user_info['role_name'] = $group[$user_info['group_id']]['role_name'];
				
				return $field ? $user_info[$field]:$user_info;
		}else{
			return null;
		}
 		
 		
 	}
 	
 	
 	/**
 	 * 取得权限，列出仅有权限菜单
 	 */
 	function fetch_rights_menus($role_id = null,$menu=false){
 		 $config =  &get_config();
 		 if($role_id == $config['admin_role_id']) unset($role_id);
 		 $rights_all = $this->get_rights_item();
 		 $have_rights = $this->fetch_auth('user_rights');
 		
 		 $uid = $this->fetch_auth('user_id');
 		 $sql = "select b.group_id from   ".$this->ds->dbprefix."admins  as b where b.admin_id=".$uid." ";
		 $db_rights =  $this->ds->query($sql)->first_row("array");
				
		//administrator
		 if($db_rights['group_id'] == $config['admin_role_id']){

		 	foreach($rights_all['admin'] as $k=>&$v){ 
		 		if(empty($v['detail'])) {
		 			continue;
		 		}
		 		$sort[$k]	 = $v['r_order'];
		 		$sort1 = null;
		 		foreach($v['detail'] as $k1=>&$v1){
		 			if(empty($v1['r_display'])){
		 				unset($rights_all['admin'][$k]['detail'][$k1]);
		 				continue;
		 			}
		 			$sort1[$k1] = $v1['r_order'];
		 			
		 		}
		 				
		 				
		 		array_multisort($sort1,SORT_ASC,$v['detail']);
		 	}
		 	if(count($sort)==count($rights_all['admin']))array_multisort($sort,SORT_ASC,$rights_all['admin']); 
		 		
		 	return $rights_all['admin'];
		 } 
		 
		
		 //other users
		
 		foreach($rights_all[admin] as $k=>$v){
 			if(!$have_rights[$k]) continue;
 			if(empty($v[r_display])) continue;
 			if(empty($v[detail])) continue;

 			$hdt = $have_rights[$k];

 			$v = $this->rights_deal($v,$hdt);
 	
			if($v){
				$r[$k] = $v;
				$sort[$k] = $v[r_order];
			}
				
 			foreach($v[detail] as $k1=>$v1){

 				 $hdt1  = $hdt[detail][$k1];
 				 $v1 = $this->rights_deal($v1,$hdt1);
 				
 				 $v1 && $r[$k][detail][$k1] = $v1;
 				 
 			}
 			
 			
 		}

 		array_multisort($sort,SORT_ASC,$r);
		return $r;
 	}

	/**
	 * [rights_deal description]
	 * @param  [type] $menu_rights  [description]
	 * @param  [type] $have_rights [description]
	 * @return [type]              [description]
	 */
 	function rights_deal($menu_rights,$have_rights){
 		
 		foreach((array)$menu_rights[detail] as $k=>$v){
 			//hide
 			if(empty($v[r_display])){
 		
 					unset($menu_rights[detail][$k]);
 					continue;
 			}
 			if(!$have_rights[detail][$k]){
 					//注销明细权限
 				
 				unset($menu_rights[detail][$k]);
 				continue;

 			}

 			
			$sort[$k]	 = $v['r_order'];

 		}

 		if(count($menu_rights[detail])>0){
 			array_multisort($sort,SORT_ASC,$menu_rights[detail]); 
 		}else{
 			$menu_rights = null;
 		}
 		
 		return $menu_rights;
 	}
 	
 	/**
 	 * 组织权限，全部
 	 */
 	function get_rights_item(){

 		$data   = $this->getAuthMenu();
 		
	   	foreach($data['list'] as $k=>$v){
	   		$r_code = $v['r_code'];
	   		
	   		if(strpos($r_code,',')!==false):
	   			$r_code =  '['.str_replace(',','][detail][',$v['r_code']).']';
	   		else:
	   			$r_code =  '['.$r_code.']';
	   		endif;
	   		$r_code = '$rights[admin]'.$r_code;
	   		eval("$r_code = \$v;");
	   		
	   	}
	   	return $rights;
 	}
 	



 	/**
 	 * query result for menu list
 	 */
 	function getAuthMenu(){
 		if($this->mycache->cache_exists('admin_rights_config','zh')){
 			$data = $this->mycache->cache_fetch('admin_rights_config',null,'zh');
 		}else{
 			$this->ds->select('*')->from('system_rights')->order_by('r_code','asc')->order_by('r_order','asc');

	   		$data = $this->mydb2->fetch_all(250);

	   		$this->mycache->cache_create($data,'admin_rights_config');
 		}

	   	
	   	return $data;
 	}
 	
 }
?>
