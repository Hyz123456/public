<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/error_handle.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_normal.php");
include_once($C_Patch."/app/member/class/odds_lottery_normal.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/cache/ltConfig.php");
$gType = "D3";
include_once($C_Patch."/member/b3/b3_util.php");
include_once($C_Patch."/app/member/class/common_class.php");

//福彩3D
$ball_name['name']		= '福彩3D';
$ball_name['qiu_1']		= '第一球';
$ball_name['qiu_2']		= '第二球';
$ball_name['qiu_3']		= '第三球';
$ball_name['qiu_4']		= '总和龙虎和';
$ball_name['qiu_5']		= '三连';
$ball_name['qiu_6']		= '跨度';
$ball_name['ball_1'] 	= '0';
$ball_name['ball_2'] 	= '1';
$ball_name['ball_3'] 	= '2';
$ball_name['ball_4'] 	= '3';
$ball_name['ball_5'] 	= '4';
$ball_name['ball_6'] 	= '5';
$ball_name['ball_7'] 	= '6';
$ball_name['ball_8'] 	= '7';
$ball_name['ball_9'] 	= '8';
$ball_name['ball_10'] 	= '9';
$ball_name['ball_11'] 	= '大';
$ball_name['ball_12'] 	= '小';
$ball_name['ball_13'] 	= '单';
$ball_name['ball_14'] 	= '双';
$ball_name_zh['ball_1'] = '总和大';
$ball_name_zh['ball_2'] = '总和小';
$ball_name_zh['ball_3'] = '总和单';
$ball_name_zh['ball_4'] = '总和双';
$ball_name_zh['ball_5'] = '龙';
$ball_name_zh['ball_6'] = '虎';
$ball_name_zh['ball_7'] = '和';
$ball_name_s['ball_1']	= '豹子';
$ball_name_s['ball_2']	= '顺子';
$ball_name_s['ball_3']	= '对子';
$ball_name_s['ball_4']	= '半顺';
$ball_name_s['ball_5']	= '杂六';
$ball_name_k['ball_1'] 	= '0';
$ball_name_k['ball_2'] 	= '1';
$ball_name_k['ball_3'] 	= '2';
$ball_name_k['ball_4'] 	= '3';
$ball_name_k['ball_5'] 	= '4';
$ball_name_k['ball_6'] 	= '5';
$ball_name_k['ball_7'] 	= '6';
$ball_name_k['ball_8'] 	= '7';
$ball_name_k['ball_9'] 	= '8';
$ball_name_k['ball_10'] 	= '9';

//清空所有POST数据为空的表单
$datas = array_filter($_POST);
//获取清空后的POST键名
$names = array_keys($datas);
$userid = $_SESSION["userid"];

//验证money_log是否存在错误
$sql = "select assets,balance,order_value from money_log where user_id='".$_SESSION["userid"]."' order by id desc limit 0,2";
$query	=	$mysqli->query($sql);
$rs = array();
while($row = $query->fetch_array()){
    $rs[] = $row;
}
/*if(count($rs)>1){
    if($rs[0]["assets"]!=$rs[1]["balance"]){
        echo '<script type="text/javascript">alert("账号金额异常，请联系管理人员。");</script>';
        exit;
    }
}*/

if(count($datas)<1){
    if($_GET['style']){
		echo '<script type="text/javascript">alert("没有选择数据，请重新下注。");history.go(-1);</script>';
		exit;
	}else{
		echo '<script type="text/javascript">alert("没有选择数据，请重新下注。");</script>';
		exit;
	}
}

$bet_money_total = 0;
$win_money_total = 0;
for ($i = 0; $i < count($datas); $i++){
    $bet_money_temp = $datas[''.$names[$i].''];
	if(intval($bet_money_temp)<$lowestMoney){
		echo '<script type="text/javascript">alert("该彩票有单注最低金额：'.$lowestMoney.'元!!!");history.go(-1);;</script>';
		exit;
	}
	if(intval($bet_money_temp)>$maxMoney){
		echo '<script type="text/javascript">alert("该彩票有单注最高金额：'.$maxMoney.'元!!!");history.go(-1);;</script>';
		exit;
	}
    if(is_numeric($bet_money_temp) && is_int($bet_money_temp*1) && intval($bet_money_temp)>0){
        $bet_money_total += $bet_money_temp;
    }else{
         if($_GET['style']){
			echo '<script type="text/javascript">alert("数据格式出错，请重新下注。");history.go(-1);</script>';
			exit;
		}else{
			echo '<script type="text/javascript">alert("数据格式出错，请重新下注。");</script>';
			exit;
		}
    }
}
//校验
$balance	=	0;//投注后
$assets		=	0;//投注前
$sql		= 	"select money from user_list where user_id='$userid' limit 1";
$query 		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
if($rs['money']){
    $assets	=	round($rs['money'],2);
    $balance=	$assets-$bet_money_total;
}else{
    if($_GET['style']){
		echo '<script type="text/javascript">alert("账户异常,请联系客服!");history.go(-1);</script>';
		exit;
	}else{
		echo '<script type="text/javascript">alert("账户异常,请联系客服!");</script>';
		exit;
	}
}
if($balance<0){ //投注后，用户余额不能小于0
    if($_GET['style']){
		echo '<script type="text/javascript">alert("账户余额不足!");history.go(-1);</script>';
		exit;
	}else{
		echo '<script type="text/javascript">alert("账户余额不足!");</script>';
		exit;
	}
}
if($is_close){
    if($_GET['style']){
		echo '<script type="text/javascript">alert("改投注已过时,请重新下注。");history.go(-1);</script>';
		exit;
	}else{
		echo '<script type="text/javascript">alert("改投注已过时,请重新下注。");</script>';
		exit;
	}
}

