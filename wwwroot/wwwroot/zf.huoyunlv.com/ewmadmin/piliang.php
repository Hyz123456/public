<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>批量添加二微码</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />


    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="http://tpl.amazeui.org/template/21/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="http://tpl.amazeui.org/template/21/admin/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="http://tpl.amazeui.org/template/21/admin/assets/css/app.css">
    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/jquery.min.js"></script>


</head>

<body data-type="widgets">
    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/theme.js"></script>
    <div class="am-g tpl-g">
   
      
      

        <!-- 内容区域 -->
        <div class="">


            <div class="">



                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">批量添加二微码</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="addpl.php" method="post"  target="_blank">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">APPID </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" name="appid" id="user-name" placeholder="请输入标题文字">
                                            <small>APPID</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">支付方式</label>
                                        <div class="am-u-sm-9">
												<label><input type="radio" name="zhifu" value="1" checked>支付宝</label>

												<label><input type="radio" name="zhifu" value="3">微信支付</label>

                                        </div>
                                    </div>

                                  
                                    <div class="am-form-group">
                                        <label for="user-intro" class="am-u-sm-3 am-form-label">二维码文本</label>
                                        <div class="am-u-sm-9">
                                            <textarea name="erweima" class="" rows="30" id="user-intro" placeholder="
											100.00,wxp://f2f1fmygW3o7Hf0iwqYhrW8bHx7Ak9lgPIWT
											100.01,wxp://f2f1fmygW3o7Hf0iwqYhrW8bHx7Ak9lgPIWT"></textarea>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

              


            </div>
        </div>
    </div>
    </div>
    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/amazeui.min.js"></script>
    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/amazeui.datatables.min.js"></script>
    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/dataTables.responsive.min.js"></script>
    <script src="http://tpl.amazeui.org/template/21/admin/assets/js/app.js"></script>



</body>

</html>