<?php
include "./aes.php";
function getData($params,$signKey)//入网签名方式
{
  ksort($params);
  $aesen = new Aes();
  $data = $aesen->encrypt(json_encode($params),$signKey);
  return $data;
}

?>