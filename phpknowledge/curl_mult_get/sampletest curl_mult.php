<?php
// 创建一对cURL资源
$connomains = array(
"http://test.snewfly.com/upload/wechat/img/14-12-29/1419837467.jpeg",
"http://test.snewfly.com/upload/wechat/img/14-12-29/1419834469.jpeg",
"http://test.snewfly.com/upload/wechat/img/14-12-27/1419673878.jpeg",
"http://test.snewfly.com/upload/img/14-12-27/1419665062.jpeg",
"http://test.snewfly.com/upload/img/14-12-27/1419651420.jpeg"
);
// ,
// "http://test.snewfly.com/upload/img/14-12-27/1419646683.jpeg",
// "http://test.snewfly.com/upload/img/14-12-27/1419646194.jpeg"
echo time();
$res=mult_post($connomains);
echo time();



function mult_post($connomains){
	$mh = curl_multi_init();
	foreach ($connomains as $i => $url) {
		$postData = "------WebKitFormBoundaryy9zMscQCwUGxoejM\r\n";
		$postData .= "Content-Disposition: form-data; name=\"urllink\"\r\n\r\n";
		$postData .= $url."\r\n";
		$postData .= "------WebKitFormBoundaryy9zMscQCwUGxoejM\r\n";
		$postData .= "Content-Disposition: form-data; name=\"url-2txt\"\r\n\r\n\r\n\r\n";
		$postData .= "------WebKitFormBoundaryy9zMscQCwUGxoejM--\r\n";
		$post_url="http://deeplearning.cs.toronto.edu//api/url.php";
		$header = array("Host: deeplearning.cs.toronto.edu",
		"Content-Length: ".strlen($postData),
		'X-Requested-With: XMLHttpRequest',
		'Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryy9zMscQCwUGxoejM',
		'Accept-Language: zh-CN,zh;q=0.8',
		'X-Requested-With: XMLHttpRequest',
		'X-Requested-With: XMLHttpRequest',
		);
		$conn[$i]=curl_init('http://deeplearning.cs.toronto.edu//api/url.php');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($conn[$i], CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt ($conn[$i], CURLOPT_HEADER, 0);
		curl_setopt($conn[$i], CURLOPT_POST, 1);
		curl_setopt($conn[$i], CURLOPT_POSTFIELDS, $postData);
		curl_setopt ($conn[$i], CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($conn[$i],CURLOPT_HTTPHEADER,$header);
		curl_multi_add_handle ($mh,$conn[$i]);
	}
	do { $n=curl_multi_exec($mh,$active); } while ($active);
	foreach ($connomains as $i => $urlwhole) {
		$pattern = '#Sentence:</h4><ul><li>(.*)</li></ul><br/><h4>#';
		$res[$i]=getPatternResult($pattern,curl_multi_getcontent($conn[$i]));
		curl_close($conn[$i]);
	}
	$res=mult_translate($res);
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
function mult_translate($connomains){
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
	return $res;
}

?>