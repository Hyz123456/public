<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include_once($C_Patch."../app/member/cache/website.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$web_site["web_name"]?> - 代理中心</title>
<link href="images/login.css" rel="stylesheet" type="text/css" />
<link href="/cl/css/reset.css" rel="stylesheet" type="text/css" />
<style>
body{text-align:center;background-color:#eaeaea;padding:0;margin:0;font-size:12px}
</style>
</head>

<body>
<div class="wrapCss">
    <div class="bg001_ag">
    </div>
    <div class="bg002_ag">
    <div class="div_warp">
        <form action="http://ag.1428m.com/index.php/login/login_do" onsubmit="return inputCheck();" name="NETSJ_Login" method="post">
        <table class="tab_002">
        <tbody>
            <tr>
                <td class="td_001">&nbsp;</td>
                <td class="td_002" colspan="2"><input class="username" name="A"  size="8"  type="text"   style="width:200px;height:20px;" required value="" autocomplete="off"/></td>
            </tr>
            <tr>
                <td class="td_001">&nbsp;</td>
                <td class="td_002" colspan="2"><input class="password" name="B" type="password" required  style="width:200px;height:20px;" value="" autocomplete="off"/></td>
            </tr>

            <tr style="">
                <td class="td_001">&nbsp;</td>
                <td class="td_002" colspan="2"><input name="C" type="text" size="4" maxlength="4" required style="width:200px;height:20px;" value="" autocomplete="off"></td>
                <td><img src="yzm.php"   width="50" height="20" id="yzm" name="yzm" class="imgyzm" align="absmiddle"  style="position:relative; left:-53px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="paddin./yzm.phpg-left:60px">
                    <input id="Forms Button1" type="submit" value="" class="login" align="middle" name="Submit">
                </td>
            </tr>
        </tbody>
        </table>

      </form></div>
    </div>
    <div class="bg005_ag">
    </div>
</div>
<div class="copyright" style="text-align:center;font-size: 12px;">
© Copyright by PKBet System Corporation.
</div>







<!-- 

<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
        </ul>
		<img src="/agent/images/logo.png" href="javascript:void(0);">
        <a class="brand"></a><br><span class="second">　　　 <?=$web_site["web_name"]?>代理中心 </a></span><small>Logins<br></small></a>
    </div>
</div>
<div id="wrap">
    <div id="content-wrap">
    	<div class="space"> </div>
   	    <form action="agent_L.php" method="post"><div class="content">
        <div class="clear section">
          <input class="username" name="A" type="text" required />
        </div>
		    <div class="clear section">
          <input class="password" name="B" type="password" required />
        </div>
        <div class="clear" style="overflow: hidden; border-radius: 5px; margin-bottom: 10px;">
          <input name="C" type="text" size="4" maxlength="4" required style="height: 40px; width: 175px; float:left; text-indent: 1em;" />
          <img id='yzm' src="yzm.php" class="imgyzm" border="0" style="float:right;" />
          </div>
        <div class="btn clear">
          <p class="subBox">
            登录
            <input name="" type="submit" class="login-btn" value="登录" />
          </p>
          <a href="right.php" target="_blank"><p class="ie_box"/>
		  

          </p>
        </div>

      </div></a></form>
    </div>
    <div class="footer"></div>

</div>
 -->
</body>
</html>
