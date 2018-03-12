<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/cache/bank.php");
?>



<!DOCTYPE html>
<html class="zh-cn">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8" />
  <title>澳门永利娱乐城</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link href="/css/huikuan1/application.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div id="App">
   <div class="main-wrap zh-cn" data-reactid=".0">

    <header data-reactid=".0.0">
	<!-- <img class="logo" src="/css/huikuan1/rose_ver1.png" data-reactid=".0.0.0" /> -->
	 <embed  class="logo" src="logo.swf" autoplay="true" flashvars="prizeResult=3" allowscriptaccess="always" wmode="transparent" menu="false" quality="high" style=" width: 262px;" type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/" name="FlashZhuan" data-reactid=".0.0.0" >
    

     <a title="公司入款流程解说" class="header-deposit-sop" data-reactid=".0.0.1"></a >
    </header>

    <div class="body-wrap step_1" data-reactid=".0.1">
     <span class="body-note" data-reactid=".0.1.0">公司银行帐号随时更换！请每次存款都至 [公司入款] 进行操作。入款至已过期帐号，公司无法查收，恕不负责！</span>
     <div class="body-process clearfix" data-reactid=".0.1.1">
      <div class="process-txt" data-reactid=".0.1.1.0">
       <h2 class="process-title" data-reactid=".0.1.1.0.0"><span id='a1' data-reactid=".0.1.1.0.0.0">Step1.</span><span id='a2' data-reactid=".0.1.1.0.0.1">请选择您所使用的银行</span></h2>
       <p id='a3' class="container-explain" data-reactid=".0.1.1.0.1">提醒您 同银行转帐才能立即到帐喔！</p>
      </div>
      <ul class="map-wrap" data-reactid=".0.1.1.1">
       <li class="map-step map-cur-step" data-reactid=".0.1.1.1.$1"><span class="map-line `map-line-${ele.id}`" data-reactid=".0.1.1.1.$1.0"></span><span class="map-circle `map-circle-${ele.id}`" data-reactid=".0.1.1.1.$1.1"></span>
        <div class="cur-circle `cur-circle-${ele.id}`" data-reactid=".0.1.1.1.$1.2"></div></li>
       <li class="map-step" data-reactid=".0.1.1.1.$2"><span class="map-line `map-line-${ele.id}`" data-reactid=".0.1.1.1.$2.0"></span><span class="map-circle `map-circle-${ele.id}`" data-reactid=".0.1.1.1.$2.1"></span>
        <div class="cur-circle `cur-circle-${ele.id}`" data-reactid=".0.1.1.1.$2.2"></div></li>
       <li class="map-step" data-reactid=".0.1.1.1.$3"><span class="map-line `map-line-${ele.id}`" data-reactid=".0.1.1.1.$3.0"></span><span class="map-circle `map-circle-${ele.id}`" data-reactid=".0.1.1.1.$3.1"></span>
        <div class="cur-circle `cur-circle-${ele.id}`" data-reactid=".0.1.1.1.$3.2"></div></li>
       <!--li class="map-step" data-reactid=".0.1.1.1.$4"><span class="map-line `map-line-${ele.id}`" data-reactid=".0.1.1.1.$4.0"></span><span class="map-circle `map-circle-${ele.id}`" data-reactid=".0.1.1.1.$4.1"></span>
        <div class="cur-circle `cur-circle-${ele.id}`" data-reactid=".0.1.1.1.$4.2"></div></li-->
      </ul>
     </div>


     <div class="container-bank" data-reactid=".0.1.2">
      <ul class="body-bank-choose clearfix" data-reactid=".0.1.2.0">
	  <li data-reactid=".0.1.2.0.$281">
        <div class="bank-circle" data-reactid=".0.1.2.0.$281.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$281.0.0"><img src="/css/huikuan1/281.png" data-reactid=".0.1.2.0.$281.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$281.1">支付宝</span></li>
       <li data-reactid=".0.1.2.0.$296">
        <div class="bank-circle" data-reactid=".0.1.2.0.$296.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$296.0.0"><img src="/css/huikuan1/296.png" data-reactid=".0.1.2.0.$296.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$296.1">微信支付</span></li>
       <li data-reactid=".0.1.2.0.$297">
        <div class="bank-circle" data-reactid=".0.1.2.0.$297.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$297.0.0"><img src="/css/huikuan1/297.png" data-reactid=".0.1.2.0.$297.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$297.1">财付通</span></li>
       <li data-reactid=".0.1.2.0.$1">
        <div class="bank-circle" data-reactid=".0.1.2.0.$1.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$1.0.0"><img src="/css/huikuan1/1.png" data-reactid=".0.1.2.0.$1.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$1.1">工商银行</span></li>
       <li data-reactid=".0.1.2.0.$2">
        <div class="bank-circle" data-reactid=".0.1.2.0.$2.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$2.0.0"><img src="/css/huikuan1/2.png" data-reactid=".0.1.2.0.$2.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$2.1">交通银行</span></li>
       <li data-reactid=".0.1.2.0.$3">
        <div class="bank-circle" data-reactid=".0.1.2.0.$3.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$3.0.0"><img src="/css/huikuan1/3.png" data-reactid=".0.1.2.0.$3.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$3.1">农业银行</span></li>
       <li data-reactid=".0.1.2.0.$4">
        <div class="bank-circle" data-reactid=".0.1.2.0.$4.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$4.0.0"><img src="/css/huikuan1/4.png" data-reactid=".0.1.2.0.$4.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$4.1">建设银行</span></li>
       <li data-reactid=".0.1.2.0.$5">
        <div class="bank-circle" data-reactid=".0.1.2.0.$5.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$5.0.0"><img src="/css/huikuan1/5.png" data-reactid=".0.1.2.0.$5.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$5.1">招商银行</span></li>
       <li data-reactid=".0.1.2.0.$6">
        <div class="bank-circle" data-reactid=".0.1.2.0.$6.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$6.0.0"><img src="/css/huikuan1/6.png" data-reactid=".0.1.2.0.$6.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$6.1">民生银行总行</span></li>
       <li data-reactid=".0.1.2.0.$8">
        <div class="bank-circle" data-reactid=".0.1.2.0.$8.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$8.0.0"><img src="/css/huikuan1/8.png" data-reactid=".0.1.2.0.$8.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$8.1">上海浦东发展银行</span></li>
       <li data-reactid=".0.1.2.0.$9">
        <div class="bank-circle" data-reactid=".0.1.2.0.$9.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$9.0.0"><img src="/css/huikuan1/9.png" data-reactid=".0.1.2.0.$9.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$9.1">北京银行</span></li>
       <li data-reactid=".0.1.2.0.$10">
        <div class="bank-circle" data-reactid=".0.1.2.0.$10.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$10.0.0"><img src="/css/huikuan1/10.png" data-reactid=".0.1.2.0.$10.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$10.1">兴业银行</span></li>
       <li data-reactid=".0.1.2.0.$11">
        <div class="bank-circle" data-reactid=".0.1.2.0.$11.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$11.0.0"><img src="/css/huikuan1/11.png" data-reactid=".0.1.2.0.$11.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$11.1">中信银行</span></li>
       <li data-reactid=".0.1.2.0.$12">
        <div class="bank-circle" data-reactid=".0.1.2.0.$12.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$12.0.0"><img src="/css/huikuan1/12.png" data-reactid=".0.1.2.0.$12.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$12.1">光大银行</span></li>
       <li data-reactid=".0.1.2.0.$13">
        <div class="bank-circle" data-reactid=".0.1.2.0.$13.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$13.0.0"><img src="/css/huikuan1/13.png" data-reactid=".0.1.2.0.$13.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$13.1">华夏银行</span></li>
       <li data-reactid=".0.1.2.0.$14">
        <div class="bank-circle" data-reactid=".0.1.2.0.$14.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$14.0.0"><img src="/css/huikuan1/14.png" data-reactid=".0.1.2.0.$14.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$14.1">广东发展银行</span></li>
       <li data-reactid=".0.1.2.0.$15">
        <div class="bank-circle" data-reactid=".0.1.2.0.$15.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$15.0.0"><img src="/css/huikuan1/15.png" data-reactid=".0.1.2.0.$15.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$15.1">深圳平安银行</span></li>
       <li data-reactid=".0.1.2.0.$16">
        <div class="bank-circle" data-reactid=".0.1.2.0.$16.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$16.0.0"><img src="/css/huikuan1/16.png" data-reactid=".0.1.2.0.$16.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$16.1">中国邮政</span></li>
       <li data-reactid=".0.1.2.0.$17">
        <div class="bank-circle" data-reactid=".0.1.2.0.$17.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$17.0.0"><img src="/css/huikuan1/17.png" data-reactid=".0.1.2.0.$17.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$17.1">中国银行</span></li>
       <li data-reactid=".0.1.2.0.$19">
        <div class="bank-circle" data-reactid=".0.1.2.0.$19.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$19.0.0"><img src="/css/huikuan1/19.png" data-reactid=".0.1.2.0.$19.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$19.1">上海银行</span></li>
       <li data-reactid=".0.1.2.0.$217">
        <div class="bank-circle" data-reactid=".0.1.2.0.$217.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$217.0.0"><img src="/css/huikuan1/217.png" data-reactid=".0.1.2.0.$217.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$217.1">渤海银行</span></li>
       <li data-reactid=".0.1.2.0.$218">
        <div class="bank-circle" data-reactid=".0.1.2.0.$218.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$218.0.0"><img src="/css/huikuan1/218.png" data-reactid=".0.1.2.0.$218.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$218.1">东莞银行</span></li>
       <li data-reactid=".0.1.2.0.$219">
        <div class="bank-circle" data-reactid=".0.1.2.0.$219.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$219.0.0"><img src="/css/huikuan1/219.png" data-reactid=".0.1.2.0.$219.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$219.1">广州银行</span></li>
       <li data-reactid=".0.1.2.0.$220">
        <div class="bank-circle" data-reactid=".0.1.2.0.$220.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$220.0.0"><img src="/css/huikuan1/220.png" data-reactid=".0.1.2.0.$220.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$220.1">杭州银行</span></li>
       <li data-reactid=".0.1.2.0.$221">
        <div class="bank-circle" data-reactid=".0.1.2.0.$221.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$221.0.0"><img src="/css/huikuan1/221.png" data-reactid=".0.1.2.0.$221.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$221.1">浙商银行</span></li>
       <li data-reactid=".0.1.2.0.$222">
        <div class="bank-circle" data-reactid=".0.1.2.0.$222.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$222.0.0"><img src="/css/huikuan1/222.png" data-reactid=".0.1.2.0.$222.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$222.1">宁波银行</span></li>
       <li data-reactid=".0.1.2.0.$223">
        <div class="bank-circle" data-reactid=".0.1.2.0.$223.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$223.0.0"><img src="/css/huikuan1/223.png" data-reactid=".0.1.2.0.$223.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$223.1">东亚银行</span></li>
       <li data-reactid=".0.1.2.0.$224">
        <div class="bank-circle" data-reactid=".0.1.2.0.$224.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$224.0.0"><img src="/css/huikuan1/224.png" data-reactid=".0.1.2.0.$224.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$224.1">温州银行</span></li>
       <li data-reactid=".0.1.2.0.$225">
        <div class="bank-circle" data-reactid=".0.1.2.0.$225.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$225.0.0"><img src="/css/huikuan1/225.png" data-reactid=".0.1.2.0.$225.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$225.1">晋商银行</span></li>
       <li data-reactid=".0.1.2.0.$226">
        <div class="bank-circle" data-reactid=".0.1.2.0.$226.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$226.0.0"><img src="/css/huikuan1/226.png" data-reactid=".0.1.2.0.$226.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$226.1">南京银行</span></li>
       <li data-reactid=".0.1.2.0.$227">
        <div class="bank-circle" data-reactid=".0.1.2.0.$227.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$227.0.0"><img src="/css/huikuan1/227.png" data-reactid=".0.1.2.0.$227.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$227.1">广州农商银行</span></li>
       <li data-reactid=".0.1.2.0.$228">
        <div class="bank-circle" data-reactid=".0.1.2.0.$228.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$228.0.0"><img src="/css/huikuan1/228.png" data-reactid=".0.1.2.0.$228.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$228.1">上海市农村商业银行</span></li>
       <li data-reactid=".0.1.2.0.$229">
        <div class="bank-circle" data-reactid=".0.1.2.0.$229.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$229.0.0"><img src="/css/huikuan1/229.png" data-reactid=".0.1.2.0.$229.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$229.1">汉口银行</span></li>
       <li data-reactid=".0.1.2.0.$230">
        <div class="bank-circle" data-reactid=".0.1.2.0.$230.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$230.0.0"><img src="/css/huikuan1/230.png" data-reactid=".0.1.2.0.$230.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$230.1">珠海市农村信用合作联</span></li>
       <li data-reactid=".0.1.2.0.$231">
        <div class="bank-circle" data-reactid=".0.1.2.0.$231.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$231.0.0"><img src="/css/huikuan1/231.png" data-reactid=".0.1.2.0.$231.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$231.1">顺德农信社</span></li>
       <li data-reactid=".0.1.2.0.$233">
        <div class="bank-circle" data-reactid=".0.1.2.0.$233.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$233.0.0"><img src="/css/huikuan1/233.png" data-reactid=".0.1.2.0.$233.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$233.1">浙江稠州商业银行</span></li>
       <li data-reactid=".0.1.2.0.$234">
        <div class="bank-circle" data-reactid=".0.1.2.0.$234.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$234.0.0"><img src="/css/huikuan1/234.png" data-reactid=".0.1.2.0.$234.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$234.1">北京农商行</span></li>
       <li data-reactid=".0.1.2.0.$276">
        <div class="bank-circle" data-reactid=".0.1.2.0.$276.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$276.0.0"><img src="/css/huikuan1/276.png" data-reactid=".0.1.2.0.$276.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$276.1">东莞农村商业银行</span></li>
       <li data-reactid=".0.1.2.0.$277">
        <div class="bank-circle" data-reactid=".0.1.2.0.$277.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$277.0.0"><img src="/css/huikuan1/277.png" data-reactid=".0.1.2.0.$277.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$277.1">甘肃银行</span></li>
       <li data-reactid=".0.1.2.0.$280">
        <div class="bank-circle" data-reactid=".0.1.2.0.$280.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$280.0.0"><img src="/css/huikuan1/280.png" data-reactid=".0.1.2.0.$280.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$280.1">自贡市商业银行</span></li>
       
       <li data-reactid=".0.1.2.0.$302">
        <div class="bank-circle" data-reactid=".0.1.2.0.$302.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$302.0.0"><img src="/css/huikuan1/302.png" data-reactid=".0.1.2.0.$302.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$302.1">贵阳银行</span></li>
       <li data-reactid=".0.1.2.0.$303">
        <div class="bank-circle" data-reactid=".0.1.2.0.$303.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$303.0.0"><img src="/css/huikuan1/303.png" data-reactid=".0.1.2.0.$303.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$303.1">龙江银行</span></li>
       <li data-reactid=".0.1.2.0.$304">
        <div class="bank-circle" data-reactid=".0.1.2.0.$304.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$304.0.0"><img src="/css/huikuan1/304.png" data-reactid=".0.1.2.0.$304.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$304.1">泉州银行</span></li>
       <li data-reactid=".0.1.2.0.$305">
        <div class="bank-circle" data-reactid=".0.1.2.0.$305.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$305.0.0"><img src="/css/huikuan1/305.png" data-reactid=".0.1.2.0.$305.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$305.1">桂林银行</span></li>
       <li data-reactid=".0.1.2.0.$306">
        <div class="bank-circle" data-reactid=".0.1.2.0.$306.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$306.0.0"><img src="/css/huikuan1/306.png" data-reactid=".0.1.2.0.$306.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$306.1">锦州银行</span></li>
       <li data-reactid=".0.1.2.0.$307">
        <div class="bank-circle" data-reactid=".0.1.2.0.$307.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$307.0.0"><img src="/css/huikuan1/307.png" data-reactid=".0.1.2.0.$307.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$307.1">大连银行</span></li>
       <li data-reactid=".0.1.2.0.$308">
        <div class="bank-circle" data-reactid=".0.1.2.0.$308.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$308.0.0"><img src="/css/huikuan1/308.png" data-reactid=".0.1.2.0.$308.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$308.1">徽商银行</span></li>
       <li data-reactid=".0.1.2.0.$309">
        <div class="bank-circle" data-reactid=".0.1.2.0.$309.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$309.0.0"><img src="/css/huikuan1/309.png" data-reactid=".0.1.2.0.$309.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$309.1">江苏银行</span></li>
       <li data-reactid=".0.1.2.0.$310">
        <div class="bank-circle" data-reactid=".0.1.2.0.$310.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$310.0.0"><img src="/css/huikuan1/310.png" data-reactid=".0.1.2.0.$310.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$310.1">内蒙古银行</span></li>
       <li data-reactid=".0.1.2.0.$311">
        <div class="bank-circle" data-reactid=".0.1.2.0.$311.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$311.0.0"><img src="/css/huikuan1/311.png" data-reactid=".0.1.2.0.$311.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$311.1">恒丰银行</span></li>
       <li data-reactid=".0.1.2.0.$312">
        <div class="bank-circle" data-reactid=".0.1.2.0.$312.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$312.0.0"><img src="/css/huikuan1/312.png" data-reactid=".0.1.2.0.$312.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$312.1">成都银行</span></li>
      <!--  <li data-reactid=".0.1.2.0.">
        <div class="bank-circle" data-reactid=".0.1.2.0..0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0..0.0"><img src="/css/huikuan1/default.png" data-reactid=".0.1.2.0..0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0..1">微信支付__帳號</span></li>
       <li data-reactid=".0.1.2.0.">
        <div class="bank-circle" data-reactid=".0.1.2.0..0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0..0.0"><img src="/css/huikuan1/314.png" data-reactid=".0.1.2.0..0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0..1">支付宝__二維</span></li> -->
       <li data-reactid=".0.1.2.0.$315">
        <div class="bank-circle" data-reactid=".0.1.2.0.$315.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$315.0.0"><img src="/css/huikuan1/315.png" data-reactid=".0.1.2.0.$315.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$315.1">河北銀行</span></li>
       <li data-reactid=".0.1.2.0.$316">
        <div class="bank-circle" data-reactid=".0.1.2.0.$316.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$316.0.0"><img src="/css/huikuan1/316.png" data-reactid=".0.1.2.0.$316.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$316.1">柳州银行</span></li>
       <li data-reactid=".0.1.2.0.$317">
        <div class="bank-circle" data-reactid=".0.1.2.0.$317.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$317.0.0"><img src="/css/huikuan1/317.png" data-reactid=".0.1.2.0.$317.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$317.1">九江銀行</span></li>
       <li data-reactid=".0.1.2.0.$318">
        <div class="bank-circle" data-reactid=".0.1.2.0.$318.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$318.0.0"><img src="/css/huikuan1/318.png" data-reactid=".0.1.2.0.$318.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$318.1">广西农村信用社</span></li>
       <li data-reactid=".0.1.2.0.$319">
        <div class="bank-circle" data-reactid=".0.1.2.0.$319.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$319.0.0"><img src="/css/huikuan1/319.png" data-reactid=".0.1.2.0.$319.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$319.1">安徽农村信用社</span></li>
       <li data-reactid=".0.1.2.0.$320">
        <div class="bank-circle" data-reactid=".0.1.2.0.$320.0">
         <span class="imageloader loaded" data-reactid=".0.1.2.0.$320.0.0"><img src="/css/huikuan1/320.png" data-reactid=".0.1.2.0.$320.0.0.0" /></span>
        </div><span class="bank-choose-title" data-reactid=".0.1.2.0.$320.1">中原银行</span></li>
      </ul>
      <br data-reactid=".0.1.2.1" />
     </div>

    <div class="mycount" style="display: none;">  <!--   progress2    选账户///////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\-->
    <?php 
    $sql = "select * from sys_huikuan_list";
    $query  = $mysqli->query($sql);
    while($row = $query->fetch_array()){
        $rows[] = $row;
    }
    foreach($rows as $k=>$arr){
        ?>
        <div class="remit-info" data-reactid=".0.1.2.$remit_list_38237"><div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.0"><span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.0.0">银行</span><span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.0.1"><span class="table-td-bankname" data-reactid=".0.1.2.$remit_list_38237.0.1.0"><?=$arr['bank_name']?></span></span></div><div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.1"><span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.1.0">收款人</span><span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.1.1"><?=$arr['bank_xm']?></span></div><div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.2:$remit_branch_38237"><span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.2:$remit_branch_38237.0">开户行网点</span><span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.2:$remit_branch_38237.1"><?=$arr['bank_city']?></span></div><div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237"><span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237.0">帐号</span><span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237.1"><?=$arr['bank_number']?></span></div>

        <div class="deposit-checkbox" data-reactid=".0.1.2.$remit_list_38237.3">
        <input type="radio" name="" data-reactid="" />
        <label class='label'></label>
        </div>
        </div>

    <?php 
    }
    ?>
     <div class="remit-info" data-reactid=".0.1.2.$remit_list_38237"><div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.0">
		<span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.0.0">银行</span>
			<span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.0.1">
				<span class="table-td-bankname" data-reactid=".0.1.2.$remit_list_38237.0.1.0">微信二维码支付</span>
			</span>
		</div>
	 <div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.1">
		<span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.1.0">收款人</span>
			<span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.1.1">永利娱乐城</span>
	</div>
     <div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237">
	 <span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237.0">QR CODE</span>
	 <span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237.1">
	 <img src="alipic1.png" style='width: 180px; height: 180px; margin: 0 auto;'></span>
	</div>
     <div class="deposit-checkbox" data-reactid=".0.1.2.$remit_list_38237.3">
        <input type="checkbox" name="" data-reactid="" />
        <label class='label'></label>
        </div>
        </div>

