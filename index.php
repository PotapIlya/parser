<?php

require_once 'simple_html_dom/simple_html_dom.php';

$html = file_get_contents('https://freelancehunt.com/projects?name=laravel&tags%5B%5D=php&tags%5B%5D=javascript&tags%5B%5D=html&tags%5B%5D=CSS%2FHTML&tags%5B%5D=Vue.js');

$html = str_get_html($html);


$html = $html->find('.table.table-normal.project-list', 0);

foreach ($html->find('tr') as $item)
{
    echo $item;
}