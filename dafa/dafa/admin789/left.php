<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$quanxian=$_SESSION["purview"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>left</title>
<link href="Images/css1/left_css.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.2.min.js"></script>
</head>
<body bgcolor="#202020">
<div id="autoScroll">
<table width="98%" border="0" cellpadding="0" cellspacing="0">

<?php
if(strpos($quanxian,'查看注单') || strpos($quanxian,'手工结算注单')){
?>


  <tr>
    <td><TABLE width="97%" 
border=0 align=right cellPadding=0 cellSpacing=0 class=leftframetable>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <TD width="20" class="icon-soccer-ball-o"></TD>
          <TD style="CURSOR: hand" height=25><span class="STYLE1">体育管理</span></TD>
              </tr>
            </table>            </TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu1 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  
			  
			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  <TD >
                    <A class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('单式')?>" target="main">单式注单</A>
                    <A class="actives" href="sports/cg_list.php?status=<?=urldecode('all')?>" target="main">串关注单</A>
                  </TD>
                </TR>

                <TR>
                  <TD >
                  <A class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('足球')?>"
            target="main">足球注单</A>
                  <A class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('篮球')?>"
            target="main">篮球注单</A>
                  </TD>
                </TR>

                <TR>
                  <TD >
                  <A class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('网球')?>"
            target="main">网球注单</A>
                  <A class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('排球')?>"
            target="main">排球注单</A>
                  </TD>
                </TR>
				      <TR>
                  <TD >
                  <A class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('冠军')?>"
            target="main">冠军注单</A>
            <A  class="actives" href="sports/orderlist.php?status=<?=urldecode('all')?>&type=<?=urldecode('其他')?>"  target="main">其他注单</A>
            </TD>
                </TR>
				<TR>
                </TR>


<?php
if(strpos($quanxian,'手工录入体育比分')){
?>

				<TR>

                  <TD ><A class="actives" href="sports/zqbf.php" target="main">足球比分</A>
                  <A class="actives" href="sports/lqbf.php"  target="main">篮球比分 </A></TD>
             </TR>
                <TR>
                  
                  <TD ><A  class="actives" href="sports/wqbf.php"  target="main">网球比分</A>
                  <A class="actives" href="sports/pqbf.php"  target="main">排球比分</A></TD>
                </TR>
				<TR>
                  
                  <TD >
                  <A class="actives"  href="sports/bqbf.php"  target="main">棒球比分</A>
                  <A class="actives" href="sports/gjbf.php?1=1"  target="main">冠军比分</A></TD>
                </TR>
			
<?php
}
?>

  <TR>
                  
                  <TD ><A href="sports/qtbf.php"  target="main">其他赛事比分</A></TD>
                </TR>

        <?php
if(strpos($quanxian,'手工结算注单')){
?>

        <TR>
                  
                  <TD ><A href="sports/sgjsds.php?status=0" 
            target="main">手工结算单式</A></TD>
                </TR>
        <TR>
                  
                  <TD ><A href="sports/cg_list.php?status=<?=urldecode('all')?>" target="main">手工结算串关</A></TD>
                </TR>
        <?php
}
?>

                <TR>
                    
                    <TD >
                    <A href="sports/gq_lose.php" 
            target="main">滚球未审核注单</A>
            
                    </TD>
                </TR>
				
						           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
<?php
}
?>

<?php
if(strpos($quanxian,'查看注单') || strpos($quanxian,'手工结算注单')){
?>


  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20" class="icon-banknote"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand"><span class="STYLE1">彩票注单管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu2" class="table_box" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
			  
			  		           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <tr>
                  
                  <td >
                  <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('CQ')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">重庆时时彩</a>
                  <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('TJ')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">天津时时彩</a>
                  </td>
                </tr>

                <tr>
                   <td >
                   <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('GDSF')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">广东十分彩</a>
                    <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('GXSF')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">广西十分彩</a></td>
                </tr>
                	
				        <tr>
                  
                  <td >
                      <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('TJSF')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">天津十分彩</a>
                      <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('BJPK')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">北京PK拾</a>
                  </td>
                </tr> 
			

						<tr>
				       <td >
                   <a  class="actives"  href="Lottery/orderlist.php?status=0&type=<?=urldecode('T3')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">上海时时乐</a>
                    <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('CQSF')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">重庆十分彩</a>
				       </td>
				  </tr>

                  <tr> 
         <td>
         <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('BJKN')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">北京快乐8</a>
          <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('GD11')?>&js=<?=urldecode('0,1,2,3')?>"
                    target="main">广东11选5</a>
            </td>
                </tr>
								
        
				<tr>
             <td >
             <a class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('P3')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">排列三</a>
            <a  class="actives" href="Lottery/orderlist.php?status=0&type=<?=urldecode('D3')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">3D彩</a>
            </td>
        </tr>

	
                <tr>
                    
                    <td ><a
                            href="Lottery/orderlist.php?status=0&type=<?=urldecode('ALL_LOTTERY')?>&js=<?=urldecode('0,1,2,3')?>" target="main">全部彩票注单</a></td>
                </tr>
				<tr>
                  
                  <td ><a 
            href="Lottery/orderlist.php?status=0&type=<?=urldecode('ALL_LOTTERY')?>&js=<?=urldecode('0')?>" target="main">未结算彩票注单</a></td>
                </tr>
				<tr>
                  
                  <td ><a 
            href="Lottery/orderlist.php?reset_order=<?=urldecode('重新结算')?>&type=<?=urldecode('ALL_LOTTERY')?>&js=<?=urldecode('2')?>" target="main">重新结算过的彩票注单</a></td>
                </tr>
				<tr>
                  
                  <td ><a
            href="Lottery/orderlist_lottery_user.php?js=<?=urldecode('0,1,2,3')?>" target="main">按用户分类的彩票注单</a></td>
                </tr>
		           <TR>
                  <TD><a href="" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>

              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>

  <?php
}
?>


<?php
if(strpos($quanxian,'手工录入彩票结果')){
?>


  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20" class="icon-briefcase"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand"><span class="STYLE1">彩票结果管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu22" class="table_box" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
			  
			  		           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <tr>
                  <td ><a  style="width:50%;"
            href="Lottery/result/B5/result_b5.php?status=0&type=<?=urldecode('重庆时时彩')?>"
            target="main">重庆时时彩</a>
			
			
			<a   style="width:50%;"
                            href="Lottery/result/B5/result_b5.php?status=0&type=<?=urldecode('天津时时彩')?>"
                            target="main">天津时时彩</a></td>
                </tr>
				
				
				
				
                				<tr>
                  <td ><a style="width:50%;"
                            href="Lottery/result/GDSF/result_gdsf.php?status=0&type=<?=urldecode('广东十分彩')?>"
                            target="main">广东十分彩</a>
							<a style="width:50%;"
                            href="Lottery/result/GXSF/result_gxsf.php?status=0&type=<?=urldecode('广西十分彩')?>"
                            target="main">广西十分彩</a></td>
                </tr>
           
				<tr>
                  <td ><a style="width:50%;"
            href="Lottery/result/TJSF/result_tjsf.php?status=0&type=<?=urldecode('天津十分彩')?>"
            target="main">天津十分彩</a>
			
			<a  style="width:50%;"
            href="Lottery/result/BJPK/result_bjpk.php?status=0&type=<?=urldecode('北京PK拾')?>"
            target="main">北京PK拾</a></td>
                </tr>
		
				<tr>
                  <td ><a style="width:50%;"
            href="Lottery/result/BJKN/result_bjkn.php?status=0&type=<?=urldecode('北京快乐8')?>"
            target="main">北京快乐8</a>
			
			<a style="width:50%;"
				            href="Lottery/result/GD11/result_gd11.php?status=0&type=<?=urldecode('广东11选5')?>"
				            target="main">广东11选5</a></td>
                </tr>
		
								<tr>
				                  <td ><a style="width:50%;"
            href="Lottery/result/B3/result_b3.php?status=0&type=<?=urldecode('上海时时乐')?>"
            target="main">上海时时乐</a>
			
			
			<a style="width:50%;"
            href="Lottery/result/B3/result_b3.php?status=0&type=<?=urldecode('3D彩')?>"
            target="main">3D彩</a></td>
				                </tr>
			
                <tr>
                    <td ><a style="width:50%;"
            href="Lottery/result/B3/result_b3.php?status=0&type=<?=urldecode('排列三')?>"
            target="main">排列三</a>
			
			
			<a style="width:50%;"
				                    href="Lottery/result/CQSF/result_cqsf.php?status=0&type=<?=urldecode('重庆十分彩')?>"
				                    target="main">重庆十分彩</a></td>
                </tr>
					           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'修改彩票赔率')){
?>


  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20" class="icon-calendar"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand"><span class="STYLE1">彩票赔率管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu3" class="table_box" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
			  
			  		           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <tr>
                  <td ><a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('重庆时时彩')?>" 
            target="main">重庆时时彩</a>
			
			<a  style="width:50%;"
                            href="Lottery/odds.php?type=<?=urldecode('天津时时彩')?>" 
                            target="main">天津时时彩</a>
			</td>
                </tr>
				
			
                				<tr>
                  
                  <td ><a style="width:50%;"
                            href="Lottery/odds.php?type=<?=urldecode('广东十分彩')?>" 
                            target="main">广东十分彩</a>
							
							
							<a style="width:50%;"
                            href="Lottery/odds.php?type=<?=urldecode('广西十分彩')?>" 
                            target="main">广西十分彩</a></td>
                </tr>
  
				<tr>
                  
                  <td ><a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('天津十分彩')?>" 
            target="main">天津十分彩</a>
			
			<a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('北京PK拾')?>" 
            target="main">北京PK拾</a></td>
                </tr> 
				
			
				<tr>
                  
                  <td ><a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('北京快乐8')?>" 
            target="main">北京快乐8</a>
			
			<a style="width:50%;"
				            href="Lottery/odds.php?type=<?=urldecode('广东11选5')?>" 
				            target="main">广东11选5</a></td>
                </tr>
		
								 <tr>
				                  
				                  <td ><a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('上海时时乐')?>" 
            target="main">上海时时乐</a>
			
			<a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('3D彩')?>" 
            target="main">3D彩</a></td>
				                </tr> 
			
				<tr>
                    
                    <td ><a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('排列三')?>" 
            target="main">排列三</a>
			
			<a style="width:50%;"
                    href="Lottery/odds.php?type=<?=urldecode('重庆十分彩')?>"
                    target="main">重庆十分彩</a></td>
                </tr>
          
                 
				<tr>
                </tr>
				<tr>
                  <td ><a style="width:50%;"
            href="Lottery/LotteryConfig.php" target="main">时时彩设置</a>
			
			<a style="width:50%;"
                            href="Lottery/config/lottery_six_config.php" target="main">金额设置</a></td>
                </tr>
                		           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>

              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'查看注单') || strpos($quanxian,'手工结算注单') || strpos($quanxian,'修改彩票赔率')){
?>


  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20" class="icon-droplet"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand"><span class="STYLE1">六合彩管理</span></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table id="submenu4" class="table_box" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
			  
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              

				<?php
if(strpos($quanxian,'修改彩票赔率') ){
?>

                <tr>
                  
                  <td ><a style="width:50%;"
            href="Lottery/odds.php?type=<?=urldecode('六合彩')?>" 
            target="main">六合彩赔率</a>
			
			<a style="width:50%;"
            href="Lottery/result/LHC/result_lhc.php?type=<?=urldecode('六合彩')?>"
            target="main">开奖结果</a></td>
                </tr>

				<?php }?>
			
				<tr>
                
                  <td ><a style="width:50%;"
            href="Lottery/set_issue.php?type=<?=urldecode('六合彩')?>"
            target="main">六合彩期数</a><A    style="text-indent:2.6em;width:50%;" href="report/six_lottery_history.php" target="main">六合彩明细</A></td>
                </tr>
        <TR>
                  
                  <TD ><A style="width:50%;" href="report/six_lottery_sp.php" target="main">六合彩-特码</A><A   style="width:50%;"  href="report/pingte.php"  target="main">平特生肖</A></TD>
                </TR>


        <TR>     
                 <TD ><A   href="report/weishu.php"  target="main">平特尾数</A></TD>
                 </TR> 
                   <tr>
                  
                  <td ><a 
            href="Lottery/orderlist_lhc_user.php?status=0&type=<?=urldecode('六合彩')?>&js=<?=urldecode('0,1,2,3')?>"
            target="main">六合彩注单(按用户)</a></td>
                </tr>
                <tr>
                    
                    <td ><a
                            href="Lottery/orderlist_lhc_zhudan.php?status=0&type=<?=urldecode('六合彩')?>&js=<?=urldecode('0,1,2,3')?>"
                            target="main">六合彩注单(按注单)</a></td>
                </tr>
			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>

              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'真人娱乐')){
?>

  <tr>
    <td><table class="leftframetable" cellspacing="0" cellpadding="0" width="97%" align="right" 
border="0">
      <tbody>
        <tr>
          <td height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20" class="icon-feed"></td>
          <td height="25" class="titledaohang" style="CURSOR: hand"><span class="STYLE1">真人电子管理</span></td>
              </tr>
            </table></td>
          </tr>
		  
		  
		  
        <tr>
          <td><table id="submenu5" class="table_box" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
			  
			  	<TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>

                <tr>
                    <td >
                        <a class="actives" href="casino/list_bbin.php" target="main">BBIN记录</a>
                        <a class="actives"  href="casino/list_ag4.php" target="main">AG纪录</a>
                    </td>
                </tr>

                <tr>
                    <td >
                        <a class="actives" href="casino/list_mg1.php" target="main">MG记录</a>
                        <a class="actives"  href="casino/ptbets.php" target="main">PT纪录</a>
                    </td>
                </tr>

                <tr>
                    <td >
                        <a class="actives" href="casino/list_ab4.php" target="main">欧博记录</a>
                        <a class="actives"  href="casino/setreamount.php" target="main">设置返水</a>
                    </td>
                </tr>

                <tr>
                    <td >
                        <a class="actives" href="casino/reamountlog.php" target="main">反水日志</a>
                        <a class="actives"  href="casino/group_edit.php?id=1#fs" target="main">返水设置</a>

                    </td>
                </tr>

                <tr>
                    <td ><a class="actives"  href="casino/zz_log.php?gtype=<?=urldecode('All')?>&status=<?=urldecode('0,1,4')?>" target="main">所有转账</a>
                        <a class="actives" href="javascript:" ></a></td>
                </tr>

                <!--<tr>
                    <td >
                    <a class="actives" href="casino/report.php" target="main">AG报表</a>
                    <a class="actives"  href="casino/list.php" target="main">AG纪录</a>
                    </td>
                </tr>

                <tr>
                    <td >
                    <a class="actives" href="casino/report_bb.php" target="main">BBIN报表</a>
                    <a class="actives"    href="casino/list_bb.php" target="main">BBIN纪录</a>
                    </td>
                </tr>
				<tr>
				                <td >
				                    <a class="actives" href="casino/listdz.php" target="main">AG电子</a>
				                    <a class="actives"    href="casino/list_bbdz.php" target="main">BBIN电子</a>
				                    </td>
				                </tr>
				                 <tr>
				                    <td >
				                    <a class="actives" href="casino/list_bbcp.php" target="main">BBIN彩票</a>
				                    <a class="actives"    href="casino/list_bbty.php" target="main">BBIN体育</a>
				                    </td>
				                </tr>
				                <tr>
				                     <td >
				                     <a class="actives" href="casino/report_mg2.php" target="main">MG报表</a>
				                     <a class="actives"  href="casino/list_mg.php" target="main">MG纪录</a>
				                     </td>
				                </tr> 
               <tr>
                    <td >
                    <a class="actives" href="casino/report_ab.php" target="main">欧博报表</a>
                    <a  class="actives" href="casino/list_ab.php" target="main">欧博纪录</a>
                    </td>
                </tr>
         
	

                 <tr>
                    
                    <td >
               
                     <a class="actives" href="casino/report_na.php" target="main">NA报表</a>
                     <a class="actives" href="casino/list_na.php" target="main">NA纪录</a>
               
                    </td>
                </tr>
                          
                <tr>
                    
                    <td >
                      
                    <a class="actives" href="casino/report_pt.php" target="main">PT报表</a>
               					<a  class="actives" href="casino/list_pt.php" target="main">PT纪录</a>
                    </td>
                </tr>
               	<tr>
                    

                    <td >
                    <a class="actives" href="casino/report_dx.php" target="main">棋牌报表</a>
                                   					<a  class="actives" href="casino/list_dx.php" target="main">棋牌纪录</a>
                    </td>
                </tr>
          
				
				<tr>
                    <td ><a href="casino/list2.php" target="main">AG下注纪录同步</a></td>
                </tr>
               

                <tr>
                    
                    <td ><a href="casino/list2_bb.php" target="main">BBIN下注纪录同步</a></td>
                </tr>

				

                <tr>
                    
                    <td ><a href="casino/list2_mg.php" target="main">MG下注纪录同步</a></td>
                </tr>

				

               <tr>
                    
                    <td ><a href="casino/list2_ab.php" target="main">欧博下注纪录同步</a></td>
                </tr>


	
                <tr>
                    
                    <td ><a href="casino/list2_na.php" target="main">NA下注纪录同步</a></td>
                </tr>
                					
                
                <tr>
                    
                    <td ><a href="casino/list2_pt.php" target="main">PT下注纪录同步</a></td>
                </tr>
                <tr>
                  <td ><a class="actives"  href="casino/zz_log.php?gtype=<?/*=urldecode('All')*/?>&status=<?/*=urldecode('0,1,4')*/?>" target="main">所有转账</a><a class="actives" href="casino/ag_user_fs_list.php?gtype=<?/*=urldecode('All')*/?>?>" target="main">一键反水</a></td>
                </tr>
				

				     </TD>
                <tr>
                    <td ><a href="casino/zz_log.php?gtype=<?/*=urldecode('All')*/?>&status=<?/*=urldecode('4')*/?>" target="main">待审核的转账</a></td>
                </tr>
                <tr>
                    <td ><a href="casino/zz_log.php?gtype=<?/*=urldecode('All')*/?>&status=<?/*=urldecode('0')*/?>" target="main">未结算的转账</a></td>
                </tr>
           -->
              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>

  <?php
}
?>

