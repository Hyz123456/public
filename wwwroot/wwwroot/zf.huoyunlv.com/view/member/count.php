<?php require_once 'header.php' ?>
        <!-- 内容区域 -->
        <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>收益统计</cite></a>
				</span>


				 <span style="margin-bottom:0;font-size:14px;color:#333">
                    实付总额：
                    <span class="red">
                        <?php echo $count[ 'total_money']?>
                    </span>
                    元&nbsp;&nbsp;商户收入：
                    <span class="blue">
                        <?php echo $count[ 'user_money']?>
                    </span>
                    元&nbsp;&nbsp;
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


			 &nbsp;&nbsp;
                <a href="?day=1" <?php echo $search[ 'day']=='1' ? ' class="current"' : ''?>>今天
                </a>
                <span class="v-line">
                    |
                </span>
                <a href="?day=2" <?php echo $search[ 'day']=='2' ? ' class="current"' : ''?>
                    >昨天
                </a>
                <span class="v-line">
                    |
                </span>
                <a href="?day=7" <?php echo $search[ 'day']=='7' ? ' class="current"': ''?> >7天
                </a>
                <span class="v-line">
                    |
                </span>
                <a href="?day=30" <?php echo $search[ 'day']=='30' ? ' class="current"' : ''?>
                    >30天
                </a>


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
                            实付金额
                        </th>
                        <th>
                            商户收入
                        </th>
                        <th>
                            付款渠道
                        </th>
                    </tr>
				</thead>
				<tbody>


						 <?php if($lists):?>
                        <?php foreach($lists as $key=>$val):$acc=$this->model()->select('name')->from('acc')->where(array('fields'=>'id=?','values'=>array($val['channelid'])))->fetchRow();$cname=$acc
                            ? $acc['name'] : '-';?>
                            <tr>
                                    <td class="text-center blue">
                                    <?php echo date('m-d H:i:s',$val['addtime'])?>
                                </td>
                                    <td class="text-center">
                                    <?php echo $val['userid']?>
                                </td>
                                     <td class="text-center">
                                    <?php echo $val['sdorderno']?>
                                </td>
                                <td class="text-center red">
                                    <?php echo $val['realmoney']?>
                                </td>
                                <td class="text-center blue">
                                    <?php echo $val['realmoney']*$val[ 'uprice']?>
                                </td>
                                    <td class="text-center">
                                    <?php echo $cname ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            暂无记录
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