<div class="remit-info" data-reactid=".0.1.2.$remit_list_38237"><div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.0">
		<span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.0.0">银行</span>
			<span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.0.1">
				<span class="table-td-bankname" data-reactid=".0.1.2.$remit_list_38237.0.1.0">支付宝二维码支付</span>
			</span>
		</div>
	 <div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.1">
		<span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.1.0">收款人</span>
			<span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.1.1">永利娱乐城</span>
	</div>
     <div class="table-tr" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237">
	 <span class="table-td-title" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237.0">QR CODE</span>
	 <span class="table-td-value" data-reactid=".0.1.2.$remit_list_38237.2:$remit_account_38237.1">
	 <img src="alipic1.png" style='width: 180px; height: 180px; margin: 0 auto;'></span>
	</div>
     <div class="deposit-checkbox" data-reactid=".0.1.2.$remit_list_38237.3">
        <input type="checkbox" name="" data-reactid="" />
        <label class='label'></label>
        </div>
        </div>


    <div style="clear:both"><br></div>
    <div class="container-remit-warn" ><p ><span >※ </span><span >提醒您</span><span >：</span></p><ul ><li >单笔最低存款金额 10 元以上。</li><li >单笔最高存款金额 10000000 元以下。</li><li >以上银行帐号限本次存款用，帐号不定期更换!每次存款前请依照本页所显示的银行帐号入款。如入款至已过期帐号，永利国际无法查收，恕不负责!</li></ul><br ><noscript ></noscript></div>
    </div>


