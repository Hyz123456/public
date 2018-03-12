<?php
require_once 'inc.php';
require_once '../HttpClient.class.php';


$pay_memberid		= $userid;   //商户ID
$pay_orderid		= $_GET['orderid'];    //订单号
$pay_amount			= $_GET['price'];    //交易金额
$pay_applydate		= date("Y-m-d H:i:s");  //订单时间
$pay_notifyurl		= "http://".$_SERVER['HTTP_HOST']."/pay/qjh_qqh5/n.php";		//服务端返回地址
$pay_callbackurl	= "http://".$_SERVER['HTTP_HOST']."/pay/qjh_qqh5/n.php";		//页面跳转返回地址
$Md5key = $userkey;   //密钥

$tjurl = "https://api.qujuhe.com/pay_index";   //提交地址


$pay_bankcode = "908";   //收付宝微信   912收付宝 支付宝

//扫码
$native = array(
    "pay_memberid" => $pay_memberid,
    "pay_orderid" => $pay_orderid,
    "pay_amount" => $pay_amount,
    "pay_applydate" => $pay_applydate,
    "pay_bankcode" => $pay_bankcode,
    "pay_notifyurl" => $pay_notifyurl,
    "pay_callbackurl" => $pay_callbackurl,
);
ksort($native);
$md5str = "";
foreach ($native as $key => $val) {
    $md5str = $md5str . $key . "=" . $val . "&";
}
//echo($md5str . "key=" . $Md5key);
$sign = strtoupper(md5($md5str . "key=" . $Md5key));

// echo $sign;
$native["pay_md5sign"] = $sign;
$native['pay_attach'] = "1234|456";
$native['pay_productname'] ='在线充值';




			$httpt = new HttpClient('api.qujuhe.com');

			//$httpt	->setDebug(true);
		
			if (!$httpt->post($tjurl,$native)) {    
			die('An error occurred: '.$http->getError());   
			}


			$getHeaders = $httpt->getHeaders();

			$fanhui = $httpt->getContent();

			$fanhui	=	json_decode($fanhui);


			if ($fanhui->data->code_url){
			
			
				$url	=	$fanhui->data->code_url;
				header("Location: $url"); 
			
			}else{
			
				print_r($fanhui);
			
			}

			




			
			exit;


			$fanhui	= str_replace("https://","",$fanhui);
	
			
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>支付</title>

</head>
<body onload="document.pay.submit();">
<div class="container">
    <div class="row" style="margin:15px;0;">
        <div class="col-md-12">
            <form class="form-inline" name="pay" method="post" action="<?php echo $tjurl; ?>">
                <?php
                foreach ($native as $key => $val) {
                    echo '<input type="hidden" name="' . $key . '" value="' . $val . '">';
                }
                ?>
               
            </form>
        </div>
    </div>
</div>
</body>
</html>

