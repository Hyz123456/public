<?php
$userkey='7897062fc648ca140512b0c7bf66ff67009e1e86';
$version=$_POST['version'];
$customerid=$_POST['customerid'];
$sdorderno=$_POST['sdorderno'];
$total_fee=$_POST['total_fee'];
$notifyurl=$_POST['notifyurl'];
$returnurl=$_POST['returnurl'];
$remark=$_POST['remark'];

$sign=md5('version='.$version.'&customerid='.$customerid.'&total_fee='.$total_fee.'&sdorderno='.$sdorderno.'&notifyurl='.$notifyurl.'&returnurl='.$returnurl.'&'.$userkey);
var_dump($sign);
var_dump('version='.$version.'&customerid='.$customerid.'&total_fee='.$total_fee.'&sdorderno='.$sdorderno.'&notifyurl='.$notifyurl.'&returnurl='.$returnurl.'&'.$userkey);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>正在转到付款页</title>
</head>
<body onload="document.pay.submit()">

    <form name="pay" action="/checkout" method="post">
        <input type="hidden" name="version" value="<?php echo $version?>">
        <input type="hidden" name="customerid" value="<?php echo $customerid?>">
        <input type="hidden" name="sdorderno" value="<?php echo $sdorderno?>">
        <input type="hidden" name="total_fee" value="<?php echo $total_fee?>">
        <input type="hidden" name="notifyurl" value="<?php echo $notifyurl?>">
        <input type="hidden" name="returnurl" value="<?php echo $returnurl?>">
        <input type="hidden" name="remark" value="<?php echo $remark?>">
        <input type="hidden" name="sign" value="<?php echo $sign?>">
    </form>
</body>
</html>
