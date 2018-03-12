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
    <img src="images/lg2.gif"><br><br>载入游戏大概需要花几秒钟时间，请耐心等待...</p>
<p style="visibility: hidden;">&nbsp;<img src="images/lg.gif"></p>
<?php
if(!isset($_SESSION)){ session_start();}
if(!isset($_SESSION['userid']) OR empty($_SESSION['userid']))
{
    exit("<script>alert('请登陆后再操作。');</script>");
}
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once("../app/member/class/user.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once("../app/member/class/auto_transfer.php");
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
//auto_transfer::beforeGameOut($uid,auto_transfer::BBIN);
$username = $_SESSION['username'];
include_once("bbapi.php");
$userinfo=user::getinfo($uid);
//auto_transfer::bbinToGame($userinfo);
$bbapi = new bbapi();
$bbRet = $bbapi->create($username);
$site = isset($_GET['site']) ? $_GET['site'] :'live';
$bbRet = $bbapi->login($username,$site);
$url = $bbRet['Data'];
echo("<script> window.location.href= '{$url}' </script> ");
?>
</body>
</html>