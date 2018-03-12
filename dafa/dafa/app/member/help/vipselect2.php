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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>太阳城集团VIP等级查询</title>
<link rel="stylesheet" href="vipselect.css"/>
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script src="/cl/js/common.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript">
if(self==top){
	top.location='/index.php';
}
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
</script>
</head>
<body id="toTop">
<div class="bodywrapper">
  <div class="header">
    <div class="wrapper">
      <h1 class="logo"><a onclick="click_url('/cl/main.php')" href="javascript:void(0);" target="_top"><img src="/pic/logo.png" alt="" style="width: 225px;"/></a> </h1>
      <div class="slogan"></div>
      <div class="topbar"> 
          VIP查询地址：<a onclick="click_url('/cl/main.php')" href="javascript:void(0);" target="_top">www.1428m.com</a>
      </div>
      <ul class="nav">
        <li class="active"> <a onclick="click_url('/cl/main.php')" href="javascript:void(0);" target="_top">网站首页</a> </li>
        <li> <a onclick="click_url('/cl/reg.php')" href="javascript:void(0);">注册会员</a> </li>
        <li> <a href="javascript:click_url('/cl/offer.php');" target="_blank">优惠活动</a> </li>
        <li> <a href="/Navigation" target="_blank">线路检测</a> </li>
        <li> <a onclick="window.open('http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2210536129%22%2C%22userId%22%3A%2223505387%22%7D');" href="javascript:void(0);"  target="_blank">在线客服</a> </li>
      </ul>
    </div>
  </div>
  <div class="banner">
    <div class="wrapper">
        <form action="" method="post">
      <div class="search">
        <label for=""></label>
        <div class="iptbox">
          <input type="text" id="search1"  name="username" placeholder="请输入会员账号" onfocus="if(this.placeholder=='请输入会员账号')this.placeholder=''" onblur="if(this.placeholder =='') this.placeholder ='请输入会员账号'">
        </div>
        <button class="btn" id="submit" type="submit" name="button" id="kin_img"></button>
      </div>
        </form>    
    </div>
    <div class="news">
      <div class="wrapper">
        <h3>最新公告：</h3>
        <div class="marquee-box" id="msgNews1" style="width:900px;">
          <marquee direction="left" behavior="scroll" scrolldelay="5" scrollamount="2" onmouseover="stop()" onmouseout="start()"><?=$msg;?></marquee>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="conbox">
      <div class="item" style=" overflow:hidden; clear:both;">
        <div class="hd">
          <h3><span>VIP专享特权</span></h3>
        </div>
        <div class="des">
          <table class="table">
            <thead>
              <tr>
                <th style="width:220px;">特权\VIP等级</th>
                <th>黄金</th>
                <th>卓越</th>
                <th>非凡</th>
                <th>奇迹</th>
                <th>传奇</th>
                <th>至尊</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="color:#ffc626;">存款要求</td>
                <td>50万/月</td>
                <td>500万/月</td>
                <td>1000万/月</td>
                <td>2000万/月</td>
                <td>3000万/月</td>
                <td>5000万/月</td>

              </tr>
              <tr>
                <td style="color:#ffc626;">有效投注</td>
                <td>500万/月</td>
                <td>1亿/月</td>
                <td>3亿/月</td>
                <td>6亿/月</td>
                <td>10亿/月</td>
                <td>15亿/月</td>

              </tr>
              <tr>
                <td style="color:#ffc626;">单日出款</td>
                <td>500万/日</td>
                <td>500万/日</td>
                <td>500万/日</td>
                <td>500万/日</td>
                <td>1000万/日</td>
                <td>1000万/日</td>

              </tr>
              <tr>
                <td style="color:#ffc626;">晋级礼金</td>
                <td>888元</td>
                <td>1888元</td>
                <td>5888元</td>
                <td>8888元</td>
                <td>18888元</td>
                <td>28888元</td>

              </tr>
              <tr>
                <td style="color:#ffc626;">生日礼金</td>
                <td>1888元</td>
                <td>2888元</td>
                <td>5888元</td>
                <td>8888元</td>
                <td>18888元</td>
                <td>28888元</td>

              </tr>
              <tr>
                <td style="color:#ffc626;">退佣回馈</td>
                <td>1%月(上限8888元)
需负盈利20万以上</td>
                <td>2%月(上限38888元)
需负盈利30万以上</td>
                <td>3%月(上限58888元)
需负盈利40万以上</td>
                <td>4%月(上限58888元)
需负盈利50万以上</td>
                <td>5%月(上限58888元)
