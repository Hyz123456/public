<?php
header("content-type:text/html; charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/aobetConfig/httpCURLRequest.php");
include_once($_SERVER['DOCUMENT_ROOT']."/aobetConfig/config.php");
class vgapi
{

    const  METHOND = 'vgqp';
    public static function getConfig($key)
    {
        global $token;
        global $apiMer;
        $post_data = array(
            'token'=>$token,
            "gameName"=>self::METHOND,
            'am'=>$apiMer,
        );
        $config =  httpCURLRequest::post("vgget.config",$post_data);
        $array = json_decode($config['game_config'],true);
        return isset($array[$key]) ? $array[$key] : '';
    }

    //会员状态
    const USER_UN_ACTIVE = 1; //1是禁用
    const USER_ACTIVE= 0;     //0是启用

    //创建用户
    public static function create($username)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'create',
            'currency'=>'TAG',
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('HOST_NAME').'?'.$postData);
    }

    //余额
    public static function balance($username)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'balance',
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('HOST_NAME').'?'.$postData);
    }

    //存款
    public static function deposit($username,$money)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'deposit',
            'serial'=>self::getOrderId(),
            'amount'=>$money,
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('HOST_NAME').'?'.$postData);
    }

    //取款
    public static function withdraw($username,$money)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'withdraw',
            'serial'=>self::getOrderId(),
            'amount'=>$money,
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('HOST_NAME').'?'.$postData);
    }

    //登陆游戏
    public static function login($username)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'login',
            'host'=>'www.azgj1981.com',
            'lang'=>'cn',
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('HOST_NAME').'?'.$postData);
    }


    //登陆游戏
    public static function loginWithChannel($username)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'loginWithChannel',
            'host'=>'www.azgj1981.com',
            'lang'=>'cn',
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::fileGetContents(self::getConfig('HOST_NAME').'?'.$postData);
    }

    //更新用户可用状态
    public static function update($username,$available)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'action'=>'update',
            'available'=>$available,
            'host'=>'www.azgj1981.com',
            'lang'=>'cn',
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('HOST_NAME').'?'.$postData);
    }

    //获取对战历史注单记录
    public static function recordOne()
    {
        $post_data = array(
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('GET_ORDER_RECORD').'?'.$postData);
    }

    //更新获取对战历史注单记录
    public static function recordOneUpdate($username,$commiss)
    {
        $post_data = array(
            'secret'=>self::getConfig('SECRET'),
            'agent'=>self::getConfig('AGENT'),
            'username'=>$username,
            'commiss'=>$commiss,
            'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        return self::curlRequestGet(self::getConfig('UPDATE_ORDER_RECORD').'?'.$postData);
    }

    public static function updateSuccess($user_id)
    {
        $post_data = array(
            'user_id'=>$user_id,
              'channel'=>self::getConfig('CHANNEL'),
        );
        $md5Str = '';
        foreach($post_data as $key => $val)
        {
            $md5Str .= $val;
        }
        $verifyCode =strtoupper(md5($md5Str.self::getConfig('CHANNEL_PASSWORD')));
        $post_data['verifyCode'] = $verifyCode;
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        //echo self::UPDATE_SUCCESS_RETURN.'?'.$postData;die;
        return self::curlRequestGet(self::getConfig('UPDATE_SUCCESS_RETURN').'?'.$postData);
    }

    public static function curlRequestGet($url)
    {
        //echo 'updatecommiss接口url：';
        //echo $url.'<br />';
        $ch  = curl_init();
        $timeout = 15;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $contents = curl_exec($ch);
        curl_close($ch);
        return self::xml_to_array($contents);
    }

    public static function fileGetContents($url)
    {
        $contents = file_get_contents($url);
        return self::xml_to_array($contents);
    }

    public static function xml_to_array( $xml )
    {
        $reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches))
        {
            $count = count($matches[0]);
            $arr = array();
            for($i = 0; $i < $count; $i++)
            {
                $key= $matches[1][$i];
                $val = self::xml_to_array( $matches[2][$i] );  // 递归
                if(array_key_exists($key, $arr))
                {
                    if(is_array($arr[$key]))
                    {
                        if(!array_key_exists(0,$arr[$key]))
                        {
                            $arr[$key] = array($arr[$key]);
                        }
                    }else
                    {
                        $arr[$key] = array($arr[$key]);
                    }
                    $arr[$key][] = $val;
                }else
                {
                    $arr[$key] = $val;
                }
            }
            return $arr;
        }
        else
        {
            return $xml;
        }
    }

    //生成数字订单号
    public static function getOrderId()
    {
          return time().mt_rand(10000,99999);
    }
}
/*ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息
$a= new vgapi();
$data = $a->recordOne();
//echo "游戏记录：<pre>";
print_r($data);
//echo "</pre>";
echo count($data['betsNew']['Table_PLAT']);
//recordOneUpdate($username,$commiss)
$idarr = array();
foreach($data['betsNew']['Table_PLAT'] as $item)
{
    $id = $item['id'];
    $idarr[] = $item['id'];
    $user_name = $item['user_name'];
    $create_time = $item['create_time'];
    $room_name = $item['room_name'];
    $game_id = $item['game_id'];
    $room_id = $item['room_id'];
    $user_hand_card = $item['user_hand_card'];
    $seat_0_hand_card = $item['seat_0_hand_card'];
    $seat_1_hand_card = $item['seat_1_hand_card'];
    $bottom_card = $item['bottom_card'];
    $is_lord = $item['is_lord'];
    $room_score = $item['room_score'];
    $game_score = $item['game_score'];
    $multiple_bomb = $item['multiple_bomb'];
    $multiple_spring = $item['multiple_spring'];
    $multiple_task = $item['multiple_task'];
    $multiple_multiple = $item['multiple_multiple'];
    $opencard_multiple = $item['opencard_multiple'];
    $money = $item['money'];
    $service_money = $item['service_money'];
    $commiss_rate = $item['commiss_rate'];
    $sql="insert into `api_vgbetdetail`(id,user_name,create_time,room_name,game_id,room_id,user_hand_card,seat_0_hand_card,seat_1_hand_card,
    bottom_card,is_lord,room_score,game_score,multiple_bomb,multiple_spring,multiple_task,multiple_multiple,opencard_multiple,
    money,service_money,commiss_rate)
    values
   ($id,'$user_name','$create_time','$room_name','$game_id','$room_id','$user_hand_card','$seat_0_hand_card','$seat_1_hand_card','$bottom_card',
   '$is_lord','$room_score','$game_score','$multiple_bomb','$multiple_spring','$multiple_task','$multiple_multiple','$money','$opencard_multiple','$service_money','$commiss_rate')";
    //echo $sql;die;
    $res = $GLOBALS["mysqli"]->query($sql);
    if($res)
    {
        $ids = '';
        if(!empty($idarr))
        {

            $ids = implode(',',$idarr);

        }
        if(!empty($ids)){
            $ids = rtrim($ids,',');
        }
        $updateRes = $a->updateSuccess($ids);
        print_r($updateRes);die;
        if(isset($updateRes['response']['errcode']) && $updateRes['response']['errcode'] == 0)
        {
            echo "返回结果：<pre>";
            print_r($updateRes);
            echo "</pre>";
        }
    }
    die;
}*/

