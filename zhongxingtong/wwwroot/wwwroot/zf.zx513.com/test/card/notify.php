<?php
$userkey='01f9bef837833f98ed41f97d611a81bbc5d03e3e';
$status=$_POST['status'];
$customerid=$_POST['customerid'];
$sdorderno=$_POST['sdorderno'];
$total_fee=$_POST['total_fee'];
$paytype=$_POST['paytype'];
$sdpayno=$_POST['sdpayno'];
$remark=$_POST['remark'];
$sign=$_POST['sign'];

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
