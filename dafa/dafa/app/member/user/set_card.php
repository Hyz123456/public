<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/include/config.inc.php");
if(!isset($_SESSION)){ session_start();}
$uid = $_SESSION['userid'];
$query	=	$mysqli->query("select user_name,money from user_list where user_id='$uid' limit 1");
$userInfo		=	$query->fetch_array();
$pay_name_from_get = $_GET["pay_name"];
if(!$pay_name_from_get && $get_pay_name){
    $pay_name_from_get = $get_pay_name;
}
//设置银行卡信息
if($_GET["action"]=="save"){
	$yzm	=	strtolower($_POST["vlcodes"]);
	if($yzm!=$_SESSION["randcode"]){
		message("验证码错误,请重新输入");
	}
	$_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码
	$rs		=	user::get_paycard($_SESSION["userid"]);
	if($rs['qk_pass'] != md5($_POST["qk_pwd"])){
		message("取款密码错误,请重新输入");
	}
	$address=	htmlEncode($_POST["add1"]).htmlEncode($_POST["add2"]).htmlEncode($_POST["add3"]);
	if(user::update_paycard($_SESSION["userid"],htmlEncode($_POST["pay_card"]),htmlEncode($_POST["pay_num"]),$address,$rs['pay_name'],$_SESSION["username"])){
        include_once  ($C_Patch."/cl/index.php");
	}else{
		message('设置出错，请重新设置你的银行卡信息','/app/member/user/set_card.php');
	}
}
?>
<script language="javascript" src="../js/jquery-1.7.1.js"></script>
<script language="javascript">

function check_submit()
{
if($("#pay_card").val()=="0")
 {
 alert("请选择银行类型");
 $("#pay_card").focus();
 return false;
 }
 if($("#pay_num").val()=="")
 {
 alert("请输入您的银行卡号");
 $("#pay_num").focus();
 return false;
 }
 
 if($("#add2").val()=="")
 {
 alert("请填写好你银行开户行所在的市");
 $("#add2").focus();
 return false;
 }
 if($("#add3").val()=="")
 {
 alert("请填写好你的开户行网点昵称");
 $("#add3").focus();
 return false;
 }
  if($("#qk_pwd").val()=="")
 {
 alert("请输入您注册时设置的取款密码");
 $("#qk_pwd").focus();
 return false;
 }
    $.ajax({
        type: "POST",
        url: "/app/member/user/save_card.php?action=save",
        data:$('#form1').serialize()
    }).done(function( msg ) {
            if(msg=="save_card_success"){
                f_com.MChgPager(msg);
            }else{
                alert(msg);
            }
        }).fail(function(error){
            alert(error.responseText);
        });
}

function next_checkNum_img(){
	document.getElementById("checkNum_img").src = "../yzm.php?"+Math.random();
	return false;
}

