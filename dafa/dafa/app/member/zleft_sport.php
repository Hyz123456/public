<?
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include "include/com_chk.php";
include "include/address.mem.php";
include "cache/website.php";

echo "<script>if(self == top) parent.location='".BROWSER_IP."'</script>\n";

include_once("cache/zqgq.php");
if(time()-$lasttime > 10){ //超时
	$zq_gq_count = 0;
}else{
	$zq_gq_count = count($zqgq);
}
include_once("cache/lqgq.php");
if(time()-$lasttime > 10){ //超时
	$lq_gq_count = 0;
}else{
	$lq_gq_count = count($lqgq);
}
	//$zq_gq_count = count($zqgq);
	//$lq_gq_count = count($lqgq);
	$tgq_count	=$zq_gq_count+$lq_gq_count;

	//足球-单式
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' and Match_HalfId is not null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_ds_count=$rs_count['s'];

	//总入球
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_IsShowt=1 and Match_Total01Pl>0 and Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_zrq_count=$rs_count['s'];

	//足球-波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_IsShowt=1 and Match_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_bd_count=$rs_count['s'];

	//足球-上半波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_IsShowt=1 and Match_Hr_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hr_bd_count=$rs_count['s'];

	//足球-半全场
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_BqMM>0 and Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_bqc_count=$rs_count['s'];


	//足球早餐-单式
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_CoverDate>'".$et_time_now."' and match_date!='".date("m-d",$et_time)."' and Match_HalfId is not null" ;
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hds_count=$rs_count['s'];

	//足球早餐 总入球
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_IsShowt=1 and Match_Total01Pl>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hzrq_count=$rs_count['s'];

	//足球早餐-波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_IsShowt=1 and Match_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hbd_count=$rs_count['s'];

	//足球早餐-上半场波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_IsShowt=1 and Match_Hr_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hr_hbd_count=$rs_count['s'];

	//足球早餐-半全场
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_BqMM>0 and Match_CoverDate>'".$et_time_now."'";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hbqc_count=$rs_count['s'];

	//足球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='FT' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_gj_count=$rs_count['s'];

	//足球-结果
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match where match_Date='".date("m-d",$et_time)."' and (MB_Inball is not null or MB_Inball_HR is not NULL) and (match_js=1 or match_sbjs=1)";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_r_count=$rs_count['s'];


	//-----------------------------------------

	//篮美-单式
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lm_ds	=	$rs['s'];
	
	//篮美-单节
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_Type=3 AND Match_CoverDate>='".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lm_dj	=	$rs['s'];
	
	//篮美-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='BK' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$lm_gj=$rs_count['s'];

	//篮美-结果
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE MB_Inball_OK is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lm_jg	=	$rs['s'];
	
	
	//篮美早餐-单式
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_Type!=3 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lmzc_ds=	$rs['s'];
	
	//篮美早餐-单节
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_Type=3 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lmzc_dj=	$rs['s'];


	//-------------------------------------------------------------------------------------------------------------------------
	//网球-单式
	$sql	=	"SELECT count(*) as s FROM tennis_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$wq_ds	=	$rs['s'];

	//网球早餐-单式
	$sql	=	"SELECT count(*) as s FROM tennis_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$wqzc_ds	=	$rs['s'];


	//网球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='TN' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$wq_gj=$rs_count['s'];


	//网球-结果
	$sql	=	"SELECT count(*) as s FROM tennis_match where MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$wq_jg	=	$rs['s'];


	//--------------------------------------------------------------------------------------------------------------------------------

	//排球-单式 
	$sql	=	"SELECT count(*) as s FROM  volleyball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$pq_ds	=	$rs['s'];

	//排球早餐-单式 
	$sql	=	"SELECT count(*) as s FROM  volleyball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$pqzc_ds	=	$rs['s'];
	
	
	//排球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='VB' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$pq_gj=$rs_count['s'];

	//排球-结果
	$sql	=	"SELECT count(*) as s FROM volleyball_match where MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$pq_jg	=	$rs['s'];

	//---------------------------------------------------------------------------------------------------------------------------------

	//棒球-单式 
	$sql	=	"SELECT count(*) as s FROM baseball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' 
	AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$bq_ds	=	$rs['s'];

	//棒球早餐-单式 
	$sql	=	"SELECT count(*) as s FROM baseball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' 
	AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$bqzc_ds	=	$rs['s'];

	//棒球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='BS' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$bq_gj=$rs_count['s'];

	
	//棒球-结果 
	$sql	=	"SELECT count(*) as s FROM baseball_match WHERE MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$bq_jg	=	$rs['s'];

	//--------------------------------------------------------------------------------------------------------------------
	//冠军-冠军 
	$sql	=	"SELECT count(*) as s FROM t_guanjun WHERE Match_CoverDate>'".$et_time_now."' and x_result is null and match_type=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$gj_gj	=	$rs['s'];
	
	//冠军-冠军结果 
	$sql	=	"SELECT count(*) as s FROM t_guanjun where x_result is not null and match_type=1 and match_date='".date("Y-m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$gj_jg	=	$rs['s'];

	//-------------------------------------------------------------------------------------------------------------------------
	//其他-单式
	$sql	=	"SELECT count(*) as s FROM other_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$qt_ds	=	$rs['s'];

	//其他早餐-单式
	$sql	=	"SELECT count(*) as s FROM other_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$qtzc_ds	=	$rs['s'];


	//其他-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='OP' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$qt_gj=$rs_count['s'];


	//其他-结果
	$sql	=	"SELECT count(*) as s FROM other_match where MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$qt_jg	=	$rs['s'];


	//--------------------------------------------------------------------------------------------------------------------------------

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>left_sport</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/cl/template/bbin/public/css/left.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="/cl/js/jquery-1.7.2.min.js"></script>
	<script language="javascript" src="/cl/js/pluging/jquery.form.js"></script>
	<script language="JavaScript" type="text/javascript" src="/cl/js/commJS/menu/menu.js"></script>
	<script type="text/javascript" language="javascript" src="/cl/js/sport/touzhu.js?v=36"></script>

	
    <style type="text/css">
<!--
body {
	margin-left: 0px;
}
#subnav span.nav{ background:#FFECDE !important; }
#subnav span.nav a:hover{
	color: #783218 !important;
	background:#FFFFDE !important;
}
-->
</style>
<script type="text/javascript">
var M={'0':[],'1':[],'2':[],'3':[],'4':[],'5':[],'6':[],'7':[]};

