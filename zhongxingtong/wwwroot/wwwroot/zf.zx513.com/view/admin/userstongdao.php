    <?php require_once 'header.php' ?>
 <div class="row wrapper wrapper-content">
            <div class="row">
                <div class="col-md-12">
                                           <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <em class="fa fa-list">
                                    </em>
									 <?php echo $user['username']?>-通道管理
                                </div>
                            </div>
                       
							
							
       
        <?php if($user['is_state']=='0'):?>
            <div class="alert alert-warning" style="margin-bottom:0;">
                <span class="glyphicon glyphicon-info-sign">
                </span>
                &nbsp;账号状态
                <span class="label label-danger">
                    未审核
                </span>
            </div>
            <?php endif;?>
			 <div class="panel-body">
                <div class="content-box">
                    <?php if($user['is_state']=='0'):?>
                        <div class="text-center">
                           
                                <span class="glyphicon glyphicon-circle-arrow-right">
                                </span>
                                &nbsp;开通账号后才可以管理通道
                          
                        </div>
                        <?php else:?>
						     <div class="panel-body">
						<div class="table-responsive">
                                        <table class="table table-bordered">
										                                <thead>
                                    <tr>
                                        <th>
                                            通道名称
                                        </th>
										<th>
                                            通道编号
                                        </th>
										 <th>
                                            接入商
                                        </th>
										 <th>
                                            保存
                                        </th>
                                        <th>
                                            结算费率
                                        </th>
                                        <th>
                                            当前状态
                                        </th>
                                        <th>
                                            操作
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($userprice):?>
                                        <?php foreach($userprice as $key=>$val):?>
                                            <tr>
                                                <td>

                                                    <?php echo $val[ 'name']?>
                                                </td>


												<td><?php echo $shuzu[$key]['acw']?></td>
												
															<td>
																<select id="acpcode-<?php echo $shuzu[$key]['id']?>" name="acpcode-<?php echo $shuzu[$key]['id']?>" class="form-control">

															<?php 

															
															
															foreach($shuzu[$key]['acwid'] as $ddd=>$aaa):?>
															
																	<?php
																	//print_r($val);
																	//print_r($aaa);

																	if ($val['aclid']=="0"){

																		$acpcode=$val['acpcode'];
																	
																	}else{

																		$acpcode=$val['aclid'];

																	}

																	if ($acpcode == $aaa[ 'acpcode']){
																	?>

																			<option value="<?php echo $aaa[ 'acpcode']?>" selected="selected"><?php echo $aaa[ 'name']?></option>


																	<?php 
																	
																		}
																		else
																		{
																	
																	?>

																			<option value="<?php echo $aaa[ 'acpcode']?>"><?php echo $aaa[ 'name']?></option>
																	<?php 
																	
																		}
																	
																	?>
																

															<?php endforeach;?>

															 </select>


															 

															</td>
												<td>					
													
													<a href="javascript:;" onclick="td(<?php echo $val['id']?>,'<?php echo $acpcode?>')" class="btn btn-default btn-sm">
                                                            保存设置
                                                    </a>
												</td>
													


                                                <td>
                                                    <?php echo $val[ 'uprice']?>
                                                </td>
                                                <td class="label<?php echo $val['id']?>">
                                                    <?php if($val[ 'is_state']=='0' ):?>
                                                        <span class="label label-success">
                                                  		           <i class="fa fa-check-circle"></i>
                                                        </span>
                                                        <?php else:?>
                                                            <span class="label label-danger">
                                            		<i class="fa fa-times-circle"></i>
                                                            </span>
                                                            <?php endif;?>
                                                </td>
                                                <td class="btn<?php echo $val['id']?>">
                                                    <?php if($val[ 'is_state']=='0' ):?>
                                                        <a href="javascript:;" onclick="op(<?php echo $val['id']?>,<?php echo $val['userid']?>)" class="btn btn-default btn-sm">
                                                            关闭
                                                        </a>
                                                        <?php else:?>
                                                            <a href="javascript:;" onclick="op(<?php echo $val['id']?>,<?php echo $val['userid']?>)" class="btn btn-default btn-sm">
                                                                打开
                                                            </a>
                                                         <?php endif;?>





                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                                <?php endif;?>
                                </tbody>
                            </table>
							</div>
                            <?php endif;?>
                </div>
    </div>  
	</div>
	   </div>
	   	   </div>
		   	   </div>
			    </div>



    <?php require_once 'footer.php' ?>