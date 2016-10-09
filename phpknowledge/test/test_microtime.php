<?php
$str =str_replace(' ','',microtime());
echo substr($str,3,strlen($str));
// echo str_replace(' ','',microtime());
// echo(microtime());
?>