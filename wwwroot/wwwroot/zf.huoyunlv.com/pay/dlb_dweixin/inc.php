<?php
require_once '../../app/init.php';
use WY\app\model\Handleorder;
use WY\app\woodyapp;
use WY\app\model\Payacp;

$app=woodyapp::getInstance();
$acp=new Payacp();
$acpData=$acp->get('dlb');


extract($acpData);



require_once				'../../lunxun/inc.php';

if ($kaiqi=="1"){



$orderid	=	$_GET["orderid"];

$handle		=	@new Handleorder($orderid,20);
$orders		=	$handle->getOrder();

if ($orders) {

	$accounts	=	$orders["accounts"];
}



$shuju		=		get_xx($accounts,$data,$bdata);

$email		=		$shuju[1];
$userid		=		$shuju[2];

$userkey	=		$shuju[3]."|".$shuju[4];

}


$userkey	=	explode('|',$userkey); 


$GLOBALS['accessKey']	=	$userkey[0];
$GLOBALS['secretKey']	=	$userkey[1];
?>
