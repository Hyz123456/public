<?php
include "./getSign.php";
include "./getData.php";
$url = "http://47.96.5.145:8080/paygateway/quick/addMember/v1";
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
	'memberId' => '000002',//商户用户ID
	'time' => '1513579815',//时间戳
	'orderNo' => 'OR_00000011231',//商户订单号
	'idType' => '00',//证件类型
	'idCard' => '350xxxxxxxxxxx',//身份证号码
	'memberName' => '张三',//姓名
	'mobile' => '13333300000',//手机号码
	'bankNo' => '62xxxxxxxxxxxxxx',//银行卡号
	'cardType' => '0'//银行卡类型
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