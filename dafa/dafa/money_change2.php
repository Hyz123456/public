<?php
if(!isset($_SESSION)){ session_start();}
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"]))
{
    header("Location:/login/login.php");
    exit();
}
if(!isset($_SESSION)){ session_start();}
if($_SESSION["username"]=='')
{
    header("Location: /login/login.php");
    exit;
}
?>
<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/class/live_info.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once($C_Patch."/app/member/class/user.php");
if(!isset($_SESSION)){ session_start();}
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
$loginid=   isset($_SESSION["uid"])? $_SESSION["uid"]:'';
include_once($C_Patch."/app/member/class/auto_transfer.php");
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"]))
{
    header("Location:/index.php");
    exit();
}
unset($mysqli);
$mysqli =   new MySQLi("127.0.0.1","root","root123654","aobet");
$mysqli->query("set names utf8");
$username = $_SESSION["username"];

$sql = "select * from user_list u where u.user_id='".$_SESSION["userid"]."' limit 0,1";
$query  = $mysqli->query($sql);
$user_info    = $query->fetch_array();

$bbinstyle="";
//if($bbinid!=""){
if(false){
  //$user_info_bbin = live_info::getUserAndLife($_SESSION["userid"],'BBIN');
}
else{
  $bbinstyle="style=\"display: none;\"";
}


//  ---------------------------------0505----------------------

$action=isset($_GET['action'])? $_GET['action']:'';
if($action=='save'){


    $zztype=isset($_POST['zz_type'])? $_POST['zz_type']:'';
    $zzmoney=isset($_POST['zz_money'])? $_POST['zz_money']:'';

    $sql = "select * from user_list where user_id='$uid'";
    $result = $mysqli->query($sql);
    $row=$result->fetch_array();
    //$conver=htmlEncode(doubleval($zzmoney));
    $conver=doubleval($zzmoney);

    if( ($zztype==1||$zztype==7) && (($conver<0)||($conver>$row["money"])) ){
        //echo "<script>alert('转账金额不能大于账户余额，请重新输入。'); history.go(-1);</script>";
        echo '转账金额不能大于账户余额，请重新输入。';
        exit;
    }

    if($zztype==1 || $zztype==2){

        if($zztype==1){
            $about = "主账户->AG大厅";

            auto_transfer::agToGame($user_info, $conver);
        }
        elseif($zztype==2){
            $about = "AG大厅->主账户";
            auto_transfer::agOut($user_info, $conver);
        }
    }
    if($zztype==3 || $zztype==4){

        if($zztype==3){
            $about = "主账户->AB大厅";

            auto_transfer::ALLBetToGame($user_info, $conver);
        }
        elseif($zztype==4){
            $about = "AB大厅->主账户";
            auto_transfer::ALLBetOut($user_info, $conver);
        }
    }
    if($zztype==5 || $zztype==6){

        if($zztype==5){
            $about = "主账户->MG大厅";

            auto_transfer::mgToGame($user_info, $conver);
        }
        elseif($zztype==6){
            $about = "MG大厅->主账户";
            auto_transfer::mgOut($user_info, $conver);
        }
    }
    elseif($zztype==7 || $zztype==8){

        if($zztype==7){
            $about = "主账户->BBIN大厅";

            auto_transfer::bbinToGame($user_info, $conver);
        }
        elseif($zztype==8){
            $about = "BBIN大厅->主账户";

            auto_transfer::bbinOut($user_info, $conver);
        }
    }   elseif($zztype==9 || $zztype==10){

        if($zztype==9){
            $about = "主账户->PT大厅";

            auto_transfer::ptToGame($user_info, $conver);
        }
        elseif($zztype==10){
            $about = "PT大厅->主账户";

            auto_transfer::ptOut($user_info, $conver);
        }
    }



}

function randomkeys($length)
{
 $pattern='1234567890';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,9)}; 
 }
 return $key;
}

?>

<!DOCTYPE HTML>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
<title>额度转换</title>
<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script>
    var ClientW = $(window).width();
    $('html').css('fontSize',ClientW/3+'px');

    $(window).resize(function(){
        var ClientW = $(window).width();
        $('html').css('fontSize',ClientW/3+'px');
    });
</script>
<style >

