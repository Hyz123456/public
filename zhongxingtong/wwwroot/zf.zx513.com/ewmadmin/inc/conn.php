<?php
#数据库连接
include_once 'config.php';
$conn = mysql_connect($host,$user,$password) or die("连接超时~请重试");
mysql_select_db($db);
mysql_query("set names utf8");
date_default_timezone_set("Asia/Shanghai");

$zhifubaotype=1; //0 表示支付宝备注区分模式 1表示支付宝金额区分模式
$weixintype=1; //0 表示微信备注区分模式 1表示微信金额区分模式  微信认证码模式只能选用1 微信金额区分模式  微信扫码登陆模式可以选择备注或金额模式
?>