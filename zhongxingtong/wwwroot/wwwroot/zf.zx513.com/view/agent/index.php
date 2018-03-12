<?php require_once 'header.php' ?>
      <!-- 内容区域 -->
         <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	 <div class="layui-row layui-col-space10">




		<div class="layui-col-xs12 layui-col-md3">
		  <div class="shuzi1 kuang">
			<div class="title">账户余额</div>
			<div class="widget-statistic-value ">

								￥<?php echo number_format($unpaid, '2', '.', '')?> 元
                               
            </div>
		  </div>
		</div>
		<div class="layui-col-xs12 layui-col-md3">
		  <div class="shuzi2 kuang">

			<div class="title">今日收入</div>
			<div class="widget-statistic-value">

							￥<?php echo $today_income ?> 元
                              
            </div>
			

		  </div>
		</div>
		<div class="layui-col-xs12 layui-col-md3">
		  <div class="shuzi3 kuang">

			<div class="title">今日交易</div>
			<div class="widget-statistic-value">

							<?php echo $today_orders ?> 笔
                              
            </div>
		

		  </div>
		</div>
		<div class="layui-col-xs12 layui-col-md3">
		  <div class="shuzi4 kuang">

			<div class="title">结算金额</div>
			<div class="widget-statistic-value">

							￥<?php echo $this->userData['paid']?> 元

            </div>
		  </div>
		</div>		

	  </div>

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<?php if($this->userData['is_state']=='0'):?>


					<div class="biankuang"> 您当前的账号状态为： <div class="layui-btn layui-btn-mini">未审核</div>    请继续完善注册信息然后联系客服以便审核。</div>


			<?php else:?>
				
				<?php if($this->userData['ship_type']):?>

					<div class="biankuang"> 您的当前账户 <div class="layui-btn layui-btn-mini">代理账户</div> 正常 </div>

				<?php endif;?>

			<?php endif;?>
		
		</div>
	</div>

	<!--图表 START-->
	<script src="https://img.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
	<script src="https://img.hcharts.cn/highcharts/highcharts.js"></script>
	<script src="https://img.hcharts.cn/highcharts/modules/exporting.js"></script>
	<script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>


	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang">
			
			<div id="container" style="min-width:400px;height:400px"></div>
			
			</div>
		
		</div>
	</div>


<script>
	$(function () {
    $('#container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: '最新交易统计'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24']
        },
        yAxis: {
            title: {
                text: '交易量'
            },
            labels: {
                formatter: function () {
                    return this.value + '元';
                }
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true          // 开启数据标签
                },
                enableMouseTracking: false // 关闭鼠标跟踪，对应的提示框、点击事件会失效
            }
        },
        series: [{
            name: '订单金额',
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6,7.0 , 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: '已付金额',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8,3.9 , 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});
</script>


	<!--图表 END-->

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			
			<div class="biankuang">

			<div class="title">系统公告</div>

			
			 <table class="layui-table">
				<colgroup>
				  <col width="">
				  <col width="">
				  <col width="">
				</colgroup>
				<thead>
				  <tr>
					<th>时间</th>
					<th>内容</th>
				  </tr> 
				</thead>
				<tbody>





													  <?php if($notice):?>
														<?php foreach($notice as $key=>$val):?>
																			<tr>
																				<td class="text-center">
																					<?php echo date( 'Y-m-d',$val[ 'addtime'])?>
																				</td>

																				<td class="text-center">
																					<?php echo $val[ 'title']?>
																				</td">
																				
																			</tr>
																			<?php endforeach;?>
																				<?php else:?>
														 <tr>    
																	 <td class="text-center" colspan="5">
																												<h5>
																												  暂无数据
																												</h5>
																											</td>
														<?php endif;?>



				</tbody>
			  </table>

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
</script>

</div>
</body>
</html>