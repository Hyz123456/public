<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>代理详细信息展示</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}

td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
.t-title{height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">代理中心：编辑代理信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
if($_GET["id"]){
    $sql	=	"select * from agents_list where id=".intval($_GET["id"])." limit 0,1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
}
?>
<form action="./agent_update.php" method="post">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#CCC" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;"  >
  <tr>
    <td bgcolor="#FFFFFF">代理帐号</td>
    <td><?=$rows["agents_name"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">真实姓名</td>
    <td><?=$rows["agentsname"]?></td>
  </tr><tr>
    <td bgcolor="#FFFFFF">代理账户余额</td>
    <td><?=$rows["money"]?></td>
  </tr><tr>
    <td bgcolor="#FFFFFF">银行帐号</td>
    <td><input name="bank" value="<?=$rows["bank"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">开户行</td>
    <td><input name="agents_add" value="<?=$rows["agents_add"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">取款密码</td>
    <td><?=$rows["qk_pass_naked"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">密码</td>
    <td><?=$rows["agent_pass_naked"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">生日</td>
    <td><input name="birthday" value="<?=$rows["birthday"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">手机</td>
    <td><input name="tel" value="<?=substr_replace($rows["tel"],'*****',3,5)?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">email</td>
    <td><input name="email" value="<?=$rows["email"]?>" ></td>
  </tr>
    <tr>
        <td bgcolor="#FFFFFF">QQ</td>
        <td><input name="qq" value="<?=$rows["qq"]?>" ></td>
    </tr>
	<tr>
    <td bgcolor="#FFFFFF">微信</td>
    <td><input name="othercon" value="<?=$rows["othercon"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">注册时间</td>
    <td><?=$rows["regtime"]?></td>
  </tr>
   <tr>
    <td bgcolor="#FFFFFF">最后登录时间</td>
    <td><?=$rows["logintime"]?></td>
  </tr>
   <tr>
    <td bgcolor="#FFFFFF">最后登录IP</td>
    <td><?=$rows["loginip"]?></td>
  </tr>
   <tr>
    <td bgcolor="#FFFFFF">总登录次数</td>
    <td><?=$rows["lognum"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">备注：</td>
    <td><textarea name="remark" cols="80" rows="5" id="remark"><?=$rows["remark"]?></textarea></td>
  </tr>

  <tr>
  	<td colspan="2" align="center">
        <input name="id" type="hidden" value="<?=$_GET["id"]?>">
        <input type="submit" value="确认提交"> 　
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)">
    </td>
  </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>