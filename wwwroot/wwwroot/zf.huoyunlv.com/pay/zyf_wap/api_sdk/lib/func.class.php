<?php

/**
 * @name: 函数库.
 * @Author: Coder.yee <Coder.yee@gmail.com>
 * @Date: 2017/9/24
 * @Version: v1.0
 */
class func
{
    /**
     * MD5签名字符串
     * @param $prestr
     * @param $key
     * @return string
     */
    public static function md5Sign($prestr, $key)
    {
        return strtolower(md5($prestr . $key));
    }

    /**
     * 验证MD5签名
     * @param $prestr
     * @param $sign
     * @param $key
     * @return bool
     */
    public static function md5SignVerify($prestr, $sign, $key)
    {
        return (strtolower(md5($prestr . $key)) == $sign);
    }

    /**
     * http build query
     * @param $array
     * @return string
     */
    public static function http_build_querys($array)
    {
        if (!is_array($array)) {
            return $array;
        }
        $query = $separator = '';
        foreach ($array as $key => $val) {
            $query .= $separator . $key . '=' . urlencode($val);
            $separator = '&';
        }
        return $query;
    }

    /**
     * Sort
     * @param $param
     * @return mixed
     */
    public static function argSort($param)
    {
        ksort($param);
        reset($param);
        return $param;
    }

    /**
     * to string
     * @param $array
     * @return array|string
     */
    public static function array_value_to_string($array)
    {
        if (!is_array($array))
            return (string)$array;
        $list = [];

        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $list[$key] = func::array_value_to_string($val);
            } else {
                $list[$key] = (string)$val;
            }
        }
        return $list;
    }

    /**
     * create randstr
     * @return string
     */
    public static function getRandstr()
    {
        return strtolower(md5(uniqid(mt_rand(), true)));
    }

    /**
     * CURL
     * @param $url
     * @param $post
     * @param bool|true $https
     * @param string $caFile
     * @return bool|mixed
     */
    public static function vCurl($url, $post, $caFile = '')
    {
        $curl = curl_init();
        $timeout = 10;
        curl_setopt($curl, CURLOPT_URL, $url); //地址
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        if (substr($url, 0, 5) === 'https') {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, ($caFile ? 1 : 0));
            curl_setopt($curl, CURLOPT_CAINFO, $caFile);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        }
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $curlData = curl_exec($curl);
        if (curl_errno($curl)) {
            curl_close($curl);
            return false;
        }
        curl_close($curl);
        return $curlData;
    }
}