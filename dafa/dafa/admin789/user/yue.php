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
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看会员信息");
$thisPage	=	1;
if($_GET['page'])
    $thisPage=$_GET['page'];
?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>用户列表</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        .STYLE2 {font-size: 12px}
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        a{

            color:#F37605;

            text-decoration: none;

        }
        .t-title{background:url(../images/06.gif);height:24px;}
        .t-tilte td{font-weight:800;}
        .STYLE4 {
            color: #FF0000;
            font-size: 12px;
        }
        .orange{ color: #F37605; }
		td{ line-height: 8px; }
    </STYLE>
</HEAD>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">会员管理：查看用户余额</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="555">
                <form name="form1" method="GET" action=" " >
                    <tr>
                         <td>
                        
                            &nbsp;&nbsp;综合类型：
                          <select name="selecttype" id="selecttype">
                                <option value="user_name" <?php if(@$_GET["selecttype"]=='user_name') {?> selected <?php }?> >用户名</option>
                                <option value="pay_name" <?php if(@$_GET["selecttype"]=='pay_name') {?> selected <?php }?> >真实姓名</option>
                                <option value="regip" <?php if(@$_GET["selecttype"]=='regip') {?> selected <?php }?>>注册IP</option>
                                <option value="loginip" <?php if(@$_GET["selecttype"]=='loginip') {?> selected <?php }?>>登录ip</option>
                                <option value="regaddress" <?php if(@$_GET["selecttype"]=='regaddress') {?> selected <?php }?>>省份</option>
                                <option value="tel" <?php if(@$_GET["selecttype"]=='tel') {?> selected <?php }?>>手机号码</option>
                                <option value="u_id" <?php if(@$_GET["selecttype"]=='u_id') {?> selected <?php }?>>用户ID</option>
                            </select>
                            &nbsp;&nbsp;内容：
                            <input type="text" name="likevalue" value="<?=@$_GET['likevalue']?>"/>
                            &nbsp;
                            <input name="submit" type="submit" value="查找"/>
                        </td>
                    </tr>   </form>
            </table>
        </td>
    </tr>
</table>

    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">

                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="bg_tr"  align="center">
                        <td width="8.2%" height="25" ><strong>用户名/密码</strong></td>
                        <td width="8.2%" ><strong>姓名</strong></td>
						<td width="8.2%" ><strong>账户总额</strong></td>
                        <td width="8.2%" ><strong>账户余额</strong></td>
                        <td width="8.2%" ><strong>AG余额</strong></td>
                        <td width="8.2%" ><strong>BB余额</strong></td>
                        <td width="8.2%" ><strong>MG余额</strong></td>
                        <td width="8.2%" ><strong>欧博余额</strong></td>
                        <td width="8.2%" ><strong>NA余额</strong></td>
                        <td width="8.2%" ><strong>PT余额</strong></td>
                        <td width="8.2%" ><strong>棋牌</strong></td>
                    </tr>
 <?php 
	$sql="select * from user_list  ";
	if($_GET['likevalue']){
		if($_GET["selecttype"]=='pay_name')
			$sql.=" where pay_name='".$_GET['likevalue']."' ";
		else if($_GET["selecttype"]=='regip')
			$sql.=" where regip='".$_GET['likevalue']."' ";
		else if($_GET["selecttype"]=='loginip')
			$sql.=" where loginip='".$_GET['likevalue']."' ";
		else if($_GET["selecttype"]=='regaddress')
			$sql.=" where regaddress='".$_GET['likevalue']."' ";
		else if($_GET["selecttype"]=='tel')
			$sql.=" where tel='".$_GET['likevalue']."' ";
		else if($_GET["selecttype"]=='u_id')
			$sql.=" where user_id='".$_GET['likevalue']."' ";
		else 
			$sql.=" where user_name='".$_GET['likevalue']."' ";
	}
	$sql.=" order by money desc";
	$query		=	$mysqli->query($sql);
	$sum		=	$mysqli->affected_rows; //总页数
	$ro=array();
	$arr1=array();
	$arr2=array();
	while($rows=$query->fetch_array()){
		$ro[]=$rows;
	}
	foreach($ro as $val){
		$arr1['user_name']=$val['user_name'];
		$arr1['user_pass_naked']=$val['user_pass_naked'];
		$arr1['pay_name']=$val['pay_name'];
		$arr1['total']=$val['money']+$val['ag_money']+$val['bb_money']+$val['ab_money']+$val['mg_money']+$val['pt_money']+$val['na_money']+$val['dx_money']+$val['cp_money']+0;
		$arr1['money']=$val['money']+0;
		$arr1['ag_money']=$val['ag_money']+0;
		$arr1['bb_money']=$val['bb_money']+0;
		$arr1['ab_money']=$val['ab_money']+0;
		$arr1['mg_money']=$val['mg_money']+0;
		$arr1['pt_money']=$val['pt_money']+0;
		$arr1['na_money']=$val['na_money']+0;
		$arr1['dx_money']=$val['dx_money']+0;
		$arr1['cp_money']=$val['cp_money']+0;
		$arr2[]=$arr1;
	}
	$sort = array(  
			'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
			'field'     => 'total',       //排序字段  
	);  
	$arrSort = array();  
	foreach($arr2 AS $uniqid => $rows){  
		foreach($rows AS $key=>$value){  
			$arrSort[$key][$uniqid] = $value;  
		}  
	}  
	if($sort['direction'])  
		array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arr2);
	$page		=	new newPage();
	$thisPage	=	$page->check_Page($thisPage,$sum,100,20);
	$i			=	1; //记录 uid 数
	$start		=	($thisPage-1)*100+1;
	$end		=	$thisPage*100;
	foreach($arr2 as $v){
		if($i >= $start && $i <= $end){
?>
	<tr align="center" onmouseover="this.style.backgroundColor='#EBEBEB'" onmouseout="this.style.backgroundColor='#ffffff'" style="background-color:<?=$color?>">
	  <td><span class="orange"><?php echo $v['user_name'];  ?></span><br /><br /><span><?php echo $v['user_pass_naked'];  ?></span></td>
	  <td><span class="orange"><?php echo $v['pay_name'];?></span></td>
	<td style="color: red;"><?=$v['total']?></td>
	<td><?php echo $v['money'];  ?></td>
	<td><?php echo $v['ag_money']; ?></td>
	<td><?php echo $v['bb_money']; ?></td>
	<td><?php echo $v['mg_money']; ?></td>
	<td><?php echo $v['ab_money']; ?></td>
	<td><?php echo $v['na_money']; ?></td>
	<td><?php echo $v['pt_money']; ?></td>
	 <td><?=$v['cp_money']?></td>
	<td><?=$v['dx_money']?></td>
	</tr>
<?php		
		}
		if($i > $end) break;
		$i++;
	}
?>        
	</table>
</td>
        </tr>
        <tr><td ><div style="float:left;"><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></td></tr>
    </table>
</body>
</html>