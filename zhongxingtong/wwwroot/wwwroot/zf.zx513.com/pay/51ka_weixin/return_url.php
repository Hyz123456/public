<?php
require_once 'inc.php';
use WY\app\model\Pushorder;

$orderid=isset($_GET['sdcustomno']) ? $_GET['sdcustomno'] : '';
$push=new Pushorder($orderid);
$push->sync();
?>
