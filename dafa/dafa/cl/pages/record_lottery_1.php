<?php 
$lhc_today_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d",time()));
$lhc_today_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d",time()),"0");
$lhc_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date("Y-m-d"));

$d3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"D3");
$p3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"P3");
$t3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"T3");
$cq_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQ");
$tj_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJ");
$jx_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"JX");
$gxsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GXSF");
$gdsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GDSF");
$tjsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJSF");
$gd11_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GD11");
$bjpk_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJPK");
$bjkn_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJKN");
$cqsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQSF");

$d3_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"D3","0");
$p3_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"P3","0");
$t3_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"T3","0");
$cq_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQ","0");
$tj_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJ","0");
$jx_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"JX","0");
$gxsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GXSF","0");
$gdsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GDSF","0");
$tjsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJSF","0");
$gd11_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GD11","0");
$bjpk_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJPK","0");
$bjkn_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJKN","0");
$cqsf_today_result_status0 = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQSF","0");

$d3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"D3");
$p3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"P3");
$t3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"T3");
$cq_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"CQ");
$tj_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"TJ");
$jx_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"JX");
$gxsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"GXSF");
$gdsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"GDSF");
$tjsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"TJSF");
$gd11_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"GD11");
$bjpk_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"BJPK");
$bjkn_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"BJKN");
$cqsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],date("Y-m-d"),"CQSF");

$total_today_count = $lhc_today_result["bet_count"] + $d3_today_result["bet_count"] + $p3_today_result["bet_count"]
    + $t3_today_result["bet_count"] + $cq_today_result["bet_count"]+ $tj_today_result["bet_count"]
    + $jx_today_result["bet_count"]+ $gxsf_today_result["bet_count"] + $gdsf_today_result["bet_count"]
    + $tjsf_today_result["bet_count"] + $gd11_today_result["bet_count"]+ $bjpk_today_result["bet_count"]
    + $bjkn_today_result["bet_count"] + $cqsf_today_result["bet_count"];
$total_today_money = $lhc_today_result["bet_money"] + $d3_today_result["bet_money"] + $p3_today_result["bet_money"]
    + $t3_today_result["bet_money"] + $cq_today_result["bet_money"]+ $tj_today_result["bet_money"]
    + $jx_today_result["bet_money"]+ $gxsf_today_result["bet_money"] + $gdsf_today_result["bet_money"]
    + $tjsf_today_result["bet_money"] + $gd11_today_result["bet_money"]+ $bjpk_today_result["bet_money"]
    + $bjkn_today_result["bet_money"] + $cqsf_today_result["bet_money"];

$total_today_money_status0 = $lhc_today_result_status0["bet_money"] + $d3_today_result_status0["bet_money"] + $p3_today_result_status0["bet_money"]
    + $t3_today_result_status0["bet_money"] + $cq_today_result_status0["bet_money"]+ $tj_today_result_status0["bet_money"]
    + $jx_today_result_status0["bet_money"]+ $gxsf_today_result_status0["bet_money"] + $gdsf_today_result_status0["bet_money"]
    + $tjsf_today_result_status0["bet_money"] + $gd11_today_result_status0["bet_money"]+ $bjpk_today_result_status0["bet_money"]
    + $bjkn_today_result_status0["bet_money"]+ $cqsf_today_result_status0["bet_money"];

