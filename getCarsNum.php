<?php
$ssid = '107';
$stationname = '浙商财富中心站';

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://www.pand-auto.com/api/app?version=v1.2.5&client=android&service=get_station_canusenum",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"body\":{\"areaid\":0,\"citycode\":\"100000\",\"apptype\":\"android\",\"appversion\":\"1.2.5\"},\"header\":{\"service\":\"get_station_canusenum\"}}",
    CURLOPT_HTTPHEADER => array(
        // "cache-control: no-cache",
        // "connection: Keep-Alive",
        // "cookie: JSESSIONID=E10ADC3949BA59ABBE56E057F20F883E",
        // "host: www.pand-auto.com",
        'Content-Type: application/json',
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;die();
//    $result = json_decode($response, true)['body']['result'];
//    print_r($result);
}

////求数组长度
//$resultnum=count($result);
//echo $resultnum;
//if ($resultnum!=0){
//    //循环查找数组中的值,也可用foreach
//    for ($i=0;$i<=$resultnum-1;$i++){
//        //ssid站点ID由用户选择
//        if ($result[$i]['ssid']=='1'){
//            echo '该租车点有 '.$result[$i]['canusenum'].' 辆车';
//            break;
//        }else{
//            echo '该租车点还没有车,请耐心等待!';
//            break;
//        }
//    }
//}

//更加高效的方法
if (!empty($result)) {
    $tmp = array_reduce($result, function ($v, $w) {
        $v[$w['ssid']] = $w['canusenum'];
        return $v;
    });
    if (isset($tmp[$ssid])) {
        echo $stationname . ' 共有 ' . $tmp[$ssid] . ' 辆车,赶紧下单吧!';
        echo "<audio controls=\"controls\" autoplay=\"autoplay\">
                <source src=\"./song.mp3\" type=\"audio/mpeg\" />
                </audio>";
    } else {
        echo $stationname . ' 租车点还没有车,请耐心等待!';
    }

} else {
    echo '车辆信息获取失败，请联系管理员。';
    exit();
}
?>


