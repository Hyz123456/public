<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include "../app/member/include/com_chk.php";
include "../app/member/include/address.mem.php";
include "../app/member/cache/website.php";
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();


//include_once("../newag2/config.php");
include_once("../app/member/class/user.php");
//include_once("../newag2/api.class.php");

$userinfo       =   user::getinfo($uid);
$username  = $userinfo['user_name'];

$sql		=	"select * from user_list where user_id='$userid' limit 1";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		$bb_username	=	$rs['bb_username'];
		$ag_username	=	$rs['ag_username'];
		$username	=	$rs['user_name'];


?>



<!DOCTYPE html>
<html class="first zh-cn isLoginN ">
    <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet"/>
    <link href="/cl/tpl/starball/ver1/css/starball.css" rel="stylesheet"/>
    <script src="/cl/js/jquery-1.7.2.min.js"></script>
    <script src="/cl/js/common.js?v=2.0"></script>
    <script src="/cl/js/tools/upup.js"></script>
    <script src="/cl/js/tools/float.js"></script>
    <script src="/cl/js/pluging/swfobject.js"></script>
    <script src="/cl/js/pluging/jquery.cookie.js"></script>
    <script src="/cl/tpl/starball/ver1/js/starball.js"></script>
    <script src="/cl/js/tools/ScrollPic.js"></script>
    <link type="text/css" rel="stylesheet" href="/cl/js/reset.css">
    <link type="text/css" rel="stylesheet" href="/cl/js/style.css">
    <script type="text/javascript" src="/cl/js/menu.js"></script>

	<style>
	
	input{    outline: none;}
	
	*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}
	
	.head-t{height: 30px;overflow: hidden;}
