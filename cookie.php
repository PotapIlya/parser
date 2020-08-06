<?php


$cook = false;


if(isset($_COOKIE['curl_session_cookie']))
{
    $cook = true;
    echo 'Session';
}

if(isset($_COOKIE['curl_normal_cookie']))
{
    $cook = true;
    echo 'Cookie';
}



setcookie('curl_session_cookie', 1);
setcookie('curl_normal_cookie', 1);

if ($cook)
{
    echo 'I know you';
}
else
{
    echo 'I dont know you';
}

