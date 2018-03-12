<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";

error_reporting(E_ALL^E_NOTICE^E_WARNING);

$public_key = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCL4nMv6qK7Lt1MzfK20LrVd/0g
0pXIvV281sT16s4xIWEg/Hfv0su0MHdbTobZfHcziyO/xdmItCzkcJOIIskuC3Qu
kNrWnt7kf1wZ1OmIMWAcS5s9wnMd0QcpDpcyfZfJvlZgFDtgJtApXvCBBVIEX65W
1FnmlZ7wccO3Ca+J8QIDAQAB
-----END PUBLIC KEY-----";
// 密钥必须按照以下格式
$private_key = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJWeqOe4EQFHl6To
YpRCK+GZmFLout+Es/d5FlA4KV0/OEdwGQWjhCR9E7+v2mOrTvkO3HO4CrS4LS9J
MXMDF/zyw2D9EIAUssiDIUbj6oPJyqToHwvnvF7CcMWB7DC2emmEWYEIDiSgN0ai
85ezG290rNC9wlefePOwu7W3ySYhAgMBAAECgYBSG4C7sRJ77kr076ZxkCK+qmii
Tx+GXC/bBjNNkJR6nKAI7CZ/Jq30zEMTNbEWc0NigFpQktYlONFrGrKtWCxIB7ei
gbj/3v7tAFCz+4/YVBnN6D1Z8qsLnE99G7fdGqPeI6rfspKJzSBWWSMlXhuN6er2
+AcqTckWZ2MoDEIARQJBANENSOWyDwmfkw01dH5PODbkAPNQv8FbWbFVdeXF31FN
OkxrqprY4qGHgC145oy/2do0v5WK60EXm6oa/UAfDbsCQQC3OIfKwQICVeXO4mq0
5xiNWuRfx+lHwzmsdP7E3XHfB8CWEnFrJjUmMqTbwTa/EYyyBC3dOiIHPuJVPhNn
iq/TAkBNBlsMns2hmxUgccipXWD2AI5FGER+5rymdTmKXpzIpO7NB4KFqVHfeECH
AJvZ0jpfhr3sSJIjmqI1S9pxzL9PAkBZT5sRwGeET+7HnCK7r/KN5QJxlfcm3gkd
AaK2v+Mj/ploDfFvc55w0jr+S/6twJY+qD7bGd1AfuzA9JNs43O1AkEAwT2pndAG
V7TFTX5CKFn1Bp4p6+0r59gPXOUFWbcuBThMK/7l4rz11BmZYyr2M2Dd7Y8BDQY+
LUR8CTVZ5Tde6A==
-----END PRIVATE KEY-----';
//支付系统网关地址
$pay_url = "http://zf.szjhzxxkj.com/ownPay/pay";
// 请求数据赋值
$data = "";
$data['merchantNo'] = '500007452153'; //商户号
$data['requestNo'] =  $_GET["orderid"]; //支付流水
$data['amount'] = $_GET["price"]*100;//金额（分）  
$data['payMethod'] = '6005';//业务编号  
$data['backUrl'] = "http://".$_SERVER['HTTP_HOST']."/pay/jhz_wxh5/n.php";   //页面返回URL
$data['pageUrl'] = "http://".$_SERVER['HTTP_HOST']."/pay/jhz_wxh5/n.php";   //页面返回URL
$data['payDate'] = time();   //支付时间，必须为时间戳
$data['remark1'] = '1'; 
$data['remark2'] ='2';
$data['remark3'] = '3';

$signature=$data['merchantNo']."|".$data['requestNo']."|".$data['amount']."|".$data['pageUrl']."|".$data['backUrl']."|".$data['payDate']."|".$data['agencyCode']."|".$data['remark1']."|".$data['remark2']."|".$data['remark3'];



////////////////////////
$pr_key ='';
if(openssl_pkey_get_private($private_key)){
    $pr_key = openssl_pkey_get_private($private_key);
  //  echo $pr_key;
  //  echo '获取private key成功！';
  //  echo '<br>';
}else{
    echo '获取private key失败！';
    echo '<br>';
}

$pu_key = '';
if(openssl_pkey_get_public($public_key)){
    $pu_key = openssl_pkey_get_public($public_key);
   // echo $pu_key;

  //  echo '获取public key成功！';
  //  echo '<br>';
}else{
    echo '获取public key失败！';
    echo '<br>';
}

$sign = '';

//openssl_sign(加密前的字符串,加密后的字符串,密钥:私钥);
openssl_sign($signature,$sign,$pr_key);


openssl_free_key($pr_key);

$sign = base64_encode($sign);


$data['signature'] = $sign;


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>lodding...</title>
</head>
<body onLoad="document.dinpayForm.submit();">
<form name="dinpayForm" method="post" action="http://zf.szjhzxxkj.com/ownPay/pay"><!-- 注意 非UTF-8编码的商家网站 此地址必须后接编码格式 -->
<?php
 foreach($data as $k=>$v)
 {
            echo "<input type=\"hidden\" name=\"{$k}\" value=\"{$v}\" />\n";
 }
?>
</form>
</body>
</html>