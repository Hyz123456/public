<?php 
if(!isset($_SESSION)){ session_start();}
include_once("../include/mysqlis.php");
include_once("../include/config.php");

$date	=	date('Y-m-d',time());
if($_GET['ymd']) $date	=	$_GET['ymd'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
<link href="../show/style/css/right.css" rel="stylesheet" type="text/css" />
<script language="javascript">
if(self==top){
	top.location='/index.php';
}
</script>
<script language="javascript" src="../show/style/js/jquery.js"></script> 
<script language="javascript">
var i = 31;
function check(){			
	clearTimeout(aas);		
	i = i -1;
	
	$("#location").html("对不起,您点击页面太快,请在"+i+"秒后进行操作");
	if(i == 1){
		window.location.href ='baseball_match.php';
	}
	var aas = setTimeout("check()",1000);
}
</script>
</head>

<body class="right_body">
<div id="right_1">
  <div id="shuaxin">
	<div id="r_t_2">棒球结果</div>
	<div id="ladong_1" style="padding-top:10px;"><form class="bk3" style="margin:0 0 0 0" action="" method="get"> <h1 style="line-height:25px;text-align:right;font-size:12px; padding-right:8px;">选择日期：
	  <select name="ymd" id="ymd">
<?php 
for($i=0;$i<7;$i++){
	$d	=	date('Y-m-d',time()-$i*86400);
?>
	    <option value="<?=$d?>" <?= $d==$date ? 'selected="selected"' : ''?>><?=$d?></option>
<?php 
}
?>
	    </select>&nbsp;&nbsp;<input  type="submit"  value="查询" class="anniu_000"/>
    </h1>
	</form></div>
  </div>
<div id="shuzi">
</div>
</div>
<div id="right_2">
  <div id="lantiao">
    <div class="bai_x zu_1">时间</div>
	<div class="bai_x zu_jieguo_2">比赛队伍</div>
	<div class="bai_x zu_4">半场</div>
	<div class="bai_z zu_4">全场</div>
  </div>
<?php  
$sql	=	"select Match_Date,Match_Time,match_name,match_master,match_guest,MB_Inball,TG_Inball,MB_Inball_HR,TG_Inball_HR from baseball_match where MB_Inball is not null and  match_Date='".date('m-d',strtotime($date))."' and match_js=1";//
$query	=	$mysqlis->query($sql);  		
$rows	=	$query->fetch_array();
if(!$rows){
	echo "<div style='line-height:40px;text-align:center;color:#000000; border-bottom:1px solid #999; width:820px; float:left'>暂无结果</div>";
}else{
	do{
		if($temp_match_name!=$rows["match_name"]){
			$temp_match_name=$rows["match_name"];				
?> <div class="liansai"><?=$rows["match_name"]?></div>
<?php 
		}
?>
  <div class="bisai_bo" style="background-color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FBFFD6'" onmouseout="this.style.backgroundColor='#FFFFFF'">
    <div class="bodan_xx zu_1"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center" valign="middle"><?=$rows["Match_Date"]?><br /><?=$rows["Match_Time"]?></td></tr></table></div>
	<div class="zhudui_bo">
	  <div class="bodan_x zu_jieguo_2"><?=$rows["match_master"]?></div>
      <?php  if($rows["MB_Inball"]<0) {?>
	  <div class="bodan_x zu_jieguo_4">赛事无效</div>
	  <div class="bodan_z zu_jieguo_4">赛事无效</div>
      <?php  }else{?>
	  <div class="bodan_x zu_jieguo_4"><?=$rows["MB_Inball_HR"] ?></div>
	  <div class="bodan_z zu_jieguo_4"><?=$rows["MB_Inball"]?></div>
      <?php  }?>
	</div>
	<div class="kedui_bo">
	  <div class="bodan_x zu_jieguo_2" style="color:#890209;"><?=$rows["match_guest"]?></div>
      <?php  if($rows["TG_Inball"]<0) {?>
	  <div class="bodan_x zu_jieguo_4">赛事无效</div>
	  <div class="bodan_z zu_jieguo_4">赛事无效</div>
      <?php  }else{?>
	  <div class="bodan_x zu_jieguo_4"><?=$rows["TG_Inball_HR"]?></div>
	  <div class="bodan_z zu_jieguo_4"><?=$rows["TG_Inball"]?></div>
      <?php  }?>
	</div>
  </div>
<?php 
	}while($rows = $query->fetch_array());
}
?>
</div>
</body>
<script language="javascript" src="../show/style/js/mouse.js"></script>
</html>