<?php
if(strpos($quanxian,'编辑体育赛事') && false){//先注释了
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" height=25>赛事管理</TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu11 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
                <TR>
                  
                  <TD ><A href="sports/ss_list.php?type=bet_match" target="main">足球赛事</A><A   href="sports/ss_list.php?type=lq_match"  target="main">篮球赛事 </A></TD>
             </TR>
			 <TR>
                  
                  <TD ><A href="sports/ss_list.php?type=tennis_match" target="main">网球赛事</A><A   href="sports/ss_list.php?type=volleyball_match"  target="main">排球赛事 </A></TD>
             </TR>
			 <TR>
                  
                  <TD ><A href="sports/ss_list.php?type=baseball_match" target="main">棒球赛事</A><A   href="sports/gjss_list.php?type=3"  target="main">冠军赛事 </A></TD>
             </TR>
			 <TR>
                  <TD ><A   href="sports/gpsz.php"  target="main">关盘设置</A></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>

<?php
if(strpos($quanxian,'查看会员信息')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-users"></TD>
          <TD style="CURSOR: hand" height=25><span class="STYLE1">会员管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu6 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  <TD ><A class="actives"   href="user/list.php?1=1" target="main">会员列表</A><A   href="user/user_log.php"  class="actives"   target="main">会员日志 </A></TD>
             </TR>
			 <TR  style="display: none;">
                  
                  <TD ><A  class="actives"   href="user/check_reb.php"  target="main">核查返利</A><A  class="actives"    href="user/rebates.php"  target="main">会员返利</A></TD>
                </TR>
                <TR>
                    
                    <TD ><A  class="actives"   href="fund/hccw.php"  target="main">存/取/汇款</A><A  class="actives" href="user/user_group_list.php"  target="main">会员组列表</A></TD>
                </TR>
		
                  
                  <TD ><A  class="actives" href="hygl/lsyhxx.php"  target="main">历史信息</A><A  class="actives" href="../app/member/cache/hacker_look.php"  target="main">黑名单列表</A></TD>
                </TR>
				           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>

              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'查看理财管理')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-users"></TD>
          <TD style="CURSOR: hand" height=25><span class="STYLE1">理财管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu6 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                
			 
                    
                   
		<TR>
                  
                  <TD ><A  class="actives" href="pin/pinck.php"  target="main">注册码管理</A><A  class="actives" href="pin/list.php"  target="main">会员列表</A></TD>
                </TR>
				<TR>
				<TR>
                  
                  <TD ><A  class="actives" href="pin/tx.php"  target="main">提款管理</A><A  class="actives" href="pin/list.php"  target="main">会员列表</A></TD>
                </TR>
				<TR>
                  
                 
				           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>

              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'查看财务信息') || strpos($quanxian,'加款扣款') || strpos($quanxian,'财务审核')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-coin-dollar"></TD>
          <TD style="CURSOR: hand" height=25><span class="STYLE1">财务管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu7 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  <TD ><A  class="actives" href="fund/chongzhi.php?status=<?=urldecode('全部存款')?>" target="main">存款管理</A><A    class="actives" href="fund/tixian.php?status=<?=urldecode('全部提款')?>"  target="main">提款管理 </A></TD>
             </TR>
			 <TR>
                  
                  <TD ><A   class="actives" href="fund/huikuan.php?status=<?=urldecode('全部汇款')?>"  target="main">汇款管理</A><A   class="actives"  href="fund/usercw.php"  target="main">存/取/汇款</A></TD>
                </TR>
				<?php
