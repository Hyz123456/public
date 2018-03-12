<?php 
header("Content-type: text/html; charset=utf-8");
if(!isset($_SESSION)){ session_start();}
$target = $_REQUEST['target'];
if(strlen($target) != 2){
	echo "0.00";exit;
}
$uid = intval(@$_SESSION['uid']);
$username = @$_SESSION["username"];
if(!$username){
	echo "<script>alert('请登录后再试！');window.close();</script>";exit;
}

include_once("config.php");

$sign = md5($plantform."_".$merID."_".$key."_".$username);

$url = $fenjieHost."/$target!balance.do?target=".$target."&plantform=".$plantform."&username=".$username."&password=".$password."&sign=".$sign;

$yy = curl_file_get_contents($url);

$json = json_decode($yy);

echo $json->value;

?>