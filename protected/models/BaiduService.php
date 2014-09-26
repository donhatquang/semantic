<?php
/**
 * Created by PhpStorm.
 * User: donhatquang
 * Date: 7/23/14
 * Time: 16:57
 */
require('Baidu.php');

class BaiduService extends Baidu {

    //GET SUGGEST
    public function getSuggest($kwd) {

        $param = array(
            "wd"=>  $kwd,
            "json"=>  1,
            "p"=>  3,
            "sid"=>  1444,
            "bs"=> "javascript%20suggest"

        );

        // var_dump($param);

        $url = $this-> getSuggestHost()."?".http_build_query($param);

        $result = file_get_contents($url);

        $result = str_replace(array("window.baidu.sug(",")",";"),"",$result);

        //$data = json_decode($result,true);

        //var_dump($data);
        return $result;

    }


    //TRANSLATE ANNOTATION
    public function translate($tags) {

        $result = array();

        $tags = explode(",", $tags);

        //FILTER KEYWORD
        //$filter = $this->filter($tags);


        //$tags = array_merge($tags, $filter);

        $tags = implode("%0A", $tags);

        //var_dump($tags);

        //exit();

        $apikey = "2ALMz6WqUEcsBg4BS91Eppq3";
        $url = "http://openapi.baidu.com/public/2.0/bmt/translate?client_id=".$apikey."&from=auto&to=auto&q=".$tags;
        //echo $url;

        //GET TRANSLATE
        $data = file_get_contents($url);


        return $data;
    }

    //FILTER KEY
    public function filter($keyword) {

        $tmp = $keyword;
        $filter = array();

        //EACH KEY IN ARRAY FOR CHECK DUPLICATE
        foreach($keyword as $origin) {

            foreach($tmp as $checker) {

                if ($origin == $checker) continue;

                //CHECK IF HAVE DUPLICATE IN WORD
                //EX: WOODARM - WOOD
                if (strpos($checker, $origin) !== FALSE) {

                    $result = explode($origin, $checker);

                    $filter = array_merge($filter,$result);
                }
            }


        }
        //    var_dump($filter);

        return $filter;
    }
} 