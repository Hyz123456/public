<?php

/*
 * @Description 易游酷产品通用接口范例
 * @V3.0
 * @Author Svi
 */
include 'merchantProperties.php';
#	时间设置
date_default_timezone_set('prc');

#	产品通用接口请求地址
$reqURL_onLine = "http://fpay.yeeyk.com/fourth-app/prof/acquiring";
#	订单查询接口请求地址
 $queryURL_onLine = "http://fpay.yeeyk.com/fourth-app/queryForMerchant";

#	签名函数生成签名串
function getReqHmacString($pId,$pOrder,$pAmt,$pUrl,$pUid,$pPid,$pType) {
	include 'merchantProperties.php';
	#取得加密前的字符串
	$sbOld = "";
	#添加商户编号
	$sbOld = $sbOld . $pId;
	#
	$sbOld = $sbOld . $pOrder;
	#
	$sbOld = $sbOld . $pAmt;
	#
	$sbOld = $sbOld . $pUrl;
	#
	$sbOld = $sbOld . $pUid;
	#
	$sbOld = $sbOld . $pPid;
	#
	$sbOld = $sbOld . $pType;
	logstr($pOrder, $sbOld, HmacMd5($sbOld, $merchantKey));

	return HmacMd5($sbOld, $merchantKey);
}
#	校验返回结果
function checkHmac($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount,$hmac){
	if ($hmac == getCallbackHmacString($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount))
        return true;
    else
        return false;
}
#	生成校验码
function getCallbackHmacString($reCode,$merchantNo,$merchantOrderno,$result,$payType,$memberGoods,$amount){
	$sbOld = "";
	$sbOld = $sbOld.$reCode;
	$sbOld = $sbOld.$merchantNo;
	$sbOld = $sbOld.$merchantOrderno;
	$sbOld = $sbOld.$result;
	$sbOld = $sbOld.$payType;
	$sbOld = $sbOld.$memberGoods;
	$sbOld = $sbOld.$amount;
	return HmacMd5($sbOld, $merchantKey);
}
function HmacMd5($data, $key) {
	// RFC 2104 HMAC implementation for php.
	// Creates an md5 HMAC.
	// Eliminates the need to install mhash to compute a HMAC
	// Hacked by Lance Rushing(NOTE: Hacked means written)

	//需要配置环境支持iconv，否则中文参数不能正常处理
	$key = iconv("GB2312", "UTF-8", $key);
	$data = iconv("GB2312", "UTF-8", $data);

	$b = 64; // byte length for md5
	if (strlen($key) > $b) {
		$key = pack("H*", md5($key));
	}
	$key = str_pad($key, $b, chr(0x00));
	$ipad = str_pad('', $b, chr(0x36));
	$opad = str_pad('', $b, chr(0x5c));
	$k_ipad = $key ^ $ipad;
	$k_opad = $key ^ $opad;

	return md5($k_opad . pack("H*", md5($k_ipad . $data)));
}
#POST请求
function request_post($url = '', $param = '') {
	if (empty($url) || empty($param)) {
		return false;
	}

	$postUrl = $url;
	$curlPost = $param;
	$ch = curl_init();//初始化curl
	curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	$data = curl_exec($ch);//运行curl
	curl_close($ch);

	return $data;
}

#	获取回调结果
function getCallBackValue(&$reCode,&$merchantNo,&$merchantOrderno,&$result,&$payType,&$memberGoods,$amount,&$hmac){
	$reCode = $_REQUEST['reCode'];
	$merchantNo = $_REQUEST['merchantNo'];
	$merchantOrderno = $_REQUEST['merchantOrderno'];
	$result = $_REQUEST['result'];
	$payType = $_REQUEST['payType'];
	$memberGoods = $_REQUEST['memberGoods'];
	$amount = $_REQUEST['amount'];
	$hmac = $_REQUEST['hmac'];
	return null;
}

function logstr($orderid, $str, $hmac)
{
	include 'merchantProperties.php';
	$james = fopen($logName, "a+");
	fwrite($james, "\r\n" . date("Y-m-d H:i:s") . "|orderid[" . $orderid . "]|str[" . $str . "]|hmac[" . $hmac . "]");
	fclose($james);
}
