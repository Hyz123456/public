<?php
//加密方式：phpjm加密，代码还原率100%。
//此程序由【PHPJM.CC|PHP解密在线】http://www.phpjm.cc (VIP会员功能）在线逆向还原，QQ：1187328898 
?>
<?php  session_start();
error_reporting(0);
include_once 'inc/conn.php';
require_once('inc/safemode.php');
require_once('inc/360_safe3.php');
require_once('inc/md532.php');
if($_SESSION['ldewm2017_username']=='' ||$_SESSION['ldewm2017_token']=='')
{
	header('location:login.php');
	mysql_close();
}
$appid=trim(htmlspecialchars(addslashes($_GET['pid'])));
if(is_null($_GET['pid'])||empty($_GET['pid']))
{
	header('location:index.php');
}
?>
<?='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\r\n" . '<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' . "\r\n" . '<title>&#20998;&#32452;&#37197;&#32622;</title>' . "\r\n" . '<link rel="stylesheet" type="text/css" href="js/stylemini.css">' . "\r\n" . '<script src="js/jquery.min.js"></script>' . "\r\n" . '<script type="text/javascript" src="js/laypage.js"></script> ' . "\r\n" . '<script type="text/javascript" src="js/layer.js"></script>' . "\r\n" . '<link rel="stylesheet" href="js/layer.css" id="layui_layer_skinlayercss">' . "\r\n" . '<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>' . "\r\n" . '<link rel="stylesheet" href="js/buttons.css">' . "\r\n" . '<link rel="stylesheet" type="text/css" href="css/style.css" />' . "\r\n" . '</head>' . "\r\n\r\n" . '<body>' . "\r\n" . '<form action="zusave.php" class="registerform" id="registerform" method="post">' . "\r\n" . '<table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#EAEAEA" bgcolor="#EAEAEA">' . "\r\n" . '  <tbody><tr>' . "\r\n" . '    <td bgcolor="#FFFFFF"><div align="right">&#25152;&#23646;APP ID：</div></td>' . "\r\n" . '    <td bgcolor="#FFFFFF">' . "\r\n" . '      <label>' . "\r\n" . '      <input name="user" type="text" class="inputxt2" id="user" value="';
echo $appid;
?><?='" disabled="">' . "\r\n" . '      </label>' . "\r\n" . '      <input name="pid" type="hidden" id="pid" value="';
echo $appid;
?><?='"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr>' . "\r\n" . '    <td bgcolor="#FFFFFF"><div align="right">&#32452;&#21517;&#31216;&#65306;</div></td>' . "\r\n" . '    <td bgcolor="#FFFFFF"><label>' . "\r\n" . '<input name="name" type="text" class="inputxt2" id="name" value="" datatype="*" nullmsg="&#35831;&#22635;&#20889;&#20998;&#32452;&#21517;&#31216;"> &#20363;&#22914;&#65306;&#20805;&#20540;&#49;&#48;&#48;&#20803;' . "\r\n" . '    </label></td>' . "\r\n" . '  </tr>' . "\r\n" . '   <tr>' . "\r\n" . '    <td bgcolor="#FFFFFF"><div align="right">&#24555;&#36895;&#36755;&#20837;&#65306;</div></td>' . "\r\n" . '    <td bgcolor="#FFFFFF">' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;1&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;1&#39;;">1</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;5&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;5&#39;;">5</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;10&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;10&#39;;">10</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;20&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;20&#39;;">20</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;30&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;30&#39;;">30</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;50&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;50&#39;;">50</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;60&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;60&#39;;">60</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;80&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;80&#39;;">80</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;100&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;100&#39;;">100</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;200&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;200&#39;;">200</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;300&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;300&#39;;">300</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;500&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;500&#39;;">500</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?>

<?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;1000&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;1000&#39;;">1000</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?>

<?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;1500&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;1500&#39;;">1500</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?>

<?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;2000&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;2000&#39;;">2000</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?><?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;3000&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;3000&#39;;">3000</a>' . "\r\n" . '<a href="payfenzulist.php?pid=';
echo $appid;
?>

<?='#" onclick="document.getElementById(&#39;name&#39;).value=&#39;&#20805;&#20540;5000&#20803;&#39;;document.getElementById(&#39;money&#39;).value=&#39;5000&#39;;">5000</a>' . "\r\n" . '   </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr>' . "\r\n" . '    <td bgcolor="#FFFFFF"><div align="right">&#37329;&#39069;&#65306;</div></td>' . "\r\n" . '    <td bgcolor="#FFFFFF"><input name="money" type="text" class="inputxt" id="money" value="" datatype="n" nullmsg="&#35831;&#22635;&#20889;&#27491;&#30830;&#30340;&#37329;&#39069;" errormsg="&#37329;&#39069;&#26684;&#24335;&#38169;&#35823;"> &#21482;&#33021;&#20026;&#25972;&#25968;</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr>' . "\r\n" . '    <td colspan="2" bgcolor="#FFFFFF"><input type="submit" name="Submit" class="button button-raised button-primary button-pill" value=" &#26032;&#24314;&#37329;&#39069; "><font id="msg"></font></td>' . "\r\n" . '  </tr>' . "\r\n" . '</tbody></table>' . "\r\n" . '</form>' . "\r\n" . '<script type="text/javascript">$(function(){' . "\r\n\t" . '$(".registerform").Validform({' . "\r\n\t\t" . 'tiptype:function(msg,o,cssctl){' . "\r\n\t\t\t" . 'var objtip=$("#msg");' . "\r\n\t\t\t" . 'cssctl(objtip,o.type);' . "\r\n\t\t\t" . 'objtip.text(msg);' . "\r\n\t\t" . '},' . "\r\n\t\t" . 'ajaxPost:true,' . "\r\n\t\t" . 'callback:function(data){' . "\r\n\t\t" . '  if( data.status == "y" ) {' . "\r\n\t\t\t" . '   alert("New success!"); ' . "\r\n\t\t\t" . '   parent.window.location.href="./payfenzhu.php?pid=';
echo $appid;
?><?='";' . "\r\n" . '               var index = parent.layer.getFrameIndex(window.name);' . "\r\n" . '               parent.layer.close(index);' . "\r\n" . '             }' . "\r\n\t\t" . '   if( data.status == "n" ) {' . "\r\n\t\t" . '       alert("Error,Duplicate name!"); ' . "\r\n\t\t" . '   }' . "\r\n\t\t" . '}' . "\r\n\t" . '});' . "\r\n" . '})' . "\r\n\r\n" . '</script>' . "\r\n" . '</body></html>';
?>