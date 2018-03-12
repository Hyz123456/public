<?php
header("content-type:text/html;charset=utf-8");
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
class ptapi{
	private $agent = 'VL8uDPH9ZudFDTFcZFtpM9vXVt3uyKCg7aVh6TXFmwAQmUkVcXaAjpx6';
    private $apiAccount="NGtaiyang02";
	private $md5_key = '';
	private $password_prefix = '';
	private $username_prefix = '';


	private $register_url = 'http://api.room88.net/api/GDPT/register.ashx'; //新增会员url
	private $balance_url = 'http://api.room88.net/api/GDPT/balance.ashx'; //查询余额url
	private $trans_in_url = 'http://api.room88.net/api/GDPT/deposit.ashx'; //存款url
	private $trans_out_url = 'http://api.room88.net/api/GDPT/withdrawal.ashx'; //取款url
	private $login_url = 'http://api.room88.net/api/GDPT/login.ashx'; //游戏登录url
	private $betrecord_url = 'http://api.room88.net/api/GDPT/BetRecord.ashx'; //huoqujilu
	private $checkPlayerExists_url = 'http://api.room88.net/api/GDPT/checkPlayerExists.ashx';
    private $credit = 'http://api.room88.net/api/GDPT/credit.ashx'; //游戏登录url


	function __construct(){

	}

    public function credit()
    {
        $salt = strtolower(substr(md5($this->apiAccount),0,5));
        $code = $salt.md5($this->agent.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'code'=>$code);
        $url = $this->credit;
        return $this->sendRequest($url,$postdata);
    }

