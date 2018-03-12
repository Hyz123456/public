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
<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 
<link rel="stylesheet" href="/cl/css/reset.css">
<link rel="stylesheet" href="/cl/memberdata.css">
<style>
.Hyzx-right .Hyzx-content .Hyzx-conNav {
    font: 15px/42px "microsoft yahei";
    height: 42px;
}            
.Hyzx-btn {
    margin-right: 1px;
    margin-bottom: 1px;
}   
.Hyzx-wy {
    border: 1px dotted #787878;
}
.Hyzx-yhxz {
    margin-top: 20px;
}
.Hyzx-wy .p-tit {
    padding: 5px;
    border-bottom: 1px dotted #787878;
}
.wy-left {
    float: left;
}
.Hyzx-wy .wy-right, .wy-left {
    padding: 5px;
}
.Hyzx-yhxz {
    margin-top: 20px;
}
.Hyzx-yhxz p {
    width: 100%;
    line-height: 30px;
    margin-bottom: 10px;
}
.Hyzx-yhxz p label {
    text-align: right;
    width: 130px;
    display: block;
    float: left;
}
.Hyzx-yhxz p span {
    margin-left: 10px;
}
.sp-red {
    color: #ff0000;
}
.Hyzx-yhxz p span {
    margin-left: 10px;
}
.Hyzx-yhxz p input {
    height: 30px;
    margin-left: 10px;
    line-height: 30px;
    padding-left: 5px;
    width: 200px;
    border-radius: 4px;
    border: 1px solid #ab8c84;
}
.yhxz-div {
    margin-bottom: 20px;
}
.yhxz-div .tit-name {
    float: left;
}
.yhxz-div .tit-name span {
    display: block;
    width: 130px;
    text-align: right;
}
.sp-red {
    color: #ff0000;
}
.yhxz-div .yn-img {
    width: 750px;
    float: left;
}
.yhxz-div .yn-img div {
    float: left;
}
.Hyzx-radio, #show-More {
    border: 2px solid #787878;
    padding: 9px 7px;
    cursor: pointer;
    margin-left: 10px;
    margin-bottom: 10px;
}
.Hyzx-radio input {
    margin-top: 6px;
    float: left;
}
.yhxz-div .yn-img div {
    float: left;
}
.hah {
    width: 120px;
    height: 22px;
    text-align: center;
}
.clearfix {
    clear: both;
}
.Hyzx-zf-btn {
    padding-left: 140px;
}
.Hyzx-zf-btn button {
    margin-bottom: 20px;
}
.Hyzx-zf-btn button {
    margin-bottom: 20px;
}
.Hyzx-zf-btn p {
    margin-bottom: 3px;
}
.Hyzx-yhxz p {
    width: 100%;
    line-height: 30px;
    margin-bottom: 10px;
}
.Hyzx-yhxz p span {
    margin-left: 10px;
}
.sp-red {
    color: #ff0000;
}
.Hyzx-radio span{
    font-family: 'Microsoft Yahei', 'Droid Sans Fallback', Arial, Helvetica, sans-serif, 宋体;
    font-size: 14px;
    color: rgb(102, 102, 102);
}
.Hyzx-radio, #show-More {
    border: 2px solid #787878;
    padding: 9px 7px;
    cursor: pointer;
    margin-left: 10px;
    margin-bottom: 10px;
}
.btn-sub {
    background-color: #ab8c84;
    height: 30px;
    font-size: 14px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-weight: bold;
    display: inline-block;
    text-align: center;
    padding: 0 15px;
    border: 0;
    color: #fff;
    cursor: pointer;
}
</style>
</HEAD>
<body id="zhuce_body">

