<?php
include_once("../common/login_check.php");
check_quanxian("真人娱乐");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
include_once("../../include/newpage.php");
$currdate = date("Y-m-d",time()+12*3600);//+12*3600
$username = trim($_GET["username"]);
$reflag = trim($_GET["reflag"]);
$t_time = trim($_GET["t_time"]);
$end_time = trim($_GET["end_time"]);
$dataType = trim($_GET["dataType"]);
?>
<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>PT投注记录</TITLE>
<script language="javascript" src="/js/jquery.js"></script>
<style type="text/css">
<STYLE>
BODY {
SCROLLBAR-FACE-COLOR: rgb(255,204,0);
 SCROLLBAR-3DLIGHT-COLOR: rgb(255,207,116);
 SCROLLBAR-DARKSHADOW-COLOR: rgb(255,227,163);
 SCROLLBAR-BASE-COLOR: rgb(255,217,93)
}
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;text-decoration: none;}
.t-title{background:url(/super/images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font > <span class="STYLE2">Pt游戏记录</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	  <table width="80%">
      <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
      <tr align="center">
        <td nowrap align="center"> 反水状态：
		<select onChange="self.form1.submit()" name="reflag" id="reflag">
         <option value="">全部</option>
        <option value="1" <?= $_GET['reflag']=='1' ? 'selected="selected"' : ''?>>已返水</option>
         <option value="0" <?= $_GET['reflag']=='0' ? 'selected="selected"' : ''?>>未返水</option>
        </select> </td>	
		<td nowrap align="center">下注开始日期：
            <input name="t_time" type="text" id="t_time" value="<?=$_GET['t_time']==''?$currdate:$_GET['t_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
		 </td><td nowrap align="center">下注结束日期:
		 <input name="end_time" type="text" id="end_time" value="<?=$_GET['end_time']==''?$currdate:$_GET['end_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
          </td><td nowrap align="center">会员：
            <input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
            </td><td nowrap align="center"><input type="submit" name="Submit" value="搜索"></td>
        </tr>
      </form>
    </table>
    </td>
  </tr>
</table>
</table>


<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC"><tr><td ><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
            <tr style="background-color: #434343;color: #fff;">
		<td width="150" align="center"><strong>用户</strong></td>            
        <td width="150" align="center"><strong>订单号</strong></td>         
        <td width="150" align="center"><strong>游戏类别</strong></td>
        <td width="150" align="center"><strong>投注时间</strong></td>
		<td width="150" align="center"><strong>投注金额</strong></td>
		<td width="150" align="center"><strong>输赢金额</strong></td>
		<td width="150" align="center"><strong>有效投注金额</strong></td>
		<td width="150" align="center"><strong>反水状态</strong></td>
		<td width="150" align="center"><strong>反点金额</strong></td>
		<td width="150" align="center"><strong>反点时间</strong></td>
       <!-- <td width="46" align="center"><strong>删除</strong></td>-->
      </tr>
<?php
// $sql = "select id from ag_Transfer WHERE 1=1 ";
$sql = "select id  from api_ptbetdetail WHERE 1=1 ";
if($_GET['username']) $sql .= "and username = '" . $_GET['username'] . "' ";
if( $_GET['reflag']!="" ) $sql .= "and reflag in(" . $_GET['reflag'] . ") ";
//if($_GET['live'] && $_GET['live']!="0" ) $sql .= "and type in(" . $_GET['live'] . ") ";
//if($_GET['type'] && $_GET['type']!="0" ) $sql .= "and AG_type in(" . $_GET['type'] . ") ";
//if($_GET['type'] && $_GET['type']!="0" ) $sql .= "and type in(" . $_GET['type'] . ") ";
//if($_GET['result'] && $_GET['result']!="全部状态") $sql .= "and result = '" . $_GET['result'] . "' ";
	if($_GET['t_time']){
		$sql .="and GameDate >= '".$_GET['t_time']."'";
	}else{
		$sql .="and GameDate >= '".$currdate."'";
	}

	if($_GET['end_time']){
		$sql .="and GameDate <= '".$_GET['end_time']."'";
	}else{
		$sql .="and GameDate <= '".$currdate." 23:59:59'";
	}


//if($_GET['t_time'])$sql .="and betTime >= '".$_GET['t_time']."'";
//if($_GET['t_time'])$sql .="and actiontime >= ".strtotime($_GET['t_time']);
//if($_GET['end_time'])$sql .="and betTime <= '".$_GET['end_time']." 23:59:59'";
//if($_GET['end_time'])$sql .=" and actiontime <= ".strtotime($_GET['end_time'].' 23:59:59');
$sql .= " order by id desc";
//echo $sql;
/**
if($_GET['username']){
$sql		=	"select id from ag_Transfer WHERE username='". $_GET['username']."' order by id desc";
  }else{
$sql		=	"select id from ag_Transfer order by id desc";
}
**/
$query		=	$mysqli->query($sql);
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
if($_GET['page']){
	$thisPage	=	$_GET['page'];
}
$page		=	new newPage();
$thisPage	=	$page->check_Page($thisPage,$sum,50,100);

$nid		=	'';
$i			=	1; //记录 uid 数
$start		=	($thisPage-1)*50+1;
$end		=	$thisPage*50;
while($row = $query->fetch_array()){
  if($i >= $start && $i <= $end){
	$nid .=	$row['id'].',';
  }
  if($i > $end) break;
  $i++;
}
if($nid){
	$nid	=	rtrim($nid,',');
// 	$sql   = "select * from ag_Transfer where id in($nid) ";
	$sql   = "select * from api_ptbetdetail where id in($nid) ";
	if($_GET['username'])$sql .="and username='".$_GET['username']."' ";
	$sql  .=" order by id desc";
// 	echo $sql;
	/**
	if($_GET['username']){
	$sql	=	"select * from ag_Transfer where id in($nid) and username='".$_GET['username']."'order by id desc";
	
	}else{
	$sql	=	"select * from ag_Transfer where id in($nid) order by id desc";
	}
	**/
	$query	=	$mysqli->query($sql);
	$time	=	time();
	while($rows = $query->fetch_array()){
?>
      <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
		<td align="center" ><?=$rows["username"]?></td> 	
     	<td align="center" ><?=$rows["GameCode"]?></td> 
		<td align="center" ><?=$rows["GameName"]?></td>	
        <td align="center" valign="middle"><?=date("Y-m-d H:i:s",strtotime($rows["GameDate"]))?></td>
        <td align="center" ><?=$rows["Bet"]?></td>
        <td align="center" ><?=$rows["Win"]?></td>
        <td align="center" ><?=$rows["Bet"]?></td>
        <td align="center" ><?=$rows["reflag"]?></td>
        <td align="center" ><?=$rows["reamount"]?></td>
        <td align="center" ><?=$rows["redate"]?></td>
       <!-- <td align="center"></td>-->
      </tr>
<?php
	}
}
?>
	  
    </table></td>
  </tr>
  <tr>
    <td > <?=$page->get_htmlPage("agbets.php?username=".$username."&t_time=".$t_time."&end_time=".$end_time."&reflag=".$reflag."&dataType=".$dataType);?></td>
  </tr>
</table></td></tr>
</table>
</body>
</html>