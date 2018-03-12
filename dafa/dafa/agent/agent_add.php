<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="images/login.css" rel="stylesheet" type="text/css" />
</head>
 <head>
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
<style type="text/css">

/*共用*/
input{
    padding-left: 6px;
    padding-right: 6px;
}
body{
    /*background-color: #FFF;*/
    padding: 0;
    margin: 0;
    color: #FFF;
}
.bodyStyle{
    background-color: #FFF;
}
.skinbg{
    background-color: #FBE9AC;
}

/*會員註冊*/
.JoinMemForm {
    margin: 0;
}
#memCash_body {
    background-color: transparent;
    font-size: 12px;
    color: #FFF;
}
.JM_content {
    padding: 10px 10px 10px 20px;
}
#memCash_body .JM_content p {
    line-height: 16px;
    height: auto;
}
#memCash_body .memCash_tit {
        background: url(images/welcome.png) no-repeat;
    padding-left: 140px;
    color: #FFF;
    height: 50px;
    line-height: 65px;

    text-shadow: 2px 1px 1px black;
    }
.JM_content ol li {
    list-style-type: decimal;
}
#memCash_body fieldset {
    border: 1px solid #fff;
    margin: 10px;
    padding: 10px;
}
#memCash_body legend {
    color: #fff;
    font-weight: bold;
}
#memCash_body .star {
    color: #F00;
    font-weight: bold;
    vertical-align: -2px;
}
#memCash_body a {
    text-decoration: none;
    color: #F00;
}
.striking-red {
color: #F00;
}
</style>
<style type="text/css">

#memCash_body {
    font-family: "宋体",arial;
    background-color: transparent;
    font-size: 12px;
    color: #fff;
}
 #memCash_body .memCash_tit {
    background: url(/pic/welcome.png) no-repeat;
    padding-left: 140px;
    color: #FFF;
    height: 50px;
    line-height: 65px;
    text-shadow: 2px 1px 1px black;
}
#memCash_body .JoinMemForm p {
    height: auto;
    min-height: 26px;
    color: #fff;
}

#memCash_body fieldset {
    border: 1px solid #fff;
    margin: 10px;
    padding: 10px;
}
.JM_content {
    padding: 10px 10px 10px 20px;
}
#memCash_body .JM_content p {
    line-height: 16px;
    height: auto;
}

#memCash_body label {
    float: left;
    height: 25px;
    line-height: 25px;
    text-align: right;
    width: 135px;
    color: #fff;
}
input {
    padding-left: 6px;
    padding-right: 6px;
}
input, select {
    height: 20px;
    line-height: 20px;
}
.JoinMemForm input[type=text], .JoinMemForm input[type=password], .JoinMemForm select {
    border: 1px solid #666666;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-shadow: 0 0 6px #3A3A3A;
    -moz-box-shadow: 0 0 6px #3A3A3A;
    -webkit-box-shadow: 0 0 6px #3A3A3A;
}
#memCash_body .star {
    color: #F00;
    font-weight: bold;
    vertical-align: -2px;
}
#memCash_body .memCash_text {
    display: block;
    padding: 5px 0 0 135px;
    min-height: 26px;
}
.ui-datepicker-trigger {
    margin-left: 5px;
    cursor: pointer;
}
.ui-datepicker {
    width: 260px;
}
#memCash_body a {
    text-decoration: none;
    color: #F00;
}
 #memCash_body #ui-datepicker-div a {
    color:#fff;
}
.ui-datepicker th {
    word-break: break-all;
    padding: 2px 1px;
}
.ui-datepicker {
    width: 260px;
}
</style>

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

