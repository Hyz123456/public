<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/resource/lottery/getContentName.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/six_lottery_order.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/class/user.php");

$module = $_REQUEST["module"];
$method = $_REQUEST["method"];
$args = $_REQUEST["args"];
$other = $_REQUEST["other"];
$type = $_REQUEST["type"];
$msg_id = $_REQUEST["msgid"];

$userInfo = user_group::getLimitAndFsMoney($_SESSION["userid"]);
//print_r($userInfo['ag_money']);
if($module=="MACenterView" && $method=="memberData"){
?>
<div id="MACenterContent">
    <div id="MNav">
        <!--<span class="mbtn" >基本资讯</span>-->
		
        <div class="navSeparate"></div>

		<a href="javascript: f_com.MGetPager('MACenterView','memberData');" class="mbtn">我的帐户</a>

		<div class="navSeparate"></div>
    </div>

<style>
body{    color: #000;
    padding-top: 10px;
    font-family: 微软雅黑;}
	#yinyin{margin: 19px 0 0 43px;width:177px;height:140px;background-image:url('/cl/circlebg11.png');float:left;background-repeat:no-repeat;position: relative;left: 10px;}
	#wenzi{    z-index: 9999999;
    position: relative;width: 526px;float:left;margin-top:10px;}
	#yue{margin: 17px 0 0 43px;
	background-color:#DCDCDC;width:705px;height:147px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}

	#yue img{margin-top: 7px;margin-left: 18px;}

	#yue1{background-color:#DCDCDC;width:705px;height:99px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}

	.kkk1{font-size: 14px;width:175px;height:53px;border-bottom: 1px solid #C2C2C2;text-indent: 1em;float:left;padding:0;text-align:center;
    border-right: 1px solid #C2C2C2;
	line-height:55px;
	}

	.kkk2{margin-top: 7px;color:red;display:none;}

	.tab1{width: 194px;height: 31px;line-height: 31px;text-align: center;font-family: 微软雅黑;font-size: 15px;color: #fff;float:left;}

    .info-sec-title {height: 22px;line-height: 17px;color: #6A8A8C;font-size: 15px;padding-right: 5px;letter-spacing: 2px;
        text-align: right;background: url(/cl/line.png) -40px bottom no-repeat;}
        .info-sec-txt {width: 100%;height: 17px;overflow: hidden;white-space: nowrap;
            text-overflow: ellipsis;border-right: 4px #6A8A8C solid;}
			
</style>
<div id="yinyin"></div>
<div id="wenzi">
	<img src="/cl/welcome.png" style="margin-left: -40px"><br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 18px;">欢迎进入基本信息</span>
	<br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 13px;">用户名:
		<span style="color:#6A8A8C;font-size:16px;font-weight: 100;"><?=$userInfo["user_name"]?></span>
	</span>
	<br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 13px;">余　额:
		<img src="/tpl/commonImage/money_RMB.gif" align="absmiddle" title="人民币" alt="人民币" style="position: relative;top: -3px;">
		<span style="color:#6A8A8C;font-size:16px;font-weight: 100;"><?=$_SESSION["user_money"]?><span style="color:#000;font-size:15px;margin-left: 10px;">人民币(RMB)</span></span>
	</span>

    <div class="info-sec-title">
        <div class="info-sec-txt" title="即时帐号资讯">
            即时帐号资讯
        </div>
    </div>

</div>
<div style="clear: both;"></div>
<span style="height: 23px;
    line-height: 23px;
    color: #000;
    font-weight: bold;
    font-size: 16px;
    font-family: 微软雅黑;
    margin: 17px 0 0 43px;">安全设置</span>

<div id="yue">　
	<?php  


include_once($_SERVER['DOCUMENT_ROOT']."/app/member/class/user.php");

$uid = $_SESSION['userid'];
$userInfo=user::getinfo($uid);
	?>

	

	<div style="width:1px;height:17px;"></div>
	<div class="kkk1">帐户</div>
	<div class="kkk1">余额</div>
	<div class="kkk1" style="">密码</div>
	<div class="kkk1" style="">取款密码</div>
	<div class="kkk1"><?=$userInfo["user_name"]?></div>
	<div class="kkk1"><?=$userInfo["money"]?></div>
	<div class="kkk1" style=""><input type="button" id="changepw" value="修改" /> </div>
	
	<div class="kkk1" style=""><input type="button" id="change_qk" value="修改" /></div>


</div>

<img src="/cl/shadow03.png" style="margin: 0px 0 0 43px;"> 
<style>
@-webkit-keyframes rotate {
  0%{-webkit-transform:rotate(0deg);}
  50%{-webkit-transform:rotate(180deg);}
  100%{-webkit-transform:rotate(360deg);}
}
@-moz-keyframes rotate{
-moz-transform:rotate(0deg);
-moz-transform:rotate(180deg);
-moz-transform:rotate(360deg);
}

#spinner {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}


#spinnera {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerb {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}
	
#spinnerc {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerd {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnere {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerdz {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnercp {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}
</style>
<script>
	
	$(document).ready(function(){
		 $('#spinner1').click(function(){
					
					 $('#spinner1').css('display','none');
					 $('#spinner').css('display','block');

		 		      setTimeout(tjj,1000)	
				
		 	});
			function tjj(){

				$('#spinner').css('display','none');
				$('#general_ab').css('display','block');
				
			}	

		$('#spinner1a').click(function(){
					
					 $('#spinner1a').css('display','none');
					 $('#spinnera').css('display','block');

		 		      setTimeout(tjj1,1000)	
				
		 	});
			function tjj1(){

				$('#spinnera').css('display','none');
				$('#general_na').css('display','block');
				
			}

		$('#spinner1b').click(function(){
					
					 $('#spinner1b').css('display','none');
					 $('#spinnerb').css('display','block');

		 		      setTimeout(tjj2,1000)	
				
		 	});
			function tjj2(){

				$('#spinnerb').css('display','none');
				$('#general_pt').css('display','block');
				
			}

		$('#spinner1c').click(function(){
					
					 $('#spinner1c').css('display','none');
					 $('#spinnerc').css('display','block');

		 		      setTimeout(tjj3,1000)	
				
		 	});
			function tjj3(){

				$('#spinnerc').css('display','none');
				$('#general_mg').css('display','block');
				
			}

		$('#spinner1d').click(function(){
					
					 $('#spinner1d').css('display','none');
					 $('#spinnerd').css('display','block');

		 		      setTimeout(tjj4,1000)	
				
		 	});
			function tjj4(){

				$('#spinnerd').css('display','none');
				$('#general').css('display','block');
				
			}
		$('#spinner1e').click(function(){
					
					 $('#spinner1e').css('display','none');
					 $('#spinnere').css('display','block');

		 		      setTimeout(tjj5,1000)	
				
		 	});
			function tjj5(){

				$('#spinnere').css('display','none');
				$('#MSunplusCredit').css('display','block');
				
			}

		$('#spinner1dz').click(function(){
					
					 $('#spinner1dz').css('display','none');
					 $('#spinnerdz').css('display','block');

		 		      setTimeout(tjj6,1000)	
				
		 	});
			function tjj6(){

				$('#spinnerdz').css('display','none');
				$('#bh_dz').css('display','block');
				
			}

		$('#spinner1cp').click(function(){
					
					 $('#spinner1cp').css('display','none');
					 $('#spinnercp').css('display','block');

		 		      setTimeout(tjj7,1000)	
				
		 	});
			function tjj7(){

				$('#spinnercp').css('display','none');
				$('#bh_cp').css('display','block');
				
			}
		})
	
</script>
<script type="text/javascript">
   
	
    function ALL_money(){
        $.getJSON("/app/member/getdata.php?callback=?", function (json) {
            if (json.close == 1) {
                parent.location.href = '/close.php';
            }
            $("#MBallCredit").html(json.user_money);
        });
    }
    function AG_money(){
        $.get("/newag2/cha.php?callback=?",function(data){
           data = eval('('+data+')');
           $("#MSunplusCredit").html(data.general);
          
        });

    }
    function BB_money(){
        $.get("/newbbin2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general").html(data.general);
        });

    }
	function MG_money(){
        $.get("/newmg2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_mg").html(data.general);
        });

    }
	function AB_money(){
        $.get("/newallbet2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_ab").html(data.general);
        });

    }
	function PT_money(){
        $.get("/newpt2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_pt").html(data.general);
        });

    }

	function NA_money(){
        $.get("/newna2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_na").html(data.general);
        });

    }
	function CP_money(){

        $.get("./cpjk/cha.php",function(data){
			
            data = eval('('+data+')');
            $("#bh_dz").html(data.general);
        });

    }
	function dx_money(){

        $.get("./newdx/cha.php",function(data){
			
            data = eval('('+data+')');
            $("#bh_cp").html(data.general);
        });

    }
    AG_money(); BB_money();MG_money();AB_money();PT_money();NA_money();CP_money();dx_money();

 
