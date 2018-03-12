<?php
header("Content-type: text/html; charset=utf-8");
if(!isset($_SESSION)){ session_start();}
include_once("vgapi.php");
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : '';
if(!$username)
{
    echo "<script>alert('гК╣гб╪╨Стыйтё║');window.close();</script>";exit;
}
$vgapi = new vgapi();
$res = $vgapi->balance($username);
$balance=0;
if(isset($res['response']['errcode']) && $loginRes['response']['errcode'] == 0)
{
    $balance = doubleval($res['response']['result']);
}
echo $balance;
?>