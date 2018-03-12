<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付宝扫码</title>
</head>
<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";
include "../HttpClient.class.php";


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

error_reporting(E_ALL^E_NOTICE^E_WARNING);


//支付系统网关地址
$pay_url = "https://mapi.020leader.com/index.php?";


// 请求数据赋值
$data = "";

$data['service'] = 'unipay.acquire.precreate'; //商户号


$data['total_fee'] =  $_GET["price"]; //支付流水


$data['dynamic_type'] = "2";



$data['merchant_num'] = '000000000094522';//业务编号  


$data['terminal_unique_no'] = "1";   //页面返回URL



$data['cashier_num']		=	"15210193927";

$data['client_type']		=	"PC";




$data	=	createLinkstring($data);

$url	=	$pay_url.$data;


$fanhui	=	file_get_contents($url);




$neirong	=	json_decode($fanhui);





$orderid	=	$_GET["orderid"];

$dizhi	=	$neirong->qr_code;




$trace_num	=	$neirong->trace_num;

if (!$dizhi){


	print_r($neirong);
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
                    <div class="num"><span><font color='Red' size='4px'>订单<?php echo $orderid?></font></span><span class="color1 ml16">使用手机登陆支付宝扫码二维码</span></div>
                </div>
            </div>
            <!--订单信息代码结束-->
            <!--扫描代码-->
            <div class="s-con" id="codem">
                <div class="title">
                    <span class="blue" style="font-size:20px;">
                        <span>应付金额：</span><span class="orange"><?php echo $_GET['price']?></span> 元
                        <br /><span style="font-size:12px;">注意付款后千万不要刷新页面，否则会无法到账</span>
                    </span>
                </div>
                <div class="scan_zfb">
                    <div id="divQRCode" class="divQRCode"></ div ></div>
                    <div class="question">
                        <div class="new"></div>
                    </div>
                </div>
                <div id="yzchdiv">
                    <input id="orderno" type="hidden" value="<?php echo $orderid?>" />
                    <input id="hidUrl" type="hidden" value="<?php echo $dizhi?>" />
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


		alert("注意千万不要刷新页面，否则会无法到账");


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
                url: 'returnUrl.php?orderid=' + orderno+"&sn=<?php echo $trace_num?>",
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