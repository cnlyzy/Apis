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
    echo $response;
//    $result = json_decode($response, true)['body']['result'];
//    print_r($result);
}
