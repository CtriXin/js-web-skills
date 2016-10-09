<?php
// echo intval('2015-03-24 10:38:44');
$strtime='2015-03-24 10:38:44';
$array = explode("-",$strtime);
$year = $array[0];
$month = $array[1];

$array = explode(":",$array[2]);
$minute = $array[1];
$second = $array[2];

$array = explode(" ",$array[0]);
$day = $array[0];
$hour = $array[1];

$timestamp = mktime($hour,$minute,$second,$month,$day,$year);

echo "字符串时间：$strtime<br>";
echo "年：$year<br>";
echo "月：$month<br>";
echo "日：$day<br>";
echo "时：$hour<br>";
echo "分：$minute<br>";
echo "秒：$second<br>";
echo "转换为timestamp：" . $timestamp . "<br>";
echo "从timestamp转换回来：" . date("Y-m-d H:i:s",$timestamp) . "<br>";
?>