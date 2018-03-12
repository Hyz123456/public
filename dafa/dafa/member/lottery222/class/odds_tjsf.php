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
$_GET["game"] = "TJSF";
$gType = "TJSF";
include_once($C_Patch."/pt/mem/ajax/source.php");
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row[strtolower($gType)."_lower_bet"];
$maxMoney = $row[strtolower($gType)."_max_bet"];
//开始读取赔率
$sql_sub		= "select * from odds_lottery
            where lottery_type='天津十分彩' and sub_type='方位中发白' order by id asc";
$query_sub 		=	$mysqli->query($sql_sub);
$s 			= 1;
while ($odds_sub = $query_sub->fetch_array()) {
    $rs_sub[$s] = $odds_sub;
    $s++;
}
$sql		= "select * from odds_lottery
            where lottery_type='天津十分彩' and (sub_type='正码和特别号' or sub_type='总和龙虎') order by id asc";
$query		= $mysqli->query($sql);
$s 			= 1;
$list 		= array();
while ($odds = $query->fetch_array()) {
    for($i = 1; $i<25; $i++){
        $list['ball'][$s][$i] = $odds['h'.$i];
    }
    $list['ball'][$s][25] = $odds['h27'];
    $list['ball'][$s][26] = $odds['h28'];
    $list['ball'][$s][27] = $odds['h25'];
    $list['ball'][$s][28] = $odds['h26'];
    $list['ball'][$s][29] = $rs_sub[$s]['h1'];
    $list['ball'][$s][30] = $rs_sub[$s]['h2'];
    $list['ball'][$s][31] = $rs_sub[$s]['h3'];
    $list['ball'][$s][32] = $rs_sub[$s]['h4'];
    $list['ball'][$s][33] = $rs_sub[$s]['h5'];
    $list['ball'][$s][34] = $rs_sub[$s]['h6'];
    $list['ball'][$s][35] = $rs_sub[$s]['h7'];
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