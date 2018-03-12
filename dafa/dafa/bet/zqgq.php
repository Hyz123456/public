<?php
if(!isset($_SESSION)){ session_start();}
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆
include_once("../cache/zqgq.php");

$match_names = array();
if(isset($zqgq) && !empty($zqgq) && (time()-$lasttime <= 10)){
	$zqcount = count($zqgq);
	for($i=0; $i<$zqcount; $i++){
		$match_names[$zqgq[$i]['Match_Name']]++;    ////只保留联赛名
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
<link href="/bet/css/commonst.css" rel="stylesheet" type="text/css"><link href="/bet/css/css.css" rel="stylesheet" type="text/css">
</head>
	<body title="足球滚球">
			<section class="nav_list">
				<a href="zqgq.php?<?=rand()?>" title="刷新">刷新<em></em></a>
                                <aside>足球（滚球）</aside>
				<a class="active" href="javascript:history.go(-1);" title="返回菜单"></a>
			</section>
			<section class="types">
                                <div class="beijing"><a class="numBtn" href="javascript:;">1</a></div>
				<p class="talk">
					说明：点击+号图标展开；投注时请选择对应按钮，主队(<mark class="green">绿色</mark>)客队(<mark class="blue">蓝色</mark>)和(<mark class="yellow">黄色</mark>),赔率水位变化时背景变<mark class="red">红色</mark>
				</p>
				<article class="main_box">
					<aside>
						<p>赛程<br />点击展开</p>
						<p>时间<br />主队/客队</p>
					</aside>
					<ul>
						<?php
						if(count($match_names) < 1){
						?>
							<li class="no_bg">
								<div></div>
									暂无赛事
							</li>
						<br/>
						<?php
						}else{
							foreach($match_names as $k=>$v){
						?>
						<li>
							<div class="whos">
								<a  href="bet_zqgq.php?matchname=<?=urlencode($k)?>" title="<?=$k?>"><?=$k?>(<?=$v?>)</a>
							</div>
						</li>
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