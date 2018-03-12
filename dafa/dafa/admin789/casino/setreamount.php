<?php
header('Content-Type:text/html; charset=utf-8');
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
$sysdate = date('Y-m-d',time());
$setdate=$_GET["bdate"];
$type=$_GET["type"];
$sql		=	"SELECT agfsbl as agfsbl,bbinfsbl as bbinfsbl,mgfsbl as mgfsbl,
abfsbl as abfsbl, ptfsbl as ptfsbl
FROM `k_group` where id='1' ";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$agfsbl	=	$rs['agfsbl'];
$bbinfsbl	=	$rs['bbinfsbl'];
$mgfsbl	=	$rs['mgfsbl'];
$abfsbl	=	$rs['abfsbl'];
$ptfsbl	=	$rs['ptfsbl'];
/*$agfsbl = 0;
$bbinfsbl = 0;*/

if($type=="ag"){
    $sql		=	"SELECT *  FROM `api_crawler_log` where excedate='$setdate' and type='ag' ";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();

    if(is_null($rs)||$rs['status']==0){
        $currtime=date("Y-m-d H:i:s");
        $logid = 0;
        if(is_null($rs)){
            $sql="insert into api_crawler_log(type,excedate,status,createtime) values ('ag','$setdate',0,'$currtime')";
            $mysqli->query($sql);
            $logid = $mysqli->insert_id;
        }else {
            $logid = $rs['id'];
        }

        $startDate = $setdate." 00:00:00";
        $endDate = $setdate." 23:59:59";
        $sql   = "select * from api_agbetdetail where recalcuTime >= '".$startDate."' and  recalcuTime <= '".$endDate."' ";

        $query	=	$mysqli->query($sql);
        while($rows = $query->fetch_array()){
            $reflag = $rows["reflag"];
            $validBetAmount = $rows["validBetAmount"];
            $detailid = $rows["id"];
            if($reflag==0){
                if($validBetAmount>0){
                    $uid = $rows["uid"];
                    //$sql =	"SELECT agfs as agfs FROM `k_user` where uid='".$uid."' ";
                    //$queryUser	=  $mysqli->query($sql);
                    //$urs=	$queryUser->fetch_array();
                    //$agfs	=	$urs['agfs'];
                    $agfs=0;
                    $rerate = $agfs;
                    if($agfs==0){
                        $rerate = $agfsbl;
                    }
                    if($agfs==-0.01){
                        $sql=" update `api_agbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                    }else {
                        $reamount = number_format($validBetAmount*$rerate,4);
                        $sql=" update `api_agbetdetail` set `reamount` = '{$reamount}'  ,`rerate` = '{$rerate}'  , `reflag` = 1 , `redate` = '$currtime' WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                        $q2=$mysqli->affected_rows;
                        if($q2>0){
                            $mysqli->query("update `user_list` set `money` = `money` +'{$reamount}' WHERE `user_id` = '{$uid}'");
                            $q1=$mysqli->affected_rows;
                        }
                    }

                }else {
                    $sql=" update `api_agbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                    $mysqli->query($sql);
                }
            }


        }
        $mysqli->query("update `api_crawler_log` set `status` = 1  WHERE `id` = '{$logid}'");
    }
}else if($type=="bbin"){
    $sql		=	"SELECT *  FROM `api_crawler_log` where excedate='$setdate' and type='bbin' ";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();

    if(is_null($rs)||$rs['status']==0){
        $currtime=date("Y-m-d H:i:s");
        $logid = 0;
        if(is_null($rs)){
            $sql="insert into api_crawler_log(type,excedate,status,createtime) values ('bbin','$setdate',0,'$currtime')";
            $mysqli->query($sql);
            $logid = $mysqli->insert_id;
        }else {
            $logid = $rs['id'];
        }

        $startDate = $setdate." 00:00:00";
        $endDate = $setdate." 23:59:59";
        $sql   = "select * from api_bbbetdetail where WagersDate >= '".$startDate."' and  WagersDate <= '".$endDate."' ";

        $query	=	$mysqli->query($sql);
        while($rows = $query->fetch_array()){
            $reflag = $rows["reflag"];
            $validBetAmount = $rows["Commissionable"];
            $detailid = $rows["id"];
            if($reflag==0){
                if($validBetAmount>0){
                    $uid = $rows["UserName"];
                    //$sql =	"SELECT bbinfs as bbinfs FROM `k_user` where username='".$uid."' ";
                    //$queryUser	=  $mysqli->query($sql);
                    //$urs=	$queryUser->fetch_array();
                    //$bbinfs	=	$urs['bbinfs'];
                    $bbinfs = 0;
                    $rerate = $bbinfs;
                    if($bbinfs==0||is_null($bbinfs)){
                        $rerate = $bbinfsbl;
                    }
                    if($bbinfs==-0.01){
                        $sql=" update `api_bbbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                    }else {
                        $reamount = number_format($validBetAmount*$rerate,4);
                        $sql=" update `api_bbbetdetail` set `reamount` = '{$reamount}'  ,`rerate` = '{$rerate}'  , `reflag` = 1 , `redate` = '$currtime' WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                        $q2=$mysqli->affected_rows;
                        if($q2>0){
                            $mysqli->query("update `user_list` set `money` = `money` +'{$reamount}' WHERE `user_name` = '{$uid}'");
                            //echo "$sql";
                            $q1=$mysqli->affected_rows;
                        }
                    }
                }else {
                    $sql=" update `api_bbbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                    $mysqli->query($sql);
                }
            }


        }
        $mysqli->query("update `api_crawler_log` set `status` = 1  WHERE `id` = '{$logid}'");
    }
}else if($type=="mg"){
    $sql		=	"SELECT *  FROM `api_crawler_log` where excedate='$setdate' and type='mg' ";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();

    if(is_null($rs)||$rs['status']==0){
        $currtime=date("Y-m-d H:i:s");
        $logid = 0;
        if(is_null($rs)){
            $sql="insert into api_crawler_log(type,excedate,status,createtime) values ('mg','$setdate',0,'$currtime')";
            $mysqli->query($sql);
            $logid = $mysqli->insert_id;
        }else {
            $logid = $rs['id'];
        }

        $startDate = $setdate." 00:00:00";
        $endDate = $setdate." 23:59:59";
        $sql   = "select * from api_mgbetdetail where Date >= '".$startDate."' and  Date <= '".$endDate."' ";

        $query	=	$mysqli->query($sql);
        while($rows = $query->fetch_array()){
            $reflag = $rows["reflag"];
            $validBetAmount = $rows["BetAmount"];
            $detailid = $rows["id"];
            if($reflag==0){
                if($validBetAmount>0){
                    $uid = $rows["AccountNo"];
                    //$sql =	"SELECT mgfs as mgfs FROM `k_user` where username='".$uid."' ";
                    //echo "$sql ";
                    //$queryUser	=  $mysqli->query($sql);
                    //$urs=	$queryUser->fetch_array();
                    //$mgfs	=	$urs['mgfs'];
					$mgfs	=	0;
                    $rerate = $mgfs;
                    if($mgfs==0||is_null($mgfs)){
                        $rerate = $mgfsbl;
                    }
                    if($mgfs==-0.01){
                        $sql=" update `api_mgbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                    }else {
                        $reamount = number_format($validBetAmount*$rerate,4);
                        $sql=" update `api_mgbetdetail` set `reamount` = '{$reamount}'  ,`rerate` = '{$rerate}'  , `reflag` = 1 , `redate` = '$currtime' WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                        $q2=$mysqli->affected_rows;
                        if($q2>0){
                            $mysqli->query("update `user_list` set `money` = `money` +'{$reamount}' WHERE `user_name` = '{$uid}'");
                            $q1=$mysqli->affected_rows;
                        }
                    }

                }else {
                    $sql=" update `api_mgbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                    $mysqli->query($sql);
                }
            }
        }
        $mysqli->query("update `api_crawler_log` set `status` = 1  WHERE `id` = '{$logid}'");
    }
}else if($type=="pt"){
    $sql		=	"SELECT *  FROM `api_crawler_log` where excedate='$setdate' and type='pt' ";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();

    if(is_null($rs)||$rs['status']==0){
        $currtime=date("Y-m-d H:i:s");
        $logid = 0;
        if(is_null($rs)){
            $sql="insert into api_crawler_log(type,excedate,status,createtime) values ('pt','$setdate',0,'$currtime')";
            $mysqli->query($sql);
            $logid = $mysqli->insert_id;
        }else {
            $logid = $rs['id'];
        }

        $startDate = $setdate." 00:00:00";
        $endDate = $setdate." 23:59:59";
        $sql   = "select * from api_ptbetdetail where GameDate >= '".$startDate."' and  GameDate <= '".$endDate."' ";

        $query	=	$mysqli->query($sql);
        while($rows = $query->fetch_array()){
            $reflag = $rows["reflag"];
            $validBetAmount = $rows["Bet"];
            $detailid = $rows["id"];
            if($reflag==0){
                if($validBetAmount>0){
                    $uid = $rows["uid"];
                    //$sql =	"SELECT mgfs as mgfs FROM `k_user` where username='".$uid."' ";
                    //echo "$sql ";
                    //$queryUser	=  $mysqli->query($sql);
                    //$urs=	$queryUser->fetch_array();
                    //$mgfs	=	$urs['mgfs'];
                    $ptfs	=	0;
                    $rerate = $ptfs;
                    if($ptfs==0||is_null($ptfs)){
                        $rerate = $ptfsbl;
                    }
                    if($ptfs==-0.01){
                        $sql=" update `api_ptbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                    }else {
                        $reamount = number_format($validBetAmount*$rerate,4);
                        $sql=" update `api_ptbetdetail` set `reamount` = '{$reamount}'  ,`rerate` = '{$rerate}'  , `reflag` = 1 , `redate` = '$currtime' WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                        $q2=$mysqli->affected_rows;
                        if($q2>0){
                            $mysqli->query("update `user_list` set `money` = `money` +'{$reamount}' WHERE `user_name` = '{$uid}'");
                            $q1=$mysqli->affected_rows;
                        }
                    }

                }else {
                    $sql=" update `api_ptbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                    $mysqli->query($sql);
                }
            }
        }
        $mysqli->query("update `api_crawler_log` set `status` = 1  WHERE `id` = '{$logid}'");
    }

}else if($type=="ab")
{


    $sql		=	"SELECT *  FROM `api_crawler_log` where excedate='$setdate' and type='ab' ";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();

    if(is_null($rs)||$rs['status']==0){
        $currtime=date("Y-m-d H:i:s");
        $logid = 0;
        if(is_null($rs)){
            $sql="insert into api_crawler_log(type,excedate,status,createtime) values ('ab','$setdate',0,'$currtime')";
            $mysqli->query($sql);
            $logid = $mysqli->insert_id;
        }else {
            $logid = $rs['id'];
        }

        $startDate = $setdate." 00:00:00";
        $endDate = $setdate." 23:59:59";
        $sql   = "select * from api_abbetdetail where betTime >= '".$startDate."' and  betTime <= '".$endDate."' ";

        $query	=	$mysqli->query($sql);
        while($rows = $query->fetch_array()){
            $reflag = $rows["reflag"];
            $validBetAmount = $rows["validAmount"];
            $detailid = $rows["id"];
            if($reflag==0){
                if($validBetAmount>0){
                    $uid = $rows["username"];
                    //$sql =	"SELECT mgfs as mgfs FROM `k_user` where username='".$uid."' ";
                    //echo "$sql ";
                    //$queryUser	=  $mysqli->query($sql);
                    //$urs=	$queryUser->fetch_array();
                    //$mgfs	=	$urs['mgfs'];
                    $abfs	=	0;
                    $rerate = $abfs;
                    if($abfs==0||is_null($abfs)){
                        $rerate = $abfsbl;
                    }
                    if($abfs==-0.01){
                        $sql=" update `api_abbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                        $mysqli->query($sql);
                    }else {
                        $reamount = number_format($validBetAmount*$rerate,4);
                        $sql=" update `api_abbetdetail` set `reamount` = '{$reamount}'  ,`rerate` = '{$rerate}'  , `reflag` = 1 , `redate` = '$currtime' WHERE `id` = '{$detailid}' ";
                        //echo $sql;
                        $mysqli->query($sql);
                        $q2=$mysqli->affected_rows;
                        if($q2>0){
                            $mysqli->query("update `user_list` set `money` = `money` +'{$reamount}' WHERE `user_name` = '{$uid}'");
                            $q1=$mysqli->affected_rows;
                        }
                    }

                }else {
                    $sql=" update `api_abbetdetail` set  `reflag` = 1 , `redate` = '$currtime',`rerate`=0 WHERE `id` = '{$detailid}' ";
                    $mysqli->query($sql);
                }
            }
        }
        $mysqli->query("update `api_crawler_log` set `status` = 1  WHERE `id` = '{$logid}'");
    }
}



