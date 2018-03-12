<?php require_once 'header.php' ?>
    <style>
        .main-content .right .content-box{padding:0}.index-content{padding:0 15px;}.index-content
        .left-border{border-left:1px solid #e1e1e1}.index-content>.row>.col-sm-6{border-bottom:
        1px solid #e1e1e1;padding:50px 25px 40px 35px;min-height:150px;}.index-content>.row>.col-sm-6:hover{background:
        #fafafa}.bf{font-size: 4em;color:#76C379}.bf1{font-size: 1.4em;color:#999}.bf2{font-size:
        2.3em;color:#E43D40}.bf3{font-size: 0.9em}.notice{border:1px solid #e1e1e1;border-bottom:
        0;border-top:0}.notice dl dd{line-height: 45px;padding:0 10px;border-bottom:
        1px solid #e1e1e1;background: #fff}.notice dl dd span{color:#999}.notice
        dl dd a{display: block}
    </style>
    <div class="col-md-10 right">
        <div class="cb-title">
            <span class="glyphicon glyphicon-th-list">
            </span>
            &nbsp;代理中心
        </div>
        <?php if($this->
            userData['is_state']=='0'):?>
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-info-sign">
                </span>
                &nbsp;您当前的账号状态为
                <span class="label label-danger">
                    未审核
                </span>
                ，请继续完善注册信息然后联系客服以便审核。
            </div>
            <?php endif;?>
                <div class="content-box" style="border-bottom:0">
                    <div class="index-content">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-sm-4">
                                    <span class="glyphicon glyphicon-user bf">
                                    </span>
                                </div>
                                <div class="col-sm-8">
                                    <p class="bf1">
                                        账户余额
                                    </p>
                                    <p class="bf2">
                                        <?php echo number_format($unpaid, '2', '.', '')?>
                                    </p>
                                    <p class="bf3">
                                        <a href="/agent/orders">
                                            查看订单
                                        </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6 left-border">
                                <div class="col-sm-4">
                                    <span class="glyphicon glyphicon-piggy-bank bf">
                                    </span>
                                </div>
                                <div class="col-sm-8">
                                    <p class="bf1">
                                        已付金额
                                    </p>
                                    <p class="bf2">
                                        <?php echo $this->userData['paid']?>
                                    </p>
                                    <p class="bf3">
                                        <a href="/agent/payments">
                                            结算记录
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-sm-4">
                                    <span class="glyphicon glyphicon-time bf">
                                    </span>
                                </div>
                                <div class="col-sm-8">
                                    <p class="bf1">
                                        今日交易
                                    </p>
                                    <p class="bf2">
                                        <?php echo $today_orders ?>
                                    </p>
                                    <p class="bf3">
                                        <a href="/agent/orders?fdate=<?php echo date('Y-m-d').' 00:00'?>">
                                            查看订单
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6 left-border">
                                <div class="col-sm-4">
                                    <span class="glyphicon glyphicon-usd bf">
                                    </span>
                                </div>
                                <div class="col-sm-8">
                                    <p class="bf1">
                                        今日收入
                                    </p>
                                    <p class="bf2">
                                        <?php echo $today_income ?>
                                    </p>
                                    <p class="bf3">
                                        <a href="/agent/count?day=1">
                                            收入统计
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="notice-content">
                    <div class="cb-title">
                        <span class="glyphicon glyphicon-bell">
                        </span>
                        &nbsp;系统公告
                    </div>
                    <div class="notice">
                        <dl>
                            <?php if($notice):?>
                                <?php foreach($notice as $key=>$val):?>
                                    <dd>
                                        <a href="javascript:;" onclick="showContent('系统公告','/agent/news/view/<?php echo $val['id']?>')">
                                            <span>
                                                [
                                                <?php echo date( 'm-d',$val[ 'addtime'])?>
                                                    ]
                                            </span>
                                            &nbsp;
                                            <?php echo $val[ 'title']?>
                                        </a>
                                    </dd>
                                    <?php endforeach;?>
                                        <?php else:?>
                                            <dd>
                                                no data.
                                            </dd>
                                            <?php endif;?>
                        </dl>
                    </div>
                </div>
    </div>
    <?php require_once 'footer.php' ?>