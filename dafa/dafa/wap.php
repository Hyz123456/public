<!DOCTYPE HTML>
<html>
<head>
	<title><?=$web_site["web_name"]?></title>
	<meta charset="utf-8">
	<meta http-equiv="Cache-control" content="max-age=1700">
<meta name="viewport" content="user-scalable=no, width=device-width">
<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
	<script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script>
		if( window != window.top ){
			window.top.location.href = window.location.href ;
		}
		var ClientW = $(window).width();
		$('html').css('fontSize',ClientW/3+'px');

		$(window).resize(function(){
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		});

		var onOff = false;
	</script>
	<script src="js/index.js" type="text/javascript"></script>
	<link href="css/index.css" rel="stylesheet" type="text/css">
	<link href="css/lanrenzhijia.css" type="text/css" rel="stylesheet" />
        <link href="css/wap.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/font-awesome-4.6.3/css/font-awesome.min.css">
</head>
<body>
	<article class="mainBox">

<?php

if(!isset($_SESSION)){ session_start();}
$uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
if($uid){
	include_once('include/address.mem.php');
	include_once('include/config.php');
	include_once('include/function.php');
	check_login(); //验证用户是否已登陆
	$userid=intval($_SESSION["userid"]);
	$sql	=	"select money from user_list where user_id='".$userid."' limit 0,1";
	$query	=	$mysqli->query($sql);
	$row	=	$query->fetch_array();
?>
<script>
		onOff = true;	
</script>


<header id="headerBox">
<div class="nav-bar-block" nav-bar="active">
    <div class="buttons buttons-left header-item">
        <span class="left-buttons">
            <img src="/imgs/logo.png" class="logo">
        </span>
    </div>
    <div class="title title-center header-item" style="left: 159px; right: 159px;"></div>
    <div class="buttons buttons-right header-item">
        <ul style="margin-right: 0;">
                <li><a class="account2" href="logout.php">退出</a></li>
                <li><a class="login_2" href="/Member.php">会员中心</a></li>
                <li><a class="login2" href="/Member.php"><?=$_SESSION["username"]?></a></li>
           </ul>

    </div>
</div>
</header>


<!--
<header id="headerBox">
		<img class="logo" src="/imgs/logo.png" /> 
		<span class="languang"></span>
		<a href="logout.php">退出</a>
</header>
<nav id="user">
	<div>
		<em></em>
		<span class="login" href="">账号：<?=$_SESSION["username"]?></span>
		<span class="account" href="">金额：<?=double_format($row['money'])?></span>
	</div>
	<div> history_account.php   menus.php 
		<a class="his_money" href="/Member.php" title="账户历史">账户历史</a>
		<a class="his_money" href="/Member.php" title="交易状况">交易状况</a>
		<span class="move_top"></span>
	</div>	
</nav>-->
<!-- 代码end -->



<?php  }else{  ?>
<header id="headerBox">
<div class="nav-bar-block" nav-bar="active">
    <div class="buttons buttons-left header-item">
        <span class="left-buttons">
            <img src="/imgs/logo.png" class="logo">
        </span>
    </div>
    <div class="title title-center header-item" style="left: 159px; right: 159px;"></div>
    <div class="buttons buttons-right header-item">
           <ul>
             
               <li><a class="account" href="register/register.php">注册</a></li>
                <li><a class="login" href="login/login.php">登录</a></li>
               <li>
                   <span class="languang">
                        <ul class="lang_box">
                            <li><div><span></span></div></li>
                            <li><div><span></span></div></li>
                        </ul> 
                    </span>
               </li>
           </ul>
    </div>
</div>
</header>



<!--
<header id="headerBox">
			<img class="logo" src="/imgs/logo.png" /> 
			<span class="languang">
				<ul class="lang_box">
				<li>
					<div>
						<span></span>
						简体中文
					</div>
				</li>
				<li>
					<div>
						<span></span>
						 &nbsp;English
					</div>
				</li>
							</ul> 
			</span>
</header>-->
<!-- <nav id="user">
	<div>
		<a class="login" href="login/login.php">登录</a>
		<a class="account" href="register/register.php">免费开户</a>
	</div>
</nav> -->
<!-- 代码end -->


</div>
<?php
}
?>
<div class="row quick-pay" ng-if="wapQuick==2">
    <img width="100%" style="height: 2.5em;" src="https://wapc.pkcdns2.com/public/official/images/icon-quick.gif">
