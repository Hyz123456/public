<?php 
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
	
		   <link rel="stylesheet" href="/cl/css.css">
<link type="text/css" rel="stylesheet" href="/cl/layer.css" id="skinlayercss">
    <link href="css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script language="javascript" src="images/swfobject_source.js"></script>
    <script src="/cl/js/common.js"></script>
    <script language="javascript">
	<?php if($_SESSION["agent_id"]!="" && $_GET['action']!="userclick"){
        ?>
        click_url('/cl/reg.php');
        <?php 
        }?>
    function HotNewsHistory(){
            window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
        }
		function i(ur,w,h){
		document.write('<object id="firstJackpot" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
		function ii(ur,w,h){
		document.write('<object style="margin-left:-12px;" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
    </script>
    <script language="JavaScript">
		$(window.parent.parent.document).find("#mainFrame").height(1071);
        if(self==top){
            top.location='/';
        }
        function menu_click(id){
            parent.topFrame.document.getElementById("textGlitter"+id).click();
        }
        function page_click(id){
            window.parent.document.getElementById(id).click();
        }
        function mover(o){
            o.style.backgroundPosition='0 bottom';
        }

        function mout(o){
            o.style.backgroundPosition='0 top';
        }
    </script>
  
    <style>
        #pic_box{ width:960px; overflow:hidden; margin:0 auto; }
        #pic_box a{ 
            display: block;
            float: left;
            width: 240px;
            height: 220px;
         }
         #pic_box .pic_abg1{ background:url(/imgs/game_tyss.png) center top; }
         #pic_box .pic_abg2{ background:url(/imgs/game_zryl.png) center top; }
         #pic_box .pic_abg3{ background:url(/imgs/game_six.png) center top; }
         #pic_box .pic_abg4{ background:url(/imgs/game_cpyx.png) center top; }

         #aBtn{ width:1000px; margin:0 auto; height:97px; line-height:97px; }
         #aBtn a{ float:left; display:inline-block; width:240px; height:40px; margin:30px 0 0 13px; }
         #aBtn .aBtn_1{ background:url(/imgs/btn_mail.png) center top; }
         #aBtn .aBtn_2{ background:url(/imgs/btn_phone.png) center top; }
         #aBtn .aBtn_3{ background:url(/imgs/btn_qq.png) center top; }
         #aBtn .aBtn_4{ background:url(/imgs/btn_service.png) center top; }
         #aBtn a:hover{ background-position:center bottom; }
    </style>
    </head>
    <body id="sy_bg">

<div class="banner" style="width:100% !important;height:1176px !important;background:url(/imgs/container_bg1.png) top center;padding-bottom:40px;">

<style>
#main_flash{height:632px;}
.layout{width:1000px;margin:auto;height:38px;line-height:38px;}

</style>
      <div id="main_flash">
      	 <div class="flexslider">
      	           <ul class="slides">
      	                <li style="background:url(/imgs/flash1.png) center no-repeat;"></li>
      	                <li style="background:url(/imgs/flash2.png) center no-repeat;"></li>
      	                <li style="background:url(/imgs/flash3.png) center no-repeat;"></li>
      	                <li style="background:url(/imgs/flash4.png) center no-repeat;"></li>
      	                <!--li style="background:url(/imgs/flash5.png) center no-repeat;"></li-->
      	            </ul> 
					 
      	        </div> 


    <!-- js调用部分begin -->
    <script src="/cl/css/jquery.min.js"></script>
    <script src="/cl/css/jquery.flexslider-min.js"></script>
    <script>
    $(function(){
        $('.flexslider').flexslider({
            directionNav: true,
            pauseOnAction: false
        });
    });
    </script>
<!-- js调用部分end -->
	</div>
   
    <div style="background: url(/pic/gonggaobg.png) top center no-repeat;
    width: 100%;
    height: 38px;
    position: relative;
    margin-top: -35px;
    z-index: 999;">
    	<div class="layout">
                <marquee scrollamount="3" scrolldelay="150" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="cursor: pointer; margin-left:80px;"><span id="messageSpan"><?=$msg;?></span></marquee>
            </div>
    </div>	
    
    <div class="quick-entry layout m-t-30">
            <ul class="clearfix">
                <li><a onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);" class="box baccarat-entry"><span class="tit">百家乐</span><span class="txt">独创包桌及咪牌玩法</span><em></em></a></li>
                <li><a onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);" class="box lh-entry"><span class="tit">龙虎</span><span class="txt">与美女荷官贴身肉搏</span><em></em></a></li>
                <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="box roulette-entry"><span class="tit">轮盘</span><span class="txt">转一转就有好运气</span><em></em></a></li> 
                <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="box dice-entry"><span class="tit">PT电子</span><span class="txt">华人传统心跳博弈</span><em></em></a></li>
                <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="box f-b-entry"><span class="tit">MG电子</span><span class="txt">亚洲顶级MG电子平台</span><em></em></a></li>
                <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="box b-b-entry"><span class="tit">BBin电子</span><span class="txt">NBA全程精彩投注</span><em></em></a></li>
                <li><a target="_self" onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);" class="box marksix-entry"><span class="tit">体育投注</span><span class="txt">男女老幼都喜爱</span><em></em></a></li>
                <li><a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" class="box finance-entry"><span class="tit">彩票投注</span><span class="txt">赔率最高，体验最好</span><em></em></a></li>
            </ul>
      </div>
    
    <!---->
    <div class="home-menu clearfix">
		<ul>
			<li class="menu-reg"><a onclick="click_url('/cl/reg.php')" href="javascript:void(0);"></a></li>
            <li class="menu-promotions"><a onclick="click_url('/cl/offer.php')" href="javascript:void(0);"></a></li>
            <li class="menu-online"><a onclick="window.open('http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2210536129%22%2C%22userId%22%3A%2223505387%22%7D', '在线客服', 'height=500, width=700, top=200, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"></a></li>
            </ul>
        </div>
    	
            
      </div>
	  
	<style>
