<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("修改网站信息");

if($_GET["action"] == "save"){
	$upload_path =$C_Patch."/order/ewm/"; //上传文件的存放路径
	
	if(!file_exists($upload_path))
		mkdir($upload_path);
    if($_POST["id"]){
		$file = $_FILES['file'];//得到传输的数据
		//得到文件名称
		$name = $file['name'];
		$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
		$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
		//判断文件类型是否被允许上传
		if(!in_array($type, $allow_type)){
		  //如果不被允许，则直接停止程序运行
			echo "<script>alert('上传二维码失败，二维码图片的格式不对！！！');history.go(-1);</script>";
			exit;
		}
		//判断是否是通过HTTP POST上传的
		if(!is_uploaded_file(realpath($file['tmp_name']))){
		  //如果不是通过HTTP POST上传的
			echo "<script>alert('上传二维码失败1！！！');history.go(-1);</script>";
			exit;
		}
		//开始移动文件到相应的文件夹
		if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
			$sql = "update sys_wx_zfb set bank_name='".$_POST["bank_name"]."' , bank_number='".$_POST["bank_number"]."' ,
				bank_pic='/order/ewm/".$file['name']."',update_time='".date("Y-m-d H:i:s")."' where id=".$_POST["id"]."";
			$mysqli->query($sql) or die($sql);
			admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，修改了微信、支付宝信息",$_SESSION["ssid"],"",$bj_time_now);
			message('修改微信、支付宝信息成功!',"setwx_zfb.php");
		}
		else{
			echo "<script>alert('上传二维码失败2！！！');history.go(-1);</script>";
			exit;
		}
    }else{
		$file = $_FILES['file'];//得到传输的数据
		//echo "<pre>";print_r($_FILES);die;
		//得到文件名称
		$name = $file['name'];
		$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
		$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
		//判断文件类型是否被允许上传
		if(!in_array($type, $allow_type)){
		  //如果不被允许，则直接停止程序运行
			echo "<script>alert('上传二维码失败，二维码图片的格式不对！！！');history.go(-1);</script>";
			exit;
		}
		//判断是否是通过HTTP POST上传的
		if(!is_uploaded_file(realpath($file['tmp_name']))){
		  //如果不是通过HTTP POST上传的
			echo "<script>alert('上传二维码失败3！！！');history.go(-1);</script>";
			exit;
		}
		//开始移动文件到相应的文件夹
		//echo $file['tmp_name'].'-'.$upload_path.$file['name'];
		//exit;
	//echo	$file;die;
		if(copy($file['tmp_name'],$upload_path.$file['name'])){
			$sql = "insert into sys_wx_zfb(bank_name,bank_number,bank_pic,update_time)
				values('".$_POST["bank_name"]."','".$_POST["bank_number"]."','/order/ewm/".$file['name']."','".date("Y-m-d H:i:s")."')";
			$mysqli->query($sql) or die($sql);
			admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，新增了微信、支付宝信息",$_SESSION["ssid"],"",$bj_time_now);
			message('新增微信、支付宝信息成功!',"setwx_zfb.php");
		}
		else{
			//echo $upload_path."--".strtolower($file['tmp_name']);die;
			echo "<script>alert('上传二维码失败4！！！');history.go(-1);</script>";
			exit;
		}
    }
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>微信、支付宝详细信息展示</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}

td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
/*.t-title{background:url(/super/images/06.gif);height:24px;}*/
.t-title{height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>

<script language="javascript" src="../js/user_show.js"></script>
<script>
    function check_info(){
        if(!document.getElementById("bank_name").value){
            alert("请选择支付类型");
            return false;
        }
        if(!document.getElementById("bank_number").value){
            alert("请输入支付账号");
            return false;
        }
        return true;
    }
</script>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">系统管理：编辑微信、支付宝信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
if($_GET["id"]){
    $sql	=	"select * from sys_wx_zfb where id=".intval($_GET["id"])." limit 0,1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
}else{
    $rows["bank_name"] = "";
    $rows["bank_number"] = "";
    $rows["bank_pic"] = "";
}

?>
<form action="?action=save" method="post" name="form1" id="form1" onsubmit="return check_info()" enctype="multipart/form-data">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;"  >
  <tr>
    <td bgcolor="#F0FFFF">支付类型：</td>
    <td><select name="bank_name" id="bank_name">
		<option value="支付宝" <?=$rows['bank_name']=='支付宝'?'selected':''?>>支付宝</option>
		<option value="微信" <?=$rows['bank_name']=='微信'?'selected':''?>>微信</option>
	</select></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">支付账号</td>
    <td><input name="bank_number" id="bank_number" value="<?=$rows["bank_number"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">二微码</td>
    <td><?=$rows["bank_pic"]?"<img src='".$rows["bank_pic"]."' style='width:250px;height:250px;'>":'暂无，请上传'?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">上传二维码</td>
    <td><input name="file" type="file"></td>
  </tr>
  <tr>
  	<td colspan="2" align="center">
        <input name="id" type="hidden" value="<?=$_GET["id"]?>">
        <input type="submit" value="确认提交"> 　
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)">
    </td>
  </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>