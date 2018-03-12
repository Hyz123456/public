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
    <script src="/cl/js/jquery-1.7.2.min.js"></script>
    <link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet"/>
    <link href="/cl/tpl/starball/ver1/css/starball.css" rel="stylesheet"/>
    <script src="/cl/js/common.js?v=2.0"></script>
    <script src="/cl/js/tools/upup.js"></script>
    <script src="/cl/js/tools/float.js"></script>
    <script src="/cl/js/pluging/swfobject.js"></script>
    <script src="/cl/js/pluging/jquery.cookie.js"></script>
    <script src="/cl/tpl/starball/ver1/js/starball.js"></script>
    <script src="/cl/js/tools/ScrollPic.js"></script>
    <link type="text/css" rel="stylesheet" href="/cl/js/reset.css">
    <link type="text/css" rel="stylesheet" href="/cl/js/style.css">
    <link type="text/css" rel="stylesheet" href="/cl/css/global.css">
    <link type="text/css" rel="stylesheet" href="/cl/css/reset.css">
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
       
    <div class="header" id="mainBody_bg" style="background: #000;border-bottom: 1px solid #fff6df; height: 113px;">
    <div class="inner" id="mainBody" style="width: 1000px;">

     <div class="logo fl">
     <h1><a title="<?=$web_site["web_name"]?>" href="javascript:;" >
     <div id="indexLgDIV" style="width: 234px;height: 72px;margin-left: -10px;">
        <img src="/imgs//hun_a_1490267281.png" class="logoObj">
        <script type="text/javascript">
           /* var lgwidth = $('.logoObj').parents('div#indexLgDIV').width();
            var lgheight = $('.logoObj').parents('div#indexLgDIV').height();
            $('.logoObj').css({'width': lgwidth,'height': lgheight}); */
        </script>
    </div>
    </a></h1>
    </div>


      <div class="fr">
        <div class="fr">
          <div class="topnav fl">
