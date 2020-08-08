<?php
//    require_once 'parser.php';
require_once './files/simple_html_dom.php';

$url = 'https://freelancehunt.com/projects?tags[]=php&tags[]=javascript&tags[]=html&tags[]=CSS/HTML&tags[]=Vue.js&page=1';
$html = file_get_html($url);
$array = [];

foreach ($html->find('table.table.table-normal.project-list tbody tr') as $i=>$wrapper)
{

    $href = $wrapper->find('a', 0)->href;

    $array[$i]['href'] = $href;

    $array[$i]['title'] = $wrapper->find('a', 0)->plaintext;
    $array[$i]['price'] = $wrapper->find('.text-center.project-budget.hidden-xs', 0);
    $array[$i]['category'] = $wrapper->find('td.left small', 0);
    $array[$i]['text'] = file_get_html($href)->find('#project-description', 0);

//    var_dump($wrapper->find('a', 0)->plaintext);

}


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./files/bootstrap.min.css">
</head>
<body>

    <main>
        <section class="container">
            <div class="wrapper d-flex flex-column">



                <?
                    foreach ($array as $item)
                    {   ?>
                        <div class="d-flex justify-content-center flex-column align-items-center border border-dark px-3 py-2">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                              <div class="d-flex flex-column col-8">
                                  <h5><?=$item['title']?></h5>
                                  <span>
                                   <?=$item['category']?>
                               </span>

                              </div>

                              <? if(!is_null($item['price'])) { ?>
                                  <div class="d-flex flex-column">
                                      <a href="<?=$item['href']?>" class="btn btn-primary">Перейти на сайт</a>
                                      <span class="btn btn-success text-white"><?=$item['price']?></span>
                                  </div>
                              <? } ?>
                            </div>

                          <div class="w-100">
                              <h3 class="text-center">
                                  описание
                              </h3>
                              <style>
                                  .description p br{
                                      display: none;
                                  }
                              </style>
                              <div class="h5 description">
                                  <?=$item['text']?>
                              </div>
                          </div>

                        </div>

                    <? }
                    ?>


<!--                --><?//
//                foreach ($frontArray as $front)
//                {
//                    foreach ($front as $item)
//                    {   ?>
<!--                        <div class="d-flex justify-content-between align-items-center">-->
<!--                            <h5>--><?//=$item['url']?><!--</h5>-->
<!---->
<!--                            --><?// if(!is_null($item['price'])) { ?>
<!--                                <span class="btn btn-success text-white">--><?//=$item['price']?><!--</span>-->
<!--                            --><?// } ?>
<!--                        </div>-->
<!--                    --><?// }
//                }
//                ?>
            </div>
        </section>
    </main>

</body>
</html>




