<?php require_once 'header.php' ?>
        <!-- 内容区域 -->
        <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				   <a href="/agent">代理首页</a>
				  <a><cite>通道管理</cite></a>
				</span>
			</div>
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">
	
			<div class="biankuang foot">

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
                                        <th>
                                            通道名称
                                        </th>
                                        <th>
                                            结算费率
                                        </th>
                                        <th>
                                            当前状态
                                        </th>
                                    </tr>
				</thead>
				<tbody>



				 <?php if($userprice):?>
                                        <?php foreach($userprice as $key=>
                                            $val):?>
                                            <tr>
                                                <td>
                                                    <?php echo $val['name']?>
                                                </td>
                                                <td>
                                                    <?php echo $val['gprice']?>
                                                </td>
                                                <td>
													<?php if($val[ 'is_state']=='0' ):?>

														<div class="layui-btn layui-btn-mini">开启</div>                                  
																					
													<?php else:?>

														<div class="layui-btn layui-btn-mini layui-btn-danger">关闭</div>
																					   
													<?php endif;?>
												</td>
																		</tr>
                                            <?php endforeach;?>
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


</script>

</div>
</body>
</html>