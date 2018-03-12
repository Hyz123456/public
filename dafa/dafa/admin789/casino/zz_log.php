<?php
//if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");

check_quanxian("真人娱乐");

$gtype = $_GET["gtype"];
$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
	
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
	
}
$user_group = $_GET["user_group"];

$date_month = isset($_GET['date_month'])?$_GET['date_month']:'';

$live_type = $_GET['live_type'];
if($_GET['live_type']=="BBIN"){
	$live_type = "BBIN";
}else{
	if($_GET['live_type']=="MG"){
		$live_type = "MG";
	}else if($_GET['live_type']=="ALLBET"){
		$live_type = "ALLBET";
	}else if($_GET['live_type']=="NA"){
		$live_type = "NA";
		}else if($_GET['live_type']=="PT"){
		$live_type = "PT";
	}elseif($_GET['live_type']=="AG"){
	$live_type = "AG";
	}else{
	$live_type = "ALL";
	}
}
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
    function setDate(dateType){
        var dateNow= new Date();
        var dateStart;
        var dateEnd;
        if(dateType=="today"){
            dateStart = dateNow.Format("yyyy-MM-dd");
            dateEnd = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="yesterday"){
            dateNow.addDays(-1);
            dateStart = dateNow.Format("yyyy-MM-dd");
            dateEnd = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastSeven"){//最近7天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-6);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastThirty"){//最近30天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-29);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="thisWeek"){//本周
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDay());
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastWeek"){//上周
            dateNow.addDays(-dateNow.getDay()-1);
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-6);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="thisMonth"){//本月
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDate()+1);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastMonth"){//上月
            dateNow.addDays(-dateNow.getDate());
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDate()+1);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }
        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    function check(){
        if(!$("#s_time").val() || !$("#e_time").val() ){
            alert("请输入开始/结束日期。")
        }
        return true;
    }

    function onChangeMonth(value){
        if(value==""){
            return;
        }
        var dateNow= new Date();
        var dateStart;
        var dateEnd;

        dateNow.addDays(-dateNow.getDate()+1);
        dateNow.addMonths(-dateNow.getMonth()+parseInt(value)-1);
        dateStart = dateNow.Format("yyyy-MM-dd");
        dateNow.addMonths(1);
        dateNow.addDays(-1);
        dateEnd = dateNow.Format("yyyy-MM-dd");

        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    };
    Date.prototype.addDays = function(d)
    {
        this.setDate(this.getDate() + d);
    };

    Date.prototype.addWeeks = function(w)
    {
        this.addDays(w * 7);
    };

    Date.prototype.addMonths= function(m)
    {
        var d = this.getDate();
        this.setMonth(this.getMonth() + m);

        if (this.getDate() < d)
            this.setDate(0);
    };

    Date.prototype.addYears = function(y)
    {
        var m = this.getMonth();
        this.setFullYear(this.getFullYear() + y);

        if (m < this.getMonth())
        {
            this.setDate(0);
        }
    };
    //测试 var now = new Date(); now.addDays(1);//加减日期操作 alert(now.Format("yyyy-MM-dd"));

    Date.prototype.dateDiff = function(interval,endTime)
    {
        switch (interval)
        {
            case "s":   //計算秒差
                return parseInt((endTime-this)/1000);
            case "n":   //計算分差
                return parseInt((endTime-this)/60000);
            case "h":   //計算時差
                return parseInt((endTime-this)/3600000);
            case "d":   //計算日差
                return parseInt((endTime-this)/86400000);
            case "w":   //計算週差
                return parseInt((endTime-this)/(86400000*7));
            case "m":   //計算月差
                return (endTime.getMonth()+1)+((endTime.getFullYear()-this.getFullYear())*12)-(this.getMonth()+1);
            case "y":   //計算年差
                return endTime.getFullYear()-this.getFullYear();
            default:    //輸入有誤
                return undefined;
        }
    }
    //测试 var starTime = new Date("2007/05/12 07:30:00");     var endTime = new Date("2008/06/12 08:32:02");     document.writeln("秒差: "+starTime .dateDiff("s",endTime )+"<br>");     document.writeln("分差: "+starTime .dateDiff("n",endTime )+"<br>");     document.writeln("時差: "+starTime .dateDiff("h",endTime )+"<br>");     document.writeln("日差: "+starTime .dateDiff("d",endTime )+"<br>");     document.writeln("週差: "+starTime .dateDiff("w",endTime )+"<br>");     document.writeln("月差: "+starTime .dateDiff("m",endTime )+"<br>");     document.writeln("年差: "+starTime .dateDiff("y",endTime )+"<br>");


    function confirm_zz(id){
        if(confirm("确定通过此笔真人转账？")){
            $.post("confirm_zz.php",{id:id} ,function (data) {
                    var strArray = data.split("<\/script>\n");

                    if(parseInt(strArray[1])>-1){
                        document.location.reload();
                    }else{
                        alert(strArray[1]);
                    }
                }
            );
        }
    }
    function confuse_zz(id,user_id){
        if(confirm("确定拒绝此笔真人转账？")){
            $.post("confuse_zz.php",{id:id,user_id:user_id} ,function (data) {
                    var strArray = data.split("<\/script>\n");

                    if(parseInt(strArray[1])>-1){
                        document.location.reload();
                    }else{
                        alert(strArray[1]);
                    }
                }
            );
        }
    }
