<?php
include_once("../mysqli.php");
function getData($code){
	global $qishu;
    global $hm;
	global $time;
	$api = 'http://127.0.0.1/cj/index.php?code='.$code;
	$resource = file_get_contents( $api );  
	$data = json_decode( $resource , 1 );
	$qishu = $data['data']['preDrawIssue'];
	$hm = $data['data']['preDrawCode'];
	$time = $data['data']['preDrawTime'];
}
?>