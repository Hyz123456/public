<?php require_once 'header.php' ?>
	<script src="/static/assets/app.js"></script>

      <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            

            <div class="row-content am-cf">



                <div  class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div style="padding-bottom:200px" class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">商户提现</div>


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


								<form class="form-ajax am-form tpl-form-border-form tpl-form-border-br" action="/member/takecash/submit" method="post">



									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">当前最低提现金额 </label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" class="am-form-field" value="<?php echo $this->config['tx_minmoney']?>" disabled>
														</div> 
                                        </div>
                                    </div>


									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">当前结算手续费 </label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" class="am-form-field" value="<?php echo $this->config['tx_fee']?>%(最高为<?php echo $this->config['tx_limit']?>元)，提现时手续费不足1元按1元收取。" disabled>
														</div> 
                                        </div>
                                    </div>



									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">商户名 </label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" class="am-form-field" value="<?php echo $this->userData['username']?>" disabled>
														</div> 
                                        </div>
                                    </div>


									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">账户余额 </label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														  <input type="text" class="am-form-field" value="<?php echo $money+$income?>" disabled>
														</div> 
                                        </div>
                                    </div>

									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">可提现金额</label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														  <input type="text" name="txmoney" class="am-form-field" value="<?php echo $money ?>" required>
														</div> 
                                        </div>
                                    </div>

									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">手续费</label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														  <input type="text" id="fee" class="am-form-field" value="<?php echo $fee ?>" disabled>
														</div> 
                                        </div>
                                    </div>


									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">下发方式</label>
                                        <div class="am-u-sm-9">
														<div class="am-input-group">
																<label>
																	<input type="radio" name="ptype" value="0" checked>
																	&nbsp;普通下发
																</label>
																&nbsp;&nbsp;
																<label>
																	<input type="radio" name="ptype" value="1">
																	&nbsp;银行代收
																</label>
														</div> 
                                        </div>
                                    </div>

									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">真实姓名：</label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														  <input type="text" class="am-form-field" value="<?php echo $userinfo['realname']?>" disabled>
														</div> 
                                        </div>
                                    </div>

									<div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">收款银行</label>
                                        <div class="am-u-sm-9">
                                            <select style="width: 400px;" name="batype" data-am-selected="{searchBox: 0}" style="display: none;">
											  <?php foreach($this->
												setConfig->shipBank() as $bank):?>
												<option value="<?php echo $bank ?>" <?php echo $userinfo[ 'batype']==$bank
												? ' selected' : ''?>
													>
													<?php echo $bank ?>
												</option>
												<?php endforeach;?>
											</select>

                                        </div>
                                    </div>



									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">收款账号</label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														   <input type="text" class="am-form-field" value="<?php echo $userinfo['baname']?>" placeholder="支付宝/财付通/银行卡" disabled>
														</div> 
                                        </div>
                                    </div>


									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">开户地址</label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														  <input type="text" class="am-form-field" value="<?php echo $userinfo['baaddr']?>" placeholder="省份/城市/分行名称" disabled>
														 
														</div> 
                                        </div>
                                    </div>


									<div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">开户地址</label>
                                        <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														  <input type="text" class="am-form-field" value="<?php echo $userinfo['baaddr']?>" placeholder="省份/城市/分行名称" disabled>
														</div> 
                                        </div>
                                    </div>




									 <div class="p1" style="display:none">
											<div class="form-group add" style="display:none">
												<label class="col-md-2 control-label">
												</label>
												<div class="col-md-6">
													<div class="alert alert-warning">
														还没有代收银行信息，现在&nbsp;
														<a href="javascript:;" onclick="showContent('添加代收银行信息','/member/userinfo/addcfo')"
														class="btn btn-danger btn-sm">
															添加
														</a>
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none" id="cfolist">
												<label class="col-md-2 control-label">
												</label>
												<div class="col-md-6">
													<div class="panel panel-default">
														<div class="panel-heading">
															<span class="gray">
																选择代收银行：
															</span>
														</div>
														<div class="panel-body cfolistcontent">
															正在加载...
														</div>
														<div class="panel-footer">
															<a href="javascript:;" onclick="showContent('添加代收银行信息','/member/userinfo/addcfo')"
															class="btn btn-default btn-sm">
																<i class="fa fa-plus">
																</i>
																&nbsp;添加新的代收银行
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


									<?php if ($this->userData['is_verify_phone']==1) : ?>

									
                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">手机号码</label>

										 <div class="am-u-sm-9">
														<div style="width: 400px;" class="am-input-group">
														
														 <input type="text" id="verifycode" name="verifycode" class="am-form-field" maxlength="4" required>
														  <span onClick="getCode(this)" id="btnSendCode" class="am-input-group-label">获取手机验证码</span>
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






    <script src="/static/assets/js/amazeui.min.js"></script>
    <script src="/static/assets/js/amazeui.datatables.min.js"></script>
    <script src="/static/assets/js/dataTables.responsive.min.js"></script>
    <script src="/static/assets/js/app.js"></script>

</body>

</html>