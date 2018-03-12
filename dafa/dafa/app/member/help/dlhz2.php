<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg = sys_announcement::getOneAnnouncement();
$display	=	'block';
if(intval($_COOKIE['f'])) $display	= 'none';
$sql = "select conf_www from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
</title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss1.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
<style>
.fontcolor {
	float: left;
	background: url(/images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(/images/no.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
ul.mtab-menual{
	margin:20px 0px;
    float: left!important;
    *float:none!important;
    *float:none;
    list-style: none outside none;
    width: 100%;
	
}
ul.mtab-menual li{
	float:left;
    width:96px;
    height:22px;
    line-height:22px;
    margin-right:4px;
    color: #FFF;
    border:1px #FFF solid;
    text-align:center;
    list-style-type:none;
    cursor: pointer;
    background: #404040;
}
ul.mtab-menual li:hover{
    background-color:#996600;
 }
ul.mtab-menual li.mtab{
    background-color:#996600;
 }
</style>
</head>
<script language="javascript">
function HotNewsHistory(){
window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
}
</script>
<script language="javascript">
// if(self==top){
// 	top.location='/index.php';
// }
function menu_click(id){
	parent.topFrame.document.getElementById("textGlitter"+id).click();
	}
function page_click(id){
	window.parent.document.getElementById(id).click();
	}

$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});

</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<link rel="stylesheet" rev="stylesheet" href="/cl/css/reset.css" type="text/css">
<style>
body{    background: #000;}
.pagesbanner {height:230px;position:relative;width:100%;background:url(/pic/subban5.jpg) top  no-repeat;}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg3.png) center no-repeat;line-height:30px;color:#FFFFFF;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}


.content{
    background:#1b191a;
}

.subcont {
    background-color: #000;
}
.inner {
    width: 1000px;
    margin: 0 auto;
}
.leftnav {
    float: left;
    width: 228px;
    border: 1px solid #aaaaaa;
    position: relative;
}
.leftnav ul {
    padding: 0px 18px;
    position: relative;
    z-index: 22;
}

.leftnav li a {
    display: block;
    line-height: 40px;
    color: #fff;
    border-bottom: 1px solid #76593c;
    padding-left: 32px;
}

.leftnav li a.lefttls{
    line-height:65px;
    text-align:center;
    color:#f8d080;
    font-size:20px;
}
.leftnav li a:hover{
    color: #f8d080;
}
.licons1{
    background: url(/pic/licon1.png) no-repeat 6px center;
}.licons2{
    background: url(/pic/licon2.png) no-repeat 6px center;
}.licons3{
    background: url(/pic/licon3.png) no-repeat 6px center;
}.licons4{
    background: url(/pic/licon4.png) no-repeat 6px center;
}


.licons1:hover{
    background: url(/pic/licon1cur.png) no-repeat 6px center;
}.licons2:hover{
    background: url(/pic/licon2cur.png) no-repeat 6px center;
}.licons3:hover{
    background: url(/pic/licon3cur.png) no-repeat 6px center;
}.licons4:hover{
    background: url(/pic/licon4cur.png) no-repeat 6px center;
}
.limgs {
    position: absolute;
    bottom: 10px;
    left: 0px;
}
.redborder{
    color: #FFF;
}
.redborder .color{
        color: rgb(255, 255, 153);
}
.redborder p{
    white-space: normal
}
.pages {overflow:hidden;width:100%;margin:auto;}
.about {width:960px;background:#0a0c1c;height:auto;overflow:hidden;padding:20px;}
.about .aboutleft {width:240px;float:left;height:auto;overflow:hidden;background:#141c37}
.about .aboutleft h6 {background:#1c3568;text-align:center;font-size:22px;font-weight:bold;color:#fff;font-family:"Microsoft Yahei";width:240px;line-height:55px;margin-bottom:20px;}
.about .aboutleft ul li {height:51px;padding-left:30px;overflow:hidden;line-height:16px;width:170px;margin:0 auto 10px auto;}
.about .aboutleft ul li a {height:40px;display:block;padding-top:8px;}
.about .aboutleft ul li span {background:url(/pic/aboutico.png) no-repeat;width:38px;height:38px;display:block;float:left;margin-right:20px;}
.about .aboutleft ul li:hover span,.about .aboutleft ul li.on span {background:url(/pic/abouticoon.png) no-repeat;}
.about .aboutleft ul li span.ico01 {background-position:0 0}
.about .aboutleft ul li span.ico02 {background-position:0 -54px}
.about .aboutleft ul li span.ico03 {background-position:0 -109px}
.about .aboutleft ul li span.ico04 {background-position:0 -164px}
.about .aboutleft ul li span.ico05 {background-position:0 -219px}
.about .aboutleft ul li span.ico06 {background-position:0 -274px}
.about .aboutleft ul li a {color:#e5e5e5;font-size:16px;font-family:"Microsoft Yahei";}
.about .aboutleft ul li a b {font-size:10px;font-family:Arial;}
.about .aboutleft ul li:hover,.about .aboutleft ul li.on {background:#0c0f24;}
.about .aboutleft ul li:hover a,.about .aboutleft ul li.on a {color:#faae30}
.about {width:960px;background:#0a0c1c;height:auto;overflow:hidden;padding:20px;}
.about .aboutleft {width:240px;float:left;height:auto;overflow:hidden;background:#141c37}
.about .aboutleft h6 {background:#1c3568;text-align:center;font-size:22px;font-weight:bold;color:#fff;font-family:"Microsoft Yahei";width:240px;line-height:55px;margin-bottom:20px;}
.about .aboutleft ul li {height:51px;padding-left:30px;overflow:hidden;line-height:16px;width:170px;margin:0 auto 10px auto;}
.about .aboutleft ul li a {height:40px;display:block;padding-top:8px;}
.about .aboutleft ul li span {background:url(/pic/aboutico.png) no-repeat;width:38px;height:38px;display:block;float:left;margin-right:20px;}
.about .aboutleft ul li:hover span,.about .aboutleft ul li.on span {background:url(/pic/abouticoon.png) no-repeat;}
.about .aboutleft ul li span.ico01 {background-position:0 0}
.about .aboutleft ul li span.ico02 {background-position:0 -54px}
.about .aboutleft ul li span.ico03 {background-position:0 -109px}
.about .aboutleft ul li span.ico04 {background-position:0 -164px}
.about .aboutleft ul li span.ico05 {background-position:0 -219px}
.about .aboutleft ul li span.ico06 {background-position:0 -274px}
.about .aboutleft ul li a {color:#e5e5e5;font-size:10px;font-size:16px;font-family:"Microsoft Yahei";}
.about .aboutleft ul li a b {font-family:Arial;}
.about .aboutleft ul li:hover,.about .aboutleft ul li.on {background:#0c0f24;}
.about .aboutleft ul li:hover a,.about .aboutleft ul li.on a {color:#faae30}
#sub{width: 680px;float: right; height: auto; overflow: hidden;}
.color{    font-size: 14px;color: #ffd800; font-weight: bold;line-height: 26px;}
#Union1 p{line-height:22px;}
</style>
<body>

<div class="pagesbanner">
	<div class="gonggao">
		<div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
         </div>
	</div>
</div>
<div class="cl h24"></div>
<div class="content">
    <div class="subcont ">
      <div class="inner">
        <div class="leftnav">
          <em class="lsanj ljiao1"></em>
          <em class="lsanj ljiao2"></em>
          <em class="lsanj ljiao3"></em>
          <em class="lsanj ljiao4"></em>
          
          <ul>
             <li><a class="lefttls">热门游戏列表</a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">捕鱼达人<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" class="licons2">六合彩<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">PT电子<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">MG电子<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">BB电子<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);" class="licons3">视讯直播<span class="fr">&gt;</span></a></li>
            <li><a target="_self" onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"  class="licons4">体育投注<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" class="licons2">彩票游戏<span class="fr">&gt;</span></a></li>
          </ul>
          
          <div class="cl h100"></div>
          <div class="cl h100"></div>
          <div class="cl h54"></div>
          
          <div class="limgs"><img src="/pic/limg.png" alt=""></div>
        </div>
        
        <div id="sub" class="fr" style="margin-left: 30px; float: left;width: 720px;padding-left: 8px;
        padding-right: 8px;color: #fff">
                <script language="javascript" src="/images/swfobject_source.js"></script>

              <div id="direction">
                <div id="articles">
                  
                  <div id="Union" class="redborder">
			        
			        <div id="Union1">
			         
                                <strong class="color">联络我们</strong>

                                <p>太陽城娛樂的客服中心全年无休，提供1周7天、每天24小时的优质服务。</font></p>
                                <p>如果您对本网站的使用有任何疑问，可以透过下列任一方式与客服人员联系，享受最实时的服务</font></p>
                                <p>1. 点击"<a onclick="window.open('http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2210536129%22%2C%22userId%22%3A%2223505387%22%7D', '太陽城娛樂', 'height=400, width=700, top=200, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');" href="javascript:;" style="color:red;width: 122px; height: 356px;"> 
                                   在线客服"</a>链接，即可进入在线客服系统与客服人员联系。</font></p>
                                <p>2. 电子邮箱：sunbet.scs@yahoo.com</font></p>
                                <p>3.QQ：（彩金客服）</font></p>
                                <p>4. 只要填妥下列窗体并点击送出数据，我们也能收到您宝贵的意见(务必填写真实的Email.QQ.联络电话，以便我们能及时与您取得联系！</font></p>
                                <p><font face="微软雅黑" style="text-indent:2em;">中文名字：	</font></p>
                                <p><font face="微软雅黑" style="text-indent:2em;">联络电话：	</font></p>
                                <p><font face="微软雅黑" style="text-indent:2em;">QQ或skype：	</font></p>
                                <p><font face="微软雅黑" style="text-indent:2em;">电邮信箱：	</font></p>
                                <p><font face="微软雅黑" style="text-indent:2em;">联络事项：	</font></p>

 
			        </div>
			        
			        <div id="Union2" style="display:none;">
			          <p> <strong>联盟协议</strong></p>
			          <p> <strong>一、太陽城娛樂对代理联盟的权利与义务</strong></p>
			          <ol>
			            <li> 太陽城娛樂的客服部会登记联盟的会员并会观察他们的投注状况。联盟及会员必须同意并遵守太陽城娛樂的会员条例，政策及操作程式。太陽城娛樂保留拒绝或冻结联盟/会员帐户权利</li>
			            <li> 代理联盟可随时登入界面观察旗下会员的下注状况及会员在网站的活动概况。太陽城娛樂的客服部会根据代理联盟旗下的会员计算所得的佣金。</li>
			            <li> 太陽城娛樂保留可以修改合约书上的任何条例，包括: 现有的佣金范围、佣金计划、付款程式、及参考计划条例的权力，太陽城娛樂会以电邮、网站公告等方法通知代理联盟。 代理联盟对于所做的修改有异议，代理联盟可选择终止合约，或洽客服人员反映意见。 如修改后代理联盟无任何异议，便视作默认合约修改，代理联盟必须遵守更改后的相关规定。</li>
			          </ol>
			          <p> <strong>二、代理联盟对太陽城娛樂的权力及义务</strong></p>
			          <ol>
			            <li> 代理联盟应尽其所能，广泛地宣传、销售及推广太陽城娛樂，使代理本身及太陽城娛樂的利润最大化。代理联盟可在不违反法律下，以正面形象宣传、销售及推广太陽城娛樂，并有责任义务告知旗下会员所有太陽城娛樂的相关优惠条件及产品。</li>
			            <li> 代理联盟选择的太陽城娛樂推广手法若需付费，则代理应承担该费用。</li>
			            <li> 任何太陽城娛樂相关资讯包括: 标志、报表、游戏画面、图样、文案等，代理联盟不得私自复制、公开、分发有关材料，太陽城娛樂保留法律追诉权。 如代理在做业务推广有相关需要，请随时洽太陽城娛樂。</li>
			          </ol>
			          <p> <strong>三、规则条款</strong></p>
			          <ol>
			            <li> 各阶层代理联盟不可在未经太陽城娛樂许可情况下开设双/多个的代理帐号，也不可从太陽城娛樂帐户或相关人士赚取佣金。请谨记任何阶层代理不能用代理帐户下注，太陽城娛樂有权终止并封存帐号及所有在游戏中赚取的佣金。</li>
			            <li> 为确保所有太陽城娛樂会员账号隐私与权益，太陽城娛樂不会提供任何会员密码，或会员个人资料。各阶层代理联盟亦不得以任何方式取得会员资料，或任意登入下层会员账号，如发现代理联盟有侵害太陽城娛樂会员隐私行为，太陽城娛樂有权取消代理联盟红利，并取消代理联盟账号。</li>
			            <li> 代理联盟旗下的会员不得开设多于一个的帐户。太陽城娛樂有权要求会员提供有效的身份证明以验证会员的身份，并保留以IP判定是否重复会员的权利。如违反上述事项，太陽城娛樂有权终止玩家进行游戏并封存帐号及所有于游戏中赚取的佣金</li>
			            <li> 代理联盟不可为自己或其他联盟下的有效投注会员,只能是公司直属下的有效投注会员,代理每月需有5个下线有效投注（有效投注为每月至少上线5次进行正常投注），如有违反联盟协议太陽城娛樂有权终止并封存帐号及所有在游戏中赚取的佣金。</li>
			            <li> 如代理联盟旗下的会员因为违反条例而被禁止享用太陽城娛樂的游戏，或太陽城娛樂退回存款给会员，太陽城娛樂将不会分配相应的佣金给代理联盟。如代理联盟旗下会员存款用的信用卡、银行资料须经审核，太陽城娛樂保留相关佣金直至审核完成。</li>
			            <li> 合约内的条件会以太陽城娛樂通知接受代理联盟加入后开始执行。太陽城娛樂及代理联盟可随时终止此合约，在任何情况下，代理联盟如果想终止合约，都必须以书面/电邮方式提早于七日内通知太陽城娛樂。 代理联盟的表现会3个月审核一次，如代理联盟已不是现有的合作成员则本合约书可以在任何时间终止。如合作伙伴违反合约条例，太陽城娛樂有权立即终止合约。</li>
			            <li> 在没有太陽城娛樂许可下，代理联盟不能透露及授权太陽城娛樂相关保密资料，包括代理联盟所获得的回馈、佣金报表、计算等;代理联盟有义务在合约终止后仍执行机密档及资料的保密。</li>
			            <li> 在合约终止后，代理联盟及太陽城娛樂将不须要履行双方的权利及义务。终止合约并不会解除代理联盟于终止合约前应履行的义务。</li>
			          </ol>
			        </div>
			      </div>
                  <p>&nbsp; </p>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>
<script>
        $(function() {
            //一般文案用
            var MtabUl = $('#Union').children('ul');
            MtabUl.addClass("mtab-menual");
                $('#Union').mtab2();
            $('.mtab-menual').show();
        });
    </script>
<div style="clear:both"></div>

<script language="javascript">
/**
*  無動畫切換
*/
$.fn.mtab2 = function(){
    var area = this;
    $.each(area.find('li[id^=#]'),function(i){
    	if(i!=0){
    		area.find(this.id)[0].style.display = 'none';
    	}
    });
    area.find('li[id^=#]').click(function(){
        var self = this;
        $.each(area.find('li[id^=#]'),function(i){
            if(self.id != this.id){
                area.find(this.id)[0].style.display = 'none';
                $(this)[0].style.backgroundPosition = 'top';
                $(this).removeClass('mtab');
            }else{
                area.find(this.id)[0].style.display = 'block';
                $(this)[0].style.backgroundPosition = 'bottom';
                $(this).addClass('mtab');
            }
        });
    });
};

//一般文案用
	$(document).ready(function(){
		var MtabUl = $('#Union').children('ul');
		MtabUl.addClass("mtab-menual");
//					var PartnerLink = "<li onclick=\"menu_click(11);return false;\">代理注册</li>";
//						MtabUl.children('li:last').after(PartnerLink);
				$('#Union').mtab2();
	});	
</script>

</body>
</html>
