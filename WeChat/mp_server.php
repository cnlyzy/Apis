<?php
$token = '123456789';                   //令牌
$random = '0.01234569697623085';        //随机数
$keyword = '杭州';                       //搜索关键词
$query = urlencode($keyword);           //转换编码
$begin = '0';                           //从第几个开始 5的倍数
$cookie = "cookie";                     //填写完整的cookie信息
mpServer($token, $random, $query, $begin, $cookie);

/**
 * 按照关键字搜索公众号
 * @param $token
 * @param $random
 * @param $query
 * @param $begin
 */
function mpServer($token, $random, $query, $begin, $cookie)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://mp.weixin.qq.com/cgi-bin/searchbiz?action=search_biz&token={$token}&lang=zh_CN&f=json&ajax=1&random={$random}&query={$query}&begin={$begin}&count=10",
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
