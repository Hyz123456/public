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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类型：
			<select id="lb" name="lb" >
				<option value="所有类型">所有类型</option>
				<option value="真人">真人</option>
				<option value="彩票">彩票</option>
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
               <th>订单号</th>
                <th>详情</th>
				<th>类型</th>
                <th>反水金额</th>
                <th>反水时间</th>
            </tr>
            </thead>
            <tbody id="general-msg">
             <?php 
				$sql="select * from money_log where user_id='".$_SESSION["userid"]."' and update_time>='".$oneDay." 00:00:00' and update_time<='".$twoDay." 23:59:59' and (type='彩票自动结算-彩票反水' or about like '%自动反水%') order by id desc";
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
								  <td style="text-align:center;">'.$v1['type'].'</td>
							       <td style="text-align:center;">'.$v1['order_value'].'</td>
								   <td style="text-align:center;">'.$v1['update_time'].'</td>';
						
						echo '</tr>';
					}
				}
				else{
					echo  '<td colspan="5" style="text-align:center;">暂时没有反水记录。</td>';
				}
			?>
            </tbody>
            <tfoot id="msgfoot" style="display:none;">
            <tr><td colspan='5' style='text-align:center;'></td></tr>
            </tfoot>
        </table>
    </div>
</div>


   
	
	


<script type="text/javascript">
 function ajax(a,b,c,d){
            $.ajax({
                 url:'/cl/pages/ajax_fs.php',
                 type:"POST",
                 data:{
					 'userid':a,
				     'oneDay':b,
					 'twoDay':c,
					 'lb':d,
					 'type1':'彩票自动结算-彩票反水',
					 'type2':'自动反水'
				 },   
                 //async:true,
                 dataType:"json", 
                 success: function(data){
                     $('#general-msg').html(data.inf);
					  if($('#nodata')){
					//alert('暂时没有下注信息。');
					  $('#nodata').text('暂时没有反水记录。');
					 }
					 oMsg.page(1);
                     }
                });
				
				
				}
$('#bt').click(function(){
	$oneda=$('#oneDay').val();
$twoda=$('#twoDay').val();
$userid=$('#userid').val();
$lb=$('#lb').val();
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
        }
    }

</script>