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
<title>危险手机号码</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">

body {
  margin: 0px 30px;
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
  <a style="margin-left: 0;" href="./mobileip.php" class="bg_tr" title="会员监控"><span class="zong">(总)</span><br />会员监控</a>
  <a href="javascript:;" class="bg_tr" title="套利监控"><span  class="zong">(总)</span><br />套利监控</a>
  <a href="yinkui.php" class="bg_tr" title="盈收监控"><span class="zong">(月)</span><br />盈亏监控</a>
</div>

<div class="smallBtn">
  <a href="./mobileip.php" class="bg_tr">会员ip监控</a> 
  <a href="./mobile.php" class="bg_tr">会员手机监控</a>
</div>

<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
    <td><strong>手机号码</strong></td>
    <td><strong>会员个数</strong></td>
  </tr>
<?php
$sql	=	"SELECT DISTINCT count(id) AS s,tel FROM user_list where tel!='' GROUP BY tel";
$query	=	$mysqli->query($sql);

while($row = $query->fetch_array()){
	if($row['s'] > 1){
?>
  <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
    <td align="center"><a href="list.php?selecttype=tel&likevalue=<?=$row['tel']?>"><?=$row['tel']?></a></td>
    <td align="center"><?=$row['s']?></td>
  </tr>
<?php
	}
}
?>
</table>
</body>
</html>
