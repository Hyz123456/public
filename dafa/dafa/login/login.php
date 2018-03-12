<!DOCTYPE HTML>
<html>
	<head>
		<title>会员登入中心</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="../js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="css/login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
<style>
.view-container {
    display: block;
}
.pane, .view {
    background: url("/pic/bg.jpg?v=u91dedfdb");
    background-size: cover;
    z-index: 1;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #f0f0f0;
    overflow: hidden;
}
.bar.bar-light {
    border-color: #ddd;
    background-color: #fff;
    background-image: linear-gradient(0,#ddd,#ddd 50%,transparent 50%);
    color: #444;
}
.bar-header {
    height: 45px;
    color: #000;
    position: relative;
    top: 0;
    border-top-width: 0;
    border-bottom-width: 1px;
} 
.hide {
    display: none;
}
.nav-bar-block {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 9;
}
.bar .buttons-left span {
    margin-right: 5px;
    display: inherit;
}
.bar-header .button.button-icon {
    color: #000;
    opacity: .7;
    font-size: 1em;
    padding: 0 12px;
}
.bar-light .button.button-clear, .bar-light .button.button-icon {
    border-color: transparent;
}
.bar-header.bar-light .title {
    color: #242a32;
}

.scroll-content {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
    margin-top: -1px;
    padding-top: 1px;
    margin-bottom: -1px;
    width: auto;
    height: auto;
}
.has-header {
    top: 45px;
}
.m-login .list {
    margin-top: 30px;
}
.list-inset {
    background: 0 0;
    margin: 10px;
}
.m-login .list .item:first-child {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
.m-login .list .item {
    margin: -1px 0;
    border-radius: 0;
    background: rgba(255,255,255,.6);
    border-color: #fff;
    padding: 12px 10px;
}
.m-login .list .item.item-input img {
    width: 18px;
    margin-right: 5px;
    margin-top: 5px;
}
img {
    -webkit-user-drag: none;
}
del, dfn, em, img, ins, kbd {
    padding: 0;
    border: 0;
    font: inherit;
}
.m-login .list .item.item-input input {
    margin-left: 10px;
    padding-right: 5px;
}
.item-input .icon {
    min-width: 14px;
}
.m-login .list .item:last-child {
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.m-login .list .item {
    margin: -1px 0;
    border-radius: 0;
    background: rgba(255,255,255,.6);
    border-color: #fff;
    padding: 12px 10px;
}
.list .item .icon {
    margin-right: 5px;
    font-size: 22px;
    opacity: .8;
}
.padding {
    padding: 10px;
}
.padding>.button.button-block:first-child {
    margin-top: 0;
}
.button.button-positive {
    border-width: 0;
    background: -moz-linear-gradient(top,#298dff,#1081ff);
    background: -webkit-linear-gradient(top,#298dff,#1081ff);
    background: linear-gradient(top,#298dff,#1081ff);
}
.row-no-padding, .row-no-padding>.col {
    padding: 0;
}
.button.button-dark.button-clear, .button.button-dark.button-icon {
    border-color: transparent;
    background: 0 0;
}
.button.button-dark.button-clear {
    box-shadow: none;
    color: #000;
}
.scroll-bar-v {
    top: 2px;
    right: 3px;
    bottom: 2px;
    width: 3px;
}
.scroll-bar {
    position: absolute;
    z-index: 9999;
}
[nav-view="cached"], [nav-bar="cached"] {
    display: none;
}
.pane, .view, .view-container {
    position: absolute;
    width: 100%;
    height: 100%;
}
.bar .title {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 0;
    overflow: hidden;
    margin: 0 10px;
    min-width: 30px;
    height: 43px;
    text-align: center;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 17px;
    font-weight: 500;
    line-height: 44px;
}
div, span, applet, object, iframe {
    margin: 0;
    padding: 0;
    font-size: 100%;
}
.bar-header .button.button-icon:before {
    font-size: 26px;
}
.bar .button.button-icon .icon:before, .bar .button.button-icon:before, .bar .button.button-icon.icon-left:before, .bar .button.button-icon.icon-right:before {
    vertical-align: top;
    font-size: 32px;
    line-height: 30px;
}
.bar .button.button-icon:before, .bar .button .icon:before, .bar .button.icon:before, .bar .button.icon-left:before, .bar .button.icon-right:before {
    padding-right: 2px;
    padding-left: 2px;
    font-size: 20px;
    line-height: 30px;
}
a.button .icon:before, a.button.icon:before, a.button.icon-left:before, a.button.icon-right:before {
    margin-top: 2px;
}
.button .icon:before, .button.icon:before, .button.icon-left:before, .button.icon-right:before {
    display: inline-block;
    padding: 0 0 1px;
    vertical-align: inherit;
    font-size: 24px;
    line-height: 41px;
    pointer-events: none;
}
.bar {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -moz-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    position: absolute;
    right: 0;
    left: 0;
    z-index: 9;
    box-sizing: border-box;
    padding: 5px;
    width: 100%;
    height: 44px;
    border-width: 0;
    border-style: solid;
    border-top: 1px solid transparent;
    border-bottom: 1px solid #ddd;
    background-color: #fff;
    background-size: 0;
}
.bar-header.bar-light {
    border-bottom: 1px solid rgba(255,255,255,.6);
    background: rgba(255,255,255,.2);
}

.ion-ios-arrow-back {
    background: url(../../img/index_ico.png) center center no-repeat;
}

.m-login .list .item.item-input input {
    margin-left: 10px;
    padding-right: 5px;
}

input{
        border: 0;
    padding-top: 2px;
    padding-left: 0;
    height: 34px;
    color: #111;
    vertical-align: middle;
    font-size: 14px;
        background-color: transparent;
    line-height: 16px;
    outline:none;
}

.item-input input {
    -webkit-border-radius: 0;
    border-radius: 0;
    -webkit-box-flex: 1;
    -webkit-flex: 1 220px;
    -moz-box-flex: 1;
    -moz-flex: 1 220px;
    -ms-flex: 1 220px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0;
    padding-right: 24px;
    background-color: transparent;}
.list-inset .item, .list-inset .item input {
    color: #000;
    opacity: .8;
}
input, button, select, textarea {
    font-family: "Helvetica Neue","Roboto",sans-serif;
}
.yzm .yzmin{
        width: 124px;
}
.yzm #yzm{
    margin: 0px;
    width: inherit;
}
#submit{
    line-height: 42px;
    width: 100%;
    border-radius: 5px;
}
.row-no-padding ul li{
    display: block;
    float: left;
    width: 50%;
    text-align: center;
    line-height: 42px;
}
.row-no-padding ul li a{
    color: #000;
}
</style>
   
                <ion-nav-view class="view-container" nav-view-transition="none" nav-view-direction="forward" nav-swipe="">
                    <ion-view class="m-login pane" cache-view="false" nav-view="active" style="transform: translate3d(0%, 0px, 0px);">
                        <ion-nav-bar class="bar bar-header bar-light nav-bar-container" nav-bar-transition="none" nav-bar-direction="forward" nav-swipe="">
                            <ion-nav-buttons side="left" class="hide"></ion-nav-buttons>
                            <ion-nav-title class="hide"></ion-nav-title>
                            <div class="nav-bar-block" nav-bar="cached"><ion-header-bar class="bar bar-header bar-light disable-user-behavior" align-title="center"><div class="buttons buttons-left header-item"><span class="left-buttons"><a class="button button-icon icon ion-ios-arrow-back" ng-href="#/index" href="#/index"></a></span></div><div class="title title-center header-item"><span class="nav-bar-title ng-binding">欢迎登录使用</span></div></ion-header-bar></div>
                            <div class="nav-bar-block" nav-bar="active">
                                <ion-header-bar class="bar bar-header bar-light disable-user-behavior" align-title="center">
                                    <div class="buttons buttons-left header-item">
                                        <span class="left-buttons"><a class="button button-icon icon ion-ios-arrow-back"  href="../wap.php"></a></span>
                                    </div>
                                    <div class="title title-center header-item" style="left: 55px; right: 55px;"><span class="nav-bar-title ng-binding">欢迎登录使用</span></div>
                                </ion-header-bar>
                            </div>
                        </ion-nav-bar>
                        <ion-content class="scroll-content ionic-scroll  has-header">
                            <form name="user" id="user" action="../loginDao.php" method="post">
                            <div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);">
                                <div class="list list-inset">
                                    <div class="item item-input">
                                        <img src="/pic/icon-user.png"> 
                                        <span class="ng-binding">账号</span> 
                                        <input id="name" name="name" type="text"  value="" class="ng-pristine ng-untouched ng-valid reset-field ng-valid-required">
                                    </div>
                                    <div class="item item-input">
                                        <img src="/pic/icon-pwd.png"> 
                                        <span class="ng-binding">密码</span> 
                                        <input id="pwd" name="pwd" type="password" value=""  class="ng-pristine ng-untouched reset-field ng-invalid ng-invalid-required">
                                    </div>
                                    <div class="item item-input yzm">
                                        <span class="ng-binding">&nbsp;验&nbsp;证&nbsp;码</span> 
                                        <input  name="yzm" type="tel" value=""  class="ng-pristine ng-untouched reset-field ng-invalid ng-invalid-required yzmin"  pattern="\d{4}">
                                        <img src="../yzm.php?<?=rand()?>"id="yzm" style="width: 54px;margin-top: 13px;    right: inherit;"/>
                                    </div>
                                </div>
                                <div class="padding">
                                    <button id="submit"  type="submit" class="ng-binding button button-block button-positive">登录</button>
                                </div>
                                <div class="row-no-padding">
                                    <ul>
                                        <li><a href="../register/register.php">马上注册</a></li>
                                        <li></li>
                                        <li><a href="../wap.php?<?=rand()?>">忘记密码</a></li>
                                    </ul>
                                </div>
                            </div>
                            </form>
                            <div class="scroll-bar scroll-bar-v">
                                <div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px; transform-origin: center top 0px;"></div>
                            </div>
                        </ion-content>
                    </ion-view>
                </ion-nav-view> 
<!--            
            
            
            
            
            
            
            
            
            
            
            
            
            
		<article class="mainBox">
			<header id="headerBox">
				<a href="../wap.php"></a>
				<img class="logo" src="/pic/logo.png" />
			</header>
			
            <div id="picList">
                <div class="flexslider">
                            <ul class="slides">
                                <li><img src="/pic/banner01.jpg"/></li>
                                <li><img src="/pic/banner02.jpg"/></li>
                                <li><img src="/pic/banner03.jpg"/></li>
                                <li><img src="/pic/banner04.jpg"/></li>
                                <li><img src="/pic/banner05.jpg"/></li>
                                <li><img src="/pic/banner06.jpg"/></li>
                            </ul>

            <script src="/js/jquery.flexslider-min.js"></script>
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
            
			<section id="Register">
				<form name="user" id="user" action="../loginDao.php" method="post">
					<div>
						<input name="name" class="username" type="text" required placeholder="用户名" />
					</div>
					<div>
						<input name="pwd" class="password" type="password" required placeholder="登录密码" />
					</div>
					<div class="yzm">
						<input name="yzm" type="tel" required pattern="\d{4}" placeholder="点击获取验证码" />
						<img src="../yzm.php?<?=rand()?>" />
					</div>
					<div>
						<input id="submit" type="submit" value="登录" />
					</div>
					<div>
						<a href="../wap.php?<?=rand()?>">忘记密码</a>
						<a href="../register/register.php">注册登录</a>
					</div>
				</form>
			</section>
		</article>
		<footer class="section_box footer">
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
		<a href="/login/login.php">
			<span></span>
			<p>登录</p>
		</a>
				<div class="float"></div>
	</footer>	-->
	</body>
	<script type="text/javascript">
		(function(){
			var aImg = $('div.yzm img')
			$('div.yzm input').focus(function(){
				aImg.attr('src','../yzm.php?<?=rand()?>');
			});
		})();
	</script>
</html>