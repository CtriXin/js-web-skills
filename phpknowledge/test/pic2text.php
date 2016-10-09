<?php
function getresult($url) {
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
	$str=curl_post($header,$postData,$post_url);
	$pattern = '#Sentence:</h4><ul><li>(.*)</li></ul><br/><h4>#';
	$sentence=getPatternResult($pattern,$str);
	if($sentence=="error"){
	return "error";
	}
	else{
	return translate($sentence);
	}
}

function translate($string) {
	$url="http://fanyi.youdao.com/openapi.do?keyfrom=bj22222&key=136547222&type=data&doctype=json&version=1.1&q=";
	$str=http_request($url.$string);
	echo $url.$string;
    // $str=mb_convert_encoding($str,'GB2312','UTF-8');
	$pattern = '#translation\":\[\"(.*)\"\]#';
	return getPatternResult($pattern,$str);
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

//CURL get
function http_request($url)
{	
  $ch = curl_init($url) ;  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
$result =curl_exec($ch);
curl_close($ch);
return $result;  
}

//CURL post
function curl_post($header,$data,$url)
{
 $ch = curl_init();
 $res= curl_setopt ($ch, CURLOPT_URL,$url);
 //var_dump($res);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt ($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
 $result = curl_exec ($ch);
 curl_close($ch);
 if ($result == NULL) {
  return 0;
 }
// echo $result;
 return $result;
}
?>