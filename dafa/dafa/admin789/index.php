<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
<link href="images/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
        </ul>
        <a class="brand"> <span class="second">管理后台 v<i style="font-style:normal;font-size:85%;">4.0</i></span> <small>Data center</small></a>
    </div>
</div>

<div id="content-wrap">
    <div class="content_head">
        管理员登录
    </div>
	  <form action="L.php" method="post">
      
    <p class="comh"><label>管理员帐号</label></p>
    <div class="conp"><input class="username" name="A" type="text" required /></div>

    <p class="comh"><label>管理员密码</label></p>
    <div class="conp"><input class="password" name="B" type="password" required /></div>

    <div class="btn">
      <img id='yzm' src="yzm.php" class="imgyzm fl" border="0" />
      <input name="C" type="text" class="fl text" size="4" maxlength="4" id="yzm_text" required />
      <input name="" type="submit" value="登录" class="login-btn fr" />
    </div>

  </form>
  <p class="copy">
    &copy; 2017 管理后台 V4.0</a>
  </p>
</div>

</body>
<script type="text/javascript">
    document.getElementById('yzm_text').onfocus = function(){
      document.getElementById('yzm').src = 'yzm.php?'+Math.random() ;
    };
    document.getElementById('yzm').onclick = function(){
      this.src = 'yzm.php?'+Math.random() ;
    };
</script>
</html>
