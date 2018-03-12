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



$yourneedhost="www.8shu.cc";


/*
$queryurlok=file_get_contents('http://www.xuozhifu.com/urlpay/check.php?url='.$yourneedhost);



if($queryurlok == "urlokshouquan" or $hostname == "urlokshouquan"){
}else{
     $queryurlok=file_get_contents('http://url.xuozhifu.com/urlpay/check.php?url='.$yourneedhost);
         if($queryurlok == "urlokshouquan" or $hostname == "urlokshouquan"){
            }else{
			        $queryurlok=file_get_contents('http://www.xuozhifu.com/urlpay/check.php?url='.$_SERVER["HTTP_HOST"]);
                      if($queryurlok == "urlokshouquan" or $hostname == "urlokshouquan"){
					      $servername = $_SERVER["HTTP_HOST"];
                         }else{
			      exit('<title>&#35831;&#30830;&#35748;&#35813;&#22495;&#21517;&#26159;&#21542;&#24320;&#36890;&#20250;&#21592;&#65292;&#22495;&#21517;&#26159;&#21542;&#27491;&#30830;&#65281;&#35831;&#20808;&#24320;&#36890;&#27492;&#22495;&#21517;&#65281;</title><h3>&#35831;&#30830;&#35748;&#35813;&#22495;&#21517;&#26159;&#21542;&#24320;&#36890;&#20250;&#21592;&#65292;&#22495;&#21517;&#26159;&#21542;&#27491;&#30830;&#65281;&#35831;&#20808;&#24320;&#36890;&#27492;&#22495;&#21517;&#65281;</h3>');
exit;}
			}
}if($servername == "127.0.0.1" or $hostname == "127.0.0.1" or $servername == "localhost" or $hostname == "localhost"){
exit('<title>&#35831;&#30830;&#35748;&#35813;&#22495;&#21517;&#26159;&#21542;&#24320;&#36890;&#20250;&#21592;&#65292;&#22495;&#21517;&#26159;&#21542;&#27491;&#30830;&#65281;&#35831;&#20808;&#24320;&#36890;&#27492;&#22495;&#21517;&#65281;</title><h3>&#35831;&#30830;&#35748;&#35813;&#22495;&#21517;&#26159;&#21542;&#24320;&#36890;&#20250;&#21592;&#65292;&#22495;&#21517;&#26159;&#21542;&#27491;&#30830;&#65281;&#35831;&#20808;&#24320;&#36890;&#27492;&#22495;&#21517;&#65281;</h3>');
exit;
}
if($queryurlok != "" or !empty($queryurlok) or $hostname != ""){}else{
exit('<title>&#35831;&#30830;&#35748;&#35813;&#22495;&#21517;&#26159;&#21542;&#24320;&#36890;&#20250;&#21592;&#65292;&#22495;&#21517;&#26159;&#21542;&#27491;&#30830;&#65281;&#35831;&#20808;&#24320;&#36890;&#27492;&#22495;&#21517;&#65281;</title><h3>&#35831;&#30830;&#35748;&#35813;&#22495;&#21517;&#26159;&#21542;&#24320;&#36890;&#20250;&#21592;&#65292;&#22495;&#21517;&#26159;&#21542;&#27491;&#30830;&#65281;&#35831;&#20808;&#24320;&#36890;&#27492;&#22495;&#21517;&#65281;</h3>');
exit;
}


*/



error_reporting(0);
include_once 'inc/conn.php';
require_once('inc/safemode.php');
require_once('inc/360_safe3.php');
require_once('inc/md532.php');

if ($_SESSION['ldewm2017_username'] == "" or $_SESSION['ldewm2017_token'] == "") {
header("location:login.php");
mysql_close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>&#20010;&#20154;&#25903;&#20184;&#23453;&#20813;&#31614;&#32422;&#25509;&#21475;&#25554;&#20214;&#95;&#25903;&#20184;&#23453;&#20813;&#31614;&#32422;&#21160;&#24577;&#20108;&#32500;&#30721;&#31995;&#32479;</title>
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
</style></head>


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
	
       <div class="bar4"><input type="submit" name="Submit" class="button red"  value="&#35746;&#21333;&#25968;&#25454;&#31649;&#29702;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button orange" href="#" onclick="openwin(&quot;&#30830;&#35748;&#21024;&#38500;&quot;,&quot;paydellist.php?pid=<?php echo $appid;?>&amp;fzid=<?php echo $zuid;?>&amp;id=<?php echo $rs->id;?>&quot;,&quot;350px&quot;,&quot;180px&quot;);">&#21024;&#38500;&#26410;&#25903;&#20184;&#35746;&#21333;&#35760;&#24405;</a></div>
       <p>&#35746;&#21333;&#25968;&#25454;&#31649;&#29702;</p>
	            <?php
                include_once 'pagesqllist.php';
                include_once 'page.php';
                ?>
  <table width="100%" cellspacing="0" class="ADoc_table">
  <tbody><tr>
   <td valign="middle"><div align="center">&#32534;&#21495;</div></td>
    <td valign="middle"><div align="center">&#32593;&#31449;&#35746;&#21333;&#21495;</div></td>
	<td valign="middle"><div align="center">&#20108;&#32500;&#30721;&#22791;&#27880;</div></td>
	<td valign="middle"><div align="center">&#35746;&#21333;&#37329;&#39069;</div></td>
	<td valign="middle"><div align="center">&#25903;&#20184;&#26041;&#24335;</div></td>
	<td valign="middle"><div align="center">&#25903;&#20184;&#26102;&#38388;</div></td>
	<td valign="middle"><div align="center">&#25903;&#20184;&#29366;&#24577;</div></td>
	<td valign="middle"><div align="center">&#27969;&#27700;&#35746;&#21333;&#21495;</div></td>
	<td valign="middle"><div align="center">&#35746;&#21333;&#21495;</div></td>
  </tr>
    <?php
	$i = 1;
    while ($rs = mysql_fetch_object($result)) {
	$payyizhif = $rs->dingdanok;
	$payleixing = $rs->pay;
	if($payyizhif==1){
	$payyizhif="<font color='#FF0000'>&#24050;&#25903;&#20184;</font>";
	}else{
	$payyizhif="<font color='#009900'>&#26410;&#25903;&#20184;</font>";
	}
	if($payleixing==1){
	$payleixing="<img src='js/minialipay.png' width='16' height='16' />";
	}
	if($payleixing==2){
	$payleixing="<img src='js/minitenpay.png' width='16' height='16' />";
	}
	if($payleixing==3){
	$payleixing="<img src='js/miniweixin.png' width='16' height='16' />";
	}
	?>
  <tr> 
  <td><div align="center"><?php echo $i++;?></div></td>
  <td><?php echo $rs->uid;?></td>
  <td><?php  echo $rs->name;?></td>
  <td><?php  echo $rs->cny;?></td>
  <td><?php  echo $payleixing;?></td>
  <td><?php  echo date('Y-m-d H:i:s',$rs->timm);?></td>
  <td><?php  echo $payyizhif;?></td>
  <td><?php  echo $rs->ddh;?></td>
  </tr>
<?php
    }
    echo"</tbody></table>
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
</body>
</html>