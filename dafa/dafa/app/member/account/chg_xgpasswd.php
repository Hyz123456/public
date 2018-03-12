<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../../app/member/utils/login_check.php";
include "../../../app/member/class/user_group.php";
include_once("../../../app/member/common/log.php");

$password_old = $_POST["password_old"];
$password = $_POST["password"];
$re_password = $_POST["REpassword"];
$pwdtype = $_POST["pwdtype"];
$result = "";
if($password_old && $password && $re_password && $pwdtype){
    if($password !=$re_password){
        $result = "两次输入密码不对。";
    }
    if(strlen($password)<6 || strlen($re_password)<6){
        $result = "两次长度太短。".sizeof($password)."-".sizeof($re_password);
    }
    if($pwdtype=='userpwd'){
        $password_get = user_group::getPassWord($_SESSION["userid"]);
        if(md5($password_old) != $password_get){
            $result = "密码不正确。";
        }
        if(!$result){
            $result = user_group::setPassWord($_SESSION["userid"],$password);
        }  
    }elseif($pwdtype=='moneypwd'){
        $password_get = user_group::getPassWord($_SESSION["userid"]);
        if(md5($password_old) != $password_get){
            $result = "登录密码不正确。";
        }
        if(!$result){
            $result = user_group::setQkPassWord($_SESSION["userid"],$password);
        }
    }
}
if($result){
    echo"<script type='text/javascript'>alert('".$result."');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>修改取款密码</title>
    <link rel="stylesheet" href="/tpl/template/style/password.css" type="text/css">
</head>
<center><font color="RED"><b><?=$result?></b></font></center>
<body id="chgPasswd" oncontextmenu="window.event.returnValue=false">  
<div id="site_sitemoney" style="display: block;  background-color: rgb(240, 249, 251);" class="con_menu">
  <form id="JS-forgetpwd-form" class="pwd-form" name="chgFORM" method=post onSubmit="return SubChk();">
    <table class="Hyzx-table" style="width:600px;margin:0;text-align: left;">
        <tbody><tr class="de_title" style="background:#F0F9FB;">
            <th colspan="3" height="27" class="table_bg" align="left">
            <span id="de_title" style="color: #fff;font-weight: bold;">修改密码</span>
            </th>
        </tr>

        <tr class="m_title" style="background: #fff;">
            <td width="80" id="smoney" align="right">类型选择：</td>
            <td class="de_td" id="vtypes" colspan="2">
                <select name="pwdtype" id="myType">
                    <option value="userpwd">登录密码</option>
                    <option value="moneypwd">取款密码</option>
                </select>
            </td>
        </tr>
        <tr class="m_title" style="display: none;">
            <td colspan="3">
                <input type="hidden" name="action" value="1"/>
                <input type="hidden" name="uid" value="G47bca9cza834n1fz1oefhi9z56jdoaz142"/>
                <input id="userid" type="hidden" value="hasgoodday"/>
            </td>
        </tr>
        <tr class="m_title" style="background: #fff;">
            <td width="100" align="right" class="m_bc_ed"><span id="ypwd">原密码：</span></td>
			<td class="hong" width="150" align="left"><input class="input_150" maxlength="12" type="password"name="password_old"></td>
			<td id="oldpass_txt" class="hong" align="left">&nbsp;</td>
        </tr>
        <tr class="m_title">
            <td align="right" class="m_bc_ed" id="xpwd">新密码：</td>
			<td class="hong" align="left"><input class="input_150" maxlength="12" type="password" name="password"></td>
			<td id="newpass_txt" class="hong" align="left">* <span class="lan" id="yaoqiu">请输入6-11位新密码</span></td>
        </tr>
        <tr class="m_title">
            <td align="right" class="m_bc_ed">确认新密码：</td>
			<td class="hong" align="left"><input class="input_150" maxlength="12" type="password" name="REpassword"></td>
			<td id="newpass2_txt" class="hong" align="left">* <span class="lan">重复输入一次新密码</span></td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <p><input type="submit" value="确定修改" class="Hyzx-btn active" style="border: none;float: left;margin-left: 220px;margin-right: 10px;">
                <input type="reset" value="关闭" onClick="javascript:window.close();" class="Hyzx-btn active" style="border: none;float: left;"></p>
            </td>
        </tr>
    </tbody></table>
</form>
</div>   
<script type="text/javascript" src="/cl/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/cl/js/tools/password_strength.js"></script>
<script type="text/javascript" src="/js/js.php?group=CHG_PASSWD&langx=gb&uid=G47bca9cza834n1fz1oefhi9z56jdoaz142"></script>
<script type="text/javascript">
    /**
     * 登入表單效果
     * @param _o object {
     *     Opacity : 標題透明度
     *     MS      : 標題顯示速度
     *   }
     */
    $.fn.InputLabels = function(_o) {
        var o = {
            'Opacity' : 0.5,
            'MS'      : 300,
            'next'    : false
        };
        $.extend(o, _o);

        return this.each(function() {
            var label = $(this);
            var input = o.next ? $(this).next('input[name=' + $(this).attr('name') + ']') : $('input[name=' + $(this).attr('name') + ']');
            var show = true;

            // 預防瀏覽器記帳密機制
            setTimeout(function () {
                this.opacity = (input.val() == "") ? 1.0 : 0;
                label.css('opacity' , this.opacity);
            }, 300);

            label.click(function(){
                input.trigger('focus');
            });

            input.focus(function() {
                if (input.val() == "") {
                    setOpacity(o.Opacity);
                }
            }).blur(function() {
                    if (input.val() == "") {
                        if (!show) {
                            label.css({ opacity: 0.0 }).show();
                        }
                        setOpacity(1.0);
                    } else {
                        setOpacity(0.0);
                    }
                }).keydown(function(e) {
                    if ((e.keyCode == 16) || (e.keyCode == 9) || (e.keyCode == 13)) return;
                    if (show) {
                        label.hide();
                        show = false;
                    }
                });

            var setOpacity = function(opacity) {
                label.stop().animate({'opacity' : opacity }, o.MS);
                show = (opacity > 0.0);
            };
        });
    };
    $(function() {
        // 表單 label 字暫留效果
        $('#JS-forgetpwd-form').find('label').InputLabels();
    });

    var password_old = document.chgFORM.password_old,
        password = document.chgFORM.password,
        REpassword = document.chgFORM.REpassword;

    //ADVANCED
    $(".password_adv").passStrength({
        userid:         "#userid",
        shortPass_txt: '密码强度：太短',
        badPass_txt:   '密码强度：弱',
        goodPass_txt:  '密码强度：很好',
        strongPass_txt: '密码强度：强',
        samePassword_txt: '帐号与密码不能相同'
    });

    function SubChk(){
        if (password_old.value==''){
            password_old.focus();
            alert("旧密码错误");
            return false;
        }
        if (password.value == ''){
            password.focus();
            alert("密码请务必输入!");
            return false;
        }

        // 密碼過短
        if(password.value.length > 0 && password.value.length < 6){
            password.focus();
            alert('密码长度不能少于6个字元');
            return false;
        }

        // 強度太弱
        if($('#memAccTable').find('.top_badPass')[0]){
            password.focus();
            alert($('#memAccTable').find('.top_badPass').text());
            return false;
        }

        // 特殊字元
        if(/[^a-z0-9]/g.test(password.value)){
            password.focus();
            alert('密码须符合0~9及a~z字元');
            return false;
        }

        // 密碼過長
        if(password.value.length > 12){
            password.focus();
            alert('密码长度不能多于12个字元');
            return false;
        }

        if (REpassword.value == ''){
            REpassword.focus();
            alert("确认密码请务必输入!");
            return false;
        }

        // 確認密碼不符
        if(password.value != REpassword.value){
            REpassword.focus();
            alert("确认密码错误,请重新输入!");
            return false;
        }
    }
</script>
<style>
    body{
        text-align: center;
        background: #000;
    }    
#site_sitemoney{
    margin: 0 auto;
    padding: 0px;
    height: 246px;
    width: 600px;
}
.Hyzx-table {
    border-collapse: collapse;
    width: 100%;
}
.Hyzx-table th {
    background: #875e5a;
    color: #fff;
}
.Hyzx-table td, .Hyzx-table th {
    border-right: 0 none;
    font: 12px/40px arial;
    height: 40px;
}
.Hyzx-table td {
    border-top: 1px solid #EFEAE5;
    border-bottom: 1px solid #EFEAE5;
    background: #fff;
    padding: 0 10px;
}
.Hyzx-btn:hover, .Hyzx-btn.active {
    background: #875e5a;
}
.Hyzx-btn {
    display: block;
    font: 12px/26px arial;
    height: 26px;
    color: #fff;
    text-align: center;
    padding: 0 18px;
    background: #ab8c84;
    transition: all 0.3s;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
}
td, th {
    display: table-cell;
    vertical-align: inherit;
}
table {
    text-align: center;
    vertical-align: middle;
}
th {
    text-align: center;
    vertical-align: middle;
}
select, input {
    border-radius: 3px;
    outline: none;
}
</style>
</body>
</html>