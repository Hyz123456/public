<?php  
session_start();
error_reporting(0);
$servername = trim($_SERVER['SERVER_NAME']);
$hostname = explode(":",$servername);
$hostname = $hostname[0];
$arrhost=explode('.',$hostname);
$arrhostnum=count($arrhost);
if($arrhostnum==3)
{
	$yourneedhost=$_SESSION['account_urls'].$arrhost[1].'.'.$arrhost[2];
}
else
{
	$yourneedhost=$_SESSION['account_urls'].$servername;
}


include_once 'inc/conn.php';
require_once('inc/safemode.php');
require_once('inc/360_safe3.php');
require_once('inc/md532.php');
if($_SESSION['ldewm2017_username']=="" ||$_SESSION['ldewm2017_token']=="")
{
	header("location:login.php");
	mysql_close();
}
$zuid=trim(htmlspecialchars(addslashes(post_check(verify_id($_GET['id'])))));
$appid=trim(htmlspecialchars(addslashes(post_check($_GET['pid']))));
$appidok=inject_check($appid);
if($appidok==true)
{
	exit();
}

if(is_null($_GET['pid'])||empty($_GET['pid'])||is_null($_GET['id'])||empty($_GET['id']))
{
	header("location:index.php");
}
$exec="select * from ewmzu where id='$zuid' and appid='$appid'";
$result=mysql_query($exec);
$num=mysql_num_rows($result);
if($rs=@mysql_fetch_object($result))
{
	$money=$rs->money;
	$zuname=$rs->zuname;
}
else
{
	header("location:exit.php?s=".$_SESSION['ldewm2017_token']);
}
?>
<?="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">" . "\x0d\x0a" . "<html xmlns=\"http://www.w3.org/1999/xhtml\"><head><meta http-equiv=\"Content-Type\" content=\"text/html\x3b charset=UTF-8\">" . "\x0d\x0a" . "<title>&#25903\x3b&#20184\x3b&#23453\x3b&#20813\x3b&#31614\x3b&#32422\x3b&#32\x3b&#95\x3b&#20010\x3b&#20154\x3b&#25903\x3b&#20184\x3b&#23453\x3b&#20813\x3b&#31614\x3b&#32422\x3b&#25509\x3b&#21475\x3b&#25554\x3b&#20214\x3b&#95\x3b&#25903\x3b&#20184\x3b&#23453\x3b&#20813\x3b&#31614\x3b&#32422\x3b&#21160\x3b&#24577\x3b&#20108\x3b&#32500\x3b&#30721\x3b&#25509\x3b&#21475\x3b</title>" . "\x0d\x0a" . "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\" />" . "\x0d\x0a" . "<link rel=\"stylesheet\" type=\"text/css\" href=\"js/style.css\">" . "\x0d\x0a" . "<link rel=\"stylesheet\" href=\"js/buttons.css\">" . "\x0d\x0a" . "<script src=\"js/hm.js\"></script><script src=\"js/push.js\"></script>" . "\x0d\x0a" . "<script src=\"js/jquery.min.js\"></script>" . "\x0d\x0a" . "<script type=\"text/javascript\" src=\"js/tab.js\"></script>" . "\x0d\x0a" . "<script type=\"text/javascript\" src=\"js/laypage.js\"></script>" . "\x0d\x0a" . "<script type=\"text/javascript\" src=\"js/layer.js\"></script>" . "\x0d\x0a" . "<link rel=\"stylesheet\" href=\"js/layer.css\" id=\"layui_layer_skinlayercss\">" . "\x0d\x0a" . "<script type=\"text/javascript\" src=\"js/Validform_v5.3.2_min.js\"></script>" . "\x0d\x0a" . "<script type=\"text/javascript\">" . "\x0d\x0a" . "var _c = _h = 0\x3b" . "\x0d\x0a" . "\$(document).ready(function () \x7b" . "\x0d\x0a" . "    \$('#play  li').click(function()\x7b" . "\x0d\x0a" . "        var i = \$(this).attr('alt') - 1\x3b" . "\x0d\x0a" . "        clearInterval(_h)\x3b" . "\x0d\x0a" . "        _c = i\x3b" . "\x0d\x0a" . "        //play()\x3b" . "\x0d\x0a" . "        change(i)\x3b       " . "\x0d\x0a" . "    \x7d)" . "\x0d\x0a" . "    \$(\"#pic img\").hover(function()\x7bclearInterval(_h)\x7d, function()\x7bplay()\x7d)\x3b" . "\x0d\x0a" . "    play()\x3b" . "\x0d\x0a" . '})' . "\x0d\x0a" . "function play()" . "\x0d\x0a" . '{' . "\x0d\x0a" . "    _h = setInterval(\"auto()\", 8000)\x3b" . "\x0d\x0a" . " " . "\x0d\x0a" . '}' . "\x0d\x0a" . "function change(i)" . "\x0d\x0a" . '{' . "\x0d\x0a" . "    \$('#play li').css('background-color','#000000').eq(i).css('background-color','#FF3000').blur()\x3b" . "\x0d\x0a" . "    \$(\"#pic img\").fadeOut('slow').eq(i).fadeIn('slow')\x3b" . "\x0d\x0a" . '}' . "\x0d\x0a" . "function auto()" . "\x0d\x0a" . "\x7b   " . "\x0d\x0a" . "    _c = _c > 2 ? 0 : _c + 1\x3b" . "\x0d\x0a" . " " . "\x0d\x0a" . "    change(_c)\x3b" . "\x0d\x0a" . '}' . "\x0d\x0a" . "</script><style type=\"text/css\">" . "\x0d\x0a" . ".img_switch \x7bmargin:0 auto\x3bWIDTH:1000px\x3bHEIGHT: 261px\x3b overflow:hidden\x7d" . "\x0d\x0a" . ".img_switch_content \x7bHEIGHT: 261px\x3bposition:relative\x3b\x7d" . "\x0d\x0a" . ".img_switch_text \x7bwidth: 262px\x3bposition: absolute\x3bz-index:10\x3b bottom:5px\x3bleft:10px\x3bHEIGHT: 15px\x3b z-index:10000 !important\x7d" . "\x0d\x0a" . ".number_nav \x7bDISPLAY: inline\x3bFLOAT: left\x3b\x7d" . "\x0d\x0a" . ".number_nav UL \x7bfont:12px Arial, Helvetica, sans-serif\x3bpadding: 0px\x3bMARGIN: 0px\x3bLIST-STYLE-TYPE: none\x3bcolor:#fff\x3b\x7d" . "\x0d\x0a" . ".number_nav UL LI \x7bfloat: left\x3bfont-weight: bold\x3bbackground: #000\x3bfloat: left\x3bmargin-right: 8px\x3bwidth: 23px\x3bcursor: pointer\x3bline-height: 17px\x3bheight: 17px\x3btext-align: center\x3bfilter:alpha(opacity=75)\x3b-moz-opacity:0.75\x3bopacity: 0.75\x3b\x7d" . "\x0d\x0a" . "#pic \x7bOVERFLOW: hidden\x7d" . "\x0d\x0a" . "</style><link type=\"text/css\" rel=\"stylesheet\" href=\"js/laypage.css\" id=\"laypagecss\">" . "\x0d\x0a" . "</head>" . "\x0d\x0a" . "<body>" . "\x0d\x0a" . "<style type=\"text/css\">" . "\x0d\x0a" . " #apDiv1 \x7b" . "\x0d\x0a\x09" . "position:absolute\x3b" . "\x0d\x0a\x09" . "width:200px\x3b" . "\x0d\x0a\x09" . "height:31px\x3b" . "\x0d\x0a\x09" . "z-index:1\x3b" . "\x0d\x0a\x09" . "left: 242px\x3b" . "\x0d\x0a\x09" . "top: 206px\x3b" . "\x0d\x0a" . '}' . "\x0d\x0a" . " </style>" . "\x0d\x0a" . "<div class=\"content\">" . "\x0d\x0a" . "  <div class=\"main\">" . "\x0d\x0a";
include_once 'head.php';
include_once 'menu.php';
?>
<?="    <div class=\"right1\">" . "\x0d\x0a" . "       <div class=\"bar4\"><a class=\"button orange\" href=\"#\">APPID :";
echo $appid;
?> <?php echo $money;
?><?="&#20803\x3b</a> <input class=\"button red\" type=\"button\" name=\"Submit\" value=\"&#26032\x3b&#24314\x3b&#24494\x3b&#20449\x3b";
echo $money;
?><?="&#20803\x3b&#20108\x3b&#32500\x3b&#30721\x3b\" onclick=\"openwin(&#39\x3bPID:";
echo $appid;
?> - &#20805;&#20540;<?php echo $money;
?>&#20803;&#32;&#47; <?php echo $money;
?><?=" &#26032\x3b&#24314\x3b&#24494\x3b&#20449\x3b&#20108\x3b&#32500\x3b&#30721\x3b&#39\x3b,&#39\x3bpayfenzulistewmwx.php?pid=";
echo $appid;
?>&amp;fzid=<?php echo $zuid;
?>&amp;money=<?php echo $money;
?><?="&#39\x3b,&#39\x3b500px&#39\x3b,&#39\x3b300px&#39\x3b)\x3b\"> <a class=\"button white\" href=\"payfenzhu.php?pid=";
echo $appid;
?><?="\">&#36820\x3b&#22238\x3b</a></div>" . "\x0d\x0a" . "       <p>&#20998\x3b&#32452\x3b&#37329\x3b&#39069\x3b&#20108\x3b&#32500\x3b&#30721\x3b&#33267\x3b&#23569\x3b&#53\x3b&#20010\x3b&#25110\x3b&#53\x3b&#20010\x3b&#20197\x3b&#19978\x3b&#65292\x3b&#20805\x3b&#20540\x3b&#37327\x3b&#22823\x3b&#30340\x3b&#31449\x3b&#28857\x3b&#21487\x3b&#24314\x3b&#31435\x3b&#49\x3b&#45\x3b&#57\x3b&#20010\x3b&#12290\x3b[<a href=\"news-38.html\" target=\"_blank\">&#24110\x3b&#21161\x3b&#65311\x3b</a>]</p>" . "\x0d\x0a\x09" . "   " . "\x09" . "   " . "\x09" . "    ";
include_once 'pagesqlwxsm.php';
include_once 'page.php';
?><?="\x09\x0d\x0a" . "  <table width=\"100%\" cellspacing=\"0\" class=\"ADoc_table\">" . "\x0d\x0a" . "  <tbody><tr>" . "\x0d\x0a" . "  <td><div align=\"center\"><strong>&#32534\x3b&#21495\x3b</strong></div></td>" . "\x0d\x0a" . "    <td><div align=\"center\"><strong>APPID</strong></div></td>" . "\x0d\x0a\x09" . "<td><div align=\"center\"><strong>&#20998\x3b&#32452\x3b&#21517\x3b&#31216\x3b</strong></div></td>" . "\x0d\x0a\x09" . "<td><div align=\"center\"><strong>&#20998\x3b&#32452\x3b&#37329\x3b&#39069\x3b</strong></div></td>" . "\x0d\x0a\x09" . "<td><div align=\"center\"><strong>&#20108\x3b&#32500\x3b&#30721\x3b</strong></div></td>" . "\x0d\x0a\x09" . "<td><div align=\"center\"><strong><img src=\"js/miniweixin.png\" width=\"16\" height=\"16\" />&#24494\x3b&#20449\x3b&#20108\x3b&#32500\x3b&#30721\x3b&#22791\x3b&#27880\x3b&#45\x3b&#29702\x3b&#30001\x3b</strong></div></td>" . "\x0d\x0a" . "    <td><div align=\"center\"><strong>&#25805\x3b&#20316\x3b</strong></div></td>" . "\x0d\x0a" . "  </tr>" . "\x0d\x0a" . "    ";
$i=1;
while($rs=mysql_fetch_object($result))
{
	?>
 <tr><td><?php echo $i++;
	?></td><td><?php echo $appid;
	?></td><td><?php echo $zuname;
	?></td><td><div align="center"><?php echo $rs->cny;
	?><?=" &#20803\x3b</div></td><td><div align=\"center\"><a href=\"http://qr.liantu.com/api.php?text=";
	echo $rs->picurl;
	?><?="\" target=\"_blank\"><img src=\"http://qr.liantu.com/api.php?text=";
	echo $rs->picurl;
	?><?="\" width=\"40\" height=\"40\"></a></div></td><td><div align=\"center\">";
	echo $rs->name;
	?><?=" </div></td><td><a class=\"button button-primary button-circle button-small\" href=\"#\" onclick=\"openwin(&quot\x3b&#30830\x3b&#35748\x3b&#21024\x3b&#38500\x3b&quot\x3b,&quot\x3bpayfenzhuewmdelwx.php?pid=";
	echo $appid;
	?>&amp;fzid=<?php echo $zuid;
	?>&amp;id=<?php echo $rs->id;
	?><?="&quot\x3b,&quot\x3b350px&quot\x3b,&quot\x3b180px&quot\x3b)\x3b\">&#21024\x3b</a> </td></tr>" . "\x0d\x0a" . "  ";
}
echo"
		<table width='100%' cellspacing='1' cellpadding='2'>
			<tr><td>&nbsp;</td></tr>
		</table>
		<table width='100%' cellspacing='1' cellpadding='2'>
			<tr>
			<td><span style='float:left; text-align:left'><font color=#666666>$page_string</font></span><span style='float:right; text-align:left'><font color=#666666>&#27599;&#39029;&#26174;&#31034;<b>$page_size</b>&#26465;&#65292;&#24635;&#20849;&#26377;&nbsp;<b>$amount</b>&nbsp;&#26465;&#20449;&#24687;&#12290;<font></span></td>
			</tr>
		</table>";
