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
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/user_group.php");
$is_just_data = "true";
$_GET["game"] = "BJPK";
$gType = "BJPK";
include_once($C_Patch."/pt/mem/ajax/source.php");
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row[strtolower($gType)."_lower_bet"];
$maxMoney = $row[strtolower($gType)."_max_bet"];
//开始读取赔率
$sql_sub		= "select * from odds_lottery
            where lottery_type='北京PK拾' and sub_type='主盘势' order by id asc";
$query_sub 		=	$mysqli->query($sql_sub);
$s 			= 1;
while ($odds_sub = $query_sub->fetch_array()) {
    $rs_sub[$s] = $odds_sub;
    $s++;
}
$sql		= "select * from odds_lottery
            where lottery_type='北京PK拾' and sub_type in('定位','冠亚军和-快速') order by id asc";
$query		= $mysqli->query($sql);
$list 		= array();
$s 			= 1;
while ($odds = $query->fetch_array()) {
	for($i = 1; $i<22; $i++){
        $list['ball'][$s][$i] = $odds['h'.$i];
    }
    if($s<11){
        $list['ball'][$s][11] = $rs_sub[$s]['h1'];
        $list['ball'][$s][12] = $rs_sub[$s]['h2'];
        $list['ball'][$s][13] = $rs_sub[$s]['h3'];
        $list['ball'][$s][14] = $rs_sub[$s]['h4'];
        $list['ball'][$s][15] = $rs_sub[$s]['h5'];
        $list['ball'][$s][16] = $rs_sub[$s]['h6'];
    }
	$s++;
}
//开始读取期数
$arr = array(
    'number' => $qishu,
	'endtime' => $fengpanTime-strtotime($bj_time_now),
	'opentime' => $kaijiangTime-strtotime($bj_time_now),
	'isopen' => ($fengpanTime-strtotime($bj_time_now))>-10,
	'oddslist' => $list,
	'min_money' => $lowestMoney,
	'max_money' => $maxMoney,
);
$json_string = json_encode($arr);
echo $json_string;
$mysqli->close();