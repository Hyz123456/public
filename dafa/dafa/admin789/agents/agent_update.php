<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/ip.php");
include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改代理");

$id	            =	$_POST["id"];
$agents_name	=	$_POST["agents_name"];
$agents_pass	=	md5($_POST["agents_pass"]);
$qk_pass=$_POST["qk_pass"];
$birthday	    =	$_POST["birthday"];
$tel		    =	$_POST["tel"];
$email		    =	$_POST["email"];
$qq		        =	$_POST["qq"];
$othercon		=	$_POST["othercon"];
$agents_type	=	$_POST["agents_type"];
$total_1_1	    =	$_POST["total_1_1"];
$total_1_2		=	$_POST["total_1_2"];
$total_2_1		=	$_POST["total_2_1"];
$total_2_2		=	$_POST["total_2_2"];
$total_3_1		=	$_POST["total_3_1"];
$total_3_2		=	$_POST["total_3_2"];
$total_4_1		=	$_POST["total_4_1"];
$total_4_2		=	$_POST["total_4_2"];
$total_5_1		=	$_POST["total_5_1"];
$total_5_2		=	$_POST["total_5_2"];
$total_1_scale	=	$_POST["total_1_scale"];
$total_2_scale	=	$_POST["total_2_scale"];
$total_3_scale	=	$_POST["total_3_scale"];
$total_4_scale	=	$_POST["total_4_scale"];
$total_5_scale	=	$_POST["total_5_scale"];
$remark	        =	$_POST["remark"];
$sql = "select id,agents_name from agents_list where agents_name='$agents_name'";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();

if($id){
    if($row && $row['agents_name'] && $row['id']!=$id){
        message("该用户名已存在，请重新输入。");
        exit;
    }
    $sql = "update agents_list set agents_name='$agents_name' , birthday='$birthday' , tel='$tel' ,
                        email='$email' , qq='$qq' , othercon='$othercon',agents_type='$agents_type',total_1_1='$total_1_1',
                        total_1_2='$total_1_2' , total_2_1='$total_2_1' , total_2_2='$total_2_2',total_3_1='$total_3_1',
                        total_3_2='$total_3_2' , total_4_1='$total_4_1' , total_4_2='$total_4_2',total_5_1='$total_5_1',
                        total_5_2='$total_5_2' , total_1_scale='$total_1_scale' , total_2_scale='$total_2_scale',total_3_scale='$total_3_scale',
                        total_4_scale='$total_4_scale' , total_5_scale='$total_5_scale' , remark='remark'
                        where id=$id";
    $mysqli->query($sql);
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，修改了代理：".$agents_name." 的资料",$_SESSION["ssid"],"",$bj_time_now);
    message('修改代理成功!',"list.php");
}else{
    if($row && $row['agents_name']){
        message("该用户名已存在，请重新输入。");
        exit;
    }
    $sql = "insert into agents_list(agents_name,agents_pass,,agents_pass_naked,qk_pass,,qk_pass_naked,regtime,birthday,tel,email,qq,othercon,remark,agents_type,total_1_1,total_1_2,total_2_1,total_2_2,total_3_1,total_3_2,total_4_1,total_4_2,total_5_1,total_5_2,total_1_scale,total_2_scale,total_3_scale,total_4_scale,total_5_scale)
            values('$agents_name','$agents_pass','".$_POST['agents_pass']."','".md5($qk_pass)."','$qk_pass','$bj_time_now','$birthday','$tel','$email','$qq','$othercon','$remark','$agents_type',$total_1_1,$total_1_2,$total_2_1,$total_2_2,$total_3_1,$total_3_2,$total_4_1,$total_4_2,$total_5_1,$total_5_2,$total_1_scale,$total_2_scale,$total_3_scale,$total_4_scale,$total_5_scale)";
    $mysqli->query($sql);
	$money_id		=	$mysqli->insert_id;
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，新增了代理：".$agents_name." 的资料",$_SESSION["ssid"],"",$bj_time_now);
	//以下這些字段註冊時候未填寫
	$ask	=	"";
	$answer	=	"";
	$sex	=	"未知";
	$country	=	"";
	$province	=	"";
	$city		=	"";
	$address	=	"";
	$pay_address=	"";
	$loginip	=	"";
	$logintime	=	"";
	$loginaddress=	"";

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
	$sql		=	"select group_id from user_group where default_group='是' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['group_id']){
		$group_id	=	$rs['group_id'];
	}else
	{
		message('抱歉!系统默认会员组错误,暂时无法注册!');
	}
	$sql		=	"insert into user_list(user_id,Oid,user_name,user_pass,user_pass_naked,qk_pass,top_id,money,total_bets,ask,answer,loginip,logintime,loginaddress,regtime,regip,regaddress,logouttime,online,lognum,status,group_id,sex,birthday,tel,email,qq,othercon,country,province,city,address,pay_name,pay_address,pay_num,pay_bank,remark,loginurl,regurl) values ('$user_id','$Oid','$agents_name','$agents_pass','".$_POST["agents_pass"]."','".md5($qk_pass)."','0','$money','$total_bets','$ask','$answer','$loginip','$logintime','$loginaddress','$regtime','$regip','$regaddress','','$online','$lognum','$status','$group_id','$sex','$birthday','$tel','$email','$qq','$othercon','$country','$province','$city','$address','','$pay_address','','','$remark','','$regurl')";
    $query_u=$mysqli->query($sql);
	if($query_u)
		 message('新增代理成功!',"list.php");
	else{
		$sql		=	"delete from agents_list where id='$money_id'";
		$mysqli->query($sql);
		echo "<script>alert('新增代理失败!!!');history.go(-1);</script>";
		exit;
	}
}
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
?>