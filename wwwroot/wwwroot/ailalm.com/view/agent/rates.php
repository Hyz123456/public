<?php require_once 'header.php' ?>
    <style>
        .table td{height: 50px}
    </style>
    <div class="col-md-10 right">
        <div class="cb-title">
            <span class="glyphicon glyphicon-th-list">
            </span>
            &nbsp;
            <?php echo $title?>
        </div>
        <?php if($this->
            userData['is_state']=='0'):?>
            <div class="alert alert-warning" style="margin-bottom:0">
                <span class="glyphicon glyphicon-info-sign">
                </span>
                &nbsp;您当前的账号状态为
                <span class="label label-danger">
                    未审核
                </span>
                ，请继续完善注册信息然后联系客服以便审核。
            </div>
            <?php endif;?>
                <div class="content-box">
                    <?php if($this->userData['is_state']=='0'):?>
                        <div class="text-center">
                            <a href="/agent/userinfo" class="btn btn-warning">
                                <span class="glyphicon glyphicon-circle-arrow-right">
                                </span>
                                &nbsp;继续完善注册信息
                            </a>
                        </div>
                        <?php else:?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            通道名称
                                        </th>
                                        <th>
                                            结算费率
                                        </th>
                                        <th>
                                            当前状态
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($userprice):?>
                                        <?php foreach($userprice as $key=>
                                            $val):?>
                                            <tr>
                                                <td>
                                                    <?php echo $val['name']?>
                                                </td>
                                                <td>
                                                    <?php echo $val['gprice']?>
                                                </td>
                                                <td>
                                                    <?php if($val['is_state']=='0' ):?>
                                                        <span class="label label-success">
                                                            <span class="glyphicon glyphicon-ok">
                                                            </span>
                                                        </span>
                                                        <?php else:?>
                                                            <span class="label label-danger">
                                                                <span class="glyphicon glyphicon-remove">
                                                                </span>
                                                            </span>
                                                            <?php endif;?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                                <?php endif;?>
                                </tbody>
                            </table>
                            <?php endif;?>
                </div>
    </div>
    <?php require_once 'footer.php' ?>