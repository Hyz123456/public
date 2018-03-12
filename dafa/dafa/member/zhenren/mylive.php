<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/website.php");
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
@include_once($C_Patch."/app/member/class/user.php");
@include_once($C_Patch."/live/agid.php");
$uid = $_SESSION['userid'];
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$web_site['web_name']?></title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
     // if(self==top){
     //     top.location='/index.php';
     // }
</script>

<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript" src="/js/top.js"></script>
<script language="javascript" src="/cl/js/common.js"></script>
<link href="/member/zhenren/newindex/standard.css?_=171" rel="stylesheet" type="text/css" />
<link href="/member/zhenren/newindex/haier2.css" rel="stylesheet" type="text/css">
<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<link href="/cl/css/reset.css" rel="stylesheet" type="text/css">
<style>
body{font-size: 12px;line-height: 18px; font-family:"微软雅黑";}
*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}

.pagesbanner {height:230px;position:relative;width:100%; background:url(/pic/subban3.jpg) top no-repeat;}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg3.png) top center no-repeat;line-height:30px;color:#FFF;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}
.pages {overflow:hidden;width:100%;margin:auto;}

.ine {width: 1000px;margin: 0 auto;}
.shixunul {padding-top: 60px;margin: -25px -5px;}
.shixunul li {float: left;width: 324px;height: 230px;background: #101729;border: 1px solid #595c87;position: relative;margin: 0px 5px; margin-bottom: 60px;}
.shixunul li:hover {    background: #ffce4b;}
.shixunul li:hover .jinrubtn {    background: #81511c;    color: #fff;}
.shixunul li:hover .sjoxibt {    color: #000;}
.shixunimg {position: absolute;bottom: 42px;left: 4px;}
.sjoxibt {position: absolute;left: 16px;bottom: 0px;line-height: 48px;color: #fff;}
.jinrubtn {position: absolute;width: 121px;height: 33px;line-height: 33px;right: 16px;bottom: 7px;background: #ffce4b;border-radius: 33px;text-align: center;color: #000;font-size: 18px !important;}
.slogo {    position: absolute;    left: 16px;    top: 18px;}
.sdabts {    position: absolute;    left: 16px;    color: #fff;    top: 88px;    line-height: 18px;}
.zaixianrs {    position: absolute;    left: 16px;    bottom: 55px;    color: #fffd8a;}
.zaixianrs span {color: #ffce4b;}

</style>
<body>

<!-- 公告开始 -->
<div class="pagesbanner" >
	<div class="gonggao">
	    <div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
		</div>
	</div>
</div>
<!-- 公告结束 -->
<div class="cl h24"></div>

<!-- 内容开始 -->

<div style="width: 100%;background: #000">
<div class="ine">
<ul class="shixunul" style="overflow: hidden;">
<li>
    <a class="shixunimg"><img src="/pic/shixun7.png" alt=""></a>
    <span class="sjoxibt">BBIN视讯</span>
    <a href="/newbbin2" target="_blank"  onclick="return logins();" class="jinrubtn">进入游戏</a>
    <div class="slogo"><img src="/pic/sxlog2.png" alt=""></div>
    <div class="sdabts">亚洲最流行的真人娱乐</div>
    <div class="zaixianrs">在线人数：<span id="o1">1144</span></div>
</li>
<li>
    <a class="shixunimg"><img src="/pic/shixun3.png" alt=""></a>
    <span class="sjoxibt">AG视讯</span>
    <a href="/newag2"  target="_blank" onclick="return logins();" class="jinrubtn">进入游戏</a>
    <div class="slogo"><img src="/pic/sxlog3.png" alt=""></div>
    <div class="sdabts">日本AV荷官女郎
    <br> 为您发牌</div>
    <div class="zaixianrs">在线人数：<span id="o2">1312</span></div>
</li>

<li>
    <a class="shixunimg"><img src="/pic/shixun5.png" alt=""></a>
    <span class="sjoxibt">MG视讯</span>
    <a href="/newmg2" target="_blank" onclick="return logins();" class="jinrubtn">进入游戏</a>
    <div class="slogo"><img src="/pic/sxlog5.png" alt=""></div>
    <div class="sdabts">体验英国赌场
    <br> 的视觉冲击</div>
    <div class="zaixianrs">在线人数：<span id="o3">866</span></div>
</li>

<li>
    <a class="shixunimg"><img src="/pic/shixun8.png" alt=""></a>
    <span class="sjoxibt">AB视讯</span>
    <a href="/newab2" target="_blank"  onclick="return logins();" class="jinrubtn">进入游戏</a>
    <div class="slogo"><img src="/pic/sxlog8.png" alt=""></div>
    <div class="sdabts">最专业的完善的
    <br> 娱乐平台</div>
    <div class="zaixianrs">在线人数：<span id="o4">1446</span></div>
</li>

<!--<li>
<a class="shixunimg"><img src="/pic/shixun1.png" alt=""></a>
<span class="sjoxibt">PT视讯</span>
<a href="/newpt2" target="_blank" onclick="return logins();" class="jinrubtn">进入游戏</a>
<div class="slogo"><img src="/pic/sxlog1.png" alt=""></div>
<div class="sdabts">亚洲顶级博彩服务商
<br> 娱乐平台</div>
<div class="zaixianrs">在线人数：<span id="o5">1751</span></div>
</li>-->

<!--<li>
<a class="shixunimg"><img src="/pic/shixun12.png" alt=""></a>
<span class="sjoxibt">PT视讯</span>
<a href="/newpt2"" target="_blank" onclick="return logins();" class="jinrubtn">进入游戏</a>
<div class="slogo"><img src="/pic/sxlog12.png" alt=""></div>
<div class="sdabts">靓丽台湾女主播荷官</div>
<div class="zaixianrs">在线人数：<span id="o6">1680</span></div>
</li>-->

</ul>
</div>
</div>

<script>
    var i1 = 1254 + parseInt(Math.random() * 1000, 10);
    var i2 = 254 + parseInt(Math.random() * 1000, 10);
    var i3 = 554 + parseInt(Math.random() * 1000, 10);
    var i4 = 654 + parseInt(Math.random() * 1000, 10);
    var i5 = 700 + parseInt(Math.random() * 1000, 10);
    var i6 = 1200 + parseInt(Math.random() * 1000, 10);
    var i7 = 1252 + parseInt(Math.random() * 1000, 10);
    var i8 = 1110 + parseInt(Math.random() * 1000, 10);
    var i9 = 1100 + parseInt(Math.random() * 1000, 10);
    var i10 = 1320 + parseInt(Math.random() * 1000, 10);
    var i11 = 1010 + parseInt(Math.random() * 1000, 10);
    var i12 = 1350 + parseInt(Math.random() * 1000, 10);
    var max4 = 9999;
    var id4;
    function add4() {
        if (i4 < max4) {
            i4 += 5;
            i1 += 6;
            i2 += 7;
            i3 += 8;
            i5 += 9;
            i6 += 10;
            i7 += 11;
            i8 += 12;
            i9 += 13;
            i10 += 14;
            i11 += 15;
            i12 += 16;
            id1 = setTimeout("add4()", 1000);
            document.getElementById("o1").innerHTML = i1;
            document.getElementById("o2").innerHTML = i2;
            document.getElementById("o3").innerHTML = i3;
            document.getElementById("o4").innerHTML = i4;
            document.getElementById("o5").innerHTML = i5;
            document.getElementById("o6").innerHTML = i6;
            // document.getElementById("o7").innerHTML = i7;
            // document.getElementById("o8").innerHTML = i8;
            // document.getElementById("o9").innerHTML = i9;
            // document.getElementById("o10").innerHTML = i10;
            // document.getElementById("o11").innerHTML = i11;
            // document.getElementById("o12").innerHTML = i12;
        } else {
            clearTimeout(id4);
        }
    }
    add4();
</script>

<!-- 内容结束 -->





<!--
<div class="pages" style="background:url(/pic/livebg.jpg) top center no-repeat;">
	<div class="yive w1000">
		<ul>
			
			<li class="ico02">
            	<a href="javascript:void(0)">
					<div class="litop"></div> <img src="/pic/02.jpg" width="280" height="160">全网唯一日本AV女郎发牌
				</a>
				<div class="hover">
				<a class="enter" href="/live/ag.php"  target="_blank" onclick="return logins();">进入游戏</a>
				</div>
			</li>
			<li class="ico01">
            	<a href="javascript:void(0)">
					<div class="litop"></div> <img src="/pic/01.jpg" width="280" height="160">亚洲最大的娱乐博彩集团
				</a>
					<div class="hover">
						<a class="enter" href="/live/bbin.php" target="_blank"  onclick="return logins();">进入游戏</a>
					</div>
             </li>
			 <li class="ico04">
             	<a href="javascript:void(0)">
					<div class="litop"></div> <img src="/pic/04.jpg" width="280" height="160">美女荷官感官刺激
				</a>
				<div class="hover">
					<a class="enter"  href="/live/ab.php" target="_blank"  onclick="return logins();">进入游戏</a>
				</div>
             </li>
			 <li class="ico06">
             	<a href="javascript:void(0)">
					<div class="litop"></div> <img src="/pic/06.jpg" width="280" height="160">东南亚最大赌场舒适体验
				</a>
				<div class="hover">
					<a class="enter" href="/live/mg.php" target="_blank" onclick="return logins();">进入游戏</a>
				</div>
            </li>
			<li class="ico07">
            	<a href="javascript:void(0)">
					<div class="litop"></div> <img src="/pic/07.jpg" width="280" height="160">体验英国赌场的视觉冲击
				</a>
				<div class="hover">
					<a class="enter" href="/live/na.php" target="_blank" onclick="return logins();">进入游戏</a>
				</div>
            </li>
            <li class="ico03">
            	<a href="javascript:void(0)">
					<div class="litop"></div> <img src="/pic/03.jpg" width="280" height="160">VIP贵宾厅 如亲临澳门般享受
				</a>
				<div class="hover">
				<a  class="enter" href="/live/pt.php" target="_blank" onclick="return logins();">进入游戏</a>
				</div>
            </li>
		</ul>
	</div>
		<script type="text/javascript">
			$(function() {
				$(".pagesbanner").attr("style","background:url(/pic/subban3.jpg) top center no-repeat");
				$(".pages").attr("style","background:url(/pic/livebg.jpg) top center no-repeat;");
			})
		</script>
</div>
 -->
<!--    <div id="bg_000">
	   	<div class="main_bg"></div>
        <div class="about_bg">
            <div class="about_main_w">
                <div class="about_top">
                    <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"><marquee class="fonts" onclick="HotNewsHistory();"  scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div></div>
                </div>
                <div class="about_main">
                    <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">
                        
                    </div>
                    <div style="height:8px;"></div>
					<div style="width:1000px;margin:auto;"><a href="/newna2" target="_blank" onclick="return logins();"><img src="/imgs/dasdsdad.png"></a></div>
					 <div style="height:8px;"></div>-->








							<!-- <div style="width:1000px;margin:0 auto;">
							 <div style="padding: 0 10px 0 3px;width: 1000px;">
							                            
							<div style="width:1016px;height:66px;background:url(/imgs/sx-titbg.png) no-repeat center top;"></div>
										<div style="width:1000px; padding:0 10px 0 0;margin-left: 5px;">
											<div class="pic_list" style="border:1px #857609 solid;border-top: none;background: #291b02;">
													<div class="list_1">
														<a href="/newbbin2/"target="_blank" onclick="return logins();"></a>
														<a href="/newag2/" target="_blank"  onclick="return logins();"></a>
													</div>
												   <div class="list_2" style="display:none">
														<a href="javascript:;" ></a>
														<a href="javascript:;"></a>
													</div>
													 <div class="list_3">
														<a href="/newmg2/"target="_blank"  onclick="return logins();"></a>
														<a href="/newallbet2/" target="_blank"  onclick="return logins();"></a>
													</div> 
										 </div>
										</div>
								</div>
							 </div>-->

		
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
    <script>

    $(window.parent.parent.document).find("#mainFrame").height($(document.body).outerHeight(true));
    $(window).ready(function(){
        var aDivList = $('.pic_list div');
        var arr = [['/imgs/11.png','/imgs/12.png','/imgs/1.png'],['/imgs/21.png','/imgs/22.png','/imgs/2.png'],['/imgs/31.png','/imgs/32.png','/imgs/3.png']];

        aDivList.each(function(i){
            aDivList.eq(i).on('mouseover','a',function(){
                $(this).parent().css('backgroundImage','url('+arr[$(this).parent().index()][$(this).index()]+')');
            });
            aDivList.eq(i).on('mouseout','a',function(){
                $(this).parent().css('backgroundImage','url('+arr[$(this).parent().index()][2]+')');
            });
        });        
    });
    </script>
    
    <script>
			
			function logins(){
				var  ontLogin = $(window.top.document.body).find('#topFrame').contents().find('#LoginForm');
				if( !ontLogin.size() ){
						return true;
				}else{
                     $(".zt_tkdl").show();

					//alert('请先登陆');
						return false;
				}
			};
	
	</script>

    

    </div>


    
</body>
</html><?
$mysqli->close();
?>