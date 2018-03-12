<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";
include "../HttpClient.class.php";



//支付系统网关地址
$pay_url = "http://120.79.29.127:8087/api/trade";
// 请求数据赋值
$data = "";
$data['version']	=	"2.3"; //商户号
$data['mchNo']		=	$userid; //支付流水
$data['mchOrderNo']	=	$_GET["orderid"]; //支付流水

$data['amt']		=	$_GET["price"];//金额（分）  
$data['payType']	=	"SCAN_WX";		//支付流水
$data['body']		=	"123";		//支付流水

$data['notifyUrl']		=	"http://".$_SERVER['HTTP_HOST']."/pay/47_code/n.php";   //页面返回URL



ksort($data);


function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}


$sign	=	createLinkstring($data)."&key=".$userkey;




$data['sign']	=	md5($sign);




$http = new HttpClient('120.79.29.127',8087);
		
		$http	->setDebug(true);
		
		if (!$http->post($pay_url,$data)) {    
			die('An error occurred: '.$http->getError());   
			
		}   
		
		
		$getHeaders = $http->getHeaders();
		
		$fanhui = $http->getContent();
	
		
		echo $fanhui;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>微信扫码</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link href="css/css.css" type="text/css" rel="stylesheet" />
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.qrcode.min.js"></script>


    <!--<script src="http://cdn.staticfile.org/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>-->
    <script src="js/Base64.js"></script>
    <script src="js/fingerprint2.js"></script>
    

</head>
<body>
    <div class="sweep">
        <div class="wrap">
            <div class="h100" id="res">
                <div class="m26">
                    <h1><div id="msg">订单提交成功，请您尽快付款！</div></h1>
                    <div class="num"><span><font color='Red' size='4px'>订单<?php echo $orderno?></font></span><span class="color1 ml16">使用手机登陆微信扫描二维码</span></div>
                </div>
            </div>
            <!--订单信息代码结束-->
            <!--扫描代码-->
            <div class="s-con" id="codem">
                <div class="title">
                    <span class="blue" style="font-size:20px;">
                        <span>应付金额：</span><span class="orange"><?php echo $amt?></span> 元
                        <br /><span style="font-size:12px;">（收银台）</span>
                    </span>
                </div>
                <div class="scan">
                    <div id="divQRCode" class="divQRCode"></ div ></div>
                    <div class="question">
                        <div class="new"></div>
                    </div>
                </div>
                <div id="yzchdiv">
                    <input id="orderno" type="hidden" value="<?php echo $orderno?>" />
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

<script>
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