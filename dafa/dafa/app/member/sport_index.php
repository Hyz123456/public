<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include_once "include/address.mem.php";
include_once "include/config.inc.php";
include_once "include/com_chk.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
echo "<script>if(self == top) parent.location='".BROWSER_IP."'\n;</script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="position:relative;top:0px;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>sport_index</title>
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="/cl/js/commjs/ieupdate.js"></script>
<script src="/cl/js/common.js"></script>
</head>

<body>
    <style>
body{background: #000;margin: 0; border: 0;padding: 0;}
.pagesbanner {height:230px;position:relative;width:100%;background:url(/pic/subban1.jpg) top no-repeat;}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg3.png) center no-repeat;line-height:30px;color:#FFFFFF;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}        
        
        
    </style>
<div class="pagesbanner">
	<div class="gonggao">
		<div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
         </div>
	</div>
</div>

<div class="cl h24"></div>    
    
<!-- 开始 -->
<div style="width: 100%;background: url(/pic/subbg1.jpg) no-repeat center top;">
    <div id="page-body" class="clearfix"> 
        
        <link rel="stylesheet" href="sport_index.css">

        <div class="w1000"> 
            <div class="Sports_events two">
                <a href="javascript:;" class="view2 view-tenth  fl_left">
                    <img class="hg_weihu_img" src="/pic/Newsports_hg.png"/>
                    <div class="mask-live">
                        <div class="physical_education_hg">
                            <div class="Penalty_three">
                                <h2>hg体育</h2>
                                <p>最专业的体育投注平台，每周精选数场精彩赛事为你投注，五大联赛，冠军杯，欧洲杯场场不落。</p>
                                <input type="button" value="立即畅玩" class="Sports_button" onclick="click_url('/app/member/sport.php',1)"/> 
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="/newbbin2/index.php" class="view2 view-tenth fl_right" target="_blank">
                    <img class="bb_weihu_img" src="/pic/Newsports_bb.png"/>

                    <div class="mask-live">
                        <div class="physical_education_bb">
                            <div class="Penalty_three">
                                <h2>bb体育</h2>
                                <p>BBIN宝盈集团在线上享有盛名，公平公开公正，每位荷官经过严格挑选，每次发牌洗牌均按照国际最高标准进行操作，视讯流畅清晰，深受玩家青睐。</p>
                                <input type="button" value="立即畅玩" class="Sports_button"/> 
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:;" class="view2 view-tenth  fl_left">
                    <img class="hg_weihu_img" src="/pic/Newsports_im.png"/>
                    <div class="mask-live">
                        <div class="physical_education_im">
                            <div class="Penalty_three">
                                <h2>IM体育</h2>
                                <p>IM体育近年来深受广大球迷喜爱，提供全球各大联赛投注，玩法多样。</p>
                                <input type="button" value="立即畅玩" class="Sports_button" onclick="alert('即将开放,敬请期待!')"/> 
                            </div>
                        </div>
                    </div>
                </a>

                <a href="javascript:;" class="view2 view-tenth fl_right">
                    <img class="sb_weihu_img" src="/pic/Newsports_sb.png"/>

                    <div class="mask-live">
                        <div class="physical_education_sb">
                        <div class="Penalty_three">
                            <h2>sb体育</h2>
                            <p>沙巴体育近年来深受广大球迷喜爱，提供全球各大联赛投注，玩法多样。</p>

                            <input type="button" value="立即畅玩" class="Sports_button" onclick="alert('即将开放,敬请期待!')"/>
                        </div>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
    </div>
</div>
<!-- 结束 -->
</body>
<script>
    $(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
    });
</script>
</html>