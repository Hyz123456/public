<?php 
	if(!isset($_SESSION)){ session_start();}
	if($_POST['oneDay'] && $_POST['twoDay'] ){
	    $oneDay=$_POST['oneDay'];
		$twoDay=$_POST['twoDay'];
	}
	else{
		$oneDay=date('Y-m-d',strtotime('-6 day'));
		$twoDay=date('Y-m-d');
	}
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
                <a href="javascript:;" onclick="chgType('liveHistory');" data="ag" class="Hyzx-btn flt ">AG</a>
                <a href="javascript:;" onclick="chgType('liveHistory11');" data="sp" class="Hyzx-btn flt ">BBIN</a>
                <a href="javascript:;" onclick="chgType('liveHistory22');" data="fc" class="Hyzx-btn flt ">MG</a>
                <a href="javascript:;" onclick="chgType('abliveHistory');" data="ag" class="Hyzx-btn flt ">ALLBET</a>
                <a href="javascript:;" onclick="chgType('ptliveHistory');" data="sp" class="Hyzx-btn flt ">PT</a>
                <a href="javascript:;" onclick="chgType('naliveHistory');" data="fc" class="Hyzx-btn flt ">NA</a>
                <a href="javascript:;" onclick="chgType('bhdzliveHistory');" data="ag" class="Hyzx-btn flt ">棋牌</a>
                <a href="javascript:;" onclick="chgType('fsrecord');" data="sp" class="Hyzx-btn flt active">反水</a>
            </div>
            <div class="mt30 Hyzx-select">
                    <div class="Hyzx-module">
                        <span>投注时间:</span>
                        <div class="Hyzx-data">
			<input type="text" class="Wdate laydatesd" readonly="readonly" id="oneDay" name="oneDay" value="<?=$oneDay?>"> ~ 
                            <input type="text" class="Wdate laydatesd" readonly="readonly" id="twoDay" name="twoDay" value="<?=$twoDay?>">
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
			<input id="userid" name="userid" type="hidden" value="<?=$_SESSION["userid"]?>" style="width: 70px;background-color: white;" />
                        </div>
                        <input type="button" id="bt" value="搜索" class="flt Hyzx-btn" style="    float: right;">
			  <br/>
			 <input type="button" class="flt Hyzx-btn" value="反水记录" onclick="chgType('fsrecord');" onmouseover="mover(this);" onmouseout="mout(this);" />
                        <input type="button" class="flt Hyzx-btn" value="存款记录" onclick="chgType('chakan_cunkuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
                        <input type="button" class="flt Hyzx-btn" value="取款记录" onclick="chgType('chakan_qukuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
			<input type="button" class="flt Hyzx-btn" value="额度转换记录" onclick="chgType('ed');" onmouseover="mover(this);" onmouseout="mout(this);" style="background: #875e5a;"/>
			<input type="button" class="flt Hyzx-btn" value="打码量" onclick="chgType('dml');" onmouseover="mover(this);" onmouseout="mout(this);" />
			
                    </div>
            </div>
            <table class="Hyzx-table mt10 MMain">
             <thead>
            <tr>
               <th>订单号</th>
                <th>详情</th>
                <th>额度转换金额</th>
                <th>额度转换时间</th>
            </tr>
            </thead>
            <tbody id="general-msg">
             <?php 
				$sql="select * from money_log where  type='真人转帐' and user_id='".$_SESSION["userid"]."' and update_time>='".$oneDay." 00:00:00' and update_time<='".$twoDay." 23:59:59' order by id desc";
				$query=$mysqli->query($sql);
				$ro=array();
				while($row=$query->fetch_array()){
					$ro[]=$row;
				}
				if($ro){
					foreach($ro as $k1=>$v1){
						if($v1['order_value']<0)
							$v1['order_value']=0-$v1['order_value'];
						echo '<tr>';
						
							echo '<td style="text-align:center;">'.$v1['order_num'].'</td>
							      <td style="text-align:center;">'.$v1['about'].'</td>
							       <td style="text-align:center;">'.$v1['order_value'].'</td>
								   <td style="text-align:center;">'.$v1['update_time'].'</td>';
						
						echo '</tr>';
					}
				}
				else{
					echo  '<td colspan="4" style="text-align:center;">暂时没有额度转换记录。</td>';
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
 function ajax(a,b,c){
            $.ajax({
                 url:'/cl/pages/ajax_ed.php',
                 type:"POST",
                 data:{
					 'userid':a,
				     'oneDay':b,
					 'twoDay':c
				 },   
                 //async:true,
                 dataType:"json", 
                 success: function(data){
                     $('#general-msg').html(data.inf);
					  if($('#nodata')){
					//alert('暂时没有下注信息。');
					  $('#nodata').text('暂时没有额度转换记录。');
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
ajax($userid,$oneda,$twoda,$lb);

})

    var oMsg = {
        "totalPage": {},    //總頁數
        "pageMsg": 9,      //每頁顯示訊息數
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
    


</script>