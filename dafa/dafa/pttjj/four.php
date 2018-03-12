<?php
header("content-type:text/html;charset:utf8");
session_start();
include_once("../newpt2/ptapi.php");
include_once("../app/member/include/config.inc.php");
include_once("../app/member/class/user.php");
$ptLoginStatus =2;
if(isset($_SESSION["username"]))
{
    $username =$_SESSION["username"];
    $status = 0;
    $uid	=	$_SESSION["userid"];
    $loginid=	$_SESSION["uid"];
    $sql="select pt_username,pt_password from user_list where user_name='{$username}'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();
    $ptusername = $row['pt_username'];
    $ptpassword = $row['pt_password'];
    if($ptusername=='')
    {
        $ptapi =new ptapi();
        $ptusername=  $username;
        $ptpassword =  substr(md5($username),0,12);;
        $res = $ptapi->login($ptusername,0);
    }
    else
    {
        $ptLoginStatus = 0;//PlayerOnline($ptusername);
    }

}else {
    $status = 1;
}
session_write_close();

//$ptusername = strtoupper('HJpovl2211');原先有注视
//$ptpassword = 'abc123';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dt">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>宝马线上娱乐</title>

<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="css/jquery.min.js"></script>
<!-- 游戏 -->
<script type="text/javascript" src="../newpt2/js/newjquery/jquery.min.js"></script>
<script type="text/javascript" src="../newpt2/js/integration.conf.js"></script>
<script type="text/javascript" src="../newpt2/js/integration.js"></script>

		<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/slots-iframe.css" rel="stylesheet">
