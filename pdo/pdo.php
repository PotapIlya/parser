<?php
//
$localhost = 'server135.hosting.reg.ru';
$name = 'u0679512_potap';
$pass = '6N0c8W9s';
$db_name = 'u0679512_test1';
try{
    $mysql = new PDO('mysql:dbname='.$db_name.'; host='.$localhost.'', $name, $pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e){
    exit($e->getMessage());
}

//
////$sth = $mysql->prepare("INSERT INTO listitem SET text = :text");
////$sth->execute([
////    'text' => $text
////]);