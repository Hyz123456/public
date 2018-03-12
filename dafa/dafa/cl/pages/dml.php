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
                <form >
                    <div class="Hyzx-module">
                        <span>时间:</span>
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
                        
			<input type="button" id="bt" value="搜索"  class="flt Hyzx-btn" style="    float: right;">
                        <br/>
                         <input type="button" class="flt Hyzx-btn" value="反水记录" onclick="chgType('fsrecord');" onmouseover="mover(this);" onmouseout="mout(this);" />
                        <input type="button" class="flt Hyzx-btn" value="存款记录" onclick="chgType('chakan_cunkuan');" onmouseover="mover(this);" onmouseout="mout(this);"/>
                        <input type="button" class="flt Hyzx-btn" value="取款记录" onclick="chgType('chakan_qukuan');" onmouseover="mover(this);" onmouseout="mout(this);"/>
			<input type="button" class="flt Hyzx-btn" value="额度转换记录" onclick="chgType('ed');" onmouseover="mover(this);" onmouseout="mout(this);" />
			<input type="button" class="flt Hyzx-btn" value="打码量" onclick="chgType('dml');" onmouseover="mover(this);" onmouseout="mout(this);"   style="background: #875e5a;"/>
                    </div>
     

                </form>
            </div>
            <table class="Hyzx-table mt10 MMain">
               <thead>
            <tr>
               <th>会员名</th>
                <th>下注总额</th>
                <th>真人下注额</th>
                <th>体育下注额</th>
				<th>彩票下注额</th>
				<th>六合彩下注额</th>
				<th>BH棋牌下注额</th>
            </tr>
            </thead>
            <tbody id="general-msg">
             <?php 
				$sql="select sum(a.betAmount) as money from agbetdetail a,user_list u where u.user_id='".$_SESSION["userid"]."' and a.playerName in(u.ag_username,u.bb_username,u.mg_username,u.ab_username,u.pt_username,u.na_username) and a.betTime>='".$oneDay." 00:00:00' and a.betTime<='".$twoDay." 23:59:59' ";
				$query=$mysqli->query($sql);
				$row_a=$query->fetch_array();
				$sql="select sum(a.betAmount) as money from agbetdetail a,user_list u where u.user_id='".$_SESSION["userid"]."' and a.playerName=u.dx_username and a.betTime>='".$oneDay." 00:00:00' and a.betTime<='".$twoDay." 23:59:59' ";
				$query=$mysqli->query($sql);
				$row_d=$query->fetch_array();
				$sql="select sum(bet_money) as money from k_bet where user_id='".$_SESSION["userid"]."' and bet_time>='".$oneDay." 00:00:00' and bet_time<='".$twoDay." 23:59:59' ";
				$query=$mysqli->query($sql);
				$row_k=$query->fetch_array();
				$sql="select sum(bet_money) as money from k_bet_cg_group where user_id='".$_SESSION["userid"]."' and bet_time>='".$oneDay." 00:00:00' and bet_time<='".$twoDay." 23:59:59' ";
				$query=$mysqli->query($sql);
				$row_c=$query->fetch_array();
				$sql="select sum(bet_money) as money from order_lottery where user_id='".$_SESSION["userid"]."' and bet_time>='".$oneDay." 00:00:00' and bet_time<='".$twoDay." 23:59:59' ";
				$query=$mysqli->query($sql);
				$row_l=$query->fetch_array();
				$sql="select sum(bet_money_total) as money from six_lottery_order where user_id='".$_SESSION["userid"]."' and bet_time>='".$oneDay." 00:00:00' and bet_time<='".$twoDay." 23:59:59' ";
				$query=$mysqli->query($sql);
				$row_s=$query->fetch_array();
			?>
				<tr>
					<td style="text-align:center;"><?=$_SESSION["username"]?></td>
					<td style="text-align:center;"><?=$row_a['money']+$row_k['money']+$row_c['money']+$row_l['money']+$row_s['money']+0-$row_d['money']+$row_p['money']?></td>
					<td style="text-align:center;"><?=$row_a['money']+0?></td>
					<td style="text-align:center;"><?=$row_k['money']+$row_c['money']+0;?></td>
					<td style="text-align:center;"><?=$row_l['money']+0?></td>
					<td style="text-align:center;"><?=$row_s['money']+0?></td>
					<td style="text-align:center;"><?=$row_d['money']+0?></td>
			   </tr>
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
                 url:'/cl/pages/ajax_dml.php',
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
ajax($userid,$oneda,$twoda);

})
    $(".MMain tbody tr").hover(function(){
        $("td", this).addClass("mouseenter");
        $("td a", this).addClass("mouseenter");
    }, function() {
        $("td", this).removeClass("mouseenter");
        $("td a", this).removeClass("mouseenter");
    });
</script>