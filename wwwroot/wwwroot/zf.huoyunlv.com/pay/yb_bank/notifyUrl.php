<?php
header("Content-type: text/html; charset=utf-8");

require_once 'inc.php';
use WY\app\model\Handleorder;
 $returnArray = array( // 返回字段
            "memberid" => $_REQUEST["memberid"], // 商户ID
            "orderid" =>  $_REQUEST["orderid"], // 订单号
            "amount" =>  $_REQUEST["amount"], // 交易金额
            "datetime" =>  $_REQUEST["datetime"], // 交易时间
            "transaction_id" =>  $_REQUEST["transaction_id"], // 支付流水号
            "returncode" => $_REQUEST["returncode"],
        );
		
        $md5key = "r14bq8q4mvxwgwqeejgytpi8zw53re8q";
        ksort($returnArray);
        reset($returnArray);
        $md5str = "";
		
        foreach ($returnArray as $key => $val) {
			 if(!empty($val)){
            $md5str = $md5str . $key . "=" . $val . "&";
			 }
        }
        $sign = strtoupper(md5($md5str . "key=" . $md5key));
		
        if ($sign == $_REQUEST["sign"]) {
            if ($_REQUEST["returncode"] == "00") {
                   $handle=@new Handleorder($_REQUEST["orderid"],$_REQUEST["amount"]);
					$handle->updateUncard();
                   exit("ok");
            }
        }





?>
