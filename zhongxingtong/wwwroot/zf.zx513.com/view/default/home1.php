
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <meta name="keywords" content=" <?php echo $this->config['sitename']?>,第四方支付,支付解决方案,移动互联网计费专家，一站式提供国内外专业的计费解决方案。手游计费，O2O计费，一键支付，聚合支付" />
    <meta name="description" content=" <?php echo $this->config['sitename']?>是由扬州畅联网络科技有限公司推出的电子支付平台，致力于提供安全、便捷、专业、简单的第四方在线支付服务" />

    <title> <?php echo $this->config['sitename']?>111111111111111</title>
    <meta charset="utf-8" />
    <link href="/static/default/css/index.css" rel="stylesheet" type="text/css" />
    <link type="image/x-icon" rel="shortcut icon" href="/static/default/images/clwl.ico" />
    <link href="/static/default/css/jquery.fullPage.css" rel="stylesheet" />
    <script src="/static/default/js/jquery.min.js"></script>
    <script src="/static/default/js/jquery.fullPage.js"></script>


    <style>
        #fp-nav ul li a span, .fp-slidesNav ul li a span {
            top: 2px;
            left: 2px;
            width: 8px;
            height: 8px;
            border: 0px;
            background: RGB(194,194,194);
            border-radius: 50%;
            position: absolute;
            z-index: 1;
        }
        #fp-nav ul li:nth-child(1) a.active span {
            background-image: url("/static/default/images/滚动首屏@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }
        #fp-nav ul li:first-child a.active span {
            background-image: url("/static/default/images/滚动首屏@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }

        #fp-nav ul li:nth-child(2) a.active span {
            background-image: url("/static/default/images/滚动屏1@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }
        #fp-nav ul li:first-child + li .active span {
            background-image: url("/static/default/images/滚动屏1@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }

        #fp-nav ul li:nth-child(3) a.active span {
            background-image: url("/static/default/images/滚动屏2@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }
        #fp-nav ul li:first-child + li + li .active span {
            background-image: url("/static/default/images/滚动屏2@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }

        #fp-nav ul li:nth-child(4) a.active span {
            background-image: url("/static/default/images/serve@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }
        #fp-nav ul li:first-child + li + li + li a.active span {
            background-image: url("/static/default/images/serve@2x.png");
            width: 34px;
            height: 16px;
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }

        #fp-nav ul li:nth-child(5) a.active span {
            background-image: url("/static/default/images/滚动屏4@2x.png");
            width: 34px;
            height: 16px;
            background-color: rgba(0, 0, 0, 0);
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }
        #fp-nav ul li:first-child + li + li + li + li a.active span {
            background-image: url("/static/default/images/滚动屏4@2x.png");
            width: 34px;
            height: 16px;
            background-color: rgba(0, 0, 0, 0);
            filter:Alpha(opacity=50);/*IE8*/
            behavior: url("../styles/iecss3.htc");
            border-radius: 10px;
            margin-left: -13px;
        }
    </style>
    <script type="text/javascript">
        if (!window.jQuery) {
            document.write('<script type="text/javascript" src="/script/jquery.js"><' + '/script>');
        }
        if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))) {
            window.location.href = "/login";
        }
        $(function () {

            document.onkeydown = function (e) {
                var ev = document.all ? window.event : e;
                if (ev.keyCode == 13) {
                    $('#btn').click();
                }
            };

            $('#dowebok').fullpage({
                'navigation': true,
                'navigationPosition': 'right',
                'fullpage': 0
            });

            $('#logo').click(function () {
                $('#fp-nav li:nth-child(1) a').click();
            });


            $('#zz').click(function () {
                $('#zz').hide();
                $('#loginModal').hide();
            });

            $('.menus a').click(function () {
                $('.menus a').removeClass('active');
                var formid = $(this).attr('data-value');
                $(this).addClass('active');
                $('form').hide();
                $('#form' + formid).show();
            });
        });
    </script>
</head>
<body>
    <div class="fullC">
        <div class="CHeader">
            <a id="logo" href="javascript:;" class="logo pullLeft"></a>
            <div class="menu pullRight">
			  <?php if($this->session->get('login_username')):?>

                                    <li>
											<a rel="nofollow" href="/member" id="qc-btn">
                              
                                            进入商户中心
                                        </a>
                                    </li>
									
                                    <?php elseif($this->
                                        session->get('login_agentname')):?>
                                        <li>
											<a rel="nofollow" href="/agent" id="qc-btn">
                                             进入代理中心
                                            </a>
                                        </li>
                                        <?php else:?>
                                           
                                         
																						
                <a href="/login">登录</a>

                                 
										                <a href="/register">注册</a>
                                    
                                            <?php endif;?>

            </div>
            <div class="Tel400 pullRight">
                <div class="pullLeft"></div>
                <div style="width: 150px;">   <?php echo $this->config['qq']?></div>
            </div>
        </div>
    </div>
    <div id="dowebok">
        <div class="section">
            <div class="page1">
            </div>
        </div>

        <div class="section">
            <div class="page2">
                <div class="container">
                    <div class="title">
                        了解<?php echo $this->config['sitename']?>
                    </div>
                    <div class="subTitle">
                      <?php echo $this->config['sitename']?>，主要服务于互联网领域，为阅读、音乐 、视频、交友、教育、商城、PC游戏、网页游戏、手机游戏等应用提 供综合的收费平台。
                    </div>
                    <div class="images">
                    </div>
                </div>
            </div>

        </div>

        <div class="section">
            <div class="page3">
                <div class="container">
                    <div class="content pullLeft">
                        <div class="title">
                            稳定多样的支付通道
                        </div>
                        <div class="subTitle">
                            在互联网领域， <?php echo $this->config['sitename']?>凭借创新而务实的风格、领先的 技术、敏锐的市场预见力，聚合多种收费方式，打造行业品 牌影响力，根据客户的需求不断推出创新的产品，为促进行业的持续发展做出不懈努力。目前为商户提供的收费方式有 <font>微信扫码支付、支付宝扫码支付、网银支付、游戏充值卡支付、话费充值卡支付、微信WAP支付、支付宝WAP支付</font>等。
                        </div>
                    </div>
                    <div class="images pullRight">
                    </div>
                </div>
            </div>

        </div>

        <div class="section">
            <div class="page4">
                <div class="container">
                    <div class="title">
                        我们的优势
                    </div>
                    <div class="subTitle">
                        在这个注重分享的互联网时代，只有成就别人，才能成就自己。我们的目的是为商户提供更好的服务，让生意更容易。
                    </div>
                    <div class="list">
                        <div>
                            <ul>
                                <li><span></span><font>全天服务</font></li>
                                <li>提供7*24小时的客户服务</li>
                                <li>及时处理消费用户遇到的问题</li>
                                <li>客服QQ在线：800009668</li>
                                <li>客服热线电话：400-040-9668</li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li><span></span><font>BD服务</font></li>
                                <li>微信、企业QQ长期在线</li>
                                <li>随时随地为的客户服务</li>
                                <li>及时为客户处理遇到的问题</li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li><span></span><font>技术支持</font></li>
                                <li>提供技术支持对接支付接口</li>
                                <li>如官方接口升级畅付会自动更新</li>
                                <li>您不需要进行繁琐的开发与维护</li>
                                <li>及时处理突发事件，保证接口稳定</li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li><span></span><font>结算服务</font></li>
                                <li>周末和法定节假日均结算</li>
                                <li>T+0/T+1结算方式，资金结算快</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pullClear"></div>
                    <div class="lcTitle">
                        <img src="/static/default/images/接入流程icon@2x.png" /><span>接入流程</span>
                    </div>
                    <div class="lcImage">
                        <ul>
                            <li>
                                <a href="javascript:;"></a>
                            </li>
                            <li><div></div></li>
                            <li>
                                <a href="javascript:;"></a>
                            </li>
                            <li><div></div></li>
                            <li>
                                <a href="javascript:;"></a>
                            </li>
                            <li><div></div></li>
                            <li>
                                <a href="javascript:;"></a>
                            </li>
                            <li><div></div></li>
                            <li>
                                <a href="javascript:;"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="section">
            <div class="page5">
                <div class="container">
                    <div class="title">
                        合作伙伴
                    </div>
                    <ul>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                        <li>
                            <a href="javascript:;"></a>
                        </li>
                    </ul>
                    <div class="pullClear"></div>
                    <div class="image">
                        <div class="info">
                            <div class="infoLogo"></div>
                            <div class="infoMsg"></div>
                            <!--<ul>
                                <li>Company：扬州畅联网络科技有限公司</li>
                                <li>E-mail：hjc@yzch.net</li>
                                <li>Telephone：400-040-9668</li>
                                <li>Address：江苏省扬州市广陵区文昌中路112号曲江科技创业中心4楼</li>
                            </ul>-->
                        </div>
                    </div>
                    <div class="footer">
                        <div>
                             <?php echo $this->config['sitename']?>是扬州畅联网络科技有限公司专为商户提供收款服务支撑的平台
                        </div>
                        <div>
                                         <a href="http://www.miitbeian.gov.cn/" target="_blank" style="color: #7d7d7d;">
<?php echo $this->config['icpcode']?>
                </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="loginModal" class="modal" style="display: none;">
        <div class="mheader">
        </div>
        <div class="menus">
            <a href="javascript:;" data-value="1" class="active">主账户登录</a>
            <a href="javascript:;" data-value="2">子账户登录</a>
        </div>
        <div class="form">
            <form id="form1">
                <div class="controller">
                    <div class="btnIco">
                        <img src="/static/default/images/login_邮箱icon@2x.png" width="16" height="18" style="margin-left:17px; margin-top:13px;" />
                    </div>
                    <input id="userid" type="text" placeholder="请输入您的邮箱账号" />
                </div>
                <div class="controller">
                    <div class="btnIco">
                        <img src="/static/default/images/login_密码icon@2x.png" width="16" height="18" style="margin-left:17px; margin-top:13px;" />
                    </div>
                    <input id="pwd" type="password" placeholder="请输入密码" />
                </div>
                <div class="controller">
                    <input id="yzm" class="yzm pullLeft" type="text" placeholder="请输入验证码" style="border-radius: 6px; width: 170px; position: absolute;" />
                    <img alt="点击换一张" id="vcode" src="" class="pullRight" style="width: 100px; height: 47px; border-radius: 6px; border: 0px;" onclick="r()" />
                </div>
                <div class="controller">
                    <a id="btn" class="btn" href="javascript:;">登录</a>
                </div>
                <div class="controller">
                    <span class="tips">您还不是 <?php echo $this->config['sitename']?>的用户？</span><a class="reg" href="Reg.html">立即注册</a>
                </div>
            </form>
            <form id="form2" style="display: none;">
                <div class="controller">
                    <div class="btnIco">
                        <img src="/static/default/images/login_邮箱icon@2x.png" width="16" height="18" style="margin-left:17px; margin-top:13px;" />
                    </div>
                    <input id="userid2" type="text" placeholder="请输入您的邮箱账号" />
                </div>
                <div class="controller">
                    <div class="btnIco">
                        <img src="/static/default/images/子账户icon@2x.png" width="16" height="18" style="margin-left:17px; margin-top:13px;" />
                    </div>
                    <input id="subid2" type="text" placeholder="请输入您的子账号" />
                </div>
                <div class="controller">
                    <div class="btnIco">
                        <img src="/static/default/images/login_密码icon@2x.png" width="16" height="18" style="margin-left:17px; margin-top:13px;" />
                    </div>
                    <input id="pwd2" type="password" placeholder="请输入密码" />
                </div>
                <div class="controller">
                    <input id="yzm2" class="yzm pullLeft" type="text" placeholder="请输入验证码" style="border-radius: 6px; width: 170px; position: absolute;" />
                    <img alt="点击换一张" id="vcode2" class="pullRight" style="width: 100px; height: 47px; border-radius: 6px; border: 0px;" onclick="r()" />
                </div>
                <div class="controller">
                    <a id="btn2" class="btn" href="javascript:;">登录</a>
                </div>
                <div class="controller">
                    <span class="tips">您还不是 <?php echo $this->config['sitename']?>的用户？</span><a class="reg" href="Reg.html">立即注册</a>
                </div>
            </form>
        </div>
    </div>
    <div id="zz" class="zz" style="display: none;">
    </div>
    <!--<div class="upMenu">
        <a href="javascript:;">∧</a>
    </div>
    <div class="downMenu">
        <a href="javascript:;">∨</a>
    </div>-->


</body>
</html>
