<?php
class mgapi{
    public $apiAccount='NGtaiyang02';
    public $apiKey='VL8uDPH9ZudFDTFcZFtpM9vXVt3uyKCg7aVh6TXFmwAQmUkVcXaAjpx6';
    private $currency='8';
    private $bettingProfileID='370';
    private $lang = 'zh-CN';//语言
    private $apiUrls  = array(
        'getGUID' => 'http://api.room88.net/api/mg/sessionguid.ashx',
        'create' => 'http://api.room88.net/api/mg/register.ashx',
        'balance' => 'http://api.room88.net/api/mg/balance.ashx ',
        'deposit' => 'http://api.room88.net/api/mg/deposit.ashx',
        'withdrawal' => 'http://api.room88.net/api/mg/withdrawal.ashx',
        'loginLive' => 'http://api.room88.net/api/mg/loginlive.ashx',
        'loginSlot' => 'http://api.room88.net/api/mg/loginelectronic.ashx',
        'getCurrenciesForDeposit' => 'http://api.room88.net/api/mg/getcurrenciesfordeposit.ashx',
        'getGameRecord' => 'http://api.room88.net/api/mg/gameplaydetailed.ashx',
        'getSlotGameList' => 'http://api.room88.net/api/mg/GetGameList.ashx',
        'getCurrenciesForAddAccount' => 'http://api.room88.net/api/mg/getcurrenciesforaddaccount.ashx',
        'getBettingProfileList' => 'http://api.room88.net/api/mg/getbettingprofilelist.ashx',
        'credit' => 'http://api.room88.net/api/mg/credit.ashx',
        'loginForWap' => 'http://api.room88.net/api/mg/mobilelogin.ashx',
        'betrecord' => 'http://api.room88.net/api/mg/betrecord.ashx');

    private function getSalt($userName){
        return substr(md5($userName),0,5);
    }

