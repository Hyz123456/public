<?
require_once 'inc.php';

use WY\app\model\Handleorder;


require('Utils.class.php');
require('config/config.php');
require('class/RequestHandler.class.php');
require('class/ClientResponseHandler.class.php');
require('class/PayHttpClient.class.php');

		$xml	=	file_get_contents('php://input');



		$resHandler = new ClientResponseHandler();

		$reqHandler = new RequestHandler();
        $pay = new PayHttpClient();
        $cfg = new Config();

        $reqHandler->setGateUrl($cfg->C('url'));
        $reqHandler->setKey($cfg->C('key'));


		$resHandler->setContent($xml);


		$resHandler->setKey($cfg->C('key'));

		if($resHandler->isTenpaySign()){

		
			
            if($resHandler->getParameter('status') == 100){


					$ordermoney	=	$resHandler->getParameter('amount');
					$sdcustomno=	$resHandler->getParameter('order_no');


					$handle=@new Handleorder($sdcustomno,$ordermoney);
					$handle->updateUncard();
               
                echo 'success';
				
                exit();
            }else{
                echo 'failure1';
                exit();
            }
        }else{
            echo 'failure2';
        }
?>