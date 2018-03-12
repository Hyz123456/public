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

check_quanxian("财务审核");

function getstatus($status){
   $return=$status;
//   switch ($status){
//   	case 0:$return="失败";break;
//   	case 1:$return="成功";break;
//   	case 2:$return="待处理";break;
//   	default:break;
//   }
   return $return;
}

function getstatus2($status){
   $return=$status;
//   switch ($status){
//   	case 2:$return="失败";break;
//   	case 1:$return="成功";break;
//   	case 0:$return="待处理";break;
//   	default:break;
//   }
   return $return;
}

if($_GET["time_start"]){
    $time_start = $_GET["time_start"];
}else{
    $time_start = date('Y-m-d');
}

if($_GET["time_end"]){
    $time_end = $_GET["time_end"];
}else{
    $time_end = date('Y-m-d');
}
if(!$_GET['type']){
    $_GET['type']="所有类型";
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>财务核查</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{padding:3px;}
a{

	color:#F37605;

	text-decoration: none;

}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
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
		$("#type").val("所有类型");
    }

</script>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<script language="JavaScript" src="../../js/jquery-1.7.1.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font ><span class="STYLE2">反水记录</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	 <table width="100%">
     <form name="form1" method="GET" action="" >
      <tr>
		<td>类型：
            <select name="type" id="type">
                <option value="所有类型" <?=$_GET['type']=="所有状态" ? 'selected' : ''?>>所有类型</option>
				<option value="AG" <?=$_GET['type']=="AG" ? 'selected' : ''?>>AG</option>
				<option value="BBIN" <?=$_GET['type']=="BBIN" ? 'selected' : ''?>>BBIN</option>
				<option value="MG" <?=$_GET['type']=="MG" ? 'selected' : ''?>>MG</option>
				<option value="ALLBET" <?=$_GET['type']=="ALLBET" ? 'selected' : ''?>>ALLBET</option>
				<option value="PT" <?=$_GET['type']=="PT" ? 'selected' : ''?>>PT</option>
				<option value="NA" <?=$_GET['type']=="NA" ? 'selected' : ''?>>NA</option>
				<option value="棋牌" <?=$_GET['type']=="棋牌" ? 'selected' : ''?>>棋牌</option>
				<option value="彩票" <?=$_GET['type']=="彩票" ? 'selected' : ''?>>彩票</option>
            </select>
        </td>
        <td>日期：
            <input name="time_start" type="text" id="time_start" value="<?=$time_start?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
            ~
            <input name="time_end" type="text" id="time_end" value="<?=$time_end?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />

          <td>会员名称：
          <input name="username" type="text" id="username" value="<?=@$_GET['username']?>" size="20" maxlength="20"/></td>
        <td width="50"><input name="find" type="submit" id="find" value="查找"/></td>
        <td width="100"><input name="find" onclick="cleanAll()" type="submit" id="find" value="查看全部"/></td>
        <td width="154" align="center"><a href="../hygl/lsyhxx.php?action=1&username=<?=$_GET['username']?>" target="_blank">历史银行卡信息</a></td>
      </tr>
	</form>
    </table></td>
  </tr>
</table>
<br>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
      <tr bgcolor="efe" class="bg_tr" align="center" style="line-height: 1.5em;">
        <td height="24" ><strong>用户名</strong></td>
        <td><strong>类型</strong></td>
		<td><strong>详情</strong></td>
        <td><strong>系统订单号</strong></td>
        <td><strong>反水金额</strong></td>
        <td><strong>金额变化</strong></td>
        <td><strong>提交时间</strong></td>
        </tr>
<?php
	include("../../include/pager.class.php");
	$sql		=	"select u.user_name,m.type,m.order_value,m.order_num,m.update_time,m.about,m.assets,m.balance from money_log m,user_list u where m.user_id=u.user_id "; //所有该会员的反水记录
	if($_GET['type']=='AG') 
		$sql .= " and (m.about like '[ag%' or m.about like '[xin%') and m.type='后台充值' ";
	else if($_GET['type']=='BBIN') 
		$sql .= " and m.about like '[BBIN%' and m.type='后台充值' ";
	else if($_GET['type']=='MG') 
		$sql .= " and m.about like '[MG%' and m.type='后台充值' ";
	else if($_GET['type']=='ALLBET') 
		$sql .= " and m.about like '[ALLBET%' and m.type='后台充值' ";
	else if($_GET['type']=='PT') 
		$sql .= " and m.about like '[PT%' and m.type='后台充值' ";
	else if($_GET['type']=='NA') 
		$sql .= " and m.about like '[NA%' and m.type='后台充值' ";
	else if($_GET['type']=='棋牌') 
		$sql .= " and m.about like '[DX%' and m.type='后台充值' ";
	else if($_GET['type']=='BH彩票') 
		$sql .= " and m.about like '[cp%' and m.type='后台充值' ";
	else if($_GET['type']=='彩票') 
		$sql .= " and m.type='彩票自动结算-彩票反水' ";
	else
		$sql .= " and (m.about like '%自动反水%' or m.type='彩票自动结算-彩票反水') ";
    if($time_start){
        $stime	 =	$time_start.' 00:00:00';
        $sql	.=	" and m.update_time>='$stime' ";
    }
    if($time_end){
        $etime	 =	$time_end.' 23:59:59';
        $sql	.=	" and m.update_time<='$etime' ";
    }
	if($_GET['username']) $sql .= " and u.user_name='".$_GET['username']."' ";
    $sql.=" order by m.id desc" ;  //0422
	$query	=	$mysqli->query($sql);
	$sum		=	$mysqli->affected_rows; //总页数
    $arr=array();
	while($row = $query->fetch_array()){
		$arr[]=$row;
	}
	$thisPage	=	1;
	$pagenum	=	50;
	if($_GET['page']){
		$thisPage	=	$_GET['page'];
	}
	$CurrentPage=isset($_GET['page'])?$_GET['page']:1;
	$myPage=new pager($sum,intval($CurrentPage),$pagenum);
	$pageStr= $myPage->GetPagerContent();
	
	$i		=	1; //记录 bid 数
	$start	=	($thisPage-1)*$pagenum+1;
	$end		=	$thisPage*$pagenum;
	foreach($arr as $k=>$v){
		if($i >= $start && $i <= $end){
?>
      <tr align="center" onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#ffffff'" >
        <td align="center" ><?=$v['user_name']?></td>
		<td align="center" ><?=$v['type']?></td>
        <td><?php
		if($v["about"]) echo '<span style="color:#FF0000;">'.$v["about"].'</span>';
		?></td>
        <td><?php 
			if($v['type']=='后台充值'){
	    ?><a href="tixian_show.php?id=<?=$v['order_num']?>"><?=$v["order_num"]?></a>
		<?php
		    }
		    else
				echo $v["order_num"];
		?>
		</td>
        <td><?=$v["order_value"]?></td>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="33%" style="color:#999999;"><?=$v["assets"]?></td>
              <td width="34%" align="center" style="color:#225d9c;"><?=$v["order_value"]?></td>
              <td width="33%" align="right" style="color:#999999;"><?=$v["balance"]?></td>
            </tr>
          </table></td>
        <td><?=$v["update_time"]?></td>
        </tr>
      <?
			}
			if($i > $end) break;
			$i++;
		}
      ?>
    </table></td>
  </tr>
  <tr align="center"  style="background-color:#FFFFFF; line-height:20px;">
		<td height="25" align="center" valign="middle" colspan="6"><?=$pageStr?></td>
  </tr>
</table>
</body>
</html>