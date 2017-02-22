<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/5
 * Time: 9:53
 */

$wxurl='http://data.wxb.com/rank/article?category=-1&page=1&pageSize=20&type=2&order=';
getRank($wxurl);
function getRank($wxurl){
    $ch =curl_init();
    curl_setopt($ch,CURLOPT_URL,$wxurl);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_REFERER,'http://data.wxb.com/rankArticle?cate=-1');
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
    curl_setopt($ch,CURLOPT_COOKIE,"PHPSESSID=2o5nbb2ld553l524etj7a5ufi3; visit-wxb-id=68875beb490ca51852b2c4e5c3ff5959; 6aHW_e4af_lip=183.156.108.177%2C1486211687; 6aHW_e4af_ulastactivity=e7aeWRo5mygdAov0gQ1mFJtVXn0B%2FWNA%2BvVYJqjnnTtOJcj8mYZp; 6aHW_e4af_nofavfid=1; 6aHW_e4af_visitedfid=2D40; 6aHW_e4af_st_t=550450%7C1486212068%7C55a29ad13cb9e5de76936b91647db6ba; 6aHW_e4af_forum_lastvisit=D_40_1486211726D_2_1486212068; 6aHW_e4af_st_p=550450%7C1486212078%7Ccd9018cbf5cf93fb6d69d42eb10c986f; 6aHW_e4af_viewid=tid_749; 6aHW_e4af_smile=1D1; 6aHW_e4af_seccode=426.65b3032c95b37ff0c8; 6aHW_e4af_saltkey=fxD77xxK; 6aHW_e4af_lastvisit=1486377790; 6aHW_e4af_sid=vJ9RLr; 6aHW_e4af_lastact=1486381390%09uc.php%09; 6aHW_e4af_auth=35bbZvoZohnmilQLL5RCSVXEq7hTxmrxT503KDq%2FlzMUzOGtg1TNLrVF5eJYXlx%2BRDvKVbWA%2Ff6ihN9KjGb2BBFwGT4; RMU=550450; RMT=6d13362009e9f05bc44544088253aa0c;");
    $content = curl_exec($ch);
    curl_close($ch);
    echo $content;