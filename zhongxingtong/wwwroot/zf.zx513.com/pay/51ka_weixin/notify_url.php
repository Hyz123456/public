<?php
require_once 'inc.php';
use WY\app\model\Handleorder;
$state=_G('state','int');
$customerid=_G('customerid','int');
$sd51no=_G('sd51no');
$sdcustomno=_G('sdcustomno');
$ordermoney=_G('ordermoney','float');
$cardno=_G('cardno','int');
$mark=_G('mark');
$sign=_G('sign');
$resign=_G('resign');
$des=_G('des');

if($state=='' || $customerid=='' || $sd51no=='' || $sdcustomno=='' || $cardno=='' || $sign=='' || $resign==''){
	echo 'err01';exit;
}

if($customerid!=$userid){
	echo 'err02';exit;
}

$signstr='customerid='.$customerid.'&sd51no='.$sd51no.'&sdcustomno='.$sdcustomno.'&mark='.$mark.'&key='.$userkey;
$makesign=strtoupper(md5($signstr));

if($sign!=$makesign){
	echo 'err03';exit;
}

$resignstr='sign='.$makesign.'&customerid='.$customerid.'&ordermoney='.$ordermoney.'&sd51no='.$sd51no.'&state='.$state.'&key='.$userkey;
$makeresign=strtoupper(md5($resignstr));

if($resign!=$makeresign){
	echo 'err04';exit;
}

echo '<result>1</result>';
$handle=@new Handleorder($sdcustomno,$ordermoney);
$handle->updateUncard();
?>
