<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 支付宝即时到帐接口 - 控制器
 *
 * @author GooCarlos <goocarlos@gmail.com>
 * @copyright Copyright (c) 2007 - 2010, Nowme Inter. http://www.goocarlos.com/
 */
class Alipay extends CI_Controller {

    /**
     * 构造函数
     */
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->model('Alipay_Model');
        // 声明 POST 空数组
        $_postdata = array();
    }

    /**
     * 支付表单页
     */
    function index() {
        $stats = $this->db->select('sum(1) as p_stat,sum(p_qty*p_price ) as sub',false)->from('order_detail')->where('order_id',$this->uri->segment(3))->get()->first_row('array');
        $config = array(
            'table_name'=>'order_main',
            'primary_id'=>'order_id',
            'primary_val'=>$this->uri->segment(3),
        );
        $main = $this->cor_db->fetch_one($config);
        $list = $this->db->select('*',false)->from('order_detail')->where('order_id',$this->uri->segment(4))->get()->result_array();
        $data = array('stats'=>$stats,'main'=>$main,'list'=>$list,'status'=>$this->cor_cache->cache_fetch('order_status'));
      
        $this->load->view('alipay_from',$data);
    }

    /**
     * 处理支付请求
     */
    function topay() {
        /**
         * 从 Model 获取参数设置
         */
        $partner = $this->Alipay_Model->partner;
        $security_code = $this->Alipay_Model->security_code;
        $seller_email = $this->Alipay_Model->seller_email;
        $_input_charset = $this->Alipay_Model->_input_charset;
        $transport = $this->Alipay_Model->transport;
        $notify_url = $this->Alipay_Model->notify_url;
        $return_url = $this->Alipay_Model->return_url;
        $show_url = $this->Alipay_Model->show_url;
        $sign_type = $this->Alipay_Model->sign_type;
        $mainname = $this->Alipay_Model->mainname;
        $antiphishing = $this->Alipay_Model->antiphishing;
        $gateway = $this->Alipay_Model->gateway;

        /**
         * 必填参数
         */
        $out_trade_no = local_to_gmt(now()); // 唯一订单号，这里生成了一个 Unix 时间的例子
        $subject = $this->input->post('subject', TRUE); // 订单名称，显示在支付宝收银台里的“商品名称”里，显示在支付宝的交易管理的“商品名称”的列表里。
        $body = $this->input->post('body', TRUE); // 订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里。
        $total_fee = $this->input->post('total_fee', TRUE); // 订单总金额，显示在支付宝收银台里的“应付总额”里，可以有两位小数。

        /**
         * 扩展参数
         */
        $pay_mode = "bankPay";
        if ($pay_mode == "directPay") {
            $paymethod = "directPay"; //默认支付方式，四个值可选：bankPay(网银); cartoon(卡通); directPay(余额); CASH(网点支付)
            $defaultbank = "";
        } else {
            $paymethod = "bankPay";  //默认支付方式，四个值可选：bankPay(网银); cartoon(卡通); directPay(余额); CASH(网点支付)
            $defaultbank = $pay_mode;  //默认网银代号，代号列表见http://club.alipay.com/read.php?tid=8681379
        }

        /**
         * 防钓鱼
         */
        $encrypt_key = '';     //防钓鱼时间戳，初始值
        $exter_invoke_ip = '';    //客户端的IP地址，初始值
        if ($antiphishing == 1) {
            $encrypt_key = $this->Alipay_Model->query_timestamp($partner);
            $exter_invoke_ip = '';   //获取客户端的IP地址，建议：编写获取客户端IP地址的程序
        }

        /**
         * 其它
         */
        $extra_common_param = '';   //自定义参数，可存放任何内容（除=、&等特殊字符外），不会显示在页面上
        $buyer_email = '';   //默认买家支付宝账号

        /**
         * 构造请求数组
         */
        $parameter = array(
            "service" => "create_direct_pay_by_user", //接口名称，不需要修改
            "payment_type" => "1", //交易类型，不需要修改

            "partner" => $partner,
            "seller_email" => $seller_email,
            "return_url" => $return_url,
            "notify_url" => $notify_url,
            "_input_charset" => $_input_charset,
            "show_url" => $show_url,
            "out_trade_no" => $out_trade_no,
            "subject" => $subject,
            "body" => $body,
            "total_fee" => $total_fee,
            "paymethod" => $paymethod,
            "defaultbank" => $defaultbank,
            // 防钓鱼
            "anti_phishing_key" => $encrypt_key,
            "exter_invoke_ip" => $exter_invoke_ip,
            // 分润(若要使用，请取消下面两行注释)
            //"royalty_type"   => "10",	  //提成类型，不需要修改
            //"royalty_parameters" => "111@126.com^0.01^分润备注一|222@126.com^0.01^分润备注二",
            /**
             * 提成信息集，与需要结合商户网站自身情况动态获取每笔交易的各分润收款账号、各分润金额、各分润说明。最多只能设置10条
             * 提成信息集格式为：收款方Email_1^金额1^备注1|收款方Email_2^金额2^备注2
             */
            // 自定义超时(若要使用，请取消下面一行注释)。该功能默认不开通，需联系客户经理咨询
            //"it_b_pay" => "1c", //超时时间，不填默认是15天。八个值可选：1h(1小时),2h(2小时),3h(3小时),1d(1天),3d(3天),7d(7天),15d(15天),1c(当天)
            // 自定义参数
            "buyer_email" => $buyer_email,
            "extra_common_param" => $extra_common_param
        );

        // GET 方式传递，默认使用
        $url = $this->Alipay_Model->create_url($parameter);
        echo "<script>window.location =\"$url\";</script>"; // 输出跳转链接
        // POST 方式传递，如需使用此方式，请去掉下列代码注释并注释 GET 传递方式
        // $payform_html = $this->Alipay_Model->build_postform($parameter);
        // echo $payform_html; // 输出支付表单
    }

    /**
     * 同步支付结果接收
     */
    function return_page() {
        /**
         * 从 Model 获取参数设置
         */
        $partner = $this->Alipay_Model->partner;
        $security_code = $this->Alipay_Model->security_code;
        $_input_charset = $this->Alipay_Model->_input_charset;
        $transport = $this->Alipay_Model->transport;
        $sign_type = $this->Alipay_Model->sign_type;

        /**
         * 验证接收内容
         */
        $verify_result = $this->Alipay_Model->return_verify();
        if ($verify_result) {
            //验证成功，获取支付宝的反馈参数
            $config['uri_protocol'] = "PATH_INFO";
            parse_str($_SERVER['QUERY_STRING'], $_POST);
            $trade = $_POST['out_trade_no']; //获取支付宝传递过来的订单号
            $total = $_POST['total_fee']; //获取支付宝传递过来的总价格
            $You_trade_status = "1"; //获取商户数据库中查询得到该笔交易当前的交易状态
            /**
             * 这里假设：
             * You_trade_status="0";表示订单未处理；
             * $You_trade_status="1";表示交易成功（TRADE_FINISHED/TRADE_SUCCESS）；
             */
            if ($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {    //交易成功结束
                // 放入订单交易完成后的数据库更新程序代码，附带一些调试代码
                // 请务必保证echo输出的信息只有 success，以便支付宝记录结果
                // 为了保证不被重复发送通知，或重复执行数据库更新程序，请判断该笔交易状态是否是订单未处理状态
                if ($You_trade_status < 1) {
                    //根据订单号更新订单，把商户数据库订单处理成交易成功
                }
                echo "success";
                // echo "支付成功！订单号：".$trade."支付金额：".$total;
            } else {
                //其他状态判断。普通即时到帐中，其他状态不用判断，直接打印 success。
                echo "success";
                // echo "支付成功！订单号：".$trade."支付金额：".$total;
            }
        } else {
            // 验证失败
            echo "fail";
        }
    }

    /**
     * 异步支付结果接收
     */
    function notify_page() {
        /**
         * 从 Model 获取参数设置
         */
        $partner = $this->Alipay_Model->partner;
        $security_code = $this->Alipay_Model->security_code;
        $_input_charset = $this->Alipay_Model->_input_charset;
        $transport = $this->Alipay_Model->transport;
        $sign_type = $this->Alipay_Model->sign_type;
        /**
         * 验证接收内容
         */
        $verify_result = $this->Alipay_Model->notify_verify();

        if ($verify_result) {
            //验证成功，获取支付宝的反馈参数
            $config['uri_protocol'] = "PATH_INFO";
            parse_str($_SERVER['QUERY_STRING'], $_POST);
            $trade = $_POST['out_trade_no']; //获取支付宝传递过来的订单号
            $total = $_POST['total_fee']; //获取支付宝传递过来的总价格
            $You_trade_status = "1"; //获取商户数据库中查询得到该笔交易当前的交易状态
            /**
             * 这里假设：
             * You_trade_status="0";表示订单未处理；
             * $You_trade_status="1";表示交易成功（TRADE_FINISHED/TRADE_SUCCESS）；
             */
            if ($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {    //交易成功结束
                // 放入订单交易完成后的数据库更新程序代码，附带一些调试代码
                // 请务必保证echo输出的信息只有 success，以便支付宝记录结果
                // 为了保证不被重复发送通知，或重复执行数据库更新程序，请判断该笔交易状态是否是订单未处理状态
                if ($You_trade_status < 1) {
                    //根据订单号更新订单，把商户数据库订单处理成交易成功
                }
                echo "success";
                // echo "支付成功！订单号：".$trade."支付金额：".$total;
            } else {
                //其他状态判断。普通即时到帐中，其他状态不用判断，直接打印 success。
                echo "success";
                // echo "支付成功！订单号：".$trade."支付金额：".$total;
            }
        } else {
            // 验证失败
            echo "fail";
        }
    }

}

/* End of file alipay.php */
/* Location: ./application/controllers/alipay.php */