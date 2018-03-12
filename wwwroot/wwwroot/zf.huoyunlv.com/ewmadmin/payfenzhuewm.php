<?php
session_start();
error_reporting(0);
$servername = trim($_SERVER['SERVER_NAME']);
$hostname = explode(":",$servername);
$hostname = $hostname[0];
$arrhost=explode('.',$hostname);
$arrhostnum=count($arrhost);
if ($arrhostnum==3){
           $yourneedhost=$_SESSION['account_urls'].$arrhost[1].".".$arrhost[2];
           }else{
		   $yourneedhost=$_SESSION['account_urls'].$servername;
		   }


include_once 'inc/conn.php';
require_once('inc/safemode.php');
require_once('inc/360_safe3.php');
require_once('inc/md532.php');

if ($_SESSION['ldewm2017_username'] == "" or $_SESSION['ldewm2017_token'] == "") {
header("location:login.php");
mysql_close();
}
$zuid = trim(htmlspecialchars(addslashes(post_check($_GET['id']))));
$appid= trim(htmlspecialchars(addslashes(post_check($_GET['pid']))));

$appidok = inject_check($appid);
if($appidok==True){exit();}else{}

if(is_null($_GET['pid']) or empty($_GET['pid']) or is_null($_GET['id']) or empty($_GET['id'])){
header("location:index.php");
}