.head-t div:first-child{float: left;padding-top: 5px;}
.head-t div:first-child img { padding-right: 10px;}  
.head-t div:last-child {float: right;color: #a4a4a4; font-size: 12px; line-height: 30px;} 
.head-t div:last-child  a {padding: 0 8px;}
	</style>
    <!--[if IE 6]>
    <style type="text/css">
        html {
            overflow-x: hidden;
        }

        body {
            padding-right: 1em;
        }
    </style>
    <script src="/cl/js/pluging/jquery.ifixpng.js"></script>
    <script>
        $(function () {
            $('img[src$=".png?_=171"],img[src$=".png"],.blk_29 .LeftBotton, .blk_29 .RightBotton').ifixpng();
        });
        //修正ie6 bug
        try {
            document.execCommand("BackgroundImageCache", false, true);
        } catch (err) {
        }
    </script>
    <![endif]-->
    <script>
        <!--
        //Global variable for calculating page generation time
        var PageInitTime = new Date();
        var GameType = '';
		
		
		function _getYear(d){
			var yr=d.getYear();
			if(yr<1000) yr+=1900;
			return yr;
		}	
		function dateAdd(dateObj,days){
		var tempDate = dateObj.valueOf();
		tempDate = tempDate - days * 24 * 60 * 60 * 1000;
		tempDate = new Date(tempDate);
		return tempDate;
		} 
		function tick(){
			function initArray(){
				for(i=0;i<initArray.arguments.length;i++) this[i]=initArray.arguments[i];
			}
			var isnDays=new initArray("星期日","星期一","星期二","星期三","星期四","星期五","星期六","星期日");
			var todayy=new Date();
			var today =dateAdd(todayy,0.5);
			var hrs=today.getHours();
			var _min=today.getMinutes();
			var sec=today.getSeconds();
			var clckh=""+((hrs>12)?hrs-12:hrs);
			var clckm=((_min<10)?"0":"")+_min;clcks=((sec<10)?"0":"")+sec;
			var clck=(hrs>=12)?"下午":"上午";
			
			//document.getElementById("t_2_1").innerHTML = _getYear(today)+"/"+(today.getMonth()+1)+"/"+today.getDate()+"&nbsp;"+clckh+":"+clckm+":"+clcks+"&nbsp;"+clck+"&nbsp;"+isnDays[today.getDay()];
			document.getElementById("t_2_1").innerHTML ="美东时间:"+ _getYear(today)+"/"+(today.getMonth()+1)+"/"+today.getDate()+"&nbsp;"+clck+clckh+":"+clckm+":"+clcks;
			
			window.setTimeout("tick()", 100); 
		}

    function HotNewsHistory(){
            window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
        }
		
		
        // -->
		function i(ur,w,h){
		document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
    </script>
    </head>
    <body>
    <div id="mainBody_bg">
    <div id="mainBody">


<div class="head-t">
	<div>
	<a href="javascript:void(0)">　　　　　　　 　<img src="/pic/img01.png"></a>
    <a href="javascript:void(0)"><img src="/pic/img02.png"></a>
    <a href="javascript:void(0)"><img src="/pic/img03.png"></a>
	</div>
	<div>
		 
		<!--<a href="/moblie" style="cursor:pointer;" class="shans" target="_blank">手机下注</a>|-->
	    <a href="javascript:click_url('/app/member/help/vipselect.php');" class="textGlitter">VIP查询</a>|
		<a href="javascript:click_url('/cl/offer.php');" style="color:#4169E1;">优惠申请</a>|
		<a href="javascript:click_url('');" style="color:#008B00;">资讯端下载</a>|
        <a href="javascript:click_url('/app/member/help/dlhz6.php');" style="color:#9cef35;">常见问题</a>| 
        <a href="/Navigation" style="color:#48D1CC;" target="_blank">线路检测</a>| 
        <a href="javascript:click_url('/app/member/help/dlhz3.php');" style="color:#FFFFFF;">代理合作</a>

	</div>
</div>


	<div id="header">
	
	  <div style="width:180px;height:65px;position: absolute;left: 500px;top: 40px;">
	<embed src="/pic/img_word.swf" width="100%" height="100%" wmode="transparent"></div> 

	  <div id="header-logo" style="position: relative;left: 50%;top: 8px;margin-left: -500px;">
	  <a title="<?=$web_site["web_name"]?>"><img src="/pic/logo.png"></a> 

      </div>
      <div id="headtop">

                      
     
	<?php 
    //如果未登入
    if (!$uid){
    ?>
       

           <form name="LoginForm" id="LoginForm" onsubmit="return false;">         
                        
                  <input style="text-indent:10px;" type="text" onfocus="if(this.value=='账号'){this.value='';}" onblur="if(this.value==''){this.value='账号';document.getElementById('mockpass').focus();}else{document.getElementById('mockpass').focus();}" value="账号" class="login_input01" maxlength="20" tabindex="1" id="username" name="username">
				  
                  <input type="text" class="login login_input01" id="mockpass" value="·····" onfocus="document.getElementById('mockpass').style.display='none'; document.getElementById('passwd').style.display=''; document.getElementById('passwd').focus();">
                  <input type="password" style="display: none;" onblur="if(this.value=='') {document.getElementById('passwd').style.display='none'; document.getElementById('mockpass').style.display='';}" class="login login_input01" id="passwd" name="passwd">
				  
                  <input  type="text" value="验证码"  onblur="if(this.value=='') {this.value=this.defaultValue}" class="rmNum  login_input02" id="rmNum" maxlength="4" name="rmNum" style="width:95px;">
                   <img width="38" height="19" border="0" align="absmiddle" src="/yzm.php" onclick="getKey();" id="vPic">
				   
				   <input type="submit" id="ibtnLogin" name="formsub" onclick="aLeftForm1Sub();" value="登录"style="margin-left:-200px;">
				   
				<div id="loginbox2"><br>
                     <a class="forpwd" href="javascript:alert('忘记账号密码，请联系在线客服人员咨询取回！');">忘记密码</a>
                     <a onclick="click_url('/cl/reg.php')" href="javascript:void(0);" class="reg">立即注册</a>
					 <a href="javascript:alert('本网站现已暂停试玩，请联系客服咨询！');">免费试玩</a>
					 
                </div> 
                </form>
        </div>
           
        	  <?php 
            }else{
            ?>
<div style=" line-height: 30px;float: right;font-size: 14px;font-family: 微软雅黑; color: #fff;">
	<div id="top_login" style="height:30px;position:relative;">
	  <ul>
	  <li>帐号：<font size="2" style="font-size:12px;color: #FF0;"><b><?php  echo $username; ?></b></font></li><li>系统余额：<font size="2" id="user_money">0</font> 元</li>
	  <li class="btn_bbin"><img src="/cl/jiahao.png" style="margin-left: 4px;position: relative;top: 3px;" >
      
<style>
	
	.showBBIN p{
	height: 29px;
    width: 130px;
    text-align: center;}

    #edzh{
    width: 64px !important;
    height: 24px !important;
    margin-top: 8px;
    margin-left: 33px;
    display: block;

}
</style>
<div class="showBBIN " style="color:#000;width:130px;height: 210px;background-image: url(/cl/bggggg.png);position: absolute;z-index:900;">

			<p>AG余额：<font size="2" id="generalA">0 元</font></p>
			<p>BBIN余额：<font size="2" id="generalB">0 元</font></p>
			<p>MG余额：<font size="2" id="generalC">0 元</font></p>
			<p>PT余额：<font size="2" id="generalF">0 元</font></p>
			<p>AB余额：<font size="2" id="generalD">0 元</font></p>
			<p>NA余额：<font size="2" id="generalE">0 元</font></p>

		
			<a id="edzh" href="javascript: f_com.MGetPager('MACenterView','moneyView');" title="额度转换"></a>
					
</div> 
	  </li>

	   
<li>AG:<font size="2" id="generalA">---</font></li>
<li>BB:<font size="2" id="generalB">---</font></li>
<li>MG:<font size="2" id="generalC">---</font></li>
<li>AB:<font size="2" id="generalD">---</font></li>
<li>NA:<font size="2" id="generalE">---</font></li>
		 

	    
	  </ul>
	</div>
	<div id="mp3"></div>
<div id="SU-Menual-first">
	<ul>

	<li> <a id="su-macenter" href="javascript: f_com.MGetPager('MACenterView','memberData');" title="会员中心">会员中心</a>|</li>
	<li> <a id="su-deposite" href="javascript: f_com.MGetPager('MACenterView','bankSavings');" title="线上存款">线上存款</a>|</li>   
	<li> <a id="su-withdraw" href="javascript: f_com.MGetPager('MACenterView','bankTake');" title="线上取款">线上取款</a>|</li>                
	<li> <a id="su-switch" href="javascript: f_com.MGetPager('MACenterView','moneyView');" title="额度转换">额度转换</a>|</li>
	 <li><a id="su-account" href="javascript: f_com.MGetPager('MACenterView','ballRecord');" title="往来记录">往来记录</a>|</li> 
	<!--li> <a id="su-msg" href="javascript: f_com.MGetPager('MACenterView','msg');" title="未读讯息"><span id="msg_num_total">消息(<span id="msg_num"></span>)</span> &nbsp;</a> |&nbsp; </li-->
	<li> <a id="su-logout" href="javascript: f_com.logoff('/app/member/logout.php');" title="登出">退出</a> </li>
	</ul>
</div>
</div></div>
            <?php  } ?>
	  </div> 
</div>

<style>
	.showBBIN {
	    position: absolute;
   right:10px;
    top: 25px;
    width: 176px;
    height: 110px;
    overflow: hidden;
 display:none; 
   		
	}
     .showBBIN a {
		float: left;
		width: 80px !important;
		height: 110px !important;
		
	 }
   /*   .showBBIN a:nth-of-type(1) {
     		
     	 }
     	  .showBBIN a:nth-of-type(2) {
     		
     	 } */
</style>

        <div class="clear"></div>       
        <div class="menu">
	<div class="list" id="menulist">
		<ul style="width: 1130px;">
			<li><a onclick="click_url('/cl/main.php')" href="javascript:void(0);">首页</a></li>
			 <li class="erji"><a target="_self" onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);" class="menu2">体育赛事</a></li>
			 
		    <li class="erji"><a onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);" class="shans"   style="font-family:Arial;">真人娱乐</a><img src="/imgs/hot.gif" height="20" width="16" class="hot"></li>
			<!--li><a onclick="click_url('/member/lt/?rtype=SPbside',1)" href="javascript:void(0);">六合彩</a></li--> 
           	<li class="erji"><a class="textGlitter" onclick="click_url('/member/lottery/cpyx.php')" href="javascript:void(0);">彩票游戏</a></li>
            
            <li class="erji"><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);">电子游艺</a></li>
            <li class="erji"><a onclick="click_url('/member/zhenren/qipai.php')" href="javascript:void(0);">棋牌游戏</a></li>


            <li><a target="_self" onclick="click_url('/cl/offer.php')" href="javascript:void(0);"  class="textGlitter"  style="font-family:Arial;">优惠活动</a><img src="/imgs/hot.gif" height="20" width="16" class="hot">
            </li>
            <li><a href="javascript:click_url('/app/member/help/dlhz3.php');" >代理合营</a></li>
			<li><a onclick="window.open('<?=$web_site["web_kefu"]?>');">在线客服</a></li>
		</ul>
	</div>
	<div class="box" id="menubox" style="height: 0px; opacity: 0; overflow: hidden;">
	<div class="cont menusports" style="display:none;">
	<a  href="/newbbin2/index.php"  target="_blank" class="jr" style="position:absolute;padding-top:130px;width:200px;text-align:center;left:176px; bottom:0px">进入游戏</a>
				<a onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"class="jr" style="position:absolute;padding-top:130px;width:220px;text-align:center;left:378px; bottom:0px">进入游戏</a>
				<a href="javascript:alert('即将开放,敬请期待!')" class="jr" style="position:absolute;padding-top:130px;width:220px;text-align:center;left:619px; bottom:0px">进入游戏</a>
			</div>
			<div class="cont menulive" style="display:none;">
				<a href="javascript:alert('即将开放,敬请期待!')" class="jr" style="position: absolute; left:215px;padding-top:130px;bottom:0px">即将开放</a>
				<a href="/newag2/" target="_blank"  onclick="return logins();" class="jr" style="position: absolute; left:365px;padding-top:130px;bottom:0px">进入游戏</a>
				<a href="javascript:alert('即将开放,敬请期待!')" onclick="return logins();" class="jr" style="position: absolute; left:495px;padding-top:130px;bottom:0px">进入游戏</a>
				<a href="javascript:alert('即将开放,敬请期待!')"  onclick="return logins();" class="jr" style="position: absolute; left:635px;padding-top:130px;bottom:0px">即将开放</a>
				<a href="/newmg2/" target="_blank"  onclick="return logins();" class="jr" style="position: absolute; left:770px;padding-top:130px;bottom:0px">进入游戏</a>
				<a href="javascript:alert('即将开放,敬请期待!')" target="_blank" onclick="return logins();" class="jr" style="position: absolute; left:905px;padding-top:130px;bottom:0px">即将开放</a>
			</div>
            
			<div class="cont menulottery" style="display: block;">
				<a onclick="click_url('/member/lt/?rtype=SPbside',1)" href="javascript:void(0);" class="jr" style="position: absolute;left:300px;bottom:0px;">进入游戏</a> 
				<a onclick="click_url('/member/lottery/cqssc.php')" href="javascript:void(0);" class="jr" style="position: absolute;left:530px;bottom:0px;">进入游戏</a> 
