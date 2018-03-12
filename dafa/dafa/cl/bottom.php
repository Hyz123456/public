<?php 
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/website.php");
?>
		   <link rel="stylesheet" href="/cl/css.css">
<link type="text/css" rel="stylesheet" href="/cl/layer.css" id="skinlayercss">
    <link href="css/bcss.css" rel="stylesheet" type="text/css" />
    <link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        body{
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            font-size: 12px;
            color: #ffffff;
        }
    </style>

    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
    <script language="javascript" type="text/javascript" src="/js/DD_belatedPNG.js"></script>
    <script language="javascript" type="text/javascript">

//        var Sys = {};
//        var ua = navigator.userAgent.toLowerCase();
//        if (window.ActiveXObject)
//            Sys.ie = ua.match(/msie ([\d.]+)/)[1]
//        else if (document.getBoxObjectFor)
//            Sys.firefox = ua.match(/firefox\/([\d.]+)/)[1]
//        else if (window.MessageEvent && !document.getBoxObjectFor)
//            Sys.chrome = ua.match(/chrome\/([\d.]+)/)[1]
//        else if (window.opera)
//            Sys.opera = ua.match(/opera.([\d.]+)/)[1]
//        else if (window.openDatabase)
//            Sys.safari = ua.match(/version\/([\d.]+)/)[1];



        function myfun()
        {
//            var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
//            if(Sys.ie && document.body.clientWidth>1000){
//                var left_blank = (document.body.clientWidth-1000)/2;
//                $("#footer").css('margin-left', left_blank.toString()+'px');
//            }
            //以下进行测试
//        if(Sys.ie) document.write('IE: '+Sys.ie);
//        if(Sys.firefox) document.write('Firefox: '+Sys.firefox);
//        if(Sys.chrome) 1=1;
//        if(Sys.opera) document.write('Opera: '+Sys.opera);
//        if(Sys.safari) document.write('Safari: '+Sys.safari);
        }
        /*用window.onload调用myfun()*/
//        window.onload=myfun;//不要括号
//
//        jQuery(window).resize(myfun);

    </script>
