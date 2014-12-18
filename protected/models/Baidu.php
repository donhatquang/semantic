<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Baidu
{

    private $host = "http://shitu.baidu.com/i";
    private $suggestHost = "http://suggestion.baidu.com";

    /**
     * @param string $suggestHost
     */
    public function setSuggestHost($suggestHost)
    {
        $this->suggestHost = $suggestHost;
    }

    /**
     * @return string
     */
    public function getSuggestHost()
    {
        return $this->suggestHost;
    }

    private $imgURL;

    public function __construct($imgURL)
    {

        $this->imgURL = $imgURL;
    }

    //INIT SEMANTIC
    public function getSemanticFromURL($url)
    {

        // echo file_get_contents("http://shitu.baidu.com/i?rn=10&ftn=indexstu&ct=1&tn=shituresult&objurl=".$imgURL);

        if (!($url)) {
            /** @var $url urlencode || string */
            $url = $this->imgURL;


            $param = array(
                "rn" => 10,
                "ftn" => "indexstu",
                "ct" => 1,
                "tn" => "shituresult",
                "objurl" => $url //urlencode
            );


            $url = $this->host . "?" . http_build_query($param);

        }

        $result = file_get_contents($url);

        return $result;
        //echo implode("&", $param);        
    }

    /*SEMANTIC FROM FILE*/
    public function getSemanticFromFile()
    {

        //图片路径
        $image = $this->getImgURL();

        //图片的二进制源码
        $img = file_get_contents($image);

        //$img = file_get_contents("./images/5385d016a1313.png");

        $param = array(

            "rt" => 0,
            "rn" => 50,
            "stt" => 0,
            "fr" => "html5",
            "ct" => 0,
            "client" => "pcbrowser",
            "tn" => "baiduimage",
            "id" => "WU_FILE_0",
            "name" => "semantic.jpg",
            "type" => "image%2Fpng",
            "size" => 0
        );

        $url = $this->getHost() . "?" . http_build_query($param);
        /*------*/

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $img);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return trim($output);
    }

    //INIT SEMANTIC
    public function getSimilarImage($querysign)
    {

        //对应请求的参数
        /* $querysign
        根据 Query 字符串来搜索相应的同类相似度图片
         * */
        $param = array(
            "ct" => 3,
            "tn" => "insimijson",
            "pn" => 0,
            "rn" => 20,
            "shituRetNum" => 100,
            "similarRetNum" => 600,
            "querysign" => $querysign
        );

        $url = $this->host . "?" . http_build_query($param);
        $result = file_get_contents($url);

        return $result;
        //echo implode("&", $param);        
    }

    //GET KEYWORK SEMANTIC
    public function getImageInfo($data)
    {

        //keyword:BD.STU.escapeXSS("
        list(, $data) = explode('BD.STU.tplConf=', $data);
        list($data) = explode('};', $data);

        $data = str_replace("BD.STU.escapeXSS", "", $data);

        //EXPLODE TO ARRAY
        return $data . "}";
    }


    //GET KEYWORK SEMANTIC
    /*    public function getKeyWork($data) {

            //keyword:BD.STU.escapeXSS("
            list(,$data) = explode('keyword:BD.STU.escapeXSS("', $data);
            list($data) = explode('")',  $data);



            //EXPLODE TO ARRAY
            return $data;
        }*/


    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getImgURL()
    {
        return $this->imgURL;
    }

    /**
     * @param mixed $imgURL
     */
    public function setImgURL($imgURL)
    {
        $this->imgURL = $imgURL;
    }

}