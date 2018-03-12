<?php
header('Content-Type:text/html; charset=utf-8');
include_once("../app/member/include/config.inc.php");
include_once("../newag2/agapi.php");

//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);

$agapi = new agapi();
//$currdate = date("Y-m-d H:i:s",strtotime("-12 hour"));


$currdate = date("Y-m-d");

$roundDateToday = date("Y-m-d H:i:s");
$today = getdate(strtotime($roundDateToday));
$hours = $today['hours'];
$minutes = $today['minutes'];
if($hours==0 && $minutes<10){
	$currdate = date("Y-m-d",strtotime($currdate . "-1 day"));
}


$startTime	=	date("Y-m-d H:i:s",strtotime($currdate." "."00".":"."00".":00"));
$endTime	=	date("Y-m-d H:i:s",strtotime($currdate." "."23".":"."59".":59"));
echo " $startTime $endTime ";
$pageIndex=1;
$pageSize=500;
	function getBetRecords( $startTime , $endTime, $pageIndex,$pageSize,$platfrom){
		
		$prefix = '05';
		if($platfrom=='HUNTER'){
			$spRet = $GLOBALS["agapi"] ->betrecordHunter($startTime , $endTime, $pageIndex,$pageSize);			
		}else {
			$spRet = $GLOBALS["agapi"] ->betrecord($startTime , $endTime, $pageIndex,$pageSize);			
		}
		
		
		if($spRet['TotalCount']  > 0){
			$records = $spRet['Data']['Records'];
			foreach ($records as $key => $val){
				$record = $records[$key];
				
				$dataType = $record['DataType'];
				if("BR"==$dataType||"EBR"==$dataType||"HBR"==$dataType ||"HSR"==$dataType){
					
					if("HSR"==$dataType||"HBR"==$dataType){
						$billNo = $record['SceneID'];		
					}else {
						$billNo = $record['BillNo'];			
					}
						
					$sql="SELECT *  FROM `api_agbetdetail` where billNo='$billNo' ";
					$query = $GLOBALS["mysqli"]->query($sql);
					$rs = $query->fetch_array();
					
					if(is_null($rs)){
						
						$playerName = $record['PlayerName'];
						$agentCode = $record['AgentCode']; 
						$gameCode = $record['GameCode']; 
						$netAmount = $record['NetAmount']; 
						$betTime = $record['BetTime']; 
						$gameType = $record['GameType']; 
						$betAmount = $record['BetAmount']; 
						$validBetAmount =$record['ValidBetAmount']; 
						$flag = $record['Flag'];
						$playType = $record['PlayType'];
						$currency = $record['Currency']; 
						$tableCode = $record['TableCode']; 
						$recalcuTime = $record['RecalcuTime']; 
						$platformType = $record['PlatformType'];
						$round = $record['Round']; 
						$result = $record['Result'];
						$remark = $record['Remark']; 
						$beforeCredit = $record['BeforeCredit']; 
						$deviceType = $record['DeviceType']; 
						$loginIP = $record['LoginIP']; 
						$username = substr($playerName,2);
						$slottype=0;
						if("EBR"==$dataType){
							$slottype = $record['SlotType']; 
							$remark="";
							$tableCode="";
						}elseif("BR"==$dataType){
							
							$remark = $record['Remark'];  
							$tableCode = $record['TableCode']; 
							$slottype=0;
						}else if("HBR"==$dataType||"HSR"==$dataType){
							$betTime = $record['CreationTime']; 
							$recalcuTime = $record['CreationTime']; 
							$remark = $record['Remark']; 
							$tableCode = $record['TableCode']; 
							
							$betAmount = $record['Cost'];
							$netAmount = $record['TransferAmount'];
							$validBetAmount =$betAmount; 
							$slottype=0;
						}
						
						
						$sql		=	"SELECT user_id as uid FROM `user_list` where user_name='$username' ";
						$query = $GLOBALS["mysqli"]->query($sql);
						$urs			=	$query->fetch_array();
						$uid	=	$urs['uid'];
						
						$sql="insert into `api_agbetdetail`(dataType,billNo,playerName,agentCode,gameCode,netAmount,betTime,gameType,betAmount,validBetAmount,flag,playType,currency,tableCode,loginIP,recalcuTime,platformType,remark,round,copyFlag,prefix,username,uid,reflag,slottype) values ('$dataType','$billNo','$playerName','$agentCode','$gameCode','$netAmount','$betTime','$gameType','$betAmount','$validBetAmount','$flag','$playType','$currency','$tableCode','$loginIP','$recalcuTime','$platformType','$remark','$round','1','$prefix','$username','$uid','0',$slottype)";
						$GLOBALS["mysqli"]->query($sql);
					}else {
						$flag = $record['Flag'];						
						$netAmount = $record['NetAmount']; 					
						$recalcuTime = $record['RecalcuTime']; 
						$detailid = $rs['id'];
						if($flag!=$rs['flag'])	{
							$sql=" update `api_agbetdetail` set `flag` = '{$flag}'  , `netAmount` = '{$netAmount}' , `recalcuTime` = '$recalcuTime' WHERE `id` = '{$detailid}' ";
							
							$query = $GLOBALS["mysqli"]->query($sql);
						}							
					}
				}
				if($spRet['PageCount'] > $pageIndex){				
					getBetRecords($startTime , $endTime,$pageIndex+1,$pageSize,'');
				}
			
			}
		}
	}
	getBetRecords($startTime,$endTime,$pageIndex,$pageSize,$platfrom='');	


	//getBetRecords($startTime,$endTime,$pageIndex,$pageSize,$platfrom='HUNTER');		

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
    	<span>AG自动获取游戏记录</span><br><br>
		 <input type=button name=button value="刷新" onClick="window.location.reload()"> <br><br>
    	<span id="timecurr"></span><p>
      	<span id="timeinfo"></span>
    </td>
  </tr>
</table>
</body>

<script> 
	<!-- 
	var limit="600" ;
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