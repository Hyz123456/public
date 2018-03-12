<?php
header("Content-Type: text/html;charset=utf-8");
require_once("conn.php");

$orderid = $_GET["orderid"];
$opstate = $_GET["opstate"];
$ovalue = $_GET["ovalue"];
$sign = $_GET["sign"];
$attach=$_GET["attach"];
$signu = md5("orderid=".$orderid."&opstate=".$opstate."&ovalue=".$ovalue.$userkey);

if($signu == $sign)
{
	if($opstate=='0' && $parter =='11269') {
      $url="ok.php";
    header("Location:".$url);  
	}      


}else{
	echo 'opstate=1';
	echo "您已充值，请勿反复刷新";
	exit;
}

?>
