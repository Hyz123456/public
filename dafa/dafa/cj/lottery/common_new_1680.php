<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("expires:0");
include_once($_SERVER['DOCUMENT_ROOT']."/include/config.php");
function getData($type,$code){
	global $qishu;
    global $hm;
	global $time;
	if($type=='ssc'){
		$api = 'http://api.api68.com/CQShiCai/getBaseCQShiCai.do?issue=&lotCode='.$code;
	}else if($type=='11x5'){
		$api = 'http://api.api68.com/ElevenFive/getElevenFiveInfo.do?issue=&lotCode='.$code;
	}else if($type=='k3'){
		$api = 'http://api.api68.com/lotteryJSFastThree/getBaseJSFastThree.do?issue=&lotCode='.$code;
	}else if($type=='pks'){
		$api = 'http://api.api68.com/pks/getLotteryPksInfo.do?issue=&lotCode='.$code;
	}else if($type=='kl8'){
		$api = 'http://api.api68.com/LuckTwenty/getBaseLuckTewnty.do?issue=&lotCode='.$code;
	}else if($type=='QuanGuoCai'){
		$api = 'http://api.api68.com/'.$type.'/getLotteryInfo1.do?issue=&lotCode='.$code;
	}else{
		$api = 'http://api.api68.com/'.$type.'/getLotteryInfo.do?issue=&lotCode='.$code;
	}
	
	$resource = file_get_contents($api); 
	$data = json_decode($resource ,1)['result']['data'];
	$qishu = $data['preDrawIssue'];
	$hm = $data['preDrawCode'];
	
	$time = $data['drawTime'];
}
?>