<?php  
	$oneDayStart = $_POST['oneDay'].' 00:00:00';
	$oneDayEnd = $_POST['twoDay'].' 23:59:59';
	$userId=$_POST['userid'];
	$type1=$_POST['type1'];
	$data=array();
	$mysqli =   new MySQLi("127.0.0.1","root","root123654","aobet");
	$mysqli->query("set names utf8");
	$sql="select * from money_log where  type='".$type1."' and user_id='".$_SESSION["userid"]."' and update_time>='".$oneDayStart."' and update_time<='".$oneDayEnd."' order by id desc";
	$query	=	$mysqli->query($sql);
	$ro=array();
	while($row=$query->fetch_array()){
		$ro[]=$row;
	}
	if($ro){
		foreach($ro as $k1=>$v1){
			if($v1['order_value']<0)
				$v1['order_value']=0-$v1['order_value'];
			$data['inf'].=
						'<tr><td style="text-align:center;">'.$v1['order_num'].'</td>
							      <td style="text-align:center;">'.$v1['about'].'</td>
							       <td style="text-align:center;">'.$v1['order_value'].'</td>
								   <td style="text-align:center;">'.$v1['update_time'].'</td></tr>';
		}
	}
	else{
		$data['inf']='<td colspan="4" style="text-align:center;" id="nodata"></td>';
	}
	echo json_encode($data);
?>