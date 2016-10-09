<?php
// 创建一对cURL资源
$connomains = array(
"my name is huangguixuan",
"my name is not huangguixuan",
"my family name is huangguixuan2222"
);
mult_post($connomains);
function mult_post($connomains){
	$mh = curl_multi_init();
	foreach ($connomains as $i => $url) {
		$urlwhole='http://fanyi.youdao.com/openapi.do?keyfrom=bj22222&key=136547222&type=data&doctype=json&version=1.1&q='.$url;
		$conn[$i]=curl_init($urlwhole);
		curl_setopt($conn[$i],CURLOPT_RETURNTRANSFER,1);
		curl_multi_add_handle ($mh,$conn[$i]);
	}
	do { $n=curl_multi_exec($mh,$active); } while ($active);
	foreach ($connomains as $i => $urlwhole) {
		$pattern = '#translation\":\[\"(.*)\"\]#';
		$res[$i]=getPatternResult($pattern,curl_multi_getcontent($conn[$i]));
		curl_close($conn[$i]);
	}
	// print_r($res);
	return $res;
}

//封装的单个匹配		
function getPatternResult($pattern,$str) {
	$re='';
	if(preg_match($pattern,$str,$re)){
		//使用的时候这里注释掉就行了
		echo $re[1];
		return $re[1];
	}
	else{
		//使用的时候这里注释掉就行了
		echo "error";
		return "error";
	}
}


?>