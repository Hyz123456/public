<?php
/**
 * @author A.
 * @Date 2017-07-01 19:10:35
 * @TencentQQ 1251359457
 * */

header('Content-type:text/json');
$code = $_GET['code'];

$baseUrl = "http://api.api68.com";
$uri = "";
switch ($code) {
    case 10010:
        $uri = "/klsf/getLotteryInfo.do?issue=&lotCode=10009";
        break;

    case 10011:
        $uri = "/CQShiCai/getBaseCQShiCai.do?lotCode=10002";
        break;

    case 10014:
        $uri = "/LuckTwenty/getBaseLuckTewnty.do?issue=&lotCode=10014";
        break;

    case 10022:
        $uri = "/CQShiCai/getBaseCQShiCai.do?issue=&lotCode=10004";
        break;

    case 10021:
        $uri = "/CQShiCai/getBaseCQShiCaiList.do?lotCode=10003";

    case 10020:
        $uri = "/klsf/getKlsfLongDragonCount.do?lotCode=10034";
		       
    case 10016:
        $uri = "/pks/getPksDoubleCount.do?date=&lotCode=10001";

    case 10041:
        $uri = "/CQShiCai/getShiCaiDailyDragonCount.do?lotCode=10003";
        break;

    case 1006:
        $uri = "/lotteryJSFastThree/getBaseJSFastThree.do?issue=&lotCode=10007";
        break;

    case 1008:
        $uri = "/klsf/getLotteryInfo.do?issue=&lotCode=10005";
        break;

	case 1009:
        $uri = "/gxklsf/getKlsfLongDragonCount.do?lotCode=10038";
        break;
		
    case 2002:
        $uri = "/QuanGuoCai/getLotteryInfo1.do?issue=&lotCode=10041";
        break;

    case 2007:
        $uri = "/QuanGuoCai/getLotteryInfo1.do?issue=&lotCode=10043";
        break;

    case 10028:
        $uri = "/lotteryJSFastThree/getBaseJSFastThree.do?issue=&lotCode=10026";
        break;

    case 10076:
        $uri = "/lotteryJSFastThree/getBaseJSFastThree.do?issue=&lotCode=10031";
        break;

    case 10090:
        $uri = "/CQShiCai/getBaseCQShiCai.do?issue=&lotCode=10010";
        break;

    case 10091:
        $uri = "/klsf/getKlsfDoubleCount.do?lotCode=10011";
        break;

    case 10092:
        $uri = "/pks/getPksDoubleCount.do?date=&lotCode=10012";
        break;

    case 10093:
        $uri = "/LuckTwenty/getBaseLuckTewnty.do?issue=&lotCode=10013";
        break;
		
    default:
        return;
        break;
}
$url = $baseUrl . $uri;

$res = file_get_contents($url);
$json = json_decode($res);
if ($json->errorCode == 0 && $json->result->businessCode == 0) {
    $data = $json->result->data;
    $numbers = $data->preDrawIssue;
    $out = array(
        "c_t" => $data->drawIssue,
        "c_d" => date("Y-m-d H:i:s"),
        "l_t" => $data->preDrawIssue,
        "l_r" => $data->preDrawCode,
        "l_d" => $data->preDrawTime,
    );
    $out = json_encode($out);
    echo $out;
}
