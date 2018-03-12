<?php
	if(!isset($_SESSION)){ session_start();}
	if($_SESSION['uid']==''){$logined=0;}else{$logined=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>MG电子游戏</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="jPaginate - jQuery Pagination Plugin" />
        <meta name="keywords" content="jquery, plugin, pagination, fancy" />

		
		<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/slots-iframe.css" rel="stylesheet">
<link href="css/iosOverlay.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/jquery.lazyload.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.simplePagination.js"></script>
<script src="js/iosOverlay.js"></script>
<script src="js/spin.min.js"></script>
<script src="js/jquery.function.js"></script>







<script type="text/javascript">

	$(function(){
		
		//if(!check_lg()){ alert('请先登录!'); return;}  window.open('url', '惑星战记', 'height=400, width=700, top=200, left=50%,margin-left=-350 toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');http://888.dfapi.net/app/member/game/Game.php?lang=zh-cn&HALLID=3081976&GameType=5005
	})
	function check_lg(){
	  return (<?=$logined?>==1);
	}

</script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//how much items per page to show
	var show_per_page = 18; 
	//getting the amount of elements inside paginationdemo div
	var number_of_items = $('#paginationdemo').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	
	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);
	
	//now when we got all we need for the navigation let's make it '
	
	/* 
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<a class="previous_link" href="javascript:previous();"><</a>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	navigation_html += '<a class="next_link" href="javascript:next();">></a>';
	
	$('#page_navigation').html(navigation_html);
	
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');
	
	//hide all the elements inside paginationdemo div
	$('#paginationdemo').children().css('display', 'none');
	
	//and show the first n (show_per_page) elements
	$('#paginationdemo').children().slice(0, show_per_page).css('display', 'block');
	
});

function previous(){
	
	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
	
}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
	
}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());
	
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	
	//hide all children elements of paginationdemo div, get specific items and show them
	$('#paginationdemo').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
	
	//update the current page input field
	$('#current_page').val(page_num);
}
  
</script>
<link rel="stylesheet" rev="stylesheet" href="/cl/css/reset.css" type="text/css">
<style>
.col-xs-6{    padding-left: 8px;
    padding-right: 8px;
    margin-bottom: 15px !important;}
#page_navigation a{
	padding:6px;
	font-famliy:"Century Gothic", Arial, Helvetica, sans-serif, "Microsoft YaHei", "微软雅黑";
	margin:2px;
	background:#fff;
	color:black;
	text-decoration:none
}
.active_page{
	font-famliy:"Century Gothic", Arial, Helvetica, sans-serif, "Microsoft YaHei", "微软雅黑";
	background:darkblue;
	color:black;
	    background: #ffff00 !important;
}
</style>

        <style>
            body{
                background:none;
                font-family: verdana;
                padding:0px;
                margin:0px;
                letter-spacing:2px;
            }
            .top-banner {
                background-color: rgba(0,0,0,0.5);
            }
            .header{
                position:absolute;
                top:0px;
                left:0px;
                width:100%;
                height:80px;            
            }
            .header h1{
                color:#fff;
                font-size: 38px;
                margin:0px 0px 0px 30px;
                font-weight:100;
                line-height:80px;
                padding:0px;
            }
            .footer{
                width:100%;
                margin:10px 0px 5px 0px;
            }
            a img{
                border:none;
                outline:none;
            }
            .content{
                margin-top:100px;
                padding:0px;
                bottom:0px;
            }
            .about{
                width:100%;
                height:400px;
                background:transparent url(images1/about.png) repeat-x top left;
                border-top:2px solid #ccc;
                border-bottom:2px solid #000;
            }
            .about .text{
                width:16%;
                margin:5px 2% 10px 2%;
                height:380px;
                float:left;
                color:#FCFEF3;
                font-size: 16px;
                text-align:justify;
                letter-spacing:0px;
            }
            .about .text h1{
                border-bottom: 1px dashed #ccc;
                color:#fff;
            }
            .demo{
                width:100%;
               
            
               
            }
            h1{
                color:#404347;
               
                font-weight:100;
            }
			.pagedemo{
			
				width:100%;
		
            
                text-align:center;
				
			}
			
			.jPag-first{display:none;}
			.jPag-last{display:none;}
		
		ul.jPag-pages{width:100% !important;    text-align: center;}
			.jPag-control-front{width:100%;}
			
			
			.jPaginate span{position:relative;margin-left:0px !important;}
			.jPaginate span {
    cursor: pointer;

}

.jPag-sprevious{left:200px;display:none;}
.jPag-snext{left:225px;display:none;}






        </style>
    </head>
	
<body>
    <form name="form1" method="post" action="#" id="form1">
        <div>
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTUwNjM5ODcyNmRkH3SX6rgFzJNXTXUijFGjggKhwf4=">
        </div>
        <div>
            <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="9B7CF618">
        </div>
<script>
    var gametype = "ge";
    var lang = "cs";
    var userId = "";
    var html5 = 0; 
    var gameGE = "True";
    var gamePT = "True";
    var gameMG = "True";
    var gameSP = "True";
    var gameAG = "True";                   
</script>
 <style>
 .GPI_Game {
    margin: 0 auto;
    overflow: hidden;
    position: relative;
    width: 1000px;
    min-height: 350px;
}
.GPI_Game ul.game_category {
    margin-top: 22px;
}  
ul.game_category {
    display: block;
    margin: 10px;
    position: relative;
    z-index: 1;
}
ul.game_category li {
    display: inline;
    float: left;
    list-style: outside none none;
    position: relative;
} 
ul.game_category li ~ li {
    border-radius: 5px;
    margin-left: 10px;
}
ul.game_category li a {
    background: #0e0e0e none repeat scroll 0 0;
    border: 1px solid #730204;
    border-radius: 6px;
    color: #c1bfbf;
    display: inline-block;
    font-family: dinpro, sans-serif;
    font-size: 14px;
    height: 26px;
    line-height: 24px;
    text-align: center;
    text-transform: uppercase;
}
ul.game_category li a.active, .tab1 ul.game_category li a:hover {
    background: #5e0e0e none repeat scroll 0 0;
    border: 1px solid #730204;
    color: #fff;
}
.search {
    width: 236px;
    float: left;
    margin-left: 10px;
}
.serch_input {
    outline: none;
    line-height: 27px;
    height: 27px;
    padding-left: 5px;
    border-radius: 4px;
    border: none;
    color: #000;
}
.search a.serch_but {
    background: #0e0e0e none repeat scroll 0 0;
    border: 1px solid #730204;
    border-radius: 6px;
    color: #c1bfbf;
    display: inline-block;
    font-family: dinpro, sans-serif;
    font-size: 14px;
    height: 26px;
    line-height: 26px;
    text-align: center;
    text-transform: uppercase;
    margin-left: 5px;
    display: block;
    width: 50px;
    float: right;
    cursor: pointer;
}
div.games_menu {
    height: auto;
    overflow: hidden;
    position: relative;
    width: 1000px;
    z-index: 1;
    padding-top: 20px;
}
#page_navigation{
    height: 32px;
    text-align: center;
     padding: 0 10px;
}
#page_navigation a{
    background-color: #5e0e0e;
    border: 1px solid #5e0e0e;
    border-radius: 4px;
    box-shadow: 0 0 1px #000 inset;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    height: 30px;
    line-height: 30px;
    margin-left: 5px;
    outline: medium none;
    text-align: center;
    padding: 7px 13px;
}
.active_page {
    background: #a42919 !important;
}
</style>  
        <section class="slots-main-content">
        <div id="con_one_1">
          <div class="cur GPI_Game">
            <ul class="game_category" id="ul_1">
                <li><a href="one.php" onclick="LoadHotGame(this)" class="active" style="width: 94px;" >热门游戏</a></li>
                <li><a href="two.php" onclick="LoadAllGame(this)" style="width: 94px;" class="">全部游戏</a></li>
                <li><a href="three.php" onclick="LoadVideoSlot(this)" style="width: 94px;" class="">经典老虎机</a></li>
                <li><a href="four.php" onclick="LoadClassicSlot(this)" style="width: 94px;" class="">老虎机</a></li>
                <li><a href="five.php" onclick="LoadTableSlot(this)" style="width: 94px;" class="">桌上游戏</a></li>
            </ul>
            <div class="search">
                <input type="text" id="txt-search" class="serch_input" value="">
                <a href="javascript:void(0)" class="serch_but pull-right">确定</a>
            </div>
        
                <script src="http://cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
		<script>
                        $(function(){
                                $(".pull-right").click(function(){
                                        $(".col-xs-6").hide().filter(":contains('"+$("#txt-search").val()+"')").show();
                                });
                        });
                </script>
                <input type='hidden' id='current_page' />
                <input type='hidden' id='show_per_page' />
            <div class="games_menu" style="display: block;">
                <div style="margin-bottom:20px;">
                    <a href="javascript:load_bravado_link(&#39;6&#39;, &#39;ag&#39;);"><img src="/pic/byw_2.gif" width="1000"></a>
                </div>
                <div id="paginationdemo"  class="demo">
						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LuckyFirecracker', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  title="LuckyFirecracker" target="_blank">
					     	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img1" ></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" >开始游戏</span></a>
						<p>LuckyFirecracker</p><p>招财鞭炮</p></div>
						</div>
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=WhatAHoot', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"    target="_blank"  title="WhataHoot3" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img2"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>WhataHoot3</p><p>猫头鹰乐园</p></div>
						</div>
                        <div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=StarlightKiss', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="StarlightKiss" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img3"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>StarlightKiss</p><p>星光之吻</p></div>
						</div>
                        <div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyAgeOfDiscovery', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyAgeOfDiscovery" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img4"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyAgeOfDiscovery</p><p>大航海时代</p></div>
						</div>
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=KaratePig', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="KaratePig" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"class="img5"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>KaratePig</p><p>空手道猪</p></div>
						</div>
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=GoldFactory', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  target="_blank"  title="GoldFactory" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"class="img6"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>GoldFactory</p><p>黄金工厂</p></div>
						</div>
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Carnaval', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  target="_blank"  title="Carnaval" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img7"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Carnaval</p><p>狂欢节</p></div>
						</div>
						
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LuckyZodiac', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  target="_blank"  title="LuckyZodiac" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img11"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>LuckyZodiac</p><p>幸运生肖</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=PeekaBoo5Reel', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="PeekaBoo5Reel" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="img12"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>PeekaBoo5Reel</p><p>躲猫猫</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=luckytwins', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="luckytwins" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img13"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>luckytwins</p><p>幸运双星</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=ChainMailNew', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="ChainMailNew" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"class="img14"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>ChainMailNew</p><p>锁子甲</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=HotAsHades', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="HotAsHades" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img15"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>HotAsHades</p><p>地府烈焰</p></div>
						</div>
           				<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Pistoleras', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Pistoleras" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"class="img16"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Pistoleras</p><p>持枪王者</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LuckyLeprechaunsLoot', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  target="_blank"  title="LuckyLeprechaunsLoot" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img17"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>LuckyLeprechaunsLoot</p><p>幸运的小妖精</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
					   <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=KittyCabana', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  target="_blank"  title="KittyCabana" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img18"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>KittyCabana</p><p>凯蒂卡巴拉</p></div>
						</div>
            			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=HoundHotel', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  target="_blank"  title="HoundHotel" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img19"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>HoundHotel</p><p>酷犬酒店</p></div>
						</div>
           				<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Ariana', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"   target="_blank"  title="Ariana" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img20"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Ariana</p><p>爱丽娜</p></div>
						</div>
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LuckyFirecracker', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"   target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="img21"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Ariana</p><p>招财鞭炮</p></div>
						</div>
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LuckyFirecracker', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="img22"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>LuckyFirecracker</p><p>拉斯韦加斯</p></div>
						</div>
                        
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
					 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=108Heroes', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin1"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>108 Heroes</p><p>108好汉</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=wildorient', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin2"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>To the East</p><p>东方珍兽</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LuckyFirecracker', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="img13"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Lucky star</p><p>幸运双星</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Bridesmaids', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin3"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>My biggest.</p><p>伴娘我最大</p></div>
						</div>

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=VinylCountdown', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin4"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Heartbeat time</p><p>心跳时刻</p></div>
						</div>

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=TallyHo', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin5"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The British Years</p><p>英伦时光</p></div>
						</div>
                        

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=SunQuest', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin6"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Money chase</p><p>金钱追逐</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyBurningDesireV90', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyBurningDesireV90" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin7"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Burning desire</p><p>燃烧的欲望</p></div>
						</div>

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyBreakDaBankAgainV90', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyBreakDaBankAgainV90" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin7"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The bank robber 2</p><p>银行抢匪2</p></div>
						</div>
                        

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RRQueenOfHearts', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RRQueenOfHearts" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin8"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Queen of hearts</p><p>女皇之心</p></div>
						</div>
                        

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RetroReelsDiamondGlitz', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RetroReelsDiamondGlitz" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin9"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Brick retro version of vanity</p><p>砖石浮华复古版</p></div>
						</div>

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LeaguesOfFortune', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LeaguesOfFortune" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin10"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Monopoly Alliance</p><p>富翁联盟</p></div>
						</div>

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LadiesNite', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LadiesNite" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin11"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>ladies night</p><p>淑女之夜</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=FrozenDiamonds', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="FrozenDiamonds" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin12"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Frozen brick</p><p>急冻砖石</p></div>
						</div>
                        

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=KaraokeParty', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="KaraokeParty" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin13"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Karaoke music</p><p>K歌乐韵</p></div>
						</div>
                        
							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=reelspinner', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="reelspinner" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin14"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Rotation war</p><p>旋转大战</p></div>
						</div>
                        

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=ElectricDiva', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="ElectricDiva" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin15"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Electronic music song</p><p>电音歌后</p></div>
						</div>


						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=ninjamagic', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="ninjamagic" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin16"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Ninja magic</p><p>忍者法宝</p></div>
						</div>
                        
						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=PrettyKitty', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="PrettyKitty" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin17"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Beautiful cat</p><p>漂亮猫咪</p></div>
						</div>

							
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=WinSumDimSum', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="WinSumDimSum" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin18"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Happy snacks</p><p>开心点心</p></div>
						</div>
                        
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=BarBarBlackSheep5Reel', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="BarBarBlackSheep5Reel" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin19"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Baa baa black sheep</p><p>黑绵羊咩咩叫</p></div>
						</div>
                        

						  
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=PeekaBoo5Reel', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="PeekaBoo5Reel" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin20"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Ghosts hide and seek</p><p>抓鬼躲猫猫</p></div>
						</div>

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RiverofRiches', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RiverofRiches" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin21"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Wealth in Pyramid</p><p>金字塔的财富</p></div>
						</div>
                        

						
							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=rabbitinthehat', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="rabbitinthehat" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin22"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Magic rabbit</p><p>魔术兔</p></div>
						</div>

						
							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=PenguinSplash', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="PenguinSplash" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin23"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Penguin Family</p><p>企鹅家族</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=LegendOfOlympus', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="LegendOfOlympus" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin24"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Legend OLYMPUS</p><p>传说奥林巴斯</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=KittyCabana', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="KittyCabana" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin25"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Katie Lodge</p><p>凯蒂小屋</p></div>
						</div>
                        
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=ForsakenKingdom', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="ForsakenKingdom" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin26"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Lost country</p><p>失落的国度</p></div>
						</div>
                        
						   
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=BigChef', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="BigChef" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin27"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>BigChef</p><p>大厨师</p></div>
						</div>

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Ariana', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Ariana" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin28"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Ariana</p><p>阿利亚娜</p></div>
						</div>
                        
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=adventurepalace', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="adventurepalace" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin29"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Adventure jungle</p><p>冒险丛林</p></div>
						</div>

						  
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=ScaryFriends', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="ScaryFriends" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin30"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>ScaryFriends</p><p>可怕的朋友</p></div>
						</div>

							  
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=zebra', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="zebra" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin31"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Funny zebra</p><p>搞怪斑马</p></div>
						</div>
                        

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=wwizards', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="wwizards" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin32"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>King Wizard</p><p>王者巫师</p></div>
						</div>
                        

						
							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=WhatonEarth', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="WhatonEarth" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin33"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The Conquerors</p><p>征服者入侵</p></div>
						</div>

						
							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=untamedwolfpack', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="untamedwolfpack" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin34"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The wild wolf</p><p>蛮荒野狼</p></div>
						</div>

						
						
							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Triangulation', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Triangulation" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin35"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Color triangle</p><p>彩色三角</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubySuperBonusBingo" target="_blank" title="RubySuperBonusBingo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img162"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubySuperBonusBingo</p><p>超级宾果</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MystiqueGrove" target="_blank" title="MystiqueGrove">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img163"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MystiqueGrove</p><p>妖姬森林</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Germinator" target="_blank" title="Germinator">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img164"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Germinator</p><p>细菌克星</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TheTwistedCircus" target="_blank" title="TheTwistedCircus">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img165"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TheTwistedCircus</p><p>马戏团大反转</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SambaBingo" target="_blank" title="SambaBingo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img166"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SambaBingo</p><p>萨巴宾果</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=CashClams" target="_blank" title="CashClams">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img167"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>CashClams</p><p>现金蚬</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=CouchPotato" target="_blank" title="CouchPotato">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img168"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>CouchPotato</p><p>沙发土豆</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=dm" target="_blank" title="dm">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img169"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>dm</p><p>双魔</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyFlyingAce" target="_blank" title="RubyFlyingAce">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img170"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyFlyingAce</p><p>超级飞行员</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyGoldCoast" target="_blank" title="RubyGoldCoast">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img171"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyGoldCoast</p><p>黄金海岸</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=jexpress" target="_blank" title="jexpress">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img172"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>jexpress</p><p>累计奖金快车</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RockTheBoat" target="_blank" title="RockTheBoat">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img173"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RockTheBoat</p><p>摇滚船</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=romanriches" target="_blank" title="romanriches">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img174"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>romanriches</p><p>罗马财富</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TripleMagic" target="_blank" title="TripleMagic">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img175"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TripleMagic</p><p>三魔法</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=rubyelementals" target="_blank" title="rubyelementals">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img176"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>rubyelementals</p><p>水果怪兽</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=FishParty" target="_blank" title="FishParty">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img177"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>FishParty</p><p>派对鱼</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyGoodToGo" target="_blank" title="RubyGoodToGo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img178"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyGoodToGo</p><p>疯狂赛道</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyHarveys" target="_blank" title="RubyHarveys">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img179"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyHarveys</p><p>哈维斯的晚餐</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=HoHoHo" target="_blank" title="HoHoHo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img180"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>HoHoHo</p><p>嗬嗬嗬</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=ReelGems" target="_blank" title="ReelGems">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img181"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>ReelGems</p><p>宝石迷阵</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RRQueenOfHearts" target="_blank" title="RRQueenOfHearts">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img182"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RRQueenOfHearts</p><p>押韵的卷轴 - 心挞</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SecretAdmirer" target="_blank" title="SecretAdmirer">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img183"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SecretAdmirer</p><p>秘密崇拜者</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SpringBreak" target="_blank" title="SpringBreak">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img184"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SpringBreak</p><p>春假</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TallyHo" target="_blank" title="TallyHo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img185"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TallyHo</p><p>泰利嗬</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=CoolWolf" target="_blank" title="CoolWolf">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img186"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>CoolWolf</p><p>酷狼</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Keno" target="_blank" title="Keno">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img187"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Keno</p><p>基诺</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=BaccaratGold" target="_blank" title="BaccaratGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img188"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>BaccaratGold</p><p>百家乐黄金版</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=DeucesWildPwrPoker" target="_blank" title="DeucesWildPwrPoker">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img189"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>DeucesWildPwrPoker</p><p>万能量点</p></div> 
            			</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=DeucesandJoker" target="_blank" title="DeucesandJoker">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img190"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>DeucesandJoker</p><p>百搭小丑扑克</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=DoubleDoubleBonus" target="_blank" title="DoubleDoubleBonus">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img191"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>DoubleDoubleBonus</p><p>换牌扑克</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=5ReelDrive" target="_blank" title="5ReelDrive">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img192"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>5ReelDrive</p><p>5卷的驱动器</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=BigTop" target="_blank" title="BigTop">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img193"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>BigTop</p><p>马戏篷</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyCashapillar" target="_blank" title="RubyCashapillar">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img194"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyCashapillar</p><p>昆虫派对</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyDeckTheHalls" target="_blank" title="RubyDeckTheHalls">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img195"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyDeckTheHalls</p><p>闪亮的圣诞节</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=GreatGriffin" target="_blank" title="GreatGriffin">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img196"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>GreatGriffin</p><p>大狮鹫</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RROldKingCole" target="_blank" title="RROldKingCole">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img197"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RROldKingCole</p><p>押韵的卷轴 - 老国王科尔</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SoManyMonsters" target="_blank" title="SoManyMonsters">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img198"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SoManyMonsters</p><p>怪兽多多</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SoMuchCandy" target="_blank" title="SoMuchCandy">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img199"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SoMuchCandy</p><p>糖果多多</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SoMuchSushi" target="_blank" title="SoMuchSushi">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img200"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SoMuchSushi</p><p>寿司多多</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SunQuest" target="_blank" title="SunQuest">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img201"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SunQuest</p><p>探索太阳</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=UntamedGiantPanda" target="_blank" title="UntamedGiantPanda">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img202"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>UntamedGiantPanda</p><p>大熊猫</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=wwizards" target="_blank" title="wwizards">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img203"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>wwizards</p><p>赢得向导</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TheFinerReelsOfLife" target="_blank" title="TheFinerReelsOfLife">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img204"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TheFinerReelsOfLife</p><p>好日子</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MaxDamage" target="_blank" title="MaxDamage">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img205"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MaxDamage</p><p>星战传奇</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=BattlestarGalactica" target="_blank" title="BattlestarGalactica">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img206"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>BattlestarGalactica</p><p>太空堡垒</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TitansoftheSunTheia" target="_blank" title="TitansoftheSunTheia">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img207"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TitansoftheSunTheia</p><p>太阳神之忒伊亚</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=AlaskanFishing" target="_blank" title="AlaskanFishing">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img208"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>AlaskanFishing</p><p>阿拉斯加钓鱼</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyAllAmerican" target="_blank" title="RubyAllAmerican">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img209"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyAllAmerican</p><p>所有美国</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=ArcticFortune" target="_blank" title="ArcticFortune">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img210"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>ArcticFortune</p><p>极寒鸿运</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyBigBreak" target="_blank" title="RubyBigBreak">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img211"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyBigBreak</p><p>大破</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=BigChef" target="_blank" title="BigChef">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img212"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>BigChef</p><p>厨神</p></div> 
            			</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyBigKahunaSnakesAndLadders" target="_blank" title="RubyBigKahunaSnakesAndLadders">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img213"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyBigKahunaSnakesAndLadders</p><p>征服钱海-蛇与梯子</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyBunnyBoilerGold" target="_blank" title="RubyBunnyBoilerGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img214"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyBunnyBoilerGold</p><p>黄金兔子锅炉</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Crocodopolis" target="_blank" title="Crocodopolis">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img215"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Crocodopolis</p><p>鳄鱼建城邦</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyCryptCrusade" target="_blank" title="RubyCryptCrusade">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img216"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyCryptCrusade</p><p>地穴的远征</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyCryptCrusadeGold" target="_blank" title="RubyCryptCrusadeGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img217"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyCryptCrusadeGold</p><p>黄金地穴的远征</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyDawnOfTheBread" target="_blank" title="RubyDawnOfTheBread">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img218"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyDawnOfTheBread</p><p>黎明的面包</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=DoctorLove" target="_blank" title="DoctorLove">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img219"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>DoctorLove</p><p>医生的爱</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyDogfather" target="_blank" title="RubyDogfather">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img220"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyDogfather</p><p>狗爸爸</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=EaglesWings" target="_blank" title="EaglesWings">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img221"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>EaglesWings</p><p>老鹰的翅膀</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=FatLadySings" target="_blank" title="FatLadySings">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img222"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>FatLadySings</p><p>胖女人辛斯</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyFoamyFortunes" target="_blank" title="RubyFoamyFortunes">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img223"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyFoamyFortunes</p><p>泡沫财富</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyFreezingFuzzballs" target="_blank" title="RubyFreezingFuzzballs">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img224"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyFreezingFuzzballs</p><p>冻结模糊球</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyHairyFairies" target="_blank" title="RubyHairyFairies">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img225"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyHairyFairies</p><p>毛茸茸的仙女</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyHellBoy" target="_blank" title="RubyHellBoy">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img226"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyHellBoy</p><p>地狱男爵</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=HellsGrannies" target="_blank" title="HellsGrannies">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img227"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>HellsGrannies</p><p>地狱阿嬷</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=IrishEyes" target="_blank" title="IrishEyes">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img228"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>IrishEyes</p><p>爱尔兰眼睛</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=JekyllAndHyde" target="_blank" title="JekyllAndHyde">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img229"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>JekyllAndHyde</p><p>判若两人</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=LuckyLeprechaunsLoot" target="_blank" title="LuckyLeprechaunsLoot">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img230"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>LuckyLeprechaunsLoot</p><p>妖精的战利品</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MugshotMadness" target="_blank" title="MugshotMadness">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img231"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MugshotMadness</p><p>疯狂假面</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyPharaohsGems" target="_blank" title="RubyPharaohsGems">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img232"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyPharaohsGems</p><p>隔离的宝石</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=PhantomCash" target="_blank" title="PhantomCash">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img233"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>PhantomCash</p><p>幻影现金</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=ParadiseFound" target="_blank" title="ParadiseFound">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img234"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>ParadiseFound</p><p>发现天堂</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=PiggyFortunes" target="_blank" title="PiggyFortunes">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img235"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>PiggyFortunes</p><p>小猪财富</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyOffsideAndSeek" target="_blank" title="RubyOffsideAndSeek">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img236"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyOffsideAndSeek</p><p>临门一脚</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=pureplatinum" target="_blank" title="pureplatinum">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img237"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>pureplatinum</p><p>纯铂</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RollerDerby" target="_blank" title="RollerDerby">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img238"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RollerDerby</p><p>滚德比</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RugbyStar" target="_blank" title="RugbyStar">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img239"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RugbyStar</p><p>橄榄球明星</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubySlamFunk" target="_blank" title="RubySlamFunk">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img240"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubySlamFunk</p><p>猛撞恐惧</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubySoccerSafari" target="_blank" title="RubySoccerSafari">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img241"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubySoccerSafari</p><p>动物足球</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Spingo" target="_blank" title="Spingo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img242"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Spingo</p><p>我推</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Starscape" target="_blank" title="Starscape">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img243"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Starscape</p><p>星云</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SteamPunkHeroes" target="_blank" title="SteamPunkHeroes">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img244"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SteamPunkHeroes</p><p>蒸汽朋克英雄</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Shoot" target="_blank" title="Shoot">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img245"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Shoot</p><p>跑起来</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubySuperZeroes" target="_blank" title="RubySuperZeroes">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img246"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubySuperZeroes</p><p>超级零点</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TensorBetterPwrPoker" target="_blank" title="TensorBetterPwrPoker">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img247"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TensorBetterPwrPoker</p><p>数万或更好</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SweetHarvest" target="_blank" title="SweetHarvest">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img248"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SweetHarvest</p><p>甜蜜的收获</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TheLostPrincessAnastasia" target="_blank" title="TheLostPrincessAnastasia">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img249"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TheLostPrincessAnastasia</p><p>失落的阿纳斯塔西娅公主</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyTurtleyAwesome" target="_blank" title="RubyTurtleyAwesome">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img250"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyTurtleyAwesome</p><p>棒棒乌龟</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=VictorianVillain" target="_blank" title="VictorianVillain">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img251"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>VictorianVillain</p><p>维多利亚的恶棍</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyWhackAJackpot" target="_blank" title="RubyWhackAJackpot">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img252"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyWhackAJackpot</p><p>瓜分大奖</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=TigerVsBear" target="_blank" title="TigerVsBear">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img253"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>TigerVsBear</p><p>熊虎之战</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=WhiteBuffalo" target="_blank" title="WhiteBuffalo">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img254"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>WhiteBuffalo</p><p>白水牛</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=WildCatch" target="_blank" title="WildCatch">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img255"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>WildCatch</p><p>野生捕鱼</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyWildChampionsh" target="_blank" title="RubyWildChampions">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img256"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyWildChampions</p><p>野生冠军</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyDoubleExposureBlackjackGold" target="_blank" title="RubyDoubleExposureBlackjackGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img257"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyDoubleExposureBlackjackGold</p><p>双重黄金曝光</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MultiWheelRouletteGold" target="_blank" title="MultiWheelRouletteGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img258"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MultiWheelRouletteGold</p><p>复式黄金轮盘</p></div> 
            			</div>
          				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MHEuropeanBJGold" target="_blank" title="MHEuropeanBJGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img259"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MHEuropeanBJGold</p><p>多手21点黄金桌</p></div> 
            			</div>
         				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=DrWattsUp" target="_blank" title="DrWattsUp">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img260"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>DrWattsUp</p><p>恐怖实验室</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=LuckyKoi" target="_blank" title="LuckyKoi">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img261"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>LuckyKoi</p><p>幸运的锦鲤</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=AtlanticCityBJGold" target="_blank" title="AtlanticCityBJGold">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img262"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>AtlanticCityBJGold</p><p>大西洋城黄金21点</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=ArcticAgents" target="_blank" title="ArcticAgents">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img263"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>ArcticAgents</p><p>北极财富</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyAroundTheWorld" target="_blank" title="RubyAroundTheWorld">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img264"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyAroundTheWorld</p><p>周游世界</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=big5" target="_blank" title="big5">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img265"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>big5</p><p>丛林五霸</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyChiefsFortune" target="_blank" title="RubyChiefsFortune">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img266"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyChiefsFortune</p><p>酋长的财富</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=DroneWars" target="_blank" title="DroneWars">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img267"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>DroneWars</p><p>雄蜂战争</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=geniesgems" target="_blank" title="geniesgems">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img268"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>geniesgems</p><p>精灵宝石</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=JekyllAndHyde" target="_blank" title="JekyllAndHyde">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img269"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>JekyllAndHyde</p><p>在它赢得它</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=Loaded" target="_blank" title="Loaded">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img270"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Loaded</p><p>加载</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MadHatters" target="_blank" title="MadHatters">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img271"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MadHatters</p><p>疯狂的帽子</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MajorMillions" target="_blank" title="MajorMillions">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img272"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>MajorMillions</p><p>百万船长</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=PollenNation" target="_blank" title="PollenNation">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img273"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>PollenNation</p><p>蜜蜂乐园</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=PremierRacing" target="_blank" title="PremierRacing">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img274"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>PremierRacing</p><p>一级赛车</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RamessesRiches" target="_blank" title="RamessesRiches">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img275"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RamessesRiches</p><p>拉美西斯的财富</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RubyTurtleyAwesome" target="_blank" title="RubyTurtleyAwesome">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img276"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RubyTurtleyAwesome</p><p>冲浪龟</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=throneofegypt" target="_blank" title="throneofegypt">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img277"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>throneofegypt</p><p>埃及王朝</p></div> 
            			</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=RoboJack" target="_blank" title="RoboJack">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img278"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>RoboJack</p><p>洛伯杰克</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=SantasWildRide" target="_blank" title="SantasWildRide">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img279"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>SantasWildRide</p><p>疯狂圣诞</p></div> 
            			</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=WhatonEarth" target="_blank" title="WhatonEarth">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img280"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>WhatonEarth</p><p>地球生物</p></div> 
            			</div>

						<div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=MonkeyKeno" target="_blank" title="MonkeyKeno">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="xin36"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>Monkey Keno</p><p>猴子基诺</p></div> 
            			</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Pistoleras', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Pistoleras" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin37"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Mystery woman</p><p>神秘女枪手</p></div>
						</div>


						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=WheelOfWealthSEV90', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="WheelOfWealthSEV90" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin38"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Fortune runner</p><p>财富转轮</p></div>
						</div>

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=TigerMoon', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="TigerMoon" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin39"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Tiger month</p><p>虎月</p></div>
						</div>


					<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=TheFinerReelsOfLife', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="TheFinerReelsOfLife" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin40"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Wonderful life</p><p>精彩人生</p></div>
						</div>

						
					<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Terminator2', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Terminator2" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin41"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Terminator 2</p><p>魔鬼终结者2</p></div>
						</div>

							
					<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=TensorBetterPwrPoker', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="TensorBetterPwrPoker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin42"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The top Power Poker PP</p><p>尖子威力扑克PP</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=TensorBetter', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="TensorBetter" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin43"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The top Power Poker</p><p>尖子威力扑克</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=StashoftheTitans', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="StashoftheTitans" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin44"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Titan Temple</p><p>泰坦神庙</p></div>
						</div>


			<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=StarscapeV90', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="StarscapeV90" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin45"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>StarCraft</p><p>星际争霸</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=SpringBreak', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="SpringBreak" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin46"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Beach Life</p><p>海滨嘉年华</p></div>
						</div>

						
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Spingo', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Spingo" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin47"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Italy turntable</p><p>意大利转盘</p></div>
						</div>

							
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Spectacular', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Spectacular" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin48"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Grand Theater</p><p>华丽剧场</p></div>
						</div>


						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=SovereignOfTheSevenSeas', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="SovereignOfTheSevenSeas" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin49"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>The guardians of sovereignty</p><p>七海的主权</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=Shoot', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="Shoot" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin50"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Shooting master</p><p>射门高手</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyWorldCupMania', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyWorldCupMania" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin51"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>World Cup madness</p><p>世界杯疯狂</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyWasabiSan', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyWasabiSan" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin52"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Rotary sushi</p><p>旋转寿司</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyTwister', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyTwister" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin53"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Rotary World</p><p>旋转世界</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyThreeWheeler', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyThreeWheeler" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin54"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Tricycle</p><p>三轮车</p></div>
						</div>

						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyThousandIslands', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyThousandIslands" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin55"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Qiandao Lake</p><p>千岛湖</p></div>
						</div>

							<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						 <a href="JavaScript:;" onclick="if(!check_lg()){  return false;}  window.open('/newmg2/playgame.php?id=RubyTheRatPack', '', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank"  title="RubyTheRatPack" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"  class="xin56"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Rat overlord</p><p>老鼠霸王</p></div>
						</div>
                  
                        <div class="clearfix"></div>
                        <div class="pai" ></div>
                </div>
            </div>
          </div>
        </div>
        <div id="page_navigation" style="padding-bottom: 10px; margin-top: 10px;"></div>    
        <div style="clear: both;height: 100px;"></div>
        </section>
    </form>    
</body>

</html>

