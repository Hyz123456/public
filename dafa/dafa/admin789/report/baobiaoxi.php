<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/report_sport.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/six_lottery_order.php");
include_once($C_Patch."/app/member/class/report_live.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");


check_quanxian("查看报表");

$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}
$user_group = $_GET["user_group"];
$user_ignore_group = $_GET["user_ignore_group"];

$date_month = $_GET['date_month'];

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>风控中心</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<link href="../images/css1/kuai.css" rel="stylesheet" type="text/css">
<style type="text/css">

body {
	margin: 0px 30px; padding-top: 80px; overflow: hidden;
}
td{font:13px/120% "宋体";padding:3px;}
a{

	color:#F37605;

	text-decoration: none;
-webkit-transition: .3s all linear;
  -moz-transition: .3s all linear;
  -o-transition: .3s all linear;
  transition: .3s all linear;

}
.btn_wrap{ width: 100%; overflow: hidden;  margin: 40px 0 80px; text-align: center;}
.btn_wrap a{ display: inline-block;  width: 150px;
    height: 100px; line-height: 65px; text-align: center; color: #999; margin-left: 10px; border-radius: 10px;
    padding: 0;
    padding-top:20px;
    color: #727272;
    font-size: 20px;
    margin-left: 120px;
  
}
.zong{ color: orange;}
.btn_wrap a:hover, .smallBtn a:hover{ color: orange; }
.smallBtn{ width: 100%; overflow: hidden; margin-bottom: 5px; }
.smallBtn a{ padding: 0 15px;  float: left; margin-right: 10px; line-height: 2em; }
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
<body>
<div class="btn_wrap">
  <a style="margin-left: 0;" href="./all_game_index.php" class="bg_tr" title="总报表">总报表</a>
  <a href="./live_history.php" class="bg_tr" title="真人报表">真人报表</a>
  <a href="../agents/report.php" class="bg_tr" title="代理报表">代理报表</a>
  <!-- <a href="./all_game_money.php" class="bg_tr" title="当日下注额">下注额报表</a> -->
</div>
<div class="btn_wrap">
    <a style="margin-left: 0;" href="./lottery_history.php?s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>" class="bg_tr" title="彩票报表">彩票报表</a>
    <a href="./sport_history.php?s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>" class="bg_tr" title="体育报表">体育报表</a>
    <a href="./six_lottery_history.php?s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;user_group=<?=$user_group?>&amp;user_ignore_group=<?=$user_ignore_group?>&amp;date_month=<?=$date_month?>" class="bg_tr" title="六合彩报表">六合彩报表</a>
</div>

</table>
</body>
</html>
