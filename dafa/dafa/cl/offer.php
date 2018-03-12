<?php 
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg = sys_announcement::getOneAnnouncement();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link href="css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script language="javascript" src="images/swfobject_source.js"></script>
    <script src="/cl/js/common.js"></script>
    <script language="javascript">
		function i(ur,w,h){
		document.write('<object id="prize" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
    </script>
    <script language="JavaScript">

        if(self==top){
            top.location='/';
        }
        function menu_click(id){
            parent.topFrame.document.getElementById("textGlitter"+id).click();
        }
        function page_click(id){
            window.parent.document.getElementById(id).click();
        }
        function mover(o){
            o.style.backgroundPosition='0 bottom';
        }

        function mout(o){
            o.style.backgroundPosition='0 top';
        }
		function setHeight()
        {
			$(window.parent.document).find("#mainFrame").height($("#re_0").height().toString());
        }
        /*用window.onload调用setHeight()*/
        window.onload=setHeight;//不要括号
        

    </script>

<style type="text/css">
#MemberExclusive_area {
    margin: 0px auto;
	width: 100%;
    overflow:hidden;
    padding: 0px;
}
#MemberExclusive a{display:block;}
.main_box{
    width:1000px;
    margin:0 auto;
    overflow:hidden;
}
.offer_1{
    width:1068px;
    margin:0 auto;
    overflow:hidden;
}
.offer_1 h1 {
    background-image: url("/images/contenth1bj.jpg");
    border: 1px none;
    color: #FFFFFF;
    font-size: 14px;
    height: 35px;
    line-height: 35px;
    padding-left: 10px;
	width:744px;
	float:right;
}
.eventtext {
	display: none;
	width:100%;
	margin:0 auto;
	text-align:center;
}

.eventtext h2 {
    border-bottom: 1px solid #930211;
    color: #930211;
    font-size: 16px;
    padding-bottom: 5px;
}
.eventtext p {
    font-size: 12px;
    line-height: 22px;
    padding-top: 5px;
    text-align: justify;
}
.eventtext table {
    background: none repeat scroll 0 0 #5E5E5E;
    border-collapse: collapse;
    border-left: 1px solid #888888;
    border-spacing: 0;
    border-top: 1px solid #888888;
    text-align: center;
    width: 490px;
}
.eventtext th {
    background: none repeat scroll 0 0 #3F2323;
}
.eventtext th,.eventtext td {
    border-bottom: 1px solid #888888;
    border-right: 1px solid #888888;
    padding: 5px 15px;
	color:#fff;
}



body{font-size: 12px;line-height: 18px; font-family:"微软雅黑";background: #000;}
*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}

.pagesbanner {height:230px;position:relative;width:100%;}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg.png) center no-repeat;line-height:30px;color:#FFF;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}
.pages {overflow:hidden;width:100%;margin:auto;}
.fonts{
	cursor:pointer;
	line-height: 30px;
	font-family: 微软雅黑, Arial;
	color: white;
	font-size: 13px;
}
/*.Menubox {background:#151c38;line-height:40px;height:40px;margin-bottom:20px;}*/
.Menubox ul li {width:100px;text-align:center;font-size:14px;float:left;display:block;font-family:"Microsoft Yahei";}
/*.Menubox ul li:hover {background:#1b3568;color:#ffd800;}*/
.Menubox ul li.hover {background:#1b3568;color:#ffd800;}
.Contentbox{   
    width: 960px;
    height: auto;
    overflow: hidden;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #898686;
    background: #222;
}

#PT-switcher-wrap{
    border-bottom: 0px solid #2A457C!important;
    height: 40px!important;
    background: #fff6df;  
    margin: 1.5em auto;
    width: 960px;
}
.Menubox{
    background: #fff6df;
}
ul.mtab-menual li {
    background-color: #428FC7;
    display: inline-block;
    vertical-align: bottom;
    margin-right: 4px;
    padding: 1px 10px;
    cursor: pointer;
    border-bottom: 0;
/*    border-radius: 5px 5px 0 0;*/
    transition: background-color .4s;
}
ul.mtab-menual li {
    background: #fff6df;
    color: #251d0e;
    height: 37px;
    line-height: 37px;
}
ul.mtab-menual li.mtab {
    color: #251d0e;
    height: 37px;
    line-height: 37px;
    background: #f8d080;
}
.Contentbox img{
    width: 960px;
}
#MemberExclusive{
  margin-bottom: 5px; 
}  
</style>
</head>
<body id="re_0">

<div class="pagesbanner" style="background:url(/pic/subban5.jpg)  top no-repeat">
	<div class="gonggao">
	    <div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
		</div>
	</div>
</div>
    
    <div style="clear: both;height: 24px;"></div>    
    
<div class="pages">
	<div class="promotions w1000">
		<div class="Menubox">
                    <ul id="PT-switcher-wrap" class="mtab-menual clearfix"  style="height:24px;">
                        <li id="two1" onclick="setNav('two',1,3)" class="PT-btn mtab">所有活动</li>
                        <li id="two2" onclick="setNav('two',2,3)" class="PT-btn">彩票优惠</li>
                        <li id="two3" onclick="setNav('two',3,3)" class="PT-btn">已结束活动</li>
                    </ul>
