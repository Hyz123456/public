<?php 
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/class/live_info.php");
include_once($C_Patch."/app/member/class/sys_config.php");
//include_once($C_Patch."/live/agid.php");
include_once($C_Patch."/app/member/class/user.php");

if(!isset($_SESSION)){ session_start();}
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
$loginid=   isset($_SESSION["uid"])? $_SESSION["uid"]:'';
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"])){
    header("Location:/index.php");
    exit();
}
unset($mysqli);
$mysqli	=	new MySQLi("127.0.0.1","root","root123654","aobet");
$mysqli->query("set names utf8");


//$user_info = live_info::getUserAndLife($_SESSION["userid"],'BBIN');
if(true){
    $sql = "select * from user_list u where u.user_id='".$_SESSION["userid"]."' limit 0,1";
    $query	=	$mysqli->query($sql);
    $user_info    =	$query->fetch_array();
}


$bbinstyle="";
//if($bbinid!=""){
if(false){
	//$user_info_bbin = live_info::getUserAndLife($_SESSION["userid"],'BBIN');
}
else{
	$bbinstyle="style=\"display: none;\"";
}
//$min_change_money = sys_config::getMinChangeMoney();


//--------------------------

//$userinfo2  =  user::getinfo($_SESSION["userid"]);
//if($userinfo2['bb_username']!=''){$bbinid = "dg555668";}


//  ---------------------------------0505----------------------

