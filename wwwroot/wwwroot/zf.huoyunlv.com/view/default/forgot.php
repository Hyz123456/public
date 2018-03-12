<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>忘记密码 | 中付宝</title>

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="stylesheet" type="text/css" href="/public/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/app.css">

   

    <script charset="utf-8" src="/public/lxb.js"></script><script charset="utf-8" src="/public/v.js"></script><script src="/public/hm.js"></script><script type="text/javascript" src="/public/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/base.js"></script>

   
</head>

<body>

    <header class="navbar navbar-default navbar-static-top" id="top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button aria-controls="bs-navbar" aria-expanded="false" class="collapsed navbar-toggle" data-target="#bs-navbar" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand"><img src="/public/icon-qiniu-with-title.png" alt="中付宝" title="中付宝"></a>
            </div>

            <nav class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" target="_blank">官网首页</a></li>
                    <li><a href="#" target="_blank">文档中心</a></li>
                   
                    <li><a class="btn btn-sm btn-primary" href="/register">注册</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="main">

    <div style="background: #2d62aa;" class="container">
        <div class="form">


		<form action="/forgot/send" class="form-ajax am-form tpl-form-line-form" method="post">

            <div id="notice">
                <div id="notice">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" id="close_alert"><span>×</span></button>
                    <div class="message"></div>
                </div>
            </div>

            </div>

            <div class="form-group field-email">
                <input class="form-control" type="text" id="email" name="username" placeholder="用户名" autofocus="" autocomplete="false" required="">
                <span class="help-block">请输入用户名</span>
            </div>


			<div class="form-group field-email">
                <input class="form-control" type="text" id="email" name="username" placeholder="邮箱账号" autofocus="" autocomplete="false" required="">
                <span class="help-block">邮箱账号</span>
            </div>

			

           

            <div class="form-group field-captcha captcha-div " id="captcha-div">
                <div class="input-group">
                    <input class="form-control" type="text" name="chkcode" id="captcha" placeholder="请输入右边图片验证码">
                    <div style="background-color: #fff;" class="input-group-addon">
                        <img src="/chkcode" alt=""  onclick="javascript:this.src=this.src+'?t=new Date().getTime()'" style="cursor:pointer;" id="captcha-image">
                    </div>
                </div>
                <span class="help-block">验证码不能为空</span>
            </div>

            <button id="<em>login-button</em>" type="submit" class="btn btn-primary btn-emphasis btn-block submit-btn">发送邮件</button>
			<input id="remember-me" type="checkbox" style="display:none" name="kl" value="yes" checked>
        </div>

		</form>
    </div>

    <script type="text/javascript" src="/public/signin.js"></script>
  <div class="copyright">© 2017 中付宝 版权所有</div>
</div>

	<script src="/static/assets/js/amazeui.min.js"></script>
    <script src="/static/assets/js/app.js"></script>


</body></html>