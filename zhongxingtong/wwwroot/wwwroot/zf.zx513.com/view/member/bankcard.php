<?php require_once 'header.php' ?>


	<script src="/assets/js/jquery-latest.js"></script>
	<script src="/static/assets/app.js"></script>


	 <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>商户资料</cite></a>
				</span>
			</div>
		
		</div>
	</div>

	 <div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">
	
			<div class="biankuang">


				<form class="form-ajax layui-form am-form tpl-form-border-form tpl-form-border-br" action="/member/BankCard/editsave" method="post">



					

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

					<div class="layui-form-item">
						<label class="layui-form-label">手机号码</label>

						<div class="layui-input-inline">

						  <input type="text"  name="phone"  class="layui-input" <?php echo $users['is_verify_phone']==1 ? 'value="'.substr_replace($userinfo['phone'],'****',3,4).'"'.' disabled' :  'value="'.$userinfo['phone'].'"'.' required'  ?>> 

						</div>

												<?php if ($users['is_verify_phone']!=1){ ?>


												<div class="layui-word-aux" style="padding:0">

												
												<span style="cursor:pointer;" `` onclick="window.location.href ='/member/userinfo/addsms'" class="am-input-group-label"><?php echo $users['is_verify_phone']==1 ? '已验证' : '<font color="#000">绑定手机验证</font>' ?>

												
												</div>

													

												<?php }else{ ?>	


												 <div class="layui-word-aux" style="padding:0">
					  
													<span class="am-input-group-label">已验证</span>
												 
												  </div>

												
												
												<?php } ?>		
														  
												</span>
						
					</div>

				


					<div class="layui-form-item">
						<label class="layui-form-label">真实姓名</label>
						<div class="layui-input-block">
						  <input type="text" name="realname" required  lay-verify="required" value="<?php echo $userinfo['realname']?>" autocomplete="off" class="layui-input">
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">身份证号</label>
						<div class="layui-input-block">
						  <input type="text" name="idcard" required  lay-verify="required" value="<?php echo $userinfo['idcard']?>" autocomplete="off" class="layui-input">
						</div>
					</div>


					<div class="layui-form-item">
						<label class="layui-form-label">收款银行</label>
						<div class="layui-input-block">
											<select name="batype" lay-verify="required">
											  <?php foreach($this->setConfig->shipBank() as $bank):?>
												<option value="<?php echo $bank ?>" <?php echo $userinfo[ 'batype']==$bank ? ' selected' : ''?> ><?php echo $bank ?></option>
												<?php endforeach;?>
											</select>
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">收款账号</label>
						<div class="layui-input-block">
						  <input type="text" name="baname" required  lay-verify="required" value="<?php echo $userinfo['baname']?>" placeholder="支付宝/财付通/银行卡" autocomplete="off" class="layui-input">
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">开户地址</label>
						<div class="layui-input-block">
						  <input type="text" name="baaddr" required  lay-verify="required" value="<?php echo $userinfo['baaddr']?>" placeholder="省份/城市/分行名称" autocomplete="off" class="layui-input">
						</div>
					</div>


					<!--<div class="layui-form-item">
						<label class="layui-form-label">网站名称</label>
						<div class="layui-input-block">
						  <input type="text" name="sitename" class="layui-input" value="<?php echo $userinfo['sitename']?>" required>
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">站点地址</label>
						<div class="layui-input-block">
						 
						  <input type="text" name="siteurl" class="layui-input" value="<?php echo $userinfo['siteurl']?>" required>
						</div>
					</div>-->
					<?php if ($users['is_verify_phone']==1) : ?>

					<div class="layui-form-item">
					  <label class="layui-form-label">手机验证码</label>
					  <div class="layui-input-inline">
						<input type="text" name="verifycode" required lay-verify="required" lay-verType="tips" placeholder="填写验证码" autocomplete="off" class="layui-input">
					  </div>
					  <div class="layui-word-aux" style="padding:0">
					  
						

						 <span style="cursor:pointer;" onClick="getCode(this)"  id="btnSendCode" class="am-input-group-label">获取验证码</span>
					  
					  </div>
					</div>
					<?php endif;?>	




					<div class="layui-form-item">
						<button style="width:100%" class="layui-btn">添加</button>
					</div>


				</form>




			</div>

		  
		</div>
		

  </div>

  
  <div class="layui-footer footer footer-demo">
 
</div>



	<script type="text/javascript">
				var InterValObj; //timer变量，控制时间
				var count = 180; //间隔函数，1秒执行
				var curCount;//当前剩余秒数
				var code = ""; //验证码
				var codeLength = 6;//验证码长度
				var tel = <?php echo $userinfo['phone'] ?>;


			
				function getCode(obj) {		
				curCount = count;

				if(tel!=''){
				//验证手机有效性

			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 

			
            if(!myreg.test(tel))
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
				data: "Tel=" + tel,
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