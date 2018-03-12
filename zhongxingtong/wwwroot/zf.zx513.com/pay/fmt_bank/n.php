<?php
include "inc.php";


include "./aes.php";
use WY\app\model\Handleorder;

$data	=	$_GET['data'];

//$data="k2N29tQ0IuY6i1TDCaHIW0wfYDbHbyjGwwbZJBL7ta/z3eT1iF/p+NdNvowiiPw1TlCpkfIziUvV1ftTB8dVXlSJtOdOppuBZfcBaa3KuVqAE+55AgNLvGpTPKz1lDKJydfp+bLfosqz3n5mMrwgmZnuTEwOXQdbcuzX68uP3MbHtHOh+7ZZHNM0yBgSpo6qZDbfKy05DBnVrzUPw7Quzyl7JnwAnjzQLquUgiVGMT6Hxag+gsPEysY2nQdB6tSOMpYVKpWxMedhM1HtJvkK1CqMoVuxiSMswoo3hjxuifE=";

$merKey = $userkey;



$encode_data = $aes->decrypt($data , $merKey);


$encode_data	=	json_decode($encode_data);


		$ordermoney	=	$encode_data->amount;
		$sdcustomno=	$encode_data->orderId;


		$handle=@new Handleorder($sdcustomno,$ordermoney);
        $handle->updateUncard();

		echo "SUCCESS";
?>