    /** 获取GUID

     * @return GUID
     */
    public function getGUID()
    {
        $salt = $this->getSalt(''.time());
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'code'=>$code);
        $url = $this->apiUrls['getGUID'];
        return $this->sendRequest($url,$postdata);
    }

    /** 登陆
     * @param $userName
     * @param $password
     * @param string $site
     * @param int $isDemo
     * @return mixed
     */
    public function loginForWap($userName,$gameType,$gameName)
    {
        $salt =$this->getSalt($userName);
        $password = substr(md5(md5($userName)),0,12);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$password.$gameName.$this->lang.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'password'=>$password,
            'gameType'=>$gameType,
            'gameName'=>$gameName,
            'lang'=>$this->lang,
            'code'=>$code);
        $url = $this->apiUrls['loginForWap'];
        return $this->sendRequest($url,$postdata);
    }

    /** 登陆
     * @param $userName
     * @param $password
     * @param string $site
     * @param int $isDemo
     * @return mixed
     */
    public function loginLive($userName)
    {
        $salt =$this->getSalt($userName);
        $password = substr(md5(md5($userName)),0,12);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$password.$this->lang.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'password'=>$password,
            'lang'=>$this->lang,
            'code'=>$code);
        $url = $this->apiUrls['loginLive'];
        return $this->sendRequest($url,$postdata);
    }

    /** 创建用户
     * @param $userName
     * @param $password
     * @param int $isDemo
     * @return mixed
     */
    public function create($userName,$sessionGUID)
    {
        $salt = $this->getSalt($userName);
        $password = substr(md5(md5($userName)),0,12);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$password.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'currency'=>$this->currency,
            'bettingProfileID'=>$this->bettingProfileID,
            'sessionGUID'=>$sessionGUID,
            'Password'=>$password,
            'code'=>$code);
        $url = $this->apiUrls['create'];
        return $this->sendRequest($url,$postdata);
    }

    /** 用户余额
     * @param $userName
     * @param $password
     * @param int $isDemo
     * @return mixed
     */
    public function balance($userName,$sessionGUID)
    {
        $salt =$this->getSalt($userName);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['balance'];
        return $this->sendRequest($url,$postdata);
    }



    /** 登陆
     * @param $userName
     * @param $password
     * @param string $site
     * @param int $isDemo
     * @return mixed
     */
    public function loginSlot($userName,$gameName)
    {
        $salt =$this->getSalt($userName);
        $password = substr(md5(md5($userName)),0,12);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$password.$gameName.$this->lang.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'password'=>$password,
            'gameName'=>$gameName,
            'lang'=>$this->lang,
            'code'=>$code);
        $url = $this->apiUrls['loginSlot'];
        return $this->sendRequest($url,$postdata);
    }

    /** 提现
     * @param $userName
     * @param $amount
     * @param $billno
     * @param string $method
     * @param int $isDemo
     * @return mixed
     */
    public function withdrawal($userName,$amount,$sessionGUID)
    {
        $salt =$this->getSalt($userName);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$amount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'amount'=>$amount,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['withdrawal'];
        return $this->sendRequest($url,$postdata);
    }
    public function deposit($userName,$amount,$sessionGUID)
    {
        $salt =$this->getSalt($userName);
        $code = $salt.md5($this->apiKey.$this->apiAccount.$userName.$amount.$salt);
        $postdata = array(
            'currency'=>$this->currency,
            'apiAccount'=>$this->apiAccount,
            'userName'=>$userName,
            'amount'=>$amount,
            'sessionGUID'=>$sessionGUID,
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
        /* echo "<br>  URL ========= ".$url."<br>";
        echo "<br>  post_data ========= ".$url."<br>";
        print_r($post_data);
        echo "<br> return_data ========= <br>";
        print_r($res);
  */
        return json_decode($res,true);
    }

    function getGameRecord($dateFrom,$pageIdx,$pageSize,$sessionGUID){
        $salt =$this->getSalt(''.time());
        $dateFrom .= ' 00:00:00';
        $code = $salt.md5($this->apiKey.$this->apiAccount.$dateFrom.$dateTo.$pageIdx.$pageSize.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'dateFrom'=>$dateFrom,
            'pageSize'=>$pageSize,
            'pageIndex'=>$pageIdx,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['getGameRecord'];
        return $this->sendRequest($url,$postdata);
    }


    function betrecord($dateFrom,$dateTo,$pageIdx,$pageSize,$sessionGUID){
        $salt =$this->getSalt(''.time());
        $dateFrom .= ' 00:00:00';
        $code = $salt.md5($this->apiKey.$this->apiAccount.$dateFrom.$dateTo.$pageIdx.$pageSize.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'dateFrom'=>$dateFrom,
            'dateTo'=>$dateTo,
            'pageSize'=>$pageSize,
            'pageIndex'=>$pageIdx,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['betrecord'];
        return $this->sendRequest($url,$postdata);
    }

    function getSlotGameList($sessionGUID){
        $salt = $this->getSalt(''.time());
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['getSlotGameList'];
        return $this->sendRequest($url,$postdata);
    }

    function getCurrencyLists($sessionGUID){
        $salt = $this->getSalt(''.time());
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['getCurrenciesForAddAccount'];
        return $this->sendRequest($url,$postdata);
    }

    function getBettingList($sessionGUID){
        $salt = $this->getSalt(''.time());
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['getBettingProfileList'];
        return $this->sendRequest($url,$postdata);
    }

    function getCurrenciesForDeposit($sessionGUID){
        $salt = $this->getSalt(''.time());
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'sessionGUID'=>$sessionGUID,
            'code'=>$code);
        $url = $this->apiUrls['getCurrenciesForDeposit'];
        return $this->sendRequest($url,$postdata);
    }

    function getSlotStyle($imgPath){
        return "background-image: url(MgGame/MgImg/$imgPath);";

    }

    function credit(){
        $salt = $this->getSalt(''.time());
        $code = $salt.md5($this->apiKey.$this->apiAccount.$salt);
        $postdata = array(
            'apiAccount'=>$this->apiAccount,
            'code'=>$code);
        $url = $this->apiUrls['credit'];
        return $this->sendRequest($url,$postdata);
    }

}
/*$mgapi = new mgapi();
$from= "2016-07-07 00:00:01";
$pageIndex="1";
$pageSize="100";
$ret = $mgapi -> getGameRecord($from,$pageIndex,$pageSize,'a1e0f5db-5033-4efd-816b-0560c3551b51');
$records = $ret['Data'];

foreach($records as $key=> $val){
  $record = $records[$kdy];
  $accNo = '\''+substr($record['AccountNo'],2)+'\'';
  $rDate = '\''+str_replace($record['Date'],'T',' ')+'\'';
  $rGame = '\''+$record['Game']+'\'';
  $rCurrency = '\''+$record['Currency']+'\'';
  $rNumGames = '\''+$record['NumberOfGames']+'\'';
  $rBetBets = '\''+$record['NumberOfBet']+'\'';
  $rBetAmount = $record['BetAmount'];
  $rPayoutAmount = $record['PayoutAmount'];
  $rGGRAmount = $record['GGRAmount'];
  $intSql = "insert into api_mgbetdetail (AccountNo,Date,Game,Currency,NumberOfGames,NumberOfBet,BetAmount,PayoutAmount,GGRAmount) VALUES ($accNo,$rDate,$rGame,$rCurrency,$rNumGames,$rBetBets,$rBetAmount,$rPayoutAmount,$rGGRAmount)";
  echo $intSql;
}
*/
/*$mgapi -> getCurrenciesForDeposit('dc2a2298-7ebf-4f00-912b-b9b10af74677');

 $games = $mgapi -> getSlotGameList('10fe8ed9-1ad2-431c-96c9-8e0872b762d8');
$data =  $games['Data'];
$datas = json_decode($data,true);
echo '<br>';

$strGames = "";
foreach($datas as $key=> $val){
  $obj = $datas[$key];
  $strModel = '<li data-group="'.$obj['CategoryID'].'"  style="display:none" class="active" > <div class="slotMgGames"><div class="gameImg" data-game= "'.$obj['GameName'].'" style = "'.$mgapi->getSlotStyle($obj['ImageFileName']);
  $strModel .= '" ></div><div class="slotMgDescs"> <div class="games1Title">';
  $strModel .= $obj['GameNameCN'];
  $strModel .= '</div> <div class="games1Play"><span> <a href="#" onclick="openMGSlotGame(\'';
  $strModel .= $obj['GameName'];
  $strModel .= '\');">开始游戏</a></span></div> </div> </div> </li>';
  $strGames .= $strModel;
}
echo $strGames;  */
//print_r($datas);

/*$currencys =  $mgapi -> getCurrencyLists('10fe8ed9-1ad2-431c-96c9-8e0872b762d8');
print_r($currencys);*/
//print_r($mgapi -> getGUID());
//$betLists =  $mgapi -> getBettingList('10fe8ed9-1ad2-431c-96c9-8e0872b762d8');

?>