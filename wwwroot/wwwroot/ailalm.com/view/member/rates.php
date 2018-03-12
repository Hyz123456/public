<?php require_once 'header.php' ?>
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">通道管理</div>

                            </div>

							


							  

                                <div style="margin-top:10px" class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-table-bordered" id="example-r">
                                        <thead>
                                            <tr>
												<th>
													通道名称
												</th>
												<th>
													通道代码
												</th>
												
												<th>
													通道费率
												</th>
												<th>
													通道状态
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
                                                    <?php echo $val[ 'uprice']?>
                                                </td>
                                              
                                                <td>
                                                    <?php if($val[ 'is_state']=='0' ):?>

															<span  style="background-color: #5cb85c;" class="am-badge am-badge-success am-radius">正常</span>
                                                       
                                                            
                                                        
                                                        <?php else:?>

															<span class="am-badge am-badge-danger am-radius">关闭</span>
                                                           
                                                            
                                                            
                                                       <?php endif;?>
                                                </td>
                                            </tr>



										



                                            <?php endforeach;?>
                                                <?php endif;?>
								
                                           
                                        </tbody>
                                    </table>
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