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
    public $resArray = [];

    function __construct($url)
    {
        $this->url = $url;

        if (!is_null($this->url))
        {
            $this->parse();
        }
    }

    private function parse()
    {
        while ($this->status)
        {

            if ($this->checkUrl($this->url) === 200)
            {

                $this->index++;
                $this->url = 'https://freelancehunt.com/projects?tags[]=php&tags[]=javascript&tags[]=html&tags[]=CSS/HTML&tags[]=Vue.js&page='.$this->index;


//                $resArray[$this->index] = $this->serchHtml($this->url);
                $test = $this->serchHtml($this->url);

//                echo count($test).'<br>';

                $this->resArray[$this->index] = $test;
            }
            else
            {
                $this->status = false;
                $this->res();
            }

        }
    }
    private function res()
    {
//        echo $this->resArray[0][0];
    }

    private function serchHtml($url)
    {
        $html = file_get_html($url);
        $array = [];

        foreach ($html->find('.table.table-normal.project-list tbody tr') as $i=>$wrapper)
        {
            $array[$i]['url'] = $wrapper->find('a', 0);
            $array[$i]['price'] = $wrapper->find('.text-center.project-budget.hidden-xs', 0);
        }
        return $array;
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

$url = 'https://freelancehunt.com/projects?tags[]=php&tags[]=javascript&tags[]=html&tags[]=CSS/HTML&tags[]=Vue.js&page=1';

$class = new Parser($url);

$frontArray = $class->resArray;















