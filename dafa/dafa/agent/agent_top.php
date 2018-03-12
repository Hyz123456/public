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


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<link href="images/css1/top_css.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" language="javascript" src="/js/jquery-1.7.1.js"></script>
<script type="text/javascript" language="javascript" src="/pt/assets/js/lib/sound.js"></script>
<body bgcolor="#343434">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="244" align="center">
        <a class="brand">
          <span class="second">admin v<i style="font-style:normal;font-size:85%;">4.0</i></span>
          <small>Data center</small>
        </a>
    </td>
    <td align="center">

    <table height="26" border="0" align="left" cellpadding="0" cellspacing="0" class="subbg" NAME=t1>
      <tbody>
        <tr align="middle">
          <td width="71" height="26" align="center" valign="middle" >
              <a href="agents_user/agent_child_list.php?id=<?=$_SESSION["agent_id"]?>" target="main" class="STYLE2">下属会员</a>
          </td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
          <td width="71" align="center" valign="middle" >
              <a href="agents_user/report.php?id=<?=$_SESSION["agent_id"]?>"  target="main" class="STYLE2">代理报表</a>
          </td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
          <td width="71" align="center" valign="middle"  >
              <a   href="agents_user/account_list.php?id=<?=$_SESSION["agent_id"]?>" target="main">结算明细</a>
          </td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
            <td width="71" align="center" valign="middle"  >
                <a   href="agents_user/hccw.php?top_id=<?=$_SESSION["agent_id"]?>" target="main">存取报表</a>
            </td>
            <td align="center" class="topbar"><span class="STYLE2"> </span></td>
            <td width="71" align="center" valign="middle"  >
                <a   href="agents_user/set_pwd.php?id=<?=$_SESSION["agent_id"]?>" target="main">修改密码</a>
            </td>
			 <td width="71" align="center" valign="middle"  >
                <a   href="agents_user/lj_dl.php?id=<?=$_SESSION["agent_id"]?>" target="main">代理连接</a>
            </td>
			<td width="71" align="center" valign="middle">
                <a   href="agents_user/agent_detail.php?id=<?=$_SESSION["agent_id"]?>" target="main">代理中心</a>
            </td>
            <td align="center" class="topbar"><span class="STYLE2"> </span></td>
			<td width="71" align="center" valign="middle" >
                <a   href="zjgl.php?id=<?=$_SESSION['agent_id']?>" target="main">资金管理</a>
            </td>
           <td align="center" class="topbar"><span class="STYLE2"> </span></td>
           <td>
                <div class="show" id="tisi"><marquee scrolldelay="5" scrollamount="2" id="m_xx" onMouseOver="this.stop()" onMouseOut="this.start()"></marquee></div><div id="hk_mp3"></div>
           </td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <!-- <tr height="6">
    <td bgcolor="#1F3A65"></td>
  </tr> -->
</table>
<script>
    (function(){
        $('a[target="main"]').on('click', function(){
              show();
        });
        var topWindow = window.top.document.getElementById('right_bg');
        function show(){
            var childHtml = topWindow.contentWindow.document.getElementsByTagName('html')[0];
           // $(childHtml).fadeIn(1000);
           childHtml.style.display = 'none';
        }
    })();
</script>
<script language="javascript">
//parent.frame.cols="0,*";
displayBar=false;
</script></body>
</html>
