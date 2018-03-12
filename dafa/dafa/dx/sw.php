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
$gameID = isset($_GET['game']) && !empty($_GET['game']) ? $_GET['game'] : '';
if(!in_array($gameID,array('PTG0001','PTG0002','PTG0003','PTG0004','PTG0005','PTG0010','PTG0011','PTG0012')))
{
    exit("<script>alert('该游戏不支持试玩，请试试其他游戏!');window.close();</script>");
}
include_once("dxUtils.php");
$class = new daXiong();
$url = $class->demo($gameID);
header("Location:".$url);exit();
?>
</body>
</html>