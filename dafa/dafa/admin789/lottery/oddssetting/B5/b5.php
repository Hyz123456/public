<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");

include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/odds_lottery_normal.php");

$rType = "605";

include_once "b5_util.php";

include_once "pages/$rType.php";
exit;