<?php
header("Content-type: text/html; charset=utf-8");

require_once 'inc.php';
use WY\app\model\Handleorder;


function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}



$status		=$_REQUEST['status'];
$orderNo	=$_REQUEST['orderNo'];
$succAmount =$_REQUEST['succAmount'];

$sign		=$_REQUEST['sign'];


$shuju=$_POST;

foreach ($shuju as $key=>$value)
{
    if ($key === 'sign')
        unset($shuju[$key]);
}



ksort($shuju);




$md5						=		md5(createLinkstring($shuju)."&".$userkey);
$tsign						=		strtoupper($md5);


if ($tsign==$sign){



	if ($status==1){

				
				$handle=@new Handleorder($orderNo,$succAmount);
				$handle->updateUncard();

				echo "SUCCESS";
				
	}else{
				echo "err2";
	}

	

}else{

	echo "err";

}




?>
