<?php
ob_start();  //启动输出缓冲


//获取指定标记中的内容

function cut($start,$end,$file){
        $content=explode($start,$file); 
        $content=explode($end,$content[1]); 
        return  $content[0]; 
}
function getcode($str){
         $str=trim(eregi_replace("[^0-9]","",$str)); 
        return $str; 
}
 
	//$url="http://old.1680210.com/ajaxTool/lotteryHelper.ashx?code=10016&_=324344423&type=one";
	$url="http://old.1680210.com/Open/CurrentOpen?code=2002";
	//{"s":0,"m":"","c":"10010","l_c":86,"l_t":2015081886,"l_d":"2015/08/18 22:04:43","l_r":"9,20,15,19,12,11,2,5","c_t":2015081886,"c_d":"2015/08/18  
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)"); 
$content = curl_exec($ch); 

$order   = array("\r\n", "\n", "\r");
$replace = '';
$text=str_replace($order, $replace, $content);

$text=str_replace("'",  '-', $text);
$text=str_replace("/",  '-', $text);

$start='"l_d":"';
$end='","l_r":"';
$content1=cut($start,$end,$text);

$start='"l_t":';
$end=',"l_d":"';
$content2=cut($start,$end,$text);
$tempcontent2=$content2;
//$content2=substr($tempcontent2,0,8)."0".substr($tempcontent2,8);//2015081886
//$content1=str_replace("->",  '20', $content1);

//echo $content1;

$start='","l_r":"';
$end='","c_t":';
$content3=cut($start,$end,$text);
$content3=str_replace('"','',$content3);



header("Content-type: application/xml");
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml rows="1" code="fc3d" remain=""><row expect="'.$content2.'" opencode="'.$content3.'" opentime="'.$content1.'" /></xml>';
ob_end_flush();	
?>