$max_money = common_class::getMaxMoney($userid);
$max_money_already = common_class::getMaxMoneyAlready($userid,$gType,$qishu);

if($max_money > 0 && ($max_money_already+$bet_money_total)>$max_money){
    if($_GET['style']){
		echo '<script type="text/javascript">alert("超过当期下注最大金额，请联系管理人员。");history.go(-1);</script>';
		exit;
	}else{
		echo '<script type="text/javascript">alert("超过当期下注最大金额，请联系管理人员。");</script>';
		exit;
	}
}

//生成主单以及一些信息
//生成图片
function str_leng($str){ //取字符串长度
    mb_internal_encoding("UTF-8");
    return mb_strlen($str)*12;
}

$lottery_number = $qishu;
$sql	=	"insert into order_lottery(user_id,Gtype,rtype_str,rtype,bet_info,bet_money,win,lottery_number,bet_time)
                    values ('$userid','$gType','快速-3D彩','745','bet_info','$bet_money_total','0','$lottery_number','$bj_time_now')"; //新增一个投注项
$mysqli->query($sql);
$q1		=	$mysqli->affected_rows;
if($q1!=1){
    return false;
}
$id 	=	$mysqli->insert_id;
$datereg=	date("YmdHis").$id;

$sql		= 	"select money from user_list where user_id='$userid' limit 0,1";
$query 		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$assets = $rs["money"];
$balance = $assets-$bet_money_total;

$sql	=	"update user_list set money=$balance where money>=$bet_money_total and $balance>=0 and user_id='$userid'";//扣钱
$mysqli->query($sql);
$q3		=	$mysqli->affected_rows;
if($q3!=1){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    return false;
}

$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$userid','$datereg','$lottery_name',now(),'彩票下注','$bet_money_total','$assets','$balance');";
$mysqli->query($sql);
$q8		=	$mysqli->affected_rows;
$money_log_id		=	$mysqli->insert_id;
if($q8!=1){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
    $mysqli->query($sql);
    return false;
}

$sql	=	"update `order_lottery` set `order_num`='$datereg' where id='$id'"; //更新订单号
$mysqli->query($sql);
$q2		=	$mysqli->affected_rows;
if($q2!=1){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    $sql = "DROP TRIGGER BeforeDeleteUserList;";
    $mysqli->query($sql);
    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
    $mysqli->query($sql);
    $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
    $mysqli->query($sql);
    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
    $mysqli->query($sql);
    return false;
}

//开始读取赔率,,获取赔率
$sql		= "select * from odds_lottery_normal
            where lottery_type='3D彩' and sub_type in('佰定位','拾定位','个定位','总和龙虎和','3连','跨度')
            order by id asc";
