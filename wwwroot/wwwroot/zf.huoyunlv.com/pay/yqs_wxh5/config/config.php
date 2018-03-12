<?php
class Config{
    private $cfg = array(
        'url'=>'https://opay.arsomon.com:28443/vipay/reqctl.do',
        'mchId'=>'10000098',//测试商户号，商户上线需改为自己正式的
        'key'=>'ba4a723caf2a6gb60bcc6fd8df24ge02',//测试密钥，商户上线需改为自己正式的
        'version'=>'2.0',
		'notify_url'=>'https://www.baidu.com/'//异步回调通知地址，商户上线需改为自己正式的
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>