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
</head>
<script language="javascript">
    if(self==top){
        top.location='/index.php';
    }

</script>
		
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
                <li><a href="one.php" onclick="LoadHotGame(this)" class="" style="width: 94px;" >热门游戏</a></li>
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
						
										
						<div   class="col-xs-6 col-md-4 col-lg-3"  >
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=501" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank"  title="US Roulette" >
						<img class="lazy" src="images/FRU.jpg"   data-original="images/FRU.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US Roulette</p><p>水果拉霸</p></div>
						</div>
						
						<div  class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=502" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank" title="Sicbo" >
						<img class="lazy" src="images/PKBJ.jpg" data-original="images/PKBJ.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Sicbo</p><p>杰克高手</p>
						</div>
						</div>
					
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=503" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank"    title="Red Dog" >
						<img class="lazy" src="images/SLM1.jpg" data-original="images/SLM1.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>美女沙排</p>
						</div>
						</div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=504" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" target="_blank">
						<img class="lazy" src="images/SLM2.jpg" data-original="images/SLM2.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Last Dinosaurs</p><p>新年运财羊</p>
						</div>
						</div>

						
						
					
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=505" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Happy Farm" target="_blank">
						<img class="lazy" src="images/SLM3.jpg" data-original="images/SLM3.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Happy Farm</p><p>武圣传</p></div></div>
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  href="/newag2/playgame2.php?gamename=506" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SC01.jpg" data-original="images/SC01.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Gold Miner</p>
						<p>幸运老虎机</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=507" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="EU Roulette" target="_blank">
						<img class="lazy" src="images/TGLW.jpg" data-original="images/TGLW.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>EU Roulette</p><p>急速幸运轮</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=508" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Dragon Ball" target="_blank">
						<img class="lazy" src="images/SB01.jpg" data-original="images/SB01.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Dragon Ball</p><p>太空漫游</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=509" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Cowboy" target="_blank">
						<img class="lazy" src="images/SB02.jpg" data-original="images/SB02.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Cowboy</p><p>复古花园</p></div></div>
						
						
	                    <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=510" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Circus Wagon" target="_blank">
						<img class="lazy" src="images/SB03.jpg" data-original="images/SB03.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Circus Wagon</p><p>闯关东</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=511" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Caboose Man" target="_blank">
						<img class="lazy" src="images/SB04.jpg" data-original="images/SB04.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Caboose Man</p><p>牧场咖啡</p></div></div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div  class="slots-game-item"  title="Blackjack" target="_blank">
						<a href="/newag2/playgame2.php?gamename=512" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Blackjack" target="_blank">
						
						<img class="lazy" src="images/SB05.jpg" data-original="images/SB05.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>甜甜屋</p></div></div>
						
						
						
			
						
						
				
						
						
						
						       
					<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=513" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="US Roulette" href="javascript:void(0)">
						<img class="lazy" src="images/SB06.jpg" data-original="images/SB06.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US Roulette</p><p>日本武士</p></div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=514" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Sicbo" target="_blank">
						<img class="lazy" src="images/SB07.jpg" data-original="images/SB07.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Sicbo</p><p>象棋老虎机</p>
						</div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=515" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Red Dog" target="_blank">
						<img class="lazy" src="images/SB08.jpg" data-original="images/SB08.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>麻将老虎机</p>
						</div>
						</div>
						
									
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a  href="/newag2/playgame2.php?gamename=516" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Blackjack" target="_blank">
						<img class="lazy" src="images/SB09.jpg" data-original="images/SB09.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>西洋棋老虎机</p></div></div>
						
		
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=517" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Last Dinosaurs" target="_blank">
						<img class="lazy" src="images/SB10.jpg" data-original="images/SB010.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Last Dinosaurs</p><p>开心农场</p>
						</div>
						</div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=518" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Happy Farm" target="_blank">
						<img class="lazy" src="images/SB11.jpg" data-original="images/SB11.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Happy Farm</p><p>夏日营地</p></div></div>
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=519" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB12.jpg" data-original="images/SB12.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Gold Miner</p>
						<p>海底漫游</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=520" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="EU Roulette" target="_blank">
						<img class="lazy" src="images/SB13.jpg" data-original="images/SB13.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>EU Roulette</p><p>鬼马小丑</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=521" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Dragon Ball" target="_blank">
						<img class="lazy" src="images/SB14.jpg" data-original="images/SB14.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Dragon Ball</p><p>机动乐园</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=522" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Cowboy" target="_blank">
						<img class="lazy" src="images/SB15.jpg" data-original="images/SB15.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Cowboy</p><p>惊吓鬼屋</p></div></div>
						
						

						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=523" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Caboose Man" target="_blank">
						<img class="lazy" src="images/SB16.jpg" data-original="images/SB16.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Caboose Man</p><p>疯狂马戏团</p></div></div>

						
			
				
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
									
						     
						
				<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=524" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="US Roulette" target="_blank">
						<img class="lazy" src="images/SB17.jpg" data-original="images/SB17.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US Staronic</p><p>海洋剧场</p></div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=525" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Sicbo" target="_blank">
						<img class="lazy" src="images/SB18.jpg" data-original="images/SB18.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>US Staronic</p><p>水上乐园</p>
						</div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=526" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Red Dog" target="_blank">
						<img class="lazy" src="images/SB19.jpg" data-original="images/SB19.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>空中战争</p>
						</div>
						</div>
						
									
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=527" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Blackjack" target="_blank">
						<img class="lazy" src="images/SB20.jpg" data-original="images/SB20.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>摇滚狂迷</p></div></div>
						
		
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=528" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Last Dinosaurs" target="_blank">
						<img class="lazy" src="images/SB21.jpg" data-original="images/SB21.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Last Dinosaurs</p><p>越野机车</p>
						</div>
						</div>
						
						
						
							                    <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=529" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Circus Wagon" target="_blank">
						<img class="lazy" src="images/SB22.jpg" data-original="images/SB22.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>AI JI</p><p>埃及秘密</p></div></div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=530" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;} title="Happy Farm" target="_blank">
						<img class="lazy" src="images/SB23.png" data-original="images/SB23.png" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Happy Farm</p><p>欢乐时光</p></div></div>
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=531" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB24.jpg" data-original="images/SB24.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Jurassic Period</p>
						<p>侏罗纪</p></div></div>
						
						
						
						
											<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=532" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB25.jpg" data-original="images/SB25.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Village god</p>
						<p>土地神</p></div></div>
						
						
						
						
											<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=533" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB26.jpg" data-original="images/SB26.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>The cloth bag monk</p>
						<p>布袋和尚</p></div></div>
						
						
						
						
											<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=534" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB27.jpg" data-original="images/SB27.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Is the God of wealth</p>
						<p>正财神</p></div></div>
						
						
						
						
						
											<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=535" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB28.jpg" data-original="images/SB28.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Fortuna Wu </p>
						<p>武财神</p></div></div>
						
						
						
						
											<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=536" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Gold Miner" target="_blank">
						<img class="lazy" src="images/SB29.jpg" data-original="images/SB29.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Is the God of wealth</p>
						<p>偏财神</p></div></div>
						
						
						
						
						
						
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=537" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="EU Roulette" target="_blank">
						<img class="lazy" src="images/AV01.jpg" data-original="images/AV01.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>EU Roulette</p><p>性感女仆</p></div></div>
						
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=600" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Dragon Ball" target="_blank">
						<img class="lazy" src="images/XG01.jpg" data-original="images/XG01.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Dragon Ball</p><p>龙珠</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=601" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Cowboy" target="_blank">
						<img class="lazy" src="images/XG02.jpg" data-original="images/XG02.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Cowboy</p><p>幸运8</p></div></div>
						
						
	                    <div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=602" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"   title="Circus Wagon" target="_blank">
						<img class="lazy" src="images/XG03.jpg" data-original="images/XG03.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Circus Wagon</p><p>闪亮女郎</p></div></div>
						
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=603" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Caboose Man" target="_blank">
						<img class="lazy" src="images/XG04.jpg" data-original="images/XG04.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Caboose Man</p><p>金鱼</p></div></div>

						
						
						
						
			
						
						
						
						
						
						
									
						    
			<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=604" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="US Roulette" target="_blank">
						<img class="lazy" src="images/XG05.jpg" data-original="images/XG05.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>US FIFA2010</p><p>中国新年</p></div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=605" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Sicbo" target="_blank">
						<img class="lazy" src="images/XG06.jpg" data-original="images/XG06.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>US Staronic</p><p>海盗王</p>
						</div>
						</div>
						
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=606" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}"  title="Red Dog" target="_blank">
						<img class="lazy" src="images/XG07.jpg" data-original="images/XG07.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a><p>Red Dog</p><p>鲜果狂乐</p>
						</div>
						</div>
						
									
						<div class="col-xs-6 col-md-4 col-lg-3">
						<div class="slots-game-item">
						<a href="/newag2/playgame2.php?gamename=607" onclick="if(<?echo($_SESSION['username']==''?'true':'false')?>){alert('请先登录');return false;}" title="Blackjack" target="_blank">
						<img class="lazy" src="images/XG08.jpg" data-original="images/XG08.jpg" alt="" style="display: inline;">
						<span class="watermark">开始游戏</span></a>
						<p>Blackjack</p><p>小熊猫</p></div></div>
						
		
						
						
						
						
					
						
						
						
						
						
						
			
						
						
						
						
						
						
						
						
                       
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

