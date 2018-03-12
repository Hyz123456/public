<?php
header('Content-Type:text/html; charset=utf-8');
include ("../mysqli.php");
include ("auto_class9.php");
//获取开奖号码
$sql		= "select * from c_auto_9 where ok=0";
$query		= $mysqli->query($sql);
while($rs   = $query->fetch_array()){
$qi 		= $rs['qishu'];
$hm 		= array();
$hm[]		= $rs['ball_1'];
$hm[]		= $rs['ball_2'];
$hm[]		= $rs['ball_3'];
$hm[]		= $rs['ball_4'];
$hm[]		= $rs['ball_5'];
//根据期数读取未结算的注单
$sql1		= "select * from c_bet_7 where type='山东11选5' and js=0 and qishu=".$qi." order by addtime asc";
$query1		= $mysqli->query($sql1);
$sum		= $mysqli->affected_rows;
while($rows = $query1->fetch_array()){
	//开始结算第一球
	if($rows['mingxi_1']=='第一球'){
		$ds = Ssc_Ds($rs['ball_1']);
		$dx = Ssc_Dx($rs['ball_1']);
		if($rows['mingxi_2']==$rs['ball_1'] || $rows['mingxi_2']==$ds || $rows['mingxi_2']==$dx){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			if($ds=='和' && ($rows['mingxi_2']=='大' || $rows['mingxi_2']=='小' || $rows['mingxi_2']=='单' || $rows['mingxi_2']=='双')){
				//注单未中奖，和
				$msql="update c_bet_7 set win=money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
				$q1 = $mysqli->affected_rows;
				if($q1==1){
					$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
					$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
				}
			}else{
				//注单未中奖，输
				$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第二球
	if($rows['mingxi_1']=='第二球'){
		$ds = Ssc_Ds($rs['ball_2']);
		$dx = Ssc_Dx($rs['ball_2']);
		if($rows['mingxi_2']==$rs['ball_2'] || $rows['mingxi_2']==$ds || $rows['mingxi_2']==$dx){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			if($ds=='和' && ($rows['mingxi_2']=='大' || $rows['mingxi_2']=='小' || $rows['mingxi_2']=='单' || $rows['mingxi_2']=='双')){
				//注单未中奖，和
				$msql="update c_bet_7 set win=money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
				$q1 = $mysqli->affected_rows;
				if($q1==1){
					$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
					$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
				}
			}else{
				//注单未中奖，输
				$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第三球
	if($rows['mingxi_1']=='第三球'){
		$ds = Ssc_Ds($rs['ball_3']);
		$dx = Ssc_Dx($rs['ball_3']);
		if($rows['mingxi_2']==$rs['ball_3'] || $rows['mingxi_2']==$ds || $rows['mingxi_2']==$dx){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			if($ds=='和' && ($rows['mingxi_2']=='大' || $rows['mingxi_2']=='小' || $rows['mingxi_2']=='单' || $rows['mingxi_2']=='双')){
				//注单未中奖，和
				$msql="update c_bet_7 set win=money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
				$q1 = $mysqli->affected_rows;
				if($q1==1){
					$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
					$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
				}
			}else{
				//注单未中奖，输
				$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第四球
	if($rows['mingxi_1']=='第四球'){
		$ds = Ssc_Ds($rs['ball_4']);
		$dx = Ssc_Dx($rs['ball_4']);
		if($rows['mingxi_2']==$rs['ball_4'] || $rows['mingxi_2']==$ds || $rows['mingxi_2']==$dx){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			if($ds=='和' && ($rows['mingxi_2']=='大' || $rows['mingxi_2']=='小' || $rows['mingxi_2']=='单' || $rows['mingxi_2']=='双')){
				//注单未中奖，和
				$msql="update c_bet_7 set win=money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
				$q1 = $mysqli->affected_rows;
				if($q1==1){
					$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
					$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
				}
			}else{
				//注单未中奖，输
				$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算第五球
	if($rows['mingxi_1']=='第五球'){
		$ds = Ssc_Ds($rs['ball_5']);
		$dx = Ssc_Dx($rs['ball_5']);
		if($rows['mingxi_2']==$rs['ball_5'] || $rows['mingxi_2']==$ds || $rows['mingxi_2']==$dx){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			if($ds=='和' && ($rows['mingxi_2']=='大' || $rows['mingxi_2']=='小' || $rows['mingxi_2']=='单' || $rows['mingxi_2']=='双')){
				//注单未中奖，和
				$msql="update c_bet_7 set win=money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
				$q1 = $mysqli->affected_rows;
				if($q1==1){
					$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
					$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
				}
			}else{
				//注单未中奖，输
				$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算总和大小
	if($rows['mingxi_2']=='总和大' || $rows['mingxi_2']=='总和小'){
		$zonghe = Ssc_Auto($hm,2);
		if($rows['mingxi_2']==$zonghe){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			if($zonghe=='总和和'){
				//注单未中奖，和
				$msql="update c_bet_7 set win=money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
				$q1 = $mysqli->affected_rows;
				if($q1==1){
					$msql="update k_user set money=money+".$rows['money']." where uid=".$rows['uid']."";
					$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
				}
			}else{
				//注单未中奖，输
				$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}
	}
	//开始结算总和单双
	if($rows['mingxi_2']=='总和单' || $rows['mingxi_2']=='总和双'){
		$zonghe = Ssc_Auto($hm,3);
		if($rows['mingxi_2']==$zonghe){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算总和尾数
	if($rows['mingxi_2']=='总和尾大' || $rows['mingxi_2']=='总和尾小'){
		$zonghe = Ssc_Auto($hm,4);
		if($rows['mingxi_2']==$zonghe){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算龙虎和
	if($rows['mingxi_2']=='龙' || $rows['mingxi_2']=='虎'){
		$longhu = Ssc_Auto($hm,5);
		if($rows['mingxi_2']==$longhu){
			//如果投注内容等于第一球开奖号码，则视为中奖
			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算任选
	if($rows['mingxi_1']=='任选_一中一' || $rows['mingxi_1']=='任选_二中二' || $rows['mingxi_1']=='任选_三中三' || $rows['mingxi_1']=='任选_四中四' || $rows['mingxi_1']=='任选_五中五'){
		$shuying = RenXuan($hm,$rows['mingxi_2'],0);
		if($shuying == '赢'){

			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算任选
	if($rows['mingxi_1']=='任选_六中五' || $rows['mingxi_1']=='任选_七中五' || $rows['mingxi_1']=='任选_八中五'){
		$shuying = RenXuan($hm,$rows['mingxi_2'],1);
		if($shuying == '赢'){

			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算组选
	if($rows['mingxi_1']=='组选_前二'){
		$shuying = ZuXuan($hm,$rows['mingxi_2'],0);
		if($shuying == '赢'){

			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算组选
	if($rows['mingxi_1']=='组选_前三'){
		$shuying = ZuXuan($hm,$rows['mingxi_2'],1);
		if($shuying == '赢'){

			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算组选
	if($rows['mingxi_1']=='直选_前二'){
		$shuying = ZhiXuan($hm,$rows['mingxi_2'],0);
		if($shuying == '赢'){

			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//开始结算组选
	if($rows['mingxi_1']=='直选_前三'){
		$shuying = ZhiXuan($hm,$rows['mingxi_2'],1);
		if($shuying == '赢'){

			$msql="update c_bet_7 set js=1 where id='".$rows['id']."'";
			$mysqli->query($msql) or die ("注单修改失败!!!".$rows['id']);
			//注单中奖，给会员账户增加奖金
			$q1 = $mysqli->affected_rows;
			if($q1==1){
				$msql="update k_user set money=money+".$rows['win']." where uid=".$rows['uid']."";
				$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
			}
		}else{
			//注单未中奖，修改注单内容
			$msql="update c_bet_7 set win=-money,js=1 where id=".$rows['id']."";
			$mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
		}
	}
	//填写开奖结果到注单
    $msql="update c_bet_7 set jieguo='".$rs['ball_1'].",".$rs['ball_2'].",".$rs['ball_3'].",".$rs['ball_4'].",".$rs['ball_5']."' where id=".$rows['id']."";
    $mysqli->query($msql) or die ("会员修改失败!!!".$rows['id']);
}
//TODU:
$msql="update c_auto_9 set ok=1 where qishu=".$qi."";
$mysqli->query($msql) or die ("期数修改失败!!!");
if ($_GET['t']==1)    {
echo "<script>window.location.href='../../Lottery/auto_9.php';</script>";
}
}
?>