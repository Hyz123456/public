<?php

$get_time = date('Y-m-d',strtotime('-6 day'))." 00:00:00";
$sql	=	"select id,order_value,order_num,update_time,user_id,assets,status,about,pay_card,manner from money where `user_id`='".$_SESSION["userid"]."' and `type`='银行汇款' and `update_time`>='$get_time' order by id desc";
$query	=	$mysqli->query($sql);
while($row = $query->fetch_array()){
    $huikuan_list[] = $row;
}

$subPage = '';
$sum = 0;
if($huikuan_list && count($huikuan_list)>0){
    foreach ($huikuan_list as $key =>$huikuan_info) {
        $statusString = "";
        if($huikuan_info["status"]=="成功"){
            $sum += $huikuan_info["order_value"];
            $statusString =  '<span style="color:#FF0000;">成功</span>';
        }else if($huikuan_info["status"]=="失败") {
            $statusString = '<span style="color:#000000;">失败</span>';
        }else{
            $statusString = '<span style="color:#0000FF;">系统审核中</span>';
        }

        $subPage = $subPage.'
<tr >
<td style="text-align:center;">'.$huikuan_info["order_num"].'</td>
<td style="text-align:center;">'.$huikuan_info["update_time"].'</td>
<td style="text-align:center;">'.$huikuan_info["order_value"].'</td>
<td style="text-align:center;">'.$huikuan_info["pay_card"].'</td>
<td style="text-align:center;">'.$huikuan_info["manner"].'</td>
<td style="text-align:center;">'.$statusString.'</td>
</tr>';
    }
    $subPage .= '<tr ><td colspan="6" style="text-align:center;">本页汇款成功总金额：'.$sum.'</td></tr>';
}else{
    $subPage = '<td colspan="6" style="text-align:center;">暂时没有汇款信息。</td>';
}
?>
<script type="text/javascript">
    function chgType(type) {
        switch(type) {
            case 'ballRecord':
                f_com.MChgPager({method: 'ballRecord'});
                break;
            case 'lotteryRecord':
                f_com.MChgPager({method: 'lotteryRecord'});
                break;
            case 'liveHistory':
                f_com.MChgPager({method: 'liveHistory'});
                break;
            case 'gameHistory':
                f_com.MChgPager({method: 'gameHistory'});
                break;
            case 'skRecord':
                f_com.MChgPager({method: 'skRecord'});
                break;
            case 'a3dhHistory':
                f_com.MChgPager({method: 'a3dhHistory'});
                break;
            case 'TPBFightHistory':
                f_com.MChgPager({method: 'TPBFightHistory'});
                break;
            case 'TPBSPORTHistory':
                f_com.MChgPager({method: 'TPBSPORTHistory'});
                break;
            case 'cqRecord':
                f_com.MChgPager({method: 'cqRecord'});
                break;
            case 'chakan_qukuan':
                f_com.MChgPager({method: 'chakan_qukuan'});
                break;
            case 'chakan_cunkuan':
                f_com.MChgPager({method: 'chakan_cunkuan'});
                break;
            case 'chakan_huikuan':
                f_com.MChgPager({method: 'chakan_huikuan'});
                break;
				  case 'liveHistory11':
                f_com.MChgPager({method: 'liveHistory11'});
                break;
				  case 'liveHistory22':
                f_com.MChgPager({method: 'liveHistory22'});
                break;
			case 'ptliveHistory':
                f_com.MChgPager({method: 'ptliveHistory'});
                break;
				  case 'naliveHistory':
                f_com.MChgPager({method: 'naliveHistory'});
                break;
				case 'abliveHistory':
                f_com.MChgPager({method: 'abliveHistory'});
                break;
				case 'bhdzliveHistory':
                f_com.MChgPager({method: 'bhdzliveHistory'});
                break;
				case 'fsrecord':
                f_com.MChgPager({method: 'fsrecord'});
                break;
        
        }
    }

    var oMsg = {
        "totalPage": {},    //總頁數
        "pageMsg": 10,      //每頁顯示訊息數
        "msglist": $('#general-msg'),
        'currentPage': 1,    //當前頁碼
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
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >交易记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
		<span class="ABameType " onclick="chgType('liveHistory');">AG记录</span>｜
		<span class="ABameType" onclick="chgType('liveHistory11');">BBIN记录</span>｜
		<span class="ABameType" onclick="chgType('liveHistory22');">MG记录</span>｜
		<span class="ABameType " onclick="chgType('abliveHistory');">ALLBET记录</span>｜
		<span class="ABameType" onclick="chgType('ptliveHistory');">PT记录</span>｜
		<span class="ABameType" onclick="chgType('naliveHistory');">NA记录</span>｜
		<span class="ABameType" onclick="chgType('skRecord');">彩票记录</span>｜
		<span class="ABameType  " onclick="chgType('bhdzliveHistory');">棋牌记录</span>｜
		<span class="ABameType" onclick="chgType('ballRecord');">体育记录</span>｜
		<span class="ABameType MCurrentType" onclick="chgType('fsrecord');">反水记录</span>
    </div>
    <div id="MMainData" style="margin-top: 8px;">
        <div class="MControlNav">
            日期：
            <input type="text" value="<?=date('Y-m-d',strtotime('-6 day'))?>" style="width: 70px;background-color: white;" disabled="disabled"/> ~
            <input type="text" value="<?=date('Y-m-d')?>" style="width: 70px;background-color: white;" disabled="disabled"/>

            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="MBtnStyle" value="在线存款记录" onclick="chgType('chakan_cunkuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
            <input type="button" class="MBtnStyle" value="汇款记录" onclick="chgType('chakan_huikuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
            <input type="button" class="MBtnStyle" value="取款记录" onclick="chgType('chakan_qukuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
        </div>

        <table class="MMain" border="1">
            <thead>
            <tr>
                <th width="30%" align="center">汇款流水号</th>
                <th width="15%" align="center">汇款时间</th>
                <th width="15%" align="center">汇款金额</th>
                <th width="15%" align="center">汇款银行</th>
                <th width="15%" align="center">汇款方式</th>
                <th width="10%" align="center">汇款状态</th>
            </tr>
            </thead>
            <tbody id="general-msg">
            <?=$subPage?>
            </tbody>
            <tfoot id="msgfoot" style="display:none;">
            <tr><td colspan='6' style='text-align:center;'></td></tr>
            </tfoot>
        </table>
    </div>
</div>