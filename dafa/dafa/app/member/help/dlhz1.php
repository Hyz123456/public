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
 if(self==top){
 	top.location='/index.php';
 }
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
.pagesbanner {height:230px;position:relative;width:100%;background:url(/pic/subban5.jpg) top no-repeat;}
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
.redborder .color{
        color: rgb(255, 255, 153);
}
.redborder p{
    white-space: normal
}

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
                  
                  <div id="Union" class="redborder" style="color: #FFF;">
                    <div id="Union1" style="font-size: 14px;line-height: 22px;color: #FFF; display: block;">     
                        <strong class="color">关于太陽城娛樂</strong>
                        <p>
                        太陽城娛樂在澳门联合交易所主板上市，也是在美国纳斯达克交易所上市的Wynn Resorts, Limited的附属公司。</p>
                        <p>太陽城娛樂位于澳门半岛市区的博彩业中心，由太陽城娛樂拥有及经营，于2006年9月6日正式开业。在2007年12月，扩建工程完成，扩大了娱乐场地、餐饮场所及零售空间。于2008年，太陽城娛樂更成为澳门唯一荣获美孚五星奖的酒店，也是亚洲区内五家获此殊荣的酒店之一。于2010年4月，太陽城娛樂的万利开幕。</p>

                        <strong class="color">太陽城娛樂拥有：</strong>
                        <p>面积约222,000平方尺，提供24小时博彩娱乐及一系列游戏的娱乐场，当中设有多间私人博彩厅；</p>
                        <p>600间豪华客房及套房；</p>
                        <p>六间休闲及高级餐厅；</p>
                        <p>约46,000平方尺的名店街，汇聚Bvlgari, Chanel, Dior, Dunhill, Fendi,Ferrari, Giorgio Armani, Gucci, Hermes, Hugo Boss, LouisVuitton, Miu Miu, Piaget, Prada, Rolex, Tiffany, Van Cleef & Arpels, Versace, Vertu, Zegna等名店；</p>
                        <p>康体及休闲设施，包括康体中心、游泳池及理疗康体中心；</p>
                        <p>酒廊及会议设施。</p>
                        <p>太陽城娛樂的万利拥有：</p>
                        <p>面积约22,000平方尺，提供24小时博彩娱乐及一系列游戏的娱乐场，当中设有多间私人博彩厅；</p>
                        <p>一个约12,000平方尺的Sky Casino；</p>
                        <p>414间豪华套房及渡假别墅式套房；</p>
                        <p>约3,200平方尺的名店街，包括Chanel, Piaget及Cartier；</p>
                        <p>两家餐厅；</p>
                        <p>套房式豪华私人理疗康体设备。</p>
                        <p>除太陽城娛樂外，史提芬永利先生及他的团队以往曾负责Wynn Las Vegas, Encore, Bellagio,Mirage 及Treasure Island的设计、发展及营运，这些酒店均被誉为拉斯维加斯地标性渡假酒店的始祖，以卓越品质、豪华及娱乐见称。</p>

                        <strong class="color">诚信：</strong>
                        <p>作为国际专业的网上博彩游戏运营商，凭着世界级的博彩资讯专家、丰富经验的服务团队、市场营销专家、先进的技术人才建立起永利娱乐城网全面、完善的体系。我们承诺，为每一位客户提供最佳、最安全、最公平的博彩游戏，以及全方位的服务。</p>

                        <strong class="color">客户至上：</strong>
                        <p>1. 提供7×24小时专业的客户服务，随时解决客户的咨询及问题；</p>
                        <p>2. 多渠道的与客户的互动交流，了解客户的需求，随时关注客户的意见及建议；</p>
                        <p>3. 举办更多的优惠及促销活动，给客户提供更多的回馈及惊喜。</p>
                        <p>我们恪守“客户至上”的宗旨，力求创新，不断进步的精神，力拓多元化的博彩娱乐。我们聘用庞大的服务团队，凭市场推广、客户服务、技术支持等优秀人员的不懈努力，为客户提供最专业的娱乐服务：
                        玩家网上支付和所有银行交易由国际金融机构在高标准的安全和机密的网络中进行。进入玩家帐户资料也必须有玩家唯一的登录ID和密码，确保客户的资金安全有保障。同时也采用最先进的加密措施来保证玩家的游戏安全，7×24小时的后台检测和监控，确保我们可以提供一个完全公正和安全的网络游戏空间。客户在本平台的所有活动均严格保密，我们不会向第三方包括政府透露客户资料。</p>
                        <p>有智慧的您，永远选择太陽城娛樂 最新网址：<?=$row["conf_www"]?> </p>



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
