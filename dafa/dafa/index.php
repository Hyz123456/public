<?php
ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息
if(!isset($_SESSION)){ session_start();}
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "./app/member/include/config.inc.php";
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/website.php");
if($web_site['close']) {
    header("location:/close_index.php");
    exit();
}

if(isset($_GET["intr"]) && !empty($_GET["intr"])){
    $sql = "select agents_name from agents_list where id='".intval($_GET["intr"])."'";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();
    if($rs && $rs["agents_name"]){
        $_SESSION["agent_name"] = $rs["agents_name"];
        $_SESSION["agent_id"] = $_GET["intr"];
    }else{
        $_SESSION["agent_name"] = "";
        $_SESSION["agent_id"] = "";
    }
}/*else{
    $_SESSION["agent_name"] = "";
    $_SESSION["agent_id"] = "";
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$web_site["web_name"]?> - 綫上娛樂第一品牌</title>
<meta name="description" content="太陽城娛樂" />
<meta name="keywords" content="太陽城娛樂 - 綫上娛樂第一品牌" />
<link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="ico.ico">
<script src="/cl/js/jquery-1.7.2.min.js"></script>
<script src="/cl/js/common.js"></script>
<script src="/cl/js/tools/upup.js" data-ltl="Y" id="upupjs"></script>
 <script src="/cl/js/tools/float.js"></script>
<script src="/cl/js/pluging/swfobject.js"></script>
<script src="/cl/js/pluging/jquery.cookie.js"></script>
<script src="/cl/tpl/starball/ver1/js/starball.js"></script>
<script src="/cl/js/tools/ScrollPic.js"></script>
<script src="/cl/js/pluging/jquery.ifixpng.js"></script>
<script src="/cl/js/tools/tab.js"></script>

<script type="text/javascript">
    <?php
    $murl = $_SERVER['HTTP_HOST'];
    if(stristr($murl,'www')){
        $murl = str_replace('www','m',$murl);
        $murl = 'http://'.$murl;
    }else{
        $murl = 'http://'.$murl.'/wap.php';
    }

    ?>
if(/AppleWebKit.*mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))){
    if(window.location.href.indexOf("?mobile")<0){
        try{
            if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){
                window.location.href="<?php echo $murl; ?>";
            }else if(/iPad/i.test(navigator.userAgent)){
                window.location.href="<?php echo $murl; ?>";
            }else{
                window.location.href="<?php echo $murl; ?>"
            }
        }catch(e){}
    }
}
</script>
<style type="text/css">

.about_tops{    
	position: absolute;
    left: 50%;
    margin-left: -530px;
    top: -120px;
    width: 1100px;
    height: 126px;
}
</style>
</head>
<body >

<iframe id="topFrame" name="topFrame" frameborder="0" scrolling="no" width="100%" src="/cl/top.php"   allowtransparency="true" height="320" style="position: relative;z-index: 1;"></iframe>

 
<div id="mainFrameDiv"   style="margin-top: -206px;z-index: 1;">
    <center>
        <iframe allowtransparency="true"  id="mainFrame" name="mainFrame" frameBorder="0" scrolling="no" width="100%" src="/cl/main.php" style="background: transparent;"></iframe>
    </center>
</div>
<div id="bottomFrameDiv">
    <center>
        <iframe id="bottomFrame" name="bottomFrame" frameBorder="0" scrolling="no" width="100%" src="/cl/bottom.php" allowtransparency="true" height="124" ></iframe>
    </center>
</div> 


  
<!-- 两旁显示 开始 -->

 <ul picfloat="left" style="position: absolute; cursor: pointer; z-index: 1000; left: 5px; width: 133px; padding-left: 0px; top: 180px;" class="TplFloatSet" id="TplFloatPic_0">
        <li>
        <a onclick="click_url('/member/lottery/dzyy.php')"  href="javascript:void(0);" target="_blank" style="width: 133px; height: 75px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1495530285.png" style="display: inline;" width="133" height="75">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1495530285.png" width="133" height="75">
        </a>
    </li>

        <li>
        <a onclick="click_url('/cl/offer.php')" href="javascript:void(0);" target="_blank" style="width: 133px; height: 60px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1485162292.png" style="display: inline;" width="133" height="60">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1485162292.png" width="133" height="60">
        </a>
    </li>

        <li>
        <a href="javascript:void(0);" target="_blank" style="width: 133px; height: 136px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1494837158.png" style="display: inline;" width="133" height="136">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1494837158.png" width="133" height="136">
        </a>
    </li>

        <li>
        <a onclick="FloatClose(this);" href="javascript:;" style="width: 133px; height: 22px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1485162325.png" style="display: inline;" width="133" height="22">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1485162325.png" width="133" height="22">
        </a>
    </li>

    </ul>

<ul picfloat="right" style="position: absolute; cursor: pointer; z-index: 1000; right: 5px; width: 133px; top: 180px;" class="TplFloatSet" id="TplFloatPic_1">
        <li>
        <a href="javascript: window.open('<?=$web_site["web_kefu"]?>', '在线客服', 'height=500, width=700, top=200, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');"  style="width: 133px; height: 76px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1485163011.png" style="display: inline;" width="133" height="76">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1485163011.png" width="133" height="76">
        </a>
    </li>
        <li>
        <a onclick="" href="javascript:void(0);" style="width: 133px; height: 86px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1490109330.png" style="display: inline;" width="133" height="86">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1490109330.png" width="133" height="86">
        </a>
    </li>
        <li>
        <a onclick="" href="tencent://message/?uin=<?=$web_site["web_qq"]?>&Site=qq&Menu=yes" target="_blank" alt="<?=$web_site["web_name"]?>客服" title="<?=$web_site["web_name"]?>客服" style="width: 133px; height: 109px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1485163030.png" style="display: inline;" width="133" height="109">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1485163030.png" width="133" height="109">
        </a>
    </li>
        <li>
        <a onclick="FloatClose(this);" href="javascript:;" style="width: 133px; height: 22px;">
        <img align="middle" class="png_fix" alt="" src="img/img/hun_a_1485163042.png" style="display: inline;" width="133" height="22">
        <img align="middle" class="png_fix" alt="" style="display: none;" src="img/img/hun_a_1485163042.png" width="133" height="22">
        </a>
    </li>
    </ul>
<style>
    .TplFloatSet a{display:block;margin:0 auto;text-align:center;}
    .TplFloatSet img{vertical-align:bottom;}
    .TplFloatSet li{list-style: none;font-size:0px;}
</style>

<script>
//關閉效果
function FloatClose(t){ $(t).parents('.TplFloatSet').hide(); }
var float_list = [], float_side = 5;
if (typeof(FloatL_Top) == 'undefined' || FloatL_Top == '' || FloatL_Top == 0) {
    var left_top = 180;
}else{
    var left_top = FloatL_Top;
}
if (typeof(FloatR_Top) == 'undefined' || FloatR_Top == '' || FloatR_Top == 0) {
    var right_top = 180;
}else{
    var right_top = FloatR_Top;
}
$(window).load(function() {
// s廳主自改 - 浮動圖V2 -2013.7.19
        float_list['0'] = $('#TplFloatPic_0');
            float_list['1'] = $('#TplFloatPic_1');
        for (var i in float_list) {
       var self = float_list[i],
       picfloat = (self.attr('picfloat') == 'right') ? 1 : 0;self.show().Float({'floatRight' : picfloat, 'topSide' : ((picfloat == 1) ? right_top : left_top), side: float_side});
       var w = 0;
     $.each(self.find('img'), function(){
            var width = $(this).width();
            w = (width > w) ? width : w;//取圖片最大寬度
            $(this).attr({
                'width' : width,
                'height': $(this).height()
            });
        });
        self.css('width', w);
        if (picfloat) {
            right_top = right_top + 10 + (self.height() || 250);
        } else {
            left_top = left_top + 10 + (self.height() || 250);
        }

        $('a', self).each(function(){
            $(this).css({'width' : $(this).find('img:first').width(),'height' : $(this).find('img:first').height()});
            $(this).hover(function() {
                $(this).find('img:first').hide();
                $(this).find('img:last').show();
            }, function() {
                $(this).find('img:last').hide();
                $(this).find('img:first').show();
            });
        });
    }
});
</script>

<!-- 两旁显示 结束 -->




<!-- 进入界面弹出 开始 -->

<style>
    #Lsj-fkinglayer {
        display: none;
        position: fixed;
        z-index: 9998;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }
</style>
<style>
    .Lsj-Modal {
        display: none;
        z-index: 9999;
        position: absolute; 
        top: 50px; 
        left: 0; 
        right: 0;  
    }
    
    .Lsj_modal-content {
        position: relative;
        z-index:9999;
        background-color: transparent;
        margin: auto;
        padding: 0;
        min-width: 250px;
        max-width: 1000px;
        overflow:hidden;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
    }

    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    .Lsj-close {
        color: #fff;
        float: right;
        padding: 5px 0px;
        font-size: 20px;
        font-weight: bold;
        overflow:hidden;
    }

    .Lsj-close:hover,
    .Lsj-close:focus {
        color: #555;
        text-decoration: none;
        cursor: pointer;
        overflow:hidden;
    }

    .Lsj_modal-header {
        height: 40px;
        padding: 0 10px;
        background-color: transparent;
        color: #fff;
        overflow:hidden;
    }

    .Lsjmodal-body_contents {
        display:block;
        clear:both;
        width:100%;
        min-height: 40px;
        max-height: 550px;
        overflow:hidden;
    }
    .Lsjmodal-body_contents p{
        display:block;
        clear:both;
        width:100%;
        overflow:hidden;
        height:auto;
        font-size:12px;
    }
    .Lsjmodal-body_contents p img {
        padding: 0;
        margin: 0;
        width:100%;
        min-height: 40px;
        max-height: 550px;
        overflow: hidden;
    }

    .Lsj_modal-footer {
        padding: 2px 10px;
        color: #555555;
    }

    .Lsjbtn-bottom-two-right {
        text-align: center;
    }

    .Lsjbtn-bottom-two-right a {
        text-decoration: none;
        color: #fff;
    }

    .Lsj_okBtn {
        display: inline-block;
        margin: 10px;
        padding: 15px 5px;
        border: none;
        outline: none;
        background-color: #3276b1;
        color: #fff;
        font-size: 16px;
        line-height: 5px;
        text-decoration: none;
        cursor: pointer;
        transition: all 150ms ease-out;
        width: 180px;
        letter-spacing: 4px;
        border-radius: 2px;
    }

    .Lsj_okBtn.Lsj_filled:focus, 
    .Lsj_okBtn.Lsj_filled:hover {
        background-color: #3276b1;
        box-shadow: 0 0 0 0.1875rem white, 
            0 0 0 0.375rem #3276b1;
    }
    .Lsj_okBtn.Lsj_filled:active {
        background-color: #285e8e;
        box-shadow: 0 0 0 0.1875rem #285e8e, 
            0 0 0 0.375rem #285e8e;
        transition-duration: 75ms;
    }

    .Lsj_modal-content .Lsj_modal-header h3{
        text-align: center;
        line-height:40px;
        font-weight: 600;
        margin: 0;
        font-size:16px;
    }
</style>
<div id="LsjmyModal" class="Lsj-Modal" style="display: block;">
    <div class="Lsj_modal-content pop_border_color" style="width: 709px;">
        <div class="Lsj_modal-header pop_title_box_bcolor">
            <span class="Lsj-close" onclick="removers();">×</span>
            <h3 class="pop_title_color">【鼎盛国际】www.x1202.com 全网最佳电子游艺平台 官方直营 相信品牌的力量！</h3>
        </div>
        <div class="Lsjmodal-body_contents pop_box_bg_color" style="height: 459px;">
            <p><img src="imgs/hun_a_1496928255.jpg" style="height: 459px;"></p>
        </div>
        <div class="Lsj_modal-footer">
            <div class="Lsjbtn-bottom-two-right">
                <button class="Lsj_okBtn Lsj_outline" onclick="removers(1);">下次不再显示</button>
                <button class="Lsj_okBtn Lsj_filled" onclick="removers();">确定</button>
            </div>
        </div>
    </div>
    <div id="Lsj-fkinglayer" style="display: block;"></div>
</div>
<style type="text/css">
    /*标题栏背景色*/
    .pop_title_box_bcolor{
        background:#f5eded;
    }
    /*    标题颜色*/
    .pop_title_color{color:#080808;}
    /*    背景色*/
    .pop_box_bg_color{background:#f5ebeb}
    /*    边框颜色*/
    .pop_border_color{border:2px solid #f5eded;}
    .Lsj_modal-footer{
        background-color: #F7F7F7;
    }
    /*  Button */

    .Lsj_okBtn.Lsj_outline {
        border: 2px solid #555555;
        background-color: transparent;
        color: #555555;
    }
    .Lsj_okBtn.Lsj_outline:focus, 
    .Lsj_okBtn.Lsj_outline:hover {
        border-color: #555555;
        box-shadow: 0 0 0 0.1875rem white, 
            0 0 0 0.375rem #555555;
        color: #555555;
    }
    .Lsj_okBtn.Lsj_outline:active {
        border-color: #555555;
        color: #555555;
        box-shadow: 0 0 0 0.1875rem #555555, 
            0 0 0 0.375rem #555555;
        transition-duration: 75ms;
    }
</style>
<script>
    $(document).ready(function(){ 
        $("#LsjmyModal").hide();
        $('#Lsj-fkinglayer').hide();
    });
</script>
<script>
    function removers(i) {
        if (i == 1) {
            $.cookie('PKBET_ORG', 'Y', {path: '/', expires: ''});
        }
        $('#LsjmyModal').remove();
    }
    $(window).load(function(){
        if ($.cookie('PKBET_ORG')){
            $("#LsjmyModal").hide();
            $('#Lsj-fkinglayer').hide();
            return;
        }else{

            var label_empty=$(".Lsjmodal-body_contents").find("img").length;
            if(label_empty){
                var img_obj = new Image();
                img_obj.src=$(".Lsjmodal-body_contents img").attr('src');
                var img_width=img_obj.width;
                var img_height=img_obj.height;
                $(".Lsj_modal-content").css('width',img_width);
                $(".Lsjmodal-body_contents").css('height',img_height);
                $(".Lsjmodal-body_contents p img").css('height',img_height);
            }else{
                $(".Lsj_modal-content").css('width',720);
            }
            $('#Lsj-fkinglayer').show();
            $("#LsjmyModal").show();    
        }
    });
</script>
<!-- 进入界面弹出 结束 -->



<!-- 回到顶部按钮-开始 -->
<style type="text/css">
    #ele-float-top-wrap {
    position: fixed;
    right: 5px;
    bottom: 51px;
    min-width: 40px;
    z-index: 20;
}
#ele-float-top{
    position: absolute;
    left: 0px;
    top: 0px;
    width: 40px;
    display: none;
}
.ele-float-top-btn {
    margin-top: 2px;
    display: block;
    position: relative;
    height: 40px;
    border-radius: 3px;
    transition: opacity 0.6s ease;
    background-color: white;
    background-position: 50% 0;
    background-repeat: no-repeat;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(opacity=80);
    filter: alpha(opacity=80);
    opacity: 0.8;
    }
#ele-float-top-up {
    display: none;
    cursor: pointer;
    margin-top: -40px;
}
.ele-float-top-btn:hover {
    -ms-filter: progid:DXImageTransform.Microsoft.Alpha(opacity=100);
    filter: alpha(opacity=100);
    opacity: 1;
    background-position: 50% 100%;
}
</style>
<div id="ele-float-top-wrap">
    <div id="ele-float-top" style="display: block;">
        <div id="ele-float-top-up" class="ele-float-top-btn" style="display:block; background-image: url('img/float_top_up.png');"></div>
    </div>
