<?php
class httpCURLRequest{

    const HOST_LINK = 'http://api.aobet.cn:100';
    const MODULE = 'merchant';
    const VERSION = 'v1';

    public static function post($method,$post_data)
    {
        $url = self::HOST_LINK.'/'.self::MODULE.'/'.self::VERSION.'/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, trim($url.$method));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        $result = json_decode(trim($output,chr(239).chr(187).chr(191)),true);
        return $result;
    }

    public static function fileGetContents($method,$post_data)
    {
        $postData = '';
        foreach($post_data as $k => $v)
        {
            $postData .= $k . '='.$v.'&';
        }
        $postData =  rtrim($postData,'&');
        $url = self::HOST_LINK.'/'.self::MODULE.'/'.self::VERSION.'/';
        $link = $url.$method.'?'.$postData;
        $contents = file_get_contents(trim($link));
        $result = json_decode(trim($contents,chr(239).chr(187).chr(191)),true);
        //print_r($link);die;
        return $result;
    }


}