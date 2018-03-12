
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


<body >
<style>
#qh{width:1000px;height:88px;margin:auto;}

#agby{display:none;}
#bbin{display:none;}
#agyx{display:none;}
#mgyx{display:none;}
#pt{display:block;}

#a{width:200px;height:88px;background:url(AG1.png); float:left;position: relative;
    z-index: 99999;}
	
#a51{width:200px;height:88px;background:url(MG1.png); float:left;position: relative;
    z-index: 99999;}

#b{width:200px;height:88px;background:url(BB1.png); float:left;position: relative;
    z-index: 99999;}
#c{width:200px;height:88px;background:url(AG21.png); float:left;position: relative;
    z-index: 99999;}
	
	#e{width:200px;height:88px;background:url(PT1.png);float:left;}

.a1{width:200px;height:88px;background:url(AG.png) !important;float:left;}


.a5{width:200px;height:88px;background:url(MG.png)!important;float:left;}
.b1{width:200px;height:88px;background:url(BB.png) !important;float:left;}
.c1{width:200px;height:88px;background:url(AG2.png) !important;float:left;}
.ee{width:200px;height:88px;background:url(PT.png) !important; float:left;}

.ee1{width:200px;height:88px;background:url(PT1.png) !important; float:left;}
#pt{width: 1000px; height:912px; margin: 8px auto; box-shadow: rgb(0, 0, 0) 0px 0px 10px;}

.c2{width:200px;height:88px;background:url(AG21.png); float:left;position: relative;
    z-index: 99999;}
</style>
<style>
*{padding:0;margin:0;}
#img{width:100%;height:244px;background:url('dzyy.jpg')center;margin-top:40px;}
#img1{width:100%;height:331px;
background:url('about_top.png')no-repeat center;margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background: url('about_bg01.png')no-repeat center;margin-top:-180px} #bgs{width: 1129px;background: url(about_bg02.png)center repeat-y #AD8425;min-height: 888px;margin: auto;}
    .about_bg{ width:100%;height:auto; background:url(/cl/bg2.jpg);background-repeat: repeat-x; }
.bgs1{    width: 1130px;
    background: url(about_bg021.png)center repeat-y;
    min-height: 38px;
    margin: -37px auto;
}
</style>
<div id="img"></div>
		      <div class="about_bg">
		
		
		       <div class="zxxx" style="    background-image: url(/cl/zxgg1.jpg);
    background-repeat: no-repeat;
    height: 45px;
    background-position: center;}">
            <div style="width: 1000px; margin: 0px auto; line-height: 42px; color: #fff;">
                <marquee scrollamount="3" scrolldelay="150" direction="left" onmouseover="this.stop();" onclick="HotNewsHistory();"  onmouseout="this.start();" style="cursor: pointer; margin-left: 80px;font-size:13px;"><span id="messageSpan"><?=$msg;?></span></marquee>
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
												<div class="ele-nav-guid-wrap" style=" margin-top:10px;background: url('/cl/about_txt_bg_top.png') center top no-repeat;
width: 100%;
height: 80px;">
           
        </div>
		
		<div class="zhon" style="height:auto;width:1030px;background:#623D08;margin:auto;border:1px solid #D69E15;margin-top:-8px;">

<div id="qh" style="padding-top:10px;">
	<div id="e" onclick="show('s5')" style="background:url(PT.png);"></div>
	<div id="a" onclick="show('s1')"></div>
	<div id="a51" onclick="show('s15')"></div>
	<div id="b" onclick="show('s2')"></div>
	<div id="c" onclick="show('s3')"></div>
		
</div>

<div class="iframe_por3"  id="pt" >    
	<iframe class="iframe3" width="1000" height="950" src="../../pttjj/one.php" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por3{ width:1000px; height:950px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe3{position:absolute; left:0px; top:0px; }
</style> 


	<div class="iframe_por" id="agby">    
		<iframe class="iframe" width="1000" height="720" src="../../newag2/agby" frameborder="0" scrolling="no"></iframe>
	</div>
	


<style>
 .iframe_por{ width:1000px; min-height:720px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe{position:absolute; left:0px; top:0px; }
</style> 



<div class="iframe_por15" id="mgyx">    
		<iframe class="iframe15" width="1000" height="920" src="../../newmg2/MG" frameborder="0" scrolling="no"></iframe>
</div>



<style>
 .iframe_por15{ width:1000px; min-height:920px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe15{position:absolute; left:0px; top:0px; }
</style> 



<div class="iframe_por3" id="bbin">    
	<iframe class="iframe3" width="1000" height="6500" src="../../newbbin2/game_02.php" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por3{ width:1000px; min-height:6490px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe3{position:absolute; left:0px; top:0px; }
</style> 

<div class="iframe_por2" id="agyx">    
	<iframe class="iframe2" width="1000" height="3100" src="../../newag2/agyx" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por2{ width:1000px; min-height:3080px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe2{position:absolute; left:0px; top:0px; }
</style> 















</div>


<script language="JavaScript">
$(window.parent.document).find("#mainFrame").height(1450);
</script>

<script>
function show(ss){

	
	
			if(ss=="s5"){

		document.getElementById('a').className="aa1";
		document.getElementById('b').className="b";
		document.getElementById('c').className="c2";
			document.getElementById('a51').className="a51";
						document.getElementById('e').className="ee";
						
							document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
		
		
				document.getElementById('pt').style.display="block";
		
		$(window.parent.document).find("#mainFrame").height(1480);	
		}
	
	if(ss =="s1"){
		document.getElementById('agby').style.display="block";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
			document.getElementById('pt').style.display="none";
		
		document.getElementById('a').className="a1";
		document.getElementById('b').className="b";
		document.getElementById('c').className="c";	
				document.getElementById('e').className="ee1";
		document.getElementById('a51').className="a51";	
		$(window.parent.document).find("#mainFrame").height(1250);
	}
	if(ss =="s15"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="block";
			document.getElementById('pt').style.display="none";
		document.getElementById('a').className="aa1";
		
		document.getElementById('b').className="b";
		document.getElementById('c').className="c";	
			document.getElementById('a51').className="a5";
				document.getElementById('e').className="ee1";
		$(window.parent.document).find("#mainFrame").height(1450);
	}
	if(ss =="s2"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="block";
		document.getElementById('agyx').style.display="none";
		document.getElementById('mgyx').style.display="none";
			document.getElementById('pt').style.display="none";
		document.getElementById('a').className="aa1";
		document.getElementById('b').className="b1";
		document.getElementById('c').className="c";	
			document.getElementById('a51').className="a51";
				document.getElementById('e').className="ee1";
		$(window.parent.document).find("#mainFrame").height(7025);
	}
	if(ss =="s3"){
		document.getElementById('agby').style.display="none";
		document.getElementById('bbin').style.display="none";
		document.getElementById('agyx').style.display="block";
		document.getElementById('mgyx').style.display="none";
		
				document.getElementById('pt').style.display="none";
		
		document.getElementById('a').className="aa1";
		document.getElementById('b').className="b";
		document.getElementById('c').className="c1";
			document.getElementById('a51').className="a51";
				document.getElementById('e').className="ee1";
		$(window.parent.document).find("#mainFrame").height(3610);
	}
	

 }

</script>
</div>
</div>
</body>
</html>