<!--            <a href="javascript:click_url('/app/member/help/vipselect.php');" target="_blank" class="yanse2">VIP贵宾会</a> -->
            <a href="javascript:click_url('/app/member/help/vipselect2.php','',1);" target="_blank" class="yanse2">VIP贵宾会</a> 
            |  
            <a href="javascript:click_url('/cl/offer.php');" target="_blank" class="yanse1">优惠申请</a> 
            | 
            <a href="javascript:click_url('');" target="_blank" class="yanse2">资讯端下载</a> 
            |   
            <a href="javascript:click_url('/app/member/help/dlhz6.php');" class="yanse3">常见问题</a>  
            |   
            <a href="/Navigation" target="_blank" class="yanse4">线路检测</a>
            |   
            <a href="javascript:click_url('/app/member/help/dlhz3.php');" href="javascript:void(0);" class="yanse1">代理合作</a>
          </div>
          <div class="molila">
            <div class="molicun"> <img src="/imgs/gq1.png" class="vm" alt=""> 简体中文</div>
          </div>
          <div class="cl"></div>
        </div>








    <div class="cl"></div>
                
    <?php 
    //如果未登入
    if (!$uid){
    ?>


    <style>
.dengbtn {
    float: left;
    width: 57px;
    height: 30px;
    background: url(/imgs/dengbtn.png) no-repeat left center;
    margin-right: 3px;
}

a {
    text-decoration: none;
}
    </style>
    <form name="LoginForm" id="LoginForm" onsubmit="return false;">        
    <div class="denglubox h30">
          <div class="denginptwa w129">
            <input type="text" class="sinpt denginpt"   onfocus="if(this.value=='账号'){this.value='';}" onblur="if(this.value==''){this.value='账号';document.getElementById('mockpass').focus();}else{document.getElementById('mockpass').focus();}" value="账号" maxlength="20" tabindex="1" id="username" name="username">
          </div>
          
          <div class="denginptwa w129">
            <input type="password"  class="sinpt denginpt" id="mockpass" value="·····" onfocus="document.getElementById('mockpass').style.display='none'; document.getElementById('passwd').style.display=''; document.getElementById('passwd').focus();">
            <input type="password" style="display: none;" onblur="if(this.value=='') {document.getElementById('passwd').style.display='none'; document.getElementById('mockpass').style.display='';}" class="sinpt denginpt" id="passwd" name="passwd">
          </div>
          
          <div class="denginptwa w129">
            <input  type="text" value="验证码"  onblur="if(this.value=='') {this.value=this.defaultValue}" class="rmNum  login_input02" id="rmNum" maxlength="4" name="rmNum" style="width:95px;">
            <img width="38" height="19" border="0" align="absmiddle" src="/imgs/no.png" onclick="getKey();" id="vPic">

          </div>


        <a value="" type="button" onclick="aLeftForm1Sub();" href="javascript:void(0);" class="dengbtn"  name="formsub"></a>
        <a onclick="click_url('/cl/reg.php')" href="javascript:void(0);"><img src="/imgs/kaihu.png" alt=""></a> 
    </div>
    </form>
 
    <?php  }else{ ?>

    <div class="denglubox h30">
          <div class="dengluhou">
            
            <span class="huang">帐号：<?php  echo $username; ?></span>    
            <span class="huang">系统余额： <font size="2" id="user_money">0.00</font></span>

            <div class="ele-obalance-wrap js_ele_obalance_wrap" style="display:inline-block;">
            <div class="ele-accinfo ele-other-balance">
                <img src="/cl/jiahao.png">
            </div>
                <div class="ele-obalance-item-wrap ele-item-style-cover js_ele_obalance_item_wrap showBBIN ">
                <div class="ele-obalance-item">
                    <div class="ele-obalance"><span>系统余额：</span><font size="2" id="user_money">0 元</font></div>
                    <div class="ele-obalance"><span>AG余额：  </span><font size="2" id="generalA">0 元</font></div>
                    <div class="ele-obalance"><span>BBIN余额：</span><font size="2" id="generalB">0 元</font></div>
                    <div class="ele-obalance"><span>MG余额：  </span><font size="2" id="generalC">0 元</font></div>
                    <div class="ele-obalance"><span>PT余额：  </span><font size="2" id="generalF">0 元</font></div>
                    <div class="ele-obalance"><span>AB余额：  </span><font size="2" id="generalD">0 元</font></div>
                    <div class="ele-obalance"><span>NA余额：  </span><font size="2" id="generalE">0 元</font></div>
                  </div>
                <div class="ele-balance-tool clearfix">
                   <a id="edzh"  onclick="click_url('/cl/?module=MACenterView&other=moneyView')" href="javascript: ;" title="额度转换">额度转换</a>
                </div>
                <style>

                    /*clear float*/
                    .clearfix:before, .clearfix:after { content:""; display:table;}
                    .clearfix:after { clear:both;}
                    .clearfix { *zoom:1;}
                    .js_ele_obalance_item_wrap{
                        display:none;
                        position: absolute;
                        opacity: 1;
                        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                        width: 270px;
                        -webkit-box-shadow: 0 2px 8px rgba(0,0,0,0.5);
                        -moz-box-shadow: 0 2px 8px rgba(0,0,0,0.5);
                        box-shadow: 0 2px 8px rgba(0,0,0,0.5);
                        border-radius: 2px;
                        color: #000;
                        font-size: 12px;
                        background: #FFF56B;
                        cursor: default;
                        z-index: 9999;
                        right: 0;
                        text-align: left;
                    }
                    .js_ele_obalance_wrap{position:relative}
                    .js_ele_obalance_wrap .ele-obalance{
                            line-height: 22px;
                            color:#000;
                    }
                    .js_ele_obalance_wrap .ele-obalance strong{
                            color:#000;
                    }
                    .ele-obalance-item{
                        padding: 16px;
                    }
                    .ele-obalance-item strong{
                        font-weight: normal;
                    }
                    .ele-obalance{
                        padding-bottom: 2px;
                        color: #444;
                    }
                    /* 額度轉換 */
                    .ele-balance-tool{
                        padding: 4px;
                        background: #F4F4F4;
                    }
                    .ele-balance-tool a{
                        float: right;
                        padding: 4px 8px;
                        color: #FFF;
                        background: #555;
                        -o-transition: background-color .20s linear;
                        -webkit-transition: background-color .20s linear;
                        -moz-transition: background-color .20s linear;
                        transition:  background-color .20s linear;
                        border-radius: 2px;
                        text-decoration: none;
                    }
                    .ele-balance-tool a:hover{
                        background: #000;
                    }
                    .js_ele_obalance_wrap:hover .js_ele_obalance_item_wrap{
                    display:block;
                }
                </style>

            </div>
            </div>
            &nbsp;&nbsp;&nbsp;
     <!--   <a id="su-macenter" href="javascript: f_com.MGetPager('MACenterView','memberData');" title="会员中心">会员中心</a>
            | 
            <a id="su-deposite" href="javascript: f_com.MGetPager('MACenterView','bankSavings');" title="线上存款">线上存款</a> 
            | 
            <a id="su-withdraw" href="javascript: f_com.MGetPager('MACenterView','bankTake');" title="线上取款">线上取款</a>
            | 
            <a  id="su-switch" href="javascript: f_com.MGetPager('MACenterView','moneyView');" title="额度转换">额度转换</a> 
            | 
            <a id="su-msg" href="javascript: f_com.MGetPager('MACenterView','msg');" title="未读讯息">未读讯息(<span id="msg_num">0</span>)</a> 

             -->
            <a id="su-macenter" href="javascript:;" onclick="click_url('/cl/?module=MACenterView&other=memberData')" title="会员中心">会员中心</a>
            | 
            <a id="su-deposite" href="javascript:;" onclick="click_url('/cl/?module=MACenterView&other=bankATM1')" title="线上存款">线上存款</a> 
            | 
            <a id="su-withdraw" href="javascript:;" onclick="click_url('/cl/?module=MACenterView&other=bankTake')" title="线上取款">线上取款</a>
            | 
            <a id="su-switch"   href="javascript:;" onclick="click_url('/cl/?module=MACenterView&other=moneyView')" title="额度转换">额度转换</a> 
            | 
            <a id="su-msg"      href="javascript:;" onclick="click_url('/cl/?module=MACenterView&other=msg')" title="未读讯息">未读讯息(<span id="msg_num">0</span>)</a>
            <a id="su-logout" href="javascript: f_com.logoff('/app/member/logout.php');" title="登出"><span class="huang">登出</span> </a>
          </div>
        </div>

            <?php  } ?>
        
