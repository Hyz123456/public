    <?php require_once 'header.php' ?>
     <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>结算记录</cite></a>
				</span>
			</div>
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">
	
			<div class="biankuang">


			 <table class="layui-table">
				
				<thead>
				   <tr>
                        <th>
                            账单生成时间
                        </th>
                        <th>
                            账单序号
                        </th>
                        <th>
                            账单金额
                        </th>
                        <th>
                            手续费
                        </th>
                        <th>
                            实付金额
                        </th>
                        <th>
                            账单状态
                        </th>
                        <th>
                            真实姓名
                        </th>
                        <th>
                            收款方式
                        </th>
                    </tr>
				</thead>
				<tbody>

				 <?php if($lists):?>
                        <?php foreach($lists as $key=>$val):switch($val['is_state']){case 0: $state='
                            <span class="layui-btn layui-btn-mini huise">
                                '.$this->setConfig->billState($val['is_state']).'
                            </span>
                            ';break;case 1: $state='
                            <span class="layui-btn layui-btn-mini">
                                '.$this->setConfig->billState($val['is_state']).'
                            </span>
                            ';break;case 2: $state='
                            <span class="layui-btn layui-btn-mini huise">
                                '.$this->setConfig->billState($val['is_state']).'</span>
                            ';break;case 3: $state='
                            <span class="layui-btn layui-btn-mini huise">
                                '.$this->setConfig->billState($val['is_state']).'</span>';break;}?>
                            <tr>
                              <td class="text-center blue">
                                    <?php echo date( 'm-d H:i:s',$val[ 'addtime'])?>
                                </td>
                               <td class="text-center">
                                    <?php echo $val[ 'sn']?>
                                </td>
                                <td class="text-center green">
                                    <?php echo $val[ 'money']?>
                                        <span class="gray">
                                            元
                                        </span>
                                </td>
                               <td class="text-center">
                                    <?php echo $val[ 'fee']?>
                                        <span class="gray">
                                            元
                                        </span>
                                </td>
                                <td class="text-center red">
                                    <?php echo $val[ 'money']-$val[ 'fee']?>
                                        <span class="gray">
                                            元
                                        </span>
                                </td>
                             <td class="text-center">
                                    <?php echo $state ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $val[ 'realname']?>
                                </td>
                                <td class="text-center">
								                    <?php echo $val[ 'batype'] ?>
                            <!--        <?php echo $val[ 'batype']=='' ? '网银代付' : $val[ 'batype'] ?>  -->
                             
                            </tr>
                            <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="8" class="text-center">
                                          暂无记录
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