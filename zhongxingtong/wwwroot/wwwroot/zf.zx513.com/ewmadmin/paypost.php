<?php
error_reporting(0);

function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}



$url=createLinkstring($_POST)."&shijian=".time()."\n";


file_put_contents("ceshi.txt", $url, FILE_APPEND);




$pay=trim(htmlspecialchars($_REQUEST['payfangshi']));
$ddh=trim(htmlspecialchars($_REQUEST['PayNO']));
$money=(float)trim(htmlspecialchars($_REQUEST['PayJe']));
//-------------20170822------------------------------
$money = number_format($money, 2, '.', '');
//-------------20170822------------------------------
$name=urldecode(isset($_REQUEST["PayMore"])?$_REQUEST["PayMore"]:"");
$key=trim(htmlspecialchars($_REQUEST['key']));
$appid=trim(htmlspecialchars($_REQUEST['appid']));


//$name=iconv( "gb2312", "UTF-8", $name);



$moneyactual=$money;

//file_put_contents('post'.time().'.txt',"1".$money);////////////////////////////////////////////

function send_post($url, $post_data) { 
$postdata = http_build_query($post_data);
$options = array('http' => array('method' => 'POST','header' => 'Content-type:application/x-www-form-urlencoded','content' => $postdata,'timeout' => 15 * 60));
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
return $result;
}

include_once 'inc/conn.php';
$types = "add_balance";
$custom2= "approved";
$custom6=1;
$sqlurl = "SELECT * FROM `ewmadmin` WHERE `appid`='{$appid}' and `type`='{$types}' and fkok=1 and `custom2`='{$custom2}' and `custom6`='{$custom6}' order by id asc ";
$urlhistory = mysql_fetch_assoc(mysql_query($sqlurl));
$userkey = $urlhistory['userkey'];
$fanhui = $urlhistory['fanhui'];
$urls = $urlhistory['urls'];

if($userkey<>""){
if($key == $userkey){
$tim = time();

if($pay=="2"){
$name=$money;
}

if($pay=="3" and $weixintype==1){
$name=$money;
}

if($pay=="1" and $zhifubaotype==1){
$name=$money;
}

$sqlddh = "SELECT * FROM `ewmddh` WHERE `ddh`='{$ddh}' order by id asc ";
$urlddh = mysql_fetch_assoc(mysql_query($sqlddh));
$ddhid = $urlddh['id'];


if($ddhid<>""){
	echo "Error3";
	exit();
}else{

//file_put_contents('post'.time().'.txt',"2".$name);////////////////////////////////////////////

$sqlmzu = "SELECT * FROM `ewmszb` WHERE `appid`='{$appid}' and `pay`='{$pay}' and `name`='{$name}' order by id asc ";



$urlmzu = mysql_fetch_assoc(mysql_query($sqlmzu));
$cnyend = $urlmzu['cny'];
if($cnyend<>""){
if($pay=="1" and $zhifubaotype==0){
$cnyend =$money;
}

if($pay=="3" and $weixintype==0){
$cnyend =$money;
}

$ewmm=mysql_fetch_assoc(mysql_query($sql="select * from ewmddh where name='$name' and cny='$cnyend' and appid='$appid' and dingdanok=0 and pay='$pay' and timm>'$tim' ORDER BY id DESC"));



if($ewmm['uid']<>""){
    $wemjlid=$ewmm['id'];
	$moneyok=$ewmm['cny'];
	$dingdan=$ewmm['uid'];
	mysql_query("Update ewmddh set dingdanok=1,ddh='$ddh' where id=" . $wemjlid);
	$timm = time();
	mysql_query("Update ewmszb set timm='$timm' where `appid`='$appid' and name='$name' and pay='$pay' and cny='$moneyok'");

if($ewmposttype==1){
    //--------------------------------------------------------------------------------
	$URL="http://".$fanhui;
	$post_data['PayJe'] = $moneyok;
	$post_data['PayMore'] = $dingdan;
	$post_data['key'] = $userkey;
	$post_data['pay'] = $pay;
    $post_data['ddh'] = $ddh;
	$post_data['appid'] = $appid;
	$post_data['moneyactual'] = $moneyactual;
	$post_data['posttype'] = 1;
	$referrer="";
	$URL_Info=parse_url($URL);
	if($referrer=="")
	$referrer=$_SERVER["SCRIPT_URI"];
	foreach($post_data as $key=>$value)
	$values[]="$key=".urlencode($value);
	$data_string=implode("&",$values);
	if(!isset($URL_Info["port"]))
	$URL_Info["port"]=80;
	$request.="POST ".$URL_Info["path"]." HTTP/1.1\n";
	$request.="Host: ".$URL_Info["host"]."\n";
	$request.="Referer: $referrer\n";
	$request.="Content-type: application/x-www-form-urlencoded\n";
	$request.="Content-length: ".strlen($data_string)."\n";
	$request.="Connection: close\n";
	$request.="\n";
	$request.=$data_string."\n";
	$fp = fsockopen($URL_Info["host"],$URL_Info["port"]);
	fputs($fp, $request);
	while(!feof($fp)) {
    	$result .= fgets($fp, 128);
	}
	fclose($fp);
	echo "Success";
	//-------------------------------------------------------------------------
}

if($ewmposttype==2){

	echo "Success";
	$post_data = array();
	$post_data['PayJe'] = $moneyok;
	$post_data['PayMore'] = $dingdan;
	$post_data['key'] = $userkey;
	$post_data['pay'] = $pay;
    $post_data['ddh'] = $ddh;
	$post_data['appid'] = $appid;
	$post_data['cny2017'] = $cny2017;
	$post_data['moneyactual'] = $moneyactual;
	$post_data['posttype'] = 2;

$url="http://".$fanhui;
$o="";  
foreach ($post_data as $k=>$v)  
{  
    $o.= "$k=".urlencode($v)."&";  
}  
$post_data=substr($o,0,-1);  
$ch = curl_init();  
curl_setopt($ch, CURLOPT_POST, 1);  
curl_setopt($ch, CURLOPT_HEADER, 0);  
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');  
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);  
$result = curl_exec($ch); 
echo "Success";
	 //--------------------------------------------------------------------------------
}
 //--------------------------------------------------------------------------------
if($ewmposttype==3){
$url="http://".$fanhui;
echo "Success";
$post_data = array(
'PayJe' =>  $moneyok,
'PayMore' => $dingdan,
'key' => $userkey,
'pay' => $pay,
'ddh' => $ddh,
'appid' => $appid,
'moneyactual' => $moneyactual,
'posttype' => 3,
'cny2017' => $cny2017
);
send_post($url, $post_data);
}
 //--------------------------------------------------------------------------------

}else{
	$name="";
	echo "Error1";
}
}else{
echo 'Error2';
}
}

}else{
echo 'Key';
}
}else{
echo "APPID";
}
?>