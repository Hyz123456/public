<?php
header('Content-Type:text/html; charset=utf-8');
include_once("../app/member/include/config.inc.php");
include_once("../newbbin2/bbapi.php");
ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息
set_time_limit(0);
$bbapi = new bbapi();
//$roundDate=date("Y-m-d",strtotime('-30 minute'));
//$startTime=date("H:i:s",strtotime('-30 minute'));


//$roundDate = date("Y-m-d",strtotime("-12 hour"));
$roundDate = date("Y-m-d");
//$roundDate = '2016-08-24';
$startTime='00:00:00';

$checkDate = date("Y-m-d",time());
if($roundDate != $checkDate){
	$endTime = '23:59:59';
}else{
	$endTime = date("H:i:s",time());
}
$endTime = '23:59:59';
echo "$roundDate  $startTime $endTime";
$pageIndex=1;
$pageSize=500;
$subGameKind='';
$gameType='';


//get sports Record
function getSportsRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize){
	$spRet = $GLOBALS["bbapi"] -> getGameRecord($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);

	if($spRet['TotalCount']  > 0){
		$records = $spRet['Data'];
		 foreach($records as $key=>$val ){
			 $record = $records[$key];
			 $UserName = '\''.substr($record['UserName'],2).'\'';
			 $WagersID = '\''.$record['WagersID'].'\'';
			 $WagersDate = '\''.$record['WagersDate'].'\'';
			 $GameType = '\''.$record['GameType'].'\'';
			 $Result = '\''.$record['Result'].'\'';
			 $BetAmount = $record['BetAmount'];
			 $Payoff = $record['Payoff'];
			 $Currency = '\''.$record['Currency'].'\'';
			 $Commissionable = $record['Commissionable'];
			 $Origin = '\''.$record['Origin'].'\'';
			 $querySql = "select * from api_bbbetdetail where WagersID = $WagersID";
			 //echo $querySql;
			 $query = $GLOBALS["mysqli"]->query($querySql);
			 $rs	= $query->fetch_array();
			 if(is_null($rs)){
				 $intSql = "INSERT INTO api_bbbetdetail(UserName,WagersID,WagersDate,GameType,Result,Origin,Currency,BetAmount,Commissionable,Payoff,detilType) VALUES ($UserName,$WagersID,$WagersDate ,$GameType,$Result,$Origin,$Currency,$BetAmount,$Commissionable,$Payoff,$gameKind)";
				 $GLOBALS["mysqli"]->query($intSql);
			 }else{
				 $upSql = "update api_bbbetdetail set Result=$Result, Payoff=$Payoff,Commissionable=$Commissionable where WagersID = $WagersID ";
				 $GLOBALS["mysqli"]->query($upSql);
			 } 
		 }
		if($spRet['PageCount'] > $pageIndex){
			getSportsRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex+1,$pageSize);
		}
	}
}
//cll api
$gameKind=1;
getSportsRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);

 
//get Live Record
function getLiveRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize){
	$spRet = $GLOBALS["bbapi"] -> getGameRecord($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
	
	if($spRet['TotalCount'] > 0){
		$records = $spRet['Data'];
		foreach($records as $key=>$val ){
			 $record = $records[$key];
			 $UserName = '\''.substr($record['UserName'],2).'\'';
			 $WagersID = '\''.$record['WagersID'].'\'';
			 $WagersDate = '\''.$record['WagersDate'].'\'';
			 $SerialID = '\''.$record['SerialID'].'\'';
			 $RoundNo = '\''.$record['RoundNo'].'\'';
			 $GameType = '\''.$record['GameType'].'\'';
			 $GameCode = '\''.$record['GameCode'].'\'';
			 $Result = '\''.$record['Result'].'\'';
			 $ResultType = '\''.$record['ResultType'].'\'';
			 $Card = '\''.$record['Card'].'\'';
			 $BetAmount = $record['BetAmount'];
			 $Payoff = $record['Payoff'];
			 $Currency = '\''.$record['Currency'].'\'';
			 $Commissionable = $record['Commissionable'];
			 $ExchangeRate = $record['ExchangeRate'];
			 $Origin = '\''.$record['Origin'].'\'';
			 
			 $querySql = "select * from api_bbbetdetail where WagersID = $WagersID";
			 $query = $GLOBALS["mysqli"]->query($querySql);
			 $rs	= $query->fetch_array();
			 if(is_null($rs)){
				 $intSql = "INSERT INTO api_bbbetdetail(UserName,WagersID,WagersDate,SerialID,RoundNo,GameType,GameCode,Result,ResultType,Card,BetAmount,Payoff,Currency,Commissionable,ExchangeRate,Origin,detilType)"
				        ." VALUES ($UserName,$WagersID,$WagersDate,$SerialID,$RoundNo,$GameType,$GameCode,$Result,$ResultType,$Card,$BetAmount,$Payoff,$Currency,$Commissionable,$ExchangeRate,$Origin,$gameKind)";
				 $GLOBALS["mysqli"]->query($intSql);
			 }else{
				 $upSql = "update api_bbbetdetail set Result=$Result, Payoff=$Payoff,Commissionable=$Commissionable where WagersID = $WagersID ";
				 $GLOBALS["mysqli"]->query($upSql);
			 }
		}
		if($spRet['PageCount'] > $pageIndex){
			getLiveRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex+1,$pageSize);
		}
	}
}
//cll api
$gameKind=3;
getLiveRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);

function getLotteryRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize){
	$spRet = $GLOBALS["bbapi"] -> getGameRecord($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
	if($spRet['TotalCount'] > 0){
		$records = $spRet['Data'];
		foreach($records as $key=>$val ){
			$record = $records[$key];
			 $UserName = '\''.substr($record['UserName'],2).'\'';
			 $WagersID = '\''.$record['WagersID'].'\'';
			 $WagersDate = '\''.$record['WagersDate'].'\'';
			 $GameType = '\''.$record['GameType'].'\'';
			 $Result = '\''.$record['Result'].'\'';
			 $BetAmount = $record['BetAmount'];
			 $Payoff = $record['Payoff'];
			 $Currency = '\''.$record['Currency'].'\'';
			 $ExchangeRate = $record['ExchangeRate'];
			 $Commissionable = $record['Commission'];
			 if($Payoff==0){
				$Commissionable = 0;
			 }else{
				$Commissionable = $BetAmount;
			 }
			 $ResultType ='\''.$record['IsPaid'].'\'';
			 $Origin = '\''.$record['Origin'].'\'';
			 $querySql = "select * from api_bbbetdetail where WagersID = $WagersID";		 
			 $query = $GLOBALS["mysqli"]->query($querySql);
			 $rs	= $query->fetch_array();
			 if(is_null($rs)){
				 $intSql = "INSERT INTO api_bbbetdetail(UserName,WagersID,WagersDate,GameType,Result,BetAmount,Payoff,Currency,ExchangeRate,Commissionable,ResultType,Origin,detilType) "
							."VALUES ($UserName,$WagersID,$WagersDate,$GameType,$Result,$BetAmount,$Payoff,$Currency,$ExchangeRate,$Commissionable,$ResultType,$Origin,$gameKind)";
				
				 $GLOBALS["mysqli"]->query($intSql);
			 }else{
				 $upSql = "update api_bbbetdetail set Result=$Result, Payoff=$Payoff, Commissionable=$Commissionable where WagersID = $WagersID ";					 
				 $GLOBALS["mysqli"]->query($upSql);
			 } 
		}
		if($spRet['PageCount'] > $pageIndex){
			getLotteryRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex+1,$pageSize);
		}
	}
}			
	

$lotters = array('LT'=>'LT','BJ3D'=>'BJ3D','PL3D'=>'PL3D','BBPK'=>'BBPK','BB3D'=>'BB3D',
			'BBKN'=>'BBKN','BBRB'=>'BBRB','SH3D'=>'SH3D','CQSC'=>'CQSC','TJSC'=>'TJSC','JXSC'=>'JXSC'
			,'XJSC'=>'XJSC','CQSF'=>'CQSF','GXSF'=>'GXSF','GDSF'=>'GDSF','TJSF'=>'TJSF','BJPK'=>'BJPK','BJKN'=>'BJKN','CAKN'=>'CAKN',
			'AUKN'=>'AUKN','GDE5'=>'GDE5','JXE5'=>'JXE5','SDE5'=>'SDE5','JLQ3'=>'JLQ3','JSQ3'=>'JSQ3','AHQ3'=>'AHQ3','OTHER'=>'OTHER');

//cll api
$gameKind=12;
foreach($lotters as $key=>$val ){
	$gameType = $lotters[$key];
	getLotteryRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
}