//M['1']={'E':'508','T':'424','L':'6','E_1X2':'317','E_CS':'161','E_OETG':'342','E_HTFT':'161','E_FGLG':'161','T_1X2':'304','T_CS':'149','T_OETG':'314','T_HTFT':'149','T_FGLG':'149','P':'245','OT':'101','TV':'0','LP':'1','EP':'148'};
//足球 
//E 早盤  T 今日 L 滾球
//A:独赢&让球&大小,B:波胆,C:单 / 双 & 总入球,D:半场 / 全场,E:混合过关,F:冠軍,G:上半场波胆,R:赛果
M['1']={'E':'1','T':'1','L':'<?=$zq_gq_count?>','R':'<?=$zq_r_count;?>','E_A':'<?=$zq_hds_count;?>','E_B':'<?=$zq_hbd_count?>','E_C':'<?=$zq_hzrq_count?>','E_D':'<?=$zq_hbqc_count?>','E_E':'<?=$zq_hds_count;?>','E_F':'<?=$zq_gj_count;?>','E_G':'<?=$zq_hr_hbd_count;?>','T_A':'<?=$zq_ds_count;?>','T_B':'<?=$zq_bd_count?>','T_C':'<?=$zq_zrq_count?>','T_D':'<?=$zq_bqc_count?>','T_E':'<?=$zq_ds_count;?>','T_F':'<?=$zq_gj_count;?>','T_G':'<?=$zq_hr_bd_count?>'};
//籃球 
//E 早盤  T 今日 L 滾球
//A:让球&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['2']={'E':'1','T':'1','L':'<?=$lq_gq_count?>','R':'<?=$lm_jg?>','E_A':'<?=$lmzc_ds?>','E_B':'<?=$lmzc_ds?>','E_C':'<?=$lm_gj?>','E_D':'<?=$lmzc_dj?>','T_A':'<?=$lm_ds?>','T_B':'<?=$lm_ds?>','T_C':'<?=$lm_gj?>','T_D':'<?=$lm_dj?>'};
//網球
//E 早盤  T 今日 L 滾球
//A:独赢&让盘&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
//M['3']={'E':'3','T':'33','L':'333','R':'30','E_A':'31','E_B':'32','E_C':'33','E_D':'34','T_A':'35','T_B':'36','T_C':'37','T_D':'38'};
M['3']={'E':'1','T':'1','R':'<?=$wq_jg?>','E_A':'<?=$wqzc_ds?>','E_D':'<?=$wq_gj?>','T_A':'<?=$wq_ds?>','T_D':'<?=$wq_gj?>'};
//排球
//E 早盤  T 今日 L 滾球
//A:独赢&让分&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
M['4']={'E':'1','T':'1','R':'<?=$pq_jg?>','E_A':'<?=$pqzc_ds?>','E_D':'<?=$pq_gj?>','T_A':'<?=$pq_ds?>','T_D':'<?=$pq_gj?>'};
//棒球
//E 早盤  T 今日 L 滾球
//A:独赢&让分&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['5']={'E':'1','T':'1','R':'<?=$bq_jg?>','E_A':'<?=$bqzc_ds?>','E_C':'<?=$bq_gj?>','T_A':'<?=$bq_ds?>','T_C':'<?=$bq_gj?>'};
//冠军
//E 早盤  T 今日 L 滾球
//A:独赢&让球&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['6']={'E':'1','T':'1','R':'<?=$gj_jg?>','E_A':'<?=$gj_gj?>','T_A':'<?=$gj_gj?>'};
//其他
//E 早盤  T 今日 L 滾球
//A:独赢&让盘&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
M['7']={'E':'1','T':'1','R':'<?=$qt_jg?>','E_A':'<?=$qtzc_ds?>','E_D':'<?=$qt_gj?>','T_A':'<?=$qt_ds?>','T_D':'<?=$qt_gj?>'};


