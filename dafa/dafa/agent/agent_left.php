<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$quanxian=$_SESSION["purview"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>left</title>
<link href="images/css1/left_css.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display=\"\";");
}
else
{
eval("submenu" + sid + ".style.display=\"none\";");
}
}
</SCRIPT>
<body bgcolor="#202020">
<table width="98%" border="0" cellpadding="0" cellspacing="0">


  <tr>
    <td height="8">
	

      <TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right
      border=0>
            <TBODY>
              <TR>
                <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <TD width="20" class="icon-info"></TD>
                <TD height=25><span class=STYLEl>会员管理</span></TD>
                  </tr>
                </table></TD>
                </TR>
            </TBODY>
          </TABLE>	</td>
  </tr>
</table>
</body></html>
