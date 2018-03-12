<?php
require_once 'inc.php';
$pay_applydate = date("Y-m-d H:i:s");  //订单时间
$pay_notifyurl = "http://".$_SERVER['HTTP_HOST']."/pay/yfb_yalipay/notifyUrl.php";   //服务端返回地址
$pay_callbackurl = "http://".$_SERVER['HTTP_HOST']."/pay/yfb_yalipay/returnUrl.php";  //页面跳转返回地址
$tjurl = "http://www.yizhifupay.com/Pay_Index.html";   //提交地址
$pay_bankcode = "903";   //银行编码
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
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$pj_string);
$response = curl_exec($ch);
curl_close($ch);
$str = stripslashes($response);  
//转成Array
$arr = json_decode($str,true); 
if($arr['status'] == 200){
	//生产二维码
include 'phpqrcode/phpqrcode.php';
  
$value=$arr['qrcode_url'];
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
}else{
	echo $response;
}



?>
