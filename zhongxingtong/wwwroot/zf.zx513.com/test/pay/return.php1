<?php
$userkey='760684862f5fdc8f36d0871e1296ec1692380f37';
$status=$_GET['status'];
$customerid=$_GET['customerid'];
$sdorderno=$_GET['sdorderno'];
$total_fee=$_GET['total_fee'];
$paytype=$_GET['paytype'];
$sdpayno=$_GET['sdpayno'];
$remark=$_GET['remark'];
$sign=$_GET['sign'];

$mysign=md5('customerid='.$customerid.'&status='.$status.'&sdpayno='.$sdpayno.'&sdorderno='.$sdorderno.'&total_fee='.$total_fee.'&paytype='.$paytype.'&'.$userkey);

if($sign==$mysign){
    if($status=='1'){
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'sign error';
}
?>
