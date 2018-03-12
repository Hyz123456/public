<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="../../js/jquery-1.7.1.js"></script>
        <script language="JavaScript">


        $(window.parent.document).find("#mainFrame").height(1870);


        </script>
</head>
<body>
<style>

*{padding:0;margin:0;}
#img{width:100%;height:244px;background:url('/imgs/huanying.jpg')center;margin-top:40px;}
#img1{width:100%;height:331px;
background:url('about_top.png')no-repeat center;margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background: url('about_bg01.png')no-repeat center;margin-top:-180px} 
#bgs{width: 1039px;height:auto;background:#482D00;margin:auto;border:1px solid #FFFF31;min-height: 888px;margin: auto;position:relative;top:11px;}
    .about_bg{ width:100%;height:auto; background:url(/cl/bg2.jpg);background-repeat: repeat-x; }
.bgs1{    width: 1130px;

    min-height: 38px;
    margin: -37px auto;
}
</style>


<div id="img"></div>
 <div class="about_bg">
		       <div class="zxxx" style="    background-image: url(/cl/zxgg1.jpg);
    background-repeat: no-repeat;
    height: 45px;
    background-position: center;
}">
            <div style="width: 1000px; margin: 0px auto; line-height: 42px; color: #fff;">
                <marquee scrollamount="3" scrolldelay="150" direction="left" onmouseover="this.stop();" onclick="HotNewsHistory();"  onmouseout="this.start();" style="cursor: pointer; margin-left: 80px;"><span id="messageSpan"><?=$msg;?></span></marquee>
				  <script language="javascript" src="images/swfobject_source.js"></script>
				   <script>
					 function HotNewsHistory(){
            window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
        }
				   </script>
            </div>
            <script>
                $(function () {
                    // 最新消息跑馬燈
                    $.ajax({
                        type: 'POST',
                        url: '/app/member/Message.ashx?act=NewInfo',
                        data: {},
                        cache: false,
                        error: function () { return false; },
                        success: function (data) {
                            data = $.parseJSON(data);
                            var html = '';
                            for (var i = 0; i < data.length; i++) {
                                //html += '[';
                                //html += data[i].time;
                                //html += '] ';
                                html += data[i].report_content;
                                html += '&nbsp;&nbsp;&nbsp;&nbsp;';
                            }
                            $("#messageSpan").html(html);

                        }
                    });
                });
            </script>
        </div>
		<!--
<div id="img1"><marquee onclick="HotNewsHistory();" style="cursor:pointer;position:absolute;left:360px;top:137px;color:white;font-size:13px" scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div>


-->
										<div class="ele-nav-guid-wrap" style=" position:relative;top:20px;background: url('/cl/about_txt_bg_top.png') center top no-repeat;
width: 100%;
height: 80px;">
           
        </div>
<div id="bgs">
   <div style="height:1531px;width:1039px;background:url('mobile1.jpg')no-repeat;margin:0px auto"></div>
   </div>
   <div class="bgs1"></div>
   
   </div>
</body>
</html>