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
include_once("dxUtils.php");
include_once("../app/member/class/user.php");
include_once("../app/member/class/auto_transfer.php");
if(!isset($_SESSION['userid']) OR empty($_SESSION['userid']))
{
    exit("<script>alert('请登陆后进入游戏!');history.back();</script>");
}
$uid = $_SESSION['userid'];
//auto_transfer::beforeGameOut($uid,auto_transfer::DAXIONG);
$username = $_SESSION['username'];
$gameID = isset($_GET['game']) && !empty($_GET['game']) ? $_GET['game'] : '';
$roomID = isset($_GET['roomID']) && !empty($_GET['roomID']) ? $_GET['roomID'] : 0;
$userinfo=user::getinfo($uid);
//auto_transfer::daXiongToGame($userinfo);
$class = new daXiong();
$url = $class->game($username,$roomID,$gameID);
header("Location:".$url);exit();
?>
</body>
</html>