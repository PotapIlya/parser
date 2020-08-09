<?php
//
//function requests($url, $postdata = null, $cookieFile = '/file.txt')
//{
//    $ch = curl_init($url);
//
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
//
//    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
//    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
//
//
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
////    curl_setopt($ch, CURLOPT_PROXY, '104.45.188.43:3128');
////    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLOPT_PROXY_HTTP);
//
//    curl_setopt($ch, CURLOPT_TIMEOUT, 9);
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);
//
//
//    if ($postdata)
//    {
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
//    }
//
//    $html = curl_exec($ch);
//    curl_close($ch);
//    return $html;
//
//}


require_once './files/simple_html_dom.php';

class Parser
{
    private $url = null;
    private $status = true;
    private $index = 0;

    private $number = 0;

    function __construct($url)
    {
        $this->url = $url;

        if (!is_null($this->url))
        {
            $pdo = $this->pdo();
            $this->pages($pdo);
            echo file_get_html('https://kwork.ru/');
        }
    }
    private function pages($pdo)
    {
//        while ($this->status)
//        {
////            echo $this->checkUrl($this->url).'<br>';
//            if ($this->checkUrl($this->url) === 200)
//            {
//                $this->index++;
//                echo  $this->index++;
//                $this->url = 'https://freelancehunt.com/projects?tags[]=php&tags[]=javascript&tags[]=html&tags[]=CSS/HTML&tags[]=Vue.js&page='.$this->index;
//
////                echo $this->url.'<br>'
////                $this->serchHtml($this->url, $pdo);
//            }
//            else
//            {
//                $this->status = false;
//            }
//        }
    }

    private function serchHtml($url, $pdo)
    {
        $html = file_get_html($url);

//        echo $html;

//        foreach ($html->find('.table.table-normal.project-list tbody tr') as $i=>$wrapper)
//        {
//            $title = $wrapper->find('a', 0)->innertext;
//
//
//
//            $sth = $pdo->prepare("SELECT * FROM `parser` WHERE title = :title");
//            $sth->execute(['title' => $title,]);
//            $result = $sth->fetchAll();
//
////            var_dump($result);
//
////            echo '----------------------------------------------------------------------';
//
//            if (!count($result))
//            {
//                $href = $wrapper->find('a', 0)->href;
//
//                $sth = $pdo->prepare("INSERT INTO parser SET title = :title, href = :href, price=:price, category=:category, text=:text");
//                $sth->execute([
//                    'title' => $title,
//                    'href' => $href,
//                    'price' => $wrapper->find('.text-center.project-budget.hidden-xs', 0),
//                    'category' => $wrapper->find('td.left small', 0),
//                    'text' => file_get_html($href)->find('#project-description', 0),
//                ]);
//
//
//                echo $this->number++.'da'.'<br>';
//            }
//            else
//            {
//                echo $this->number++.'net'.'<br>';
//            }
//
//        }
    }
    private function pdo()
    {
        $localhost = 'server135.hosting.reg.ru';
        $name = 'u0679512_potap';
        $pass = '6N0c8W9s';
        $db_name = 'u0679512_test1';
        return new PDO('mysql:dbname='.$db_name.'; host='.$localhost.'', $name, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    private function checkUrl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);

        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $http;
    }
}

$url = 'https://freelancehunt.com/projects?tags[]=php&tags[]=javascript&tags[]=html&tags[]=CSS/HTML&tags[]=Vue.js&page=0';

$class = new Parser($url);

