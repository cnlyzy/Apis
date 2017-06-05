<?php

//init
$yesterday = date("Y-m-d", strtotime("1 days ago"));
$start = $yesterday;
$end = $yesterday;
$nonce = '012345678';
$appBase = '/xdnphb';
$urlBase = $appBase . '/';
$xyz_str = $urlBase . 'data/weixinuser/searchWeixinDataByCondition?AppKey=joker&filter=server|&hasDeal=false&keyName=杭州&order=NRI';
$xyz = md5($xyz_str . '&nonce=' . $nonce);
//print_r($xyz);

$postData = [
    'filter' => 'server|',
    'hasDeal' => 'false',
    'keyName' => '杭州',
    'order' => 'NRI',
    'nonce' => $nonce,
    'xyz' => $xyz
];


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://www.newrank.cn/xdnphb/data/weixinuser/searchWeixinDataByCondition",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($postData),
    CURLOPT_HTTPHEADER => array(
        'Host: www.newrank.cn',
        'Connection: keep-alive',
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Origin: http://www.newrank.cn',
        'X-Requested-With: XMLHttpRequest',
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'DNT: 1',
        'Referer: http://www.newrank.cn/public/info/hot.html?period=day',
        'Accept-Encoding: gzip, deflate',
        'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.6,en;q=0.4'
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