M['0']={'TV':'0','TotalLive':'<?=$tgq_count?>','TotalToday':'1','TotalEarly':'1'};
//TotalLive滾球 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//--------Site Const---------------
var SiteMode = 2;
var UserLang = "cn";
var IsLogin = false;
//--------Odds Display---------------
var DisplayMode = '3';
//--------Menu---------------
var LastSelectedSport = -1;//-1;
var LastSelectedMArket = null;
var LastSelectedMenu=0; // Default All
//--------Racing---------------
var CanSeeHorse=false;
var CanSeeGreyhounds=false;
var CanSeeHarness=false;
//--------Number Game---------------
var CanSeeNumberGame=true;
//--------SitePermission--------
var IsCssControl=false;
var IsNewDropdownList=false;
//--------Virtual sport------------
var CanSeeVirtualSports=false;
var CanBetVirtualSports=false;
var CanSeeSportStreaming=false;

var imgSrc = '/cl/template/bbin/cs/images/before/';




//足球
//独赢&让球&大小
var LINK_1_A="";
//波膽
var LINK_1_B="";
//单 / 双 & 总入球
var LINK_1_C="";
//半场 / 全场
var LINK_1_D="";
//混合过关
var LINK_1_E="";
//冠軍
var LINK_1_F="";
//上半场波膽
var LINK_1_G="";
//結果
var LINK_1_R="";


//篮球
//让球&大小&单/双
var LINK_2_A="";
//混合过关
var LINK_2_B="";
//冠军
var LINK_2_C="";
//单节
var LINK_2_D="";
//结果
var LINK_2_R="";


