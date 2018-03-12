<?php 

if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include_once($C_Patch."../app/member/cache/website.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$web_site["web_name"]?> - 代理注册</title>
<link href="images/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
        </ul>
		<img src="/agent/images/logo.png" href="javascript:void(0);">
        <a class="brand"></a><br><span class="second">　　　 <?=$web_site["web_name"]?>代理注册 </a></span><small>Right<br></small></a>
    </div>
</div>
   <style type="text/css">
 .tishi{
  width:400px;
 
  font-size:12px;
  color:#ccc;
}
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}

td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
/*.t-title{background:url(/super/images/06.gif);height:24px;}*/
.t-title{height:24px;}
.t-tilte td{font-weight:800;}

.t1{color:#fff;font-family:微软雅黑;font-size:10px;}

input{border-radius:3px;border:none;width:148px;height:20px;-webkit-box-shadow: 0 0 6px #CFD1D8;}

</STYLE>


<script language="javascript" src="../js/user_show.js"></script>
<script>

      
    function check_info(){
		if(!document.getElementById("agentsname").value){
            alert("请输入姓名");
            return false;
        }
		if(!document.getElementById("agents_add").value){
            alert("请输入开户行");
            return false;
        }
        if(!document.getElementById("agents_name").value){
            alert("请输入用户名");
            return false;
        }
        if(!document.getElementById("agents_pass").value){
            alert("请输入密码");
            return false;
        }
        return true;
    }
</script>

<body>
<div id="wrap">
    <div id="content-wrap">
<form action="right_update.php" method="post" name="form1" id="form1" onSubmit="return check_info()">
<br>
<span class="t1" style="margin-left: 38px;padding-right: 5px;">真实姓名：</span><input name="agentsname" id="agentsname" value="">
	<span id="Name" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入2位以上名字</span><br><br>
<span class="t1" style="margin-left:38px;padding-right: 5px;">银行账号：</span><input name="bank" type="text" id="agents_bank" value=""> 
  
	  <span id="bank" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入19位银行号</span><br><br>
<span class="t1" style="margin-left:15px;padding-right: 5px;">确认银行账号：</span><input name="bank1" type="text" id="agents_bankf" value=""> 
  
	<span id="bankf" class="tishi">&nbsp;&nbsp;</span><br><br>
<span class="t1" style="margin-left: 42px;padding-right: 5px;">&nbsp;&nbsp;开户行：</span><input name="agents_add" id="agents_add" value="">
	<span id="Add" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入具体所在地开户银行</span><br><br>
 
<span class="t1" style="margin-left: 38px;padding-right: 5px;">代理帐号：</span><input name="agents_name" id="agents_name" value="">

	 <span id="namea" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入5-12位英文和数字</span><br><br>
  
   <span class="t1" style="margin-left:62px;padding-right: 5px;">密码：</span><input name="agents_pass" type="password" id="agents_pass" value=""> 
  
	  <span id="pass" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入6-16位英文字母跟数字</span><br><br>
<span class="t1" style="margin-left:39px;padding-right: 5px;">确认密码：</span><input name="agents_pass1" type="password" id="agents_passf" value=""> 
	<span id="passf" class="tishi">&nbsp;&nbsp;</span><br><br>
<span class="t1" style="margin-left: 38px;padding-right: 5px;">取款密码：</span>
	<select name="pwd1" style="margin-left:-8px;">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select>
            <select name="pwd2">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select>
            <select name="pwd3">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select>
            <select name="pwd4">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select><br><br>
<!--span class="t1" style="margin-left: 62px;padding-right: 5px;">手机：</span><input type="text" name="tel" id="te" value="" >
	
	<span id="tel" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入11位手机号</span-->
 
 <!--<span class="t1" style="margin-left: 55px;padding-right: 5px;"> email：</span><input type="text" name="email" id="email" value="" >
	
	<span id="ema" class="tishi">&nbsp;&nbsp;请输入正规email</span><br><br>-->
 
<!--span class="t1" style="margin-left: 68px;padding-right: 5px;">QQ&nbsp;&nbsp;&nbsp;</span><input type="text" id="qq" name="qq" value="" >
	 
	  <span id="qqd" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入5-11位数字</span><br><br>
  
<!--<span class="t1" style="margin-left: 62px;padding-right: 5px;">其他：</span><input type="text" name="othercon" value="" ><br><br>-->
 <!--span class="t1" style="margin-left: 62px;padding-right: 5px;" >微信：</span><input id="weix" type="text" name="othercon" value="" >
      <span id="wx" class="tishi">&nbsp;&nbsp;<font style="color:red;">*</font>请输入微信号</span><br><br-->

<!--span class="t1" style="margin-left: 60px; position: relative;top: -33px;">备注：</span>

<textarea name="remark" cols="30" rows="5" id="remark" style="-webkit-box-shadow: 0 0 6px #CFD1D8;border-radius: 5px;resize:none "></textarea-->
        <input type="submit" value="注 册" style="width:50px;height:20px;background:#fff;margin-left: 142px;" > 
		
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)" style="width:50px;height:20px;background:#ccc;color:red;"><br>

		   <input name="id" type="hidden" value=""><span id="spts" style="color:red;margin-left:26px;font-family:微软雅黑;"></span>
<br>
   
</form>
</body>
<br>
 <div class="footer"></div>
   </head>
<script>
 var m1=1;var m2=1;var m9=1;var m6=1;var m7=1;var m8=1;m9=1;m3=1;m4=1;

 //验证帐户
   var agents_name=document.getElementById("agents_name");
    var namea=document.getElementById("namea");
	 
            agents_name.onkeyup=function(){
                var cc=agents_name.value; var valuen=agents_name.value;
                 var reg=/^[a-zA-Z0-9]{5,12}$/g;
                var sh=reg.test(cc);
	if(cc.length==0){  namea.innerHTML="&nbsp;&nbsp;*请输入5-12位英文和数字";  namea.style.color='#ccc';m1=1;}
		else{	
      if(sh){
        namea.innerHTML="输入正确";
        namea.style.color="green";
        m1=0;
       
       } 
       else{
        namea.innerHTML="输入错误"; 
         namea.style.color="red";m1=1;
       }
		}
   }
   //验证银行账号
    var agents_bank=document.getElementById("agents_bank");
    var bank=document.getElementById("bank");

            agents_bank.onkeyup=function(){
                var cc=agents_bank.value;	 
                 var reg=/^[0-9]{19}$/;
                var sh=reg.test(cc);
		if(cc.length==0){  bank.innerHTML="&nbsp;&nbsp;请输入19位银行号";  bank.style.color='#ccc'; m3=1;}
		else{
			if(sh){
        bank.innerHTML="输入正确";
        bank.style.color="green";
        m3=0;
        
       }else{
        bank.innerHTML="输入错误"; 
        bank.style.color="red";m3=1;
       }  
	   
		}
       
		
		
		
    
		
   }
 //确认银行账号
    var agents_bankf=document.getElementById("agents_bankf");
    var bankf=document.getElementById("bankf");
            agents_bankf.onkeyup=function(){
            var cc=agents_bankf.value;   
		 if(cc.length==0){  bankf.innerHTML="";  bankf.style.color='#ccc';}
		else{
      if(agents_bankf.value!=agents_bank.value){
        bankf.innerHTML="两次银行账号输入不一致";
        bankf.style.color="red";
        m4=1;
       
       } 
	  
       else{
        bankf.innerHTML=""; 
         bankf.style.color="green";m4=0;
       }}
   }
   //验证密码
    var agents_pass=document.getElementById("agents_pass");
    var pass=document.getElementById("pass");

            agents_pass.onkeyup=function(){
                var cc=agents_pass.value;	 var valuen=agents_name.value;
                 var reg=/^[a-zA-Z0-9]{5,12}$/g;
                var sh=reg.test(cc);
		if(cc.length==0){  pass.innerHTML="&nbsp;&nbsp;请输入6-16位英文字母跟数字";  pass.style.color='#ccc'; m2=1;}
		else{
			if(sh){
        pass.innerHTML="输入正确";
        pass.style.color="green";
        m2=0;
         if(valuen==cc) {
		 pass.innerHTML="密码不能与帐户一致"; 
         pass.style.color="red";
		 m2=1;
		 
		 }
       }else{
        pass.innerHTML="输入错误"; 
         pass.style.color="red";m2=1;
       }  
	   
		}
       
		
		
		
    
		
   }
 //确认密码
    var agents_passf=document.getElementById("agents_passf");
    var passf=document.getElementById("passf");
            agents_passf.onkeyup=function(){
            var cc=agents_passf.value;   
		 if(cc.length==0){  passf.innerHTML="";  passf.style.color='#ccc';}
		else{
      if(agents_passf.value!=agents_pass.value){
        passf.innerHTML="两次密码输入不一致";
        passf.style.color="red";
        m9=1;
       
       } 
	  
       else{
        passf.innerHTML=""; 
         passf.style.color="green";m9=0;
       }}
   }

 //验证微信
/*     var weix=document.getElementById("weix");
    var wx=document.getElementById("wx");
            weix.onkeyup=function(){ 
                var cc=weix.value;
                 var reg=/^[a-zA-Z0-9_]{5,15}$/g;
                var sh=reg.test(cc);
	  if(cc.length==0){  wx.innerHTML="&nbsp;&nbsp;请输入微信号";  wx.style.color='#ccc';m8=1;}
		else{
      if(sh){
        wx.innerHTML="输入正确";
        wx.style.color="green";
        m8=0;
       
       } 
       else{
        wx.innerHTML="输入错误"; 
         wx.style.color="red";m8=1;
       }
   }*/
			}

    

	//验证生日
