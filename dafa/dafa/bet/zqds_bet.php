<?php
if(!isset($_SESSION)){ session_start();}
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆


$name	=	'';
$type	=	'';
$id		=	'';
$tn		=	'';
$pk		=	'';
if($_GET['matchname']=="" || $_GET['matchid']=="" || $_GET['type']==""){
	msg('参数错误，请返回');
}else{
	$name	=	$_GET['matchname'];
	$type	=	$_GET['type'];
	$id		=	intval($_GET['matchid']);
}
//账户金额
$sql	=	"select money from user_list where user_id='".$_SESSION["userid"]."'";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();
$money	=	double_format($row['money']);

$sql	=	'';
if($type=="Match_Ho" || $type=="Match_Ao"){ //全场让球
	$sql=	',Match_RGG,Match_ShowType';
}
if($type=="Match_DxDpl" || $type=="Match_DxXpl"){ //全场大小
	$sql=	',Match_DxGG';
}

$sql	=	"SELECT Match_ID,Match_Master,Match_Guest,".$type.$sql." FROM Bet_Match WHERE ID='$id'";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script>
	var ClientW = $(window).width();
	$('html').css('fontSize',ClientW/3+'px');
</script>
<style>
/* reset */
*{ margin:0; padding:0; }
em { font-style:normal; }
li { list-style:none; }
a { text-decoration:none; }
img { border:none; vertical-align:top; }
textarea { resize:none; overflow:auto; }
em{ font-style:normal; }
body{ width:2.85rem; margin:0 auto; font-size:0.14rem; font-family: "Arial","Microsoft YaHei","ºÚÌå","ËÎÌå",sans-serif; color:#333333; }
/* !£nd reset*/

.nav_list{ width:100%; overflow:hidden; color:#333; }
.nav_list a{ float:right; width:0.6rem; height:0.25rem; border:1px solid #CCCCCC; box-sizing:border-box; text-align:center; line-height:0.25rem; background:#fff; font-size:0.1rem; color:#333333;}
.nav_list a.active{ color:#fff; background:#986600; border-color:#986600; }

.types{ width:100%; margin-top:0.08rem; overflow:hidden; background:#fff; padding-bottom:0.25rem; border-radius:0.05rem; }
.types>aside{ width:100%; height:0.28rem; line-height:0.28rem; border-top:1px solid rgba(204, 204, 204, 0.96); border-bottom:1px solid rgba(204, 204, 204, 0.96); box-sizing:border-box; font-size:0.12rem; text-indent:0.1rem; background:#F5F5F5; }
.types .numBtn{ display:block; width:0.25rem; height:0.25rem; color:#fff; background:#337AB7; text-align:center; line-height:0.25rem; border-radius:0.02rem; margin:0.04rem 0 0 0.04rem; }
.types .talk{ line-height:0.14rem; font-size:0.1rem; margin:0.04rem; }
.types .talk mark{ background:none; }
.types .talk mark.green{ color:green; }
.types .talk mark.blue{ color:blue; }
.types .talk mark.yellow{ color:#F0AD4E; }
.types .talk mark.red{ color:red; }

.main_box{ width:98%; overflow:hidden; margin:0 auto; }
.main_box aside{ padding:0.05rem; font-size:0.13rem; overflow:hidden; background:rgba(223, 208, 175, 0.81); border:1px solid #DDDDDD; box-sizing:border-box;  box-shadow:2px #ccc; }
.main_box>aside p{ font-weight:bolder; font-size:0.1rem; color:#000; line-height:0.16rem; }
.main_box>aside p:nth-of-type(1){ float:left; width:65%; }
.main_box>aside p:nth-of-type(2){ float:right; width:35%; }

.main_box>ul{ width:98%; overflow:hidden; margin:0 auto; font-size:0.1rem; }
.main_box>ul>li{ padding:0.08rem 0.05rem; overflow:hidden; border-bottom:1px solid rgba(0,0,0,0.2); box-sizing:border-box; }
.main_box>ul>li .whos{ overflow:hidden;  }
.main_box>ul>li .whosplay{ overflow:hidden; height:0;  }

div.whos>a{ float:left; width:65%; text-indent:0.15rem; background:url(/img/sai.png) no-repeat 0 center; color:#337ab7; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
div.whos>p{ float:right; width:35%; color:red;  overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }

div.whos>p>mark{ background:none; }
div.whos>p>mark:nth-of-type(1){ background:#FFFF99; color:#5cb85c; }
div.whos>p>mark:nth-of-type(2){ background:#FFFF99; color:#31b0d5; }
</style>
</head>
	<body title="足球单式">
		<section class="nav_list">
			<a href="zqds_bet.php?matchname=<?=urlencode($name)?>&amp;type=<?=$type?>&amp;matchid=<?=$id?>&amp;<?=rand()?>" title="刷新" title="刷新">刷新<em></em></a>
			<a href="bet_zqds.php?matchname=<?=urlencode($name)?>" title="继续交易">继续交易</a>
			<a class="active" href="../main.php" title="返回菜单">&lt;&lt;返回菜单</a>
		</section>
		<section class="types">
			<aside>
					投注信息
			</aside>

			
			<onevent type="ontimer">
					<go href="bet_zqds.php?matchname=<?=urlencode($name)?>"/>
			</onevent>
				<timer value="200"/>
				<onevent type="onenterforward"><refresh><setvar name="money" value="" /></refresh></onevent>
				<p>
				账户金额:<?=$money?><br/>
				<?=$name?><br/>
		<?php
		if($type=="Match_Ho" || $type=="Match_Ao"){ //全场让球
			$tn		=	'让球';
			$pk		=	'<postfield name="pk" value="'.$row['Match_RGG'].'" />';
			if($row['Match_ShowType'] == 'H'){ //主让
				echo $row['Match_Master'].'('.$row['Match_RGG'].')'.$row['Match_Guest'].'<br/>';
			}else{
				echo $row['Match_Guest'].'('.$row['Match_RGG'].')'.$row['Match_Master'].'<br/>';
			}
			if($type=="Match_Ho"){ //选择主队
				echo $row['Match_Master'];
			}else{ //选择客队
				echo $row['Match_Guest'];
			}
		}else{
			echo $row['Match_Master'].' VS '.$row['Match_Guest'].'<br/>';
			if($type=="Match_DxDpl" || $type=="Match_DxXpl"){ //全场大小
				$tn		=	'大小';
				$pk		=	'<postfield name="pk" value="'.$row['Match_DxGG'].'" />';
				if($type=="Match_DxDpl"){ //选择大
					echo '大';
				}else{ //选择小
					echo '小';
				}
				echo $row['Match_DxGG'];
			}elseif($type=="Match_DsDpl"){ //选择单
				$tn		=	'单双';
				echo '单';
			}elseif($type=="Match_DsSpl"){ //选择双
				$tn		=	'单双';
				echo '双';
			}elseif($type=="Match_BzM"){ //选择主队独赢
				$tn		=	'标准盘';
				echo $row['Match_Master'];
			}elseif($type=="Match_BzG"){ //选择客队独赢
				$tn		=	'标准盘';
				echo $row['Match_Guest'];
			}elseif($type=="Match_BzH"){ //选择和局
				$tn		=	'标准盘';
				echo '和局';
			}
		}
		echo ' @ '.double_format($row[$type]).'<br/>';
		$sql_group	=	"SELECT sports_bet,sports_bet_reb,sports_lower_bet FROM user_group where group_id='".@$_SESSION["group_id"]."' limit 0,1";
		$query_group	=	$mysqli->query($sql_group);
		$group_db	=	$query_group->fetch_array();

		?>

					<form action="bet.php" method="post">
						交易金额：<input name="money" type="text" size="5" maxlength="5" /><br/>
						<input type="hidden" name="money" value="$(money)" />
						<input type="hidden" name="type" value="<?=$type?>" />
						<input type="hidden" name="pl" value="<?=double_format($row[$type])?>" />
						<input type="hidden" name="id" value="<?=$row['Match_ID']?>" />
						<input type="hidden" name="matchname" value="<?=$name?>" />
						<input type="hidden" name="sort" value="足球单式" /><?=$pk?>
						<input type="submit" value="交易" />
					</form>
	<br/>

				最低限额：<?=$group_db['sports_lower_bet']?><br/>


				<br/>
				</p>



		</section>

	</body>
</html>