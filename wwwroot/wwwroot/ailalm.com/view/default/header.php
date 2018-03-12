<!doctype html>
<html lang="zh-CN">
    
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo isset($title) ? $title. '-' : '' ?>
                <?php echo $this->config['sitename']?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
        <meta name="renderer" content="webkit">

		<link href="/static/common/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="/static/common/css/font-awesome.min.css" rel="stylesheet">
        <link href="/static/member/jquery-ui.css" rel="stylesheet">
        <link href="/static/member/style.css" rel="stylesheet">
		<link href="/static/common/datetimepicker.min.css" type="text/css" rel="stylesheet">
        <script src="/static/common/jquery-1.12.1.min.js" type="text/javascript">
        </script>
        <script src="/static/common/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="/static/common/jquery.zclip.min.js" type="text/javascript">
        </script>
        <script src="/static/common/datetimepicker.min.js" type="text/javascript">
        </script>
        <script src="/static/member/app.js" type="text/javascript">
        </script>
		
    </head>
    
    <body>
	 <div style="position:absolute;left:40%">
            <div class="woody-prompt">
                <div class="prompt-error alert alert-danger">
                </div>
            </div>
        </div>
	
        <div class="pace pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99"
            style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner">
                </div>
            </div>
            <div class="pace-activity">
            </div>
        </div>
        <style type="text/css">
            .navbar-default .nav li{ border-top: 1px solid #37414b; border-bottom:
            1px solid #1f262d; border-left: 4px solid #2f4050; } .navbar-default .nav
            li a{ padding: 10px 45px; } .navbar-default .nav li a .fa { width: 1.2em;
            color: inherit; font-size: 14px; } .navbar-default .nav-heading{ padding:
            10px 25px; color: #A7B1C2; } .navbar-default .nav li:hover, .navbar-default
            .nav li:focus{ border-left: 4px solid #293846; } .navbar-default .nav li.active{
            border-left: 0; } .navbar-default .nav li.active a{ border-left: 4px solid
            #19aa8d; } .navbar-default .nav li.nav-heading:hover, .navbar-default .nav
            li.nav-heading:focus { border-left: 4px solid #2F4050; } body.mini-navbar
            .navbar-default .nav li.nav-heading{ display: none; } body.mini-navbar
            .navbar-static-side { width: 90px; } body.mini-navbar #page-wrapper { margin:
            0 0 0 90px; }
        </style>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
					 <?php $current=isset($this->action[1]) ? $this->action[1] : '';?>
                        <li class="nav-header">
                            <div class="dropdown profile-element text-center">
                                <span>
                                         <img alt="image" class="img-circle" src="/static/member/images/logo.png" style="width:120px;height:120px;border-radius:12px;">
                           <!--   -->
                                </span>
                            </div>
                            <div class="logo-element">
                                <?php echo $this->config['sitename']?>
                            </div>
                        </li>
                <li<?php echo $current=='' ? ' class="active"' : ''?>
                                    >
                                    <a href="/member">
                                    <span class="nav-label">
                                    <i class="fa fa-home">
                                    </i>
                                    帐户首页
                                </span></a>
								</li>
                                    <li<?php echo $current=='userinfo' ? ' class="active"' : ''?>
                                        >
                                        <a href="/member/userinfo">
                                     <span class="nav-label">
                                    <i class="fa fa-newspaper-o">
                                    </i>
                                基本资料
                                </span></a>
                                        </li>
                                        <li<?php echo $current=='userpwd' ? ' class="active"' : ''?>
                                            >
                                            <a href="/member/userpwd">
                                                                  <span class="nav-label">
                                    <i class="fa fa-unlock-alt">
                                    </i>
                                              修改密码
                                           </span></a>
                                            </li>
                                            <li<?php echo $current=='payments' ? ' class="active"' : ''?>
                                                >
                                                <a href="/member/payments">
                                                     <span class="nav-label">
                                    <i class="fa fa-calendar-check-o">
                                    </i>
                                    结算记录
                                </span>
                            </a>
                                                </li>
                                                <li<?php echo $current=='orders' ? ' class="active"' : ''?>
                                                    >
                                                    <a href="/member/orders">
                                                 <span class="nav-label">
										   <i class="fa fa-line-chart">
                                    </i>
												       交易记录
													</span>
														</a>
                                                    <li<?php echo $current=='count' ? ' class="active"' : ''?>>
                                                        <a href="/member/count">
                          
                                                          <span class="nav-label">
												<i class="fa fa-server"></i>
												收益统计
													</span>
														</a>
                                                        </li>
                                                        <li<?php echo $current=='ordersca' ? ' class="active"' : ''?>
                                                            >
                                                            <a href="/member/ordersca">
                                                                     <span class="nav-label">
                                    <i class="fa fa-calculator">
                                    </i>
                                    通道统计
                                </span></a>
                                                     </li>
                                                            <?php if($this->userData['is_takecash']):?>
                                                                <li<?php echo $current=='takecash' ? ' class="active"' : ''?>>
                                                                    <a href="/member/takecash">
                                                                                        <span class="nav-label">
                                    <i class="fa fa-calendar-check-o">
                                    </i>
                                                                        申请提现
																		</span>
                                                                    </a>
                                                                    </li>
                                                                    <?php endif;?>
                                                                        <li <?php echo $current=='rates' ? ' class="active"' : ''?>>
                                                                            <a href="/member/rates">
                                                                                                    <span class="nav-label">
																				<i class="fa fa-map-signs">
																				</i>
																				我的费率
																			</span>
																		</a>
                                                                            </li>
                                                                            <li <?php echo $current=='api' ? ' class="active"' : ''?>>
                                                                                <a href="/member/api">
                                                                                                    <span class="nav-label">
																				<i class="fa fa-wrench">
																				</i>
                                                                                   接入信息
                                                                              	</span>
																		</a>
                                                                                </li>
                                                                                <li <?php echo $current=='userlogs' ? ' class="active"' : ''?>>
                                                                                    <a href="/member/userlogs">
                                                                                       <span class="nav-label">
																					<i class="fa fa-building-o">
																					</i>
																					登陆日志
																				</span>
                                                                                    </a>
                                                                                </li>
                                                                              
                    </ul>
                </div>
            </nav>
<div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0);">
                                <i class="fa fa-bars">
                                </i>
                            </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                 
                            <li class="dropdown">
                                   <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user">
                                </span>
                                &nbsp;
                                <?php echo  $_SESSION[ 'login_username']?>&nbsp;
                                   
                            </a>
                            </li>
                            <li>
                                <a href="/login/logout">
                                    <i class="fa fa-sign-out">
                                    </i>
                                    退出登录
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
				
				
	