</div>
<div id="main_flash">
    <div class="flexslider">
        <ul class="slides">
                <li><img src="/pic/hun_a_1492181160.jpg"/></li>
                <li><img src="/pic/flash22.jpg"/></li>
                <li><img src="/pic/hun_a_1489066961.jpg"/></li>
                <li><img src="/pic/hun_a_1489066971.jpg"/></li>
                <li><img src="/pic/hun_a_1492098357.jpg"/></li>
        </ul>
   <script src="/cl/css/jquery.min.js"></script>
    <script src="/cl/css/jquery.flexslider-min.js"></script>
<script>
$(function(){
    $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
    });
});
</script>
    </div>
</div>	



<div class="content tip" style="overflow:auto;">
	<em style="float: left; " class="yu"></em>
	<div id="noticeContext" style="height: 25px; margin-left: 40px; overflow: hidden; line-height: 1; padding: 4px 0px; position: relative;">
    <marquee style="white-space: nowrap;" id="noticeText" class="ng-binding" scrollAmount="2" direction="left" onmouseout="scollStart()" onmouseover="scollStop()">业界首家联合Android安卓系统/ios苹果系统推出行动装置APP，领先技术，独家呈现，无需牢记网址，打开APP即可查看最新网址，更多实用功能等您来</marquee>
	</div>
</div>
<div class="content quicklink">
    <ul class="menu_hm">
        <li class="col lm_1 active"><a href="javascript:hm_odds(1);" target="_self" title="视讯直播" class="positive"></a></li>
        <li class="col lm_2"><a href="javascript:hm_odds(2);" target="_self" title="彩票游戏" class="positive"></a></li>
        <li class="col lm_3"><a href="javascript:hm_odds(3);" target="_self" title="体育赛事" class="positive"></a></li>
        <li class="col lm_4"><a href="javascript:hm_odds(4);" target="_self" title="电子游艺" class="positive"></a></li>
    </ul>
    <div class="clearfix"></div>
</div>

