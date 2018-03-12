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
$_GET["game"] = "BJKN";
$gType = "BJKN";
include_once($C_Patch."/pt/mem/ajax/source.php");
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row[strtolower($gType)."_lower_bet"];
$maxMoney = $row[strtolower($gType)."_max_bet"];
//开始读取赔率
$sql		= "select * from odds_lottery
            where lottery_type='北京快乐8' and sub_type='选号' order by id asc";
$query		= $mysqli->query($sql);
$list 		= array();
while ($odds = $query->fetch_array()) {
    $list['ball'][1][1] = $odds['h10'];
    $list['ball'][2][1] = $odds['h9'];
    $list['ball'][3][1] = $odds['h7'];
    $list['ball'][3][2] = $odds['h8'];
    $list['ball'][4][1] = $odds['h4'];
    $list['ball'][4][2] = $odds['h5'];
    $list['ball'][4][3] = $odds['h6'];
    $list['ball'][5][1] = $odds['h1'];
    $list['ball'][5][2] = $odds['h2'];
    $list['ball'][5][3] = $odds['h3'];
}
$sql		= "select * from odds_lottery
            where lottery_type='北京快乐8' and sub_type='其他' order by id asc";
$query		= $mysqli->query($sql);
while ($odds = $query->fetch_array()) {
    $list['ball'][6][1] = $odds['h3'];
    $list['ball'][6][2] = $odds['h4'];
    $list['ball'][6][3] = $odds['h1'];
    $list['ball'][6][4] = $odds['h2'];
    $list['ball'][6][5] = $odds['h5'];
    $list['ball'][7][1] = $odds['h6'];
    $list['ball'][7][2] = $odds['h7'];
    $list['ball'][7][3] = $odds['h8'];
    $list['ball'][8][1] = $odds['h9'];
    $list['ball'][8][2] = $odds['h10'];
    $list['ball'][8][3] = $odds['h11'];
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