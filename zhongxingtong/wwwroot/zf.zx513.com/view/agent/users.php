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
				
				<thead>
				  <tr>
                        <th>
                            商户编号
                        </th>
                        <th>
                            商户名
                        </th>
                        <th>
                            注册时间
                        </th>
                        <th>
                            账号状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
				</thead>
				<tbody>



				<?php if($lists):?>
                        <?php foreach($lists as $key=>
                            $val):switch($val['is_state']){case 0: $state='
                            <span class="label label-warning">
                                待审核
                            </span>
                            '; break;case 1: $state='
                            <span class="label label-success">
                                已审核
                            </span>
                            '; break;case 2: $state='
                            <span class="label label-danger">
                                已停用
                            </span>
                            '; break;}?>
                            <tr>
                                <td>
                                    <?php echo $val[ 'id']?>
                                </td>
                                <td>
                                    <?php echo $val[ 'username']?>
                                </td>
                                <td>
                                    <?php echo date( 'Y-m-d H:i:s',$val[ 'addtime'])?>
                                </td>
                                <td>
                                    <?php echo $state?>
                                </td>
                                <td>
                                    <a href="javascript:;" onclick="showContent('设置下级用户费率','/agent/users/setuserrate/<?php echo $val['id']?>')">
                                        <span class="glyphicon glyphicon-cog" data-toggle="tooltip" title="设置费率">
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            no data.
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
<script src="/layui/layui.js"></script>
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