.layout{width: 1000px;margin: 0 auto;}
.quick-entry ul {padding: 15px 0;zoom:1;}
.quick-entry li {width: 250px;padding-bottom: 20px;float: left;display: inline;position: relative;}
.quick-entry li a {display: block;cursor: pointer;background: url(/imgs/quick_entry_spirits.png) no-repeat;
height: 62px;}
.quick-entry li a.baccarat-entry {background-position: 0 -486px;}
.quick-entry li a.lh-entry{background-position:0 7px;}
.quick-entry li a.roulette-entry{background-position: 0 -562px;}
.quick-entry li a.dice-entry{background-position: 0 -405px;}
.quick-entry li a.f-b-entry{background-position: 0 -154px;}
.quick-entry li a.b-b-entry{background-position: 0 -237px;}
.quick-entry li a.finance-entry{background-position: 0 -326px;}
.quick-entry li a.marksix-entry{background-position: 0 -74px;}
.quick-entry li a span.tit {font: 18px/24px "Microsoft YaHei";color: #fff;padding-top: 5px;}
.quick-entry li a span {display: block;line-height: 30px;color: #b5ab99;margin-left: 82px;}
.quick-entry li a em {background: url(/imgs/common_spirits.png) no-repeat;display: inline-block;width: 23px;height: 21px;position: absolute;right: 10px;top: 18px;}
.quick-entry li a em {background-position: -150px -450px;}
.quick-entry li a:hover em{background-position: -150px -478px;}

.home-menu {width: 980px;margin: 0 auto;zoom: 1;}
.home-menu li {float: left;display: inline;}
.home-menu li.menu-promotions {margin: 0 16px;}

.home-menu li a {background: url(/imgs/home_spirits.png) no-repeat;display: block;width: 314px;height: 240px;
border: 1px solid #525252;border-radius: 3px;overflow: hidden;}
.home-menu li a:hover{border:1px solid #ffc000;border-radius:3px;}
.home-menu li.menu-promotions a {background-position: -331px 0;}
.home-menu li.menu-online a {background-position: -662px 0;}
.home-menu li.menu-reg a:hover{background-position:0 -240px;}
.home-menu li.menu-promotions a:hover{background-position:-331px -240px;}
.home-menu li.menu-online a:hover{background-position:-662px -240px;}
	</style>  
	  
	  

  
  
  
    
</body>
</html>
