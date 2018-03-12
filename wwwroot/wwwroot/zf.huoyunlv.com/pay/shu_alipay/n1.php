<?
require_once 'inc.php';


$post					=		"http://qr.bcfapi.com/unite/v4.0/payment";

$data['merchantNo']		=		$userid;	//商户号
$data['source']			=		"1";		//交易类型[参数规则—交易类型]

$data['subject']		=		"支付";

$data['orderNo']		=		$_GET['orderid'];


$data['orderMoney']		=		$_GET['price'];

$data['notifyUrl']		=		"http://".$_SERVER['HTTP_HOST']."/pay/shu_alipay/n.php";



?>