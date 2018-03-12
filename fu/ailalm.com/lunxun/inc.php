<?php
require_once 'config.php';
//读取轮询帐号
function get_zh($data) {


	$dizhi	=	$_SERVER['DOCUMENT_ROOT']."\lunxun\i.php";



	//检测文件是否存在
	if (is_file($dizhi)){

		$new_cat = unserialize(file_get_contents($dizhi));

	}

	if (isset($new_cat['i'])==false){

		$sj=array("i"=>1,"num"=>count($data));	//初始化记录
		$new = serialize($sj);
		file_put_contents($dizhi,$new);
		$new_cat = unserialize(file_get_contents($dizhi));

	}


	if ($new_cat["i"]>=count($data)){
		$j	=	1;
	}else{
		$j	=	$new_cat["i"]+1;
	}

	
	$sj=array("i"=>$j,"num"=>count($data));	//初始化记录
	$new = serialize($sj);
	file_put_contents($dizhi,$new);


	$jieguo	=	$data[$j-1];
	
	$hello = explode(",",$jieguo[0]); 

	return	$hello[0];
}


//帐号读取信息
function get_xx($acc,$data,$bdata) {
	
	$str	=	"";

	foreach ($data as $value) { 


		$hello = explode(",",$value[0]); 

		

		if ($hello[0]==$acc){
			
			$str	=	$hello;
		
		}

			
	
	}

	if ($str==""){
	
	foreach ($bdata as $value) { 


		$hello = explode(",",$value[0]); 

		

		if ($hello[0]==$acc){
			
			$str	=	$hello;
		
		}

			
	
	}	
	
	
	}

	return	$str;

}

?>