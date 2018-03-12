<?php 
include_once($C_Patch."/app/member/class/report_sport.php");

$user_group = "(".$_SESSION["userid"].")";

$sport_today_result = report_sport::getAllBetMoneyAndCount(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_day1_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_day2_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_day3_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_day4_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_day5_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_day6_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$sport_today_result_status0 = report_sport::getAllBetMoneyAndCount(date("Y-m-d"),date("Y-m-d"),$user_group,"0");
$sport_day1_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group,"0");
$sport_day2_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group,"0");
$sport_day3_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group,"0");
$sport_day4_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group,"0");
$sport_day5_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group,"0");
$sport_day6_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group,"0");

$sport_today_win = report_sport::getAllTotalWin(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_day1_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_day2_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_day3_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_day4_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_day5_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_day6_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$sport_cg_today_result = report_sport::getBetMoneyAndCountCg(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_cg_day1_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_cg_day2_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_cg_day3_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_cg_day4_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_cg_day5_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_cg_day6_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$sport_cg_today_result_status0 = report_sport::getBetMoneyAndCountCg(date("Y-m-d"),date("Y-m-d"),$user_group,"0");
$sport_cg_day1_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group,"0");
$sport_cg_day2_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group,"0");
$sport_cg_day3_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group,"0");
$sport_cg_day4_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group,"0");
$sport_cg_day5_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group,"0");
$sport_cg_day6_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group,"0");