<div class="check" style="display: none;"><!--  prrogress 3  汇款信息//////////////////////////\\\\\\\\\\\\\\\\\\\\\\\-->
<div class="body-bank-step-1" data-reactid=".0.1.2"><span style="display:block; margin-bottom:10px;" data-reactid=".0.1.2.0.1">以下是您欲转帐的银行帐户</span>
</div>
<div style="clear:both"><br></div>
<div class="body-bank-step-2">
<div class="bank-step-title" data-reactid=".0.1.3.0"><span class="num" data-reactid=".0.1.3.0.0">2</span><span data-reactid=".0.1.3.0.1">请填写您的转帐资料</span></div>
<form id="form1" name="form1" action="huikuanDao.php?into=true" method="post">
<div class="account-info"><div class="account-info-wrap"><label for="mycount">用户帐号:</label><input id='mycount' type="text"  maxlength="20" value="<?=$_SESSION['username'];?>" ></div><span class="error-msg" ></span></div>
<div class="account-info" ><div class="account-info-wrap"><label for="mytime">存入时间</label><input id="mytime" type="text" name="cn_date" maxlength="20" ></div><span class="error-msg" ></span></div>
<div class="account-info" data-reactid=".0.1.3.2.$amount"><div class="account-info-wrap"><label for="field_amount" data-reactid=".0.1.3.2.$amount.0.0">存入金额</label><input type="text" id="field_amount" name="v_amount" maxlength="20" ></div><span class="error-msg" ></span></div>
<div class="account-info" ><div class="account-info-wrap"><label for='myname'>存款人姓名</label><input id='myname' type="text" name="v_Name" maxlength="20" ></div><span class="error-msg" ></span></div>
<div class="account-info" style="display:none;"><div class="account-info-wrap"><label for="">汇款银行</label><input type="text" name="IntoBank" id="bankselect" maxlength="20" ></div><span class="error-msg" ></span></div>

