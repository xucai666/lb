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

	}
	
	/**
	 * 商品列表
	 */

	
	function index(){	
	
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Product', 'product');
		$this->breadcrumb->output();
		
		$this->cor_page->load_front_view('product',$data);
		
	}
	
	
	//产品查看	

	function view(){
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Product', '/product');
		$this->breadcrumb->append_crumb('View', '/product/view');
		$this->breadcrumb->output();

		$this->cor_page->load_front_view("product_view",$data);
	}
	
	
	
	
	//购物车查看
	function good_cart_list(){
		$this->load->library('cart');			
		$cart_arr =  $this->cart->contents();
		
		foreach($cart_arr as &$v){
			$v['name'] = $v['name'];
			$sort[$v['id']] = $v['id'];
			$p_all[$v['id']] = $v['id'];
		}
		$p_all && $imgs = $this->db->select('p_pic,p_id',false)
		->from($this->cor_db->table('module_product'))
		->where_in('p_id',$p_all)
		->get()->result_array();
		$imgs_re = $this->cor_form->array_re_index($imgs,'p_id','p_pic');
		$cart_arr && array_multisort($sort,SORT_ASC,$cart_arr);
		foreach($cart_arr as &$v) $v['p_pic'] = $imgs_re[$v['id']];
		$this->cor_page->load_front_view("product_cart",array('list'=>$cart_arr));
		
	}
	
	
	
	
	
	
		
	//购物车添加
	function good_cart_add(){	

		$this->load->library('cart');	
		//$this->cart->destroy();
		$sql_arr = array(
			'table_name'=>$this->cor_db->table('module_product'),
			'fields'=>'*',
			'primary_id'=>'p_id',
			'primary_val'=>$this->uri->segment(3),
		);	
		$main = $this->cor_db->fetch_one($sql_arr);
		$data = array(
               'id'      => $main['p_id'],
               'qty'     => '1',
               'price'   => '2',
               'name'    => $main['p_name'],
         );
       $cart_arr =  $this->cart->contents();
       
		foreach($cart_arr as $k=>$v){
			$qty = $v['qty']?$v['qty']:0;
			if($v['id'] == $data['id'])  $data['qty'] = $qty+1;		
		}   
	       
		$this->cart->insert($data);		
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
			$p_all[$v['id']] = $v['id'];
		}
		$p_all && $imgs = $this->db->select('p_pic,p_id',false)
		->from($this->cor_db->table('module_product'))
		->where_in('p_id',$p_all)
		->get()->result_array();
		$imgs_re = $this->cor_form->array_re_index($imgs,'p_id','p_pic');
		$cart_arr && array_multisort($sort,SORT_ASC,$cart_arr);
		foreach($cart_arr as &$v) $v['p_pic'] = $imgs_re[$v['id']];
		$this->cor_page->load_front_view("product_order",array('list'=>$cart_arr));
	}
	//提交订单
	
	function order_save(){	
		$main = $this->input->post('main');	
		try{
			
			$this->load->library('cart');	
			$cart_arr =  $this->cart->contents();	
			foreach($cart_arr as &$v){
				$v['name'] = $this->cor_page->my_encrypt($v['name'],'DECODE');
			}
			foreach((array)$cart_arr as $v){
				$data['detail'][] = array(
					'p_id'=>$v['id'],
					'p_name'=>$v['name'],
					'p_qty'=>$v['qty'],
					'p_price'=>$v['price'],
				);			
			}	


			if(empty($data['detail'])) throw new Exception('请选择商品!');
			
		
			$date_order_no = date('Ymd');
			$max = $this->db->query("select max(right(ifnull(order_no,0),3))  as max_order_no from ".$this->cor_db->table('order_main')." where order_no like '".$date_order_no."___' order by order_id desc  limit 1 ")->first_row('array');
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
				$this->cor_db->save($data,$this->im->db_config_order());
				$this->cart->destroy();			
				$this->cor_page->front_redirect("product",'订单提交成功');	
			}else{
				$this->load->library('cart');			
				$cart_arr =  $this->cart->contents();
				
				foreach($cart_arr as &$v){
					$v['name'] = $v['name'];
					$sort[$v['id']] = $v['id'];
					$p_all[$v['id']] = $v['id'];
				}
				$p_all && $imgs = $this->db->select('p_pic,p_id',false)
				->from($this->cor_db->table('module_product'))
				->where_in('p_id',$p_all)
				->get()->result_array();
				$imgs_re = $this->cor_form->array_re_index($imgs,'p_id','p_pic');
				$cart_arr && array_multisort($sort,SORT_ASC,$cart_arr);
				foreach($cart_arr as &$v) $v['p_pic'] = $imgs_re[$v['id']];

				$this->cor_page->load_front_view("product_order",array('main'=>$main,'list'=>$cart_arr));
			}
				
			
			
		}	
		catch(Exception $e){
			
			$this->cor_page->front_redirect('product',$e->getMessage());
			
		}	
		
	}
	
	
	
	
	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */