<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg = sys_announcement::getOneAnnouncement();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member Center</title>
<link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet" type="text/css" />

<link href="/cl/tpl/commonFile/css/jquery-ui/start/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
/*共用*/
input{
    padding-left:6px;
    padding-right:6px;
}
body{
    background-color:#FFFFFF;
}
.bodyStyle{
    background-color:#FFFFFF;
}
.skinbg{
    background-color:#FBE9AC;
}
/*會員中心*/
#MACenter #MALogo {
    float: left;
   /* background: url(/images/logo.png) top left no-repeat;*/
    display: inline;
    margin: 12px 0 0 30px;
    width: 170px;
    height: 80px;
}
/*忘記密碼*/
#forgetPwd{
    width:300px;
    margin:35px auto;
    font-size:12px;
    color:#000000;
}
#forgetPwd table{
    background-color:#401109;
}
#forgetPwd table thead,
#forgetPwd table tfoot{
    color:#FFFFFF;
    text-align:center;
}
#forgetPwd table tbody{
    background-color:#FFFFFF;
}
#forgetPwd table td.style1{
    text-align:right;
    text-indent: 1em;
    padding-right:5px;
    width:50%;
}
#bottom-text{
    text-align:left;
}
.error{
    color:#FF0000;
}

/*修改密碼、修改帳號共用*/
#memAccTable{
    border-collapse:collapse;
    text-align:center;
}
#memAccTable table{
    background-color:#401109;
    border-collapse:collapse;
    margin: 0 auto;
    text-align:left;
}
#memAccTable table tr td{
    border:1px solid #666666;
    height:30px;
}
#memAccTable table thead,
#memAccTable table tfoot{
    color:#FFFFFF;
    font-size:12px;
    padding-left:59px;
    height:37px;
    text-align:center;
}
#memAccTable table thead td{
    text-align:left;
    padding-left:59px;
}
#memAccTable table tbody{
    color:#000000;
    background-color:#FFFFFF;
    font-size:12px;
    text-align:left;
}
#memAccTable table .tipText{
    width:50%;
    text-align:right;
    padding-right:5px;
}
#memAccTable table .tipDwText{
    width:40%;
    text-align:right;
    padding-right:5px;
}
#memAccTable table .bottomTip{
    font-size:11px;
    text-align:center;
    background-color:#F7D539;
    height:40px;
}
#memAccTable table  .modifyProfileTitle{
    font-weight:normal;
    font-size:12px;
    text-align:center;
    padding-left:0;
}
a.chg_passwd_flag {
    color:#FFFFFF;
    text-decoration:none;
}
/*額度轉換、會員資料*/
#mainContent{
    font-size:12px;
    border:1px solid #707161;
}
#pageTitle{
    background-color:#616A74;
    color: #FFFFFF;
    padding: 4px 0 0 10px;
}
#tableWrap{
    background-color:#CBD1D4;
    border-width:0 1px 1px;
    border-color:#707161;
    border-style:solid;
    padding:1px 2px 2px;
}
.tableStyle01{
    border:1px solid #666666;
    margin: 0px auto;
    text-align:center;
    width:100%;
}
.tableStyle01 th{
    background-color:#999999;
    border:1px solid #666666;
    color:#000000;
    font-weight:normal;
    text-align:center;
    height: 23px;
    line-height: 23px;
}
.tableStyle01 td{
    background-color:#FFFFFF;
    border:1px solid #666666;
    padding:2px;
}
.tableStyle01 tr .gameLimit{
    background-color: #FBE9AC;
    color: #000000;
}
.za_button{
    font-size:12px;
}
/*下注狀況*/
.tableStyle01 .wagers th{
    background-color:#F1EFEF;
    text-align:center;
}
#pageTitle #pageTitleEx{
    float:right;
    color:#FF0000;
}
#pageTitle #pageTitleEx a{
    color:#CC0000;
    text-decoration:none;
    font-weight:bold;
}
.tableStyle01 .b_rig .amountGold{
    background-color:#CCCCCC;
    text-align:right;
}
.tableStyle01 .b_rig .awinGold{
    background-color:#990000;
    color:#FFFFFF;
    text-align:right;
}
.tableStyle01 .red_border {
    border: 2px solid #FF0000;
}
.tableStyle01 .b_rig_mor {
    background-color:#EDEDED;
    text-align:right;
}
.tableStyle01 .b_rig_mor td{
    background-color:#EDEDED;
}
.tableStyle01 .b_rig{
    background-color:#FFFFFF;
    text-align:right;
}
.b_cen{
    background-color:#FFFFFF;
    text-align:center;
    height:70px;
}

/*往來紀錄*/
#mainContent p.subject{
    width:82px;
    height:18px;
    line-height:18px;
    text-indent: 5px;
}
.Wdate{
    width:90px;
}
.BookTable td{
    padding:1px 0px;
}
#foot{
    text-align:left;
    color:#000000;
    font-size:12px;
    padding-left:10px;
}
#foot a{
    color:#CC0000;
    font-weight:bold;
    text-decoration:none;
}
/*線上存取款*/
#bank_body{
    background:#1C130E;
}
#bank_header{
    height:100px;
    margin:0px auto;
    width:800px;
    background:url(/cl/tpl/starball/ver1/image/rule_logo_bg.jpg) repeat-x ;
}
#bank_logo{
    width:250px;
    height:100px;
    background:url(/cl/tpl/starball/ver1/image/rule_logo.jpg) no-repeat ;
}
#bank_content {
    width:800px;
    margin:0px auto;
    background-color:#FFFFFF;
}
#bank_footer{
    margin:0px auto;
    width:800px;
    height:30px;
    color:#FFFFFF;
    font-size : 11px;
    line-height:30px;
    font-weight: normal;
    font-family: Verdana, Arial, Sans-serif,taipei;
    background:#250F0E;
}
#bank_footer font{
    color:#FFFFFF;
}
#pay_system_option a{
    color:#FF0000;
    text-decoration: none;
}/*會員註冊*/
#joinMember iframe{
    width: 730px;
    height: 1000px;
}
#memCash_body{
    background-color:transparent;
    color:#FFE4CA;
    font-size: 12px;
}
#memCash_body .memCash_tit{
    background:url(/cl/tpl/starball/ver1/image/welcome.png) no-repeat;
    padding:25px 0px 0px 125px;
    height: 25px;
    width:418px;
    margin-left:19px;
    overflow: hidden;
}
.JM_content_t{
    padding: 10px 10px 10px 20px;
}
#memCash_body fieldset {
    padding:10px;
    margin:10px;
    border:3px solid #472E27;
    border-radius: 10px;
}
#memCash_body legend{
    color:#FC9;
    font-size: 12px;
    font-weight: bold;
    letter-spacing:3px;
}
#memCash_body .star {
    font-family: verdana, Helvetica, sans-serif;
    font-size: 12px;
    color: #FF0000;
    font-weight: bold;
    vertical-align: -2px;
}
#memCash_body a{
    text-decoration: none;
    color:#A4845D;
}
#memCash_body .memCash_text{
    line-height: 15px;
    height: auto;
}
#myFORM input[type=text], #myFORM input[type=password], #myFORM select{
    border: 1px solid #ABADB3;
    -moz-border-radius:3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-shadow: 0 0 6px #CFD1D8;
    -moz-box-shadow: 0 0 6px #CFD1D8;
    -webkit-box-shadow: 0 0 6px #CFD1D8;
}

/*main*/
body {
/*    background: url(/cl/tpl/template/images/MCenter/orange/bg.jpg) top center no-repeat #272A31;*/
    background:#000;
    padding-top: 4px;
    font-size: 12px;
}
#MACenter {
    margin: 0 auto;
    width: 1000px;
    font-size: 12px;
}
#MAContent {
    background: #EFEAE5;
/*    background: url(/cl/tpl/template/images/MCenter/orange/content_bg.jpg) top left repeat-y;*/
}
#MALeft {
/*    float: left;
    display: inline;
    margin-left: 1px;
    width: 220px;*/
}
#MAMain {
    width: 1000px;
    background: #EFEAE5;
    /*   float: left;
         width: 768px;
	  overflow: auto;
	        height: 363px;
	        overflow-x: hidden; */

}


#MAMain::-webkit-scrollbar  
{  
    width: 10px;  
    height: 10px;  
    background-color: #F5F5F5;  
}  
  
/*定义滚动条轨道 内阴影+圆角*/  
#MAMain::-webkit-scrollbar-track  
{  
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);  
    border-radius: 10px;  
    background-color: #F5F5F5;  
}  
  
/*定义滑块 内阴影+圆角*/  
#MAMain::-webkit-scrollbar-thumb  
{  
    border-radius: 10px;  
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);  
    background-color: #EF9E04;
}

/*鼠标滑过滑动条*/
#MAMain::-webkit-scrollbar-thumb:hover{
	background-color:#7F3E08;
}  


/*header*/
#MAHeader {
    position: relative;
    background: url(/cl/tpl/template/images/MCenter/orange/header_bg.jpg) top left no-repeat;
    width: 1000px;
    height: 100px;
}
#MATime {
    position: absolute;
    top: 0;
    right: 0;
    background: url(/cl/tpl/template/images/MCenter/orange/timezone_bg.jpg) top left no-repeat;
    width: 257px;
    height: 36px;
    font-family: 'Times New Roman';
}
#timepic {
    position: absolute;
    top: 7px;
    left: 20px;
    background: url(/cl/tpl/template/images/MCenter/orange/time.png) top left no-repeat;
    width: 22px;
    height: 22px;
}
#MATime #est_bg {
    padding-top: 7px;
    padding-left: 44px;
    width: 210px;
    height: 22px;
    line-height: 22px;
    -MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    -moz-opacity: 1;
    opacity: 1;
    font-size: 12px;
    color: #FFF;
    text-align: left;
}
#MATime .time_text {
    background-color: transparent;
}
#MADeposit {
    position: absolute;
    top: 60px;
    right: 20px;
    background: url(/cl/tpl/template/images/MCenter/orange/btn01.png) top left no-repeat;
    padding-left: 34px;
    width: 96px;
    height: 28px;
    line-height: 28px;
    color: #fff;
    cursor: pointer;
}
#MADeposit:hover {
    color: #ccc;
}

/*left menual*/
#welcome {
/*    background: url(/cl/tpl/template/images/MCenter/orange/welcome.jpg) top left no-repeat;
    width: 220px;
    height: 48px;
    line-height: 48px;
    font-weight: bold;
       font-size: 16px;
    text-align: center;
    color: #FFf;*/
}
.sidebar {
    margin-bottom: 35px;
}
.sidebar div, .sidebar a {
    display: block;
    background: url(/cl/tpl/template/images/MCenter/orange/sideNav.jpg) top left no-repeat;
    padding-left: 40px;
    width: 180px;
    height: 32px;
    line-height: 32px;
    color: #ccc;
    text-decoration: none;
}
.sidebar #sidebar-mem {
    background: url(/cl/tpl/template/images/MCenter/orange/sideNav01.jpg) top left no-repeat;
    margin-bottom: 5px;
    height: 38px;
    line-height: 38px;
}
.sidebar #sidebar-msg {
    background: url(/cl/tpl/template/images/MCenter/orange/sideNav02.jpg) top left no-repeat;
    margin-bottom: 5px;
    height: 38px;
    line-height: 38px;
}
#MALeft a.mcurrent {
/*    background-position: bottom left;
    color: #000;*/
}


#MACenterContent h2.MSubTitle {
    position: relative;
    padding-left: 16px;
    height: 18px;
    color: #444;
}
#MACenterContent h3.MSubInfo {
    margin-bottom: 8px;
    padding-right: 8px;
    text-align: right;
    color: #851;
    font-weight: normal;
}



/*次選單*/
#MNavLv2 {
    background: url(/cl/tpl/template/images/MCenter/orange/nav2_bg.jpg) center bottom no-repeat;
    margin-bottom: 8px;
    padding-left: 5px;
    line-height: 30px;
    color: #630;
}
#MACenterContent .MTitleName {
    float: left;
    /*background: url(/cl/tpl/template/images/MCenter/orange/game_main.jpg) top left repeat-x;*/
    padding-left: 30px;
    width: 106px;
    height: 37px;
    line-height: 37px;
    color: #FC0;
    font-weight: bold;
}
#MACenterContent .MGameType {
    padding: 0 2px;
    height: 24px;
    line-height: 24px;
    color: #630;
    cursor: pointer;
}
#MACenterContent .MGameType:hover, #MACenterContent .MCurrentType {
    color: #333;
}
#MACenterContent .MControlNav {
    margin-bottom: 8px;
    color: #333;
}

</style>
<style src="/cl/css/reset.css"></style>
<style>
body{margin: 0;border: 0;padding: 0;}    
.pagesbanner {height:230px;position:relative;width:100%; background:url(/pic/subban5.jpg) top no-repeat;}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg3.png) top center no-repeat;line-height:30px;color:#FFF;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}

a {
    color: #428bca;
    text-decoration: none;
}
.Hyzx-title {
    height: 50px;
    line-height: 50px;
    background: #321919;
}
.Hyzx-title h2 {
    color: #fff;
    font: 20px/50px "microsoft yahei";
    height: 50px;
    float: left;
    padding: 0 20px;
    width: 170px;
}
.Hyzx-title .Hyzx-nav {
    float: left;
}
.Hyzx-title .Hyzx-nav a {
    display: block;
    width: 90px;
    margin-right: 1px;
    font: 13px/50px "microsoft yahei";
    height: 50px;
    color: #fff;
    float: left;
    position: relative;
    z-index: 2;
    text-align: center;
    background: #321919;
    transition: all 0.4s;
    -webkit-transition: all 0.4s;
    -moz-transition: all 0.4s;
    -o-transition: all 0.4s;
}
.Hyzx-title .Hyzx-nav .mcurrent, .Hyzx-title .Hyzx-nav a:hover {
    background: #875e5a;
}
.Hyzx-title .Hyzx-nav .mcurrent:after, .Hyzx-title .Hyzx-nav a:hover:after { 
    transform: translateY(4px);
    border-top: 4px solid #875e5a;
}
.Hyzx-title .Hyzx-nav a:after {
    transform: translateY(0px);
    content: "";
    display: block;
    position: absolute;
    z-index: -1;
    bottom: 0px;
    left: 50%;
    margin-left: -6px;
    border-top: 4px solid #321919;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    transition: all 0.4s;
    -webkit-transition: all 0.4s;
    -moz-transition: all 0.4s;
    -o-transition: all 0.4s;
}
.MACenter{
    width: 1000px;
    background: #EFEAE5;
}
#MBlockImg {
    background: url(/cl/tpl/template/images/loading/ajax-loader-white2.gif) center no-repeat;
    margin: 0 auto;
    width: 100%;
    height: 100%;
    background-size: 150px 150px;
}
.blockMsg {
    background-color: #000 !important;
    width: 100% !important;
    height: 100%;
    left: 0 !important;
    top: 0 !important;
    opacity: 0.7;
}

.blockUI.blockOverlay{
    opacity: 0 !important;
}

</style>
<link rel="stylesheet" href="/cl/memberdata.css">

</head>
<body>
<!-- 公告开始 -->
<div class="pagesbanner" >
	<div class="gonggao">
	    <div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
		</div>
	</div>
</div>
<!-- 公告结束 -->
<div style="clear: both;height:24px"></div>   
   
    
<!-- <div id="Mask"></div> -->
<div id="MACenter">
<div id="MAHeader" style="display: none;">
        <div id="MALogo">
            
             <embed src="logo.swf" autoplay="true" flashvars="prizeResult=3" allowscriptaccess="always" wmode="transparent" menu="false" quality="high" style=" width: 262px;margin-top: -32px;" type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/" name="FlashZhuan"> 
		   <img src="/pic/logo.png">
        </div>
        <div id="MATime"><div id="timepic"></div><div id="est_bg" class="time_text">北京时间：<span id="EST_reciprocal"></span></div>
            <style type="text/css">
                .time_text{
                    width:200px;
                    height:20px;
                    line-height:20px;
                    /* For IE 8 */   -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
                    /* For IE 5-7 */ *filter:alpha(opacity=80);
                    /* For W3C */    opacity:0.80;
                    font-size:12px;
                    color:#000;
                    text-align:center;
                    background-color:#FFF;
                }
            </style>
            <script>
                var estObj = {
                    now: (new Date()).valueOf() || 0,
                    pre0: function(num){
                        if (num < 10) {num = '0' + num;}
                        return num;
                    },
                    /* 即時時間顯示 */
                    dispTime: function() {
                        var nowNew = (estObj.now += 1000),
                            dateObj = new Date(nowNew),
                            p0 = estObj.pre0,
                            Y  = dateObj.getFullYear(),
                            Mh = dateObj.getMonth() + 1,
                            D  = p0(dateObj.getDate()),
                            H  = p0(dateObj.getHours()),
                            M  = p0(dateObj.getMinutes()),
                            S  = p0(dateObj.getSeconds());

                        if(Mh > 12) {Mh = 01;}
                        else if(Mh < 10) {Mh = '0'+Mh;}

                        document.getElementById('EST_reciprocal').innerHTML = Y+'/'+Mh+'/'+D+' - '+H+':'+M+':'+S;
                    }
                };
                (function() {setInterval(estObj.dispTime, 1000);}() );
            </script>
        </div>
        <div id="MADeposit" onmouseover="mover(this);" onmouseout="mout(this);" onclick="f_com.MChgPager({method: 'bankSavings'});">线上存款</div>
    </div>
    <div id="MAContent">
        <div class="Hyzx-title"  id="MALeft">
                <h2 style="width:130px" id="welcome">会员中心</h2>
                <div class="Hyzx-nav">
                    
                        <a href="javascript: f_com.MChgPager({method: 'memberData'});" <?php  if($other=="memberData"){?>class="mcurrent"<?php  }?>>我的账户</a>

                        <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" <?php  if(in_array($other,array("moneyView","bankSavings","bankTake"))){?>class="mcurrent"<?php  }?> id="banktrans">银行交易</a>

                       <a href="javascript: f_com.MChgPager({method: 'sportGameDetails'});" <?php  if($other=="ballRecord"){?>class="mcurrent"<?php  }?>>投注记录</a>

                        <a href="javascript: f_com.MChgPager({method: 'hotNews'});" <?php  if($other=="hotNews"){?>class="mcurrent"<?php  }?>>最新信息</a>

                        <a href="javascript: f_com.MChgPager({method: 'msg'});" <?php  if($other=="msg"){?>class="mcurrent"<?php  }?>>个人信息</a>

                </div>
        </div>
        

        <div id="MALeft" style="display: none;">
            <div id="welcome">会员中心</div>
            <div class="sidebar">
                <div id="sidebar-mem">会员专区</div>
                <a href="javascript: f_com.MChgPager({method: 'memberData'});" <?php  if($other=="memberData"){?>class="mcurrent"<?php  }?> >．&nbsp;我的帐户</a>
                <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" <?php  if(in_array($other,array("moneyView","bankSavings","bankTake"))){?>class="mcurrent"<?php  }?> id="banktrans" >．&nbsp;银行交易</a>
                <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'betrecord'});" <?php  if($other=="ballRecord"){?>class="mcurrent"<?php  }?> >．&nbsp;投注记录</a>
            </div>
            <div class="sidebar">
                <div id="sidebar-msg">信息公告</div>
                <a href="javascript: f_com.MChgPager({method: 'hotNews'});" >．&nbsp;最新信息</a>
                <a href="javascript: f_com.MChgPager({method: 'msg'});" <?php  if($other=="msg"){?>class="mcurrent"<?php  }?> >．&nbsp;个人信息</a>
            </div>
        </div>
        
        
        
        <div id="MAMain">
            <div id="MACenter-content"></div>
        </div>
        <div class="clear" style="clear: both;height:24px"></div>
    </div>
    <div id="MAContentBottom"></div>
    <div id="MAFoot">&nbsp;&nbsp;</div>
</div> 
<script type="text/javascript" src="/cl/js/jquery-ui-1.8.21.custom.min.js?_=171"></script>
<script type="text/javascript" src="/cl/js/jquery-1.7.2.min.js?_=171"></script>
<script type="text/javascript" src="/cl/js/pluging/jquery.blockUI2.min.js?_=171"></script>
<script type="text/javascript" src="/cl/js/common.js?_=171"></script>
<script type="text/javascript" src="/cl/js/pluging/jquery.cookie.js?_=171"></script>
<script type="text/javascript" src="/cl/index.js"></script>
<script src="/laydate/laydate.js"></script>

<script type="text/javascript">
    var lang = "zh-cn";
    if(lang == 'th') {
        var estText = document.getElementById('est_bg');
        if(estText) {
            estText.childNodes[0].nodeValue = "E.S.T：";
        }
    }

    //遮罩背景色
    f_com.SetOptions('maskColor', '#000');//#333
    f_com.SetOptions('blockId', '#MACenter');

    f_com.MChgPager({method: "<?=$other?>"});
    
    $(".MMain tbody tr").live({
        mouseenter: function() {
            $("td", this).addClass("mouseenter");
        },
        mouseleave: function() {
            $("td", this).removeClass("mouseenter");
        }
    });
    $("#MALeft a").click(function() {
        if(!$(this).hasClass('mcurrent')) {
            $("#MALeft a").removeClass('mcurrent');
            $(this).addClass('mcurrent');
        };
    });
    $("#MADeposit").click(function(){
        var _bankBTN = $("#banktrans");
        if(!_bankBTN.hasClass('mcurrent')) {
            $("#MALeft a").removeClass('mcurrent');
            _bankBTN.addClass('mcurrent');
            console.log(123);
        }
    })

    function mover(o){
        o.style.backgroundPosition='0 bottom';
    }

    function mout(o){
        o.style.backgroundPosition='0 top';
    }
    //setInterval(function() {
    //    if($.cookie('SESSION_ID') == 'guest' || $.cookie('SESSION_ID') == '' || !$.cookie('SESSION_ID')) {
    //        alert("你被登出!!");
    //        window.opener=null; window.close();
    //    }
    //}, 5000);

    //鎖右鍵
    function cancelMouse(){ return false; }
    document.oncontextmenu = cancelMouse;
    
     function chgType(type) {
        switch(type) {
            case 'ballRecord':
                f_com.MChgPager({method: 'ballRecord'});
                break;
            case 'lotteryRecord':
                f_com.MChgPager({method: 'lotteryRecord'});
                break;
            case 'liveHistory':
                f_com.MChgPager({method: 'liveHistory'});
                break;
            case 'gameHistory':
                f_com.MChgPager({method: 'gameHistory'});
                break;
            case 'skRecord':
                f_com.MChgPager({method: 'skRecord'});
                break;
            case 'a3dhHistory':
                f_com.MChgPager({method: 'a3dhHistory'});
                break;
            case 'TPBFightHistory':
                f_com.MChgPager({method: 'TPBFightHistory'});
                break;
            case 'TPBSPORTHistory':
                f_com.MChgPager({method: 'TPBSPORTHistory'});
                break;
            case 'cqRecord':
                f_com.MChgPager({method: 'cqRecord'});
                break;
            case 'liveHistory11':
                f_com.MChgPager({method: 'liveHistory11'});
                break;
            case 'liveHistory22':
                f_com.MChgPager({method: 'liveHistory22'});
                break;
            case 'ptliveHistory':
                f_com.MChgPager({method: 'ptliveHistory'});
                break;
            case 'naliveHistory':
                f_com.MChgPager({method: 'naliveHistory'});
                break;
            case 'abliveHistory':
                f_com.MChgPager({method: 'abliveHistory'});
                break;
            case 'bhdzliveHistory':
                f_com.MChgPager({method: 'bhdzliveHistory'});
                break;
            case 'fsrecord':
                f_com.MChgPager({method: 'fsrecord'});
                break;
            case 'chakan_cunkuan':
                f_com.MChgPager({method: 'chakan_cunkuan'});
                break;
            case 'chakan_huikuan':
                f_com.MChgPager({method: 'chakan_huikuan'});
                break;
            case 'dml':
                f_com.MChgPager({method: 'dml'});
                break;
            case 'ed':
                f_com.MChgPager({method: 'ed'});
                break;
            case 'SKLotteryHistoryDetails':
                f_com.MChgPager({method: 'SKLotteryHistoryDetails'});
                break;
            case 'sportGameDetails':
                f_com.MChgPager({method: 'sportGameDetails'});
                break;
        }
    }
</script>
<!--[if IE 6]>
<script type="text/javascript">
    document.execCommand("BackgroundImageCache", false, true);
</script>
<![endif]-->
</body>
</html>