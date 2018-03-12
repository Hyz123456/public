<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/website.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$web_site['web_name']?>---线路通畅检查中心</title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
<style>
</head>
<script language="javascript">
function HotNewsHistory(){
window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
}
</script>
<script language="javascript">
if(self==top){
	top.location='/index.php';
}
function menu_click(id){
	parent.topFrame.document.getElementById("textGlitter"+id).click();
	}
function page_click(id){
	window.parent.document.getElementById(id).click();
	}

/*$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});*/
$(window.parent.parent.document).find("#mainFrame").height(905);

</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<body>
<style>
#sub{width:1000px;}



.pagesbanner {height:433px;position:relative;width:100%;}
.pagesbanner .gonggao {height:35px;background:url(/pic/gonggaobg.png) top center no-repeat;line-height:35px;color:#c8a365;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}
.pages {overflow:hidden;width:100%;margin:auto;}
.about {width:960px;background:#0a0c1c;height:auto;overflow:hidden;padding:20px;}
.about .aboutleft {width:240px;float:left;height:auto;overflow:hidden;background:#141c37}
.about .aboutleft h6 {background:#1c3568;text-align:center;font-size:22px;font-weight:bold;color:#fff;font-family:"Microsoft Yahei";width:240px;line-height:55px;margin-bottom:20px;}
.about .aboutleft ul li {height:51px;padding-left:30px;overflow:hidden;line-height:16px;width:170px;margin:0 auto 10px auto;}
.about .aboutleft ul li a {height:40px;display:block;padding-top:8px;}
.about .aboutleft ul li span {background:url(/pic/aboutico.png) no-repeat;width:38px;height:38px;display:block;float:left;margin-right:20px;}
.about .aboutleft ul li:hover span,.about .aboutleft ul li.on span {background:url(/pic/abouticoon.png) no-repeat;}
.about .aboutleft ul li span.ico01 {background-position:0 0}
.about .aboutleft ul li span.ico02 {background-position:0 -54px}
.about .aboutleft ul li span.ico03 {background-position:0 -109px}
.about .aboutleft ul li span.ico04 {background-position:0 -164px}
.about .aboutleft ul li span.ico05 {background-position:0 -219px}
.about .aboutleft ul li span.ico06 {background-position:0 -274px}
.about .aboutleft ul li a {color:#e5e5e5;font-size:16px;font-family:"Microsoft Yahei";}
.about .aboutleft ul li a b {font-size:10px;font-family:Arial;}
.about .aboutleft ul li:hover,.about .aboutleft ul li.on {background:#0c0f24;}
.about .aboutleft ul li:hover a,.about .aboutleft ul li.on a {color:#faae30}
.about {width:960px;background:#0a0c1c;height:auto;overflow:hidden;padding:20px;}
.about .aboutleft {width:240px;float:left;height:auto;overflow:hidden;background:#141c37}
.about .aboutleft h6 {background:#1c3568;text-align:center;font-size:22px;font-weight:bold;color:#fff;font-family:"Microsoft Yahei";width:240px;line-height:55px;margin-bottom:20px;}
.about .aboutleft ul li {height:51px;padding-left:30px;overflow:hidden;line-height:16px;width:170px;margin:0 auto 10px auto;}
.about .aboutleft ul li a {height:40px;display:block;padding-top:8px;}
.about .aboutleft ul li span {background:url(/pic/aboutico.png) no-repeat;width:38px;height:38px;display:block;float:left;margin-right:20px;}
.about .aboutleft ul li:hover span,.about .aboutleft ul li.on span {background:url(/pic/abouticoon.png) no-repeat;}
.about .aboutleft ul li span.ico01 {background-position:0 0}
.about .aboutleft ul li span.ico02 {background-position:0 -54px}
.about .aboutleft ul li span.ico03 {background-position:0 -109px}
.about .aboutleft ul li span.ico04 {background-position:0 -164px}
.about .aboutleft ul li span.ico05 {background-position:0 -219px}
.about .aboutleft ul li span.ico06 {background-position:0 -274px}
.about .aboutleft ul li a {color:#e5e5e5;font-size:10px;font-size:16px;font-family:"Microsoft Yahei";}
.about .aboutleft ul li a b {font-family:Arial;}
.about .aboutleft ul li:hover,.about .aboutleft ul li.on {background:#0c0f24;}
.about .aboutleft ul li:hover a,.about .aboutleft ul li.on a {color:#faae30}
#sub{width: 680px;float: right; height: auto; overflow: hidden;}
.color{    font-size: 14px;color: #ffd800; font-weight: bold;line-height: 26px;}
#Union1 p{line-height:22px;}
</style>
<body>
<div class="pagesbanner" style="background:url(/pic/bannerwelcome.jpg) top center no-repeat">
	<div class="gonggao">
		<div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();">~欢迎光临~</marquee>
         </div>
	</div>
</div>

<div class="pages" style="background:url(/pic/aboutbg.jpg) top center">
	<div class="about w1000">
		<div class="aboutleft">
  			<h6>欢迎光临</h6>
  			<ul>
				<li><a href="javascript:click_url('/app/member/help/dlhz1.php');"><span class="ico01"></span>关于我们<br><b>ABOUT US</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz2.php');"><span class="ico02"></span>联络我们<br><b>CONTACT US</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz3.php');"><span class="ico03"></span>合作伙伴<br><b>PARTNER</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz4.php');"><span class="ico04"></span>存款帮助<br><b>DEPOSIT</b></a></li>
				<li class="on"><a href="javascript:click_url('/app/member/help/dlhz5.php');"><span class="ico05"></span>取款帮助<br><b>WITHDRAW</b></a></li>
				<li class="side-item side-item6"><a href="javascript:click_url('/app/member/help/dlhz6.php');"><span class="ico06"></span>常见问题<br><b>QUESTIONS</b></a></li>
			</ul>
		</div>
		<div id="sub">
						
<style>
	#kin_01{text-align: center;line-height: 250px;color: #000;width: 535px;height: 330px;border-radius: 10px;background:#fff;float: left;margin-left: 108px;border: 1px solid #aaa;}
	
	#kin_cx{width: 520px;height: 45px;border: 1px solid #ccc;border-radius: 5px;margin-left: 6px;margin-top: 6px;color: #000;line-height: 45px;text-indent:0.5em;}
	
	#kin_img{width:108px;height:34px;background-image:url(/pic/kin_cx.png);border:none;color:#fff;    margin-top: 20px;}
	#kin_img:hover{background-position:108px 0px;}
</style>

<body bottommargin="0" topmargin="0" leftmargin="0">
	<div align="center" style="padding-top:150px;">
	<center>
	<script language="javascript">
	tim=1
	setInterval("tim++",100)
	b=1
	var autourl=new Array()
	autourl[1]='http://<?=$web_site['check_url1']?>';
	autourl[2]='http://<?=$web_site['check_url2']?>';
	autourl[3]='http://<?=$web_site['check_url3']?>';
	autourl[4]='http://<?=$web_site['check_url4']?>';
	autourl[5]='http://<?=$web_site['check_url5']?>';
	autourl[6]='http://<?=$web_site['check_url6']?>';
	autourl[7]='http://<?=$web_site['check_url7']?>';
	autourl[8]='http://<?=$web_site['check_url8']?>';
	</script>
	<script src="timtest.js"></script>
	</center>
	</div>
</body>
</html>