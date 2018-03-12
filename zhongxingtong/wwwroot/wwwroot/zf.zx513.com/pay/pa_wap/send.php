<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付宝扫码</title>
</head>
<?php
/**
 * 扫码支付接口
 */

include "inc.php";
include "./Lib/Curl.php";
$data = [
    "app_id"=>$userid,
    "method"=>"openapi.payment.order.scan",
    "format"=>"json",
    "sign_method"=>"md5",
    "nonce"=>"1234567"
];
$content = [
    "type"=>2,
    "merchant_order_sn"=>$_GET["orderid"],
    "total_fee"=>$_GET["price"],
    "store_id"=>$email,
	"call_back_url"	=>	"http://".$_SERVER['HTTP_HOST']."/pay/pa_alipay/n.php"
];
$key = $userkey;
$data['biz_content'] = json_encode($content);
$result = Curl::execute($data,$key);

$json	=	json_decode($result);

$dizhi	=	$json->data->qr_code;

if ($dizhi){

	header("Location: $dizhi"); 
	exit;

}else{

	print_r($json);
	exit;
}
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
                    <div class="num"><span><font color='Red' size='4px'>订单<?php echo $_GET['orderid']?></font></span><span class="color1 ml16">使用手机登陆支付宝扫码二维码</span></div>
                </div>
            </div>
            <!--订单信息代码结束-->
            <!--扫描代码-->
            <div class="s-con" id="codem">
                <div class="title">
                    <span class="blue" style="font-size:20px;">
                        <span>应付金额：</span><span class="orange"><?php echo $_GET['price']?></span> 元
                        <br /><span style="font-size:12px;">（收银台）</span>
                    </span>
                </div>
                <div class="scan_zfb">
                    <div id="divQRCode" class="divQRCode"></ div ></div>
                    <div class="question">
                        <div class="new"></div>
                    </div>
                </div>
                <div id="yzchdiv">
                    <input id="orderno" type="hidden" value="<?php echo $_GET['orderid']?>" />
                    <input id="hidUrl" type="hidden" value="<?php echo $dizhi?>" />
                </div>
                <!--扫描代码结束-->
                <!--底部代码-->
                <div class="s-foot">   Copyright?2016-2018 All Rights Reserved.</div>
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
						
								window.location.href = data;
						}
					
					}
                       
                }
            });
        }
        setInterval(refresh, 3000);
    });
</script>