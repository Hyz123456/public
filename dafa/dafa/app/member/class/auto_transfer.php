<?php
header("content-type:text/html;charset=utf-8");
include_once(auto_transfer::getRootDir()."/app/member/include/config.inc.php");
//自动转账模块
class auto_transfer
{
    const NO_GAME = 0;
    const AG = 1;
    const BBIN = 2;
    const MG = 3;
    const PT = 4;
    const DAXIONG = 5;
    const VG = 6;

    const AUTO_ON_OFF = false;

    public static function getUserInfo($userId)
    {
        global $mysqli;
        $sql = "select * from user_list u where u.user_id='".$userId."' limit 0,1";
        $query	=	$mysqli->query($sql);
        $user_info    =	$query->fetch_array();
        return $user_info;
    }

    //踢下线有些游戏不下线不能自动转账的
    public static function kickOff()
    {
    }

    //将上一个游戏的余额转出到系统
    public static function beforeGameOut($userId,$gameType=0)
    {
        global $mysqli;
        $sql = 'SELECT user_id,user_name,money,last_game FROM user_list WHERE  user_id = "'.$userId.'"';
        $query = $mysqli->query($sql);
        $user_info    =	$query->fetch_array();
        if(!empty($user_info)
            && (intval($user_info['last_game']) != self::NO_GAME)
            && ($gameType!= $user_info['last_game'])
        )
        {
            switch($user_info['last_game'])
            {
                case self::AG:
                    self::agOut($user_info);
                    break;
                case self::BBIN:
                    self::bbinOut($user_info);
                    break;
                case self::MG:
                    self::mgOut($user_info);
                    break;
                case self::PT:
                    self::ptOut($user_info);
                    break;
                default;
            }
        }
    }

    public static function getRootDir()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function randomkeys($length)
    {
        $key='';
        $pattern='1234567890';
        for($i=0;$i<$length;$i++)
        {
            $key .= $pattern{mt_rand(0,9)};
        }
        return $key;
    }

    public static function agToGame($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newag2/agapi.php");
        $alert=false;
        $username = $row['user_name'];
        $agapi = new agapi();
        $agRet = $agapi->balance_one($username);
        if($agRet['Success'] == false)
        {
            $agapi->register($username);
            $agRet = $agapi->balance_one($username);
        }
        if($agRet['Success'] && ($row['money'] > 0))
        {
            //传参转账
            if($pay_value > 0)
            {
                $alert=true;
                $conver=doubleval($pay_value);
            }
            else
                //自动转账
            {
                $conver=doubleval($row['money']);
            }
            $billno = time() . rand(100000, 999999);
            $zzmoney=$conver;
            $pay_value  =   0-$conver;
            $about="主账户->AG大厅";
            $agapi = new agapi();
            $trans_result = $agapi->trans_in($username,$conver,$billno);
            $result = false ;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "vd";
            $liveTypeInfo = 'AG';
            if($result==1)
            {
                //将余额转入ag游戏
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::AG);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }

    public static function vgToGame($row,$pay_value=0,$jsAlert=false)
    {
        include_once(self::getRootDir()."/vg/vgapi.php");
        $alert=false;
        $username = $row['user_name'];
        $agapi = new vgapi();
        $agRet = $agapi->balance($username);
        if(!isset($agRet['response']['errcode']) OR $agRet['response']['errcode'] != 0)
        {
            $agRet = $agapi->create($username);
            //$agRet = $agapi->balance($username);
        }
        if((isset($agRet['response']['errcode']) && $agRet['response']['errcode'] == 0) && ($row['money'] > 0))
        {
            //传参转账
            if($pay_value > 0)
            {
                $alert=true;
                $conver=doubleval($pay_value);
            }
            else
                //自动转账
            {
                $conver=doubleval($row['money']);
            }

            if($alert){
                $zzmoney=$conver;
                $pay_value  =   0-$conver;
                $about="主账户->VG棋牌";
                $trans_result = $agapi->deposit($username,$conver);
                $result = false ;
                if(isset($trans_result['response']['errcode']) && $trans_result['response']['errcode'] == 0)
                {
                    $result = 1;
                }
                $zzTypeInfo = "vd";
                $liveTypeInfo = 'AG';
                if($result==1)
                {
                    //将余额转入ag游戏
                    self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::VG);
                    if($alert)
                    {
                        if($jsAlert)
                        {
                            exit("<script>alert('额度转换成功！');history.back();</script>");
                        }else{
                            exit($about.'额度转换成功！');
                        }

                    }
                }
                else
                {
                    if($jsAlert)
                    {
                        exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
                    }else{
                        exit($about.'额度转入失败,请稍候尝试！');
                    }
                }
            }

        }
    }

