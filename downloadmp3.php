<?php

// http://bxj242.snewfly.com/upload/wechat/card/voice/16-04-26/0.07610300146164359034.amr
function http_request($url, $data = null)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	if (!empty($data)){
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
	return $output;
}

//10.169.117.7
// $url='http://bxj242.snewfly.com/upload/wechat/card/voice/16-04-26/0.07610300146164359034.amr';
$url='http://10.169.117.7:9090/upload/wechat/card/voice/16-04-26/0.07610300146164359034.amr';

// $package=get($url);echo $package;
$package=http_request($url);
if ($package) {
	$handle=fopen('save.amr', 'w');
	fwrite($handle, $package);
	fclose($handle);
}else{
	echo 'fail';
}
