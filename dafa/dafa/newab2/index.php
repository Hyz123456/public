<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="/js/jquery.js"></script>
    <title>Games</title>
    <style type="text/css">
        body {
            background-color: #000;
            color:#FF0;
            font-size:14px;
        }
    </style>
</head>
<body>
<p>&nbsp;</p>
<p align="center" id="msg">
    <img src="./images/lg2.gif"><br><br>载入游戏大概需要花几秒钟时间，请耐心等待...</p>
<p style="visibility: hidden;">&nbsp;<img src="./images/lg.gif"></p>
<?php
if(!isset($_SESSION)){ session_start();}

if(!isset($_SESSION['userid']))
{
    exit("<script>alert('请登陆后进入游戏!');history.back();</script>");
}
$uid = $_SESSION['userid'];
$username = $_SESSION['username'];
$gameType = isset($_GET['gamename'])?$_GET['gamename']:'0';
$m = isset($_GET['m'])?$_GET['m']:'0';
//auto_transfer::agToGame($userinfo);
include_once("abapi.php");
$agapi=new abapi();
$res =$agapi->register($username);
$res = $agapi->editpassword($username);
//print_r($res);die;
$res = $agapi->login($username,$m);
$url = $res['Data']['GameUrl'];
//$url = str_replace("allbetgame","allbetgaming",$url);
echo("<script> window.location.href= '{$url}' </script> ");
return;
?>
</body>
</html>