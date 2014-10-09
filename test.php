<?php
    $img = file_get_contents("./video/oceans-clip.png");

$param = array(

    "rt"=>0,
    "rn"=>20,
    "stt"=>0,
    "fr"=>"html5",
    "ct"=>0,
    "client"=>"pcbrowser",
    "tn"=>"baiduimage",
    "id"=>"WU_FILE_0",
    "name"=>"oceans-clip.png",
    "type"=>"image%2Fpng",
//"lastModifiedDate"=>Mon+Jul+21+2014+17%3A28%3A43+GMT%2B0800+(CST),
    "size"=>310163
);
$target_url = '	http://shitu.baidu.com';
//This needs to be the full path to the file you want to send.

echo $url = $target_url."?".http_build_query($param);
//echo $img;
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);

curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $img);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

echo $result;
