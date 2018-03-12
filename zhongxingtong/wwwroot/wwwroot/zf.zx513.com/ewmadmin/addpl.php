<?php
header('Content-Type:text/html;charset=utf-8');
include_once 'inc/conn.php';

$appid	=	$_POST['appid'];
$zhifu	=	$_POST['zhifu'];
$erweima=	$_POST['erweima'];

if ($appid=="" || $zhifu=="" || $erweima==""){

	echo "缺少参数";
	exit;
}

//分割回车
$erfen = explode("\r\n",$erweima); 
$i="0";
foreach ($erfen as $url){ 


		$data	=	explode(",",$url); 

		$code	=	$data[1];		//二维码地址
		$amount	=	$data[0];		//实际支付金额
		$amt	=	floor($amount);	//数组金额
		


		//	检测金额数组是否存在

		$sql	= "SELECT * FROM `ewmzu` WHERE `money`=".$amt;
		$urlhistory = mysql_fetch_assoc(mysql_query($sql));

		if ($urlhistory){
			
		}else{

			$sql	= "INSERT INTO `ewmzu` (zuname,money,appid) VALUES ('充值".$amt."元',$amt,$appid)";
			mysql_query($sql);
		}


		$sql	= "SELECT * FROM `ewmzu` WHERE `money`=".$amt;
		$fenzu = mysql_fetch_assoc(mysql_query($sql));

	
		$fenzuid=$fenzu['id'];

		
		//	检测金额二维码是否存在
	

		$sql	= "SELECT * FROM ewmszb WHERE pay='$zhifu' and name='$amount' and cny='".$amt.".00'";
		
		$jiance = mysql_fetch_assoc(mysql_query($sql));


		if ($jiance){
			//print_r($urlhistory);
		}else{

			$i=$i+1;
			$shijian	=	time();

			$sql	= "INSERT INTO ewmszb (pay,name,cny,appid,picurl,ewmurl,fenzuid,timm) VALUES ('$zhifu','$amount','".$amt.".00','$appid','$code','$code','$fenzuid','$shijian')";

			mysql_query($sql);
		}


} 
echo "成功添加".$i."条数据";
?>