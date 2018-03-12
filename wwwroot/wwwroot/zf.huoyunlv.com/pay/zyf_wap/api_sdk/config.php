<?php
/**
 * @name: 豆豆支付SDK.
 * @Author: Coder.yee <Coder.yee@gmail.com>
 * @DateTime: 2017/10/11 17:10
 * @Version: v1.0
 */
define('PID', '10802175000000397628');//签约PID
define('MERCHANT_NO', '1180109153440008');//商户号
define('SECRET_KEY', 'afd5199fb4f909e99be4b150cfcbf397');//secret
define('SING_KEY', '458c9f5fb82f01b707ff8d2126ae5b38');//MD5签名密钥
define('PUBLIC_KEY_FILE', 'D:\wwwroot\zf.zx513.com\pay\zyf_wap\pem\public_key.pem');  //公钥文件路径
define('PRIVATE_KEY_FILE', 'D:\wwwroot\zf.zx513.com\pay\zyf_wap\\pem\private_key.pem'); //私钥文件路径
define('PRIVATE_KEY_PASSWORD',"212230"); //私钥密码
define('RETURN_CIPHERTEXT', true); //是否返回密文(true返回密文，false返回明文)
//define('SERVER_URL', 'https://api.doudoupay.com/v1'); //正式环境URL
define('SERVER_URL', 'https://api.doudoupay.com/v1'); //正式环境URL
define('NOTIFY_URL', 'https://www.XXXXXX.com/notify_url'); //回调地址

define('GETTIME', time()); //时间