<?php 
include_once($C_Patch."/app/member/class/report_sport.php");

$date_POST = $_REQUEST["date"]? $_REQUEST["date"]: date('Y-m-d');
$gtype = $_REQUEST["gtype"];

$user_sport_list = report_sport::getSportListByUser($_SESSION["userid"],$date_POST,$gtype);
$subPage = '';
if($user_sport_list && count($user_sport_list)>0){
    foreach ($user_sport_list as $key =>$userSport) {
        $status = "";
        if($userSport['status']==0){
            if($userSport['lose_ok']==0){
                $status = "未结算<br/>(确认中)";
            }elseif($userSport['ball_sort']=="足球滚球" ||$userSport['ball_sort']=="篮球滚球"){
                $status = "未结算<br/>(已确认)";
            }else{
                $status = "未结算";
            }
        }elseif($userSport['status']==1){
            $status = "赢";
        }elseif($userSport['status']==2){
            $status = "输";
        }elseif($userSport['status']==3){
            $status = "注单无效";
        }elseif($userSport['status']==4){
            $status = "赢一半";
        }elseif($userSport['status']==5){
            $status = "输一半";
        }elseif($userSport['status']==6){
            $status = "进球无效";
        }elseif($userSport['status']==7){
            $status = "红卡无效";
        }elseif($userSport['status']==8){
            $status = "和局";
        }
        $bet_info_result = "";
        if($userSport["status"]!=0 && $userSport["status"]!=3&& $userSport["status"]!=8){
            if($userSport["ball_sort"]=="冠军"){
                $match_id = $userSport["match_id"];
                $sql_gj   =	"select x_result from t_guanjun where match_id='$match_id'";
                $query_gj	=	$mysqli->query($sql_gj);
                $row_gj    =	$query_gj->fetch_array();
                $bet_info_result = "<br/>".$row_gj["x_result"];
            }elseif($userSport["MB_Inball"] && $userSport["MB_Inball"]!=''){
                $bet_info_result = "<br/>[".$userSport["MB_Inball"].":".$userSport["TG_Inball"]."]";
            }
        }else{
            $bet_info_result = "";
        }

        $fs_string = "";
        if($userSport["status"]!=0 && $userSport["status"]!=3 && $userSport["status"]!=8){
            $fs_string = '<br/>(反水:'.$userSport["fs"].')';
        }

        $bet_info = $userSport["bet_info"].$bet_info_result;
        $subPage = $subPage.'
    <tr >
    <td style="text-align:center;width: 100px;">'.$userSport["order_num"].'</td>
    <td style="text-align:center;min-width: 90px;">'.$userSport["match_name"].'</td>
    <td style="text-align:center;width: 100px;">'.$userSport["master_guest"].'</td>
    <td style="text-align:center;width: 100px;">'.$bet_info.'</td>
    <td style="text-align:center;width: 100px;">'.$userSport["bet_money"].'</td>
    <td style="text-align:center;width: 100px;">'.($userSport["win"]+$userSport["fs"]).$fs_string.'</td>
    <td style="text-align:center;min-width: 70px;">'.$userSport["bet_time"].'</td>
    <td style="text-align:center;width: 100px;">'.$status.'</td>
    </tr>';
    }
}else{
    $subPage = '<td colspan="8" style="text-align:center;">暂时没有下注信息。</td>';
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
                <a href="javascript:;" onclick="chgType('sportGameDetails');" data="sp" class="Hyzx-btn flt active">体育</a>
                <a href="javascript:;" onclick="chgType('SKLotteryHistoryDetails');" data="fc" class="Hyzx-btn flt ">彩票</a>
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
                            <input type="text" class="Wdate laydatesd"  name="date" id="date" value="<?=$date_POST?>">
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
                            <option value="足球" <?php if($gtype=='足球') echo "  selected='true'" ?>>足球</option>
                            <option value="篮球" <?php if($gtype=='篮球') echo "  selected='true'" ?>>篮球</option>
                            <option value="网球" <?php if($gtype=='网球') echo "  selected='true'" ?>>网球</option>
                            <option value="排球" <?php if($gtype=='排球') echo "  selected='true'" ?>>排球</option>
                            <option value="棒球" <?php if($gtype=='棒球') echo "  selected='true'" ?>>棒球</option>
                            <option value="冠军" <?php if($gtype=='冠军') echo "  selected='true'" ?>>冠军</option>
                            <option value="单式" <?php if($gtype=='单式') echo "  selected='true'" ?>>单式</option>
                            <option value="其他" <?php if($gtype=='其他') echo "  selected='true'" ?>>其他</option>

                        </select>
                    </div>
                    <a href="javascript:;" class="flt Hyzx-btn" id="submit_ty">查询</a>

                </form>
            </div>
            <table class="Hyzx-table mt10">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>联赛名</th>
                        <th>主客队</th>
                        <th>投注详细信息</th>
                        <th>投注金额</th>
                        <th>结果</th>
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
            f_com.MChgPager({type: 'GET', method: 'sportGameDetails'}, {date:date,gtype: gtype});
        });
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 
<script type="text/javascript">
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

</script>