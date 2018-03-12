<?php
header("content-type:text/html; charset=utf-8");
include_once("../app/member/include/config.inc.php");
include_once("../newmg2/mgapi.php");

$key = 'VL8uDPH9ZudFDTFcZFtpM9vXVt3uyKCg7aVh6TXFmwAQmUkVcXaAjpx6';
$apiAccount="NGtaiyang02";
//$rowID = '0';

function getSalt($userName)
{
    return substr(md5($userName),0,5);
}

$salt = getSalt(''.time());

//获取sessionGuid
$coden = md5("".$key."".$apiAccount."".$salt."");
$codes = $salt.$coden;

$url = 'http://api.room88.net/api/mg/sessionguid.ashx';  //调用接口的平台服务地址

$post_string = array(
'apiAccount'=>''.$apiAccount.'',
'code'=>''.$codes.'',
);

//var_dump($post_string);die;
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$result = curl_exec($ch);  
curl_close($ch);


//var_dump($result); die;

$obj=json_decode($result);

//得到sessionguid
$sessionguid = $obj->Data;



$week	=	6;
$stime	=	date("Y-m-d",time()); //今天日期
$stime1 = ' 23:59:59';
$etime	=	date("Y-m-d",strtotime("$stime -$week day")); //前 $week 天日期
$etime1 = ' 00:00:00';

$dateFrom = $etime.$etime1;
$dateTo   = $stime.$stime1;

$pageIndex = '1';
$pageSize = '500';


$coden = md5("".$key."".$apiAccount."".$dateFrom."".$dateTo."".$pageIndex."".$pageSize."".$salt."");
$codes = $salt.$coden;

$url = 'http://api.room88.net/api/mg/betrecord.ashx';
//$url = 'http://www.hf1818.com/mgame/111.php';

$post_string = array(
'apiAccount'=>''.$apiAccount.'',
'dateFrom'=>''.$dateFrom.'',
'dateTo'=>''.$dateTo.'',
'pageIndex'=>''.$pageIndex.'',
'pageSize'=>''.$pageSize.'',
'sessionGUID'=>''.$sessionguid.'',
'code'=>''.$codes.'',
);

//var_dump($post_string);die;
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$result = curl_exec($ch);

curl_close($ch);

$obj=json_decode($result);

$data = $obj->Data;
  
//echo $result; die;
  
  
  
  
  $i=0;
  $n=1;
  
  
  
  
  
   foreach ($data as $unit)
  {

  $i++;
  
  
  $dataType = 'BR';
  $billNo = rand(100000,999999);
  $playerName = $arr[$i]['AccountNumber']=$unit->AccountNumber;
  $agentCode = '';
  
  $gameCode = $arr[$i]['GameType']=$unit->GameType;
  
  $netAmount = $arr[$i]['Income']=$unit->Income;
  
  
  $validBetAmount = $arr[$i]['Income']=$unit->Income;
  
  $flag ='1';
  $playType = '';
  $currency = 'CNY';
  $tableCode = '';
  $loginIP = '';
  $platformType = 'MG';
  $remark = '';
  $round = '';
  //$result = '';
  
  $betTimen = $arr[$i]['Date']=$unit->Date;
  
  $betTime = str_replace("T"," ",$betTimen);

  $gameType = $arr[$i]['GameType']=$unit->GameType;
  
  $betAmount = $arr[$i]['Payout']=$unit->Payout;
  
  $result = $arr[$i]['WinAmount']=$unit->WinAmount;

  $sql      =   "select AccountNo,Date,BetAmount from api_mgbetdetail where AccountNo='".$playerName."' and Date='".$betTime."' and BetAmount='".$betAmount."' ";
  //echo $sql;
  
  $query    =	$mysqli->query($sql);
  $rs		=	$query->fetch_array();
  
  $AccountNos = $rs['AccountNo'];
  $Dates = $rs['Date'];
  $BetAmounts = $rs['BetAmount'];
  
  
  
  //echo $netAmounts;
  
  //echo $billNo; echo '--';
  //echo $billNos;
  
  if ($playerName == $AccountNos || $betTime == $Dates || $netAmount == $BetAmounts )
  {
	  
	 $ns = $n-1; 
  
  }
  
  else
	  
  {
	  

   $sql="insert into api_mgbetdetail (AccountNo,Date,Game,Currency,NumberOfGames,NumberOfBet,BetAmount,PayoutAmount,GGRAmount) VALUES ('$playerName','$betTime','$gameCode','$currency','0','0','$betAmount','$betAmount','$validBetAmount')";

  
 //echo '1111'; die;
  
  $mysqli->query($sql) or die($mysqli->error);
  
 
  
  
  
	  
  }
  
   
 }
  


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>MG接收</title>
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
<script>
window.parent.is_open = 1;
</script>
<script> 
<!-- 
var limit="150" 
if (document.images){
	var parselimit=limit
} 
function beginrefresh(){ 
if (!document.images) 
	return 
if (parselimit==1) 
	window.location.reload() 
else{ 
	parselimit-=1 
	curmin=Math.floor(parselimit) 
	if (curmin!=0) 
		curtime=curmin+"秒后自动获取!" 
	else 
		curtime=cursec+"秒后自动获取!" 
		timeinfo.innerText=curtime 
		setTimeout("beginrefresh()",2000)
	} 
} 
window.onload=beginrefresh
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
      <input type=button name=button value="刷新" onClick="window.location.reload()">
     MG获取成功！！
      <span id="timeinfo"></span>
	  <br><br>
	  注意：别频繁刷新接口限制10分钟5次接收！
      </td>
  </tr>
</table>

</body>
</html>