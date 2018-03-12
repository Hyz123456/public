<?php  
//include_once("/app/member/class/live_info.php");die;


  //include_once("/app/member/class/config.inc.php");
            $oneDayStart = $_POST['oneDay'].' 00:00:00';
		    $oneDayEnd = $_POST['twoDay'].' 23:59:59';
			$userId=$_POST['userid'];
			$type=$_POST['type'];
			if($type=="AG"){$type="ag_username";}
			else if($type=="MG"){$type="mg_username";}
			else if($type=="AB"){$type="ab_username";}
			else if($type=="BBIN"){$type="bb_username";}
			else if($type=="PT"){$type="pt_username";}
			else if($type=="bhdz"){$type="dx_username";}
			else{$type="na_username";}
			//$user_live_list=live_info::getUserAGRecord($userId,$oneDayStart,$oneDayEnd);die;
			$mysqli =   new MySQLi("127.0.0.1","root","root123654","aobet");
$mysqli->query("set names utf8");
			$sql = "select a.billNo,a.gameType,a.betAmount,a.betTime,a.netAmount,a.playType,a.agentCode  from agbetdetail a,user_list b where b.user_id='$userId' and b.".$type."=a.playerName and a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."' order by a.betTime desc";
			$query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				
			}$i=0;
			if($result){
				$data=array();
					$data['t']=$sql;
					foreach($result as $k1=>$v1){
						
						if($type=="dx_username"){unset($v1[4]);$v1[4]=$v1[6];
						}
						$data['inf'].=
						'<tr><td style="text-align:center;">'.$v1[0].'</td>
							      <td style="text-align:center;" id="game'.$i.'">'.$v1[1].'</td>
							       <td style="text-align:center;">'.$v1[2].'</td>
								   <td style="text-align:center;">'.$v1[3].'</td>
								   <td style="text-align:center;">'.$v1[4].'</td></tr>';

								   $bet+=$v1[2];
						$not+=$v1[4];$i++;
					}
					
					$data['inf'].=
						'<tr><td style="text-align:center;"></td>
							      <td style="text-align:center;" id="bet"></td>
							       <td style="text-align:center;">'.$bet.'</td>
								   <td style="text-align:center;" id="not"></td>
								   <td style="text-align:center;">'.$not.'</td></tr>';
					
				}
				else{
					$data['inf']='<td colspan="5" style="text-align:center;" id="nodata"></td>';
				}

echo json_encode($data);
?>