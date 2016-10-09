<?php

$b='{
 "resp"        : {
    "respCode"    : "000000",
    "failure"     : 1,
    "templateSMS" : {
        "createDate"  : 20140623185016,
        "smsId"       : "f96f79240e372587e9284cd580d8f953"
        }
    }
}' ;
$c=json_decode($b,true);
var_dump($c);
var_dump($c['resp']['templateSMS']['createDate']);
?>