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
		<style>
			/* reset */
			*{ margin:0; padding:0; }
			em { font-style:normal; }
			li { list-style:none; }
			a { text-decoration:none; }
			img { border:none; vertical-align:top; }
			textarea { resize:none; overflow:auto; }
			em{ font-style:normal; }
			body{ font-size:0.14rem; font-family: "Arial","Microsoft YaHei","ºÚÌå","ËÎÌå",sans-serif; }
			/* !£nd reset*/
			.caiBox{ width:2.85rem; margin:0 auto; background:#F5F5F5; border-radius:0.05rem; padding:0.15rem 0; }
			.caiBox a{ display:block; width: 100%; height: 0.35rem; overflow: hidden; line-height: 0.35rem; text-indent:0.1rem; font-size:0.12rem; border-bottom: 1px solid #DDDDDD; color:#000; box-sizing: border-box; background:url(/img/youxiico.png) no-repeat 2.55rem center ; }
                        
                        
body{background: url("/pic/bg.jpg?v=u91dedfdb");background-size: cover;}
.seList{position: relative;} 
.lottery_time{color: #FFF; border: none;background: rgba(255,255,255,.2);border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding: 0 2.5%; width: 95%;height: 0.3rem;line-height: 0.3rem;text-indent: 0; position: relative; text-align: center;}
.lottery_time a{position: absolute; left: 2.5%;    color: #fff;}         
.lottery_time #ion-navicon{ position: absolute;background: url(/pic/ion-navicon.png) center no-repeat; width: 40px;height: 0.3rem;top: 0;right: 2.5%;}
.lottery_num p{border-bottom: 1px solid rgba(255, 255, 255, 0.2); width: 95%;padding: 0 2.5%; height: inherit; line-height: 2rem;line-height: 0.35rem;color: #FFF;}
.lottery_num p span{width: 40.5%;display: block;float: left;background: url("/pic/userinfo.png") left no-repeat;background-size: 1.2em;padding-left: 7%;} 
.lottery_num p em{    background: url("/pic/money.png") left no-repeat;
    background-size: 1.2em;padding-left: 7%;} 
.lotterListBox .content{overflow-y: auto;}
.yu{ background: url("/pic/icon-notice.png") center no-repeat;height: 25px; width: 30px;background-size: 72%;padding: 4px 0px;}
#noticeContext{line-height: 25px;}
.lotterListBox .content_type{float: left; width: 45%;padding: 2.5%;}
.lotterListBox .content_type a{position: relative;display: block;width: initial;border: solid 1px rgba(255,255,255,.29);background: rgba(255,255,255,.19);box-shadow: 0 5px 4px -1px rgba(0,0,0,.1);border-radius: 6px;color: #000;text-align: center;padding: 18px 5px;}
.lotterListBox .content_type a div{margin-bottom: 10px;}
.lotterListBox .content_type a .content_img{float: left;width: 41%;}
.lotterListBox .content_type a .content_img img{width: 100%;}
.lotterListBox .content_type a  span{font-size: 0.112rem;font-weight: 700;}
.lotterListBox .content_type a .ng-binding{background: rgba(255,255,255,.08);padding: 4px 4px;border: solid 1px rgba(0,0,0,.1);border-radius: 5px;font-weight: 700;color: #FFF;}

.seLisT3 .popover-backdrop{
    display: none;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(138, 138, 138, 0.25);
}
.seLisT3 .active{
    display: block;
    
}
.popover-backdrop .popover-wrapper{
    right: 0;
    position: absolute;
    top: 0.33rem;
    background: #FFF;
    right: 2.5%;
    border-radius: 5px;
}
.popover-backdrop .popover-wrapper .list a{
        display: block;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.2),0 -1px 0 rgba(0,0,0,.23);
        padding: 0.1rem;
        color:#000;
}
.popover-backdrop .popover-wrapper .popover-arrow{
    position: absolute;
    display: block;
    top: -0.05rem;
    width: 0.15rem;
    height: 0.15rem;
    overflow: hidden;
    background: #FFF;
    right: 10px;
    border-radius: 3px;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}
		</style>
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
                            <a href="/wap.php">返回首页</a>
                                <span>彩票游戏</span>
                                <div  id="ion-navicon"></div>
			</div>
			<div class="lottery_num">
				<p>
                                    <span><?=$_SESSION["username"]?></span>
                                    <em><?=$row['money']?></em>
				</p>
			</div>
                    <div  class="lottery_kind">
                        <div class="content tip" style="overflow:auto;">
                                <em style="float: left; " class="yu"></em>
                                <div id="noticeContext" style="height: 25px; margin-left: 40px; overflow: hidden;  padding: 4px 0px; position: relative;">
                                    <marquee style="white-space: nowrap;" id="noticeText" class="ng-binding" scrollAmount="2" direction="left" onmouseout="scollStart()" onmouseover="scollStop()">业界首家联合Android安卓系统/ios苹果系统推出行动装置APP，领先技术，独家呈现，无需牢记网址，打开APP即可查看最新网址，更多实用功能等您来</marquee>
                                </div>
                        </div>
                    </div>
		</aside>
                <section class="lotterListBox">
                    <div class="content">
                        <div class="content_type">
                            <a href="/main.php">
                                <div class="content_img"><img src="/pic/xglt.png"/></div>
                                <div><span>香港乐透</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/caigamepages.php?">
                                <div class="content_img"><img src="/pic/img_cq_ssc.png"/></div>
                                <div><span>重庆时时彩</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/bjpk.php?">
                                <div class="content_img"><img src="/pic/img_bj_10.png"/></div>
                                <div><span>北京PK拾</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/cqkl.php?">
                                <div class="content_img"><img src="/pic/img_cq_ten.png"/></div>
                                <div><span>重庆快乐十分</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/gdkl.php?">
                                <div class="content_img"><img src="/pic/img_gd_ten.png"/></div>
                                <div><span>广东快乐十分</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/bjkl.php?">
                                <div class="content_img"><img src="/pic/img_bj_8.png"/></div>
                                <div><span>北京快乐8</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/gdx.php?">
                                <div class="content_img"><img src="/pic/img_gd_11.png"/></div>
                                <div><span>广东11选5</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/gxsf.php?">
                                <div class="content_img"><img src="/pic/img_gx_sfc.png"/></div>
                                <div><span>广西十分彩</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/tjsf.php?">
                                <div class="content_img"><img src="/pic/img_tj_ten.png"/></div>
                                <div><span>天津快乐十分</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/fcsd.php?">
                                <div class="content_img"><img src="/pic/img_fc_3d.png"/></div>
                                <div><span>福彩3D</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/shss.php?">
                                <div class="content_img"><img src="/pic/img_sh_ssl.png"/></div>
                                <div><span>上海时时乐</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                        <div class="content_type">
                            <a href="/caigames/tjss.php?">
                                <div class="content_img"><img src="/pic/img_tj_ssc.png"/></div>
                                <div><span>天津时时彩</span></div>
                                <span class="ng-binding">点击进入</span>
                            </a>
                        </div>
                    </div>
                </section>
                <div class="popover-backdrop">
                    <div class="popover-wrapper">
                        <div class="list"> 
                            <a href="/member/final1/LT_result.php?gtype=LT" >开奖历史</a>
                        </div>
                        <div class="popover-arrow"></div>
                    </div>
                </div>
            </section>

            
            
            
            
<!--		<section class="caiBox">
			<a href="/caigames/caigamepages.php?">重庆时时彩</a>
			<a href="/caigames/bjpk.php?">北京PK拾</a>

			<a href="/caigames/cqkl.php?">重庆快乐十分</a>
			<a href="/caigames/gdkl.php?">广东快乐十分</a>
			<a href="/caigames/bjkl.php?">北京快乐8</a>
			<a href="/caigames/gdx.php?">广东11选5</a>

			<a href="/caigames/gxsf.php?">广西十分彩</a>
			<a href="/caigames/tjsf.php?">天津快乐十分</a>
			<a href="/caigames/fcsd.php?">福彩3D</a>
			<a href="/caigames/pls.php?">排列3</a>
			<a href="/caigames/shss.php?">上海时时乐</a>
			<a href="/caigames/tjss.php?">天津时时彩</a>
            
            
			 <a href="javascript:;">福彩3D<span style='color:red'>(未开放)</span></a>
			<a href="javascript:;">排列三<span style='color:red'>(未开放)</span></a>
			<a href="javascript:;">北京快乐B<span style='color:red'>(未开放)</span></a> 
		</section>-->
	</body>
<script>
(function(){
    $('#ion-navicon').click(function(){
        $('.popover-backdrop').addClass("active");
    });
    $('.popover-backdrop').click(function(){
        $('.popover-backdrop').removeClass("active");
    });


    $('#typename').click(function(){
       if( $('.seList').attr('id')=='seList2'){
           $('.seList').removeAttr('id');
           $('.seList_right').css('display','none');
       }else{
           $('.seList').attr('id','seList2');
           $('.seList_right').css('display','block');
       }
    });
    var kjqy=$(window).height();
    var aside=$('aside').height();
    $(".lotterListBox").css("height", kjqy-aside-2);
    $(".lotterListBox .content").css("height", kjqy-aside-$('.sub').height()-2);
    
    
})();
</script>
</html>