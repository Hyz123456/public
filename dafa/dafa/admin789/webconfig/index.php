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
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once("../class/admin.php");
include_once($C_Patch."/app/member/cache/website.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改网站信息");

$result = "";
if($_GET["action"] == "save_web_info"){
    $sql	=	"update sys_config set web_name='".$_POST["web_name"]."',close='".intval($_POST["close"])."',reg_msg_title='".$_POST["reg_msg_title"]."',
            reg_msg_info='".$_POST["reg_msg_info"]."',reg_msg_from='".$_POST["reg_msg_from"]."',conf_www='".$_POST["conf_www"]."',end_close_time='".$_POST["end_close_time"]."',
            service_email='".$_POST["service_email"]."',generalize_email='".$_POST["generalize_email"]."',complain_email='".$_POST["complain_email"]."',contact_tel='".$_POST["contact_tel"]."',
            check_url1='".$_POST["check_url1"]."',check_url2='".$_POST["check_url2"]."',check_url3='".$_POST["check_url3"]."',check_url4='".$_POST["check_url4"]."',
            check_url5='".$_POST["check_url5"]."',check_url6='".$_POST["check_url6"]."',check_url7='".$_POST["check_url7"]."',check_url8='".$_POST["check_url8"]."',
            web_image='".$_POST["web_image"]."',gunqiu_time_min='".$_POST["gunqiu_time_min"]."',gunqiu_time_max='".$_POST["gunqiu_time_max"]."',
            min_qukuan_money='".$_POST["min_qukuan_money"]."',min_change_money='".$_POST["min_change_money"]."'
            ";
    $mysqli->query($sql);
    $tyc_enable_post = $_POST["tyc_close"]==1?"enable_false":"enable_true";
    $sql	=	"update config_p set parameter_value='$tyc_enable_post' where parameter_key='TYC_ENABLE'";
    $mysqli->query($sql);
    $msg_info = "修改了系统参数配置";
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);

    $str	 =	"<?php \r\n";
    $str	.=	"unset(\$web_site);\r\n";
    $str	.=	"\$web_site			=	array();\r\n";
    $str	.=	"\$web_site['close']	=	".intval($_POST["close"]).";\r\n";
    $str	.=	"\$web_site['web_name']	=	'".htmlEncode($_POST["web_name"])."';\r\n";
	$str	.=	"\$web_site['web_kefu']	=	'".htmlEncode($_POST["web_kefu"])."';\r\n";
	$str	.=	"\$web_site['web_qq']	=	'".htmlEncode($_POST["web_qq"])."';\r\n";
    $str	.=	"\$web_site['reg_msg_from']	=	'".htmlEncode($_POST["reg_msg_from"])."';\r\n";
    $str	.=	"\$web_site['reg_msg_title']	=	'".htmlEncode($_POST["reg_msg_title"])."';\r\n";
    $str	.=	"\$web_site['reg_msg_msg']	=	'".htmlEncode($_POST["reg_msg_info"])."';\r\n";
    $str	.=	"\$web_site['end_close_time']	=	'".htmlEncode($_POST["end_close_time"])."';\r\n";
    $str	.=	"\$web_site['service_email']	=	'".htmlEncode($_POST["service_email"])."';\r\n";
    $str	.=	"\$web_site['generalize_email']	=	'".htmlEncode($_POST["generalize_email"])."';\r\n";
    $str	.=	"\$web_site['complain_email']	=	'".htmlEncode($_POST["complain_email"])."';\r\n";
    $str	.=	"\$web_site['contact_tel']	=	'".htmlEncode($_POST["contact_tel"])."';\r\n";
    $str	.=	"\$web_site['check_url1']	=	'".htmlEncode($_POST["check_url1"])."';\r\n";
    $str	.=	"\$web_site['check_url2']	=	'".htmlEncode($_POST["check_url2"])."';\r\n";
    $str	.=	"\$web_site['check_url3']	=	'".htmlEncode($_POST["check_url3"])."';\r\n";
    $str	.=	"\$web_site['check_url4']	=	'".htmlEncode($_POST["check_url4"])."';\r\n";
    $str	.=	"\$web_site['check_url5']	=	'".htmlEncode($_POST["check_url5"])."';\r\n";
    $str	.=	"\$web_site['check_url6']	=	'".htmlEncode($_POST["check_url6"])."';\r\n";
    $str	.=	"\$web_site['check_url7']	=	'".htmlEncode($_POST["check_url7"])."';\r\n";
    $str	.=	"\$web_site['check_url8']	=	'".htmlEncode($_POST["check_url8"])."';\r\n";
    $str	.=	"\$web_site['ag_hall']	=	'".htmlEncode($_POST["ag_hall"])."';\r\n";
    $str	.=	"\$web_site['ag_viphall']	=	'".htmlEncode($_POST["ag_viphall"])."';\r\n";
    $str	.=	"\$web_site['tyc_hall']	=	'".htmlEncode($_POST["tyc_hall"])."';\r\n";
    $str	.=	"\$web_site['hk_sxf']	=	'".htmlEncode($_POST["hk_sxf"])."';\r\n";
    $str	.=	"\$web_site['caipiao_auto_time']	=	'".htmlEncode($_POST["caipiao_auto_time"])."';\r\n";
    $str	.=	"\$web_site['lhc_auto_time']	=	'".htmlEncode($_POST["lhc_auto_time"])."';\r\n";
    $str	.=	"\$web_site['sport_auto_time']	=	'".htmlEncode($_POST["sport_auto_time"])."';\r\n";
    $str	.=	"\$web_site['auto_zhenren']	=	'".htmlEncode($_POST["auto_zhenren"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenag']	=	'".htmlEncode($_POST["auto_zhenrenag"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenmg']	=	'".htmlEncode($_POST["auto_zhenrenmg"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenna']	=	'".htmlEncode($_POST["auto_zhenrenna"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenpt']	=	'".htmlEncode($_POST["auto_zhenrenpt"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenbb']	=	'".htmlEncode($_POST["auto_zhenrenbb"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenab']	=	'".htmlEncode($_POST["auto_zhenrenab"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenbh']	=	'".htmlEncode($_POST["auto_zhenrenbh"])."';\r\n";
	$str	.=	"\$web_site['auto_zhenrenbhdz']	=	'".htmlEncode($_POST["auto_zhenrenbhdz"])."';\r\n";
    $str	.=	"\$web_site['notice_regster']	=	'".htmlEncode($_POST["notice_regster"])."';\r\n";
    $str	.=	"\$web_site['show_caipiao']	=	'".htmlEncode($_POST["show_caipiao"])."';\r\n";
    $str	.=	"\$web_site['caipiao_auto']	=	'".htmlEncode($_POST["caipiao_auto"])."';\r\n";
    $str	.=	"\$web_site['lhc_auto']	=	'".htmlEncode($_POST["lhc_auto"])."';\r\n";
    $str	.=	"\$web_site['sport_auto']	=	'".htmlEncode($_POST["sport_auto"])."';\r\n";
    $str	.=	"\$web_site['caipiao_show_row']	=	'".htmlEncode($_POST["caipiao_show_row"])."';\r\n";
    $str	.=	"\$web_site['lhc_show_row']	=	'".htmlEncode($_POST["lhc_show_row"])."';\r\n";
    $str	.=	"\$web_site['sport_show_row']	=	'".htmlEncode($_POST["sport_show_row"])."';\r\n";
    /*if(@!chmod("../../app/member/cache",0777)){ //设置可写入缓存权限
        message("缓存文件写入失败！请先设 /cache 文件权限为：0777");
    }
    if(!write_file($_SERVER['DOCUMENT_ROOT']."\app\member\cache\website.php",$str.'?>')){ //写入缓存失败
        message("缓存文件写入失败！请先设/website.php文件权限为：0777");
    }
    message("网站设置成功!","index.php?1=1");*/
	if(file_put_contents($_SERVER['DOCUMENT_ROOT']."\app\member\cache\website.php",$str.'?>')>0){
		message("设置成功!","?1=1");
	}else{
		message("缓存文件写入失败！请先设/app/member/cache/website.php检查是否有写入权限");
	}
}

$sql	=	"select * from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$rows	=	$query->fetch_array();




?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>用户列表</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" charset="utf-8" src="../../js/jquery-1.7.1.js" ></script>
    <style type="text/css">
        .STYLE2 {font-size: 12px}
        body {
            margin: 0px;
        }
        td{font:13px/120% "宋体";padding:3px;}
        a{
            color:#F37605;
            text-decoration: none;
        }
        .t-title{background:url(../images/06.gif);height:24px;}
        .t-tilte td{font-weight:800;}
        .STYLE4 {
            color: #FF0000;
            font-size: 12px;
        }
    </STYLE>
</HEAD>
<script>
    window.onload = function(){
        if("<?=$result?>"!=""){
            alert("<?=$result?>");
        }
    }
</script>
<body>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap  class="bg_tr"><font >&nbsp;<span class="STYLE2">系统设置</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="100%">
                <tr>
                    <td style="width: 120px;">&nbsp;
                        <a  href="../lottery/LotteryConfig.php"  target="main" class="STYLE2">彩票程序设置</a>
                    </td>
                    <td style="width: 120px;">
                        <a  href="../lottery/config/lottery_six_config.php"  target="main" class="STYLE2">会员组金额设置</a>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table width="100%" style="margin-top: 10px;" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tbody>
    <tr>
        <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">系统设置</span></font></td>
    </tr>
    <form action="index.php?action=save_web_info" method="post" name="editForm1" id="editForm1" >
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" id=editProduct idth="100%">
                    <tr>
                        <td width="160" height="30" align="right">&nbsp;</td>
                        <td width="816"><input name="close" type="checkbox" id="close" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$rows["close"]==1 ? 'checked' : ''?> >
                            网站关闭&nbsp;（出现攻击时请先关闭再排查）</td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  关闭网站截止时间：</td>
                        <td><input name="end_close_time" type="text" class="textfield" id="end_close_time" value="<?=$rows["end_close_time"]?>" size="40"></td>
                    </tr>
					
                    <tr>
                        <td height="30" align="right" >自动真人转账：</td>
                        <td><input name="auto_zhenren" type="checkbox" id="auto_zhenren" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenren']==1 ? 'checked' : ''?> >
                            PS.不勾选则需要人工审核真人转账，勾选则为自动真人转账</td>
                    </tr>
					<tr>
                        <td height="30" align="right" >禁止真人转账：</td>
                        <td>AG:<input name="auto_zhenrenag" type="checkbox" id="auto_zhenrenag" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenrenag']==1 ? 'checked' : ''?> >
						BB:<input name="auto_zhenrenbb" type="checkbox" id="auto_zhenrenbb" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenrenbb']==1 ? 'checked' : ''?> >
						AB:<input name="auto_zhenrenab" type="checkbox" id="auto_zhenrenab" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenrenab']==1 ? 'checked' : ''?> >
						MG:<input name="auto_zhenrenmg" type="checkbox" id="auto_zhenrenmg" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenrenmg']==1 ? 'checked' : ''?> >
						NA:<input name="auto_zhenrenna" type="checkbox" id="auto_zhenrenna" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenrenna']==1 ? 'checked' : ''?> >
						PT:<input name="auto_zhenrenpt" type="checkbox" id="auto_zhenrenpt" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['auto_zhenrenpt']==1 ? 'checked' : ''?> >
                            &nbsp;&nbsp;不勾选则不限制，勾选则为维护中无法转帐</td>
                    </tr>
					 
                    <tr>
                        <td height="30" align="right">  <img src="../images/hi.gif" width="12" height="12"> 网站名称：</td>
                        <td><input name="web_name" type="text" class="textfield" id="web_name"  value="<?=$rows["web_name"]?>" size="40" >&nbsp;*</td>
                    </tr>
                    <tr>
                        <td height="30" align="right">  <img src="../images/hi.gif" width="12" height="12"> 网站域名：</td>
                        <td><input name="conf_www" type="text" class="textfield" id="conf_www"  value="<?=$rows["conf_www"]?>" size="40" >&nbsp;*&nbsp;不要加http://  </td>
                    </tr>
					<tr>
                        <td height="30" align="right">  <img src="../images/hi.gif" width="12" height="12"> 在线客服：</td>
                        <td><input name="web_kefu" type="text" class="textfield" id="web_kefu"  value="<?=$web_site["web_kefu"]?>" size="40" >&nbsp;*&nbsp;</td>
                    </tr>
					<tr>
                        <td height="30" align="right">  <img src="../images/hi.gif" width="12" height="12"> 客服QQ：</td>
                        <td><input name="web_qq" type="text" class="textfield" id="web_qq"  value="<?=$web_site["web_qq"]?>" size="40" >&nbsp;*&nbsp; 只需要设置QQ号码</td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  注册消息标题：</td>
                        <td><input name="reg_msg_title" type="text" class="textfield" id="reg_msg_title" value="<?=$rows["reg_msg_title"]?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="20" align="right" >  注册消息内容：</td>
                        <td>
                            <textarea name="reg_msg_info" cols="80" rows="4" class="textfield"><?=$rows["reg_msg_info"]?></textarea></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  注册消息发送者：</td>
                        <td><input name="reg_msg_from" type="text" class="textfield" id="reg_msg_from" value="<?=$rows["reg_msg_from"]?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  图片域名：</td>
                        <td><input name="web_image" type="text" class="textfield" id="web_image" value="<?=$rows["web_image"]?>" size="40"><span style="color: red;">请输入图片域名，如www.082v.com。请不要在前面加 http:// 以及不要在后面加 /</span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  滚球自动审核时间：</td>
                        <td>
                            大于：<input name="gunqiu_time_min" type="text" class="textfield" id="gunqiu_time_min" value="<?=$rows["gunqiu_time_min"]?>" size="3">
                            小于：<input name="gunqiu_time_max" type="text" class="textfield" id="gunqiu_time_max" value="<?=$rows["gunqiu_time_max"]?>" size="3">
                            (单位：秒)请输入整数
                        </td>
                    </tr>
					
					
					
                    <tr>
                        <!--td height="30" align="right" >  AG娱乐城余额：</td>
                        <td><input name="ag_hall" type="text" class="textfield" id="ag_hall" value="<?=$web_site['ag_hall']?>" size="40"><span style="color: red;">如果小于此金额，则会铃声提示用户 </span></td>
                    </tr>
                    <tr-->
                        <td height="30" align="right" >  用户最低取款金额：</td>
                        <td><input name="min_qukuan_money" type="text" class="textfield" id="min_qukuan_money" value="<?=$rows['min_qukuan_money']?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  真人最低转换金额：</td>
                        <td><input name="min_change_money" type="text" class="textfield" id="min_change_money" value="<?=$rows['min_change_money']?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  修改汇款默认手续费比例：</td>
                        <td><input name="hk_sxf" type="text" class="textfield" id="hk_sxf" value="<?=$web_site['hk_sxf']>0?$web_site['hk_sxf']:0.00?>" size="3"> 说明：如果用户充值100，比例为0.02。用户得到手续费2=100*0.02</td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >注册会员顶部提醒：</td>
                        <td>
                            <input name="notice_regster" type="checkbox" id="notice_regster" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['notice_regster']==1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <!--td height="30" align="right" >六合界面显示彩票经典：</td>
                        <td>
                            <input name="show_caipiao" type="checkbox" id="show_caipiao" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['show_caipiao']==1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >彩票注单界面属性：</td>
                        <td>
                            <input name="caipiao_auto" type="checkbox" id="caipiao_auto" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['caipiao_auto']==1 ? 'checked' : ''?>>
                            （是否自动刷新界面）
                            <input name="caipiao_auto_time" type="text" class="textfield" id="caipiao_auto_time" value="<?=intval($web_site['caipiao_auto_time'])>0?$web_site['caipiao_auto_time']:30?>" size="2">
                            （每次刷新间隔时间，单位秒）
                            <input name="caipiao_show_row" type="text" class="textfield" id="caipiao_show_row" value="<?=intval($web_site['caipiao_show_row'])>0?$web_site['caipiao_show_row']:100?>" size="2">
                            (每页显示几条记录)
                        </td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >六合注单界面属性：</td>
                        <td>
                            <input name="lhc_auto" type="checkbox" id="lhc_auto" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['lhc_auto']==1 ? 'checked' : ''?>>
                            （是否自动刷新界面）
                            <input name="lhc_auto_time" type="text" class="textfield" id="lhc_auto_time" value="<?=intval($web_site['lhc_auto_time'])>0?$web_site['lhc_auto_time']:30?>" size="2">
                            （每次刷新间隔时间，单位秒）
                            <input name="lhc_show_row" type="text" class="textfield" id="lhc_show_row" value="<?=intval($web_site['lhc_show_row'])>0?$web_site['lhc_show_row']:100?>" size="2">
                            (每页显示几条记录)
                        </td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >体育注单界面属性：</td>
                        <td>
                            <input name="sport_auto" type="checkbox" id="sport_auto" style='HEIGHT: 13px;width: 13px;' value="1"  <?=$web_site['sport_auto']==1 ? 'checked' : ''?>>
                            （是否自动刷新界面）
                            <input name="sport_auto_time" type="text" class="textfield" id="sport_auto_time" value="<?=intval($web_site['sport_auto_time'])>0?$web_site['sport_auto_time']:30?>" size="2">
                            （每次刷新间隔时间，单位秒）
                            <input name="sport_show_row" type="text" class="textfield" id="sport_show_row" value="<?=intval($web_site['sport_show_row'])>0?$web_site['sport_show_row']:100?>" size="2">
                            (每页显示几条记录)
                        </td>
                    </tr>
                    <tr-->
                        <td height="30" align="right" >  客服email：</td>
                        <td><input name="service_email" type="text" class="textfield" id="service_email" value="<?=$rows["service_email"]?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  推广email：</td>
                        <td><input name="generalize_email" type="text" class="textfield" id="generalize_email" value="<?=$rows["generalize_email"]?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  投诉email：</td>
                        <td><input name="complain_email" type="text" class="textfield" id="complain_email" value="<?=$rows["complain_email"]?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  客服联系电话：</td>
                        <td><input name="contact_tel" type="text" class="textfield" id="contact_tel" value="<?=$rows["contact_tel"]?>" size="40"></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址1：</td>
                        <td><input name="check_url1" type="text" class="textfield" id="check_url1" value="<?=$rows["check_url1"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址2：</td>
                        <td><input name="check_url2" type="text" class="textfield" id="check_url2" value="<?=$rows["check_url2"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址3：</td>
                        <td><input name="check_url3" type="text" class="textfield" id="check_url3" value="<?=$rows["check_url3"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址4：</td>
                        <td><input name="check_url4" type="text" class="textfield" id="check_url4" value="<?=$rows["check_url4"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址5：</td>
                        <td><input name="check_url5" type="text" class="textfield" id="check_url5" value="<?=$rows["check_url5"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址6：</td>
                        <td><input name="check_url6" type="text" class="textfield" id="check_url6" value="<?=$rows["check_url6"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址7：</td>
                        <td><input name="check_url7" type="text" class="textfield" id="check_url7" value="<?=$rows["check_url7"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" >  线路检测网址8：</td>
                        <td><input name="check_url8" type="text" class="textfield" id="check_url8" value="<?=$rows["check_url8"]?>" size="40"><span style="color: red;">请输入线路检测网址，如www.082v.com。请不要在前面加 http:// </span></td>
                    </tr>
					
                    <tr>
                        <td height="30" align="right">&nbsp;</td>
                        <td valign="bottom"><input name="submitSaveEdit" type="submit" class="button"  id="submitSaveEdit" value="保存" style="width: 60;" ></td>
                    </tr>
                    <tr>
                        <td height="20" align="right">&nbsp;</td>
                        <td valign="bottom">&nbsp;</td>
                    </tr>
                </table></td>
        </tr>
    </form>
    </tbody>
</table>
</body>

<!-- <script type="text/javascript" src='/js/jquery-1.7.1.js'></script> -->
<script type="text/javascript">
    function confirmChangeMoney(){
        if(confirm("确定设置反水吗？")){
			//$a=1;
			//var bhfs=document.getElementById('bhfs').value;
       var bhfs=$("#bhfs").val();
	   if(bhfs<'0' ||bhfs >'1'){
	    alert('反水比例错误,反水比例最多为1%');return ;
	   }
	   if(bhfs=="<?=$rows['bhfs']?>"){
	   alert('未修改反水比例');return;
	   }
	  
           $.ajax({
                type:'post',
                url:'bhfs.php?action=save',
                data:{'bhfs':bhfs},
                beforeSend:function(x){
                    console.log(this.data.bhfs);
					
                },
                success:function(d){
					
					$(".mask").css("display", "none");
					d = eval('('+d+')');
					
                    if(d=='1'){
					alert('反水设置成功');}
					else{
					alert('反水设置失败');
					
					}
                    
                },
				complete : function(XMLHttpRequest,status){ //请求完成后最终执行参数
	　　　　		if(status=='timeout'){
	　　　　　		alert("超时");
	　　　　		}
						if(status=='error'){
	　　　　　		alert("远程服务器错误，请稍候再试");
	　　　　		}
	　　		}
            })

        }
    }
</script>
</html>

<?php
$mysqli->close();
?>