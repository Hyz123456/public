<?php
require_once 'inc.php';
use WY\app\model\Handleorder;

$state=$_GET['state'];
$customerid=$_GET['customerid'];
$sd51no=$_GET['sd51no'];
$sdcustomno=$_GET['sdcustomno'];
$ordermoney=$_GET['ordermoney'];
$cardno=$_GET['cardno'];
$mark=$_GET['mark'];
$sign=$_GET['mark'];
$resign=$_GET['mark'];
$des=$_GET['mark'];

if($customerid=='' || $sd51no=='' || $sdcustomno=='' || $ordermoney=='' || $cardno=='' || $mark=='' || $sign=='' || $resign==''){
   echo 'params error';exit;
}

if($customerid!=$userid){
    echo 'userid error';exit;
}

$makeSign=strtoupper(md5('customerid='.$userid.'&sd51no='.$sd51no.'&sdcustomno='.$sdcustomno.'&mark='.$mark.'&key='.$userkey));

$makeReSign=strtoupper(md5('sign='.$sign.'&customerid='.$userid.'&ordermoney='.$ordermoney.'&sd51no='.$sd51no.'&state='.$state.'&key='.$userkey));

if($sign==$makeSign && $resign==$makeReSign){
    if($state==1){
		echo '<result>1</result>';
        $handle=@new Handleorder($sdcustomno,$ordermoney);
        $handle->updateUncard();
	}
}
?>
