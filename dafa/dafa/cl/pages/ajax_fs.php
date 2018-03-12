<?php  
	$oneDayStart = $_POST['oneDay'].' 00:00:00';
	$oneDayEnd = $_POST['twoDay'].' 23:59:59';
	$userId=$_POST['userid'];
	$lb=$_POST['lb'];
	$type1=$_POST['type1'];
	$type2=$_POST['type2'];
	$data=array();
	$mysqli =   new MySQLi("127.0.0.1","root","root123654","aobet");
	$mysqli->query("set names utf8");
	$sql="select * from money_log where user_id='".$userId."' and update_time>='".$oneDayStart."' and update_time<='".$oneDayEnd."' and ";
	if($lb=='所有类型')
		$sql.=" (type='".$type1."' or about like '%".$type2."%') ";
	else if($lb=='真人')
		$sql.="  about like '%".$type2."%' ";
	else if($lb=='彩票')
		$sql.="  type='".$type1."' ";
	$sql.=" order by id desc";
	$query	=	$mysqli->query($sql);
	$ro=array();
	while($row=$query->fetch_array()){
		$ro[]=$row;
	}
	if($ro){
		foreach($ro as $k1=>$v1){
			$data['inf'].=
						'<tr><td style="text-align:center;">'.$v1['order_num'].'</td>
							      <td style="text-align:center;">'.$v1['about'].'</td>
								  <td style="text-align:center;">'.$v1['type'].'</td>
							       <td style="text-align:center;">'.$v1['order_value'].'</td>
								   <td style="text-align:center;">'.$v1['update_time'].'</td></tr>';
		}
	}
	else{
		$data['inf']='<td colspan="5" style="text-align:center;" id="nodata"></td>';
	}
	echo json_encode($data);
?>