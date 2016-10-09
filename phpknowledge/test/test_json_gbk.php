<?php
$arrayName = array('aaa' =>'aaaaaaaa','bbbb'=>'我我我我' );
echo toJson($arrayName);
function toJson($content){
 //不支持单个文字
 if(is_string($content) ) {
 return urlencode($content);
 }
 elseif(is_array($content)){
 foreach ( $content as $key => $val ) {
 $content[$key] = toJson($val);
 }
 return urldecode(json_encode($content));
 }
 elseif(is_object($content)) {
 $vars = get_object_vars($content);
 foreach($vars as $key=>$val) {
 $content->$key = toJson($val);
 }
 return urldecode(json_encode($content));
 }
 else{
 return urldecode(json_encode($content));
 }
 }
?>