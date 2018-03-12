<?php
/*
 * @Description 易游酷产品通用接口范例 
 * @V3.0
 * @Author Svi
 */
include 'yeeykCommon.php';

$pCode = $_POST['pa_code'];#商户编号
$pOrder = $_POST['p_Order'];#商户订单号

$sbOld = "";
$sbOld = $sbOld.$pCode;
$sbOld = $sbOld.$pOrder;

$hmac = HmacMd5($sbOld,$merchantKey); 

$_data = array(
	'merchantNo'=>$pCode,
	'merchantOrderNo'=>$pOrder,
	'hmac'=>$hmac
);
$result = request_post($queryURL_onLine,$_data);
echo $result;
?>