$total_win_money = $lhc_win + $d3_win + $p3_win
    + $t3_win + $cq_win+ $tj_win
    + $jx_win+ $gxsf_win + $gdsf_win
    + $tjsf_win + $gd11_win+ $bjpk_win
    + $bjkn_win + $cqsf_win;
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
    width: 49%;
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
    background-image: linear-gradient(to bottom,rgba(255,255,255,.7)1em,transparent 1em,transparent 1.8em,rgba(255,255,255,.7)1.8em);
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
        <span class="MGameType MCurrentType" onclick="chgType(\'skRecord\');">彩票投注记录</span>｜
        <span class="MGameType" onclick="chgType(\'ballRecord\');">体育投注记录</span>｜
		<span class="MGameType" onclick="chgType(\'cqRecord\');">存取款记录</span>｜
    </div>
    <div id="MMainData">
        <div class="MControlNav">
            <select name="foo" id="MSelectType" class="MFormStyle">
                <option label="今日交易" value="today" selected="selected">今日交易</option>
                <option label="历史交易" value="history">历史交易</option>
            </select>

            <select disabled="disabled">
                <option label="'.date("Y-m-d").'" selected="selected">'.date("Y-m-d").'</option>
            </select>
        </div>
        
        <div class="MPanel" style="display: block;">
            <div class="Maddtype">
                    <div class="tabs">
                            <a class="active" id="today">今日</a>
                            <a id="history">历史</a>
                    </div>
            </div>
            <table class="MMain">
                <tr class="biaotou">
                    <th style="width: 30%">游戏名称</th>
                    <th style="width: 25%">下注金额</th>
                    <th style="width: 25%">未结算金额</th>
                    <th style="width: 20%">结果</th>
                </tr>
				<tr align="center" class="MColor1">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'CQ\'});">重庆时时彩</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$cq_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$cq_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$cq_win.'</td>
                </tr>
                <tr align="center" class=" MColor2">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'BJPK\'});">北京PK拾</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$bjpk_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$bjpk_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$bjpk_win.'</td>
                </tr>
                <tr align="center" class="MColor1" >
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLhcHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'LT\'});">六合彩</a>
                        <div class="arrow"></div>
                    </td>
                    <td>'.$lhc_today_result["bet_money"].'</td>
                    <td>'.$lhc_today_result_status0["bet_money"].'</td>
                    <td style="text-align: center;">'.$lhc_win.'</td>
                </tr>
                <tr align="center" class=" MColor2">
                    <td>
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'D3\'});">3D彩</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$d3_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$d3_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$d3_win.'</td>
                </tr>
                <tr align="center" class="MColor1">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'P3\'});">排列三</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$p3_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$p3_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$p3_win.'</td>
                </tr>
                <tr align="center" class="MColor2">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'T3\'});">上海时时乐</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$t3_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$t3_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$t3_win.'</td>
                </tr>
                
                <tr align="center" class=" MColor2" style="display:none;">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'JX\'});">江西时时彩</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$jx_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$jx_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$jx_win.'</td>
                </tr>
                <tr align="center" class="MColor1" >
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'TJ\'});">天津时时彩</a>
                        <div class="arrow"></div>    
                    </td>
                    <td>
                        '.$tj_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$tj_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$tj_win.'</td>
                </tr>
                <tr align="center" class=" MColor2" >
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'GXSF\'});">广西十分彩</a>
                        <div class="arrow"></div>    
                    </td>
                    <td>
                        '.$gxsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$gxsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$gxsf_win.'</td>
                </tr>
                <tr align="center" class=" MColor1" >
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'GDSF\'});">广东快乐十分</a>
                        <div class="arrow"></div>    
                    </td>
                    <td>
                        '.$gdsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$gdsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$gdsf_win.'</td>
                </tr>
                <tr align="center" class="MColor2" >
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'TJSF\'});">天津快乐十分</a>
                        <div class="arrow"></div>    
                    </td>
                    <td>
                        '.$tjsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$tjsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$tjsf_win.'</td>
                </tr>
                <tr align="center" class="MColor1">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'CQSF\'});">重庆快乐十分</a>
                        <div class="arrow"></div>    
                    </td>
                    <td>
                        '.$cqsf_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$cqsf_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$cqsf_win.'</td>
                </tr>
                <tr align="center" class=" MColor2" >
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'BJKN\'});">北京快乐8</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$bjkn_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$bjkn_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$bjkn_win.'</td>
                </tr>
                <tr align="center" class="MColor1">
                    <td>
                        <a  class="pagelink" href="javascript: f_com.MChgPager({type: \'GET\', method: \'SKLotteryHistoryDetails\'}, {date: \''.date("Y-m-d").'\', gtype: \'GD11\'});">广东十一选五</a>
                        <div class="arrow"></div>
                    </td>
                    <td>
                        '.$gd11_today_result["bet_money"].'
                    </td>
                    <td>
                        '.$gd11_today_result_status0["bet_money"].'
                    </td>
                    <td style="text-align: center;">'.$gd11_win.'</td>
                </tr>
				
                <tr align="center"  class="MColor2">
                    <td>总计<div class="arrow"></div></td>
                    <td>'.$total_today_money.'</td>
                    <td>'.$total_today_money_status0.'</td>
                    <td>'.$total_win_money.'</td>
                </tr>

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var GAMESELECT = "SKRecord"
//選擇遊戲
$("#MSelectType").change(function() {
    switch(GAMESELECT) {
        case \'SKRecord\':
        case \'SKLotteryRecord\':
            f_com.MChgPager({method: \'SKHistory\'});
    break;
case \'SKHistory\':
    case \'SKLotteryHistory\':
        f_com.MChgPager({method: \'SKRecord\'});
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

    $(\'#history\').click(function(){
        alert("系统繁忙，请稍后再试");
    });

</script>
';