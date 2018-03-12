<?php
if(!isset($_SESSION)){ session_start();}
include_once("../app/member/include/config.inc.php");
include_once("../app/member/class/user.php");
include_once("../class/bbapi.php");
$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];
$userinfo		=	user::getinfo($uid);
$callback	= $_GET["callback"];
$bbusername=$userinfo['bb_username'];
$username = $userinfo['user_name'];

$bbapi = new bbapi();
$bbRet = $bbapi->balance($username);
if($bbRet['Success'] == false){
    $bbapi->create($username);
    $currAmt = 0;
}else{
    $currAmt = $bbRet['Data'];
}

$json["general"] = sprintf("%.2f",$currAmt);
$sql = "update user_list set bb_money ='$currAmt' where user_name='$username'";
$mysqli->query($sql);
if(isset($_GET['type'])) {
    $currAmt =  $json["general"];}
else{
    echo json_encode($json);
}
exit;
?>
