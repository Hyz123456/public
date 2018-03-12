<?php  
	$data=array();
	$oneDayStart = $_POST['oneDay'].' 00:00:00';
	$oneDayEnd= $_POST['twoDay'].' 23:59:59';
	$userId=$_POST['userid'];
	$mysqli =   new MySQLi("127.0.0.1","root","root123654","aobet");
	$mysqli->query("set names utf8");
	$sql="select sum(a.betAmount) as money,u.user_name from agbetdetail a,user_list u where u.user_id='".$userId."' and a.playerName in(u.ag_username,u.bb_username,u.mg_username,u.ab_username,u.pt_username,u.na_username) and a.betTime>='".$oneDayStart."' and a.betTime<='".$oneDayEnd."' ";
	$query=$mysqli->query($sql);
	$row_a=$query->fetch_array();
	$sql="select sum(a.betAmount) as money from agbetdetail a,user_list u where u.user_id='".$userId."' and a.playerName=u.dx_username and a.betTime>='".$oneDayStart."' and a.betTime<='".$oneDayEnd."' ";
	$query=$mysqli->query($sql);
	$row_d=$query->fetch_array();
	$sql="select sum(bet_money) as money from k_bet where user_id='".$userId."' and bet_time>='".$oneDayStart."' and bet_time<='".$oneDayEnd."' ";
	$query=$mysqli->query($sql);
	$row_k=$query->fetch_array();
	$sql="select sum(bet_money) as money from k_bet_cg_group where user_id='".$userId."' and bet_time>='".$oneDayStart."' and bet_time<='".$oneDayEnd."' ";
	$query=$mysqli->query($sql);
	$row_c=$query->fetch_array();
	$sql="select sum(bet_money) as money from order_lottery where user_id='".$userId."' and bet_time>='".$oneDayStart."' and bet_time<='".$oneDayEnd."' ";
	$query=$mysqli->query($sql);
	$row_l=$query->fetch_array();
	$sql="select sum(bet_money_total) as money from six_lottery_order where user_id='".$userId."' and bet_time>='".$oneDayStart."' and bet_time<='".$oneDayEnd."' ";
	$query=$mysqli->query($sql);
	$row_s=$query->fetch_array();
	$a=$row_a['money']+$row_k['money']+$row_c['money']+$row_l['money']+$row_s['money']+0-$row_d['money']+$row_p['money'];
	$b=$row_a['money']+0;
	$c=$row_k['money']+$row_c['money']+0;
	$d=$row_l['money']+0;
	$e=$row_s['money']+0;
	$f=$row_d['money']+0;
	$data['inf'].=
				'<tr><td style="text-align:center;">'.$row_a['user_name'].'</td>
						  <td style="text-align:center;">'.$a.'</td>
					<td style="text-align:center;">'.$b.'</td>
					<td style="text-align:center;">'.$c.'</td>
					<td style="text-align:center;">'.$d.'</td>
					<td style="text-align:center;">'.$e.'</td>
					<td style="text-align:center;">'.$f.'</td></tr>';
	echo json_encode($data);
?>