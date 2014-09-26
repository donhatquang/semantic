<?php
    //var_dump($result);
    //echo urldecode(json_encode($result));
header("content-Type: text/json; charset=gbk"); 

echo $result;
//echo iconv('gb2312','utf-8',$result);