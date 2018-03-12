<?php
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>会员中心</title>
		<meta charset="utf-8">
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
				<a href="wap.php"></a>
				<img class="logo" src="img/logo.png" />
			</header>
			
			
				<h1 class="huibg"></h1>
				<?php
				if(!isset($_SESSION)){ session_start();}
				$uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
				include_once('include/address.mem.php');
				include_once('include/config.php');
				include_once('include/function.php');
				check_login(); //验证用户是否已登陆
				$userid=intval($_SESSION["userid"]);
				$sql	=	"select money from user_list where user_id='".$userid."' limit 0,1";
				$query	=	$mysqli->query($sql);
				$row	=	$query->fetch_array();
				if($uid){
				?>
				<nav class="user active">
					<span class="login"><?=$_SESSION["username"]?></span>
				</nav>
				<? } ?>

				<?php
				if(!isset($_SESSION)){ session_start();}
				$uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
				if($uid){

				?>
				<nav class="user">
					<span class="login">账户余额</span>
					<span class="account"><?=double_format($row['money'])?>元</span>
				</nav>
				<? } ?>


				<div class="memberList">
					<a style="display:none;" href="javascript:;">账户历史<span></span></a>
					<a href="javascript:;">交易状况<span></span></a>
					
				    <a href="/Mmember/sports.php">体育赛事</a>
					<a href="/Mmember/lotterys.php">彩票记录</a>
					<a href="/Mmember/record.php">真人记录</a>
					
					<a href="/money_change2.php">额度转换<span></span></a>
				</div>
			
			
			
		</article>
	</body>
	<script>
		(function(){
			var onOff = false;
			var aJiaoyi = $('.memberList a').eq(1).on('touchend',function(){
				onOff = !onOff;
				if(onOff){
					$('.memberList p').height( $('.memberList p a').outerHeight()*$('.memberList p a').size() );
				}else{
					$('.memberList p').height( 0 );
				}
				
			});
		})();
	</script>
</html>