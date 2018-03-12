<?php
require_once '../../app/init.php';
use WY\app\woodyapp;
use WY\app\model\Payacp;

$app=woodyapp::getInstance();
$acp=new Payacp();
$acpData=$acp->get('zyf');


extract($acpData);

function GetBankCode($bankid){
	$bankcode="";
	if($bankid=='ICBC') $bankcode="1021000";
	if($bankid=='ABC')	$bankcode="1031000";
	if($bankid=='BOCSH') $bankcode="1041000";
	if($bankid=='CCB') $bankcode="1051000";
	if($bankid=='CMB') $bankcode="3085840";
	if($bankid=='SPDB') $bankcode="3102900";
	if($bankid=='GDB') $bankcode="3065810";
	if($bankid=='BOCOM') $bankcode="3012900";
	if($bankid=='PSBC') $bankcode="4031000";
	if($bankid=='CNCB') $bankcode="3021000";
	if($bankid=='CMBC') $bankcode="3051000";
	if($bankid=='CEB') $bankcode="3031000";
	if($bankid=='HXB') $bankcode="";
	if($bankid=='CIB') $bankcode="3093910";
	if($bankid=='BOS') $bankcode="";
	if($bankid=='SRCB') $bankcode="";
	if($bankid=='PAB') $bankcode="3071000";

	return $bankcode;
}
?>
