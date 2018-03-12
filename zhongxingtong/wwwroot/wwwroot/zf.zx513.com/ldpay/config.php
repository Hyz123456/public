<?php
session_start();
header("Content-type:text/html;charset=utf-8");
#数据库连接
include_once '../ewmadmin/inc/config.php';//二维码系统 配置文件路径
$aa = $host;               //数据库连接地址
$bb = $user;                   //数据库用户名
$cc = $password;                  //数据库密码
$dd = $db;                //数据库名称

$payali = "ali.png";  //默认支付宝二维码 请不要修改
$payten = "ten.png";  //默认财付通二维码 请不要修改
$paywx = "wx.png";    //默认微信二维码 请不要修改

$conn = mysql_connect($aa, $bb, $cc);
if (mysql_select_db($dd, $conn)) {

} else {
    echo "数据库连接失败,请检查数据库！";
}
mysql_query("set names 'utf8'");
?>
