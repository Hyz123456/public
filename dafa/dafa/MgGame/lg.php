<?php
session_start();
//ini_set('display_errors','yes');
header("Content-Type:text/html; charset=utf-8"); 
include_once("../include/mysqli.php");
include_once("../cache/website.php");
include_once("../common/function.php");
include("../include/agapi.php");
include_once("../include/httpPost.php");
$uid=$_SESSION["uid"];
$fo=$_REQUEST['fo'];
$rtnagwh = 0;
if($rtnagwh==0){
	if(!empty($_SESSION["uid"]) && !empty($_SESSION["username"])){
		$sql = "select ag_username,ag_password,isag,uid from k_user where uid='$uid'";
		$result = $mysqli->query($sql);
		$row=$result->fetch_array();
		$ag_username=$row['ag_username'];
		$ag_password=$row['ag_password'];
		$id=$row['uid'];
		//print_r($row); exit;
		if(!$row['isag']){
			$status =  AGapi_reg($ag_username,$ag_password,$ag_username,$id);
			//print_r($status); exit;
			if($status=='1000' || $status=='1009'){
				//print_r($status);
				$sql="UPDATE `k_user` SET `isag`='1' WHERE (`uid`='$id')";
				$mysqli->query($sql);
			}else{
				exit("$status||ERR");
			}
		}
		$rs =  AGapi_userinfo($ag_username,$ag_password);
		//print_r($rs); print_r("1111");
		//print_r($rs); exit;
		if((int)$rs ->{'status'}!=1000){
			//print_r($remsg); print_r("2222");
			$remsg=AGapi_getmsg($rs ->{'status'});
			exit($remsg."请联系客服(ERROR:".$rs ->{'status'}.")||ERR");
		}
		$remsg="http://".$AGUrl."/game.aspx?user_name=".$ag_username."&user_password=".$ag_password."||OK";
	    //var_dump($remsg);
	}else{$remsg="2||ERR";}
}else{
	$remsg=$rtnagwh."||ERR";
}

echo $remsg;
?>