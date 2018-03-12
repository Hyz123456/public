<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/user_group.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看会员信息");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>风控中心</title>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">


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

.contents>p{
  width: 33%;
}
</STYLE>
</head>
<body>
<div class="btn_wrap">
  <a style="margin-left: 0;" href="./mobileip.php" class="bg_tr" title="会员监控"><span class="zong">(总)</span><br />会员监控</a>
  <a href="javascript:;" class="bg_tr" title="套利监控"><span  class="zong">(总)</span><br />套利监控</a>
  <a href="yinkui.php" class="bg_tr" title="盈收监控"><span class="zong">(月)</span><br />盈亏监控</a>
</div>
<?php
	$sql="select sum(order_value) as m from money where status='成功' and type in('在线支付','银行汇款')";
	$query=$mysqli->query($sql);
	$income=$query->fetch_array();
	$sql="select sum(order_value) as m from money where status='成功' and type ='用户提款'";
	$query=$mysqli->query($sql);
	$pay=$query->fetch_array();
	$sql="select sum(sxf) as m from money where status='成功'";
	$query=$mysqli->query($sql);
	$sxf=$query->fetch_array();
	$start=date('Y-m-01 H:i:s', strtotime(date("Y-m-d")));
	$taday=date('Y-m-d H:i:s');
	$sql="select sum(order_value) as m from money where status='成功' and type in('在线支付','银行汇款') and update_time between '".$start."' and '".$taday."'";
	$query=$mysqli->query($sql);
	$income2=$query->fetch_array();
	$sql="select sum(order_value) as m from money where status='成功' and type ='用户提款' and update_time between '".$start."' and '".$taday."'";
	$query=$mysqli->query($sql);
	$pay2=$query->fetch_array();
	$sql="select sum(sxf) as m from money where status='成功' and update_time between '".$start."' and '".$taday."'";
	$query=$mysqli->query($sql);
	$sxf2=$query->fetch_array();
?>
<div class="section">
      <div class="head" style="margin-left:6px;">
        <span>总盈利统计</span>
        <!-- <a href="fund/maifen.php" class="maifenz">在线买分</a> -->
      </div>

      <div class="contents">
                            <p>
            <span id="ag_money" style="background: none;">￥<?=$income['m']+0?></span>
              <br>收入总额
            </p> 

            <p>
           <span id="bb_money" style="background: none;">￥<?=0-$pay['m']+$sxf['m']?></span> 
             <br> 支出总额
            </p>

            <p>
           <span id="mg_money" style="background: none;">￥<?=$income['m']+$pay['m']-$sxf['m']+0?></span>
           <br> 盈利总额
            </p>
      </div>
  </div>
  <div class="section">
      <div class="head" style="margin-left:6px;">
        <span>月盈利统计</span>
        <!-- <a href="fund/maifen.php" class="maifenz">在线买分</a> -->
      </div>

      <div class="contents">
                            <p>
            <span id="ag_money" style="background: none;">￥<?=$income2['m']+0?></span>
              <br>月收入总额
            </p> 

            <p>
           <span id="bb_money" style="background: none;">￥<?=0-$pay2['m']+$sxf2['m']?></span> 
             <br> 月支出总额
            </p>

            <p>
           <span id="mg_money" style="background: none;">￥<?=$income2['m']+$pay2['m']-$sxf2['m']+0?></span>
           <br> 月盈利总额
            </p>
      </div>
  </div>


</body>
</html>
