<?php
//禁用错误报告
error_reporting(0);
$trade_no=trim(htmlspecialchars($_REQUEST['out_trade_no']));//接收订单号
$cny=(float)trim(htmlspecialchars($_REQUEST['total_fee']));     //付款金额
$type=trim(htmlspecialchars($_REQUEST['pay']));   //支付方式
$type=1;

  if(stripos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') === false){
  $isweixin=0;
  }else{
  $isweixin=1;
  }

?>

<?php
if ($isweixin==1 and $type==3){
?>

<html class="no-js css-menubar" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>在线付款</title>
	<link rel="stylesheet" href="wapcss/bootstrap.css">
    <link rel="stylesheet" href="wapcss/bootstrap-extend.css">
    <link rel="stylesheet" href="wapcss/site.css">
	<script type="text/javascript" src="wapcss/jquery-2.1.1.min.js"></script>
	<script src="css/jquery.min.js"></script>
<script type="text/javascript">
var intDiff = parseInt(300);
function timer(intDiff){
    window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;    
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#day_show').html(day+"天");
    $('#hour_show').html('<s id="h"></s>'+hour+'时');
    $('#minute_show').html('<s></s>'+minute+'分');
    $('#second_show').html('<s></s>'+second+'秒');
     if(intDiff==0){
     //self.location=document.referrer;
	 self.location.href="/";
	 }
    intDiff--;
    }, 1000);
} 
$(function(){
    timer(intDiff);
});
</script>
</head>
  <body class="page-maintenance layout-full">
    <div class="page animsition text-center" style="-webkit-animation: 800ms; opacity: 1;">
      <div class="page-content vertical-align-middle">
          <!-- Qpay -->
          <div id="pjax" class="container">
            <div class="row paypage-logo">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 paypage-logorow">
                <img src="wapcss/zfb.png" alt="支付宝" width="94"></div>
            </div>
            <div class="row paypage-info">
              <div class="col-lg-6 col-lg-offset-2 col-md-7 col-md-offset-1 col-xs-10 col-xs-offset-0">
                <p class="paypage-desc">会员ID/订单号：<?php echo $trade_no;?></p>
              </div>
              <div class="col-lg-2 col-md-3 col-xs-2 clearfix">
                <p class="paypage-price">
                  <span class="paypage-price-number"><?php echo $cny;?></span>元</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 paypage-qrrow">
			  请点击右上角菜单，安卓选择在浏览器中打开，苹果选择在Safari中打开，或长按下面的网址复制后使用浏览器访问</br></br>
			  <div class="site-footer-right">
			  http://www.8shu.cc/ldpay/alipay.php?total_fee=<?php echo $cny; ?>&out_trade_no=<?php echo $trade_no; ?>&paytype=<?php echo $type; ?></div>
			  <input name="payAmount" id="payAmount" value="<?php echo $cny;?>" type="hidden">
				 <input name="title" id="title" value="<?php echo $trade_no;?>" type="hidden">
				 <input name="type" id="type" value="<?php echo $type;?>" type="hidden">

                <p id="paypage-order" class="">
                  <span data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-title="支付后将自动发货" class="tip_show" data-original-title="" title="">订单号:<?php echo $trade_no;?></span><br><strong id="minute_show"><s></s>04分</strong>
    <strong id="second_show"><s></s>44秒</strong>过期               </p>
			 <p class="animation-slide-bottom">
            <a class="btn btn-danger" href="#">付款成功会自动跳转</a>			</p>	
				  </div>
		</div>
	  </div>
    </div>  
	
<footer class="site-footer">
<div class="site-footer-legal"></div>
<div class="site-footer-right">
  <a target="_blank">支付宝</a></div>
</footer>
</div>
</body></html>

<?php
}else{
	echo '<form name="myform" action="/ldpay/alipay.php" method="post">';
	echo '<input name="total_fee" id="total_fee" value="'.$cny.'" type="hidden">';
	echo '<input name="out_trade_no" id="out_trade_no" value="'.$trade_no.'" type="hidden" />';
	echo '<input name="paytype" id="paytype" value="'.$type.'" type="hidden">';
	echo '<script type="text/javascript">document.myform.submit();</script>';
}
?>

<script type="text/javascript">
$(function(){
    var posTimmer;
	var $win = $(window);
	var $submit = $('#submit');
		setInterval(function(){
		  $.ajax({
			url:"zidongali.php",
			type: "post",
			timeout:2000,
			data: {tradeNo:$("#title").val(),payAmount:$("#payAmount").val(),paytype:$("#type").val()},
			success: function(d){
				if(d == "success" ){
					$submit.text('付款成功');
					setTimeout(function(){
						if ( 0 ) {
							location.replace("/");
						} else {
							if (window.opener) {
								location.replace("/");
							} else {
								location.replace("/");
							}
						}
					},2000);
				}
			}
		  });
		},2000);
		$('#msgPayForm').submit();
});
</script>
