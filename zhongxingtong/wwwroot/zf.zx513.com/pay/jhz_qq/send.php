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
$data['payMethod'] = '6011';//业务编号  
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



openssl_free_key($pr_key);

$sign = base64_encode($sign);

echo '签名：'.$sign;
echo '<br>';
$data['signature'] = $sign;
$ch = curl_init();
if(!$flag) 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_POST, TRUE); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_URL, $pay_url);
        $response =  curl_exec($ch);
  //  echo '请求成功：'.$response;
            curl_close($ch);

$str = stripslashes($response);  
//转成Array
$arr = json_decode($str,true);  
//转成json
$php_json = json_encode($response);
//去掉返回字符串
echo "返回字符串".$response;

//获取返回字符串sign
$resultsign=$arr['sign'];
//从arr去掉sign
unset($arr['sign']);
//去掉斜杠
$original_str=stripslashes(json_encode($arr));
$result=openssl_verify($original_str,base64_decode($resultsign),$public_key);
if (1==$result){
echo '<br>';
echo "验签成功";
}else{
echo "验签失败";
}

//生产二维码
include 'phpqrcode/phpqrcode.php';
  
$value=$arr['backQrCodeUrl'];
$errorCorrectionLevel = 'L';//容错级别 
$matrixPointSize = 6;//生成图片大小 
//生成二维码图片 
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'logo.png';//准备好的logo图片 
$QR = 'qrcode.png';//已经生成的原始二维码图 
if ($logo !== FALSE) { 
    $QR = imagecreatefromstring(file_get_contents($QR)); 
    $logo = imagecreatefromstring(file_get_contents($logo)); 
    $QR_width = imagesx($QR);//二维码图片宽度 
    $QR_height = imagesy($QR);//二维码图片高度 
    $logo_width = imagesx($logo);//logo图片宽度 
    $logo_height = imagesy($logo);//logo图片高度 
    $logo_qr_width = $QR_width / 5; 
    $scale = ($logo_width/$logo_qr_width); 
    $logo_qr_height = ($logo_height/$scale); 
    $from_width = ($QR_width - $logo_qr_width) / 2; 
    //重新组合图片并调整大小 
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,  
    $logo_qr_height, $logo_width, $logo_height); 
} 
//输出图片 
imagepng($QR, 'helloweba.png'); 
echo '<img src="helloweba.png">'; 
?>