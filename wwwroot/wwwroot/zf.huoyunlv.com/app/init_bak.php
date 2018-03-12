<?php

error_reporting(0);
ini_set('display_errors','off');

define('WY_ROOT',dirname(__FILE__));
ob_start();header('Content-Type:text/html;charset=utf8');
date_default_timezone_set('Asia/Shanghai');
require_once WY_ROOT.'/Config.php';
require_once WY_ROOT.'/woodyapp.php';
session_start();
?>