<body id="memCash_body" style="padding: 0px;">
    <h3 class="memCash_tit"> 【澳门威尼斯人】欢迎加入电子天天返水高达2.5%，单笔取款1000万即时到帐，大额玩家首选！</h3>
    <div class="JM_content JM_content_t">
        <div id="joinmem"><div><p>【澳门威尼斯人】欢迎加入电子天天返水高达2.5%，单笔取款1000万即时到帐，大额玩家首选！</p></div>
        </div>
    </div>

    <form class="JoinMemForm" target="_self" action="agent_update.php" method="post" name="form1" id="form1" onSubmit="return check_info()">
    <!--會員資料-->
    <fieldset>
        <legend>注册帐号</legend>
        <p style="position: relative; height: 1px;"><a style="position: absolute; top: 0px;"></a></p>
        <!-- 帳號 -->
        <p>
            <label><span class="star">*&nbsp;</span>代理帳號：</label>
            <input name="agents_name" id="agents_name" value="" class="r_user_form">
            <span  id="namea" class="tishi">&nbsp;&nbsp;</span>
        </p>
        <p class="memCash_text" >帐号：请输入<font color="red"><b>4-11个字元</b></font>, 仅可输入英文字母以及数字的组合!!</p>
        <!-- 密碼 -->
        <p>
            <label><span class="star">*&nbsp;</span>登陆密碼：</label>
            <input name="agents_pass" type="password" id="agents_pass" value="" class="password_adv"> 
            <span  id="pass" class="tishi">&nbsp;&nbsp;</span>
        </p>
        <p class="memCash_text" >*密码规则：须为<font color="red"><b>6~11英文或数字</b></font>且符合0~9或a~z字元</p>
        <!-- 確認密碼 -->
        <p>
            <label><span class="star">*&nbsp;</span>确认密码：</label>
            <input name="agents_pass1" type="password" id="agents_passf" value=""> 
            <span id="passf" class="tishi">&nbsp;&nbsp;</span>
        </p>
        <p>
            <label><span class="star"></span>取款密码：</label>
            <select name="pwd1" >
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
            </select>
        </p>
    </fieldset>

       <fieldset name="memdata" style="display: block;">
                <legend class="join-info">代理基本資料</legend>
                <p style="position:relative;min-height:1px;"><a style="position:absolute;top:0px;"></a></p>
                 <p>
                        <label><span class="star" style="display: inline;">*&nbsp;</span>qq：</label>
                        <input type="text" value=""  class="input " id="qq" name="qq" >
                        <span id="qqd" class="tishi">&nbsp;&nbsp;</span>
                </p>
                <p>
                        <label><span class="star" style="display: inline;">*&nbsp;</span>手机号码：</label>
                        <input type="text" value=""  class="input " name="tel" id="te">
                        <span id="tel" class="tishi">&nbsp;&nbsp;</span>
                </p>
                <p>
                        <label><span class="star" style="display: inline;">*&nbsp;</span>微信号：</label>
                        <input type="text" value=""  class="input " id="weix" name="othercon">
                        <span id="wx" class="tishi">&nbsp;&nbsp;</span>
                </p>
                <p>
                        <label><span class="star" style="display: inline;">*&nbsp;</span>真實姓名：</label>
                        <input name="agentsname" id="agentsname" value="" type="text"  class="input">
                        <span id="Name" class="tishi">&nbsp;&nbsp;</span> 
                </p>
      </fieldset>


    <!--次要資料-->
    <fieldset>
        <legend>代理銀行資料</legend>
        <p style="position: relative; height: 1px;"><a style="position: absolute; top: 0px;"></a></p>
        <p>
          <label><span class="star" style="display: inline;">*&nbsp;</span>开户银行：</label>
          <input name="agents_add" id="agents_add" value="" class="input">
          <span id="Add" class="tishi">&nbsp;&nbsp;</span>
        </p>
        <p class="memCash_text" >*请输入具体所在地开户银行</p>
        <p>
          <label><span class="star" style="display: inline;">*&nbsp;</span>银行账号：</label>
          <input name="bank" type="text" id="agents_bank" value="" class="input"> 
          <span id="bank" class="tishi">&nbsp;&nbsp;</span>
        </p>
        <p class="memCash_text" >*请输入<font color="red"><b>19位</b></font>银行号</p>
        <p>
          <label><span class="star" style="display: inline;">*&nbsp;</span>确认银行账号：</label>
          <input name="bank1" type="text" id="agents_bankf" value="" class="input"> 
          <span id="bankf" class="tishi">&nbsp;&nbsp;</span>
        </p>

        <p id="js-real_name" style="display: block;">
          <label><span class="star" style="display: inline;">&nbsp;</span>备注：</label>
          <textarea name="remark" cols="30" rows="5" id="remark" style="-webkit-box-shadow: 0 0 6px #CFD1D8;border-radius: 5px;resize:none "></textarea>
        </p>

    </fieldset>
    <br>
    <!-- 確認/重設 -->
    <div align="center" id="memCash-confirm">
        <input type="submit" value="确认" class="joinform_submit"> 
    
        <input type="button" value="重设" onClick="javascript:history.go(-1)" class="joinform_cancel">

       <input name="id" type="hidden" value=""><span id="spts" style="color:red;margin-left:26px;font-family:微软雅黑;"></span>


    </div>
    <!-- 備註 -->
    <div align="left" id="memCash-remark">
        备注：
            <ul>
                <li>1.标记有&nbsp;<span class="star">*</span>&nbsp;者为必填项目。</li>
                <li>2.取款密码为取款金额时的凭证,请会员务必填写详细资料。</li>
            </ul>
    </div>
</form>
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
    var weix=document.getElementById("weix");
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
   }
			}

    


 
     //验证手机
 var be=document.getElementById("te");
    var bel=document.getElementById("tel");
            be.onkeyup=function(){
                var cc=be.value;
                 var reg=/^[1][0-9]{10}$/g;
                var sh=reg.test(cc);
	   if(cc.length==0){  bel.innerHTML="&nbsp;&nbsp;请输入11位手机号";  bel.style.color='#ccc';m7=1}
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
   } 
   //验证qq
 var qq=document.getElementById("qq");
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
   }


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
           		