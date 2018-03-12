<?php
include "inc.php";
use WY\app\model\Handleorder;
$data	=	$_POST["data"];
$sign	=	$_POST["sign"];
$result_code	=	$_POST["result_code"];

$result_message	=	$_POST["result_message"];


$data	=	json_decode($data);


$merchant_order_sn	=	$data->merchant_order_sn;
$total_fee			=	$data->total_fee;


$signt	=	"data={$_POST["data"]}&result_code={$result_code}&result_message={$result_message}{$userkey}";


$bijiao	=	 strtoupper(md5($signt));

if ($sign==$bijiao){

	if($result_code==200){

					$handle=@new Handleorder($merchant_order_sn,$total_fee);
					$handle->updateUncard();
					echo "success";
	}else{

					echo $result_code;
	
	}


}else{

	echo "err";

}
?>