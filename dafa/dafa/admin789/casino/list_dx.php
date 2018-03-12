<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");
include_once("newPage.php");

check_quanxian("真人娱乐");

if(!isset($_GET['date_start'])) $_GET['date_start'] = Date('Y-m-d 00:00:00');
if(!isset($_GET['date_end'])) $_GET['date_end'] = Date('Y-m-d 23:59:59');
$arrGameTypes = Array(
	'ptg0001' => '水果机',
	'ptg0002' => '奔驰宝马',
	'ptg0003' => '捕牛达人',
	'ptg0004' => '千炮捕鱼',
	'ptg0005' => '航海王',
	'ptg0006' => '欢乐斗地主',
	'ptg0007' => '飞禽走兽',
	'ptg0008' => '豪车漂移',
	'ptg0009' => '百人牛牛',
	'ptg0010' => '水浒传',
	'ptg0011' => '金蟾捕鱼',
	'ptg0012'  => '大闹天宫',
    'ptg0013' => '二人牛牛',
	'ptg0014'  => '四人牛牛',
	'ptg0015' => '六人牛牛',
	'ptg0016' => '炸金花',
	'ptg0017' => '梭哈'
	
);
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>BH电子注单列表</TITLE>
<link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css">
<script type="text/javascript" charset="utf-8" src="/js/jquery.js" ></script>
<script language="javascript">
function go(value){
	if(value != "") location.href=value;
	else return false;
}

function check(){
	if($("#tf_id").val().length > 5){
		$("#status").val("8,0,1,2,3,4,5,6,7");
	}
	return true;
}
</script>
<script language="JavaScript">

function chg_date(range,num1,num2){ 

//alert(num1+'-'+num2);
if(range=='t' || range=='w' || range=='r'){
 FrmData.date_start.value ='<?=date("Y-m-d")?>';
 FrmData.date_end.value =FrmData.date_start.value;}

if(range!='t'){
 if(FrmData.date_start.value!=FrmData.date_end.value){ FrmData.date_start.value ='<?=date("Y-m-d")?>'; FrmData.date_end.value =FrmData.date_start.value;}
 var aStartDate = FrmData.date_start.value.split('-');  
 var newStartDate = new Date(parseInt(aStartDate[0], 10),parseInt(aStartDate[1], 10) - 1,parseInt(aStartDate[2], 10) + num1);   
 FrmData.date_start.value = newStartDate.getFullYear()+ '-' + (newStartDate.getMonth() + 1)+ '-' + newStartDate.getDate();   
 var aEndDate = FrmData.date_end.value.split('-');  
 var newEndDate = new Date(parseInt(aEndDate[0], 10),parseInt(aEndDate[1], 10) - 1,parseInt(aEndDate[2], 10) + num2);   
 FrmData.date_end.value = newEndDate.getFullYear()+ '-' + (newEndDate.getMonth() + 1)+ '-' + newEndDate.getDate();   
}
 
}
</script>
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
td{padding:3px;}
a{
	color:#F37605;
	text-decoration: none;
}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>

<body>
<script language="JavaScript" src="../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">BH电子注单管理：查看所有注单情况（注单为北京时间）</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	  <table width="100%">
      <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();" name="FrmData" id="FrmData">
      <tr align="center">
            <td>日期
            <input name="date_start" type="text" id="date_start" value="<?=$_GET['date_start']?>" onClick="new CalendarTime(2008,2020,3).show(this);" size="18" maxlength="20"  />  到
            <input name="date_end" type="text" id="date_end" value="<?=$_GET['date_end']?>" onClick="new CalendarTime(2008,2020,3).show(this);" size="18" maxlength="20"  /></td>
			<td><input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00")?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59")?>'" value="今日"> </td>
			<td>
			              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00",strtotime("- 1 day"))?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59",strtotime("-1 day"))?>'" value="昨日">  </td>
			
			<td>
			              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00",strtotime("last Monday"))?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59")?>'" value="本星期">  </td>
			<td>
			              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-d 00:00:00",strtotime("last Monday")-604800)?>';FrmData.date_end.value='<?=date("Y-m-d 23:59:59",strtotime("last Monday")-86400)?>'" value="上星期">  </td>
			<td>
			              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m").'-01'?> 00:00:00';FrmData.date_end.value='<?=date("Y-m-d 23:59:59")?>'" value="本月"></td>
			  <td>
			              <input name="Submit" type="Button" class="za_button" onClick="FrmData.date_start.value='<?=date("Y-m-01 00:00:00",strtotime("-1 month"))?>';FrmData.date_end.value='<?=date("Y-m-t 23:59:59",strtotime("-1 month"))?>'" value="上月"></td>
			<td>会员名
            <input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="10"></td>
            <td>单号
            <input name="bill_no" type="text" id="bill_no" value="<?=@$_GET['bill_no']?>" size="15"></td>
			
            <td><input type="submit" name="Submit" value="搜索"></td>
        </tr>
      </form>
    </table>

  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
      <tr  class="bg_tr" align="center" style="line-height: 1.5em;">
        <td><strong>编号</strong></td>
        <td><strong>会员名</strong></td>
		<td><strong>真人用户名</strong></td>
        <td><strong>单号</strong></td>
        <td><strong>下注时间</strong></td>
        <td><strong>下注金额</strong></td>
		<td><strong>返水</strong></td>
        <td><strong>类型</strong></td>
        <td><strong>游戏</strong></td>
        <td><strong>局号</strong></td>
        <td><strong>下注IP</strong></td>
      </tr>
