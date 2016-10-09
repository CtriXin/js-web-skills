<?php
// set_time_z
// date_default_timezone_set("Asia/Shanghai"); 
echo $timestamp = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
echo "\n";

echo date('Y-m-d H:i:s',time());
?>