
<!DOCTYPE HTML>
<html>
	<head>
		<title>会员注册</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />  
		<script src="../js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<style>
                        html{ width:100%; height:100%;  }
			body{ margin:0; height:100%; width:100%;    background: url("/pic/bg.jpg?v=u91dedfdb");background-size: initial; font-size: 1em;}
			#zhe{ width:100%; height:100%; position:absolute; z-index:1000; background:#000 url(/images/loading.gif) no-repeat center center;}
			#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; box-sizing:border-box; overflow:hidden;  position:relative; border-bottom: 1px solid rgba(255,255,255,.7);background: rgba(255,255,255,.4);text-align: center; }
			#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:url(/pic/fanhui.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
                        #headerBox span{font-size: 0.2em;position: relative;top: -0.27rem;}    
                    
/*		html{ height:100%;}
		body{ background:#492E01; width:100%; height:100%; margin:0; font-size:0.14rem;  }
		#iFrame{    transform: scale(2.2,2.2); 
					margin: -400px 0 0 -426px; 
					 zoom: 1.8; 
					}
		#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; background: #130d35; box-sizing:border-box; overflow:hidden;  position:relative;  }
		#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(../../img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
		#headerBox .logo{ display:block; position:absolute; left:calc(1.5rem - 0.54rem); top:calc(0.18rem - 0.16rem); height:0.3rem; }*/
		</style>
	</head>
	<body>
		<header id="headerBox">
			<a href="/wap.php"></a>
                        <span>欢迎注册使用</span>
		</header>
		<iframe id="iFrame" src="../app/member/Regster/index1_1.php" scrolling="true" style="height: 150%;" width="100%" frameborder="0" allowtransparency="false" style="overflow:hidden;"></iframe>
	</body>
	<script>
		$(window).load(function(){
			var cW = $(window).width();
			if( cW < 760 ){
				var aInp = $('<input type="button" name="phone" style="visibility:hidden;"  />');
				$("#iFrame").contents().find("#myFORM").append( aInp );
			}
		});
	</script>
</html>

