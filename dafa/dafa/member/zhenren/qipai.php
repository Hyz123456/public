<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
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
		 <link href="css.css" rel="stylesheet" type="text/css" />

</head>
<script language="javascript">
    if(self==top){
        top.location='/index.php';
    }

</script>

<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript" src="/js/top.js"></script>
<script language="javascript" src="/cl/js/common.js"></script>
<link href="/member/zhenren/newindex/standard.css?_=171" rel="stylesheet" type="text/css" />
<link href="/member/zhenren/newindex/haier2.css" rel="stylesheet" type="text/css">
<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<link href="/member/zhenren/qipai.css" rel="stylesheet" type="text/css">

<style>
    #bg_000 .main_bg{    width: 100%;
    height: 200px;
    background-image: url(/pic/bannerdx.jpg);background-position:center -145px;background-repeat:no-repeat;}
    

    #bg_000 .about_bg{ width:100%;}
    #bg_000 .about_main_w{ width:1030px; margin:0 auto; position:relative; margin:auto;margin-top:-10px; }
    .about_main_w .about_top{ width:1030px; height:240px; margin:auto;background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
    .about_main_w .about_main{    width: 1030px;
    margin: 25px auto;
    border: 1px solid #2F2F2F;
    background: #161616;}
	
	
	
	
	
    .about_main_top{
        background: url(../imgs/about_bg01.png) no-repeat center 0px;
        height: 89px;
        color: #fff;
        padding-left: 125px;
    }
    .pic_list div{ width:990px; height:254px; margin:0px auto 0; overflow:hidden; }
    div.list_1{ background:url(/imgs/1.png) no-repeat center top; margin-top:0; }
    div.list_2{ background:url(/imgs/2.png) no-repeat center top; }
    div.list_3{ background:url(/imgs/3.png) no-repeat center top; }
    .pic_list div a{ display:block; float:left; width:50%; height:100%; }
</style>
<body id="zhuce_body" style="padding: 0x;margin:0;min-width:100%;background:url(/pic/lotterybg.jpg) center center">
    <div id="bg_000" style="margin-top:40px;">
	   	<div class="main_bg"></div>
        <div class="about_bg">
		
		<style>
	.zxxx{width:1000px;margin:auto;background-image: url(/cl/news_bg.png);background-repeat: no-repeat;height: 45px;background-position: center left;}
		</style>
<div style="height:10px;"></div>
	<div class="zxxx" >
            <div style="width: 1015px; margin: 0px auto; line-height: 42px; color: #fff;background:url(/pic/gonggaobg.png) top center no-repeat">
                <marquee scrollamount="3" scrolldelay="150" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="cursor: pointer; margin-left:105px;"><span id="messageSpan" style="font-size:12px;font-family:'微软雅黑', Arial;"><?=$msg;?></span></marquee>
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
		
		  
            <div class="about_main_w">
			
			<!--
                <div class="about_top">
                    <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"><marquee onclick="HotNewsHistory();" style="cursor:pointer;color:white;" scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div></div>
                </div>-->
                <div class="about_main">
				
				<!--
                    <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">
                        
                    </div>-->
					
					
					<style>
.ele-live-wrap {padding: 3px 0 0px;font-size: 0;overflow: hidden;width: 900px;margin: 0 auto;}
.ele-live-align{position: relative;height:650px;}
.ele-live-align a{position: absolute;box-sizing: border-box;height: 650px;}
.ele-live-align a.ele-live-bb{left: 0;}
.ele-live-obg {position: absolute;top: 0;left: 0;display: block;width: 100%;height: 100%;opacity: 0;
filter: alpha(opacity=0);transition: opacity 0.25s linear 0s;-moz-transition: opacity 0.25s linear 0s;
-webkit-transition: opacity 0.25s linear 0s;-o-transition: opacity 0.25s linear 0s;}
.ele-current .ele-live-obg{opacity: 1;filter: alpha(opacity=100);}
.ele-live-cbg {display: block;width: 100%;height: 100%;}

.ele-live-bb .ele-live-obg{background-image: url('/cl/bbin450_n.jpg');}
.ele-live-bb .ele-live-cbg{background-image: url('/cl/bbin450_h.jpg');}
.ele-live-ag .ele-live-obg{background-image: url('/cl/ag450_n.jpg');}
.ele-live-ag .ele-live-cbg{background-image: url('/cl/ag450_h.jpg');}
.ele-live-ab .ele-live-obg{background-image: url('/cl/allbet450_n.jpg');}
.ele-live-ab .ele-live-cbg{background-image: url('/cl/allbet450_h.jpg');}
.ele-live-og .ele-live-obg{background-image: url('/cl/og450_n.jpg');}
.ele-live-og .ele-live-cbg{background-image: url('/cl/og450_h.jpg');}
.ele-live-gd .ele-live-obg{background-image: url('/cl/gd450_n.jpg');}
.ele-live-gd .ele-live-cbg{background-image: url('/cl/gd450_h.jpg');}
.ele-live-sa .ele-live-obg{background-image: url('/cl/sa450_n.jpg');}
.ele-live-sa .ele-live-cbg{background-image: url('/cl/sa450_h.jpg');}
.ele-live-obg,.ele-live-cbg{background-position: 0 0;background-repeat: no-repeat;}
.change-bg-pos .ele-live-cbg{background-position: -125px 0;}

</style>





        <style>
            .zrUl_ li {
                float: left;
            }
        </style>

                    <div id="center" style=" background:url('slotsbg.jpg') center top no-repeat;">
                        <div class="wrapc" id="wrapc">
                            <div style="clear:both;"></div>
                            <div class="pic">
                                <img src="slotsbanner.jpg">
                            </div>
                            <div id="wrapbox">
                                <div id="wrapw">
                                    <div id="wrapwhead"></div>
                                    <div id="wrapwcent">
                                        <div class="vgbox">
                                            <div class="vgebox">
                                                <a
                                                   <?php if(isset($_SESSION['userid'])){ ?>
                                                       href="/vg" target="_blank"
                                                   <?php }else{ ?>
                                                       href="javascript:alert('请登录');"
                                                   <?php } ?>
                                                   >
                                                    <div class="vgepic vgeddz"></div>
                                                    <div class="vgebt">
                                                        <div class="vgebutton">立即游戏</div>
                                                    </div>
                                                </a>
                                            </div>


                                            <div class="vgebox">
                                                <a href="javascript:;"  onClick="alert('即将上线,敬请期待');">
                                                    <div class="vgepic vgejh"><span class="jjqd"><font>即将上线敬请期待</font></span></div>
                                                    <div class="vgebt">
                                                        <div class="vgebutton">立即游戏</div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="vgebox">
                                                <a href="javascript:;" onClick="alert('即将上线,敬请期待');">
                                                    <div class="vgepic vgezjh"><span class="jjqd"><font>即将上线敬请期待</font></span></div>
                                                    <div class="vgebt">
                                                        <div class="vgebutton">立即游戏</div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>              </div>
                                    <div id="wrapwfoot"></div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <script type="text/javascript">
        $(".zrUl_ li a").each(function () {
            $(this).hover(function () { $(this).find('img').attr("src", "./" + $(this).attr("id") + "_.png"); }, function () { $(this).find('img').attr("src", "./" + $(this).attr("id") + ".png"); });
        });
    </script>



















<!--
<div class="ele-live-wrap" style="width:1030px">
    <div class="ele-live-align">
        <!--BB視訊-->
     <!--   <a href="/newbbin2" onclick="return logins()" target="_blank" id="js-live-bb" class="ele-live-bb change-bg-pos ele-current" style="width: 450px; top: 0px; opacity: 1; left: 0px; background-color: rgb(0, 0, 0);">
            <span class="ele-live-cbg"></span>
            <span class="ele-live-obg"></span>
        </a>
        <!--AG視訊-->
             <!--   <a href="/newag2" onclick="return logins()" target="_blank" data-hall="ag" class="ele-live-ag js-is-rotate change-bg-pos" style="width: 450px; left: 633px; top: 0px; opacity: 1; background-color: rgb(0, 0, 0);">
            <span class="ele-live-cbg"></span>
            <span class="ele-live-obg"></span>
        </a>
                <!--歐博視訊(AB)-->
              <!--  <a href="/newallbet2 " onclick="return logins()" target="_blank" data-hall="ab" class="ele-live-ab js-is-rotate change-bg-pos" style="width: 450px; left: 766px; top: 0px; opacity: 1; background-color: rgb(0, 0, 0);">
          <!--  <span class="ele-live-cbg"></span>
            <span class="ele-live-obg"></span>
        </a>
                <!--東方視訊(OG)-->
             <!--   <a href="/newmg2" onclick="return logins()" target="_blank" data-hall="og" class="ele-live-og js-is-rotate change-bg-pos" style="width: 450px; left: 750px; top: 0px; opacity: 1; background-color: rgb(0, 0, 0);">
           <!-- <span class="ele-live-cbg"></span>
           <!-- <span class="ele-live-obg"></span>
       <!-- </a>

        
    </div>
</div>
-->
<script>
(function() {
    'use strict';

    var liveTop = {
        $elements: $('.ele-live-align a'),
        cur_width: parseInt("450", 10),
        other_width: 0,
        isOpeningDone: false,
        isLogin: "N",
        init: function() {
            $("body").append($("#ele-livelogin-overlay").detach());
            liveTop.setPicWidth();
            liveTop.openingAnimation();
            liveTop.picEffect();
            liveTop.openLiveLogin();
            liveTop.closeLiveLogin();
        },
        /**
         *
         * 視訊廳開場
         **/
        openingAnimation: function() {
            var aDelayAdd = 200,
                aDelay = 0,
                eleCount = liveTop.$elements.length;

            liveTop.$elements.each(function() {
                $(this)
                    .css({
                        top: '-650px',
                        opacity: 0
                    })
                    .delay(aDelay)
                    .animate({
                        top: 0,
                        opacity: 1
                    }, function() {
                        $(this).find('i').delay(220 * eleCount).fadeOut(250);
                    });
                aDelay += aDelayAdd;
            });

            // 開場動畫結束後
            liveTop.$elements.promise().done(function() {
                liveTop.isOpeningDone = true;
                liveTop.$elements.css('background-color', '#000');
            });
        },
        /**
         *
         * 依照開放的遊戲數目各別設定寬度與定位
         **/
        setPicWidth: function() {
            var gamesOrder, max;

            liveTop.other_width = (900 - liveTop.cur_width) / (liveTop.$elements.length - 1);

            // 只開放BB視訊
            if (liveTop.$elements.length === 1) {
                liveTop.$elements.addClass('is-only-bb');
            }

            // 開放三款以上遊戲時，改變圖片定位
            if (liveTop.$elements.length > 2) {
                liveTop.$elements.addClass('change-bg-pos');
            }

            for (gamesOrder = 0, max = liveTop.$elements.length; gamesOrder < max; gamesOrder++) {
                if (gamesOrder === 0) {
                    liveTop.$elements.eq(gamesOrder).width(liveTop.cur_width);
                    continue;
                }
                liveTop.$elements.eq(gamesOrder)
                    .width(liveTop.cur_width)
                    .css('left', liveTop.cur_width + liveTop.other_width * (gamesOrder - 1));
            }
        },
        /**
         *
         * 圖片滑入效果
         * 預設current bbin
         **/
        picEffect: function() {
            var curIndex = 0,
                prevIndex = '';

            if (liveTop.$elements.length > 1) {
                $('#js-live-bb').addClass('ele-current');
            }

            liveTop.$elements.on('hover', function (event) {
                var leftGameOrder;

                if (liveTop.isOpeningDone === false) { return false; }

                if (event.type === "mouseenter") {
                    $('#js-live-bb').removeClass('ele-current');
                    $(this).addClass('ele-current');

                    if ($(this).index() === curIndex) {
                        return false;
                    }

                    prevIndex = curIndex;
                    curIndex = $(this).index();

                    // 目前 current 的遊戲圖
                    if (curIndex !== 0) {
                        liveTop.$elements.eq(curIndex).stop().animate({
                            left: liveTop.other_width * curIndex
                        });
                    }

                    // current 遊戲圖的左側
                    if ((curIndex - prevIndex) > 0) {
                        for (leftGameOrder = 0; leftGameOrder < curIndex; leftGameOrder++) {
                            liveTop.$elements.eq(leftGameOrder).stop().animate({
                                left: liveTop.other_width * leftGameOrder
                            });
                        }
                    }

                    // 上一張 current 的遊戲圖
                    if ((curIndex - prevIndex) < 0) {
                        liveTop.$elements.eq(prevIndex).stop().animate({
                            left: liveTop.cur_width + liveTop.other_width * (prevIndex - 1)
                        });
                    }

                    return false;
                }

                liveTop.$elements.removeClass('ele-current');
            });

            $('.ele-live-align').mouseleave(function() {
                // Reset
                var gamesOrder, max;

                if (liveTop.isOpeningDone === false) { return false; }

                curIndex = 0;
                prevIndex = '';

                if (liveTop.$elements.length > 1) {
                    $('#js-live-bb').addClass('ele-current');
                }

                for (gamesOrder = 1, max = liveTop.$elements.length; gamesOrder < max; gamesOrder++) {
                    liveTop.$elements.eq(gamesOrder).stop().animate({
                        left: liveTop.cur_width + liveTop.other_width * (gamesOrder - 1)
                    });
                }
            });
        },
       

    };

    liveTop.init();
}());

</script>  
					
					<!--
                    <div style="height:8px;"></div>
                    <div style="width:990px;margin:0 auto;">
                        <div style="padding: 0 10px 0 0px;width:990px;">
                            <div style="width:990px;height:66px;background:url(/imgs/sx-titbg.png) no-repeat center top;"></div>
                            <div style="width:990px; padding:0 10px 0 0;margin:auto;margin-left:-2px;">
                                <div class="pic_list" style="border:1px #857609 solid;border-top: none;background: #291b02;">
                                    <div class="list_1" href="javascript:;">
                                        <a href="/newbbin2/index.html"target="_blank"></a>
                                        <a href="/newag2/index.html" target="_blank"></a>
                                    </div>
                                   <div class="list_2" href="javascript:;" style="display:none">
                                        <a href="javascript:;"></a>
                                        <a href="javascript:;"></a>
                                    </div>
                                     <div class="list_3" href="javascript:;">
                                        <a href="/newmg2"target="_blank"></a>
                                        <a href="javascript:;"></a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;height:18px;"></div>-->
                 <!--   <div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
                --></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
    <script>

    $(window.parent.parent.document).find("#mainFrame").height(970);
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
					alert('请先登陆');
						return false;
				}
			};
	
	</script>
    </div>
</body>
</html><?
$mysqli->close();
?>