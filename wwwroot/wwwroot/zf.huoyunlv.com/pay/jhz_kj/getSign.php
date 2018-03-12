<?php
function getSign($params,$signKey)//签名方式
{
  ksort($params);
  $data = "";
  foreach ($params as $key => $value) {
    $data .= $value;
  }
  $sign = sha1($data.$signKey);
  return $sign;
}
?>