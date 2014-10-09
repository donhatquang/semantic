<?php

$img = file_get_contents("./video/dolphin-oceans-clip.jpg");
//$img = file_get_contents("./images/5385d016a1313.png");

$param = array(

    "rt"=>0,
    "rn"=>50,
    "stt"=>0,
    "fr"=>"html5",
    "ct"=>0,
    "client"=>"pcbrowser",
    "tn"=>"baiduimage",
    "id"=>"WU_FILE_0",
    "name"=>"dolphin-oceans-clip.jpg",
    "type"=>"image%2Fpng",
//"lastModifiedDate"=>Mon+Jul+21+2014+17%3A28%3A43+GMT%2B0800+(CST),
    "size"=>0
);
$target_url = 'http://shitu.baidu.com/i';
//This needs to be the full path to the file you want to send.

$url = $target_url."?".http_build_query($param);
//$url = $target_url;
/*------*/

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POSTFIELDS, $img);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);
echo $url2 = trim($output);
echo file_get_contents($url2);
?>