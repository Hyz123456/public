<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/website.php");
include_once($C_Patch."/app/member/class/live_info.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once($C_Patch."/app/member/class/auto_transfer.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/include/config.inc.php");
if(!isset($_SESSION)){ session_start();}
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
$loginid=   isset($_SESSION["uid"])? $_SESSION["uid"]:'';
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"]))
{
    header("Location:/index.php");
    exit();
}
$user_info  = auto_transfer::getUserInfo($_SESSION["userid"]);
//$min_change_money = sys_config::getMinChangeMoney();
$action=isset($_GET['action'])? $_GET['action']:'';
if($action=='save')
{
    $zztype = isset($_POST['zz_type']) ? $_POST['zz_type'] : '';
    $zztype2 = isset($_POST['zz_type2']) ? $_POST['zz_type2'] : '';
    $zzmoney = isset($_POST['zz_money']) ? trim($_POST['zz_money']) : '';
    $row = $user_info; $userinfo = $row;
    $conver = doubleval($zzmoney);
    if (($zztype == 2 || $zztype == 3 || $zztype == 7 || $zztype == 5 || $zztype == 6) && (($conver < 0) || ($conver > $row["money"])))
    {
        echo '转账金额不能大于账户余额，请重新输入。';
        exit;
    }


    if (($zztype == 2 and $zztype2 == 1) || ($zztype == 1 and $zztype2 == 2))
    {
        if ($zztype == 2 and $zztype2 == 1)
        {
            $about = "主账户->BBIN";
            auto_transfer::bbinToGame($user_info, $conver);
        } elseif ($zztype == 1 and $zztype2 == 2)
        {
            $about = "BBIN->主账户";
            auto_transfer::bbinOut($user_info, $conver);
        }
    }
    elseif (($zztype == 3 and $zztype2 == 1) || ($zztype == 1 and $zztype2 == 3))
    {

        if ($zztype == 3 and $zztype2 == 1)
        {
            $about = "主账户->MG大厅";

            auto_transfer::mgToGame($user_info, $conver);

        } elseif ($zztype == 1 and $zztype2 == 3)
        {
            $about = "MG大厅->主账户";
            auto_transfer::mgOut($user_info, $conver);
        }


    } elseif (($zztype == 5 and $zztype2 == 1) || ($zztype == 1 and $zztype2 == 5))
    {
        if ($zztype == 5 and $zztype2 == 1)
        {
            $about = "主账户->ALLBet";
            auto_transfer::ALLBetToGame($user_info, $conver);
        } elseif ($zztype == 1 and $zztype2 == 5)
        {
            $about = "AllBet->主账户";
            auto_transfer::ALLBetOut($user_info, $conver);
        }
    } elseif (($zztype == 6 and $zztype2 == 1) || ($zztype == 1 and $zztype2 == 6))
    {
        if ($zztype == 6 and $zztype2 == 1)
        {
            $about = "主账户->AG";
            auto_transfer::agToGame($user_info, $conver);
        } elseif ($zztype == 1 and $zztype2 == 6)
        {
            $about = "AG->主账户";
            auto_transfer::agOut($user_info, $conver);
        }
    }
    elseif (($zztype == 7 and $zztype2 == 1) || ($zztype == 1 and $zztype2 ==7))
    {
        if ($zztype == 7 and $zztype2 == 1)
        {
            $about = "主账户->PT";
            auto_transfer::ptToGame($user_info, $conver);
        } elseif ($zztype == 1 and $zztype2 == 7)
        {
            $about = "PT->主账户";
            auto_transfer::ptOut($user_info, $conver);
        }
    }
    else {
        echo '请正确选择转帐。';
        exit;
    }
}
?>
<html>
<head>
<meta charset='utf-8' />
<link rel="stylesheet" href="/cl/css/reset.css">
<link rel="stylesheet" href="/cl/memberdata.css">
</head>
<body>
<style>
#yinyin{width:177px;height:140px;background-image:url('/cl/circlebg1.png');float:left;background-repeat:no-repeat;position: relative;left: 10px;}
body,a,input,button{font-family:"Microsoft Yahei","Droid Sans Fallback","Arial","Helvetica","sans-serif","宋体";font-size:14px;outline: none;color: #666;}
#wenzi{float:left;}
body{font-size:14px;   
    border: 0;
    margin: 0;
    padding: 0;}
.Hyzx-form .Hyzx-label {
    margin: 10px 0;
}
.Hyzx-form .Hyzx-label select {
    border: 0 none;
    height: 30px;
    padding: 0 15px;
    margin: 0;
    vertical-align: middle;
}
select, input {
    border-radius: 3px;
    outline: none;
}
.clr {
    clear: both;
}
.Hyzx-form .Hyzx-label {
    margin: 10px 0;
}
.Hyzx-form .Hyzx-label input {
    border: 0 none;
    padding: 0 10px;
    font: 14px/30px "microsoft yahei";
    height: 30px;
    margin-left: 15px;
    border-radius: 4px;
    width: 266px;
}
.ml20-i {
    margin-left: 20px ! important;
}

.Hyzx-table {
    border-collapse: collapse;
    width: 100%;
}
.mt20 {
    margin-top: 20px;
}
.Hyzx-btn:only-of-type {
    margin-right: 0;
}
.Hyzx-btn {
    margin-right: 1px;
    margin-bottom: 1px;
}
.Hyzx-table {
    border-collapse: collapse;
    width: 100%;
}
.mt20 {
    margin-top: 20px;
}
table {
    text-align: center;
    vertical-align: middle;
}
.Hyzx-table th {
    background: #875e5a;
    color: #fff;
}

th {
    text-align: center;
    vertical-align: middle;
}
.Hyzx-table th {
    background: #875e5a;
    color: #fff;
}
table td {
    text-align: left;
}
.c-9 {
    color: #999;
}
.mr10 {
    margin-right: 10px;
}
#u2 {
    position: relative;
    margin-top: -32px;
    margin-left: 126px;
    width: 45px;
    height: 26px;
}
.u2_div {
    cursor: pointer;
    position: absolute;
    left: 0px;
    top: 0px;
    line-height: 26px;
    text-align: center;
    width: 45px;
    height: 26px;
    background: inherit;
    background-color: #5d96d3;
    border-radius: 0px;
    -webkit-border-radius: 41px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
}
#u4 {
    position: relative;
    margin-top: -27px;
    margin-right: -7px;
    float: right;
    width: 45px;
    height: 26px;
}
.Hyzx-txt p {
    font: 14px/30px "microsoft yahei";
}
.c-r {
    color: #f00;
}

