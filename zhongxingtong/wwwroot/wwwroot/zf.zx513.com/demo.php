<?php

	header("Access-Control-Allow-Origin: *");

	$url = 'http://www.superzhifu.com:8002/pay_server/tran_pay';
	
	$para['out_trade_no'] = time();
	$para['mer_id'] = '8001001';
	$para['goods_name'] = 'test';
	$para['total_fee'] = '100';
	$para['callback_url'] = 'http://zf.byaob.com/n.php';
	$para['notify_url'] = 'http://zf.byaob.com/n.php';
	$para['attach'] =  '7t';
	$para['nonce_str'] = mt_rand(time(),time()+rand());
	$para['pay_type'] = '001';
	$key = "4tbnf69aj0mlsz6dqg18tzwmpfzzm3ow";
	
	
	
	
	$sign_str = 'mer_id='.$para['mer_id'].'&nonce_str='.$para['nonce_str'].'&out_trade_no='.$para['out_trade_no'].'&total_fee='.$para['total_fee'].'&key='.$key;
	
	//echo $sign_str;
	
	$para['sign'] = md5($sign_str);	
	
	
	$str = "";
	foreach($para as $key=>$val){
	$str .= $key.'='.$val.'&';
	}
	$newstr = substr($str,0,strlen($str)-1); 
	
	$pay_url = $url.'?'.$newstr;
	
	
	$temp_data = file_get_contents($pay_url);
	$result = json_decode($temp_data,true);


	
	
	
	//echo $temp_data;
	
	header('Location: '.$result['code_url']);
	
	
?>