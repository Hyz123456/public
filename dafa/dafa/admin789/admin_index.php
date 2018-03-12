<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>管理中心</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<style>
#boxframeset, #topFrame{
	-webkit-transition: .3s all linear;
	-moz-transition: .3s all linear;
	-o-transition: .3s all linear;
	transition: .3s all linear;
}
#right_bg {

}
</style>
<script type="text/javascript">
window.onload = function(){
	var clientH = document.documentElement.clientHeight ;
	if( clientH < 680 ){
		 autoScroll();
	}
	function autoScroll(){
        var Liframe = document.getElementById("left_bg"); 
        var childBody = Liframe.contentWindow.document.getElementById('autoScroll');
		childBody.style.height = clientH - 35 +"px";
		childBody.style.overflow = 'auto'; 
	};
};
</script>
</head>
<frameset rows="42,*" frameborder="no" border="0" framespacing="0" id="boxframeset">
	<frame src="top.php" noresize="noresize" frameborder="0" name="topFrame" id="topFrame" marginwidth="0" marginheight="0" scrolling="no">
<frameset rows="*" cols="228,*" id="frame">
	<frame src="left.php" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" id="left_bg">
	<frame src="right.php" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" id="right_bg">
</frameset>
<frame src="" noresize="noresize" frameborder="0" name="bottomFrame" marginwidth="0" marginheight="0" scrolling="no">
<noframes>
	<body></body>
</noframes>
</frameset>
</html>