#u10 {
    margin: 0 auto;
    margin-top: 37%;
    width: 467px;
    height: 236px;
    overflow: hidden;
    background: #c1dff2;
    -webkit-border-radius: 9px;
}
.Hyzx-btn_flt {
    cursor: pointer;
    line-height: 26px;
    text-align: center;
    width: 60px;
    height: 26px;
    background: inherit;
    border-radius: 0px;
    -webkit-border-radius: 9px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    display: block;
    float: left;
    margin-left: 110px;
    margin-top: 28px;
    background: #fffa40;
}
#shixun_e {
    border: 0 none;
    padding: 0 10px;
    font: 14px/30px "microsoft yahei";
    height: 30px;
    margin-left: 15px;
    border-radius: 4px;
    width: 167px;
}
.xz{
    -webkit-animation:0.8s rotate infinite;
}
</style>
<span style="color: red">转入转出平台不能相同,只能在系统余额和视讯余额之间转换!</span>
<div class="MMain">
    <div class="Hyzx-form">
                
		<div class="Hyzx-label dropdown flt" id="chuchuchu">
                    <span>转出:</span>
			<select name="zz_type2" id="zz_type2">
				 <!--<option value="0">请选择</option>
				 <option value="1">主账户</option>
				 <option value="2">VG</option>
				 <option value="3">MG</option>
				 <option value="5">大雄棋牌</option>
                 <option value="6">AG</option>-->
                <option value="0">请选择</option>
                <option value="1">主账户</option>
                <option value="2">BBIN</option>
                <option value="3">MG</option>
                <option value="5">AllBet</option>
                <option value="6">AG</option>
                <option value="7">PT</option>
			</select>
		</div>
                <div class="Hyzx-label dropdown flt ml20-i" id="rururu">
                    <span>转入:</span>
			 <select name="zz_type" id="zz_type">
				<option value="0">请选择</option>
				<option value="1">主账户</option>
				<option value="2">BBIN</option>
				<option value="3">MG</option>
				<option value="5">AllBet</option>
                <option value="6">AG</option>
                 <option value="7">PT</option>
			  </select>
		</div>
            <div class="clr"></div>
            <div class="Hyzx-label">
                    <span>金额:</span>
                    <input type="text" name="zz_money" id="zz_money" onkeyup="if(isNaN(value))execCommand('undo')" onfocus="if(this.value=='填写金额'){this.value='';}" onblur="if(this.value==''){this.value='填写金额';document.getElementById('mockpass').focus();}else{document.getElementById('mockpass').focus();}" value="填写金额"/>
            </div>
            <div class="Hyzx-label">
                <span class="flt">&nbsp;</span><a class="Hyzx-btn flt" href="javascript:;" onclick="confirmChangeMoney()">确认转账</a>
            </div>
    </div>
    <div id="u11" style="display: none; position: absolute; top: 0; z-index: 5; text-align: center; left: 266.5px;">
        <div id="u10" class="ax_default ax_default_hidden" style="cursor:move">
                <div id="u10_ru">
                <div style="width: 100%;height: 50px;font-size: 28px;text-align: center;margin-top: 20px;">
                        <span>系统余额</span>
                        <span>转入</span>
                        <span class="shixu_e">系统余额</span>
                </div>
                <div style="width: 100%;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin-top: 17px;">
                        <span>转入金额</span>
                        <input value="100" onkeyup="clearNoNum(this);">
                </div>
                </div>
                <div class="Hyzx-label" style="text-align: center;">
                                <span class="flt">&nbsp;</span><a class="Hyzx-btn_flt" href="javascript:;" id="shixu_qur" >确认转账</a>
                                <a class="Hyzx-btn_flt" href="javascript:;" id="qu_x">取消</a>
                </div>

        </div>
    </div>