</script>
<style>
.Hyzx-qu-p {
    font-family: verdana, Helvetica, sans-serif;
    font-size: 12px;
    color: #F68622;
    font-weight: bold;
}
#note {
    padding: 20px;
}
#note p {
    line-height: 30px;
    font-size: 12px;
}
.Hyzx-qu span {
    margin-left: 10px;
}
.star {
    color: #F68622;
}
select, input {
    border-radius: 3px;
    outline: none;
}
body, a, input, button {
    font-family: 'Microsoft Yahei', 'Droid Sans Fallback', Arial, Helvetica, sans-serif, 宋体;
    font-size: 14px;
    color: rgb(102, 102, 102);
    outline: none;
}
.tab_bank {
    margin: 20px;
}
.tab_bank tr .m_bc_ed {
    text-align: right;
}
.tab_bank tr td {
    padding: 0 3px;
    text-align: left;
    height: 30px;
    line-height: 30px;
}
.Hyzx-qu span {
    margin-left: 10px;
}
.star {
    color: #F68622;
}
.tab_bank tr .table_bg1 {
    text-align: center;
}
.tab_bank tr .table_bg1 input {
    margin-top: 20px;
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

table {
    text-align: center;
    vertical-align: middle;
    font-size: 14px;
}
</style>
<div class="Hyzx-body">
 <div class="Hyzx-right">
    <h3 class="nav2">
	<span class="flt">取款银行</span>
                    <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" data="bank_transf_index" class="Hyzx-btn flt ">额度转换</a>
                    <a href="javascript: f_com.MChgPager({method: 'bankATM1'});" data="bank_onlinein_index" class="Hyzx-btn flt" >线上存款</a>
                    <a href="javascript: f_com.MChgPager({method: 'bankTake'});" data="bank_onlineout_index" class="Hyzx-btn flt active">线上取款</a>
    </h3>
        <div class="Hyzx-content">
            <div class="Hyzx-qu">
                <p class="Hyzx-qu-p">为保护您的资金安全﹐请确实填写您的银行卡资料﹐以免有心人士窃取﹐谢谢!</p>
                <form  id="form1" name="form1">
                    <div style="display: none;">    
                        <input type="hidden"  name="pay_name" id="pay_name" value="<?=$pay_name_from_get?>"/>
                        <input type="checkbox" name="readrule" checked="checked" style="width:15px;" id="readrule" />
                        <input type="checkbox" name="readrule2" checked="checked"  style="width:15px;" id="readrule2" />
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0" class="tab_bank">
                            <tbody>
                                    <tr>
                                            <td height="25" align="center" class="m_bc_ed">真实姓名: </td>
                                            <td><?=$pay_name_from_get?></td>
                                    </tr>
                                    <tr>
                                            <td height="25" align="center" class="m_bc_ed">出款银行: </td>
                                            <td>
                                                    <select id="pay_card" name="pay_card" class="txt4_3" style="width:131px">
                                                            <option value="0" selected="selected">请选择银行类型：</option>
                                                            <option value="中国工商银行">中国工商银行</option>
                                                            <option value="中国招商银行">中国招商银行</option>
                                                            <option value="中国农业银行">中国农业银行</option>
                                                            <option value="中国建设银行">中国建设银行</option>
                                                            <option value="中国民生银行">中国民生银行</option>
                                                            <option value="中国交通银行">中国交通银行</option>
                                                            <option value="深圳发展银行">深圳发展银行</option>
                                                            <option value="中国邮政银行">中国邮政银行</option>
                                                            <option value="中国银行">中国银行</option>
                                                            <option value="兴业银行">兴业银行</option>
                                                            <option value="中信银行">中信银行</option>
                                                            <option value="广大银行">广大银行</option>
                                                            <option value="交通银行">交通银行</option>	              
                                                            <option value="光大银行">光大银行</option>	              
                                                            <option value="平安银行">平安银行</option>	              
                                                            <option value="广发银行">广发银行</option>	              
                                                            <option value="华夏银行">华夏银行</option>	              
                                                            <option value="温州银行">温州银行</option>	              
                                                            <option value="上海浦东发展银行">上海浦东发展银行</option>	              
                                                            <option value="其它银行">其它银行</option>
                                                    </select> 
                                            </td>
                                    </tr>
                                    <tr>
                                            <td height="25" align="center" class="m_bc_ed"><span class="star">*</span>银行账号: </td>
                                            <td colspan="2"><input  name="pay_num"  id="pay_num" class="txt4_3" onkeyup="value=this.value.replace(/\D+/g,&#39;&#39;)" type="text"></td>
                                    </tr>
                                    <tr>
                                            <td height="25" align="center" class="m_bc_ed"><span class="star">*</span>开户网点: </td>
                                            <td colspan="2"><input type="text" name="add3" id="add3" class="txt4_3"></td>
                                    </tr>
                                    <tr>
                                            <td height="25" align="center" class="m_bc_ed"><span class="star">*</span>取款密码: </td>
                                            <td colspan="2"><input type="password" name="qk_pwd" id="qk_pwd" maxlength="30" class="txt4_3"></td>
                                    </tr>
                                    <tr>
                                            <td height="25" align="center" class="m_bc_ed"><span class="star">*</span>验证码: </td>
                                            <td colspan="2">
                                                <input  type="text" name="vlcodes" id="vlcodes" size="5" maxlength="4" onfocus="next_checkNum_img()"  class="txt4_3"/>
                                                <img src="../yzm.php" alt="点击更换" name="checkNum_img" id="checkNum_img" style="cursor: pointer;position: relative;top:7px;" onclick="next_checkNum_img()"/> 
                                            </td>
                                    </tr>
                                    <tr align="center">
                                            <td colspan="3" class="table_bg1">
                                                    <input value="提交信息"  type="button" onclick="check_submit()" class="btn-sub">
                                                    <input type="reset" value="重置" class="btn-sub">
                                            </td>
                                    </tr>
                                     
                            </tbody>
                    </table>
                </form>
                <div id="note">
                        <h4>备注：</h4>
                        <p>1.标记有&nbsp;<span class="star">*</span>&nbsp;者为必填项目。</p>
                        <p>2.手机与取款密码为取款金额时的凭证,请会员务必填写详细资料。</p>

                </div>

            </div>
				

        </div>
</div>
</div>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 


 


