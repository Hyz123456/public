<?php require_once 'header.php' ?>

<script src="http://code.jquery.com/jquery-latest.js"></script>

<script src="/layui/layui.js"></script>


													
    <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<a href="/member">商户首页<span class="layui-box">&gt;</span></a>
				<a><cite>手机绑定</cite></a>
			</div>
		
		</div>
	</div>


					<style>
						.am-input-group-label {
							line-height: 36px;
							padding: 0 18px;
							font-size: 14p`x;
							border-radius: 2px;
							border: 1px solid #e6e6e6;
							display: inline-block;
						}
					</style>


	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">
	
			<div class="biankuang">


				<form class="am-form tpl-form-border-form tpl-form-border-br" action="/member/userinfo/savesms" method="post">



					<div class="layui-form-item">
						<label class="layui-form-label">手机号码</label>
						<div class="layui-input-block">
						 
						  <input type="text" id='phonet' name="phone" class="layui-input" value="<?php echo $userinfo['phone']?>" >
														  
						</div>
					</div>



									
                     <div class="layui-form-item">
					  <label class="layui-form-label">手机验证码</label>
					  <div class="layui-input-inline">
						<input type="text" name="verifycode" required lay-verify="required" lay-verType="tips" placeholder="填写验证码" autocomplete="off" class="layui-input">
					  </div>
					  <div class="layui-word-aux" style="padding:0">
					  
						

						 <span style="cursor:pointer;" onClick="getCode(this)"  class="am-input-group-label">获取验证码</span>
					  
					  </div>
					</div>






					<div class="layui-form-item">
						<button style="width:100%" class="layui-btn">绑定验证</button>
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
<script>
window.global = {
  pageType: 'demo'
  ,preview: function(){
    var preview = document.getElementById('LAY_preview');
    return preview ? preview.innerHTML : '';
  }()
};
layui.config({
  base: '/layui/lay/modules/'
  ,version: '1508154136729'
}).use('global');


</script>




<script type="text/javascript">
				var InterValObj; //timer变量，控制时间
				var count = 60; //间隔函数，1秒执行
				var curCount;//当前剩余秒数
				var code = ""; //验证码
				var codeLength = 6;//验证码长度
 			/*-------------------------------------------*/
			
				function getCode(obj) {	

			
					
					
				curCount = count;
				var tel = $('#phonet').val();

			


				if(tel!=''){
		//验证手机有效性
			 var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
            if(!myreg.test($('#phonet').val())) 
          { 
             alert('请输入有效的手机号码！'); 
             return false; 
          } 
			$("#btnSendCode").attr("disabled", "true");
			$("#btnSendCode").html("请在" + curCount + "秒内输入验证码");
			InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
			$.ajax({
				url: "/sms.php",
				type: "Post",
				data: "Tel=" + $("#phonet").val(),
				success: function(msg) {
                if (msg == "ok") {
              alert("生成成功!请等侍短信提示。")
              return;
          }
          if (msg == "error") {
              alert("生成失败!请联系管理员")
              return;
          }
          alert(msg);
      }
  });
			}else{
			alert('请填写手机号码');
		        }
				        }
			function SetRemainTime() {
			if (curCount == 0) {                
						window.clearInterval(InterValObj);//停止计时器
						$("#btnSendCode").removeAttr("disabled");//启用按钮
						$("#btnSendCode").html("重新发送验证码");
						code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
					}
					else {
						curCount--;
						$("#btnSendCode").html("请在" + curCount + "秒内输入验证码");
					}
				}
		</script>


 
</div>
</body>
</html>