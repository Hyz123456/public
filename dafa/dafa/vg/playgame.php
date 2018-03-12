<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息
if(!isset($_SESSION)){ session_start();}
include_once("vgapi.php");
$username = isset($_SESSION['username']) ? $_SESSION['username']: '';
if(empty($username)) exit('<script>alert("请登陆");history.go(-1);</script>');
$vgapi=new vgapi();
$res = $vgapi->create($username);
if(isset($res['response']['errcode']) &&  ($res['response']['errcode'] == 0 OR $res['response']['errcode'] == -99))
{

    $loginRes = $vgapi->loginWithChannel($username);
    if(isset($res['response']['errcode']) && $loginRes['response']['errcode'] == 0)
    {
        $url =$loginRes['response']['result'];
        header("Location: ".$url);
        exit();
    }
}
return;
?>
</body>
</html>