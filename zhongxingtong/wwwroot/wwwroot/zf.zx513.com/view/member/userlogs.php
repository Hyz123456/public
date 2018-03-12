<?php require_once 'header.php' ?>
   <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>登录日志</cite></a>
				</span>
			</div>
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">
	
			<div class="biankuang">


			 <table class="layui-table">
				<colgroup>
				  <col width="33%">
				  <col width="34%">
				  <col width="33%">
				 
				</colgroup>
				<thead>
				  <tr>
					<th>登录时间</th>
					<th>登录IP</th>
					<th>地区概要</th>
				  </tr> 
				</thead>
				<tbody>

				<?php if($lists):?>
				  <?php foreach($lists as $key=>$val):?>
                            <tr>
                                <td>
                                    <?php echo date( 'Y-m-d H:i:s',$val[ 'addtime'])?>
                                </td>
                                <td>
                                    <?php echo $val[ 'ip']?>
                                </td>
								  <td>
                                    <?php echo $val[ 'address']?>
                                </td>
                            </tr>
                    <?php endforeach;?>
                        <?php else:?>
                                    <tr>
                                        <td colspan="2">
                                            no data.
                                        </td>
                                    </tr>
                    <?php endif;?>
				  
				</tbody>
			  </table>



			  <div style="text-align:center" class="layui-row"> 
				<div class="layui-col-xs12 layui-col-md12">
					 <?php if($lists):?>
                <div style="float:right">
                    <?php echo $pagelist ?>
                </div>
                <br>
                <br>
                <?php endif;?>
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