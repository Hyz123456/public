<?php
include "./getSign.php";
include "./getData.php";
$url = "http://47.96.5.145:8080/paygateway/quickPay/order/v1";
$ch = curl_init($url);
$timeout = 6000;
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER,0 );
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

$merKey = "f1664d38ca6a4201a3e0acvc321312";
$data = array(
	'merAccount' => '1adb7170f1e84bc3867ced4e5364f62c',//商户标识
	'merNo' => '10005621',//商户编号
	'time' => '1513579815',//时间戳
	'orderId' => 'OR_00000011231',//订单号
	'amount' => '1000',//交易金额
	'productType' => '01',//商品编号
	'product' => '手机',//商品
	'userIp' => '192.168.1.1',//用户ip
	'memberId' => '000002',//商户用户id
	'contractId' => '123ioxdsf02312'//协议号
	'returnUrl' => '',
	'notifyUrl' => 'http://xxxxx.com'//后台回调地址
);
$data['sign'] = getSign($data,$merKey);
$encode_data = getData($data,$merKey);
$post_data = array(
	'merAccount' => '1adb7170f1e84bc3867ced4e5364f62c',//商户标识
	'data' => $encode_data
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 $ret = curl_exec($ch);
  curl_close($ch);
  echo $ret;
?>