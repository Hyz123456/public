<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="/js/jquery.js"></script>
    <title>Games</title>
    <style type="text/css">
        body {
            background-color: #000;
            color:#FF0;
            font-size:14px;
        }
    </style>
</head>
<body>
<p>&nbsp;</p>
<p align="center" id="msg">
    <img src="lg2.gif"><br><br>载入游戏大概需要花几秒钟时间，请耐心等待...</p>
<p style="visibility: hidden;">&nbsp;<img src="lg.gif"></p>
<?php
if(!isset($_SESSION)){ session_start();}
if(!isset($_SESSION['uid']) OR empty($_SESSION['uid']))
{
    exit("<script>alert('请登陆后再操作。');</script>");
}
function randomkeys($length)
{
    $key='';
    $pattern='1234567890';
    for($i=0;$i<$length;$i++)
    {
        $key .= $pattern{mt_rand(0,9)};
    }
    return $key;
}
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once("../class/bbapi.php");
include_once($C_Patch."/app/member/include/config.inc.php");
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
//$loginid = $_SESSION['user_login_id'];
$username = $_SESSION['username'];
//renovate($uid,$loginid);
include_once("../class/bbapi.php");
//$userinfo=user::getinfo($uid);
$bbapi = new bbapi();
//$username=$userinfo["username"];

$bbapi = new bbapi();
$sql	=	"select * from user_list where user_name='".$username."' limit 0,1";
$query	=	$mysqli->query($sql)or die ("error!");
$row    =	$query->fetch_array();
if(empty($row))
{
    exit("<script>alert('请登陆后再操作。');</script>");
}
$bbRet = $bbapi->balance($username);
if($bbRet['Success'] == false){
    $bbapi->create($username);
    $bbRet = $bbapi->balance($username);
}else{
    $currAmt = $bbRet['Data'];
}


if($bbRet['Success']){
    $currAmt = $bbRet['Data'];
    $trans_result='';
    if($row['money'] > 0)
    {
        $conver=doubleval($row['money']);
        $zzmoney=$conver;
        $about = "主账户->BBIN";
        $billno = time() . rand(100000, 999999);
        $pay_value  =   0-$conver;
        $trans_result = $bbapi->deposit($username,$conver,$billno);
        $result = false ;
        if($trans_result['Success'] == true)
        {
            $result = 1;
        }
        $zzTypeInfo = "bd";
        $liveTypeInfo = 'BBIN';
        if($result==1)
        {
            try
            {
                $mysqli->autocommit(FALSE);
                $mysqli->query("BEGIN");
                $sql="update user_list set money=money+$pay_value where user_id='$uid'";
                $mysqli->query($sql);
                $q1=$mysqli->affected_rows;

                $order=date("YmdHis")."_".$_SESSION['username'];
                $change_money = intval($pay_value);
                $assets = $row["money"];
                $datereg=   date("YmdHis").randomkeys(4);

                $balance = $assets-$change_money;

                $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance');";
                $mysqli->query($sql) or die($sql);
                $q2=$mysqli->affected_rows;
                if($q1==1 && $q2==1){

                    $sql  = "INSERT INTO `live_log` (`order_num`, `live_type`, `zz_type`, `user_id`, `live_username`, `zz_money`, `status`, `result`, `add_time`, `do_time`) ";
                    $sql .=  " VALUES";
                    $sql .= "('$datereg', '$liveTypeInfo', '$zzTypeInfo', '$uid', '$username', '$zzmoney', '1', '成功',now(),now());";
                    $mysqli->query($sql) or die($sql);


                    $mysqli->commit();


                }else{
                    $mysqli->rollback(); //数据回滚
                    exit("<script>alert('由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服！');history.back();</script>");
                }

            }catch(Exception $e){
                $mysqli->rollback();
                exit("<script>alert('数据量异常！');history.back();</script>");
            }
        }
        elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit')){
            exit("<script>alert('信用额度不足！');history.back();</script>");
        }
        else
        {
            exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
        }

    }else{

        //没有余额了--------
    }
}





$bbRet = $bbapi->login($username);

if($bbRet['Success'] == false){
    $bbapi->create($username);
    $bbRet = $bbapi->login($username);
}
$url = $bbRet['Data'];

echo("<script> window.location.href= '{$url}' </script> ");
?>
</body>
</html>