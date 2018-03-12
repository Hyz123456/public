<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
include ("auto_class5.php");
$fs=0; //新增返水 1%
//获取开奖号码
$sql		= "select * from c_auto_5 where ok=0";
$query		= $mysqli->query($sql);
while($rs   = $query->fetch_array()){
$qi 		= $rs['qishu'];
$hm 		= array();
$hm[]		= $rs['ball_1'];
$hm[]		= $rs['ball_2'];
$hm[]		= $rs['ball_3'];
$hm[]		= $rs['ball_4'];
//根据期数读取未结算的注单
$sql1		= "select * from c_bet where type='PC蛋蛋' and js=0 and qishu=".$qi." order by addtime asc";
$query1		= $mysqli->query($sql1);
$sum		= $mysqli->affected_rows;
while($rows = $query1->fetch_array()){
	if($rows['mingxi_1']=='总和'){
		if($rows['mingxi_2']==$rs['ball_4']){
			$msql="update c_bet set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet set win=-money*(1-$fs),js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			$q1 = $mysqli->affected_rows;
			//返水钱
			if($q1==1){
				$msql="update k_user set money=money+".$rows['money']*$fs." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第二球
	if($rows['mingxi_1']=='双面'){
		$win=0;
		if(($rows['mingxi_2']=='大' || $rows['mingxi_2']=='小') && Ssc_Auto($hm,2)==$rows['mingxi_2']){$win=1;}
		if(($rows['mingxi_2']=='单' || $rows['mingxi_2']=='双') && Ssc_Auto($hm,3)==$rows['mingxi_2']){$win=1;}
		if(($rows['mingxi_2']=='大双' || $rows['mingxi_2']=='大单' || $rows['mingxi_2']=='小双' || $rows['mingxi_2']=='小单') && Ssc_Auto($hm,4)==$rows['mingxi_2']){$win=1;}
		if(($rows['mingxi_2']=='极大' || $rows['mingxi_2']=='极小') && Ssc_Auto($hm,5)==$rows['mingxi_2']){$win=1;}
		
		if(($rows['mingxi_2']=='小' || $rows['mingxi_2']=='单') && ($rs['ball_4']==13)){
			$win=2;
		}			
		if(($rows['mingxi_2']=='大' || $rows['mingxi_2']=='双') && ($rs['ball_4']==14)){
			$win=2;
		}
		if(($rows['mingxi_2']=='大双') && ($rs['ball_4']==14)){
			$win=2;
		}
		if(($rows['mingxi_2']=='小单') && ($rs['ball_4']==13)){
			$win=2;
		}
		if($win==1){
			$msql="update c_bet set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}elseif($win==2){//返还本金
			$msql="update c_bet set win=money,js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet set win=-money*(1-$fs),js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			$q1 = $mysqli->affected_rows;
			//返水钱
			if($q1==1){
				$msql="update k_user set money=money+".$rows['money']*$fs." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第三球
	if($rows['mingxi_1']=='波色'){
		if(Ssc_Auto($hm,6)==$rows['mingxi_2']){
			$msql="update c_bet set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet set win=-money*(1-$fs),js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			$q1 = $mysqli->affected_rows;
			//返水钱
			if($q1==1){
				$msql="update k_user set money=money+".$rows['money']*$fs." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第四球
	if($rows['mingxi_1']=='豹子'){
		if(Ssc_Auto($hm,7)==$rows['mingxi_2']){
			$msql="update c_bet set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet set win=-money*(1-$fs),js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			$q1 = $mysqli->affected_rows;
			//返水钱
			if($q1==1){
				$msql="update k_user set money=money+".$rows['money']*$fs." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
        //填写开奖结果到注单
    $msql="update c_bet set jieguo='".$rs['ball_4']."' where id=".$rows['id']."";
    $mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
}
$msql="update c_auto_5 set ok=1 where qishu=".$qi."";
$mysqli->query($msql) or die ("期数修改失败!!!");
if ($_GET['t']==1)    {
echo "<script>window.location.href='../../Lottery/auto_5.php';</script>";
}
}
?>