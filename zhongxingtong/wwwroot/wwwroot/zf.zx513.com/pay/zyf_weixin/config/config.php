<?php
class Config{
    private $cfg = array(
        'url'=>'https://pay.swiftpass.cn/pay/gateway',	//支付请求url，无需更改
        'mchId'=>'8000000000035',		//测试商户号，商户正式上线时需更改为自己的
        'key'=>'3903e860882d0e57',   //测试密钥，商户需更改为自己的
        'version'=>'1.0'		//版本号
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>