<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include_once "include/address.mem.php";
include_once "include/config.inc.php";
include_once "include/com_chk.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
echo "<script>if(self == top) parent.location='".BROWSER_IP."'\n;</script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="position:relative;top:0px;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>sport</title>
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="/cl/js/commjs/ieupdate.js"></script>
</head>
<script>
	    $(window.top.document).find("#mainFrame").height(750);
</script>

<frameset cols="*,1124,*" frameborder="no" border="0" framespacing="0" style="margin-top:0px;">
    <frame src="about:blank" ></frame>
    <frameset rows="121,*,0" cols="*" framespacing="0" frameborder="no" border="0">
        <frame src="left_sport.php" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" />
        <frameset cols="240,*" cols="*" framespacing="0" frameborder="no" border="0">
            <frame src="zleft_sport.php" name="leftFrame" scrolling="auto" noresize="noresize" id="leftFrame" />
            <frame name="bodyFrame"  id="bodyFrame" src="<?=BROWSER_IP?>/app/member/show/FT_1_1.html"/>
        </frameset>
        <noframes></noframes>
    </frameset>
    <frame src="about:blank" ></frame>
</frameset>

<!-- <div class="iframe_por">    
	<iframe class="iframe" width="1000" height="856" src="http://777.dfapi.net/cl/?module=System&method=Ball" frameborder="0" scrolling="no"  ></iframe>
</div>
<style>
 .iframe_por{ width:1000px; height:700px; margin:0 auto; overflow:hidden; position:relative;}
 .iframe{position:absolute; left:0px; top:-162px; }
</style> -->

</html>

