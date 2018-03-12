<?php
if(!isset($_SESSION)){ session_start();}
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆

$name	=	'';
if($_GET['matchname']==""){
	msg('参数错误，请返回');
}else{
	$name=$_GET['matchname'];
}
$sql	=	"SELECT ID,Match_Date,Match_Time,Match_Master,Match_Guest,Match_Name,Match_IsLose,Match_Bmdy,Match_BHo,Match_Bdpl,Match_Bgdy, Match_BAo,Match_Bxpl,Match_Bhdy,Match_BRpk,Match_Hr_ShowType,Match_Bdxpk FROM bet_match WHERE Match_Type=1 and match_date='".date("m-d",$et_time)."' AND Match_CoverDate>'".$et_time_now."' and (Match_BHo+Match_BAo<>0 or Match_Bdpl+Match_Bxpl<>0) and Match_IsShowb=1 and match_name='".$name."' order by Match_CoverDate,iPage,match_name,Match_Master,Match_ID,iSn";

$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

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
<link href="/bet/css/commonbet.css" rel="stylesheet" type="text/css">
</head>
	<body title="足球上半场">
		<section class="nav_list">
			<a href="bet_zqsbc.php?matchname=<?=urlencode($name)?>" title="刷新">刷新<em></em></a>
			<a class="active" href="javascript:history.go(-1);" title="返回菜单">&lt;&lt;返回</a>
		</section>
		<section class="types">
				<aside>
					足球上半场 >>
				</aside>
				<a class="numBtn" href="javascript:;">1</a>
				<p class="talk">
					说明：投注时请选择对应按钮，主队(<mark class="green">绿色</mark>)客队(<mark class="blue">蓝色</mark>)和(<mark class="yellow">黄色</mark>),赔率水位变化时背景变<mark class="red">红色</mark>
				</p>
				<article class="main_box">
					<aside>
							<p>比赛详情如下：</p>
					</aside>
					<ul class="content">
						<li><h3><?=$name?></h3></li>
<?php
if(!$row){
?>
			<li class="no_bg">
				<div></div>
					暂无赛事
			</li>
<?php
}else{
	do{
		$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
		$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);
?>
			<li class="lefts"><time>时间</time><mark class="times"><?=$row['Match_Date'].' '.$row['Match_Time']?></mark></li>
			
			<?php
			if($row["Match_BHo"]<>"" && $row["Match_BHo"]<>0){
				?>
				<li>
					<?php 
								?>
						<div class="twos">
					<?php
				echo $row['Match_Master'];
				if($row['Match_Hr_ShowType'] == 'H') echo '('.$row['Match_BRpk'].')'; //主让
				echo ' <a href="zqsbc_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['ID'].'&amp;type=Match_BHo" title="'.double_format($row["Match_BHo"]).'">'.double_format($row["Match_BHo"]).'</a>';

					?>
							</div>
					<?php
							?>
						<div class="twos">
					<?php

				echo $row['Match_Guest'];
				if($row['Match_Hr_ShowType'] == 'C') echo '('.$row['Match_BRpk'].')'; //客让
				echo ' <a href="zqsbc_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['ID'].'&amp;type=Match_BAo" title="'.double_format($row["Match_BAo"]).'">'.double_format($row["Match_BAo"]).'</a>';
					?>
							</div>
					<?php
					?>
				</li>
				<?php
			}else{
			?>

			<li>
				<div class="twos"><?=$row['Match_Master']?></div>
				<div class="twos"><?=$row['Match_Guest']?></div>
			</li>

			<?php
			}
			if($row["Match_Bdpl"]<>"" && $row["Match_Bdpl"]<>0){
			?>
			<li>
				<div class="twos">
					大(<?=$row["Match_Bdxpk"]?>) 
					<a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bdpl" title="<?=double_format($row["Match_Bdpl"])?>"><?=double_format($row["Match_Bdpl"])?></a>
				</div>
				<div class="twos">
					小(<?=$row["Match_Bdxpk"]?>) 
					<a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bxpl" title="<?=double_format($row["Match_Bxpl"])?>"><?=double_format($row["Match_Bxpl"])?></a>
				</div>
			</li>
			<?php
			} ?>
			
			<li>
			<?php
			if($row["Match_Bmdy"]<>"" && $row["Match_Bmdy"]<>0){
			?>
				<mark class="green">主胜
					<a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bmdy" title="<?=double_format($row["Match_Bmdy"])?>"><?=double_format($row["Match_Bmdy"])?>
					</a>
				</mark>
			<?php
			}
			if($row["Match_Bgdy"]<>"" && $row["Match_Bgdy"]<>0){
			?>
				<mark class="blue">客胜 
					<a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bgdy" title="<?=double_format($row["Match_Bgdy"])?>"><?=double_format($row["Match_Bgdy"])?>
					</a>
				</mark>
			<?php
			}
			if($row["Match_Bhdy"]<>"" && $row["Match_Bhdy"]<>0){
			?>
				<mark class="yellow">和局 
					<a href="zqsbc_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['ID']?>&amp;type=Match_Bhdy" title="<?=double_format($row["Match_Bhdy"])?>"><?=double_format($row["Match_Bhdy"])?></a>
				</mark>
			<?php
			}
			?>
			</li>

<?php
	}while($row	= $query->fetch_array());
}
?>
		
			</ul>
			</article>
		</section>
</body>
<script>
	Height();
		function Height(){	
			$(window.parent.document).find('#iFrameT').height( $('body').height() );
		}
</script>
<script src="./js/time.js" type="text/javascript"></script>
</html>