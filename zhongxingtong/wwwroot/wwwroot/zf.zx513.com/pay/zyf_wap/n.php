<?php
header("Content-type: text/html; charset=utf-8");
require_once 'inc.php';
use WY\app\model\Handleorder;



	

	$order	=	$_POST["out_trade_no"];
	$money	=	$_POST["trade_amount"]/100;


	
	$handle=@new Handleorder($order,$money);
	$handle->updateUncard();




	
	echo stripslashes('SUCCESS');

?>