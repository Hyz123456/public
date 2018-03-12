<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-Type: text/html; charset=utf8");
$public_key = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCL4nMv6qK7Lt1MzfK20LrVd/0g0
pXIvV281sT16s4xIWEg/Hfv0su0MHdbTobZfHcziyO/xdmItCzkcJOIIskuC3QukN
rWnt7kf1wZ1OmIMWAcS5s9wnMd0QcpDpcyfZfJvlZgFDtgJtApXvCBBVIEX65W1Fn
mlZ7wccO3Ca+J8QIDAQAB
-----END PUBLIC KEY-----";
// 密钥必须按照以下格式
$private_key = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJ
WeqOe4EQFHl6ToYpRCK+GZmFLout+Es/d5FlA4KV0/OEdwGQWj
hCR9E7+v2mOrTvkO3HO4CrS4LS9JMXMDF/zyw2D9EIAUssiDIU
bj6oPJyqToHwvnvF7CcMWB7DC2emmEWYEIDiSgN0ai85ezG290
rNC9wlefePOwu7W3ySYhAgMBAAECgYBSG4C7sRJ77kr076ZxkC
K+qmiiTx+GXC/bBjNNkJR6nKAI7CZ/Jq30zEMTNbEWc0NigFpQ
ktYlONFrGrKtWCxIB7eigbj/3v7tAFCz+4/YVBnN6D1Z8qsLnE
99G7fdGqPeI6rfspKJzSBWWSMlXhuN6er2+AcqTckWZ2MoDEIA
RQJBANENSOWyDwmfkw01dH5PODbkAPNQv8FbWbFVdeXF31FNOk
xrqprY4qGHgC145oy/2do0v5WK60EXm6oa/UAfDbsCQQC3OIfK
wQICVeXO4mq05xiNWuRfx+lHwzmsdP7E3XHfB8CWEnFrJjUmMq
TbwTa/EYyyBC3dOiIHPuJVPhNniq/TAkBNBlsMns2hmxUgccip
XWD2AI5FGER+5rymdTmKXpzIpO7NB4KFqVHfeECHAJvZ0jpfhr
3sSJIjmqI1S9pxzL9PAkBZT5sRwGeET+7HnCK7r/KN5QJxlfcm
3gkdAaK2v+Mj/ploDfFvc55w0jr+S/6twJY+qD7bGd1AfuzA9J
Ns43O1AkEAwT2pndAGV7TFTX5CKFn1Bp4p6+0r59gPXOUFWbcu
BThMK/7l4rz11BmZYyr2M2Dd7Y8BDQY+LUR8CTVZ5Tde6A==
-----END PRIVATE KEY-----';
//支付系统网关地址
$pay_url = "http://zf.szjhzxxkj.com/ownPay/pay";
// 请求数据赋值
$data = "";
$data['merchantNo'] = '500007452153'; //商户号1
$data['requestNo'] = $_GET["orderid"]; //支付流水2
$data['amount'] = $_GET['price']*100;//金额（分） 3 
$data['payMethod'] = '6006';//业务编号4  
$data['pageUrl'] = "http://".$_SERVER['HTTP_HOST']."/pay/jhz_wxh5/n.php";  //页面返回URL5
$data['backUrl'] = "http://".$_SERVER['HTTP_HOST']."/pay/jhz_wxh5/n.php";  //服务器返回URL  6
$data['payDate'] = time();   //支付时间，必须为时间戳7
$data['remark1'] = '备注1'; //8
$data['remark2'] ='';//9
$data['remark3'] = '';//10
//$data['bankType'] = $_GET['pd_FrpId'];
$data['bankAccountType'] = '11';
$data['idCard'] = $_GET['sfz'];//身份证号码15
$data['memberName'] = $_GET['name'];//姓名14
$data['mobile'] = $_GET['tel'];//手机号码12
$data['bankNo'] = $_GET['yhk'];//银行卡号13
$data['cerdType'] = '1';//银行卡类型16
//$data['idType'] = '1';//证件类型
$signature=$data['merchantNo']."|".$data['requestNo']."|".$data['amount']."|".$data['pageUrl']."|".$data['backUrl']."|".$data['payDate']."|".$data['agencyCode']."|".$data['remark1']."|".$data['remark2']."|".$data['remark3'];
//echo $signature;die;
//echo '<br>';
////////////////////////

$tel = $_GET['tel'];
$name=$_GET['name'];
$sfz=$_GET['sfz'];
$yhk=$_GET['yhk'];

$pr_key ='';
if(openssl_pkey_get_private($private_key)){
    $pr_key = openssl_pkey_get_private($private_key);
    //echo $pr_key;
	//return true;
   // echo '获取private key成功！';
   // echo '<br>';
}else{
    echo '获取private key失败！';
	
    //echo '<br>';
}

$pu_key = '';
if(openssl_pkey_get_public($public_key)){
    $pu_key = openssl_pkey_get_public($public_key);
    //echo $pu_key;
	//return true;
   // echo '获取public key成功！';
    //echo '<br>';
}else{
	
    echo '获取public key失败！';
   // echo '<br>';
}
 
$sign = '';

//openssl_sign(加密前的字符串,加密后的字符串,密钥:私钥);
openssl_sign($signature,$sign,$pr_key);


openssl_free_key($pr_key);

$sign = base64_encode($sign);

//echo '签名：'.$sign;
//echo '<br>';
$data['signature'] = $sign;
//var_dump($pay_url);die;
/**$sHtml = "<form id='youbaopaysubmit' name='youbaopaysubmit' action='".$pay_url."' method='get'>";
while (list ($key, $val) = each ($data)) {
    $sHtml.= "<input type='text' name='".$key."' value='".$val."'/>";
}
$sHtml.= "<input type='submit' value='提交' /></form>";
$sHtml.= "</form>";**/
//echo $sHtml;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>正在转到付款页</title>
</head>
<body onLoad="document.youbaopaysubmit.submit()">
    <form id='youbaopaysubmit' name='youbaopaysubmit'  action="<?php echo $pay_url?>" method="get">
        <input type="hidden" name="merchantNo" value="<?php echo $data['merchantNo']?>">
        <input type="hidden" name="requestNo" value="<?php echo $data['requestNo']?>">
		<input type="hidden" name="amount" value="<?php echo $data['amount']?>">
        <input type="hidden" name="payMethod" value="<?php echo $data['payMethod']?>">
		<input type="hidden" name="pageUrl" value="<?php echo $data['pageUrl']?>">
		<input type="hidden" name="backUrl" value="<?php echo $data['backUrl']?>">
		<input type="hidden" name="payDate" value="<?php echo $data['payDate']?>">
		<input type="hidden" name="remark1" value="<?php echo $data['remark1']?>">
		<input type="hidden" name="remark2" value="<?php echo $data['remark2']?>">
		<input type="hidden" name="remark3" value="<?php echo $data['remark3']?>">
		<input type="hidden" name="signature" value="<?php echo $data['signature']?>">
		<input type="hidden" name="phoneNo" value="<?php echo $data['mobile']?>">
		<input type="hidden" name="acctNo" value="<?php echo $data['bankNo']?>">
		<input type="hidden" name="customerName" value="<?php echo $data['memberName']?>">
		<input type="hidden" name="cerdNo" value="<?php echo $data['idCard']?>">
        <input type="hidden" name="cerdType" value="<?php echo $data['cerdType']?>">
    </form>
</body>
</html>
