<?php
include_once("../common/login_check.php");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
include_once("../../include/newpage.php");
$nid	=	0;
if($_GET['nid'] > 0){
	$nid	=	$_GET['nid'];
}
if ($_GET["action"] == "del" && $nid > 0) {
//     $sql		=	"delete from ag_Transfer where id=$nid";
    $sql		=	"delete from zz_info where id=$nid";
	$mysqli->query($sql);
}
//if(!$_GET['t_time']) $_GET['t_time'] = date('Y-m-d');
?>
<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>反水日志记录</TITLE>
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
    <td height="24" nowrap background="../images/06.gif"><font > <span class="STYLE2">反水日志记录</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	  <table width="80%">
      <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
      <tr align="center">
	  <td nowrap align="center"> 仅查询当前天之前的记录
	  </td>	
      </form>
    </table>
    </td>
  </tr>
</table>


<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC"><tr><td ><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
            <tr style="background-color: #434343;color: #fff;">
        <td width="200" align="center"><strong>反水类型</strong></td>
        <td width="300" height="20" align="center"><strong>反水日期</strong></td>
		<td align="center"><strong>状态</strong></td>
		<td width="300" align="center"><strong>创建时间</strong></td>
       <!-- <td width="46" align="center"><strong>删除</strong></td>-->
      </tr>
<?php
// $sql = "select id from ag_Transfer WHERE 1=1 ";
$sql = "select id from api_crawler_log WHERE 1=1 ";
if($_GET['username']) $sql .= "and username = '" . $_GET['username'] . "' ";
// if($_GET['live'] && $_GET['live']!="0" ) $sql .= "and AG_type in(" . $_GET['live'] . ") ";
//if($_GET['live'] && $_GET['live']!="0" ) $sql .= "and type in(" . $_GET['live'] . ") ";
//if($_GET['type'] && $_GET['type']!="0" ) $sql .= "and AG_type in(" . $_GET['type'] . ") ";
//if($_GET['type'] && $_GET['type']!="0" ) $sql .= "and type in(" . $_GET['type'] . ") ";
//if($_GET['result'] && $_GET['result']!="全部状态") $sql .= "and result = '" . $_GET['result'] . "' ";
// if($_GET['t_time'])$sql .="and Transfer_time >= '".$_GET['t_time']."'";
//if($_GET['t_time'])$sql .="and actiontime >= ".strtotime($_GET['t_time']);
// if($_GET['end_time'])$sql .="and Transfer_time <= '".$_GET['end_time']." 23:59:59'";
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
	$sql   = "select * from api_crawler_log where id in($nid) ";
	if($_GET['username'])$sql .="and username='".$_GET['username']."' ";
// 	if($_GET['live'] && $_GET['live']!="0")$sql .="and AG_type in(" . $_GET['live'] . ") ";
//     if($_GET['type'] && $_GET['type']!="0")$sql .="and AG_type in(" . $_GET['type'] . ") ";
	//if($_GET['live'] && $_GET['live']!="0")$sql .="and type in(" . $_GET['live'] . ") ";
    //if($_GET['type'] && $_GET['type']!="0")$sql .="and type in(" . $_GET['type'] . ") ";
	//if($_GET['result'] && $_GET['result']!="全部状态")$sql .="and result ='".$_GET['result']."' ";
// 	if($_GET['t_time'])$sql .="and Transfer_time >= '".$_GET['t_time']."'";
//  if($_GET['end_time'])$sql .="and Transfer_time <= '".$_GET['end_time']." 23:59:59'";
	//if($_GET['t_time'])$sql .="and actiontime >= ".strtotime($_GET['t_time']);
   // if($_GET['end_time'])$sql .=" and actiontime <= ".strtotime($_GET['end_time'].' 23:59:59');
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
		/*if($rows["type"]==12){
			$Transfer_type='<font color="#FF0000">AG转入</font>';
			if($rows['status'] == 1) $zj_zr += $rows['amount'];
		}else if($rows["type"]==22){
		    $Transfer_type='AG转出';
			if($rows['status'] == 1) $zj_zc += $rows['amount'];
		}else if($rows["type"]==11){
		    $Transfer_type='<font color="#FF0000">BB转入</font>';
			if($rows['status'] == 1) $zj_zr += $rows['amount'];
		}else if($rows["type"]==21){
		    $Transfer_type='BB转出';
			if($rows['status'] == 1) $zj_zc += $rows['amount'];
		}else if($rows["type"]==13){
		    $Transfer_type='<font color="#FF0000">MG转入</font>';
			if($rows['status'] == 1) $zj_zr += $rows['amount'];
		}else if($rows["type"]==23){
		    $Transfer_type='MG转出';
			if($rows['status'] == 1) $zj_zc += $rows['amount'];
		}else{
			$Transfer_type='未找到类型';
		}*/
?>
      <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
     	<td align="center" ><?=$rows["type"]?></td>
        <td align="center" valign="middle"><?=date("Y-m-d",strtotime($rows["excedate"]))?></td>
        <td align="center" ><?=$rows["status"]?></td>
		<td align="center" ><?=date("Y-m-d H:i:s",strtotime($rows["createtime"]))?></td>        
       <!-- <td align="center"></td>-->
      </tr>
<?php
	}
}
?>
<tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
<td colspan="9" align="center"> 
        </td>
      </tr>
	  
    </table></td>
  </tr>
  <tr>
    <td > <?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></td>
  </tr>
</table></td></tr>
</table>
</body>
</html>