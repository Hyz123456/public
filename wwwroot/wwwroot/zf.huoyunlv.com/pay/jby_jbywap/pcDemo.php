<?php
header("Content-Type: text/html; charset=UTF-8");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="聚宝吧,jubaobar.com，"/>
<meta name="description" content="聚宝吧是由杭州凡伟网络科技有限公司研发的一个中小企业收货款的支付平台，此平台乃中国首创，国内第一家实现收货款的贷款金融功能的服务产品，欢迎新用户注册聚宝吧，马上开始轻松解决企业现金流问题！"/>
<title> 聚宝云计费-让支付更简单</title>
<link href="http://mapi.jubaopay.com/resources/new/css/api_base.css" rel="stylesheet" type="text/css" />
<link href="http://mapi.jubaopay.com/resources/new/css/api_main.css" rel="stylesheet" type="text/css" />
<link href="http://mapi.jubaopay.com/resources/new/css/api_trading.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://mapi.jubaopay.com/libs/jquery.min.js"></script>
<script type="text/javascript" src="http://mapi.jubaopay.com/resources/new/js/j_validate.js"></script>
<link href="http://dev.jubaobar.com/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>

<body>
<script language="javascript" src="http://mapi.jubaopay.com/resources/new/js/api_pay.js"></script>
<script language="javascript" src="http://mapi.jubaopay.com/resources/new/js/api_dialog.js"></script>

<div id="header-container">
  <div class="header-content">
	  <!--<div class="logo-new fll"><a href="http://mapi.jubaopay.comjavascript:void(0);" title="聚宝云计费-让支付更简单" target="_blank"><h1>聚宝云计费-让支付更简单</h1></a></div>-->
    </div>
</div><div class="header-Line"></div>
<div id="all-main-container">
<div class="pay-nav">
    <div class="pay-info-wrap">
        <div class="pay-info f14 clearfix">
	        <div class="L" title="聚宝云计费DEMO页面">聚宝云计费DEMO页面</div>
        </div>
    </div>
</div>

<div class="main clearfix">
    <div class="api-back-res">
		<form method="post" action="pcDemoPost.php">
			<table>
				<tr>
					<td>金额:(单位元，精确到分)</td>
					<td><input type="text" name="amount" value="0.02"></td>
				</tr>
				<tr>
					<td>付款人ID:</td>
					<td><input type="text" name="payerName" value="zs001"> (上线后需要改为真正的客户ID)</td>
				</tr>
				<tr>
					<td>商品名称:</td>
					<td><input type="text" name="goodsName" value="商品名称"> (上线后需要改为真正的商品名称)</td>
				</tr>
				<tr>
					<td>备注:</td>
					<td><input type="text" name="remark" value="商品备注"> (上线后需要改为真正的商品备注)</td>
				</tr>
				<tr>
					<td>支付方式</td>
					<td>
						<select name="payMethod">
							<option value="ALL">全部支付方式</option>
							<option value="WANGYIN">网银支付</option>
							<option value="CARD">点卡/充值卡支付</option>
							<option value="SMSPAY">话费支付</option>
			                <option value="SZX">移动冲值卡</option>
			                <option value="UNICOM">联通冲值卡</option>
			                <option value="TELECOM">电信充值卡</option>
			                <option value="JUNNET">骏网一卡通</option>
			                <option value="SNDACARD">盛大卡</option>
			                <option value="QQCARD">Q币卡</option>
			                <option value="NETEASE">网易一卡通</option>
			                <option value="JIUYOU">久游一卡通</option>
			                <option value="TIANHONG">天宏一卡通</option>
			                <option value="TIANXIA">天下通一卡通</option>
			                <option value="ZONGYOU">纵游一卡通</option>
			                <option value="SOHU">搜狐卡</option>
			                <option value="WANMEI">完美卡</option>
			                <option value="ZHENGTU">征途卡</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspand="2">
						<input type="submit" value="提交订单" name="submit"></br>
					</td>
				</tr>
			</table>
		</form>
    </div>
</div>
</div>
<div class="footer-container">
  <div class="footer-content">杭州凡伟网络科技有限公司©2014 浙ICP备12040171号&nbsp;&nbsp;

</div>
</div>
</body>
</html>
