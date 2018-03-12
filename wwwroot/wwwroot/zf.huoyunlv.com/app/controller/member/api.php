<?php
namespace WY\app\controller\member;

use WY\app\libs\Controller;
if (!defined('WY_ROOT')) {
    exit;
}
class api extends CheckUser
{
    public function index()
    {
       // $userprice = $this->model()->select('a.uprice,a.is_state,b.name')->from('userprice a')->left('acc b')->on('a.channelid=b.id')->join()->where(array('fields' => 'userid=?', 'values' => array($_SESSION['login_userid'])))->fetchAll();
      //  $data = array('title' => '接入信息', 'userprice' => $userprice);






		$user = $this->model()->select()->from('users')->where(array('fields' => 'id=?', 'values' => array($_SESSION['login_userid'])))->fetchRow();


        $userprice = $this->model()->select('a.id,a.userid,a.uprice,a.aclid,a.is_state,a.channelid,b.name,b.acpcode')->from('userprice a')->left('acc b')->on('a.channelid=b.id')->join()->where(array('fields' => 'userid=?', 'values' => array($_SESSION['login_userid'])))->fetchAll();
        
	
		
		//获取通道商列表
		foreach($userprice as $key=>$val){
		
		
		
			$shuzu[$key]['id']=$val['id'];
			

			$channelid	=	$val['channelid'];
			

				//获取通道 acwid
				$td = $this->model()->select()->from('acc')->where(array('fields' => 'id=?', 'values' => array($channelid)))->fetchRow();


				//echo "通道类型".$td['acwid']."\n";


				$acwid = $this->model()->select()->from('acl')->where(array('fields' => 'acwid=?', 'values' => array($td['acwid'])))->fetchAll();



				foreach($acwid as $aa=>$bb){
			
					$name = $this->model()->select()->from('acp')->where(array('fields' => 'code=?', 'values' => array($bb['acpcode'])))->fetchRow();

					$acwid[$aa]['name']			=$name['name'];
					$acwid[$aa]['channelid']	=$channelid;
					

				}


				$acw = $this->model()->select()->from('acw')->where(array('fields' => 'id=?', 'values' => array($td['acwid'])))->fetchRow();


				$shuzu[$key]['acwid']	=	$acwid;
				$shuzu[$key]['acw']		=	$acw['code'];


		
		}







		$data = array('title' => 'API', 'userprice' => $userprice,'shuzu' => $shuzu,'user' => $user);








        $this->put('apiinfo.php', $data);
    }
    public function show()
    {
        $this->put('apikey.php');
    }
	 public function syt()
    {
        $this->put('syt.php');
    }
}