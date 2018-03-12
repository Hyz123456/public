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
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/include/newpage.php");
include_once("../class/admin.php");


$sqlsys	=	"select * from sys_config limit 0,1";
$query	=	$mysqli->query($sqlsys);
$sysrows	=	$query->fetch_array();
?>
<HTML><?php 
$lj="http://".$sysrows['conf_www']."/?intr=".intval($_GET["id"]);

?>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gbk" />
<TITLE></TITLE>
<link rel="stylesheet" href="images/CssAdmin.css">
<link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all">
<style type="text/css">
<STYLE>
BODY {
SCROLLBAR-FACE-COLOR: rgb(255,204,0);
 SCROLLBAR-3DLIGHT-COLOR: rgb(255,207,116);
 SCROLLBAR-DARKSHADOW-COLOR: rgb(255,227,163);
 SCROLLBAR-BASE-COLOR: rgb(255,217,93)
}
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}
td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>



<body>
<table width="100%" border="0" bgcolor="#FFFFFF"" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
  <tr>
    <td  height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">代理链接</span></font></td>
  </tr>
    <tr>
	 <td>
	    您的代理链接为:<a name="biao" style="color:red;font-size:20px;line-height:20px;" target="_blank" href="<?php echo $lj;  ?>"><?php echo $lj;  ?></a>
		<input  style="color:red;font-size:20px;line-height:20px;" type="button" onClick="copyUrl2()" value="复制" />
	 </td> 
	   
	</tr>
	 
</table>
<script type="text/javascript">
function copyUrl2()
{var $aa= document.getElementsByTagName("a")[0];
  $aain=$aa.innerHTML;

var Url2=document.getElementById("biao1");
   Url2.innerHTML=$aain;
Url2.select(); // 选择对象
document.execCommand("Copy"); // 执行浏览器复制命令
alert("复制成功。");
}
  
   
    
      
</script>
<div style="height:1px;overflow:hidden;">
<textarea style="filter:alpha(opacity=0); 
-moz-opacity:0; 
opacity:0;border:none;line-height:50px;" name="text" cols="20" rows="10" id="biao1"></textarea>

</div>


</body>

</html>
