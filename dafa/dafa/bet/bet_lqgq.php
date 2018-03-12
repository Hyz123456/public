<?php
if(!isset($_SESSION)){ session_start();}
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆
include_once('../cache/lqgq.php');

$name	=	'';
if($_GET['matchname']==""){
	msg('参数错误，请返回');
}else{
	$name=$_GET['matchname'];
}
$i		=	0;
$rows	=	array();

if(time()-$lasttime > 10){ //超时
	if($count > 0){ //有数据重新采集一次，看是否有数据
		msg("赔率发生改变,重新下注.[702]");
	}
}


if(time()-$lasttime <= 10){ //3秒内更新，才是最新滚球数据
	foreach($lqgq as $k=>$v){
		if($name == $v['Match_Name']){ //属于用户选择的联赛下的赛事
			$rows[$i++]	=	$lqgq[$k];
		}
	}
}

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
	<body title="篮球滚球">
		<section class="nav_list">
			<a href="bet_lqgq.php?matchname=<?=urlencode($name)?>" title="刷新">刷新<em></em></a>
			<a class="active" href="javascript:history.go(-1);" title="返回菜单">&lt;&lt;返回</a>
		</section>
		<section class="types">
				<aside>
					篮球滚球 >>
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
if(count($rows) < 1){
?>
			<li class="no_bg">
				<div></div>
					暂无赛事
			</li>
			<br/>
<?php
}else{
	foreach($rows as $k=>$row){
		$row['Match_Guest']		=	str_replace("&","&amp;",$row['Match_Guest']);
		$row['Match_Master']	=	str_replace("&","&amp;",$row['Match_Master']);
?>
			<li class="lefts"><time>开赛时间</time><mark class="times"><?=$row['Match_Time']?></mark></li>
			<?php
			if($row["Match_Ho"]!=0.00){
			?>
			<li>
				<div class="twos">
				<?php
				echo $row['Match_Master'];
				if($row['Match_ShowType'] == 'H') echo '('.$row['Match_RGG'].')'; //主让
				echo '<a href="lqgq_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['Match_ID'].'&amp;type=Match_Ho" title="'.$row["Match_Ho"].'">'.$row["Match_Ho"].'</a>';
			?>
				</div>

				<div class="twos">
			<?php
				echo $row['Match_Guest'];
				if($row['Match_ShowType'] == 'C') echo '('.$row['Match_RGG'].')'; //客让
				echo '<a href="lqgq_bet.php?matchname='.urlencode($name).'&amp;matchid='.$row['Match_ID'].'&amp;type=Match_Ao" title="'.$row["Match_Ao"].'">'.$row["Match_Ao"].'</a>';
			?>
				</div>
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
			if($row["Match_DxDpl"]!=0.00){
			?>
			<li>
				<div class="twos">
				大(<?=$row["Match_DxGG"]?>)
				<a href="lqgq_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['Match_ID']?>&amp;type=Match_DxDpl" title="<?=$row["Match_DxDpl"]?>"><?=$row["Match_DxDpl"]?>
				</a>
				</div>
				<div class="twos">
				小(<?=$row["Match_DxGG"]?>)
				<a href="lqgq_bet.php?matchname=<?=urlencode($name)?>&amp;matchid=<?=$row['Match_ID']?>&amp;type=Match_DxXpl" title="<?=$row["Match_DxXpl"]?>"><?=$row["Match_DxXpl"]?>
				</a>
				</div>
			</li>
			<?php
			}
			?>
<?php
	}
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