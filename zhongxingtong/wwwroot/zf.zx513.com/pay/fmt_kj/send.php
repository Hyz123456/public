<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="YES" />
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
     
        <p><input type="text" id="name" value="" placeholder="姓名"></p>
        <p><input type="text" id="sfz" value="" placeholder="身份证号码"></p>
		<p><input type="text" id="tel" value="" placeholder="手机号码"></p>
		<p><input type="text" id="yhk" value="" placeholder="银行卡号"></p>
       
        <p class="submit"><button id="tijiao" />确定</button></p>
     
    </div>

   
  </section>




 <script type="text/javascript">
    $(document).ready(function() {
	
		$("#tijiao").click(function(){
		  $.post("ajax.php",
		  {
			name:$("#name").val(),
			sfz:$("#sfz").val(),
			tel:$("#tel").val(),
			yhk:$("#yhk").val(),
		  },
		  function(data,status){

				alert("Data: " + data + "\nStatus: " + status);

		  });
		});
	
	
	});
</script>
</body>
</html>