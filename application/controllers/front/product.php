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
class Product extends CI_Controller {

	function __construct()
	{	
		parent::__construct();
 		$this->load->model('Product_model','im');
 		$this->load->library('Breadcrumb');

 		$cache = &get_init_cache();
 		$channel = $cache->cache_fetch('channel');
		
	}
	
	/**
	 * 商品列表
	 */

	
	function index(){	
		
		//css
		$this->init_page->fetch_front_css('classes');
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Product', 'product');
		$this->breadcrumb->output();
		$this->load->model('Mdata_model','mm');
		$this->load->model('Modules_model','m');
		$meta = $this->mm->fetch_seo_var(65,14);
		$meta  = $meta ? '-'.$meta:'';
		$data['seo'] = array('meta'=>$meta);
		$this->init_page->load_front_view('product_index',$data);
		
	}
	

	function action_category(){

		//css
		$this->init_page->fetch_front_css('classes');
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Product', 'product');
		$this->breadcrumb->output();
		$this->load->model('Tree_model');
		$pid = $this->uri->segment(3);
		$pid = $pid?$pid:2;
		$ls = $this->Tree_model->fetch_belong_tree($pid,true);
		foreach($ls as $k=>&$v){
				$vls = $this->Tree_model->fetch_belong_tree($v['id'],true);
				$lnk = $vls?'action_category':'action_list';
				$v['lnk'] = 'product/'.$lnk.'/'.$v['id'];
				$v['ctp'] = $this->im->count_products($v['id']);
				 if($v['pic']){
				  $img = current(explode(',',$this->Common_model->fetch_images($v['pic'],1)));
				}else{
				  $img = $this->im->first_img($v['id']);
				}
				$v['img'] = $img;
		}
		
		$data['list'] = $ls;
		$this->init_page->load_front_view('product_category',$data);
	}

	function action_home(){
		//css
		$this->init_page->fetch_front_css('classes');
		// add breadcrumbs
		$this->breadcrumb->output();
		$this->load->model('Tree_model');
		$pid = $this->uri->segment(3);
		$pid = $pid?$pid:2;
		$ls = $this->Tree_model->fetch_belong_tree($pid,true);
		$i = 0;
		foreach($ls as $k=>&$v){
				if($i>8){
					unset($ls[$k]);
					continue;
				}
				$i++;
				$vls = $this->Tree_model->fetch_belong_tree($v['id'],true);
				$lnk = $vls?'action_category':'action_list';
				$v['lnk'] = 'product/'.$lnk.'/'.$v['id'];
				$v['ctp'] = $this->im->count_products($v['id']);
				 if($v['pic']){
				  $img = current(explode(',',$this->Common_model->fetch_images($v['pic'],1)));
				}else{
				  $img = $this->im->first_img($v['id']);
				}
				$v['img'] = $img;
		}
		
		$data['list'] = $ls;
		$this->init_page->load_front_view('product_home',$data);
	}


	function  action_list(){
		//css
		$this->init_page->fetch_front_css('classes');
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Product', 'product');
		$this->breadcrumb->output();
		$this->init_page->load_front_view('product',$data);
	}
	
	//产品查看	

	function view(){
		//css
		$this->init_page->fetch_front_css('classes');
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Product', '/product');
		$this->breadcrumb->append_crumb('View', '/product/view');
		$this->breadcrumb->output();	
		$this->init_page->load_front_view("product_view",$data);
	}
	
	
	
	
	//购物车查看
	function good_cart_list(){
		$this->load->library('cart');			
		$cart_arr =  $this->cart->contents();
		foreach($cart_arr as &$v){
			$v['name'] = $v['name'];
			$sort[$v['id']] = $v['id'];
			
		}



		if($sort){

			$p_all = array_re_index($this->db->query("select group_concat(p_pic) as p_pic,p_id from ".$this->db->dbprefix."module_product where p_id in(".implode(',',$sort).") group by p_id")->result_array(),'p_id','p_pic');
			

			foreach($p_all as $k=>$v1){
				$imgs_re[$k] = $this->Common_model->fetch_images($v1,true);
			}
			
			$cart_arr && array_multisort($sort,SORT_ASC,$cart_arr);

			
			foreach($cart_arr as &$v) $v['p_pic'] = strpos($imgs_re[$v['id']],',')!==false ? substr($imgs_re[$v['id']],0,strpos($imgs_re[$v['id']],',')):$imgs_re[$v['id']];
		}

		$this->init_page->load_front_view("product_cart",array('list'=>$cart_arr));
		
	}
	
	
	
	
	
	
		
