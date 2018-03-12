<?php require_once 'header.php' ?>
        <!-- 内容区域 -->
         <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
					<span style="margin-top:-20px;margin-bottom:20px;text-align:center;font-size:12px;">
                            提交订单数：
                            <span class="blue"> <?php echo $count['total_orders']?>
                            </span>
                            &nbsp;&nbsp;订单总金额：
                            <span class="blue">
                                &yen;
                                <?php echo number_format($count['total_money'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;已付订单数：
                            <span class="green"><?php echo $count['success_orders']?>
                            </span>
                            &nbsp;&nbsp;已付总金额：
                            <span class="green">&yen;<?php echo number_format($count['success_money'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;预计收入:<span class="green">&yen;<?php echo number_format($count['income_user'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;未付订单数：
                            <span class="red"> <?php echo $count['total_orders']-$count['success_orders'] ?>
                            </span>
                          未付总金额：
                            <span class="red">&yen;<?php echo number_format($count['total_money']-$count['success_money'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;
                    </span>


				</span>
			</div>


			
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">


		<form method="get" class="form-inline m-b-xs" action="" method="get">
	
			<div class="biankuang">

			
			<div class="layui-form">

			  <div class="layui-inline">
				<select name="is_state" lay-verify="required">
									<option value="-1" <?php echo $search['is_state']=='-1' ? ' selected' : ''?>>全部
											</option>
											<option value="0" <?php echo $search['is_state']=='0' ? ' selected' : ''?>>未付款
											</option>
											<option value="1" <?php echo $search['is_state']=='1' ? ' selected' : ''?>>已付款
									</option>

				</select>
			  </div>
			  <div class="layui-inline">
				<select name="accid" lay-verify="required">

							<option value="0">全部通道</option>

						<?php foreach($acc as $key=>$val):?>
							<option value="<?php echo $val['id']?>" <?php echo $val['id']==$search['accid'] ? ' selected' : ''?>><?php echo $val['name']?></option>
						<?php endforeach;?>

				</select>
                                   
			  </div>

			  <div class="layui-inline">
				<label  style="width:30px;padding:5px">时间</label>
				<div class="layui-input-inline" style="width: 100px;">
				  <input type="text" name="fdate" placeholder="" value="<?php echo $search['fdate']?>" id="date1" autocomplete="off" class="layui-input">
				</div>
			  </div>
			  <div class="layui-inline">-</div>
			  <div class="layui-inline">
				<div class="layui-input-inline" style="width: 100px;">
				  <input type="text" name="tdate" placeholder="" value="<?php echo $search['tdate']?>" id="date2" autocomplete="off" class="layui-input">
				</div>
			 </div>

			<div class="layui-inline">
            <input type="text" name="sdorderno"  lay-verify="required" placeholder="商户订单号"
                    value="<?php echo $search['sdorderno']?>" autocomplete="off" class="layui-input">
			</div>

			<div class="layui-inline">
            <input type="text" name="sdpayno"  lay-verify="required" placeholder="平台订单号"
                    value="<?php echo $search['sdpayno']?>" autocomplete="off" class="layui-input">
			</div>

			<div class="layui-inline">
			<button style="height:37px;width:150px;margin-top: -1px" class="layui-btn">
			  <i class="layui-icon">&#xe615;</i> 搜索
			</button>
			</div>


			</div>

			</form>

			 <table class="layui-table">
				<colgroup>
				  <col width="14%">
				  <col width="20%">
				  <col width="20%">
				  <col width="8%">
				  <col width="8%">
					<col width="8%">
					<col width="7%">
					<col width="5%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
				  <tr>
					<th>订单时间</th>
					<th>商户订单</th>
					<th>平台订单</th>
					<th>订单金额</th>
					<th>实付金额</th>
					<th>收益金额</th>
					<th>通道</th>
					<th>状态</th>
					<th>通知</th>
					<th>补发</th>
				  </tr> 
				</thead>
				<tbody>






							<?php if($lists):?>
                                <?php foreach($lists as $key=>$val):$orderinfo=$this->model()->select('remark')->from('orderinfo')->where(array('fields'=>'id=?','values'=>array($val['orderinfoid'])))->fetchRow();$remark=$orderinfo ? $orderinfo['remark'] : '-';$acc=$this->model()->select('name')->from('acc')->where(array('fields'=>'id=?','values'=>array($val['channelid'])))->fetchRow();$cname=$acc  ? $acc['name'] : '-';switch($val['is_state']){case 0: $state='
                                    <span  class="layui-btn layui-btn-mini huise">未付 </span>'; break;case 1: $state='<span class="layui-btn layui-btn-mini"> 已付 </span>'; break;case 2: $state=' <span class="label label-danger">冻结</span>'; break;default:$state='-';}$notifyMsg='-';$notify=$this->model()->select('is_status')->from('ordernotify')->where(array('fields'=>'orid=?','values'=>array($val['id'])))->fetchRow();if($notify){switch($notify['is_status']){case '0': $notifyMsg='<span  class="layui-btn layui-btn-mini huise">等待 </span>'; break;case '1': $notifyMsg=' <span  class="layui-btn layui-btn-mini">成功 </span>'; break;case '2': $notifyMsg='
                                    <span class="am-badge am-badge-danger am-radius">失败</span>'; break;}}?>
                                    <tr class="gradeX">
                                        <td class="text-center blue">
                                            <?php echo date( 'Y-m-d H:i:s',$val['addtime'])?>
                                        </td>
                                             <td class="text-center ">
                                            <?php echo $val['sdorderno']?>
                                                <br>
                                                <span class="gray">
                                                    <?php echo $remark ?>
                                                </span>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $val['orderid']?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $val['total_fee']?>
                                        </td>
                                        <td class="text-center green">
                                            <?php echo $val['realmoney']?>
                                        </td>
                                        <td class="text-center green">
                                            <?php echo $val['realmoney']*$val['uprice']?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $cname ?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $state ?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $notifyMsg ?>
                                        </td>

                                             <td class="text-center">

											  <a href="javascript:;" onclick="refresh('<?php echo $val['orderid']?>')">
												<div class="layui-btn layui-btn-mini layui-btn-primary">手动通知</div>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                        <?php else:?>
                                              <tr>
                                                    <td class="text-center" colspan="10">
                                                        <h4>
                                                            暂无记录
                                                        </h4>
                                                    </td>
                                                </tr>
									<?php endif;?>

				
				</tbody>
			  </table>



			  <div style="text-align:center" class="layui-row"> 
				<div class="layui-col-xs12 layui-col-md12">


									<?php if($lists):?>

                                    <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">


											<?php echo $pagelist ?>
                                            
                                        </ul>
                                    </div>

									<?php endif;?>



					<!--<div id="demo7"></div>-->

				</div>
			  </div>	

			</div>

		  
		</div>
		

  </div>

  
  <div class="layui-footer footer footer-demo">
  
</div>


<div class="site-tree-mobile layui-hide">
  <i class="layui-icon">&#xe602;</i>
</div>
<div class="site-mobile-shade"></div>
<script src="../layui/layui.js"></script>
<script>
window.global = {
  pageType: 'demo'
  ,preview: function(){
    var preview = document.getElementById('LAY_preview');
    return preview ? preview.innerHTML : '';
  }()
};
layui.config({
  base: '../layui/lay/modules/'
  ,version: '1508154136729'
}).use('global');

layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  //执行一个laydate实例
  laydate.render({
    elem: '#date1'
	,min: '2017-1-1'
  });
  laydate.render({
    elem: '#date2'
	,min: '2017-1-1'
  });



layui.use(['laypage', 'layer'], function(){
  var laypage = layui.laypage
  ,layer = layui.layer;
  
  //完整功能
  laypage.render({
    elem: 'demo7'
    ,count: 100
    ,layout: ['count', 'prev', 'page', 'next', 'limit', 'skip']
    ,jump: function(obj){
      console.log(obj)
    }
  });

});


});
</script>

</div>
</body>
</html>