<?php
/*
 * @Description 易游酷产品通用接口范例 
 * @V3.0
 * @Author Svi
 */

include 'zhifuCommon.php';


$reCode = $_REQUEST['reCode'];
$trxMerchantNo = $_REQUEST['trxMerchantNo'];
$trxMerchantOrderno = $_REQUEST['trxMerchantOrderno'];
$result = $_REQUEST['result'];
$productNo = $_REQUEST['productNo'];
$memberGoods = $_REQUEST['memberGoods'];
$amount = $_REQUEST['amount'];
$hmac = $_REQUEST['hmac'];
$sbOld = "";
$sbOld = $sbOld."reCode=".$reCode."&";
$sbOld = $sbOld."trxMerchantNo=".$trxMerchantNo."&";
$sbOld = $sbOld."trxMerchantOrderno=".$trxMerchantOrderno."&";
$sbOld = $sbOld."result=".$result."&";
$sbOld = $sbOld."productNo=".$productNo."&";
$sbOld = $sbOld."memberGoods=".$memberGoods."&";
$sbOld = $sbOld."amount=".$amount."&";
$sbOld = $sbOld."key=".$merchantKey;
$localhmac = md5($sbOld);
if($localhmac==$hmac && ($result=='SUCCESS'&&$reCode==1)){
	echo "SUCCESS";
}else{
	if($localhmac!=$hmac){
		echo "hmac fail";
	}else{
		echo "Payment is fail!reCode=".$reCode;
	}
}

?>