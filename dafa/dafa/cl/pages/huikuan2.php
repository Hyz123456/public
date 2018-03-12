<?php 
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/include/newpage.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/cache/bank.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>History</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});
setTimeout(setHeight,100);
function setHeight(){
    $(window.parent.document).find("#mainFrame").height( $(document.body).height().toString());
}
</script> 
<link rel="stylesheet" href="/cl/css/reset.css">
<link rel="stylesheet" href="/cl/memberdata.css">
<style>
</style>
</head>
<body>

<div class="Hyzx-body">
					<div class="Hyzx-right">
						<h3 class="nav2">
	<span class="flt">线上存款</span>
	<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_transf_index&#39;,1);" data="bank_transf_index" class="Hyzx-btn flt">额度转换</a>
	<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_onlinein_index&#39;,1);" data="bank_onlinein_index" class="Hyzx-btn flt active">线上存款</a>
		<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_onlineout_index&#39;,1);" data="bank_onlineout_index" class="Hyzx-btn flt">线上取款</a>
    </h3>
						<div class="Hyzx-content">
							<div class="Hyzx-conNav">
								<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_onlinein_index&#39;,1);" data="bank_onlinein_index" class="Hyzx-btn flt active">网银转账</a>
																																	<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_onlinebank_index&#39;,3);" data="bank_onlinebank_index" class="Hyzx-btn flt">第三方网银</a>
																	<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_onlinewechat_index&#39;,3);" data="bank_onlinewechat_index" class="Hyzx-btn flt">第三方微信</a>
																	<a href="javascript:$.member.changeNav(&#39;Bank&#39;,&#39;bank_onlineali_index&#39;,3);" data="bank_onlineali_index" class="Hyzx-btn flt">第三方支付宝</a>
															</div>
							<div class="clearfix"></div>
							<div class="Hyzx-gsrk Hyzx-table-content">
							<div class="Hyzx-wy">
								<p class="p-tit" style="color: "></p>
								<div class="wy-left">
									
								</div>

								<div class="clearfix"></div>
							</div>

						    <div class="Hyzx-yhxz">
						    	<p><label>充值金额:</label><input type="text" placeholder="充值金额" id="deposit_num" onkeyup="clearNoNum(this);" onblur="offerPrompt();"><span>请输入充值金额</span></p>
						    	<p><label>存款人姓名:</label><input type="text" value="李小明" id="in_name"><span>请输入存款人姓名或微信昵称</span></p>
						    	<p><label>存款时间:</label><input type="text" onclick="laydate({istime: true, format: &#39;YYYY-MM-DD hh:mm:ss&#39;})" readonly="readonly" id="in_date" value="2017-06-20 06:41:20" class="Wdate"><span>请选择存款时间</span></p>
						    	<div class="yhxz-div">
						    		<div class="tit-name">
						    			<span>存款银行:</span>
						    		</div>
						    		<div class="yn-img" id="in-bank-img">
						    			<div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="100" type="radio"><div class="bank-logoimg"><span title="支付宝" class="class-100"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="101" type="radio"><div class="bank-logoimg"><span title="微信支付" class="class-101"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="102" type="radio"><div class="bank-logoimg"><span title="财付通" class="class-102"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="1" type="radio"><div class="bank-logoimg"><span title="中国银行" class="class-1"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="2" type="radio"><div class="bank-logoimg"><span title="中国工商银行" class="class-2"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="3" type="radio"><div class="bank-logoimg"><span title="中国建设银行" class="class-3"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="4" type="radio"><div class="bank-logoimg"><span title="招商银行" class="class-4"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="5" type="radio"><div class="bank-logoimg"><span title="中国民生银行" class="class-5"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="7" type="radio"><div class="bank-logoimg"><span title="中国交通银行" class="class-7"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="8" type="radio"><div class="bank-logoimg"><span title="中国邮政储蓄银行" class="class-8"></span></div></div><div class="Hyzx-radio" onclick="radioCheck($(this))"><input name="bank_id" value="9" type="radio"><div class="bank-logoimg"><span title="中国农业银行" class="class-9"></span></div></div><div id="show-More" onclick="showMoreBank()">
						    				<div class="bank-logoimg">
						    					<span class="class-More"><b>＋</b>&nbsp;显示更多</span>
						    				</div>
						    			</div>
						    		</div>

						    		<div class="clearfix"></div>
						    	</div>

						        <div class="yhxz-div">
						    		<div class="tit-name">
						    			<span>收款银行:</span>
						    		</div>
						    		<div class="yn-img Hyzx-btn-show">
						    								    									    			<div class="Hyzx-radio" onclick="radioCheck($(this))">
						    				<input type="radio" name="deposit_id" value="4432">
						    				<div class="bank-logoimg">
						    					<span title="中国工商银行" cardid="2102116901011023142" cardaddress="南宁仙葫支行" cardusername="陈怀俊" class="class-2"></span>
						    				</div>
						    			</div>
						    									    									    		</div>

						    		<div class="clearfix"></div>
						    	</div>



						    	<div class="Hyzx-yhzh">
						    		<div class="Hyzx-yhDiv">
						    			<!--<p><strong>优先推荐!</strong><span>※提醒您：跨银行转账请选择加急才能立即到帐喔!</span></p>-->
						    			<div class="Hyzx-radio Hyzx-divw checked">
						    				<input type="radio" name="userbank3" class="input-rad" checked="">
						    				<div class="bank-logoimg bank-logoimg-btn">
						    					<ul>
						    						<li>
						    							<strong>开户行网点:</strong>
						    							<em id="fe_text_3">去问问他人好</em>
						    							<strong class="btn-copy d_clip_button" title="复制姓名到剪切板" data-clipboard-target="fe_text_3" data-clipboard-text="Default clipboard text from attribute">复制</strong>
						    						</li>
						    						<li>
						    							<strong>收款人:</strong>
						    							<em id="fe_text_4">青蛙色彩</em>
						    							<strong class="btn-copy d_clip_button" title="复制姓名到剪切板" data-clipboard-target="fe_text_4" data-clipboard-text="Default clipboard text from attribute">复制</strong>
						    						</li>
						    						<li>
						    							<strong>银行:</strong>
						    							<em id="fe_text_5" class="khyh"></em>
						    							<strong class="btn-copy d_clip_button" title="复制姓名到剪切板" data-clipboard-target="fe_text_5" data-clipboard-text="Default clipboard text from attribute">复制</strong>
						    						</li>
						    						<li>
						    							<strong>账号:</strong>
						    							<em id="fe_text_6">1232435465768</em>
						    							<strong class="btn-copy d_clip_button" title="复制姓名到剪切板" data-clipboard-target="fe_text_6" data-clipboard-text="Default clipboard text from attribute">复制</strong>
						    						</li>
						    						<li>
						    							<strong>注单号:</strong>
						    							<em id="fe_text_7">1232435465768</em>
						    							<strong class="btn-copy d_clip_button" title="复制姓名到剪切板" data-clipboard-target="fe_text_7" data-clipboard-text="Default clipboard text from attribute">复制</strong>
						    						</li>
						    					</ul>
						    				</div>
						    			</div>
						    			<div class="clearfix"></div>
						    		</div>
						    	</div>
						    	<div class="yhxz-div">
						    		<div class="tit-name">
						    			<span>存入方式:</span>
						    		</div>
						    		<div class="yn-img">
						    			<label><input name="deposit_way" value="1" type="radio" checked="">网银转账</label>
										<label><input name="deposit_way" value="4" type="radio">银行柜台</label>
										<label><input name="deposit_way" value="3" type="radio">ATM现金入款</label>
										<label><input name="deposit_way" value="2" type="radio">ATM自动柜员机</label>
										<label><input name="deposit_way" value="5" type="radio">手机转账</label>
										<label><input name="deposit_way" value="6" type="radio">支付宝转账</label>
										<label><input name="deposit_way" value="7" type="radio">
										财付通</label>
										<label><input name="deposit_way" value="8" type="radio">微信支付</label>
						    		</div>

						    		<div class="clearfix"></div>
						    	</div>
						    	<div class="yhxz-div Hyzx-select" id="bank_location_row" style="display:none">
						    		<div class="tit-name">
						    			<span>所属分行:</span>
						    		</div>
						    		<div class="yn-img Hyzx-module">
						    			<select name="bank_location1" id="bank_location1"><option value="">--请选择省份--</option><option value="北京市">北京市</option><option value="天津市">天津市</option><option value="河北省">河北省</option><option value="山西省">山西省</option><option value="内蒙古自治区">内蒙古自治区</option><option value="辽宁省">辽宁省</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="上海市">上海市</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="安徽省">安徽省</option><option value="福建省">福建省</option><option value="江西省">江西省</option><option value="山东省">山东省</option><option value="河南省">河南省</option><option value="湖北省">湖北省</option><option value="湖南省">湖南省</option><option value="广东省">广东省</option><option value="广西壮族自治区">广西壮族自治区</option><option value="海南省">海南省</option><option value="重庆市">重庆市</option><option value="四川省">四川省</option><option value="贵州省">贵州省</option><option value="云南省">云南省</option><option value="西藏自治区">西藏自治区</option><option value="陕西省">陕西省</option><option value="甘肃省">甘肃省</option><option value="青海省">青海省</option><option value="宁夏回族自治区">宁夏回族自治区</option><option value="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="香港特别行政区">香港特别行政区</option><option value="澳门特别行政区">澳门特别行政区</option><option value="台湾省">台湾省</option><option value="其它">其它</option></select>
										<select name="bank_location2" id="bank_location2"><option value="">--请选择城市--</option></select>
										<input name="bank_location4" class="Hyzx-data" id="bank_location4" onkeyup="value=value.replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,&#39;&#39;)" size="20" type="text">
										(例：“广东省 佛山市 豪苑支行”)
						    		</div>

						    		<div class="clearfix"></div>
						    	</div>
						        <div class="Hyzx-zf-btn">
							        <p>1.请确实填写转账金额与时间。</p>
									<p>2.每笔转账请提交一次。</p>
									<p>3.若您使用ATM存款，请填写ATM所属分行，会加快您的款项到账时间。</p>
						        	<a href="javascript:;" class="btn-sub" id="confirm_submit">提交</a>
						        </div>
						    </div>
						</div>
						<script>
							var bank_arr = new Object();
							bank_arr = [{"id":"100","bank_name":"支付宝","state":"1","bank_url":"https:\/\/www.alipay.com","deposit_bank":"1","out_bank":"1"},{"id":"101","bank_name":"微信支付","state":"1","bank_url":"https:\/\/pay.weixin.qq.com","deposit_bank":"1","out_bank":"1"},{"id":"102","bank_name":"财付通","state":"1","bank_url":"https:\/\/www.tenpay.com","deposit_bank":"1","out_bank":"1"},{"id":"1","bank_name":"中国银行","state":"1","bank_url":"http:\/\/www.boc.cn","deposit_bank":"1","out_bank":"1"},{"id":"2","bank_name":"中国工商银行","state":"1","bank_url":"http:\/\/www.icbc.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"3","bank_name":"中国建设银行","state":"1","bank_url":"http:\/\/www.ccb.com","deposit_bank":"1","out_bank":"1"},{"id":"4","bank_name":"招商银行","state":"1","bank_url":"http:\/\/www.cmbchina.com","deposit_bank":"1","out_bank":"1"},{"id":"5","bank_name":"中国民生银行","state":"1","bank_url":"http:\/\/www.cmbc.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"7","bank_name":"中国交通银行","state":"1","bank_url":"http:\/\/www.bankcomm.com","deposit_bank":"1","out_bank":"1"},{"id":"8","bank_name":"中国邮政储蓄银行","state":"1","bank_url":"http:\/\/www.psbc.com","deposit_bank":"1","out_bank":"1"},{"id":"9","bank_name":"中国农业银行","state":"1","bank_url":"http:\/\/www.abchina.com","deposit_bank":"1","out_bank":"1"},{"id":"10","bank_name":"华夏银行","state":"1","bank_url":"http:\/\/www.hxb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"11","bank_name":"浦东发展银行","state":"1","bank_url":"http:\/\/www.spdb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"12","bank_name":"广州银行","state":"1","bank_url":"http:\/\/www.gzcb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"13","bank_name":"北京银行","state":"1","bank_url":"http:\/\/www.bankofbeijing.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"14","bank_name":"平安银行","state":"1","bank_url":"http:\/\/bank.pingan.com","deposit_bank":"1","out_bank":"1"},{"id":"15","bank_name":"杭州银行","state":"1","bank_url":"http:\/\/www.hzbank.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"16","bank_name":"温州银行","state":"1","bank_url":"http:\/\/www.wzcb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"17","bank_name":"中国光大银行","state":"1","bank_url":"http:\/\/www.cebbank.com","deposit_bank":"1","out_bank":"1"},{"id":"18","bank_name":"中信银行","state":"1","bank_url":"http:\/\/bank.ecitic.com","deposit_bank":"1","out_bank":"1"},{"id":"19","bank_name":"浙商银行","state":"1","bank_url":"http:\/\/www.cngold.org","deposit_bank":"1","out_bank":"1"},{"id":"20","bank_name":"汉口银行","state":"1","bank_url":"http:\/\/www.hkbchina.com","deposit_bank":"1","out_bank":"1"},{"id":"21","bank_name":"上海银行","state":"1","bank_url":"http:\/\/www.bankofshanghai.com","deposit_bank":"1","out_bank":"1"},{"id":"22","bank_name":"广发银行","state":"1","bank_url":"http:\/\/www.cgbchina.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"23","bank_name":"农村信用社","state":"1","bank_url":"http:\/\/www.nongshang.com","deposit_bank":"1","out_bank":"1"},{"id":"24","bank_name":"深圳发展银行","state":"1","bank_url":"http:\/\/www.sdb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"25","bank_name":"渤海银行","state":"1","bank_url":"http:\/\/www.cbhb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"26","bank_name":"东莞银行","state":"1","bank_url":"http:\/\/www.dongguanbank.cn","deposit_bank":"1","out_bank":"1"},{"id":"27","bank_name":"宁波银行","state":"1","bank_url":"http:\/\/www.nbcb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"28","bank_name":"东亚银行","state":"1","bank_url":"http:\/\/www.hkbea.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"29","bank_name":"晋商银行","state":"1","bank_url":"http:\/\/www.jshbank.com","deposit_bank":"1","out_bank":"1"},{"id":"30","bank_name":"南京银行","state":"1","bank_url":"http:\/\/www.njcb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"31","bank_name":"广州农商银行","state":"1","bank_url":"http:\/\/www.961111.cn","deposit_bank":"1","out_bank":"1"},{"id":"32","bank_name":"上海农商银行","state":"1","bank_url":"http:\/\/www.srcb.com","deposit_bank":"1","out_bank":"1"},{"id":"33","bank_name":"珠海农村信用合作联社","state":"1","bank_url":"http:\/\/17968841.1024sj.com","deposit_bank":"1","out_bank":"1"},{"id":"34","bank_name":"顺德农商银行","state":"1","bank_url":"http:\/\/www.sdebank.com","deposit_bank":"1","out_bank":"1"},{"id":"35","bank_name":"尧都区农村信用联社","state":"1","bank_url":"http:\/\/linfen02878.11467.com","deposit_bank":"1","out_bank":"1"},{"id":"36","bank_name":"浙江稠州商业银行","state":"1","bank_url":"http:\/\/www.czcb.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"37","bank_name":"北京农商银行","state":"1","bank_url":"http:\/\/www.bjrcb.com","deposit_bank":"1","out_bank":"1"},{"id":"38","bank_name":"重庆银行","state":"1","bank_url":"http:\/\/www.cqcbank.com","deposit_bank":"1","out_bank":"1"},{"id":"39","bank_name":"广西农村信用社","state":"1","bank_url":"http:\/\/www.gx966888.com","deposit_bank":"1","out_bank":"1"},{"id":"40","bank_name":"江苏银行","state":"1","bank_url":"http:\/\/www.jsbchina.cn","deposit_bank":"1","out_bank":"1"},{"id":"41","bank_name":"吉林银行","state":"1","bank_url":"http:\/\/www.jlbank.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"42","bank_name":"成都银行","state":"1","bank_url":"http:\/\/www.bocd.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"43","bank_name":"内蒙古银行","state":"1","bank_url":"http:\/\/www.boimc.com.cn\/","deposit_bank":"1","out_bank":"1"},{"id":"50","bank_name":"兴业银行","state":"1","bank_url":"http:\/\/www.cib.com.cn","deposit_bank":"1","out_bank":"1"},{"id":"65","bank_name":"农村商业银行","state":"1","bank_url":"#","deposit_bank":"1","out_bank":"1"},{"id":"103","bank_name":"中国银联","state":"1","bank_url":"http:\/\/cn.unionpay.com\/","deposit_bank":"1","out_bank":"1"},{"id":"104","bank_name":"大兴银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"105","bank_name":"花旗银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"106","bank_name":"永隆银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"107","bank_name":"汇丰银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"108","bank_name":"渣打银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"109","bank_name":"和讯银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"110","bank_name":"中国农商银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"111","bank_name":"荷兰银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"112","bank_name":"恒丰银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"113","bank_name":"德国商业银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"114","bank_name":"上海浦东","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"115","bank_name":"工商银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"116","bank_name":"交通银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"},{"id":"117","bank_name":"桂林银行","state":"1","bank_url":"javascript:void(0)","deposit_bank":"1","out_bank":"1"}];
							if (bank_arr == null) {
								$('#in-bank-img').html('<h4 style="color: red;">&nbsp;&nbsp;>_< 主人还未添加银行卡哟，请稍后再来吧···</h4>');
							}else if (bank_arr.length > 11) {
			    				var BankHtml = '';
				    			for (var i = 0; i < 11; i++) {
				    				BankHtml += '<div class="Hyzx-radio"'+
				    					' onclick="radioCheck($(this))">'+
				    					'<input name="bank_id" value="'+
				    					bank_arr[i].id+'" type="radio">'+
				    					'<div class="bank-logoimg">'+
				    					'<span title="'+bank_arr[i].bank_name+'" '+
				    					'class="class-'+bank_arr[i].id+'"></span>'+
				    					'</div></div>';
				    			}
				    			$(BankHtml).insertBefore($('#in-bank-img>#show-More'));
				    		}else{
				    			showMoreBank();
				    		}

			    			function showMoreBank() {
			    				var BankHtml = '';
			    				$.each(bank_arr,function(i, v) {
			    					BankHtml += '<div class="Hyzx-radio"'+
			    					' onclick="radioCheck($(this))">'+
			    					'<input name="bank_id" value="'+
			    					v.id+'" type="radio">'+
			    					'<div class="bank-logoimg">'+
			    					'<span title="'+v.bank_name+'" '+
			    					'class="class-'+v.id+'"></span>'+
			    					'</div></div>';
			    				});
			    				BankHtml += '<div id="show-More" onclick="showMoreBank()" style="display:none;"><div class="bank-logoimg"><span class="class-More"><b>＋</b>&nbsp;其他银行</span></div></div>';
			    				$('#in-bank-img').html(BankHtml);
			    				$.member.atHeight();
			    			};
							function radioCheck(Obj) {
								Obj.addClass('checked');
						  		Obj.siblings().removeClass('checked');
						  		Obj.find('input').prop("checked" , "true");
						  		Obj.siblings().find('input').removeAttr("checked" , "true");
						  		if (Obj.parent('div.yn-img').attr('id') == 'in-bank-img') {
						  			$('#show-More .class-More').html('<b>＋</b>&nbsp;其他银行');
						  			Obj.siblings('.Hyzx-radio').hide();
						  			$('#in-bank-img>#show-More').show();
						  			$.member.atHeight();
						  		}
							}
							var clip = new ZeroClipboard($('.d_clip_button'));
							clip.on('ready', function(){
								debugstr('Flash 已经准备完成。');
								this.on('aftercopy', function(event){
									alert(event.data['text/plain'])
									debugstr('已经复制剪贴板：' + event.data['text/plain']);
								});
							});

							clip.on('error', function(event){
								$('.demo-area').hide();
								debugstr('error[name="' + event.name + '"]: ' + event.message);
								ZeroClipboard.destroy();
							});
							function debugstr(text){
								$('#d_debug').append($('<p>').text(text));
							}


						  	$("input[name = 'deposit_way']").click(function(){
						  		if($(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4){
						  			$('#bank_location_row').show(200,function(){
										$.member.atHeight();
									})
						  		}else{
						  			$('#bank_location_row').hide(200,function(){
										$.member.atHeight();
									})
						  		}
						  	})

						  	$(".Hyzx-btn-show .Hyzx-radio").on('click',function(){
						  		$(".Hyzx-yhzh").show(200,function(){
									$.member.atHeight();
								});
						  		$(".khyh").text($(this).find("span").attr("title"));
						  		$('#fe_text_3').text($(this).find("span").attr('cardaddress'));
						  		$('#fe_text_4').text($(this).find("span").attr('cardusername'));
						  		$('#fe_text_6').text($(this).find("span").attr('cardid'));
								$.ajax({type: "POST",url: "/index.php/member/new/bank/GetOrderNum",success: function(msg){
										$('#fe_text_7').html(msg.replace(/[\r\n]/g,""));
									}
								})
						  	});
						  	$('#confirm_submit').on('click',function(){
						  		if(!confirm("是否确认提交？")){
									return false;
								}else{
							  		var deposit_num = $('#deposit_num').val();//存入金额
							  		if(deposit_num == '' || deposit_num == 0){
									    $.member.alertpop('prompt',"请填写您要支付的金额，而且不能为0!");
									    $('#deposit_num').focus();
									    return false;
									}
							  		var in_name = $('#in_name').val();//存款人姓名
							  		var in_date = $('#in_date').val();//存入时间
							  		var order_num = $('#fe_text_7').html();//订单号
							  		var bank_style = $("input[name = 'bank_id']:checked").val();//存款所用银行
							  		var bid = $("input[name = 'deposit_id']:checked").val();//收款银行
							  		var deposit_way= $("input[name = 'deposit_way']:checked").val();//存款方式
									var bank_location1 = $("#bank_location1").val();//所属分行 省
									var bank_location2 = $("#bank_location2").val();//所属分行
									var bank_location4 = $("#bank_location4").val();//所属分行

									if(in_name.length < 2){$.member.alertpop('',"姓名填写不正确！");return false;}
									//if(in_name.length > 10){$.member.alertpop('',"存款人姓名长度过长！");return false;}
									if(in_date==''){$.member.alertpop('',"存款时间不能为空！");return false;}
									if(!bank_style){$.member.alertpop('',"请选择存款所用银行！");return false;}
									if(!bid){$.member.alertpop('',"请选择收款银行！");return false;}
									if(!deposit_way){$.member.alertpop('',"请选择存入方式！");return false;}
									if(deposit_way==2||deposit_way==3||deposit_way==4){
										if($('#bank_location1').val()==''||$('#bank_location2').val()==''||$('#bank_location4').val()==''){
											$.member.alertpop('','请填写正确的银行讯息 ！');
											return false;
										}
									}
									$.ajax({
										type: "POST",
										url: "/index.php/member/new/bank/bank_ajax",
										dataType: "json",
										data: {action:"add_form",order_num:order_num,bank_style:bank_style,deposit_num:deposit_num,in_date:in_date,in_name:in_name,deposit_way:deposit_way,bank_location1:bank_location1,bank_location2:bank_location2,bank_location4:bank_location4,bid:bid
										},
										success:function(msg){
											if(msg.ok=="1"){
												$.member.alertpop('success',"提交申请成功，财务将在15分钟内为您加入额度，谢谢您!");
												/*$.member.changeNav('Transaction','transaction_bet_index',1);*/
												$.member.changeNav('Transaction','transaction_contacts_index',1);
											}else if(msg.statu==1){
												$.member.alertpop('',"存款金额超过该层级上限"+msg.infos+"！");
											}else if(msg.statu==2){
												$.member.alertpop('',"存款金额低于该层级下限"+msg.infos+"！");
											}else if(msg.statu==3){
												$.member.alertpop('',"操作非法。请联系客服人员");
											}else if(msg.statu==4){
												$.member.alertpop('',"试玩账号不允许存取款操作，请注册正式账号！");

											}else if(msg.statu==5){
												$.member.alertpop('',"演示站禁止出入款！");

											}else if(msg.statu==6){
												$.member.alertpop('',"数据异常，请刷新页面重试！");
											}else if(msg.statu==7){
												$.member.alertpop('',"存款人姓名长度过长！");

											}else{
												$.member.alertpop('',"存入失败！请联系客服！");
											}
										}
									});
								}

						  	})
						  	new PCAS("bank_location1","bank_location2");

					</script>
						</div>


					</div>

</div>    
    
</body>
</html>
