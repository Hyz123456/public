<?php

if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>资金管理</TITLE>
<link href="images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}

td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
.t-title{height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">资金管理：可以将代理帐户中的资金转移到本身的会员帐户中或者直接提现</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
    $sql	=	"select * from agents_list where id=".intval($_SESSION['agent_id'])." limit 0,1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
	$sql_u=	"select id,money from user_list where user_name='".$rows["agents_name"]."' limit 0,1";
    $query_u=	$mysqli->query($sql_u);
	if($query_u)
		$row_u=	$query_u->fetch_array();
	if($_GET['submit1']){
		if($_GET['m']){
			if(!$query_u){
				echo "<script>alert('您还没有开通会员！！！');history.go(-1);</script>";
				exit;
			}
			if(preg_match("/^([1-9]\d*|0)(\.\d{1,2})?$/",$_GET['m'])){
				if($_GET['m']>$rows['money']){
					echo "<script>alert('代理钱包金额不足！！！');history.go(-1);</script>";
					exit;
				}
				else{
					$a=$rows['money']-$_GET['m'];
					$b=$row_u['money']+$_GET['m'];
					$sql="update agents_list set money='".$a."' where id='".$_GET['id']."'";
					$querya=	$mysqli->query($sql);
					$sql="update user_list set money='".$b."' where user_name='".$rows["agents_name"]."'";
					$queryb=	$mysqli->query($sql);
					if($querya && $queryb){
						echo "<script>alert('转账成功！！！');</script>";
						header("location:zjgl.php?id=".$_GET['id']);
					}
				}
			} 
			else{
				echo "<script>alert('转账金额不对，必须是大于0的数，并且最多只能有两位小数！！！');history.go(-1);</script>";
				exit;
			}
		}
		else{
			echo "<script>alert('请输入转账金额，必须是大于0的数，并且最多只能有两位小数！！！');history.go(-1);</script>";
			exit;
		}
	}
	if($_POST['submit2']){
		if(!$rows["agents_add"] || !$rows["bank"]){
			echo "<script>alert('您还未绑定银行卡！！！');</script>";
			header("location:agents_user/agent_detail.php?id=".$_POST['id']);
			exit;
		}
		/*if(md5($_POST['qkpwd'])!=$rows['qk_pass']){
			echo "<script>alert('取款密码不对！！！');history.go(-1);</script>";
			exit;
		}*/
		if($_POST['m1']){
			$pay_value=$_POST['m1'];
			if(preg_match("/^([1-9]\d*|0)(\.\d{1,2})?$/",$pay_value)){
				if($pay_value>$rows['money']){
					echo "<script>alert('代理钱包金额不足！！！');history.go(-1);</script>";
					exit;
				}
				else{
					$sql		=	"update agents_list set money=money-$pay_value where id='".$_POST['id']."'";
					$mysqli->query($sql);
					$q1			=	$mysqli->affected_rows;
					if($q1 != 1){
						echo "<script>alert('由于网络堵塞，本次申请提款失败。请您稍候再试，或联系在线客服。');history.go(-1);</script>";
						exit;
					}
					
					$pay_value	=	0-$pay_value; //把金额置成带符号数字
					$order		=	date("YmdHis")."_".$rows['agents_name'];
					$balance=$rows["money"]+$pay_value;
					$sql		=	"insert into money(user_id,order_value,status,order_num,pay_card,pay_num,pay_name,assets,balance,type,update_time) values('".$_POST['id']."','$pay_value','未结算','$order','".$rows["agents_add"]."','".$rows["bank"]."','".$rows["agentsname"]."','".$rows["money"]."','".$balance."','代理提款','".date('Y-m-d H:i:s')."')";
					$mysqli->query($sql);
					$q2		=	$mysqli->affected_rows;
					$money_id		=	$mysqli->insert_id;
					if($q2 != 1){
						$sql		=	"update agents_list set money=money-$pay_value where id='".$_POST['id']."'";//操作失败，加钱
						$mysqli->query($sql);
						echo "<script>alert('由于网络堵塞，本次申请提款失败。请您稍候再试，或联系在线客服。');history.go(-1);</script>";
						exit;
					}

					$about = $rows["agents_add"].",".$rows["bank"].",".$rows["agentsname"];
					$assets = $rows["money"];
					$sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('".$_POST['id']."','$order','$about',now(),'代理提款','$pay_value','$assets','".$balance."');";
					$mysqli->query($sql);
					$q3		=	$mysqli->affected_rows;
					if($q3 != 1){
						$sql		=	"update agents_list set money=money-$pay_value where id='".$_POST['id']."'";//操作失败，加钱
						$mysqli->query($sql);
						$sql		=	"delete from money where id='$money_id'";
						$mysqli->query($sql);
						echo "<script>alert('由于网络堵塞，本次申请提款失败。请您稍候再试，或联系在线客服。');history.go(-1);</script>";
						exit;
					}
					
					if($q1==1 && $q2==1 && $q3==1){
						$mysqli->commit(); //事务提交
						echo "<script>alert('提现申请成功,等待后台处理！！！');window.location.href='zjgl.php?id=".$_POST['id']."';</script>";
						exit;
					}else{
						$mysqli->rollback(); //数据回滚
						echo "<script>alert('由于网络堵塞，本次申请提款失败。请您稍候再试，或联系在线客服。');history.go(-1);</script>";
						exit;
					}
				}
			} 
			else{
				echo "<script>alert('提现金额不对，必须是大于0的数，并且最多只能有两位小数！！！');history.go(-1);</script>";
				exit;
			}
		}
		else{
			echo "<script>alert('请输入提现金额，必须是大于0的数，并且最多只能有两位小数！！！');history.go(-1);</script>";
			exit;
		}
	}
?>
<form action="" method="get" name="form1" id="form1">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#CCC" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;margin-bottom:38px;">
  <tr>
    <td bgcolor="#FFFFFF" colspan="2">代理钱包给会员钱包转账</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">代理帐号</td>
    <td><?=$rows["agents_name"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">代理钱包</td>
    <td><?=$rows["money"]?></td>
  </tr><tr>
    <td bgcolor="#FFFFFF">会员帐号</td>
    <td><?=$row_u['id']?$rows["agents_name"]:'未开通'?></td>
  </tr><tr>
    <td bgcolor="#FFFFFF">会员钱包</td>
    <td><?=$row_u['id']?$row_u['money']:'未开通'?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">转账金额</td>
    <td><input name="m"  value=""></td>
  </tr>
  <tr>
  	<td colspan="2" align="center">
        <input name="id" type="hidden" value="<?=$_SESSION['agent_id']?>">
        <input type="submit" value="确认转账" name="submit1"> 　
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)">
    </td>
  </tr>
</table>
</form></td>
  </tr>
</table>
<form method="post" action="">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#CCC" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;margin-top:38px;">
  <tr>
    <td bgcolor="#FFFFFF" colspan="2">代理钱包资金提现</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">代理帐号</td>
    <td><?=$rows["agents_name"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">代理钱包</td>
    <td><?=$rows["money"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">真实姓名</td>
    <td><?=$rows["agentsname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">开户行</td>
    <td><?=$rows["agents_add"]?$rows["agents_add"]:'未绑定'?></td>
  </tr><tr>
    <td bgcolor="#FFFFFF">银行卡号</td>
    <td><?=$rows['bank']?$rows["bank"]:'未绑定'?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">取款密码</td>
    <td><input name="qkpwd"  value=""></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">提现金额</td>
    <td><input name="m1"  value=""></td>
  </tr>
  <tr>
  	<td colspan="2" align="center">
        <input name="id" type="hidden" value="<?=$_SESSION['agent_id']?>">
        <input type="submit" value="确认提现" name="submit2"> 　
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)">
    </td>
  </tr>
</table>
</form>
</body>
</html>
<?php
	$mysqli->close();
?>