//网球
//独赢&让盘&大小&单/双
var LINK_3_A="";
//冠军
var LINK_3_D="";
//结果
var LINK_3_R="";

//排球
//独赢&让盘&大小&单/双
var LINK_4_A="";
//冠军
var LINK_4_D="";
//结果
var LINK_4_R="";

//棒球
//独赢&让盘&大小&单/双
var LINK_5_A="";
//冠军
var LINK_5_C="";
//结果
var LINK_5_R="";

//冠军
//
var LINK_6_A="";
//结果
var LINK_6_R="";

//其他
//独赢&让盘&大小&单/双
var LINK_7_A="";
//冠军
var LINK_7_D="";
//结果
var LINK_7_R="";


//足球滚球
var LINK_L_1="<?=BROWSER_IP?>/app/member/show/FT_1_0.html";
//篮球滚球
var LINK_L_2="<?=BROWSER_IP?>/app/member/show/BK_1_0.html";

var game_type = "T";
function ins_url()
{
	if(game_type=="T")//今日賽事
	{
		
		//独赢&让球&大小
		LINK_1_A="<?=BROWSER_IP?>/app/member/show/FT_1_1.html";
		//波膽
		LINK_1_B="<?=BROWSER_IP?>/app/member/show/FT_1_4.html";
		//单 / 双 & 总入球
		LINK_1_C="<?=BROWSER_IP?>/app/member/show/FT_1_2.html";
		//半场 / 全场
		LINK_1_D="<?=BROWSER_IP?>/app/member/show/FT_1_3.html";
		//混合过关
		LINK_1_E="<?=BROWSER_IP?>/app/member/show/FT_1_1.html";
		//冠軍
		LINK_1_F="<?=BROWSER_IP?>/app/member/show/champion_FT.html";
		//上半场波膽
		LINK_1_G="<?=BROWSER_IP?>/app/member/show/FT_1_5.html";
		//結果
		LINK_1_R="<?=BROWSER_IP?>/app/member/show/result/football.php";

		//篮球
		//让球&大小&单/双
		LINK_2_A="<?=BROWSER_IP?>/app/member/show/bk_1_1.html";
		//混合过关
		LINK_2_B="<?=BROWSER_IP?>/app/member/show/bk_1_1.html";
		//冠军
		LINK_2_C="<?=BROWSER_IP?>/app/member/show/champion_bk.html";
		//单节
		LINK_2_D="<?=BROWSER_IP?>/app/member/show/bk_1_2.html";
		//结果
		LINK_2_R="<?=BROWSER_IP?>/app/member/show/result/basketball.php";

		//网球
		//独赢&让盘&大小&单/双
		LINK_3_A="<?=BROWSER_IP?>/app/member/show/tennis.html";
		//冠军
		LINK_3_D="<?=BROWSER_IP?>/app/member/show/champion_TN.html";
		//结果
		LINK_3_R="<?=BROWSER_IP?>/app/member/show/result/tennis.php";

		//排球
		//独赢&让盘&大小&单/双
		LINK_4_A="<?=BROWSER_IP?>/app/member/show/VolleyBall.html";
		//冠军
		LINK_4_D="<?=BROWSER_IP?>/app/member/show/champion_VB.html";
		//结果
		LINK_4_R="<?=BROWSER_IP?>/app/member/show/result/VolleyBall.php";

		//棒球
		//独赢&让盘&大小&单/双
		LINK_5_A="<?=BROWSER_IP?>/app/member/show/BaseBall.html";
		//冠军
		LINK_5_C="<?=BROWSER_IP?>/app/member/show/champion_BS.html";
		//结果
		LINK_5_R="<?=BROWSER_IP?>/app/member/show/result/BaseBall.php";

		//冠军
		//独赢&让盘&大小&单/双
		LINK_6_A="<?=BROWSER_IP?>/app/member/show/Champion.html";
		//结果
		LINK_6_R="<?=BROWSER_IP?>/app/member/show/result/Champion.php";

		//其他
		//独赢&让盘&大小&单/双
		LINK_7_A="<?=BROWSER_IP?>/app/member/show/other.html";
		//冠军
		LINK_7_D="<?=BROWSER_IP?>/app/member/show/champion_OP.html";
		//结果
		LINK_7_R="<?=BROWSER_IP?>/app/member/show/result/other.php";

	}
	if(game_type=="E")//早盤
	{
		//独赢&让球&大小
		LINK_1_A="<?=BROWSER_IP?>/app/member/show/FT_2_1.html";
		//波膽
		LINK_1_B="<?=BROWSER_IP?>/app/member/show/FT_2_4.html";
		//单 / 双 & 总入球
		LINK_1_C="<?=BROWSER_IP?>/app/member/show/FT_2_2.html";
		//半场 / 全场
		LINK_1_D="<?=BROWSER_IP?>/app/member/show/FT_2_3.html";
		//混合过关
		LINK_1_E="<?=BROWSER_IP?>/app/member/show/FT_2_1.html";
		//冠軍
		LINK_1_F="<?=BROWSER_IP?>/app/member/show/champion_FT.html";
		//上半场波膽
		LINK_1_G="<?=BROWSER_IP?>/app/member/show/FT_2_5.html";
		//結果
		LINK_1_R="<?=BROWSER_IP?>/app/member/show/result/football.php";


		//篮球
		//让球&大小&单/双
		LINK_2_A="<?=BROWSER_IP?>/app/member/show/bk_2_1.html";
		//混合过关
		LINK_2_B="<?=BROWSER_IP?>/app/member/show/bk_2_1.html";
		//冠军
		LINK_2_C="<?=BROWSER_IP?>/app/member/show/champion_bk.html";
		//单节
		LINK_2_D="<?=BROWSER_IP?>/app/member/show/bk_2_2.html";
		//结果
		LINK_2_R="<?=BROWSER_IP?>/app/member/show/result/basketball.php";


		//网球
		//独赢&让盘&大小&单/双
		LINK_3_A="<?=BROWSER_IP?>/app/member/show/tennis_2.html";
		//冠军
		LINK_3_D="<?=BROWSER_IP?>/app/member/show/champion_TN.html";
		//结果
		LINK_3_R="<?=BROWSER_IP?>/app/member/show/result/tennis.php";


		//排球
		//独赢&让盘&大小&单/双
		LINK_4_A="<?=BROWSER_IP?>/app/member/show/VolleyBall_2.html";
		//冠军
		LINK_4_D="<?=BROWSER_IP?>/app/member/show/champion_VB.html";
		//结果
		LINK_4_R="<?=BROWSER_IP?>/app/member/show/result/VolleyBall.php";

		//棒球
		//独赢&让盘&大小&单/双
		LINK_5_A="<?=BROWSER_IP?>/app/member/show/BaseBall_2.html";
		//冠军
		LINK_5_C="<?=BROWSER_IP?>/app/member/show/champion_BS.html";
		//结果
		LINK_5_R="<?=BROWSER_IP?>/app/member/show/result/BaseBall.php";

		//冠军
		//独赢&让盘&大小&单/双
		LINK_6_A="<?=BROWSER_IP?>/app/member/show/Champion.html";
		//结果
		LINK_6_R="<?=BROWSER_IP?>/app/member/show/result/Champion.php";


		//网球
		//独赢&让盘&大小&单/双
		LINK_7_A="<?=BROWSER_IP?>/app/member/show/other_2.html";
		//冠军
		LINK_7_D="<?=BROWSER_IP?>/app/member/show/champion_OP.html";
		//结果
		LINK_7_R="<?=BROWSER_IP?>/app/member/show/result/other.php";
		
	}
	//alert(game_type + r);
	 
}
var touzhutype=0; //交易类型,是单式还是串关,0是单式 1是串关
function go_url(r,t)
{
	quxiao_bet();
	touzhutype=t;
	$("#touzhutype").val(t);
	window.parent.open(r,"bodyFrame"); 
}

