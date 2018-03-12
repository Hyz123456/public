<?php
require_once 'inc.php';
$pay_applydate = date("Y-m-d H:i:s");  //订单时间
$pay_notifyurl = "http://".$_SERVER['HTTP_HOST']."/pay/yb_bank/notifyUrl.php";   //服务端返回地址
$pay_callbackurl = "http://".$_SERVER['HTTP_HOST']."/pay/yb_bank/returnUrl.php";  //页面跳转返回地址
$tjurl = "http://www.yizhifupay.com/Pay_Index.html";   //提交地址
$pay_bankcode = "907";   //银行编码
//扫码
$native = array(
    "pay_memberid" => $userid,
    "pay_orderid" => $_GET['orderid'],
    "pay_amount" => $_GET['price'],
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
$sign = strtoupper(md5($md5str . "key=" . $userkey));
$native["pay_md5sign"] = $sign;
$native['pay_attach'] = "1234|456";
$native['pay_productname'] ='VIP基础服务';
foreach($native as $key => $val){
	if($key == "pay_amount"){
		$pj_string .= $key."=".$val;
	}else{
		$pj_string .= "&".$key."=".$val;
	}
}

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$tjurl);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$pj_string);
$data = curl_exec($ch);
curl_close($ch);

?>
