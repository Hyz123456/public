<?php require_once 'header.php' ?>
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">订单管理</div>



								 <span style="margin-top:-20px;margin-bottom:20px;text-align:center;font-size:12px;">
                            提交订单数：
                            <span class="blue"> <?php echo $count['total_orders']?>
                            </span>
                            &nbsp;&nbsp;订单总金额：
                            <span class="blue">
                                &yen;
                                <?php echo number_format($count['total_money'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;已付订单数：
                            <span class="green"><?php echo $count['success_orders']?>
                            </span>
                            &nbsp;&nbsp;已付总金额：
                            <span class="green">&yen;<?php echo number_format($count['success_money'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;预计收入:<span class="green">&yen;<?php echo number_format($count['income_user'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;未付订单数：
                            <span class="red"> <?php echo $count['total_orders']-$count['success_orders'] ?>
                            </span>
                          未付总金额：
                            <span class="red">&yen;<?php echo number_format($count['total_money']-$count['success_money'],2, '.', '')?>
                            </span>
                            &nbsp;&nbsp;
                        </span>


                            </div>

							 <form method="get" class="form-inline m-b-xs" action="" method="get">

                            <div class="widget-body   am-avg-sm-12">

                                <div class="am-u-sm-12 am-u-md-2 am-u-lg-1">

										<select name="is_state" data-am-selected="{btnWidth: '100px',btnSize: 'sm'}">
											<option value="-1" <?php echo $search['is_state']=='-1' ? ' selected' : ''?>>全部
											</option>
											<option value="0" <?php echo $search['is_state']=='0' ? ' selected' : ''?>>未付款
											</option>
											<option value="1" <?php echo $search['is_state']=='1' ? ' selected' : ''?>>已付款
											</option>
										</select>
                                   
                                </div>

								
                                <div class="am-u-sm-12 am-u-md-2 am-u-lg-1">

										 <select data-am-selected="{btnWidth: '100px',btnSize: 'sm'}" name="accid">
											<option value="0">
												全部通道
											</option>
											<?php foreach($acc as $key=>
												$val):?>
												<option value="<?php echo $val['id']?>" <?php echo $val['id']==$search[
												'accid'] ? ' selected' : ''?>>
													<?php echo $val['name']?>
												</option>
												<?php endforeach;?>
										</select>
                                   
                                </div>

								
                                <div class="am-u-sm-12 am-u-md-2 am-u-lg-2">
										<div class="am-u-lg-12 am-input-group am-input-group-sm tpl-form-border-form cl-p">
											<input size="16" type="text" name="fdate" readonly required data-am-datepicker class="am-form-field" value="<?php echo $search['fdate']?>">
										</div> 
                                </div>

								<div class="am-u-sm-12 am-u-md-2 am-u-lg-2">
										<div class="am-u-lg-12 am-input-group am-input-group-sm tpl-form-border-form cl-p">
											<input size="16" type="text" name="tdate" readonly data-am-datepicker class="am-form-field" value="<?php echo $search['tdate']?>">
								
										</div> 
								</div>

                                <div class="am-u-sm-12 am-u-md-2 am-u-lg-2">

									<div class="am-u-lg-12 am-input-group am-input-group-sm tpl-form-border-form cl-p">
										<input type="text" class="am-form-field" name="sdorderno" placeholder="商户订单号" value="<?php echo $search['sdorderno']?>" size="15">
									</div>
                                </div>


								 <div class="am-u-sm-12 am-u-md-2 am-u-lg-2">

									<div class="am-u-lg-12 am-input-group am-input-group-sm tpl-form-border-form cl-p">
										 <input type="text" class="am-form-field" name="sdpayno" placeholder="平台订单号" value="<?php echo $search['sdpayno']?>" size="15">
									</div>
                                </div>

 
								 <div class="am-u-sm-12 am-u-md-2 am-u-lg-2">
										
									 <button type="submit" style="padding: 9px 15px;" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn"><i class="am-icon-search"></i> 立即查询</button>

                                </div>
                               </form>


							  

                                <div style="margin-top:10px" class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-table-bordered" id="example-r">
                                        <thead>
                                            <tr>
												<th>
													订单时间
												</th>
												<th>
													商户订单号
												</th>
												<th>
													平台订单号
												</th>
												<th>
													订单金额
												</th>
												<th>
													实付金额
												</th>
												<th>
													收入金额
												</th>
												<th>
													付款渠道
												</th>
												<th>
													订单状态
												</th>
												<th>
													通知状态
												</th>
												<th>
													通知
												</th>
											</tr>
                                        </thead>
                                        <tbody>


										 <?php if($lists):?>
                                <?php foreach($lists as $key=>$val):$orderinfo=$this->model()->select('remark')->from('orderinfo')->where(array('fields'=>'id=?','values'=>array($val['orderinfoid'])))->fetchRow();$remark=$orderinfo ? $orderinfo['remark'] : '-';$acc=$this->model()->select('name')->from('acc')->where(array('fields'=>'id=?','values'=>array($val['channelid'])))->fetchRow();$cname=$acc  ? $acc['name'] : '-';switch($val['is_state']){case 0: $state='
                                    <span style="background-color: #151717;" class="am-badge am-badge-warning am-radius">未付 </span>'; break;case 1: $state='<span style="background-color: #20F506;" class="am-badge am-badge-success am-radius"> 已付 </span>'; break;case 2: $state=' <span class="label label-danger">冻结</span>'; break;default:$state='-';}$notifyMsg='-';$notify=$this->model()->select('is_status')->from('ordernotify')->where(array('fields'=>'orid=?','values'=>array($val['id'])))->fetchRow();if($notify){switch($notify['is_status']){case '0': $notifyMsg='<span style="background-color: #151717;" class="am-badge am-badge-warning am-radius">等待 </span>'; break;case '1': $notifyMsg=' <span  style="background-color: #20F506;" class="am-badge am-badge-success am-radius">成功 </span>'; break;case '2': $notifyMsg='
                                    <span class="am-badge am-badge-danger am-radius">失败</span>'; break;}}?>
                                    <tr class="gradeX">
                                        <td class="text-center blue">
                                            <?php echo date( 'm-d H:i:s',$val['addtime'])?>
                                        </td>
                                             <td class="text-center ">
                                            <?php echo $val['sdorderno']?>
                                                <br>
                                                <span class="gray">
                                                    <?php echo $remark ?>
                                                </span>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $val['orderid']?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $val['total_fee']?>
                                        </td>
                                        <td class="text-center green">
                                            <?php echo $val['realmoney']?>
                                        </td>
                                        <td class="text-center green">
                                            <?php echo $val['realmoney']*$val['uprice']?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $cname ?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $state ?>
                                        </td>
                                             <td class="text-center">
                                            <?php echo $notifyMsg ?>
                                        </td>
                                             <td class="text-center">
                                            <a href="javascript:;" onclick="refresh('<?php echo $val['orderid']?>')">
                                                <span class="am-icon-refresh" data-toggle="tooltip" title="通知">
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                        <?php else:?>
                                              <tr>
                                                    <td class="text-center" colspan="10">
                                                        <h4>
                                                            暂无记录
                                                        </h4>
                                                    </td>
                                                </tr>
                                            <?php endif;?>
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="am-u-lg-12 am-cf">

                                   	 <?php if($lists):?>

                                    <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">


											<?php echo $pagelist ?>
                                            
                                        </ul>
                                    </div>

									<?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="/static/assets/js/amazeui.min.js"></script>
    <script src="/static/assets/js/amazeui.datatables.min.js"></script>
    <script src="/static/assets/js/dataTables.responsive.min.js"></script>
    <script src="/static/assets/js/app.js"></script>
 <script>
        function refresh(sdpayno) {
            $.post('/member/orders/refresh', {
                sdpayno: sdpayno,
                t: new Date().getTime()
            },
            function(ret) {
                alert(ret);
            });
        }
    </script>
</body>

</html>