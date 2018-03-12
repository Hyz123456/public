<?php  


session_start();
error_reporting(0);
include_once 'safemode.php';
require_once 'config.php';
if($trade_no!='' && $cny!='' && $type!='' && $key!='' && $mobile!='')
{
	$result=mysql_query("select * from ewmszb where appid='$key' and cny='$cny' and pay='$type'");
	if(mysql_num_rows($result)>0)
	{
		$tim=time();
		if($cny.$type==$_SESSION['go']&& $_SESSION['timm']>$tim)
		{
			$fenzuid=$_SESSION['fenzuid'];
			$ewm=$_SESSION['name'];
			$idold=$_SESSION['ewmidn'];
			$timm=$tim+300;
			$beizhu=$_SESSION['beizhu'];
			$appid=$_SESSION['appidold'];
			$payold=$_SESSION['payold'];
			$trade_noold=$_SESSION['trade_no'];
			$exec='select * from ewmddh where name=\'' .$beizhu."' and appid='$appid' and uid='$trade_noold' and dingdanok=0 and pay='$payold' and timm>'$tim' ORDER BY id DESC";
			$result=mysql_fetch_assoc(mysql_query($exec));
			$id2=$result['id'];
			if($id2>0)
			{
				mysql_query("Update ewmddh set timm='$timm',uid='$trade_no' where id=".$id2);
				mysql_query("Update ewmszb set timm='$timm' where id=".$idold);
			}
			else
			{
				$sql="select * from ewmszb where timm<'$tim' and appid='$key' and cny='$cny' and pay='$type' ORDER BY name asc";
				$ewmm=mysql_fetch_assoc(mysql_query($sql));
				$id=$ewmm['id'];
				if($id!='')
				{
					$timm=$tim+300;
					$ewm=$ewmm['picurl'];
					$fenzuid=$ewmm['fenzuid'];
					$_SESSION['fenzuid']=$ewmm['fenzuid'];
					$_SESSION['ewmidn']=$ewmm['id'];
					$_SESSION['go']=$cny.$type;
					$_SESSION['name']=$ewm;
					$_SESSION['timm']=$timm;
					$nameuser=$ewmm['name'];
					$_SESSION['beizhu']=$ewmm['name'];
					$_SESSION['appidold']=$key;
					$_SESSION['payold']=$type;
					$_SESSION['trade_no']=$trade_no;
					mysql_query("Update ewmszb set timm='$timm' where id=".$id);
					mysql_query("INSERT INTO ewmddh (pay,name,cny,uid,appid,timm) VALUES('{$type}','{$nameuser}','{$cny}','{$trade_no}','{$key}','{$timm}')");
}
else
{
if($type==1)$ewm=$payali;
if($type==2)$ewm=$payten;
if($type==3)$ewm=$paywx;
}
}
}
else
{
$sql="select * from ewmszb where timm<'$tim' and appid='$key' and cny='$cny' and pay='$type' ORDER BY name asc";
$ewmm=mysql_fetch_assoc(mysql_query($sql));
$id=$ewmm['id'];
if($id!='')
{
$timm=$tim+300;
$ewm=$ewmm['picurl'];
$fenzuid=$ewmm['fenzuid'];
$_SESSION['fenzuid']=$ewmm['fenzuid'];
$_SESSION['ewmidn']=$ewmm['id'];
$_SESSION['go']=$cny.$type;
$_SESSION['name']=$ewm;
$_SESSION['timm']=$timm;
$nameuser=$ewmm['name'];
$_SESSION['beizhu']=$ewmm['name'];
$_SESSION['appidold']=$key;
$_SESSION['payold']=$type;
$_SESSION['trade_no']=$trade_no;
mysql_query("Update ewmszb set timm='$timm' where id=".$id);
mysql_query("INSERT INTO ewmddh (pay,name,cny,uid,appid,timm) VALUES('{$type}','{$nameuser}','{$cny}','{$trade_no}','{$key}','{$timm}')");
}
else
{
if($type==1)$ewm=$payali;
if($type==2)$ewm=$payten;
if($type==3)$ewm=$paywx;
}
}
if($type==1)
{
$logo='alipay-logo';
$qr='css/ali.png';
$qrna='手机支付宝';
$uourldown='https://mobile.alipay.com/index.htm';
}
if($type==2)
{
$logo='tenpay-logo';
$qr='css/tenpay.png';
$qrna='财付通钱包';
$uourldown='https://mqq.tenpay.com/web/qq_wallet/';
}
if($type==3)
{
$logo='wxpay-logo';
$qr='css/wxpay.png';
$qrna='微信钱包';
$uourldown='http://weixin.qq.com/';
}
}
else
{
echo '不支持次面值，联系客服询问支持面值';
exit;
}
}
else
{
echo '接口参数错误！是否缺少参数传递。';
exit;
}
?>