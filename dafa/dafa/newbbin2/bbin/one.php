<?php
	if(!isset($_SESSION)){ session_start();}
	if($_SESSION['uid']==''){$logined=0;}else{$logined=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



 
        <title>BBIN 电子游戏</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="jPaginate - jQuery Pagination Plugin" />
        <meta name="keywords" content="jquery, plugin, pagination, fancy" />

		    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />

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




















<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//how much items per page to show
	var show_per_page = 9; 
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
<script type="text/javascript">

	$(function(){
		
		//if(!check_lg()){ alert('请先登录!'); return;}  window.open('url', '惑星战记', 'height=400, width=700, top=200, left=50%,margin-left=-350 toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');<?php echo '/newbbin2/index.php?site=game'?>&GameType=5005
	})
	function check_lg(){
	  return (<?=$logined?>==1);
	}

</script>
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
    width: 275px;
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
                <li><a href="one.php" onclick="LoadHotGame(this)"  style="width: 94px;" class="active">热门游戏</a></li>
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
		<!--
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a  href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5103', '彩金轮盘', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank" title="Red Dog"  target="_blank"  title="US Roulette" ><img class="lazy" src="images/USRoulette.jpg"   data-original="images/USRoulette.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US Roulette</p><p>蒸气炸弹</p></div>
						</div>
						
						<div  class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5103', '彩金轮盘', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank" title="Sicbo" >
						<img class="lazy" src="images/sicbo.jpg" data-original="images/sicbo.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Sicbo</p><p>麻将连环宝</p>
						</div>
						</div>-->
					
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5108', '彩金轮盘', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank" title="Red Dog" >
						<img class="lazy" src="images/redDog.jpg" data-original="images/redDog.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>彩金轮盘</p>
						</div>
						</div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5902', '糖果派对', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" title="Last Dinosaurs" target="_blank" >
						<img class="lazy" src="images/lastDinosaurs.jpg" data-original="images/lastDinosaurs.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Last Dinosaurs</p><p>糖果派对</p>
						</div>
						</div>

						
						
					
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5901', '连环夺宝', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" title="Happy Farm" target="_blank">
						<img class="lazy" src="images/happyFarm.jpg" data-original="images/happyFarm.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Happy Farm</p><p>连环夺宝</p></div></div>
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5837', '喜福猴年', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  title="Gold Miner" target="_blank">
						<img class="lazy" src="images/goldMiner.jpg" data-original="images/goldMiner.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Gold Miner</p>
						<p>喜福猴年</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  title="EU Roulette" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5106', '三国', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank">
						<img class="lazy" src="images/EURoulette.jpg" data-original="images/EURoulette.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>EU Roulette</p><p>三国</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a otitle="Dragon Ball" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5404', '沙滩排球', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank">
						<img class="lazy" src="images/dragonBall.jpg" data-original="images/dragonBall.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Dragon Ball</p><p>沙滩排球</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  title="Cowboy" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5083', '钻石列车', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank">
						<img class="lazy" src="images/cowboy.jpg" data-original="images/cowboy.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Cowboy</p><p>钻石列车</p></div></div>
						
						
	                    <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a title="Circus Wagon" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5058', '疯狂水果盘', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank">
						<img class="lazy" src="images/circusWagon.jpg" data-original="images/circusWagon.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Circus Wagon</p><p>疯狂水果盘</p></div></div>
						
				
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5095', '斗鸡', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  title="Caboose Man" target="_blank">
						<img class="lazy" src="images/CabooseMan.jpg" data-original="images/CabooseMan.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Caboose Man</p><p>斗鸡</p></div></div>
					
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5043', '钻石水果盘', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" title="Blackjack" target="_blank">
						<img class="lazy" src="images/blackjack.jpg" data-original="images/blackjack.jpg?t=000111" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>钻石水果盘</p></div></div>
						
						
						
			
						
						
				
						
						
						
						       
					<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  title="US Roulette" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5084', '圣兽传说', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" target="_blank">
						<img class="lazy" src="images/Game_5084.png" data-original="images/Game_5084.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US Roulette</p><p>圣兽传说</p></div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a title="Sicbo" target="_blank" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5835', '喜福牛年', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5835.png" data-original="images/Game_5835.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Sicbo</p><p>喜福牛年</p>
						</div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Red Dog" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5601', '秘境冒险', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5601.png" data-original="images/Game_5601.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>秘境冒险</p>
						</div>
						</div>
						
									
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Blackjack" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5402', '夜市人生', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5402.png" data-original="images/Game_5402.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>夜市人生</p></div></div>
						
		
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Last Dinosaurs" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5076', '数字大转轮', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5076.png" data-original="images/Game_5076.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Last Dinosaurs</p><p>数字大转轮</p>
						</div>
						</div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank" title="Happy Farm" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5005', '惑星战记', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5005.png" data-original="images/Game_5005.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Happy Farm</p><p>惑星战记</p></div></div>
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Gold Miner" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5057', '明星97', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5057.png" data-original="images/Game_5057.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Gold Miner</p>
						<p>明星97</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="EU Roulette" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5013', '传统', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5013.png" data-original="images/Game_5013.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>EU Roulette</p><p>传统</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"   title="Dragon Ball" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5823', '发大财', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5823.png" data-original="images/Game_5823.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Dragon Ball</p><p>发大财</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5009', '西游记', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5011.png" data-original="images/Game_5011.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Cowboy</p><p>西游记</p></div></div>
						
						
	                    <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"   title="Circus Wagon" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5020', '热带风情', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5025.png" data-original="images/Game_5025.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Circus Wagon</p><p>法海斗白蛇</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"   title="Caboose Man" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5044', '明星79II', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5044.png" data-original="images/Game_5044.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Caboose Man</p><p>明星97II</p></div></div>

						
			
				
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
									
						     
						
				<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="US Roulette" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5012', '外星争霸', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5012.png" data-original="images/Game_5012.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US Staronic</p><p>外星争霸</p></div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"   title="Sicbo" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5006', 'Starburst', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5006.png" data-original="images/Game_5006.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>US Staronic</p><p>Staronic</p>
						</div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Red Dog" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5079', '3D数字大转轮', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5079.png" data-original="images/Game_5079.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>3D数字大转轮</p>
						</div>
						</div>
						
									
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  target="_blank" title="Blackjack" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5091', '三国拉霸', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5091.png" data-original="images/Game_5091.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>三国拉霸</p></div></div>
						
		
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Last Dinosaurs" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5014', '丛林', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5014.png" data-original="images/Game_5014.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Last Dinosaurs</p><p>丛林</p>
						</div>
						</div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank" title="Happy Farm" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5018', '齐天大圣', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5018.png" data-original="images/Game_5018.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Happy Farm</p><p>齐天大圣</p></div></div>
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Gold Miner" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5020', '热带风情', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5020.png" data-original="images/Game_5020.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Gold Miner</p>
						<p>热带风情</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="EU Roulette" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5019', '水果乐园', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5019.png" data-original="images/Game_5019.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>EU Roulette</p><p>水果乐园</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Dragon Ball" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5805', '凯撒帝国', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5805.png" data-original="images/Game_5805.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Dragon Ball</p><p>凯萨帝国</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Cowboy" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5093', '金瓶梅', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5093.png" data-original="images/Game_5093.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Cowboy</p><p>金瓶梅</p></div></div>
						
						
	                    <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Circus Wagon" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5077', '水果大转轮', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5077.png" data-original="images/Game_5077.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Circus Wagon</p><p>水果大转轮</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Caboose Man" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5204', '2014FIFA', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5204.png" data-original="images/Game_5204.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Caboose Man</p><p>2014 FIFA</p></div></div>

						
						
						
						
			
						
						
						
						
						
						
									
						    
			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="US Roulette" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5015', 'FIFA2010', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5015.png" data-original="images/Game_5015.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US FIFA2010</p><p>FIFA2010</p></div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Sicbo" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5059', '马戏团', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5059.png" data-original="images/Game_5059.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>US Staronic</p><p>马戏团</p>
						</div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a target="_blank"  title="Red Dog" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5088', '斗大', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5088.png" data-original="images/Game_5088.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>斗大</p>
						</div>
						</div>
						
									
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item"><a target="_blank"  title="Blackjack" href="javascript:;" onclick="if(!check_lg()){ alert('请先登录!'); return;}  window.open('<?php echo '/newbbin2/index.php?site=game'?>&GameType=5061', '超级7', 'height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">
						<img class="lazy" src="images/Game_5061.png" data-original="images/Game_5061.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>超级7</p></div></div>
						
		
						
						
						
					
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
                       
                        <div class="clearfix"></div>
  
						
						
						
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