</script>
<link rel="stylesheet" href="css/myleft.css" type="text/css" />
<style>
body{ background: #493721; font-size: 12px; color: #333; padding-left:8px; width: 232px !important; overflow: hidden; }
body>div{ float: left; width: 216px; margin-bottom: 14px;}
.tabs .tab_top{ background: #FEF6E4; width: 100%; overflow: hidden;}
.tab_top .ord_on {
    padding-top: 10px;
    height: 32px;
    width: 99px;
    color: #3B2D1B;
    text-align: center;
    font-weight: bold!important;
    background: url(./images/order_ord_btn_on.gif) no-repeat left top;
}
.tab_top .record_btn {
    padding-top: 12px;
    height: 30px;
    width: 117px;
    color: #E9B567;
    text-align: center;
    font-weight: bold!important;
    background: url(./images/order_record_btn_out.gif) no-repeat right top;
}
.tabs .tab_content{ width: 100%; min-height: 105px; background: #E3CFAA url(./images/order_none.jpg) repeat-x 0 0 ; padding-top: 18px; display: none; }
.tabs .tab_content:nth-of-type(1){  background: url(./images/order_none.jpg) repeat-x 0 0, #E3CFAA url(./images/tishis.jpg) no-repeat left 48px !important;   }
.tabs .tab_content:nth-of-type(2){ /*background: url(./images/order_none.jpg) repeat-x 0 0, #E3CFAA url(./images/tishis2.jpg) no-repeat left 48px !important; */ padding-top:0px;}
.tabs .tab_content.active{ display: block; }
.tabs .tab_content p{ text-align: center; font-weight: bold; }

.gunqiuw .g_top, .gonggao .g_top{ width: 213px; margin-left: 1px;border: 1px solid #fff; border-bottom: none; height: 31px; color: #D4A45D; font-weight: bold; text-indent: 5px; line-height: 31px;border-radius: 5px 5px 0 0;}
.gonggao .g_top a{ float: right; color: #fff; margin-right: 10px;}
.gonggao .g_top a:hover{ color: #FFCC00; }
.gunqiuw a{ float: left; width: 100%; height: 31px; line-height: 31px; color: #000; text-indent: 40px; background: url(./images/oly_tr_ft.gif) repeat-x 0 0;   border: 1px solid #977F62; border-top:none;}
.gunqiuw a:nth-of-type(2){ background: url(./images/oly_tr_bk.gif) repeat-x 0 0; }
.gunqiuw a:hover{ background-position: 0 bottom; }

.gonggao .gao_content{ background: #DFCCA8; height: 83px; overflow: hidden;}
.gao_content marquee{ padding: 5px 10px; line-height: 1.5; }
</style>
</head>
<body>

	 
	<div class="tabs">
		<p class="tab_top">
			<a href="javascript:;" class="ord_on" style="float:left;">交易单</a>
			<a href="javascript:;" class="record_btn" style="float:right;">最新十笔交易</a>
		</p>
		<div class="tab_content active">
			<!-- <p id="tishini" name="tishini">点击赔率便可将<br />
			选项加到交易单里。</p> -->
			<div id="bet_div"  style=" display:none; margin:0">
		<div id="left" class="bet_div">
			<div class="match_bet" style="display: none;">体育快速交易</div>
			<div id="left_ids"></div>
			
			<div class="touzhu_2" id="usersid">
			<div class="touzhu_3" style="display: none;">会员帐号：<?=$username?></div>
			<div class="touzhu_3">可用额度：<span class="red" id="user_money">0</span></div>
			</div>
			<form action="bet.php" name="form1" id="form1" method="post" onsubmit="if($('#cg_msg').css('display')!='none') {if (parseInt($('#cg_num').html(),10)>=3) {return check_bet();}else{alert('投注失败，请至少选择三场比赛后再进行投注！');return false;}}else{return check_bet();}" style="margin:0 0 0 0;">
			<input type="hidden" name="touzhutype" id="touzhutype" value="0" />
			<div class="touzhu_4" id="cg_msg" style="display:none;">已选择<span id="cg_num"></span>场赛事</div>
			
			  
			<div id="touzhudiv" style="display:block;"></div>
			<div id="orderok"></div>
			<div id="post_s" style="display:none;color:#FF0000; text-align:center;" >正在提交数据...</div>   
			<div>
			<div id="okclose" style="display:block;">
			<div class="touzhu_3">交易金额：<input type="text" class="tou_input" name="bet_money" id="bet_money" autocomplete="off" maxlength="8" onkeypress="if((event.keyCode<48 || event.keyCode>57))event.returnValue=false"  onkeydown="if(event.keyCode==13)return check_bet();" onpaste="return false" oncontextmenu="return false" oncopy="return false" oncut="return false" size="8"/></div>
			<div class="touzhu_3">可赢金额：<span id="win_span" class="tou_red2">0.00</span><input type="hidden" value="0" name="bet_win" id="bet_win"  /></div>
			<div class="touzhu_3">最低限额：<span id="min_point_span">0</span></div>
				<div id="istz" style="color:#FF0000; text-align:center;">
					可赢金额：<span id="win_span1">0.00</span><br>是否确定交易？
				</div>        
			</div>
			</div>
			<br>
			<div style="display:block;text-align:center;margin-bottom: 8px;" id="okbtn">
			<input 	name="" class="submitq" type="button" onclick="quxiao_bet()" value="取消"/>　　
			<input id="submit_from" class="submitq" name="submit_from" type="submit" value="确认交易"/>
			</div>
			<div style="display:none;text-align:center;" id="closebtn">
			<input class="toua_3"	name="" type="button" onclick="quxiao_bet()" value=""/>　　
			</div>

			</form>
		</div>
		<br>
		<br>
	 </div>
		</div>
		<div class="tab_content">
			<table width="100%">
				<tr>
					<th>订单号</th>
					<th>下注金额</th>
				</tr>
			<?php
				$sql="select k.order_num,k.bet_money from k_bet k,user_list u where u.user_name='".$_SESSION["username"]."' and k.user_id=u.user_id order by k.id limit 0,10";
				$query=$mysqli->query($sql);
				$ro=array();
				while($row=$query->fetch_array())
					$ro[]=$row;
				foreach($ro as $k=>$v){
			?>
				<tr style="font-size:9px;color:red;" align="center"  bgcolor="#E3CFAA">
					<td><?=$v['order_num']?></td>
					<td><?=$v['bet_money']?></td>
				</tr>
			<?php 
				}
			?>
			</table>
		</div>
	</div>
	
	<div class="gunqiuw">
		<div class="g_top">滚球</div>
		<a href="javascript:go_url(LINK_L_1,0);" class="first">足球</a>
		<a href="javascript:go_url(LINK_L_2,0);" class="last">篮球</a>
	</div>
	
	<div class="gonggao">
		<div class="g_top">公告 <a href="javascript:;">更多</a></div>
		<div class="gao_content">
			<marquee height="70" scrollamount="1" direction="up" onmouseover="this.stop();" onmouseout="this.start();" style="height: 70px;">足球赛事:08月14日 哥伦比亚甲组联赛 (拉伊奎达德 VS 柏斯度) 因进球不予计算导致滚球比分错误, 所有投注在20:04:50至20:06:05的注单一律取消.
					</marquee>
		</div>
	</div>
<script>
(function(){
	var  tabs = $('.tab_top a'), tabList = $('.tabs .tab_content');

	tabs.eq(0).click(function(){
		$(this).removeClass('record_btn').addClass('ord_on');
		tabs.eq(1).removeClass('ord_on').addClass('record_btn');

		tabList.eq(0).fadeIn();
		tabList.eq(1).css('display','none');
	});

	tabs.eq(1).click(function(){
		$(this).removeClass('record_btn').addClass('ord_on');
		tabs.eq(0).removeClass('ord_on').addClass('record_btn');

		tabList.eq(1).fadeIn();
		tabList.eq(0).css('display','none');
	});


	$(window.top.document.body).find('#mainFrame').height(774);
})();
</script>
</body>
</html>