</div>
<script type="text/javascript">
 $(window).scroll(function(){
   var sc=$(window).scrollTop();
   var rwidth=$(window).width();

   if(($(window).height()*0.3)<sc){
    $("#ele-float-top-up").css("display","block");
   }else{
   $("#ele-float-top-up").css("display","none");
   }
 })
 $("#ele-float-top-up").click(function(){
   var sc=$(window).scrollTop();
   $('body,html').animate({scrollTop:0},500);
 })
</script>

<!-- 回到顶部按钮-结束 -->
<!-- 弹窗登录 开始 -->
 <form name="LoginForm" id="LoginForm" onsubmit="return false;">  
<div class="zhu-modal zhu-amd zt_tkdl" style="display: none">
    <div class="zhu-modalPanel zhu-amd login" style="undefined">
        <div class="zhu-modalHead" style="undefined">登&nbsp;&nbsp;录</div>
        <div class="zhu-modalBody">
            <div class="login-box">
                <label>
                    <span>用户名 : </span>
                    <input type="text" onfocus="if(this.value=='账号'){this.value='';}" onblur="if(this.value==''){this.value='账号';document.getElementById('mockpass').focus();}else{document.getElementById('mockpass').focus();}" value="账号" maxlength="20" tabindex="1" id="username" name="username">
                </label>
                <label>
                    <span>密&nbsp;&nbsp;码 : </span>
                    <input type="password"  class="sinpt denginpt" id="mockpass" value="·····" onfocus="document.getElementById('mockpass').style.display='none'; document.getElementById('passwd').style.display=''; document.getElementById('passwd').focus();">
                    <input type="password" style="display: none;" onblur="if(this.value=='') {document.getElementById('passwd').style.display='none'; document.getElementById('mockpass').style.display='';}" class="login login_input01" id="passwd" name="passwd">
                </label>
                <label><span>验证码 : </span>
                    <input  type="text" value="验证码"  onblur="if(this.value=='') {this.value=this.defaultValue}" class="rmNum  login_input02" id="rmNum" maxlength="4" name="rmNum" style="width:95px;">
                    <img width="38" height="19" border="0" align="absmiddle" src="/imgs/no.png" onclick="getKey();" id="vPic">
                </label>
                <label><span>&nbsp; </span><a href="javascript:window.location.href='/cl/reg.php';" class="zhu-registLink">免费注册账号</a></label>
            </div>
        </div>
        <div class="zhu-modalFoot">
             <a class="zhu-enterBtn frt"  id="submit" onclick="aLeftForm1Subtkasdf();" href="javascript:void(0);" id="ibtnLogin" name="formsub">登&nbsp;&nbsp;录</a>
            <a href="javascript:;" class="zhu-cancelBtn frt qx_tkdl" >取&nbsp;&nbsp;消</a>
            <div class="clr"></div>
        </div>
    </div>
