<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/js/jquery.js"></script>
<title>Games</title>
<style type="text/css">
body {
	background-color: #000;
	color:#FF0;
	font-size:14px;
}
</style>
</head>
<body>
<p>&nbsp;</p>
<p align="center" id="msg">
<img src="lg2.gif"><br><br>载入游戏大概需要花几秒钟时间，请耐心等待...</p>
<p style="visibility: hidden;">&nbsp;<img src="lg.gif"></p>

<?php
session_start();
include_once("../include/config.php"); 
include_once("../common/login_check.php"); 
include_once("../include/mysqli.php");
include_once("../common/logintu.php");
include_once("../common/function.php");
include_once("../class/user.php");
$uid = $_SESSION['uid'];
$loginid = $_SESSION['user_login_id'];
$username = $_SESSION['username'];
renovate($uid,$loginid);
include_once("../class/mgapi.php");
$userinfo=user::getinfo($uid);
$mgapi = new mgapi();

$username=$userinfo["username"];

		$qGuid='';
		//{'time':guid}
		 $guids = $_SESSION["userGUID"];
		if('' == $guids){
			$mgguid = $mgapi->getGUID();
			$qGuid =$mgguid['Data'];
			$guids = array(time(),$qGuid);
			$_SESSION["userGUID"]= $guids;
		}else{
			$keys = array_keys($guids);
			$curTime = time();
			$guidTime = $guids[$keys[0]];
			if($curTime-$guidTime > 3000){
				$mgguid = $mgapi->getGUID();
				$qGuid = $mgguid['Data'];
				$guids = array(time(),$qGuid);
				$_SESSION["userGUID"]= $guids;
			}
			$qGuid = $guids[$keys[1]];
		}

		$mgRet = $mgapi->balance($username,$qGuid);
		if($mgRet['Success'] == false){
			if($mgRet['Code'] == 6){
				$mgguid = $mgapi->getGUID();
				$qGuid =$mgguid['Data'];
				$guids = array(time(),$qGuid);
				$_SESSION["userGUID"]= $guids;
				$mgRet = $mgapi->balance($username,$qGuid);
				$currAmt = $mgRet['Data'];	
			}else{
				$mgapi->create($username,$qGuid);
			}
			
		}else{
			$currAmt = $mgRet['Data'];	
		}
		
		

$mgRet = $mgapi->loginLive($username);
if($mgRet['Code'] == 4){
	$qGuid='';
	//{'time':guid}
	$guids = $_SESSION["userGUID"];
	if('' == $guids){
		$mgguid = $mgapi->getGUID();
		$qGuid =$mgguid['Data'];
		$guids = array(time(),$qGuid);
		$_SESSION["userGUID"]= $guids;
	}else{
		$keys = array_keys($guids);
		$curTime = time();
		$guidTime = $guids[$keys[0]];
		if($curTime-$guidTime > 3000){
			$mgguid = $mgapi->getGUID();
			$qGuid = $mgguid['Data'];
			$guids = array(time(),$qGuid);
			$_SESSION["userGUID"]= $guids;
		}
		$qGuid = $guids[$keys[1]];
	}
	$mgapi->create($username,$qGuid);
	$mgRet = $mgapi->loginLive($username);
	if($mgRet['Code'] == 6){
		$mgguid = $mgapi->getGUID();
		$qGuid =$mgguid['Data'];
		$guids = array(time(),$qGuid);
		$_SESSION["userGUID"]= $guids;
		$mgRet = $mgapi->loginSlot($username);
	}
	
}
print_r ($mgRet);
$url = $mgRet['Data'];
echo("<script> window.location.href= '{$url}' </script> ");
?>
</body>
</html>