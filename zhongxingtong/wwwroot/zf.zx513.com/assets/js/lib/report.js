(function (window, document) {
    var $$$ = window.PingClientsSource ? window.PingClientsSource : {};

    // 生成随机字符串
    $$$.randomString = function (len) {
        var len = len || 32;
        var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
        var maxPos = chars.length;
        var pwd = '';

        for (var i = 0; i < len; i++) {
            pwd += chars.charAt(Math.floor(Math.random() * maxPos));
        }

        return pwd;
    };

    //拉取名为 name 的 cookie 值
    $$$._getCookie = function (name) {
        var ret = document.cookie.match(new RegExp('(?:^|;\\s)' + name + '=(.*?)(?:;\\s|$)'));
        return ret ? ret[1] : "";
    };

    //设置 cookie
    $$$._setCookie = function (name, value, expires, domain, path, secure) {
        var path = '/';
        var domain = domain || 'pingxx.com';

        var cookieText = encodeURIComponent(name) + '=' + encodeURIComponent(value);

        expires && (expires instanceof Date) && (cookieText += "; expires=" + expires.toGMTString());
        path && (cookieText += "; path=" + path);
        domain && (cookieText += "; domain=" + domain);
        secure && (cookieText += "; secure");

        document.cookie = cookieText;

        return $$$;
    };

    //读取当前 url 中名为 name 的参数值
    $$$.getUrlParam = function (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return decodeURI(r[2]);
        return null;
    };

    //发送数据日志
    $$$.report = function (options) {
        var xmlhttp = new XMLHttpRequest();
        var url = options.url;
        var data = options.data;
        var success = options.success;

        var paramsArray = [];
        for (key in data) {
            paramsArray.push(key + '=' + data[key])
        }
        var paramsStr = paramsArray.join('&');

        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(paramsStr);

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.status >= 200 && xmlhttp.status < 300) {
                success(xmlhttp.responseText);
            } else {
                (xmlhttp.responseText) && console.error(xmlhttp.responseText);
            }
        }

    };

    window.PingClientsSource = window.$$$ = $$$;

    var from = $$$.getUrlParam('from') || 2,
        desc = $$$.getUrlParam('desc') || '',
        sub_from = $$$.getUrlParam('sub_from') || '',
        puid = $$$._getCookie('puid') || '';


    //登入页面，检查是否存在 puid 的 cookie 如果已有，doNothing, 否则先生成cookie 再上报
    if (!puid) {

        if(/pingxx/.test(location.href)) {
            puid = $$$.randomString();
            var date = new Date(new Date().getTime() + 10 * 365 * 86400000);
            var domain = 'pingxx.com';
            $$$._setCookie('puid', puid, date, domain)
                ._setCookie('from', from, date, domain)
                ._setCookie('desc', desc, date, domain)
                ._setCookie('sub_from', sub_from, date, domain);
            $$$.report({
                // url: /pingxx/.test(location.href) ? 'https://dashboard.pingxx.com/page/auto/register_stat' : 'https://dashboard.pinpula.com/page/auto/register_stat',
                url: 'https://dashboard.pingxx.com/page/auto/register_stat',
                data: {
                    "puid": puid,
                    "desc": desc,
                    "from": from,
                    "sub_from": sub_from,
                },
                success: function (data) {
                }
            })
        }

    }
})(window, document);
