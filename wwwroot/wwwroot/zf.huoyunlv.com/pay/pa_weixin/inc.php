<?php
require_once '../../app/init.php';
use WY\app\woodyapp;
use WY\app\model\Payacp;

$app=woodyapp::getInstance();
$acp=new Payacp();
$acpData=$acp->get('pa');


extract($acpData);


function GetBankCode($bankid){
	$bankcode="";
	if($bankid=='ICBC') $bankcode="102";
	if($bankid=='ABC')	$bankcode="103";
	if($bankid=='BOCSH') $bankcode="104";
	if($bankid=='CCB') $bankcode="105";
	if($bankid=='CMB') $bankcode="310";
	if($bankid=='SPDB') $bankcode="410";
	if($bankid=='GDB') $bankcode="320";
	if($bankid=='BOCOM') $bankcode="420";
	if($bankid=='PSBC') $bankcode="403";
	if($bankid=='CNCB') $bankcode="106";
	if($bankid=='CMBC') $bankcode="360";
	if($bankid=='CEB') $bankcode="309";
	if($bankid=='HXB') $bankcode="380";
	if($bankid=='CIB') $bankcode="330";
	if($bankid=='BOS') $bankcode="420";
	if($bankid=='SRCB') $bankcode="SRCB";
	if($bankid=='PAB') $bankcode="340";
	
	return $bankcode;
}
?>
