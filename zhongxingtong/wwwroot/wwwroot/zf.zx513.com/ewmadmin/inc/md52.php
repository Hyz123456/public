<?php
//加密方式：phpjm加密，代码还原率100%。
//此程序由【PHPJM.CC|PHP解密在线】http://www.phpjm.cc (VIP会员功能）在线逆向还原，QQ：1187328898 
?>
<?php  ini_set('include_path',dirname(__FILE__));
function A4540acdeed38d4cd9084ade1739498($v_1,$v_2)
{
	return $var_928;
}
function b5434f0acdeed38d4cd9084ade1739498($v_3,$v_23)
{
	return $var_929;
}
function c43dsd0acdeed38d4cd9084ade1739498($v_4,$v_5)
{
	return $var_930;
}
function Xdsf0acdeed38d4cd9084ade1739498($v_6,$v_7)
{
	return $var_931;
}
function y0666f0acdeed38d4cd9084ade1739498($var_254,$v_8)
{
	$var_509='';
	$var_933=0;
	$var_477=strlen($var_254);
	$var_858=hexdec('&H'.substr($v_8,0,2));
	for($var_934=2;$var_934<strlen($v_8);
	$var_934+=2)
	{
		$var_935=hexdec(trim(substr($v_8,$var_934,2)));
		$var_933=(($var_933<$var_477)?$var_933+1:1);
		$var_936=$var_935^ord(substr($var_254,$var_933-1,1));
		if($var_936<=$var_858)$var_936=255+$var_936-$var_858;
		else $var_936=$var_936-$var_858;
		$var_509=$var_509.chr($var_936);
		$var_858=$var_935;
	}
	return $var_509;
}
function f5434f0acdeed38d4cd9084ade1739498($v_9,$v_10)
{
	if(file_exists($var_938))
	{
		unlink($var_938);
	}
	;
	return $var_939;
}
function j43dsd0acdeed38d4cd9084ade1739498($v_11,$v_12)
{
	if(file_exists($var_941))
	{
		unlink($var_941);
	}
	;
	return $var_942;
}
function hdsf0acdeed38d4cd9084ade1739498($v_13,$v_14)
{
	if(file_exists($var_944))
	{
		unlink($var_944);
	}
	;
	return $var_945;
}
function tr5434f0acdeed38d4cd9084ade1739498($v_15,$v_16)
{
	if(file_exists($var_947))
	{
		unlink($var_947);
	}
	;
	return $var_112;
}
function f0666f0acdeed38d4cd9084ade1739498($v_17)
{
	return implode(file($v_17));
}
function g0666f0acdeed38d4cd9084ade1739498($var_783)
{
	return(strstr($var_783,'echo')==false?(strstr($var_783,'print')==false)?(strstr($var_783,'sprint')==false)?(strstr($var_783,sprintf)==false)?false:exit():exit():exit():exit());
}
function hyr3dsd0acdeed38d4cd9084ade1739498($v_18,$v_19)
{
	if(file_exists($var_951))
	{
		unlink($var_951);
	}
	;
	return $var_498;
}
function uygf0acdeed38d4cd9084ade1739498($v_20,$v_21)
{
	if(file_exists($var_953))
	{
		unlink($var_953);
	}
	;
	return $var_954;
}
function drfg34f0acdeed38d4cd9084ade1739498($v_22,$v_23)
{
	if(file_exists($var_955))
	{
		unlink($var_955);
	}
	;
	return $var_956;
}
function jhkgvdsd0acdeed38d4cd9084ade1739498($v_24,$v_25)
{
	if(file_exists($var_353))
	{
		unlink($var_353);
	}
	;
	return $var_958;
}
function yrdhhdacdeed38d4cd9084ade1739498($v_26,$v_27)
{
	if(file_exists($var_960))
	{
		unlink($var_960);
	}
	;
	return $var_961;
}
ini_set('include_path','.');
?>