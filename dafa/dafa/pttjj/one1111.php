<?php
header("content-type:text/html;charset:utf8");
session_start();

include_once("ptapi.php");
include_once("../newpt2/config.php");
unset($mysqli);
$mysqli	=	new MySQLi("127.0.0.1","root","root","aobet");
$mysqli->query("set names utf8");
$ptLoginStatus =2;
//$status = 0;原先有注视
if(isset($_SESSION["username"]))
{
	$username =$_SESSION["username"];
    $status = 0;
	include_once("../app/member/class/user.php");
$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];


$userinfo		=	user::getinfo($uid);

$agpassword = $userinfo['user_pass_naked'];
	//include_once("../include/mysqli.php");原先有注视

	$sql="select * from user_list where user_name='{$username}'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_array();
	$ptusername = $row['pt_username'];
	$ptpassword = $row['pt_password'];

	if($ptusername==''){
		$ptusername= strtoupper($toppre.$username);
		$ptpassword = $agpassword;
		$result = PlayerCreate($ptusername,$ptpassword);
		$result1 = PlayerCreate($ptusername,$ptpassword);
			if($result||$result1){
				$sql = "update user_list set pt_username='{$ptusername}',pt_password='{$ptpassword}' where user_name='{$username}'";
				
				$mysqli->query($sql);
				$ptLoginStatus = 0;
			}
	}else{
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
<title>PT电子游戏</title>

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
		/*var r_user = "<?PHP echo $_GET['ptusername'];?>";
		var r_pass = "<?PHP echo $_GET['$ptpassword'];?>";
		if((r_user!="")&&(r_pass!="")){

			iapiLogin(r_user, r_pass, '1', "CH");
		}else{*/
        iapiLogin('<?PHP echo $ptusername;?>', '<?PHP echo $ptpassword;?>', '1', "CH");
		//}
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
				
                         <li><a href="one.php" onclick="LoadHotGame(this)" class="active">Hot Game <br>热门游戏</a></li>
                         <li><a href="four.php" onclick="LoadAllGame(this)" class="">All <br>全部游戏</a></li>
                        
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
                            var gameurl = 'http://cache.download.banner.greenjade88.com/casinoclient.html';
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

