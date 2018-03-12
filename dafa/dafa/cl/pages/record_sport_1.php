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
<style>
a{
    text-decoration:none
}
.MPanel .Maddtype{
    width: 100%;
    height: 40px;
    text-align: center;
    margin: 0 auto;
}
.MPanel .Maddtype .tabs{
    height: 40px;
    line-height: 40px;
    border-color: #fff;
    width: 80%;
    padding: 0 10%;
    border-bottom: 1px solid rgba(255,255,255,.7);
}
.MPanel .Maddtype .tabs a{
    display: block;
    width: 100%;
    float: left;
    color: #565656;
}
.MPanel .Maddtype .tabs a.active{
    border-bottom: 2px solid red;
    color: red;
}


.MMain{
    border-collapse: collapse;
}
.MMain .biaotou{
    border-bottom: 1px solid rgba(255,255,255,.7);
    background: rgba(255,255,255,.2);
}
.MMain .biaotou th{
    height: 33px;
    line-height: 33px;
    font-weight: lighter;
}
.MMain tr{
    border-bottom: 1px solid rgba(255,255,255,.7);
}

.MMain tr td:first-child{
    position: relative;
    padding: 10px 0;
}
.MMain tr td:first-child a{
       padding: 0.1em 0; 
           color: #000;
}
.MMain .MColor1{
    background: rgba(255,255,255,.4);
}
.MMain .MColor2{
    background: rgba(255,255,255,.2);
}

.MMain tr td .arrow{
    width: 1px;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    display: block;
    background-image: linear-gradient(to bottom,rgba(255,255,255,.7)0.8em,transparent 0.8em,transparent 1.6em,rgba(255,255,255,.7)1.6em);
}
.MMain tr td .arrow::after {
    border-right: 1px solid rgba(255, 255, 255, 0.7);
    border-top: 1px solid rgba(255, 255, 255, 0.7);
    content: "";
    display: block;
    height: 9px;
    left: 0;
    margin-left: -4px;
    margin-top: -5px;
    position: absolute;
    top: 50%;
    transform: rotate(45deg);
    width: 9px;
}


</style> 
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
	

        <span class="MGameType" onclick="chgType(\'liveHistory\');">真人记录</span>｜
        <span class="MGameType" onclick="chgType(\'skRecord\');">彩票投注记录</span>｜

		<span class="MGameType MCurrentType" onclick="chgType(\'ballRecord\');">体育投注记录</span>｜

        <span class="MGameType" onclick="chgType(\'cqRecord\');">存取款记录</span>｜
    </div>
    <div id="MMainData">
        <div class="MControlNav">
            <select disabled="disabled" name="foo" id="MSelectType" class="MFormStyle">
                <option label="历史交易" dis="false" value="history" selected="selected">历史交易</option>
            </select>

        </div>
        <div class="MPanel" style="display: block;">
             <div class="Maddtype">
                    <div class="tabs">
                            <a class="active" id="today">本周</a>
                    </div>
            </div>
            <table class="MMain">
                <tr class="biaotou">
                    <th width="30%">日期</th>
                    <th width="25%">下注金额</th>
                    <th width="25%">未结算金额</th>
                    <th width="20%">结果</th>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d').'\'});">'.date('Y-m-d').'</a>
                        <div class="arrow"></div>
                    </td>
                    <td style="text-align: center;">'.($sport_today_result["bet_money"]+$sport_cg_today_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_today_result_status0["bet_money"]+$sport_cg_today_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_today_win+$sport_cg_today_win).'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-1 day')).'\'});">'.date('Y-m-d',strtotime('-1 day')).'</a>
                        <div class="arrow"></div>
                    </td>
                    <td style="text-align: center;">'.($sport_day1_result["bet_money"]+$sport_cg_day1_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day1_result_status0["bet_money"]+$sport_cg_day1_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day1_win+$sport_cg_day1_win).'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-2 day')).'\'});">'.date('Y-m-d',strtotime('-2 day')).'</a>
                        <div class="arrow"></div>
                    </td>
                    <td style="text-align: center;">'.($sport_day2_result["bet_money"]+$sport_cg_day2_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day2_result_status0["bet_money"]+$sport_cg_day2_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day2_win+$sport_cg_day2_win).'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-3 day')).'\'});">'.date('Y-m-d',strtotime('-3 day')).'</a>
                        <div class="arrow"></div>
                    </td>
                    <td style="text-align: center;">'.($sport_day3_result["bet_money"]+$sport_cg_day3_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day3_result_status0["bet_money"]+$sport_cg_day3_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day3_win+$sport_cg_day3_win).'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-4 day')).'\'});">'.date('Y-m-d',strtotime('-4 day')).'</a>
                        <div class="arrow"></div>
                    </td>
                    <td style="text-align: center;">'.($sport_day4_result["bet_money"]+$sport_cg_day4_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day4_result_status0["bet_money"]+$sport_cg_day4_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day4_win+$sport_cg_day4_win).'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-5 day')).'\'});">'.date('Y-m-d',strtotime('-5 day')).'</a>
                        <div class="arrow"></div>
                    </td>
                    <td style="text-align: center;">'.($sport_day5_result["bet_money"]+$sport_cg_day5_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day5_result_status0["bet_money"]+$sport_cg_day5_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day5_win+$sport_cg_day5_win).'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'sportGameHistory\'}, {date: \''.date('Y-m-d',strtotime('-6 day')).'\'});">'.date('Y-m-d',strtotime('-6 day')).'</a>
                        <div class="arrow"></div>    
                    </td>
                    <td style="text-align: center;">'.($sport_day6_result["bet_money"]+$sport_cg_day6_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day6_result_status0["bet_money"]+$sport_cg_day6_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($sport_day6_win+$sport_cg_day6_win).'</td>
                </tr>
                <tr>
                    <td style="text-align: center;">总计<div class="arrow"></div></td>
                    <td style="text-align: center;" align="right">'.$bet_money_total.'</td>
                    <td style="text-align: center;" align="right">'.$bet_money_total_status0.'</td>
                    <td style="text-align: center;" align="right">'.$bet_win_total.'</td>
                </tr>

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var GAMESELECT = "ballRecord"
//選擇遊戲
$("#MSelectType").change(function() {
    switch(GAMESELECT) {
    case \'ballRecord\':
        f_com.MChgPager({method: \'ballHistory\'});
        break;
    case \'ballHistory\':
        f_com.MChgPager({method: \'ballRecord\'});
        break;
    }
});

function chgType(type) {
    switch(type) {
    case \'ballRecord\':
        f_com.MChgPager({method: \'ballRecord\'});
        break;
    case \'lotteryRecord\':
        f_com.MChgPager({method: \'lotteryRecord\'});
        break;
    case \'liveHistory\':
        f_com.MChgPager({method: \'liveHistory\'});
        break;
    case \'gameHistory\':
        f_com.MChgPager({method: \'gameHistory\'});
        break;
    case \'skRecord\':
    	f_com.MChgPager({method: \'skRecord\'});
        break;
    case \'a3dhHistory\':
    	f_com.MChgPager({method: \'a3dhHistory\'});
        break;
    case \'TPBFightHistory\':
        f_com.MChgPager({method: \'TPBFightHistory\'});
        break;
    case \'TPBSPORTHistory\':
        f_com.MChgPager({method: \'TPBSPORTHistory\'});
        break;
    case \'cqRecord\':
        f_com.MChgPager({method: \'cqRecord\'});
        break;
    }
}
</script>
';