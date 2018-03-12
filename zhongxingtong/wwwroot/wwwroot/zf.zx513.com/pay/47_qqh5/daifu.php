<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";




//支付系统网关地址
$pay_url = "http://47.94.208.216:8080/app/doWithdrawSettle.do";
// 请求数据赋值
$data = "";
$data['merchNo']	=	$userid; //商户号
$data['settleNo']	=	time(); //支付流水
$data['settleAmount']=	strval(1000);//代付金额  



$data['notifyUrl']		=	"http://".$_SERVER['HTTP_HOST']."/pay/47_qq/n.php";   //页面返回URL

$data['accIdentity']	=	'130526198905306319';	//	开户人身份证号

$data['accType']		=	'1';					//	1

$data['accName']		=	'张双龙';				//	姓名中文

$data['accNo']			=	'6217002430037037190';	//	银行账号

$data['accPhone']		=	'15618637777';			//	开户人手机号

$data['bankCode']		=	'郑州市相济路支行';		//	开户人手机号

$data['unionCode']		=	'1004';					//	开户人手机号


ksort($data);


function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}


$sign	=	createLinkstring($data).$userkey;




$data['sign']	=	md5($sign);



$data_string = json_encode($data);




$ch = curl_init($pay_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
 
$result = curl_exec($ch);

$obj						=		json_decode($result);  


print_r($obj);


if($obj->respCode=="00000"){

	$url=$obj->qrcodeUrl;
	$orderno	=	$_GET["orderid"];
	$amt		=	$_GET["price"];


}else{

	echo $obj->respDesc;
	exit;

}

?>