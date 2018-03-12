<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="YES" />

<!-- 启用360浏览器的极速模式(webkit) -->
<meta name="renderer" content="webkit">
<!-- 避免IE使用兼容模式 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
<meta name="HandheldFriendly" content="true">
<!-- 微软的老式浏览器 -->
<meta name="MobileOptimized" content="320">
<!-- uc强制竖屏 -->
<meta name="screen-orientation" content="portrait">
<!-- QQ强制竖屏 -->
<meta name="x5-orientation" content="portrait">
<!-- UC强制全屏 -->
<meta name="full-screen" content="yes">
<!-- QQ强制全屏 -->
<meta name="x5-fullscreen" content="true">
<!-- UC应用模式 -->
<meta name="browsermode" content="application">
<!-- QQ应用模式 -->
<meta name="x5-page-mode" content="app">
<!--这meta的作用就是删除默认的苹果工具栏和菜单栏-->
<meta name="apple-mobile-web-app-capable" content="yes">
<!--网站开启对web app程序的支持-->
<meta name="apple-touch-fullscreen" content="yes">
<!--在web app应用下状态条（屏幕顶部条）的颜色-->
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- windows phone 点击无高光 -->
<meta name="msapplication-tap-highlight" content="no">
<!--移动web页面是否自动探测电话号码-->
<meta http-equiv="x-rim-auto-match" content="none">
<!--移动端版本兼容 start -->
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" name="viewport" />
<!--移动端版本兼容 end -->

    <script type="text/javascript">
    var w =  screen.width;
    var rate = "0.55";
    switch(w){
                case 320:
                case 640:
                    rate = "0.5";
                    break;
                case 365:
                case 720:
                case 375:
                case 750:
                    rate = "0.585";
                    break;
                case 414:
                case 1242:
                case 1080:
                    rate = "0.64";
                    break;
                default:
                    rate = "0.55";
                    break;
    }
    document.write("<meta name='viewport' content='width=device-width,initial-scale="+rate+", minimum-scale=0.2, maximum-scale=1, user-scalable=no'>");
    </script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>快捷支付</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js"></script>

<?php

include "inc.php";


?>
<body>







  <section class="container">
    <div class="login">
      <h1>快捷支付</h1>
     <form action='phpDemes.php' method='get' id="loginForm">
        <p><input type="text" id="name" name='name' value="" placeholder="姓名"></p>
        <p><input type="text" id="sfz" name='sfz' value="" placeholder="身份证号码"></p>
		<p><input type="text" id="tel" name='tel' value="" placeholder="手机号码"></p>
		<p><input type="text" id="yhk" name='yhk' value="" placeholder="银行卡号"></p>
		<p><input type="hidden" id="orderid" name='orderid' value="<?php echo $_GET['orderid'];?>" placeholder="订单号"></p>
		<p><input type="hidden" id="price" name='price' value="<?php echo $_GET['price'];?>" placeholder="金额"></p>
       
        <p class="submit"><input id="tijiao" onClick="getCode(this)" type='submit' / value='确定'></p>
     
    </div>

   
  </section>


<script src="/layui/layui.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
	
		$("#tijiao1").click(function(){
		  $.get("phpDemes.php",
		  {
			name:$("#name").val(),
			sfz:$("#sfz").val(),
			tel:$("#tel").val(),
			yhk:$("#yhk").val(),
			orderid:$("#orderid").val(),
			price:$("#price").val(),
		  },
		  function(data,status){

				//alert("Data: " + data + "\nStatus: " + status);

		  });
		});
	
	
	});
	

    var loginForm = document.getElementById('loginForm');
    var go = document.getElementById('tijiao');
    go.onclick = function(){
        var tel = loginForm.tel.value
		var username = loginForm.name.value
		var sfz = loginForm.sfz.value
		var yhk = loginForm.yhk.value
		if(yhk!=''){
			var yhks = /^([1-9]{1})(\d{14}|\d{18})$/;
			if(!yhks.test(yhk)){
				alert('填写有效的银行卡号');
				return false;
			}
		}else{
			alert('请填写银行卡号');
			return false;
		}
		if(sfz!=''){
			var sfzs = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
			if(!sfzs.test(sfz)){
				alert('请填写有效身份证号码');
				return false;
			}
		}else{
			alert('请填写身份证号码');
			return false;
		}
		if(username!=''){
			     var name =/^([\u4e00-\u9fa5]){2,7}$/;
				 if(!name.test(username)){
					 alert('请输入有效的姓名');
					 return false;
				 }
		}else{
			alert('请填写姓名');
			return false;
		}
        //这里判断了用户名的输入不能为空，且长度为6-16位
        //var tel=$(" #tel ").val();
	 if(tel!=''){
		  var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
            if(!myreg.test(tel)) 
          { 
             alert('请输入有效的手机号码！'); 
             return false; 
          } 
	 }else{
		 alert('请填写手机号码');
		 return false; 
	 }
	loginForm.submit();
    }

</script>
</body>
</html>