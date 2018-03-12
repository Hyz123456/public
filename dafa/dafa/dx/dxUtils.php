<?php
header("content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/aobetConfig/httpCURLRequest.php");
include_once($_SERVER['DOCUMENT_ROOT']."/aobetConfig/config.php");
class A2Xml {
    private $version = '1.0';
    private $encoding = 'UTF-8';
    private $root  = 'message';
    private $xml  = null;
    function __construct() {
        $this->xml = new XmlWriter();
    }
    function toXml($data, $eIsArray=FALSE) {
        if(!$eIsArray) {
            $this->xml->openMemory();
            $this->xml->startDocument($this->version, $this->encoding);
            $this->xml->startElement($this->root);
        }
        foreach($data as $key => $value){

            if(is_array($value)){
                $this->xml->startElement($key);
                $this->toXml($value, TRUE);
                $this->xml->endElement();
                continue;
            }
            $this->xml->writeElement($key, $value);
        }
        if(!$eIsArray) {
            $this->xml->endElement();
            return $this->xml->outputMemory(true);
        }
    }
}

class daXiong
{
    protected  $_host;
    public  $_merchantId;
    function __construct()
    {
        global $token;
        $postArray = array(
            'token'=>$token,
            "gameName"=>'dxqp',
            'am'=>'3',
        );
        $return =  httpCURLRequest::fileGetContents("vgget.dxconfig",$postArray);
        $return = json_decode($return['game_config'],true);
        if(!empty($return))
        {
            $this->_host = $return['host'];
            $this->_merchantId = $return['merchantId'];
        }else{
            exit("网络错误");
        }
    }

    private function curl_post($api,$data=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $result=curl_exec($ch);
        curl_close($ch);
        return json_decode($result,true);
    }

    public function get_real_ip(){
        $ip=false;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!preg_match ("^(10|172\.16|192\.168)\.", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }

    public function create($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/playerCreate/'.$username.'/'.$this->_merchantId.'/'.$this->getPassword($username);
        $data = $this->curl_post($methond);
        return $data;
    }

    private function getPassword($username)
    {
        global $mysqli;
        $query	=	$mysqli->query("select user_pass_naked from user_list where user_name='$username' limit 1");
        $t		=	$query->fetch_array();
        return md5($t['user_pass_naked']);
    }
	
	public function updatePlayerPwds($username)
    {
        global $mysqli;
        $query	=	$mysqli->query("select user_pass_naked from user_list where user_name='$username' limit 1");
        $t		=	$query->fetch_array();
        $methond = $this->_host.'/S13/services/dg/player/updatePlayerPwds/'.$username.'/'.$this->_merchantId.'/'.md5($t['user_pass_naked']);
        $data = $this->curl_post($methond);
        return $data;
    }

    public function login($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/playerLogin/'.$username.'/'.$this->getPassword($username).'/'.$this->get_real_ip().'/'.$this->_merchantId;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function loginOut($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/playerLogout/'.$username.'/'.$this->_merchantId;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function deposit($username,$money)
    {
        $methond = $this->_host.'/S13/services/dg/player/deposit/'.$this->_merchantId.'/'.$username.'/'.$money.'/'.$this->getOrdersId('deposit');
        $data = $this->curl_post($methond);
        return $data;
    }

    public function withdraw($username,$money)
    {
        $methond = $this->_host.'/S13/services/dg/player/withdraw/'.$this->_merchantId.'/'.$username.'/'.$money.'/'.$this->getOrdersId('withdraw');
        $data = $this->curl_post($methond);
        return $data;
    }

    private function getOrdersId($type = 'deposit')
    {
        return $type.time().mt_rand(1000,9999);
    }

    public function balance($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/getPlayerBalance/'.$username.'/'.$this->_merchantId;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function gameStatus($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/playerGameInfo/'.$username.'/'.$this->_merchantId;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function isPlayerOnline($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/isPlayerOnline/'.$username.'/'.$this->_merchantId;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function getPlayerAccountMsg($username)
    {
        $methond = $this->_host.'/S13/services/dg/player/getPlayerAccountMsg/'.$username.'/'.$this->_merchantId;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function getMerchantRoomIdMsgs($gameCode)
    {
        $methond = $this->_host.'/S13/services/dg/player/getMerchantRoomIdMsgs/'.$this->_merchantId.'/'.$gameCode;
        $data = $this->curl_post($methond);
        return $data;
    }

    public function sign($data, $privatekeyFile,$passphrase)
    {
        $signature = '';
        $privatekey = openssl_pkey_get_private(file_get_contents($privatekeyFile), $passphrase);
        $res=openssl_get_privatekey($privatekey);
        openssl_sign($data, $signature, $res,OPENSSL_ALGO_SHA1);
        openssl_free_key($res);

        return base64_encode($signature);
    }

    public  function verity($data, $signature, $publicKeyPath)
    {
        $pubKey = file_get_contents($publicKeyPath);
        $res = openssl_get_publickey($pubKey);
        $result = (bool)openssl_verify($data, base64_decode($signature), $res);
        openssl_free_key($res);
        return $result;
    }
    public function game($username,$roomId=0,$gameCode = 'PTG0001')
    {
        $res = $this->create($username);
        $uId = '';
        $data = $this->login($username);
        if(isset($data['resultCode']) && $data['resultCode'] == 1)
        {
            $uId = $data['uId'];
        }
        //$data=$class->getMerchantRoomIdMsgs('PTG0001',2);
        //print_r($data);die;
        $res = array(
            'playerName' => $username,
            'uId' => $uId,
            'roomId' => $roomId,
            'merchantId' => $this->_merchantId,
            'loginIp' => $this->get_real_ip(),
            'gameCode' => $gameCode,
        );
        $xml = new A2Xml();
        $strxml = trim($xml->toXml($res));
        $priKeyDir = $_SERVER['DOCUMENT_ROOT']."/dx/rsa/private.key";
        $signRes = $this->sign($strxml,$priKeyDir,'');
        return $this->_host.'/S13/html/dg.html?EnStr='.$signRes.'&xmlStr='.base64_encode($strxml);
    }

    public function demo($gameCode)
    {
        $res = array(
            'merchantId' => $this->_merchantId,
            'loginIp' => $this->get_real_ip(),
            'gameCode' => $gameCode,
        );
        $xml = new A2Xml();
        $strxml = trim($xml->toXml($res));
        $priKeyDir = $_SERVER['DOCUMENT_ROOT']."/dx/rsa/private.key";
        $signRes = $this->sign($strxml,$priKeyDir,'');
        return 'http://games.dxwewejuhw.com/html/dg_demo.html?EnStr='.$signRes.'&xmlStr='.base64_encode($strxml);
    }
}

/*$class = new daXiong();
$data=$class->getMerchantRoomIdMsgs('PTG0015');
print_r($data);die;
$login = $class->create('qwerty','qwerty123');
print_r($login);die;
$url = $class->game('qwerty','qwerty123');
echo $url;die;*/
?>

