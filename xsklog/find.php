<?php

$file='xsk.log xsk.log-2016-08-23 xsk.log-2016-08-22 xsk.log-2016-08-21 xsk.log-2016-08-20 xsk.log-2016-08-19 xsk.log-2016-08-18 xsk.log-2016-08-17';
$word='160615000000024 : receive U15#';
passthru('cat '.$file.'|grep "'.$word.'"');