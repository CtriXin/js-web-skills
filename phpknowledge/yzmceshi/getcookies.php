<?php
include ('Valite.php');

set_time_limit(0);
$cookie_file = microtime().'tmp.cookie';
$verifyCode_file = microtime().'verifyCode.jpg';
savecookie($cookie_file,$verifyCode_file);
// saveCheckcode($cookie_file,$verifyCode_file);
echo '</br>';
echo '<img src="'.$verifyCode_file.'">'; 

$valite = new Valite();
$valite->setImage($verifyCode_file);
$valite->getHec();
$ert = $valite->run();
echo '</br>';
echo '验证码识别结果：</br>';
print_r($ert);
echo '</br>';
// foreach ($valite->getResult() as $key => $value) {
// 	$line='';
// 	foreach ($value as $key2 => $value2) {
// 		$line.=$value2;
// 	}
// 	echo $line.'</br>';
// }
$postData="getAjax=true&type=211948D59141A611&name=%E5%A7%9C%E5%AE%81&cid=371082199206047139121&cardType=1&checkCode=$ert&x=67&y=18";
echo $postData;
echo '</br>';
getAuthResult($postData,$cookie_file);
// unlink($verifyCode_file);
// unlink($cookie_file);
function savecookie($cookie_file,$verifyCode_file){

	$login_url = 'http://rkk.cdpf.org.cn/rand.jsp?tSessionId='.time();
	// $login_url = "http://rkk.cdpf.org.cn/matrix.action";
	echo "正在获取COOKIE...\n";
	$curl = curl_init();
	$timeout = 10;
	curl_setopt($curl, CURLOPT_URL, $login_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($curl,CURLOPT_COOKIEJAR,$cookie_file); //获取COOKIE并存储
	$img = curl_exec($curl);
	curl_close($curl);
	$fp = fopen($verifyCode_file,'w');
	fwrite($fp,$img);

	fclose($fp);
	echo "COOKIE,验证码获取完成.. \n";
}


function getAuthResult($postData,$cookie_file){
	$url='http://rkk.cdpf.org.cn/queryDistrictrecordCDPF.action';
	$header = array("Host: rkk.cdpf.org.cn",
		'Cache-Control: max-age=0',
		'Connection: keep-alive',
		"Content-Length: ".strlen($postData),
		'Origin: http://rkk.cdpf.org.cn',
		'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.122 Safari/537.36',
		'Content-Type: application/x-www-form-urlencoded',
		'Referer: http://rkk.cdpf.org.cn/content2.html',
		'Accept-Encoding: gzip,deflate',
		'Accept-Language: zh-CN,zh;q=0.8',
		);
	$ch = curl_init();
	$res= curl_setopt ($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
	$result = curl_exec ($ch);
	//需要转码
	echo '<br>';
	echo mb_detect_encoding($result,array('ASCII','UTF-8','GB2312','GBK','BIG5'));
	$result=mb_convert_encoding($result,'UTF-8','EUC-CN');
	echo $result;
	$pos = strpos($result, '号码一致');
	if ($pos) {
		echo '号码一致';
	}else{
		echo '不一致';
	}
	curl_close($ch);
}


function saveCheckcode($cookie_file,$verifyCode_file){
	//取出验证码

	$verify_code_url = 'http://rkk.cdpf.org.cn/rand.jsp?tSessionId='.time();
	// $header='Referer: http://rkk.cdpf.org.cn/content2.html';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $verify_code_url);
	curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_file);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
	$img = curl_exec($curl);
	curl_close($curl);

	$fp = fopen($verifyCode_file,'w');
	fwrite($fp,$img);
	fclose($fp);
	echo "验证码取出完成 \n";
}


?>