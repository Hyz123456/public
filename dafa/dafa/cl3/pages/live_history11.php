<?php 
include_once($C_Patch."/app/member/class/live_info.php");
if($_POST['oneDay'] && $_POST['twoDay'] ){
$oneDay=$_POST['oneDay'];$towDay=$_POST['twoDay'];  echo "aa";
$user_live_list=live_info::getUserBBRecord($_SESSION["userid"],$_POST['oneDay'],$_POST['twoDay']);

}
else{
	$oneDay=date('Y-m-d',strtotime('-6 day'));$towDay=date('Y-m-d');$userid=$_SESSION["userid"];
$user_live_list=live_info::getUserBBRecord($_SESSION["userid"],$oneDay,$towDay);

}
$arrGameTypes = Array(
	'3001' => '百家乐',
	'3002' => '二八杠',
	'3003' => '龙虎斗',
	'3005' => '三公',
	'3006' => '轮盘',
	'3007' => '轮盘',
	'3008' => '骰宝',
	'3010'  => '德州扑克',
	'3011'  => '色碟',
	'3012'  => '牛牛',
	'3014'  => '无限 21 点',
	'3015'  => '番摊',
	'5001' => '水果拉霸',
	'5002' => '扑克拉霸',
	'5003' => '筒子拉霸',
	'5004' => '足球拉霸',
	'5005' => '异形大战',
	'5006' => '星爆',
	'5007' => '水果热潮',
	'5008' => 'GoGo 猴子',
	'5009' => '金刚',
	'5010' => '外星战记',
	'5011' => '西游记',
	'5012' => '外星争霸',
	'5013' => '传统',
	'5014' => '丛林',
	'5015' => 'FIFA2010',
	'5016' => '史前丛林冒险',
	'5017' => '星际大战',
	'5018' => '齐天大圣',
	'5019' => '金刚',
	'5020' => '热带风情',
	'5025' => '法海斗白蛇',
	'5026' => '2012 伦敦奥运',
	'5027' => '功夫龙',
	'5028' => '中秋月光派对',
	'5029' => '圣诞派对',
	'5030' => '幸运财神',
    '5034' => '王牌 5PK',
	'5035' => '加勒比扑克',
	'5039' => '鱼虾蟹',
	'5040' => '局末平分狂放',
	'5041' => '7PK',
	'5042' => '失落的战场',
	'5047' => '尸乐园',
	'5048' => '特务危机',
	'5049' => '玉蒲团',
	'5050' => '战火佳人',
	'5057' => '明星 97',
	'5058' => '疯狂水果盘',
	'5059' => '马戏团',
	'5060' => '动物奇观五',
	'5061' => '超级 7',
	'5062' => '龙在囧途',
	'5070' => '黄金大转轮',
	'5073' => '钻石列车',
	'5076' => '数字大转轮',
	'5077' => '水果大转轮',
	'5078' => '象棋大转轮',
	'5079' => '3D 数字大转轮',
	'5080' => '乐透转轮',
	'5083' => '猜火车',
	'5084' => '怪物传奇',
	'5086' => '海洋派对',
	'5088' => '斗大',
	'5089' => '红狗',
	'5091' => '三国拉霸',
	'5092' => '封神榜',
	'5093' => '金瓶梅',
	'5094' => '金瓶梅 2',
	'5095' => '斗鸡',
	'5101' => '欧式轮盘',
	'5102' => '美式轮盘',
	'5103' => '彩金轮盘',
	'5104' => '法式轮盘',
	'5106' => '三国志',
	'5115' => '经典 21 点',
	'5116' => '西班牙 21 点',
	'5117' => '维加斯 21 点 ',
	'5118' => '奖金 21 点',
	'5131' => '皇家德州扑克',
	'5201' => '火焰山',
	'5202' => '月光宝盒',
	'5203' => '爱你一万年',
	'5204' => '2014 FIFA ',
	'5401' => '天山侠侣传',
	'5402' => '夜市人生',
	'5403' => '七剑传说',
	'5404' => '沙滩排球',
	'5405' => '暗器之王',
	'5406' => 'Starship27',
	'5407' => '不要叫我小红帽',
	'5601' => '神奇的土地上的冒险',
	'5701' => '宝石',
	'5703' => '我有钱',
	'5704' => '斗牛',
	'5705' => '宝锅',
	'5706' => '巧克力的热情',
	'5707'=>'金钱豹',
	'5801' => '海豚世界',
	'5802' => '阿基里斯',
	'5803' => '阿兹特克宝藏',
	'5804' => '大明星',
	'5805' => '凯萨帝国',
	'5806' => '奇幻花园',
	'5808'  =>'浪人武士',
	'5809' => '空战英豪',
	'5810' => '航海时代',
	'5811' => '狂欢夜',
	'5821' => '国际足球',
	'5823' => '发大财',
	'5824' => '恶龙传说',
	'5825' => '金莲',
	'5826' => '金矿工',
	'5827' => '霸王龙',
	'5828' => '霸王龙',
	'5831' => '高球之旅',
	'5832' => '高速卡车',
	'5833' => '沉默武士',
	'5835' => '喜福牛年',
	'5836' => '龙卷风',
	'5837' => '快乐金猴幸福',
	'5901' => '多宝',
	'5902' => '糖果党',
	'5903' => '龙帝之墓',
	'5888' => 'JACKPOT',
	

);
?>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
		<span class="ABameType " onclick="chgType('liveHistory');">AG记录</span>｜
		<span class="ABameType" onclick="chgType('liveHistory11');">BBIN记录</span>｜
		<span class="ABameType" onclick="chgType('liveHistory22');">MG记录</span>｜
		<span class="ABameType " onclick="chgType('abliveHistory');">ALLBET记录</span>｜
		<span class="ABameType" onclick="chgType('ptliveHistory');">PT记录</span>｜
		<span class="ABameType" onclick="chgType('naliveHistory');">NA记录</span>｜
		<span class="ABameType" onclick="chgType('skRecord');">彩票记录</span>｜
		<span class="ABameType  " onclick="chgType('bhdzliveHistory');">棋牌记录</span>｜
		<span class="ABameType" onclick="chgType('ballRecord');">体育记录</span>｜
		<span class="ABameType MCurrentType" onclick="chgType('fsrecord');">反水记录</span>
    </div>
    <div id="MMainData" style="margin-top: 8px;">
        <div class="MControlNav">
		
            日期：
            <!--<input id="oneDay" name="oneDay" type="text" value="<?=$oneDay?>" style="width: 70px;background-color: white;" /> ~
            <input id="twoDay" name="twoDay" type="text" value="<?=$towDay?>" style="width: 70px;background-color: white;" />-->
			<select id="oneDay" name="oneDay"  >
                        <option value="<?=$oneDay?>"><?=$oneDay?></option>
						<option value="<?=date('Y-m-d',strtotime('-5 day'))?>"><?=date('Y-m-d',strtotime('-5 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-4 day'))?>"><?=date('Y-m-d',strtotime('-4 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-3 day'))?>"><?=date('Y-m-d',strtotime('-3 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-2 day'))?>"><?=date('Y-m-d',strtotime('-2 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-1 day'))?>"><?=date('Y-m-d',strtotime('-1 day'))?></option>
                        <option value="<?=$towDay?>"><?=$towDay?></option>
			</select>  ~
			<select id="twoDay" name="twoDay" >
			            <option value="<?=$towDay?>"><?=$towDay?></option>
						<option value="<?=date('Y-m-d',strtotime('-1 day'))?>"><?=date('Y-m-d',strtotime('-1 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-2 day'))?>"><?=date('Y-m-d',strtotime('-2 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-3 day'))?>"><?=date('Y-m-d',strtotime('-3 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-4 day'))?>"><?=date('Y-m-d',strtotime('-4 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-5 day'))?>"><?=date('Y-m-d',strtotime('-5 day'))?></option>
                        <option value="<?=$oneDay?>"><?=$oneDay?></option>
                        
			</select>
			<input id="userid" name="userid" type="hidden" value="<?=$userid?>" style="width: 70px;background-color: white;" />
			<input type="button" id="bt" value="搜索">
			
        </div>

        <table class="MMain" border="1">
            <thead>
            <tr>
               <th width=20%>订单号</th>
                <th width=20%>游戏类型</th>
                <th width=20%>下注金额</th>
                <th width=20%>下注时间</th>
				<th width=20%>结果</th>
            </tr>
            </thead>
            <tbody id="general-msg">
             <?php 
				
				
				if($user_live_list){
					foreach($user_live_list as $k1=>$v1){
						echo '<tr>';
						
							echo '<td style="text-align:center;">'.$v1[0].'</td>
							      <td style="text-align:center;">'.$arrGameTypes[$v1[1]].'</td>
							       <td style="text-align:center;">'.$v1[2].'</td>
								   <td style="text-align:center;">'.$v1[3].'</td>
								   <td style="text-align:center;">'.$v1[4].'</td>';
						
						echo '</tr>';
						$bet+=$v1[2];
						$not+=$v1[4];
					}
					echo "<tr style='text-align:center;'>
						<td></td>
						<td>合计</td>
						<td>".$bet."</td>
						<td>合计</td>
						<td>".$not."</td>
					</tr>";
				}
				else{
					echo  '<td colspan="5" style="text-align:center;">暂时没有下注信息。</td>';
				}
			?>
            </tbody>
            <tfoot id="msgfoot" style="display:none;">
            <tr><td colspan='6' style='text-align:center;'></td></tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
 function ajax(a,b,c,d){

            $.ajax({
                 url:'/cl/pages/ajax.php',
                 type:"POST",
                 data:{'userid':a,
				      'oneDay':b,
					   'twoDay':c,
					 'type':d,
				 },   
                 //async:true,
                 dataType:"json", 
                 success: function(data){
var  array={
	'3001'  : '百家乐',
	'3002'  : '二八杠',
	'3003'  : '龙虎斗',
	'3005'  : '三公',
	'3006'  : '轮盘',
	'3007'  : '轮盘',
	'3008'  : '骰宝',
	'3010'  : '德州扑克',
	'3011'   : '色碟',
	'3012'   : '牛牛',
	'3014'   : '无限 21 点',
	'3015'   : '番摊',
	'5001'  : '水果拉霸',
	'5002'  : '扑克拉霸',
	'5003'  : '筒子拉霸',
	'5004'  : '足球拉霸',
	'5005'  :'异形大战',
	'5006'  : '星爆',
	'5007'  : '水果热潮',
	'5008'  : 'GoGo 猴子',
	'5009'  : '金刚',
	'5010'  : '外星战记',
	'5011'  : '西游记',
	'5012'  : '外星争霸',
	'5013'  : '传统',
	'5014'  : '丛林',
	'5015'  : 'FIFA2010',
	'5016'  : '史前丛林冒险',
	'5017'  : '星际大战',
	'5018'  :'齐天大圣',
	'5019'  : '金刚',
	'5020'  : '热带风情',
	'5025' : '法海斗白蛇',
	'5026'  : '2012 伦敦奥运',
	'5027'  : '功夫龙',
	'5028'  : '中秋月光派对',
	'5029'  : '圣诞派对',
	'5030'  : '幸运财神',
    '5034'  : '王牌 5PK',
	'5035'  : '加勒比扑克',
	'5039' : '鱼虾蟹',
	'5040'  : '局末平分狂放',
	'5041'  : '7PK',
	'5042'  : '失落的战场',
	'5047'  : '尸乐园',
	'5048'  : '特务危机',
	'5049'  : '玉蒲团',
	'5050'  : '战火佳人',
	'5057'  : '明星 97',
	'5058'  : '疯狂水果盘',
	'5059'  : '马戏团',
	'5060'  : '动物奇观五',
	'5061'  : '超级 7',
	'5062'  : '龙在囧途',
	'5070' : '黄金大转轮',
	'5073'  : '钻石列车',
	'5076'  : '数字大转轮',
	'5077'  : '水果大转轮',
	'5078'  : '象棋大转轮',
	'5079'  : '3D 数字大转轮',
	'5080'  : '乐透转轮',
	'5083'  : '猜火车',
	'5084'  : '怪物传奇',
	'5086'  : '海洋派对',
	'5088'  : '斗大',
	'5089'  : '红狗',
	'5091'  : '三国拉霸',
	'5092'  : '封神榜',
	'5093'  : '金瓶梅',
	'5094'  : '金瓶梅 2',
	'5095'  : '斗鸡',
	'5101'  : '欧式轮盘',
	'5102'  : '美式轮盘',
	'5103' : '彩金轮盘',
	'5104'  : '法式轮盘',
	'5106'  : '三国志',
	'5115'  : '经典 21 点',
	'5116'  : '西班牙 21 点',
	'5117'  : '维加斯 21 点 ',
	'5118'  : '奖金 21 点',
	'5131'  : '皇家德州扑克',
	'5201'  : '火焰山',
	'5202'  : '月光宝盒',
	'5203'  : '爱你一万年',
	'5204' : '2014 FIFA ',
	'5401'  : '天山侠侣传',
	'5402'  : '夜市人生',
	'5403'  : '七剑传说',
	'5404'  : '沙滩排球',
	'5405'  : '暗器之王',
	'5406'  : 'Starship27',
	'5407'  : '不要叫我小红帽',
	'5601'  : '神奇的土地上的冒险',
	'5701'  : '宝石',
	'5703'  : '我有钱',
	'5704'  : '斗牛',
	'5705'  : '宝锅',
	'5706'  : '巧克力的热情',
	'5707' :'金钱豹',
	'5801'  : '海豚世界',
	'5802'  : '阿基里斯',
	'5803'  : '阿兹特克宝藏',
	'5804'  : '大明星',
	'5805'  : '凯萨帝国',
	'5806'  : '奇幻花园',
	'5808'   :'浪人武士',
	'5809'  : '空战英豪',
	'5810'  : '航海时代',
	'5811'  : '狂欢夜',
	'5821'  : '国际足球',
	'5823' : '发大财',
	'5824'  : '恶龙传说',
	'5825'  : '金莲',
	'5826'  :'金矿工',
	'5827'  : '霸王龙',
	'5828'  : '霸王龙',
	'5831'  : '高球之旅',
	'5832'  : '高速卡车',
	'5833'  : '沉默武士',
	'5835'  : '喜福牛年',
	'5836'  : '龙卷风',
	'5837'  : '快乐金猴幸福',
	'5901'  : '多宝',
	'5902'  : '糖果党',
	'5903' : '龙帝之墓',
	'5888'  : 'JACKPOT',
	

};
                     //alert(data);
                     $('#general-msg').html(data.inf);
					 $('#bet').text('合计');
					 $('#not').text('合计');
					 if($('#nodata')){
					// alert('暂时没有下注信息。');
					  $('#nodata').text('暂时没有下注信息。');
					 }
					  $len=$('#general-msg tr').get().length;
                     if($len){
					for($i=0;$i<=$len;$i++ ){
					$id="#game"+$i;
						 $tex=$($id).text();
						 $($id).text(array[$tex]);
					}
					 }
					 oMsg.page(1);
                     }


                });
				
				
				}
