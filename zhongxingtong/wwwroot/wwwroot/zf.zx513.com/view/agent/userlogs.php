<?php require_once 'header.php' ?>
    <div class="col-md-10 right">
        <div class="cb-title">
            <span class="glyphicon glyphicon-th-list">
            </span>
            &nbsp;
            <?php echo $title ?>
        </div>
        <div class="alert alert-warning" style="margin-bottom:0;border:1px solid #ddd">
            <span class="glyphicon glyphicon-info-sign">
            </span>
            &nbsp;当前显示7天内的登录日志
        </div>
        <div class="content-box">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            登录日期
                        </th>
                        <th>
                            IP
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lists):?>
                        <?php foreach($lists as $key=>$val):?>
                            <tr>
                                <td>
                                    <?php echo date( 'Y-m-d H:i:s',$val[ 'addtime'])?>
                                </td>
                                <td>
                                    <?php echo $val[ 'ip']?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="2">
                                            no data.
                                        </td>
                                    </tr>
                                    <?php endif;?>
                </tbody>
            </table>
            <?php if($lists):?>
                <div style="float:right">
                    <?php echo $pagelist ?>
                </div>
                <br>
                <br>
                <?php endif;?>
        </div>
    </div>
    <?php require_once 'footer.php' ?>