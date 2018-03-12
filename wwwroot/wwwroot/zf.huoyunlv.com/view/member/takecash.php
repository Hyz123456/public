<?php require_once 'header.php' ?>

	<script src="/assets/js/jquery-latest.js"></script>
	<script src="/static/assets/app.js"></script>

 <div style="padding:10px" class="layui-body site-demo" lay-filter="demoTitle">

	<div class="layui-row layui-col-space10">
		<div class="layui-col-xs12 layui-col-md12">

			<div class="biankuang"> 
				<span class="layui-breadcrumb">
				  <a href="/member">商户首页</a>
				  <a><cite>申请提现</cite></a>

									<?php if($this->userData['is_state']=='0'):?>
									<div class="alert alert-warning" style="margin-bottom:0;">
										<span class="glyphicon glyphicon-info-sign">
										</span>
										&nbsp;您当前的账号状态为
									   <span class="am-badge am-badge-warning am-radius">
											未审核
										</span>
										，请继续完善以下信息然后联系客服以便审核。
									</div>
									<?php endif;?>


				</span>
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


					<div class="col-md-12">
							<div class="ibox float-e-margins">
								
								<div class="ibox-content">
									<blockquote class="layui-elem-quote">
										<span style="color: #ff0000;" class="text-danger">可提现：<?php echo $money ?> 元</span>
										<span style="margin:0 30px;" class="text-muted">帐户余额：<?php echo $money+$income?> 元</span>
										<span class="text-warning">结算：<?php echo $this->setConfig->shipCycle($this->userData['ship_cycle'])?></span>
									</blockquote>


									<form class="layui-form form-ajax am-form tpl-form-border-form tpl-form-border-br" action="/member/takecash/submit" method="post">

										<input type="hidden" name="ptype" value="0">

										<input type="hidden" name="balance" id="balance" value="<?php echo $money ?>">
										<input type="hidden" name="tktype" id="tktype" value="1">
										<input type="hidden" name="feilv" id="feilv" value="1">
										<div class="layui-form-item">
											<label class="layui-form-label">提现金额：</label>
											<div class="layui-input-block">
												<input type="number" name="txmoney" lay-verify="required" id="money" min="100" step="100" autocomplete="off"  placeholder="0.00" class="layui-input" value="" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
												<div class="layui-form-mid layui-word-aux">注：提现金额最小<?php echo $this->config['tx_minmoney']?>元，含提现手续费,直接在金额中扣除.</div>
											</div>
										</div>
										<div class="layui-form-item">
											<div class="layui-inline">
												<label class="layui-form-label">到账金额：</label>
												<div class="layui-input-inline">
													<input type="text" name="u[amount]" lay-verify="" id="amount" readonly="" autocomplete="off" class="layui-input">
												</div>
											</div>
											<div class="layui-inline">
												<label class="layui-form-label">手续费：</label>
												<div class="layui-input-inline">
													<input type="text"  id="fee" lay-verify="" readonly="" value="<?php echo $fee ?>" autocomplete="off" class="layui-input">
												</div>
											</div>
										</div>


										<div class="layui-form-item">
											<label class="layui-form-label">真实姓名：</label>
											<div class="layui-input-block">
												<input type="text" name="u[password]" lay-verify="pass" placeholder="请输入真实姓名" autocomplete="off" value="<?php echo $userinfo['realname']?>" class="layui-input" disabled>
											</div>
										</div>


										<div class="layui-form-item">
											<label class="layui-form-label">选择银行：</label>
											<div class="layui-input-block">
												<select  name="batype"   disabled>
												  <?php foreach($this->setConfig->shipBank() as $bank):?>
													<option value="<?php echo $bank ?>" <?php echo $userinfo[ 'batype']==$bank? ' selected' : ''?>><?php echo $bank ?></option>
													<?php endforeach;?>
												</select>


											</div>
										</div>


										<div class="layui-form-item">
										<label class="layui-form-label">收款帐号：</label>
                                        <div class="layui-input-block">
														
													<input type="text" class="layui-input" value="<?php echo $userinfo['baname']?>" placeholder="银行卡账号" disabled>
														
                                        </div>
										</div>


										<div class="layui-form-item">
										<label class="layui-form-label">开户地址：</label>
                                        <div class="layui-input-block">
														
													<input type="text" class="layui-input" value="<?php echo $userinfo['baaddr']?>" placeholder="省份/城市/分行名称" disabled>
														
                                        </div>
										</div>


										<?php if ($this->userData['is_verify_phone']==1) : ?>

										<div class="layui-form-item">
										  <label class="layui-form-label">手机验证码</label>
										  <div class="layui-input-inline">
											<input type="text" id="verifycode" name="verifycode" required lay-verify="required" lay-verType="tips" placeholder="填写验证码" autocomplete="off" class="layui-input" >
										  </div>
										  <div class="layui-word-aux" style="padding:0">
										  
											

											 <span style="cursor:pointer;" onClick="getCode(this)"  id="btnSendCode" class="am-input-group-label">获取验证码</span>
										  
										  </div>
										</div>
										<?php endif;?>	


										

										<div class="layui-form-item">
											<div class="layui-input-block">
												<button class="layui-btn" lay-submit="" lay-filter="save">提交申请</button>

											</div>
										</div>
									
									</form>
								</div>
							</div>
						</div>





			</div>

		  
		</div>
		

  </div>

  
  <div class="layui-footer footer footer-demo">
 
</div>



		<script>
        $(function() {
            $('[name=ptype]').click(function() {
                $('.p0,.p1').hide();
                $('.p' + $(this).val()).fadeIn();
                getCfo();
            });
            $('[name=txmoney]').keyup(function() {
                var money = $(this).val();
                $.post('/member/takecash/getFee', {
                    money: money
                },
                function(ret) {
                    $('#fee').val(ret);
					$('#amount').val(money-ret);
                });
            });
        });
        function getCfo() {
            $.post('/member/userinfo/getcfo', {
                t: new Date().getTime()
            },
            function(data) {
                if (data == '') {
                    $('.add').fadeIn();
                } else {
                    $('#cfolist').show();
                    $('.cfolistcontent').html(data);
                }
            });
        }
        function del(id) {
            if (confirm('是否删除？')) {
                $.post('/member/userinfo/delcfo', {
                    id: id,
                    t: new Date().getTime()
                },
                function(ret) {
                    if (ret.status == 0) {
                        alert('删除失败');
                    } else {
                        $('p.c' + id).fadeOut();
                    }
                },
                'json');
            }
        }
		
		var InterValObj; //timer变量，控制时间
				var count = 60; //间隔函数，1秒执行
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