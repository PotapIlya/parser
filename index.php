<?php

$curl = curl_init('http://tester.loc/cookie.php');

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, true);

curl_setopt($curl, CURLOPT_COOKIEJAR, '/file.txt');


$html = curl_exec($curl);

curl_close($curl);


echo $html;