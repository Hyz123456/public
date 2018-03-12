<!DOCTYPE HTML>
<html>
	<head>
		<title>彩票游戏</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="/css/main.css" rel="stylesheet" type="text/css">
                <link href="/css/caipiao.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<section class="seList seLisT3">	<!-- 3六合彩 -->
		<aside>
			<div class="lottery_time">
			<?php 
				include "../app/member/include/com_chk.php";
				
				$sql='select max(qishu) as qishu from lottery_result_tj';
				$query=$mysqli->query($sql) or die('error!');
				$arr=$query->fetch_array();

				$mq=$arr['qishu'];
				$sql='select * from lottery_result_tj where qishu="'.$mq.'"';
				$query=$mysqli->query($sql) or die('error!');
				$arr1=$query->fetch_array();
                                
                                $uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
				$userid=$_SESSION["userid"];
				$sql	=	"select money,pay_name from user_list where user_id='".$userid."' limit 0,1";
				$query	=	$mysqli->query($sql);
				$row	=	$query->fetch_array();
			?>
				<em id="typename">天津时时彩</em>
				<span class="span_right">
                                    <span id="money"><?=$row['money']?></span>
                                    <div  id="ion-navicon"></div>
                                </span>
			</div>
			<div class="lottery_num">
				<p>
					<span><?=$mq?>期:</span>
					<em><?=$arr1['ball_1']?></em>
					<em><?=$arr1['ball_2']?></em>
					<em><?=$arr1['ball_3']?></em>
					<em><?=$arr1['ball_4']?></em>
					<em><?=$arr1['ball_5']?></em>
				</p>
				<p>
					<span class="uu" id="uu"><mark><?=$mq+1?></mark>期</span> 
                                        <span class="ng-binding">开奖:</span>
                                        <span id='djs'>00:00</span>
				</p>
			</div>
			<div  class="lottery_kind">
				<a href="javascript:;" class="active">天津时时彩</a>
				<a href="/main.php?2" id='back' style='margin-left:1.3rem;' >back</a>
			</div>
		</aside>
	<section class="lotterListBox">
		<div class="lotteryBtn">
			<?php for($j=1;$j<6;$j++){
                            if($j==1){?>
                                <a class="active" href="javascript:;">第1球<span class="smallround"></span></a>
                            <?php }else{?>
                                <a href="javascript:;">第<?=$j?>球<span class="smallround"></span></a>
                          <?php  }
                        }?>
			<a href="javascript:;">总和龙虎<span class="smallround"></span></a>
			<a href="javascript:;">前中后三球<span class="smallround"></span></a>
			<a href="javascript:;">牛牛<span class="smallround"></span></a>
		</div>
		<form action="../member/lottery/order/order_tj_ssc.php?style=wap" method="post" id="fomes"  class='box'>
			
			<div class="numBox">
				<nav>
					<span class='play'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<nav><span><b>第1球</b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where lottery_type='天津时时彩' and sub_type='万定位'";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_1_'.($i+1)?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_1_'.($i+2)?>" type="text" /></dis>
				</p>
				<?php
					}
					$sql="select * from odds_lottery_normal where lottery_type='天津时时彩' and sub_type='两面' and ball_type='part1'";
					$query=$mysqli->query($sql) or die('error!');
					$arr1=$query->fetch_array();
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr1['h0']?></span>
					<input name="ball_1_11'" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr1['h1']?></span>
					<input name="ball_1_12" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr1['h2']?></span>
					<input name="ball_1_13" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr1['h3']?></span>
					<input name="ball_1_14" type="text" /></dis>
				</p>
                        </div>
                        <div class="numBox">
				<nav>
					<span class='play'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<nav><span><b>第2球</b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where lottery_type='天津时时彩' and sub_type='仟定位'";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_2_'.($i+1)?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_2_'.($i+2)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr1['h0']?></span>
					<input name="ball_2_11'" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr1['h1']?></span>
					<input name="ball_2_12" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr1['h2']?></span>
					<input name="ball_2_13" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr1['h3']?></span>
					<input name="ball_2_14" type="text" /></dis>
				</p>
                        </div>
                        <div class="numBox">
				<nav>
					<span class='play'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<nav><span><b>第3球</b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where lottery_type='天津时时彩' and sub_type='佰定位'";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_3_'.($i+1)?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_3_'.($i+2)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr1['h0']?></span>
					<input name="ball_3_11'" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr1['h1']?></span>
					<input name="ball_3_12" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr1['h2']?></span>
					<input name="ball_3_13" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr1['h3']?></span>
					<input name="ball_3_14" type="text" /></dis>
				</p>
                        </div>
                        <div class="numBox">
				<nav>
					<span class='play'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<nav><span><b>第4球</b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where lottery_type='天津时时彩' and sub_type='拾定位'";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_4_'.($i+1)?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_4_'.($i+2)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr1['h0']?></span>
					<input name="ball_4_11'" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr1['h1']?></span>
					<input name="ball_4_12" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr1['h2']?></span>
					<input name="ball_4_13" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr1['h3']?></span>
					<input name="ball_4_14" type="text" /></dis>
				</p>
                        </div>
                        <div class="numBox">
				<nav>
					<span class='play'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<nav><span><b>第5球</b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where lottery_type='天津时时彩' and sub_type='个定位'";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_5_'.($i+1)?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_5_'.($i+2)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr1['h0']?></span>
					<input name="ball_5_11'" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr1['h1']?></span>
					<input name="ball_5_12" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr1['h2']?></span>
					<input name="ball_5_13" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr1['h3']?></span>
					<input name="ball_5_14" type="text" /></dis>
				</p>
			</div>

			<div class="numBox">
				<nav>
					<span class='play'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='总和龙虎和' and lottery_type='天津时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
				?>

				<p>
					<dis><span>总和大</span>
					<span><?=$arr['h0']?></span>
					<input name="<?='ball_6_1'?>" type="text" /></dis>
					<dis><span>总和小</span>
					<span><?=$arr['h1']?></span>
					<input name="<?='ball_6_2'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>总和单</span>
					<span><?=$arr['h2']?></span>
					<input name="<?='ball_6_3'?>" type="text" /></dis>
					<dis><span>总和双</span>
					<span><?=$arr['h3']?></span>
					<input name="<?='ball_6_4'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>龙</span>
					<span><?=$arr['h4']?></span>
					<input name="<?='ball_6_5'?>" type="text" /></dis>
					<dis><span>虎</span>
					<span><?=$arr['h5']?></span>
					<input name="<?='ball_6_6'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>和</span>
					<span><?=$arr['h6']?></span>
					<input name="<?='ball_6_7'?>" type="text" /></dis>
				</p>
			</div>

			<div class="numBox">
				<nav>
					<span class='play'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='两面' and lottery_type='天津时时彩' and ball_type='part1'";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=7;$i<10;$i++){
				?>
				<nav><span><b><?php echo $i==7?'前':($i==8?'中':'后');?>三球</b></span></nav>
				<p>
					<dis><span>豹子</span>
					<span><?=$arr['h0']?></span>
					<input name="<?='ball_'.$i.'_1'?>" type="text" /></dis>
					<dis><span>顺子</span>
					<span><?=$arr['h1']?></span>
					<input name="<?='ball_'.$i.'_2'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>对子</span>
					<span><?=$arr['h2']?></span>
					<input name="<?='ball_'.$i.'_3'?>" type="text" /></dis>
					<dis><span>半顺</span>
					<span><?=$arr['h3']?></span>
					<input name="<?='ball_'.$i.'_4'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>杂六</span>
					<span><?=$arr['h4']?></span>
					<input name="<?='ball_'.$i.'_5'?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
			</div>

			<div class="numBox">
				<nav>
					<span class='play'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='牛牛' and lottery_type='天津时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
				?>

				<p>
					<dis><span>无牛</span>
					<span><?=$arr['h0']?></span>
					<input name="<?='ball_10_1'?>" type="text" /></dis>
					<dis><span>牛1</span>
					<span><?=$arr['h1']?></span>
					<input name="<?='ball_10_2'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛2</span>
					<span><?=$arr['h2']?></span>
					<input name="<?='ball_10_3'?>" type="text" /></dis>
					<dis><span>牛3</span>
					<span><?=$arr['h3']?></span>
					<input name="<?='ball_10_4'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛4</span>
					<span><?=$arr['h4']?></span>
					<input name="<?='ball_10_5'?>" type="text" /></dis>
					<dis><span>牛5</span>
					<span><?=$arr['h5']?></span>
					<input name="<?='ball_10_6'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛6</span>
					<span><?=$arr['h6']?></span>
					<input name="<?='ball_10_7'?>" type="text" /></dis>
					<dis><span>牛7</span>
					<span><?=$arr['h7']?></span>
					<input name="<?='ball_10_8'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛8</span>
					<span><?=$arr['h8']?></span>
					<input name="<?='ball_10_9'?>" type="text" /></dis>
					<dis><span>牛9</span>
					<span><?=$arr['h9']?></span>
					<input name="<?='ball_10_10'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛牛</span>
					<span><?=$arr['h10']?></span>
					<input name="<?='ball_10_11'?>" type="text" /></dis>
					<dis><span>牛大</span>
					<span><?=$arr['h11']?></span>
					<input name="<?='ball_10_12'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛小</span>
					<span><?=$arr['h12']?></span>
					<input name="<?='ball_10_13'?>" type="text" /></dis>
					<dis><span>牛单</span>
					<span><?=$arr['13']?></span>
					<input name="<?='ball_10_14'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>牛双</span>
					<span><?=$arr['h14']?></span>
					<input name="<?='ball_10_15'?>" type="text" /></dis>
				</p>
			</div>

				<div class="sub">
                                    <div class="col-50">
                                        <div class="inputbox">
                                            <div class="ng-binding">已选中<span class="text-yellow">0</span>注</div>
                                            <input type="tel" placeholder="输入金额" value="" id="money_sub"  onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')" />
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <input id="reset" type="reset" value="重填" />
                                        <input id="submit" type="submit" value="投注" />
                                    </div>
                                </div>
				</form>
				</section>
