<?php
header("Content-type: text/html; charset=utf-8");
require_once 'inc.php';
require_once 'yeepayCommon.php';
use WY\app\model\Handleorder;

function sign($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$val;
	}
	//去掉最后一个&字符
	//$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
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



$key			=	$merchantKey;		//MD5密钥，安全检验码


$data['return_code']		=		$_REQUEST['return_code'];  //1:信息返回成功
$data['return_msg']			=		$_REQUEST['return_msg'];

$data['amount']				=		$_REQUEST['amount'];
$data['trade_flow']			=		$_REQUEST['trade_flow']; //平台流水号
			
$data['out_trade_no']		=		$_REQUEST['out_trade_no']; //商户订单号
$data['status']				=		$_REQUEST['status']; //成功：success

$data['remark']				=		$_REQUEST['remark']; //成功：success

$tsign						=		$_REQUEST['sign'];

ksort($data);



$sign						=		md5(sign($data).$key);

if($sign==$tsign){


				if ($data['status']=="success"){

				
					$amount=$data['amount']/100;
					$handle=@new Handleorder($data['out_trade_no'],$amount);
					$handle->updateUncard();
					echo "success";
				}else{
				
					echo "err";
				}


}else{
	
	echo "签名验证失败";

}


?>
