<?php 
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg = sys_announcement::getOneAnnouncement();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
	
        <link type="text/css" rel="stylesheet" href="/cl/css/reset.css">
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
		$(window.parent.parent.document).find("#mainFrame").height(1318);

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
    <body>

<div class="banner" style="width:100% !important;background: #1b191a;">

<style>
#main_flash{height:455px;}
.layout{width:1000px;margin:auto;height:38px;line-height:38px;}
.flexslider,.slides li{height:455px;}
.flexslider ol .flex-active{
  background: #007aff;
  opacity:1;
}
.flexslider ol a{
  background: #000;
  border-radius: 100%;
  opacity: .2;
}
</style>
      <div id="main_flash">
      	 <div class="flexslider">
      	           <ul class="slides">
                        <li style="background:url(/imgs/hun_a_1488707729.jpg) center no-repeat;"></li>
                        <li style="background:url(/imgs/123.jpg) center no-repeat;"></li>
                        <li style="background:url(/imgs/hun_a_1489059286.jpg) center no-repeat;"></li>
      	                <li style="background:url(/imgs/hun_a_1489065989.jpg) center no-repeat;"></li>
      	                <li style="background:url(/imgs/hun_a_1492171125.jpg) center no-repeat;"></li>
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


<!-- 公告开始 -->
   <div class="cl h42"></div>
    <div style="background:url(/pic/newbg.png);
    width: 100%;
    height: 38px;
    position: relative;
    margin-top: -35px;
    z-index: 3;">
    	<div class="layout" style="background: url(/pic/newtl.png) left center no-repeat;">
                <marquee scrollamount="3" scrolldelay="150" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="cursor: pointer; margin-left:80px;"><span id="messageSpan"><?=$msg;?></span></marquee>
            </div>
    </div>	 
<!-- 公告结束 -->
<!-- 开始 -->
<div class="content">
  <div class="inner">
    <div class="cl h24"></div>
    <div class="deximgbx psr">
      <div class="fl dexmgbx dexmgbx1">
        <img src="/imgs/dexmg1.png" alt="">

        <div class="dexzhez">
          <div class="cl h44"></div>
          <a style="display:block;margin-top:-95px;" onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" ><img src="/imgs/egame_img.png" alt=""></a>
        </div>

      </div>

      <div class="fr dexmgbx dexmgbx2">
        <img src="/imgs/dexmg2.png" alt="">

        <div class="dexzhez">
          <div class="cl h44"></div>
          <a style="display:block;margin-top:-100px;" onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);"><img src="/imgs/live_img.png" alt=""></a>
        </div>

      </div>
      <div class="cl h14"></div>

      <div class="fl dexmgbx dexmgbx3">
        <img src="/imgs/dexmg3.png" alt="">

        <div class="dexzhez">
          <div class="cl h44"></div>
          <div class="cl h44"></div>

          <a onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"><img src="/imgs/3x1.png" alt=""></a>
          <a onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"><img src="/imgs/3x2.png" alt=""></a>
          <a onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"><img src="/imgs/3x3.png" alt=""></a>

        </div>

      </div>

      <div class="fr dexmgbx dexmgbx4">
        <img src="/imgs/dexmg4.png" alt="">

        <div class="dexzhez">
          <div class="cl h44"></div>
          <div class="cl h44"></div>
          <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"><img src="/imgs/4x1.png" alt=""></a>
          <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"><img src="/imgs/4x2.png" alt=""></a>
          <div class="cl"></div>
          <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"><img src="/imgs/4x3.png" alt=""></a>
          <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"><img src="/imgs/4x4.png" alt=""></a>
          
        </div>

      </div>

      <div class="zhongquan"><a href="javascript:void(0);" target="_blank"><img src="/imgs/zhongquan.png" alt=""></a></div>
      <div class="cl "></div>
    </div>
    <div class="cl h42"></div>
  </div>
</div>

<div class="cl h42"></div>
<style>
.content{
  background:#1b191a;
}
.dexmgbx{
  display:block;
  width: 493px;
  height:246px;
  position:relative;
}
.dexmgbx:hover .dexzhez{
  display:block;
}
.dexzhez{
  width:499px;
  height: 252px;
  position:absolute;
  left: -3px;
  text-align:center;
  display:none;
  top: -3px;
}
.dexzhez a{
  margin:0px 12px;
}
.dexmgbx1 .dexzhez{
  background: url(/imgs/dexzbg1.png) no-repeat left top;
}.dexmgbx2 .dexzhez{
  background: url(/imgs/dexzbg2.png) no-repeat left top;
}.dexmgbx3 .dexzhez{
  background: url(/imgs/dexzbg3.png) no-repeat left top;
}.dexmgbx4 .dexzhez{
  background: url(/imgs/dexzbg4.png) no-repeat left top;
}
.zhongquan{
  position:absolute;
  left:50%;
  top:50%;
  margin-left:-96px;
  margin-top:-100px;
}
.h14 {
    height: 14px;
}
.h24 {
    height: 24px;
}
.h44 {
    height: 44px;
}
.cl {
    clear: both;
}
.psr {
    position: relative;
}
</style>      
      <!-- 结束 -->
    
    
  <div class="dianhuabx">
    <div class="inner">
      <div class="ficn1bx">
      <span class="ficon1">客服QQ：3215981524</span>
      <span class="ficon2">客服电话：0085230501824</span>
      <span class="ficon3">邮箱：sunbet.scs@yahoo.com</span>
      <span class="ficon4"><a onclick="window.open('<?=$web_site["web_kefu"]?>', '在线客服', 'height=500, width=700, top=200, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" style="float: left;color: #fff;font-size: 18px;">在线客服</a></span>
        <div class="cl"></div>
      </div>
      <div class="cl"></div>
      <div class="tac">
        <img src="/imgs/fkimg.jpg" style="height: 262px;width:1004px;">
      </div>
      <div class="cl"></div>
    </div>
  </div>
  <div class="cl"></div>

<style>

.dianhuabx {
    background: #171516;
}
.inner{
  width: 1000px;
  margin:0 auto;
}
.ficn1bx{
  line-height:68px;
}
.ficn1bx span{
  float:left;
  color:#fff;
  font-size:17px;
  padding-left:43px;
  margin-right:22px;
}
</style>
 
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
