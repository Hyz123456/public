function urlparent(url){
	window.open(url,"newFrame");
}

function game_ok(){
	if($(document).find("#username").length){ //没有登录
		alert("登录后才能进行此操作");
		return ;
	}else{
		alert("本游戏需联系客服");
	}
}

function lottery_ok(url){
	//if($(window.parent.document).find("#username").length){ //没有登录
		//alert("登录后才能进行此操作");
		//return ;
	//}else{
		window.location.href=url+'.php';
	//}
}

function url_bb(url){
	window.open(url,"iframepage"); 
}

function t_url(url){
    window.open(url,"iframepage"); 
}

document.write("<script language='javascript' src='../../box/artDialog.js?skin=idialog'></script>");
document.write("<script language='javascript' src='../../box/plugins/iframeTools.js'></script>");
function memberUrl(url) {
	art.dialog.open(url,{width:960,height:500});
}

function bbinMoney() {
	$("#bbin_money").html("加载中...");
	$.post("/dzyy/bbinShow.php",function (data){ 
		$("#bbin_money").html(data);
    });
}

function menu_url(i){
    var index = top.document.getElementById("index");
    
    switch (i) {
        case 1:
            index.src = "myhome.php";
            break;
        case 2:
            index.src = "sports.php";
            break;
        case 30:
            index.src = "bbsports.php";
		    break;
        case 3:
            index.src = "six.php";
            break;
        case 4:
            index.src = "ssc.php"; //重庆时时彩
            break;
        case 18:
            index.src = "ssc.php?t=2"; //广东快乐十分
            break;
        case 19:
            index.src = "ssc.php?t=3"; //北京赛车PK拾
            break;
        case 6:
            index.src = "ssc.php?t=4"; //北京快乐8
            break;
        case 8:
            index.src = "ssc.php?t=5"; //上海时时乐
            break;
        case 5:
            index.src = "ssc.php?t=6"; //福彩3D
            break;
        case 7:
            index.src = "ssc.php?t=7"; //排列三
            break;
		case 82:
            index.src = "ssc.php?t=8";
            break;
		case 83:
            index.src = "ssc.php?t=9";
            break;
		case 84:
            index.src = "ssc.php?t=10";
            break;
		case 85:
            index.src = "ssc.php?t=11";
            break;
		case 86:
            index.src = "ssc.php?t=12";
            break;
		case 87:
            index.src = "ssc.php?t=13";
            break;
        case 17:
            index.src = "logout.php";
            break;
		case 201: //会员中心
			index.src = "member/userinfo.php";
			 //window.open("member/userinfo.php").focus();
            break;
		case 202: //真人转换记录
			window.open("../newbbin/List_Transfer.php?1=1",'newwindow', 'height=500, width=755, top=100, left=550, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
            break;
        case 9:
			index.src ="member/sys_msg.php";
			//window.open("member/sys_msg.php").focus();
            break;
        case 10:
			//memberUrl("member/password.php");
			memberUrl("/myreg.php");
            break;
        case 11:
			index.src ="member/set_money.php";
			//window.open("member/set_money.php").focus();
            break;
        case 12:
			index.src ="member/get_money.php";
			//window.open("member/get_money.php").focus();
            break;
        case 13:
			memberUrl("member/record_ty.php");
            break;
        case 14:
			memberUrl("member/report.php");
            break;
        case 15:
			index.src ="member/agent.php";
            break;
        case 16:
			memberUrl("member/agent_reg.php");
            break;
        case 20:
			index.src ="member/zr_money.PHP";
			//window.open("member/zr_money.php").focus();
            break;
        case 21:
			memberUrl("member/zr_data_money.php");
            break;
        case 61: //关于我们
            index.src = "myabout.php?code=gywm";
            break;
        case 62: //在线客服
			window.open("http://f88.live800.com/live800/chatClient/chatbox.jsp?companyID=760398&configID=142834&jid=3012219915","blank");
            break;
		case 52: //客服QQ
            window.open("tencent://message/?uin=76311368&amp;Menu=yes",'newwindow', 'height=600, width=800, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
            break;	
        case 63: //合作伙伴
            index.src = "myabout.php?code=hzhb";
            break;
        case 64: //存款帮助
            index.src = "myabout.php?code=ckbz";
            break;
        case 65: //取款帮助
            index.src = "myabout.php?code=qkbz";
            break;
        case 66: //常见问题
            index.src = "myabout.php?code=cjwt";
            break;
        case 67: //优惠活动
            index.src = "myhot.php";
            break;
		case 822: 
            index.src = "mygame.php";
            break;
        case 68: //彩票游戏
            index.src = "mylottery.php";
            break;
        case 69: //玩法介绍
            index.src = "myabout.php?code=wfjs";
            break;
        case 70: //会员注册
            index.src = "myreg.php";
            break;
        case 71: //BB电子
		    window.open("live/bbin.php?site=game");
             break;
        case 72: //负责任博彩
            index.src = "myabout.php?code=fzrbc";
            break;
        case 73: //真人娱乐
            index.src = "mylive.php";
            break;
        case 74: //底部联系我们
            index.src = "myabout.php?code=lxwm";
            break;
		case 75: //电子游艺
            index.src = "live/bbin.php";
            break;
			case 775: //电子游艺
            index.src = "myqp.php";
            break;
		case 76: //手机下注
            //index.src = "myphone.php";
			window.open("mobile.html",'newwindow', 'height=1000, width=1024, top=100, left=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');			
            break;
		case 77: //AG电子
		    window.open("live/ag.php");
             break;
		case 78: //MG电子
		    window.open("live/ag.php");
             break;
		case 79: //BB体育
		    window.open("live/bbin.php?site=ball");
             break;
        case 41: //游戏规则
            index.src = "clause.html";
            break;
		case 93:
            index.src = "six.php?lhc=1";
            break;
        default:
            index.src = "myhome.php";
    }
}

function aLeftForm1Sub(){
	var un	=	$("#username").val();
	if(un == "" || un == "帐户"){
		$("#username").focus();
        alert("账号请务必输入！");
		return false;
	}
	var pw	=	$("#passwd").val();
	if(pw == "" || pw == "******"){
		$("#passwd").focus();
        alert("密码请务必输入！");
		return false;
	}
	var vc	=	$("#rmNum").val();
	if(vc == "" || vc == "验证码" || vc.length<4){
		$("#rmNum").focus();
        alert("验证码请务必输入！");
		return false;
	}
 
	$("#formsub").attr("disabled",true); //按钮失效
	          
	$.post("logincheck.php",{r:Math.random(),action:"login",vlcodes:vc,username:un,password:pw},function(login_jg){
		if(login_jg.indexOf("1")>=0){ //验证码错误
			alert("验证码错误，请重新输入");
			$("#rmNum").select();
            document.getElementById("vPic").src = "yzm.php?"+Math.random();
		}else if(login_jg.indexOf("2")>=0){ //用户名称或密码
			alert("用户名或密码错误，请重新输入");
			$("#rmNum").val(''); //清空验证码
			$("#passwd").val(''); //清空验证码
			$("#username").select();
            document.getElementById("vPic").src = "yzm.php?"+Math.random();
		}else if(login_jg.indexOf("3")>=0){ //停用，或被删除，或其它信息
			alert("账户异常无法登陆，如有疑问请联系在线客服");
		}else if(login_jg.indexOf("4")>=0){ //登陆成功
            menu_url(1);
			//window.location.reload();
		}
		$("#formsub").attr("disabled",false); //按钮有效
	});
}