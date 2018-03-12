<?php
header("Content-Type: text/html;charset=utf-8");
require_once("conn.php");

$orderid = $_GET["orderid"];
$opstate = $_GET["opstate"];
$ovalue = $_GET["ovalue"];
$sign = $_GET["sign"];
$attach=$_GET["attach"];
$signu = md5("orderid=".$orderid."&opstate=".$opstate."&ovalue=".$ovalue.$userkey);



     if($signu == $sign)
    {
	     if($opstate=='0' && $parter =='11269') {
echo 'opstate=0';

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

$amount=$ovalue;
$billno=$orderid;
$sql="select user_id,user_name,money from user_list where user_name='$attach' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'安云','返回信息错误')";
                $mysqli->query($sql);
				exit;
			}
			$assets	 =	$rows['money'];
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];

            $order_array = explode("_",$billno);
            if(strtolower($order_array[0])==strtolower($username) || strtolower($order_array[1])==strtolower($username)){

            }else{
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'安云','类型不对26-$username-$billno')";
                $mysqli->query($sql);
                exit;
            }

				$sql="select count(*) as s from money where order_num = '".$billno."'";
				$query	=	$mysqli->query($sql);
				$cou	 =	$query->fetch_array();
				if ($cou['s']==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$amount,'$billno','确认',$assets,$assets)";
					$mysqli->query($sql);
					$m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线充值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
					$mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'安云','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$amount;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$billno','".""."',now(),'在线充值操作成功','$amount','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线充值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'安云','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
					$mysqli->query("update pay_set set money_Already=money_Already+".$amount." where id='".$rows_pay["id"]."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
				}	
							
				
	   }
   }






?>
