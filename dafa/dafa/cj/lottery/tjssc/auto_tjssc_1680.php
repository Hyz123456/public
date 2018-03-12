<?php
header('Content-Type:text/html; charset=utf-8');
include_once("./common_new_1680.php");
$type='ssc';
$code=10003;//目标采集网站1680210彩种id
getData($type,$code);
$jstime=substr($time,0,10);
if(strlen($qishu)>0){
	$sql="select id from lottery_result_tj where qishu='".$qishu."'";
	$tquery = $mysqli->query($sql);
	$tcou	= $mysqli->affected_rows;
	$hms=explode(',',$hm);
	$c_time 	= date('Y-m-d H:i:s',time());
	if($tcou==0){
		$sql = "insert into lottery_result_tj(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5) values ('".$qishu."','".$c_time."','".$time."','".$hms[0]."','".$hms[1]."','".$hms[2]."','".$hms[3]."','".$hms[4]."')";
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
<table width="100%"border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
      <input type=button name=button value="刷新" onClick="window.location.reload()">
      天津时时彩(<?=$qishu?>期:<?=$hms[0].','.$hms[1].','.$hms[2].','.$hms[3].','.$hms[4]?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="./js/Js_2.php?qi=<?=$qishu?>&jsType=0&type=%E5%A4%A9%E6%B4%A5%E6%97%B6%E6%97%B6%E5%BD%A9&gtype=tj&s_time=<?=$jstime?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>

</body>
</html>