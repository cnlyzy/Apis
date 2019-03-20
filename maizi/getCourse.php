<?php
include_once("./Curl.class.php");
$curl = new Curl();

$baseurl = 'http://www.maiziedu.com/course/751/';

$data = [];

$url = [$baseurl];
$callback = array('backfun');
$curl->add($url, $callback);

$curl->go();
function backfun($r)
{
    global $curl;
    preg_match_all('/<li><a href="(.*)" target="_blank" class="font14 color66">/', $r['content'], $a);
    foreach ($a[1] as $key => $value) {
        $url = ['http://www.maiziedu.com' . $value];
        $callback = array('backfun2', [$key]);
        $curl->add($url, $callback);
    }
}

function backfun2($r, $i)
{
    global $data;
    preg_match('/<title>(.*)<\/title>/', $r['content'], $a);
    $title = $a[1];
    preg_match('/\$lessonUrl = "(.*)"/', $r['content'], $a);
    $url = $a[1];
    $data[$i] = [$title, $url];
    var_dump($data);
}