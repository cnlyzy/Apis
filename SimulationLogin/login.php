<?php
/**
 * get_cookie
 */
function get_cookie()
{
    $ch_cookie = curl_init('登录页面请求的url');
    curl_setopt($ch_cookie, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch_cookie, CURLOPT_POST, 1);
    curl_setopt($ch_cookie, CURLOPT_POSTFIELDS, ['username' => 'admin', 'password' => 'admin']);
    curl_setopt($ch_cookie, CURLOPT_HEADER, 1);
    $res = curl_exec($ch_cookie);
    preg_match('/^Set-Cookie: (.*?);/m', $res, $cookie);
    return $cookie[1];
}

/**
 * @param $url
 * @return mixed
 */
function curl_start($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
    curl_setopt($ch, CURLOPT_COOKIE, get_cookie());
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

/**
 * login
 */
print_r(curl_start('登录后访问的url'));
