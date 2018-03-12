<?php
require_once '../../app/init.php';
use WY\app\woodyapp;
use WY\app\model\Payacp;

$app=woodyapp::getInstance();
$acp=new Payacp();
$acpData=$acp->get('51ka');
extract($acpData);

function GetBankCode($bankid){
	$bankcode="";
	if($bankid=='ICBC') $bankcode="ICBC";
	if($bankid=='ABC') $bankcode="ABC";
	if($bankid=='BOCSH') $bankcode="BOC";
	if($bankid=='CCB') $bankcode="CCB";
	if($bankid=='CMB') $bankcode="CMB";
	if($bankid=='SPDB') $bankcode="SPDB";
	if($bankid=='GDB') $bankcode="GDB";
	if($bankid=='BOCOM') $bankcode="COMM";
	if($bankid=='PSBC') $bankcode="PSBC";
	if($bankid=='CNCB') $bankcode="CITIC";
	if($bankid=='CMBC') $bankcode="CMBC";
	if($bankid=='CEB') $bankcode="CEB";
	if($bankid=='HXB') $bankcode="HXB";
	if($bankid=='CIB') $bankcode="CIB";
	if($bankid=='BOS') $bankcode="BOS";
	if($bankid=='SRCB') $bankcode="SHRCB";
	if($bankid=='PAB') $bankcode="SZPAB";
	return $bankcode;
}
?>
