<?php
include "incc.php";
require_once "pay.php";


use WY\app\model\Handleorder;

$requestNum	=	$_GET["requestNum"];
$orderNum	=	$_GET["orderNum"];
$orderAmount=	$_GET["orderAmount"];
$status		=	$_GET["status"];
$completeTime=	$_GET["completeTime"];

$head=getallheaders();


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



$url=createLinkstring($head)."\n";

file_put_contents("ceshi.txt", $url, FILE_APPEND);


$url=createLinkstring($_GET)."\n";

file_put_contents("get.txt", $url, FILE_APPEND);



if ($head["Token"]){

$token		=$head["Token"];
$timestamp	=$head["Timestamp"];

}else{

$token		=$head["token"];
$timestamp	=$head["timestamp"];

}



//$token="1D779657DA8F38D5E6057A55655A849D27FD29BC";
//$timestamp="1510636304712";


file_put_contents("ceshi.txt", "Token:".$token."\n", FILE_APPEND);



if ($status=='SUCCESS'){

		$pay		= new pay();
	    $PayConfig	= $pay->config('dlbpay');
		$jiami		= "secretKey=". $PayConfig['dlb_secret_key'] ."&timestamp=".$timestamp;
		$jieguo		= strtoupper( sha1($jiami));
		if ($token==$jieguo){

					
					$handle=@new Handleorder($requestNum,$orderAmount);
					$handle->updateUncard();
					echo "SUCCESS";
		}
       
}

?>