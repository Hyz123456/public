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
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看会员信息");



if($_GET['action']=='delete'){
$sql	=	"delete FROM user_log WHERE edtime < '".date('Y-m-d H:i:s',strtotime('-1 day'))."'";

$query	=	$mysqli->query($sql);
$eff_row = $mysqli->affected_rows;
if($eff_row){
	echo '<script>alert("删除成功"); window.location.href="/admin/user/user_log.php";</script>';
}else{
	echo '<script>alert("删除失败或无可删数据"); </script>';
}
}  
    $sql_del="delete from user_log where user_id='".$_GET['action2']."' ";
    $query_del=$mysqli->query($sql_del);
foreach($_GET['action3'] as $val){
	$sql=" delete from user_log where user_id ='".$val."' ";
	$query=$mysqli->query($sql);
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员日志</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script >
function delAll(){
    		var goUrl="./user_log.php?"
    		$("[name=delete1]:checked").each(function(){
    			goUrl+="action3[]="+$(this).val()+"&"
    		})
    		
    		window.location.href=goUrl
    	}

			var num="";
		function qxuan(){
			num++;
			if(num%2==1){
				$("input").each(function(){
					$(this).attr("checked",true)
				})
			}else{
					$("input").each(function(){
					$(this).attr("checked",false)
				})
					}	
			alert('只能选中当前页');
		}
</script>

<style type="text/css">
    body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
    }
    td{font:13px/120% "宋体";padding:3px;}
    a{

        color:#F37605;

        text-decoration: none;

    }
    .t-title{background:url(../images/06.gif);height:24px;}
    .t-tilte td{font-weight:800;}
</STYLE>
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">用户日志：</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="100%" border="0">
                <form id="form1" name="form1" method="get" action="user_log.php?1=1">
                <tr>
                    <td>&nbsp;&nbsp;用户名：
                        <input type="text" name="user_name" value="<?=$_GET['user_name']?>"/>
                        &nbsp;&nbsp;操作内容：
                        <input type="text" name="edlog" value="<?=$_GET['edlog']?>"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="Submit" value="查询" />

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" onclick='javascrip:window.location.href="/admin/user/user_log.php?action=delete";'  value="删除最近1天以外记录" />

                    </td>
                </tr>
                </form>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
	<tr>
		<input type="button" onclick="delAll()" value="一键删除" style="margin:8 0px;">
	</tr>
    <tr style="background-color: #EFE" class="bg_tr"  align="center">
		<th onclick="qxuan()">全选/全不选</th>
        <th>会员名称</td>
        <th>操作内容</th>
        <th>IP地址</th>
        <th>登陆时间</th>
        <th>登陆网址</th>
		<th>操作</th>
    </tr>
    <?php

    $sql	=	"SELECT user_id,user_name,login_ip,edlog,edtime,login_url FROM user_log WHERE 1=1 ";
    if($_GET['user_name']){
        $userName = $_GET['user_name'];
        $sql .= " and user_name='$userName'";
    }
    if($_GET['edlog']){
        $edlog = $_GET['edlog'];
        $sql .= " and edlog like '%$edlog%'";
    }
    $sql .= " order by edtime DESC";
    $query	=	$mysqli->query($sql);
	$sum		=	$mysqli->affected_rows; //总页数
	$thisPage	=	1;
	if($_GET['page']){
		$thisPage	=	$_GET['page'];
	}
	$page		=	new newPage();
	$thisPage	=	$page->check_Page($thisPage,$sum,100,20);
	$i			=	1; //记录 uid 数
	$start		=	($thisPage-1)*100+1;
	$end		=	$thisPage*100;
	while($row = $query->fetch_array()){
		if($i >= $start && $i <= $end){
        ?>
        <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
			<td align="center" ><input type="checkbox" name="delete1" value="<?=$row['user_id']?>"></td>
            <td align="center"><a href="../hygl/user_show.php?id=<?=$row['user_id']?>"><?=$row['user_name']?></a></td>
            <td align="center" width="311"><?=$row['edlog']?></td>
            <td align="center" ><?=$row['login_ip']?></td>
            <td align="center" ><?=$row['edtime']?></td>
            <td align="center" ><?=$row['login_url']?></td>
			<td align="center" ><a href="./user_log.php?action2=<?=$row['user_id']?>">删除</a></td>
        </tr>
    <?php
			}
			if($i > $end) break;
			$i++;
		}
    ?>
      <tr><td colspan='7'><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></td></tr>
</table>
</body>
</html>