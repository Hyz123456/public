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
$_GET["game"] = "GD11";
$gType = "GD11";
include_once($C_Patch."/pt/mem/ajax/source.php");
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row[strtolower($gType)."_lower_bet"];
$maxMoney = $row[strtolower($gType)."_max_bet"];
//开始读取赔率
$sql		= "select * from odds_lottery
            where lottery_type='广东十一选五' and sub_type in('正码和特别号','总和龙虎和','顺子杂六')
            order by id asc";
$query		= $mysqli->query($sql);
$list 		= array();
$s 			= 1;
while ($odds = $query->fetch_array()) {
	for($i = 1; $i<16; $i++){
        $list['ball'][$s][$i] = $odds['h'.$i];
    }
	$s++;
}
//开始读取期数
$arr = array(
    'number' => $qishu,
	'endtime' => $fengpanTime-strtotime($bj_time_now),
	'opentime' => $kaijiangTime-strtotime($bj_time_now),
	'isopen' => ($fengpanTime-strtotime($bj_time_now))>-5,
	'oddslist' => $list,
	'min_money' => $lowestMoney,
	'max_money' => $maxMoney,
);
$json_string = json_encode($arr);
echo $json_string;
$mysqli->close();