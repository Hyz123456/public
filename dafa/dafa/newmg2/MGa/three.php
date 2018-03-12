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
    width: 265px;
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
                <li><a href="one.php" onclick="LoadHotGame(this)"  style="width: 94px;" class="">热门游戏</a></li>
                <li><a href="two.php" onclick="LoadAllGame(this)" style="width: 94px;" class="">全部游戏</a></li>
                <li><a href="three.php" onclick="LoadVideoSlot(this)" style="width: 94px;" class="active">经典老虎机</a></li>
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
						
							
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=LuckyFirecracker" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img1"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>LuckyFirecracker</p><p>招财鞭炮</p></div>
						</div>    
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyLuckyNumbers" target="_blank"  title="RubyLuckyNumbers" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img55"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyLuckyNumbers</p><p>幸运数字</p></div>
						</div> 
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=cashcrazy" target="_blank"  title="cashcrazy" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img83"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>cashcrazy</p><p>疯狂现金</p></div>
						</div> 
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Carnaval" target="_blank"  title="Carnaval" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img84"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Carnaval</p><p>狂欢节​</p></div>
						</div>
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=SecretSanta" target="_blank"  title="SecretSanta" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img34"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>SecretSanta</p><p>神秘圣诞老人​</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyBunnyBoiler" target="_blank"  title="RubyBunnyBoiler" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img63"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyBunnyBoiler</p><p>兔子锅炉​</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=PeekaBoo5Reel" target="_blank"  title="PeekaBoo5Reel" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img12"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>PeekaBoo5Reel</p><p>躲猫猫​</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=luckytwins" target="_blank"  title="luckytwins" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img13"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>luckytwins</p><p>幸运双星​</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=ChainMailNew" target="_blank"  title="ChainMailNew" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img14"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>ChainMailNew</p><p>锁子甲​</p></div>
						</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=HotAsHades" target="_blank"  title="HotAsHades" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img15"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>HotAsHades</p><p>地府烈焰</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Pistoleras" target="_blank"  title="Pistoleras" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img16"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Pistoleras</p><p>持枪王者</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=LuckyLeprechaunsLoot" target="_blank"  title="LuckyLeprechaunsLoot" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img17"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>LuckyLeprechaunsLoot</p><p>幸运的小妖精</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=KittyCabana" target="_blank"  title="KittyCabana" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img18"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>KittyCabana</p><p>凯蒂卡巴拉</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=HoundHotel" target="_blank"  title="HoundHotel" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img19"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>HoundHotel</p><p>酷犬酒店</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Ariana" target="_blank"  title="Ariana" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img20"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Ariana</p><p>爱丽娜</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyHitman" target="_blank"  title="RubyHitman" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img59"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyHitman</p><p>杀手</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=HappyNewYear" target="_blank"  title="HappyNewYear" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img60"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>HappyNewYear</p><p>新年快乐</p></div>
						</div>
           				<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyHandToHandCombat" target="_blank"  title="RubyHandToHandCombat" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img61"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyHandToHandCombat</p><p>肉搏战</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyGoldCoast" target="_blank"  title="RubyGoldCoast" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img62"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyGoldCoast</p><p>黄金海岸</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=StarlightKiss"  target="_blank"  title="StarlightKiss" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img3"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>StarlightKiss</p><p>星光之吻</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyAgeOfDiscovery"  target="_blank"  title="RubyAgeOfDiscovery" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img4"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyAgeOfDiscovery</p><p>大航海时代</p></div>
						</div>
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=KaratePig" target="_blank"  title="KaratePig" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img5"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>KaratePig</p><p>空手道猪</p></div>
						</div>
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=GoldFactory" target="_blank"  title="GoldFactory" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img6"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>GoldFactory</p><p>黄金工厂</p></div>
						</div>
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Carnaval" target="_blank"  title="Carnaval" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img7"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Carnaval</p><p>狂欢节</p></div>
						</div>
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=BustTheBank" target="_blank"  title="BustTheBank" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img8"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>BustTheBank</p><p>抢劫银行</p></div>
						</div>
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=LuckyFirecracker" target="_blank"  title="LuckyFirecracker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img22"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>LuckyFirecracker</p><p>拉斯韦加斯</p></div>
						</div>			

		

	 <div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=LeaguesOfFortune" target="_blank" title="LeaguesOfFortune">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img286"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>LeaguesOfFortune</p><p>财富阶级</p></div> 
           				            			</div>
           				            			<div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=AtlanticCityBJGold" target="_blank" title="AtlanticCityBJGold">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img287"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>AtlanticCityBJGold</p><p>赌场大赢家</p></div> 
           				            			</div>
           				            			<div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=PokerPursuit" target="_blank" title="PokerPursuit">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img288"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>PokerPursuit</p><p>扑克追求</p></div> 
           				            			</div>
           				            			<div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=AcesfacesPwrPoker" target="_blank" title="AcesfacesPwrPoker">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img289"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>AcesfacesPwrPoker</p><p>A及花牌</p></div> 
           				            			</div><div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="slots-game-item">
                        <a href="/newmg2/playgame.php?id=VictorianVillain" target="_blank" title="VictorianVillain">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img281"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>VictorianVillain</p><p>维多利亚女王时代的小人</p></div> 
            			</div>
           				 <div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=TreasureNile" target="_blank" title="TreasureNile">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img282"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>TreasureNile</p><p>尼罗河宝藏</p></div> 
           				            			</div>
           				            			<div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=RubyHalloweenies" target="_blank" title="RubyHalloweenies">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img283"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>RubyHalloweenies</p><p>万圣节</p></div> 
           				            			</div><div class="col-xs-6 col-md-4 col-lg-3">
           				                        <div class="slots-game-item">
           				                        <a href="/newmg2/playgame.php?id=TombRaiderV90" target="_blank" title="TombRaiderV90">
           				                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img284"></div>
           				                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
           				                         <p>TombRaiderV90</p><p>古墓奇兵</p></div> 
           				            			</div>
           				            			

			
                           <!-- <div class="modal"></div>-->                           
                        <div class="clearfix"></div>
                        <div class="pai" >
						
						
						
					<!--class="slots-pagination"--> 


		
						
						
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