<script type="text/javascript" src='js/jquery-1.7.1.js'></script>
<script type="text/javascript">
		$(document).ready(function(){
				$('#rururu').attr('tabs','true');
				$('#chuchuchu').attr('tabs','true');
    			$('#rururu').click(function(ev){
						rururuTab();
						$('#zhuanchu').css({'display':'none','height':0});
						$('#chuchuchu').attr('tabs','true');
						ev.stopPropagation();
				});
    			$('#chuchuchu').click(function(ev){
						chuchuchuTab();
						$('#zhuanru').css({'display':'none','height':0});
						$('#rururu').attr('tabs','true');
						ev.stopPropagation();
				});
    				(function(){
    					$('#zhuanru .xiala1').on('click', function(ev){
    						$('#rururu').html( $(this).text() + '<img src="/cl/btn_show.png" style="position: relative;top: 2px;left: 3px;">' );
    						rururuTab();
    					   ev.stopPropagation();
    					});

    					$('#zhuanchu .xiala1').on('click', function(ev){
    						$('#chuchuchu').html( $(this).text() + '<img src="/cl/btn_show.png" style="position: relative;top: 2px;left: 3px;">' );
    						chuchuchuTab();
    						ev.stopPropagation();
    					});
    				})();

    				$(document).on('click', function(ev){
    					$('#zhuanru').css({'display':'none','height':0});
						$('#rururu').attr('tabs','true');
						$('#zhuanchu').css({'display':'none','height':0});
						$('#chuchuchu').attr('tabs','true');
    				});
					function rururuTab(){
						if( $('#rururu').attr('tabs') == 'true' ){
								$('#zhuanru').css({'display':'block','height':0,'overflow-x':'hidden'});
							 setTimeout(function(){
							 	$('#zhuanru').height( 78 );
							 },30);
							 $('#rururu').attr('tabs','false');
						}else{
							$('#zhuanru').css({'display':'none','height':0});
							$('#rururu').attr('tabs','true');
						}
					}

					function chuchuchuTab(){
						if( $('#chuchuchu').attr('tabs') == 'true' ){
								$('#zhuanchu').css({'display':'block','height':0,'overflow-x':'hidden'});
								  setTimeout(function(){
								 	$('#zhuanchu').height( 78 );
								 },30);
								  $('#chuchuchu').attr('tabs','false');
						  }else {
						  		$('#zhuanchu').css({'display':'none','height':0});
								$('#chuchuchu').attr('tabs','true');
						  }
					}
     
    			})
