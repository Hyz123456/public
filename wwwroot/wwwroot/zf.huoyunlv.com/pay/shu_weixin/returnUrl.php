<?php
require_once 'inc.php';
use WY\app\model\Pushorder;

$orderid=isset($_GET['ordernumber']) ? $_GET['ordernumber'] : '';
$push=new Pushorder($orderid);
echo $push->ajax();
?>