	function checkPlayerExists($username){
		$username = $this->username_prefix.$username;
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$isDemo=0;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$salt);
		$post_data = array(
			'apiAccount'=>$this->apiAccount,
			'userName'=>$username,
			'code'=>$code
		);
		$res = $this->docurl($this->checkPlayerExists_url, $post_data);
		return $res;
	}



	function betrecord($startDate,$endDate,$pageIndex,$pageSize){
		$salt = strtolower(substr(md5($this->apiAccount),0,5));
		$code = $salt.md5($this->agent.$this->apiAccount.$startDate.$endDate.$pageIndex.$pageSize.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'startDate'=>$startDate,
		'endDate'=>$endDate,
		'pageIndex'=>$pageIndex,
		'pageSize'=>$pageSize,
		'code'=>$code
		);
		$res = $this->docurl($this->betrecord_url, $post_data);
		return $res;
	}

	function balance_one($username){
		$username = $this->username_prefix.$username;
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$isDemo=0;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$salt);
		$post_data = array(
			'apiAccount'=>$this->apiAccount,
			'userName'=>$username,
			'code'=>$code
		);
		$res = $this->docurl($this->balance_url, $post_data);
		return $res;
	}
	//转出
	function trans_out($username,$credit,$billno){
		$username = $this->username_prefix.$username;
		$md5_key = $this->md5_key;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$isDemo=0;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$billno.$credit.$salt);
		$post_data = array(
			'apiAccount'=>$this->apiAccount,
			'userName'=>$username,
			'transSN'=>$billno,
			'amount'=>$credit,
			'code'=>$code
		);
		$res = $this->docurl($this->trans_out_url, $post_data);
		return $res;
	}
	//转入
	function trans_in($username,$credit,$billno){
		$username = $this->username_prefix.$username;
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$isDemo=0;
		$code = $salt.md5($this->agent.$this->apiAccount.$username .$billno.$credit.$salt);
		$post_data = array(
			'apiAccount'=>$this->apiAccount,
			'userName'=>$username,
			'transSN'=>$billno,
			'amount'=>$credit,
			'code'=>$code
		);

		$res = $this->docurl($this->trans_in_url, $post_data);

		return $res;
	}
	//登录
	function login($username,$gamecode){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$languageCode='zh-CN';
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$languageCode.$gamecode.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'userName'=>$username,
		'password'=>$password,
		'languageCode'=>$languageCode,
		'gamecode'=>$gamecode,
		'code'=>$code
		);
		$res = $this->docurl($this->login_url, $post_data);
		return $res;
	}

	//注册
	function register($username,$actype=1){
		global $mysqli;
		//参数 agent,username,password,key
		$u_name=$username;
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
        //$currencyCode = 'zh-CN';
        $code = $salt.md5($this->agent.$this->apiAccount.$username.$salt);
        $post_data = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$username,
            //'currencyCode'=>$currencyCode,
            'code'=>$code
        );
		$res = $this->sendRequest($this->register_url, $post_data);

		if($res['Success']){
			return $res;
		}else{
			return array('code'=>-1,'info'=>'未知错误');
		}
	}

    private function sendRequest($url,$post_data=array(),$post=true){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $res = curl_exec($ch);
        curl_close($ch);
        /*
         echo "<br>  URL ========= ".$url."<br>";
        echo "<br>  post_data ========= ".$url."<br>";
        print_r($post_data);
        echo "<br> return_data ========= <br>";
        print_r($res);  */

        return json_decode($res,true);
    }

	//游戏登入
	private function docurl($url,$post_data=array(),$post=true){

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $res = curl_exec($ch);
        curl_close($ch);
        /*
         echo "<br>  URL ========= ".$url."<br>";
        echo "<br>  post_data ========= ".$url."<br>";
        print_r($post_data);
        echo "<br> return_data ========= <br>";
        print_r($res);  */

        return json_decode($res,true);


		//Accept: application/json;q=0.9,*/*;q=0.8
		//Content-Type: application/json; charset=UTF-8

        $header   = array();
        $header[] = "Accept:text/html,application/xhtml+xml,application/xml;application/json;q=0.9,*/*;q=0.8";
        $header[] = "Content-Type: application/json; charset=UTF-8";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive:timeout=5, max=100";
        $header[] = "Accept-Charset:ISO-8859-1,utf-8;q=0.7,*;q=0.3";
        $header[] = "Accept-Language:es-ES,es;q=0.8";

		$header[] = "X-API-KEY: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
		$header[] = "X-MERCHANT-CODE: XXXXXXXXXXX";
		$header[] = "X-CURRENCY: XXX";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_TIMEOUT,60);
		$res = curl_exec($ch);
		curl_close($ch);
		return json_decode($res,true);
	}
	//错误返回
	function geterrorcode($code=''){

		$errorcode = array("10000"=>array("error info","查看具体的说明内容"),
		"10016"=>array("Network error!","网络错误"),
		"25004"=>array("The agent is not exist","代理商号不存在"),
		"22011"=>array("The member is not exist","会员不存在"),
		"44000"=>array("key error..","验证码错误或丢失"),
		"44001"=>array("The parameters are not complete","参数不完整"));
		if($code){
			if(key_exists($code, $errorcode)){
				return $errorcode[$code][1];
			}else{
				return '服务器忙，请稍后重试';
			}
		}
		return $errorcode;
	}

	//登录电子
	function logindianzi($username){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$lang='zh-CN';
		$isSpeed=0;
		$isDemo=0;
		$gameType=8;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$lang.$isSpeed.$isDemo.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'userName'=>$username,
		'password'=>$password,
		'lang'=>$lang,
		'gameType'=>$gameType,
		'isSpeed'=>$isSpeed,
		'isDemo'=>$isDemo,
		'code'=>$code
		);
		//print_r($post_data);
		$res = $this->docurl($this->login_url, $post_data);
		$res['Data'] =str_replace('jack888.com:81','ven338.com',$res['Data']);
		//print_r($res);
		return $res;
		/*
		 *  成功：{“result”:true, “url”: “http_url”, params: “parameters”, key: “key”}
        	失败：{“result”: true, “code”: “error_code”, “info”: “failed!”}
		 * */
	}
	//登录捕鱼
	function loginbuyu($username){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$lang='zh-CN';
		$isSpeed=0;
		$isDemo=0;
		$gameType=6;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$lang.$isSpeed.$isDemo.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'userName'=>$username,
		'password'=>$password,
		'lang'=>$lang,
		'gameType'=>$gameType,
		'isSpeed'=>$isSpeed,
		'isDemo'=>$isDemo,
		'code'=>$code
		);
		//print_r($post_data);
		$res = $this->docurl($this->login_url, $post_data);
		$res['Data'] =str_replace('jack888.com:81','ven338.com',$res['Data']);
		//print_r($res);
		return $res;
		/*
		 *  成功：{“result”:true, “url”: “http_url”, params: “parameters”, key: “key”}
        	失败：{“result”: true, “code”: “error_code”, “info”: “failed!”}
		 * */
	}
}





