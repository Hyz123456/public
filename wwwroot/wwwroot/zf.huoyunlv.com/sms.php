<?php
header('content-type:text/html;charset=utf-8');
session_start();
 $phone=$_POST["Tel"];
if(!preg_match('/^[0-9]{11,13}$/',$phone))
{
print("error");
exit();
}
  
$randCode = '';
$chars = '123456789';
for ( $i = 0; $i < 4; $i++ ){
	$randCode .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
}

$_SESSION['code'] = strtolower($randCode);





$encode='UTF-8'; 
$username='linghangfuyou';  //用户名

$password_md5='ceb2581403df91c4c861d7c2cf72ec0c';  //32位MD5密码加密，不区分大小写

$apikey='bab7fb1da13cd464c21071f6c31b1195';  //apikey秘钥（请登录 http://m.5c.com.cn 短信平台-->账号管理-->我的信息 中复制apikey）

$mobile= $phone;  //手机号,只发一个号码：13800000001。发多个号码：13800000001,13800000002,...N 。使用半角逗号分隔。

$content='您好，您的验证码是：'.$_SESSION['code'].'【中付宝】';  //要发送的短信内容，特别注意：签名必须设置，网页验证码应用需要加添加【图形识别码】。
//$content = iconv("GBK","UTF-8",$content);z

$contentUrlEncode = urlencode($content);//执行URLencode编码  ，$content = urldecode($content);解码

$result = sendSMS($username,$password_md5,$apikey,$mobile,$contentUrlEncode,$encode);  //进行发送

if(strpos($result,"success")>-1) {
	  echo "短信发送成功";
} else {
    echo "请求发送短信失败";
}




//发送接口
function sendSMS($username,$password_md5,$apikey,$mobile,$contentUrlEncode,$encode)
{
    //发送链接（用户名，密码，apikey，手机号，内容）
    $url = "http://m.5c.com.cn/api/send/index.php?";  //如连接超时，可能是您服务器不支持域名解析，请将下面连接中的：【m.5c.com.cn】修改为IP：【115.28.23.78】
    $data=array
    (
        'username'=>$username,
        'password_md5'=>$password_md5,
        'apikey'=>$apikey,
        'mobile'=>$mobile,
        'content'=>$contentUrlEncode,
        'encode'=>$encode,
    );
    $result = curlSMS($url,$data);
    //print_r($data); //测试
    return $result;
}
function curlSMS($url,$post_fields=array())
{
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);//用PHP取回的URL地址（值将被作为字符串）
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//使用curl_setopt获取页面内容或提交数据，有时候希望返回的内容作为变量存储，而不是直接输出，这时候希望返回的内容作为变量
    curl_setopt($ch,CURLOPT_TIMEOUT,30);//30秒超时限制
    curl_setopt($ch,CURLOPT_HEADER,1);//将文件头输出直接可见。
    curl_setopt($ch,CURLOPT_POST,1);//设置这个选项为一个零非值，这个post是普通的application/x-www-from-urlencoded类型，多数被HTTP表调用。
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post_fields);//post操作的所有数据的字符串。
    $data = curl_exec($ch);//抓取URL并把他传递给浏览器
    curl_close($ch);//释放资源
    $res = explode("\r\n\r\n",$data);//explode把他打散成为数组
    return $res[2]; //然后在这里返回数组。
}

exit;








 
$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
  
$smsConf = array(
    'key'   => 'eb776c91955412a128177b0e06490438', //您申请的APPKEY
	 'mobile'    => $phone, //接受短信的用户手机号码
    'tpl_id'    => '29159', //您申请的短信模板ID，根据实际情况修改
  'tpl_value' =>'#code#='.$_SESSION['code']  //您设置的模板变量，根据实际情况修改
);
 
$content = juhecurl($sendUrl,$smsConf,1); //请求发送短信
 
if($content){
    $result = json_decode($content,true);
    $error_code = $result['error_code'];
    if($error_code == 0){
        //状态为0，说明短信发送成功
        echo "短信发送成功";
    }else{
        //状态非0，说明失败
        $msg = $result['reason'];
        echo "短信发送失败(".$error_code.")：".$msg;
    }
}else{
    //返回内容异常，以下可根据业务逻辑自行修改
    echo "请求发送短信失败";
}
 
/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}
                       
					   
			
?>

