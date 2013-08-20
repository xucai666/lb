<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Controller
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
class Templates extends CI_Controller {

       function __construct()
       {
            parent::__construct();
            //auth login
            $this->cor_auth->execute_auth();
            $this->load->model('Templates_Model','IM');
            
       }

       /**
		*列表
       **/
       function action_list(){
       		$this->db->select('*',false)->from('templates')
       		->like('t_name',$this->input->get('t_name'))
       		->like('t_type',$this->input->get('t_type'))
       		->like('t_db_name',$this->input->get('t_db_name'))
       		->order_by('t_id','desc');       			
       		$data = $this->cor_db->fetch_all(15);
       		$data['template_types'] = $this->cor_cache->cache_fetch('template_types');
       		$this->cor_page->load_backend_view('templates_list',$data);
       }

       /**
		*添加/修改
       **/ 
      function action_add(){
          $this->cor_page->fetch_css('templates','view',$this->cor_page->getRes('css','backend','item/'));
          $this->cor_page->fetch_js('templates','view',$this->cor_page->getRes('js','backend','item/'));
      		$main_id = $this->uri->segment(4);
      		if($main_id){
      			$fetch_config  = array(
    		 			'primary_id'=>'t_id',
    		 			'primary_val'=>$main_id,
    		 			'table_name'=>'templates',
 				    );
 				    $main = $this->cor_db->fetch_one($fetch_config);
      		}
      		$data = array('main'=>$main,'template_types'=>$this->cor_cache->cache_fetch('template_types'));
       		$this->cor_page->load_backend_view('templates_add',$data);
       }

          /**
    *添加/修改
       **/ 
      function action_copy(){
          $this->cor_page->fetch_css('templates','view',$this->cor_page->getRes('css','backend','item/'));
          $this->cor_page->fetch_js('templates','view',$this->cor_page->getRes('js','backend','item/'));
          $main_id = $this->uri->segment(4);
          $fetch_config  = array(
            'primary_id'=>'t_id',
            'primary_val'=>$main_id,
            'table_name'=>'templates',
          );
          $main = $this->cor_db->fetch_one($fetch_config);
          unset($main[t_id]);
          unset($main[t_mid]);
          $main[t_type]=5;
          $data = array('main'=>$main,'template_types'=>$this->cor_cache->cache_fetch('template_types'));
          $this->cor_page->load_backend_view('templates_add',$data);
       }

        /**
		*保存
       **/
       function action_save(){
       		try{
       			$main = $this->input->post('main');
       			
	       		$this->form_validation->set_rules($this->IM->validator_save());
	       		if($this->form_validation->run()==true){
	       			$main = $this->cor_db->save(array('main'=>$main),$this->IM->db_config());
	       			$this->cor_page->pop_redirect('保存成功',site_url('backend/templates/action_list'));
	       		}else{
	       			$t_types = $this->cor_cache->cache_fetch('template_types');
	       			$this->cor_page->load_backend_view('templates_add',array('main'=>$main,'template_types'=>$t_types));
	       		}
       		}catch(Exception $e){
       			$this->cor_page->pop_redirect($e->getMessage(),site_url('backend/templates/action_list'));
       		}
       		
       	
       } 

        /**
		*删除
       **/
       function action_del(){
        	try{
            $ids = $this->input->post('t_id');
            $ids = $ids?$ids:$this->uri->segment(4);
           

        		$this->cor_db->delete($ids,$this->IM->db_config());		
        		$this->cor_page->pop_redirect('删除成功',site_url("backend/templates/action_list"));		
        	}catch(Excpetion $e){
        		$this->cor_page->pop_redirect($e->getMessage(),site_url("backend/templates/action_list"));		
        	}
        	
       }

