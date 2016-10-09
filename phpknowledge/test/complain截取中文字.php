<?php
$str="投诉10000";
// $encode = mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK","BIG5")); 
// echo $encode;
echo "\n";
$str=mb_convert_encoding($str,'GB2312','UTF-8');
echo mb_substr($str, 0, 2, 'utf-8');

可以直接用substr截取，不过中文字符为三个字节，cmd下会乱码，不影响
?>