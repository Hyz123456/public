<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/class/user.php");

$uid	=	@$_SESSION['userid'];
$loginid=	@$_SESSION['user_login_id'];
//renovate($uid,$loginid); //验证是否登陆
$t		=	user::getinfo($uid);

$sql	=	"select * from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row_sys	=	$query->fetch_array();

if(@$_GET["action"]=="tikuan"){
    $yzm	=	strtolower($_POST["vlcodes"]);
	if($yzm!=$_SESSION["randcode"]){   
		message("验证码错误，请重新输入。");
	}
	
	$_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码
	
	$sql	=	"select qk_pass from user_list where user_id='$uid' limit 1";
	$query	=	$mysqli->query($sql);  		
	$rs		=	$query->fetch_array();
	if($rs['qk_pass']!=md5($_POST["qk_pwd"])){
		message("取款密码错误，请重新输入。");
	}
	
	$pay_value	=	htmlEncode(doubleval($_POST["pay_value"]));//提款金额
	if(($pay_value<0)||($pay_value>$t["money"])){
		message('提款金额错误，请重新输入。');
	}
	
	$arr_ck	=	array(); //所有存款
	$arr_zd	=	array(); //所有注单
	$ck_sum	=	0; //存款总金额
	$xz_sum	=	0; //下注总金额
	$time	=	'';
	$where	=	'';
	
//	$sql	=	"select m_make_time from k_money where uid=$uid and m_value<0 and `status`=1 and `type`=1 order by m_make_time desc limit 1"; //取出用户最后一次取款时间
//	$query	=	$mysqli->query($sql);
//	$rs		=	$query->fetch_array();
//	if($rs){ //有过取款
//		$time	=	$rs['m_make_time'];
//	}
//	if($time != ''){ //有过取款记录
//		$where	=	" and m_make_time>'".$time."'";
//	}
//	$sql	=	"select m_value as money,m_make_time from k_money where uid='$uid' and m_value>0 and `status`=1 and `type`=1 and (about is null or about='' or about='The order system is successful' or about='该订单手工操作成功')".$where; //取出用户所有存款记录
//	$query	=	$mysqli->query($sql);
//	while($rs = $query->fetch_array()){ //有过存款
//		$arr_ck[strtotime($rs['m_make_time'])]	+=	$rs['money'];
//	}
//	if($time != ''){ //有过取款记录
//		$where = " and adddate>'".$time."'";
//	}
//	$sql	=	"select money,zsjr,`adddate` from huikuan where uid='$uid' and `status`=1".$where; //取出用户所有汇款金额
//	$query	=	$mysqli->query($sql);
//	while($rs = $query->fetch_array()){ //有过存款
//		$arr_ck[strtotime($rs['adddate'])]	+=	$rs['money']+$rs['zsjr'];
//	}
//
//	if($time != '') $where = " and bet_time>'".$time."'";
//	if($time != '') $where1 = " and `adddate`>'".$time."'";
//	$sql	=	"select bet_money as money,bet_time,`status` from k_bet where uid='$uid' and `status` not in(0,3,8)".$where; //取出用户单式下注记录
//	$query	=	$mysqli->query($sql);
//	while($rs = $query->fetch_array()){
//		if($rs['status']==1 || $rs['status']==2){ //输赢都算是全额下注
//			$arr_zd[strtotime($rs['bet_time'])] += $rs['money'];
//		}else{ //输一半，赢一半，只能算是半额下注
//			$arr_zd[strtotime($rs['bet_time'])] += $rs['money']/2;
//		}
//	}
//	$sql	=	"select bet_money as money,bet_time from k_bet_cg_group where uid='$uid' and `status`=1".$where; //取出用户串关下注记录
//	$query	=	$mysqli->query($sql);
//	while($rs = $query->fetch_array()){
//		$arr_zd[strtotime($rs['bet_time'])] += $rs['money'];
//	}
//
//	$sql	=	"select sum_m,adddate as bet_time from ka_tan where username='".$_SESSION['username']."' and `checked`=1".$where1; //取出用户6下注记录
////	echo $sql;exit;
//	$query	=	$mysqlit->query($sql);
//	while($rs = $query->fetch_array()){
//		$arr_zd[strtotime($rs['bet_time'])] += $rs['sum_m'];
//	}
//
//	ksort($arr_ck); //从小到大排序
//	ksort($arr_zd); //从小到大排序
//
//	$arr_temp	=	array(); //临时数组
//	$num		=	0;
//	foreach($arr_ck as $k=>$v){
//		$arr_temp[$num++]	=	$k;
//	}
//	$arr_temp[$num]	=	9999999999; //最大的时间截
//
//	for($i=0; $i<$num; $i++){
//		$ck_sum	+=	$arr_ck[$arr_temp[$i]];
//		$xz		 =	0; //下注总金额
//		foreach($arr_zd as $k=>$v){
//			if($k>=$arr_temp[$i] && $k<$arr_temp[$i+1]){
//				$xz	+=	$v;
//				unset($arr_zd[$k]);
//			}
//		}
//		if($xz >= $arr_ck[$arr_temp[$i]]){ //存款后 下注金额>=存款金额，说明本次已经全额下注
//			$ck_sum	-=	$arr_ck[$arr_temp[$i]];
//
//			if($ck_sum>0){ //之前有未全额下注的，现在补上
//				$xz_sum	+=	$xz-$arr_ck[$arr_temp[$i]];
//			}
//		}else{ //未全额下注，记录本次下注金额和
//			$xz_sum	+=	$xz;
//		}
//	}
	
	/*if($ck_sum>0 && $ck_sum>$xz_sum){
		message("您的存款金额未全额下注！\\n当前存款金额：".$ck_sum."，已交易金额：".$xz_sum."。");
	}*/
	
	$sql	=	"select pay_bank,pay_num,pay_address,pay_name,money from user_list where user_id='$uid' limit 0,1"; //取出会员银行卡信息
	$query	=	$mysqli->query($sql);  		
	$rows	=	$query->fetch_array();
	if($rows){
		$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$sql		=	"update user_list set money=money-$pay_value where user_id='$uid'";
			$mysqli->query($sql);
			$q1			=	$mysqli->affected_rows;
            if($q1 != 1){
                message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
                exit;
            }
			
			$pay_value	=	0-$pay_value; //把金额置成带符号数字
			$order		=	date("YmdHis")."_".$_SESSION['username'];
            $sql		=	"insert into money(user_id,order_value,status,order_num,pay_card,pay_num,pay_address,pay_name,about,assets,balance,type,update_time) values($uid,$pay_value,'未结算','$order','".$rows["pay_bank"]."','".$rows["pay_num"]."','".$rows["pay_address"]."','".$rows["pay_name"]."','',".$rows["money"].",".($rows["money"]+$pay_value).","."'用户提款'".",'".date('Y-m-d H:i:s')."'".")";
            $mysqli->query($sql);
            $q2		=	$mysqli->affected_rows;
            $money_id		=	$mysqli->insert_id;
            if($q2 != 1){
                $sql		=	"update user_list set money=money-$pay_value where user_id='$uid'";//操作失败，加钱
                $mysqli->query($sql);
                message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
                exit;
            }

            $about = $rows["pay_bank"].",".$rows["pay_num"].",".$rows["pay_address"].",".$rows["pay_name"];
            $assets = $rows["money"];
            $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order','$about',now(),'用户提款','$pay_value','$assets',$assets+$pay_value);";
			$mysqli->query($sql);
			$q3		=	$mysqli->affected_rows;
            if($q3 != 1){
                $sql		=	"update user_list set money=money-$pay_value where user_id='$uid'";//操作失败，加钱
                $mysqli->query($sql);
                $sql		=	"delete from money where id='$money_id'";
                $mysqli->query($sql);
                message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
                exit;
            }
			
			if($q1==1 && $q2==1 && $q3==1){
				$mysqli->commit(); //事务提交
				message('提款申请已经提交，等待财务人员给您转账。','../user/cha_qukuan.php');
			}else{
				$mysqli->rollback(); //数据回滚
				message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
		}
	}else{
		message("您未绑定银行信息，本次申请提款失败。");
	}
}elseif($_GET["action"]=="daili"){ //代理取款
	$yzm	=	strtolower($_POST["dl_vlcodes"]);
	if($yzm!=$_SESSION["randcode"]){   
		message("验证码错误，请重新输入。");
	}
	
	$_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码
	
	$sql	=	"select dl_pwd from k_user where uid='$uid' limit 1";
	$query	=	$mysqli->query($sql);  		
	$rs		=	$query->fetch_array();
	if($rs['dl_pwd']!=md5($_POST["dl_pwd"])){
		message("取款密码错误，请重新输入。");
	}
	
	//取出代理可申请的代理额度（不包含本月的代理额度）
	$ksqdled	=	0;
	include_once("../include/function_dled.php");
	$month		=	'2008-08'; //默认随便取一个小于网站开始运营的日期
	$sql		=	"select result,month,type from k_user_daili_result where uid='$uid'";
	$query		=	$mysqli->query($sql);
	while($row	=	$query->fetch_array()){
		$ksqdled		+=	$row['result'];
		if($row['type'] == 1){
			if(strtotime($row['month']) > strtotime($month)) $month = $row['month']; //取出最后一次代理结算的月份
		}
	}
	$upMonth	=	date('Y-m',strtotime("-1 month"));
	if($month	!=	$upMonth){ //最后一次代理月结算不等于上个月，说明上个月未进行代理月结算
		$yk		=	getDLED($uid,$upMonth.'-1 00:00:00',date("Y-m-d H:i:s",strtotime(date('Y-m',time()).'-1 00:00:00')-1)); //取上个月代理盈亏额度
		$bl		=	get_point($yk);
		$ksqdled+=	$yk*$bl;
	}
	
	$pay_value	=	htmlEncode(doubleval($_POST["dl_value"]));//代理提款金额
	if(($pay_value<0) || ($pay_value>$ksqdled)){
		message('申请的代理额度错误，请重新输入。');
	}
	
	$sql	=	"select pay_card,pay_num,pay_address,pay_name,money from k_user where uid='$uid' limit 1"; //取出会员银行卡信息
	$query	=	$mysqli->query($sql);  		
	$rows	=	$query->fetch_array();
	if($rows){
		$pay_value	=	0-$pay_value;
		$order		=	date("YmdHis")."_".$_SESSION['username'].'_代理额度';
		
		$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$sql	=	"insert into k_money(uid,m_value,status,m_order,pay_card,pay_num,pay_address,pay_name,about,`type`,assets,balance) values($uid,$pay_value,2,'$order','".$rows["pay_card"]."','".$rows["pay_num"]."','".$rows["pay_address"]."','".$rows["pay_name"]."','',2,".$rows["money"].",".($rows["money"]+$pay_value).")";
			$mysqli->query($sql);
			$q1		=	$mysqli->affected_rows;
			
			$sql	=	"insert into k_user_daili_result(uid,`month`,shuying,`point`,result,yxxj,`type`) values ($uid,'".date("Y-m-d",time())."',0,0,$pay_value,0,2)";
			$mysqli->query($sql);
			$q2		=	$mysqli->affected_rows;
			
			if($q1==1 && $q2==1){
				$mysqli->commit(); //事务提交
				message('您申请的提取代理额度已经提交，等待财务人员给您转账。','../user/cha_qukuan.php');
			}else{
				$mysqli->rollback(); //数据回滚
				message("申请失败");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("申请失败");
		}
	}else{
		message("申请失败");
	}
}