*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}
html{ width:100%; height:100%; overflow:hidden; overflow-x:hidden;
overflow-y:hidden;}
body{
margin:0;
font-size:0.15rem;
color:#fff;
width:100%;
height:100%;
overflow:hidden;
overflow-x:hidden;
overflow-y:hidden;
background: url(/img/bg.png) no-repeat;
background-size: cover;
}
table{
width:100%;
margin:0.1rem auto;
}
table td{ padding:0.06rem 0; }
#headerBox{ width:100%; height:0.35rem; line-height:0.35rem;background: #130d35; box-sizing:border-box; overflow:hidden;  position:relative;text-align: center;}
#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(../../img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
#headerBox .logo{ display:block; margin: calc(0.175rem - 0.15rem) auto 0; height:0.3rem; }
select,input{ border:none !important; height:0.2rem; }
select{ width:1rem; }
input:nth-of-type(2){ width:1rem !important; }
#submit{ width:1rem; height:0.25rem; color:#fff; border-radius:0.03rem; background:#660704 !important; position:relative;     top: 0.25rem;
    left: -0.25rem; }

.footer {background:white;border-top:1px solid #F90;position:fixed;left:0;bottom:0;height:0.38rem;overflow:visible;width:100%;}
.footer>a {float:left;width:20%;color:#929292;height:100%;}
.footer>a>span {display:block;height:0.22rem;width:0.24rem;margin:0.02rem auto 0;background:url(/img/footerx2.png) no-repeat;background-size:cover;}
.footer>a:nth-child(1)>span {background-position:-0.22rem center;}
.footer>a:nth-child(2)>span {background-position:-0.45rem center;}
.footer>a:nth-child(3)>span {background-position:-0.67rem center;}
.footer>a:nth-child(4)>span {background-position:-0.9rem center;}
.footer>a:nth-child(5)>span {background-position:0 center;}
.footer>a>p {text-align:center;font-size:0.09rem;}
.footer .float {width:20%;height:2px;background:#fe4902;position:absolute;left:0;top:-2px;transition:.4s all linear;}

.section_box{
    width: 3rem;
    overflow: hidden; 
}

.mask, .mask2{
filter: alpha(opacity=80);
    -moz-opacity: 0.8;
    -khtml-opacity: 0.8;
    opacity: 0.8;
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    text-align: center;
	background: rgba(255, 255, 255, 0.5);
    display: none;
}


input, select, textarea {
    -webkit-appearance: none;
}
body{
    background: url("/pic/bg.jpg?v=u91dedfdb");
    background-size: cover;
    overflow-y: auto;
}
#headerBox{
    border-bottom: 1px solid rgba(255,255,255,.7);
    background: rgba(255,255,255,.4); 
}
#headerBox a{
        background:url(../../img/index_ico.png) center center no-repeat;
        background-size: 85%;
}
#MMainData{
        margin-top: 0.2rem;
}
.sub-title{
    border-top: 1px solid #fff;
    background: rgba(255,255,255,.3);
    padding: 10px 16px;
    font-size: 16px;
    text-align: left;
    color: #000;
}
.sub-title .refresh{
    float: right;
}
.sub-title .refresh img{
    width: 22px;
}
.row{
       border-bottom: 1px solid #fff;
}

.row table{
    margin: 0;
    border-collapse: collapse;
}
.row table td{
    text-align: center;
    color: #000;
    border-top: 1px solid #fff;
    border-right: 1px solid #fff;
    background-color: rgba(255,255,255,.5);
    
}
.not table td{
    color: gray;
    
}
 .row .col span {
    line-height: 25px;
    font-size: 16px;
}
.transfer-submit{
    margin-top: 10px;
    padding: 16px 0;
    color: #000;
}
.transfer-submit h5 {
    font-size: 16px;
    margin: 0 16px 5px;
    opacity: .8;
}
.transfer-submit table {
}
.transfer-submit table input {
    background: 0 0;
    width: 100%;
    height: 38px;
    text-align: left;
    font-size: 16px;
    outline:none;
}
.tiankong{
    border: 1px solid;
    border-color: rgba(255,255,255,.6);
    background: rgba(255,255,255,.3);
}
.transfer-submit table td{
    text-align: center;
    padding: 0.06rem 0.1rem;
}
.transfer-submit table span {
    border: 1px solid rgba(255,255,255,.6);
    display: block;
    height: 40px;
    line-height: 40px;
    background: rgba(255,255,255,.3);
}
.transfer-button{
    padding: 0.06rem 0.1rem;
}
#submit{
    position: static;
    width: 100%;
    background: -webkit-linear-gradient(top,#298dff,#1081ff) !important;
    display: inline-block;
    padding: 0 12px;
    min-width: 52px;
    min-height: 47px;
    text-align: center;  
    font-size: 20px;
}
.row .choose{
    background: rgba(255,255,255,.8)url("/pic/icon-selected.png?v=u705f4885") top left no-repeat;
    background-size: 30px;
}
.row .choose span{
    color: red;
}
.transfer-submit span.choose{
    background: #32a1ff;
    border-color: #32a1ff;
    color: #fff;
}
.ng-binding{
        font-size: 16px;
}
</style>
</head>
<body>
<header id="headerBox">
        <span class="languang">额度转换</span>
        <a href="/wap.php"></a>
