<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>微信扫码</title>
</head>

<?php
require_once 'inc.php';
require_once '../HttpClient.class.php';


$pay_memberid		= $userid;   //商户ID
$pay_orderid		= $_GET['orderid'];    //订单号
$pay_amount			= $_GET['price'];    //交易金额
$pay_applydate		= date("Y-m-d H:i:s");  //订单时间
$pay_notifyurl		= "http://".$_SERVER['HTTP_HOST']."/pay/qjh_qqh5/n.php";		//服务端返回地址
$pay_callbackurl	= "http://".$_SERVER['HTTP_HOST']."/pay/qjh_qqh5/n.php";		//页面跳转返回地址
$Md5key = $userkey;   //密钥

$tjurl = "https://api.qujuhe.com/pay_index";   //提交地址


$pay_bankcode = "902";   //收付宝微信   912收付宝 支付宝

//扫码
$native = array(
    "pay_memberid" => $pay_memberid,
    "pay_orderid" => $pay_orderid,
    "pay_amount" => $pay_amount,
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
$sign = strtoupper(md5($md5str . "key=" . $Md5key));

// echo $sign;
$native["pay_md5sign"] = $sign;
$native['pay_attach'] = "1234|456";
$native['pay_productname'] ='在线充值';




			$httpt = new HttpClient('api.qujuhe.com');

			//$httpt	->setDebug(true);
		
			if (!$httpt->post($tjurl,$native)) {    
			die('An error occurred: '.$http->getError());   
			}


			$getHeaders = $httpt->getHeaders();

			$fanhui = $httpt->getContent();

			$fanhui	=	json_decode($fanhui);


			


			if ($fanhui->data->code_url){
			
			
				$url	=	$fanhui->data->code_url;
				
			
			}else{
			
				print_r($fanhui);
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
                    <div class="num"><span><font color='Red' size='4px'>订单<?php echo $pay_orderid?></font></span><span class="color1 ml16">使用手机登陆微信扫码二维码</span></div>
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
                    <input id="orderno" type="hidden" value="<?php echo $pay_orderid?>" />
                    <input id="hidUrl" type="hidden" value="<?php echo $url?>" />
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

