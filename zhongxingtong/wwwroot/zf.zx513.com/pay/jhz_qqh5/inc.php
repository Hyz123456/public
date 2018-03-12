<?php
require_once '../../app/init.php';
use WY\app\woodyapp;
use WY\app\model\Payacp;

$app=woodyapp::getInstance();
$acp=new Payacp();
$acpData=$acp->get('jhz');


extract($acpData);

function GetBankCode($bankid){
	$bankcode="";
	if($bankid=='ICBC') $bankcode="1021000";
	if($bankid=='ABC')	$bankcode="1031000";
	if($bankid=='BOCSH') $bankcode="1021000";
	if($bankid=='CCB') $bankcode="1051000";
	if($bankid=='CMB') $bankcode="3085840";
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