<div style="clear:both"><br></div>
  <div class="body-bank-step-3" >
   <div class="bank-step-title" >
    <span class="num" >3</span>
    <span >请选择存款方式完成转帐</span>
   </div>
   <div class="bank-step-depositinfo clearfix" >
    <div class="deposit-info clearfix" >
     <div class="deposit-checkbox" >
      <input id="deposit-1" type="radio" name="InType" value="网银转帐" checked=""  />
      <label for="deposit-1" ></label>
     </div>
     <div class="deposit-txt" >
      <div class="deposit-name" >
       网银转帐
      </div>
      <div class="deposit-container" >
       登入您的网路银行完成转帐。
      </div>
      <div class="deposit-link" >
       <span >&gt;&gt; </span>
       <span >前往网银登入页面</span>
       <span >&nbsp;</span>
       <a href="http://www.hxb.com.cn/" target="_blank" ></a>
      </div>
     </div>
    </div>
    <div class="deposit-info clearfix" >
     <div class="deposit-checkbox" >
      <input id="deposit-2" type="radio" name="InType" value="ATM"  />
      <label for="deposit-2" ></label>
     </div>
     <div class="deposit-txt" >
      <div class="deposit-name" >
       ATM自动柜员机
      </div>
      <div class="deposit-container" >
       到您最近的ATM将款项转到上述银行帐号。
      </div>
      <span ></span>
     </div>
    </div>
    <div class="deposit-info clearfix" >
     <div class="deposit-checkbox" >
      <input id="deposit-3" type="radio" name="InType" value="ATM现金"  />
      <label for="deposit-3" ></label>
     </div>
     <div class="deposit-txt" >
      <div class="deposit-name" >
       ATM现金入款
      </div>
      <div class="deposit-container" >
       到上述银行ATM以现金存入银行帐号
      </div>
      <span ></span>
     </div>
    </div>
    <div class="deposit-info clearfix" >
     <div class="deposit-checkbox" >
      <input id="deposit-4" type="radio" name="InType" value="银行柜台"  />
      <label for="deposit-4" ></label>
     </div>
     <div class="deposit-txt" >
      <div class="deposit-name" >
       银行柜台转帐
      </div>
      <div class="deposit-container" >
       到您最近的银行将款项转到上述银行帐号。
      </div>
      <span ></span>
     </div>
    </div>
    <div class="deposit-info clearfix" >
     <div class="deposit-checkbox" >
      <input id="deposit-8" type="radio" name="InType" value="手机银行"  />
      <label for="deposit-8" ></label>
     </div>
     <div class="deposit-txt" >
      <div class="deposit-name" >
       手机银行转帐
      </div>
      <div class="deposit-container" >
       通过您的手机验证将款项转到上述的银行帐号。
      </div>
      <span ></span>
     </div>
    </div>
    <div class="deposit-info clearfix" >
     <div class="deposit-checkbox" >
      <input id="deposit-9" type="radio" name="InType" value="支付宝"  />
      <label for="deposit-9" ></label>
     </div>
     <div class="deposit-txt" >
      <div class="deposit-name" >
       支付宝支付
      </div>
      <div class="deposit-container" ></div>
      <span ></span>
     </div>
    </div>
   </div>
   <noscript data-reactid=".0.1.4.2"></noscript>
  </div>
