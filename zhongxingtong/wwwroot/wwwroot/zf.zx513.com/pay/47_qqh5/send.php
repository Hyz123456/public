<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";




//支付系统网关地址
$pay_url = "http://47.94.208.216:8080/app/doQQH5NPay.do";
// 请求数据赋值
$data = "";
$data['merchNo']	=	$userid; //商户号
$data['orderNo']	=	$_GET["orderid"]; //支付流水
$data['transAmount']=	strval($_GET["price"]*100);//金额（分）  


$data['productName']=	'pay';//业务编号

$data['notifyUrl']	=	"http://".$_SERVER['HTTP_HOST']."/pay/47_qq/n.php";   //页面返回URL
$data['pageUrl']	=	"http://".$_SERVER['HTTP_HOST']."/pay/47_qq/r.php";   //页面返回URL




ksort($data);


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


$sign	=	createLinkstring($data).$userkey;




$data['sign']	=	md5($sign);




?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>正在转到付款页</title>
</head>
<body onLoad="document.pay.submit()">
    <form name="pay" action="http://47.94.208.216:8080/app/doQQH5NPay.do" method="post">
        <input type="hidden" name="merchNo" value="<?php echo $data['merchNo']?>">
        <input type="hidden" name="orderNo" value="<?php echo $data['orderNo']?>">
        <input type="hidden" name="transAmount" value="<?php echo $data['transAmount']?>">
        <input type="hidden" name="productName" value="<?php echo $data['productName']?>">
        <input type="hidden" name="notifyUrl" value="<?php echo $data['notifyUrl']?>">
        <input type="hidden" name="pageUrl" value="<?php echo $data['pageUrl']?>">
        <input type="hidden" name="sign" value="<?php echo $data['sign']?>">

    </form>
</body>
</html>
