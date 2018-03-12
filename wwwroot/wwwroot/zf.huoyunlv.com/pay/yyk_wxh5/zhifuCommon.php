<?php

/*
 * @Description Ò×ÓÎ¿á²úÆ·Í¨ÓÃ½Ó¿Ú·¶Àý
 * @V3.0
 * @Author Svi
 */
include 'merchantProperties.php';
#	Ê±¼äÉèÖÃ
date_default_timezone_set('prc');

#下单地址
$reqURL_onLine = "http://saas.yeeyk.com/saas-trx-gateway/order/acceptOrder";
#查单地址
$queryURL_onLine = "http://saas.yeeyk.com/saas-trx-gateway/order/queryOrder";

#下单签名方法
function getReqHmacString($bankCode,$cardNo,$cardPwd,$memberGoods,$noticeSysaddress,$noticeWebaddress,$productNo,$requestAmount,$trxMerchantNo,$trxMerchantOrderno) {
    include 'merchantProperties.php';
    $sbOld = "";
    #
    if(false === empty( $bankCode)){
        $sbOld = $sbOld."bankCode=".$bankCode."&";
    }
    if(false === empty( $cardNo)){
        $sbOld = $sbOld."cardNo=".$cardNo."&";
    }
    if(false === empty( $cardPwd)){
        $sbOld = $sbOld."cardPwd=".$cardPwd."&";
    }
    #
    $sbOld = $sbOld."memberGoods=".$memberGoods."&";
    #
    $sbOld = $sbOld."noticeSysaddress=".$noticeSysaddress."&";
    #
    if(false === empty( $noticeWebaddress)){
        $sbOld = $sbOld."noticeWebaddress=".$noticeWebaddress."&";
    }
    $sbOld = $sbOld."productNo=".$productNo."&";
    #
    $sbOld = $sbOld."requestAmount=".$requestAmount."&";
    #
    $sbOld = $sbOld."trxMerchantNo=".$trxMerchantNo."&";
    #
    $sbOld = $sbOld."trxMerchantOrderno=".$trxMerchantOrderno."&";
    #
    $sbOld = $sbOld."key=".$merchantKey;

    return md5($sbOld);
}
#查单签名方法
function getQueryHmacString($trxMerchantNo,$trxMerchantOrderno) {
    include 'merchantProperties.php';
    $sbOld = "";
    #
    $sbOld = $sbOld."trxMerchantNo=".$trxMerchantNo."&";
    #
    $sbOld = $sbOld."trxMerchantOrderno=".$trxMerchantOrderno."&";
    #
    $sbOld = $sbOld."key=".$merchantKey;

    return md5($sbOld);
}
#验证签名
function checkHmac($reCode,$trxMerchantNo,$trxMerchantOrderno,$result,$productNo,$memberGoods,$amount,$hmac){
    if ($hmac == getCallbackHmacString($reCode,$trxMerchantNo,$trxMerchantOrderno,$result,$productNo,$memberGoods,$amount))
        return true;
    else
        return false;
}

/**
 * 发送post请求
 * @param string $url 请求地址
 * @param array $post_data post键值对数据
 * @return string
 */
function send_post($url, $post_data) {
 
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
 
    return $result;
}


function getCallBackValue(&$reCode,&$trxMerchantNo,&$trxMerchantOrderno,&$result,&$productNo,&$memberGoods,&$amount,&$hmac){
    $reCode = $_REQUEST['reCode'];
    $trxMerchantNo = $_REQUEST['$trxMerchantNo'];
    $trxMerchantOrderno = $_REQUEST['trxMerchantOrderno'];
    $result = $_REQUEST['result'];
    $productNo = $_REQUEST['productNo'];
    $memberGoods = $_REQUEST['memberGoods'];
    $amount = $_REQUEST['amount'];
    $hmac = $_REQUEST['hmac'];
    return null;
}


