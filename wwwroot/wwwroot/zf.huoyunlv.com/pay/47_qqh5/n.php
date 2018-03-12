<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";
use WY\app\model\Handleorder;

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


$url	=	file_get_contents("php://input");

//$url	=	file_get_contents("ceshi.txt");

$obj	=	json_decode($url);


$data["transAmount"]		=		$obj->transAmount;
$data["orderNo"]			=		$obj->orderNo;
$data["merchNo"]			=		$obj->merchNo;
$data["orderId"]			=		$obj->orderId;

$data["orderStatus"]		=		$obj->orderStatus;
$data["orderPayTime"]		=		$obj->orderPayTime;
$data["notifyTime"]			=		$obj->notifyTime;


$signt						=		createLinkstring($data).$userkey;



$signt						=		md5($signt);

//echo $signt."|";

$sign						=		$obj->sign;


		$ordermoney			=		$data["transAmount"]/100;

		$handle				=		@new Handleorder($data["orderNo"],$ordermoney);

        $handle->updateUncard();


?>