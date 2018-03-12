<?php
header("content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
class bbapi
{

    public $apiAccount='NGbetxv16';
    public $apiKey='T4J9YYDK6JTeJTgsQMk9na7sCHZR9gKLzVSFMRUXpmVVuDj6UHFvdLYFeFLjfXP4P8HF7GQMX4y2jXA83Yx';
    private $username_prefix = '';

    private $lang = 'zh-CN';//语言
    private $apiUrls  = array(
            'create' => 'http://api.room88.net/api/bbin/register.ashx',
            'balance' => 'http://api.room88.net/api/bbin/balance.ashx ',
            'deposit' => 'http://api.room88.net/api/bbin/deposit.ashx',
            'betRecord' => 'http://api.room88.net/api/bbin/betrecord.ashx',
            'withdrawal' => 'http://api.room88.net/api/bbin/withdrawal.ashx',
            'login' => 'http://api.room88.net/api/bbin/login.ashx',
            'credit' => 'http://api.room88.net/api/bbin/credit.ashx',
    );


    public function credit()
    {
        $salt =$this->getSalt($this->apiAccount);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'code'=>$code);
        $url = $this->apiUrls['credit'];
        return $this->sendRequest($url,$postdata);
    }

	private function getSalt($userName)
    {
		return strtolower(substr(md5($userName),0,5));
	}

    /** 创建用户
     * @param $userName
     * @param $password
     * @return mixed
     */
    public function create($userName)
    {
        global $mysqli;
        $userName = $this->username_prefix.$userName;
        $salt =$this->getSalt($userName);
        $password = substr(md5(md5($userName)),0,12);
        $isDemo = 0;
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$password.$isDemo.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'password'=>$password,
            'isDemo'=>$isDemo,
            'code'=>$code,
        );
        $url = $this->apiUrls['create'];
        $res = $this->sendRequest($url,$postdata);
        //return $res;
        //print_r($res);die;
        if($res['Success'])
        {
            if($mysqli)
            {
                $sql="UPDATE `user_list` SET  `bb_username`='$userName', `bb_password`='$password' WHERE (`user_name`='$userName')";
                $mysqli->query($sql);
            }
            return $res;
        }else
        {
            //注册失败
            return array('code'=>-1,'info'=>'未知错误');
        }
    }

    /** 用户余额
     * @param $userName
     * @param $password
     * @return mixed
     */
    public function balance($userName)
    {
        $userName = $this->username_prefix.$userName;
        $salt =$this->getSalt($userName);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'code'=>$code);
        $url = $this->apiUrls['balance'];
        return $this->sendRequest($url,$postdata);
    }

    /** 登陆
     * @param $userName
     * @param $password
     * @param string $site
     * @return mixed
     */
    public function login($userName,$site='live')
    {
        $userName = $this->username_prefix.$userName;
        $salt =$this->getSalt($userName);
		$password = substr(md5(md5($userName)),0,12);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$password.$this->lang.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'password'=>$password,
            'lang'=>$this->lang,
            'pageSite' => $site,
            'code'=>$code);
        $url = $this->apiUrls['login'];

        return $this->sendRequest($url,$postdata);
    }

    /** 提现
     * @param $userName
     * @param $amount
     * @param $billno
     * @param string $method
     * @return mixed
     */
    public function withdrawal($userName,$amount,$billno)
    {
        $userName = $this->username_prefix.$userName;
        $salt =$this->getSalt($userName);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$billno.$amount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'transSN'=>$billno,
            'amount'=>$amount,
            'code'=>$code);
        $url = $this->apiUrls['withdrawal'];
        return $this->sendRequest($url,$postdata);
    }
	/** 提现
     * @param $userName
     * @param $amount
     * @param $billno
     * @param string $method
     * @return mixed
     */
    public function deposit($userName,$amount,$billno)
    {
        $userName = $this->username_prefix.$userName;
        $salt =$this->getSalt($userName);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$billno.$amount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'transSN'=>$billno,
            'amount'=>$amount,
            'code'=>$code);
        $url = $this->apiUrls['deposit'];
        return $this->sendRequest($url,$postdata);
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
	
	public  function getGameRecord($roundDate, $startTime , $endTime, $gameKind,$subGameKind,$gameType,$pageIndex,$pageSize){
		$salt =$this->getSalt(''.time());
         $code = $salt.md5($this->apiKey.$this->apiAccount.$roundDate.$startTime.$endTime.$gameKind.$gameType.$subGameKind.$pageIndex.$pageSize.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'roundDate'=>$roundDate,
            'startTime'=>$startTime,
            'endTime'=>$endTime,
            'gameKind'=>$gameKind,
            'subGameKind'=>$subGameKind,
            'gameType'=>$gameType,
            'pageIndex'=>$pageIndex,
            'pageSize'=>$pageSize,
            'code'=>$code);
        $url = $this->apiUrls['betRecord'];
        return $this->sendRequest($url,$postdata);
	}
}

/*$obj = new bbapi();
$res = $obj->create('1nikan');
print_r($res);*/
?>