
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
 <script type="text/javascript">
    function GetQueryString(name)//这个方法去获得get参数
    {
        var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if(r!=null)return  unescape(r[2]); return null;
    }
    function load(){
        document.getElementById((GetQueryString("btn"))).click();
    }
    </script>
<link rel="stylesheet" rev="stylesheet" href="/cl/css/reset.css" type="text/css">
<body onload='load()'>
<style>
#qh{width:1000px;height:93px;margin:auto;margin-top:20px;}

#agby{display:block;}
#bbin{display:none;}
#agyx{display:none;}
#mgyx{display:none;}
#pt{display:none;}
/*#a{width:200px;height:93px;background:url('games_spirits.png'); float:left;position: relative;
    z-index: 99999;}
	
#a2{width:200px;height:93px;background:url('games_spirits.png')-200px 284px; float:left;position: relative;
    z-index: 99999;}

#a51{width:200px;height:93px;background:url('games_spirits.png')-400px 284px; float:left;position: relative;
    z-index: 99999;}

#b{width:200px;height:93px;background:url('games_spirits.png')-600px 284px; float:left;position: relative;
    z-index: 99999;}

#c{width:200px;height:93px;background:url('games_spirits.png')-800px 284px; float:left;position: relative;
    z-index: 99999;}*/
</style>
<style>
*{padding:0;margin:0;}
body{font-size: 12px;line-height: 18px; font-family:"微软雅黑";background: #000;}
*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}

.pagesbanner {height:230px;position:relative;width:100%;background:url(/pic/subban2.jpg) top  no-repeat}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg3.png) center no-repeat;line-height:30px;color:#FFF;position:absolute;bottom:0px;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}
.pages {overflow:hidden;width:100%;margin:auto;}

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
    font-family: ΢���ź�, Arial;
    font-size: 14px;
    height: 30px;
    line-height: 30px;
	}
</style>

<div class="pagesbanner">
    <div class="gonggao">
        <div class="w1000" id="memberLatestAnnouncement">
            <marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
         </div>
    </div>
</div>



<div class="cl h24"></div>

<style type="text/css"> 
.subban3{background: url(/pic/subban2.jpg) no-repeat center top;}
</style>
<div style="width: 100%;background: url(/pic/subbg2.jpg) no-repeat center top;">
  <div id="page-body" class="clearfix"> 
<link rel="stylesheet" type="text/css" href="/cl/css/css.css">
<style type="text/css">.tab1 ul.game_category li a, .tab1 .search a.serch_but{}</style>
<div class="tab1" id="tab1" style="position: static;">
      <div class="divgmenu">
        <ul class="ul_ul">
          <li class="zhu_gameClass off" onClick="show('s1')" id="a"  style="width: 111.111px;">
            <span class="bg_col">AG捕鱼</span>
            <span class="act-img"></span>
          </li>
          <li class="  zhu_gameClass" onClick="show('a2')" id="a2" style="width: 111.111px;">
            <span class="bg_col">PT电子</span>
            <span class="act-img"></span>
          </li>
          <li class="  zhu_gameClass" onClick="show('s15')" id="s51" style="width: 111.111px;">
            <span class="bg_col">MG电子</span>
            <span class="act-img"></span>
          </li>
          <li class="  zhu_gameClass" onClick="show('s2')" id="b" style="width: 111.111px;">
            <span class="bg_col">BBIN电子</span>
            <span class="act-img"></span>
          </li>
         <li class="  zhu_gameClass" onClick="show('s3')" id="c" style="width: 111.111px;">
            <span class="bg_col">AG电子</span>
            <span class="act-img"></span>
          </li>
        </ul>
      </div>
      <div class="menudiv">
           
<div class="iframe_por" id="agby">    
    <iframe class="iframe" width="1000" height="405" src="../../newag2/agby/index.php" frameborder="0" scrolling="no"></iframe>
</div>
<style>
 .iframe_por{ width:1000px; min-height:405px; margin:0 auto; overflow:hidden; position:relative;}
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
        <iframe class="iframe15" width="1000" height="1850" src="../../newmg2/Mga/one.php" frameborder="0" scrolling="no"></iframe>
    </div>
    


<style>
 .iframe_por15{ width:1000px; height:1850; margin:0 auto; overflow:hidden; position:relative;}
 .iframe15{position:absolute; left:0px; top:0px; }
</style> 



<div class="iframe_por3" id="bbin">    
    <iframe class="iframe3" width="1000" height="1250" src="../../newbbin2/bbin/one.php" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por3{ width:1000px; min-height:1250px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe3{position:absolute; left:0px; top:0px; }
</style> 

<div class="iframe_por2" id="agyx">    
    <iframe class="iframe2" width="1000" height="3100" src="../../newag2/ag/one.php" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por2{ width:1000px; min-height:1250px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe2{position:absolute; left:0px; top:0px; }
</style>  
      </div>
    </div>
  </div>

</div>

<script language="JavaScript">
$(window.parent.document).find("#mainFrame").height(710);
</script>

<script>
function show(ss){


	if(ss =="s1"){
		document.getElementById('agby').style.display="block";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="none";

        $("#a").attr("class", "zhu_gameClass off");
        $('#a2').attr("class", "zhu_gameClass");
        $('#s51').attr("class", "zhu_gameClass");
        $('#b').attr("class", "zhu_gameClass");
        $('#c').attr("class", "zhu_gameClass");

        
	
		$(window.parent.document).find("#mainFrame").height(710);
	}if(ss =="a2"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="block";
		
        $("#a").attr("class", "zhu_gameClass");
        $('#a2').attr("class", "zhu_gameClass off");
        $('#s51').attr("class", "zhu_gameClass");
        $('#b').attr("class", "zhu_gameClass");
        $('#c').attr("class", "zhu_gameClass");
        
		
		$(window.parent.document).find("#mainFrame").height(1594);
	}
	if(ss =="s15"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="block";
		document.getElementById('pt').style.display="none";

        $("#a").attr("class", "zhu_gameClass");
        $('#a2').attr("class", "zhu_gameClass");
        $('#s51').attr("class", "zhu_gameClass  off");
        $('#b').attr("class", "zhu_gameClass");
        $('#c').attr("class", "zhu_gameClass");

		
		$(window.parent.document).find("#mainFrame").height(2150);
	}
	if(ss =="s2"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="block";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="none";
		
		$("#a").attr("class", "zhu_gameClass");
        $('#a2').attr("class", "zhu_gameClass");
        $('#s51').attr("class", "zhu_gameClass");
        $('#b').attr("class", "zhu_gameClass  off");
        $('#c').attr("class", "zhu_gameClass");


		$(window.parent.document).find("#mainFrame").height(1430);
	}
	if(ss =="s3"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="block";
		document.getElementById('mgyx').style.display="none";
		document.getElementById('pt').style.display="none";
			
        $("#a").attr("class", "zhu_gameClass");
        $('#a2').attr("class", "zhu_gameClass");
        $('#s51').attr("class", "zhu_gameClass");
        $('#b').attr("class", "zhu_gameClass");
        $('#c').attr("class", "zhu_gameClass  off");
		
		$(window.parent.document).find("#mainFrame").height(1430);
	}
	
	
 }

</script>
</body>
</html>