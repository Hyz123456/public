<?php require_once 'header.php' ?>
        <!-- 内容区域 -->
        <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>通道分析</cite></a>
				</span>
			</div>
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">


		 <form class="form-inline m-b-xs" action="" method="get">
	
			<div class="biankuang">

			
			<div class="layui-form">

			 
			

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
			<button style="height:37px;width:150px;margin-top: -1px" class="layui-btn">
			  <i class="layui-icon">&#xe615;</i> 立即查询
			</button>
			</div>


			</div>

			</form>

			 <table class="layui-table">
				<colgroup>
				  <col width="25%">
				  <col width="25%">
				  <col width="25%">
				  <col width="25%">
					
				</colgroup>
				<thead>
				  <tr>
					<th>通道编号</th>
					<th>订单总数</th>
					<th>订单总额</th>
					<th>订单收入总额</th>
					
				  </tr> 
				</thead>
				<tbody>


						<?php if($lists):?>
                        <?php $total[ 'orders']=0;$total[ 'money']=0;$total[ 'income']=0;foreach($lists
                        as $key=>
                            $val):$total['orders']+=$val['total_orders'];$total['money']+=$val['total_fee'];$total['income']+=$val['total_income'];$acc=$this->model()->select('name')->from('acc')->where(array('fields'=>'id=?','values'=>array($val['channelid'])))->fetchRow();$cname=$acc
                            ? $acc['name'] : '-';?>
                            <tr data-id="<?php echo $val['channelid']?>">
                                <td>
                                    <?php echo $cname?>
                                </td>
                                <td>
                                    <?php echo $val[ 'total_orders']?>
                                </td>
                                <td>
                                    <?php echo $val[ 'total_fee']?>
                                </td>
                                <td>
                                    <?php echo number_format($val[ 'total_income'],2, '.', '')?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                                <tr class="active">
                                    <td class="gray">
                                        总计：
                                    </td>
                                    <td class="red">
                                        <?php echo $total[ 'orders']?>
                                    </td>
                                    <td class="blue">
                                        <?php echo $total[ 'money']?>
                                            元
                                    </td>
                                    <td class="green">
                                        <?php echo $total[ 'income']?>
                                            元
                                    </td>
                                </tr>
                                <?php else:?>
								   <tr>
                                        <td colspan="4" class="text-center">
                                            暂无记录
                                        </td>
                                    </tr>
                                  
                                        <?php endif;?>

				
				</tbody>
			  </table>




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