$query		= $mysqli->query($sql);
$s 			= 1;
while($row = $query->fetch_array()){
    $rs[$s] = $row;
    $s++;
}
for ($i = 0; $i < count($datas); $i++){
    //分割键名，取ball_后的数字，来判断属于第几球
    $qiu	= explode("_",$names[$i]);
    $qiuhao = $ball_name['qiu_'.$qiu[1]];
    if( $qiu[1] == 4 ){
        $wanfa	= $ball_name_zh['ball_'.$qiu[2].''];
        $number = $wanfa;
    }else if( $qiu[1] == 5 ){
        $wanfa	= $ball_name_s['ball_'.$qiu[2].''];
        $number = $wanfa;
    }else if( $qiu[1] == 6 ){
        $wanfa	= $ball_name_k['ball_'.$qiu[2].''];
        $number = $wanfa;
    }else{
        $wanfa	= $ball_name['ball_'.$qiu[2].''];
        $number = $wanfa;
    }
    $money	= $datas[''.$names[$i].''];
    $odds = $rs[$qiu[1]]['h'.($qiu[2]-1)];
    if($qiu[1]<4 && $qiu[2]>10){
        $ss = $qiu[1]*6;
        //获取两面
        $sql_sub		= "select * from odds_lottery_normal
            where lottery_type='3D彩' and sub_type='两面' ";
        $query_sub 		=	$mysqli->query($sql_sub);
        $rs_sub			=	$query_sub->fetch_array();
        $odds = $rs[$qiu[1]][$qiu[2]-1];
        if($qiu[2]==11){
            $odds = $rs_sub['h'.($ss-6)];
        }elseif($qiu[2]==12){
            $odds = $rs_sub['h'.($ss-5)];
        }elseif($qiu[2]==13){
            $odds = $rs_sub['h'.($ss-4)];
        }elseif($qiu[2]==14){
            $odds = $rs_sub['h'.($ss-3)];
        }
    }

    $bet_rate = $odds;
    $bet_money_one = $money;
    $win_money = $bet_money_one*$odds;
    $win_money_total += $win_money;
    $fs_money = 0;

    //获取反水
    $sql   =	"select g.* from user_group g,user_list u
                                where u.user_id='$userid' and g.group_id=u.group_id limit 0,1";
    $query = $mysqli->query($sql);
    $fsRow   =	$query->fetch_array();
    if($bet_money_one >= $fsRow[strtolower($gType).'_bet']){
        $fs_money = $bet_money_one*$fsRow[strtolower($gType).'_bet_reb'];
    }

    $sql	=	"insert into order_lottery_sub (order_num,quick_type,number,bet_rate,bet_money,win,fs,balance)
                                 value ('$datereg','$qiuhao','$number','$bet_rate','$bet_money_one','$win_money','$fs_money','$balance')";
    $mysqli->query($sql);
    $q4		=	$mysqli->affected_rows;
    $id_sub 	=	$mysqli->insert_id;
    $datereg_sub=	date("YmdHis").$id_sub;

    $sql	=	"update `order_lottery_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
    $mysqli->query($sql);
    $q2		=	$mysqli->affected_rows;
    if($q4!=1 || $q2!=1){
        $sql	=	"delete from order_lottery_sub where order_num='$datereg'";//操作失败，删除子订单
        $mysqli->query($sql);
        $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
        $mysqli->query($sql);
        $sql = "DROP TRIGGER BeforeDeleteUserList;";
        $mysqli->query($sql);
        $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
        $mysqli->query($sql);
        $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
        $mysqli->query($sql);
        $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
        $mysqli->query($sql);
        return false;
    }else{
        $C_Patch=$_SERVER['DOCUMENT_ROOT'];
        include_once($C_Patch."/app/member/utils/convert_name.php");
        include_once($C_Patch."/resource/lottery/getContentName.php");
        $tm=date("Y-m-d H:i:s",time());
        $height	=	26; //高
        $gTypeZhName = getZhPageTitle($gType);
        $betInfoIm = getName($number,$gType);
        $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$qiuhao.'='.$betInfoIm.'='.$bet_money_one.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
        $im		=	imagecreate($width,$height);
        $bkg	=	imagecolorallocate($im,255,255,255); //背景色
        $font	=	imagecolorallocate($im,150,182,151); //边框色
        $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
        $name_c	=	imagecolorallocate($im,243,118,5); //字体色
        $guest_c=	imagecolorallocate($im,34,93,156); //字体色
        $info_c	=	imagecolorallocate($im,51,102,0); //字体色
        $money_c=	imagecolorallocate($im,255,0,0); //字体色
        $tm_c=	imagecolorallocate($im,0,0,0); //字体色
        $fnt	=	$C_Patch."/app/member/ttf/simhei.ttf";

        imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
        imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$qiuhao); //投注玩法
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money_one); //交易金额
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.$bet_money_one.'======'),18,$money_c,$fnt,$fs_money); //反水
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.$bet_money_one.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.$bet_money_one.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
        imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
        if(!is_dir($C_Patch."\\../order/".substr($datereg_sub,0,8))) mkdir($C_Patch."\\../order/".substr($datereg_sub,0,8));
        imagejpeg($im,$C_Patch."\\../order/".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
        imagedestroy($im);
    }
}
$sql	=	"update `order_lottery` set `win`='$win_money_total' where id='$id'"; //更新订单号
$mysqli->query($sql);

$sql	=	"select id from `order_lottery_sub` where `order_num`='$datereg'"; //验证子订单是否有存在
$query = $mysqli->query($sql);
$q_sub   =	$query->fetch_array();
if(!($q_sub && $q_sub["id"])){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    $sql = "DROP TRIGGER BeforeDeleteUserList;";
    $mysqli->query($sql);
    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
    $mysqli->query($sql);
    $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
    $mysqli->query($sql);
    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
    $mysqli->query($sql);
    return false;
}

$mysqli->close();
if($_GET['style']){
	echo '<script type="text/javascript">alert("操作成功。");history.go(-1);</script>';
	exit;
}else{
	echo '<script type="text/javascript">alert("操作成功。");</script>';
	exit;
}