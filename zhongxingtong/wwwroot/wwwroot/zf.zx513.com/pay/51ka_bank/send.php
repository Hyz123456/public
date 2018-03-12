<?php
require 'inc.php';

$customerid=$userid;
$superid='100000';
$sdcustomno=$_GET['orderid'];
$ordermoney=$_GET['price'];
$faceno=getBankCode($_GET['bankcode']);
$cardno='04';
$noticeurl='http://'.$_SERVER['HTTP_HOST'].'/pay/51ka_bank/receive_51ka.php';
$backurl='http://'.$_SERVER['HTTP_HOST'].'/pay/51ka_bank/return_51ka.php';
$remarks=$_GET['remark'];
$mark='';
$endip=$_SERVER['REMOTE_ADDR'];
$endcustomer=$sdcustomno;


$sign=strtoupper(md5('customerid='.$customerid.'&sdcustomno='.$sdcustomno.'&ordermoney='.$ordermoney.'&cardno='.$cardno.'&faceno='.$faceno.'&noticeurl='.$noticeurl.'&endcustomer='.$endcustomer.'&endip='.$endip.'&remarks='.$remarks.'&mark='.$mark.'&key='.$userkey));

$PostUrl='http://www.51card.cn/gateway/hfbcardpay.asp';
?>
<html>
<head>
<title>pay to bank</title>
</head>
<body onload="document.pay.submit()">
<form name="pay" action="<?php echo $PostUrl; ?>" method="post">
<input type="hidden" name="superid" value="<?php echo $superid; ?>">
<input type="hidden" name="customerid" value="<?php echo $customerid; ?>">
<input type="hidden" name="sdcustomno" value="<?php echo $sdcustomno; ?>">
<input type="hidden" name="ordermoney" value="<?php echo $ordermoney; ?>">
<input type="hidden" name="faceno" value="<?php echo $faceno; ?>">
<input type="hidden" name="cardno" value="<?php echo $cardno; ?>">
<input type="hidden" name="noticeurl" value="<?php echo $noticeurl; ?>">
<input type="hidden" name="backurl" value="<?php echo $backurl; ?>">
<input type="hidden" name="remarks" value="<?php echo $remarks; ?>">
<input type="hidden" name="mark" value="<?php echo $mark; ?>">
<input type="hidden" name="endip" value="<?php echo $endip; ?>">
<input type="hidden" name="endcustomer" value="<?php echo $endcustomer; ?>">
<input type="hidden" name="sign" value="<?php echo $sign; ?>">
</form>
</body>
</html>
