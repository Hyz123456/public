<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

$username=$_SESSION['username'];

$payid=8;
$sql="select user_id,user_name,tel,money from user_list where user_name='$username'";
$query	=	$mysqli->query($sql);
$cou	=	$query->num_rows;
if($cou<=0){
	echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
	exit();
}
$rows	=	$query->fetch_array();


$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}

$rows_pay	=	$query_pay->fetch_array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>History</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/css/css_1.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
	.dv{ line-height:25px;}
	.body2{
		width: 737px;
		height: auto;
		padding: 10px 0 0 12px;
		margin-left:10px;
		margin-right:10px;
		float:left;
		font-size:12px;
        color:#000000;
	}
	.tds {
		line-height:25px;
	}
	.STYLE1 {font-weight: bold;font-size:12px;}
    .STYLE2 {color: #0000FF}
	.STYLE12{ color:#F00}
    </style>
<script language="JAVAScript">
//		var $ = function(Id){
//            return document.getElementById(Id);
//        }
    
       
        //数字验证 过滤非法字符
        function clearNoNum(obj){
	        //先把非数字的都替换掉，除了数字和.
	        obj.value = obj.value.replace(/[^\d.]/g,"");
	        //必须保证第一个为数字而不是.
	        obj.value = obj.value.replace(/^\./g,"");
	        //保证只有出现一个.而没有多个.
	        obj.value = obj.value.replace(/\.{2,}/g,".");
	        //保证.只出现一次，而不能出现两次以上
	        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	        if(obj.value != ''){

	        var re=/^\d+\.{0,1}\d{0,2}$/;
                  if(!re.test(obj.value))   
                  {   
			          obj.value = obj.value.substring(0,obj.value.length-1);
			          return false;
                  } 
	        }
        }
<!--
//去掉空格
function check_null(string) { 
var i=string.length;
var j = 0; 
var k = 0; 
var flag = true;
while (k<i){ 
if (string.charAt(k)!= " ") 
j = j+1; 
k = k+1; 
} 
if (j==0){ 
flag = false;
} 
return flag; 
}
function VerifyData() {
if (document.form1.MOAmount.value == "") {
			alert("请输入存款金额！")
			document.form1.MOAmount.focus();
			return false;
}
if (document.form1.MOAmount.value < <?=$rows_pay['money_Lowest']?>) {
			alert("最低充值<?=$rows_pay['money_Lowest']?>元！")
			document.form1.MOAmount.focus();
			return false;
}
}
-->
</script>
<script language="JavaScript">
    function view_cunkuan(){
        f_com.MChgPager({method: 'chakan_cunkuan'});
    }
<!--
function url(r){
    window.open(r,"mainFrame");  
}
-->
</script>
</HEAD>
<body id="zhuce_body">
<div id="MNav">
        <a href="javascript: f_com.MChgPager({method: 'moneyView'});" class="mbtn">额度转换</a>
        <div class="navSeparate"></div>
        <span class="mbtn">线上存款</span>
        <div class="navSeparate"></div>
       <!--  <a href="javascript: f_com.MChgPager({method: 'bankATM'});" class="mbtn">银行汇款</a>
        <div class="navSeparate"></div> -->
        <a href="javascript: f_com.MChgPager({method: 'bankTake'});" class="mbtn">线上取款</a>
    </div>



<style>

body{color: #000;padding-top: 10px;font-family: 微软雅黑;}

#yinyin{margin: 19px 0 0 43px;width:177px;height:140px;background-image:url('/cl/cunkuan.png');float:left;background-repeat:no-repeat;position: relative;left: 10px;}

#wenzi{width: 526px;float:left;margin-top:10px;}

.info-sec-title{height: 22px;line-height: 17px;color: #6A8A8C;font-size: 15px;padding-right:40px;letter-spacing: 2px;text-align: right;background: url(/cl/line.png) -40px bottom no-repeat;}

.info-sec-txt {width: 100%;height: 17px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;border-right: 4px #6A8A8C solid;}

#yue{background-color:#DCDCDC;width:705px;height:147px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;clear: both;margin: 10px auto 0px auto;}

#kj{padding-top: 1px;width:607px;height: 365px;background: #EAEAEA;margin: 4px;border-radius: 4px;    position: absolute;
    top: 45px;
    left: 78px;border: 4px solid #272A31;display:none;}

#Landingnavigation {width: 603px;height: 30px;background: #F1AB00;margin: 2px 2px;border-radius: 4px;}

#yue1{border-radius: 5px;margin:auto;background-color:#DCDCDC;width:315px;height:81px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}

.tab1{width: 194px;height: 31px;line-height: 31px;text-align: center;font-family: 微软雅黑;font-size: 15px;color: #fff;float:left;}

.tx{width: 705px;height: 19px;background-color: #ccc;clear: both;text-align: right;color: #000;line-height: 19px;font-size: 13px;}

	.tab2{border-top: 1px solid #C2C2C2;cursor:pointer;width:194px;height:49px;border-right:1px solid #C2C2C2;float:left;text-align: center;line-height: 49px;}
	
	.bd{width: 194px;height: 49px;border: none;background-color: #DCDCDC;outline: none;color: #666;font-size: 15px;text-indent: 1em;font-family: 微软雅黑;}
    
    .qr{width: 120px;border: none;height:50px;outline: none;color: #6A8A8C;cursor:pointer;background: #ccc;font-weight: bold;font-size: 15px;font-family: 微软雅黑;}
</style>
<div id="yinyin"></div>
<div id="wenzi">
	<img src="/cl/welcome.png" style="margin-left: -40px">
	<br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 13px;">用户名:
		<span style="color:#6A8A8C;font-size:16px;font-weight: 100;"><?=$userInfo["user_name"]?></span>
	</span>
	<br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 13px;">余　额:
		<img src="/tpl/commonImage/money_RMB.gif" align="absmiddle" title="人民币" alt="人民币" style="position: relative;top: -3px;">
		<span style="color:#6A8A8C;font-size:16px;font-weight: 100;"><?=$_SESSION["user_money"]?><span style="color:#000;font-size:15px;margin-left: 10px;">人民币(RMB)</span></span>
	</span>

    <div class="info-sec-title">
        <div class="info-sec-txt" title="即时帐号资讯">
            线上存款
        </div>
    </div>

</div>

<div style="clear: both;"></div>



<div id="yue1">

	
	<div class="tab1" style="width:310px;color:#000;">在线冲值 </div>
	
	 <!-- 
	 
	  <form id="form1" name="form1" action="/ayzz/pays.php?payid=<?=$payid?>" method="post" onsubmit="return VerifyData();" target="_blank"> -->
    <div class="tab2" id="rururu">  
		 <input name="MOAmount" type="text" id="MOAmount" onkeyup="clearNoNum(this);" size="15"/style="width: 177px;border: none;background-color: transparent;outline: none;height: 49px;" placeholder="最少充值<?=$rows_pay['money_Lowest']?>元">
	</div>
	
	<input Type="hidden" Name="S_Name" value="<?=$username;?>"/>

	<input name="SubTran" class="anniu_02 qr" id="SubTran"  type="submit" value="马上充值" />		 

</form>
		
		
	
</div>




         
				
					



<div style="margin-left: 80px;
    margin-top: 10px;">

<font color="#111111"><strong class="STYLE1">在线充值说明：</strong></font> 


<div style=" line-height:18px; font-size:12px;">
   <font color="#111111">(1).请按表格填写准确的在线充值信息,确认提交后会进入选择的银行进行在线付款! </font>              
</div>

<div style=" line-height:18px;font-size:12px;">
   <font color="#111111">(2).交易成功后请点击返回支付网站可以查看您的订单信息!</font>                  
</div>

<div style=" line-height:18px;font-size:12px;">
    <font color="#111111">(3).如有任何疑问,您可以联系 在线客服为您提供365天×24小时不间断的友善和专业客户咨询服务! </font>                
</div>
                 
</div>

<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
<img src="/cl/shadow03.png" style="margin-left: 30px; margin-top: 5px;">



</BODY>
</HTML>
