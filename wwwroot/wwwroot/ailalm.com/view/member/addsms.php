<?php require_once 'header.php' ?>
	<script src="/static/assets/app.js"></script>

      <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            

            <div class="row-content am-cf">



                <div  class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div style="padding-bottom:200px" class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">验证手机号</div>


                            </div>
                            <div class="widget-body am-fr">






							<?php
							
							if ($users['is_verify_phone']!=1){
							
							?>






								<form class="am-form tpl-form-border-form tpl-form-border-br" action="/member/userinfo/savesms" method="post">

                             
                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">手机号码</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">


														  <input type="text" id='phone' name="phone" class="am-form-field" value="<?php echo $userinfo['phone']?>" disabled>
														  
														  
														  </span>
														  
														</div> 
                                        </div>
                                       
                                    </div>



									<div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">验证码</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">


														  <input type="text" id="verifycode" name="verifycode" class="am-form-field"  maxlength="4" required>


														  <span style="cursor:pointer;" id="btnSendCode" onClick="getCode(this)" class="am-input-group-label">获取验证码</span>
														  
														</div> 
                                        </div>
                                       
                                    </div>


								

                                  

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存设置</button>
                                        </div>
                                    </div>
                                </form>
								

								
							<?php
							
							}else{
							
							?>


									<div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            您的手机已验证
                                        </div>
                                    </div>





							<?php
							
							}
							
							?>


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
 			/*-------------------------------------------*/
			
				function getCode(obj) {	
					
					
				curCount = count;
				tel = $('#phone').val();
				if(tel!=''){
		//验证手机有效性
			 var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
            if(!myreg.test($('#phone').val())) 
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
				data: "Tel=" + $("#phone").val(),
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