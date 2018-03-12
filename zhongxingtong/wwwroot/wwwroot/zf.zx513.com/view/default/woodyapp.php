            <link href="/static/common/bootstrap.min.css" type="text/css" rel="stylesheet">
    <style>
        .v-line{color:#999;font-size:12px;margin:0 10px}
    </style>
    <section class="main-info" style="padding-top:100px">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-info-sign">
                            </span>
                            &nbsp;操作提示
                        </div>
                        <div class="panel-body text-center" style="padding:50px 0">
                            <?php echo isset($msg) ? $msg : '未找到内容' ?>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="/">
                                返回首页
                            </a>
                            <span class="v-line">
                                |
                            </span>
                            <a href="<?php echo isset($url) ? $url : $this->req->server('HTTP_REFERER') ?>">
                                返回上页
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    
    </html>