$action=isset($_GET['action'])? $_GET['action']:'';
if($action=='save'){
    $userinfo       =   user::getinfo($uid);
    $username  = $userinfo['user_name'];
    $agusername  = $userinfo["ag_username"];
    $bbusername  = $userinfo["bb_username"];
	$mgusername  = $userinfo["mg_username"];
	$abusername  = $userinfo["ab_username"];
	$ptusername  = $userinfo["pt_username"];
	$nausername  = $userinfo["na_username"];
    $zztype=isset($_POST['zz_type'])? $_POST['zz_type']:'';
    $zzmoney=isset($_POST['zz_money'])? $_POST['zz_money']:'';
	
    if($agusername=="" && ($zztype==1||$zztype==2) ){
        include_once($C_Patch . "/newag2/config.php");
        include_once($C_Patch."/newag2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        $agusername = $top_pre.randomnames(6);
        if(!$bbinapi->GameUserRegister($agusername, $agpassword)){
            //echo "<script>alert('请联系管理员开通AG账号');</script>";exit;
            echo '请联系管理员开通AG账号';exit;
        }  
        
        $sql = "update user_list set ag_username = '$agusername',ag_password = '$agpassword' where user_name = '$username'";
        $mysqli->query($sql);
        
        unset($pre); unset($comId); unset($comKey); unset($top_pre);
        unset($agpassword);  unset($gamePlatform); 
    }

    if($bbusername=='' && ($zztype==7||$zztype==8) ){
        include_once($C_Patch . "/newbbin2/config.php");
        include_once($C_Patch."/newbbin2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        $bbusername = $top_pre.randomnames(6);
        if(!$bbinapi->GameUserRegister($bbusername, $agpassword)){ 
           //echo "<script>alert('请联系管理员开通BBIN账号');</script>";exit;
           echo '请联系管理员开通BBIN账号'; exit;
        }  
        
        $sql = "update user_list set bb_username = '$bbusername',bb_password = '$agpassword' where username = '$username'";
        $mysqli->query($sql);
        
        unset($pre); unset($comId); unset($comKey); 
        unset($agpassword);  unset($gamePlatform);         
    }

	if($abusername=='' && ($zztype==3||$zztype==4) ){
        include_once($C_Patch."/newallbet2/config.php");
        include_once($C_Patch."/newallbet2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$apiKey);
        $abusername = $pre.randomnames(6);
									$regstatus = $bbinapi->GameUserRegister($abusername, $agpassword);
									//echo $regstatus;
									//$agusername = $agusername;
									if($regstatus=='1'){
										$sql = "update user_list set ab_username = '$abusername',ab_password = '$agpassword' where user_name = '$username'";
										 $mysqli->query($sql);
										//echo "<script>window.location.reload();</script>";
										
									}else{
										echo "<script>alert('请联系管理员开通NA账号');</script>";
                                       exit;
									}      
        
      
        unset($pre); unset($comId); unset($comKey); 
        unset($agpassword);  unset($gamePlatform);         
    }

	if($mgusername=='' && ($zztype==5||$zztype==6) ){
        include_once($C_Patch."/newmg2/config.php");
        include_once($C_Patch."/newmg2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        $mgusername = $top_pre.randomnames(6);
        if(!$bbinapi->GameUserRegister($mgusername, $agpassword)){ 
           //echo "<script>alert('请联系管理员开通BBIN账号');</script>";exit;
           echo '请联系管理员开通MG账号'; exit;
        }  
        
        $sql = "update user_list set mg_username = '$mgusername',mg_password = '$agpassword' where username = '$username'";
        $mysqli->query($sql);
        
        unset($pre); unset($comId); unset($comKey); 
        unset($agpassword);  unset($gamePlatform);         
    }
	if($ptusername=='' && ($zztype==9||$zztype==10) ){
        include_once($C_Patch."/newpt2/config.php");
        include_once("/app/member/class/user.php");
		include_once("/newpt2/ptapi.php");
        $agusername = strtoupper($toppre.$username);
		$regstatus = PlayerCreate($agusername, $agpassword);
        if($regstatus=='1'){
			$sql = "update user_list set pt_username = '$agusername',pt_password = '$agpassword' where user_name = '$username'";
			 $mysqli->query($sql);
			//echo "<script>window.location.reload();</script>";
			
		}else{
			echo "<script>alert('请联系管理员开通PT账号');</script>";
		   exit;
		}                  
				        
    }
if($ptusername=='' && ($zztype==11||$zztype==12) ){
        include_once($C_Patch."/newna2/config.php");
      
		include_once("/newna2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$apiKey);
        $abusername = $pre.randomnames(6);
									$regstatus = $bbinapi->GameUserRegister($nausername, $agpassword);
									//echo $regstatus;
									//$agusername = $agusername;
									if($regstatus=='1'){
										$sql = "update user_list set na_username = '$nausername',na_password = '$agpassword' where user_name = '$username'";
										 $mysqli->query($sql);
										//echo "<script>window.location.reload();</script>";
										
									}else{
										echo "<script>alert('请联系管理员开通ALLBET账号');</script>";
                                       exit;
									}      
        
      
        unset($pre); unset($comId); unset($comKey); 
        unset($agpassword);  unset($gamePlatform);                  
				        
    }
    //---------------------------------------------------------


    
    $sql = "select * from user_list where user_id='$uid'";
    $result = $mysqli->query($sql);
    $row=$result->fetch_array();
    //$conver=htmlEncode(doubleval($zzmoney));
    $conver=doubleval($zzmoney);

    if( ($zztype==1||$zztype==7||$zztype==3||$zztype==5 || $zztype==9||$zztype==11) && (($conver<0)||($conver>$row["money"])) ){
        //echo "<script>alert('转账金额不能大于账户余额，请重新输入。'); history.go(-1);</script>";
    	echo '转账金额不能大于账户余额，请重新输入。';
        exit;
    }

    if($zztype==1 || $zztype==2){
        include_once($C_Patch . "/newag2/config.php");
        include_once($C_Patch."/newag2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        if($zztype==1){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->AG大厅";
            $result = $bbinapi->TransferIn($agusername, $password, $conver);
        }
        elseif($zztype==2){
            $pay_value=$conver;
            $about = "AG大厅->体育/彩票账户";
            $result = $bbinapi->TransferOut($agusername, $password, $pay_value);
        }
    }
    elseif($zztype==7 || $zztype==8){
        include_once($C_Patch . "/newbbin2/config.php");
        include_once($C_Patch."/newbbin2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        if($zztype==7){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->BBIN大厅";
            $result = $bbinapi->TransferIn($bbusername, $password, $conver);
        }
        elseif($zztype==8){
            $pay_value=$conver;
            $about = "BBIN大厅->体育/彩票账户";
            $result = $bbinapi->TransferOut($bbusername, $password, $pay_value);
        }
    }
	elseif($zztype==3 || $zztype==4){
        include_once($C_Patch."/newallbet2/config.php");
        include_once($C_Patch."/newallbet2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$apiKey);
        if($zztype==3){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->ALLBET大厅";
			
			$ro = mt_rand(100000, 999999);
			$orderSN = time().$ro;
				//echo $agusername."_".$orderSN."_".$conver;exit;
			$result = $bbinapi->TransferIn($abusername, $orderSN, $conver);
        }
        elseif($zztype==4){
            $pay_value=$conver;
            $about = "ALLBET大厅->体育/彩票账户";
            $ro = mt_rand(100000, 999999);
				$orderSN = time().$ro;
				//echo $agusername."_".$orderSN."_".$conver;exit;
				$result = $bbinapi->TransferOut($abusername, $orderSN, $conver);
        }
    }
	 elseif($zztype==5 || $zztype==6){
        include_once($C_Patch."/newmg2/config.php");
        include_once($C_Patch."/newmg2/api.class2.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        if($zztype==5){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->MG大厅";
            $result = $bbinapi->TransferIn($mgusername, $password, $conver);
			//echo $result;
        }
        elseif($zztype==6){
            $pay_value=$conver;
            $about = "MG大厅->体育/彩票账户";
            $result = $bbinapi->TransferOut($mgusername, $password, $pay_value);
        }
    }
	elseif($zztype==9 || $zztype==10){
        include_once($C_Patch."/newpt2/config.php");
        include_once("/app/member/class/user.php");
		include_once("/newpt2/ptapi.php");
		$agusername = $userinfo['pt_username'];
		$opCredit = $pay_value;
        if($zztype==9){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->PT大厅";
            $result = PT_Deposit($agusername, '123456', $conver); 
        }
        elseif($zztype==10){
            $pay_value=$conver;
            $about = "PT大厅->体育/彩票账户";
            $result0 = PlayerLogout($agusername);
		    $result = PT_Withdraw($agusername, '123456', $conver);
        }
    }
	 elseif($zztype==11 || $zztype==12){
       include_once($C_Patch."/newna2/config.php");
        include_once($C_Patch."/newna2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$apiKey);
        if($zztype==11){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->NA大厅";
			
			
				//echo $agusername."_".$orderSN."_".$conver;exit;
			$result = $bbinapi->TransferIn($nausername, $password, $conver);
        }
        elseif($zztype==12){
            $pay_value=$conver;
            $about = "NA大厅->体育/彩票账户";
          
				//echo $agusername."_".$orderSN."_".$conver;exit;
				$result = $bbinapi->TransferOut($nausername, $password, $conver);
        }
    }
    if($result==1){
		
        try{
	        $mysqli->autocommit(FALSE);
	        $mysqli->query("BEGIN"); 
	        $sql="update user_list set money=money+$pay_value where user_id='$uid'";
	        $mysqli->query($sql);
	        $q1=$mysqli->affected_rows;
	        
	        $order=date("YmdHis")."_".$_SESSION['username'];
	        $change_money = intval($pay_value);
	        $assets = $row["money"];
	        $datereg=   date("YmdHis").randomkeys(4);

	        if($zztype==1 || $zztype==7 || $zztype==3 || $zztype==5 || $zztype==9|| $zztype==11)  $balance = $assets-$change_money;
	        elseif($zztype==2 || $zztype==8 || $zztype==6 || $zztype==4 || $zztype==10|| $zztype==12)  $balance = $assets+$change_money;
	        
	        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`,username) VALUES ('$uid','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance','";
			
if($zztype==1 || $zztype==2){$sql.="$agusername');";}
elseif($zztype==7 || $zztype==8){$sql.="$bbusername');";}
elseif($zztype==5 || $zztype==6){$sql.="$mgusername');";}
elseif($zztype==3 || $zztype==4){$sql.="$abusername');";}
elseif($zztype==11 || $zztype==12){$sql.="$nausername');";}
elseif($zztype==9 || $zztype==10){$sql.="$ptusername');";}
			
	        $mysqli->query($sql) or die($sql);
	        $q2=$mysqli->affected_rows;
	        if($q1==1 && $q2==1){
	             $mysqli->commit();
	             //message('转换申请已经提交转换.','money_change.php');
	             echo '转换申请已经提交转换.'; exit;
	        }else{
	            $mysqli->rollback(); //数据回滚
	            //message("由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。",'money_change.php');
	            echo "由于网络堵塞，本次申请提款2失败。请您稍候再试，或联系在线客服。";
	            exit;
	        }

	    }catch(Exception $e){
	        $mysqli->rollback(); 
	        //message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
	        echo '数据量异常!'; exit;
	    }
    }
    elseif(strpos($result,'信用额度不足')>0){
        //$result0 = '信用额度不足';
        //echo "转入失败,".$result0;
        //exit("<script>alert('信用额度不足！');history.back();</script>");
        echo '信用额度不足！'; exit;
    }
    else{
        echo "转入失败,请2分钟后尝试!";
	    
		exit;
        //exit("<script>alert('".$result."！');history.back();</script>");
    }

}

function randomkeys($length)
{
 $pattern='1234567890';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,9)}; 
 }
 return $key;
}

?>

<html>
<head>
<meta charset='utf-8' />
</head>
<body>
<style>
	#yinyin{width:177px;height:140px;background-image:url('/cl/circlebg1.png');float:left;background-repeat:no-repeat;position: relative;left: 10px;}
	

	#wenzi{float:left;}
</style>
<div id="yinyin">
	
</div>
<div id="wenzi">
	<img src="/cl/welcome.png" style="margin-left: -40px;margin-top: 15px;"><br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 13px;">用户名:
		<span style="color:#C77124;font-size:16px;font-weight: 100;"><?=$user_info["user_name"]?></span>
	</span>
	<br>
	<span style="margin-left: -33px;font-weight: bold;font-family: 微软雅黑;line-height: 30px;font-size: 13px;">余　额:
		<img src="/tpl/commonImage/money_RMB.gif" align="absmiddle" title="人民币" alt="人民币" style="position: relative;top: -3px;">
		<span style="color:#C77124;font-size:16px;font-weight: 100;"><?=$user_info["money"]?><span style="color:#000;font-size:15px;margin-left: 10px;">人民币(RMB)</span></span>
	</span>
</div>
<div style="clear: both;"></div>
<!-- 
<div id="MACenterContent">
    <div id="MNav">
    <span class="mbtn">额度转换</span>
        <div class="navSeparate" style="display: none;"></div>
a href="javascript: f_com.MChgPager({method: 'bankSavings'});" class="mbtn">线上存款</a>
<div class="navSeparate"></div>
<a href="javascript: f_com.MChgPager({method: 'bankATM'});" class="mbtn">银行汇款</a>
<div class="navSeparate"></div>
<a href="javascript: f_com.MChgPager({method: 'bankTake'});" class="mbtn">线上取款</a
    </div>
    <div id="MMainData"  >







     <h2 class="MSubTitle">目前额度</h2>
     <table class="MMain" border="1" style="margin-bottom: 8px;margin-top:0px;width:700px;font-size:10px;position:relative;">
            <thead>
            <tr>
                <th style="width: 25%;" nowrap>类型</th>
              <th style="width: 25%;" nowrap>帐户</th>
                <th style="width: 25%;" nowrap>余额</th>
                <th style="width: 25%;" nowrap>更新时间</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="25%" style="text-align: center;padding:6px;">主账户</td>
              <td width="25%" style="text-align: center;padding:6px;"><?=$user_info["user_name"]?></td>
                <td width="25%" style="text-align: center;padding:6px;"><span id="MBallCredit"><?=$user_info["money"]?></span>&nbsp;&nbsp;</td>
               <td width="25%" style="text-align: center;"><?=date("Y-m-d H:i:s")?></td>
            </tr>
            <tr>
                <td style="text-align: center;padding:6px;">AG娱乐场</td>
               <td style="text-align: center;padding:6px;"><?=array_key_exists("ag_username",$user_info)?($user_info["ag_username"]?$user_info["ag_username"]:"未开通"):"未接入"?>
                <td style="text-align: center;padding:6px;"><span id="MSunplusCredit"><?=$user_info["ag_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info["update_time"]?></td>
            </tr>
        
        			<tr>
                <td style="text-align: center;padding:6px;">BBIN娱乐场</td>
               <td style="text-align: center;padding:6px;"><?=array_key_exists("bb_username",$user_info)?($user_info["bb_username"]?$user_info["bb_username"]:"未开通"):"未接入"?>
                </td>
                <td style="text-align: center;padding:6px;"><span id="general"><?=$user_info["bb_money"]?></span>&nbsp;&nbsp;</td>
               <td style="text-align: center;"><?=$user_info_bbin["update_time"]?></td>
            </tr>
        			
        			
        					<tr>
                <td style="text-align: center;padding:6px;">欧博娱乐场</td>
               <td style="text-align: center;padding:6px;"><?=array_key_exists("ab_username",$user_info)?($user_info["ab_username"]?$user_info["ab_username"]:"未开通"):"未接入"?>
                </td>
                <td style="text-align: center;padding:6px;"><span id="general_ab"><?=$user_info["ab_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info_bbin["update_time"]?></td>
            </tr>
        			<tr>
                <td style="text-align: center;padding:6px;">MG娱乐场</td>
                <td style="text-align: center;"><?=array_key_exists("mg_username",$user_info)?($user_info["mg_username"]?$user_info["mg_username"]:"未开通"):"未接入"?>
                </td>
                <td style="text-align: center;"><span id="general_mg"><?=$user_info["mg_money"]?></span>&nbsp;&nbsp;</td>
               <td style="text-align: center;"><?=$user_info_bbin["update_time"]?></td>
            </tr>
        
        			<tr>
                <td style="text-align: center;padding:6px;">PT娱乐场</td>
               <td style="text-align: center;padding:6px;"><?=array_key_exists("pt_username",$user_info)?($user_info["pt_username"]?$user_info["pt_username"]:"未开通"):"未接入"?>
                </td>
                <td style="text-align: center;padding:6px;"><span id="general_pt"><?=$user_info["pt_money"]?></span>&nbsp;&nbsp;</td>
               <td style="text-align: center;"><?=$user_info_bbin["update_time"]?></td>
            </tr>
        
        			<tr>
                <td style="text-align: center;padding:6px;">NA娱乐场</td>
                <td style="text-align: center;padding:6px;"><?=array_key_exists("na_username",$user_info)?($user_info["na_username"]?$user_info["na_username"]:"未开通"):"未接入"?>
                </td>
                <td style="text-align: center;padding:6px;"><span id="general_na"><?=$user_info["na_money"]?></span>&nbsp;&nbsp;</td>
               <td style="text-align: center;"><?=$user_info_bbin["update_time"]?></td>
            </tr>
            </tbody>
        </table> 
       <h2 class="MSubTitle" style="    margin-left: 38px;font-size: 20px;">额度转换</h2>
	   cl/pages/money_change1.php?action=save
        <form action="" id="form1" method="post" name="form1"  style="width:780px;margin-left:-8px;">
        <table class="MMain MNoBorder" style="font-size:14px;">
        tr>
            <td nowrap>钱包转账：</td>
            <td>
                <a href="javascript: f_com.MChgPager({method: 'liveHistory'});">查询转账记录</a>
            </td>
        </tr
           <tr>
                <td nowrap style="width:223px;padding:4px 8px 0 0px;text-align:center;">
                    转账选择：
                </td>
            				
            				
            				
            				<style>
            				
            				 select option{line-height:30px;height:30px;margin:5px auto;}
            				</style>
                <td style="padding:2px 8 0 0px;">
                    <select name="zz_type" id="zz_type" style="font-size:14px;margin-left:50px;">
                        <option value="1">主账户<strong>→</strong>AG娱乐场</option>
                        <option value="7">主账户<strong>→</strong>BBIN娱乐场</option>
            						<option value="5">主账户<strong>→</strong>MG娱乐场</option>
            						<option value="3">主账户<strong>→</strong>欧博娱乐场</option> 
            						<option value="9">主账户<strong>→</strong>PT娱乐场</option>
            						<option value="11">主账户<strong>→</strong>NA娱乐场</option>
                        <option value="2">AG娱乐场<strong>→</strong>主账户</option>
                        <option value="8">BB娱乐场<strong>→</strong>主账户</option>
            						<option value="6">MG娱乐场<strong>→</strong>主账户</option>
            						<option value="4">欧博娱乐场<strong>→</strong>主账户</option>
            						<option value="10">PT娱乐场<strong>→</strong>主账户</option>
            						<option value="12">NA娱乐场<strong>→</strong>主账户</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td nowrap style="padding:4px 8px 0 0px;text-align:center;" >
                    转账金额：
                </td>
                <td style="padding:4px 8px 0 0px;">
                    <input type="text" name="zz_money" style="margin-left:50px;" id="zz_money" onkeyup="if(isNaN(value))execCommand('undo')" /> &nbsp;最低:1元
                </td>
            </tr>
            <tr>
                <td nowrap style="padding:4px 8px 0 0px;;"></td>
                <td style="padding:4px 8px 0 0px;">
                    <input type="button" style="margin-left:50px;"  onclick="confirmChangeMoney()" value="确认转账" />
            
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
 -->

<style>
	#yue{background-color:#DCDCDC;width:705px;height:147px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}

	#yue1{background-color:#DCDCDC;width:705px;height:99px;background-image:url('/img/table_bg.png');background-repeat:no-repeat;margin-top:10px;clear: both;}

	.kkk1{width:175px;height:53px;border-bottom: 1px solid #C2C2C2;text-indent: 1em;float:left;padding-top:4px;
    border-right: 1px solid #C2C2C2;}

	.kkk2{margin-top: 7px;color:red;}

	.tab1{width: 194px;height: 31px;line-height: 31px;text-align: center;font-family: 微软雅黑;font-size: 15px;color: #fff;float:left;}

	.tx{width: 705px;height: 19px;background-color: #ccc;clear: both;text-align: right;color: #000;line-height: 19px;font-size: 13px;}

	.tab2{cursor:pointer;width:194px;height:49px;border-right:1px solid #C2C2C2;float:left;text-align: center;line-height: 49px;}
	
	.bd{width: 194px;height: 49px;border: none;background-color: #DCDCDC;outline: none;color: #666;font-size: 15px;text-indent: 1em;font-family: 微软雅黑;}
    
    .qr{width: 120px;border: none;height: 50px;outline: none;    color: #C77124;background: #ccc;font-weight: bold;font-size: 15px;font-family: 微软雅黑;}


	.xiala{width:192px;height:78px;line-height:26px;text-align:center;background-color:#EDEDED;border:1px solid #D6D6D6;overflow: auto;overflow-x:hidden}

	.xiala1{cursor:pointer;width:192px;height:26px;line-height:26px;text-align:center;background-color:#EDEDED;}
/*定义滚动条高宽及背景 高宽分别对应横竖滚动条的尺寸*/  
.xiala::-webkit-scrollbar  
{  
    width: 10px;  
    height: 10px;  
    background-color: #F5F5F5;  
}  
  
/*定义滚动条轨道 内阴影+圆角*/  
.xiala::-webkit-scrollbar-track  
{  
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);  
    border-radius: 10px;  
    background-color: #F5F5F5;  
}  
  
/*定义滑块 内阴影+圆角*/  
.xiala::-webkit-scrollbar-thumb  
{  
    border-radius: 10px;  
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);  
    background-color: #999;
}

/*鼠标滑过滑动条*/
.xiala::-webkit-scrollbar-thumb:hover{
	background-color:#666;
}  
.xiala1:hover{background-color:#C77124;}

#zhuanru{display:none;}

#zhuanchu{display:none;}
</style>


<span style="height: 23px;line-height: 23px;color:#000;margin: 5px 10px 10px;font-weight: bold;clear: both;">额度转换</span>

<div id="yue1">

		<div class="tab1">转入</div>
		<div class="tab1">转出</div>
		<div class="tab1" style="width:317px;">填写金额</div>
		<div class="tx">金额仅可输入整数,谢谢&nbsp;&nbsp;&nbsp;</div>

		<div class="tab2" id="rururu">请选择<img src="/cl/btn_show.png" style="position: relative;top: 2px;left: 3px;"></div>
		<div class="tab2" id="chuchuchu">请选择<img src="/cl/btn_show.png" style="position: relative;top: 2px;left: 3px;"></div>
		<div class="tab2">
			<input type="text" class="bd"  onfocus="if(this.value=='填写金额'){this.value='';}" onblur="if(this.value==''){this.value='填写金额';document.getElementById('mockpass').focus();}else{document.getElementById('mockpass').focus();}" value="填写金额">
		</div>

		<div class="tab2" style="width: 118px;border: none;">
			<input type="submit" value="确认" class="qr">
		</div>
		
		<div class="xiala" style="position: absolute;top:290px;" id="zhuanru">
			<div class="xiala1">主账户</div>
			<div class="xiala1">AG</div>
			<div class="xiala1">BBIN</div>
			<div class="xiala1">MG</div>
			<div class="xiala1">NA</div>
			<div class="xiala1">AB</div>
			<div class="xiala1">PT</div>
		</div>

		<div class="xiala" style="position: absolute;top:290px;left:204px;" id="zhuanchu">
			<div class="xiala1">主账户</div>
			<div class="xiala1">AG</div>
			<div class="xiala1">BBIN</div>
			<div class="xiala1">MG</div>
			<div class="xiala1">NA</div>
			<div class="xiala1">AB</div>
			<div class="xiala1">PT</div>
		</div>






</div>

<img src="/cl/shadow03.png">

<script type="text/javascript" src='js/jquery-1.7.1.js'></script>
<script type="text/javascript">
		$(document).ready(function(){
    			$('#rururu').click(function(){
							 $('#zhuanru').slideToggle(300);
							 console.log( $('.xiala').size() );
					});

    			$('#chuchuchu').click(function(){
							 $('#zhuanchu').slideToggle(300);

					});
    			})
</script>

<br>

 <span style="height: 23px;line-height: 23px;color:#000;margin: 5px 10px 10px;font-weight: bold;">游戏余额</span>

<div id="yue">　
	
	<div style="width:10px;height:10px;"></div>
	
	<div class="kkk1">
		AG
		<br>
		<div class="kkk2" id="MSunplusCredit"><?=$user_info["ag_money"]?></div>
	</div>
	<div class="kkk1">
		BBIN
		<br>
		<div class="kkk2" id="general"><?=$user_info["bb_money"]?></div>
	</div>
	<div class="kkk1">
		MG
		<br>
		<div class="kkk2" id="general_mg"><?=$user_info["mg_money"]?></div>
	</div>
	<div class="kkk1" style="border-right:none;">
		PT
		<br>
		<div class="kkk2" id="general_pt"><?=$user_info["pt_money"]?></div>
		</div>
	<div class="kkk1">
		NA
		<br>
		<div class="kkk2" id="general_na"><?=$user_info["na_money"]?></div>
		</div>
	<div class="kkk1">
		AB
		<br>
		<div class="kkk2" id="general_ab"><?=$user_info["ab_money"]?></div>
	</div>

</div>

<img src="/cl/shadow03.png"> 





<div class="mask"><div  class="loading_tip"><img src="/img/loading.gif" /><br><span>转换中...</span></div></div>
<div class="mask2"><div  class="loading_tip"><img src="/img/loading.gif" /><br><span>更新帐户信息中...</span></div></div>
<script type="text/javascript">
   
	
    function ALL_money(){
        $.getJSON("../app/member/getdata.php?callback=?", function (json) {
            if (json.close == 1) {
                parent.location.href = '/close.php';
            }
            $("#MBallCredit").html(json.user_money);
        });
    }
    function AG_money(){
        $.get("./newag2/cha.php?callback=?",function(data){
           data = eval('('+data+')');
           $("#MSunplusCredit").html(data.general);
          
        });

    }
    function BB_money(){
        $.get("./newbbin2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general").html(data.general);
        });

    }
	function MG_money(){
        $.get("./newmg2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_mg").html(data.general);
        });

    }
	function AB_money(){
        $.get("./newallbet2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_ab").html(data.general);
        });

    }
	function PT_money(){
        $.get("./newpt2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_pt").html(data.general);
        });

    }

	function NA_money(){
        $.get("./newna2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_na").html(data.general);
        });

    }
    AG_money(); BB_money();MG_money();AB_money();PT_money();NA_money();

 
</script>
<script type="text/javascript">
    function confirmChangeMoney(){
        if(confirm("确定转账吗？")){
            /*if($("#MSunplusCredit").text()=='未开通' || (!$("#MSunplusCredit").text()) ){
                if($("#zz_type").val()==2||$("#zz_type").val()==1){
                    alert('请进入AGIN游戏开通账号');
                    return;
                }
            }
            if($("#general").text()=='未开通' || (!$("#general").text()) ){
                if($("#zz_type").val()==7||$("#zz_type").val()==8){
                    alert('请进入BBIN游戏开通账号');
                    return;
                }
            }
			if($("#general_ab").text()=='未开通' || (!$("#general_ab").text()) ){
                if($("#zz_type").val()==3||$("#zz_type").val()==4){
                    alert('请进入ALLBET游戏开通账号');
                    return;
                }
            }
			if($("#general_mg").text()=='未开通' || (!$("#general_mg").text()) ){
                if($("#zz_type").val()==5||$("#zz_type").val()==6){
                    alert('请进入MG游戏开通账号');
                    return;
                }
            }
			if($("#general_pt").text()=='未开通' || (!$("#general_pt").text()) ){
                if($("#zz_type").val()==9||$("#zz_type").val()==10){
                    alert('请进入PT游戏开通账号');
                    return;
                }
            }
			if($("#general_na").text()=='未开通' || (!$("#general_na").text()) ){
                if($("#zz_type").val()==11||$("#zz_type").val()==12){
                    alert('请进入NA游戏开通账号');
                    return;
                }
            }*/
            if(!$("#zz_money").val()){
                alert("请输入转账金额。");
                return;
            }
            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test($("#zz_money").val())){
                alert('请输入整数。');
                return;
            }
            if( ($("#zz_money").val()<1)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==1 || $("#zz_type").val()==7 || $("#zz_type").val()==3 || $("#zz_type").val()==5 || $("#zz_type").val()==9|| $("#zz_type").val()==11) && ($("#MBallCredit").text()-$("#zz_money").val()<0)){
                alert("主账户余额 小于 转账金额，请重新输入。");
                return;
            }
          if(($("#zz_type").val()==2) && ($("#MSunplusCredit").text()<$("#zz_money").val()) ){
                alert("真人AG账户余额 小于 转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==8) && ($("#general").text()<$("#zz_money").val()) ){
                alert("真人BB账户余额 小于 转账金额，请重新输入。");
                return;
            }
			if(($("#zz_type").val()==4) && ($("#general_ab").text()<$("#zz_money").val()) ){
                alert("真人ALLBET账户余额 小于 转账金额，请重新输入。");
                return;
            }
			if(($("#zz_type").val()==6) && ($("#general_mg").text()<$("#zz_money").val()) ){
                alert("真人MG账户余额 小于 转账金额，请重新输入。");
                return;
            }
			if(($("#zz_type").val()==10) && ($("#general_pt").text()<$("#zz_money").val()) ){
                alert("真人PT账户余额 小于 转账金额，请重新输入。");
                return;
            }
			if(($("#zz_type").val()==12) && ($("#general_na").text()<$("#zz_money").val()) ){
                alert("真人PT账户余额 小于 转账金额，请重新输入。");
                return;
            }
            var aa=$("#zz_type").val();
            var bb=$("#zz_money").val();
			$(".mask").css("display", "block");
            $.ajax({
                type:'post',
                url:'/moneychange4.php?action=save',
                data:{'zz_type':aa,'zz_money':bb},
                beforeSend:function(x){
                    console.log(this.data.zz_type+" "+this.data.zz_money);
                },
                success:function(d){
					$(".mask").css("display", "none");
                    alert(d);
                    AG_money(); BB_money();AB_money();MG_money(); ALL_money();PT_money();NA_money();
                },
				complete : function(XMLHttpRequest,status){ //请求完成后最终执行参数
	　　　　		if(status=='timeout'){
	　　　　　		alert("超时");
	　　　　		}
						if(status=='error'){
	　　　　　		alert("远程服务器错误，请稍候再试");
	　　　　		}
	　　		}
            })

        }
    }
</script>


<style type="text/css">
body{
    color:#000;
    padding-top:10px; 
	font-family:微软雅黑;
}
.mask,.mask2{filter:alpha(opacity=80); -moz-opacity:0.8; -khtml-opacity: 0.8; opacity: 0.8;position:absolute;top:0px; left:0px; width:100%;height:400px; text-align:center;display:none;}
#MACenterContent{
    width: 100%;
    margin:0 auto;
	margin-top:-10px;
}
table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 90%;  
    margin:0 auto;

    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;     
}
table tr:hover {
    background: rgb(91,78,214);
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
} 
table td, table th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 8px;
    text-align: left;    
}     
table th {
    background-color: #ccc;
    /*background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); */
}
table th{
    text-align: center;
}
select{
    font-size: 16px;
}


</style>



</body>
</html>