<div class="popover-backdrop">
    <div class="popover-wrapper">
        <div class="list"> 
            <a href="/member/final1/LT_result.php?gtype=TJ">开奖历史</a>
        </div>
        <div class="popover-arrow"></div>
    </div>
</div>
</section>
<section class="seList_right">
<?php 
    include "caigames_1.php";
?>
</section>
		<script>
			//动态操作
			(function(){
				var typeName = [
					{'type':'重庆时时彩'},
					{'type':'北京PK拾'},
					{'type':'福彩3D'},
					{'type':'排列三'},
					{'type':'北京快乐B'}
				];
				var data = window.location.href ;
				var num = 0;
				for(var attr in typeName){
					if( data.indexOf( '?'+attr ) != -1 ){
						$('#typename').html( typeName[attr]['type'] );
						break;
					}
				}
			})();
			
		</script>
		<script>
			//彩票盒切换
			(function(){
				var caipiaoBox = $('.lottery_kind a');

				caipiaoBox.each(function(i){
					caipiaoBox.on('touchend',caBfn);
				});
				var onOff = true;
				caBfn();
				function caBfn(){
					var This = $(this);
					if(onOff){
						This = caipiaoBox.eq(0);
						onOff = false;
					}
					This.addClass('active');
					caipiaoBox.not(This).removeClass('active');

					$('.lotterListBox').eq(This.index()).css('display','block');
					$('.lotterListBox').not( $('.lotterListBox').eq(This.index()) ).css('display','none');


					//切换选择的彩票
					var caipiaoT = $('.lotterListBox').eq( This.index() ).find('.lotteryBtn');	//按钮列表盒子 1
					var ListBox = $('.lotterListBox').eq( This.index() ).find('.numBox');	//对应按钮列表盒子 多个
						Height();
						if(caipiaoT.find('a')){
							var caiPiaonm = caipiaoT.find('a'); 

							caiPiaonm.on('touchend',caifn);
							function caifn(){
								$(this).addClass('active');
								caiPiaonm.not($(this)).removeClass('active');
								ListBox.eq($(this).index()).css('display','block');
								ListBox.not( ListBox.eq($(this).index()) ).css('display','none');
								Height();
							}
						}
				}
			})();

			//iframe Height
			Height();
			function Height(){	
				$(window.parent.document).find('#iFrame').height( $('body').height() );
			}

			//倒计时
			(function(){
					function updateOpenTime(){
						$.post("../member/lottery/class/odds_tj.php", function(data){
							//if(data.isopen>0 && ((data.opentime>40 && data.opentime<240) || (data.opentime>20 && data.opentime<30))){
								//clearTimeout(fp);
								//endtime(data.opentime);
								//$("#djs").html(data.number);
							//}
							$m=Math.floor(data.opentime/60);
							$s=data.opentime-$m*60;
							$("#djs").html(($m<10?'0'+$m:$m)+':'+($s<10?'0'+$s:$s));
						}, "json");
					}
					setInterval(updateOpenTime,1000);
                                       
			})();

		</script>
                <script src="caipiao.js" type="text/javascript"></script>
	</body>
</html>