function cutTitle($title,$length=3){ //字符串，要保留前几位
	$tmpstr = '';
	mb_internal_encoding("UTF-8");
    if($length >= mb_strlen($title)) return $title;
	else{
		$tmpstr = mb_substr($title,0,$length);
		while($length <= mb_strlen($title)){
			$tmpstr .= '*';
			$length++;
		}
		return $tmpstr;
	}
}

function cutNum($title,$s=4,$e=4){ //字符串，要保留前几位和后几位
	mb_internal_encoding("UTF-8");
	$tmpstr = mb_substr($title,0,$s);
	for($i=0;$i<mb_strlen($title)-$s-$e;$i++){
		$tmpstr .= '*';
	}
	return $tmpstr.mb_substr($title,mb_strlen($title)-$e);
}
?>
<script language="javascript" src="/js/jquery-1.7.1.js?v=112"></script>
<script language="javascript" src="/js/tikuan.js?v=114"></script>
<style>
.Hyzx-right .Hyzx-content {
    padding: 20px;
    padding-bottom: 0;
}
ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.fbutton {
    margin: 20px 0;
    text-align: center;
}
.btn-sub {
    background-color: #ab8c84;
    height: 30px;
    font-size: 14px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-weight: bold;
    display: inline-block;
    text-align: center;
    padding: 0 15px;
    border: 0;
    color: #fff;
    cursor: pointer;
}
.Hyzx-qu ul li {
    line-height: 30px;
}
.Hyzx-qu .Hyzx-lable {
    display: block;
    width: 80px;
    text-align: right;
    float: left;
}
.Hyzx-qu span {
    margin-left: 10px;
}
.Hyzx-qu .Hyzx-qkm {
    line-height: 20px;
    padding-left: 5px;
}
select, input {
    border-radius: inherit;
}  
.Hyzx-qu span {
    margin-left: 10px;
}
.Hyzx-qu .Hyzx-lable {
    display: block;
    width: 80px;
    text-align: right;
    float: left;
}
.Hyzx-qu .Hyzxinput {
    padding-left: 90px;
}
.Hyzx-qu .Hyzxinput input {
    padding-left: 3px;
    line-height: 20px;
}
.Hyzx-qu .Hyzx-maL {
    margin-left: 90px;
}
.Hyzx-content{
    font-family: 'Microsoft Yahei', 'Droid Sans Fallback', Arial, Helvetica, sans-serif, 宋体;
    font-size: 14px;
    color: rgb(102, 102, 102);
    outline: none;
}
table td{
     font-size: 14px;
     padding-top: 3px;
}
table td input{
    line-height: 20px;
}
</style>
<div id="MACenterContent">
<div class="Hyzx-body">
    <div class="Hyzx-right">
        <h3 class="nav2">
            <span class="flt">线上取款</span>
            <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" data="bank_transf_index" class="Hyzx-btn flt ">额度转换</a>
            <a href="javascript: f_com.MChgPager({method: 'bankATM1'});" data="bank_onlinein_index" class="Hyzx-btn flt" >线上存款</a>
            <a href="javascript: f_com.MChgPager({method: 'bankTake'});" data="bank_onlineout_index" class="Hyzx-btn flt active">线上取款</a>
        </h3>
        <div class="Hyzx-content">
            <div class="Hyzx-qu">
                <p><label class="Hyzx-lable">当前余额:</label><span><?=$_SESSION["user_money"]?></span></p>
                <form onsubmit="return  check_submit('<?=$row_sys["min_qukuan_money"]?>'')" action="/app/member/money/tikuan_ajax.php?action=tikuan" method="post" id="tikuanform" name="tikuanform">
                    <ul>
                            <li><label class="Hyzx-lable">取款密码:</label><span> <input name="qk_pwd" type="password" class="Hyzx-qkm" id="qk_pwd"  autocomplete="off" maxlength="30"/></span></li>
                            <li><label class="Hyzx-lable">提款人:</label><span><?=$userInfo["user_name"]?></span></li>
                            <li>
                                    <label class="Hyzx-lable">取款金额:</label>
                                    <div class="Hyzxinput">
                                            <input id="cash" type="text" onblur="calculate(); this.value = this.value.replace(/[^0-9]/g,'');" onkeyup="if(isNaN(value))execCommand('undo')" maxlength="10" size="5" name="cash">
                                            - 手续费
                                            <input id="COM" type="text" value="0" readonly="" size="5" name="COM">
                                            = 实收金额
                                            <input id="pay_value" type="text" readonly="" size="5" name="pay_value" onkeyup="if(isNaN(value))execCommand('undo')">
                                            <script>
                                                function calculate(){
                                                    obj_cash = $("#cash");
                                                    all_fee = $("#COM").val();
                                                    var obj_real_c = $("#pay_value");
                                                    real_cash = eval(obj_cash.val() - all_fee);
                                                    if( real_cash <= 0 ) {
                                                        obj_real_c.val('0');
                                                    }else {
                                                        obj_real_c.val(real_cash);
                                                    }
                                                }
                                            </script>
                                            <input id="min_qukuan_money" value="<?=$row_sys["min_qukuan_money"]?>" type="hidden"/>
                                    </div>
                            </li>
                            <li><span class="Hyzx-maL">出款上限:1000000&nbsp;&nbsp;   出款下限:<?=$row_sys["min_qukuan_money"]?></span></li>
                            <li><label class="Hyzx-lable">所属银行:</label><span><?=$t["pay_bank"]?></span></li>
                            <li><label class="Hyzx-lable">银行帐号:</label><span><?=cutNum($t["pay_num"])?></span></li>
                            <li><label class="Hyzx-lable">开户地址:</label><span><?=cutTitle($t["pay_address"])?></span></li>
                    </ul>

                    <div class="fbutton">
                        <input class="btn_001 btn-sub" type="button"  value="确定送出" id="btn"  onclick="check_submit()" >
                        <input onclick="javascript: f_com.MChgPager({method: 'memberData'});" class="btn_001 btn-sub" type="button" name="cancelWithdraw" value="放弃出款">
                    </div>
                </form>
            </div>
            
	