if(strpos($quanxian,'加款扣款')){
?>

                <TR>
                  
                  <TD ><A   class="actives" href="fund/domoney.php"  target="main">加款扣款</A><A  class="actives" href="report/money_log_by_user.php"  target="main">财务日志</A></TD>
                </TR>
				<?php
}
?>
		
        <TR>
        
                 <TD>
                    <A class="actives" href="fund/cwhz.php"  target="main">财务汇总</A>
                    <A class="actives" href="report/money_log_dele.php"  target="main">删除记录</A>
                 </TD>
                 </TR>

				 
        <TR>
               

				
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'消息管理')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-bullhorn"></TD>
          <TD style="CURSOR: hand" height=25><span class="STYLE1">消息管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu8 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                 
                  <TD ><A  class="actives" href="message/bulletin.php?1=1" target="main">公告管理</A><A   class="actives"  href="message/user_msg.php"  target="main">站内消息 </A></TD>
             </TR>

			 <TR>
                  
                  <TD ><A   href="message/msg_register.php"  target="main">注册消息 </A></TD>
                </TR>
							           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>
<?php
if(strpos($quanxian,'查看代理信息') || strpos($quanxian,'添加代理') || strpos($quanxian,'删除代理') || strpos($quanxian,'修改代理')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-magnet"></TD>
          <TD style="CURSOR: hand" height=25><span class="STYLE1">代理管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu9 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  
                  <TD ><A  class="actives" href="agents/list.php?1=1" target="main">代理列表</A><A  class="actives"  href="agents/report.php"  target="main">代理报表</A></TD>
				 </TR>
			
				 <TR>
                  
                  <TD ><A   href="agents/report_inout.php"  target="main">代理存取报表</A></TD>
                </TR>
				
							           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
				 <?php
					if(strpos($quanxian,'加款扣款')){
				?>
				                <!--TR>
				                  <TD ><A   href="agents/domoney.php"  target="main">给下属会员加款扣款</A></TD>
				                </TR-->
				<?php
					}
				?>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>

<?php
if(strpos($quanxian,'查看报表')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-flag"></TD>
          <TD style="CURSOR: hand" height=25><span class=STYLE1>报表管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu10 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  
                  <TD ><A class="actives" href="report/all_game_index.php" target="main">报表明细</A><A class="actives"  href="report/all_game_index.php" target="main">今日报表</A></TD>
                </TR>
				<TR>
                  
                  <TD ><A class="actives" href="report/sport_history.php" target="main">体育明细</A><A class="actives" href="report/sport_history.php" target="main">今日体育</A></TD>
                </TR>
				<TR>
                  
                  <TD ><A class="actives" href="report/lottery_history.php" target="main">彩票明细</A><A  class="actives" href="report/lottery_history.php" target="main">今日彩票</A></TD>
                </TR>
				
				<TR>
                  
                  <TD ><A class="actives" href="report/live_history.php" target="main">真人明细</A><A class="actives" href="report/live_history.php" target="main">今日真人</A></TD>
                </TR>
				<TR>
                  
                  <TD ><A class="actives" href="report/bhdz_history.php" target="main">棋牌明细</A><A class="actives" href="report/bhdz_history.php" target="main">今日棋牌</A></TD>
                </TR>
							           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>


<?php
if(strpos($quanxian,'数据管理')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-database"></TD>
          <TD style="CURSOR: hand" height=25><span class=STYLE1>数据管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu13 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>

                  <TD ><A  class="actives" href="dataset/qcsj.php" target="main">清除数据</A><A class="actives" href="dataset/sjyh.php" target="main">数据优化</A></TD>
             </TR>
			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>


<?php
if(strpos($quanxian,'管理员管理')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-user-tie"></TD>
          <TD style="CURSOR: hand" height=25><span class=STYLE1>管理员管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu14 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  
                  <TD ><A class="actives" href="manage/list.php?1=1" target="main">管理员列表</A><A  class="actives"  href="manage/log.php?1=1"  target="main">管理员日志 </A></TD>
             </TR>
			 <TR>
                  
                  <TD ><A href="manage/online.php" target="main">在线管理员</A></TD>
             </TR>
			 
			 			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>


<?php
if(strpos($quanxian,'修改网站信息')){
?>

  <tr>
    <td><TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-assistive-listening-systems"></TD>
          <TD style="CURSOR: hand" height=25><span class=STYLE1>系统管理</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu15 class="table_box" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
			  
			  			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
				     </TD>
                </TR>
                <TR>
                  
                  <TD >
                  <A class="actives" href="webconfig/index.php" target="main">系统设置</A>
                  <A style="text-indent: 2.0em;" class="actives" href="webconfig/setHuikuan.php" target="main">设置汇款信息</A>
                  </TD>
             </TR>
				<!--tr> <TD><A href="webconfig/setwx_zfb.php" target="main">设置微信、支付宝</A>
				</TD> </tr-->
                <tr> <TD><A href="webconfig/payset.php" target="main">第三方支付设置</A>
				</TD> </tr>
          			           <TR>
                  <TD><a href="javascript:void(0);" style="height: 13px;
line-height: 13px;background:#2E2E2E;" > &nbsp </a>
         
				     </TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <?php
}
?>

  <tr>
    <td height="8">
	
<TABLE class=leftframetable cellSpacing=0 cellPadding=0 width="97%" align=right 
border=0>
      <TBODY>
        <TR>
          <TD height="25" class="btn_bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <TD width="20" class="icon-info"></TD>
          <TD height=25><span class=STYLEl>系统信息</span></TD>
            </tr>
          </table></TD>
          </TR>
        <TR>
          <TD 
      height=105 style="padding-left:0.8em;"><span class="STYLE2"> <!-- <?=$conf_www?> -->
            <IMG src="Images/closed.gif">系统版本：<i style="font-style:normal;font-size:75%;">4.8</i><!-- <?=$web_site['web_name']?> -->
            </span>

            </TD>
        </TR>
      </TBODY>
    </TABLE>	</td>
  </tr>
</table>
</div>
<script>
(function(){
	var tabBtn = $('.STYLE1'),tabBoxList = $('.table_box');
  $(tabBoxList).wrap('<div class="table_box_wrap">');

	$.each(tabBtn, function(i){
		tabBtn.eq(i).attr('data-height', true);
	});

  var that = null,thatBtn = null,thatActive;
	$.each(tabBtn ,function(i){
		tabBtn.eq(i).on('click', function(){
			if( tabBoxList.eq(i) && tabBtn.eq(i).attr('data-height') == 'true' ){
				var H = tabBoxList.eq(i).children(0).height();
        if( that ){
            that.height( 0 );
            thatBtn.attr('data-height', true);
            thatActive.removeClass('active');
        }
				tabBoxList.eq(i).parents('.table_box_wrap').height( H );
        $(this).parents('table').eq(0).find('[width=20]').addClass('active');
				tabBtn.eq(i).attr('data-height', false);
        that = tabBoxList.eq(i).parents('.table_box_wrap');
        thatBtn = tabBtn.eq(i);
        thatActive = $(this).parents('table').eq(0).find('[width=20]') ;
			}else{
				tabBoxList.eq(i).parents('.table_box_wrap').height( 0 );
				tabBtn.eq(i).attr('data-height', true);
         $(this).parents('table').eq(0).find('[width=20]').removeClass('active');
			}
		});
	});
})();

(function(){
    $('a[target="main"]').on('click', function(){
          show();
    });
    var topWindow = window.top.document.getElementById('right_bg');
    function show(){
        var childHtml = topWindow.contentWindow.document.getElementsByTagName('html')[0];
       // $(childHtml).fadeIn(1000);
       childHtml.style.display = 'none';
    } 
})();
</script>
</body></html>
