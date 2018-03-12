<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>商户管理 - 中付宝</title>
<meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  
  <link rel="stylesheet" href="/layui/css/layui.css">
  <link rel="stylesheet" href="/public/css/global.css" media="all">
  <link rel="stylesheet" href="/public/css/index.css" media="all">


</head>
<body>
<div class="layui-layout layui-layout-admin">
  <div class="layui-header header header-demo">
  <div class="layui-main">
    <a class="logo1" style="color:#fff;left:0;" href="/">
      <img style="margin-top:5px" src="/static/assets/img/logo.png" width="105" alt="">
    </a>
   
    <ul class="layui-nav" pc>
      <li class="layui-nav-item">
        <a href="/">主页<span class="layui-badge-dot"></span></a>
      </li>
      <li class="layui-nav-item">
        <a href="/login/logout/">退出</a>
      </li> 
      
     
     
    
    </ul>
  </div>
</div>
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      
<ul class="layui-nav layui-nav-tree site-demo-nav">
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">账户资料</a>
    <dl class="layui-nav-child">

	
      <dd class="<?php echo $title=="基本资料" ? "layui-this" : "";?>">
        <a href="/member/userinfo">基本资料</a>
      </dd>
	  <dd class="<?php echo $title=="修改密码" ? "layui-this" : "";?>">
        <a href="/member/userpwd">修改密码</a>
      </dd>
	   <dd class="<?php echo $title=="登录日志" ? "layui-this" : "";?>">
        <a href="/member/userlogs">登录日志</a>
      </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">交易管理</a>
    <dl class="layui-nav-child">
      <dd class="<?php echo $title=="交易订单" ? "layui-this" : "";?>">
        <a href="/member/orders">订单管理</a>
      </dd>
      <dd class="<?php echo $title=="收入统计" ? "layui-this" : "";?>">
        <a href="/member/count">收益统计</a>
      </dd>
      <dd class="<?php echo $title=="通道分析" ? "layui-this" : "";?>">
        <a href="/member/ordersca">通道分析</a>
      </dd>
	  
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">资金管理</a>
    <dl class="layui-nav-child">

		  <dd class="<?php echo $title=="申请提现" ? "layui-this" : "";?>">
			<a href="/member/takecash">申请提现</a>
		  </dd> 
		  <dd class="<?php echo $title=="结算记录" ? "layui-this" : "";?>">
			<a href="/member/payments">结算管理</a>
		  </dd>
		   <dd class="<?php echo $title=='银行卡添加' ? "layui-this" : "";?>">
		    <a href="/member/bankcard">银行卡添加</a>
		  </dd>	
          <dd class="<?php echo $title=='余额代付' ? "layui-this" : "";?>">
		    <a href="/member/balance">余额代付</a>
		  </dd>	
		  </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">API管理</a>
    <dl class="layui-nav-child">
 
   		 
		  <dd class="<?php echo $title=="API" ? "layui-this" : "";?>">
			<a href="/member/api">API接口</a>
		  </dd>	
		  <dd class="<?php echo $title=="我的费率" ? "layui-this" : "";?>">
			<a href="/member/rates">通道管理</a>
		  </dd>	

    </dl>
  </li>
  
  <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
</ul>

    </div>
  </div>

<style>
input:disabled{

	background-color: #eee;
    opacity: 1;
	border: 1px solid #ccc;
</style>