function shixun_zc($name,$money,$shi_money,$sport_key,$key){
var str = '';
str +='<div style="width: 100%;height: 50px;font-size: 28px;text-align: center;margin-top: 20px;"><span class="shixu_e" >'+$name+'</span><input type="hidden" name="shixun_sport" id="shixun_sport" value="'+$key+'" /><span>->转出-></span><span>系统余额</span><input type="hidden" name="shixun_name" id="shixun_name" value="'+$sport_key+'" /></div><div style="width: 100%;height: 50px;font-size: 24px;text-align: center;margin-top: 17px;"><span>转出金额</span><input value="'+parseInt($money)+'" name="shixun_e" id="shixun_e" onkeyup="clearNoNum(this);"/></div>'
$('#u10_ru').html(str);
$('#u11').show();
}
function shixun_zh($name,$money,$shi_money,$sport_key,$key){
        var str = '';
        str +='<div style="width: 100%;height: 50px;font-size: 28px;text-align: center;margin-top: 20px;"><span  >系统余额</span><input type="hidden" name="shixun_sport" id="shixun_sport" value="'+$sport_key+'" /><span>->转入-></span><span class="shixu_e" >'+$name+'</span><input type="hidden" name="shixun_name" id="shixun_name" value="'+$key+'" /></div><div style="width: 100%;height: 50px;font-size: 24px;text-align: center;margin-top: 17px;"><span>转入金额</span><input value="'+parseInt($money)+'" name="shixun_e" id="shixun_e" onkeyup="clearNoNum(this);"/></div>'
        $('#u10_ru').html(str);
        $('#u11').show();
}
$('#qu_x').click(function(){
    $('#u11').hide();
})
var states = 0;
$("#shixu_qur").click(function(){
if(states == 0){
  states = states + 1;
  //$(this).attr('disabled',true);
  var zz_type =$('#shixun_name').val();;//转入
  var zz_type2 = $('#shixun_sport').val();//转出 
  var money  = $('#shixun_e').val();
  confirmChangeMoney_tow(money,zz_type,zz_type2);
}
})




</script>
    
        <table class="Hyzx-table mt20">
                <tbody>
                    <tr>
                        <th colspan="4"><?=$_SESSION["username"]?>目前额度(币别:人民币)
                                
                        <a href="javascript:;" class="frt Hyzx-repeatBtn" title="刷新余额" id="bet" ></a>
                        </th>
                    </tr>							
                    <tr>
                        <td><span class="c-9 mr10">系统余额:</span><span id="sport" class="shixu_ye"><?=$user_info["money"]?></span></td>
                        <td><span class="c-9 mr10">MG:</span><span class="shixu_ye" id="general_mg">0.00</span>
                            <div id="u2" class="ax_default label" onclick="return shixun_zh('MG余额','0.00','0.00','1','3')">
                                    <div class="u2_div">转入</div>
                            </div>
                            <div id="u4" class="ax_default label" onclick="return shixun_zc('MG余额','0.00','0.00','1','3')">
                                <div class="u2_div">转出</div>
                            </div>
                        </td>
                        <td><span class="c-9 mr10">ALLBet :</span><span id="general_ALLBet" class="shixu_ye">0.00</span>
                            <div id="u2" class="ax_default label" onclick="return shixun_zh('ALLBet余额','0.00','0.00','1','5')">
                                    <div class="u2_div">转入</div>
                            </div>
                            <div id="u4" class="ax_default label" onclick="return shixun_zc('ALLBet余额','0.00','0.00','1','5')">
                                <div class="u2_div">转出</div>
                            </div>
                        </td>

                        <td><span class="c-9 mr10">BBIN:</span><span id="general_BBIN" class="shixu_ye">0.00</span>
                            <div id="u2" class="ax_default label" onclick="return shixun_zh('BBIN余额','0.00','0.00','1','2')">
                                    <div class="u2_div">转入</div>
                            </div>
                            <div id="u4" class="ax_default label" onclick="return shixun_zc('BBIN余额','0.00','0.00','1','2')">
                                <div class="u2_div">转出</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="c-9 mr10">AG余额:</span><span id="general_ag" class="shixu_ye">0.00</span>
                            <div id="u2" class="ax_default label" onclick="return shixun_zh('AG余额','0.00','0.00','1','6')">
                                    <div class="u2_div">转入</div>
                            </div>
                            <div id="u4" class="ax_default label" onclick="return shixun_zc('AG余额','0.00','0.00','1','6')">
                                <div class="u2_div">转出</div>
                            </div>
                        </td>

                        <td><span class="c-9 mr10">PT余额:</span><span id="general_pt" class="shixu_ye">0.00</span>
                            <div id="u2" class="ax_default label" onclick="return shixun_zh('PT余额','0.00','0.00','1','7')">
                                <div class="u2_div">转入</div>
                            </div>
                            <div id="u4" class="ax_default label" onclick="return shixun_zc('PT余额','0.00','0.00','1','7')">
                                <div class="u2_div">转出</div>
                            </div>
                        </td>
                    </tr>

                </tbody>
        </table>
    
        <div class="Hyzx-txt">
                <p class="c-r">户内转账说明</p>
                <p class="c-r">1、户内最低转账金额1人民币，最高转账金额不限。</p>
                <p class="c-r">2、户内转账不收任何手续费。</p>
                <p class="c-r">3、如果有任何疑问请咨询24小时在线客服。</p>
                <p class="c-r">提示：系统额度可以下注EG电子、皇冠体育、彩票游戏。真人娱乐场需转入额度!</p>
        </div>
