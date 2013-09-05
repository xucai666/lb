<?php
class Alipay
{
	var $alipay_gateway_new='https://mapi.alipay.com/gateway.do?';
	var $https_verify_url='https://www.alipay.com/cooperate/gateway.do?service=notify_verify&';
	var $http_verify_url='http://notify.alipay.com/trade/notify_query.do?';
	var $sign_type='MD5';
	var $input_charset='utf-8';
	var $transport='http';
	var $aliapy_config;

	function __construct($aliapy_config){
		$this->aliapy_config=$aliapy_config;
	}

	function direct_pay_url($para_temp){
		$param=$this->paraFilter($para_temp);
		$mysign=$this->getMysign($param);
		$param['_input_charset']=trim(strtolower($this->input_charset));
		$param['sign']=$mysign;
		$param['sign_type']=strtoupper(trim($this->sign_type));
		return $this->alipay_gateway_new.http_build_query($param);
	}

	function verifyNotify(){
		if(empty($_POST)){
			return false;
		}else{
			$param=$this->paraFilter($_POST);
			$mysign=$this->getMysign($param);
			$responseTxt='true';
			if(!empty($_POST['notify_id']))$responseTxt=$this->getResponse($_POST['notify_id']);
			if(preg_match("/true$/i",$responseTxt) && $mysign==$_POST['sign']){
				return true;
			}else{
				return false;
			}
		}
	}

	function verifyReturn(){
		if(empty($_GET)){
			return false;
		}else{
			$param=$this->paraFilter($_GET);
			$mysign=$this->getMysign($param);
			$responseTxt='true';
			if(!empty($_GET['notify_id']))$responseTxt=$this->getResponse($_GET['notify_id']);
			if(preg_match("/true$/i",$responseTxt) && $mysign==$_GET['sign']){
				return true;
			}else{
				return false;
			}
		}
	}

	function getMysign($param){
		$prestr='';
		foreach($param as $k=>$v)$prestr.=$k.'='.$v.'&';
		$prestr=substr($prestr, 0, count($prestr)-2);
		if(get_magic_quotes_gpc())$prestr=stripslashes($prestr);
		$prestr.=trim($this->aliapy_config['key']);
		return md5($prestr);
	}

	function paraFilter($para_temp) {
		$param=array();
		foreach($para_temp as $k=>$v){
			if($k=='sign' || $k=='sign_type' || $v==''){
				continue;
			}else{
				$param[$k]=$v;
			}
		}
		ksort($param);
		reset($param);
		return $param;
	}

	function getResponse($notify_id){
		$transport=strtolower(trim($this->transport));
		$partner=trim($this->aliapy_config['partner']);
		$veryfy_url='';
		if($transport=='https'){
			$veryfy_url=$this->https_verify_url;
		}else{
			$veryfy_url=$this->http_verify_url;
		}
		$veryfy_url=$veryfy_url.'partner='.$partner.'&notify_id='.$notify_id;
		$responseTxt=@file_get_contents($veryfy_url);
		return $responseTxt;
	}

}
