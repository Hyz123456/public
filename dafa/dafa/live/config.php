<?php 
$merID = "332886";//ID
$key = "9R6_3A8GXFJET#K8";//密匙
$plantform = "H3";//前缀
$password = "a123456"; //默认密码,不要乱改

$fenjieHost = "http://mgr.jk888.org";

$callback = "http://889.ag/live/callback.php";
$isAG = true;
$isBB = true;


function curl_file_get_contents($durl){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $durl);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$r = curl_exec($ch);
	curl_close($ch);
	return $r;
}
?>