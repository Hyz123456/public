<?php

class Curl
{
    const GATEWAY = "https://shq-api.51fubei.com/gateway";

    public static function execute($content,$key)
    {
        $content['sign'] = static::generateSign($content,$key);
        $result = static::mycurl(static::GATEWAY,$content);
        return $result;

    }
    private static function mycurl($url,$params = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);

        if (!empty($params)) {

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

        }
        $header = array("content-type: application/json");
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $reponse = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new Exception($reponse, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $reponse;

    }
    private static function generateSign($content,$key)
    {
        return strtoupper(static::sign(static::getSignContent($content).$key));

    }
    private static function getSignContent($content)
    {
        ksort($content);
        $signString = "";
        foreach ($content as $key=>$val){
             if(!empty($val)){
                 $signString .= $key."=".$val."&";
             }
        }
        $signString = rtrim($signString,"&");
        return $signString;

    }
    private static function sign($data)
    {
        return md5($data);
    }

}