$sport_cg_today_win = report_sport::getTotalWinCg(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_cg_day1_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_cg_day2_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_cg_day3_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_cg_day4_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_cg_day5_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_cg_day6_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$bet_money_total = $sport_today_result["bet_money"]+$sport_cg_today_result["bet_money"]+$sport_day1_result["bet_money"]+$sport_cg_day1_result["bet_money"]
    +$sport_day2_result["bet_money"]+$sport_cg_day2_result["bet_money"]+$sport_day3_result["bet_money"]+$sport_cg_day3_result["bet_money"]
    +$sport_day4_result["bet_money"]+$sport_cg_day4_result["bet_money"]+$sport_day5_result["bet_money"]+$sport_cg_day5_result["bet_money"]
    +$sport_day6_result["bet_money"]+$sport_cg_day6_result["bet_money"];

$bet_money_total_status0 = $sport_today_result_status0["bet_money"]+$sport_cg_today_result_status0["bet_money"]+$sport_day1_result_status0["bet_money"]+$sport_cg_day1_result_status0["bet_money"]
    +$sport_day2_result_status0["bet_money"]+$sport_cg_day2_result_status0["bet_money"]+$sport_day3_result_status0["bet_money"]+$sport_cg_day3_result_status0["bet_money"]
    +$sport_day4_result_status0["bet_money"]+$sport_cg_day4_result_status0["bet_money"]+$sport_day5_result_status0["bet_money"]+$sport_cg_day5_result_status0["bet_money"]
    +$sport_day6_result_status0["bet_money"]+$sport_cg_day6_result_status0["bet_money"];

$bet_win_total = $sport_today_win+$sport_day1_win+$sport_day2_win+$sport_day3_win+$sport_day4_win+$sport_day5_win+$sport_day6_win
    +$sport_cg_today_win+$sport_cg_day1_win+$sport_cg_day2_win+$sport_cg_day3_win+$sport_cg_day4_win+$sport_cg_day5_win+$sport_cg_day6_win;
echo '
<div id="MACenterContent">
    <div class="Hyzx-body">                
        <div class="Hyzx-right">
        <link rel="stylesheet" href="/cl/css/reset.css">
        <link rel="stylesheet" href="/cl/memberdata.css">
        <script src="/cl/js/laydate.js"></script><link type="text/css" rel="stylesheet" href="/cl/js/laydate.css"><link type="text/css" rel="stylesheet" href="/cl/js/laydate(1).css" id="LayDateSkin">
        <h3 class="nav2">
            <span class="flt">投注记录</span>
            <a href="javascript: f_com.MChgPager({method:\'gameSwitch\'}, {type: \'betrecord\'});" data="transaction_bet_index" class="Hyzx-btn flt active">投注记录</a>
            <a href="javascript:;" data="transaction_contacts_index" class="Hyzx-btn flt">往来记录</a>
        </h3>
        <div class="Hyzx-content">
            <div class="Hyzx-conNav Hyzx-fixedWidth" id="transTitle">
                <a href="javascript:f_com.MChgPager({method: \'ballRecord\'});" data="sp" class="Hyzx-btn flt active">体育</a>
                <a href="javascript:f_com.MChgPager({method: \'skRecord\'});" data="fc" class="Hyzx-btn flt">彩票</a>
                <a href="javascript:f_com.MChgPager({method: \'liveHistory\'});" data="ag" class="Hyzx-btn flt">AG</a>
                <a href="javascript:f_com.MChgPager({method: \'ballRecord\'});" data="sp" class="Hyzx-btn flt">BBIN</a>
                <a href="javascript:f_com.MChgPager({method: \'skRecord\'});" data="fc" class="Hyzx-btn flt">MG</a>
                <a href="javascript:f_com.MChgPager({method: \'liveHistory\'});" data="ag" class="Hyzx-btn flt">ALLBET</a>
                <a href="javascript:f_com.MChgPager({method: \'ballRecord\'});" data="sp" class="Hyzx-btn flt">PT</a>
                <a href="javascript:f_com.MChgPager({method: \'skRecord\'});" data="fc" class="Hyzx-btn flt">NA</a>
                <a href="javascript:f_com.MChgPager({method: \'liveHistory\'});" data="ag" class="Hyzx-btn flt">棋牌</a>
                <a href="javascript:f_com.MChgPager({method: \'ballRecord\'});" data="sp" class="Hyzx-btn flt">反水</a>
            </div>
            <div class="mt30 Hyzx-select">
                            <form >
                                <div class="Hyzx-module">
                                    <span>投注时间:</span>
                                    <div class="Hyzx-data">
                                        <input type="text" class="Wdate" onclick="laydate({istime: false, format: &#39;YYYY-MM-DD&#39;})" readonly="readonly" name="starttime" id="s_time" value="'.date('Y-m-d').'">
                                    </div>
                                    <select name="sptype" id="sptype">
                                        <option value="1" selected="true">全部</option>
                                        <option value="足球">足球</option>
                                        <option value="篮球">篮球</option>
                                        <option value="网球">网球</option>
                                        <option value="排球">排球</option>
                                        <option value="棒球">棒球</option>
                                        <option value="冠军">冠军</option>
                                        <option value="单式">单式</option>
                                        <option value="其他">其他</option>
                                        
                                    </select>
                                </div>
                                <a href="javascript:;" class="flt Hyzx-btn" id="submit">查询</a>
                                
                            </form>
                        </div>
            <table class="Hyzx-table mt10">
                <thead>
                    <tr>
                        <th>日期</th>
                        <th>下注金额</th>
                        <th>未结算金额</th>
                        <th>结果</th>
                    </tr>
                </thead>
                <tbody>
                    <tr align="right" class="MColor1">
                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d').'\'});">'.date('Y-m-d').'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_today_result["bet_money"]+$sport_cg_today_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_today_result_status0["bet_money"]+$sport_cg_today_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_today_win+$sport_cg_today_win).'</td>
                    </tr>
                    <tr align="right" class=" MColor2">

                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-1 day')).'\'});">'.date('Y-m-d',strtotime('-1 day')).'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_day1_result["bet_money"]+$sport_cg_day1_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day1_result_status0["bet_money"]+$sport_cg_day1_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day1_win+$sport_cg_day1_win).'</td>
                    </tr>
                    <tr align="right" class="MColor1">

                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-2 day')).'\'});">'.date('Y-m-d',strtotime('-2 day')).'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_day2_result["bet_money"]+$sport_cg_day2_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day2_result_status0["bet_money"]+$sport_cg_day2_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day2_win+$sport_cg_day2_win).'</td>
                    </tr>
                    <tr align="right" class=" MColor2">

                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-3 day')).'\'});">'.date('Y-m-d',strtotime('-3 day')).'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_day3_result["bet_money"]+$sport_cg_day3_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day3_result_status0["bet_money"]+$sport_cg_day3_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day3_win+$sport_cg_day3_win).'</td>
                    </tr>
                    <tr align="right" class="MColor1">

                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-4 day')).'\'});">'.date('Y-m-d',strtotime('-4 day')).'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_day4_result["bet_money"]+$sport_cg_day4_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day4_result_status0["bet_money"]+$sport_cg_day4_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day4_win+$sport_cg_day4_win).'</td>
                    </tr>
                    <tr align="right" class=" MColor2">

                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-5 day')).'\'});">'.date('Y-m-d',strtotime('-5 day')).'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_day5_result["bet_money"]+$sport_cg_day5_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day5_result_status0["bet_money"]+$sport_cg_day5_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day5_win+$sport_cg_day5_win).'</td>
                    </tr>
                    <tr align="right" class="MColor1">

                        <td style="text-align: center;">
                            <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-6 day')).'\'});">'.date('Y-m-d',strtotime('-6 day')).'</a>
                        </td>
                        <td style="text-align: center;">'.($sport_day6_result["bet_money"]+$sport_cg_day6_result["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day6_result_status0["bet_money"]+$sport_cg_day6_result_status0["bet_money"]).'</td>
                        <td style="text-align: center;">'.($sport_day6_win+$sport_cg_day6_win).'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">总计</td>
                        <td style="text-align: center;" align="right">'.$bet_money_total.'</td>
                        <td style="text-align: center;" align="right">'.$bet_money_total_status0.'</td>
                        <td style="text-align: center;" align="right">'.$bet_win_total.'</td>
                    </tr>
                </tbody>
            </table>
            <div class="Hyzx-pageBox mt20"></div>
        </div>
                        </div>

    </div>    
</div>    
<style>
    .Hyzx-right .Hyzx-content .Hyzx-conNav {
    height: auto;
}
.Hyzx-right .Hyzx-content .Hyzx-conNav {
    font: 15px/42px "microsoft yahei";
    height: 42px;
    
}
.Hyzx-fixedWidth .Hyzx-btn {
    width: 78px;
}
.Hyzx-btn:hover, .Hyzx-btn.active {
    background: #875e5a;
}
.mt30 {
    margin-top: 30px;
}
.Hyzx-select .Hyzx-module {
    margin-right: 10px;
    float: left;
}
.Hyzx-select .Hyzx-module span {
    font: 14px/30px "microsoft yahei";
    height: 30px;
    display: inline-block;
    width: 70px;
    text-align: center;
}
.Hyzx-select .Hyzx-module input[type= \'text \'] {
    width: 100px;
    padding: 0 10px;
}
.Hyzx-select .Hyzx-module .Hyzx-data {
    display: inline-block;
    border: 0 none;
    height: 30px;
}
.Hyzx-select select {
    border: 0 none;
    font: 14px/30px "microsoft yahei";
    height: 30px;
}
.Hyzx-table {
    border-collapse: collapse;
    width: 100%;
}
.mt10 {
    margin-top: 10px;
}
.Hyzx-select .Hyzx-btn {
    font: 12px/30px arial;
    height: 30px;
    margin-right: 10px;
}
</style>
<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script>   ';
