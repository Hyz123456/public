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
				
				$sql='select max(qishu) as qishu from lottery_result_bjpk';
				$query=$mysqli->query($sql) or die('error!');
				$arr=$query->fetch_array();

				$mq=$arr['qishu'];
				$sql='select * from lottery_result_bjpk where qishu="'.$mq.'"';
				$query=$mysqli->query($sql) or die('error!');
				$arr1=$query->fetch_array();
                                
                                $uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
				$userid=$_SESSION["userid"];
				$sql	=	"select money,pay_name from user_list where user_id='".$userid."' limit 0,1";
				$query	=	$mysqli->query($sql);
				$row	=	$query->fetch_array();
			?>
				<em id="typename">北京PK拾</em>
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
					<em><?=$arr1['ball_6']?></em>
					<em>+</em>
					<em><?=$arr1['ball_7']?></em>
					<em><?=$arr1['ball_8']?></em>
					<em><?=$arr1['ball_9']?></em>
					<em><?=$arr1['ball_10']?></em>
				</p>
				<p>
                                        <span id='uu' class='uu'><mark><?=$mq+1?></mark>期</span>
                                        <span class="ng-binding">开奖:</span>
                                        <span id='djs'>00:00</span>
					
				</p>
			</div>
			<div  class="lottery_kind">
				<a href="javascript:;" class="active">北京PK拾</a>
				<a href="/main.php?2" id='back' style='margin-left:1.5rem;' >back</a>
			</div>
		</aside>
	<section class="lotterListBox">
		<div class="lotteryBtn">
			<a class="active" href="javascript:;">冠亚军和<span class="smallround"></span></a>
                        <?php for($j=1;$j<11;$j++){?>
			<a href="javascript:;">第<?=$j?><span class="smallround"></span></a>
                        <?php }?>
			<a href="javascript:;">龙虎<span class="smallround"></span></a>
		</div>
		<form action="../member/lottery/order/order_pk66.php?style=wap" method="post" id="fomes"  class='box'>
			
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
					$sql="select * from odds_lottery where sub_type='冠亚军和-快速' and lottery_type='北京PK拾' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=3;$i<19;$i+=2){
				?>
				<p>
					<dis><span class="bg_green"><?=$i?></span>
					<span><?=$arr['h'.($i-2)]?></span>
					<input name="<?='ball_11_'.($i-2)?>"  type="text" /></dis> 
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i-1)]?></span>
					<input name="<?='ball_11_'.($i-1)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span class="bg_blue">19</span>
					<span><?=$arr['h17']?></span>
					<input name="<?='ball_11_17'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>冠军大</span>
					<span><?=$arr['h18']?></span>
					<input name="<?='ball_11_18'?>" type="text" /></dis>
					<dis><span>冠军小</span>
					<span><?=$arr['h19']?></span>
					<input name="<?='ball_11_19'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>冠军单</span>
					<span><?=$arr['h20']?></span>
					<input name="<?='ball_11_20'?>" type="text" /></dis>
					<dis><span>冠军双</span>
					<span><?=$arr['h21']?></span>
					<input name="<?='ball_11_21'?>" type="text" /></dis>
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

				<nav><span><b>冠军：</b></span></nav>
				<?php
					$sql="select * from odds_lottery where sub_type='定位' and lottery_type='北京PK拾' and ball_type='ball_1' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();

					$sql="select * from odds_lottery where sub_type='主盘势' and lottery_type='北京PK拾' and ball_type='ball_1' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr2=$query->fetch_array();

					for($i=1;$i<11;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_1_'.$i?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_1_'.($i+1)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr2['h1']?></span>
					<input name="<?='ball_1_11'?>" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr2['h2']?></span>
					<input name="<?='ball_1_12'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr2['h3']?></span>
					<input name="<?='ball_1_13'?>" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr2['h4']?></span>
					<input name="<?='ball_1_14'?>" type="text" /></dis>
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

				<nav><span><b>亚军：</b></span></nav>
				<?php
					$sql="select * from odds_lottery where sub_type='定位' and lottery_type='北京PK拾' and ball_type='ball_2' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();

					$sql="select * from odds_lottery where sub_type='主盘势' and lottery_type='北京PK拾' and ball_type='ball_2' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr2=$query->fetch_array();
					for($i=1;$i<11;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_2_'.$i?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_2_'.($i+1)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr2['h1']?></span>
					<input name="<?='ball_2_11'?>" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr2['h2']?></span>
					<input name="<?='ball_2_12'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr2['h3']?></span>
					<input name="<?='ball_2_13'?>" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr2['h4']?></span>
					<input name="<?='ball_2_14'?>" type="text" /></dis>
				</p>

				<?php
					for($j=3;$j<11;$j++){
						$sql="select * from odds_lottery where sub_type='定位' and lottery_type='北京PK拾' and ball_type='ball_".$j."' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr=$query->fetch_array();

						$sql="select * from odds_lottery where sub_type='主盘势' and lottery_type='北京PK拾' and ball_type='ball_".$j."' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr2=$query->fetch_array();
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
                                
				<nav><span><b>第<?=$j?>名</b></span></nav>
				<?php
					for($i=1;$i<11;$i+=2){
				?>
				<p>
					<dis><span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_'.$j.'_'.$i?>" type="text" /></dis>
					<dis><span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_'.$j.'_'.($i+1)?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
				<p>
					<dis><span>大</span>
					<span><?=$arr2['h1']?></span>
					<input name="<?='ball_'.$j.'_11'?>" type="text" /></dis>
					<dis><span>小</span>
					<span><?=$arr2['h2']?></span>
					<input name="<?='ball_'.$j.'_12'?>" type="text" /></dis>
				</p>
				<p>
					<dis><span>单</span>
					<span><?=$arr2['h3']?></span>
					<input name="<?='ball_'.$j.'_13'?>" type="text" /></dis>
					<dis><span>双</span>
					<span><?=$arr2['h4']?></span>
					<input name="<?='ball_'.$j.'_14'?>" type="text" /></dis>
				</p>
                        </div>    
                                <?php } ?>

			
			
			<div class="numBox">
				<nav>
					<span class='play'>玩法</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>玩法</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<?php
					for($j=1;$j<6;$j++){
						$sql="select * from odds_lottery where sub_type='主盘势' and lottery_type='北京PK拾' and ball_type='ball_".$j."' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr=$query->fetch_array();;
				?>
				<nav><span id='tiger'><b><?=$j?>V<?php echo $j==1?$b=10:--$b;?>龙虎 : </b></span></nav>
				<p>
					<dis><span>龙</span>
					<span><?=$arr['h1']?></span>
					<input name="<?='ball_'.$j.'_15'?>" type="text" /></dis>
					<dis><span>虎</span>
					<span><?=$arr['h2']?></span>
					<input name="<?='ball_'.$j.'_16'?>" type="text" /></dis>
				</p>
				<?php
					}
				?>
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
            <a href="/member/final1/LT_result.php?gtype=BJPK" >开奖历史</a>
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
						$.post("../member/lottery/class/odds_pk10.php", function(data){
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