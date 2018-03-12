<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/odds_lottery_normal.php");
include_once($C_Patch."/app/member/class/user_group.php");

include_once($C_Patch."/app/member/cache/ltConfig.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
$uid = $_SESSION['userid'];
if($Lottery_set['d3']['close']==1)
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>福彩3D暂停销售</title>
<link href="css/close.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.7.1.js"></script>
</head>
<body>
	<div class="xiuxi">
    	<div class="xx_time">
             <?=$Lottery_set['d3']['des']?>
       	</div>
    </div>
    <div class="button">
        	<ul>
            	<li class="kg"><a  href="/member/final/LT_result.php?gtype=D3" title="开奖结果" target="_blank" ></a></li>
                <li class="gz"><a  href="rule/Rule_3D.html" title="游戏规则" target="_blank"></a></li>
            </ul>
    </div>
    <div style=" clear:both"></div>
</body>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</html>

<?
exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script type="text/javascript" src="../../js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="../../js/jquery.ua.min.js"></script>
<script type="text/javascript" src="../../js/top.js"></script>
<script type="text/javascript" src="box/jquery.jBox-2.3.min.js"></script>
<script type="text/javascript" src="box/jquery.jBox-zh-CN.js"></script>
<script type="text/javascript" src="js/3d.js?v=1005"></script>
<script type="text/javascript" src="/cl/js/common.js"></script>
<link type="text/css" rel="stylesheet" href="css/jbox.css"/>
<link type="text/css" rel="stylesheet" href="css/ssl.css"/>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
	.drpbg{width:60px;position:absolute; background:#021e37;text-align:center;top:25px;left:674px; height:42px; border:1px solid white; border-top:none;}
	.drpbg ul{margin:0px; padding:0px; height:42px; width:60px;}
	.drpbg li{margin:0px;text-align:center;width:60px; height:21px; line-height:20px;}
	.drpbg .ca{font-size:12px; color:White;text-decoration:none;}
	.drpbg .ca:hover{color:#ccc;}
</style>
</head>
    <script>

    $(window.parent.parent.document).find("#mainFrame").height(1440);

    </script>
<script language="JavaScript">

if(self==top){
	top.location='/index.php';
}

function myfun()
{
    if(document.body.clientWidth>1000){
        var left_blank = (document.body.clientWidth-1000)/2;
		/*
        $("#new_left").css('margin-left', left_blank.toString()+'px');
    }else{
        $("#new_left").css('margin-left', '0px');
    }*/
    browserCompatible();
}
/*用window.onload调用myfun()*/
window.onload=myfun;//不要括号

jQuery(window).resize(myfun);

$(window.parent.document).find("#mainFrame").height(1500);

function browserCompatible(){
    if($.ua().isIe7){
        $(".lottery_main").css('margin', '0px');
        $(".lottery_main").css('width', '800px');
    }
}
</script>
<style>
    
    #left_1{
    width: 180px;
    font-size:24px;
    color:#A90404;
    text-align:center;
    line-height:40px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
#en0 a:hover{ display:block;width:154px;height:40px; padding-left:26px;text-decoration:none;color:#B52910;font-weight:bold;line-height:40px;font-size:13px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
</style>
<body >
<style>

*{padding:0;margin:0;}
#img{width:100%;height:244px;background-image:url('caipiao.jpg');background-position:center;margin-top:40px;}
#img1{width:100%;height:331px;
background:url('about_top.png')no-repeat center;margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background: url('about_bg01.png')no-repeat center;margin-top:-180px} 
#bgs{width: 1030px;height:auto;background:#fff;margin:auto;border:1px solid #D69E15;min-height: 888px;margin: auto;}
    .about_bg{ width:100%;height:auto; background:url(/cl/bg2.jpg);background-repeat: repeat-x; }
.bgs1{    width: 1130px;

    min-height: 38px;
    margin: -37px auto;
}
</style>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
	.drpbg{width:60px;position:absolute; background:#021e37;text-align:center;top:25px;left:674px; height:42px; border:1px solid white; border-top:none;}
	.drpbg ul{margin:0px; padding:0px; height:42px; width:60px;}
	.drpbg li{margin:0px;text-align:center;width:60px; height:21px; line-height:20px;}
	.drpbg .ca{font-size:12px; color:White;text-decoration:none;}
	.drpbg .ca:hover{color:#ccc;}

#en0 a{ display:block;width:154px;height:40px; padding-left:26px;text-decoration:none;color:#ffffff;font-weight:bold;line-height:40px;font-size:13px;
    background:-moz-linear-gradient(top, #62300A, #2E0300);
    background:-webkit-linear-gradient(top, #62300A, #2E0300);
    background:-ms-linear-gradient(top, #62300A, #2E0300);
    background:linear-gradient(top, #62300A, #2E0300);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#62300A, endColorstr=#2E0300)";
    +background:#522105;
}
#en0 a:hover{ display:block;width:154px;height:40px; padding-left:26px;text-decoration:none;color:#B52910;font-weight:bold;line-height:40px;font-size:13px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
#left_1{
    font-size:24px;
    color:#A90404;
    text-align:center;
    line-height:40px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
</style>
<style>
    
    #left_1{
    font-size:24px;
    color:#A90404;
    text-align:center;
    line-height:40px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
</style>
<div id="img"></div>
    <div class="about_bg">
		       <div class="zxxx" style="    background-image: url(/cl/zxgg1.jpg);
    background-repeat: no-repeat;
    height: 45px;
    background-position: center;
}">
            <div style="width: 1000px; margin: 0px auto; line-height: 42px; color: #fff;">
                <marquee scrollamount="3" scrolldelay="150" direction="left" onmouseover="this.stop();" onclick="HotNewsHistory();"  onmouseout="this.start();" style="cursor: pointer; margin-left: 80px;"><span id="messageSpan"><?=$msg;?></span></marquee>
				  <script language="javascript" src="images/swfobject_source.js"></script>
				   <script>
					 function HotNewsHistory(){
            window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
        }
				   </script>
            </div>
            <script>
                $(function () {
                    // 最新消息跑馬燈
                    $.ajax({
                        type: 'POST',
                        url: '/app/member/Message.ashx?act=NewInfo',
                        data: {},
                        cache: false,
                        error: function () { return false; },
                        success: function (data) {
                            data = $.parseJSON(data);
                            var html = '';
                            for (var i = 0; i < data.length; i++) {
                                //html += '[';
                                //html += data[i].time;
                                //html += '] ';
                                html += data[i].report_content;
                                html += '&nbsp;&nbsp;&nbsp;&nbsp;';
                            }
                            $("#messageSpan").html(html);

                        }
                    });
                });
            </script>
        </div>
		
								<div class="ele-nav-guid-wrap" style=" position:relative;top:20px;background: url('/cl/about_txt_bg_top.png') center top no-repeat;
width: 100%;
height: 80px;">
           
        </div>
<div id="bgs" style=" position:relative;top:10px;">




<!--内容开始-->
<div class="block" style="padding:20px 0px;">
<!-- 
<div class="bannerimg" style="margin: 0 auto;width:1000px">
    <img width=1000 height=182 border="0" src="/images/img_welcome.jpg">
</div>

<div id="new_left" style="display: block;margin-left:0px !importnt;padding-top:0px;">
    <div style="width: 175px; float: left; margin-left:45px;padding-top: 0px;" id="Left_scroll">
          <div id="ds_01_bet">
            <div id="left_1">投注选择</div>
            <div id="en0"><a href="Cqssc.php" target="mainFrame">重庆时时彩</a></div>
              <div id="en0"><a href="gxsf.php" target="mainFrame">广西十分彩</a></div>
            <div id="en0"><a href="cqsf.php" target="mainFrame">重庆快乐十分</a></div>
            <div id="en0"><a href="gdsf.php" target="mainFrame">广东快乐十分</a></div>
            <div id="en0"><a href="tjsf.php" target="mainFrame">天津快乐十分</a></div>
            <div id="en0"><a href="pk10.php" target="mainFrame">北京PK拾</a></div>
            <div id="en0"><a href="3d.php" target="mainFrame">福彩3D</a></div>
            <div id="en0"><a href="pl3.php" target="mainFrame">排列3</a></div>
             <div id="en0"><a href="shssl.php" target="mainFrame">上海时时乐</a></div> 
            <div id="en0"><a href="kl8.php" target="mainFrame">北京快乐8</a></div>
             <div id="en0"><a href="tjssc.php" target="mainFrame">天津时时彩</a></div>
             <div id="en0"><a href="gd11.php" target="mainFrame">广东11选5</a></div> 
        </div>
    </div>
</div> -->


<style>
#dhlm{width:1000px;margin:auto;}
#hahahaha{list-style:none;}
#hahahaha li{
float: left;
    width:78px;
    height: 32px;
    line-height: 32px;
    text-align: center;
    font-size: 13px;
    margin-left:5px;
    font-family: 微软雅黑;
    font-weight: bold;
    color: #455964;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    background-color: #000;


}
.xuanzeyangshi{
width: 87px !important;
    margin-top: -5px;
    height: 37px !important;
    line-height: 39px !important;
    font-size: 20px !important;
    background-color: #455964 !important;
    color: #ccc !important;
    font-family: 楷体 !important;

}
#hahahaha li a{text-decoration: none;
    color: #d63e35;}
.xuanzeyangshi a{text-decoration: none;
    color: #ccc !important;}

	#hahahaha li:hover{background:#bbb;}
</style>
<div id="dhlm">
	<ul id="hahahaha">
		<li style="margin-left:0px;" ><a href="Cqssc.php" target="mainFrame">重庆时时彩</a></li>
		<li ><a href="gxsf.php" target="mainFrame">广西十分彩</a></li>
		<li ><a href="cqsf.php" target="mainFrame">重庆十分彩</a></li>
		<li ><a href="gdsf.php" target="mainFrame">广东十分彩</li>
		<li ><a href="tjsf.php" target="mainFrame">天津十分彩</a></li>
		<li ><a href="pk10.php" target="mainFrame">北京PK拾</a></li>
		<li class="xuanzeyangshi" ><a href="3d.php" target="mainFrame">福彩3D</a></li>
		<li><a href="pl3.php" target="mainFrame">排列3</a></li>
		<li><a href="shssl.php" target="mainFrame">上海时时乐</a></li>
		<li><a href="kl8.php" target="mainFrame">北京快乐8</a></li>
		<li><a href="tjssc.php" target="mainFrame">天津时时彩</a></li>
		<li><a href="gd11.php" target="mainFrame">广东11选5</a></li>
	</ul>
</div>



<div class="lottery_main"   style="width:1000px;">
<div class="ssc_right">
  <div id="auto_list"></div>
</div>
<div class="ssc_left">


<!-- 
<div class="jsq">
    <span class="time">第 <font id="open_qihao">00000000-000</font> 期<br>
        剩余<font id="whataction">投注</font>时间</span>
    <span class="ssc">福彩3D<br>
        第 <font id="numbers">00000000-000</font> 期</span>
    <span class="zh" id="autoinfo"><font>
    </span>
    <span class="sj" id="cqc_time">00:00</span>
    <div class="open_number"><img src="images/lhj.gif"/><img src="images/lhj.gif"/><img src="images/lhj.gif"/></div>
    <span id='cqc_sound' off='0'><img src='images/on.png' title='关闭/打开声音'/></span>
</div>


<table width="760" border="0" cellspacing="0" cellpadding="0" align="center" height="40">
  <tr  class="button_a">
      <td width="260" align="right"  valign="middle" class="kg_a"></td>
      <td width="300" align="right"  valign="middle" class="kg_a"><a  href="/member/final/LT_result.php?gtype=D3" title="开奖结果" target="_blank" ></a></td>
      <td width="10">&nbsp;</td>
      <td width="391" align="left"  valign="middle" class="gz_a"><a  href="rule/Rule_3D.html" title="游戏规则" target="_blank"></a></td>

  </tr>
</table> -->


 <style>
.jsq{width:1000px;height:32px;background:#455964;line-height: 34px;font-family: 微软雅黑;font-size: 13px;}
.jsqllk{width:1000px;height:60px;background-image:url('images/bg_result-814f17e.png');background-color: #000;background-repeat:  no-repeat;}
.zxjg{width: 113px;text-align: center;height: 29px;line-height: 31px;}
</style>
 <div class="jsq">
	   <span id='cqc_sound' off='0' 
	 style="width: 20px;
    height: 20px;
    display: block;
    border: 3px solid #ccc;
    border-radius: 50%;float:left;"><img src='images/on.png' title='关闭/打开声音'/></span>&nbsp;&nbsp;
	<span class="ssc">&nbsp;福彩3D <span style="float:right;margin-right:150px;">第 <font id="open_qihao">00000000-000</font>期</span>
	
	</span>
	
	
<span class="sj" id="cqc_time">00:00</span>
</div> 
<div class="jsq jsqllk">
	<div style="float:left">
		<div class="zxjg">最新结果</div>
		<div class="zxjg"><span class="time1" style="font-size:10px;color:#26C9FF;">No.<font id="numbers">00000000-000</font> </div>
	</div>

	<div class="open_number">
		<img src="images/lhj.gif"/>
		<img src="images/lhj.gif"/>
		<img src="images/lhj.gif"/>
	</div>

	<span class="zh" id="autoinfo"><font></span>

	<div style="float:right">
		<div class="zxjg"><a  href="/member/final/LT_result.php?gtype=D3" target="_blank" style="text-decoration: none;color:#ccc;font-family:微软雅黑;">开奖结果</a></div>
		<div class="zxjg"><a href="rule/Rule_3D.html" title="游戏规则" target="_blank" style="text-decoration: none;color:#ccc;font-family:微软雅黑;">游戏规则</a></div>
	</div>
	
</div>


    <div class="touzhu">
<form name="orders" action="order/order_3d.php?1=1" method="post" target="OrderFrame">
    	<ul id="menu_hm">
            <li class="current" onclick="hm_odds(1)">第一球<span>(百位)</span></li>
            <li class="current_n" onclick="hm_odds(2)">第二球<span>(十位)</span></li>
            <li class="current_n" onclick="hm_odds(3)">第三球<span>(个位)</span></li>
		</ul>
<table class="bian" border="0" cellpadding="0" cellspacing="1">
            <tr class="bian_tr_title">
                <td>号码</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>号码</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>号码</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>号码</td>
                <td>赔率</td>
                <td width="70">金额</td>
              <td>号码</td>
              <td>赔率</td>
              <td width="70">金额</td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu"><img src="images/ball_2/0.png" /></td>
                <td class="bian_td_odds" id="ball_1_h1" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t1"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/1.png" /></td>
                <td class="bian_td_odds" id="ball_1_h2" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t2"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/2.png" /></td>
                <td class="bian_td_odds" id="ball_1_h3" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t3"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/3.png" /></td>
                <td class="bian_td_odds" id="ball_1_h4" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t4"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/4.png" /></td>
                <td class="bian_td_odds" id="ball_1_h5" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t5"></td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu"><img src="images/ball_2/5.png" /></td>
                <td class="bian_td_odds" id="ball_1_h6" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t6"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/6.png" /></td>
                <td class="bian_td_odds" id="ball_1_h7" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t7"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/7.png" /></td>
                <td class="bian_td_odds" id="ball_1_h8" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t8"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/8.png" /></td>
                <td class="bian_td_odds" id="ball_1_h9" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t9"></td>
              <td class="bian_td_qiu"><img src="images/ball_2/9.png" /></td>
              <td class="bian_td_odds" id="ball_1_h10" width="40"></td>
              <td class="bian_td_inp" id="ball_1_t10"></td>
            </tr>
            <tr class="bian_tr_txt">
              <td class="bian_td_qiu">大</td>
              <td class="bian_td_odds" id="ball_1_h11"></td>
              <td class="bian_td_inp" id="ball_1_t11"></td>
              <td class="bian_td_qiu">小</td>
              <td class="bian_td_odds" id="ball_1_h12"></td>
              <td class="bian_td_inp" id="ball_1_t12"></td>
              <td class="bian_td_qiu">单</td>
              <td class="bian_td_odds" id="ball_1_h13"></td>
              <td class="bian_td_inp" id="ball_1_t13"></td>
              <td class="bian_td_qiu">双</td>
              <td class="bian_td_odds" id="ball_1_h14"></td>
              <td class="bian_td_inp" id="ball_1_t14"></td>
              <td colspan="3">&nbsp;</td>
            </tr>
      </table>

    	<table class="bian" border="0" cellpadding="0" cellspacing="1" style="margin-top:20px;">
        <tr class="bian_tr_bg">
              <td colspan="12">总和 龙虎和</td>
              </tr>
            <tr class="bian_tr_title">
              <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
              <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
              <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
              <td>选项</td>
                <td>赔率</td>
              <td width="70">金额</td>
            </tr>
            <tr class="bian_tr_txt">
                <td width="50" class="bian_td_qiu">总和大</td>
                <td class="bian_td_odds" id="ball_4_h1"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t1"></td>
                <td width="50" class="bian_td_qiu">总和小</td>
                <td class="bian_td_odds" id="ball_4_h2"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t2"></td>
                <td width="50" class="bian_td_qiu">总和单</td>
                <td class="bian_td_odds" id="ball_4_h3"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t3"></td>
                <td width="50" class="bian_td_qiu">总和双</td>
                <td class="bian_td_odds" id="ball_4_h4"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t4"></td>
            </tr>
            <tr class="bian_tr_txt">
                <td width="50" class="bian_td_qiu">龙</td>
                <td class="bian_td_odds" id="ball_4_h5"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t5"></td>
                <td width="50" class="bian_td_qiu">虎</td>
                <td class="bian_td_odds" id="ball_4_h6"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t6"></td>
                <td width="50" class="bian_td_qiu">和</td>
                <td class="bian_td_odds" id="ball_4_h7"></td>
                <td width="70" class="bian_td_inp" id="ball_4_t7"></td>
                <td colspan="3">&nbsp;</td>
            </tr>
           </table>

   	  <ul id="menu_s" style="margin-top:20px;">
          <li class="current">3连</li>
		</ul>
    	<table class="bian" border="0" cellpadding="0" cellspacing="1">
            <tr class="bian_tr_title">
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
              <td>选项</td>
              <td>赔率</td>
              <td width="70">金额</td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu">豹子</td>
                <td class="bian_td_odds" id="ball_5_h1" width="40"></td>
                <td class="bian_td_inp" id="ball_5_t1"></td>
                <td class="bian_td_qiu">顺子</td>
                <td class="bian_td_odds" id="ball_5_h2" width="40"></td>
                <td class="bian_td_inp" id="ball_5_t2"></td>
                <td class="bian_td_qiu">对子</td>
                <td class="bian_td_odds" id="ball_5_h3" width="40"></td>
                <td class="bian_td_inp" id="ball_5_t3"></td>
                <td class="bian_td_qiu">半顺</td>
                <td class="bian_td_odds" id="ball_5_h4" width="40"></td>
                <td class="bian_td_inp" id="ball_5_t4"></td>
                <td class="bian_td_qiu">杂六</td>
                <td class="bian_td_odds" id="ball_5_h5" width="40"></td>
                <td class="bian_td_inp" id="ball_5_t5"></td>
            </tr>
      </table>

        <ul id="menu_s" style="margin-top:20px;">
            <li class="current">跨度</li>
        </ul>
        <table class="bian" border="0" cellpadding="0" cellspacing="1">
            <tr class="bian_tr_title">
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu"><img src="images/ball_2/0.png" /></td>
                <td class="bian_td_odds" id="ball_6_h1" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t1"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/1.png" /></td>
                <td class="bian_td_odds" id="ball_6_h2" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t2"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/2.png" /></td>
                <td class="bian_td_odds" id="ball_6_h3" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t3"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/3.png" /></td>
                <td class="bian_td_odds" id="ball_6_h4" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t4"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/4.png" /></td>
                <td class="bian_td_odds" id="ball_6_h5" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t5"></td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu"><img src="images/ball_2/5.png" /></td>
                <td class="bian_td_odds" id="ball_6_h6" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t6"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/6.png" /></td>
                <td class="bian_td_odds" id="ball_6_h7" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t7"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/7.png" /></td>
                <td class="bian_td_odds" id="ball_6_h8" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t8"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/8.png" /></td>
                <td class="bian_td_odds" id="ball_6_h9" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t9"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/9.png" /></td>
                <td class="bian_td_odds" id="ball_6_h10" width="40"></td>
                <td class="bian_td_inp" id="ball_6_t10"></td>
            </tr>
        </table>
      <div class="button_body"><a onclick="reset()" class="button again" title="重填">重填</a>&nbsp;
	  <a class="button submit" onclick="order();" title="下注">下注</a></div>

	   
      </form>
	 <div  id='ajax_result_into'></div>
    </div>
    <div class="lottery_clear"></div>
</div>
</div>
<div class="lottery_clear"></div>

  </div>
  </div>
  
  </div>
  <div class="bgs1"></div>

<div id="endtime"></div>
<script type="text/javascript">loadinfo()</script>
<IFRAME id="OrderFrame" name="OrderFrame" border=0 marginWidth=0 frameSpacing=0 src="" frameBorder=0 noResize width=0 scrolling=AUTO height=0 vspale="0" style="display:none"></IFRAME>
<div style="display:none" id="look"></div>
</body>
<!--<script language="javascript" src="js/load_results_cqssc.js"></script>-->
<script>
function cs_table(tag,el,id,element,num){
	var tagsContent = document.getElementById(tag);
	var tagsLi = tagsContent.getElementsByTagName(el);

	var tagContent = document.getElementById(id);
	var tagLi = tagContent.getElementsByTagName(element);
	var len= tagsLi.length;
	var back_img,n_img;
	for(var i=0; i<len; i++){				
		if(i == '0'){
			back_img = 'fiest_bg01.png';
			n_img = 'fiest_bg02.png';
		}else if(i+1 == len){
			back_img = 'wu_bg02.png';
			n_img = 'wu_bg01.png';
		}else{
			back_img = 'top_bg02.png';
			n_img = 'top_bg.png';
		}
		if(i == num){
			tagsLi[i].style.background = 'url(images/'+back_img+') repeat-x';
			tagsLi[i].style.fontWeight = 'bold';
			tagLi[i].style.display="block"; 
		}else{
			tagsLi[i].style.background = 'url(images/'+n_img+') repeat-x';
			tagsLi[i].style.fontWeight = 'normal';
			tagLi[i].style.display="none"; 
		}
	}
	if(tag=='tag4'){
		window.scrollTo(0,document.body.scrollHeight);
	}
}
</script>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
<div style='width:1px;height:1px;overflow:hidden;'>
  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
           codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
           width="1" height="1" id="swfcontent" align="middle">
      <param name="allowScriptAccess" value="sameDomain" />
      <param name="movie" value="play.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#ffffff" />
      <embed src="play.swf" quality="high" bgcolor="#ffffff" width="550" 
             height="400" name="swfcontent" align="middle" allowScriptAccess="sameDomain" 
             type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
    </object>

</html>