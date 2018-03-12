<?php
require_once 'inc.php';
use WY\app\model\Pushorder;
use WY\app\model\Handleorder;




$orderid	=	$_GET["orderid"];

$sn			=	$_GET["sn"];


if ($orderid && $sn){


	$url			=	"https://mapi.020leader.com/?";
	$service		=	"unipay.acquire.query";
	$merchant_num	=	"000000000094522";
	$trace_num		=	$sn;

	$terminal_unique_no	=	"1";


	$url			=	$url."service={$service}&merchant_num={$merchant_num}&trace_num={$trace_num}&terminal_unique_no=1";



	$fanhui	=	file_get_contents($url);


	

	$neirong	=	json_decode($fanhui);

	//print_r($neirong);

	$totalAmount	=	$neirong->totalAmount/100;

	$result_code	=	$neirong->result_code;

	


	if ($result_code=="SUCCESS"){


		
		$handle=@new Handleorder($orderid,$totalAmount);
		$handle->updateUncard();


		

		$push=new Pushorder($orderid);
		echo $push->ajax();
	
	}


}



?>
