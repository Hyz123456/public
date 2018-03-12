<?php
header('Content-Type:text/html; charset=utf-8');
include_once("./common_1680.php");
$code=1008;//目标采集网站1680210彩种id
getData($code);
$jstime=substr($time,0,10);
if(strlen($qishu)>0){
	$sql="select id from lottery_result_cqsf where qishu='".$qishu."'";
	$tquery = $mysqli->query($sql);
	$tcou	= $mysqli->affected_rows;
	$hms=explode(',',$hm);
	if($tcou==0){
		$sql = "insert into lottery_result_cqsf(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8) values ('".$qishu."','".$c_time."','".$time."','".$hms[0]."','".$hms[1]."','".$hms[2]."','".$hms[3]."','".$hms[4]."','".$hms[5]."','".$hms[6]."','".$hms[7]."')";
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
      重庆快乐十分(<?=$qishu?>期:<?="$hm1,$hm2,$hm3,$hm4,$hm5,$hm6,$hm7,$hm8"?>):
      <span id="timeinfo"></span>
      </td>
  </tr>
</table>
<iframe src="./js/Js_cqsf.php?qi=<?=$qishu?>&jsType=0&s_time=<?=$jstime?>" frameborder="0" scrolling="no" height="0" width="0"></iframe>
</body>
</html>