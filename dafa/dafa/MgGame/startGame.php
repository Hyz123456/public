<?php
if(!isset($_SESSION)){ session_start();}
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
$username = $_SESSION['username'];
include_once("../newmg2/mgapi.php");
include_once("../app/member/class/auto_transfer.php");
//auto_transfer::beforeGameOut($uid,auto_transfer::MG);
$mgapi = new mgapi();
$gameName = $_GET['gameName'];

$gameType = isset($_GET['gameType'])?$_GET['gameType']:'2';
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
$mgapi->create($username,$qGuid);
$mgRet = $mgapi->loginForWap($username,$gameType,$gameName);
if($mgRet['Code'] == 6){
    $mgguid = $mgapi->getGUID();
    $qGuid =$mgguid['Data'];
    $guids = array(time(),$qGuid);
    $_SESSION["userGUID"]= $guids;
    $mgRet = $mgapi->loginForWap($username,$gameType,$gameName);
}
if($mgRet['Code'] == 4){
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
    $mgRet = $mgapi->loginForWap($username,$gameType,$gameName);
    
}

$url = $mgRet['Data'];

echo("<script> window.location.href= '{$url}' </script> ");
?>