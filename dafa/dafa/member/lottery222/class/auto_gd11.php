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
$sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3,ball_4,ball_5
                    FROM lottery_result_gd11 WHERE ball_5 is not null order by id desc limit 0,1";
$query	=	$mysqli->query($sql);
$rs    =	$query->fetch_array();
if($rs){
    $qishu		= $rs['qishu'];
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];
    $hms[]		= gd11x5_Auto($hm,1);
    $hms[]		= gd11x5_Auto($hm,2);
    $hms[]		= gd11x5_Auto($hm,3);
    $hms[]		= gd11x5_Auto($hm,4);
    $hms[]		= gd11x5_Auto($hm,5);
    $hms[]		= gd11x5_Auto($hm,6);
    $hms[]		= gd11x5_Auto($hm,7);
    $hmlist[$rs['qishu']][]	= $rs['ball_1'].','.$rs['ball_2'].','.$rs['ball_3'].','.$rs['ball_4'].','.$rs['ball_5'];
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