<!--				<a href="/jsp/member/lottery/lotteryList.jsp" class="jr" style=" width:200px;height:108px;display:block;position:absolute;left:230px;top:0px;"></a>
				<a href="javascript:void(0)" class="jr" style=" width:200px;height:108px;display:block;position:absolute;left:480px;top:0px;" onclick="openWin3('/member/flex?type=loginapi&amp;key=dios','dios平台','no')"></a>-->
			</div>

			<div class="cont menuslots" style="display:none;">
				<a onclick="click_url('/member/lottery/dzyy.php?btn=a51')" href="javascript:void(0);" class="jr" style="position: absolute; left:238px; padding-top:130px;bottom:0px">进入游戏</a>
				<a onclick="click_url('/member/lottery/dzyy.php?btn=a2')" href="javascript:void(0);" class="jr" style="position: absolute; left:400px; padding-top:130px;bottom:0px">进入游戏</a>
				<a href="javascript:alert('即将开放,敬请期待')" class="jr" style="position: absolute; left:568px; padding-top:130px;bottom:0px">即将开放</a>
				<a onclick="click_url('/member/lottery/dzyy.php?btn=b')" href="javascript:void(0);" class="jr" style="position: absolute; left:730px; padding-top:130px;bottom:0px">进入游戏</a>
				<a onclick="click_url('/member/lottery/dzyy.php?btn=c')" href="javascript:void(0);" class="jr" style="position: absolute; left:892px; padding-top:130px;bottom:0px">进入游戏</a>
			</div>
        <div class="cont menuqipai" style="display: none;">
            <a onclick="click_url('/member/lottery/qpyx.php')" href="javascript:void(0);" class="jr" style="position: absolute;left:300px;bottom:0px;">进入游戏</a>
            <a onclick="click_url('/member/zhenren/qipai.php')" href="javascript:void(0);" class="jr" style="position: absolute;left:530px;bottom:0px;">进入游戏</a>
        </div>
			
		</div>
            
        <script>
			
			function logins(){
				var  ontLogin = $(window.top.document.body).find('#topFrame').contents().find('#LoginForm');
				if( !ontLogin.size() ){
						return true;
				}else{
					alert('请先登陆');
						return false;
				}
			};
	
	</script>    

      
        </div>

 </div>

	
