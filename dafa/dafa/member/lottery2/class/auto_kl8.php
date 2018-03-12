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
$sql	=	"SELECT * FROM lottery_result_bjkn WHERE ball_20 is not null order by id desc limit 0,1";
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
    $hm[]		= $rs['ball_11'];
    $hm[]		= $rs['ball_12'];
    $hm[]		= $rs['ball_13'];
    $hm[]		= $rs['ball_14'];
    $hm[]		= $rs['ball_15'];
    $hm[]		= $rs['ball_16'];
    $hm[]		= $rs['ball_17'];
    $hm[]		= $rs['ball_18'];
    $hm[]		= $rs['ball_19'];
    $hm[]		= $rs['ball_20'];
    $hms[]		= Kl8_Auto_zh($hm,1);
    $hms[]		= Kl8_Auto_zh($hm,2);
    $hms[]		= Kl8_Auto_zh($hm,3);
    $hms[]		= Kl8_Auto_zh($hm,4);
    $hms[]		= Kl8_Auto_zh($hm,5);
    $hmlist[$rs['qishu']][]	= $rs['ball_1'].','.$rs['ball_2'].','.$rs['ball_3'].','.$rs['ball_4'].','.$rs['ball_5'].','.$rs['ball_6'].','.$rs['ball_7'].','.$rs['ball_8'].','.$rs['ball_9'].','.$rs['ball_10'].','.$rs['ball_11'].','.$rs['ball_12'].','.$rs['ball_13'].','.$rs['ball_14'].','.$rs['ball_15'].','.$rs['ball_16'].','.$rs['ball_17'].','.$rs['ball_18'].','.$rs['ball_19'].','.$rs['ball_20'];
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