</div>

<style>
@-webkit-keyframes rotate {
  0%{-webkit-transform:rotate(0deg);}
  50%{-webkit-transform:rotate(180deg);}
  100%{-webkit-transform:rotate(360deg);}
}
@-moz-keyframes rotate{
-moz-transform:rotate(0deg);
-moz-transform:rotate(180deg);
-moz-transform:rotate(360deg);
}

#spinner {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}


#spinnera {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerb {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerc {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerd {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnere {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnerdz {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}

#spinnercp {-webkit-animation:0.8s rotate infinite;-moz-animation:0.8s rotate infinite;display:none;}
</style>
<script>

	$(document).ready(function(){
		 $('#spinner1').click(function(){

					 $('#spinner1').css('display','none');
					 $('#spinner').css('display','block');

		 		      setTimeout(tjj,1000)

		 	});
			function tjj(){

				$('#spinner').css('display','none');
				$('#general_ab').css('display','block');

			}

		$('#spinner1a').click(function(){

					 $('#spinner1a').css('display','none');
					 $('#spinnera').css('display','block');

		 		      setTimeout(tjj1,1000)

		 	});
			function tjj1(){

				$('#spinnera').css('display','none');
				$('#general_mg').css('display','block');

			}

		$('#spinner1b').click(function(){

					 $('#spinner1b').css('display','none');
					 $('#spinnerb').css('display','block');

		 		      setTimeout(tjj2,1000)

		 	});
			function tjj2(){

				$('#spinnerb').css('display','none');
				$('#general_ALLBet').css('display','block');

			}

		$('#spinner1c').click(function(){

					 $('#spinner1c').css('display','none');
					 $('#spinnerc').css('display','none');
		 		      setTimeout(tjj3,1000)
		 	});
			function tjj3(){

				$('#spinnera').css('display','none');
				$('#general_vg').css('display','block');

			}

		$('#spinner1d').click(function(){

					 $('#spinner1d').css('display','none');
					 $('#spinnerd').css('display','block');

		 		      setTimeout(tjj4,1000)

		 	});
			function tjj4(){

				$('#spinnerd').css('display','none');
				$('#general_ag').css('display','block');

			}
		$('#spinner1e').click(function(){

					 $('#spinner1e').css('display','none');
					 $('#spinnere').css('display','block');

		 		      setTimeout(tjj5,1000)

		 	});
			function tjj5(){

				$('#spinnere').css('display','none');
				$('#general_ag').css('display','block');

			}

		$('#spinner1dz').click(function(){

					 $('#spinner1dz').css('display','none');
					 $('#spinnerdz').css('display','block');

		 		      setTimeout(tjj6,1000)

		 	});
			function tjj6(){

				$('#spinnerdz').css('display','none');
				$('#general_cp').css('display','block');

			}

		$('#spinner1cp').click(function(){

					 $('#spinner1cp').css('display','none');
					 $('#spinnercp').css('display','block');

		 		      setTimeout(tjj7,1000)

		 	});
			function tjj7(){

				$('#spinnercp').css('display','none');
				$('#bh_cp').css('display','block');


			}
		})

</script>