</body>
</html>
<script src="/cl/js/tools/tab.js"></script>
<script src="/pt/assets/js/lib/sound.js"></script>

<script>
	(function(){
			$('.btn_bbin').hover(function(){
				$(this).find('.showBBIN').fadeIn();
			}, function(){
				$(this).find('.showBBIN').fadeOut();
			});
		})();
		
		(function(){
			$('.btn_bbin').on('mousedown', function(){

				 if( $.cookie('bbins') == 'yes' ){
					return false;
				}else {	
					
					var windows = window.open('http://777.gsoftbb.com/', '', 'height=10,width=10,top=1000,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no');

					var mb = myBrowser();
					
					if ("Safari" == mb) {
						setTimeout(function(){
							windows.close();
							$.cookie('bbins', 'yes');
						}, 1400);
					}else {
						setTimeout(function(){
							windows.close();
							$.cookie('bbins', 'yes');
						}, 700);
					}

				} 
			});

		function myBrowser(){
				var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
				var isOpera = userAgent.indexOf("Opera") > -1;
				if (isOpera) {
					return "Opera"
				}; //判断是否Opera浏览器
				if (userAgent.indexOf("Firefox") > -1) {
					return "FF";
				} //判断是否Firefox浏览器
				if (userAgent.indexOf("Chrome") > -1){
			  return "Chrome";
			 }
				if (userAgent.indexOf("Safari") > -1) {
					return "Safari";
				} //判断是否Safari浏览器
				if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {
					return "IE";
				}; //判断是否IE浏览器
			}
			//以下是调用上面的函数
	})();
	(function(){
		$('#rmNum').on('focus',function(){
				$('#vPic').attr('src','/yzm.php?'+Math.random());
				if(this.value==this.defaultValue) {
					this.value='';
				}
		});

	})();

    //最新消息
    $.ajax({
        type: 'POST',
        url: '?module=MGetData&method=GetHotNews&_r=' + Math.random(),
        cache: false,
        success: function (data) {
            $('#msgNews').html(data.replace(/<\s*br\/*>/gi, "&nbsp;&nbsp;"));
        }
    });
    // 密碼驗證
    $('input[name=passwd]').LoginPW({
       // 'Upper': '提醒：密码须为小写，大写锁定启用中',
        'Short': '密码长度不能少于6个字元',
        'Long': '密码长度不能多于20个字元'
        //'False': '密码须符合0~9及a~z字元'
    });
    function inputCheck() {
        if (document.LoginForm.username.value == "") {
            alert('请输入帐号!!');
            document.LoginForm.username.focus();
            return false;
        } else if (document.LoginForm.passwd.value == "") {
            alert('请输入密码!!');
            document.LoginForm.passwd.focus();
            return false;
        } else if (document.LoginForm.passwd.value.length > 0 && document.LoginForm.passwd.value.length < 6) {
            alert('密码长度不能少于6个字元');
            document.LoginForm.passwd.focus();
            return false;
        } else if (document.LoginForm.rmNum.value == "") {
            alert('请输入验证码!!');
            document.LoginForm.rmNum.focus();
            return false;
        }
        return true;
    }
    function Go_forget_pwd() {
        window.open("/app/member/forget_pwd.php?uid=guest", "Go_forget_pwd", "width=350,height=250,status=no");
    }

    function Language(langx) {
        parent.location = '".BROWSER_IP."';
    }

    function getKey() {
        $("#vPic").attr("src",'/yzm.php?'+Math.random());
        $("#vPic").css("display", "inline");
        $("#crPic").css("display", "inline");
        $("input[name='rmNum']").val("");
    }

    //下載版JS
    function downloadvwin() {
        window.open('/cl/?module=MRule&method=InstallationInstruction&type=download', 'downloadnew', 'width=1024,height=640,status=no,scrollbars=yes');
    }

    //文字閃爍
    new toggleColor('.textGlitter', ['#DD1B20', '#FDEB65'], 500);
	
	 new toggleColor('.shans', ['red', 'yellow'],350);

    //按鈕特效
    $('.hover_fade > a, .hover_fade > span, #event a, #joinUs a, #welcome div').hover(
        function () {
            $(this).stop().animate({'opacity': 0}, 650);
        }, function () {
            $(this).stop().animate({'opacity': 1}, 650);
        }
    );

    $("li.LS-live, li.LS-game").subTabs();

    //表單效果
    $("#LoginForm label").InputLabels();


    //設為首頁
    f_com.setHomepage = function (url) {
        if (document.all) {
            document.body.style.behavior = 'url(#default#homepage)';
            document.body.setHomePage(url);
        } else {
            alert("您的浏览器未支援此功能!");
        }
    };

    // 加入最愛
    f_com.bookmarksite = function (url, title) {
        if (window.sidebar || window.opera) {
            // for firfox
            window.sidebar.addPanel(title, url, "");
        } else if (document.all) {
            // for IE
            window.external.AddFavorite(url, title);
        } else {
            alert("您的浏览器未支援此功能!");
        }
    };
    //-->
</script>

<?php  if ($uid) { ?>
    <script language="javascript">
        function top_money() {
            $.getJSON("/app/member/getdata.php?callback=?", function (json) {
                    if (json.close == 1) {
                        parent.location.href = '/close.php';
                    }
                    //$("#tz_money").html(json.tz_money);
                    $("#user_money").html(json.user_money);
                    //$("#live_money").html(json.live_money);

					//$("#generalA").html(json.ag_money);
					//$("#generalB").html(json.bb_money);
					//$("#generalC").html(json.mg_money);
					//$("#generalD").html(json.ab_money);
					//$("#generalE").html(json.na_money);
					//$("#generalF").html(json.pt_money);
                    if(json.unread_count && json.unread_count>0){
                        $("#msg_num").html(json.unread_count);
                        shake($("#msg_num_total"),"red",5);
                        $("#mp3").html("<embed src='/images/new_info.mp3' width='0' height='0'></embed>");
                    }else{
                        $("#msg_num").html(0);
                    }

                }
            );
            setTimeout("top_money()", 5000);
        }
		/*function refresh_zr_money(){
			$.getJSON("/newbbin2/cha2.php?u=<?php  //echo $bb_username; ?>", function (json) {
					
			});
		}*/
		//refresh_zr_money();
        top_money();
        function shake(ele,cls,times){
            var i = 0,t= false ,o =ele.attr("class")+" ",c ="",times=times||2;
            if(t) return;
            t= setInterval(function(){
                i++;
                c = i%2 ? o+cls : o;
                ele.attr("class",c);
                if(i==2*times){
                    clearInterval(t);
                    ele.removeClass(cls);
                }
            },200);
        };
    </script>
<?php  } ?>