<!--                    <ul>
                        <li id="two1" onclick="setNav('two',1,3)" style="background:#1b3568;color:#ffd800;">所有活动</li>
                        <li id="two2" onclick="setNav('two',2,3)">彩票优惠</li>
                        <li id="two3" onclick="setNav('two',3,3)">已结束活动</li>
                    </ul>               -->
		</div>
        <div class="Contentbox">
            <div id="con_two_1">
      
      			<div class="offer_1">
				     <!-- <h1>所有活动</h1> -->
                            <div id="MemberExclusive_area">
                            <!--div id="MemberExclusive">
                                <div class="memExclusive_1"><a href="#"><img src="/images/offer/1.png"></a></div>
                                <div class="eventtext">
                                <img src="/images/offer/1.jpg" border="0">
                                </div>
                            </div-->
                            
                            <div id="MemberExclusive">
                                <div class="memExclusive_2"><a href="#"><img src="/images/offer/2.png" /></a></div>
                                <div class="eventtext">
                                    <!--img src="/imgs/app.png" border="0"-->
                                </div>
                            </div>
                            <div id="MemberExclusive">
                                <div class="memExclusive_3"><a href="#"><img src="/images/offer/3.png" /></a></div>
                                <div class="eventtext">
                                </div>
                            </div>
                            <div id="MemberExclusive">
                                <div class="memExclusive_4"><a href="#"><img src="/images/offer/4.png" /></a></div>
                                <div class="eventtext">
									<li class="content ng-binding" ng-bind-html="toHtml(item.PromotionContent)" ng-show="item.isSelected==true"><p>&#65279; <span style="color:#FFFF00;"><span style="font-size:16px;"><strong>凡是<?=$web_site["web_name"]?>的会员使用支付宝帐号进行：二维码、转账、汇款、红包等方式进行充值，即可获得最高2.0%入款优惠。</p><table><thead><tr><th>存款方式</th><th>存款金额</th><th>立即回馈</th><th>奖金上限</th><th>流水限制</th></tr></thead><tbody><tr><td rowspan="2">二维码转账<br>直接转账<br>银行卡汇款<br>支付宝红包</td><td>10元以上</td><td>1.0%</td><td rowspan="2">无上限</td><td>1倍</td></tr><tr><td>10万元以上</td><td>2.0%</td><td>3倍</td></tr></tbody></table><h4><span style="color:#FF0000;">申请方式：</h4><p><span style="color:#FFFFFF;">如需申请公司入款2.0%优惠，请在存款后且未进行任何投注前，向24小时在线客服提交申请；如没有申请本公司将视为会员主动放弃优惠金额，投注之后均不再受理公司入款优惠申请。</p><h4><span style="color:#FF0000;">活动条款：</h4><ol><li><span style="color:#FFFFFF;">银行转账存款10元起即可享有1.0%的公司入款优惠，存款后只需1倍打码量，即可申请提款； 若申请公司入款2.0%的存款优惠，存款后只需3倍打码量，即可申请提款。</li><li><span style="color:#FFFFFF;">公司若发现会员利用非法程序下注或是下注套利等行为，公司有权将其过往所得之优惠全数索回，并冻结会员账号。</li><li><span style="color:#FFFFFF;">无论是个人或团体，如有违反本次活动以内任何条款，<?=$web_site["web_name"]?>保留取消活动资格、收回优惠红利和活动产生赢利以及关闭会员账号的权利。</li><li><span style="color:#FFFFFF;"><?=$web_site["web_name"]?>保留修改，解释此优惠规则的权利；以及在无通知的情况下作出改变本次活动的权利；所有<?=$web_site["web_name"]?>规则条款使用。</li></ol></li><br>
                                </div>
                            </div>
                            <div id="MemberExclusive">
                                <div class="memExclusive_5"><a href="#"><img src="/images/offer/5.png" /></a></div>
                                <div class="eventtext">
                                </div>
                            </div>
                            <div id="MemberExclusive">
                                <div class="memExclusive_6"><a href="#"><img src="/images/offer/6.png" /></a></div>
                                <div class="eventtext">
									<li class="content ng-binding" ng-bind-html="toHtml(item.PromotionContent)" ng-show="item.isSelected==true"><p>&#65279; <span style="color:#FFFF00;"><span style="font-size:16px;"><strong>新会员注册成功后，首次存款可获得最高100%的开户礼金，最高可达7798元，存款成功后联系在线客服申请即可。</p><table><thead><tr><th>首存方案</th><th>存款金额</th><th>存款红利</th><th>红利上限</th><th>流水倍数</th></tr></thead><tbody><tr><td>首存①</td><td>500元起</td><td>100%</td><td>888元</td><td>30倍</td></tr><tr><td>首存②</td><td>500元起</td><td>30%</td><td>7798元</td><td>20倍</td></tr></tbody></table><p><span style="color:#FFFFFF;">（例：会员入款1000元，获得首存30%的优惠300元，在有效下注总额达（￥1000 +￥300）*20=￥26000才能申请提款）</p><h4><span style="color:#FF0000;">活动规则：</h4><ol><li><span style="color:#FFFFFF;">申请首存优惠期间不与返水优惠并用。</li><li><span style="color:#FFFFFF;">成功存款后，会员必须在24小时内申请，公司安全稽核部门核查资料后会在20分钟内派送属于您的存款优惠。 <span style="color:#FFFFFF;">彩金申请必须在存款后未进行任何投注前向我们的在线客服申请，直到彩金添加到会员账号内，方可以进行投注，否则将视为放弃存款优惠。</li><li><span style="color:#FFFFFF;">会员首次优惠，需达到要求的有效投注倍数才可申请提款。 （例：会员入款1000元，获得首存30%的优惠300元，在有效下注总额达（￥1000 +￥300）*20=￥26000才能申请提款）</li><li><span style="color:#FFFFFF;">无论是个人或是团体，如有任何威胁，滥用<?=$web_site["web_name"]?>的优惠行为，经财务审核，保留权利取消、收回优惠以及优惠产生的红利。</li><li><span style="color:#FFFFFF;">会员必须在获得优惠后15天内达到投注门槛，否则在申请出款时，<?=$web_site["web_name"]?>保留权利取消、收回存款优惠及产生的盈利。</li><li><span style="color:#FFFFFF;">投注在运动博弈，对冲或对打投注不计，未接受注单/赛果为平的注单不计。在真人娱乐/电子游艺/彩票游戏投注，无风险投注不计。 无风险投注包括在百家乐同时投注庄家、闲家，轮盘同时投注黑色、红色，单、双，大、小，任何取消注单赛事或局数不计。</li><li><span style="color:#FFFFFF;"><?=$web_site["web_name"]?>在会员有重复申请账号时，保留取消、收回会员优惠红利的权利。 每位玩家、每一地址、每一电子邮箱、每一电话号码、相同支付卡/信用卡号码，以及公用电脑环境（例如：网吧`其它公共电脑等）只能拥有一个新开户优惠红利。 此项优惠只适应于每位客户在<?=$web_site["web_name"]?>第一次申请本优惠的账户。</li><li><span style="color:#FFFFFF;"><?=$web_site["web_name"]?>的优惠是特别为玩家而设，在玩家注册信息有争议时，为确保双方利益、杜绝身份盗用行为， <?=$web_site["web_name"]?>保留全部权利要求客户向我们提供充足有效的个人证件和资料，并以各种方式辨别客户是否符合资格享有我们的任何优惠。</li><li><span style="color:#FFFFFF;"><?=$web_site["web_name"]?>保留所有权利在任何时候都可以更改、停止、取消优惠活动。</li><li><span style="color:#FFFFFF;">为避免对以上文字的理解差异，<?=$web_site["web_name"]?>保留最终解释权。</li></ol></li>
								<br><br>
        </ul>
                                </div>
                            </div>                           
                            <script language="javascript">
                            //一般文案用

                            //優惠活動使用
                                $.each($('#MemberExclusive_area > div'),function(i , o){
                                    $(this).find('a').click(function(e){
                                        e.preventDefault();
                                        hideExclusive(i);
                                        $(this).parent().next().slideToggle(200);
                                        setTimeout(setHeight,651);
                                    });
                                });
                                function hideExclusive(i){
                                    $.each($('#MemberExclusive_area .eventtext'),function(k){
                                          if(i != k && $(this).is(':visible')){
                                             $(this).slideUp(200);
                                             setTimeout(setHeight,651);
                                            }
                                    });
                                }
                                //按鈕特效
                                $(function(){
                                    $('div[class^=memExclusive] > a').css("opacity","1").hover(
                                        function(){
                                           $(this).stop().animate({'opacity': 1}, 650);
                                        }, function(){
                                           $(this).stop().animate({'opacity': 1}, 650);
                                        }
                                    );
                                }); 
                            </script>
                                    <div class="clear"></div>     

                            </div>
                                    <div class="clear"></div>     

						</div>
      			</div>
      
            
            </div>
            <div id="con_two_2" style="display:none"><!-- 
                            <h1>彩票优惠</h1> -->
            </div>
            <div id="con_two_3" style="display:none"><!-- 
                        <h1>已结束活动</h1> -->
            </div>
<!--   <script type="text/javascript">
function setNav(name,cursel,n){
	for(i=1;i<=n;i++){
		var menu=document.getElementById(name+i);
		var con=document.getElementById("con_"+name+"_"+i);
		menu.className=i==cursel?"hover":"";
		con.style.display=i==cursel?"block":"none";
	}
}
</script>-->

<script language="javascript" src="/js/mouse.js"></script>
</div>
</div>
</body>
</html>