/* var birt=document.getElementById("birt");
    var birthdy=document.getElementById("birthdy");
            birt.onkeyup=function(){
                var cc=birt.value;
                 var reg=/^[1-2][0-9]{3}[-][0-1][0-9][-][0-3][0-9]$/g;
                var sh=reg.test(cc);
		
      if(sh){
        birthdy.innerHTML="输入正确";
        birthdy.style.color="green";
        m3=0;
       
       } 
       else{
        birthdy.innerHTML="输入错误"; 
         birthdy.style.color="red";m3=1;
       }
   }*/
 
     //验证手机
/* var be=document.getElementById("te");
    var bel=document.getElementById("tel");
            be.onkeyup=function(){
                var cc=be.value;
                 var reg=/^[1][0-9]{10}$/g;
                var sh=reg.test(cc);
	   if(cc.length==0){  bel.innerHTML="&nbsp;&nbsp;请输入11位手机号1开始";  bel.style.color='#ccc';m7=1}
		else{	
      if(sh){
        bel.innerHTML="输入正确";
        bel.style.color="green";
        m7=0;
       
       } 
       else{
        bel.innerHTML="输入错误"; 
         bel.style.color="red";m7=1;
       }
		}
   }*/
   
   /* //验证邮箱
 var email=document.getElementById("email");
    var ema=document.getElementById("ema");
            email.onkeyup=function(){
                var cc=email.value;
                 var reg=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9_\-])+\.)+([a-zA-Z0-9_]{2,4})+$/g;
                var sh=reg.test(cc);
		
      if(sh){
        ema.innerHTML="输入正确";
        ema.style.color="green";
        m5=0;
       
       } 
       else{
        ema.innerHTML="输入错误"; 
         ema.style.color="red";m5=1;
       }
   }*/
   //验证qq
/*  var qq=document.getElementById("qq");
    var qqd=document.getElementById("qqd");
            qq.onkeyup=function(){
                var cc=qq.value; 
                 var reg=/^[1-9][0-9]{4,10}$/g;
                var sh=reg.test(cc);
      if(cc.length==0){  qqd.innerHTML="&nbsp;&nbsp;请输入5-11位数字";  qqd.style.color='#ccc';m6=1;}
		else{
      if(sh){
       qqd.innerHTML="输入正确";
        qqd.style.color="green";
        m6=0;
       
       } 
       else{
        qqd.innerHTML="输入错误"; 
         qqd.style.color="red";m6=1;
       }
		}
   }*/


     var spts=document.getElementById("spts");
   
function check_info(){
     
       
      if(m1==1||m2==1||m9==1||m6==1||m7==1||m8==1||m3==1||m4==1){
		  alert('输入有误请重新输入');
         return false;
          spts.innerHTML="输入有误请重新输入";
      }else{
         spts.innerHTML="";return true;
      }
}
 
</script>
</html>
           		