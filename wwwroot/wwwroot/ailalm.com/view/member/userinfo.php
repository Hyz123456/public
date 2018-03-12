<?php require_once 'header.php' ?>
	<script src="/static/assets/app.js"></script>

      <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            

            <div class="row-content am-cf">



                <div  class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div style="padding-bottom:200px" class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">商户资料</div>


                                <div class="widget-function am-fr">

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
   
                                </div>
                            </div>
                            <div class="widget-body am-fr">


								<form class="form-ajax am-form tpl-form-border-form tpl-form-border-br" action="/member/userinfo/editsave" method="post">

                             
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">注册邮箱 </label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														
														  <input type="text"  class="am-form-field"  value="<?php echo $userinfo['email']?>" disabled>
														  <span class="am-input-group-label"><?php echo $users['is_verify_email']==1 ? '已验证' : '未验证'?></span>
														</div> 
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">手机号码</label>

										 <div class="am-u-sm-9">
											<div style="width: 400px;" class="am-input-group">
														
												<input type="text"  name="phone"  class="am-form-field" <?php echo $users['is_verify_phone']==1 ? 'value="'.substr_replace($userinfo['phone'],'****',3,4).'"'.' disabled' :  'value="'.$userinfo['phone'].'"'.' required'  ?>> 


												<?php if ($users['is_verify_phone']!=1){ ?>
												
												<span style="cursor:pointer;" onclick="window.location.href ='/member/userinfo/addsms'" class="am-input-group-label"><?php echo $users['is_verify_phone']==1 ? '已验证' : '未验证' ?>

												<?php }else{ ?>	

												<span class="am-input-group-label"><?php echo $users['is_verify_phone']==1 ? '已验证' : '未验证' ?>
												
												<?php } ?>		
														  
												</span>
														  
											</div> 
                                        </div>
                                       
                                    </div>


									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">联系QQ</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														
														  <input type="text" name="qq" class="am-form-field" value="<?php echo $userinfo['qq']?>" required>
														</div> 
                                        </div>
                                       
                                    </div>


									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">真实姓名</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" name="realname" class="am-form-field" value="<?php echo $userinfo['realname']?>" required>
														</div>
                                        </div>
                                       
                                    </div>

									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">身份证号</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														    <input type="text" name="idcard" class="am-form-field" value="<?php echo $userinfo['idcard']?>" required>
														</div>
                                        </div>
                                       
                                    </div>




									<div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">收款银行</label>
                                        <div class="am-u-sm-9">
                                            <select name="batype" data-am-selected="{searchBox: 0}" style="display: none;">
											  <?php foreach($this->
												setConfig->shipBank() as $bank):?>
												<option value="<?php echo $bank ?>" <?php echo $userinfo[ 'batype']==$bank ? ' selected' : ''?>
													>
													<?php echo $bank ?>
												</option>
												<?php endforeach;?>
											</select>

                                        </div>
                                    </div>


									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">收款账号</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														    <input type="text" name="baname" class="am-form-field" value="<?php echo $userinfo['baname']?>" placeholder="支付宝/财付通/银行卡" required>
														</div>
                                        </div>
                                       
                                    </div>


									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">开户地址</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														    <input type="text" name="baaddr" class="am-form-field" value="<?php echo $userinfo['baaddr']?>" placeholder="省份/城市/分行名称" required>
														</div>
                                        </div>
                                       
                                    </div>


									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">网站名称</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" name="sitename" class="am-form-field" value="<?php echo $userinfo['sitename']?>" required>
														</div>
                                        </div>
                                       
                                    </div>

									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">站点地址</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" name="siteurl" class="am-form-field" value="<?php echo $userinfo['siteurl']?>" required>
														</div>
                                        </div>
                                       
                                    </div>



									<?php if ($users['is_verify_phone']==1) : ?>

									
                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">手机号码</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														
														  <input type="text" id="verifycode" name="verifycode" class="am-form-field" maxlength="4" required>
														  <span onClick="getCode(this)" class="am-input-group-label">获取手机验证码</span>
														</div> 
                                        </div>
                                       
                                    </div>


									<?php endif;?>	

                                  

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存设置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						</form>
                    </div>
                </div>

               











            </div>
        </div>
    </div>
    </div>





		<script type="text/javascript">
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










    <script src="/static/assets/js/amazeui.min.js"></script>
    <script src="/static/assets/js/amazeui.datatables.min.js"></script>
    <script src="/static/assets/js/dataTables.responsive.min.js"></script>
    <script src="/static/assets/js/app.js"></script>

</body>

</html>