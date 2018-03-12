<?php
	if(!isset($_SESSION)){ session_start();}
	if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"])){
		header("Location:/login/login.php");
		exit();
	}
	if(!isset($_SESSION)){ session_start();}
	if($_SESSION["username"]==''){
		header("Location: /login/login.php");
		exit;
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>汇款中心</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<style>
/*		*{ margin:0; padding:0; }
		html{ height:100%; background:#1A1309; }
		body{ font-size:0.14rem; height:100%;  font-family: "Arial","Microsoft YaHei","ºÚÌå","ËÎÌå",sans-serif;}
			.mainBox{ width:100%; height:100%; overflow:hidden;  background:#1A1309; }
			#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; background: #130d35; box-sizing:border-box; overflow:hidden;  position:relative;  }
			#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(../../img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
			#headerBox .logo{ display:block; position:absolute; left:calc(1.5rem - 0.54rem); top:calc(0.18rem - 0.16rem); height:0.3rem; }
			h1, .bank{ display:block; width: 100%;  height: 0.6rem;  text-indent: 0.5rem;  line-height: 0.6rem;  color: #fff;  font-size: 0.13rem;  border-bottom:1px solid #000;     text-decoration:none; }
			h1{ background:none;  height:0.3rem; line-height:0.3rem; color:rgb(198, 164, 71); text-indent:0.2rem;}
			.bank:nth-of-type(3){ background:url(../img/erweima.png) no-repeat 0.15rem center;  background-size: 0.2rem;  }
			 .bank:nth-of-type(2){ background:url(../img/yihang.png) no-repeat 0.15rem center;  background-size: 0.2rem;  }
			  .bank:nth-of-type(1){background:url(../img/history.png) no-repeat 0.15rem center;  background-size: 0.17rem;   }
	#picList{ width:3rem; height:auto;border-bottom:2px solid #000000; box-sizing:border-box; overflow:auto;}		  
		  */	
			.footer {background:white;border-top:1px solid #F90;position:fixed;left:0;bottom:0;height:0.38rem;overflow:visible;width:100%;}
.footer>a {float:left;width:20%;color:#929292;height:100%;}
.footer>a>span {display:block;height:0.22rem;width:0.24rem;margin:0.02rem auto 0;background:url(../img/footerx2.png) no-repeat;background-size:cover;}
.footer>a:nth-child(1)>span {background-position:-0.22rem center;}
.footer>a:nth-child(2)>span {background-position:-0.45rem center;}
.footer>a:nth-child(3)>span {background-position:-0.67rem center;}
.footer>a:nth-child(4)>span {background-position:-0.9rem center;}
.footer>a:nth-child(5)>span {background-position:0 center;}
.footer>a>p {text-align:center;font-size:0.09rem;}
/*.footer .float {width:20%;height:2px;background:#fe4902;position:absolute;left:0;top:-2px;transition:.4s all linear;}*/

 flexslider 
.flexslider{position:relative;height:1.2rem;overflow:hidden;}
.slides{position:relative;z-index:1;}
.slides li{height:1rem;background-size:cover;}
.slides li img{width:100%;}

  
*{ margin:0; padding:0; }
a{text-decoration: none;}
html{ width:100%; height:100%;  }
body{ margin:0; height:100%; width:100%;    background: url("/pic/bg.jpg?v=u91dedfdb")center no-repeat;;background-size: cover; font-size: 1em;}
#zhe{ width:100%; height:100%; position:absolute; z-index:1000; background:#000 url(/images/loading.gif) no-repeat center center;}
#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; box-sizing:border-box; overflow:hidden;  position:relative; border-bottom: 1px solid rgba(255,255,255,.7);background: rgba(255,255,255,.4);text-align: center; }
#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:url(/pic/fanhui.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
#headerBox span{font-size: 0.2em;position: relative;top: -0.27rem;}
#picList{    display: none;}			
.bank{     
    display: block;
    font-size: 0.2rem;
    box-shadow: inset -1px 1px 0 0 rgba(255,255,255,.5),1px 1px 0 0 rgba(0,0,0,.13);
    background: rgba(255,255,255,.2);
    padding: 0.1rem;
    color: #000;
}

.footer {
    border-top: 1px solid #fff;
    background: url("/pic/bg.jpg?v=u91dedfdb") no-repeat;
    background-size: cover;
    background-position:0;
}
.footer a{
    color: #000;
    background: rgba(255,255,255,0.3);
}
.footer>a>span{
    background: url(/pic/footerx2_1.png) no-repeat;
    background-size: cover;
}
.footer>a:nth-child(2)>span{
    background: url(/pic/icon-service.png) no-repeat;
    background-size: 0.26rem;
}
.footer>a:nth-child(3)>span{
    background: url(/pic/icon-coin.png) no-repeat;
    background-size: 0.26rem;
}
.footer>a:nth-child(4)>span{
    background: url(/pic/icon-transfer.png) no-repeat;
    background-size: 0.26rem;
}
		</style>
	</head>
	<body>
		<article class="mainBox">
			<header id="headerBox">
				<a href="../wap.php"></a>
                                <span>汇款方式</span>   
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
            
<!--			<h1>汇款方式</h1>-->
			<a class="bank" href="/cl/pages/bankM.php">在线存款</a>
			<a class="bank" href="/cl/pages/huikuanM.php">银行卡划款</a>
			<a class="bank" href="/cl/pages/huikuanMM.php">二维码支付</a>
			<a class="bank" href="/cl/pages/huikuanMM.php">快捷支付</a>
			
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
            
		</article>
	</body>
</html>