</script>
    
</div>
<script type="text/javascript">
    $("#changepw").click(function() {
        window.open('/app/member/account/chg_passwd.php','Chg_pass','width=360,height=320,status=no,scrollbars=yes').focus();
    });
    $("#change_qk").click(function() {
        window.open('/app/member/account/chg_qk_qassw.php','Chg_pass','width=360,height=320,status=no,scrollbars=yes').focus();
    });
    
</script>
<?php 
}elseif($module=="MACenterView" && in_array($other, array("memberData","moneyView","bankSavings","bankTake","ballRecord","msg"))){
    include_once "pages/main_frame.php";
}elseif($module=="MGetData" && $method=="GetSunPlusDetail" && $args=="Y"){
?>
    {"Balance4":"---"}
<?php 
}elseif($module=="MACenterView" && $method=="hotNews"){

    include_once "../app/member/class/sys_announcement.php";
$announcementArray = sys_announcement::getAnnouncementList();
    $subPage = '';
    if($announcementArray && count($announcementArray)>0){
    foreach ($announcementArray as $key =>$announcement) {
        if($key>9){
            break;
        }
        $subPage = $subPage.'
        <tr class="MColor1" align="center">
          <td>'.$announcement['create_date'].'</td>
          <td class="MContent">'.$announcement['content'].'</td>
        </tr>';
    }
    }else{
        $subPage = $subPage.'
        <tr class="MColor1" align="center">
          <td colspan="2">暂时没有消息</td>
        </tr>';
    }
?>
    <style type="text/css">

    </style>
    <div id="MACenterContent">
        <div id="MNav">
            <span class="mbtn" >最新消息</span>
            <div class="navSeparate"></div>
            <a class="mbtn" style="display: none;" href="javascript: f_com.MChgPager({method: 'hotHistory'})" >历史讯息</a>
        </div>
        <div id="MMainData">
            <h2 class="MSubTitle">最新消息</h2>
            <table class="MMain" border="1">
                <thead>
                <tr>
                    <th style="width: 87px;" nowrap>日期</th>
                    <th nowrap>内容</th>
                </tr>
                </thead>
                <tbody>
                <?=$subPage?>
                </tbody>
            </table>
        </div>
    </div><script type="text/javascript">
        $('#CurrentPage').change(function () {
            var option = {
                "module": 'MACenterView',
                "method": 'hotNews'
            };
            var other = {
                'CurrentPage' : this.value
            };
            f_com.MChgPager(option, other);
        });
    </script>
<?php 
}elseif($module=="MACenterView" && $method=="msg"){//个人信息

    include_once "../app/member/class/sys_announcement.php";
    $userMassageList = sys_announcement::getUserMassageList($_SESSION["userid"]);
    $subPage = '';
    if($userMassageList && count($userMassageList)>0){
    foreach ($userMassageList as $key =>$userMsg) {
        $subPage = $subPage.'
        <tr id="list'.$userMsg["msg_id"].'" class="haveRead MColor1">
            <td style="text-align:center;width: 150px;">'.$userMsg["msg_time"].'</td>
            <td class="msgdetail" style="padding:0 5px;">
                <a href="javascript:void(0)" title="详细内容" style="display:block;" onclick="oMsg.processMsg(\''.$userMsg["msg_id"].'\', 1, \'getdetail\');">'.$userMsg["msg_title"].'</a>
            </td>
            <td style="text-align:center;"><span id="islook'.$userMsg["msg_id"].'">'.($userMsg["islook"]=="1"?"已读":"未读").'</span></td>
            <td style="text-align:center;">
                <a href="javascript:void(0)" onclick="oMsg.processMsg('.$userMsg["msg_id"].', 1 ,\'delmsg\');">删除</a>
            </td>
        </tr>';
    }
    }else{
        $subPage = $subPage.'
        <tr  class="haveRead MColor1">
            <td style="text-align:center;" colspan="4">暂时没有个人消息</td>
        </tr>';
    }
?>
    <div id="MACenterContent">
        <div id="MNav">
            <span class="mbtn" >个人信息</span>
        </div>
        <div id="MMainData" style="margin-top: 8px;">
            <div class="MControlNav">
                <span style="border: 1px solid red; padding: 2px;">提示：所有信息都变成'已读'状态时，网站的提示声音会自动消失。</span>
            </div>
            <table class="MMain" border="1">
                <thead>
                <tr>
                    <th>发送时间</th>
                    <th>主题</th>
                    <th>是否已读</th>
                    <th>功能</th>
                </tr>
                </thead>
                <tbody id="general-msg">
                <?=$subPage?>
                </tbody>
                <tfoot id="msgfoot" style="display:none;">
                <tr><td colspan='4' style='text-align:center;'></td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var oMsg = {
            "totalPage": {},    //總頁數
            "pageMsg": 50,      //每頁顯示訊息數
            "msglist": $('#general-msg'),
            'currentPage': 1,    //當前頁碼
            //訊息處理(閱讀、刪除、設定未讀訊息)
            "processMsg": function(msgId, type, method) {
                var msgwrap = $("#msg" + msgId);
                if(document.getElementById("msg" + msgId) && method == 'getdetail') {
                    if(msgwrap.is(":hidden")) {
                        $("p[id^=msg]").not("#msg" + msgId).slideUp(function() {
                            $(this).parent().css("display", "none");
                        });
                        msgwrap.parent().css("display", "").end().slideDown();
                    }else{
                        msgwrap.slideUp(function() {
                            $(this).parent().css("display", "none");
                        });
                    }
                } else {
                    $.ajax({
                        type:'GET',
                        url:'index.php',
                        dataType:'json',
                        data: {'module': 'MemberMsg', 'method': method, 'type': type, 'msgid': msgId},
                        cache: false,
                        error: function() {
                            alert('Failed!! Please Try Again!!');
                            return false;
                        },
                        success: function(data) {
                            switch(method) {
                                case "getdetail":
                                    $("p[id^=msg]").slideUp(function() {
                                        $(this).parent().css("display", "none");
                                    });
                                    $("#list" + msgId).removeClass('notRead').addClass("haveRead");

                                    var content = "<tr class='msgcontent'><td style='padding-left:5px;' width='524' colspan='4'><p id='msg" + msgId + "' style='display:none;'>" + data.content +"</p></td></tr>";
                                    $("#list" + msgId).after(content);
                                    $("#msg" + msgId).slideDown();
                                    $("#islook" + msgId).text("已读");
                                    break;
                                case "delmsg":
                                    if($("#list" + msgId).next().is("tr[class=msgcontent]")) {
                                        $(".msgcontent").remove();
                                    }
                                    $("#list"+msgId).remove();
                                    oMsg.page(oMsg.currentPage);
                                    break;
                            }

                        }
                    });
                }
            },
            "page": function(p) {
                this.msglist.find("tr").css({"background-color": ""});
                $(".msgcontent").remove();
                oMsg.currentPage = p;
                this.totalPage = Math.ceil(this.msglist.find("tr").length / this.pageMsg);

                if(this.totalPage > 1) {
                    $("#msgfoot").show();
                }
                if(this.totalPage == 1) {
                    $("#msgfoot").hide();
                }
                $("#msgfoot tr td").html("");
                oMsg.msglist.find("tr").hide();

                //判斷最後一頁是否有筆數
                if(oMsg.currentPage > this.totalPage) {
                    oMsg.currentPage = this.totalPage ;
                }
                for(var i = ((oMsg.currentPage-1) * oMsg.pageMsg ) ; i < oMsg.pageMsg + ((oMsg.currentPage - 1) * oMsg.pageMsg); i++) {
                    oMsg.msglist.find("tr:eq(" + i + ")").show();
                }
                for(var t = 1 ; t <= this.totalPage ; t++) {
                    if(oMsg.currentPage == t) {
                        $("#msgfoot tr td").append("<span id='currentpage'>" + t + "</span>");
                    } else {
                        $("#msgfoot tr td").append("<a class='pagelink' href='#' onclick='oMsg.page(" + t + ")'>" + t + "</a>");
                    }
                }
            }
        }

        oMsg.page(oMsg.currentPage);

        $(".MMain tbody tr").hover(function(){
            $("td", this).addClass("mouseenter");
            $("td a", this).addClass("mouseenter");
        }, function() {
            $("td", this).removeClass("mouseenter");
            $("td a", this).removeClass("mouseenter");
        });
    </script>

<?php 
}elseif($module=="MemberMsg" && $method=="getdetail" && $type=="1"){
    include_once "../app/member/class/sys_announcement.php";
    $userMassage = sys_announcement::getUserMassageById($msg_id);

    $sql = "update user_msg set islook='1' where msg_id='$msg_id'";
    $query	=	$mysqli->query($sql);
    echo '{"adddate":"'.$userMassage["msg_time"].'","subject":"'.$userMassage["msg_title"].'","content":"'.str_replace(PHP_EOL," ",$userMassage["msg_info"]).'"}';
}elseif($module=="MemberMsg" && $method=="delmsg" && $type=="1"){
    $sql = "delete from user_msg where msg_id='$msg_id'";
    $query	=	$mysqli->query($sql);
    echo '[]';
}elseif($module=="MACenterView" && ($method=="gameSwitch" && $type=="betrecord" || $method=="ballRecord")){//体育赛事报表
    include_once "pages/record_sport.php";
}elseif($module=="MACenterView" && $method=="sportGameHistory"){//体育赛事报表-某一天数据
    include_once "pages/record_sport_oneday.php";
}elseif($module=="MACenterView" && $method=="sportGameDetails"){//体育赛事报表-某一天详细数据
    include_once "pages/record_sport_details.php";
}elseif($module=="MACenterView" && $method=="sportGameCgDetails"){//体育赛事报表-某一天串关详细数据
    include_once "pages/record_sport_cg_details.php";
}elseif($module=="MACenterView" && $method=="sportGameCgDetailsDetails"){//体育赛事报表-某一天串关详细数据--再详细数据
    include_once "pages/record_sport_cg_details_details.php";
}elseif($module=="MACenterView" && ($method=="skRecord" || $method=="SKRecord")){//彩票今天记录
    include_once "pages/record_lottery.php";
}elseif($module=="MACenterView" && $method=="SKHistory"){//彩票7天记录
    include_once "pages/record_lottery_history.php";
}elseif($module=="MACenterView" && $method=="liveHistory" || $method=="aliveHistory"){//视讯直播
    include_once "pages/live_history.php";
}elseif($module=="MACenterView" && $method=="liveHistory11"){//视讯直播
    include_once "pages/live_history11.php";
}elseif($module=="MACenterView" && $method=="liveHistory22"){//视讯直播
    include_once "pages/live_history22.php";
}elseif($module=="MACenterView" && $method=="naliveHistory"){//视讯直播
    include_once "pages/na_live_history.php";
}elseif($module=="MACenterView" && $method=="abliveHistory"){//视讯直播
    include_once "pages/ablive_history.php";
}elseif($module=="MACenterView" && $method=="ptliveHistory"){//视讯直播
    include_once "pages/pt_live_history.php";
}elseif($module=="MACenterView" && $method=="bhdzliveHistory"){//视讯直播
    include_once "pages/bhdz_live_history.php";
}elseif($module=="MACenterView" && $method=="gameSwitch" && $type=="banktrans"){//额度转换
    include_once "pages/money_change.php";
}elseif($module=="MACenterView" && $method=="moneyView"){//额度转换
    include_once "pages/money_change.php";
}elseif($module=="MACenterView" && $method=="bankTake"){//线上取款
    include_once "pages/qukuan.php";
}elseif($module=="MACenterView" && $method=="bankSavings"){//在线存款
    include_once "../php/pay.php";
}elseif($module=="MACenterView" && $method=="bankATM"){//银行汇款
    include_once "pages/huikuan.php";
}elseif($module=="MACenterView" && $method=="anquan"){//安全设置
    include_once "pages/anquan.php";
}elseif($module=="MACenterView" && $method=="bankATM1"){//银行汇款
    include_once "pages/bank2.php";
}elseif($module=="MACenterView" && $method=="bankATM2"){//银行cun款
    include_once "pages/cunkuan.php";
}elseif($module=="MACenterView" && $method=="ewfk"){//在线存款
include_once "pages/ewfk.php";
}elseif($method=="cqRecord"){//存款记录
    include_once "../app/member/user/cha_ckonline.php";
}elseif($method=="chakan_qukuan"){//取款记录
    include_once "../app/member/user/cha_qukuan.php";
}elseif($method=="chakan_cunkuan"){//存款记录
    include_once "../app/member/user/cha_ckonline.php";
}elseif($method=="chakan_huikuan"){//汇款记录
    include_once "../app/member/user/cha_huikuan.php";
}elseif($method=="fsrecord"){//反水记录
    include_once "pages/fsrecord.php";
}elseif($method=="dml"){//打码量记录
    include_once "pages/dml.php";
}elseif($method=="ed"){//打码量记录
    include_once "pages/ed.php";
}elseif($module=="MGetData" && $method=="GetSunPlusDetail" && ($args=="Y"|| $args="Y,Y")){
    echo '{"Balance4":"---"}';
}else{
    $method_POST = $_REQUEST["method"];
    $date_POST = $_REQUEST["date"];
    $gtype_POST = $_REQUEST["gtype"];
    if($method_POST=="SKLotteryHistory"){//彩票一天记录
        include_once "pages/record_lottery_oneday.php";
    }elseif($method_POST=="SKLotteryHistoryDetails"){//彩票明细记录
        include_once "pages/record_lottery_details.php";
    }elseif($method_POST=="SKLhcHistoryDetails"){//六合彩明细记录
        include_once "pages/record_lhc_details.php";
    }
}
$mysqli->close();
?>