$exec = "select * from ewmzu where id='$zuid' and appid='$appid'";
$result = mysql_query($exec);
$num = mysql_num_rows($result);
if ($rs = @mysql_fetch_object($result)) {
$money=$rs->money;
$zuname=$rs->zuname;
}else{
header("location:exit.php?s=".$_SESSION['ldewm2017_token']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>&#25903;&#20184;&#23453;&#20813;&#31614;&#32422;&#32;&#95;&#20010;&#20154;&#25903;&#20184;&#23453;&#20813;&#31614;&#32422;&#25509;&#21475;&#25554;&#20214;&#95;&#25903;&#20184;&#23453;&#20813;&#31614;&#32422;&#21160;&#24577;&#20108;&#32500;&#30721;&#25509;&#21475;</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="js/style.css">
<link rel="stylesheet" href="js/buttons.css">
<script src="js/hm.js"></script><script src="js/push.js"></script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/laypage.js"></script>
<script type="text/javascript" src="js/layer.js"></script>
<link rel="stylesheet" href="js/layer.css" id="layui_layer_skinlayercss">
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript"> 
var _c = _h = 0;
$(document).ready(function () {
    $('#play  li').click(function(){
        var i = $(this).attr('alt') - 1;
        clearInterval(_h);
        _c = i;
        //play();
        change(i);       
    })
    $("#pic img").hover(function(){clearInterval(_h)}, function(){play()});
    play();
})
function play()
{
    _h = setInterval("auto()", 8000);
 
}
function change(i)
{
    $('#play li').css('background-color','#000000').eq(i).css('background-color','#FF3000').blur();
    $("#pic img").fadeOut('slow').eq(i).fadeIn('slow');
}
function auto()
{   
    _c = _c > 2 ? 0 : _c + 1;
 
    change(_c);
}
</script><style type="text/css">
.img_switch {margin:0 auto;WIDTH:1000px;HEIGHT: 261px; overflow:hidden}
.img_switch_content {HEIGHT: 261px;position:relative;}
.img_switch_text {width: 262px;position: absolute;z-index:10; bottom:5px;left:10px;HEIGHT: 15px; z-index:10000 !important}
.number_nav {DISPLAY: inline;FLOAT: left;}
.number_nav UL {font:12px Arial, Helvetica, sans-serif;padding: 0px;MARGIN: 0px;LIST-STYLE-TYPE: none;color:#fff;}
.number_nav UL LI {float: left;font-weight: bold;background: #000;float: left;margin-right: 8px;width: 23px;cursor: pointer;line-height: 17px;height: 17px;text-align: center;filter:alpha(opacity=75);-moz-opacity:0.75;opacity: 0.75;}
#pic {OVERFLOW: hidden}
</style><link type="text/css" rel="stylesheet" href="js/laypage.css" id="laypagecss">
</head>
<body>
<style type="text/css">
 #apDiv1 {
	position:absolute;
	width:200px;
	height:31px;
	z-index:1;
	left: 242px;
	top: 206px;
}
 </style>
<div class="content">
  <div class="main">
<?php
include_once 'head.php';
include_once 'menu.php';
?>
    <div class="right1">
       <div class="bar4"><a class="button orange" href="#">APPID :<?php echo $appid;?> <?php echo $money;?>&#20803;</a> <input class="button red" type="button" name="Submit" value="&#26032;&#24314;&#25903;&#20184;&#23453;<?php echo $money;?>&#20803;&#20108;&#32500;&#30721;" onclick="openwin(&#39;PID:<?php echo $appid;?>&#32;&#45;&#32;&#20805;&#20540;<?php echo $money;?>&#20803;&#32;&#47; <?php echo $money;?> &#26032;&#24314;&#25903;&#20184;&#23453;&#20108;&#32500;&#30721;&#39;,&#39;payfenzulistewm.php?pid=<?php echo $appid;?>&amp;fzid=<?php echo $zuid;?>&amp;money=<?php echo $money;?>&#39;,&#39;500px&#39;,&#39;300px&#39;);"> <a class="button white" href="payfenzhu.php?pid=<?php echo $appid;?>">&#36820;&#22238;</a></div>
       <p>&#20998;&#32452;&#37329;&#39069;&#20108;&#32500;&#30721;&#33267;&#23569;&#53;&#20010;&#25110;&#53;&#20010;&#20197;&#19978;&#65292;&#20805;&#20540;&#37327;&#22823;&#30340;&#31449;&#28857;&#21487;&#24314;&#31435;&#49;&#48;&#45;&#50;&#48;&#20010;&#12290;[<a href="news-20.php" target="_blank">&#24110;&#21161;&#65311;</a>]</p>
	            <?php
                include_once 'pagesqlzfbsm.php';
                include_once 'page.php';
                ?>
  <table width="100%" cellspacing="0" class="ADoc_table">
  <tbody><tr>
  <td><div align="center"><strong>&#32534;&#21495;</strong></div></td>
    <td><div align="center"><strong>APPID</strong></div></td>
	<td><div align="center"><strong>&#20998;&#32452;&#21517;&#31216;</strong></div></td>
	<td><div align="center"><strong>&#20998;&#32452;&#37329;&#39069;</strong></div></td>
	<td><div align="center"><strong>&#20108;&#32500;&#30721;</strong></div></td>
	<td><div align="center"><strong><img src="js/minialipay.png" width="16" height="16" />&#25903;&#20184;&#23453;&#20108;&#32500;&#30721;&#22791;&#27880;&#45;&#29702;&#30001;</strong></div></td>
    <td><div align="center"><strong>&#25805;&#20316;</strong></div></td>
  </tr>
    <?php
	$i = 1;
    while ($rs = mysql_fetch_object($result)) {
	?>
  <tr><td><?php echo $i++;?></td><td><?php echo $appid;?></td><td><?php echo $zuname; ?></td><td><div align="center"><?php echo $rs->cny; ?> &#20803;</div></td><td><div align="center"><a href="http://qr.liantu.com/api.php?text=<?php echo $rs->picurl; ?>" target="_blank"><img src="http://qr.liantu.com/api.php?text=<?php echo $rs->picurl;?>" width="40" height="40"></a></div></td><td><div align="center"><?php echo $rs->name; ?> </div></td><td><a class="button button-primary button-circle button-small" href="#" onclick="openwin(&quot;&#30830;&#35748;&#21024;&#38500;&quot;,&quot;payfenzhuewmdel.php?pid=<?php echo $appid;?>&amp;fzid=<?php echo $zuid;?>&amp;id=<?php echo $rs->id;?>&quot;,&quot;350px&quot;,&quot;180px&quot;);">&#21024;</a> </td></tr>
<?php
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
?>	
</tbody></table>
    </div>
    <div class="clear"></div>
  </div>
<div style="display:none">
</div>
<script>
	$(function(){
		$("#aFloatTools_Show").click(function(){
			$('#divFloatToolsView').animate({width:'show',opacity:'show'},100,function(){$('#divFloatToolsView').show();});
			$('#aFloatTools_Show').hide();
			$('#aFloatTools_Hide').show();				
		});
		$("#aFloatTools_Hide").click(function(){
			$('#divFloatToolsView').animate({width:'hide', opacity:'hide'},100,function(){$('#divFloatToolsView').hide();});
			$('#aFloatTools_Show').show();
			$('#aFloatTools_Hide').hide();	
		});
	});
</script>

</div>
</body></html>