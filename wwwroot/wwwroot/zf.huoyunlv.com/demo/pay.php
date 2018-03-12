<?php
require_once 'inc.php';
$version='1.0';
$customerid=$userid;


$order_id_main = date('YmdHis') . rand(10000000,99999999);


$sdorderno=$order_id_main;
$total_fee="1.00";
$paytype=$_REQUEST['pd_FrpId'];


if ($paytype=='alipay' || $paytype=='alipaywap'  || $paytype=='kaifa' || $paytype=='kuaijie'){

	$bankcode="";
}
elseif ($paytype=='weixin' || $paytype=='wxwap' || $paytype=='wxh5' || $paytype=='qqwallet' || $paytype=='qqrcode' || $paytype=='yl' || $paytype=='jd'){

	$bankcode="";

}else{

	$paytype	="bank";
	$bankcode=$_REQUEST['pd_FrpId'];

}



$notifyurl='http://'.$_SERVER['HTTP_HOST'].'/demo/notify.php';
$returnurl='http://'.$_SERVER['HTTP_HOST'].'/demo/return.php';
$remark='';
$get_code="0";

$sign=md5('version='.$version.'&customerid='.$customerid.'&total_fee='.$total_fee.'&sdorderno='.$sdorderno.'&notifyurl='.$notifyurl.'&returnurl='.$returnurl.'&'.$userkey);

?>


<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>正在转到付款页</title>
</head>
<body onLoad="document.pay.submit()">
    <form name="pay" action="/apisubmit" method="post">
        <input type="hidden" name="version" value="<?php echo $version?>">
        <input type="hidden" name="customerid" value="<?php echo $customerid?>">
        <input type="hidden" name="sdorderno" value="<?php echo $sdorderno?>">
        <input type="hidden" name="total_fee" value="<?php echo $total_fee?>">
        <input type="hidden" name="paytype" value="<?php echo $paytype?>">
        <input type="hidden" name="notifyurl" value="<?php echo $notifyurl?>">
        <input type="hidden" name="returnurl" value="<?php echo $returnurl?>">
        <input type="hidden" name="remark" value="<?php echo $remark?>">
        <input type="hidden" name="bankcode" value="<?php echo $bankcode?>">
        <input type="hidden" name="sign" value="<?php echo $sign?>">
        <input type="hidden" name="get_code" value="<?php echo $get_code?>">
    </form>
</body>
</html>
