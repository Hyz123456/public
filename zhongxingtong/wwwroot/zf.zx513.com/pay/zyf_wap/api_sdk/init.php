<?php
/**
 * @name: 豆豆支付SDK.
 * @Author: Coder.yee <Coder.yee@gmail.com>
 * @Date: 2017/9/24
 * @Version: v1.0
 */
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
define('DOUDOUPAY_PATH', __DIR__);

require DOUDOUPAY_PATH . '/config.php';
require DOUDOUPAY_PATH . '/lib/func.class.php';
require DOUDOUPAY_PATH . '/lib/CryptRSA.class.php';
