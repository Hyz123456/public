<?php
if(!isset($_SESSION)){ session_start();}


?>
<html><!DOCTYPE html>
<html class="livetop zh-cn ">
<head>
<title>电子游戏</title>
<meta charset="UTF-8">
</head>
<style>
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, input, button, textarea, p, blockquote, table, th, td {
    margin: 0;
    padding: 0;
	font-size:12px;
	font-family: "SimSun","Microsoft YaHei";
}a {
    outline: medium none;
    text-decoration: none;
}
.layout1000, .layout {margin: 0 auto;width: 1000px;}
.clearfix::after, .layout::after, .layout980::after, .layout1000::after, .mod-forms li::after, .user-form::after, .mod-forms-list li::after {
    clear: both;
    content: ".";
    display: block;
    height: 0;
    overflow: hidden;
    visibility: hidden;
}
	.games-hd-menu{height:120px; left:0; position:absolute; top:0; width:100%; z-index:10;}
	.games-hd-menu li{background:url(img/games_spirits.png?1234) no-repeat;}
	.games-hd-menu li{cursor:pointer; display:inline; float:left; height:120px; text-indent:-9999em; width:250px;}

	.games-hd-menu li.mg-menu{background-position:-250px -174px;}
	.games-hd-menu li.bb-menu{background-position:-500px -174px;}
	.games-hd-menu li.ag-menu{background-position:-750px -174px;}
	.games-hd-menu li.agby-menu{background-position:0px -174px;}

	.games-hd-menu li.mg-menu.current{background-position:-250px 0;}
	.games-hd-menu li.bb-menu.current{background-position:-500px 0;}
	.games-hd-menu li.ag-menu.current{background-position:-750px 0;}
	.games-hd-menu li.agby-menu.current{background-position:0px 0;}

