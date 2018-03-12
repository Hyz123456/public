<?php 
include_once($C_Patch."/app/member/class/live_info.php");
if($_POST['oneDay'] && $_POST['twoDay'] ){
$oneDay=$_POST['oneDay'];$towDay=$_POST['twoDay'];  echo "aa";
$user_live_list=live_info::getUserBHDZRecord($_SESSION["userid"],$_POST['oneDay'],$_POST['twoDay']);

}
else{
	$oneDay=date('Y-m-d',strtotime('-6 day'));$towDay=date('Y-m-d');$userid=$_SESSION["userid"];
$user_live_list=live_info::getUserBHDZRecord($_SESSION["userid"],$oneDay,$towDay);

}
$arrGameTypes = Array(
	'ptg0001' => '水果机',
	'ptg0002' => '奔驰宝马',
	'ptg0003' => '捕牛达人',
	'ptg0004' => '千炮捕鱼',
	'ptg0005' => '航海王',
	'ptg0006' => '欢乐斗地主',
	'ptg0007' => '飞禽走兽',
	'ptg0008' => '豪车漂移',
	'ptg0009' => '百人牛牛',
	'ptg0010' => '水浒传',
	'ptg0011' => '金蟾捕鱼',
	'ptg0012'  => '大闹天宫',
    'ptg0013' => '二人牛牛',
	'ptg0014'  => '四人牛牛',
	'ptg0015' => '六人牛牛',
	'ptg0016' => '炸金花',
	'ptg0017' => '梭哈'
	
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
			</select> ~
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
				//echo "<pre>";
				//print_r($user_live_list);
				if($user_live_list){
					foreach($user_live_list as $k1=>$v1){
						echo '<tr>';
						
							echo '<td style="text-align:center;">'.$v1[0].'</td>
							      <td style="text-align:center;">'.$arrGameTypes[$v1[1]].'</td>
							       <td style="text-align:center;">'.$v1[2].'</td>
								   <td style="text-align:center;">'.$v1[3].'</td>
								   <td style="text-align:center;">'.$v1[6].'</td>';
						
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
					 var array = {
	'ptg0001' : '水果机',
	'ptg0002' : '奔驰宝马',
	'ptg0003' : '捕牛达人',
	'ptg0004' : '千炮捕鱼',
	'ptg0005' : '航海王',
	'ptg0006' : '欢乐斗地主',
	'ptg0007' : '飞禽走兽',
	'ptg0008' : '豪车漂移',
	'ptg0009' : '百人牛牛',
	'ptg0010' : '水浒传',
	'ptg0011' : '金蟾捕鱼',
	'ptg0012'  : '大闹天宫',
    'ptg0013' : '二人牛牛',
	'ptg0014'  : '四人牛牛',
	'ptg0015' : '六人牛牛',
	'ptg0016' : '炸金花',
	'ptg0017' : '梭哈'};
                   //alert(data.aa);
				   
                     $('#general-msg').html(data.inf);
					 $('#bet').text('合计');
					 $('#not').text('合计');
					  if($('#nodata')){
					//alert('暂时没有下注信息。');
					  $('#nodata').text('暂时没有下注信息。');
					 }
					 $len=$('#general-msg tr').get().length;
					 if($len){
					 for($i=0;$i<=$len;$i++ ){
					 $id="#game"+$i;
						$tex=$($id).text();
						 $($id).text(array[$tex]);
					}}
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
ajax($userid,$oneda,$twoda,"bhdz");

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