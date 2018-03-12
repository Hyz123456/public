<?php 
ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
if(!isset($_SESSION)){ session_start();}
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/class/user.php");

$uid = $_SESSION['userid'];
$username = $_SESSION['username'];

$userInfo=user::getinfo($uid);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>安全设置</title>
    <link rel="stylesheet" href="/tpl/template/style/password.css" type="text/css">
	<script type="text/javascript" src="/js/jquery-1.7.1.js"></script>
	<style>
	#yue{background-color:#DCDCDC;width:705px;height:147px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}
	#yue img{margin-top: 7px;margin-left: 18px;}
	#yue1{background-color:#DCDCDC;width:705px;height:99px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}
	.kkk1{width:175px;height:53px;border-bottom: 1px solid #C2C2C2;text-indent: 1em;float:left;padding-top:4px;
    border-right: 1px solid #C2C2C2;}
	.kkk2{margin-top: 7px;color:red;display:none;}
	.tab1{width: 194px;height: 31px;line-height: 31px;text-align: center;font-family: 微软雅黑;font-size: 15px;color: #fff;float:left;}
	.tx{width: 705px;height: 19px;background-color: #ccc;clear: both;text-align: right;color: #000;line-height: 19px;font-size: 13px;}
	.tab2{cursor:pointer;width:194px;height:49px;border-right:1px solid #C2C2C2;float:left;text-align: center;line-height: 49px;}
	.bd{width: 194px;height: 49px;border: none;background-color: #DCDCDC;outline: none;color: #666;font-size: 15px;text-indent: 1em;font-family: 微软雅黑;}
    .qr{width: 120px;border: none;height: 50px;outline: none;color: #ccc;background:#00778C;font-weight: bold;font-size: 15px;font-family: 微软雅黑;}
	.xiala{width:192px;height:78px;line-height:26px;text-align:center;background-color:#EDEDED;border:1px solid #D6D6D6;overflow: auto;overflow-x:hidden}
	.xiala1{cursor:pointer;width:192px;height:26px;line-height:26px;text-align:center;background-color:#EDEDED;}
/*定义滚动条高宽及背景 高宽分别对应横竖滚动条的尺寸*/
.xiala::-webkit-scrollbar
{
    width: 10px;
    height: 10px;
    background-color: #F5F5F5;
}
/*定义滚动条轨道 内阴影+圆角*/
.xiala::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}
/*定义滑块 内阴影+圆角*/
.xiala::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #999;
}
/*鼠标滑过滑动条*/
.xiala::-webkit-scrollbar-thumb:hover{
	background-color:#666;
}
.xiala1:hover{background-color:#6A8A8C;}
#zhuanru, #zhuanchu{
	display:none;
	-webkit-transition: .3s height linear;
	-o-transition: .3s height linear;
	transition: .3s height linear;
}
</style>
</head>
<body id="chgPasswd" oncontextmenu="window.event.returnValue=false">
<div id="MACenterContent">
    <div id="MNav">
        <div class="navSeparate"></div>
    </div>
	
	<div id="yue">&#12288;
	<div style="width:1px;height:17px;"></div>
	<div class="kkk1">帐户</div>
	<div class="kkk1">余额</div>
	<div class="kkk1" style="">密码</div>
	<div class="kkk1" style="">取款密码</div>
	<div class="kkk1"><?=$userInfo["user_name"]?></div>
	<div class="kkk1"><?=$userInfo["money"]?></div>
	<div class="kkk1" style=""><input type="button" id="changepw" value="修改" /> </div>
	
	<div class="kkk1" style=""><input type="button" id="change_qk" value="修改" /></div>


</div>

	
	
	
	
	
	
	
	
	
	
	
	
	<?php /*
    <div id="MMainData" style="width:85%;">
       <!-- <h2 class="MSubTitle">基本资讯</h2>-->
        <table class="MMain" border="1" style="margin-bottom: 8px;">
            <tr>
                <th nowrap>帐户</th>
                <th nowrap>余额</th>
                <th nowrap>最后登入时间</th>
                <th nowrap>密码</th>
            </tr>
            <tr>
                <td style="text-align: center; width: 15%;"><?=$userInfo["user_name"]?></td>
                <td style="text-align: center; width: 15%;" class="MNumber"><?=$userInfo["money"]?></td>
                <td style="text-align: center; width: 15%;"><?=$userInfo["logintime"]?></td>
                <td style="text-align: center; width: 25%;">
				<input type="button" id="changepw" value="修改密码" /> 
				<input type="button" id="change_qk" value="修改取款密码" />
				</td>
            </tr>
        </table> */?>
        <!--        <h2 class="MSubTitle">有效投注额</h2>-->
        <!--        <table class="MMain" border="1">-->
        <!--            <tr>-->
        <!--                <th style="width: 100px;">日期</th>-->
        <!--                <th>金额</th>-->
        <!--            </tr>-->
        <!--            <tr>-->
        <!--                <td style="text-align: center;">03/03~03/19</td>-->
        <!--                <td>0.00&nbsp;&nbsp;( 视讯类_0.00  机率类_0.00  BB体育_0.00  体育投注_0.00  彩票类_0.00  3D类_0.00  )</td>-->
        <!--            </tr>-->
        <!--            <tr>-->
        <!--                <td style="text-align: center;">03/17~03/19</td>-->
        <!--                <td>0.00&nbsp;&nbsp;( 视讯类_0.00  机率类_0.00  BB体育_0.00  体育投注_0.00  彩票类_0.00  3D类_0.00  )</td>-->
        <!--            </tr>-->
        <!--        </table>-->
    </div>
</div>
<script type="text/javascript">
    $("#changepw").click(function() {
		
        window.open('/app/member/account/chg_passwd.php','Chg_pass','width=360,height=320,status=no,scrollbars=yes').focus();
    });
    $("#change_qk").click(function() {
        window.open('/app/member/account/chg_qk_qassw.php','Chg_pass','width=360,height=320,status=no,scrollbars=yes').focus();
    });
 
	
</script>
</body>
</html>
