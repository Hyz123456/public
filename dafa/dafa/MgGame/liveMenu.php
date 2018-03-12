<?php 
@session_start();
include_once("include/config.php");
$_SESSION["check_action"]=''; //检测用户是否用软件打水标识
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Venetian</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/styles/ucenter.css">
	<script src="/assets/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
	<script language="JavaScript">
	<!--
	window.onerror=function(){return true;}
	-->
	</script>
</head>
<body class="dashboard games iframe">

<?php
if(isset($_SESSION["uid"],$_SESSION["username"])){
?>
<?php
}else{ //未登陆
?>
<script language="javascript">
	parent.topFrame.window.location.reload(); //未登陆，刷新登陆页面
</script>
<?php
}
?> 
<div class="list-group menucp">
  <a class="list-group-item" href="startGame.php?gameName=Baccarat" target="_blank" >MG百家乐<span class="fa fa-lg fa-chevron-right"></span></a>
  <a class="list-group-item" href="startGame.php?gameName=SPSicbo" target="_blank" >MG骰宝<span class="fa fa-lg fa-chevron-right"></span></a>
  <a class="list-group-item" href="startGame.php?gameName=Roulette" target="_blank" >MG轮盘<span class="fa fa-lg fa-chevron-right"></span></a>
  <a class="list-group-item" href="startGame.php?gameName=SPCasinoholdem" target="_blank">MG扑克<span class="fa fa-lg fa-chevron-right"></span></a>
</div>
<?php include_once("scripts.php"); ?>

<div style="clear:both"></div>
<div>
</div>

<script type="text/javascript" language="javascript" src="js/left.js"></script>
<script type="text/javascript" language="javascript" src="js/touzhu.js?v=1"></script>
<!-- 
<script type="text/javascript" language="javascript" src="BJpkTen/js/bet.js"></script>
<script type="text/javascript" language="javascript" src="GDHappyTen/js/bet.js"></script>
-->
<script type="text/javascript" language="javascript" src="js/left_mouse.js"></script>
<script type="text/javascript" language="javascript" src="/js/ifcp.js"></script>
<script language="javascript">
function ResumeError() {
    return true;
}
window.onerror = ResumeError; 
</script>
</body>
</html>