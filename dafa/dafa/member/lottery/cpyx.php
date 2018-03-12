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
<title></title>
<script src="/js/jquery-1.7.1.js"></script>
<link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet"/>
    <link href="/cl/tpl/starball/ver1/css/starball.css" rel="stylesheet"/>
    <script src="/cl/js/jquery-1.7.2.min.js"></script>
    <script src="/cl/js/common.js?v=2.0"></script>
    <script>
	$(window.parent.document).find("#mainFrame").height(1093);

	</script>
</head>

<body>
<div class="pagesbanner" style="background:url(/pic/bannerlottery.jpg)center -160px no-repeat">
	<div class="gonggao">
		<div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
         </div>
	</div>
</div>

<div class="pages" style="background:url(/pic/lotterybg.jpg) top center">
	<div class="live w1000">
        <dl>
		   <a href="/member/lt" target="mainFrame">
           <dt><img src="/member/lottery/02.png"></dt>
           <dd>香港六合彩<i>Mark Six</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_Hk6hc.html','_blank')">游戏规则</span>
        </dl>
        <dl>
            <a href="Cqssc.php" target="mainFrame">
                <dt><img src="/pic/04.png"></dt>
                <dd>重庆时时彩<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_Cqssc.html','_blank')">游戏规则</span>
        </dl>
        <dl>
		     <a href="tjssc.php" target="mainFrame">
                <dt><img src="/pic/06.png"></dt>
                <dd>天津时时彩<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_tjssc.html','_blank')">游戏规则</span>
        </dl>
        <dl>
           <a href="pk10.php" target="mainFrame">
                <dt><img src="/pic/01.png"></dt>
                <dd>北京PK拾<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_BjPk10.html','_blank')">游戏规则</span>
        </dl>
        <dl>
		    <a href="kl8.php" target="mainFrame">
                <dt><img src="/pic/bjkl8.png"></dt>
                <dd>北京快乐8<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_kl8.html','_blank')">游戏规则</span>
        </dl>
        <dl>
            <a href="gxsf.php" target="mainFrame">
                <dt><img src="/pic/gxklsf.png"></dt>
                <dd>广西快乐十分<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_gxsf.html','_blank')">游戏规则</span>
        </dl> 
        <dl>
            <a href="cqsf.php" target="mainFrame">
                <dt><img src="/pic/09.png"></dt>
                <dd>重庆快乐十分<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_cqsf.html','_blank')">游戏规则</span>
        </dl>
        <dl>
            <a href="gdsf.php" target="mainFrame">
                <dt><img src="/pic/08.png"></dt>
                <dd>广东快乐十分<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_Gdsf.html','_blank')">游戏规则</span>
        </dl>
        <dl>
            <a href="tjsf.php" target="mainFrame">
                <dt><img src="/pic/09.png"></dt>
                <dd>天津快乐十分<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_tjsf.html','_blank')">游戏规则</span>
        </dl>  
        <dl>
            <a href="gd11.php" target="mainFrame">
                <dt><img src="/pic/gd11x5.png"></dt>
                <dd>广东11选5<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_gd11x5.html','_blank')">游戏规则</span>
        </dl>
        <dl>
		    <a href="3d.php" target="mainFrame">
                <dt><img src="/member/lottery/3d.png"></dt>
                <dd>福彩3D<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_3d.html','_blank')">游戏规则</span>
        </dl>
        <dl>
            <a href="pl3.php" target="mainFrame">
                <dt><img src="/member/lottery/pl3.png"></dt>
                <dd>排列3<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_pl3.html','_blank')">游戏规则</span>
        </dl>
        <dl>
            <a href="shssl.php" target="mainFrame">
                <dt><img src="/pic/05.png"></dt>
                <dd>上海时时乐<i>lottery</i></dd>
            </a>
            <span class="rule" onclick="window.open('rule/Rule_ssl.html','_blank')">游戏规则</span>
        </dl>
        <dl>
		     <dt><img src="/pic/14.png"></dt>
        </dl>
        <dl>
			<dt><img src="/pic/14.png"></dt>
        </dl>	     
	</div>
</div>
<style>
body{font-size: 12px;line-height: 18px; font-family:"微软雅黑";}
*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}

.pagesbanner {height:273px;position:relative;width:100%;}
.pagesbanner .gonggao {height:35px;background:url(/pic/gonggaobg.png) top center no-repeat;line-height:35px;color:#c8a365;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}
.pages {overflow:hidden;width:100%;margin:auto;}


.live {background:#0a0c1c;height:auto;overflow:hidden;padding-top:20px;padding-left:20px;width:980px;padding-bottom:20px;}
.live dl {float:left;text-align:center;margin-right:10px;display:inline;margin-bottom:10px;background:url(/pic/liveon.png) no-repeat;}
.live dl a {width:184px;height:234px;display:block;transition:all 0.3s;padding-top:16px;}
.live dl:hover {background:url(/pic/livehover.png) no-repeat;}
.live dl dt {padding-bottom:10px;}
.live dl dd {font-size:16px;line-height:20px;color:#fff;font-family:"Microsoft Yahei";}
.live dl .rule {position:absolute;width:90px;height:28px;display:block;margin-left:48px;margin-top:-42px;cursor:pointer;color:#fff;background:#252945;line-height:28px;font-size:12px;font-family:"Microsoft Yahei";}
.live dl .rule:hover {background:#e48c00;}
.live dl dd i {font-size:12px;line-height:18px;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;display:block;}
.live dl a:hover dd {color:#e48c00;}

</style>

</body>
</html>