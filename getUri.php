<?php 
$str=$_SERVER["REQUEST_URI"];

echo '$_SERVER["REQUEST_URI"]'.$str;

$arr = pathinfo($str);
/*
结果如下
Array
(
     [dirname] => http://localhost //url的路径
     [basename] => index.php  //完整文件名
     [extension] => php  //文件名后缀
     [filename] => index //文件名
)
*/
echo 'basename'.$arr['basename'];

var_dump($arr);
 ?>