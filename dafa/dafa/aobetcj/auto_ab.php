<?php
header('Content-Type:text/html; charset=utf-8');
include_once("../app/member/include/config.inc.php");
include_once("../newab2/abapi.php");

//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
$abapi = new abapi();
//$currdate = date("Y-m-d H:i:s",strtotime("-12 hour"));
//$currdate = date("Y-m-d",strtotime("-12 hour"));
$endTime = date("Y-m-d H:i:s");
$startTime = date("Y-m-d H:i:s",strtotime("-120 minute"));
//echo "$currdate1 ";
/*$roundDateToday = date("Y-m-d H:i:s",strtotime("+12 hour"));
$today = getdate(strtotime($roundDateToday));
$hours = $today['hours'];
$minutes = $today['minutes'];
if($hours==0 && $minutes<10){
	$currdate = date("Y-m-d",strtotime($currdate . "-1 day"));
}*/
//$startTime	=	date("Y-m-d H:i:s",strtotime($currdate." "."00".":"."00".":00"));
//$endTime	=	date("Y-m-d H:i:s",strtotime($currdate." "."23".":"."59".":59"));
//$endTime = $currdate;
//$startTime = date("Y-m-d",strtotime($currdate . "-30 minute"));
echo "$startTime $endTime";
$pageIndex=1;
$pageSize=500;

	function getBetRecords($startTime , $endTime){

		$spRet = $GLOBALS["abapi"]->betrecord($startTime , $endTime);

	;
		if(isset($spRet['Data']['Records'])){

			$records = $spRet['Data']['Records'];

			foreach ($records as $record){


				$betNum = NumToStr($record['betNum']);

					
				$sql="SELECT *  FROM `api_abbetdetail` where betNum='$betNum' ";
				$query = $GLOBALS["mysqli"]->query($sql);
				$rs = $query->fetch_array();

				if(is_null($rs)){

					$betAmount = $record['betAmount'];
                    $validAmount = $record['validAmount'];
                    $winOrLoss = $record['winOrLoss'];
                    $betTime = $record['betTime'];
                    $betType = $record['betType'];
                    $client = $record['client'];
                    $username = substr($client,2);
                    $currency = $record['currency'];
                    $gameResult = $record['gameResult'];
                    $gameRoundEndTime = $record['gameRoundEndTime'];
                    $gameRoundId = $record['gameRoundId'];
                    $gameRoundStartTime = $record['gameRoundStartTime'];
                    $gameType = $record['gameType'];
                    $tableName = $record['tableName'];

					$sql="insert into
`api_abbetdetail`
(betNum,betAmount,validAmount,winOrLoss,betTime,betType,client,username,
currency,gameResult,gameRoundEndTime,gameRoundId,gameRoundStartTime,gameType,tableName)
values ('$betNum','$betAmount','$validAmount','$winOrLoss','$betTime','$betType','$client','$username',
'$currency','$gameResult','$gameRoundEndTime','$gameRoundId','$gameRoundStartTime','$gameType','$tableName')";

					$GLOBALS["mysqli"]->query($sql);
				}else {
					/*$flag = $record['Flag'];						
					$Bet = $record['Bet']; 					
					$recalcuTime = $record['RecalcuTime']; 
					$detailid = $rs['id'];
					if($flag!=$rs['flag'])	{
						$sql=" update `api_ptbetdetail` set `flag` = '{$flag}'  , `Bet` = '{$netAmount}' , `recalcuTime` = '$recalcuTime' WHERE `id` = '{$detailid}' ";
						
						$query = $GLOBALS["mysqli"]->query($sql);
					}*/							
				}
				
				/*if($spRet['PageCount'] > $pageIndex){
					getBetRecords($startTime , $endTime,$pageIndex+1,$pageSize);
				}*/
			
			}
		}
	}
	getBetRecords($startTime,$endTime);

function NumToStr($num){
    if (stripos($num,'e')===false) return $num;
    $num = trim(preg_replace('/[=\'"]/','',$num,1),'"');//出现科学计数法，还原成字符串
    $result = "";
    while ($num > 0){
        $v = $num - floor($num / 10)*10;
        $num = floor($num / 10);
        $result   =   $v . $result;
    }
    return $result;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<style type="text/css">
<!--
body,td,th {
    font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
-->
</style></head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="miidel">
    	<span>ALLBet自动获取游戏记录</span><br><br>
		 <input type=button name=button value="刷新" onClick="window.location.reload()"> <br><br>
    	<span id="timecurr"></span><p>
      	<span id="timeinfo"></span>
    </td>
  </tr>
</table>
</body>

<script> 
	<!-- 
	var limit="1800" ;
	var parselimit=limit;

	function beginrefresh(){ 

		if (parselimit==1){ 
			window.location.reload() ;
		}else{ 
			parselimit-=1 ;
			//curmin=Math.floor(parselimit) ;
			//if (curmin!=0) {
				//curtime=curmin+"秒后自动获取!" ;
			//}else{ 
				document.getElementById('timeinfo').innerText=parselimit+"秒后自动刷新方法!" ;
				document.getElementById('timecurr').innerText='当前时间:'+getNowFormatDate() ;
				setTimeout("beginrefresh()",1000) ;
			//} 
		} 
	}

	function getNowFormatDate() {
	    var date = new Date();
	    var seperator1 = "-";
	    var seperator2 = ":";
	    var year = date.getFullYear();
	    var month = date.getMonth() + 1;
	    var strDate = date.getDate();
	    if (month >= 1 && month <= 9) {
	        month = "0" + month;
	    }
	    if (strDate >= 0 && strDate <= 9) {
	        strDate = "0" + strDate;
	    }
	    var currentdate = year + seperator1 + month + seperator1 + strDate
	            + " " + date.getHours() + seperator2 + date.getMinutes()
	            + seperator2 + date.getSeconds();
	    return currentdate;
	}	
	window.onload=beginrefresh();
</script>
</html>