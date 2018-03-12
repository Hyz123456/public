<?php
$userkey='01f9bef837833f98ed41f97d611a81bbc5d03e3e';
$version=$_POST['version'];
$customerid=$_POST['customerid'];
$sdorderno=$_POST['sdorderno'];
$total_fee=$_POST['total_fee'];
$paytype=$_POST['paytype'];
$cardvalue=$_POST['cardvalue'];
$cardnum=$_POST['cardnum'];
$cardpwd=$_POST['cardpwd'];
$notifyurl=$_POST['notifyurl'];
$remark=$_POST['remark'];

$sign=md5('version='.$version.'&customerid='.$customerid.'&total_fee='.$total_fee.'&sdorderno='.$sdorderno.'&notifyurl='.$notifyurl.'&paytype='.$paytype.'&cardvalue='.$cardvalue.'&cardnum='.$cardnum.'&cardpwd='.$cardpwd.'&'.$userkey);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>提交充值卡</title>
</head>
<body onload="document.pay.submit()">
    <form name="pay" action="/apisubmitcard" method="post">
        <input type="hidden" name="version" value="<?php echo $version?>">
        <input type="hidden" name="customerid" value="<?php echo $customerid?>">
        <input type="hidden" name="sdorderno" value="<?php echo $sdorderno?>">
        <input type="hidden" name="total_fee" value="<?php echo $total_fee?>">
        <input type="hidden" name="paytype" value="<?php echo $paytype?>">
        <input type="hidden" name="notifyurl" value="<?php echo $notifyurl?>">
        <input type="hidden" name="cardvalue" value="<?php echo $cardvalue?>">
        <input type="hidden" name="remark" value="<?php echo $remark?>">
        <input type="hidden" name="cardnum" value="<?php echo $cardnum?>">
        <input type="hidden" name="cardpwd" value="<?php echo $cardpwd?>">
        <input type="hidden" name="sign" value="<?php echo $sign?>">
    </form>
</body>
</html>