mysql_close();
?><?="\x09\x0d\x0a" . "</tbody></table>" . "\x0d\x0a" . "    </div>" . "\x0d\x0a" . "    <div class=\"clear\"></div>" . "\x0d\x0a" . "  </div>" . "\x0d\x0a" . "<div style=\"display:none\">" . "\x0d\x0a" . "</div>" . "\x0d\x0a" . "<script>" . "\x0d\x0a\x09" . "\$(function()\x7b" . "\x0d\x0a\x09\x09" . "\$(\"#aFloatTools_Show\").click(function()\x7b" . "\x0d\x0a\x09\x09\x09" . "\$('#divFloatToolsView').animate(\x7bwidth:'show',opacity:'show'\x7d,100,function()\x7b\$('#divFloatToolsView').show()\x3b\x7d)\x3b" . "\x0d\x0a\x09\x09\x09" . "\$('#aFloatTools_Show').hide()\x3b" . "\x0d\x0a\x09\x09\x09" . "\$('#aFloatTools_Hide').show()\x3b" . "\x0d\x0a\x09\x09" . '});' . "\x0d\x0a\x09\x09" . "\$(\"#aFloatTools_Hide\").click(function()\x7b" . "\x0d\x0a\x09\x09\x09" . "\$('#divFloatToolsView').animate(\x7bwidth:'hide', opacity:'hide'\x7d,100,function()\x7b\$('#divFloatToolsView').hide()\x3b\x7d)\x3b" . "\x0d\x0a\x09\x09\x09" . "\$('#aFloatTools_Show').show()\x3b" . "\x0d\x0a\x09\x09\x09" . "\$('#aFloatTools_Hide').hide()\x3b" . "\x09\x0d\x0a\x09\x09" . '});' . "\x0d\x0a\x09" . '});' . "\x0d\x0a" . "</script>" . "\x0d\x0a" . "</div>" . "\x0d\x0a" . "</body></html>";
?>