<?php
require_once 'inc.php';
use WY\app\model\Handleorder;


 $ReturnArray = array( // 返回字段
            "memberid" => $_REQUEST["memberid"], // 商户ID
            "orderid" =>  $_REQUEST["orderid"], // 订单号
            "amount" =>  $_REQUEST["amount"], // 交易金额
            "datetime" =>  $_REQUEST["datetime"], // 交易时间
            "transaction_id" =>  $_REQUEST["transaction_id"], // 支付流水号
            "returncode" => $_REQUEST["returncode"],
        );
      
        $Md5key = $userkey;
   
		ksort($ReturnArray);
        reset($ReturnArray);
        $md5str = "";
        foreach ($ReturnArray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
        $sign = strtoupper(md5($md5str . "key=" . $Md5key));
        if ($sign == $_REQUEST["sign"]) {
			
            if ($_REQUEST["returncode"] == "00") {
				   $str = "交易成功！订单号：".$_REQUEST["orderid"];



				
					$orderid	=	$_REQUEST["orderid"];

					$amount		=	$_REQUEST["amount"];
					$handle=@new Handleorder($orderid,$amount);
					$handle->updateUncard();




                  // file_put_contents("success.txt",$str."\n", FILE_APPEND);
				   exit("ok");
            }
       }
?>