<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($strPol)-1;
		$member=array();
	for($i=0;$i<10;$i++){
	
		 for($j=0;$j<6;$j++){
			$str.=$strPol[rand(0,$max)];
		 }
		 
		 $member[$i]=time().$str;
		
		$str='';
		
	}
	foreach($member as $va){
		
	$date=date('Y-m-d H:i:s');
	$ads="insert into pindd(pinme,time)value('$va','$date')";
	$mysqli->query($ads) or die($ads);
	}
	echo "<script>alert('生成成功');history.go(-1);</script>";
	?>