<div class="content game-list">
    <div class="tab-pane lm_1 active">
        <dl id="model_index_18">
		<a href="<?php if($uid) { echo '/newag2/index.php';}else{ echo 'javascript:alert(\'请登录\');';} ?>" target="_self" title="AG视讯" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/ag.png" alt="AG视讯"></dt>
			<dd>AG视讯</dd>
		</a>
	</dl>
	<dl id="model_index_19">
		<a href="<?php if($uid) { echo '/newbbin2/index.php';}else{ echo 'javascript:alert(\'请登录\');';} ?>" target="_self" title="BBIN视讯" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/bbin.png" alt="BBIN视讯"></dt>
			<dd>BBIN视讯</dd>
		</a>
	</dl>

        <dl id="model_index_21">
            <a href="<?php if($uid) { echo '/newab2/index.php?m=1';}else{ echo 'javascript:alert(\'请登录\');';} ?>" target="_self" title="AB视讯" class="disable-user-behavior">
                <dt style="position: relative"><img src="/pic/ab.png" alt="AB"></dt>
                <dd>ALLBet</dd>
            </a>
        </dl>

 <!--       <dl id="model_index_21">
		<a href="<?php /*if($uid) { echo '/MgGame/startGame.php?gameType=2';}else{ echo 'javascript:alert(\'请登录\');';} */?>" target="_self" title="MG视讯" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/index_mg.png" alt="MG视讯"></dt>
			<dd>MG视讯</dd>
		</a>
	</dl>-->


        
    </div>
    <div class="tab-pane lm_2">
        <dl id="model_index_2">
		<a href="/caigames/caigames.php" target="_self" title="彩票游戏" class="disable-user-behavior">
            <dt style="position: relative"><img src="/pic/lotteryShow.png" alt="彩票游戏"> </dt>
			<dd>彩票游戏</dd>
		</a>
	</dl>
        <dl id="model_index_16">
		<a href="/caigames/caigamepages.php?" target="_self" title="重庆时时彩" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c2img_ssc_cq.png" alt="时时彩"></dt>
			<dd>重庆时时彩</dd>
		</a>
	</dl>
    
        
	<dl id="model_index_23">
		<a href="/caigames/cqkl.php?" target="_self" title="重庆快乐十分" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c2img_klsf_hn.png" alt="快乐十分">	</dt>
			<dd>重庆快乐十分</dd>
		</a>
	</dl>
	<dl id="model_index_24">
		<a href="/caigames/bjpk.php?" target="_self" title="北京pk拾" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c2img_pk10.png" alt="北京pk拾"></dt>
			<dd>北京pk拾</dd>
		</a>
	</dl>
	<dl id="model_index_25">
		<a href="/caigames/bjkl.php?" target="_self" title="北京快乐8" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c2img_kl8.png" alt="北京快乐8"></dt>
			<dd>北京快乐8</dd>
		</a>
	</dl>

        <dl id="model_index_25">
            <a href="<?php if($uid) { echo '/newbbin2/index.php?site=lottery';}else{ echo 'javascript:alert(\'请登录\');';} ?>" target="_self" title="BBIN彩票" class="disable-user-behavior">
                <dt style="position: relative"><img src="/pic/c1imgbbin.png" alt="BBIN彩票"></dt>
                <dd>BBIN彩票</dd>
            </a>
        </dl>
        
    </div>
    <div class="tab-pane lm_3">
        <dl id="model_index_1">
		<a href="/caigames/tiyugames.php" target="_self" title="体育赛事" class="disable-user-behavior">
            <dt style="position: relative"><img src="/pic/c1img_hgty.png" alt="体育赛事"></dt>
            <dd>体育赛事</dd>
		</a>
	</dl>

        <dl id="model_index_25">
            <a href="<?php if($uid) { echo '/newbbin2/index.php?site=ball';}else{ echo 'javascript:alert(\'请登录\');';} ?>" target="_self" title="BBIN体育" class="disable-user-behavior">
                <dt style="position: relative"><img src="/pic/c1imgbbin.png" alt="BBIN体育"></dt>
                <dd>BBIN体育</dd>
            </a>
        </dl>
    </div>
    <div class="tab-pane lm_4">
        <dl id="model_index_13">
		<a href="/newag2/" onclick="return checklogin();" title="AG国际馆" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c1imgag.png" alt="AG国际馆"></dt>
			<dd>AG国际馆</dd>
		</a>
	</dl>
        <dl id="model_index_14">
		<a href="/newbbin2/index.php?site=game" onclick="return checklogin();" title="BBIN馆" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c1imgbbin.png" alt="BBIN馆"></dt>
			<dd>BBIN馆</dd>
		</a>
	</dl>
        <dl id="model_index_15">
		<a href="/MgGame/game.html" target="_self" title="MG电子游艺" class="disable-user-behavior">
			<dt style="position: relative"><img src="/pic/c1imgnmg.png" alt="MG电子游艺"></dt>
			<dd>MG电子游艺</dd>
		</a>
	</dl>



        <dl id="model_index_15">
            <a href="/newpt2/pt/pt.html" target="_self" title="PT电子游艺" class="disable-user-behavior">
                <dt style="position: relative"><img src="/pic/pt.png" alt="PT电子游艺"></dt>
                <dd>PT电子游艺</dd>
            </a>
        </dl>
        
    </div>
    <div class="clearfix"></div>
</div>	
<div class="content jw">
    <a class="ng-binding computer" target="_blank" href="/?mobile">电脑版</a>
    <a class="ng-binding superLink" href="javascript:;">资讯端</a>
    <p class="ng-binding"></p><p class="ng-binding">COPYRIGHT © 太阳城集团 RESERVED</p>
