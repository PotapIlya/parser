<?php
    require_once 'parser.php';
require_once './files/simple_html_dom.php';
require_once './pdo/pdo.php';

//$url = 'https://freelancehunt.com/projects?tags[]=php&tags[]=javascript&tags[]=html&tags[]=CSS/HTML&tags[]=Vue.js&page=1';
//$html = file_get_html($url);
//$array = [];
//
//
//$title = $html->find('table.table.table-normal.project-list tbody tr a', 0)->innertext;
//
//$sth = $mysql->prepare("SELECT * FROM `parser` WHERE title = :title");
//$sth->execute([
//        'title' => $title
//]);
//$result = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
//
//if (!count($result))
//{
//    // da
//    $sth = $mysql->prepare("INSERT INTO parser SET title = :title");
//    $sth->execute([
//        'title' => $title,
//    ]);
//}
//else
//{
//    echo 'net';
//}



?>
<!--<!doctype html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--    <link rel="stylesheet" href="./files/bootstrap.min.css">-->
<!--</head>-->
<!--<body>-->
<!---->
<!--    <main>-->
<!--        <section class="container">-->
<!--            <div class="wrapper d-flex flex-column">-->
<!---->
<!---->
<!---->
<!--                --><?//
//                    foreach ($array as $item)
//                    {   ?>
<!--                        <div class="d-flex justify-content-center flex-column align-items-center border border-dark px-3 py-2">-->
<!--                            <div class="d-flex w-100 justify-content-between align-items-center">-->
<!--                              <div class="d-flex flex-column col-8">-->
<!--                                  <h5>--><?//=$item['title']?><!--</h5>-->
<!--                                  <span>-->
<!--                                   --><?//=$item['category']?>
<!--                               </span>-->
<!---->
<!--                              </div>-->
<!---->
<!--                              --><?// if(!is_null($item['price'])) { ?>
<!--                                  <div class="d-flex flex-column">-->
<!--                                      <a href="--><?//=$item['href']?><!--" class="btn btn-primary">Перейти на сайт</a>-->
<!--                                      <span class="btn btn-success text-white">--><?//=$item['price']?><!--</span>-->
<!--                                  </div>-->
<!--                              --><?// } ?>
<!--                            </div>-->
<!---->
<!--                          <div class="w-100">-->
<!--                              <h3 class="text-center">-->
<!--                                  описание-->
<!--                              </h3>-->
<!--                              <style>-->
<!--                                  .description p br{-->
<!--                                      display: none;-->
<!--                                  }-->
<!--                              </style>-->
<!--                              <div class="h5 description">-->
<!--                                  --><?//=$item['text']?>
<!--                              </div>-->
<!--                          </div>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    --><?// }
//                    ?>
<!--            </div>-->
<!--        </section>-->
<!--    </main>-->
<!---->
<!--</body>-->
<!--</html>-->
<!---->



