<?php

$html = file_get_contents('https://tv.rbc.ru/?utm_source=topline');


$pos = stripos($html, '<div class="most-popular annunciation annunciation_popular">');
$html = substr($html, $pos);

$pos = stripos($html, '<div class="thematic-programs annunciation">');
$html = substr($html, 0, $pos);

$kod = str_replace('<div class="most-popular annunciation annunciation_popular">', '', $html);


echo $kod;