<div class="mask" style="display: none;"><div  class="loading_tip"><img src="/img/loading.gif" /><br><span>转换中...</span></div></div>
<div class="mask2" style="display: none;"   ><div  class="loading_tip"><img src="/img/loading.gif" /><br><span>更新帐户信息中...</span></div></div>
<script type="text/javascript">
    function ALL_money(){
        $.getJSON("../app/member/getdata.php?callback=?", function (json) {
            if (json.close == 1) {
                parent.location.href = '/close.php';
            }
			$("#MBallCredit").html('余　额:<img src="/tpl/commonImage/money_RMB.gif" align="absmiddle" title="人民币" alt="人民币" style="position: relative;top: -3px;"><span style="color:#6A8A8C;font-size:16px;font-weight: 100;">'+ json.user_money +'<span style="color:#000;font-size:15px;margin-left: 10px;">人民币(RMB)</span></span>');
        });
    }
	function MG_money(){
        $.get("./newmg2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_mg").html(data.general);
        });
    }
    /*function DX_money(){
        $.get("./dx/cha.php",function(data){
            data = eval('('+data+')');
            $("#general_dx").html(data.general);
        });
    }
    function VG_money(){
        $.get("./vg/balance.php",function(data){
            data = eval('('+data+')');
            $("#general_vg").html(data);
        });
    }*/

    function AG_money(){
        $.get("./newag2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_ag").html(data.general);

        });

    }

    function BB_money(){
        $.get("./newbbin2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_BBIN").html(data.general);
        });

    }

    function ALLBet_money(){
        $.get("./newab2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_ALLBet").html(data.general);
        });

    }

    function PT_money(){
        $.get("./newpt2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_pt").html(data.general);
        });

    }
    /*

     function AG_money(){
     $.get("./newag2/cha.php?callback=?",function(data){
     data = eval('('+data+')');
     $("#MSunplusCredit").html(data.general);

     });

     }

    function AB_money(){
        $.get("./newallbet2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_ab").html(data.general);
        });

    }


	function NA_money(){
        $.get("./newna2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general_na").html(data.general);
        });

    }
	function CP_money(){

        $.get("./cpjk/cha.php",function(data){

            data = eval('('+data+')');
            $("#general_cp").html(data.general);
        });

    }
	function dx_money(){

        $.get("./newdx/cha.php",function(data){

            data = eval('('+data+')');
            $("#bh_cp").html(data.general);
        });

    }*/
   // MG_money();DX_money();VG_money();AG_money();
    //AB_money();NA_money(); CP_money();AG_money(); BB_money();PT_money();
    
    $(function(){
       
        var img="<img src='/imgs/load_pk.gif?v=2.1.1'>";
        $("#general_mg").html(img);
        $("#general_BBIN").html(img);
        $("#general_ALLBet").html(img);
        $("#general_ag").html(img);
        $("#general_pt").html(img);
        AG_money();BB_money();ALLBet_money();MG_money();PT_money();
        $('#bet').on('click', function(){
            $("#tow").addclass('xz')

            $("#general_mg").html(img);
            $("#general_dx").html(img);
            $("#general_vg").html(img);
            $("#general_ag").html(img);
            MG_money();BB_money();PT_money();AG_money();
            $('#bet').css('-webkit-animation','');
        }); 
        
    });