</header>
<div id="MACenterContent">
    <div id="MNav">
    <div id="MMainData" >
        <div class="sub-title">选择钱包<a class="refresh"><img src="/pic/icon-refresh.png"></a></div>
        <div class="row" id="zhuanchu">
            <table>
                <tr>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">我的钱包</p>
                        <span  class="ng-binding" id="MBallCredit"><?=$user_info["money"]?></span>
                    </td>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">AG娱乐场</p>
                        <span  class="ng-binding" id="ag_money">0.00</span>
                    </td>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">BBIN娱乐场</p>
                        <span  class="ng-binding" id="bb_money">0.00</span>
                    </td>
          <br />
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">ALLBet</p>
                        <span  class="ng-binding" id="ab_money">0.00</span>
                    </td>


                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">MG娱乐场</p>
                        <span  class="ng-binding" id="mg_money">0.00</span>
                    </td>

                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">PT</p>
                        <span  class="ng-binding" id="pt_money">0.00</span>
                    </td>


                </tr>
            </table>
        </div>
        <div class="sub-title">转入</div>
        <div class="row" id="zhuru">
            <table>
                <tr>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">我的钱包</p>
                    </td>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">AG娱乐场</p>

                    </td>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">BBIN娱乐场</p>
                    </td>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">ALLBet</p>
                    </td>
                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">MG娱乐场</p>
                    </td>

                    <td style="display:block;float:left;width: 33%;">
                        <p class="ng-binding">PT</p>
                    </td>


                </tr>
            </table>
        </div>
       <form action="javascript:confirmChangeMoney();" id="form1" method="post" name="form1">
        <div class="transfer-submit">
                <h5 class="ng-binding">选择转账金额</h5>
                <table>
                    <tr><td colspan="3"><div class="tiankong"><input type="tel" name="zz_money" id="zz_money" onkeyup="if(isNaN(value))execCommand('undo')" placeholder="输入金额"></div></td></tr>
                    <tr>
                        <td><span class="ng-binding">全部</span></td>
                        <td><span class="ng-binding">100</span></td>
                        <td><span class="ng-binding">500</span></td>
                    </tr>
                    <tr>
                        <td><span class="ng-binding">1000</span></td>
                        <td><span class="ng-binding">5000</span></td>
                        <td><span class="ng-binding">10000</span></td>
                    </tr>
                    <tr></tr>
                </table>
                <div class="transfer-button">
                    <input id="submit" type="button" onclick="confirmChangeMoney()" value="提交" />
                    <?php if($min_change_money>0){?>
                    <span>最低金额:<?=$min_change_money?></span>
                    <?php }?>
                    <input type="hidden" name="zz_type" id="zz_type" value="" />
                </div>
        </div>
       </form>   
        
        
    </div>
    </div>
