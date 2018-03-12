<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./reset.css" rel="stylesheet" type="text/css">
    <link href="./style.css" rel="stylesheet" type="text/css">
    <title>game</title>
</head>
<style>a{text-decoration: none;}</style>
<body>
<div class="hall_bg">
    <div class="hall_box">
        <div class="gameroom_box">
            <div class="gameroom_list_box">
                <ul>

                    <?php
                    if(!isset($_SESSION)){ session_start();}
                    include_once("dxUtils.php");
                    $gameID = isset($_GET['gameID']) && !empty($_GET['gameID']) ? $_GET['gameID'] : '';
                    $class = new daXiong();
                    $data=$class->getMerchantRoomIdMsgs($gameID);

                    switch($gameID){
                        case 'PTG0009':
                            $style = 'gameroom_brnn';
                        case 'PTG0011':
                            $style = 'gameroom_jcby';
                        case 'PTG0016':
                            $style = 'gameroom_zjh';
                        case 'PTG0001':
                            $style = 'gameroom_sgj';
                        case 'PTG0013':
                            $style = 'gameroom_ernn';
                        case 'PTG0014':
                            $style = 'gameroom_srnn';
                        case 'PTG0015':
                            $style = 'gameroom_lrnn';
                        case 'PTG0003':
                            $style = 'gameroom_bndr';
                        case 'PTG0004':
                            $style = 'gameroom_qpby';
                        case 'PTG0007':
                            $style = 'gameroom_fqzs';
                        case 'PTG0008':
                            $style = 'gameroom_hcpy';
                        case 'PTG0010':
                            $style = 'gameroom_shz';
                        case 'PTG0012':
                            $style = 'gameroom_dntg';
                        case 'PTG0017':
                            $style = 'gameroom_hlwz';
                        default :
                            $style = 'gameroom_hlwz';
                    }
                    if(!empty($data) && $data['resultCode'] == 1):
                        foreach($data['roomList'] as $item):
                            ?>
                            <li><a href="/dx/play.php?game=<?php echo $gameID;?>&amp;roomId=<?php echo $item['ROOM_ID']?>">
                                    <div>
                                        <h5><?php echo $item['ROOM_NAME']?></h5>
                                        <i class="<?php echo $style;?>"></i>
                                        <p><span class="gameroom_df">底分</span>：<label><?php echo $item['ROOM_LIMIT']?></label></p>
                                        <p><span>入场条件</span>：<label><?php echo $item['MIN_ENTER_LIMIT']?> / <?php echo $item['MAX_ENTER_LIMIT']?></label></p>
                                    </div>
                                </a>
                            </li>
                        <?php  endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>


</body></html>