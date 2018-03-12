<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/cache/website.php");
include_once("common/login_check.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

if(isset($_SESSION["adminid"])){

}else{
    unset($_SESSION["adminid"]);
    unset($_SESSION["quanxian"]);
    echo "<script>alert('没有登陆!!');</script>";
    echo "<script>window.parent.location.href='/'</script>";
    exit();
}

$bet_count  =	0;
$count_zd	=	array();
$hyzs		=	$jrhy	=	0; //会员总数
$cjdl_count = 0;
$ymd		=	date("Y-m-d");
$ymd1=	date("Ymd");
$sql		=	"select count(id) as s from user_list";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$hyzs		=	$rs['s'];

$sql		=	"select count(id) as s from user_list where regtime like ('".$ymd."%')";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$jrhy		=	$rs['s'];

$sql		=	"select count(id) as s from user_list where onlinetime like ('".$ymd."%')";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$cjdl_count		=	$rs['s'];

$sql		=	"select count(id) as s from k_bet where bet_time like ('".$ymd."%')"; //单式注单
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count	=	$rs['s'];

$sql		=	"select count(id) as s from k_bet_cg_group where bet_time like ('".$ymd."%')"; //串关注单
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count +=	$rs['s'];

$sql		=	"select count(id) as s from order_lottery_sub where order_sub_num like ('".$ymd1."%')"; //彩票
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count +=	$rs['s'];

$sql		=	"select count(id) as s from six_lottery_order_sub where order_sub_num like ('".$ymd1."%')"; //六合彩
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$bet_count +=	$rs['s'];

$tixian_today=	$cunkuan_today	=	0;
$sql		=	"select order_value from money where `status`='成功' and (`type`='在线支付' or `type`='用户提款') and update_time like('".$ymd."%')";
$query		=	$mysqli->query($sql);
while($rows	=	$query->fetch_array()){
    if($rows['order_value'] < 0) $tixian_today++;
    else $cunkuan_today++;
}

$sql		=	"select count(id) as s from money where `status`='成功' and `type`='银行汇款' and `update_time` like('".$ymd."%')";
$query		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$huikuan_today	=	$rs['s'];//今日汇款笔数
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="images/css1/css.css" rel="stylesheet" type="text/css">
    <script src="/cl/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <style type="text/css">
      .maifenz{ color: #F37605;display: inline-block;margin-left: 20px; }
      .tongji_box{ width: 100%; overflow: hidden; }
      .tongji{     width: 20%;  margin: 10px 6% 0; color: #6d6d6d; border-radius: 5px; float: left;     padding: 2% 0; line-height: 200%;  text-align: center; font-weight: normal; border-bottom: 0;
             
      }    
      .orange{ color: orange; font-weight: bold; font-size: 120%;}
      </style>
</head>
<SCRIPT language=javascript>
    <!--
    var displayBar=true;
    function switchBar(obj){
        if (displayBar)
        {
            parent.frame.cols="0,*";
            displayBar=false;
            obj.value="打开左边管理菜单";
        }
        else{
            parent.frame.cols="228,*";
            displayBar=true;
            obj.value="关闭左边管理菜单";
        }
    }

    function fullmenu(url){
        if (url==null) {url = "admin_left.asp";}
        parent.leftFrame.location = url;
    }

    //-->
</SCRIPT>


<body>
<?php
 //$start=date('Y-m-01', strtotime(date("Y-m-d")));
 //echo $start;
 $taday=date('Y-m-d',time());
 //echo $taday;
 $sql2="select * from money where update_time like '%".$taday."%'";
	
  $query		=	$mysqli->query($sql2);
 while($rows = $query->fetch_array()){

	
	/*if($rows["status"]=="失败"){
				if($rows["type"]=="在线支付"){
					  $zfsb2	+=	$rows["balance"];
				}
				if($rows["type"]=="后台充值"){
					  $htsb2	+=	$rows["balance"];
				}
				if($rows["type"]=="用户提款"){
					  $tksb2	+=	abs($rows["order_value"]);
				}if($rows["type"]=="后台扣款"){
					  $htkk2	+=abs($rows["order_value"]);
			    }
				if($rows["type"]=="银行汇款"){
					  $hksb2	+=$rows["balance"];
				}
	}else */
		if($rows["status"]=="成功"){
				if($rows["type"]=="在线支付"){
					  $zfcg2	+=	$rows["balance"];
					//赠送金额
					  $zfzs2+=$rows['zsjr'];
				}
				if($rows["type"]=="后台充值"){
					  $htcg2	+=$rows["balance"];	
					  
				}
				if($rows["type"]=="用户提款"){
					  $tkcg2	+=abs($rows["order_value"]);
					  //手续费
					  $sx_sum2+=$rows['sxf'];
				}
				if($rows["type"]=="后台扣款"){
					  $htkk2	+=abs($rows["order_value"]);
			    }
				if($rows["type"]=="银行汇款"){
					  $hkcg2	+=$rows["balance"];
					  //赠送金额
					 $yhzs2+=$rows['zsjr'];
				}
	
	}
	//总额
	$total2+=$rows['balance'];	

	//总收入:不加赠送金额
	$income2= ($zfcg2+$htcg2+$hkcg2);

	//总支出，提款成功后还要减去手续费
    $pay2=$tkcg2+ $sx_sum2+$htkk2;

	//总盈利:不加赠送金额
	$gain2=$income2-$pay2;

	//总额，加在线支付和银行汇款赠送的金额
	$total2=$total2+$zfzs2+$yhzs2;

 }
?>
<div style="overflow: hidden;">
<table style="float: left;margin-left: 6px;" class="table" cellspacing="1" cellpadding="2" width="50%" align="center"
       border="0">
    <tbody>
    <tr>
        <th class="bg_tr" align="left" colspan="2" height="25">
            今日统计<span class="TableRow2" style="float: right;margin-right:20px;">会员总数量：<?=$hyzs?></span>
        </th>
    </tr>
    <tr>
      <td>
        <div class="tongji_box">
        <p class="bg_tr tongji"><span class="orange"><?=$income2+'0'?></span><br />今日收入总额</p>
        <p class="bg_tr tongji"><span class="orange"><?=$pay2+'0'?></span><br />今日支出总额</p>
        <p class="bg_tr tongji"><span class="orange"><?=$gain2+'0'?></span><br />今日盈利总额</p>
        <p class="bg_tr tongji"><span class="orange"><?=$jrhy?>个</span><br />今日新增会员</p>
        <p class="bg_tr tongji"><span class="orange"><?=$cjdl_count?>个</span><br />今日在线总量</p>
        <p class="bg_tr tongji"><span class="orange"><?=$bet_count?>笔</span><br />今日注单量</p>

<!--         <p class="tongji"><span class="orange">(<?=$tixian_today?>)</span><br />今日提现笔数</p>
<p class="tongji"><span class="orange">(<?=$cunkuan_today?>)</span><br />今日存款笔数</p>
<p class="tongji"><span class="orange">(<?=$huikuan_today?>)</span><br />今日汇款笔数</p> -->
      </div>
      </td>
    </tr>
    </tbody>
</table>
<table style="float: left;margin-left: 5px;" class="table" cellspacing="1" cellpadding="2" width="48%" align="center"
       border="0">
    <tbody>
    <tr>
        <th class="bg_tr" align="left" colspan="2" height="25">系统公告</th>
    </tr>
    <tr>
        <td class="td_bg">
		<iframe src="/admin/list.php" name="ggFrame" id="ggFrame" title="ggFrame" frameborder=0 width="100%" scrolling=no height=85 ></iframe> 
		</td>
    </tr>
    </tbody>
</table>
</div>

<div class="section">
        <div class="head" style="margin-left:6px;">
          <span>余额统计</span>
        </div>

        <div class="contents">
                <?
              $sql  =   "select ag_hall,bbin_hall from sys_config limit 0,1";
              $query    =   $mysqli->query($sql);
              $rows_ag  =   $query->fetch_array();
              ?>
              <p>
              <span id='ag_money'><?
                //echo file_get_contents('http://47.88.8.241:741/MG/index/get_agent_credit/id/asdasd');
                //为了不影响速度 ，该用 jquery $.get?></span>
                <br />AG可用额度
              </p> 

              <p>
             <span id='bb_money'></span>
               <br /> BB可用额度
              </p>

              <p>
                           <span id='mg_money'></span>
                           <br /> MG可用额度
              </p>
              
              <p>
              <span id='pt_money'></span>
                           <br /> PT可用额度
              </p>
              
        <!--      <p>
              <span id='na_money'></span>
              <br />NA可用额度
              </p>-->
              
               <p>
              <span id='ab_money'></span>
              <br />AB可用额度
              </p>
             <!-- 
              			   <p>
              <span id='cp_money'></span>
              <br />BH彩票
              </p>
              
              <p>
              <span id='bh_money'></span>
              <br />BH棋牌
              </p> -->
        </div>
    </div>

    <script>
    $(function(){
       
        getAg();
        getBb();
        getMg();
        getAb();
       // getNa();
        getPt();
//getcp();getqp();
        function getAg() {
           $.get('/newag2/get_credit.php',function(data){
                data ?  $('#ag_money').css('background','none').text('￥'+data) :  getAg();
             }
           );
		  
        }
        function getBb() {
           $.get('/newbbin2/get_credit.php',function(data){
              data ?  $('#bb_money').css('background','none').text('￥'+data) :  getBb();
            }
           );
        }
        function getMg() {
           $.get('/newmg2/get_credit.php',function(data){
              data ?  $('#mg_money').css('background','none').text('￥'+data) :  getMg();
            }
           );
        }
        function getAb() {
           $.get('/newab2/get_credit.php',function(data){
              data ?  $('#ab_money').css('background','none').text('￥'+data) :  getAb();
            }
           );
        }
        /*function getNa() {
           $.get('/newna2/get_credit.php',function(data){
              data ?  $('#na_money').css('background','none').text('￥'+data) :  getNa();
            }
           );
        }*/
        function getPt() {
           $.get('/newpt2/get_credit.php',function(data){
              data ?  $('#pt_money').css('background','none').text('￥'+data) :  getPt();
            }
           );
        }
	/*	 function getcp() {
           $.get('/cpjk/get_credit.php',function(data){
              data ?  $('#cp_money').css('background','none').text('￥'+data) :  getcp();
            }
           );
        }
		 function getqp() {
           $.get('/newdx/get_credit.php',function(data){
              data ?  $('#bh_money').css('background','none').text('￥'+data) :  getqp();
            }
           );
        }*/





        
    });
    </script>

<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
       border="0">
    <tbody>
    <tr>
        <th class="bg_tr" align="left" colspan="2" height="25">饼干图</th>
    </tr>
    <tr>
        <td class="td_bg"><iframe src="zdfx.php" name="zdfxFrame" id="zdfxFrame" title="zdfxFrame" frameborder=0 width="49%" scrolling=no height=300 ></iframe>&nbsp;<iframe src="login_user.php" name="luFrame" id="luFrame" title="luFrame" frameborder=0 width="49%" scrolling=no height=300 ></iframe></td>
    </tr>
    </tbody>
</table>
</body>
</html>