</div>
<footer class="section_box footer">
<!--    <div class="tabs">
        <a href="/wap.php" class="tab-item">
            <img src="https://wapc.pkcdns2.com/public/official/images/icon-coin.png"> 
            <span class="ng-binding">首页</span>
        </a> 
        <a href="/money_change2.php" class="tab-item">
            <img src="https://wapc.pkcdns2.com/public/official/images/icon-transfer.png"> 
            <span class="ng-binding">额度转换</span>
        </a> 
        <a href="/login/deposit.php" class="tab-item">
            <img src="https://wapc.pkcdns2.com/public/official/images/icon-record.png"> 
            <span  class="ng-binding">入款</span>
        </a>
        
        <a  target="_blank" class="tab-item" href="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2210536129%22%2C%22userId%22%3A%2223505387%22%7D">
            <img  src="https://wapc.pkcdns2.com/public/official/images/icon-service.png"> 
            <span  class="ng-binding">客服</span>
        </a>
        <?php
                if(!isset($_SESSION)){ session_start();}
                $uid = isset($_SESSION['uid'])? $_SESSION['uid'] : '';
                if( $uid ){
        ?>	
        <a href="/Member.php" class="tab-item">
            <img src="https://wapc.pkcdns2.com/public/official/images/icon-message.png"> 
            <span  class="ng-binding">用户中心</span>
        </a>
        <?php }else{	?>
         <a href="/login/login.php" class="tab-item">
            <img src="https://wapc.pkcdns2.com/public/official/images/icon-message.png"> 
            <span  class="ng-binding">登录</span>
        </a>
        <?php } ?>
    </div>
   -->
    
    
		<a href="/wap.php">
			<span></span>
			<p>首页</p>
		</a>
		<a href="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2210536129%22%2C%22userId%22%3A%2223505387%22%7D">
			<span></span>
			<p>在线客服</p>
		</a>
		<a href="/login/deposit.php">
			<span></span>
			<p>入款</p>
		</a>
		<a href="/money_change2.php">
			<span></span>
			<p>额度转换</p>
		</a>
		<?php
			if(!isset($_SESSION)){ session_start();}
			$uid = isset($_SESSION['uid'])? $_SESSION['uid'] : '';
			if( $uid ){
		?>	
			<a href="/Member.php">
				<span></span>
				<p>我的</p>
			</a>
		<?php
		}
		else
		{			
	?>
			<a href="/login/login.php">
				<span></span>
				<p>登录</p>
			</a>
		<?php
		} 
		?>
	<div class="float"></div>
	</footer>

	</body>
	<script type="text/javascript">

		function checklogin(){
			if( onOff ){
				return true;
			}else{
				window.location =  '/login/login.php';	
				return false;
			}
		};
		//下拉菜单
		(function(){
			if($('#user div:first em').size()){
				var aBtn = $('#user div:first em') ;
				var aBox = $('#user') ;
				var aH = aBox.outerHeight() ;
				var onOff = false;

				aBtn.on('touchstart',show);

				function show(){
					onOff = !onOff;
					if(onOff){
						$('.zhenzao').css({'position':'absolute','left':0,'top':0,'width':'100%','height':'100%','zIndex':50,'background':'rgba(0,0,0,0.5)'});
						$('#user').css('background','rgba(63, 58, 36, 0.6)');
						aBox.height(aH + aBox.find('div').eq(1).outerHeight(true));

					}else{
						$('.zhenzao').css({'position':'','width':0,'height':0,'background':''});
						$('#user').css('background','rgba(0,0,0,0.6)');
						aBox.height(aH);
					}

					$('.zhenzao').on('touchmove',fade);

					function fade(){
						$('#picList').off('touchmove');
						onOff = false;
						$('#user').css('background','rgba(0,0,0,0.6)');
						aBox.height(aH);
						setTimeout(function(){
							$('.zhenzao').css({'position':'','width':0,'height':0,'background':''});
						},500);
						
					}

				}
			}
		})();

		//languang
		(function(){
			$('.languang').on('touchend',createList);

			var onOff = false;
			function createList(){
				onOff = !onOff;
				var longBox = $('<ul class="lang_box"><li><div><span></span>简体中文</div></li><li><div><span></span>&nbsp;English</div></li></ul>');
				if(onOff){
					$('.languang').append(longBox);
					setTimeout(function(){
						$('.lang_box').css({'width':0.9+'rem','height':0.7+'rem'});
					},30);

					$('#picList').on('touchend',fan);
					function fan(){
						onOff = false;
						aHide();
					}
				}else{
					aHide();
				}
				
				$('.lang_box div').on('touchend',lglist);
				function lglist(ev){
					$(this).css({'transform':'scale(0.7,0.7)','color':'rgb(255, 216, 81)'});
					var This = $(this);
					setTimeout(function(){
						This.css({'transform':'scale(1,1)','color':'#5E430D'});
						var urlVal = (This.find('span').css('background'))
						This.parents('span').css({'background':urlVal});

						onOff = false;
						aHide();
					},90);

					ev.stopPropagation();
				}
				
			}

			function aHide(){
				$('.lang_box').css({'width':0,'height':0});
				setTimeout(function(){
					$('.lang_box').remove();
				},500);
			}
		})();
                function hm_odds(ball){
                            for( var i = 0; i < 8; i++){
                                if(i == ball-1){
                                    $('.menu_hm > li').eq(i).addClass("active");
                                    $('.game-list > div.tab-pane').eq(i).addClass("active");
                                }else{
                                    $('.menu_hm > li').eq(i).removeClass("active");
                                    $('.game-list > div.tab-pane').eq(i).removeClass("active");
                                }
                            }
                        }
	</script>
</html>