<body style="background:transparent;">
<center>


	


 <script type="text/javascript" src="layer.min.js"></script>
    <script src="jquery.cookie.js" type="text/javascript"></script>
	
	
    <script type="text/javascript">
        //弹窗
        function trclickevent(notice) {
            var pageii = $.layer({
                type: 1,
                shade: [0.6, '#000'],
                area: ['auto', 'auto'],
                bgcolor: '#FEEEBD',
                border: [10, 1, '#FEEEBD', true],
                title: [notice, 'background:#817865;border:1px #494437 solid;border-radius:10px;width:610px;color:#fff;'],
                page: { dom: '#js-notice-pop' }
            });
            $("#closePage").on("click", function () {
                layer.close(pageii);
            });
        }
        $(function () {
            var MidImage = $.cookie("MidImage");
            if (isNaN(MidImage) || MidImage == null || MidImage == "") {
                $.post("/app/member/login.ashx?act=midmanager", "", function (da) {
                    var data = eval("(" + da + ")");
                    if (data.errcode == 0) {
                        if (data.MidStart == 1) {
                            if (data.MidType == "text") {
                                var texts = strReplade(data.MidText);
                                $("#divMakeLiveContent").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + texts);
                                $("#divMakeLiveContent").show();
                                $("#MidImageUrl").hide();
                            }
                            else {
                                $("#MidImageUrl").attr("src", data.MidImage);
                                $("#MidImageUrl").show();
                                $("#divMakeLiveContent").hide();
                            }
                            trclickevent(data.MidDesc);
                        }
                    }
                    $.cookie("MidImage", 1);
                });
            }
        });
        function strReplade(str) {
            str = str.replace(/[$]/g, "<br/>");
            for (var i = 0; i < 50; i++) {
                var url = str.substring(str.indexOf('*') + 1, str.indexOf('#'));
                str = str.replace(url, "");
                var title = str.substring(str.indexOf('[') + 1, str.indexOf(']'));
                str = str.replace('[' + title + ']', '');
                str = str.replace("&", "<a target=_blank style='color:blue;font-size:15px;' href='" + url + "'>");
                str = str.replace("#", title + "</a>");
            }
            str = str.replace(/[kg]/g, "&nbsp;");
            return str;
        }
    </script>
    <script>
        $(function () {
            // 最新消息跑馬燈
            $.ajax({
                type: 'POST',
                url: '/app/member/Message.ashx?act=NewInfo',
                data: {},
                cache: false,
                error: function () { return false; },
                success: function (data) {
                    data = $.parseJSON(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        //html += '[';
                        //html += data[i].time;
                        //html += '] ';
                        html += data[i].report_content;
                        html += '&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                    $("#messageSpan").html(html);

                }
            });
        });
    </script>
	    <script>

 

    </script>
    <div style="display: none;" id="js-notice-pop">
        <div style="padding: 8px 6px;">
            <div style="width: 600px; height: 311px;">
                <img style="width: 600px; height: 310px;" id="MidImageUrl" src="" onClick="window.open(&#39;/cl/LiveCasino.aspx?sw=1&#39;,&#39;mem_index&#39;)">
                <p id="divMakeLiveContent" style="font-size: 16px; line-height: 28px; color: #000"></p>
            </div>
            <div style="width: 600px; height: 40px; padding-top: 6px;">
                <hr>
                <a id="closePage" href="javascript:void(0)" style="display: block; width: 55px; height: 30px; background: url(/home/images/close1.png); float: right;"></a>
            </div>
        </div>
    </div>


    
    
<script language="javascript" type="text/javascript" src="jquery-ui.js"></script>
<script type="text/javascript" src="homepg.js"></script>
<div style="clear: both;"></div>
<!--底-->



<!-- 底部开始 -->
<div class="footer">
    <div class="inner">
      <div class="fimg tac">
        <a 1onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" style="display:block;padding: 15px 0;height: 59px;">
             <img src="/imgs/fimg.jpg">
        </a>
      </div>
      <div class="fnav">
                <a href="javascript:click_url('/app/member/help/dlhz1.php');" class="js-article-color">关于我们&nbsp;|</a>
                <a href="javascript:click_url('/app/member/help/dlhz2.php');" class="js-article-color">联系我们&nbsp;|</a>
                <a href="javascript:click_url('/app/member/help/dlhz3.php');" class="js-article-color">代理合作&nbsp;|</a>
                <a href="javascript:click_url('/app/member/help/dlhz4.php');" class="js-article-color">存款帮助&nbsp;|</a>
                <a href="javascript:click_url('/app/member/help/dlhz5.php');" class="js-article-color">取款帮助&nbsp;|</a>
                <a href="javascript:click_url('/app/member/help/dlhz6.php');" class="js-article-color">常见问题&nbsp;|</a>
        <br>
        Copyrights (c) <?=$web_site["web_name"]?> Reserved
      </div>
    </div>
  </div>
  <style>
.footer{
    background:#222;
    padding-bottom:12px;
}
.fnav {
    text-align:center;
    color:#decaa7;
    font-size:12px;
}
.fnav a{
    color:#decaa7;
    padding:0px 6px;
}
.fnav a:hover{
    text-decoration:underline;
}

.huang{
    color:#f1f400;
}
.dengluhou{
    font-size:12px;
    color:#ceb791;
    line-height:30px;
}
.dengluhou a{
    color:#ceb791;
    padding:0px 2px;
}
.dengluhou a:hover{
    text-decoration:underline;
}
  </style>
<!-- 底部结束 -->
	

    <script type="text/javascript" src="float.js"></script>
    <style type="text/css">
        #leftfloat a, #rightfloat a { display: block; width: 100%; /*background-color:#ccc;*/ }

        #leftfloat { background-repeat: no-repeat; background-position: right; width: 130px; height: 412px; overflow: hidden; }

        #rightfloat { background-image: url(kfR.png); background-repeat: no-repeat; width: 138px; height: 435px; overflow: hidden; }
    </style>


    <script type="text/javascript">
        $("#leftfloat").Float({ topSide: 170, floatRight: 0, side: 1, close: 'colseleft' });
        $("#rightfloat").Float({ topSide: 170, floatRight: 1, side: 1, close: 'colserigth' });
    </script>
	
	

<!-- 红包活动-->
<script type="text/javascript">
    $("#ele-float-top-up").css("background-image","url('"+cdnUrl+"/shared/sitepublic/images/float_top_up.png')");
    document.writeln('<script src=\"'+cdnUrl+'/shared/red/js/redbag.js\"><\/script>');
</script>
<!-- 红包活动-->

<script type="text/javascript">

    function f_com_bm(url, n, o) {
        var conf = {
            width: '1024',
            height: '680',
            scrollbars: 'yes',
            resizable: 'no',
            status: 'no',
            location: 'yes',
            toolbar: 'no',
            menubar: 'no'
        }, _tmp = [];
        if (o == undefined) o = {};

        // 特例:如為電子遊藝-玉蒲團的搶先看 則設定寬高
        if (/(PriorityWatch)/.test(url)) {
            o = {
                'width': '960',
                'height': '640',
                'scrollbars': 'no'
            };
        }

        // 特例:如為真人娛樂-BB3D開啟遊戲 則以location的方式連結
        if (/(LiveBB3D|LiveBBK8)/.test(url)) {
            self.location = url;
        } else {
            for (var k in conf) {
                _tmp.push(k + '=' + ((o[k] == undefined) ? conf[k] : o[k]));
            }
            window.open(url, n, _tmp.join(','));
        }
    }

    $(function () {
        var isActive = false;
        setInterval(function () {
            if (isActive) {
                $('#gfzx').css('color', '#fff');
            } else {
                $('#gfzx').css('color', 'red');
            }
            isActive = !isActive;
        }, 500);
    });

    $(function () {
        var isActive = false;
        setInterval(function () {
            if (isActive) {
                $('#gfzxl').css('color', '#fff');
            } else {
                $('#gfzxl').css('color', 'red');
            }
            isActive = !isActive;
        }, 500);
    });
</script>
</center>
</body>
</html>