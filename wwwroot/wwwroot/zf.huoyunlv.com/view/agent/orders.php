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
				
				<thead>
					<tr>
                        <th>
                            订单时间
                        </th>
                        <th>
                            商户编号
                        </th>
                        <th>
                            商户订单号
                        </th>
                        <th>
                            平台订单号
                        </th>
                        <th>
                            订单金额
                        </th>
                        <th>
                            实付金额
                        </th>
                        <th>
                            商户收入
                        </th>
                        <th>
                            代理收入
                        </th>
                        <th>
                            付款渠道
                        </th>
                        <th>
                            订单状态
                        </th>
                        <th>
                            通知
                        </th>
                    </tr>
				</thead>
				<tbody>

						<?php if($lists):?>
                        <?php foreach($lists as $key=>
                            $val):$orderinfo=$this->model()->select('remark')->from('orderinfo')->where(array('fields'=>'id=?','values'=>array($val['orderinfoid'])))->fetchRow();$remark=$orderinfo
                            ? $orderinfo['remark'] : '-';$acc=$this->model()->select('name')->from('acc')->where(array('fields'=>'id=?','values'=>array($val['channelid'])))->fetchRow();$cname=$acc
                            ? $acc['name'] : '-';switch($val['is_state']){case 0: $state='
                            <span class="label label-warning">
                                未付
                            </span>
                            '; break;case 1: $state='
                            <span class="label label-success">
                                已付
                            </span>
                            '; break;case 2: $state='
                            <span class="label label-danger">
                                冻结
                            </span>
                            '; break;case 3: $state='
                            <span class="label label-danger">
                                关闭
                            </span>
                            '; break;}?>
                            <tr>
                                <td>
                                    <?php echo date( 'm-d H:i:s',$val['addtime'])?>
                                </td>
                                <td>
                                    <?php echo $val['userid']?>
                                </td>
                                <td>
                                    <?php echo $val['sdorderno']?>
                                        <br>
                                        <span class="gray">
                                            <?php echo $remark ?>
                                        </span>
                                </td>
                                <td>
                                    <?php echo $val['orderid']?>
                                </td>
                                <td>
                                    <?php echo $val['total_fee']?>
                                </td>
                                <td class="green">
                                    <?php echo $val['realmoney']?>
                                </td>
                                <td class="green">
                                    <?php echo $val['realmoney']*$val['uprice']?>
                                </td>
                                <td class="green">
                                    <?php echo $val['realmoney']*($val['gprice']-$val['uprice'])?>
                                </td>
                                <td>
                                    <?php echo $cname ?>
                                </td>
                                <td>
                                    <?php echo $state ?>
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="refresh('<?php echo $val['orderid']?>')">
                                        <span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="通知">
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="11" class="text-center">
                                            no data.
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
 <script>
        function refresh(sdpayno) {
            $.post('/agent/orders/refresh', {
                sdpayno: sdpayno,
                t: new Date().getTime()
            },
            function(ret) {
                alert(ret);
            });
        }
    </script>
</div>
</body>
</html>