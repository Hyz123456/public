﻿<?php
header("Content-Type: text/html; charset=UTF-8");
include "inc.php";




//支付系统网关地址
$pay_url = "http://47.94.208.216:8080/app/doQQPay.do";
// 请求数据赋值
$data = "";
$data['merchNo']	=	$userid; //商户号
$data['orderNo']	=	$_GET["orderid"]; //支付流水
$data['transAmount']=	strval($_GET["price"]*100);//金额（分）  


$orderno=$data['orderNo'];
$amt=$_GET["price"];

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
                    <input id="hidUrl" type="hidden" value="123123" />
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



<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript">
	
	
	
	
	
(function ($) {
    var PopUpWin = function (ele, opts) {
        opts = $.extend({
            id: '',
            content: undefined,//内容
            closeCallback: undefined//关闭时调用的方法
        }, opts);
        this.init(ele, opts);
    }

    PopUpWin.prototype = {
        template: '<div class="pop-wraper" id="{id}">\
                <div class="pop-outer">\
                    <div class="pop-inner">\
                        <div class="pop-content">\
                            {content}\
                        </div>\
                        <div class="btn btn_cancel"><i class="ico_cancel"></i></div>\
                    </div>\
                </div>\
            </div>',
        init: function (ele, opts) {
            this.render(ele, opts);
            this.initEvent(ele, opts);
        },
        initEvent: function (ele, opts) {
            var self = this;
            ele.find('.btn_cancel').click(function () {
                ele.find('#' + self.id).remove();
                if (opts.closeCallback !== undefined && $.isFunction(opts.closeCallback)) {
                    opts.closeCallback();
                }
            });
        },
        elId: function () {//自动生成7位8进制DOM元素ID
            return 'win-xxx'.replace(/[x]/g, function (c) {
                var r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(8);
            }).toLocaleLowerCase();
        },
        render: function (ele, opts) {
            if (ele === undefined) {
                ele = $('body');
            }

            var content = opts.content;
            this.id = this.elId();

            if ($.isFunction(content)) {
                content = content(this);
            }
            tpl = this.template.replace(/\{id\}/, this.id).replace(/\{content\}/, content);
            ele.append(tpl);
        }
    };

    $.fn.popUpWin = function (opts) {
        return this.each(function () {
            var that = $(this);
            var popUp = new PopUpWin(that, opts);
        });
    };

})(jQuery);


(function (win, $, h) {
    $(document).ready(function () {
        var routeUrl = {
            'orderInfo': 'order.html',//订单提交页面
            'orderInfo_method': 'submitOrderInfo'//订单提交action方法
        }, validateField = {//需要验证的字段
            'orderInfo': ['OutTradeNo', 'Body', 'Amount', 'PayWay'],//字段名
            'orderInfo_msg': ['外部订单号', '商品介绍', '总金额', '支付通道']//字段对应的中文名
        }, loadHtml = function (url, suffix) {
            $('#auto_center').empty().load(url + ' #' + suffix, function () {

				
                if (suffix === 'orderInfo') {
					
                    $('input[name=out_trade_no]').val("<?php echo $data['orderNo'];?>");
                } else if (suffix === 'refundTest') {
                    $('input[name=out_refund_no]').val(('' + Math.random() * 10).substr(2));
                }
            });
        }, curPage = 'orderInfo';
        //初始化加载的页面
        loadHtml(routeUrl['orderInfo'], 'orderInfo');

		
		

        $('div.menu li').bind('click', function (e) {
            var curTarget = $(e.currentTarget), href = curTarget.attr('href'), suffix = href.substring(href.lastIndexOf('\.'));
            curTarget.addClass('cur').siblings('.cur').removeClass('cur');
            loadHtml(routeUrl[href], suffix);
            curPage = suffix;
        });


		
					$('#divQRCode').html('<img src="timg.gif" />');

					$('#divQRCode').css('top', '-120px');
                    $('#divQRCode').css('left', '-74px');

		

           

            //整理要传输的参数
            var input = $('div.form_wrap').find('input,select'), param = { method: 'submitOrderInfo' }, vField = validateField[curPage];
            input.each(function (i, item) {
                item = $(item);
                //var vType = item.attr('vtype'), ind = 0;
                param[item.attr('name')] = item.val();
            });




			param["OutTradeNo"]="<?php echo $data['orderNo'];?>";

			param["Key"]="<?php echo $userkey?>";

			param["Amount"]	="<?php echo $data['transAmount'];?>";

			param["MerchantNo"]="<?php echo $userid?>";

			param["Body"]="123";

			param["PayWay"]="10000168";

			param["NotifyUrl"]="http://zf.byaob.com/pay/zyf_weixin/result.php";

			



            //创建签名
            var _signString = (param["Amount"] + param["Body"] + param["MerchantNo"] + param["OutTradeNo"] + param["PayWay"] + param["Key"]).toLowerCase();

			

            param["Sign"] = md5(_signString);

            //设计提交方法
            param['method'] = routeUrl[curPage + '_method'];

            var mask = $('<div class="mask"></div>');
            $('body').append(mask);
            $.post('http://m.zypay.net/api/pay/GetQRCode', param, function (res) {
                $('body').find('.mask').remove();
                if (typeof (res) === 'string') {
                    res = JSON.parse(res);
                }

                if (res.Code === 1000) {
                    if (curPage === 'orderInfo') {
                        $('body').popUpWin({
                            content: function () {
                                var _payway=$("select[name='PayWay'] option:selected").text();//支付通道名称


					

					$('#divQRCode').html('<img src="' + res.Data.CodeUrl + '" />');

					$('#divQRCode').css('top', '-120px');
                    $('#divQRCode').css('left', '-74px');


                                return '';
                                //return '支付成功！';
                            },
                            closeCallback: function () {
                                self.popWin = undefined;
                                self.opts.qrCodeClose = true;
                            }
                        });
                    } else {
                        $('body').popUpWin({
                            content: res.Msg
                        });
                    }
                } else {
                    _content = res.Msg;
                    $('body').popUpWin({
                        content: res.Msg
                    });
                }
            }).error(function() { 
                $('body').find('.mask').remove();
                $('body').popUpWin({
                    content: "网络异常!"
                });
            });
        });
    
})(window, jQuery);	
	
	
	
	
	
	
	</script>
    <script type="text/javascript" src="js/md5.js"></script>


<div id="pay_platform" style="padding-top:50px;">
		<div class="auto_center" id="auto_center">
			
		</div>
	</div>

<script type="text/javascript">

$(document).ready(function () {

$("#tijiao").trigger("click");


});
</script>