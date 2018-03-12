<?php
header("Context-type:text/html;charset:utf-8");
include_once('../class/bbapi.php');
$agapi = new bbapi();
$agRet = $agapi->credit();
if($agRet['Success'] == false){
    //$agapi->register($username);
    echo "0.00";
}else{
    $currAmt = $agRet['Data']['Credit'];
    echo sprintf("%.2f", $currAmt);
}
