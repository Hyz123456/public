<?php
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>会员中心</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="css/Member.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<article class="mainBox">
			<header id="headerBox">
				<a href="wap.php" class="shouye"></a>
                                <span>个人中心</span>
                                <a class="account" href="logout.php">退出登录</a>
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
                                <script src="js/jquery.min.js"></script>
                <script src="js/jquery.flexslider-min.js"></script>
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
            
			<section id="contant">
				<?php
				if(!isset($_SESSION)){ session_start();}
				$uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
				include_once('include/address.mem.php');
				include_once('include/config.php');
				include_once('include/function.php');
				check_login(); //验证用户是否已登陆
				$userid=intval($_SESSION["userid"]);
				$sql	=	"select money,pay_name from user_list where user_id='".$userid."' limit 0,1";
				$query	=	$mysqli->query($sql);
				$row	=	$query->fetch_array();
				if($uid){
				?>
				<nav class="user active">
                                    <ul>
                                        <li id="one">
                                            <span class="login">
                                                <span id="datetime"></span>&nbsp;&nbsp;<?=$_SESSION["username"]?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="login2">
                                                我的钱包：
                                                <span id="shuaxing">
                                                    <span class="money"><?=double_format($row['money'])?></span> 
                                                    <span id="rmb">RMB</span>
                                                </span>
                                                <img src="/pic/loading.gif"id="loading"style="display: none">
                                                <a class="refresh"><img src="/pic/icon-refresh.png"></a>    
                                            </span>
                                        </li>
                                        <?php if($row['pay_name']){ ?>
                                        <li><span class="login2">真实姓名：<?=$row['pay_name']?></span></li>
                                        <?php }?>
                                    </ul>
                                        
				</nav>
				<? } ?>
                                <div class="memberList" >
                                    <table>
                                        <tr>
                                            <td>
                                                 <a href="/Mmember/sports.php">
                                                    <img src="/pic/menu-share.png">
                                                    <p  class="ng-binding">体育赛事</p>
                                                </a>
                                            </td>
                                            <td>
                                                 <a href="/Mmember/lotterys.php">
                                                    <img src="/pic/menu-record.png">
                                                    <p  class="ng-binding">彩票记录</p>
                                                </a>
                                            </td>
                                            <td>
                                                 <a href="javascript:;">
                                                    <img src="/pic/menu-message.png">
                                                    <p  class="ng-binding">真人记录</p>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                 <a  href="/money_change2.php">
                                                    <img src="/pic/menu-transfer.png">
                                                    <p  class="ng-binding">额度转换</p>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/login/deposit.php">
                                                    <img src="/pic/menu-funds.png">
                                                    <p  class="ng-binding">入款</p>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2210536129%22%2C%22userId%22%3A%2223505387%22%7D">
                                                    <img src="/pic/menu-service.png">
                                                    <p  class="ng-binding">在线客服</p>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                </div>    
                                
                                
                                
				<div class="memberList" style="display:none;">
					<a style="display:none;" href="javascript:;">账户历史<span></span></a>
					<a href="javascript:;">交易状况<span></span></a>
					<p>
						<a href="/Mmember/sports.php">体育赛事</a>
						<a href="/Mmember/lotterys.php">彩票记录</a>
						<a href="javascript:;">真人记录</a>
					</p>
					<a href="/money_change2.php">额度转换<span></span></a>
				</div>
			</section>
			<section id="MACenter-content"></section>
			<footer class="section_box footer" style="display:none;">
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
	</footer>
		</article>
	</body>
	<script>
		(function(){
//			var onOff = false;
//			var aJiaoyi = $('.memberList a').eq(1).on('touchend',function(){
//				onOff = !onOff;
//				if(onOff){
//					$('.memberList p').height( $('.memberList p a').outerHeight()*$('.memberList p a').size() );
//				}else{
//					$('.memberList p').height( 0 );
//				}
//				
//			});
                        $('.refresh').click(function(){
                            $('#loading').show();
                            $('#shuaxing').hide();
                            setTimeout(function () {
                                $('#loading').hide();
                                $('#shuaxing').show();
                            }, 600);
                        });
                        
                        
                        now = new Date();
                        hour = now.getHours(); 
                        var spandate='';
                        if(hour < 6){spandate="凌晨好！";} 
                        else if (hour < 9){spandate="早上好！";} 
                        else if (hour < 12){spandate="上午好！";} 
                        else if (hour < 13){spandate="中午好！";} 
                        else if (hour < 19){spandate="下午好！";} 
                        else if (hour < 22){spandate="晚上好！";} 
                        $('#datetime').html(spandate);
		})();
	</script>
</html>