.games-panes {  min-height:400px;}
.games-sub-menu li{color:#fff; cursor:pointer; display:inline; float:left; font-size:14px; height:31px; line-height:31px; margin-right:3px; padding-right:15px;}
.games-sub-menu li span{display:block; padding-left:15px;}
.games-sub-menu li.current {background:#fbcd30; -webkit-border-radius:3px; -moz-border-radius:3px; border-radius:3px;}
.games-sub-menu li.current span{color:#000;}

.mod-games .games-item li{cursor:pointer; display:inline; float:left; margin:20px 30px 25px; overflow:hidden; text-align:center; width:180px;}
.mod-games .games-item li .game-name{color:#7d7d7d; margin-top:8px;}
.mod-games .games-item li:hover .game-name{color:#06b1b9;}
.mod-games .games-item li .game-rollover a{background:#2f2e2c; border:1px solid #181817; -webkit-border-radius:3px; -moz-border-radius:3px; border-radius:3px; margin-top:12px; height:24px; line-height:24px; float:left; display:inline; color:#939393; width:178px;}
.mod-games .games-item li:hover .game-rollover a{border:1px solid #007baa; background:#06b1b9; color:#fff;}

.mod-games .mg-item .games-item li em{background-repeat:no-repeat; width:146px; height:120px; background-position:0 -8px; display:block; margin:0 auto;}
.mod-games .mg-item .games-item li:hover em{background-position:-145px -8px;}
.mod-games .bb-item .games-item li em{background-position:0 -170px; background-repeat:no-repeat; display:block; height:120px; margin:0 auto; width:180px;}
.mod-games .bb-item .games-item li:hover em{background-position:0 -20px;}

.mod-games .ag-item .games-item li{cursor:pointer; display:inline; float:left; margin:20px 12px 25px; overflow:hidden; text-align:center; width:226px;}
.mod-games .ag-item .games-item li em{background-repeat:no-repeat; width:216px; height:148px; background-position:0 0px; display:block; margin:0 auto;
filter:alpha(opacity=100); /*IE滤镜，透明度50%*/
-moz-opacity:1; /*Firefox私有，透明度50%*/
opacity:1;/*其他，透明度50%*/
}
.mod-games .ag-item .games-item li:hover em{
	filter:alpha(opacity=80); /*IE滤镜，透明度50%*/
-moz-opacity:0.8; /*Firefox私有，透明度50%*/
opacity:0.8;/*其他，透明度50%*/
	
}

.mod-games .ag-item .games-item li .game-rollover a{background:#2f2e2c; border:1px solid #181817; -webkit-border-radius:3px; -moz-border-radius:3px; border-radius:3px; margin-top:12px; height:24px; line-height:24px; float:left; display:inline; color:#939393; width:215px;}
.mod-games .ag-item .games-item li:hover .game-rollover a{border:1px solid #007baa; background:#06b1b9; color:#fff;}
.hide{display:none;}
</style>
<body class='mod-games'>
<div class="layout games-platform-wrap m-t-30">
            
            <div class="games-panes clearfix" id='gamebox' >
                         
				<!-- AG游戏厅 -->
				<div class="games-platform-item ag-item">
					 
					  <div id="aggame_list">
                        <div class="games-item clearfix">
                            <!-- 热门游戏 -->
                            <ul class="clearfix">
                                <li><!--http://gci.int777.net/agingame-->
                                    <em class="ag101"></em>
                                    <div class="game-name">水果拉霸</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=501" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>

                                <li>
                                    <em class="ag102"></em>
                                    <div class="game-name">杰克高手</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=502" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag103"></em>
									 <div class="game-name">美女沙排</div>
                                <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=503" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag104"></em>
                                    <div class="game-name">新年運財羊</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=504" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                <li>
                                    <em class="ag105"></em>
                                    <div class="game-name">武聖傳</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=505" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                
                                <li>
                                    <em class="ag106"></em>
                                    <div class="game-name">幸運老虎機</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=506" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag107"></em>
                                    <div class="game-name">極速幸運輪</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=507" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag108"></em>
                                    <div class="game-name">太空漫遊</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=508" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag109"></em>
                                    <div class="game-name">復古花園</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=509" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                
                                <li>
                                    <em class="ag110"></em>
                                    <div class="game-name">關東煮</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=510" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag111"></em>
                                    <div class="game-name">牧場咖啡</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=511" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag112"></em>
                                    <div class="game-name">甜一甜屋</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=512" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                <li>
                                    <em class="ag113"></em>
                                    <div class="game-name">日本武士</div>
                                 <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=513" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                                
                                <li>
                                    <em class="ag114"></em>
                                    <div class="game-name">象棋老虎機</div>
                                 <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=514" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag115"></em>
                                    <div class="game-name">麻將老虎機</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=515" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag116"></em>
                                    <div class="game-name">西洋棋老虎機</div>
                                 <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=516" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag117"></em>
                                    <div class="game-name">開心農場</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=517" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag118"></em>
                                    <div class="game-name">夏日營地</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=518" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag119"></em>
                                    <div class="game-name">海底漫遊</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=519" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag120"></em>
                                    <div class="game-name">鬼馬小丑</div>
                                 <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=520" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag121"></em>
                                    <div class="game-name">機動樂園</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=521" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag122"></em>
                                    <div class="game-name">驚嚇鬼屋</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=522" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag123"></em>
                                    <div class="game-name">瘋狂馬戲團</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=523" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag124"></em>
                                    <div class="game-name">海洋劇場</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=524" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag125"></em>
                                    <div class="game-name">水上樂園</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=525" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag126"></em>
                                    <div class="game-name">空中戰爭</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=526" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag127"></em>
                                    <div class="game-name">搖滾狂迷</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=527" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag128"></em>
                                    <div class="game-name">越野機車</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=528" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag129"></em>
                                    <div class="game-name">埃及奧秘</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=529" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag130"></em>
                                    <div class="game-name">歡樂時光</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=530" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag131"></em>
                                    <div class="game-name">侏羅紀</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=531" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag132"></em>
                                    <div class="game-name">土地神</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=532" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag133"></em>
                                    <div class="game-name">布袋和尚</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=533" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag134"></em>
                                    <div class="game-name">正財神</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=534" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag135"></em>
                                    <div class="game-name">武財神</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=535" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag136"></em>
                                    <div class="game-name">偏財神</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=536" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag137"></em>
                                    <div class="game-name">性感女僕</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=537" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>

								<li>
                                    <em class="ag200"></em>
                                    <div class="game-name">龍珠</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=600" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag201"></em>
                                    <div class="game-name">幸運8</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=601" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag202"></em>
                                    <div class="game-name">閃亮女郎</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=602" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag203"></em>
                                    <div class="game-name">金魚</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=603" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag204"></em>
                                    <div class="game-name">中國新年</div>
                                    <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=604" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
								<li>
                                    <em class="ag205"></em>
                                    <div class="game-name">海盜王</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=605" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag206"></em>
                                    <div class="game-name">鮮果狂熱</div>
                                   <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=606" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
								<li>
                                    <em class="ag207"></em>
                                    <div class="game-name">小熊貓</div>
                                  <div class="game-rollover clearfix"><a class="real-play" href="/newag2/playgame2.php?gamename=607" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" >立刻开始</a></div>
                                </li>
                            </ul>                            
                        </div>
                    </div> 
				</div>
                
				
				<div style='clear:both'></div>
            </div>
        </div>

<style>

/* 鐢靛瓙娓告垙 end */
.ag101{background:url(img/FRU.jpg);}
.ag102{background:url(img/PKBJ.jpg);}
.ag103{background:url(img/SLM1.jpg);}
.ag104{background:url(img/SLM2.jpg);}
.ag105{background:url(img/SLM3.jpg);}
.ag106{background:url(img/SC01.jpg);}
.ag107{background:url(img/TGLW.jpg);}
.ag108{background:url(img/SB01.jpg);}
.ag109{background:url(img/SB02.jpg);}
.ag110{background:url(img/SB03.jpg);}
.ag111{background:url(img/SB04.jpg);}
.ag112{background:url(img/SB05.jpg);}
.ag113{background:url(img/SB06.jpg);}
.ag114{background:url(img/SB07.jpg);}
.ag115{background:url(img/SB08.jpg);}
.ag116{background:url(img/SB09.jpg);}
.ag117{background:url(img/SB10.jpg);}
.ag118{background:url(img/SB11.jpg);}
.ag119{background:url(img/SB12.jpg);}
.ag120{background:url(img/SB13.jpg);}
.ag121{background:url(img/SB14.jpg);}
.ag122{background:url(img/SB15.jpg);}
.ag123{background:url(img/SB16.jpg);}
.ag124{background:url(img/SB17.jpg);}
.ag125{background:url(img/SB18.jpg);}
.ag126{background:url(img/SB19.jpg);}
.ag127{background:url(img/SB20.jpg);}
.ag128{background:url(img/SB21.jpg);}
.ag129{background:url(img/SB22.jpg);}
.ag130{background:url(img/SB23.png);}
.ag131{background:url(img/SB24.jpg);}
.ag132{background:url(img/SB25.jpg);}
.ag133{background:url(img/SB26.jpg);}
.ag134{background:url(img/SB27.jpg);}
.ag135{background:url(img/SB28.jpg);}
.ag136{background:url(img/SB29.jpg);}
.ag137{background:url(img/AV01.jpg);}
.ag138{background:url(img/XG01.jpg);}
.ag200{background:url(img/XG01.jpg);}
.ag201{background:url(img/XG02.jpg);}
.ag202{background:url(img/XG03.jpg);}
.ag203{background:url(img/XG04.jpg);}
.ag204{background:url(img/XG05.jpg);}
.ag205{background:url(img/XG06.jpg);}
.ag206{background:url(img/XG07.jpg);}
.ag207{background:url(img/XG08.jpg);}
</style>
		</body></html>