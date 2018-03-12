<?php
header("Content-type: text/html; charset=utf-8");
require_once 'inc.php';
use WY\app\model\Handleorder;


error_reporting(E_ALL^E_NOTICE^E_WARNING);
//echo $_REQUEST("msg");
$public_key = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCL4nMv6qK7Lt1MzfK20LrVd/0g
0pXIvV281sT16s4xIWEg/Hfv0su0MHdbTobZfHcziyO/xdmItCzkcJOIIskuC3Qu
kNrWnt7kf1wZ1OmIMWAcS5s9wnMd0QcpDpcyfZfJvlZgFDtgJtApXvCBBVIEX65W
1FnmlZ7wccO3Ca+J8QIDAQAB
-----END PUBLIC KEY-----";

$pu_key = '';
if(openssl_pkey_get_public($public_key)){
    $pu_key = openssl_pkey_get_public($public_key);
  //  echo $pu_key;

  //  echo '获取public key成功！';
   // echo '<br>';
}else{
    echo '获取public key失败！';
    echo '<br>';
}
$datas = stripslashes($_REQUEST['ret'].'|'.$_REQUEST['msg']);
//验签
$txt = openssl_verify($datas,base64_decode($_REQUEST['sign']),$pu_key);
openssl_free_key($pu_key);
if(1==$txt){
//验签成功返回

	$msg	=	$_REQUEST['msg'];

	//var_dump($msg);die;
	$obj	=	json_decode($msg); 

	$money	=	$obj->money;
	$order	=	$obj->no;

	$ret	=	json_decode($_REQUEST['ret']); 

	$code	=	$ret->msg;

	if($code=="SUCCESS"){


			$handle=@new Handleorder($order,$money);
			$handle->updateUncard();
	
	
	}


	





	
//echo stripslashes('SUCCESS');
}
?>