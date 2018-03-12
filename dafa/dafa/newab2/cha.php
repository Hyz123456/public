<?php
if(!isset($_SESSION)){ session_start();}
include_once("../app/member/class/auto_transfer.php");
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
echo  auto_transfer::getALLBetBalance($username);