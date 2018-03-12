
<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title></title>
<script src="/js/jquery-1.7.1.js"></script>

</head>


<body>
<style>
#qh{width:1000px;height:93px;margin:auto;}

#agby{display:block;}
#bbin{display:none;}
#agyx{display:none;}
#mgyx{display:none;}
#pt{display:none;}
#a{width:200px;height:93px;background:url('games_spirits.png'); float:left;position: relative;
    z-index: 99999;}
	
#a2{width:200px;height:93px;background:url('games_spirits.png')-200px 284px; float:left;position: relative;
    z-index: 99999;}

#a51{width:200px;height:93px;background:url('games_spirits.png')-400px 284px; float:left;position: relative;
    z-index: 99999;}

#b{width:200px;height:93px;background:url('games_spirits.png')-600px 284px; float:left;position: relative;
    z-index: 99999;}

#c{width:200px;height:93px;background:url('games_spirits.png')-800px 284px; float:left;position: relative;
    z-index: 99999;}
/* 
.a1{width:194px;height:93px;background:url('games_spirits.png')0px -135px !important;float:left;}
.a5{width:194px;height:93px;background:url('games_spirits.png')-241px 0px !important;float:left;}
.b1{width:194px;height:93px;background:url('games_spirits.png')-471px 0px !important;float:left;}
.c1{width:194px;height:93px;background:url('games_spirits.png')-731px 0px !important;float:left;} */
</style>
<style>
*{padding:0;margin:0;}
#img{
width: 100%;
    height: 282px;
    background: url(dzyy.jpg)center no-repeat;
    margin-top: -18px;}
#img1{width:100%;height:331px;
background:url('about_top.png')no-repeat center;margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background: url('about_bg01.png')no-repeat center;margin-top:-180px} #bgs{width: 1130px;background: url(about_bg02.png)center repeat-y #AD8425;min-height: 888px;margin: auto;}

.bgs1{    width: 1130px;
    background-image: url(about_bg021.png);
	background-position:center;
	background-repeat: repeat-y;
    min-height: 38px;
    margin: -37px auto;
}

.fonts{   
    cursor: pointer;
    position: absolute;
    left: 50%;
    top: 130px;
    margin-left: -273px;
    color: white;
    font-family: Î¢ÈíÑÅºÚ, Arial;
    font-size: 14px;
    height: 30px;
    line-height: 30px;
	}
</style>
<div id="img"></div>
<div id="img1"><marquee onclick="HotNewsHistory();" style="font-family: Î¢ÈíÑÅºÚ, Arial;" class="fonts" scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div>
<div id="img2"></div>
<div id="bgs">
<div id="qh">
	<div id="a" onclick="show('s1')"></div>
	<div id="a2" onclick="show('a2')"></div>
	<div id="a51" onclick="show('s15')"></div>
	<div id="b" onclick="show('s2')"></div>
	<div id="c" onclick="show('s3')"></div>
</div>

	<div class="iframe_por" id="agby">    
		<iframe class="iframe" width="1000" height="720" src="../../newag2/agby" frameborder="0" scrolling="no"></iframe>
	</div>
	


<style>
 .iframe_por{ width:1000px; min-height:720px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe{position:absolute; left:0px; top:0px; }
</style> 

<div class="iframe_por33" id="pt" >    
	<iframe class="iframe33" width="1000" height="1550" src="../../pttjj/one.php" frameborder="0" scrolling="no"></iframe>
</div>
<style>
 .iframe_por33{ width:1000px; height:1273px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe33{position:absolute; left:0px; top:0px; }
</style>












<div class="iframe_por15" id="mgyx">    
		<iframe class="iframe15" width="1000" height="1700" src="../../newmg2/Mga/one.php" frameborder="0" scrolling="no"></iframe>
	</div>
	


<style>
 .iframe_por15{ width:1000px; height:1642px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe15{position:absolute; left:0px; top:0px; }
</style> 



<div class="iframe_por3" id="bbin">    
	<iframe class="iframe3" width="1000" height="827" src="../../newbbin2/bbin/one.php" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por3{ width:1000px; min-height:899px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe3{position:absolute; left:0px; top:0px; }
</style> 

<div class="iframe_por2" id="agyx">    
	<iframe class="iframe2" width="1000" height="3100" src="../../newag2/ag/one.php" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por2{ width:1000px; min-height:938px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe2{position:absolute; left:0px; top:0px; }
</style> 
</div>
<div class="bgs1"></div>

<script language="JavaScript">
$(window.parent.document).find("#mainFrame").height(1286);
</script>

<script>
function show(ss){


	if(ss =="s1"){
		document.getElementById('agby').style.display="block";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="none";
		
	
		$(window.parent.document).find("#mainFrame").height(1286);
	}if(ss =="a2"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="block";
		
		
		$(window.parent.document).find("#mainFrame").height(1762);
	}
	if(ss =="s15"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="block";
		document.getElementById('pt').style.display="none";
		
		$(window.parent.document).find("#mainFrame").height(2131);
	}
	if(ss =="s2"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="block";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="none";
		
		
		$(window.parent.document).find("#mainFrame").height(1390);
	}
	if(ss =="s3"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="block";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="none";
			
		
		
		$(window.parent.document).find("#mainFrame").height(1428);
	}
	
	
 }

</script>
</body>
</html>