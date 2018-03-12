<?php

/**
 * @name: RSA.
 * @Description: JAVA使用RSA/ECB/PKCS1Padding.
 * @Author: Coder.yee <Coder.yee@gmail.com>
 * @Date: 2017/9/24
 * @Version: v1.0
 */
class CryptRSA
{
    const LIBMINCRYPT_NAME = 'RSA';
    protected $_private_key;
    protected $_public_key;
    protected $_private_key_password;

    /**
     * 参数设置
     * @param $name
     * @param $value
     * @return $this
     */
    public function setParam($name, $value)
    {
        $this->$name = $value;
        return $this;
    }

    /**
     * 私钥加密
     * @param $decrypted
     * @return bool|string
     */
    public function privateEncrypt($decrypted)
    {
        $encrypted = '';
        //这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
        if (!empty($this->_private_key_password)) {
            $private_key = openssl_pkey_get_private($this->_private_key, $this->_private_key_password);
        } else {
            $private_key = openssl_pkey_get_private($this->_private_key, '');
        }

        //this data length > 117 bits error coder for yee split 117.
        $plainData = str_split($decrypted, 117);//priavte private key bits 1024.
        foreach ($plainData as $chunk) {
            $str = '';
            $encryption = openssl_private_encrypt($chunk, $str, $private_key, OPENSSL_PKCS1_PADDING);
            if ($encryption === false) {
                return false;
            }
            $encrypted .= $str;
        }
        //encrypted coder base64_encode.
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

    /**
     * 私钥解密
     * @param $encrypted
     * @return bool|string
     */
    public function privateDecrypt($encrypted)
    {
        $decrypted = '';
        if (!empty($this->_private_key_password)) {
            $private_key = openssl_pkey_get_private($this->_private_key, $this->_private_key_password);
        } else {
            $private_key = openssl_pkey_get_private($this->_private_key, '');
        }
        $plainData = str_split(base64_decode($encrypted), 128);
        foreach ($plainData as $chunk) {



            $str = '';
            $decryption = openssl_private_decrypt($chunk, $str, $private_key, OPENSSL_PKCS1_PADDING);
            if ($decryption === false) {
                return false;
            }
            $decrypted .= $str;
        }
        return $decrypted;
    }

    /**
     * 公钥加密
     * @param $decrypted
     * @return bool|string
     */
    public function publicEncrypt($decrypted)
    {
        $encrypted = '';
        $public_key = openssl_pkey_get_public($this->_public_key);
        $plainData = str_split($decrypted, 117);
        foreach ($plainData as $chunk) {
            $str = '';
            $encryption = openssl_public_encrypt($chunk, $str, $public_key, OPENSSL_PKCS1_PADDING);
            if ($encryption === false) {
                return false;
            }
            $encrypted .= $str;
        }
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

    /**
     * 公钥解密
     * @param $encrypted
     * @return bool|string
     */
    public function publicDecrypt($encrypted)
    {
        $decrypted = '';
        $public_key = openssl_pkey_get_public($this->_public_key);
        $plainData = str_split(base64_decode($encrypted), 128);
        foreach ($plainData as $chunk) {
            $str = '';
            $decryption = openssl_public_decrypt($chunk, $str, $public_key, OPENSSL_PKCS1_PADDING);
            if ($decryption === false) {
                return false;
            }
            $decrypted .= $str;
        }
        return $decrypted;
    }
}
