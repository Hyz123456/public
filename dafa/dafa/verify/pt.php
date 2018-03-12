<?php
header("content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
file_put_contents('ptlog.txt',json_encode($_REQUEST).PHP_EOL,FILE_APPEND);
$return = array(
    "Data"=>null,
    "TotalCount"=>0,
    "PageIndex"=>0,
    "PageCount"=>0,
    "PageSize"=>0,
    "Success"=>false,
    "Code"=>0,
    "Message"=>"Success",
    "Exception"=>null,
);

$query	=	$mysqli->query("select * from user_list where user_name='".$_POST['userName']."' limit 1");
$t		=	$query->fetch_array();
if(!empty($t)){
    $return['Success'] = true;
    echo json_encode($return);
}else{
    echo json_encode($return);
}