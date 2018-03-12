<?php
if(!isset($_SESSION)){ session_start();}
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "./include/address.mem.php";
include "./include/config.inc.php";

if(@$_POST["action"]=="login"){
	$yzm	=	strtolower($_POST["vnumber"]);
	if($yzm!=	$_SESSION["randcode"]){
		echo '1'; //验证码错误
		exit;
	}
	$_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码

	include_once("./class/user.php");
    $uid	=	user::login($_POST["username"],$_POST["password"]);
	$mysqli->close();
	
    if(!$uid){
		echo '2'; //用户名称或密码错误
		exit;
	}
	echo '5'; //成功
	exit;
	
}
//echo '1'; //验证码错误
//exit;

?>