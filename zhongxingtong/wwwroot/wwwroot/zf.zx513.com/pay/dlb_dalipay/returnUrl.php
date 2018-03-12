<?php
require_once 'inc.php';
use WY\app\model\Pushorder;

$orderid=isset($_GET['orderid']) ? $_GET['orderid'] : '';
$push=new Pushorder($orderid);
echo $push->ajax();
?>