<div class="cl"></div>

        <div class="cl"></div>
        <div class="fr">
          <div class="nav">
            <ul>
              <li><a onclick="click_url('/cl/main.php')" href="javascript:void(0);" target="_top">首页</a></li>         
              <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" data-color="#fff|#ff0000" class="js-article-color" style="color: rgb(255, 255, 255);">电子游艺</a>
              </li>    
              <li><a onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);">真人视讯</a></li>     
              <li>
<!--                <a target="_self" onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);" class="LS-ball hong">体育投注</a>-->
                    <a target="_self" onclick="click_url('/app/member/sport_index.php')" href="javascript:void(0);" class="LS-ball hong">体育投注</a>
              </li>     
              <li>
<!--                       <a onclick="click_url('/member/lottery/cpyx.php')" href="javascript:void(0);">彩票游戏</a>-->
                    <a onclick="click_url('/member/lottery/Cqssc.php')" href="javascript:void(0);">彩票游戏</a>
                </li>     
              <li><a onclick="click_url('/cl/offer.php')" href="javascript:void(0);" data-color="#fff|#ff0000" class="js-article-color" style="color: rgb(255, 255, 255);">优惠活动</a></li>    
              <li><a href="javascript:click_url('/app/member/help/dlhz3.php');" target="_blank" class="hong">代理合营</a></li>
              <li><a onclick="window.open('<?=$web_site["web_kefu"]?>');" href="javascript:void(0);" class="hong">在线客服</a></li>
            </ul>
          </div>
        </div>
      </div>
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
    new toggleColor('.js-article-color', ['#DD1B20', '#fff'], 500);
    new toggleColor('.yanse1', ['#00e4ff', '#fff'],350);
	new toggleColor('.yanse2', ['#fcff00', '#fff'],350);
    new toggleColor('.yanse3', ['#ff7800', '#fff'],350);
    new toggleColor('.yanse4', ['#00ff18', '#fff'],350);

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