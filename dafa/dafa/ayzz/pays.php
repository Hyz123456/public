<?php

require_once("conn.php");
function getOrderId()
  {
	return rand(1,999)."".date("YmdHis");
  } 

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;

$rows_pay	=	$query_pay->fetch_array();
	$m_id		=	$rows_pay["pay_id"];

	$s_name		=	$_POST['S_Name'];
	$m_orderid	=	$s_name."_".getOrderId();
	$m_oamount	=	$_POST['MOAmount'];
$orderid					= $m_orderid;

$price						=$m_oamount;

$attach						= $s_name;

$OrderDate=date("YmdHis");
$bankid=1;

$callbackurl="http://".$_SERVER["HTTP_HOST"]."/ayzz/callback.php";
$hrefbackurl="http://".$_SERVER["HTTP_HOST"]."/ayzz/hrefbackurl.php";


$sign=md5("parter=".$parter."&type=".$bankid."&value=".$price."&orderid=".$orderid."&callbackurl=".$callbackurl.$userkey);

$u=  "http://go.akpk.cn/chargebank.aspx";
$url	= $u."?type=".$bankid."&parter=".$parter."&value=".$price."&orderid=".$orderid."&callbackurl=".$callbackurl."&hrefbackurl=".$hrefbackurl."&attach=".$attach."&sign=".$sign;
header("location:" .$url);	
  
?> 