    public static function vgOut($row,$pay_value=0,$jsAlert=false)
    {
        include_once(self::getRootDir()."/vg/vgapi.php");
        $username = $row['user_name'];
        $agapi = new vgapi();
        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {
            $agRet = $agapi->balance($username);
            if(!isset($agRet['response']['errcode']) OR $agRet['response']['errcode'] != 0)
            {
                $agapi->create($username);
                $agRet = $agapi->balance($username);
            }
            $currAmt = $agRet['response']['result'];
        }

        if($currAmt > 0 && $alert)
        {
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "VG棋牌->主账户";
            $pay_value=$conver;
            $trans_result = $agapi->withdraw($username,$zzmoney);
            $result = false ;
            if(isset($trans_result['response']['errcode']) && $trans_result['response']['errcode'] == 0)
            {
                $result = 1;
            }
            $zzTypeInfo = "w";
            $liveTypeInfo = 'AG';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    if($jsAlert)
                    {
                        exit("<script>alert('额度转换成功！');history.back();</script>");
                    }else{
                        exit($about.'额度转换成功！');
                    }
                }
            }
            else
            {
                if($jsAlert)
                {
                    exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
                }else{
                    exit($about.'额度转入失败,请稍候尝试！');
                }
            }
        }
    }

    public static function agPlatformMoney()
    {
        include_once(self::getRootDir()."/newag2/agapi.php");
        $agapi = new agapi();
        $agRet = $agapi->credit();
        if($agRet['Success'] == false)
        {
            return "0.00";
        }
        else
        {
            $currAmt = $agRet['Data']['Credit'];
            return sprintf("%.2f", $currAmt);
        }
    }

    public static function agOut($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newag2/agapi.php");
        $username = $row['user_name'];
        $agapi = new agapi();
        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {
            $agRet = $agapi->balance_one($username);
            if($agRet['Success'] == false)
            {
                $agapi->register($username);
                $agRet = $agapi->balance_one($username);
            }
            $currAmt = $agRet['Data'];
        }

        if($currAmt > 0)
        {
            $billno = time() . rand(100000, 999999);
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "AG大厅->主账户";
            $pay_value=$conver;
            $trans_result = $agapi->trans_out($username,$zzmoney,$billno);
            $result = false ;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "w";
            $liveTypeInfo = 'AG';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }

    public static function getAgBalance($username)
    {
        if(empty($username))
        {
            return json_encode(array('general'=>sprintf("%.2f",0)));
        }
        include_once(self::getRootDir()."/newag2/agapi.php");
        $agapi = new agapi();
        $agRet = $agapi->balance_one($username);
        if($agRet['Success'] == false)
        {
            $agapi->register($username);
            $ag_balance = 0;
        }
        else
        {
            $ag_balance = $agRet['Data'];
        }
        return json_encode(array('general'=>sprintf("%.2f",$ag_balance)));
    }

    public static function getDaXiongBalance($username)
    {
        if(empty($username))
        {
            return json_encode(array('general'=>sprintf("%.2f",0)));
        }
        include_once(self::getRootDir()."/dx/dxUtils.php");
        $agapi = new daXiong();
        $agRet = $agapi->balance($username);
        if($agRet['resultCode'] != 1)
        {
            $ag_balance = 0;
        }
        else
        {
            $ag_balance = $agRet['coinBalance'];
        }
        return json_encode(array('general'=>sprintf("%.2f",$ag_balance)));
    }

    public static function getPtBalance($username)
    {
        if(empty($username))
        {
            return json_encode(array('general'=>sprintf("%.2f",0)));
        }
        include_once(self::getRootDir()."/newpt2/ptapi.php");
        $ptapi = new ptapi();
        $ptRet = $ptapi->balance_one($username);
        if($ptRet['Success'] == false)
        {
            $pt_balance = 0;
        }
        else
        {
            $pt_balance = $ptRet['Data']['Balance'];
        }
        return json_encode(array('general'=>sprintf("%.2f",$pt_balance)));
    }

    public static function getBBINBalance($username)
    {
        if(empty($username))
        {
            return json_encode(array('general'=>sprintf("%.2f",0)));
        }
        include_once(self::getRootDir()."/newbbin2/bbapi.php");
        $bbapi = new bbapi();
        $bbRet = $bbapi->balance($username);
        if($bbRet['Success'] == false){
            $bbapi->create($username);
            $currAmt = 0;
        }else{
            $currAmt = $bbRet['Data'];
        };
        return json_encode(array('general'=>sprintf("%.2f",$currAmt)));
    }


    public static function bbinToGame($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newbbin2/bbapi.php");
        $alert=false;
        $username = $row['user_name'];
        $bbapi = new bbapi();
        $bbRet = $bbapi->balance($username);
        if($bbRet['Success'] == false)
        {
            $bbapi->create($username);
            $bbRet = $bbapi->balance($username);
        }
        if($bbRet['Success'] && $row['money'] > 0)
        {
            //传参转账
            if($pay_value > 0)
            {
                $alert=true;
                $conver=doubleval($pay_value);
            }
            else
                //自动转账
            {
                $conver=doubleval($row['money']);
            }
            $zzmoney=$conver;
            $about = "主账户->BBIN";
            $billno = time() . rand(100000, 999999);
            $pay_value  =   0-$conver;
            $trans_result = $bbapi->deposit($username,$conver,$billno);
            $result = false ;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "bd";
            $liveTypeInfo = 'BBIN';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::BBIN);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit($about.'信用额度不足！');
                //exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit($about.'额度转入失败,请稍候尝试！');
                //exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }

    public static function bbinOut($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newbbin2/bbapi.php");
        $username = $row['user_name'];
        $bbapi = new bbapi();
        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {
            $bbRet = $bbapi->balance($username);
            if($bbRet['Success'] == false)
            {
                $bbapi->create($username);
                $bbRet = $bbapi->balance($username);
            }
            $currAmt = $bbRet['Data'];
        }

        if($currAmt > 0)
        {
            $billno = time() . rand(100000, 999999);
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "BBIN->主账户";
            $pay_value=$conver;
            $trans_result = $bbapi->withdrawal($username,$conver,$billno);
            $result = false;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "bw";
            $liveTypeInfo = 'BBIN';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }

    public static function daXiongOut($row,$pay_value=0,$jsAlert=false)
    {
        include_once(self::getRootDir()."/dx/dxUtils.php");
        $username = $row['user_name'];
        $bbapi = new daXiong();
        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {
            $bbRet = $bbapi->balance($username);
            if($bbRet['resultCode'] != 1)
            {
                $bbapi->create($username);
                $bbRet = $bbapi->balance($username);
            }
            $currAmt = $bbRet['coinBalance'];
        }

        if($currAmt > 0 && $alert)
        {
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "大熊棋牌->主账户";
            $pay_value=$conver;
            $trans_result = $bbapi->withdraw($username,$conver);
            $result = false;
            if($trans_result['resultCode'] == 1)
            {
                $result = 1;
            }
            $zzTypeInfo = "bwdx";
            $liveTypeInfo = '大熊棋牌';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    if($jsAlert)
                    {
                        exit($about."<script>alert('额度转换成功！');history.back();</script>！");
                    }else{
                        exit($about.'额度转换成功！');
                    }
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                if($jsAlert)
                {
                    exit("<script>alert('信用额度不足！');history.back();</script>");
                }else{
                    exit("信用额度不足");
                }
            }
            else
            {
                if($jsAlert)
                {
                    exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
                }else{
                    exit("额度转入失败,请稍候尝试!");
                }

            }
        }
    }

    public static function daXiongToGame($row,$pay_value=0,$jsAlert = false)
    {
	
        include_once(self::getRootDir()."/dx/dxUtils.php");
        $alert=false;
        $username = $row['user_name'];
        $bbapi = new daXiong();
        $bbRet = $bbapi->balance($username);
        if($bbRet['resultCode'] != 1)
        {
            $bbapi->create($username);
            $bbRet = $bbapi->balance($username);
        }
	

        if($bbRet['resultCode'] == 1 && $row['money'] > 0)
        {
            //传参转账
            if($pay_value > 0)
            {
                $alert=true;
                $conver=doubleval($pay_value);
            }
            else
                //自动转账
            {
                $conver=doubleval($row['money']);
            }

            if($alert)
            {
                $zzmoney=$conver;
                $about = "主账户->大熊棋牌";
                $pay_value  =   0-$conver;
                $trans_result = $bbapi->deposit($username,$conver);
				
                $result = false ;
                if($trans_result['resultCode'] == 1)
                {
                    $result = 1;
                }
                $zzTypeInfo = "bddx";
                $liveTypeInfo = '大熊棋牌';
                if($result==1)
                {
                    self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::DAXIONG);
                    if($alert)
                    {
                        if($jsAlert)
                        {
                            exit($about."<script>alert('额度转换成功！');history.back();</script>！");
                        }else{
                            exit($about.'额度转换成功！');
                        }

                    }
                }
                elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
                {
                    if($jsAlert)
                    {
                        exit("<script>alert('信用额度不足！');history.back();</script>");
                    }else{
                        exit("信用额度不足");
                    }

                }
                else
                {

                    if($jsAlert)
                    {
                        exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
                    }else{
                        exit("额度转入失败,请稍候尝试!");
                    }

                }
            }

        }
    }

    public static function bbinPlatformMoney()
    {
        include_once(self::getRootDir()."/newbbin2/bbapi.php");
        $bbapi = new bbapi();
        $bbRet = $bbapi->credit();

        if($bbRet['Success'] == false)
        {
            return "0.00";
        }
        else
        {
            $currAmt = $bbRet['Data']['Credit'];
            return sprintf("%.2f", $currAmt);
        }
    }

    public static function mgPlatformMoney()
    {
        include_once(self::getRootDir()."/newmg2/mgapi.php");
        $mgapi = new mgapi();
        $mgRet = $mgapi->credit();
        if($mgRet['Success'] == false)
        {
            return "0.00";
        }
        else
        {
            $currAmt = $mgRet['Data']['Credit'];
            return sprintf("%.2f", $currAmt);
        }
    }

    public static function ptPlatformMoney()
    {
        include_once(self::getRootDir()."/newpt2/ptapi.php");
        $ptapi = new ptapi();
        $ptRet = $ptapi->credit();
        if($ptRet['Success'] == false)
        {
            return "0.00";
        }
        else
        {
            $currAmt = $ptRet['Data']['Credit'];
            return sprintf("%.2f", $currAmt);
        }
    }

    public static function money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,$last_game=self::NO_GAME)
    {
        global $mysqli;
        $username = $row['user_name'];
        $uid = $row['user_id'];
        try
        {
            $mysqli->autocommit(FALSE);
            $mysqli->query("BEGIN");
            $sql="update user_list set last_game = ".$last_game.", money=money+ ".$pay_value." where user_id='$uid'";
            $mysqli->query($sql);
            $q1=$mysqli->affected_rows;
            $change_money = intval($pay_value);
            $assets = $row["money"];
            $datereg=   date("YmdHis").self::randomkeys(4);
            $balance = $assets-$change_money;
            $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance');";
            $mysqli->query($sql) or die($sql);
            $q2=$mysqli->affected_rows;
            if($q1==1 && $q2==1)
            {
                $sql  = "INSERT INTO `live_log` (`order_num`, `live_type`, `zz_type`, `user_id`, `live_username`, `zz_money`, `status`, `result`, `add_time`, `do_time`) ";
                $sql .=  " VALUES";
                $sql .= "('$datereg', '$liveTypeInfo', '$zzTypeInfo', '$uid', '$username', '$zzmoney', '1', '成功',now(),now());";
                $mysqli->query($sql) or die($sql);
                $mysqli->commit();
            }
            else
            {
                $mysqli->rollback(); //数据回滚
                exit("<script>alert('由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服！');history.back();</script>");
            }
        }
        catch(Exception $e)
        {
            $mysqli->rollback();
            exit("<script>alert('数据异常！');history.back();</script>");
        }
    }

    public static function mgToGame($userinfo,$pay_value=0,$game_name='',$jsAlert=false)
    {
        include_once(self::getRootDir()."/newmg2/mgapi.php");
        $mgapi = new mgapi();
        $username=$userinfo["user_name"];
        $qGuid='';
        $guids = $_SESSION["userGUID"];
        if('' == $guids)
        {
            $mgguid = $mgapi->getGUID();
            $qGuid =$mgguid['Data'];
            $guids = array(time(),$qGuid);
            $_SESSION["userGUID"]= $guids;
        }else
        {
            $keys = array_keys($guids);
            $curTime = time();
            $guidTime = $guids[$keys[0]];
            if($curTime-$guidTime > 3000)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid = $mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
            }
            $qGuid = $guids[$keys[1]];
        }

        $mgRet = $mgapi->balance($username,$qGuid);
        if($mgRet['Success'] == false)
        {
            if($mgRet['Code'] == 6)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid =$mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
                $mgRet = $mgapi->balance($username,$qGuid);
                $currAmt = $mgRet['Data'];
            }
            else
            {
                $mgapi->create($username,$qGuid);
            }
        }
        else
        {
            $currAmt = $mgRet['Data'];

            //自动转账到mg---------------------------------------
            $alert=false;
            $username = $userinfo['user_name'];

            if($mgRet['Success'] && $userinfo['money'] > 0)
            {
                //传参转账
                if($pay_value > 0)
                {
                    $alert=true;
                    $conver=doubleval($pay_value);
                }
                else
                    //自动转账
                {
                    $conver=doubleval($userinfo['money']);
                }

                if($alert)
                {
                    $zzmoney=$conver;
                    $about = "主账户->MG";
                    //$billno = time() . rand(100000, 999999);
                    $pay_value  =   0-$conver;
                    $trans_result = $mgapi->deposit($username,$conver,$qGuid);

                    $result = false ;
                    if($trans_result['Success'] == true)
                    {
                        $result = 1;
                    }
                    $zzTypeInfo = "mgbd";
                    $liveTypeInfo = 'MG';
                    if($result==1)
                    {
                        self::money_change($userinfo,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::MG);
                        if($alert)
                        {
                            if($jsAlert)
                            {
                                exit($about."<script>alert('额度转换成功！');history.back();</script>！");
                            }else{
                                exit($about.'额度转换成功！');
                            }
                        }
                    }
                    elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
                    {
                        if($jsAlert)
                        {
                            exit("<script>alert('信用额度不足！');history.back();</script>");
                        }else{
                            exit($about.'信用额度不足！');
                        }

                    }
                    else
                    {
                        if($jsAlert)
                        {

                            exit("<script>alert('额度转入失败,请稍候尝试！');history.back();</script>");
                        }else{
                            exit($about.'额度转入失败,请稍候尝试！');
                        }
                    }
                }

            }

        }

        $mgRet = $game_name ? $mgapi->loginSlot($username,$game_name) : $mgapi->loginLive($username);
        if($mgRet['Code'] == 4)
        {
            $qGuid='';
            $guids = $_SESSION["userGUID"];
            if('' == $guids)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid =$mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
            }
            else
            {
                $keys = array_keys($guids);
                $curTime = time();
                $guidTime = $guids[$keys[0]];
                if($curTime-$guidTime > 3000)
                {
                    $mgguid = $mgapi->getGUID();
                    $qGuid = $mgguid['Data'];
                    $guids = array(time(),$qGuid);
                    $_SESSION["userGUID"]= $guids;
                }
                $qGuid = $guids[$keys[1]];
            }
            $mgapi->create($username,$qGuid);
            $mgRet = $mgapi->loginLive($username);
            if($mgRet['Code'] == 6)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid =$mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
                $mgRet = $mgapi->loginSlot($username,$game_name);
            }

        }
        $url = $mgRet['Data'];
        return $url;
    }

    public static function getMgBalance($username)
    {
        if(empty($username))
        {
            return json_encode(array('general'=>sprintf("%.2f",0)));
        }

        include_once(self::getRootDir()."/newmg2/mgapi.php");
        $mgapi = new mgapi();
        $qGuid='';
        $guids = $_SESSION["userGUID"];
        if('' == $guids)
        {
            $mgguid = $mgapi->getGUID();
            $qGuid =$mgguid['Data'];
            $guids = array(time(),$qGuid);
            $_SESSION["userGUID"]= $guids;
        }else
        {
            $keys = array_keys($guids);
            $curTime = time();
            $guidTime = $guids[$keys[0]];
            if($curTime-$guidTime > 3000)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid = $mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
            }
            $qGuid = $guids[$keys[1]];
        }

        $mgRet = $mgapi->balance($username,$qGuid);
        if($mgRet['Success'] == false)
        {
            if($mgRet['Code'] == 6)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid =$mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
                $mgRet = $mgapi->balance($username,$qGuid);
                $currAmt = $mgRet['Data'];
            }
            else
            {
                $mgapi->create($username,$qGuid);
                //$mgRet = $mgapi->balance($username,$qGuid);
                $currAmt = 0;
            }
        }
        else
        {
            $currAmt = $mgRet['Data'];
        }
        return json_encode(array('general'=>sprintf("%.2f",$currAmt)));
    }


    //mg转出
    public static function mgOut($row,$pay_value=0,$jsAlert=false)
    {
        include_once(self::getRootDir()."/newmg2/mgapi.php");
        $username = $row['user_name'];
        $mgapi = new mgapi();
        $qGuid='';
        $guids = $_SESSION["userGUID"];
        if('' == $guids)
        {
            $mgguid = $mgapi->getGUID();
            $qGuid =$mgguid['Data'];
            $guids = array(time(),$qGuid);
            $_SESSION["userGUID"]= $guids;
        }else
        {
            $keys = array_keys($guids);
            $curTime = time();
            $guidTime = $guids[$keys[0]];
            if($curTime-$guidTime > 3000)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid = $mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
            }
            $qGuid = $guids[$keys[1]];
        }

        $mgRet = $mgapi->balance($username,$qGuid);
        if($mgRet['Success'] == false)
        {
            if($mgRet['Code'] == 6)
            {
                $mgguid = $mgapi->getGUID();
                $qGuid =$mgguid['Data'];
                $guids = array(time(),$qGuid);
                $_SESSION["userGUID"]= $guids;
                $mgRet = $mgapi->balance($username,$qGuid);
                $currAmt = $mgRet['Data'];
            }
            else
            {
                $mgapi->create($username,$qGuid);
                $currAmt = 0;
            }
        }
        else
        {
            $currAmt = $mgRet['Data'];
        }

        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {

            //$currAmt = $currAmt;
        }

        if($currAmt > 0 && $alert)
        {
            $billno = time() . rand(100000, 999999);
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "MG->主账户";
            $pay_value=$conver;
            $trans_result = $mgapi->withdrawal($username,$conver,$qGuid);
            $result = false;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "mgbw";
            $liveTypeInfo = 'MG';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    if($jsAlert)
                    {
                        exit("<script>alert('额度转换成功！');history.back();</script>");
                    }else{
                        exit($about.'额度转换成功！');
                    }
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                if($jsAlert)
                {
                    exit("<script>alert('信用额度不足！');history.back();</script>");
                }else{
                    exit($about.'信用额度不足！');
                }

            }
            else
            {
                if($jsAlert)
                {
                    exit("<script>alert('额度转入失败,请稍候尝试！');history.back();</script>");
                }else{
                    exit($about.'额度转入失败,请稍候尝试！');
                }
            }
        }
    }

    public static function ptToGame($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newpt2/ptapi.php");
        $alert=false;
        $username = $row['user_name'];
        $ptapi = new ptapi();
        $ptRet = $ptapi->balance_one($username);

        if($ptRet['Success'] == false)
        {
            $pay_value > 0 ?  exit("需进入PT游戏才可开通帐号！") : exit("<script>alert('需进入PT游戏才可开通帐号！');history.back();</script>");
        }
        if($ptRet['Success'] && $row['money'] > 0)
        {
            //传参转账
            if($pay_value > 0)
            {
                $alert=true;
                $conver=doubleval($pay_value);
            }
            else
                //自动转账
            {
                $conver=doubleval($row['money']);
            }
            $zzmoney=$conver;
            $about = "主账户->PT";
            $billno = time() . rand(100000, 999999);
            $pay_value  =   0-$conver;
            $trans_result = $ptapi->trans_in($username,$conver,$billno);
            $result = false ;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "ptbd";
            $liveTypeInfo = 'PT';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::PT);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }


    public static function ptOut($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newpt2/ptapi.php");
        $username = $row['user_name'];
        $ptapi = new ptapi();
        $ptRet = $ptapi->balance_one($username);
        if($ptRet['Success'] == false)
        {
            $pay_value > 0 ?  exit("需进入PT游戏才可开通帐号！") : exit("<script>alert('需进入PT游戏才可开通帐号！');history.back();</script>");
        }
        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {
            $currAmt = $ptRet['Data'];
        }

        if($currAmt > 0)
        {
            $billno = time() . rand(100000, 999999);
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "PT->主账户";
            $pay_value=$conver;
            $trans_result = $ptapi->trans_out($username,$conver,$billno);
            $result = false;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "bwpt";
            $liveTypeInfo = 'PT';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }





    public static function ALLBetToGame($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newab2/abapi.php");
        $alert=false;
        $username = $row['user_name'];
        $abapi = new abapi();
        $abRet = $abapi->balance_one($username);
        if($abRet['Success'] == false)
        {
            $abapi->register($username);
            $abRet = $abapi->balance_one($username);
        }
        if($abRet['Success'] && $row['money'] > 0)
        {
            //传参转账
            if($pay_value > 0)
            {
                $alert=true;
                $conver=doubleval($pay_value);
            }
            else
                //自动转账
            {
                $conver=doubleval($row['money']);
            }
            $zzmoney=$conver;
            $about = "主账户->ALLBet";
            $billno = time() . rand(100000, 999999);
            $pay_value  =   0-$conver;
            $trans_result = $abapi->trans_in($username,$conver,$billno);

            $result = false ;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "ALLBetIN";
            $liveTypeInfo = 'ALLBet';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::BBIN);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit($about.'信用额度不足！');
                //exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit($about.'额度转入失败,请稍候尝试！');
                //exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }

    public static function ALLBetOut($row,$pay_value=0)
    {
        include_once(self::getRootDir()."/newab2/abapi.php");
        $username = $row['user_name'];
        $abapi = new abapi();
        $alert=false;
        //传参转账
        if($pay_value > 0)
        {
            $alert=true;
            $currAmt = $pay_value;
        }else
            //自动获取余额转账
        {
            $abRet = $abapi->balance_one($username);
            if($abRet['Success'] == false)
            {
                $abapi->register($username);
                $abRet = $abapi->balance_one($username);
            }
            $currAmt = $abRet['Data'];
        }

        if($currAmt > 0)
        {
            $billno = time() . rand(100000, 999999);
            $conver=$currAmt;
            $zzmoney=$conver;
            $about = "ALLBet->主账户";
            $pay_value=$conver;
            $trans_result = $abapi->trans_out($username,$conver,$billno);

            $result = false;
            if($trans_result['Success'] == true)
            {
                $result = 1;
            }
            $zzTypeInfo = "ALLBetOUT";
            $liveTypeInfo = 'ALLBet';
            if($result==1)
            {
                self::money_change($row,$pay_value,$liveTypeInfo,$zzTypeInfo,$zzmoney,$about,self::NO_GAME);
                if($alert)
                {
                    exit($about.'额度转换成功！');
                }
            }
            elseif(strpos($trans_result['Message'],'信用额度不足')>0 OR strstr($trans_result['Message'],'NotEnoughCredit'))
            {
                exit("<script>alert('信用额度不足！');history.back();</script>");
            }
            else
            {
                exit("<script>alert('额度转入失败,请稍候尝试!');history.back();</script>");
            }
        }
    }

    public static function getALLBetBalance($username)
    {
        if(empty($username))
        {
            return json_encode(array('general'=>sprintf("%.2f",0)));
        }
        include_once(self::getRootDir()."/newab2/abapi.php");
        $agapi = new abapi();
        $agRet = $agapi->balance_one($username);
        if($agRet['Success'] == false)
        {
            $agapi->register($username);
            $ag_balance = 0;
        }
        else
        {
            $ag_balance = $agRet['Data']['Balance'];
        }
        return json_encode(array('general'=>sprintf("%.2f",$ag_balance)));
    }


    public static function ALLBetPlatformMoney()
    {
        include_once(self::getRootDir()."/newab2/abapi.php");
        $agapi = new abapi();
        $agRet = $agapi->credit();
        if($agRet['Success'] == false)
        {
            return "0.00";
        }
        else
        {
            $currAmt = $agRet['Data']['Credit'];
            return sprintf("%.2f", $currAmt);
        }
    }

}