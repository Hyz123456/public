<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/resource/lottery/result/Js_Class.php");

//开始获取开奖号码，今日输赢
$sql	=	"SELECT * FROM lottery_result_cqsf WHERE ball_8 is not null order by id desc limit 0,1";
$query	=	$mysqli->query($sql);
$rs    =	$query->fetch_array();
if($rs){
    $qishu		= $rs['qishu'];
    $hm[]		= BuLing($rs['ball_1']);
    $hm[]		= BuLing($rs['ball_2']);
    $hm[]		= BuLing($rs['ball_3']);
    $hm[]		= BuLing($rs['ball_4']);
    $hm[]		= BuLing($rs['ball_5']);
    $hm[]		= BuLing($rs['ball_6']);
    $hm[]		= BuLing($rs['ball_7']);
    $hm[]		= BuLing($rs['ball_8']);
    $hms[]		= G10_Auto($hm,1);
    $hms[]		= G10_Auto($hm,2);
    $hms[]		= G10_Auto($hm,3);
    $hms[]		= G10_Auto($hm,4);
    $hms[]		= G10_Auto($hm,5);
    $hmlist[$rs['qishu']][]	= BuLing($rs['ball_1']).','.BuLing($rs['ball_2']).','.BuLing($rs['ball_3']).','.BuLing($rs['ball_4']).'<br>'.BuLing($rs['ball_5']).','.BuLing($rs['ball_6']).','.BuLing($rs['ball_7']).','.BuLing($rs['ball_8']);
}else{
    $qishu = "00000000";
    $hm = array();
    $hms = array();
    $hmlist = array();
}

$arr = array(
	'numbers' => $qishu, 
	'hm' => $hm, 
	'hms' => $hms, 
	'hmlist' => $hmlist, 
);
$json_string = json_encode($arr);   
echo $json_string;
$mysqli->close();