<?php
session_start();
if (!isset($_SESSION["adminid"])) {
    echo "timeout";
    exit;
}
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/class/auto_transfer.php");
$username =$_GET['username'];
$index = $_GET['index'];
$sql = "select user_id from user_list u where u.user_name='".$username."' limit 0,1";

$query	=	$mysqli->query($sql);
$user_info    =	$query->fetch_array();
if (!$user_info) {
    echo "0.00";
    exit;
}

include_once("../newag2/agapi.php");
include_once("../newbbin2/bbapi.php");
include_once("../newmg2/mgapi.php");
include_once("../newpt2/ptapi.php");
include_once("../newab2/abapi.php");
$currAmt =0;
if('ag' == $index){
    $agapi = new agapi();
    $agRet = $agapi->balance_one($username);
    if($agRet['Success'] == false){
        $agapi->register($username);
    }else{
        $currAmt = $agRet['Data'];
    }
}else if('mg' == $index){
    $mgapi = new mgapi();
    $qGuid='';
    //{'time':guid}
    $guids = $_SESSION["userGUID"];
    if('' == $guids){
        $mgguid = $mgapi->getGUID();
        $qGuid =$mgguid['Data'];
        $guids = array(time(),$qGuid);
        $_SESSION["userGUID"]= $guids;
    }else{
        $keys = array_keys($guids);
        $curTime = time();
        $guidTime = $guids[$keys[0]];
        if($curTime-$guidTime > 3000){
            $mgguid = $mgapi->getGUID();
            $qGuid = $mgguid['Data'];
            $guids = array(time(),$qGuid);
            $_SESSION["userGUID"]= $guids;
        }
        $qGuid = $guids[$keys[1]];
    }

    $mgRet = $mgapi->balance($username,$qGuid);
    if($mgRet['Success'] == false){
        if($mgRet['Code'] == 6){
            $mgguid = $mgapi->getGUID();
            $qGuid =$mgguid['Data'];
            $guids = array(time(),$qGuid);
            $_SESSION["userGUID"]= $guids;
            $mgRet = $mgapi->balance($username,$qGuid);
            $currAmt = $mgRet['Data'];
        }else{
            $mgapi->create($username,$qGuid);
        }

    }else{
        $currAmt = $mgRet['Data'];
    }
}else if('bbin' == $index){
    $bbapi = new bbapi();
    $bbRet = $bbapi->balance($username);
    if($bbRet['Success'] == false){
        $bbapi->create($username);
    }else{
        $currAmt = $bbRet['Data'];
    }
}else if('ALLBet' == $index){
    $agapi = new abapi();
    $agRet = $agapi->balance_one($username);

    if($agRet['Success'] == false)
    {
        $ag_balance = 0;
    }
    else
    {

        $ag_balance = $agRet['Data']['Balance'];
    }
    $currAmt=$ag_balance;
}else if('pt' == $index){
    $agapi = new ptapi();
    $agRet = $agapi->balance_one($username);
    if($agRet['Success'] == false)
    {
        $ag_balance = 0;
    }
    else
    {
        $ag_balance = $agRet['Data']['Balance'];
    }

    $currAmt=$ag_balance;
}
echo sprintf("%.2f", $currAmt);
?>