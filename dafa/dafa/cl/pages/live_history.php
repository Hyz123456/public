<?php 
include_once($C_Patch."/app/member/class/live_info.php");
if($_POST['oneDay'] and $_POST['twoDay'] ){
$oneDay=$_POST['oneDay'];$towDay=$_POST['twoDay'];  echo "aa";
$user_live_list=live_info::getUserAGRecord($_SESSION["userid"],$_POST['oneDay'],$_POST['twoDay']);

}
else{
	$oneDay=date('Y-m-d',strtotime('-6 day'));
        $towDay=date('Y-m-d');$userid=$_SESSION["userid"];
$user_live_list=live_info::getUserAGRecord($_SESSION["userid"],$oneDay,$towDay);

}

$arrGameTypes = Array(
	'bac' => '百家乐',
	'cbac' => '包桌百家乐',
	'link' => '连环百家乐',
	'dt' => '龙虎',
	'shb' => '骰宝',
	'rou' => '轮盘',
	'ft' => '番摊',
	'sl2'  => '水果',
	'lbac' =>'b2zp2cd7',
	'sl1' => '巴西世界杯',
	'sl3' => '3D水族馆',
	'pk_j' => '视频扑克(杰克高手)',
	'sl4' => '极速赛车',
	'pkbj' => '新视频扑克',
	'fru' => '水果垃霸',
	'hunter' => '捕鱼王',
	'slm1' => '美女沙排',
	'slm2' => '运财羊',
	'slm3' => '武圣传',
	'sc01' => '幸运老虎机',
	'tglw' => '极速幸运轮',
	'slm4' => '武则天',
	'tgcw' => '赌场战争',
	'sb01' => '太空漫游',
	'sb02' => '复古花园',
	'sb03' => '关东煮',
	'sb04' => '牧场咖啡',

);
?>

<div id="MACenterContent">
    <div class="Hyzx-body">                
        <div class="Hyzx-right">
        <h3 class="nav2">
            <span class="flt">投注记录</span>
            <a href="javascript: f_com.MChgPager({method:\'gameSwitch\'}, {type: \'betrecord\'});" data="transaction_bet_index" class="Hyzx-btn flt active">投注记录</a>
            <a href="javascript:;" data="transaction_contacts_index" class="Hyzx-btn flt">往来记录</a>
        </h3>
        <div class="Hyzx-content">
            <div class="Hyzx-conNav Hyzx-fixedWidth" id="transTitle">
                <a href="javascript:;" onclick="chgType('sportGameDetails');" data="sp" class="Hyzx-btn flt">体育</a>
                <a href="javascript:;" onclick="chgType('SKLotteryHistoryDetails');" data="fc" class="Hyzx-btn flt ">彩票</a>
                <a href="javascript:;" onclick="chgType('liveHistory');" data="ag" class="Hyzx-btn flt active">AG</a>
                <a href="javascript:;" onclick="chgType('liveHistory11');" data="sp" class="Hyzx-btn flt ">BBIN</a>
                <a href="javascript:;" onclick="chgType('liveHistory22');" data="fc" class="Hyzx-btn flt ">MG</a>
                <a href="javascript:;" onclick="chgType('abliveHistory');" data="ag" class="Hyzx-btn flt ">ALLBET</a>
                <a href="javascript:;" onclick="chgType('ptliveHistory');" data="sp" class="Hyzx-btn flt ">PT</a>
                <a href="javascript:;" onclick="chgType('naliveHistory');" data="fc" class="Hyzx-btn flt ">NA</a>
                <a href="javascript:;" onclick="chgType('bhdzliveHistory');" data="ag" class="Hyzx-btn flt ">棋牌</a>
                <a href="javascript:;" onclick="chgType('fsrecord');" data="sp" class="Hyzx-btn flt ">反水</a>
            </div>
            <div class="mt30 Hyzx-select">
                <form >
                    <div class="Hyzx-module">
                        <span>投注时间:</span>
                        <div class="Hyzx-data">
			 <input type="text" class="Wdate laydatesd" readonly="readonly" id="oneDay" name="oneDay" value="<?=$oneDay?>"> ~ 
                            <input type="text" class="Wdate laydatesd" readonly="readonly" id="twoDay" name="twoDay" value="<?=$towDay?>">
                            <script>
                                laydate({
                                    path:'laydate',
                                    elem: '#oneDay',
                                    format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
                                  });
                                  laydate({
                                    path:'laydate',
                                    elem: '#twoDay',
                                    format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
                                  });
                            </script>
                        
                        <input id="userid" name="userid" type="hidden" value="<?=$userid?>" style="width: 70px;background-color: white;" />
			
                        
                        </div>
                        <input type="button" id="bt" value="搜索"  class="flt Hyzx-btn" style="    float: right;">
                    </div>
     

                </form>
            </div>
            <table class="Hyzx-table mt10 MMain">
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
                    <tr><td colspan='8' style='text-align:center;'></td></tr>
                </tfoot>
            </table>
            <div class="Hyzx-pageBox mt20"></div>
        </div>
        </div>

    </div>    
</div>


<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 



	


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
                 dataType:"json", 
                 success: function(data){
var array={'bac' : '百家乐',
	'cbac' : '包桌百家乐',
	'link' : '连环百家乐',
	'dt' : '龙虎',
	'shb' : '骰宝',
	'rou' : '轮盘',
	'ft' : '番摊',
	'sl2'  : '水果',
	'lbac' :'b2zp2cd7',
	'sl1' : '巴西世界杯',
	'sl3' : '3D水族馆',
	'pk_j' : '视频扑克(杰克高手)',
	'sl4' : '极速赛车',
	'pkbj' : '新视频扑克',
	'fru' : '水果垃霸',
	'hunter' : '捕鱼王',
	'slm1' : '美女沙排',
	'slm2' : '运财羊',
	'slm3' : '武圣传',
	'sc01' : '幸运老虎机',
	'tglw' : '极速幸运轮',
	'slm4' : '武则天',
	'tgcw' : '赌场战争',
	'sb01': '太空漫游',
	'sb02' : '复古花园',
	'sb03' : '关东煮',
	'sb04' : '牧场咖啡',};
                     $('#general-msg').html(data.inf);
					 $('#bet').text('合计');
					 $('#not').text('合计');
                  $len=$('#general-msg tr').get().length;
                     if($len){
					   for($i=0;$i<=$len;$i++ ){
					     $id="#game"+$i;
						 $tex=$($id).text();
						 $($id).text(array[$tex]);
	


						
					   
					   }
					 
					 }
					if($('#nodata')){
					  $('#nodata').text('暂时没有下注信息。');
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
ajax($userid,$oneda,$twoda,"AG");

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
            case 'chakan_cunkuan':
                f_com.MChgPager({method: 'chakan_cunkuan'});
                break;
            case 'chakan_huikuan':
                f_com.MChgPager({method: 'chakan_huikuan'});
                break;
            case 'dml':
                f_com.MChgPager({method: 'dml'});
                break;
            case 'ed':
                f_com.MChgPager({method: 'ed'});
                break;
            case 'SKLotteryHistoryDetails':
                f_com.MChgPager({method: 'SKLotteryHistoryDetails'});
                break;
            case 'sportGameDetails':
                f_com.MChgPager({method: 'sportGameDetails'});
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