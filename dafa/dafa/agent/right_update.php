<?php
include_once("../app/member/include/config.inc.php");
header("Content-type: text/html; charset=utf-8");
include_once("../app/member/ip.php");
include_once("../app/member/include/address.mem.php");
$agentsname	=	$_POST["agentsname"];
$agents_add	=	$_POST["agents_add"];
$agents_name	=	$_POST["agents_name"];
$agents_pass	=	md5($_POST["agents_pass"]);
$qk_pass	=$_POST["pwd1"].$_POST["pwd2"].$_POST["pwd3"].$_POST["pwd4"];
$agent_pass_naked=$_POST["agents_pass"];
//$birthday	    =	$_POST["birthday"];
//$tel		    =	$_POST["tel"];
//$email		    =	$_POST["email"];
//$qq		        =	$_POST["qq"];
//$othercon		=	$_POST["othercon"];
$remark	        =	$_POST["remark"];
$bank=$_POST["bank"];
if(!($_POST["pwd1"]>=0 && $_POST["pwd2"]>=0 && $_POST["pwd3"]>=0 && $_POST["pwd4"]>=0)){
	echo "<script  type ='text/javascript'>alert('取款密码不对！！！');window.location.href='agent_add.php';</script>";
	exit;
}
$sql = "select agents_name from agents_list where agents_name='$agents_name'";
$query	=	$mysqli->query($sql);
if($query)
	$row1 = $query->fetch_array();
$sql = "select agents_name from agents_list where agentsname='$agentsname'";
$query	=	$mysqli->query($sql);
if($query)
	$row2= $query->fetch_array();
$sql = "select agents_name from agents_list where bank='$bank'";
$query	=	$mysqli->query($sql);
if($query)
	$row3= $query->fetch_array();
$sql = "select id from user_list where user_name='$agents_name'";
$query	=	$mysqli->query($sql);
if($query)
	$row4 = $query->fetch_array();
$sql = "select id from user_list where pay_name='$agentsname'";
$query	=	$mysqli->query($sql);
if($query)
	$row5= $query->fetch_array();
$sql = "select id from user_list where pay_num='$bank'";
$query	=	$mysqli->query($sql);
if($query)
	$row6= $query->fetch_array();
if(!empty($row1) || !empty($row2) || !empty($row3) || !empty($row4) || !empty($row5) || !empty($row6)){

  echo "<script  type ='text/javascript'>alert('该用户名或者真实姓名或者银行卡号已存在，请重新输入。');window.location.href='agent_add.php';</script>";
	
}
else{
   //$date=date("Y-m-d H:i:s");echo $date;
    $sql1= "insert into agents_list(agents_name,agents_pass,agent_pass_naked,qk_pass,qk_pass_naked,regtime,tel,qq,othercon,remark,agentsname,agents_add,bank)
            values('$agents_name','$agents_pass','$agent_pass_naked','".md5($qk_pass)."','$qk_pass',now(),'$tel','$qq','$othercon','$remark','$agentsname','$agents_add','$bank')";
			//echo now();
    $mysqli->query($sql1)or die($sql1);
	$money_id		=	$mysqli->insert_id;
	//以下這些字段註冊時候未填寫
	$ask	=	"";
	$answer	=	"";
	$sex	=	"未知";
	$birthday	=	"";
	$country	=	"";
	$province	=	"";
	$city		=	"";
	$address	=	"";
	$pay_address=	"";
	$loginip	=	"";
	$logintime	=	"";
	$loginaddress=	"";
	//獲取一個未使用的 用戶ID
	function get_user_id()
	{
		$user_id=rand(10000,999999999);
		while(check_user_id($user_id))
		{
			$user_id=rand(10000,999999999);
		}
		return $user_id;
	}

	//檢查 用戶ID 是否存在
	function check_user_id($val)
	{
		global $mysqli;
		$sql		=	"select user_id from user_list where user_id=$val limit 1";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();

		if($rs['user_id'])
		{
			return true;
		}else
		{
			return false;
		}
	}
	//以下是新用戶默認參數
	$user_id=get_user_id();
	$online	=	"否";
	$lognum	=	0;
	$money	=	0;
	$total_bets	=	0;
	$Oid	=	"";
	$status	=	"正常";
	$regip	=	get_ip();
	$regaddress = iconv("GB2312","UTF-8",convertip($regip));   //取出IP所在地
	$regtime	=	date('Y-m-d H:i:s',time());
	$regurl		=	BROWSER_IP;
	
	//echo "<script>alert('1111');history.go(-1);</script>";
	//exit;
	$sql		=	"select group_id from user_group where default_group='是' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['group_id']){
		$group_id	=	$rs['group_id'];
	}else
	{
		message('抱歉!系统默认会员组错误,暂时无法注册!');
	}

    $sql		=	"select id from user_list where regip='".$regip."' and tel='$tel' and pay_name='$agentsname' limit 1";
    $query		=	$mysqli->query($sql);
	if($query)
		$rs			=	$query->fetch_array();
    if($rs['id']){
        message('抱歉!该名字已注册,请您更换名字!');
    }
	
	$sql		=	"insert into user_list(user_id,Oid,user_name,user_pass,user_pass_naked,qk_pass,top_id,money,total_bets,ask,answer,loginip,logintime,loginaddress,regtime,regip,regaddress,logouttime,online,lognum,status,group_id,sex,birthday,tel,email,qq,othercon,country,province,city,address,pay_name,pay_address,pay_num,pay_bank,remark,loginurl,regurl) values ('$user_id','$Oid','$agents_name','$agents_pass','$agent_pass_naked','".md5($qk_pass)."','0','$money','$total_bets','$ask','$answer','$loginip','$logintime','$loginaddress','$regtime','$regip','$regaddress','','$online','$lognum','$status','$group_id','$sex','$birthday','$tel','$email','$qq','$othercon','$country','$province','$city','$address','$agentsname','$pay_address','$bank','$agents_add','$remark','','$regurl')";
	$query_u=$mysqli->query($sql);
	if($query_u)
		 echo "<script  type ='text/javascript'>alert('注册成功');window.location.href='right.php'</script>";
	else{
		$sql		=	"delete from agents_list where id='$money_id'";
		$mysqli->query($sql);
		echo "<script>alert('注册失败!!!');history.go(-1);</script>";
		exit;
	}
		 
}
?>