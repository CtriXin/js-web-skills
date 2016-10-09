<?php 
$str = "adasd     dsfd1ff               fdgfgdfgdf";
$pattern='#(.*)     (.*)               (.*)#';
// getPatternResult($pattern,$str);
$new_arr=preg_split("/[\S]+/",$str);
	print_r($new_arr);
function getPatternResult($pattern,$str) {
	$re='';
	if(preg_match($pattern,$str,$re)){
		echo print_r($re[1]);
		return print_r($re[1]);
	}
	else{
		//使用的时候这里注释掉就行了
		echo "error";
		return "error";
	}}
?>