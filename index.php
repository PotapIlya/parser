<?php

function requests($url, $postdata = null, $cookieFile = '/file.txt')
{
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');

    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);


    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//    curl_setopt($ch, CURLOPT_PROXY, '104.45.188.43:3128');
//    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLOPT_PROXY_HTTP);

    curl_setopt($ch, CURLOPT_TIMEOUT, 9);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);


    if ($postdata)
    {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    }

    $html = curl_exec($ch);
    curl_close($ch);
    return $html;

}

//file_put_contents('/file.txt', '');


$url = 'https://slivcours.ru/pages/auth.php';

$post = [
    'login' => 'ivan',
    'password' => 'ivanivanivan',
    'do_login' => ''
];




$html = requests($url, $post);
$array = [];

$dom = new DOMDocument();
$res = @$dom->loadHTML($html);

if ($res)
{
	$title = $dom->getElementsByTagName('h5');
	$text = $dom->getElementsByTagName('p');



	foreach ($title as $i=>$item)
	{
		$array[$i]['title'] = $item->nodeValue;
		$array[$i]['text'] = $text[$i]->nodeValue;
	}

}

var_dump($array);

























