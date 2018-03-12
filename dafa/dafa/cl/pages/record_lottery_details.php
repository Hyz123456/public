<?php 
include_once($C_Patch."/resource/lottery/getContentName.php");

$date_POST = $_REQUEST["date"]? $_REQUEST["date"]: date('Y-m-d');
$start_time = $date_POST." 00:00:00";
$end_time = $date_POST." 23:59:59";
$sql	=	"SELECT o.Gtype,o.lottery_number AS qishu,o.rtype_str,o.bet_time,o.order_num,o_sub.quick_type,
                        o_sub.number,o_sub.bet_money AS bet_money_one,o_sub.fs,
                        o_sub.bet_rate AS bet_rate_one,o_sub.is_win,o_sub.status,
                        o_sub.id AS id,o_sub.win AS win_sub,o_sub.balance,o_sub.order_sub_num
              FROM order_lottery o,order_lottery_sub o_sub
              WHERE o.bet_time>='$start_time' and o.bet_time<='$end_time' AND o.order_num=o_sub.order_num AND o.user_id='".$_SESSION["userid"]."'";
$gtype=$_REQUEST["gtype"];
if($gtype){
   $sql=$sql." AND o.Gtype='".$_REQUEST["gtype"]."' "; 
}
$sql=$sql." order by o_sub.status asc,o_sub.id desc ";
$query	=	$mysqli->query($sql);
while($row = $query->fetch_array()){
    $user_lottery_list[] = $row;
}
$subPage = '';
$t_allmoney=0;
$t_sy=0;
if($user_lottery_list && count($user_lottery_list)>0){
    foreach ($user_lottery_list as $key =>$rows) {
        $t_allmoney+=$rows['bet_money_one'];
        $money_result = 0;
        if($rows['is_win']=="1"){
            $t_sy= $t_sy + $rows['win_sub'] + $rows['fs'];
            $money_result = $rows['win_sub'] + $rows['fs'];
        }elseif($rows['is_win']=="2"){
            $t_sy+=$rows['bet_money_one'];
            $money_result = $rows['bet_money_one'];
        }elseif($rows['is_win']=="0" && $rows['fs']>0){
            $t_sy+=$rows['fs'];
            $money_result = $rows['fs'];
        }

        $contentName = getName($rows['number'],$rows['Gtype'],$rows['rtype_str'],$rows['quick_type']);
        $bet_time = substr($rows["bet_time"],11);

        $bet_rate = $rows['bet_rate_one'];
        if(strpos($bet_rate,",") !== false){
            $bet_rate_array = explode(",", $bet_rate);
            $bet_rate = $bet_rate_array[0];
        }

        if($rows['status']==0){
            $status_result = "未结算";
        }elseif($rows['status']==1){
            $status_result = "已结算";
        }elseif($rows['status']==2){
            $status_result = "已结算";
        }elseif($rows['status']==3){
            $status_result = "作废";
        }else{
            $status_result = "未结算";
        }

        $subPage = $subPage.'
    <tr >
    <td style="text-align:center;width: 130px;padding-left: 0px;padding-right: 0px;">'.$rows["order_sub_num"].'</td>
    <td style="text-align:center;width: 80px;padding-left: 0px;padding-right: 0px;">'.$rows["qishu"].'</td>
    <td style="text-align:center;padding-left: 2px;padding-right: 2px;">'.$rows["rtype_str"].'</td>
    <td style="text-align:center;padding-left: 2px;padding-right: 2px;">'.$contentName.'</td>
    <td style="text-align:center;padding-left: 2px;padding-right: 2px;">'.$rows["bet_money_one"].'</td>
    <td style="text-align:center;padding-left: 2px;padding-right: 2px;">'.$rows["fs"].'</td>
    <td style="text-align:center;padding-left: 2px;padding-right: 2px;">'.$bet_rate.'</td>
    <td style="text-align:center;padding-left: 2px;padding-right: 2px;">'.$money_result.'</td>
    <td style="text-align:center;width: 58px;padding-left: 0px;padding-right: 0px;">'.$bet_time.'</td>
    <td style="text-align:center;width: 45px;padding-left: 0px;padding-right: 0px;">'.$status_result.'</td>
    </tr>';
    }
}else{
    $subPage = '<td colspan="10" style="text-align:center;">暂时没有下注信息。</td>';
}
?>

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
                <a href="javascript:;" onclick="chgType('SKLotteryHistoryDetails');" data="fc" class="Hyzx-btn flt active">彩票</a>
                <a href="javascript:;" onclick="chgType('liveHistory');" data="ag" class="Hyzx-btn flt ">AG</a>
                <a href="javascript:;" onclick="chgType('liveHistory11');" data="sp" class="Hyzx-btn flt ">BBIN</a>
                <a href="javascript:;" onclick="chgType('liveHistory22');" data="fc" class="Hyzx-btn flt ">MG</a>
                <a href="javascript:;" onclick="chgType('abliveHistory');" data="ag" class="Hyzx-btn flt ">ALLBET</a>
                <a href="javascript:;" onclick="chgType('ptliveHistory');" data="sp" class="Hyzx-btn flt ">PT</a>
                <a href="javascript:;" onclick="chgType('naliveHistory');" data="fc" class="Hyzx-btn flt ">NA</a>
                <a href="javascript:;" onclick="chgType('bhdzliveHistory');" data="ag" class="Hyzx-btn flt ">棋牌</a>
                <a href="javascript:;" onclick="chgType('fsrecord');" data="sp" class="Hyzx-btn flt ">反水</a>
            </div>
            <div class="mt30 Hyzx-select">
                <form >
                    <div class="Hyzx-module">
                        <span>投注时间:</span>
                        <div class="Hyzx-data">
                            <input type="text" class="Wdate"  readonly="readonly" name="date" id="date" value="<?=$date_POST?>">
                            <script>
                                laydate({
                                    path:'laydate',
                                    elem: '#date',
                                    format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
                                  });
                            </script>
                        </div>
                        <select name="gtype" id="gtype">  
                            <option value="" <?php if($gtype=='') echo "  selected='true'" ?> >全部</option>
                            <option value="CQ" <?php if($gtype=='CQ') echo "  selected='true'" ?>>重庆时时彩</option>
                            <option value="BJPK" <?php if($gtype=='BJPK') echo "  selected='true'" ?>>北京PK拾</option>
                            <option value="LT" <?php if($gtype=='LT') echo "  selected='true'" ?>>六合彩</option>
                            <option value="D3" <?php if($gtype=='D3') echo "  selected='true'" ?>>3D彩</option>
                            <option value="P3" <?php if($gtype=='P3') echo "  selected='true'" ?>>排列三</option>
                            <option value="T3" <?php if($gtype=='T3') echo "  selected='true'" ?>>上海时时乐</option>
                            <option value="TJ" <?php if($gtype=='TJ') echo "  selected='true'" ?>>天津时时彩</option>
                            <option value="GXSF" <?php if($gtype=='GXSF') echo "  selected='true'" ?>>广西十分彩</option>
                            <option value="GDSF" <?php if($gtype=='GDSF') echo "  selected='true'" ?>>广东快乐十分</option>
                            <option value="TJSF" <?php if($gtype=='TJSF') echo "  selected='true'" ?>>天津快乐十分</option>
                            <option value="CQSF" <?php if($gtype=='CQSF') echo "  selected='true'" ?>>重庆快乐十分</option>
                            <option value="BJKN" <?php if($gtype=='BJKN') echo "  selected='true'" ?>>北京快乐8</option>
                            <option value="GD11" <?php if($gtype=='GD11') echo "  selected='true'" ?>>广东十一选五</option>

                        </select>
                    </div>
                    <a href="javascript:;" class="flt Hyzx-btn" id="submit_ty">查询</a>

                </form>
            </div>
            <table class="Hyzx-table mt10">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>彩票期号</th>
                        <th>投注玩法</th>
                        <th>投注内容</th>
                        <th>投注金额</th>
                        <th>反水</th>
                        <th>赔率</th>
                        <th>输赢结果</th>
                        <th>投注时间</th>
                        <th>状态</th>
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
        $('#submit_ty').click(function(){
            var date=$('#date').val();
            var gtype=$('#gtype').val();
            f_com.MChgPager({type: 'GET', method: 'SKLotteryHistoryDetails'}, {date:date,gtype: gtype});
        });
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 


<script language="javascript">
    var oMsg = {
        "totalPage": {},    //總頁數
        "pageMsg": 50,      //每頁顯示訊息數
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

    var GAMESELECT = "SKLotteryHistoryDetails"
    //選擇遊戲
    $("#MSelectType").change(function() {
        switch(GAMESELECT) {
            case 'SKRecord':
            case 'SKLotteryRecord':
                f_com.MChgPager({method: 'SKHistory'});
                break;
            case 'SKHistory':
            case 'SKLotteryHistory':
                f_com.MChgPager({method: 'SKRecord'});
                break;
        }
    });
</script>