<div class="Hyzx-body">
	<div class="Hyzx-right">
		<h3 class="nav2">
                    <span class="flt">线上存款</span>
                    <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" data="bank_transf_index" class="Hyzx-btn flt ">额度转换</a>
                    <a href="javascript: f_com.MChgPager({method: 'bankATM1'});" data="bank_onlinein_index" class="Hyzx-btn flt" active>线上存款</a>
                    <a href="javascript: f_com.MChgPager({method: 'bankTake'});" data="bank_onlineout_index" class="Hyzx-btn flt">线上取款</a>
                </h3>
		<div class="Hyzx-content">
                        <div class="Hyzx-conNav">
                                <a href="javascript: f_com.MChgPager({method: 'bankATM1'});" data="bank_onlinebank_index" class="Hyzx-btn flt active">第三方网银</a>
                                <a href="javascript:alert('该功能未开通');" data="bank_onlinewechat_index" class="Hyzx-btn flt">第三方微信</a>
                                <a href="javascript:alert('该功能未开通');" data="bank_onlineali_index" class="Hyzx-btn flt">第三方支付宝</a>
                        </div>
			<div class="clearfix"></div>
			<div class="Hyzx-gsrk Hyzx-table-content">
                                <div class="Hyzx-gsrk ">
					<div class="Hyzx-wy">
                                            <p class="p-tit" style="color: "></p>
                                            <div class="wy-left">

                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                        <form id="form1" name="form1" action="http://pay.lxtfa.top/pay.php" method="post" onsubmit="return VerifyData();" target="_blank">
						    <div class="Hyzx-yhxz">
						    	<p><label>会员账号:</label><span><?=$userInfo["user_name"]?></span></p>
						    	<p><label><i class="sp-red">*</i>充值金额:</label><input name="MOAmount" type="text" class="input_150" id="MOAmount" onkeyup="clearNoNum(this);" maxlength="10" size="15" value="" placeholder="充值金额"/><span>请输入充值金额</span></p>
                            				<div class="yhxz-div" id="bank_list">
						    		<div class="tit-name">
						    			<span><i class="sp-red">*</i>支付银行:</span>
						    		</div>
						    		<div class="yn-img Hyzx-btn-show">
                                                                        <div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="962">
						    				<div class="hah">
						    					<span title="中信银行" class="">中信银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="963">
						    				<div class="hah">
						    					<span title="中国银行" class="">中国银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="964">
						    				<div class="hah">
						    					<span title="中国农业银行" class="">中国农业银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="965">
						    				<div class="hah">
						    					<span title="中国建设银行" class="">中国建设银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="966">
						    				<div class="hah">
						    					<span title="中国工商银行(手机签约)" class="">中国工商银行(手机签约)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="967">
						    				<div class="hah">
						    					<span title="中国工商银行(全国)" class="">中国工商银行(全国)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="968">
						    				<div class="hah">
						    					<span title="浙商银行" class="">浙商银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="969">
						    				<div class="hah">
						    					<span title="浙江稠州商业银行" class="">浙江稠州商业银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="970">
						    				<div class="hah">
						    					<span title="招商银行" class="">招商银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="971">
						    				<div class="hah">
						    					<span title="邮政储蓄" class="">邮政储蓄</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="972">
						    				<div class="hah">
						    					<span title="兴业银行" class="">兴业银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="973">
						    				<div class="hah">
						    					<span title="顺德农村信用合作社" class="">顺德农村信用合作社</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="974">
						    				<div class="hah">
						    					<span title="深圳发展银行" class="">深圳发展银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="975">
						    				<div class="hah">
						    					<span title="上海银行" class="">上海银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="976">
						    				<div class="hah">
						    					<span title="上海农村商业银行" class="">上海农村商业银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="977">
						    				<div class="hah">
						    					<span title="浦东发展银行" class="">浦东发展银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="978">
						    				<div class="hah">
						    					<span title="平安银行" class="">平安银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="979">
						    				<div class="hah">
						    					<span title="南京银行" class="">南京银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="980">
						    				<div class="hah">
						    					<span title="民生银行" class="">民生银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="981">
						    				<div class="hah">
						    					<span title="交通银行" class="">交通银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="982">
						    				<div class="hah">
						    					<span title="华夏银行" class="">华夏银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="983">
						    				<div class="hah">
						    					<span title="杭州银行" class="">杭州银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="984">
						    				<div class="hah">
						    					<span title="广州市农村信用社" class="">广州市农村信用社</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="984">
						    				<div class="hah">
						    					<span title="广州市商业银行" class="">广州市商业银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="985">
						    				<div class="hah">
						    					<span title="广东发展银行" class="">广东发展银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="986">
						    				<div class="hah">
						    					<span title="光大银行" class="">光大银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="987">
						    				<div class="hah">
						    					<span title="东亚银行" class="">东亚银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="988">
						    				<div class="hah">
						    					<span title="渤海银行" class="">渤海银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="989">
						    				<div class="hah">
						    					<span title="北京银行" class="">北京银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="990">
						    				<div class="hah">
						    					<span title="北京农村商业银行" class="">北京农村商业银行</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="992">
						    				<div class="hah">
						    					<span title="支付宝" class="">支付宝</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="993">
						    				<div class="hah">
						    					<span title="QQ钱包" class="">QQ钱包</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="994">
						    				<div class="hah">
						    					<span title="快钱" class="">快钱</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="8012">
						    				<div class="hah">
						    					<span title="支付宝扫码支付" class="">支付宝扫码支付</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="8011">
						    				<div class="hah">
						    					<span title="微信扫码支付" class="">微信扫码支付</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2000">
						    				<div class="hah">
						    					<span title="中信银行(快)" class="">中信银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2001">
						    				<div class="hah">
						    					<span title="中国银行(快)" class="">中国银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2003">
						    				<div class="hah">
						    					<span title="中国建设银行(快)" class="">中国建设银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2004">
						    				<div class="hah">
						    					<span title="中国工商银行(快)" class="">中国工商银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2006">
						    				<div class="hah">
						    					<span title="招商银行(快)" class="">招商银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2008">
						    				<div class="hah">
						    					<span title="兴业银行(快)" class="">兴业银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2012">
						    				<div class="hah">
						    					<span title="浦发银行(快)" class="">浦发银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2013">
						    				<div class="hah">
						    					<span title="平安银行(快)" class="">平安银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2019">
						    				<div class="hah">
						    					<span title="广州农村商业银行(快)" class="">广州农村商业银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2020">
						    				<div class="hah">
						    					<span title="广东发展银行(快)" class="">广东发展银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2021">
						    				<div class="hah">
						    					<span title="中国光大银行(快)" class="">中国光大银行(快)</span>
						    				</div>
						    			</div>


																    			<div class="Hyzx-radio" style="width:140px">
						    				<input type="radio" name="bank" value="2027">
						    				<div class="hah">
						    					<span title="广州银行(快)" class="">广州银行(快)</span>
						    				</div>
						    			</div>


										
						    		</div>

						    		<div class="clearfix"></div>
						    	</div>
                            

						        <div class="Hyzx-zf-btn">
                                                                <input type="hidden" name="S_Name" value="<?=$userInfo["user_name"]?>">
						        	<button type="submit" class="btn-sub" id="SubTran" >确定</button>
						        	<button type="reset" class="btn-sub">重置</button>

						        	 <p>备注：</p>
                                                                <p>1.标记有<span class="sp-red">*</span>者为必填项目。</p>
                                                                <p>2.单笔最低存款金额 1元以上</p>
                                                                <p>3.单笔最高存款金额 50000 元以下</p>
						        </div>
						    </div>
						</form>
                                </div>

						</div>


					</div>

</div>    
    
</body>
</HTML>
