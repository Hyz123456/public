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
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript" src="/js/top.js"></script>
<script language="javascript" src="/cl/js/common.js"></script>
<link href="/member/zhenren/newindex/standard.css?_=171" rel="stylesheet" type="text/css" />
<link href="/member/zhenren/newindex/haier2.css" rel="stylesheet" type="text/css">
<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<style>
    #bg_000 .main_bg{    width: 100%;
    height: 251px;
    background: url(/imgs/about_zr.png) repeat-x center -7px;}
    #bg_000 .about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
    #bg_000 .about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
    .about_main_w .about_top{ width:1080px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
    .about_main_w .about_main{ width:1080px; background:url(/imgs/about_bg02.png) repeat-y center top; }
    .about_main_top{
        background: url(../imgs/about_bg01.png) no-repeat center 0px;
        height: 89px;
        color: #fff;
        padding-left: 125px;
    }
    .pic_list div{ width:990px; height:254px; margin:20px auto 0; overflow:hidden; }
    div.list_1{ background:url(/imgs/1.png) no-repeat center top; margin-top:0; }
    div.list_2{ background:url(/imgs/2.png) no-repeat center top; }
    div.list_3{ background:url(/imgs/3.png) no-repeat center top; }
    .pic_list div a{ display:block; float:left; width:50%; height:100%; }
	.fonts{   
		cursor: pointer;
    color: white;
    font-family: 微软雅黑, Arial;
    font-size: 13px;
	height: 30px;
	line-height: 30px;
	}
</style>
<body id="zhuce_body" style="padding: 0x;margin:0;min-width:1000px;background:#8c5e00;">

		
    <div id="bg_000">
	   	<div class="main_bg"></div>
        <div class="about_bg">
            <div class="about_main_w">
                <div class="about_top">
                    <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"><marquee class="fonts" onclick="HotNewsHistory();"  scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div></div>
                </div>
                <div class="about_main">
                    <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top"></div>
	
<div>


<div class="wrap">
	<div class="left">
    	<div class="nav_icon"><img src="/imgs/img/nav_icon.png" /></div>
    	<nav id="filter"></nav>
    </div>
    <div id="container">
       <ul id="stage">
        	<li data-tags="老虎机"><img src="/imgs/img/icon_sgj.jpg" alt="水果机" />
				<span class="game_zc">
			
			
            	<a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=bnkL4P1J9n1Rb9Zu7btvYC6YMgilWXScKc7z25GqBMqLhm24DvGyQ03vT0xKE+Pka6pZCNK85RLrl9ZVuKgOeoLTVLZ0C3YxNlxmZdJs4LJhZB7kRHIoyEwpFuI0C5Dq2zVBZROA6Xz6PEG5UqvqFRCpcxYLqhhZ0vMGJ6yYVY8=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwMTwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '水果机', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
				
				<a href="javascript:;" title="水果机" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0001', '水果机', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } "  class="ve">进入游戏</a>
	
		
				</span>

				
				</li>
            
            <li data-tags="对战"><img src="/imgs/img/icon_hlddz.jpg" alt="欢乐斗地主" /><span class="game_zc">
            	<a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=PIKbRYHflis8z0YtioiTqv8OXTnla3IRa7OVjabstQwjhonrNTc0ZWO9W5iQ7h7xVO38dGNv7zaTVLTNiQDuLL84oqXq4ogba7lUg07JKijsXsEvHAGZG5xdOiAyTE+eE3h7QhJA1xxYx4fMtGP4XnJhP3zMDqjUTx1uoJHRxe8=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwNjwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '欢乐斗地主', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>

				<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0006', '欢乐斗地主', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
				
				</span></li>
                
            <li data-tags="对战"><img src="/imgs/img/icon_zjh.jpg" alt="炸金花" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=O+UiJM/FBsSNG/qfXDH8sw4DRgqOfwcolhvP3RVn/a0ovjfVQakW8Z/lf1EO9BGGgaVhSQelO2+ewvdLOW5nW5wNSOiom6UFZJryESmt/nTwhP1Oa55Zi5Omig1NbgeXBoKcCgR0dOeS7Npnz2Awn2F8+MyQpLpkI/L43TbUQok=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxNjwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '炸金花', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
				
						<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0016', '炸金花', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
				
				
				
		
			</span></li>
            
            <li data-tags="对战"><img src="/imgs/img/icon_sh.jpg" alt="梭哈" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=DTPjM4z+zy+G8CnT2FPf5VuGZ462Th4hq8de0yt4Q/BrRop8vzkH1UYCqvs98/RDCur5rGuqNXwjhKqfXI6ksPOgUBpa15kysapC7OWWnLo1xk7Rqr1BUicQODYYh7131ABZiAt174/h1g2xSq4/pMv+zzgNy3kvU/FuOcnjB/Q=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxNzwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '梭哈', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
				
						
						<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0017', '梭哈', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
				
				
						
						
						
			
			</span></li>
            
            <li data-tags="多人"><img src="/imgs/img/icon_brnn.jpg" alt="百人牛牛" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=mcy8HRCgXSk/+ms9jQNNR2j8TUVD05dtPtg4bkqi71j7XYtqZIxgulfiQqGOpNNMT35w6k8GSEpH9qiz2JAgUOhrZMOoo1bCOI9btAlM3zIaFUK1fTidQG6jL9WGRdMzEsE6jFP5N4WMOISl6p5eWN5nTLHIvDZJ5CFt5LooqCg=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwOTwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '百人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
						
			<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0009', '百人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
				
				
						
				
			</span></li>
            
            <li data-tags="多人"><img src="/imgs/img/icon_fqzs.jpg" alt="飞禽走兽" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=BA8plxVh/kU6Rdi2DOvd9R92BX9KW3jXPJ2WiFeotbhAczF5SCFLbPF4kwwhaDLJAdDm4lM/3r8fmWvrrztveVo5zXZGNum67BXrNuciwJFrWoQx93Rbq77rX62EhywfU0BVAaA2CMQ0Jwi+DO8HOBLqOKCqAhQtaopIUieX8xQ=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwNzwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '飞禽走兽', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
				
		<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0007', '飞禽走兽', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
				
			
		</span></li>
            
            <li data-tags="多人"><img src="/imgs/img/icon_hcpy.jpg" alt="豪车漂移" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=UN8km508k+rFP0p1H9fioY8uVbJSSd/nQ87AAnuV8tjxXfu5p6Vh1ocoooWCGFBa5Tpa9Z/Z7YckTxxB+zsqZ6c9GfZcY1mWPGHy4rLODPy9NNVf1oJJDOWBTmM9R3M7BHo38Kq8aXetxa+UGrX9U+Njm3pIcH7TiIVLSVZ7xho=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwODwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '豪车漂移', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
					<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0008', '豪车漂移', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						

					
		
			</span></li>
            
            <li data-tags="捕鱼"><img src="/imgs/img/icon_dntg.jpg" alt="大闹天宫" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=kQkDQL677sMhOJzsCPIMAs7qdk7wq1oeZRc/EtZEgslPVMSs1ubEm0IBHbXynx1GR39Q1mxnd36uQ70/J0as1+TgIh+qw4qoNQcoM/XUa9AOZpFuui9qyV4iHNlGb9EeBuOneGQicS9/1dVXQvNv9skDpO8EeKJO+ouKF0nnw3k=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxMjwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '大闹天宫', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
					
					
	<a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0012', '大闹天宫', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						


			</span></li>
            
            <li data-tags="老虎机"><img src="/imgs/img/icon_shz.jpg" alt="水浒传" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=vO74NCD47Rv1v3l89TKVZdsHfCfrZqAQaothI7XGWKtZ/3ixYG3eK45/sg42yJ+Z8hIu/Pr6ueZVUbz8tX9qBlX0u98RQVC08ePbSWDCKXk1sFeyYL9tREXDpCf1hizcVngMfGKC27Wwo2vsbNKQ9U4H9r6Aeuwn+Y5iA1iJ+NQ=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxMDwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '水浒传', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
  <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0010', '水浒传', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		
				
		

			</span></li>
            
            <li data-tags="捕鱼"><img src="/imgs/img/icon_jcby.jpg" alt="金蟾捕鱼" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=cAjOUeVzRme+LqG72KwnPPb5U8xqWF58COBzfXU3daPiwOcNCRCRJGyTjjMVpU8k1IpIRUB0OK89nalGJ5SeygybbkM4js3WdCam8jP765N+FjN/Iae1tOU/w4IwfV71SZZspO2zzDSR4dhyBwsR5R+WLJjpnIF/bl7qEK6HLVw=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxMTwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '金蟾捕鱼', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
		  <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0011', '金蟾捕鱼', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  
			
		
			  

		</span></li>   
		
                     
            <li data-tags="捕鱼"><img src="/imgs/img/icon_qpby.jpg" alt="千炮捕鱼" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=wEAcc2jAnY83oOYp2Hs8UBEwnwzzNfx3QkB8a7uCu5BcBFcDWYvmtBSHsom4CK6VTDjRXr8eMj1KPalM1mMiZ2GJw50a1Vri2/6VXDKlYjUk31OtgfjQa+2xjE+ZjE0FsWf6kr1xqHkCKTENVndoKt7PiUcarHQ2OiueYrqQUtM=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwNDwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '千炮捕鱼', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
		  		  <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0004', '千炮捕鱼', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  
		

			</span></li> 
                       
            <li data-tags="老虎机"><img src="/imgs/img/icon_bcbm.jpg" alt="奔驰宝马" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=E8IMhCl2A5JktJGZptY6sqgz0gGaLA798MaFzt5xPVvaO0TFXizmTNKEir1DnZWVTGERGq2zcQa5nKiuwsQnRgpQ77Lkas35qPLLbODcFCNOOz0pV9xmtrEahNqPiEeKLVRU4t312rChzsPAtGcDh9C362Ejv8KxPLCJpylkhWI=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwMjwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '奔驰宝马', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
					  		
	  <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0002', '奔驰宝马', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  
		

					
					  
					
			</span></li>
            
            <li data-tags="老虎机"><img src="/imgs/img/icon_hhw.jpg" alt="航海王" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=WErlR5BF5HCNLa8FmbjVsEf5GLKY4vriKkqAmRYV0/vHt80INcsY3261VoH3MouaN0MJERKeA2kYoyyJWHuVFReUPyPtzNnkNpgAiTzXFZ6cdLRWUekw6+XiNWYrend3VvEtElsUaLK3JN+YQBfCFathDwX4RcUZnsLkpi5X344=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwNTwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '航海王', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
			 <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0005', '航海王', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  
		
			</span></li>    
                   
            <li data-tags="休闲"><img src="/imgs/img/icon_bndr.jpg" alt="捕牛达人" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=jgWdpaNSxevqgf8EGHsmmp9bCFiZph2IK8fnc8sQOsF7NPhVwGpnuJVuyNX/Ua2+c8XKPZd0GO8yLOjwxsjHnLzZeErsiJoGebQ+b1r6zN4+wH/le8eAB/UMPbRP08100E/Msx3CQR5rI1GDK6RWOs8l1uk0WuqFJFJtYQeFRL4=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAwMzwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '捕牛达人', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
				 <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0003', '捕牛达人', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  	  
			
			</span></li>
                
            <li data-tags="对战"><img src="/imgs/img/icon_lrnn.jpg" alt="六人牛牛" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=n0c1KxblVixY5+XHBsXd/jr3GTbSJcsGJPB2YFQXlNOQOfRsLDBTlgMdF3tfieOgVNymSWa/kC+ew4R5CskWhU8/zb+6Tnvvvap5/mX7oPOIt24FeUgTaMrkw5kQeSZ7DacamSzuIGzHObkxsNdaV89rPzxD9/FRWHN5UwNaUpY=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxNTwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '六人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
					 <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0015', '六人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  	  
		
			</span></li>
            
            <li data-tags="对战"><img src="/imgs/img/icon_srnn.jpg" alt="四人牛牛" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=v8+ew0jnxCfZz1G2mJBiuIqhXipV8OEIbp2F4q1IaPUrb32zpbNE0lfp8sXGPgFmhBObofHThX2f1TW357gF66gfhTdH5nn0EmSeJr3jc/ZDVcOYQ/eot4CbVkfa+RB19FNFyODoDnNTZxoJZK9q6RTgUkn+mP9suxySB24c0oA=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxNDwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '四人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
					 <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0014', '四人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  	  


		
			</span></li>
            
            <li data-tags="对战"><img src="/imgs/img/icon_ernn.jpg" alt="二人牛牛" /><span class="game_zc"><a href="javascript:;" onclick="window.open('http://games.dxwewejuhw.com/html/dg_demo.html?EnStr=KmPMW+FyS8ldlOO22wWcQGnNslJu6myUSagbbVuCn8cqm5A2Nq/O1aVZrMW6M1B8ueP/Z77dMO5xoLnjlnJHzRENuOPZ4IXnu1iu3sgqOjyI8v8Tl4SubPditGLSA18M/uGDGol/tgMvw6i+US/Nj3LWJu8O2Xd4xBiClyztNps=&xmlStr=PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnID8+PG1lc3NhZ2U+PGxvZ2luSXA+MTgyLjExMC4xNC4xMjwvbG9naW5JcD48bWVyY2hhbnRJZD4zNTMwODM2MjwvbWVyY2hhbnRJZD48Z2FtZUNvZGU+UFRHMDAxMzwvZ2FtZUNvZGU+PHJvb21JZD4wPC9yb29tSWQ+PC9tZXNzYWdlPg==', '二人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" class="game_btn">试玩</a>
					 <a  href="javascript:;" onclick="if( logins() ){ window.open('/newdx/playgame.php?gameCode=PTG0013', '二人牛牛', 'height=550, width=1000, top=50, left=180, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no'); }else{ alert('请登录'); } " class="ve">进入游戏</a>
						
		  	  
			
		</span></li>
            
            <li data-tags="其他"><img src="/imgs/img/icon_bjl.jpg" alt="百家乐" /><span class="game_zc"><a href="javascript:;" class="game_btn">期待</a></span></li>
            <li data-tags="其他"><img src="/imgs/img/icon_lhdb.jpg" alt="连环夺宝" /><span class="game_zc"><a href="javascript:;" class="game_btn">期待</a></span></li>
            <li data-tags="其他"><img src="/imgs/img/icon_gssm.jpg" alt="港式赛马" /><span class="game_zc"><a href="javascript:;" class="game_btn">期待</a></span></li>
            <li data-tags="其他"><img src="/imgs/img/icon_yqs.jpg" alt="摇钱树" /><span class="game_zc"><a href="javascript:;" class="game_btn">期待</a></span></li>
     
		</ul>
    </div>
</div>
	
<script src="/js/jquery.quicksand.js"></script>
<script type="text/javascript">


$(document).ready(function(){	
	var items = $('#stage li'),
	itemsByTags = {};	
	items.each(function(i){
		var elem = $(this),
			tags = elem.data('tags').split(',');		
		elem.attr('data-id',i);		
		$.each(tags,function(key,value){			
			value = $.trim(value);			
			if(!(value in itemsByTags)){
				itemsByTags[value] = [];
			}
			itemsByTags[value].push(elem);
		});	
	});
	createList('全部游戏',items); 
	$.each(itemsByTags,function(k,v){
		createList(k,v);
		
	});	
	$('#filter a').live('click',function(e){	
		var link = $(this);		
		link.addClass('active').siblings().removeClass('active');		
		$('#stage').quicksand(link.data('list').find('li'));
		e.preventDefault();	
		setTimeout(setHeight,751);
	});	
	
	$('#filter a:first').click();
	
	function createList(text,items){		
		var ul = $('<ul>',{'class':'hidden'});		
		$.each(items,function(){	
			$(this).clone().appendTo(ul);
		});
		ul.appendTo('#container');
		var a = $('<a>',{
			html: text,
			href:'javascript:;',
			data: {list:ul}
		}).appendTo('#filter');
	}
});

function setHeight(){
	$(window.parent.document).find("#mainFrame").height($("#zhuce_body").height().toString());
}
 window.onload=setHeight;//不要括号
</script>
<style type="text/css">
*{margin:0;padding:0;} ul,li{list-style:none;} img,hr{border:0;} a{text-decoration:none;}
.wrap{width: 1000px;background:rgba(0,0,0,.5);margin:auto;border:4px double rgba(140, 120, 51, 0.5);overflow:hidden; font-family:"微软雅黑" ;}
.wrap .left{float:left;width:220px;margin:30px 20px;}
.wrap .left .nav_icon{display:block;width:220px;height:82px;}

.wrap .left #filter{text-align:center;background:rgba(255,255,255,.08);padding:5px;margin:20px 0;overflow: hidden;border: 1px solid rgba(255,255,255,.08);}
.wrap .left #filter a{display:block;height:40px;margin:10px 0;cursor:pointer;color:#FFF;font-size:20px;line-height:40px;font-family:"微软雅黑";}
.wrap .left #filter a.active{color:#F4E597;position:relative;}
.wrap .left #filter a.active:after{content:"";display:block;border:10px solid transparent;;border-left:10px solid #F4E597; position:absolute; right:15px;top:10px;}

#container{float:left;background:rgba(255,255,255,.08);margin:30px 0 20px 10px;padding:5px;}
#container ul{width:700px;min-height:412px;border:1px solid rgba(255,255,255,.08);}
#container ul li{float:left;width:185px;height:185px;margin:24px;cursor:pointer;overflow:hidden;position:relative;font-family:"微软雅黑"}
#container ul li span.game_zc{position:absolute;width:185px;height:185px;background:rgba(0,0,0,.7);display:inline-block;left:0px;bottom:-235px;transition:bottom 0.5s ease;}


#container ul li span.game_hc{position:absolute;width:185px;height:185px;background:rgba(0,0,0,.7);display:inline-block;left:0px;bottom:-155px;transition:bottom 0.5s ease;}

#container ul li .ve{margin:-40px auto;font-size:19px;    font-family: STHeiti,'Microsoft YaHei', '微软雅黑', 'SimSun', '宋体',arial;}
#container ul li:hover span.game_zc{bottom:0px;}
#container ul li span a{display:block;width:120px;height:30px;line-height:30px;        font-family: STHeiti,'Microsoft YaHei', '微软雅黑', 'SimSun', '宋体',arial;text-align:center;font-size:20px;color:#fff;background:#1786f8;border-radius:12px;margin:55px auto;cursor:pointer;}
#container ul li img{width:185px;}
#container ul{overflow:hidden;}
#container ul.hidden{display:none;}
</style>	


</div>

		
					<div style="clear:both;height:30px;"></div> 
					<div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
	<script>
			function logins(){
					var  ontLogin = $(window.top.document.body).find('#topFrame').contents().find('.mainBoxs');
						if( !ontLogin.size()){
							
								return true;
						}else{
								return false;
						}
			};
	</script>
    </div>
</body>
</html><?
$mysqli->close();
?>