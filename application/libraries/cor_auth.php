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
 class Cor_auth{
 	function __construct(){
 	   
		
 	}
 	
 
 	/**
 	 * 判断是否有权限访问各功能模块
 	 * @parameter $auth ,之间用逗号分隔，字符来自cache数据层级
 	 */
 	function execute_auth($auth=null){
        $CI = &get_instance();
 		$uid = get_cookie('user_id');
 		if(empty($uid)){ 
 			echo "<script language='javascript'>parent.location.href='".site_url("admin")."';</script>";
 			exit();
 		}
 		if($auth):
 			$uid = $this->fetch_auth('user_id');
 			$sql = "select a.rights,a.role_id from ".$CI->db->dbprefix."roles as a  inner join ".$CI->db->dbprefix."admins as b on a.role_id=b.group_id where b.admin_id=".$uid." ";
		    $db_rights =  $CI->db->query($sql)->first_row("array");
		    if($db_rights['role_id'] == config_item('admin_role_id')) return true;
		    $righs = $this->fetch_auth('user_rights');
	   		$flag = false;
	   		foreach((array)$auth as $a){
	   			 if(strpos($a,',')!==false){
	    				$r = '$righs['.str_replace(',','][detail][',$a).']';
		    	
				    }else{
				    	$r = '$righs['.$a.']';
				    }


				 
		 			eval("\$flag=isset($r)?$r:0;");
		 		
					
	   		}
	   		if(!$flag){
						$CI->cor_page->backend_redirect('javascript:history.back(1);','抱歉，无此权限');	
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
            $CI  = &get_instance();
            $CI->session->set_userdata('lock_screen', '0');
            
 		}
 		
 		//for ck editor
 		
 		$cookie = array(
                   'name'   => 'IsAuthorized',
                   'value'  => '1',
                   'expire' => time()+3600,
                   'domain' => '',
                   'path'   => '/',
               ); 
       	
        set_cookie($cookie);   

        //add login log
    	
		    $data = array(
 		   	'login_ip'=>$CI->input->ip_address(),
 		   	'login_client'=>$CI->input->user_agent(),
 		   	'login_user'=>$session_data['user_name'],
 		   	'login_time'=>date('Y-m-d H:i:s'),
		    );
	    $CI->db->insert('log_login',$data);
 	} 
 	
 	/**
 	 * 处理登出
 	 */
 	function process_logout($session_data,$url="."){ 
 		foreach($session_data as $k){
 				delete_cookie($k);
 		}  	
 		$CI  = &get_instance();
        $CI->session->set_userdata('lock_screen', '0');
 		redirect($url);
 	}
 	
 	/**
 	 * 获取登陆信息
 	 */
 	function fetch_auth($type=null){
 		$CI = &get_instance();
 		$uid = get_cookie('user_id');
 		
 		$sql = "select a.rights from ".$CI->db->dbprefix."roles as a  inner join ".$CI->db->dbprefix."admins as b on a.role_id=b.group_id where b.admin_id=".$uid." ";
 		
		$db_rights =  $CI->db->query($sql)->first_row("array"); 
		
 	 	$auth_info =  array(
 			'user_name'=>get_cookie('user_name'),
 			'user_id'=>$uid,
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
				$sql = "select a.* from ".$CI->db->dbprefix."admins as a  where a.admin_id=".$id." ";
				$user_info =  $CI->db->query($sql)->first_row("array");
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
 		$CI = &get_instance();
 		 if($role_id == config_item('admin_role_id')) unset($role_id);
 		 $rights_all = $this->get_rights_item();
 		 
 		 $have_rights = $this->fetch_auth('user_rights');
 		
 		 $uid = $this->fetch_auth('user_id');
 		 $sql = "select b.group_id from   ".$CI->db->dbprefix."admins  as b where b.admin_id=".$uid." ";
		 $db_rights =  $CI->db->query($sql)->first_row("array");
		
		//administrator
		 if($db_rights['group_id'] == config_item('admin_role_id')){

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
	   //other users
		$admins = $rights_all['admin'];

		

		foreach($have_rights as $k=>$v){
		    $rs = $admins[$k];
		    $sort[$k] = $rs['r_order'];
		    unset($rs['detail']);
			$r[$k] = $rs;

			$sort1 = array();
			foreach((array)$v['detail'] as $k1=>$v1){
				 $rs = $admins[$k]['detail'][$k1];
				 if(empty($rs)) continue;
				 $sort1[$k1] = $rs['r_order'];
			     unset($rs['detail']);
				 $r[$k]['detail'][$k1] = $rs;

				 $sort2 = array();
				 foreach((array)$v1['detail'] as $k2=>$v2){
					 $rs = $admins[$k]['detail'][$k1]['detail'][$k2];
					 if(empty($rs)) continue;
					 $sort2[$k2] = $rs['r_order'];
				     unset($rs['detail']);
				     $r[$k]['detail'][$k1]['detail'][$k2] = $rs;

				     $sort3 = array();
				     foreach((array)$v2['detail'] as $k3=>$v3){
						 $rs = $admins[$k]['detail'][$k1]['detail'][$k2]['detail'][$k3];
						 if(empty($rs)) continue;
						 $sort3[$k3] = $rs['r_order'];

					     unset($rs['detail']);

					     $r[$k]['detail'][$k1]['detail'][$k2]['detail'][$k3] = $rs;
					 }
					 $sort3 &&  array_multisort($sort3,SORT_ASC,$r[$k]['detail'][$k1]['detail'][$k2]['detail']);
				 }
				
				$sort2 &&  array_multisort($sort2,SORT_ASC,$r[$k]['detail'][$k1]['detail']);

			}
			
			array_multisort($sort1,SORT_ASC,$r[$k]['detail']);
			
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
 		$CI = &get_instance();
 		if($CI->cor_cache->cache_exists('admin_rights_config',lang_get())){
 			$data = $CI->cor_cache->cache_fetch('admin_rights_config',null,lang_get());
 		}else{
 			$CI->db->select('*')->from('system_rights')->order_by('r_code','asc')->order_by('r_order','asc');

	   		$data = $CI->cor_db->fetch_all(250);
	   		$ls = $CI->cor_form->array_re_index($data['list'],'r_id');
	   		$data['list'] = $ls;
	   		$CI->cor_cache->cache_create($data,'admin_rights_config');
 		}

	   	
	   	return $data;
 	}
 	
 }
?>