</div>
<div class="mask"><img style="margin-top:1.5rem;" src="/img/loading.gif" /></div>
<div class="mask2"><img style="margin-top:1.5rem; src="/img/loading.gif" /></div>
<script type="text/javascript">
    function ALL_money(){
        $.getJSON("../app/member/getdata.php?callback=?", function (json) {
            if (json.close == 1) {
                parent.location.href = '/close.php';
            }
            $("#MBallCredit").html(json.user_money);
        });
    }
    function AG_money(){
        $.get("./newag2/cha.php?callback=?",function(data){
           data = eval('('+data+')');
           $("#ag_money").html(data.general);
          
        });

    }
    function AB_money(){
        $.get("./newab2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#ab_money").html(data.general);
        });

    }

    function PT_money(){
        $.get("./newpt2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#pt_money").html(data.general);
        });

    }

    function MG_money(){
        $.get("./newmg2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#mg_money").html(data.general);
        });

    }

    function BB_money(){
        $.get("./newbbin2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#bb_money").html(data.general);
        });

    }

    ALL_money(); AG_money(); BB_money(); PT_money();MG_money();AB_money();

    (function(){
        var leixing='';
        var shuju = new Array();
        shuju[1] = "我的钱包AG娱乐场";
        shuju[2] = "AG娱乐场我的钱包";

        shuju[3] = "我的钱包ALLBet";
        shuju[4] = "ALLBet我的钱包";

        shuju[5] = "我的钱包MG娱乐场";
        shuju[6] = "MG娱乐场我的钱包";

        shuju[7] = "我的钱包BBIN娱乐场";
        shuju[8] = "BBIN娱乐场我的钱包";
        shuju[9] = "我的钱包PT";
        shuju[10] = "PT我的钱包";
        var diyige='';var dierge='';var dijige='';var dijige2='';
            
        $('#zhuanchu td').click(function(){
            $("#zz_type").val('');
            $('#zhuanchu td').removeClass("choose");
            $(this).addClass("choose");
            diyige=$('#zhuanchu p').eq($(this).index()).html();
           
            if(dierge!=''){
                leixing=diyige+dierge;
                dijige=$.inArray(leixing, shuju);
                if(dijige!='-1'){
                    $("#zz_type").val(dijige);
                }else{
                    alert("该模式未开通");
                    $('#zhuanchu td').removeClass("choose");
                }
                dijige='';
            }
        });
        $('#zhuru td').click(function(){
            $("#zz_type").val('');
            $('#zhuru td').removeClass("choose");
            $(this).addClass("choose");
            dierge=$('#zhuru p').eq($(this).index()).html();
            if(diyige!=''){
                leixing=diyige+dierge;
               // alert(leixing);
                dijige2=$.inArray(leixing, shuju);
                if(dijige2!='-1'){
                    $("#zz_type").val(dijige2);
                }else{
                    alert("该模式未开通");
                    $('#zhuru td').removeClass("choose");
                }
                dijige2=''
            }
        });
        
        $(".transfer-submit td span").click(function(){
            $('.transfer-submit td span').removeClass("choose");
            $(this).addClass("choose");
            if($(this).html()=='全部'){
                $('#zz_money').val($('#MBallCredit').text());
            }else{
                $('#zz_money').val($(this).html());
            }  
        });
        
        var imgspan="<img src='/imgs/load_pk.gif?v=2.1.1'>";
        $("#MMainData .refresh").click(function(){
           $(".row span.ng-binding").html(imgspan);
            ALL_money(); AG_money(); BB_money(); PT_money();MG_money();AB_money();
           setTimeout(function(){$("#zhuru span.ng-binding").html('0.00')},1000);
           
        }); 
    })();
    
</script>
<script type="text/javascript">
    function confirmChangeMoney(){
        if(confirm("确定转账吗？")){
            if($("#ag_money").text()=='未开通' || (!$("#ag_money").text()) ){
                if($("#zz_type").val()==2||$("#zz_type").val()==1){
                    alert('请进入AGIN游戏开通账号');
                    return;
                }
            }
            if($("#bb_money").text()=='未开通' || (!$("#bb_money").text()) ){
                if($("#zz_type").val()== 7|| $("#zz_type").val()==8){
                    alert('请进入BBIN游戏开通账号');
                    return;
                }
            }
            if(!$("#zz_money").val()){
                alert("请输入转账金额。");
                return;
            }
            if(!$("#zz_type").val()){
                alert("请选择转款方式");
                return;
            }
            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test($("#zz_money").val())){
                alert('请输入整数。');
                return;
            }
            if( ($("#zz_money").val()<1)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==1 || $("#zz_type").val()==7 || $("#zz_type").val()==3 || $("#zz_type").val()==5 || $("#zz_type").val()==9) && ($("#MBallCredit").text()-$("#zz_money").val()<0)){
                alert("主账户余额 小于 转账金额，请重新输入。");
                return;
            }
           if(($("#zz_type").val()==2) && ($("#ag_money").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==8) && ($("#bb_money").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }

            if(($("#zz_type").val()==10) && ($("#pt_money").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }

            if(($("#zz_type").val()==6) && ($("#mg_money").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }

            if(($("#zz_type").val()==4) && ($("#ab_money").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }
            var aa=$("#zz_type").val();
            var bb=$("#zz_money").val();
      $(".mask").css("display", "block");
            $.ajax({
                type:'post',
                url:'?action=save',
                data:{'zz_type':aa,'zz_money':bb},
                beforeSend:function(x){
                    console.log(this.data.zz_type+" "+this.data.zz_money);
                },
                success:function(d){
                $(".mask").css("display", "none");
                    alert(d);
                    setTimeout("location.reload()",1000);
                    //AG_money(); BB_money(); ALL_money();
                },
        complete : function(XMLHttpRequest,status){ //请求完成后最终执行参数
   if(status=='timeout'){
  alert("超时");
  }
          if(status=='error'){
  alert("远程服务器错误，请稍候再试");
   }
    }

            })

        }
    }
</script>
</body>