</script>
<script type="text/javascript">
    function confirmChangeMoney(){
        if(confirm("确定转账吗？")){

            if(!$("#zz_money").val()){
                alert("请输入转账金额。");
                return;

            }
			var zztype=$("#zz_type").val();
			var zztype2=$("#zz_type2").val();
			/*if((zztype==2 && zztype2==1 )||( zztype==1 && zztype2==2)){
			 if("<?=$web_site['auto_zhenrenag']?>"=='1'  ){
			 alert('AG维护中,转帐已限制');return;
			 }
			}
			if("<?=$web_site['auto_zhenrenbb']?>"=='1' &&((zztype==7 && zztype2==1 )||( zztype==1 && zztype2==7))){
			alert('BB维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenab']?>"=='1' &&((zztype==4 && zztype2==1 )||( zztype==1 && zztype2==4))){
			alert('AB维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenna']?>"=='1' &&((zztype==6 && zztype2==1 )||( zztype==1 && zztype2==6))){
			alert('NA维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenpt']?>"=='1'&&((zztype==5 && zztype2==1 )||( zztype==1 && zztype2==5))){
			alert('PT维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenbh']?>"=='1'&&((zztype==8 && zztype2==1 )||( zztype==1 && zztype2==8))){
			alert('BH彩票维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenbhdz']?>"=='1' &&((zztype==9 && zztype2==1 )||( zztype==1 && zztype2==9))){
			alert('BH电子维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenmg']?>"=='1' &&((zztype==3 && zztype2==1 )||( zztype==1 && zztype2==3))){
			alert('MG维护中,转帐已限制');return;
			}*/


            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test($("#zz_money").val())){
                alert('请输入整数。');
                return;
            }
            if( ($("#zz_money").val()<1)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }

            var aa=$("#zz_type").val();
			var cc=$("#zz_type2").val();
            var bb=$("#zz_money").val();//alert(bb);
			$(".mask").css("display", "block");
            $.ajax({
                type:'post',
                url:'/moneychange4.php?action=save',
                data:{'zz_type':aa,'zz_money':bb,'zz_type2':cc},
                beforeSend:function(x){
                    console.log(this.data.zz_type+" "+this.data.zz_money);
                },
                success:function(d){
					$(".mask").css("display", "none");
                    alert(d);
                    setTimeout("location.reload()",1000);
                    //MG_money();DX_money();VG_money();AG_money();
                    //NA_money();CP_money();AB_money();AG_money(); BB_money(); ALL_money();PT_money();
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
<script type="text/javascript">
    function confirmChangeMoney_tow(zz_money,zz_type,zz_type2){

            if(!zz_money){
                alert("请输入转账金额。");
                return;

            }
			var zztype=zz_type;
			var zztype2=zz_type2;
			if((zztype==2 && zztype2==1 )||( zztype==1 && zztype2==2)){
			 if("<?=$web_site['auto_zhenrenag']?>"=='1'  ){
			 alert('AG维护中,转帐已限制');return;
			 }
			}
			if("<?=$web_site['auto_zhenrenbb']?>"=='1' &&((zztype==7 && zztype2==1 )||( zztype==1 && zztype2==7))){
			alert('BB维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenab']?>"=='1' &&((zztype==4 && zztype2==1 )||( zztype==1 && zztype2==4))){
			alert('AB维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenna']?>"=='1' &&((zztype==6 && zztype2==1 )||( zztype==1 && zztype2==6))){
			alert('NA维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenpt']?>"=='1'&&((zztype==5 && zztype2==1 )||( zztype==1 && zztype2==5))){
			alert('PT维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenbh']?>"=='1'&&((zztype==8 && zztype2==1 )||( zztype==1 && zztype2==8))){
			alert('BH彩票维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenbhdz']?>"=='1' &&((zztype==9 && zztype2==1 )||( zztype==1 && zztype2==9))){
			alert('BH电子维护中,转帐已限制');return;
			}
			if("<?=$web_site['auto_zhenrenmg']?>"=='1' &&((zztype==3 && zztype2==1 )||( zztype==1 && zztype2==3))){
			alert('MG维护中,转帐已限制');return;
			}


            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test(zz_money)){
                alert('请输入整数。');
                return;
            }
            if( (zz_money<1)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }

            var aa=zz_type
            var cc=zz_type2;
            var bb=zz_money;//alert(bb);
            $(".mask").css("display", "block");
            $.ajax({
                type:'post',
                url:'/moneychange4.php?action=save',
                data:{'zz_type':aa,'zz_money':bb,'zz_type2':cc},
                beforeSend:function(x){
                    console.log(this.data.zz_type+" "+this.data.zz_money);
                },
                success:function(d){
					$(".mask").css("display", "none");
                    alert(d);
                    setTimeout("location.reload()",1000);
                    //MG_money();DX_money();VG_money();AG_money();
                    //NA_money();CP_money();AB_money();AG_money(); BB_money(); ALL_money();PT_money();
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
</script>

<style type="text/css">
/*body{

	font-family:微软雅黑;
}
.mask,.mask2{filter:alpha(opacity=80); -moz-opacity:0.8; -khtml-opacity: 0.8; opacity: 0.8;position:absolute;top:0px; left:0px; width:100%;height:400px; text-align:center;display:none;}
#MACenterContent{
    width: 100%;
    margin:0 auto;
	margin-top:-10px;
}
table {
    *border-collapse: collapse;  IE7 and lower 
    border-spacing: 0;
    width: 90%;
    margin:0 auto;

    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc;
    -moz-box-shadow: 0 1px 1px #ccc;
    box-shadow: 0 1px 1px #ccc;
}
table tr:hover {
    background: rgb(91,78,214);
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
}

table th {
    background-color: #ccc;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}
table th{
    text-align: center;
}
select{
    font-size: 16px;
}*/


</style>



</body>
</html>
