<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付宝即时到帐接口 For CodeIgniter</title>
<?php echo js_url('jquery-1.9.1.min','front');?>
</head>

<body>
<div style="display:none;">
<h1>支付宝即时到帐接口 For CodeIgniter</h1>
<?php echo form_open('alipay/topay',"id='form1'"); ?>
  <label>订单名称</label>
  <input type="hidden" name="subject" type="text"  value="商品订购"/>
  <span>订单名称，显示在支付宝收银台里的"商品名称"里，显示在支付宝的交易管理的"商品名称"的列表里。</span><br />
  <label>订单内容</label>
  <input type="hidden" name="body" type="text" value="商品订购" />
  <span>订单描述、订单详细、订单备注，显示在支付宝收银台里的"商品描述"里。</span><br />
  <label>订单金额</label>
  <input name="total_fee" type="text" value="<?php echo $stats['sub'];?>" />
  <span>订单总金额，显示在支付宝收银台里的"应付总额"里，可以有两位小数。</span><br />
  <input name="" type="submit" value="确认付款" />
<?php echo form_close();?>
</div>
<script type="text/javascript">jQuery(document).ready(function($) {
    $('#form1').submit();
});
</script>
</body>
</html>
