<?php

error_reporting(0);
include_once 'safemode.php';
require_once "config.php";

$tradeNo=$_POST['tradeNo'];
$payAmount=$_POST['payAmount'];
$appid=$_POST['APPID'];
$pay=$_POST['paytype'];
$beizhu=$_POST['beizhu'];
$tim = time();

$query = mysql_query("select * from `ewmddh` where `appid`='$appid' and dingdanok=1 and name='$beizhu' and uid='$tradeNo' and pay='$pay' and timm>'$tim'");
$row = mysql_fetch_assoc($query);
$statu=$row['dingdanok'];

if ($statu==1){
ob_clean();
echo "success";
}
?>