<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/include/newpage.php");

$page	=	$_GET["page"];
$go		=	$_GET["go"];
$arr	=	$_POST['uid'];
$uid	=	'';
$i		=	0; //会员个数
foreach($arr as $k=>$v){
	$uid .= $v.',';
	$i++;
}
$uid	=	rtrim($uid,',');

if($go == 1){ //停用
	$sql = "UPDATE agents_list set status='停用',remark=concat_ws('，',remark,'管理员：".$_SESSION['login_name']." 停用此账户') where id in ($uid) and status='正常'";
}else if($go == 0){ //启用
	$sql = "UPDATE agents_list set status='正常' where id in ($uid) and (status='停用' or status='异常')";
}
else if($go ==4){
	$s_time=date('Y-m-01',strtotime('-1 day'));
	$e_time=date('Y-m-d',strtotime('-1 day'));
	$sql = "select agents_id,s_time,e_time from agents_money_log where agents_id in ($uid) order by e_time desc";
	$query	=	$mysqli->query($sql);
	$list = array();
	while ($rows = $query->fetch_array()) {
		$list[] = $rows;
	}
	foreach($list as $key => $value){
		if($value["s_time"]<=$s_time && $s_time<=$value["e_time"]){
			echo "<script>alert('代理ID".$value["agents_id"]."的开始时间已经有结算过，请单独结算。');history.go(-1);</script>";
			exit;
		}
		if($value["s_time"]<=$e_time && $e_time<=$value["e_time"]){
			echo "<script>alert('代理ID".$value["agents_id"]."的结束时间已经有结算过，请单独结算。');history.go(-1);</script>";
			exit;
		}
	}
	foreach($arr as $k1=>$v1){
		$sql="select * from agents_list where id='".$v1."'";
		$query	=	$mysqli->query($sql);
		$rows = $query->fetch_array();
		$sql_lottery	=	"SELECT SUM(IF(sub.bet_money>0,IF(sub.is_win!=2,sub.bet_money,0),0)) bet_money_total,SUM(IF(sub.is_win=1,sub.win+sub.fs,IF(is_win=0,fs,0))) win_total,u.top_id FROM agents_list a,user_list u,order_lottery o ,order_lottery_sub sub WHERE a.id='".$v1."' AND a.id=u.top_id AND u.top_id!=0 AND o.status!='0' AND o.status!='3' AND u.user_id=o.user_id AND o.order_num=sub.order_num and o.bet_time>='".$s_time." 00:00:00' and o.bet_time<='".$e_time." 23:59:59' GROUP BY u.top_id ORDER BY a.regtime DESC ";
		$query_lottery	=	$mysqli->query($sql_lottery);
		$rows_lottery = $query_lottery->fetch_array();

		$sql_six	=	"SELECT SUM(IF(sub.bet_money>0,IF(sub.is_win!=2,sub.bet_money,0),0)) bet_money_total,SUM(IF(sub.is_win=1,sub.win+sub.fs,IF(is_win=0,fs,0))) win_total,u.top_id
							FROM agents_list a,user_list u,six_lottery_order o ,six_lottery_order_sub sub
							WHERE a.id='".$v1."' AND a.id=u.top_id AND u.top_id!=0 AND o.status!='0' AND o.status!='3' AND u.user_id=o.user_id AND o.order_num=sub.order_num and o.bet_time>='".$s_time." 00:00:00' and o.bet_time<='".$e_time." 23:59:59' GROUP BY u.top_id ORDER BY a.regtime DESC ";
		$query_six	=	$mysqli->query($sql_six);
		$rows_six = $query_six->fetch_array();

		$sql_ds	=	"SELECT SUM(IF(k.bet_money>0,k.bet_money,0)) bet_money_total,SUM(IF(k.win>0,k.win,0)+IF(k.fs>0,k.fs,0)) win_total,u.top_id
							FROM agents_list a,user_list u,k_bet k
							WHERE a.id='".$v1."' AND a.id=u.top_id AND u.top_id!=0 AND k.status!=0 AND k.status!=3 AND k.check!=0 AND u.user_id=k.user_id and k.bet_time>='".$s_time." 00:00:00' and k.bet_time<='".$e_time." 23:59:59' GROUP BY u.top_id ORDER BY a.regtime DESC ";
		$query_ds	=	$mysqli->query($sql_ds);
		$rows_ds = $query_ds->fetch_array();

		$sql_cg	=	"SELECT SUM(IF(k.bet_money>0,k.bet_money,0)) bet_money_total,SUM(IF(k.win>0,k.win,0)+IF(k.fs>0,k.fs,0)) win_total,u.top_id
							FROM agents_list a,user_list u,k_bet_cg_group k
							WHERE a.id='".$v1."' AND a.id=u.top_id AND u.top_id!=0 AND k.status!=0 AND k.status!=3 AND k.check=1 AND u.user_id=k.user_id and k.bet_time>='".$s_time." 00:00:00' and k.bet_time<='".$e_time." 23:59:59' GROUP BY u.top_id ORDER BY a.regtime DESC ";
		$query_cg	=	$mysqli->query($sql_cg);
		$rows_cg = $query_cg->fetch_array();

		$sql_live	=	"SELECT SUM(IF(lo.bet_money>0,lo.bet_money,0)) bet_money_total,SUM(IF(lo.live_win is not null,lo.live_win,0)) win_total,u.top_id
							FROM agents_list a,user_list u,live_user l,live_order lo
							WHERE a.id='".$v1."' AND a.id=u.top_id AND u.top_id!=0 AND l.user_id=u.user_id AND l.live_username=lo.live_username and lo.order_time>='".$s_time." 00:00:00' and lo.order_time<='".$e_time." 23:59:59' GROUP BY u.top_id ORDER BY a.regtime DESC ";
		$query_live	=	$mysqli->query($sql_live);
		$rows_live = $query_live->fetch_array();

		$lottery_bet_money = 0;
		$lottery_win = 0;
		if($rows_lottery){
			$lottery_bet_money += $rows_lottery["bet_money_total"];
			$lottery_win += ($rows_lottery["bet_money_total"] - $rows_lottery["win_total"]);
		}
		if($rows_six){
			$lottery_bet_money += $rows_six["bet_money_total"];
			$lottery_win += ($rows_six["bet_money_total"] - $rows_six["win_total"]);
		}
		if($rows_ds){
			$lottery_bet_money += $rows_ds["bet_money_total"];
			$lottery_win += ($rows_ds["bet_money_total"] - $rows_ds["win_total"]);
		}
		if($rows_cg){
			$lottery_bet_money += $rows_cg["bet_money_total"];
			$lottery_win += ($rows_cg["bet_money_total"] - $rows_cg["win_total"]);
		}
		if($rows_live){
			$lottery_bet_money += $rows_live["bet_money_total"];
			$lottery_win += (0 - $rows_live["win_total"]);
		}
		$money=0;
		$ratio=0;
		if($rows['agents_type']=='赢利分成'){
			if($lottery_win>0){
				if($lottery_win>=$rows['total_1_1'] && $lottery_win<=$rows['total_1_2']){
					$ratio=$rows['total_1_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_win>=$rows['total_2_1'] && $lottery_win<=$rows['total_2_2']){
					$ratio=$rows['total_2_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_win>=$rows['total_3_1'] && $lottery_win<=$rows['total_3_2']){
					$ratio=$rows['total_3_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_win>=$rows['total_4_1'] && $lottery_win<=$rows['total_4_2']){
					$ratio=$rows['total_4_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_win>=$rows['total_5_1'] && $lottery_win<=$rows['total_5_2']){
					$ratio=$rows['total_5_scale'];
					$money=$lottery_win*$ratio/100;
				}
			}
		}
		else{
			if($lottery_bet_money>0){
				if($lottery_bet_money>=$rows['total_1_1'] && $lottery_bet_money<=$rows['total_1_2']){
					$ratio=$rows['total_1_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_bet_money>=$rows['total_2_1'] && $lottery_bet_money<=$rows['total_2_2']){
					$ratio=$rows['total_2_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_bet_money>=$rows['total_3_1'] && $lottery_bet_money<=$rows['total_3_2']){
					$ratio=$rows['total_3_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_bet_money>=$rows['total_4_1'] && $lottery_bet_money<=$rows['total_4_2']){
					$ratio=$rows['total_4_scale'];
					$money=$lottery_win*$ratio/100;
				}
				else if($lottery_bet_money>=$rows['total_5_1'] && $lottery_bet_money<=$rows['total_5_2']){
					$ratio=$rows['total_5_scale'];
					$money=$lottery_win*$ratio/100;
				}
			}
		}
		$sql = "insert into agents_money_log(agents_id,money,s_time,e_time,do_time,ledger,profig,ratio)
					values('".$v1."','$money','$s_time','$e_time',NOW(),'0','0','$ratio')";
		$query=$mysqli->query($sql);
		if(!$query){
			echo "<script>alert('一键结算失败！！！');history.go(-1);</script>";
			exit;
		}
	}
}
$msg	=	'操作成功！';
message($msg,'list.php?page='.$page);
?>