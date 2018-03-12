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



$id = $_POST['id'];

$fsResult = $_POST['fsResult'];
    $sql="select user_name from user_list_lc where user_name='$fsResult'";
    $query	 =	$mysqli->query($sql);
	$row = $query->fetch_array();
	
	if($row){
    $sql = "update pindd set user='$fsResult' where id='".intval($id)."' ";
    $query	 =	$mysqli->query($sql);
    echo '增送成功';
	}else{
	 echo "理财网,无此会员";
	}