<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>财务汇总</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{padding:5px;}
a{

	color:#F37605;

	text-decoration: none;

}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
.red{ color: #F7393B; }
#editProduct tr:nth-of-type(even){ background: #E7EDF1; }
#editProduct tr:nth-of-type(even):hover{ background: #e5e5e5; }

</STYLE>
<script>

    Date.prototype.addDays = function(d){
        this.setDate(this.getDate() + d);
    };

    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    };

    function cleanAll(){
        setDate();
    }

    function setDate(){
        var dateNow= new Date();
        var dateStart;
        var dateEnd;
        dateEnd = dateNow.Format("yyyy-MM-dd");
        dateNow.addDays(-365);
        dateStart = dateNow.Format("yyyy-MM-dd");
        $("#time_start").val(dateStart);
        $("#time_end").val(dateEnd);
        $("#status").val("所有状态");
    }

</script>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<script language="JavaScript" src="../../js/jquery-1.7.1.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font ><span class="STYLE2">财务汇总</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	 <table width="100%">
     <form name="form1" method="GET" action="hccw.php" >
      <tr>
        <td width="80"><strong>出入账目汇总</strong></td>
        <td width="176">&nbsp;&nbsp;代理账号：
            <select name="status" id="status" style="width: 150px;">
                <option value="全部" <?=$_GET['status']=="成功" ? 'selected' : ''?>>全部</option>
                <option value="..." <?=$_GET['status']=="失败" ? 'selected' : ''?>>...</option>
                <option value="...">...</option>
                <option value="...">...</option>
            </select>
        </td>
        <td width="250">日期：
            <input name="time_start" type="text" id="time_start" value="<?=$time_start?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
            ~
            <input name="time_end" type="text" id="time_end" value="<?=$time_end?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />

          <td width="25">账号：
          <input name="username" type="text" id="username" value="<?=@$_GET['username']?>" size="20" maxlength="20"/></td>
        <!-- <td width="50"><input name="find" type="submit" id="find" value="查找"/></td> -->
        <td width="100"><input name="find" onclick="cleanAll()" type="submit" id="find" value="今日"/></td>
       <!-- <td width="154" align="center"><a href="../hygl/lsyhxx.php?action=1&username=<?=$_GET['username']?>" target="_blank">历史银行卡信息</a></td> -->
      </tr>
	</form>
    </table></td>
  </tr>
</table>
<br>
<?php
	$sql=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='在线支付' and m.status='成功' ";	
	$query=$mysqli->query($sql);
	$row=$query->fetch_array();
	$bishu=$row['num'];$money=$row['money']+0;$renshu=$row['people'];
	//echo $bishu."<br>".$renshu."<br>".$money;
//----
	$sql1=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='后台充值' and m.status='成功' ";	
	$query=$mysqli->query($sql1);
	$row=$query->fetch_array();     
	$bishu1=$row['num'];$money1=$row['money']+0;$renshu1=$row['people'];

//----
	$sql2=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='公司入款' and m.status='成功' ";	
	$query=$mysqli->query($sql2);
	$row=$query->fetch_array();
	$bishu2=$row['num'];$money2=$row['money']+0;$renshu2=$row['people'];

//----
	$sql3=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='出款划扣' and m.status='成功' ";	
	$query=$mysqli->query($sql3);
	$row=$query->fetch_array();
	$bishu3=$row['num'];$money3=$row['money']+0;$renshu3=$row['people'];
//---
		$sql4=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='给予优惠' and m.status='成功' ";	
	$query=$mysqli->query($sql4);
	$row=$query->fetch_array();
	$bishu4=$row['num'];$money4=$row['money']+0;$renshu4=$row['people'];
	//echo $bishu."<br>".$renshu."<br>".$money;
//----
	$sql5=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='给予反水' and m.status='成功' ";	
	$query=$mysqli->query($sql5);
	$row=$query->fetch_array();     
	$bishu5=$row['num'];$money5=$row['money']+0;$renshu5=$row['people'];

//----
	$sql6=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='用户提款' and m.status='成功' ";	
	$query=$mysqli->query($sql6);
	$row=$query->fetch_array();
	$bishu6=$row['num'];$money6=$row['money']+0;$renshu6=$row['people'];

//----
	$sql7=" select sum(order_value) money,count(order_num) num ,count(user_name) people from money m ,user_list u  where  m.user_id=u.user_id and m.type='人工提款' and m.status='成功' ";	
	$query=$mysqli->query($sql7);
	$row=$query->fetch_array();
	$bishu7=$row['num'];$money7=$row['money']+0;$renshu7=$row['people'];
//---
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;text-align: center;" id=editProduct   idth="100%" >
      <tr bgcolor="efe" class="bg_tr" align="center" style="line-height: 1.5em;">
        <td width="25%" height="24" ><strong>收入</strong></td>
        <td width="25%" ><strong>收入金额</strong></td>
        <td width="25%" ><strong>支出</strong></td>
        <td width="25%" ><strong>支出明细</strong></td>
        </tr>
    <tr>
          <td>公司入款</td>
           <td><span class="red">(<?=$money2?>元)</span><span>(<?=$bishu2?>笔)</span><span>(<?=$renshu2?>人)</span></td>
           <td>会员出款</td>
           <td><span class="red">(<?=$money6?>元)</span><span>(<?=$bishu6?>笔)</span><span>(<?=$renshu6?>人)</span></td>
    </tr>
    <tr>
              <td>线上支付</td>
               <td><span class="red">(<?=$money?>元)</span><span>(<?=$bishu?>笔)</span><span>(<?=$renshu?>人)</span></td>
              <td>给予优惠</td>
              <td><span class="red">(<?=$money4?>元)</span><span>(<?=$bishu4?>笔)</span><span>(<?=$renshu4?>人)</span></td>
        </tr>
        <tr>
                  <td>人工存入</td>
                  <td><span class="red">(<?=$money1?>元)</span><span>(<?=$bishu1?>笔)</span><span>(<?=$renshu1?>人)</span></td>
                 <td>人工提出</td>
                 <td><span class="red">(<?=$money7?>元)</span><span>(<?=$bishu7?>笔)</span><span>(<?=$renshu7?>人)</span></td>
            </tr>
             <tr>
                              <td>会员出款被扣金额</td>
                               <td><span class="red">(<?=$money3?>元)</span><span>(<?=$bishu3?>笔)</span><span>(<?=$renshu3?>人)</span></td>
                              <td>给予反水</td>
                              <td><span class="red">(<?=$money5?>元)</span><span>(<?=$bishu5?>笔)</span><span>(<?=$renshu5?>人)</span></td>
                        </tr>

<tr>
    <td colspan="4">实际盈亏:<span><?php echo array_sum(array($money,$money1,$money2,$money3,-$money4,-$money5,-$money6,-$money7));?></span>&nbsp;&nbsp; 账目统计:<span>0.00</span></td>
  </tr>
</table>

</body>
</html>