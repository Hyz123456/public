<?php
$status=$_GET['status'];
$customerid=$_GET['customerid'];
$sdorderno=$_GET['sdorderno'];
$total_fee=$_GET['total_fee'];
$paytype=$_GET['paytype'];
$sdpayno=$_GET['sdpayno'];
$remark=$_GET['remark'];
$sign=$_GET['sign'];

     
 
?>

    <!doctype html>
    <html>
        
        <head>
            <meta http-equiv="content-type" content="text/html;charset=utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>
                柒付云计费            </title>
            <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
            <link href="/static/common/bootstrap.min.css" type="text/css" rel="stylesheet">
            <style>
                html,body,div,p,span,ul,ol,dl,h1,h2,h3,h4,h5,h6{margin:0;padding: 0}body{font-family:
                微软雅黑,'Microsoft Yahei';background: #eee}ul,ol{list-style: none}img{border:
                0;outline: none}a{color:#6B6D6E}a:hover{color:#CD1C20;text-decoration:
                none}#header{background: #fff;border-bottom: 1px solid #ddd;height: 65px}#header
                .logo{line-height: 55px}#header .logo span{font-size: 1.4em;margin-left:
                10px;position: absolute;margin-top:4px;color:#337AB7}#main{margin-top:30px;}#main
                .content{background: #fff;border:1px solid #ddd;padding:40px 45px;;border-radius:
                3px}.paymoney{padding-top:20px}.bf{font-size:1.3em}.bf1{font-size: 2em;color:#CD1C20;letter-spacing:
                2px}.bf1 span{font-size: 0.5em;color:#6B6D6E}dl.payinfo dd{line-height:
                25px}.pay_list{padding-top:30px;padding-left:40px;padding-bottom:30px;border:1px
                solid #eee;border-top:0}.pay_list ul li img{border:1px solid #ddd}.pay_list
                ul li{float:left;margin:5px 45px 5px 0;cursor: pointer}.pay_list ul li
                img:hover{border:1px solid #CD1C20}.pay_list ul li.current img{border:1px
                solid #CD1C20}.pay img{border:1px solid #ddd}.select_pay{background: #337AB7;padding-top:5px;padding-left:20px}.select_pay
                ul li{float:left;margin-right:20px;color:#fff;line-height: 35px;cursor:
                pointer}.select_pay ul li.current{background:#fff;line-height: 40px;padding:0
                10px;border-top-left-radius: 3px;border-top-right-radius: 3px;color:#666}#footer{background:#263445;text-align:center;color:#8392A7;margin-top:30px;padding:20px
                0;}.red{color:#CD1C20}
            </style>
            <script src="/static/common/jquery-1.12.1.min.js" type="text/javascript">
            </script>
            <script src="/static/common/bootstrap.min.js" type="text/javascript">
            </script>
        </head>
        
        <body>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="logo">
                                <img src="/static/default/images/logo.png">
                                <span>
                                    收银台
                                </span>
                                </logo>
                            </div>
                        </div>
                        <div class="col-md-6 text-right" style="font-size:12px">
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=97781083&site=qq&menu=yes"
                            target="_blank" class="red">
                                <p style="margin-top:15px">
                                    柒付云计费客服：
                                        97781083                                </p>
                                <p>
                                    欺诈/洗钱/涉黄，请立即举报
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <dl class="payinfo">
                                            <dd class="bf">
                                                订单号：
                                                <span style="color:#CD1C20">
                                                  <?php echo $sdorderno ?>                                       </span>
                                            </dd>
                                            <dd>
                                                订单备注：
                                                <a href="http://1" target="_blank">
                                                                  <?php echo $remark ?>                                              </a>
                                            </dd>
                                            <dd>
                                                商户信息：
                                                               <?php echo $customerid ?>                                     </dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="paymoney bf1 text-right">
                                            &yen;
                                        total_fee                                               <span>
                                                    元
                                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="border-bottom:2px solid #337AB7">
                                            <div style="float:right;width:80px;background:#337AB7;text-align:center;color:#fff;line-height:30px">
                                                订单详情
                                            </div>
                                            <div style="clear:right">
                                            </div>
                                        </div>
                                    </div>
                         
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                              <?php      if($orders['status']=='1'){
            if($orders['status']=='1'){
            echo 'success';
        } else {
            echo 'fail';
        }
		?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            <div id="footer">
                &copy;2016&nbsp;
                柒付云计费&nbsp;版权所有&nbsp;
                    粤ICP备16008037号            </div>
          
        </body>
    
    </html>