</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
<div id="pageMain">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#ccc">
    <form name="form1" id="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
        <tr>
            <td align="left" bgcolor="#FFFFFF">
                <select name="status" id="status">
                    <option value="4" style="color:#FF0000;" <?=$_GET['status']=='4' ? 'selected' : ''?>>待审核记录</option>
                    <option value="0" style="color:#FF9900;" <?=$_GET['status']=='0' ? 'selected' : ''?>>未结算记录</option>
                    <option value="1" style="color:#FF0000;" <?=$_GET['status']=='1' ? 'selected' : ''?>>已结算记录</option>

                    <option value="0,1,4" <?=$_GET['status']=='0,1,4' ? 'selected' : ''?>>全部记录</option>
                </select>
                &nbsp;&nbsp;
                <?php /*
				<select name="live_type" id="live_type">
                    <option value="AG"  <?=$live_type=='AG' ? 'selected' : ''?>>AG</option>
                    <option value="BBIN"  <?=$live_type=='BBIN' ? 'selected' : ''?>>BBIN</option>
                    <option value="MG"  <?=$live_type=='MG' ? 'selected' : ''?>>MG</option>
                    <option value="ALLBET"  <?=$live_type=='ALLBET' ? 'selected' : ''?>>ALLBET</option>
					<option value="NA"  <?=$live_type=='NA' ? 'selected' : ''?>>NA</option>
                    <option value="PT"  <?=$live_type=='PT' ? 'selected' : ''?>>PT</option>
                    <option value="ALL" <?=$live_type=='ALL' ? 'selected' : ''?>>所有平台</option>
                </select>*/?>
                &nbsp;&nbsp;
                日期：<input name="s_time" type="text" id="s_time" value="<?=$s_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                ~
                <input name="e_time" type="text" id="e_time" value="<?=$e_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />

                &nbsp;&nbsp;
                用户名：<input name="user_group" value="<?=$user_group?>" style="width: 160px;" type="text">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="gtype" type="hidden" id="gtype" value="<?=$gtype?>" />
                <input type="submit" name="Submit" value="搜索">
            </td>
        </tr>
    </form>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#ccc">
    <tr style="background-color:#5a5a5a; color:#FFF">
        <th>订单号</th>
        <th>游戏类型</th>
        <th>账转类型</th>
        <th>用户名</th>
        <th>用户ID</th>
        <th>账转金额</th>
        <th>提交时间</th>

    </tr>
<?php
include("../../include/pager.class.php");
$in_vip_total = 0;
$out_vip_total = 0;
$sql	=	"select a.*,b.user_name from (select * from money_log where type='真人转账' and update_time >='".$s_time." 00:00:00"."' and update_time <= '".$e_time." 24:00:00"."' order by update_time desc) a inner join user_list b on ";
$sql.="  b.user_id=a.user_id ";
if($user_group){
	$sql.=" and b.user_name='".$user_group."'";
}
        $query	=	$mysqli->query($sql) or die('errorsql:'.$sql);
		 $sum		=	$mysqli->affected_rows; //总页数
    $thisPage	=	1;
    $pagenum	=	50;
    if($_GET['page']){
        $thisPage	=	$_GET['page'];
    }

    $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
    $myPage=new pager($sum,intval($CurrentPage),$pagenum);
    $pageStr= $myPage->GetPagerContent();
    $i		=	1; //记录 bid 数
    $start	=	($thisPage-1)*$pagenum+1;
    $end		=	$thisPage*$pagenum;
        while ($rows = $query->fetch_array()) {
            $color = "#FFFFFF";
            $over	 = "#EBEBEB";
            $out	 = "#ffffff";
			if($rows['order_value']>0){
				$in_vip_total +=$rows['order_value'];
			}else{
				$out_vip_total+=$rows['order_value'];
			}
			if($i >= $start && $i <= $end){
            ?>
            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td height="40" align="center" valign="middle"><?=$rows['order_num']?></td>
                <td align="center" valign="middle"><?=$rows['type']?></td>
                <td align="center" valign="middle"><?=$rows['about']?></td>
                <td align="center" valign="middle"><?=$rows['user_name']?></td>
                <td align="center" valign="middle"><?=$rows['user_id']?></td>
                <td align="center" valign="middle"><?=$rows['order_value']?></td>
                <td align="center" valign="middle"><?=$rows['update_time']?></td>
               
            </tr>
        <?php
		}
			if($i > $end) break;
		  $i++;
	  }
    ?>
    <tr style="background-color:#FFFFFF;">
        <td colspan="9" align="center" valign="middle">当前页成功转入金额:<?=$in_vip_total?>。&nbsp;&nbsp;  当前页成功转出金额:<?=0-$out_vip_total?>。&nbsp;&nbsp;   <br/>当前页总盈利金额:<?=($in_vip_total +$out_vip_total)?>。(如果是正数，说明赢钱，如果是负数，则为输钱)</td>
    </tr>
    <tr style="background-color:#FFFFFF;">
        <td colspan="9" align="center" valign="middle"><?php echo $pageStr;?></td>
    </tr>

</table></td>
</tr>
</table>
</div>
</body>
</html>