if(!is_null($setdate)){
    $msg = "操作成功".$type;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>清除数据</title>

    <script language="JavaScript" src="../../js/jquery-1.7.1.js"></script>
    <script language="JavaScript" src="../../js/calendar.js"></script>
</head>
<body>
<p align="center" style="color:red;font-size:16px;"><?=$msg?></p>


<form id="form1" name="form1" method="post" action="setreamount.php" onsubmit="return(confirm('您确定要做反水操作吗'))">
    <div align="center">
        <br>
        <p align="center">AG反水计算</p>
        选择日期：
        <input name="agbdate" type="text" id="agbdate" value="<?=$bdate?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
        <input type="button" name="Submit" onClick="javascript:setdate('ag');"value="确定" />
        <p align="center">每天手动计算前一天的反水</p>
    </div>


  <div align="center">
	<br>
	<br>
  	<p align="center">MG反水计算</p>
	选择日期：
	<input name="nabdate" type="text" id="mgbdate" value="<?=$bdate?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
    <input type="button" name="Submit" onClick="javascript:setdate('mg');"value="确定" />
	<p align="center">每天手动计算前一天的反水</p>
  </div>

    <div align="center">
        <br>
        <br>
        <p align="center">BBIN反水计算</p>
        选择日期：
        <input name="nabdate" type="text" id="bbinbdate" value="<?=$bdate?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
        <input type="button" name="Submit" onClick="javascript:setdate('bbin');"value="确定" />
        <p align="center">每天手动计算前一天的反水</p>
    </div>

    <div align="center">
        <br>
        <br>
        <p align="center">PT反水计算</p>
        选择日期：
        <input name="nabdate" type="text" id="ptbdate" value="<?=$bdate?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
        <input type="button" name="Submit" onClick="javascript:setdate('pt');"value="确定" />
        <p align="center">每天手动计算前一天的反水</p>
    </div>


    <div align="center">
        <br>
        <br>
        <p align="center">ALLBet反水计算</p>
        选择日期：
        <input name="nabdate" type="text" id="abbdate" value="<?=$bdate?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
        <input type="button" name="Submit" onClick="javascript:setdate('ab');"value="确定" />
        <p align="center">每天手动计算前一天的反水</p>
    </div>
</form>


<br /><br />
</body>
<script>
    function setdate(type) {
        var bdate='';
        if(type=="ag"){
            bdate = $("#agbdate").val();
        }else if(type=="na"){
            bdate = $("#nabdate").val();
        }else if(type=="mg"){
            bdate = $("#mgbdate").val();
        }else if(type=="nt"){
            bdate = $("#ntbdate").val();
        }else if(type=="bbin"){
            bdate = $("#bbinbdate").val();
        }else if(type=="pt"){
            bdate = $("#ptbdate").val();
        }else if(type=="ab"){
            bdate = $("#abbdate").val();
        }


        var currdate = '<?=$sysdate?>';
        if(bdate==''){
            alert("请输入时间");
            return false ;
        }
        /*if(!didate(bdate,currdate)){
         alert("只能计算当天之前的反水");
         return false ;
         }*/
        $("#form1").attr("action","setreamount.php?type="+type+"&bdate="+bdate);
        document.getElementById('form1').submit();
    }

    function didate(a, b) {
        var arr = a.split("-");
        var starttime = new Date(arr[0], arr[1], arr[2]);
        var starttimes = starttime.getTime();

        var arrs = b.split("-");
        var lktime = new Date(arrs[0], arrs[1], arrs[2]);
        var lktimes = lktime.getTime();

        if (starttimes >= lktimes) {

            //alert('开始时间大于离开时间，请检查');
            return false;
        }
        else
            return true;

    }
</script>
</html>