<?php
$str="这样一来我的字符串就不会有乱码^_^";
// $encode = mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK","BIG5")); 
// echo $encode;
echo "\n";
$str=mb_convert_encoding($str,'GB2312','UTF-8');
echo mb_substr($str, 0, 7, 'utf-8');
?>