<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>商户注册 | 众兴通</title>

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">



	<link rel="stylesheet" href="/static/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/static/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/static/assets/css/app1.css">



    <link rel="stylesheet" type="text/css" href="/public/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/app.css">

    <script charset="utf-8" src="/public/lxb.js"></script>
	<script charset="utf-8" src="/public/v.js"></script>
	<script src="/public/hm.js"></script>




	<script type="text/javascript" src="/public/jquery-3.2.1.min.js"></script>
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
                <a href="/" class="navbar-brand"><img src="/public/icon-qiniu-with-title.png" alt="众兴通" title="众兴通"></a>
            </div>

            <nav class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" target="_blank">官网首页</a></li>
                    <li><a href="#" target="_blank">文档中心</a></li>
                   
                    <li><a class="btn btn-sm btn-primary" href="/login">登陆</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="main">

    <div style="background: #2d62aa;" class="container">


    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    


	<script src="/static/assets/app.js"></script>
	<script src="/static/assets/js/theme.js"></script>


	<style>

	.tpl-form-input{
	height:42px
	border-radius: 4px;
	}

	</style>
</head>

<div data-type="login">

	<div style="display:none" class="am-alert zhucec">
	
	</div>


    <div style="margin:0 auto;width:300px;margin-top:150px;" class="am-g tpl-g">
       
        <div style="" class="tpl-login">
            <div class="tpl-login-content">
              


                <form  action="/register/savetwo" autocomplete="off" class="form-ajax am-form tpl-form-line-form">


					<input type="hidden" name="token" value="<?php echo time()?>">
                   

                    <div class="form-group field-email">
						
						<input type="text" name="username" class="form-control" placeholder="用户名" maxlength="20" required>

                    </div>

					<div  class="form-group field-email">
                      
					<input type="password" name="userpass" class="form-control" placeholder="设置登录密码" maxlength="20" required>

                    </div>

                    <div class="form-group field-email">
                       <input type="password" name="cirmpwd" class="form-control" placeholder="确认登录密码" maxlength="20" required>
                    </div>


					 <div class="form-group field-email">

                        <input type="text" name="email" class="form-control" id="user-name" placeholder="邮箱">

                    </div>



					<div class="form-group field-email">
						<input type="text" name="phone" class="form-control" placeholder="手机号码" maxlength="11" required>
                    </div>


					<div class="form-group field-email">
						<input type="text" name="qq" class="form-control" placeholder="平台联系您用的QQ" maxlength="12" required>
                    </div>


					<div class="form-group field-email">


						<input type="text" name="sitename" class="form-control" placeholder="接入网站名称" maxlength="30" required>
						
                    </div>


					<div class="form-group field-email">


						<input type="text" name="siteurl" class="form-control" placeholder="接入网站URL" maxlength="30" required>
						
                    </div>


					<div class="form-group field-email">

						<div style="float:left">
						  <input type="text" name="chkcode" class="form-control" placeholder="验证码" maxlength="5" required>

						</div>
						<div>
                                            <div style="border-top:0;padding:0px 0;border-radius:3px;text-align:center">
                                                <img style="height:42px;width:105px" src="/chkcode" onclick="javascript:this.src=this.src+'?t=new Date().getTime()'"
                                                class="imgcode" style="cursor:pointer;">
                                            </div>
						</div>
                    </div>



                    <div style="display:none" class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" type="checkbox">
                        <label for="remember-me">
       
                        我已阅读并同意 <a href="javascript:;">《用户注册协议》</a> 
                         </label>

                    </div>






                    <div style="margin-top:50px" class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/static/assets/js/amazeui.min.js"></script>
    <script src="/static/assets/js/app.js"></script>

 </div> </div>

    <script type="text/javascript" src="/public/signin.js"></script>
  <div class="copyright">© 2017 众兴通 版权所有</div>
</div>

	<script src="/static/assets/js/amazeui.min.js"></script>
    <script src="/static/assets/js/app.js"></script>


</body></html>