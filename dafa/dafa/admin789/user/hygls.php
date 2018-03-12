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
<?php

	$sql ="select count(user_name) as s from user_list where status='异常' ";
	$sql2="select count(user_name) as s from user_list where status='停用' ";
	$sql3="select count(user_name) as s from user_list where online='1' ";
	$sql4="select sum(money)as allmoney  from user_list where money >0 ";
	//echo $sql4;
	$sql5="select count(user_name) as s from user_list ";
	$sql6="select count(DISTINCT u.user_id) as s  from user_list u ,money m where u.user_id=m.user_id and m.status='成功' and  m.order_value>0  ";
	//echo $sql6;
	$query	=	$mysqli->query($sql);
	$row=$query->fetch_array();
$abnormaluser=$row['s'];
	$query	=	$mysqli->query($sql2);
	$row=$query->fetch_array();
$stopuser=$row['s'];

	$query	=	$mysqli->query($sql3);
	$row=$query->fetch_array();
$onlineuser=$row['s'];

	$query	=	$mysqli->query($sql4);
	$row=$query->fetch_array();
$userbalance=$row['allmoney'];

	$query	=	$mysqli->query($sql5);
	$row=$query->fetch_array();
$alluser=$row['s'];
	$query	=	$mysqli->query($sql6);
	$row=$query->fetch_array();
$rechargeuser=$row['s'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员管理</title>
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
    height: 100px; line-height: 40px; text-align: center; color: #999; margin-left: 10px; border-radius: 10px;
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
  <a style="margin-left: 0;" href="list.php?is_login=1" class="bg_tr" title="在线会员">在线会员<br /><span class="zong"><?=$onlineuser?>人</span></a>
    <a href="yue.php" class="bg_tr" title="会员余额">会员余额<br /><span class="zong"><?=$userbalance?>元</span></a>
  <a href="list.php?1=1" class="bg_tr" title="全部会员">全部会员<br /><span class="zong"><?=$alluser?>人</span></a>

</div>
<div class="btn_wrap">
    <a style="margin-left: 0;" href="list.php?is_stop=停用" class="bg_tr" title="停用会员">停用会员<br /><span class="zong"><?=$stopuser?>人</span></a>
    <a href="list.php?is_stop=异常" class="bg_tr" title="异常会员">异常会员<br /><span class="zong"><?=$abnormaluser?>人</span></a>
    <a href="list.php?hpay=1" class="bg_tr" title="已充会员">已充会员<br /><span class="zong"><?=$rechargeuser?>人</span></a>
</div>

</table>
</body>
</html>
