<?php
include "./getSign.php";
include "./getData.php";
$url = "https://api.fzmanba.com/paygateway/mbpay/order/v1";
$ch = curl_init($url);
$timeout = 6000;
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER,0 );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// https请求不验证证书和hosts  
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

$merKey = "88b7bb56867f422dbec6b6179b89cb75";
$data = array(
	'merAccount' => '485e47dfcb78417280c5f6909400c81e',//商户标识
	'merNo' => '10001132',//商户编号
	'time' => time(),//时间戳
	'orderId' => time(),//订单号
	'amount' => '1000',//交易金额
	'productType' => '01',//商品编号
	'product' => '手机',//商品
	'productDesc' => 'iphone',//商品描述
	'userType' => '0',//固定
	'payWay' => 'UNIONPAY',
	'payType' => 'GATEWAY_UNIONPAY',
	'userIp' => '192.168.0.1',
	'notifyUrl' => 'http://zf.byaob.com/test_php/n.php'//后台回调地址
);
$data['sign'] = getSign($data,$merKey);
$encode_data = getData($data,$merKey);
$post_data = array(
	'merAccount' => '485e47dfcb78417280c5f6909400c81e',//商户标识
	'data' => $encode_data
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 $ret = curl_exec($ch);
  curl_close($ch);
 

  $shijian=json_decode($ret);

  $tiaozhuan	=	$shijian->data->payUrl;

  Header("Location: $tiaozhuan"); 
?>