需负盈利100万以上</td>
                <td>6%月(上限88888元)
需负盈利200万以上</td>

              </tr>
              <tr>
                <td style="color:#ffc626;">VIP存取通道</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                
                              </tr>
              <tr>
                <td style="color:#ffc626;">独享专属域名</td>
                <td>-</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                
                              </tr>
              <tr>
                <td style="color:#ffc626;">专属客服经理</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>
                <td>√</td>

              </tr>
            </tbody>
          </table>
          <p> <span class="fc-yellow">活动详情:</span> 加入太阳城集团 www.1428m.com 贵宾俱乐部，荣升尊贵VIP，任何会员当月存款50万以上，月有效投注500万以上，均可申请VIP资格。</p>
        </div>
      </div>

      <div class="item" style=" overflow:hidden; clear:both;">
        <div class="hd">
          <h3><span>优惠规则与条款 </span></h3>
        </div>
        <div class="des">
          <p style="line-height:230%;"> 
            1、所有优惠以人民币(CNY)为结算金额，以美东时间(EDT)为计时区间；<br>
            2、每位玩家﹑每户﹑每一住址 、每一电子邮箱地址﹑每一电话号码﹑相同支付方式(相同借记卡/信用卡/银行账户) 及IP地址只能享有一次优惠；若会员有重复申请账号行为，公司保留取消或收回会员优惠彩金的权利； <br>
            3、太阳城集团的所有优惠特为玩家而设，如发现任何团体或个人，以不诚实方式套取红利或任何威胁、滥用公司优惠等行为，公司保留冻结、取消该团体或个人账户及账户结余的权利；<br> 
            4、若会员对活动有争议时，为确保双方利益，杜绝身份盗用行为，太阳城集团有权要求会员向我们提供充足有效的文件，用以确认是否享有该优惠的资质；<br> 
            5、当参与优惠会员未能完全遵守、或违反、或滥用任何有关公司优惠或推广的条款，又或我们有任何证据有任何团队或个人投下一连串的关联赌注，籍以造成无论赛果怎样都可以确保可以从该存款红利或其他推广活动提供的优惠获利，太阳城集团保留权利向此团队或个人停止取消优惠或索回已支付的全部优惠红利。此外，公司亦保留权利向这些客户扣取相当于优惠红利价值的行政费用，以补偿我们的行政成本;<br>
            6、太阳城集团保留对活动的最终解释权，以及在无通知的情况下修改、终止活动的权利，适用于所有优惠。
             </p>
        </div>
      </div>
      <div class="item" style=" overflow:hidden; clear:both;">
        <div class="hd">
          <h3><span>服务介绍</span></h3>
        </div>
        <div class="des">
          <p> 1、所获得优惠可直接提现。 <br>
            2、太阳城集团保留权利判断会员是否具备晋级VIP资质。 <br>
            3、若会员对活动有争议时，为确保双方利益，杜绝身份盗用行为，太阳城集团有权要求会员向我们提供充足有效的文件
            ，用以确认 是否享有该优惠的资质。 <br>
            4、所有太阳城集团的优惠特别为玩家而设，在玩家注册资讯有争议时，为确保双方利益，杜绝身份盗用行为，太阳城集团保留权利要求客户向我们提供充足有效 <br>
            的文件， 并以各种方式辨别客户是否符合资格享受有我们的任何优惠。 <br>
            5、每位玩家﹑每户﹑每一住址 、每一电子邮箱地址﹑每一电话号码﹑相同支付方式(相同借记卡/信用卡/银行账户) 及IP地址只能享有一次优惠；若会员有重复申 <br>
            请账号行为，公司保留取消或收回会员优惠彩金的权利； <br>
            6、太阳城集团保留对活动的最终解释权；以及在无通知的情况下修改、终止活动的权利；适用于所有优惠。 </p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class=""> <a href="javascript:click_url('/app/member/help/dlhz1.php');">关于我们</a> | <a  href="javascript:click_url('/app/member/help/dlhz5.php');" target="_blank">取款帮助</a> | <a href="javascript:click_url('/app/member/help/dlhz4.php');"  target="_blank">存款帮助</a> | <a href="javascript:click_url('/app/member/help/dlhz3.php');" target="_blank">合作伙伴</a> | <a onclick="window.open('http://www.baidu.com');" href="javascript:void(0);" target="_blank">联系我们</a> | <a href="javascript:click_url('/app/member/help/dlhz6.php');" target="_blank">常见问题</a><br>
    Copyright © 太阳城集团版权所有
    </div>
  </div>
</div>

</body>
</html>