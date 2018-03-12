<?php

namespace WY\app\controller\member;

use WY\app\libs\Controller;
if (!defined('WY_ROOT')) {
    exit;
}
class rates extends CheckUser
{
    public function index()
    {


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
		$data = array('title' => '我的费率', 'userprice' => $userprice,'shuzu' => $shuzu,'user' => $user);
		
        $this->put('rates.php', $data);
    }
    public function edit()
    {
        $id = $this->req->post('id');
        if ($id) {
            if ($data = $this->model()->select('is_state')->from('userprice')->where(array('fields' => 'userid=? and id=?', 'values' => array($_SESSION['login_userid'], $id)))->fetchRow()) {
                $st = $data['is_state'] ? 0 : 1;
                if ($st == '1') {
                    $this->model()->from('userprice')->updateSet(array('is_state' => $st))->where(array('fields' => 'userid=? and id=?', 'values' => array($_SESSION['login_userid'], $id)))->update();
                    echo json_encode(array('status' => 1, 'st' => $st));
                    exit;
                }
            }
        }
        echo json_encode(array('status' => 0));
    }
}