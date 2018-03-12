<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
@include_once($C_Patch."/app/member/class/user.php");
@include_once($C_Patch."/live/agid.php");
$uid = $_SESSION['userid'];
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$web_site['web_name']?></title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
    if(self==top){
        top.location='/index.php';
    }

</script>

<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript" src="/js/top.js"></script>
<script language="javascript" src="/cl/js/common.js"></script>
<link href="/member/zhenren/newindex/standard.css?_=171" rel="stylesheet" type="text/css" />
<link href="/member/zhenren/newindex/haier2.css" rel="stylesheet" type="text/css">
<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<style>
    #bg_000 .main_bg{    width: 100%;
    height: 251px;
    background: url(/imgs/about_zr.png) repeat-x center -7px;}
    #bg_000 .about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
    #bg_000 .about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
    .about_main_w .about_top{ width:1080px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
    .about_main_w .about_main{ width:1080px; background:url(/imgs/about_bg02.png) repeat-y center top; }
    .about_main_top{
        background: url(../imgs/about_bg01.png) no-repeat center 0px;
        height: 89px;
        color: #fff;
        padding-left: 125px;
    }
    .pic_list div{ width:990px; height:254px; margin:20px auto 0; overflow:hidden; }
    div.list_1{ background:url(/imgs/1.png) no-repeat center top; margin-top:0; }
    div.list_2{ background:url(/imgs/2.png) no-repeat center top; }
    div.list_3{ background:url(/imgs/3.png) no-repeat center top; }
    .pic_list div a{ display:block; float:left; width:50%; height:100%; }
	.fonts{   
		cursor: pointer;
    color: white;
    font-family: 微软雅黑, Arial;
    font-size: 13px;
	height: 30px;
	line-height: 30px;
	}
</style>
<body id="zhuce_body" style="padding: 0x;margin:0;min-width:1000px;background:#8c5e00;">
    <div id="bg_000">
	   	<div class="main_bg"></div>
        <div class="about_bg">
            <div class="about_main_w">
                <div class="about_top">
                    <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"><marquee class="fonts" onclick="HotNewsHistory();"  scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div></div>
                </div>
                <div class="about_main">
                    <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">
                        
                    </div>
                    <div style="height:8px;"></div>
					<!-- <div style="width:1000px;margin:auto;"><a href="/newna2" target="_blank" onclick="return logins();"><img src="/imgs/dasdsdad.png"></a></div>
					 <div style="height:8px;"></div> -->
<style>
#kk{width:983px;margin:auto;min-height:100px;padding-bottom:50px;}
#kk a div{margin-left:23px;margin-top:10px;}
#bbin{width:480px;height:252px;background:url('huangguan.png');float:left;margin-left:0px !important;}

#mg{width:480px;height:252px;background:url('biib.png');float:left;}

</style>
							
							<div id="kk">
								<a href="javascript:;" onclick="click_url('/app/member/sport.php',1)">
									<div id="bbin"></div>
								</a>
								
								<a href="javascript:;" onclick="click_url('/app/member/sport1.php',1)">
									<div id="mg"></div>
								</a>
								
							</div>
							







							<!-- <div style="width:1000px;margin:0 auto;">
							 <div style="padding: 0 10px 0 3px;width: 1000px;">
							                            
							<div style="width:1016px;height:66px;background:url(/imgs/sx-titbg.png) no-repeat center top;"></div>
										<div style="width:1000px; padding:0 10px 0 0;margin-left: 5px;">
											<div class="pic_list" style="border:1px #857609 solid;border-top: none;background: #291b02;">
													<div class="list_1">
														<a href="/newbbin2/"target="_blank" onclick="return logins();"></a>
														<a href="/newag2/" target="_blank"  onclick="return logins();"></a>
													</div>
												   <div class="list_2" style="display:none">
														<a href="javascript:;" ></a>
														<a href="javascript:;"></a>
													</div>
													 <div class="list_3">
														<a href="/newmg2/"target="_blank"  onclick="return logins();"></a>
														<a href="/newallbet2/" target="_blank"  onclick="return logins();"></a>
													</div> 
										 </div>
										</div>
								</div>
							 </div>-->
							<div style="clear:both;height:30px;"></div> 
							
						 <div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
    <script>

    $(window.parent.parent.document).find("#mainFrame").height(743);
    $(window).ready(function(){
        var aDivList = $('.pic_list div');
        var arr = [['/imgs/11.png','/imgs/12.png','/imgs/1.png'],['/imgs/21.png','/imgs/22.png','/imgs/2.png'],['/imgs/31.png','/imgs/32.png','/imgs/3.png']];

        aDivList.each(function(i){
            aDivList.eq(i).on('mouseover','a',function(){
                $(this).parent().css('backgroundImage','url('+arr[$(this).parent().index()][$(this).index()]+')');
            });
            aDivList.eq(i).on('mouseout','a',function(){
                $(this).parent().css('backgroundImage','url('+arr[$(this).parent().index()][2]+')');
            });
        });        
    });
    </script>
	<script>
			function logins(){
					var  ontLogin = $(window.top.document.body).find('#topFrame').contents().find('.mainBoxs');
						if( !ontLogin.size()){
								return true;
						}else{
							alert('请先登陆');
								return false;
						}
			};
	</script>
    </div>
</body>
</html><?
$mysqli->close();
?>