<?php 
      $sql	=	"select a.id from agbetdetail a,user_list u where a.platformType='dxdz' and a.playerName=u.dx_username ";
      if($_GET['username']) $sql .= " and u.user_name= '" . $_GET['username'] . "'";
      if($_GET['date_start']) $sql .= " and a.betTime >= '" . $_GET['date_start'] . "'";
      if($_GET['date_end']) $sql .= " and a.betTime <= '" . $_GET['date_end'] . "'";
      if($_GET['bill_no']) $sql .= " and a.billNo = '" . $_GET['bill_no'] . "'";
	  $sql.=" order by a.betTime desc ";
	  $query	=	$mysqli->query($sql);
	  $sum		=	$mysqli->affected_rows; //总页数
	  $thisPage	=	1;
	  if($_GET['page']){
	  	  $thisPage	=	$_GET['page'];
	  }
      $page		=	new newPage();
	  $thisPage	=	$page->check_Page($thisPage,$sum, 50,40);
	  
	  $bid		=	'';
	  $i		=	1; //记录 bid 数
	  $start	=	($thisPage-1)*50+1;
	  $end		=	$thisPage*50;
	  if($query)
	  while($row = $query->fetch_array()){
	  	  if($i >= $start && $i <= $end){
	  	  	$bid .=	$row['id'].',';
		  }
		  if($i > $end) break;
		  $i++;
	  }
	  if($bid){
	  	$bid	=	rtrim($bid,',');
	  	$sql="select a.*,b.user_name from (select * from agbetdetail where id in($bid)) a left join user_list b on a.playerName=b.dx_username order by a.betTime desc";
	  	$query	=	$mysqli->query($sql);
	 	$bet_money=$win=$val_money=0;
      	while ($rows = $query->fetch_array()) {
      		$color = "#FFFFFF";
			$over	 = "#EBEBEB";
			$out	 = "#ffffff";
			if($rows['betAmount']<0)
				$bet_money += $rows['betAmount'];
			$win +=$rows['betAmount'];
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>;">
	          <td  align="center" ><?=$rows["id"]?></td>
			  <td><?php echo $rows['user_name']?></td>
              <td><a
			  href="list_dx.php?username=<?=urlencode($rows["playerName"])?>&date_start=<?=$_GET['date_start']?>&date_end=<?=$_GET['date_end']?>"><?=$rows["playerName"]?></a>
			  </td>
			  <td><?php echo $rows['billNo']?></td>
              <td><?=$rows["betTime"]?></td>
              <td><?php echo $rows['betAmount']?></td>
              <!-- <td><?=$rows["validBetAmount"]?></td> -->
			  <td><?php echo $rows['fs_money']?></td>
			 
              <td><?=$rows["agentCode"]?></td>
			  
	          
             <td><?=$arrGameTypes[$rows["gameType"]]?></td>
              <!-- <td><?php if($rows['playType']!="") echo $rows['playType'] ;?></td> 
              <td><?php echo $rows['tableCode']?></td> -->
              <td><?php echo $rows['gameCode']?></td>
	          <td ><?php echo $rows['round']?></td>
        </tr> 	
      	<?
      }
	}
      ?>
    </table>
    </td>
  </tr>
    <tr>
      <td >
    该页统计:总注金:<?=0-$bet_money?>，会员结果：<span style="color:<?=$win < 0 ? '#FF0000' : '#009900'?>;"><?=$win?></span>
  </td>
    </tr>
  <tr><td >
 <?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?>
  </td></tr>
  
</table>

</body>
</html>