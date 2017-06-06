<?php
$token = '123456789';               //令牌
$random = '0.01234569697623085';    //随机数
$begin = '0';                       //从第几个开始 5的倍数
$biz = 'MjM5MjAxNDM4MA==';          //指定公众号
$count=5;                           //每页展示数量,默认5最多50
$fakeid = urlencode($biz);          //转换编码
$cookie = "cookie";                 //填写完整的cookie信息

mpServer($token, $random, $fakeid,$count, $begin, $cookie);

/**
 * 指定公众号的历史文章
 * @param $token
 * @param $random
 * @param $fakeid
 * @param $begin
 */
function mpServer($token, $random, $fakeid, $count,$begin, $cookie)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://mp.weixin.qq.com/cgi-bin/appmsg?token={$token}&lang=zh_CN&f=json&ajax=1&random={$random}&action=list_ex&begin={$begin}&count={$count}&query=&fakeid={$fakeid}&type=9",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "cookie:{$cookie}",
            "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36",
            "x-requested-with: XMLHttpRequest"
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
}