      /**
       * [action_view 预览]
       * @return [type] [description]
       */
       function action_view(){
         $this->cor_page->fetch_css('shCoreDefault','view',base_url("syntaxhighlighter_3.0.83/styles/"));
          $this->cor_page->fetch_js('shCore','view',base_url("syntaxhighlighter_3.0.83/scripts/"));
          $this->cor_page->fetch_js('shBrushPhp','view',base_url("syntaxhighlighter_3.0.83/scripts/"));

         $this->cor_page->fetch_css('templates','view',$this->cor_page->getRes('css','backend','item/'));
         $this->cor_page->fetch_js('templates','view',$this->cor_page->getRes('js','backend','item/'));
         $main_id = $this->uri->segment(4);
          $fetch_config  = array(
            'primary_id'=>'t_id',
            'primary_val'=>$main_id,
            'table_name'=>'templates',
          );
          $main = $this->cor_db->fetch_one($fetch_config);
          $t_types = $this->cor_cache->cache_fetch('template_types');
         $this->cor_page->load_backend_view('templates_view',array('main'=>$main,'template_types'=>$t_types));
       }


       function tempate_fields_check($str){ 
          $main = $this->input->post('main');         
          preg_match_all("/\%s/i",$main['t_html'],$s);        
          $flag = count($s[0]) == count(explode(',', $str));
          if (empty($flag))
          {
            $this->form_validation->set_message('tempate_fields_check', '模板代码与查询字段不匹配');
            return FALSE;
          }
          else
          {
            return TRUE;
          }
       }
       

       //view file list
       function view_list(){
          $this->cor_page->fetch_js('swfupload','loadview',base_url().'/swfupload/api');
          $this->cor_page->fetch_js(array('fileprogress','handlers','swfupload.queue'),'loadview',base_url().'swfupload/js');
          $this->load->helper('file'); 
          //define root_path
          $develop = $this->cor_cache->cache_fetch('sys_config','develop',lang_get());
          $init_path = $this->config->item('template_dir').'/front/'.$develop['template'];
          $t_name = $this->input->get('t_name');
          $root_path = base64_decode($this->uri->segment(4));
          $root_path = $root_path ? $root_path:base64_decode($this->input->get('root_path'));
          $root_path = $root_path ? $root_path:$init_path;
          $root_path = realpath($root_path); 
          //for back to history page
          $root_path_parent = substr($root_path,0, strrpos($root_path, "\\")) ;
          $root_path_parent = strcmp($root_path_parent,realpath($init_path))>0 ? base64_encode($root_path_parent):'';
          //for url
          $root_real_path = str_replace(array(FCPATH,'\\'),array('','/'),$root_path);
          $root_url = base_url($root_real_path).'/';
        

          $list = get_dir_file_info($root_path, true);
          
          foreach($list as $k=>$v){
              if($t_name && strpos($v['name'],$t_name)===false){
                unset($list[$k]);
                continue;
              }
              $v['size'] = $this->Common_model->file_size($v['size']);
              $ext = strrchr($v['name'],'.');
              if($ext){
                  $v['href'] = $root_url.$v['name'];
                  $v['target'] = '_blank';
                  if(!in_array($ext, array(".htm",".css",".js"))){
                    $v['edit_able'] = 'hide';
                  }
                  $v['css_name'] = 'icon_file';
              }else{
                  $v['edit_able'] = 'hide';
                  $v['href'] = "backend/templates/view_list/".base64_encode($v['server_path']);
                  $v['target'] = '_self';
                  $v['css_name'] = 'icon_forder';
              }
              $list[$k] = $v;
           }
          $data  = array('list'=>$list,'root_path'=>base64_encode($root_path),'root_path_parent'=>$root_path_parent,'root_url'=>$root_url);
          $this->cor_page->load_backend_view('view_list',$data);
       }


       //view add or delete
       function view_add(){
           $t_file = base64_decode($this->uri->segment(4));
           $data = array('main'=>array('t_file'=>$t_file,'t_name'=>basename($t_file),'t_html'=>htmlspecialchars(file_get_contents($t_file)))); 
           $this->cor_page->load_backend_view('view_add',$data);

       }

          //view save
       function view_save(){
           $main = $this->input->post('main');
           file_put_contents($main[t_file],$main[t_html]);
           $this->cor_page->backend_redirect('templates/view_list/'.base64_encode(dirname($main[t_file])),$data);

       }

       
}
?>