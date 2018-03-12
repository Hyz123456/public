<?php
    $orders=$_GET;
    $apikey='e9db316877bf8c7bf18c1e96faff815ad9eff685';

    $signstr='customerid='.$orders['customerid'].'&status='.$orders['status'].'&sdpayno='.$orders['sdpayno'].'&sdorderno='.$orders['sdorderno'].'&total_fee='.$orders['total_fee'].'&paytype='.$orders['paytype'].'&'.$apikey;

    $sign=md5($signstr);

    echo $signstr."\r\n".$sign.'='.$orders['sign'];
?>
