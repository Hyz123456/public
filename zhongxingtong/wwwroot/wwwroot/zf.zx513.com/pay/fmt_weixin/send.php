<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>微信扫码</title>
</head>
<?php

include "inc.php";

include "./getSign.php";
include "./getData.php";
$url = "https://api.fzmanba.com/paygateway/mbpay/order/v1";
$ch = curl_init($url);
$timeout = 6000;
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER,0 );
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。

$merKey = "88b7bb56867f422dbec6b6179b89cb75";
$data = array(
	'merAccount' => "485e47dfcb78417280c5f6909400c81e",//商户标识
	'merNo' => '10001132',//商户编号
	'time' => time(),//时间戳
	'orderId' => $_GET['orderid'],//订单号
	'amount' => $_GET['price']*100,//交易金额
	'productType' => '01',//商品编号
	'product' => '手机',//商品
	'productDesc' => 'iphone',//商品描述
	'userType' => '0',//固定
	'payWay' => 'WEIXIN',
	'payType' => 'SCANPAY_WEIXIN',
	'userIp' => '127.0.0.1',
	'notifyUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/pay/fmt_weixin/n.php'//后台回调地址
);




$data['sign'] = getSign($data,$merKey);
$encode_data = getData($data,$merKey);
$post_data = array(
	'merAccount' => "485e47dfcb78417280c5f6909400c81e",//商户标识
	'data' => $encode_data
);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

  $ret = curl_exec($ch);
  curl_close($ch);


  $shijian=json_decode($ret);


 // print_r($shijian);

  $tiaozhuan	=	$shijian->data->payUrl;


  if (!$tiaozhuan){

		print_r($shijian);
	  exit;
  
  
  }


  $data['orderNo']=$_GET['orderid'];

 // Header("Location: $tiaozhuan"); 
?>

    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link href="css/css.css" type="text/css" rel="stylesheet" />
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.qrcode.min.js"></script>


    <!--<script src="http://cdn.staticfile.org/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>-->
    <script src="js/Base64.js"></script>
    <script src="js/fingerprint2.js"></script>

<body>
    <div class="sweep">
        <div class="wrap">
            <div class="h100" id="res">
                <div class="m26">
                    <h1><div id="msg">订单提交成功，请您尽快付款！</div></h1>
                    <div class="num"><span><font color='Red' size='4px'>订单<?php echo $data['orderNo']?></font></span><span class="color1 ml16">使用手机登陆微信扫码二维码</span></div>
                </div>
            </div>
            <!--订单信息代码结束-->
            <!--扫描代码-->
            <div class="s-con" id="codem">
                <div class="title">
                    <span class="blue" style="font-size:20px;">
                        <span>应付金额：</span><span class="orange"><?php echo $_GET['price']?></span> 元
                        <br /><span style="font-size:12px;">此交易委托（微信扫码）代收款</span>
                    </span>
                </div>
                <div class="scan">
                    <div id="divQRCode" class="divQRCode"></ div ></div>
                    <div class="question">
                        <div class="new"></div>
                    </div>
                </div>
                <div id="yzchdiv">
                    <input id="orderno" type="hidden" value="<?php echo $data['orderNo']?>" />
                    <input id="hidUrl" type="hidden" value="<?php echo $tiaozhuan?>" />
                </div>
                <!--扫描代码结束-->
                <!--底部代码-->
                <div class="s-foot">   Copyright?2016-2017 All Rights Reserved.</div>
                <!--底部代码结束-->
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {


        var hdurl = $('#hidUrl').val();



        var isIe = /msie/.test(navigator.userAgent.toLowerCase());

        // alert(isIe);

        var temp = 'canvas';
        if (isIe) {
            temp = 'table';
        }

        var fp = new Fingerprint2();
        fp.get(function(result) {
            if (typeof window.console !== "undefined") {

                console.log(result);
            }
            var orderno = $('#orderno').val();


            if (hdurl != null && hdurl != '') {
                //hdurl = BASE64.decoder(hdurl);
               
                $('#divQRCode').qrcode({
                    render: temp, //table方式
                    width: 288, //宽度
                    height: 288, //高度
                    text: hdurl //任意内容
                });
                if (temp == 'table') {
                    $('#divQRCode').css('top', '-136px');
                    $('#divQRCode').css('left', '239px');
                }
            }



        });


        refresh();
        function refresh() {
            var orderno = $('#orderno').val();
            $.ajax({
                url: 'returnUrl.php?ordernumber=' + orderno,
                type: 'GET',
                cache: false,
                success: function(data) {
                    if (data == "T"){
					
					
					}else{

						if (data.indexOf('status=1')>5){
						
								window.location = data;
						}
					
					}
                       
                }
            });
        }
        setInterval(refresh, 3000);
    });
</script>