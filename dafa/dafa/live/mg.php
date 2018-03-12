<?php 
header("Content-type: text/html; charset=utf-8");
if(!isset($_SESSION)){ session_start();}
$uid = intval(@$_SESSION['uid']);
$username = @$_SESSION["username"];
include_once("config.php");
if(!$username){
	echo "<script>alert('请登录后再试！');window.close();</script>";exit;
}
if(!$isMG){
	echo "<script>alert('未开通MG!');window.close();</script>";exit;
}

$page_site = @$_REQUEST["site"];
if(!$page_site){
	$page_site = "live";
}

$sign = md5($plantform."_".$merID."_".$key."_".$username);

$url = $fenjieHost."/mg!login.do?plantform=".$plantform."&username=".$username."&password=".$password."&sign=".$sign."&page_site=".$page_site;
if($page_site != "live"){
	$game=$_REQUEST["game"];
	if(!$game){
		echo "<script>alert('未开通MG!');window.close();</script>";exit;
	}else{
		$url.="&game=".$game;
	}
}
//echo $url;exit;
$url = curl_file_get_contents($url);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>    
        <title>MG真人娱乐</title>
     <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
	     </head>
    <frameset rows="*" cols="100%">
        <frame noresize="noresize" src="<?=$url ?>" scrolling="auto" name="top">
        <noframes>
        </noframes>
    </frameset>

</html>