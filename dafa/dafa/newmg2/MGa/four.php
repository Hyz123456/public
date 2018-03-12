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
                <li><a href="three.php" onclick="LoadVideoSlot(this)" style="width: 94px;" class="">经典老虎机</a></li>
                <li><a href="four.php" onclick="LoadClassicSlot(this)" style="width: 94px;" class="active">老虎机</a></li>
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
						<a href="/newmg2/playgame.php?id=RubyWhackAJackpot" target="_blank"  title="RubyWhackAJackpot" >
                        	<div id="imgs"  class="img36" onclick="if(!check_lg()){ alert('请先登录!'); return false;}"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyWhackAJackpot</p><p>刮刮卡</p></div>
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
                        <a href="/newmg2/playgame.php?id=PremierTrotting" target="_blank" title="PremierTrotting">
                            <div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img143"></div>
                            <span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
                         <p>PremierTrotting</p><p>拖拽赛马</p></div> 
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
						<a href="/newmg2/playgame.php?id=RubyMunchkins" target="_blank"  title="RubyMunchkins" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img52"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyMunchkins</p><p>梦境</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=EnchantedWoods" target="_blank"  title="EnchantedWoods" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img78"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>EnchantedWoods</p><p>魔法森林</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=HighSociety" target="_blank"  title="HighSociety" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img73"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>HighSociety</p><p>上流社会</p></div>
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
						<a href="/newmg2/playgame.php?id=BootyTime" target="_blank"  title="BootyTime" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img87"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>BootyTime</p><p>藏宝时间</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Baccarat" target="_blank"  title="Baccarat" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img88"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Baccarat</p><p>百家乐</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Avalon" target="_blank"  title="Avalon" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img89"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Avalon</p><p>阿瓦隆</p></div>
						</div>
            			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Avalon2" target="_blank"  title="Avalon2" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img90"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Avalon2</p><p>阿瓦隆2</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=CrownAndAnchor" target="_blank"  title="CrownAndAnchor" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img33"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>CrownAndAnchor</p><p>骰宝</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubySuperBonusBingo" target="_blank"  title="RubySuperBonusBingo" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img43"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubySuperBonusBingo</p><p>超级奖金宾果</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyTriplePocketPoker" target="_blank"  title="RubyTriplePocketPoker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img40"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyTriplePocketPoker</p><p>掌上扑克​</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyAllAces" target="_blank"  title="RubyAllAces" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img54"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyAllAces</p><p>扑克</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyJoker8000" target="_blank"  title="RubyJoker8000" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img58"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyJoker8000</p><p>小丑8000</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyBonusPokerDeluxe" target="_blank"  title="RubyBonusPokerDeluxe" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img64"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyBonusPokerDeluxe</p><p>豪华奖金扑克</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyBonusPoker" target="_blank"  title="RubyBonusPoker" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img65"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyBonusPoker</p><p>红利扑克</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=RubyAllAces" target="_blank"  title="RubyAllAces" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img67"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>RubyAllAces</p><p>王牌扑克</p></div>
						</div>
                        <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newmg2/playgame.php?id=Baccarat" target="_blank"  title="Baccarat" >
                        	<div id="imgs" onclick="if(!check_lg()){ alert('请先登录!'); return false;}" class="img88"></div>
							<span class="watermark" onclick="if(!check_lg()){ alert('请先登录!'); return false;}">开始游戏</span></a>
						<p>Baccarat</p><p>百家乐</p></div>
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
			
                           <!-- <div class="modal"></div>   -->                        
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

