<?php
require_once '../../app/init.php';
use WY\app\woodyapp;
use WY\app\model\Payacp;

$app=woodyapp::getInstance();
$acp=new Payacp();
$acpData=$acp->get('luyi');


extract($acpData);

function GetBankCode($bankid){
	$bankcode="";
	if($bankid=='ICBC') $bankcode="ICBC";
	if($bankid=='ABC')	$bankcode="ABC";
	if($bankid=='BOCSH') $bankcode="BOC";
	if($bankid=='CCB') $bankcode="CCB";
	if($bankid=='CMB') $bankcode="CMB";
	if($bankid=='SPDB') $bankcode="SPDB";
	if($bankid=='GDB') $bankcode="GDB";
	if($bankid=='BOCOM') $bankcode="BOCO";
	if($bankid=='PSBC') $bankcode="PSBS";
	if($bankid=='CNCB') $bankcode="CTTIC";
	if($bankid=='CMBC') $bankcode="CMBC";
	if($bankid=='CEB') $bankcode="CIB";
	if($bankid=='HXB') $bankcode="HXB";
	if($bankid=='CIB') $bankcode="CIB";
	if($bankid=='BOS') $bankcode="SHB";
	if($bankid=='SRCB') $bankcode="SRCB";
	if($bankid=='PAB') $bankcode="PINGANBANK";
	if($bankid=='weixin') $bankcode="WEIXIN";
	if($bankid=='alipay') $bankcode="ALIPAY";
	if($bankid=='qq') $bankcode="QQ";
	return $bankcode;
}
?>
