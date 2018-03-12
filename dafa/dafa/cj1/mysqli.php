<?php
ini_set('display_errors','off');
include_once($C_Patch."/app/member/include/mysql.php");
unset($mysqli);
$mysqli	=	new MySQLi("127.0.0.1","root","root123654","aobet");
$mysqli->query("set names utf8");
?>