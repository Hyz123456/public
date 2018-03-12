<?php
include_once("../../app/member/include/config.inc.php");
header("Content-type: text/html; charset=utf-8");
$bank=$_POST["bank"];
$agents_add=$_POST["agents_add"];
$birthday	    =	$_POST["birthday"];
$tel		    =	$_POST["tel"];
$email		    =	$_POST["email"];
$qq		        =	$_POST["qq"];
$othercon		=	$_POST["othercon"];
$remark	        =	$_POST["remark"];
$id=$_POST['id'];
$sql="select * from agents_list where id='$id'";
$query=$mysqli->query($sql);
if($query)
	$row_a=$query->fetch_array();
$sql="select * from user_list where user_name='".$row_a['agents_name']."";
$query=$mysqli->query($sql);
if($query)
	$row_u=$query->fetch_array();
$sql="update agents_list set bank='$bank',agents_add='$agents_add',birthday='$birthday',tel='$tel',email='$email',othercon='$othercon',remark='$remark' where id='$id'";
$query_a=$mysqli->query($sql);
$sql="update user_list set pay_num='$bank',pay_bank='$agents_add',birthday='$birthday',tel='$tel',email='$email',othercon='$othercon',remark='$remark' where user_name='".$row_a['agents_name']."'";
$query_u=$mysqli->query($sql);
if($query_a && $query_u){
	echo "<script>alert('修改资料成功');window.location.href='agent_detail.php?id=".$id."'</script>";
	exit;
}
else{
	$sql="update agents_list set bank='".$row_a['bank']."',agents_add='".$row_a['agents_add']."',birthday='".$row_a['birthday']."',tel='".$row_a['tel']."',email='".$row_a['email']."',othercon='".$row_a['othercon']."',remark='".$row_a['remark']."' where id='$id'";
	$query_a=$mysqli->query($sql);
	$sql="update user_list set pay_num='".$row_u['pay_num']."',pay_bank='".$row_u['pay_bank']."',birthday='".$row_u['birthday']."',tel='".$row_u['tel']."',email='".$row_u['email']."',othercon='".$row_u['othercon']."',remark='".$row_u['remark']."' where user_name='".$row_a['agents_name']."'";
	$query_u=$mysqli->query($sql);
	echo "<script>alert('修改资料失败');history.go(-1);</script>";
	exit;
}
?>