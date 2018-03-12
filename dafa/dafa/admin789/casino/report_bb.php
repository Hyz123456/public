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
if($_GET['username']) {
	$sql="select bb_username from user_list where user_name = '" . $_GET['username'] . "'";
	$query = $mysqli->query($sql);
	$rows = $query->fetch_array();
	$user = $rows[0];
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>BBIN真人报表</TITLE>
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
</HEAD>

<body>
<script language="JavaScript" src="../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">BBIN真人报表（注单为美东时间）</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF">
	  <table width="100%">
      <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();" name="FrmData" id="FrmData">
      <tr align="center">
        <td align="center">
        <td width="729" align="left">
          会员名：
            <input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
            <br /> <br />日期：
            <input name="date_start" type="text" id="date_start" value="<?=$_GET['date_start']?>"  onClick="new CalendarTime(2008,2020,3).show(this);"size="18" maxlength="20"  />  &nbsp;  到
            &nbsp;  <input name="date_end" type="text" id="date_end" value="<?=$_GET['date_end']?>" onClick="new CalendarTime(2008,2020,3).show(this);" size="18" maxlength="20"  /> 
            &nbsp;
            <input type="submit" name="Submit" value="搜索"></td>
			<td style="position: relative;top: 17px;">
				<input data="report.php" type="Button" class="hrets" value="AG报表"> </td>
			<td style="position: relative;top: 17px;">
              <input  data="report_bb.php" type="Button" class="hrets" value="BB报表">  </td>

			<td style="position: relative;top: 17px;">
              <input data="report_mg.php" type="Button" class="hrets" value="MG报表">  </td>
			<td style="position: relative;top: 17px;">
              <input data="report_ab.php" type="Button" class="hrets" value="欧博报表">  </td>
			<td style="position: relative;top: 17px;">
              <input data="report_na.php" type="Button" class="hrets" value="NA报表"></td>
			  <td style="position: relative;top: 17px;">
              <input data="report_pt.php" type="Button" class="hrets" value="PT报表"></td>
			  <td style="position: relative;top: 17px;">
              <input data="../casino/report_dx.php" type="Button" class="hrets" value="棋牌"></td>
			  <script src="/cl/js/jquery-1.7.2.min.js"></script>
			<script>
				(function($){
					$('.hrets').on('click', function(){
						console.log(121212121212);
						window.location.href = $(this).attr('data');
					});
				})(jQuery);
			</script>
			
        </tr>
      </form>
    </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
   
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" >
      <tr  class="bg_tr" align="center" style="line-height: 1.5em;">
         <th>会员名</th>
		<th>真人用户名</th>
		<th>BBIN余额</th>
        <th>日期</th>
        <th>下注笔数</th>
        <th>投注金额</th>
        <th>有效投注</th>
        <th>结果</th>
      </tr>
<?php 
		$sql = "SELECT COUNT(a.id) AS cnt, SUM(a.betAmount) AS ba, SUM(a.netAmount) AS na, SUM(a.validBetAmount) AS va,a.playerName,u.user_name FROM agbetdetail a,user_list u where a.platformType='bbin' and a.betTime >= '".$_GET['date_start']."' and a.betTime <= '".$_GET['date_end']."' and a.playerName = u.bb_username";
		if($_GET['username']) 
			$sql .= " and a.playerName = '$user'";
		$sql .= " GROUP BY a.playerName ORDER BY cnt DESC,ba desc";
		$query = $mysqli->query($sql);
		$sum		=	$mysqli->affected_rows; //总页数
	    $thisPage	=	1;
	    if($_GET['page']){
	  	    $thisPage	=	$_GET['page'];
	    }
        $page		=	new newPage();
	    $thisPage	=	$page->check_Page($thisPage,$sum, 50,40);
	    $i		=	1; //记录 bid 数
	    $start	=	($thisPage-1)*50+1;
	    $end		=	$thisPage*50;
	 	$bet_money=$win=$val_money=0;
		if($query)
      	while ($rows = $query->fetch_array()) {
      		$color = "#FFFFFF";
			$over	 = "#EBEBEB";
			$out	 = "#ffffff";
			
			$bet_money += $rows['ba'];
			$val_money += $rows['va'];
			$win += $rows['na'];
			if($i >= $start && $i <= $end){
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>;">
			  <td  align="center" ><?php echo $rows['user_name']?></td>
	          <td  align="center" ><?php echo $rows['playerName']?></td>
			   <td><a href="javascript:window.open('/newbbin2/cha2.php?u=<?php echo $rows['playerName']?>','list','width=440,height=180,left=50,top=100,scrollbars=no').focus();">点击获取</a></td>
              <td><?php echo $_GET['date_start']?> - <?php echo $_GET['date_end']?></td>
			  <td><?php echo $rows['cnt']?></td>
			  <td><?php echo $rows['ba']?></td>
              <td><?=$rows["va"]?></td>
              <td><?php echo $rows['na']?></td>
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
    <tr>
      <td >
    统计:总注金:<?=$bet_money?>，有效投注:<?=$val_money?>，会员结果：<span style="color:<?=$win < 0 ? '#FF0000' : '#009900'?>;"><?=$win?></span>
  </td>
    </tr>
  <tr><td ><?=$page->get_htmlPage($_SERVER["REQUEST_URI"])?></td></tr>
</table>
</body>
</html>