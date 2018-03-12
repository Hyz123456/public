<?php
require_once 'inc.php';
$status=$_REQUEST['status'];
$customerid=$_REQUEST['customerid'];
$sdorderno=$_REQUEST['sdorderno'];
$total_fee=$_REQUEST['total_fee'];
$paytype=$_REQUEST['paytype'];
$sdpayno=$_REQUEST['sdpayno'];
$remark=$_REQUEST['remark'];
$sign=$_REQUEST['sign'];

$mysign=md5('customerid='.$customerid.'&status='.$status.'&sdpayno='.$sdpayno.'&sdorderno='.$sdorderno.'&total_fee='.$total_fee.'&paytype='.$paytype.'&'.$userkey);

if($sign==$mysign){
    if($status=='1'){
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'signerr';
}
?>
