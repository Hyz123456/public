<?php 
header("Content-type: text/html; charset=utf-8");
if(!isset($_SESSION)){ session_start();}
$uid = intval(@$_SESSION['uid']);
$username = @$_SESSION["username"];
if(!$username){
	echo "请登录后再试！";exit;
}

include_once("config.php");
$sign = md5($plantform."_".$merID."_".$key."_".$username);

//include_once("../include/config.php");
//include_once("../common/login_check.php");
//include_once("../include/mysqli.php");
include "../app/member/include/config.inc.php";
//include_once("../include/mysqlit.php");
//include_once("../class/user.php");
//include_once("../common/logintu.php");
//include_once("../common/function.php");

//$loginid=	@$_SESSION['user_login_id'];
//renovate($uid,$loginid); //验证是否登陆
$yy = $_REQUEST['zz_money'];
if(ceil($yy)==$yy && $yy > 0){
	$mysqli->autocommit(FALSE);

	$sqlc = "select * from user_list where user_name='$username'";
	$result = $mysqli->query($sqlc);
	$row=$result->fetch_array();
	$conver=intval($yy);
	$old_money = "".$row["money"];
	if($_REQUEST["zz_type"]=="11" || $_REQUEST["zz_type"]=="12" || $_REQUEST["zz_type"]=="13"){
		if($conver>$row["money"]){
			echo "金额错误，请重新输入。";exit;
		}
		$target = "bb";
		if($_REQUEST["zz_type"]=="12"){
			$target = "ag";
		}else if($_REQUEST["zz_type"]=="13"){
			$target = "mg";
		}
		try{
				$mysqli->query("BEGIN"); //事务开始
				$sql		=	"update user_list set money=money-".abs($yy)." where `user_name`='$username'";
				$mysqli->query($sql);//or die($sql);
				$q1			=	$mysqli->affected_rows;
				//$trtype = 7;//7 T0转至体育时时彩
				$trtype = $_REQUEST["zz_type"];
				$status=1;//T0直接转换到体育时时
				$about = "转入".$target;
				$billNO = $merID.time();
				$order		=	date("YmdHis")."_".$_SESSION['username'];
				$sql		=	"insert into money_log(`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) values('".$row["user_id"]."','$billNO','$about','".date("Y-m-d H:i:s")."','真人转入','".abs($yy)."','".$row["money"]."',".($row["money"]-abs($yy)).")";
				//echo $sql;
				$mysqli->query($sql);// or die($sql);
				$q2		=	$mysqli->affected_rows;
				$result = $mysqli->query($sqlc);
				$new=$result->fetch_array();
				$new_money = "".$new['money'];
				$sql		=	"insert into zz_info(uid,username,old_money,amount,new_money,type,info,actionTime,result,billNO) values(".$row["user_id"].",'$username',$old_money,$yy,$new_money,".$_REQUEST["zz_type"].",'转入{$target}', ".time().",'已经提交','$billNO')";
				//echo $sql;
				$mysqli->query($sql);// or die($sql);
				$q3		=	$mysqli->affected_rows;
				$url1 = $fenjieHost."/".$target."!edUp.do?&plantform=".$plantform."&username=".$username."&password=".$password."&ed=".$yy."&sign=".$sign."&billNO=".$billNO."&callback=".$callback;
				$result = curl_file_get_contents($url1);
				if(strstr($result, "success")){
					$sqlx = "update zz_info set result='转账成功',status=1 where billNO='".$billNO."'";
					$mysqli->query($sqlx);// or die($sql);
					$q4=$mysqli->affected_rows;
				}else{
					echo "转账已经提交，如果3分钟内未到账，请联系客服处理！";
				}
				if($q1==1 && $q2==1 && $q3==1 && $q4==1){
					$mysqli->commit(); //事务提交
					echo"转换成功！";
				}else{
					$mysqli->rollback(); //数据回滚
					echo "由于网络堵塞，本次额度转换失败2。\\n请您稍候再试，或联系在线客服。".$q1.$q2.$q3;
				}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			echo "由于网络堵塞，本次额度转换失败。\\n请您稍候再试，或联系在线客服。";
		}
		//echo "<script>location.href='zr_money.php';</script>";
		exit;
	}else if($_REQUEST["zz_type"]=="21" || $_REQUEST["zz_type"]=="22" || $_REQUEST["zz_type"]=="23"){
		$target = "bb";
		if($_REQUEST["zz_type"]=="22"){
			$target = "ag";
		}else if($_REQUEST["zz_type"]=="23"){
			$target = "mg";
		}
		try{
			$mysqli->query("BEGIN"); //事务开始
			$trtype = $_REQUEST["zz_type"];
			$status=0;//T0直接转换到体育时时
			$about = $target."转出";
			$order		=	date("YmdHis")."_".$_SESSION['username'];
			$billNO = $merID.time();
			//$sql		=	"insert into k_money(uid,m_value,status,m_order,pay_card,pay_num,pay_address,pay_name,about,assets,balance,`type`) values($uid,$yy,$status,'$order','".$row["pay_card"]."','".$row["pay_num"]."','".$row["pay_address"]."','".$row["pay_name"]."','$about',".$row["money"].",".($row["money"]+$yy).",$trtype)";
			$sql		=	"insert into money_log(`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) values('".$row["user_id"]."','$billNO','$about','".date("Y-m-d H:i:s")."','真人转出','".abs($yy)."','".$row["money"]."',".($row["money"]+abs($yy)).")";
			$mysqli->query($sql);// or die($sql);
			$q2		=	$mysqli->affected_rows;
			$result = $mysqli->query($sqlc);
			$new=$result->fetch_array();
			$old_money = "".$new['money'];
			$new_money = $old_money + $yy;
			$sql		=	"insert into zz_info(uid,username,old_money,amount,new_money,type,info,actionTime,result,billNO) values(".$row["user_id"].",'$username',$old_money,$yy,$new_money,".$_REQUEST["zz_type"].", '{$target}转出', ".time().",'提交处理','$billNO')";
			$mysqli->query($sql);// or die($sql);
			$q3		=	$mysqli->affected_rows;
			$url2 = $fenjieHost."/".$target."!edDown.do?plantform=".$plantform."&username=".$username."&password=".$password."&ed=".$yy."&sign=".$sign."&billNO=".$billNO."&callback=".$callback;
			$result = curl_file_get_contents($url2);
			//echo $result;
			if(strstr($result, "success")){
				$sql		=	"update user_list set money=money+".abs($yy)." where `user_name`='$username'";
				$mysqli->query($sql);//or die($sql);
				$q1			=	$mysqli->affected_rows;
				$sqlx = "update zz_info set result='转账成功',status=1 where billNO='".$billNO."'";
				$mysqli->query($sqlx);// or die($sql);
				$q4=$mysqli->affected_rows;
			}else{
				echo "转账已经提交，如果3分钟内未到账，请联系客服处理！";
			}
			if($q1==1 && $q2==1 && $q3==1 && $q4==1){
				$mysqli->commit(); //事务提交
				echo "转换成功！";
			}else{
				$mysqli->rollback(); //数据回滚
				echo "由于网络堵塞，本次额度转换失败2。\\n请您稍候再试，或联系在线客服。".$q1.$q2.$q3.$q4;
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			echo "由于网络堵塞，本次额度转换失败。\\n请您稍候再试，或联系在线客服。";
		}
		//echo "<script>location.href='zr_money.php';</script>";
		exit;
	}else if($_REQUEST["zz_type"]=="112" || $_REQUEST["zz_type"]=="113"){
		/*
		彩票额度转换
		*/
		//error_reporting(E_ALL ^ E_ALL);
		include("../CashApi/apiclient/config.php");
include("../CashApi/apiclient/Apiyc.class.php");
		include("../CashApi/apiclient/Des.class.php");
        if($_REQUEST["zz_type"]=="112"){
			$ctype=0;
		}else{
			$ctype=1;
		}
		$mon=$yy;
		//$ctype=intval($_POST['changetype']);
		//$mon=intval($_POST['moneys']);
		$username=$_SESSION['username'];
		$user=  substr($username,0,11);

		$se=new Des();
		$key=$ks;
$Aps=new Apiyc();
		$key=$se->DES($key,0);
		$orders=rand(100000000,999999999);
		$pares=$se->encrypt("ActionType=plus|UserAccount=".$username."|Pwd=".$pswd."|VirtualMoney=".$mon."|OrderID=".$orders."|t=".$orders);
		$sign=strtoupper(md5($username.$pswd.$ks.$orders));
		$minus=$se->encrypt("ActionType=minus|UserAccount=".$username."|Pwd=".$pswd."|VirtualMoney=".$mon."|OrderID=".$orders."|t=".$orders);

		$sql="select * from $tableName_user where $tableList_user='$username'";
		$result=$mysqli->query($sql);
		$result=$result->fetch_array();
		// $dbtype='alter table k_user engine=innodb';
		// $e=$mysqli->query($dbtype);

		if($ctype==0)//判断转入转出  0为转入   转入先查询账户金额
		{

			if($result['money']>=$mon)//用户金额大于转账金额   先扣除账户金额
			{
				$ms=$result['money']-$mon;
				$dbtype='alter table k_user engine=innodb';
				$e=$mysqli->query($dbtype);
				$mysqli->autocommit(false);
				
				$sql="update $tableName_user set $tableList_money=$ms where $tableList_user='$user'";
				$rest=$mysqli->query($sql);
				
				$url=$api_url.$pares."&sign=".$sign."&aa=".$web_key;
				
				$res=$Aps->https_request($url);
				
				$res=json_decode($res,true);
			  
				if($res['success']==true && $rest!=false)
				{
				   $mysqli->autocommit(true);
				   $data['success']=true;
				   $data['msg']='兑换成功';
				   echo '兑换成功';;
				   die();

				}else{

				   $mysqli->rollback();//若子钱包金额加款失败,回滚用户数据
				   $data['success']=false;
				   $data['msg']=$res['msg'];
				   echo $data['msg']=$res['msg'];
				   die();
				}
			}else{//用户金额少于要转账的金额   返回false
			  $data['success']=false;
			  $data['msg']='余额不足';
			  echo '余额不足';
			  die();
			}

		}else if($ctype==1)//如果为子钱包提现  先扣除子钱包金额
		{
			
			$ms=$result['money']+$mon;
			$dbtype='alter table $tableName_user engine=innodb';
			$e=$mysqli->query($dbtype);
			$mysqli->autocommit(false);
			$sql="update $tableName_user set $tableList_money=$ms where $tableList_user='$user'";
			$rest=$mysqli->query($sql);
			$url=$api_url.$minus."&sign=".$sign."&aa=".$web_key;
			$res=$Aps->https_request($url);
			$res=  json_decode($res,TRUE);
			
				if($res['success']==true && $rest!=false)
				{
					$mysqli->autocommit(true);//如果子钱包扣款成功   账户加款  提交数据
					$data['success']=true;
					$data['msg']='彩票余额提现成功!';
					echo '彩票余额提现成功!';
				}else{
					$mysqli->rollback();//如果子钱包扣款失败   数据回滚
					$data['success']=false;
					$data['msg']=$res['msg'];
					echo $res['msg'];
					 }
		}
		
	}
	else{
		echo "参数错误，请重试。";exit;
	}
}else{
	echo "金额错误，请重新输入。";exit;
}

function message($value,$url=""){ //默认返回上一页
	header("Content-type: text/html; charset=utf-8");
	$js  ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>message</title>
</head>

<body>';
	$js  .= "<script type=\"text/javascript\" language=\"javascript\">\r\n";
	$js .= "alert(\"".$value."\");\r\n";
	if($url) $js .= "window.location.href=\"$url\";\r\n";
	else $js .= "window.history.go(-1);\r\n";
	$js .= "</script>\r\n";
$js.="</body></html>";
	echo $js;
	exit;
}
?>