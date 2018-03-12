<?php
header('Content-Type:text/html; charset=utf-8');
include_once("../mysqli.php");
require ("curl_http.php");
$curl = new Curl_HTTP_Client();
$curl->set_referrer("https://www.129kai.com/list-shssl.html");
$curl->set_user_agent("Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Maxthon/4.4.3.4000 Chrome/30.0.1599.101");
$html_data = $curl->fetch_url("https://www.129kai.com/index.php?c=api&a=updateinfo&cp=shssl&uptime=1504788003&chtime=1805&catid=190&modelid=27");
$arr= json_decode($html_data,true);
$qishu = $arr['l_t'];
$hm = $arr['l_r'];
$time = $arr['l_d'];

$jstime=substr($time,0,10);
if(strlen($qishu)>0){
	$sql="select id from lottery_result_t3 where qishu='".$qishu."'";
	$tquery = $mysqli->query($sql);
	$tcou	= $mysqli->affected_rows;
	$hms=explode(',',$hm);
	if($tcou==0){
		$sql = "insert into lottery_result_t3(qishu,create_time,datetime,ball_1,ball_2,ball_3) values ('".$qishu."','".$c_time."','".$time."','".$hms[0]."','".$hms[1]."','".$hms[2]."')";
		$mysqli->query($sql);
	}
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
<script> 
var limit="23" 
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
		setTimeout("beginrefresh()",1000) 
	} 
} 

window.onload=beginrefresh 
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
       <input type=button name=button value="刷新" onClick="window.location.reload()">
      上海时时乐(<?=$qishu?>期:<?="$hms[0],$hms[1],$hms[2]"?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="./js/js_3d.php?qi=<?=$qishu?>&jsType=0&type=%E4%B8%8A%E6%B5%B7%E6%97%B6%E6%97%B6%E4%B9%90&gtype=t3&s_time=<?=$jstime?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>  
</body>
</html>