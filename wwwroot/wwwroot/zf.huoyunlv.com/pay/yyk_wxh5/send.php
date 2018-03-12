<?php
/*
 * @Description 易游酷产品通用支付接口范例
 * @V3.0
 * @Author Svi
 */
include 'zhifuCommon.php';
include 'HttpClient.class.php';

#商户编号
##商户在我方系统的唯一身份标识。
$pId = $userid;





#银行编码
$bankCode		= "";
#充值卡号
$cardNo			= "";
#充值卡密码
$cardPwd		= "";
#商品信息
$memberGoods	= "123";
#异步通知地址
$noticeSysaddress= "http://www.baidu.com";
#同步跳转地址
$noticeWebaddress = "http://www.baidu.com";
#产品编码
$productNo = "WXWAP-JS";
#订单金额
$requestAmount = $_REQUEST['price'];
#商户编号
$trxMerchantNo = $userid;
#商户订单号
$trxMerchantOrderno = $_GET['orderid'];





$hmac = getReqHmacString($bankCode,$cardNo,$cardPwd,$memberGoods,$noticeSysaddress,$noticeWebaddress,$productNo,$requestAmount,$trxMerchantNo,$trxMerchantOrderno);

$_data = array(
    'bankCode'=>$bankCode,
    'cardNo'=>$cardNo,
    'cardPwd'=>$cardPwd,
    'memberGoods'=>$memberGoods,
    'noticeSysaddress'=>$noticeSysaddress,
    'noticeWebaddress'=>$noticeWebaddress,
    'productNo'=>$productNo,
    'requestAmount'=>$requestAmount,
    'trxMerchantNo'=>$trxMerchantNo,
    'trxMerchantOrderno'=>$trxMerchantOrderno,
    'hmac'=>$hmac
);

$res = send_post($reqURL_onLine,$_data);
print_r($res);


?>