</div>
</form>
<style>
.zhu-amd{
    transition:all 1s;
    -webkit-transition:all 1s;
    -o-transition:all 1s;
    -moz-transition:all 1s;
    -ms-transition:all 1s;
}
.zhu-modalPanel.zhu-amd{
    transition:all 0.7s;
    -webkit-transition:all 0.7s;
    -o-transition:all 0.7s;
    -moz-transition:all 0.7s;
    -ms-transition:all 0.7s;
}
.zhu-modal {
    position: fixed;
    width: 100%;
    left: 0;
    top: 0;
    bottom: 0;
    background: rgba(0,0,0,0.6);
    z-index: 2000;
}
.zhu-transparent .zhu-modalPanel{
    top:30%;
}

.zhu-modalHead{
    color: #fff;
}
.zhu-enterBtn{
    color: #fff;
}
.zhu-cancelBtn{
    color: #fff;
}
.zhu-registLink{
    color: #DA6946;
}
.zhu-modal{position: fixed;width: 100%;left:0;top: 0;bottom: 0;background: rgba(0,0,0,0.6);z-index: 2000;}
.zhu-modalPanel{
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%,-80%);
    -ms-transform: translate(-50%,-80%);
    -moz-transform: translate(-50%,-80%);
    -webkit-transform: translate(-50%,-80%);
    -o-transform: translate(-50%,-80%);
    border-radius: 5px;
    border:1px solid #efefef;
    background: #efefef;
    overflow: hidden;
    box-shadow: 1px 1px 70px rgba(0,0,0,0.75);
    min-width: 280px;
}
.zhu-modalPanel.login{
    width: 380px;
}
.zhu-modalHead{
    height: 50px;
    background: #271313;
    line-height: 50px;
    font:20px/46px Microsoft YaHei;
    padding:0 20px;
    overflow: hidden;
    text-shadow: 0 0 7px #000;
}
.zhu-modalBody{
    padding: 20px 25px 0px 25px;
    max-height: 300px;
    overflow-y:auto;
    color: #333;
}
.zhu-modalBody p{
    font: 16px/22px Microsoft YaHei;
}
.zhu-modalFoot{
    background: #efefef;
    padding:8px 10px;
    position: relative;
}
.zhu-modalFoot:before{
    content: "";
    display: block;
    position: absolute;
    top: -2px;
    left: 0;
    height: 1px;
    width: 100%;
    background:#efefef;
}
.zhu-enterBtn,
.zhu-cancelBtn{
    text-decoration: none;
    display: block;
    border-radius: 5px;
    height: 30px;
    font:14px/30px Microsoft YaHei;
    width: 90px;
    text-align: center;
    margin:0 5px;
    overflow: hidden;
}
.zhu-enterBtn:hover,
.zhu-cancelBtn:hover,
.zhu-enterBtn:focus,
.zhu-cancelBtn:focus
{
    color: #fff;
}
.zhu-enterBtn{
    background: #271313;
}
.zhu-enterBtn span{
    position: relative;
    z-index: 3;
}
.zhu-cancelBtn{
    background: #999;
}
.zhu-modalPanel.login .zhu-registLink{
    font-size:12px; 
    text-decoration: none;
}
.zhu-modalPanel.login .zhu-registLink:hover{
    text-decoration: underline;
}
.zhu-modalPanel.login label{
    display: block;
    margin-bottom: 10px;
    box-sizing: border-box;
}
.zhu-modalPanel.login label span{
    display: inline-block;
    width:30%;text-align: right;
    color:#666;
    font:14px/30px Microsoft YaHei;
    padding-right: 20px;
    box-sizing: border-box;
}
.frt {
    float: right;
}
.zhu-modalPanel.login label input[type="text"], .zhu-modalPanel.login label input[type="password"] {
    display: inline-block;
    width: 68%;
    color: #666;
    font: 14px/30px Microsoft YaHei;
    padding: 0 10px;
    border-radius: 3px;
    border: 1px solid #ddd;
    vertical-align: middle;
    box-sizing: border-box;
}

