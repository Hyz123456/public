<?php
header("Content-type:text/html;charset=utf-8");
include "inc.php";
use WY\app\model\Handleorder;
$myfile = fopen("result.txt", "w") or die("Unable to open file!");

$secret=$userkey;//商户密钥
$return = file_get_contents('php://input');//读出post过来的json字符串
$return = json_decode($return,true);//将json字符串转为数组
$localSign=strtolower(md5($return['OrderNo'].$return['MerchantNo'].$return['Amount'].$return['OutTradeNo'].$return['RetCode'].$secret));//【本地签名】：进行md5加密,然后转小写
$returnSign=$return['Sign'];//返回的校验签名

//输出txt文本进行结果比较
$txt='订单号：'.$return['OrderNo']."\r\n";
$txt.='接口端签名为：'.$localSign."\r\n";
$txt.='返回的签名为：'.$returnSign."\r\n";
$txt.='校验结果：';

if($localSign==$returnSign){


		if ($return['RetCode']=="00"){


		$ordermoney			=		$return['Amount']/100;

		$handle				=		@new Handleorder($return['OrderNo'],$ordermoney);

        $handle->updateUncard();

		echo "SUCCESS";

		}else{
		
			echo "FAIL";
		}

    $txt.='签名正确';
}else{
    $txt.='签名错误';
	echo "FAIL";
}

fwrite($myfile, $txt);
fclose($myfile);
?>