<?php
if($_COOKIE['is_daili']){ //是代理

	//每月的2～5号才能申请提款，且只能提款一次
	$day = date("d",time())*1;
	if($day>=2 && $day<=5){ //在指定日期
		$sql	=	"SELECT count(*) as s FROM k_user_daili_result where `type`=2 and uid=$uid and `month` like ('".date("Y-m",time())."%')";
		$query	=	$mysqli->query($sql);
		$rs		=	$query->fetch_array();
		if($rs['s'] < 1){ //未申请过代理额度提款
			$sql	=	"SELECT add_time FROM k_user_daili where `status`=1 and uid=$uid"; //取出代理申请代理日期
			$query	=	$mysqli->query($sql);
			$rs		=	$query->fetch_array();
			if(time()-strtotime($rs['add_time']) >= 3024000){ //超过申请时间 35 天
?>
	 <div class="Hyzx-qu">
                <table width="294" border="0" style="font-size:12px;">
                    <form onsubmit="return  check_submit_dl()" action="/app/member/money/tikuan.php?action=daili" method="post" name="form1">
                  <tr>
                    <td height="24" colspan="2"><strong>请认真填写代理取款表单</strong></td>
                   </tr>
                  <tr>
                    <td width="101" height="24">代理密码：</td>
                    <td width="189"><input name="dl_pwd" type="password" class="tuiguang" id="dl_pwd" style="width:150px;" maxlength="30" /></td>
                  </tr>
                  <tr>
                    <td width="101" height="24">代理金额：</td>
                    <td width="189"><input name="dl_value" type="text" class="tuiguang" id="dl_value" style="width:150px;" onkeyup="if(isNaN(value))execCommand('undo')" maxlength="6"/></td>
                  </tr>
                  <tr>
                    <td height="24">验证码：</td>
                    <td height="24"><input name="dl_vlcodes" type="text" class="tuiguang" id="dl_vlcodes" size="5" maxlength="4" onfocus="next_checkNum_img_dl()" />
                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="/yzm.php" alt="点击更换" name="checkNum_img_dl" id="checkNum_img_dl" style="cursor:pointer; position:relative; top:3px;" onclick="next_checkNum_img_dl()" /></td>
                  </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td height="24"><span class="fudong_9">
                      <input name="submit1" type="submit" class="btn_001 btn-sub" id="btn" value="提交" />
                    </span></td>
                  </tr>
                </form>
               </table>
            </div>
<?php
			}else{
?>
未超过35天的代理观察期，暂不能申请提取代理额度。
<?php
			}
		}else{
?>
本月您已经申请提取过代理额度，本月不能再申请提取代理额度。
<?php
		}
	}else{
?>
不在提取代理额度日期，不能申请提取代理额度。
<?php	
	}
}
?>
	</td>
       </tr>
    </table>
    </div>
    </div>
</div>






  <div class="shuoming2">
   <!--  <p>会员账户：<?=$_SESSION["username"]?></p>
    <p>当前余额：<span id="hyye"><?=$t["money"]?></span></p> -->
  <?php
  if($_COOKIE['is_daili']){
  ?>
  	<script>
  	window.setTimeout("get_dled()", 1000); 
  	</script>
  	<p>当前代理总额度：<span id="dled">加载中...</span></p>
  	<p>可申请代理额度：<span id="ksqdled">加载中...</span>&nbsp;&nbsp;<span style="color:#999999;">(不包含本月代理额度)</span></p>
    <?php
  }
  ?>
  </div>
<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 
 
 






 
