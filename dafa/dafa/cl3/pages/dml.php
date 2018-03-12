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
			<select id="oneDay" name="oneDay"  >
                        <option value="<?=$oneDay?>"><?=$oneDay?></option>
						<option value="<?=date('Y-m-d',strtotime('-5 day'))?>"><?=date('Y-m-d',strtotime('-5 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-4 day'))?>"><?=date('Y-m-d',strtotime('-4 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-3 day'))?>"><?=date('Y-m-d',strtotime('-3 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-2 day'))?>"><?=date('Y-m-d',strtotime('-2 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-1 day'))?>"><?=date('Y-m-d',strtotime('-1 day'))?></option>
                        <option value="<?=$twoDay?>"><?=$towDay?></option>
			</select> ~
			<select id="twoDay" name="twoDay" >
			            <option value="<?=$twoDay?>"><?=$twoDay?></option>
						<option value="<?=date('Y-m-d',strtotime('-1 day'))?>"><?=date('Y-m-d',strtotime('-1 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-2 day'))?>"><?=date('Y-m-d',strtotime('-2 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-3 day'))?>"><?=date('Y-m-d',strtotime('-3 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-4 day'))?>"><?=date('Y-m-d',strtotime('-4 day'))?></option>
						<option value="<?=date('Y-m-d',strtotime('-5 day'))?>"><?=date('Y-m-d',strtotime('-5 day'))?></option>
                        <option value="<?=$oneDay?>"><?=$oneDay?></option>
                        
			</select>
			<input id="userid" name="userid" type="hidden" value="<?=$_SESSION["userid"]?>" style="width: 70px;background-color: white;" />
			<input type="button" id="bt" value="搜索">
			<br><br>
			 <input type="button" class="MBtnStyle" value="反水记录" onclick="chgType('fsrecord');" onmouseover="mover(this);" onmouseout="mout(this);" />
            <input type="button" class="MBtnStyle" value="存款记录" onclick="chgType('chakan_cunkuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
            <input type="button" class="MBtnStyle" value="取款记录" onclick="chgType('chakan_qukuan');" onmouseover="mover(this);" onmouseout="mout(this);" />
			<input type="button" class="MBtnStyle" value="额度转换记录" onclick="chgType('ed');" onmouseover="mover(this);" onmouseout="mout(this);" />
			<input type="button" class="MBtnStyle" value="打码量" onclick="chgType('dml');" onmouseover="mover(this);" onmouseout="mout(this);" />
        </div>

        <table class="MMain" border="1">
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
        </table>
    </div>
</div>


   
	
	


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
            case 'chakan_qukuan':
                f_com.MChgPager({method: 'chakan_qukuan'});
                break;
			case 'dml':
                f_com.MChgPager({method: 'dml'});
                break;
				case 'ed':
                f_com.MChgPager({method: 'ed'});
                break;
        }
    }

</script>