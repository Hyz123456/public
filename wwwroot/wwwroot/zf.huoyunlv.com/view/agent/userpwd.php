<?php require_once 'header.php' ?>
													
      <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/agent">代理首页</a>
				  <a><cite>修改密码</cite></a>
				</span>
			</div>
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">
	
			<div class="biankuang">


				<form class="form-ajax form-horizontal" action="/agent/userpwd/editsave" method="post">



					<div class="layui-form-item">
						<label class="layui-form-label">原密码</label>
						<div class="layui-input-block">
						  <input type="text" name="oldpwd" required  lay-verify="required" placeholder="请输入原密码" autocomplete="off" class="layui-input">
						</div>
					</div>



					<div class="layui-form-item">
						<label class="layui-form-label">新密码</label>
						<div class="layui-input-block">
						  <input type="password" name="newpwd" required  lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input">
						</div>
					</div>


					<div class="layui-form-item">
						<label class="layui-form-label">确认新密码</label>
						<div class="layui-input-block">
						  <input type="password" name="cirpwd" required  lay-verify="required" placeholder="确认新密码" autocomplete="off" class="layui-input">
						</div>
					</div>





					<div class="layui-form-item">
						<button style="width:100%" class="layui-btn">保存设置</button>
					</div>


				</form>




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