	//购物车添加
	function good_cart_add(){	

		$this->load->library('cart');	
		//$this->cart->destroy();
		$ids = $this->uri->segment(3)?array($this->uri->segment(3)):explode(',',$this->input->get('ids'));
		$ls = $this->db->select('*',false)->from('module_product')->where_in('p_id',$ids)->get()->result_array();
		$cart_arr =  $this->cart->contents();
		foreach($ls as $v):
			$item = array(
	               'id'      => $v['p_id'],
	               'qty'     => '1',
	               'price'   => '2',
	               'name'    => $v['p_name'],
	         );	       
	       
			foreach($cart_arr as $k=>$v){
				$qty = $v['qty']?$v['qty']:0;
				if($v['id'] == $item['id'])  $item['qty'] = $qty+1;		
			}   
		       
			$this->cart->insert($item);	
		endforeach;	
		redirect("product/good_cart_list");		
	}
	
	
	
		
	//购物车更新
	function good_cart_update(){	
		$rowid = $this->uri->segment(3);	
		$qty = $this->input->post('qty');	
		
		$this->load->library('cart');	
		$data = array('qty'=>$qty,'rowid'=>$rowid);
		$this->cart->update($data);	
		echo 1;
		exit;	
		
	}
	
	
	
		
	//购物车单产品删除
	function good_cart_delete(){	
		$data = array(array(
			'qty'=>0,
			'rowid'=>$this->uri->segment(3),
		));	
		
		$this->load->library('cart');		
		$this->cart->update($data);
		redirect("product/good_cart_list");		
	}
	
	function order_create(){
		$this->load->library('cart');			
		$cart_arr =  $this->cart->contents();
		foreach($cart_arr as &$v){
			$v['name'] = $v['name'];
			$sort[$v['id']] = $v['id'];
			
		}
		if($sort){
			$p_all = array_re_index($this->db->query("select SUBSTRING_INDEX(p_pic,',',1) as p_pic,p_id from ".$this->db->dbprefix."module_product where p_id in(".implode(',',$sort).")")->result_array(),'p_id','p_pic');
			foreach($p_all as $k=>$v1){
				$imgs_re[$k] = $this->Common_model->fetch_images($v1,true);
			}
			
			$cart_arr && array_multisort($sort,SORT_ASC,$cart_arr);

			foreach($cart_arr as &$v) $v['p_pic'] = strpos($imgs_re[$v['id']],',')!==false ? substr($imgs_re[$v['id']],0,strpos($imgs_re[$v['id']],',')):$imgs_re[$v['id']];


		}

		//fetch member identity infomation
		$member = get_cookie('member');	
		if($member){
			$member = $this->init_page->my_encrypt($member,'DECODE');
			$this->load->model('Member_model','mm');
			$member_info = $this->mm->detail($member);
		}

		$this->init_page->load_front_view("product_order",array('member_info'=>$member_info,'list'=>$cart_arr));
	}
	//提交订单
	
	function order_save(){	
		$main = $this->input->post('main');	
		try{
			
			$this->load->library('cart');	
			$cart_arr =  $this->cart->contents();	
			
			foreach((array)$cart_arr as $v){
				$data['detail'][] = array(
					'p_id'=>$v['id'],
					'p_name'=>$v['name'],
					'p_qty'=>$v['qty'],
					'p_price'=>$v['price'],
				);			
			}	


			if(empty($data['detail'])) throw new Exception('购物车无任何商品，请添加!');
			
		
			$date_order_no = date('Ymd');
			$max = $this->db->query("select max(right(ifnull(order_no,0),3))  as max_order_no from ".$this->init_db->table('order_main')." where order_no like '".$date_order_no."___' order by order_id desc  limit 1 ")->first_row('array');
			$max = $max['max_order_no'];
			$max = ++$max;
			$max = sprintf('%03d',$max);
			$max =  $date_order_no.$max;
			$main['order_no']  = $max;				
			$data['main'] = $main;
			$data['main']['order_date'] = date('Y-m-d');
			//验证
		 	$this->form_validation->set_rules($this->im->validator_order());
			if($this->form_validation->run()){
				$this->init_db->save($data,$this->im->db_config_order());
				$this->cart->destroy();	

				//fetch member identity infomation
				$member = get_cookie('member');	
				if($member){
					$member = $this->init_page->my_encrypt($member,'DECODE');
					$updates =array('m_name'=>$main['contact'],'m_email'=>$main['email'],'m_address'=>$main['address'],'m_mobile'=>$main['mobile']);
					$this->db->where('m_user',$member);
					$this->db->update('module_member',$updates);
				}


				$this->init_page->front_redirect("product",'订单提交成功');	
			}else{
				$this->load->library('cart');			
				$cart_arr =  $this->cart->contents();
				
				foreach($cart_arr as &$v){
					$v['name'] = $v['name'];
					$sort[$v['id']] = $v['id'];
				}
				if($sort){
						$p_all = array_re_index($this->db->query("select SUBSTRING_INDEX(p_pic,',',1) as p_pic,p_id from ".$this->db->dbprefix."module_product where p_id in(".implode(',',$sort).")")->result_array(),'p_id','p_pic');
						foreach($p_all as $k=>$v1){
							$imgs_re[$k] = $this->Common_model->fetch_images($v1,true);
						}
						
						$cart_arr && array_multisort($sort,SORT_ASC,$cart_arr);

						foreach($cart_arr as &$v) $v['p_pic'] = strpos($imgs_re[$v['id']],',')!==false ? substr($imgs_re[$v['id']],0,strpos($imgs_re[$v['id']],',')):$imgs_re[$v['id']];


				}

				$this->init_page->load_front_view("product_order",array('main'=>$main,'list'=>$cart_arr));
			}
				
			
			
		}	
		catch(Exception $e){
			
			$this->init_page->front_redirect('product',$e->getMessage());
			
		}	
		
	}
	
	
	
	
	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */