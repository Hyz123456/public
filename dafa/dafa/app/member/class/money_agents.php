<?php
class money_agents{
	static function chongzhi($uid,$order,$money,$assets,$status=2,$about=''){
		global $mysqli;
        $sql_money  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order','$about',now(),'后台充值','$money','$assets',$assets+$money);";
        $result = $mysqli->query($sql_money);
		$sql_user	=	"update agents_list set money=money+$money where id='$uid'";
        $result2 = $mysqli->query($sql_user);
        return true;
	}
		  
	static function tixian($uid,$money,$assets,$pay_card,$pay_num,$pay_address,$pay_name,$order=0,$status=2,$about=''){
		global $mysqli;
    	$sql_user	=	"update agents_list set money=money-$money where id='$uid'";
        $result2 = $mysqli->query($sql_user);
    	$money		=	0-$money; //把金额置成带符号数字
    	if($order	==	'0'){
			$order	=	date("YmdHis")."_".$_SESSION['username'];
		}
        $sql_money  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order','$about',now(),'后台提现','$money','$assets',$assets+$money);";
        $result = $mysqli->query($sql_money);
        return true;
    }
}
?>