//get Slot Record
function getSlotRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize){
	$spRet = $GLOBALS["bbapi"] -> getGameRecord($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
	if($spRet['TotalCount'] > 0 ){
		$records = $spRet['Data'];
		//print_r($records);
		foreach($records as $key=>$val ){
			$record = $records[$key];
			 $UserName = '\''.substr($record['UserName'],2).'\'';
			 $WagersID = '\''.$record['WagersID'].'\'';
			 $WagersDate = '\''.$record['WagersDate'].'\'';
			 $GameType = '\''.$record['GameType'].'\'';
			 $Result = '\''.$record['Result'].'\'';
			 $BetAmount = $record['BetAmount'];
			 $Payoff = $record['Payoff'];
			 $Currency = '\''.$record['Currency'].'\'';
			 $ExchangeRate = $record['ExchangeRate'];
			 $Commissionable = $record['Commissionable'];
			 $querySql = "select * from api_bbbetdetail where WagersID = $WagersID";
			 $query = $GLOBALS["mysqli"]->query($querySql);
			 $rs	= $query->fetch_array();
			 if(is_null($rs)){
				 $intSql = "INSERT INTO api_bbbetdetail(UserName,WagersID,WagersDate,GameType,Result,BetAmount,Payoff,Currency,ExchangeRate,Commissionable,detilType) "
							."VALUES ($UserName,$WagersID,$WagersDate,$GameType,$Result,$BetAmount,$Payoff,$Currency,$ExchangeRate,$Commissionable,$gameKind)";
				 $GLOBALS["mysqli"]->query($intSql);
			 }else{
				 $upSql = "update api_bbbetdetail set Result=$Result, Payoff=$Payoff, Commissionable=$Commissionable where WagersID = $WagersID ";
				 $GLOBALS["mysqli"]->query($upSql);
			 }  
		}
		if($spRet['PageCount'] > $pageIndex){
			getSlotRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex+1,$pageSize);
		}
	}
}			

$gameKind=5;
$subGameKind=1;
getSlotRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
getSlotRecords($roundDate, $startTime , $endTime, $gameKind,2,$gameType,$pageIndex,$pageSize);
getSlotRecords($roundDate, $startTime , $endTime, $gameKind,3,$gameType,$pageIndex,$pageSize);

//cll api
$subGameKind=2;
getSlotRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);


//get 3d Record
function get3DRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize){
	$spRet = $GLOBALS["bbapi"] -> getGameRecord($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
	if($spRet['TotalCount'] >0){
		$records = $spRet['Data'];
		foreach($records as $key=>$val ){
			$record = $records[$key];
			 $UserName = '\''.substr($record['UserName'],2).'\'';
			 $WagersID = '\''.$record['WagersID'].'\'';
			 $WagersDate = '\''.$record['WagersDate'].'\'';
			 $GameType = '\''.$record['GameType'].'\'';
			 $Result = '\''.$record['Result'].'\'';
			 $BetAmount = $record['BetAmount'];
			 $Payoff = $record['Payoff'];
			 $Currency = '\''.$record['Currency'].'\'';
			 $ExchangeRate = $record['ExchangeRate'];
			 $Commissionable = $record['Commissionable'];
			 $querySql = "select * from api_bbbetdetail where WagersID = $WagersID";
			 $query = $GLOBALS["mysqli"]->query($querySql);
			 $rs	= $query->fetch_array();
			 if(is_null($rs)){
				 $intSql = "INSERT INTO api_bbbetdetail(UserName,WagersID,WagersDate,GameType,Result,BetAmount,Payoff,Currency,ExchangeRate,Commissionable,detilType) "
							."VALUES ($UserName,$WagersID,$WagersDate,$GameType,$Result,$BetAmount,$Payoff,$Currency,$ExchangeRate,$Commissionable,$gameKind)";
				 $GLOBALS["mysqli"]->query($intSql);
			 }else{
				 $upSql = "update api_bbbetdetail set Result=$Result, Payoff=$Payoff, Commissionable=$Commissionable where WagersID = $WagersID ";
				 $GLOBALS["mysqli"]->query($upSql);
			 }   
			 
		}
		if($spRet['PageCount'] > $pageIndex){
			get3DRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex+1,$pageSize);
		}
	}
}	 
//cll api
$gameKind=15;
get3DRecords($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize);
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
    <td align="left">
    	<span>BB自动获取游戏记录</span><br><br>
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
			window.location.reload();
		}else{ 
			parselimit-=1 ;
			document.getElementById('timeinfo').innerText=parselimit+"秒后自动刷新方法!" ;
			document.getElementById('timecurr').innerText='当前时间:'+getNowFormatDate() ;
			setTimeout("beginrefresh()",1000) ;
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
