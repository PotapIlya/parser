<?php

$curl = curl_init();
$url = 'https://freelancehunt.com/projects?name=laravel&tags%5B%5D=php&tags%5B%5D=javascript&tags%5B%5D=html&tags%5B%5D=CSS%2FHTML&tags%5B%5D=Vue.js';

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 30);

$html = curl_exec($curl);

$url = '|data-published=.*?|sei';

preg_match_all($url, $html, $arr);

print_r($arr);