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


        $(window.parent.document).find("#mainFrame").height(2840);


        </script>
</head>
<body>
<style>
*{margin:0;padding:0;}
#img{width: 100%;
    height: 282px;
    background-image: url(sjtz.jpg);  background-repeat:no-repeat;background-position: center; margin-top: -18px;}
#img1{width:100%;height:331px;
background-image:url('about_top.png');
background-repeat:no-repeat;background-position: center;
margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background-image: url('about_bg01.png');background-repeat:no-repeat;background-position: center;margin-top:-180px}
#bgs{    background-image: url(about_bg02.png);
    min-height: 1055px;
    margin: 0 auto !important;
    width: 1275px;
    background-repeat: repeat-y;
    background-position: center; }
.bgs1{    width: 1130px;
    background-image: url(about_bg021.png);background-repeat:repeat-y;background-position: center; 
    min-height: 38px;
    margin: -37px auto;
}
.fonts{
    cursor: pointer;
    position: absolute;
    left: 50%;
    top: 131px;
    margin-left: -273px;
    color: white;
    font-size: 14px;
    width: 620px;
    height: 30px;
	font-family: 微软雅黑, Arial;
    line-height: 30px;
}
</style>

<style>
*{margin:0px;}
   #mwebbox  { width:100%; background:#232323; height:auto; overflow:hidden; min-width:1000px; font-family: "寰蒋闆呴粦", "Microsoft YaHei", "瀹嬩綋"; color:#FFF;    }
#mwebboxmid { width:100%; padding: 30px 0; height:auto; margin:0 auto; }

