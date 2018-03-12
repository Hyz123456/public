<?php
/*
 * @Description 下单接口
 * @V3.0
 * @Author Svi
 */
include 'zhifuCommon.php';
include 'HttpClient.class.php';

#银行编码
$bankCode = $_REQUEST['bankCode'];
#充值卡号
$cardNo = $_REQUEST['cardNo'];
#充值卡密码
$cardPwd = $_REQUEST['cardPwd'];
#商品信息
$memberGoods = $_REQUEST['memberGoods'];
#异步通知地址
$noticeSysaddress= $_REQUEST['noticeSysaddress'];
#同步跳转地址
$noticeWebaddress = $_REQUEST['noticeWebaddress'];
#产品编码
$productNo = $_REQUEST['productNo'];
#订单金额
$requestAmount = $_REQUEST['requestAmount'];
#商户编号
$trxMerchantNo = $_REQUEST['trxMerchantNo'];
#商户订单号
$trxMerchantOrderno = $_REQUEST['trxMerchantOrderno'];





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