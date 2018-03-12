<?php

$query_time = date("Y-m-d",time());
$qishu_query = "";
if($_GET['s_time']){
    $query_time = $_GET['s_time'];
}
if($_GET['qishu_query']){
    $qishu_query = $_GET['qishu_query'];
}

?>
<html>
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" href="/resource/images/css/admin_style_1.css" type="text/css" media="all" />
<link rel="stylesheet" href="LT_result.css" type="text/css" media="all" />
<script language="javascript" src="/resource/js/jquery-1.7.2.min.js"></script>
<script language="javascript">
    function queryLottery(){
        var timeParam = $("#s_time").val();
        if(!timeParam){
            alert("请选择日期。");
            return false;
        }
        return true;
    }
</script>
<script>
        var ClientW = $(window).width();
        $('html').css('fontSize',ClientW/3+'px');
</script>
</head>
<body>
<header id="headerBox">
        <a href="/caigames/caigames.php" ></a>
        <span>开赛结果</span>
</header>
<div id="search_content">
<div class="round-table">
    <form name="Frm_search_drawno"  id="Frm_search_drawno" method="get" onSubmit="return queryLottery();" method="get" action="/member/final1/LT_result.php">
        <input name="qishu_query" type="hidden" value="<?=$qishu_query?>"/>
        <input name="s_time" type="hidden" value="<?=$query_time?>"/>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" >
            <tr style="background-color:#FFFFFF;">
                <td align="left">
                    <select name="gtype" id="gtype">
                         <option value="LT"    <?=$_GET['gtype']=='LT' ? 'selected' : ''?>>六合彩</option>
                        <option value="D3"    <?=$_GET['gtype']=='D3' ? 'selected' : ''?>>3D彩</option>
                        <option value="P3"    <?=$_GET['gtype']=='P3' ? 'selected' : ''?>>排列三</option>
                     <option value="T3"    <?=$_GET['gtype']=='T3' ? 'selected' : ''?>>上海时时乐</option> 
                        <option value="CQ"    <?=$_GET['gtype']=='CQ' ? 'selected' : ''?>>重庆时时彩</option>
                       <!--  <option value="JX"    <?=$_GET['gtype']=='JX' ? 'selected' : ''?>>江西时时彩</option>-->
                        <option value="TJ"    <?=$_GET['gtype']=='TJ' ? 'selected' : ''?>>天津时时彩</option>
                        <option value="GDSF"  <?=$_GET['gtype']=='GDSF' ? 'selected' : ''?>>广东十分彩</option>
                        <option value="GXSF"  <?=$_GET['gtype']=='GXSF' ? 'selected' : ''?>>广西十分彩</option>
                        <option value="TJSF"  <?=$_GET['gtype']=='TJSF' ? 'selected' : ''?>>天津十分彩</option>
                        <option value="CQSF"  <?=$_GET['gtype']=='CQSF' ? 'selected' : ''?>>重庆十分彩</option> 
                        <option value="BJKN"  <?=$_GET['gtype']=='BJKN' ? 'selected' : ''?>>北京快乐8</option>
                        <option value="BJPK"  <?=$_GET['gtype']=='BJPK' ? 'selected' : ''?>>北京PK拾</option>
                        <option value="GD11"  <?=$_GET['gtype']=='GD11' ? 'selected' : ''?>>广东11选5</option> 
                    </select>

                    <input name="qishu_query" type="text" id="qishu_query" value="<?=$qishu_query?>" size="20" maxlength="11" placeholder=" 请填写开奖期号"/>

                    <select name="s_time" id="s_time">
                        <option value="<?=date("Y-m-d")?>"    <?=$_GET['s_time']==date("Y-m-d") ? 'selected' : ''?>><?=date('Y-m-d')?></option>
                        <option value="<?=date('Y-m-d',strtotime('-1 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-1 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-1 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-2 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-2 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-2 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-3 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-3 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-3 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-4 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-4 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-4 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-5 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-5 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-5 day'))?></option>
                        <option value="<?=date('Y-m-d',strtotime('-6 day'))?>"    <?=$_GET['s_time']==date('Y-m-d',strtotime('-6 day')) ? 'selected' : ''?>><?=date('Y-m-d',strtotime('-6 day'))?></option>
                    </select>

                    <input name="submit" type="submit" class="submit80" value="搜索"/>
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
<div class="round-table">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font123"  bgcolor="#798EB9">
            <tr class="title_tr">
                <td align="center" class="none1"><strong>期数</strong></td>
                <td align="center"><strong>开奖号码</strong></td>
            </tr>
        </table>
        <div class="suoxiaoxians">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12"  bgcolor="#798EB9">
        <?php

        $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
    ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,
       ball_11,ball_12,ball_13,ball_14,ball_15,ball_16,ball_17,ball_18,ball_19,ball_20
    FROM lottery_result_bjkn WHERE DATE_FORMAT(datetime,'%Y-%m-%d') = '$query_time'";
        if($qishu_query){
            $sql .= " AND qishu = '$qishu_query'";
        }
        $sql .= "ORDER BY qishu DESC";
        $query	=	$mysqli->query($sql);
        $hasRow = "false";
        while($rows = $query->fetch_array()){
            $hasRow = "true";
            $color = "#FFFFFF";
            $over	 = "#EBEBEB";
            $out	 = "#ffffff";
            $hm 		= array();
            $hm[]		= $rows['ball_1'];
            $hm[]		= $rows['ball_2'];
            $hm[]		= $rows['ball_3'];
            $hm[]		= $rows['ball_4'];
            $hm[]		= $rows['ball_5'];
            $hm[]		= $rows['ball_6'];
            $hm[]		= $rows['ball_7'];
            $hm[]		= $rows['ball_8'];
            $hm[]		= $rows['ball_9'];
            $hm[]		= $rows['ball_10'];
            $hm[]		= $rows['ball_11'];
            $hm[]		= $rows['ball_12'];
            $hm[]		= $rows['ball_13'];
            $hm[]		= $rows['ball_14'];
            $hm[]		= $rows['ball_15'];
            $hm[]		= $rows['ball_16'];
            $hm[]		= $rows['ball_17'];
            $hm[]		= $rows['ball_18'];
            $hm[]		= $rows['ball_19'];
            $hm[]		= $rows['ball_20'];
            ?>
            <tr   class="R_tr" align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td align="center" valign="middle" class="none1"><span><?=$rows['qishu']?></span><em><?=$rows['datetime']?></em></td>
                <td align="center" valign="middle">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_1']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_2']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_3']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_4']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_5']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_6']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_7']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_8']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_9']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_10']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_11']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_12']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_13']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_14']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_15']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_16']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_17']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_18']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_19']?>.png">
                    <img src="/images/Lottery/Images/Ball_4/<?=$rows['ball_20']?>.png">
                    <span><?=(Kl8_convert(Kl8_Auto($hm,2))=="总和大"?"<span style=\"color: red;\">".Kl8_convert(Kl8_Auto($hm,2))."</span>":Kl8_convert(Kl8_Auto($hm,2)))?></span>
                    <span><?=(Kl8_convert(Kl8_Auto($hm,3))=="总和双"?"<span style=\"color: red;\">".Kl8_convert(Kl8_Auto($hm,3))."</span>":Kl8_convert(Kl8_Auto($hm,3)))?></span>
                    <span><?=Kl8_convert(Kl8_Auto($hm,5))?></span>
                    <span><?=Kl8_convert(Kl8_Auto($hm,4))?></span>
                    <span><?=Kl8_Auto($hm,1)?></span>
                </td>
            </tr>
        <?php
        }
        if($hasRow=="false"){
            ?>
            <tr   class="R_tr" align="center" >
                <td height="25" colspan="28" align="center" valign="middle">暂时没有开奖结果</td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>       
   </div>
    <script>
(function(){
        $(".suoxiaoxians").css("height", $(window).height()-$('#headerBox').height()-$('#search_content').height()-$('.font123').height());
        $('table.font123 .title_tr .none1').css("width", $('table.font12 .R_tr .none1').width());
    })();
</script>
</body>
</html>