$('#bt').click(function(){
	$oneda=$('#oneDay').val();
$twoda=$('#twoDay').val();
$userid=$('#userid').val();
if(!((/^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$/).test($oneda))){alert('请输入正确时间');return false;}
if(!((/^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$/).test($twoda))){alert('请输入正确时间');return false;}
if($oneda>$twoda){
  alert('请输入正确时间段');return false;
}
//alert($twoda);
ajax($userid,$oneda,$twoda,"BBIN");

})

    var oMsg = {
        "totalPage": {},    //總頁數
        "pageMsg": 50,      //每頁顯示訊息數
        "msglist": $('#general-msg'),
        'currentPage': 1,    //當前頁碼
        "page": function(p) {
            this.msglist.find("tr").css({"background-color": ""});
            $(".msgcontent").remove();
            oMsg.currentPage = p;
            this.totalPage = Math.ceil(this.msglist.find("tr").length / this.pageMsg);

            if(this.totalPage > 1) {
                $("#msgfoot").show();
            }
            if(this.totalPage == 1) {
                $("#msgfoot").hide();
            }
            $("#msgfoot tr td").html("");
            oMsg.msglist.find("tr").hide();

            //判斷最後一頁是否有筆數
            if(oMsg.currentPage > this.totalPage) {
                oMsg.currentPage = this.totalPage ;
            }
            for(var i = ((oMsg.currentPage-1) * oMsg.pageMsg ) ; i < oMsg.pageMsg + ((oMsg.currentPage - 1) * oMsg.pageMsg); i++) {
                oMsg.msglist.find("tr:eq(" + i + ")").show();
            }
            for(var t = 1 ; t <= this.totalPage ; t++) {
                if(oMsg.currentPage == t) {
                    $("#msgfoot tr td").append("<span id='currentpage'>" + t + "</span>");
                } else {
                    $("#msgfoot tr td").append("<a class='pagelink' href='#' onclick='oMsg.page(" + t + ")'>" + t + "</a>");
                }
            }
        }
    }

    oMsg.page(oMsg.currentPage);

    $(".MMain tbody tr").hover(function(){
        $("td", this).addClass("mouseenter");
        $("td a", this).addClass("mouseenter");
    }, function() {
        $("td", this).removeClass("mouseenter");
        $("td a", this).removeClass("mouseenter");
    });

    function rollbackDeal(id,zz_type,live_type){
        if(confirm("确定取消转账吗？")){
            $.ajax({
                type: "POST",
                url: "/cl/pages/money_change_rollback.php",
                data: {
                    live_id: id,
                    change_type: zz_type,
					live_type: live_type
                }
            }).done(function( msg ) {
                    alert(msg);
                    chgType('liveHistory');
                }).fail(function(error){
                    alert(error.responseText);
                });
        }
    }

    function chgType(type) {
        switch(type) {
            case 'ballRecord':
                f_com.MChgPager({method: 'ballRecord'});
                break;
            case 'lotteryRecord':
                f_com.MChgPager({method: 'lotteryRecord'});
                break;
            case 'liveHistory':
                f_com.MChgPager({method: 'liveHistory'});
                break;
            case 'gameHistory':
                f_com.MChgPager({method: 'gameHistory'});
                break;
            case 'skRecord':
                f_com.MChgPager({method: 'skRecord'});
                break;
            case 'a3dhHistory':
                f_com.MChgPager({method: 'a3dhHistory'});
                break;
            case 'TPBFightHistory':
                f_com.MChgPager({method: 'TPBFightHistory'});
                break;
            case 'TPBSPORTHistory':
                f_com.MChgPager({method: 'TPBSPORTHistory'});
                break;
            case 'cqRecord':
                f_com.MChgPager({method: 'cqRecord'});
                break;

				  case 'liveHistory11':
                f_com.MChgPager({method: 'liveHistory11'});
                break;
				  case 'liveHistory22':
                f_com.MChgPager({method: 'liveHistory22'});
                break;
			case 'ptliveHistory':
                f_com.MChgPager({method: 'ptliveHistory'});
                break;
				  case 'naliveHistory':
                f_com.MChgPager({method: 'naliveHistory'});
                break;
				case 'abliveHistory':
                f_com.MChgPager({method: 'abliveHistory'});
                break;
				case 'bhdzliveHistory':
                f_com.MChgPager({method: 'bhdzliveHistory'});
                break;
				case 'fsrecord':
                f_com.MChgPager({method: 'fsrecord'});
                break;
        }
    }

    function getData() {
        var searchtype = $("#searchType").val();
        var stime = $("select[name=sdate]").val();
        var etime = $("select[name=edate]").val();
        var page = $("select[name=page]").val();
        f_com.MChgPager({type: 'POST', method: 'liveHistory'}, {searchtype: searchtype, STime: stime, ETime: etime, page: page});
    }

    function refreshData(){
        var intervalId = setInterval(function(){
            var tdRefreshArray = $("#myrefreshtr");
            if(!tdRefreshArray || tdRefreshArray.length==0){
                clearInterval(intervalId);
            }

            $.getJSON("/cl/ajax/live_history_ajax.php", function(data) {
                if(data.comments){
                   $.each(data.comments, function(i, item) {
                        $("#"+item.id).html(item.content);
                    }); 
                }    
            });

            console.log(new Date());
        },3000);
    }
    refreshData();
</script>