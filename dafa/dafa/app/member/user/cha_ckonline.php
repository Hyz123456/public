<?php

$get_time = date('Y-m-d',strtotime('-6 day'))." 00:00:00";
$sql	=	"select id,order_value,order_num,update_time,user_id,assets,status,about from money where `user_id`='".$_SESSION["userid"]."' and (`type`='在线支付' or `type`='银行汇款') and `update_time`>='$get_time' order by id desc";
$query	=	$mysqli->query($sql);
while($row = $query->fetch_array()){
    $cunkuan_list[] = $row;
}

$subPage = '';
$sum = 0;
if($cunkuan_list && count($cunkuan_list)>0){
    foreach ($cunkuan_list as $key =>$cunkuan_info) {
        $statusString = "";
        if($cunkuan_info["status"]=="成功"){
            $sum += $cunkuan_info["order_value"];
            $statusString =  '<span style="color:#FF0000;">成功</span>';
        }else if($cunkuan_info["status"]=="失败") {
            $statusString = '<span style="color:#000000;">失败</span>';
        }else{
            $statusString = '<span style="color:#0000FF;">系统审核中</span>';
        }

		if($cunkuan_info["about"]=='xin真人反水金额'){
		
		unset($cunkuan_info["about"]);$cunkuan_info["about"]='AG电子反水金额';
		}
		if($cunkuan_info["about"]=='BBINDZ真人反水金额'){
		
		unset($cunkuan_info["about"]);$cunkuan_info["about"]='BBIN电子反水金额';
		}
		if($cunkuan_info["about"]=='DX真人反水金额'){
		
		unset($cunkuan_info["about"]);$cunkuan_info["about"]='BH棋牌反水金额';
		}

        $subPage = $subPage.'
<tr >
<td style="text-align:center;">'.$cunkuan_info["order_num"].'</td>
<td style="text-align:center;">'.$cunkuan_info["update_time"].'</td>
<td style="text-align:center;">'.$cunkuan_info["order_value"].'</td>
<td style="text-align:center;">'.$statusString.'</td>
<td style="text-align:center;">'.$cunkuan_info["about"].'</td>
</tr>';
    }
    $subPage .= '<tr ><td colspan="5" style="text-align:center;">本页存款成功总金额：'.$sum.'</td></tr>';
}else{
    $subPage = '<td colspan="5" style="text-align:center;">暂时没有存款信息。</td>';
}
?>
<script type="text/javascript">
  
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
    <div class="Hyzx-body">                
        <div class="Hyzx-right">
        <h3 class="nav2">
            <span class="flt">投注记录</span>
            <a href="javascript: f_com.MChgPager({method:\'gameSwitch\'}, {type: \'betrecord\'});" data="transaction_bet_index" class="Hyzx-btn flt active">投注记录</a>
            <a href="javascript:;" data="transaction_contacts_index" class="Hyzx-btn flt">往来记录</a>
        </h3>
        <div class="Hyzx-content">
            <div class="Hyzx-conNav Hyzx-fixedWidth" id="transTitle">
                <a href="javascript:;" onclick="chgType('sportGameDetails');" data="sp" class="Hyzx-btn flt">体育</a>
                <a href="javascript:;" onclick="chgType('SKLotteryHistoryDetails');" data="fc" class="Hyzx-btn flt ">彩票</a>
                <a href="javascript:;" onclick="chgType('liveHistory');" data="ag" class="Hyzx-btn flt ">AG</a>
                <a href="javascript:;" onclick="chgType('liveHistory11');" data="sp" class="Hyzx-btn flt ">BBIN</a>
                <a href="javascript:;" onclick="chgType('liveHistory22');" data="fc" class="Hyzx-btn flt ">MG</a>
                <a href="javascript:;" onclick="chgType('abliveHistory');" data="ag" class="Hyzx-btn flt ">ALLBET</a>
                <a href="javascript:;" onclick="chgType('ptliveHistory');" data="sp" class="Hyzx-btn flt ">PT</a>
                <a href="javascript:;" onclick="chgType('naliveHistory');" data="fc" class="Hyzx-btn flt ">NA</a>
                <a href="javascript:;" onclick="chgType('bhdzliveHistory');" data="ag" class="Hyzx-btn flt ">棋牌</a>
                <a href="javascript:;" onclick="chgType('fsrecord');" data="sp" class="Hyzx-btn flt active">反水</a>
            </div>
            <div class="mt30 Hyzx-select">
                <form >
                    <div class="Hyzx-module">
                        <span>时间:</span>
                        <div class="Hyzx-data">
			<input type="text" value="<?=date('Y-m-d',strtotime('-6 day'))?>" style="width: 85px;background-color: white;" disabled="disabled"/> ~
                        <input type="text" value="<?=date('Y-m-d')?>" style="width: 85px;background-color: white;" disabled="disabled"/>
                        </div>
                        <br/>
                         <input type="button" class="flt Hyzx-btn" value="反水记录" onclick="chgType('fsrecord');" onmouseover="mover(this);" onmouseout="mout(this);" />
                        <input type="button" class="flt Hyzx-btn" value="存款记录" onclick="chgType('chakan_cunkuan');" onmouseover="mover(this);" onmouseout="mout(this);" style="background: #875e5a;"/>
                        <input type="button" class="flt Hyzx-btn" value="取款记录" onclick="chgType('chakan_qukuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
			<input type="button" class="flt Hyzx-btn" value="额度转换记录" onclick="chgType('ed');" onmouseover="mover(this);" onmouseout="mout(this);" />
			<input type="button" class="flt Hyzx-btn" value="打码量" onclick="chgType('dml');" onmouseover="mover(this);" onmouseout="mout(this);" />
                    </div>
     

                </form>
            </div>
            <table class="Hyzx-table mt10 MMain">
                <thead>
            <tr>
                <th width="28%" align="center">存款流水号</th>
                <th width="22%" align="center">存款时间</th>
                <th width="15%" align="center">存款金额</th>
                <th width="15%" align="center">存款状态</th>
                <th width="20%" align="center">备注</th>
            </tr>
            </thead>
            <tbody id="general-msg">
            <?=$subPage?>
            </tbody>
                <tfoot id="msgfoot" style="display:none;">
                    <tr><td colspan='8' style='text-align:center;'></td></tr>
                </tfoot>
            </table>
            <div class="Hyzx-pageBox mt20"></div>
        </div>
        </div>

    </div>    
</div>


<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 

