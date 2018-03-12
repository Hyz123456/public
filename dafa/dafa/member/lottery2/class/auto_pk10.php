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
$sql	=	"SELECT * FROM lottery_result_bjpk WHERE ball_10 is not null order by id desc limit 0,1";
$query	=	$mysqli->query($sql);
$rs    =	$query->fetch_array();
if($rs){
    $qishu		= $rs['qishu'];
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];
    $hm[]		= $rs['ball_6'];
    $hm[]		= $rs['ball_7'];
    $hm[]		= $rs['ball_8'];
    $hm[]		= $rs['ball_9'];
    $hm[]		= $rs['ball_10'];
    $hms[]		= Pk10_Auto_quick($hm,1);
    $hms[]		= Pk10_Auto_quick($hm,2);
    $hms[]		= Pk10_Auto_quick($hm,3);
    $hms[]		= Pk10_Auto_quick($hm,4);
    $hms[]		= Pk10_Auto_quick($hm,5);
    $hms[]		= Pk10_Auto_quick($hm,6);
    $hms[]		= Pk10_Auto_quick($hm,7);
    $hms[]		= Pk10_Auto_quick($hm,8);
    $hmlist[$rs['qishu']][]	= BuLing($rs['ball_1']).','.BuLing($rs['ball_2']).','.BuLing($rs['ball_3']).','.BuLing($rs['ball_4']).','.BuLing($rs['ball_5']).'<br>'.BuLing($rs['ball_6']).','.BuLing($rs['ball_7']).','.BuLing($rs['ball_8']).','.BuLing($rs['ball_9']).','.BuLing($rs['ball_10']);
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