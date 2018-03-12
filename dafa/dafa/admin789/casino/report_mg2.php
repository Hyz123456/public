<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");
include_once("newPage.php");

check_quanxian("真人娱乐");
if(!isset($_GET['date_start'])) $_GET['date_start'] = Date('Y-m-d 00:00:00');
if(!isset($_GET['date_end'])) $_GET['date_end'] = Date('Y-m-d 23:59:59');
if($_GET['username']) {
    $sql="select user_name from user_list where user_name LIKE  '%" . $_GET['username'] . "%'";
    $query = $mysqli->query($sql);
    $rows = $query->fetch_array();
    $user = $rows[0];
}

$currdate = date("Y-m-d",time()+12*3600);
$username = trim($_GET["username"]);
$reflag = trim($_GET["reflag"]);
$t_time = trim($_GET["t_time"]);
$end_time = trim($_GET["end_time"]);
$arrGameTypes = Array(
    'BAC' => '百家乐',
    'CBAC' => '包桌百家乐',
    'LINK' => '连环百家乐',
    'DT' => '龙虎',
    'SHB' => '骰宝',
    'ROU' => '轮盘',
    'FT' => '番摊',
    'SL2'  => '水果'
);
$arrPayTypes = Array(
    1	=> '庄',
    2	=> '闲',
    3	=> '和',
    4	=> '庄对',
    5	=> '闲对',
    6	=> '大',
    7	=> '小',
    8	=> '散客区庄',
    9	=> '散客区闲',
    11	=> '庄(免佣)',
    21	=> '龙',
    22	=> '虎',
    23	=> '和',
    41	=> '大',
    42	=> '小',
    43	=> '单',
    44	=> '双',
    45	=> '全围',
    46	=> '围1',
    47	=> '围2',
    48	=> '围3',
    49	=> '围4',
    50	=> '围5',
    51	=> '围6',
    52	=> '单点1',
    53	=> '单点2',
    54	=> '单点3',
    55	=> '单点4',
    56	=> '单点5',
    57	=> '单点6',
    58	=> '对子1',
    59	=> '对子2',
    60	=> '对子3',
    61	=> '对子4',
    62	=> '对子5',
    63	=> '对子6',
    64	=> '组合12',
    65	=> '组合13',
    66	=> '组合14',
    67	=> '组合15',
    68	=> '组合16',
    69	=> '组合23',
    70	=> '组合24',
    71	=> '组合25',
    72	=> '组合26',
    73	=> '组合34',
    74	=> '组合35',
    75	=> '组合36',
    76	=> '组合45',
    77	=> '组合46',
    78	=> '组合56',
    79	=> '和值4',
    80	=> '和值5',
    81	=> '和值6',
    82	=> '和值7',
    83	=> '和值8',
    84	=> '和值9',
    85	=> '和值10',
    86	=> '和值11',
    87	=> '和值12',
    88	=> '和值13',
    89	=> '和值14',
    90	=> '和值15',
    91	=> '和值16',
    92	=> '和值17',
    101 => '直接注',
    102 => '分注',
    103 => '街注',
    104 => '三数',
    105 => '角注',
    106 => '4个号码',
    107 => '列1',
    108 => '列2',
    109 => '列3',
    110 => '线注',
    111 => '打一',
    112 => '打二',
    113 => '打三',
    114 => '红',
    115 => '黑',
    116 => '大',
    117 => '小',
    118 => '单',
    119 => '双',
    130 => '1番',
    131 => '2番',
    132 => '3番',
    133 => '4番',
    134 => '1念2',
    135 => '1念3',
    136 => '1念4',
    137 => '2念1',
    138 => '2念3',
    139 => '2念4',
    140 => '3念1',
    141 => '3念2',
    142 => '3念4',
    143 => '4念1',
    144 => '4念2',
    145 => '4念3',
    146 => '角(1,2)',
    147 => '单',
    148 => '角(1,4)',
    149 => '角(2,3)',
    150 => '双',
    151 => '角(3,4)',
    152 => '1,2四通',
    153 => '1,2三通',
    154 => '1,3四通',
    155 => '1,3二通',
    156 => '1,4三通',
    157 => '1,4二通',
    158 => '2,3四通',
    159 => '2,3一通',
    160 => '2,4三通',
    161 => '2,4一通',
    162 => '3,4二通',
    163 => '3,4一通',
    164 => '三门(3,2,1)',
    165 => '三门(2,1,4)',
    166 => '三门(1,4,3)',
    167 => '三门(4,3,2)',
);
?>
<html>
<head>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>BB投注记录</TITLE>
    <script language="javascript" src="/js/jquery.js"></script>
    <style type="text/css">
        <STYLE>
        BODY {
            SCROLLBAR-FACE-COLOR: rgb(255,204,0);
            SCROLLBAR-3DLIGHT-COLOR: rgb(255,207,116);
            SCROLLBAR-DARKSHADOW-COLOR: rgb(255,227,163);
            SCROLLBAR-BASE-COLOR: rgb(255,217,93)
        }
        .STYLE2 {font-size: 12px}
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        td{font:13px/120% "宋体";padding:3px;}
        a{color:#FFA93E;text-decoration: none;}
        .t-title{background:url(/super/images/06.gif);height:24px;}
        .t-tilte td{font-weight:800;}
    </STYLE>
</HEAD>

<body>
<script language="JavaScript" src="../../js/calendar.js"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font > <span class="STYLE2">MG投注记录</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="80%">
                <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                    <tr align="center">
                        <td nowrap align="center"> 类型：
                            <select onChange="self.form1.submit()" name="reflag" id="reflag">
                                <option value="">全部</option>
                                <option value="1" <?= $_GET['reflag']=='1' ? 'selected="selected"' : ''?>>已返水</option>
                                <option value="0" <?= $_GET['reflag']=='0' ? 'selected="selected"' : ''?>>未返水</option>
                            </select> </td>
                        <td nowrap align="center">下注开始日期：
                            <input name="t_time" type="text" id="t_time" value="<?=$_GET['t_time']==''?$currdate:$_GET['t_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
                        </td><td nowrap align="center">下注结束日期:
                            <input name="end_time" type="text" id="end_time" value="<?=$_GET['end_time']==''?$currdate:$_GET['end_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly />
                        </td><td nowrap align="center">会员：
                            <input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
                        </td><td nowrap align="center"><input type="submit" name="Submit" value="搜索"></td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
</table>
</table>


<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC"><tr><td ><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
                            <tr style="background-color: #EFE">
                                <td width="100" align="center"><strong>用户</strong></td>
                                <td width="100" align="center"><strong>订单号</strong></td>
                                <td width="100" height="20" align="center"><strong>投注时间</strong></td>
                                <td width="100" align="center"><strong>派彩时间</strong></td>
                                <td width="60" align="center"><strong>游戏类型</strong></td>
                                <td width="60" align="center"><strong>投注游戏</strong></td>
                                <td width="80" align="center"><strong>投注金额</strong></td>
                                <td width="80" align="center"><strong>输赢金额</strong></td>
                                <td width="80" align="center"><strong>有效投注金额</strong></td>
                                <td width="60" align="center"><strong>反水状态</strong></td>
                                <td width="50" align="center"><strong>反点</strong></td>
                                <td width="50" align="center"><strong>反点金额</strong></td>
                                <td width="100" align="center"><strong>反点时间</strong></td>
                                <!-- <td width="46" align="center"><strong>删除</strong></td>-->
                            </tr>
                            <?php
                            // $sql = "select id from ag_Transfer WHERE 1=1 ";
                            $sql = "select id  from api_mgbetdetail WHERE 1=1 ";
                            if($_GET['username']) $sql .="and AccountNo LIKE '%".$_GET['username']."%' ";

                            if( $_GET['reflag']!="" ) $sql .= "and reflag in(" . $_GET['reflag'] . ") ";
                            //if($_GET['live'] && $_GET['live']!="0" ) $sql .= "and type in(" . $_GET['live'] . ") ";
                            //if($_GET['type'] && $_GET['type']!="0" ) $sql .= "and AG_type in(" . $_GET['type'] . ") ";
                            //if($_GET['type'] && $_GET['type']!="0" ) $sql .= "and type in(" . $_GET['type'] . ") ";
                            //if($_GET['result'] && $_GET['result']!="全部状态") $sql .= "and result = '" . $_GET['result'] . "' ";
                            if($_GET['t_time']){
                                $sql .="and Date >= '".$_GET['t_time']."'";
                            }else{
                                $sql .="and Date >= '".$currdate."'";
                            }

                            if($_GET['end_time']){
                                $sql .="and Date <= '".$_GET['end_time']."'";
                            }else{
                                $sql .="and Date <= '".$currdate." 23:59:59'";
                            }


                            //if($_GET['t_time'])$sql .="and betTime >= '".$_GET['t_time']."'";
                            //if($_GET['t_time'])$sql .="and actiontime >= ".strtotime($_GET['t_time']);
                            //if($_GET['end_time'])$sql .="and betTime <= '".$_GET['end_time']." 23:59:59'";
                            //if($_GET['end_time'])$sql .=" and actiontime <= ".strtotime($_GET['end_time'].' 23:59:59');
                            $sql .= " order by id desc";
                            //echo $sql;
                            /**
                            if($_GET['username']){
                            $sql		=	"select id from ag_Transfer WHERE username='". $_GET['username']."' order by id desc";
                            }else{
                            $sql		=	"select id from ag_Transfer order by id desc";
                            }
                             **/
                            $query		=	$mysqli->query($sql);
                            $sum		=	$mysqli->affected_rows; //总页数
                            $thisPage	=	1;
                            if($_GET['page']){
                                $thisPage	=	$_GET['page'];
                            }
                            $page		=	new newPage();
                            $thisPage	=	$page->check_Page($thisPage,$sum,50,100);

                            $nid		=	'';
                            $i			=	1; //记录 uid 数
                            $start		=	($thisPage-1)*50+1;
                            $end		=	$thisPage*50;


                            while($row = $query->fetch_array()){
                                if($i >= $start && $i <= $end){
                                    $nid .=	$row['id'].',';
                                }
                                if($i > $end) break;
                                $i++;
                            }
                            if($nid){
                                $nid	=	rtrim($nid,',');
// 	$sql   = "select * from ag_Transfer where id in($nid) ";
                                $sql   = "select * from api_mgbetdetail where id in($nid) ";
                                if($_GET['username']) $sql .="and AccountNo LIKE '%".$_GET['username']."%' ";
// 	if($_GET['live'] && $_GET['live']!="0")$sql .="and AG_type in(" . $_GET['live'] . ") ";
//     if($_GET['type'] && $_GET['type']!="0")$sql .="and AG_type in(" . $_GET['type'] . ") ";
                                //if($_GET['live'] && $_GET['live']!="0")$sql .="and type in(" . $_GET['live'] . ") ";
                                //if($_GET['type'] && $_GET['type']!="0")$sql .="and type in(" . $_GET['type'] . ") ";
                                //if($_GET['result'] && $_GET['result']!="全部状态")$sql .="and result ='".$_GET['result']."' ";
// 	if($_GET['t_time'])$sql .="and Transfer_time >= '".$_GET['t_time']."'";
//  if($_GET['end_time'])$sql .="and Transfer_time <= '".$_GET['end_time']." 23:59:59'";
                                //if($_GET['t_time'])$sql .="and actiontime >= ".strtotime($_GET['t_time']);
                                // if($_GET['end_time'])$sql .=" and actiontime <= ".strtotime($_GET['end_time'].' 23:59:59');
                                $sql  .=" order by id desc";
// 	echo $sql;
                                /**
                                if($_GET['username']){
                                $sql	=	"select * from ag_Transfer where id in($nid) and username='".$_GET['username']."'order by id desc";

                                }else{
                                $sql	=	"select * from ag_Transfer where id in($nid) order by id desc";
                                }
                                 **/
                                $query	=	$mysqli->query($sql);
                                $time	=	time();
                                while($rows = $query->fetch_array()){
                                    $gameType='MG娱乐';
                                    ?>
                                    <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
                                        <td align="center" ><?=$rows["AccountNo"]?></td>
                                        <td align="center" ><?=$rows["id"]?></td>
                                        <td align="center" valign="middle"><?=date("Y-m-d H:i:s",strtotime($rows["Date"]))?></td>
                                        <td align="center" valign="middle"><?=date("Y-m-d H:i:s",strtotime($rows["Date"]))?></td>
                                        <td align="center" ><?=$gameType?></td>
                                        <td align="center" ><?=$rows["Game"]?></td>
                                        <td align="center" ><?=$rows["BetAmount"]?></td>
                                        <td align="center" ><?=$rows["GGRAmount"]?></td>
                                        <td align="center" ><?=$rows["BetAmount"]?></td>
                                        <td align="center" ><?=$rows["reflag"]?></td>
                                        <td align="center" ><?=$rows["rerate"]?></td>
                                        <td align="center" ><?=$rows["reamount"]?></td>
                                        <td align="center" ><?=$rows["redate"]?></td>
                                        <!-- <td align="center"></td>-->
                                    </tr>
                                <?php
                                }
                            }
                            ?>

                        </table></td>
                </tr>
                <tr>
                    <td > <?=$page->get_htmlPage("report_mg2.php?username=".$username."&t_time=".$t_time."&end_time=".$end_time."&reflag=".$reflag);?></td>
                </tr>
            </table></td></tr>
</table>
</body>
</html>