blockquote, body, code, dd, div, dl, dt, fieldset, form, h1, h2, h3, h4, h5, h6, input, legend, li, ol, p, pre, td, textarea, th, ul {
    margin: 0;
    padding: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    font-family: "Microsoft Yahei","Hiragino Sans GB","Simsun,sans-self";
}
.zhu-modalPanel .login-box {
    padding: 0 25px;
}
</style>
<script type="text/javascript">
(function(){
    $('#rmNum').on('focus',function(){
            $('#vPic').attr('src','/yzm.php?'+Math.random());
            if(this.value==this.defaultValue) {
                this.value='';
            }
    });
    $(".qx_tkdl").click(function(){
        $(".zt_tkdl").hide();
  });
})();

    //最新消息
    $.ajax({
        type: 'POST',
        url: '?module=MGetData&method=GetHotNews&_r=' + Math.random(),
        cache: false,
        success: function (data) {
            $('#msgNews').html(data.replace(/<\s*br\/*>/gi, "&nbsp;&nbsp;"));
        }
    });
    // 密碼驗證
    $('input[name=passwd]').LoginPW({
       // 'Upper': '提醒：密码须为小写，大写锁定启用中',
        'Short': '密码长度不能少于6个字元',
        'Long': '密码长度不能多于20个字元'
        //'False': '密码须符合0~9及a~z字元'
    });
    function inputCheck() {
        if (document.LoginForm.username.value == "") {
            alert('请输入帐号!!');
            document.LoginForm.username.focus();
            return false;
        } else if (document.LoginForm.passwd.value == "") {
            alert('请输入密码!!');
            document.LoginForm.passwd.focus();
            return false;
        } else if (document.LoginForm.passwd.value.length > 0 && document.LoginForm.passwd.value.length < 6) {
            alert('密码长度不能少于6个字元');
            document.LoginForm.passwd.focus();
            return false;
        } else if (document.LoginForm.rmNum.value == "") {
            alert('请输入验证码!!');
            document.LoginForm.rmNum.focus();
            return false;
        }
        return true;
    }
    function Go_forget_pwd() {
        window.open("/app/member/forget_pwd.php?uid=guest", "Go_forget_pwd", "width=350,height=250,status=no");
    }

    function Language(langx) {
        parent.location = '".BROWSER_IP."';
    }

    function getKey() {
        $("#vPic").attr("src",'/yzm.php?'+Math.random());
        $("#vPic").css("display", "inline");
        $("#crPic").css("display", "inline");
        $("input[name='rmNum']").val("");
    }
   
</script>
<!-- 弹窗登录结束 -->
</body>
</html>
<?php
$mysqli->close();
?>
