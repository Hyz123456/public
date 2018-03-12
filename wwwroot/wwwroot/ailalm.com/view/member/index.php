<?php require_once 'header.php' ?>
      <!-- 内容区域 -->
        <div class="tpl-content-wrapper">



            <div class="row-content am-cf">
                <div class="row  am-cf">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">今日收入</div>
                                <div class="widget-function am-fr">
                                    
                                </div>
                            </div>
                            <div class="widget-body am-fr">
                                <div class="am-fl">
                                    <div class="widget-fluctuation-period-text">
                                        ￥ <?php echo $today_income ?> 元
                                        <button  onclick="window.location.href='/member/takecash'" class="widget-fluctuation-tpl-btn">
										<i class="am-icon-calendar"></i> 提现 </button>
                                    </div>
                                </div>
                                <div class="am-fr am-cf">
                                    <div class="widget-fluctuation-description-amount text-success" am-cf>
                                       <?php echo $today_orders ?> 笔

                                    </div>
                                    <div class="widget-fluctuation-description-text am-text-right">
                                        今日交易
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                        <div class="widget widget-primary am-cf">
                            <div class="widget-statistic-header">
                                已付金额
                            </div>
                            <div class="widget-statistic-body">
                                <div class="widget-statistic-value">
                                    ￥<?php echo $this->userData['paid']?> 元
                                </div>
                                <div class="widget-statistic-description">
									历史提现金额
                                </div>
                                <span class="widget-statistic-icon am-icon-credit-card-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                        <div class="widget widget-purple am-cf">
                            <div class="widget-statistic-header">
								等待结算金额
                            </div>
                            <div class="widget-statistic-body">
                                <div class="widget-statistic-value">
                                    ￥0.00元
                                </div>
                                <div class="widget-statistic-description">
                                    暂无金额申请提现
                                </div>
                                <span class="widget-statistic-icon am-icon-support"></span>
                            </div>
                        </div>
                    </div>
                </div>

		<div style="margin-top:-5px;background-color: #fff;border:0px;color:#838FA1" class="am-alert am-alert-danger  ">

		<?php if($this->userData['is_state']=='0'):?>


				
													   <div class="alert alert-warning" style="margin-bottom:0;"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;
													&nbsp;您当前的账号状态为
													<span class="am-badge am-badge-warning am-radius">
													
														未审核
													</span>
													，请继续完善注册信息然后联系客服以便审核。
												</div>
												<?php else:?>

		

													<?php if($this->userData['ship_type']):?>
														   <div class="alert alert-warning" style="margin-bottom:0;">
														<span class="glyphicon glyphicon-info-sign"style="margin-left:30px;"></span>
												  
															&nbsp;您当前的账号结算周期为：
															<span class="am-badge am-badge-success am-radius">
																<?php echo $this->setConfig->shipCycle($this->userData['ship_cycle'])?>
															</span>
															&nbsp;&nbsp;进入申请结算才可以划入余额提现。
														</div>
					<?php endif;?>
				<?php endif;?>
		</div>

		 
           



          


                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-6">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">最近登录日志</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">
                                <div class="am-scrollable-horizontal ">
                                    <table width="100%" class="am-table am-table-compact am-text-nowrap tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                            <th class="text-center">
                                                                登陆时间
                                                            </th>
                                                            <th class="text-center">
                                                                登陆IP
                                                            </th>
                                                            <th class="text-center">
                                                                地区概要
                                                            </th>
                                                        </tr>
                                        </thead>
                                        <tbody>
														<?php if($lists):?>
																		<?php foreach($lists as $key=>$val):?>
																			<tr>
																				<td class="text-center">
																					<?php echo date( 'Y-m-d H:i:s',$val[ 'addtime'])?>
																				</td class="text-center">
																					  <td class="text-center">
																					<?php echo $val[ 'ip']?>
																				</td class="text-center">
																						 <td class="text-center">
																					<?php echo $val[ 'address']?>
																				</td>
																			</tr>
																			<?php endforeach;?>
																				<?php else:?>
														 <tr>    
																	 <td class="text-center" colspan="5">
																												<h5>
																												  暂无数据
																												</h5>
																											</td>
														<?php endif;?>
                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>




                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-6">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">结算记录TOP5</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">

                                <table width="100%" class="am-table am-table-compact tpl-table-black " id="example-r">
                                    <thead>
													 <tr>
                                                            <th class="text-center">
                                                                提交时间
                                                            </th>
                                                            <th class="text-center">
                                                                结算金额
                                                            </th>
                                                            <th class="text-center hidden-cx">
                                                                手续费
                                                            </th>
                                                            <th class="text-center">
                                                                结算模式
                                                            </th>
                                                           
                                                        </tr>
                                    </thead>
                                    <tbody>
											<?php if($payments):?>
														<?php foreach($payments as $key=>$val):switch($val['is_state']){case 0: $state='
															<span class="label label-warning">
																'.$this->setConfig->billState($val['is_state']).'
															</span>
															';break;case 1: $state='
															<span class="label label-success">
																'.$this->setConfig->billState($val['is_state']).'
															</span>
															';break;case 2: $state='
															<span class="label label-default">
																'.$this->setConfig->billState($val['is_state']).'</span>
															';break;case 3: $state='
															<span class="label label-danger">
																'.$this->setConfig->billState($val['is_state']).'</span>';break;}?>
															<tr>
																	<td class="text-center">
																	<?php echo date( 'm-d H:i:s',$val[ 'addtime'])?>
																</td>
												  
																<td class="text-center green">
																	<?php echo $val[ 'money']?>
																		<span class="gray">
																			元
																		</span>
																</td>
																 <td class="text-center">
																	<?php echo $val[ 'fee']?>
																		<span class="gray">
																			元
																		</span>
																</td>
													
																  <td class="text-center">
																	<?php echo $state ?>
																</td>
											  
															</tr>
															<?php endforeach;?>
																<?php else:?>
													 <tr>    
													 <td class="text-center" colspan="3">
																								<h5>
																									没有结算记录
																								</h5>
																							</td>
																						</tr>
                                    <?php endif;?>
                                        <!-- more data -->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>














                <div class="row am-cf">
                    <div class="am-u-sm-12 am-u-md-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">最新公告</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>






										<table width="100%" class="am-table am-table-compact am-text-nowrap tpl-table-black" id="example-r">
                                      
                                        <tbody>


										  <?php if($notice):?>
                                            <?php foreach($notice as $key=>$val):?>


                                            <tr onclick="showContent('系统公告','/member/news/view/<?php echo $val['id']?>')" class="gradeX">
                                                <td> <?php echo $val[ 'title']?></td>
                                              
                                                <td><?php echo date( 'm-d',$val[ 'addtime'])?></td>
                                               
                                            </tr>
                                            <?php endforeach;?>
                                            <?php else:?>
                                                        
                                          <?php endif;?>
                                            
                                            


                                            <!-- more data -->
                                        </tbody>
                                    </table>











                            
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

</body>

</html>