<link href="css/iosOverlay.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/jquery.lazyload.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.simplePagination.js"></script>
<script src="js/iosOverlay.js"></script>
<script src="js/spin.min.js"></script>
<script src="js/jquery.function.js"></script>
<?php if($ptLoginStatus==0){ ?>
<script type="text/javascript">
    iapiSetCallout('Login', calloutLogin);
    iapiSetCallout('Logout', calloutLogout);
	
    function login() {
		var r_user = "<?php echo $ptusername;?>";
		var r_pass = "<?php echo $ptpassword;?>";
		if((r_user!="")&&(r_pass!="")){

			iapiLogin(r_user, r_pass, '1', "CH");
		}else{
        iapiLogin('<?php echo $ptusername;?>', '<?php echo $ptpassword;?>', '1', "CH");
		}
    }

    function logout(allSessions, realMode) {
        iapiLogout(allSessions, realMode);
    }

    function calloutLogin(response) {
		//alert(JSON.stringify(response));
        // errorCode=6错误在登录时可能会发生，但游戏可以正常进入。可以忽略
        var code = response.errorCode;
        if (code && code != 6) {

            alert("Login failed, " + response.errorText);
			return false;
        }
        else {
			return true;
            //alert("success");
			//window.location = "http://www.google.com/";
        }
    }

    function calloutLogout(response) {
        if (response.errorCode) {
            alert("Logout failed, " + response.errorCode);
        }
        else {
            delete_cookie();
        }
    }
</script>
<?php } ?>
<style>
span{font-style:normal !important;}
</style>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//how much items per page to show
	var show_per_page = 18; 
	//getting the amount of elements inside paginationdemo div
	var number_of_items = $('#paginationdemo').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	
	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);
	
	//now when we got all we need for the navigation let's make it '
	
	/* 
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<a class="previous_link" href="javascript:previous();"><</a>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	navigation_html += '<a class="next_link" href="javascript:next();">></a>';
	
	$('#page_navigation').html(navigation_html);
	
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');
	
	//hide all the elements inside paginationdemo div
	$('#paginationdemo').children().css('display', 'none');
	
	//and show the first n (show_per_page) elements
	$('#paginationdemo').children().slice(0, show_per_page).css('display', 'block');
	
});

function previous(){
	
	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
	
}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
	
}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());
	
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	
	//hide all children elements of paginationdemo div, get specific items and show them
	$('#paginationdemo').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
	
	//update the current page input field
	$('#current_page').val(page_num);
}
  
</script>
<script type="text/javascript" src="css/a.js"></script>
<style>

.col-xs-6{    padding-left: 8px;
    padding-right: 8px;
    margin-bottom: 15px !important;}
#page_navigation a{
	padding:6px;
	font-famliy:"Century Gothic", Arial, Helvetica, sans-serif, "Microsoft YaHei", "微软雅黑";
	margin:2px;
	background:#fff;
	color:black;
	text-decoration:none
}
.active_page{
	font-famliy:"Century Gothic", Arial, Helvetica, sans-serif, "Microsoft YaHei", "微软雅黑";
	background:darkblue;
	color:black;
	    background: #ffff00 !important;
}
</style>

        <style>
            body{
                background:none;
                font-family: verdana;
                padding:0px;
                margin:0px;
                letter-spacing:2px;
            }
            .top-banner {
                background-color: rgba(0,0,0,0.5);
            }
            .header{
                position:absolute;
                top:0px;
                left:0px;
                width:100%;
                height:80px;            
            }
            .header h1{
                color:#fff;
                font-size: 38px;
                margin:0px 0px 0px 30px;
                font-weight:100;
                line-height:80px;
                padding:0px;
            }
            .footer{
                width:100%;
                margin:10px 0px 5px 0px;
            }
            a img{
                border:none;
                outline:none;
            }
            .content{
                margin-top:100px;
                padding:0px;
                bottom:0px;
            }
            .about{
                width:100%;
                height:400px;
                background:transparent url(images1/about.png) repeat-x top left;
                border-top:2px solid #ccc;
                border-bottom:2px solid #000;
            }
            .about .text{
                width:16%;
                margin:5px 2% 10px 2%;
                height:380px;
                float:left;
                color:#FCFEF3;
                font-size: 16px;
                text-align:justify;
                letter-spacing:0px;
            }
            .about .text h1{
                border-bottom: 1px dashed #ccc;
                color:#fff;
            }
            .demo{
                width:100%;
               
            
               
            }
            h1{
                color:#404347;
               
                font-weight:100;
            }
			.pagedemo{
			
				width:100%;
		
            
                text-align:center;
				
			}
			



        </style>
    </head>
	
	
	
	
	
	
	
	
	
	
	<body>
    <form name="form1" method="post" action="#" id="form1">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTUwNjM5ODcyNmRkH3SX6rgFzJNXTXUijFGjggKhwf4=">
</div>

<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="9B7CF618">
</div>
        <script>
            var gametype = "ge";
            var lang = "cs";
            var userId = "";
            var html5 = 0; 
            var gameGE = "True";
            var gamePT = "True";
            var gameMG = "True";
            var gameSP = "True";
            var gameAG = "True";                   
        </script>
        <div id="slots-iframe">
            <section class="slots-main-content">
                <div class="slots-game-tab" style="border:1px solid yellow;width:100%;">
                    
               
                    
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12">
    
        <div class="col-sm-4 col-md-3 no-padding hidden-xs slots-game-sb">
             <div class="slots-game-cnt">
                  <h1><img src="images/title-casino.png" alt=""></h1>
                      <ul>
				
                         <li><a href="one.php" onclick="LoadHotGame(this)" class="">Hot Game <br>热门游戏</a></li>
                         <li><a href="four.php" onclick="LoadAllGame(this)" class="active">All <br>全部游戏</a></li>
                        
                         <li><a href="three.php" onclick="LoadClassicSlot(this)" class="">Classic Slots <br>老虎机</a></li>
						  <li><a href="twoa.php" onclick="LoadVideoSlot(this)" class="">Video Slots <br>视频扑克</a></li>
                         <li><a href="eight.php" onclick="LoadTableSlot(this)" class="">Table Game <br>现场庄家</a></li>
                       
                      </ul>
               </div>
        </div>
                    <div class="col-xs-9 col-sm-8 col-md-9">
                        <div class="col-xs-12 no-padding">
                            <div class="frm-gw slots-search">
                                <div class="form-group">
                                    <div class="col-xs-9 col-lg-10 no-padding">                                  
                                        <input class="form-control" id="txt-search" type="text">
                                    </div>
                                    <div class="col-xs-3 col-lg-2 no-padding pull-right">
                                        <a href="javascript:void(0)" class="btn-search">搜索</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						<script src="http://cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
						
						
<script>
	$(function(){
		
		$(".pull-right").click(function(){
			$("a.dde").hide().filter(":contains('"+$("#txt-search").val()+"')").show();
		});
	});
</script>
						<script>


$(function () {
$(".ocs").hover(
	function () {
		$(this).find(".dask").stop().delay(50).attr({style:"display:block"}).animate({"top":0,opacity:0.9},300)
	 },
	function () {
		$(this).find(".dask").stop().animate({"top":0,opacity:0},300)
	}
	
)
})


function blinklink()
{
if (!document.getElementById('blink').style.color)
 {
 document.getElementById('blink').style.color="green"
 }
if (document.getElementById('blink').style.color=="green")
 {
 document.getElementById('blink').style.color="#1AA1B3"
 }
else
 {
 document.getElementById('blink').style.color="green"
 }
timer=setTimeout("blinklink()",500)










}

function stoptimer()
{
clearTimeout(timer)
}














</script>

<style>

<style>

.ocs a:hover{background:#E7B546;border-radius:4px;color:black;z-index:5;}


.obs{width:32.8%;height:175px;position:relative;float:left;    padding-left: 8px;
    padding-right: 8px;

}
.ocs{position:relative;border:4px solid #FCD55C;float:left;width:218px;height:126px;float:left;margin-left:8px;margin-top:8px;}
.ocs img{width:210px;height:119px;}
.obs  span{color:#fffad4;text-align:center;font-family:"微软雅黑";width:218px;margin-left: 8px;height:23px;background:url(icon/title.png)no-repeat;line-height:23px;float:left;}
.ocs img:hover{background:url(icon/list_hover.png)no-repeat;width:210px;height:119px;}



.dask {
    width:210px;
    height:119px;
    padding: 0px 0 0 0px;
    background: url(icon/list_hover.png)no-repeat center;
    opacity: 0.8;
    position: absolute;
    top: -0px;
    left: 0;
    display: none;
}
</style>

</style>
						
                        <div class="clearfix"></div>
						
						
							<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />
	
		
                        <div id="paginationdemo"  class="demo ee">
					<a href="javascript:void(0)" class="dde">
              <div class="obs">

               <div class="ocs">
			      <em class="wlcsh">
				   <img  class="ab" src="./icon/donq1.png"   >
                   <div class="dask"></div>
			     </em>

			 </div>
			 	  <span  style="margin-top:5px;">五路财神</span>
			 
			 

			 
		</div>
		
	</a>
	
	<a href="javascript:void(0)" class="dde">
		
		<div class="obs">

<div class="ocs">
				 <em class="ftg">
				<img class="ae"src="./icon/gtsir1.png" >
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 
			 	<span  style="margin-top:5px;">五虎将</span>
			 
			 

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
			 <em class="kfp">
				<img  class="aa" src="./icon/gtsgme.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">六福兽</span>
			 
			 

			 
		</div>
		
		</a>
	
			 
			 

			 
			 <a href="javascript:void(0)" class="dde">
			 
			 
			 
		<div class="obs">

<div class="ocs">
			 	 <em class="jqw">
				<img class="ac"src="./icon/23.png">
		
				<div class="dask"></div>
			 </em>
			 
						 
		
			 </div>
				<span  style="margin-top:5px;">金钱蛙</span>
			 
			 

			 
		</div>
		</a>
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

           <div class="ocs">
				 <em class="ashfta">
				<img class="af"src="./icon/gtsfj.png" >
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">FALREST OF THEM ALL</span>
			
		  </div>
		  
		  </a>
		  <a href="javascript:void(0)" class="dde">
		  <div class="obs">

            <div class="ocs">
			 <em class="ashcpl">
				<img class="af"src="./icon/ssp.png"  >
		
				<div class="dask"></div>
			 </em>	 
		
			 </div>
					<span  style="margin-top:5px;">CHESTS OF PLENTY</span>
		
		</div>
		
		</a>
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

<div class="ocs">
			 <em class="ashvrth">
				<img class="af"src="./icon/bld.png">
			
				<div class="dask"></div>
			 </em> 
		
			 </div>
				<span  style="margin-top:5px;">VIRTUAL HORSES</span>

			 
		</div>
		
		
		</a>
		
		<a href="javascript:void(0)" class="dde">
	
		<div class="obs">

<div class="ocs">
				 <em class="gtsflzt">
				<img class="af"src="./icon/bob.png"  >
		
				<div class="dask"></div>
			 </em>
			 
						 
		
			 </div>
			 		<span  style="margin-top:5px;">飞龙在天</span>
			 
			 

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		
		
	
		<div class="obs">

<div class="ocs">
			 	 <em class="gtsgme">
				<img class="af"src="./icon/dnr.png" >

				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 					<span  style="margin-top:5px;">大明帝国</span>
			 

			 
		</div>
		</a>
		<a href="javascript:void(0)" class="dde">
		
	
		
		
		
		
		
		<div class="obs">

<div class="ocs">
				 <em class="ashsbd">
				<img class="af"src="./icon/eas.png"  >
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			 	 	<span  style="margin-top:5px;">SINBADS DOLDEN VOYAGE</span>
 
		</div>
		
		
		</a>
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

<div class="ocs">
			 <em class="ash3brg">
				<img class="af"src="./icon/fff.png" >
			
				<div class="dask"></div>
			 </em>
			 
						 
		
			 </div>
			 	<span  style="margin-top:5px;">3 CARD BRAG</span>

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		
		

		<div class="obs">

<div class="ocs">
			 <em class="gtsfj">
				<img class="af"src="./icon/fm.png" >
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
		<span  style="margin-top:5px;">鲤鱼跃龙门</span>
			 
			 

			 
		</div>
		
		
		
		
		</a>
		<a href="javascript:void(0)" class="dde">
		
		<div class="obs">

<div class="ocs">
			 <em class="donq">
				<img class="af"src="./icon/bib.png"  >
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			 	 	<span  style="margin-top:5px;">THE RICHES OF DON QUIXOTE</span>
			 
			 

			 
		</div>
		

		</a>
		
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
				 <em class="jpgt">
				<img class="af"src="./icon/jpgt.png"  >
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			 	  	<span  style="margin-top:5px;">JACKPOT GIANT</span>
			 

			 
		</div>
		

		</a>
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
	 <em class="fcgz">
				<img class="af"src="./icon/fcgz.png" >
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 <span  style="margin-top:5px;">翡翠公主</span>
			 
		</div>
		
		
		</a>
		<a href="javascript:void(0)" class="dde">
				<div class="obs">

<div class="ocs">
				 <em class="thtk">
				<img class="af"src="./icon/thtk.png" >
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 		<span  style="margin-top:5px;">THAI TEMPLE</span>
			 
		</div>
		</a>
		<a href="javascript:void(0)" class="dde">
		
		

		
		
				<div class="obs">

<div class="ocs">
		 <em class="pyrrk">
				<img class="af"src="./icon/yana.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">THE PARAMID RAMESSES</span>
			 
		</div>
		</a>

		<a href="javascript:void(0)" class="dde">
		
				<div class="obs">

<div class="ocs">
				 <em class="fmn">
				<img class="af"src="./icon/fnfrj.png" >
				
				<div class="dask"></div>
			 </em>
			 </div>
			 <span  style="margin-top:5px;">疯狂水果</span>
			 
		</div>
		
		</a>
		<a href="javascript:void(0)" class="dde">
		
				<div class="obs">

<div class="ocs">
			 <em class="hr">
				<img class="af"src="./icon/tps.png"  >
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 	<span  style="margin-top:5px;">赛马</span>

			 
		</div>
		
		</a>
	
		<a href="javascript:void(0)" class="dde">
				<div class="obs">

<div class="ocs">
		 <em class="nian_k">
				<img class="af" src="./icon/nian_k1.png" >
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			<span  style="margin-top:5px;">年年有余</span>
			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
	
				<div class="obs">

<div class="ocs">
			 <em class="fxf">
				<img class="af"src="./icon/fxf.png"  >
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
				<span  style="margin-top:5px;">森林狐</span>
			 
		</div>
	</a>
		
		<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="gtsrng">
				<img class="ae"src="./icon/gtsir.png" >
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			 	<span  style="margin-top:5px;">ROME AND GLORY</span>

			 
		</div>
</a>
<a href="javascript:void(0)" class="dde">
              <div class="obs">

               <div class="ocs">
			 		 <em class="hljb">
				<img  class="aa" src="./icon/ton1.png">
				
				<div class="dask"></div>
			 </em>

			 </div>
			 	<span  style="margin-top:5px;">两种皇家同花顺</span>
			 

			 
		</div>
		
	</a>
	
	<a href="javascript:void(0)" class="dde">
		
		<div class="obs">

<div class="ocs">
		 <em class="af25">
				<img  class="aa" src="./icon/ton2.png">
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 
			 	<span  style="margin-top:5px;">25线a花花牌</span>
			 

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
					 <em class="af4">
				<img  class="aa" src="./icon/ton3.png">
				
				<div class="dask"></div>
			 </em> 
		
			 </div>
		<span  style="margin-top:5px;">4线a级花牌</span>

			 
		</div>
		
		</a>
	
			 
			 

			 
			 <a href="javascript:void(0)" class="dde">
			 
			 
			 
		<div class="obs">

<div class="ocs">
			 	 		 <em class="dw4">
				<img  class="aa" src="./icon/ton4.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">4线百搭2</span>
			 

			 
		</div>
		</a>
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

           <div class="ocs">
			 <em class="af">
				<img  class="aa" src="./icon/ton5.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			<span  style="margin-top:5px;">A级花牌</span>
		  </div>
		  
		  </a>
		  <a href="javascript:void(0)" class="dde">
		  <div class="obs">

            <div class="ocs">
				 <em class="amvp">
				<img  class="aa" src="./icon/ton4.png">
				
				<div class="dask"></div>
			 </em>
			 </div>
				<span  style="margin-top:5px;">ALL AMERICAN</span>
		</div>
		
		</a>
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

<div class="ocs">
			 <em class="dw">
				<img  class="aa" src="./icon/ton6.png">
				
				<div class="dask"></div>
			 </em>
		
			 </div>
			<span  style="margin-top:5px;">2点百搭牌</span>
			 
		</div>
		
		
		</a>
		
		<a href="javascript:void(0)" class="dde">
	
		<div class="obs">

<div class="ocs">
		 <em class="jb_mh">
				<img  class="aa" src="./icon/ton8.png">
				
				<div class="dask"></div>
			 </em>
			 
						 
		
			 </div>
			<span  style="margin-top:5px;">对j高手</span>

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		
		
	
		<div class="obs">

<div class="ocs">
		 <em class="tob">
				<img  class="aa" src="./icon/ton6.png">
			
				<div class="dask"></div>
			 </em>
		
			 </div>
			 		<span  style="margin-top:5px;">10线对j高手</span>
			 
		</div>
		</a>
		
			
	
				<a href="javascript:void(0)" class="dde">
              <div class="obs">

               <div class="ocs">
			 <em class="irm2">
				<img  class="aa" src="./icon/hua.png">
				
				<div class="dask"></div>
			 </em>
			 </div>
			 	<span  style="margin-top:5px;">钢铁侠</span>
			 

			 
		</div>
		
	</a>
	
	
	<a href="javascript:void(0)" class="dde">
		
		<div class="obs">

<div class="ocs">
				 <em class="irm3">
				<img  class="aa" src="./icon/hub.png">
		
				<div class="dask"></div>
			 </em>
			 </div>
			 
			 		<span  style="margin-top:5px;">钢铁侠2</span>

			 
		</div>
		</a>
	
		
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
		 <em class="pmn">
				<img  class="aa" src="./icon/hud.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
		<span  style="margin-top:5px;">PANTHER MOON</span>

			 
		</div>
		
		</a>
	
			 
		

			 
			 <a href="javascript:void(0)" class="dde">
			 
			 
			 
		<div class="obs">

<div class="ocs">
						 <em class="pgv">
				<img  class="aa" src="./icon/hue.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
		<span  style="margin-top:5px;">PENGUIN VACATION</span>

			 
		</div>
		</a>
		
		
		
		
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

           <div class="ocs">
				 <em class="ges">
				<img  class="aa" src="./icon/huf.png">
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			<span  style="margin-top:5px;">GEISHA STORY</span>
		  </div>
		  
		  </a>
		  
		  
	
		  <a href="javascript:void(0)" class="dde">
		  <div class="obs">

            <div class="ocs">
				  	 <em class="sis">
				<img  class="aa" src="./icon/hug.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
<span  style="margin-top:5px;">SILENT SUMARVI</span>
		</div>
		
		</a>
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

<div class="ocs">
				 <em class="mcb">
				<img  class="aa" src="./icon/huh.png">
			
				<div class="dask"></div>
			 </em>
		
		
			 </div>
				<span  style="margin-top:5px;">MR. CASHBACK</span>
			 
		</div>
		
		
		</a>

		
		<a href="javascript:void(0)" class="dde">
	
		<div class="obs">

<div class="ocs">
						 <em class="tpd2">
				<img  class="aa" src="./icon/hui.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">THAI PARADISE</span>

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		
		
	
		<div class="obs">

<div class="ocs">
			 <em class="bib">
				<img  class="aa" src="./icon/bibi.png">
				
				<div class="dask"></div>
			 </em>
			 </div>
			 			<span  style="margin-top:5px;">蓝色深海</span>

			 
		</div>
		</a>
		
	
		<a href="javascript:void(0)" class="dde">
		
	
		
		
		
		
		
		<div class="obs">

<div class="ocs">
				 <em class="hk">
				<img  class="aa" src="./icon/gtshwkp.png">
				
				<div class="dask"></div>
			 </em>
			 </div>
			 	<span  style="margin-top:5px;">高速公路之王</span>
		</div>
		
		
		</a>
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

<div class="ocs">
			 	 <em class="gtspor">
				<img  class="aa" src="./icon/gtspor.png">
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 	<span  style="margin-top:5px;">PLENTY OFORTUNE</span>
		</div>
		</a>
		
		
		<a href="javascript:void(0)" class="dde">
		
		

		<div class="obs">

<div class="ocs">
			 <em class="gtssmbr">
				<img  class="aa" src="./icon/samba.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
	<span  style="margin-top:5px;">SAMBA BRAZIAL</span>

			 
		</div>
		
		
		
		
		</a>
		
		
		<a href="javascript:void(0)" class="dde">
		
		<div class="obs">

<div class="ocs">
				 <em class="gos">
				<img  class="aa" src="./icon/huang.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 <span  style="margin-top:5px;">黄金之旅</span>

			 
		</div>
		

		</a>
							<a href="javascript:void(0)" class="dde">
		
		<div class="obs">


	

<div class="ocs">
	 <em class="hlk2">
			
				<img  class="aa" src="./icon/gtshlksc.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			 	<span  style="margin-top:5px;">绿巨人</span>
			 
		</div>
		

		</a>
	
	
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
	 <em class="drd">
				<img  class="aa" src="./icon/gtsdrdsc.png">
				
				<div class="dask"></div>
			 </em>
			 </div>
			<span  style="margin-top:5px;">夜魔侠</span>
		</div>
		
		
		</a>
		
		<a href="javascript:void(0)" class="dde">
				<div class="obs">

<div class="ocs">
			 <em class="ct">
				<img  class="aa" src="./icon/ct.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
		<span  style="margin-top:5px;">船长的宝藏</span>
		</div>
		</a>
		
	
		<a href="javascript:void(0)" class="dde">
		
		

		
		
				<div class="obs">

<div class="ocs">
			 <em class="8bs">
				<img  class="aa" src="./icon/8qiu.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
		<span  style="margin-top:5px;">8球</span>
		</div>
		</a>

		
	
		<a href="javascript:void(0)" class="dde">
		
				<div class="obs">

<div class="ocs">
				  <em class="al">
				<img  class="aa" src="./icon/al.png">
			
				<div class="dask"></div>
			 </em>
			 </div>
				<span  style="margin-top:5px;">炼金术士</span>
		</div>
		
		</a>
		
		<a href="javascript:void(0)" class="dde">
		
				<div class="obs">

<div class="ocs">
				 <em class="ah2">
				<img  class="aa" src="./icon/yixin.png">
				
				<div class="dask"></div>
			 </em> 
		
			 </div>
			<span  style="margin-top:5px;">异形猎手</span>
		</div>
		
		</a>
	
		<a href="javascript:void(0)" class="dde">
				<div class="obs">

<div class="ocs">
		 <em class="ashamw">
				<img  class="aa" src="./icon/ashamw.png">
				
				<div class="dask"></div>
			 </em> 
		
			 </div>
	<span  style="margin-top:5px;">野外亚马逊</span>
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
	
				<div class="obs">

<div class="ocs">
			 <em class="arc">
				<img  class="aa" src="./icon/gonjian.png">
				
				<div class="dask"></div>
			 </em> 
		
			 </div>
			<span  style="margin-top:5px;">ARCHER</span>
		</div>
	</a>
		<a href="javascript:void(0)" class="dde">
		
				<div class="obs">

<div class="ocs">
			 <em class="gtsbtg">
				<img  class="aa" src="./icon/zhushen.png">
				
				<div class="dask"></div>
			 </em>
		
			 </div>
			 <span  style="margin-top:5px;">BATTLE OF THE GODS</span>
		</div>
		
		</a>
		<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="bl">
				<img  class="aa" src="./icon/haibin.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			 <span  style="margin-top:5px;">海滨嘉年华</span>

			 
		</div>
</a>
		
		
				<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="bt">
				<img  class="aa" src="./icon/baimu.png">
				
				<div class="dask"></div>
			 </em>		 
		
			 </div>
		<span  style="margin-top:5px;">百慕大三角洲</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
	 <em class="bld">
				<img  class="aa" src="./icon/bllld.png">
	
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
					<span  style="margin-top:5px;">刀锋战士</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
				 <em class="bob">
				<img  class="aa" src="./icon/bob (1).png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
		<span  style="margin-top:5px;">赏金熊</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
		 <em class="cam">
				<img  class="aa" src="./icon/gtscnasc.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">美国队长</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
					 <em class="bld50">
				<img  class="aa" src="./icon/bld50.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">刀锋战士50</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 	 <em class="gtscirsj">
				<img  class="aa" src="./icon/maxi.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			<span  style="margin-top:5px;">船长大炮的现金马戏团</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="ct">
				<img  class="aa" src="./icon/haidao.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">CAPTAIN'S TREASURE PRO</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
		 <em class="ctiv">
				<img  class="aa" src="./icon/catt.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">CAT IN VAGES</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="qop">
				<img  class="aa" src="./icon/catqk.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">金字塔女王</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="chl">
				<img  class="aa" src="./icon/cherl.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
		<span  style="margin-top:5px;">CHERRY LOVE</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
				 <em class="cm">
				<img  class="aa" src="./icon/chufang.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
		<span  style="margin-top:5px;">中国厨房</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
		 <em class="cifr">
				<img  class="aa" src="./icon/clt2.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">全景电影</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
				 <em class="gtscbl">
				<img  class="aa" src="./icon/niuzai.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
		<span  style="margin-top:5px;">COWBOYS & ALIENS</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
				 <em class="c7">
				<img  class="aa" src="./icon/scs.png">
		
				<div class="dask"></div>
			 </em>>
						 
		
			 </div>
					<span  style="margin-top:5px;">疯狂之七</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
					 <em class="dt">
				<img  class="aa" src="./icon/dtm.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			<span  style="margin-top:5px;">沙漠财宝</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
				 <em class="dt2">
				<img  class="aa" src="./icon/dt2.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">沙漠财宝2</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="fm">
				<img  class="aa" src="./icon/jackpot.png">
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			<span  style="margin-top:5px;">古怪猴子</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="fnf">
				<img  class="aa" src="./icon/fnf50.png">
			
				<div class="dask"></div>
			 </em> 
		
			 </div>
			<span  style="margin-top:5px;">神奇四侠</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="fnf50">
				<img  class="aa" src="./icon/fnf.png">
				
				<div class="dask"></div>
			 </em> 
		
			 </div>
			<span  style="margin-top:5px;">神奇四侠2</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="ghr">
				<img  class="aa" src="./icon/gtsdgk.png">
			
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">恶灵骑士</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="eas">
				<img  class="aa" src="./icon/easas.png">
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
				<span  style="margin-top:5px;">疯狂的兔子</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="gtsftf">
				<img  class="aa" src="./icon/jfoot.png">
				
				<div class="dask"></div>
			 </em> 
		
			 </div>
			<span  style="margin-top:5px;">极品足球</span>
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">


				 <em class="esmk">
				<img  class="aa" src="./icon/sbd.png">
				
				<div class="dask"></div>
			 </em>
		
			 </div>
		<span  style="margin-top:5px;">ESMERALDA</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
				 <em class="fbr">
				<img  class="aa" src="./icon/ffoot.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
			<span  style="margin-top:5px;">终极足球</span>
			 
		</div>
</a>
			<a href="javascript:void(0)" class="dde">

				<div class="obs">

<div class="ocs">
			 <em class="fow">
				<img  class="aa" src="./icon/jincu.png">
			
				<div class="dask"></div>
			 </em>	 
		
			 </div>
				<span  style="margin-top:5px;">惊怵之术</span>
		</div>
</a>
			
		
	
	<a href="javascript:void(0)" class="dde">
		
		<div class="obs">

<div class="ocs">
		 <em class="ba">
				<img  class="aa" src="./icon/lun2.png">
				
				<div class="dask"></div>
			 </em>
		
			 </div>
		<span  style="margin-top:5px;">迷你百家乐</span>
			 

			 
		</div>
		</a>
		
		<a href="javascript:void(0)" class="dde">
		<div class="obs">

<div class="ocs">
		 <em class="bjl">
				<img  class="aa" src="./icon/lun3.png">
				
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
	<span  style="margin-top:5px;">21点</span>

			 
		</div>
		
		</a>
	
			 
			 

			 
			 <a href="javascript:void(0)" class="dde">
			 
			 
			 
		<div class="obs">

<div class="ocs">
		 <em class="romw">
				<img  class="aa" src="./icon/lun1.png">
				
				<div class="dask"></div>
			 </em>
			 
						 
		
			 </div>
			<span  style="margin-top:5px;">轮盘赌</span>

			 
		</div>
		</a>
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

           <div class="ocs">
			 <em class="bjuk_mh5">
				<img  class="aa" src="./icon/lun2.png">
		
				<div class="dask"></div>
			 </em>
						 
		
			 </div>
				<span  style="margin-top:5px;">英式二十一点</span>
		  </div>
		  
		  </a>
		  <a href="javascript:void(0)" class="dde">
		  <div class="obs">

            <div class="ocs">
			 <em class="mbj">
				<img  class="aa" src="./icon/lun3.png">
		
				<div class="dask"></div>
			 </em> 
		
			 </div>
					<span  style="margin-top:5px;">迷你21点</span>
		</div>
		
		</a>
		
		<a href="javascript:void(0)" class="dde">

		<div class="obs">

<div class="ocs">
				 <em class="sb">
				<img  class="aa" src="./icon/lun5.png">
				
				<div class="dask"></div>
			 </em>
		
			 </div>
				<span  style="margin-top:5px;">骰宝</span>
			 
		</div>
		
		
		</a>
			
				<a href="javascript:void(0)" class="dde">
              <div class="obs">

               <div class="ocs">
			 <em class="frr">
				<img  class="aa" src="./icon/lun1.png">
		
				<div class="dask"></div>
			 </em>
			 </div>
			 		<span  style="margin-top:5px;">实况法式轮盘</span>
			 

			 
		</div>
		
	</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="amvp">
				<img  class="aa" src="./icon/zbmg.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">走遍美国</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="dw">
				<img  class="aa" src="./icon/dw.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">野蛮对决</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="jb_mh">
				<img  class="aa" src="./icon/dw1.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">多手对j高手</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="jp">
				<img  class="aa" src="./icon/dw2.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">王牌扑克</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tob">
				<img  class="aa" src="./icon/dw3.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">对十高手</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="jb50">
				<img  class="aa" src="./icon/ton6x1.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">50线对j高手</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ghl">
				<img  class="aa" src="./icon/ghl.png">
					<div class="dask"></div>
			</em>
		 </div>
		<span  style="margin-top:5px;">猜扑克游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="p6dbj_mh5">
				<img  class="aa" src="./icon/p6dbj_mh5.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">窥牌百家乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pep">
				<img  class="aa" src="./icon/pep.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">挑时间扑克</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ash3brg">
				<img  class="aa" src="./icon/ash3brg.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">3卡吹嘘</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts5">
				<img  class="aa" src="./icon/gts5.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">视频轮盘</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tqp">
				<img  class="aa" src="./icon/tqp.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">龙舌兰扑克</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="rd">
				<img  class="aa" src="./icon/rd.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">红狗</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pg">
				<img  class="aa" src="./icon/pg.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">牌九扑克</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ro3d">
				<img  class="aa" src="./icon/ro3d.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">3D轮盘赌</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="cr">
				<img  class="aa" src="./icon/cr.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">红色骰子游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsro3d">
				<img  class="aa" src="./icon/gtsro3d.png">
				<div class="dask"></div>
			</em>
		</div>
				<span  style="margin-top:5px;">3D奖金轮盘赌</span>
	</div>
</a>

		
		<a href="javascript:void(0)" class="dde">
		
				<div class="obs">

<div class="ocs">
			 <em class="qnw">
				<img  class="ab" src="./icon/donq.png"   >
				
				<div class="dask"></div>
			 </em>	 
		
			 </div>
			 	 <span  style="margin-top:5px;">权杖女王</span>
			 
		</div>
		
		</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts40">
				<img class="af"src="./icon/gts40.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">刀锋战士刮刮乐</span>
	</div>
</a>



<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="sbj">
				<img class="af"src="./icon/sbj.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">21点刮刮乐</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="bbn">
				<img class="af"src="./icon/bbn.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">甲虫宾果</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsbwsc">
				<img class="af"src="./icon/gtsbwsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">海滩游侠刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ba">
				<img class="af"src="./icon/ba.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">百家乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsavgsc">
				<img class="af"src="./icon/gtsavgsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">复仇者刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsatq">
				<img class="af"src="./icon/gtsatq.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">亚特兰蒂斯女王</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtscb">
				<img class="af"src="./icon/gtscb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">现金魔块</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="arc">
				<img class="af"src="./icon/arc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">弓兵</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tclsc">
				<img class="af"src="./icon/tclsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">三个小丑刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="8bs">
				<img class="af"src="./icon/8bs.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">8球吃角子老虎</span>
	</div>
</a>



<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts39">
				<img class="af"src="./icon/gts39.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">一夜奇遇刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="hh">
				<img class="af"src="./icon/hh.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">鬼屋</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="glg">
				<img class="af"src="./icon/glg.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">黄金游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="grel">
				<img class="af"src="./icon/grel.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">金色召集</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts46">
				<img class="af"src="./icon/gts46.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">生命之神</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gc">
				<img class="af"src="./icon/gc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">地妖之穴</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts37">
				<img class="af"src="./icon/gts37.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">角斗士刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="glr">
				<img class="af"src="./icon/glr.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">角斗士</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsghrsc">
				<img class="af"src="./icon/gtsghrsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">恶灵骑士刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsgoc">
				<img class="af"src="./icon/gtsgoc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">圣诞节幽灵</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ges">
				<img class="af"src="./icon/ges.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">艺伎故事</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="fff">
				<img class="af"src="./icon/fff1.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">酷炫水果农场</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="fosl">
				<img class="af"src="./icon/fosl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">固定赔率老虎机</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="foy">
				<img class="af"src="./icon/foy.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">青春之泉</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="fsc">
				<img class="af"src="./icon/fsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">决赛比分</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="fth">
				<img class="af"src="./icon/fth.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">财富山</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="fbr">
				<img class="af"src="./icon/fbr.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">终极足球</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="fbm">
				<img class="af"src="./icon/fbm.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">狂热足球</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsftf">
				<img class="af"src="./icon/gtsftf.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">足球迷</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="dctw">
				<img class="af"src="./icon/dctw.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">转骰子游戏</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="hr">
				<img class="af"src="./icon/hr.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">打比日</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts44">
				<img class="af"src="./icon/gts44.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">艾丽卡刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsdgk">
				<img class="af"src="./icon/gtsdgk.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">龙之王国</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="dlm">
				<img class="af"src="./icon/dlm.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">情圣博士</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsdnc">
				<img class="af"src="./icon/gtsdnc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">现金海豚</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts48">
				<img class="af"src="./icon/gts48.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">现金海豚刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="qbd">
				<img class="af"src="./icon/qbd.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">飞镖</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="bowl">
				<img class="af"src="./icon/bowl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">保龄猜球游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="atw">
				<img class="af"src="./icon/atw.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">周游列国</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsdrdv">
				<img class="af"src="./icon/gtsdrdv.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">大胆的戴夫和荷鲁斯之眼</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtscbl">
				<img class="af"src="./icon/gtscbl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">牛仔和外星人</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtscnb">
				<img class="af"src="./icon/gtscnb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">警察与土匪</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="rouk">
				<img class="af"src="./icon/rouk.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">俱乐部轮盘赌</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="scs">
				<img class="af"src="./icon/scs.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">经典老虎机刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="chl">
				<img class="af"src="./icon/chl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">樱桃之恋</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="cheaa">
				<img class="af"src="./icon/cheaa.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">赌场HOLD EM游戏</span>
	</div>
</a>		

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="bls">
				<img class="af"src="./icon/bls.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">百万幸运球</span>
	</div>
</a>		

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ctp2">
				<img class="af"src="./icon/ctp2.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">超级船长的宝藏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashbgt">
				<img class="af"src="./icon/ashbgt.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">英国达人秀</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts35">
				<img class="af"src="./icon/gts35.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">美杜莎的凝视</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pbro">
				<img class="pks" src="./icon/pbro.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">弹球轮盘</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="paw">
				<img class="pks" src="./icon/paw.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">小猪与狼</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pso">
				<img class="pks" src="./icon/pks.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">法老王国划刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pso">
				<img class="af" src="./icon/pso.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">罚点球游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pl">
				<img class="af" src="./icon/pl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">舞线</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="op">
				<img class="af" src="./icon/op.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">海洋公主</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="nk">
				<img class="af" src="./icon/nk.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">海王星王国</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="mnkt">
				<img class="af" src="./icon/mnkt.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">霹雳神猴</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="kgdb">
				<img class="af" src="./icon/kgdb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">德比王</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsmrln">
				<img class="af" src="./icon/gtsmrln.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">玛丽莲·梦露</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ms">
				<img class="af" src="./icon/ms.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">魔幻吃角子老虎</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts51">
				<img class="af" src="./icon/gts51.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">幸运熊猫</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="lom">
				<img class="af" src="./icon/lom.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">爱情配对</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="lm">
				<img class="af" src="./icon/lm.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">疯狂乐透</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="kkgsc">
				<img class="af" src="./icon/kkgsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">金刚刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="kn">
				<img class="af" src="./icon/kn.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">基诺</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="jb">
				<img class="af" src="./icon/jb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">丛林摇摆</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsjhw">
				<img class="af" src="./icon/gtsjhw.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">约翰韦恩</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="jpgt">
				<img class="af" src="./icon/jpgt.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">奖金巨人</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="drts">
				<img class="af" src="./icon/drts.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">飞镖投掷赌博游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="hsd">
				<img class="af" src="./icon/hsd.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">摊牌扑克</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="head">
				<img class="af" src="./icon/head.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">硬币投掷游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsaod">
				<img class="af" src="./icon/gtsaod.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">无罪或诱惑</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="iceh">
				<img class="af" src="./icon/iceh.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">冰球游戏</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts50">
				<img class="af" src="./icon/gts50.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">热力宝石</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashhotj">
				<img class="af"src="./icon/ashhotj.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">丛林心脏</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ssp">
				<img class="af"src="./icon/ssp.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">圣诞奇迹</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="samz">
				<img class="af"src="./icon/samz.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">亚马逊的秘密</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="shmst">
				<img class="af"src="./icon/shmst.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">夏洛克的秘密</span>
	</div>
</a>



<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ssa">
				<img class="af"src="./icon/ssa.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">圣诞刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="sc">
				<img class="af"src="./icon/sc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">保险箱探宝</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="sfh">
				<img class="af"src="./icon/sfh.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">非洲炙热</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsru">
				<img class="af"src="./icon/gtsru.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">财富魔方</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="sro">
				<img class="af"src="./icon/sro.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">轮盘赌刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsrkysc">
				<img class="af"src="./icon/gtsrkysc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">洛基传奇刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="rky">
				<img class="af"src="./icon/rky.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">洛基传奇</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="rnr">
				<img class="af"src="./icon/rnr.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">摇摆舞</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="rps">
				<img class="af"src="./icon/rps.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">转轴经典3</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ssl">
				<img class="af"src="./icon/ssl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">转轴经典3</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtspwzsc">
				<img class="af"src="./icon/gtspwzsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">战争特区刮刮乐</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="pop">
				<img class="af"src="./icon/pop.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">宾果</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtspor">
				<img class="af"src="./icon/gtspor.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">非常幸运</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts42">
				<img class="af"src="./icon/gts42.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">粉红豹刮刮乐</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="zcjb">
				<img class="af"src="./icon/zcjb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">招财进宝</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts49">
				<img class="af"src="./icon/gts49.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">X战警刮刮乐</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="wlg">
				<img class="af"src="./icon/wlg.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">舞龙</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtswng">
				<img class="af"src="./icon/gtswng.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">黄金翅膀</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtswvsc">
				<img class="af"src="./icon/gtswvsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">金刚狼刮刮乐</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="wis">
				<img class="af"src="./icon/wis.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">我心狂野</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtslgms">
				<img class="af"src="./icon/gtslgms.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">野生游戏</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="whk">
				<img class="af"src="./icon/whk.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">白狮王</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts36">
				<img class="af"src="./icon/gts36.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">灯之轮</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts52">
				<img class="af"src="./icon/gts52.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">疯狂维京海盗</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="er">
				<img class="af"src="./icon/er.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">开心假期</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ub">
				<img class="af"src="./icon/ub.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">丛林巫师</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="trl">
				<img class="af"src="./icon/trl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">真爱</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tr">
				<img class="af"src="./icon/tr.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">热带滚筒</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tp">
				<img class="af"src="./icon/tp.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">三倍利润</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ta">
				<img class="af"src="./icon/ta.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">三个朋友</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsttlsc">
				<img class="af"src="./icon/gtsttlsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">顶级王牌传奇刮刮乐</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tfs">
				<img class="af"src="./icon/tfs.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">顶级王牌-全星</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ttl">
				<img class="af"src="./icon/ttl.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">顶级王牌-传奇</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ttc">
				<img class="af"src="./icon/ttc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">顶级王牌-明星</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ts">
				<img class="af"src="./icon/ts.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">时空过客</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtstrmsc">
				<img class="af"src="./icon/gtstrmsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">雷神刮刮乐</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tmqd">
				<img class="af"src="./icon/tmqd.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">三剑客和女王</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="mmy">
				<img class="af"src="./icon/mmy.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">木乃伊迷城</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts43">
				<img class="af"src="./icon/gts43.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">木乃伊迷城刮刮乐</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="lvb">
				<img class="af"src="./icon/lvb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">爱之船</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsjzc">
				<img class="af"src="./icon/gtsjzc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">爵士俱乐部</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tpd2">
				<img class="af"src="./icon/tpd2.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">泰国天堂</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tst">
				<img class="af"src="./icon/tst.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">网球明星</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsstg">
				<img class="af"src="./icon/gtsstg.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">苏丹的财富</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsspdsc">
				<img class="af"src="./icon/gtsspdsc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">蜘蛛侠刮刮乐</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="spidc">
				<img class="af"src="./icon/spidc.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">蜘蛛侠：绿妖精的攻击</span>
	</div>
</a>



<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="sib">
				<img class="af"src="./icon/sib.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">银弹</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gtsswk">
				<img class="af"src="./icon/gtsswk.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">孙悟空</span>
	</div>
</a><a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="bs">
				<img class="af"src="./icon/bs.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">白狮</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="mgstk">
				<img class="af"src="./icon/mgstk.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">魔法栈</span>
	</div>
</a><a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashvrtd">
				<img class="af"src="./icon/ashvrtd.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">虚拟赛狗</span>
	</div>
</a>




<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="gts47">
				<img class="af"src="./icon/gts47.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">樂透刮瘋狂</span>
	</div>
</a><a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="zctz">
				<img class="af"src="./icon/zctz.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">招财童子</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashfta">
				<img class="af"src="./icon/ashfta.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">他們所有的最公平</span>
	</div>
</a><a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="snsb">
				<img class="af"src="./icon/snsb.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">日落海灘</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashvrth">
				<img class="af"src="./icon/ashvrth.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">虚拟赛马</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashbob">
				<img class="af"src="./icon/ashbob.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">魔豆的賞金</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="donq">
				<img class="af"src="./icon/donq.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">堂吉诃德的财富</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="tglalcs">
				<img class="af"src="./icon/tglalcs.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">炼金术士的法术</span>
	</div>
</a>


<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ctiv">
				<img class="af"src="./icon/ctiv.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">拉斯维加斯的猫</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="sx">
				<img class="af"src="./icon/sx.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">四象</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="ashlob">
				<img class="af"src="./icon/ashlob.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">布莱恩的一生</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="lndg">
				<img class="af"src="./icon/lndg.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">黃金之國</span>
	</div>
</a>
<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="topg">
				<img class="af"src="./icon/topg.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">壮志凌云</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="aogs">
				<img class="af"src="./icon/aogs.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">眾神時代</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="furf">
				<img class="af"src="./icon/furf.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">眾神時代 狂怒4</span>
	</div>
</a>

<a href="javascript:void(0)" class="dde">
	<div class="obs">
		<div class="ocs">
			<em class="spud">
				<img class="af"src="./icon/spud.png">
				<div class="dask"></div>
			</em>
		</div>
			<span  style="margin-top:5px;">Spud O´Reilly´s</span>
	</div>
</a>



		
		













		
                        <div class="clearfix"></div>
  
						
						
						
                             </div>
							 
				   	
                    </div>
			 <div id='page_navigation' style="TEXT-ALIGN:CENTER;float:right;width:75%;position:relative;top: 15px;"></div>
				
				
                </div>
            </section>
			

        </div>

    </form>


<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>



<script type="text/javascript">
$(document).ready(function(){
    setInterval(function(){
        var t = new Date().getTime()+"";
        var k = parseInt(t.substr(t.length-9,9) * 4.3);
        k = k/100;
        k = parseFloat(k).toLocaleString();
        $("#je").html(k);
    },600);


    $(".games-sub-menu").find("li").click(function(){
        if(!$(this).hasClass("tab7")){
            $(".tab7").hide();
        }
		if($(this).attr('id')=='pfx'||$(this).parent().attr('id')=='pfxs'){return false;}
        $(".games-sub-menu").find(".current").removeClass("current");
        var index = $(this).attr("class").replace("tab",'');
        index = parseInt(index)-1;
        $(this).addClass("current");
        $(".games-item:visible").find("ul").addClass("hide");
        $(".games-item:visible").find("ul:eq("+index+")").removeClass("hide");
		//window.parent.document.ptframe.height=document.body.scrollHeight;
        $('#ptframe', window.parent.document).height(document.body.scrollHeight);
    });
    $("#paginationdemo .ocs").hover(function(){
        $(this).toggleClass("hover");
        });
    $('#paginationdemo .ocs').bind('click',function(){
        var gameId = $(this).find("em").attr("class").replace('game_','');
		//alert(gameId);return false;
		ptLoginStatus = <?php echo $ptLoginStatus;?>;
		if(ptLoginStatus==0){
			if(login()){
				ptLoginStatus =1;
			}
					
		}		
			load_pt(<?php echo $status;?>,gameId);
		        
    });
    $('#keyword').keypress(function (e) {
        var key = e.which;
        if (key == 13) {gsearch();} 
    }); 

    $(".games-sub-menu").find("li").eq(0).trigger('click');

});

                    function load_pt(status, gameId) {
                        var flag = gameNotify(status);
                        if (flag) {
                            //var gameurl = 'http://cache.download.banner.greenjade88.com/casinoclient.html';
                            var gameurl = 'http://<?php echo $_SERVER['HTTP_HOST'];?>/newpt2/playgame.php';
                            if(gameId){gameurl += "?game="+gameId+"&language=zh-cn&nolobby=1";}
                           		
								window.open(gameurl,'','menubar=no,status=yes,scrollbars=yes,top=150,left=100,toolbar=no,width=1041,height=837');
    
                            }
                        }                  
                
                        function gameNotify(status, type) {
                            var flag = false;
                            switch (status) {
                                case 0:
                                    flag = true;
                                    break;
                                case 1:
                                    alert('请先登录');
                                    break;
                                case 2:
                                    notify('当前系统已关闭改平台，详情请询问客服。');
                                    break;
                                default :
                                    break;
                            }
                            return flag;
                        }

function gsearch(){
    var b = [];
    var k = $("#keyword").val();
    if(k=="")return;
    $(".tab7").show().click();
    $("#searchresult").html('');
    $(".game-name").each(function(){
        if($(this).html().indexOf(k)!=-1){
            $("#searchresult").append('<li>'+$(this).parent().html()+'</li>');
        }
    });
    $('#searchresult li').bind('click',function(){
         var gameId = $(this).parent().parent().find("em").attr("class").replace('game_','');
    load_pt('451819984711',1,gameId);
    });
}
function lhjsearch(a){
	 var b = [];
    $(".tab7").show().click();
    $("#searchresult").html('');
    $(".game-name").each(function(){
        if($(this).parent().attr('class')=='lhj pf'+a){
            $("#searchresult").append('<li>'+$(this).parent().html()+'</li>');
        }
    });
    $('#searchresult li').bind('click',function(){
        var gameId = $(this).parent().parent().find("em").attr("class").replace('game_','');
    load_pt('451819984711',1,gameId);
    });
	
}
$("#pfx").click(function(){$("#pfx>.pfx").toggle();})
</script>
        





</body>









    

</html>