.setcmid { width:100%; height:auto; overflow:hidden; margin:0 auto; border-bottom:1px solid #4d4d4d;  }

.sect0 { width:555px; height:400px; background:url(sect0.png) no-repeat left top; margin:0 auto;  margin-top:30px; padding-left:445px;    }
.sect0top { height:38px; line-height:38px; font-size:28px; }
.sect0top span { display:block; float:left; height:38px; line-height:38px; font-size:36px; margin-right:15px; color: #FFF;  }
.sect0top span.appico { width:90px; background:url(appico.png) no-repeat left center; } 
.sect0info { line-height:22px; padding-top:10px; padding-right:10px;   font-size: 13px; color: #ccc; line-height:34px; }
.sect0info a { color:#FFF; }
.sectitle { margin:0; height:110px; background:url(sectitle.png) no-repeat center top;}
.sect1 { width:1000px;  height:500px; background:url(mobile_web_img.png) no-repeat right center; margin:0 auto; margin-top:30px;}
.sect1title { height:34px; line-height:34px; font-size:26px; padding-left:65px;  }

.fr, .right { float: right; display:inline;  }
.fl, .left {  float: left;  display:inline; }
.mwebleft { float:left; width:520px; margin-left:65px;   }
#mwebboxmid h3 { font-size:18px;  color: #fff; padding-top:25px; font-weight:normal; line-height:32px;  }
#mwebboxmid .inner { padding-top: 20px; height:auto; overflow:hidden;  }
.mqr-code { float:left; width:110px; height:110px; padding:6px; border:1px solid #575757;   }
.mqr-code-box { width:110px; height:110px; overflow:hidden; position:relative;  }
.mqr-code-box  img { position:absolute;  }
.mqr-code p { height:25px; line-height:25px; text-align:center; font-size:13px; color:#FF0; }
.mwinfo { float:left; width:365px; line-height:22px; height:auto; overflow:hidden;  padding-left:20px;     }
.mwinfo span.ft1 { font-size:16px; line-height:30px;    }
.mwtxt { margin:0; height:45px; line-height:45px; margin-top:10px;  }
.mwtxt span.wleft { float:left; display:block;  width:28px; height:45px; background:url(wleft.png) no-repeat;   }
.mwtxt span.wright { float:left; display:block; width:48px; height:45px; background:url(wright.png) no-repeat; }
.mwtxt a { display: block; float:left;  color: #FFFFFF;  font-weight: bold; padding:0 10px 0 0px;  height: 45px; line-height: 45px; background:url(wmid.png) repeat-x; text-align: center; }

.sect2 { width:1000px;  height:635px; background:url(sect2.png) no-repeat center bottom; margin:0 auto; overflow:hidden;     }
.sect2top { margin-top:60px; height:180px; padding-left:248px;  }
.sect2left { float:left; width:130px; }
.s2qr { float:left; border:1px solid #575757; padding:9px; width:110px; height:110px;   }
.s2qrtxt { line-height: 45px;
    text-align: center;
    color: #f5fe02;
    padding-top: 0px;
    font-size: 12px;
}
.sect2right { float:left; padding-left:20px; width:460px; height:auto; overflow:hidden; }
.sect2right font.agid { background:#F00; color:#FFF;  line-height:24px; padding:3px;   }
.se2rt { font-size:36px; color:#FFF; height:50px; line-height:50px;  }
.sect2right p { line-height:35px; font-size:16px; color: #ccc; margin:0px;   }
.sect2right p a { color:#ebfa02;}
   </style>


<div id="img"></div>
<div id="img1"><marquee onclick="HotNewsHistory();" class="fonts"  scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div>
<div id="img2"></div>

<div id="bgs" 		   style="margin-left:2px;" >
   <div style="height: auto;
    padding-bottom: 30px;width:1039px;margin:auto;">

   





   <div class="fullwraps"    style=" margin-top: -14px;">
   
<div id="mwebbox">
  <div id="mwebboxmid">
     
     <div class="sectitle"></div>
     <div class="setcmid">
     <div class="sect1">
       <div class="sect1title">手机Wap版</div>
       <div class="mwebleft">
           <h3>多元化移动娱乐平台、精彩随时随地、一切尽在掌中！美女荷官相伴，刺激不打烊</h3>
           <div class="inner">
              <div class="mqr-code fl">
                 <div class="mqr-code-box">
                      <img src="./ewm.png" width="110" height="110">
                 </div>     
                 <div class="clear"></div>
                 <div class="s2qrtxt">扫一扫，二维码开玩</div>
              </div>
              <div class="mwinfo">
                  <span class="ft1"><font color="#c6d20a">一机在手</font>，娱乐无穷。视讯/电子/彩票/体育，即时下注，让您<font color="#c6d20a">走到哪玩到哪</font>！<br>手机浏览器输入
                  <div class="mwtxt">
                      <span class="wleft"></span>
                      <a href="/wap.php" target="_blank" style="color:red;">yl66y.com/wap.php</a>
                      <span class="wright"></span>
                  </div>
              </span></div>
              
           </div>
        </div>
      </div>
     </div> 
     <div class="clear"></div>
     <a id="1"></a>
     <div class="setcmid">
     <div class="sect0">
        <div class="sect0top">
           <span>APP客户端</span>
           <span class="appico"></span>
        </div>
        <div class="sect2top" style="padding-left:0px; margin-top: 40px; ">
            <div class="sect2left">
               <div class="s2qr"><img src="" width="110" height="110" alt="暂无二微码" style="color:red;text-align:center;line-height:110px"></div>
               <div class="clear"></div>
               <div class="s2qrtxt">扫一扫，二维码开玩</div>
            </div>
            <div class="sect2right" style="width:405px;  ">
                <p>①&nbsp;&nbsp;手机扫描二维码，进入APP下载页面，点击下载</p>
                <p>②&nbsp;&nbsp;APP安装和授权 <a href="javascript:;" target="_blank">点此查看IOS版教程</a></p>
                <p>③&nbsp;&nbsp;APP注册的用户必填识别码,识别码为：<font class="agid">848027</font></p>
                <p>④&nbsp;&nbsp;注册会员和登录操作教程，<a href="javascript:;" target="_blank">点击查看</a></p>
            </div>
         </div>
         <div class="sect0info">
            <font color="#f5fe02">注意：</font>第一步使用微信扫描下载的用户，请在扫描后，点击右上角选择“在浏览器中打开”。
         </div>
      </div>
      </div>
      <div class="clear"></div>
      <div class="sect2"  >
         <div class="sect2top">
            <div class="sect2left">
               <div class="s2qr"><img src="./ag.png" width="110" height="110" alt="暂无二微码" style="color:red;text-align:center;line-height:110px"></div>
               <div class="clear"></div>
               <div class="s2qrtxt">手机扫描下载安装</div>
            </div>
            <div class="sect2right">
                <div class="se2rt">AG客户端下载</div>
                <p><font color="#ebfa02">①</font>&nbsp;&nbsp;&nbsp;进入AG游戏大厅，找到左侧的手机标识，点击“立即体验”</p>
                <p><font color="#ebfa02">②</font>&nbsp;&nbsp;&nbsp;按照指南进行安装，并扫描二维码登录</p>
                <p><font color="#ebfa02">③</font>&nbsp;&nbsp;&nbsp;AG客户端安装指南  <a href="/cl/main.php">点击查看</a></p>
            </div>
         </div>
      </div>





	  		         <div class="sect2" style="background:url(sect3.png) no-repeat center bottom;">
         <div class="sect2top">
            <div class="sect2left">
               <div class="s2qr"><img src="./ab.png" width="110" height="110" alt="暂无二微码" style="color:red;text-align:center;line-height:110px"></div>
               <div class="clear"></div>
               <div class="s2qrtxt">手机扫描下载安装</div>
            </div>
            <div class="sect2right">
                <div class="se2rt">AB客户端下载</div>
                <p><font color="#ebfa02">①</font>&nbsp;&nbsp;&nbsp;进入AB游戏大厅，找到左侧的手机标识，点击“立即体验”</p>
                <p><font color="#ebfa02">②</font>&nbsp;&nbsp;&nbsp;按照指南进行安装，并扫描二维码登录</p>
                <p><font color="#ebfa02">③</font>&nbsp;&nbsp;&nbsp;AB客户端安装指南  <a href="/cl/main.php">点击查看</a></p>
            </div>
         </div>
      
     
  </div>
</div>


</div>




</div>
   </div>
   <div class="bgs1"></div>
</body>
</html>