</form>
</div>
</div>



    </div><!--  END  body-wrap step_1   -->





    <footer data-reactid=".0.2">
     <button type="button" class="footer-l-btn" data-reactid=".0.2.0">上一步</button>
     <button type="button" class="footer-r-btn" data-reactid=".0.2.1">下一步</button>
    </footer>

   </div>
  </div>

  <script type="text/javascript" src="/js/jquery-1.7.1.js"></script>
  <script type="text/javascript" src="/js/calendar.js"></script>
  <script type="text/javascript">
   $(function(){
      var progress=1;
      var num=-1;
      var mycount=false;
      var ali=false;
      //选银行
      $('.body-bank-choose li').click(function(){
        var index=$(this).index();
        if(index==num) return;
        else{
          num=$(this).index();
          $('div.selected').removeClass('selected');
          $('.bank-circle').eq(num).addClass('selected');
          var title=$(this).find('span.bank-choose-title').text();
          console.log(title);
          $('#bankselect').val(title);
        }
      })
      // 选账户
      $('div.remit-info').click(function(){
        if($(this).attr('ali')){
          if(ali) ali=false;
          else ali=true;
        }
        if($(this).hasClass('selected')){
          $(this).removeClass('selected');
          return;
        }
        $(this).addClass('selected').siblings('.selected').removeClass('selected');
        mycount=true;
      })
      

      // 汇款信息



      //前进
      $('button.footer-r-btn').click(function(){
        switch (progress){
          case 1: 
            if(num<0){
              alert('请选择支付银行!');
              return;
            }else{
              $('.container-bank').hide();
              $('.mycount').show();
              $('#a1').text('Step2.');  $('#a2').text('请选择您欲转入的银行帐号'); $('#a3').text('提醒您: 同银行转帐才能立即到帐喔！');
              mapli(1);  progress=2; 
            }
            break;
          case 2:
            if(!mycount) alert('请选择汇款账号!');
            else{
              $('#a1').text('Step3.');  $('#a2').text('请仔细填写您的转帐资料'); $('#a3').text('提醒您: 带(*)号的是必填喔!');
              mapli(2);
              $('div.remit-info').filter('.selected').clone(false).appendTo('div.body-bank-step-1');
              $('div.mycount').hide();
              $('div.check').show();
              $('button.footer-r-btn').text('确定提交');
              progress=3; 
            }
            break;
          case 3:
            SubInfo();
            progress=3;
            break;
        }
      })
      //后退
      $('button.footer-l-btn').click(function(){
        switch (progress){
          case 3:
			  console.log('当前:'+3);
		   $('#a1').text('Step2.');  $('#a2').text('请选择您欲转入的银行帐号'); $('#a3').text('提醒您: 同银行转帐才能立即到帐喔！');
            $('div.mycount').show();
            $('div.check').hide();
            mapli(1); progress=2;
            $('div.body-bank-step-1').find('div.remit-info').remove();
            $('button.footer-r-btn').text('下一步');
            $('button.footer-r-btn').text('下一步');
            break;
          case 2:
			   console.log('当前:'+2);
			   $('#a1').text('Step1.');  $('#a2').text('请选择您所使用的银行'); $('#a3').text('提醒您: 同银行转帐才能立即到帐喔！');
            $('.container-bank').show();
            $('.mycount').hide();
            mapli(0); progress=1;
            break;
          case 1:
			   console.log('当前:'+1);
			 // $('#a1').text('Step2.');  $('#a2').text('请选择您欲转入的银行帐号'); $('#a3').text('提醒您: 同银行转帐才能立即到帐喔！');
            break;
        }
      })
      //yzm
      /*function next_checkNum_img(){
            document.getElementById("checkNum_img").src = "/yzm.php?"+Math.random();
            return false;
      }*/
      //mapli
      function mapli(index){
        $('li.map-step').eq(index).addClass('map-cur-step').siblings('.map-cur-step').removeClass('map-cur-step');
      }
      //表单
      function SubInfo(){
            var hk  = $('v_amount').value;
            if(hk==''){
                alert('请输入转账金额');
                $('v_amount').focus();
                return false;
            }else{
                hk = hk*1;
                if(hk<100){
                    alert('转账金额最底为：100元');
                    $('v_amount').select();
                    return false;
                }
            }
            if($('IntoBank').value==''){
                alert('为了更快确认您的转账,请选择转入银行');
                return false;
            }
            if($('cn_date').value==''){
                alert('请选择汇款日期');
                return false;
            }

            if($('InType').value==''){
                alert('为了更快确认您的转账,请选择汇款方式');
                return false;
            }
            

            $.ajax({
                type: "POST",
                url: "/cl/pages/huikuanDao.php?into=true",
                data:$('#form1').serialize()
            }).done(function( msg ) {
                    if(msg=="chakan_huikuan"){ 
                        alert('提交成功')
                        location.href='/cl/pages/huikuan1.php';
                        //f_com.MChgPager({method:'chakan_huikuan'});

                    }else{
                        alert('对不起，由于网络堵塞原因。您提交的汇款信息失败，请您重新提交!!!');
                    }
                }).fail(function(error){
                    alert('提交失败!!!');
                });
        }
        //时间
        var cc='<?=date("Y-m-d")?>';
        var dd='';
        $('input[name=cn_date]').val(cc).click(function(){
          var dom=$(this)[0];
          dd=new Calendar(2008,2030);
          dd.show(dom);
        }).blur(function(){
          $('#__calendarPanel').css('visibility','hidden');
        });

        //label
        $('.label').bind('click',function(){
          $('.label').not(this).prev('input').removeProp('checked');
          var bb=$(this).prev('input')[0];
          if(!$(bb).prop('checked')){
            $(bb).prop('checked',true);
          }else{
            $(bb).removeProp('checked');
          }
          
        })


    })
    
  

  </script>
 </body>
</html>