<?php


$url='http://test.snewfly.com/wechat?signature=331a7515f3d784d9cf9482ed973ab71e1905e704&timestamp=1420954541&nonce=924120599';
$data='<xml><ToUserName><![CDATA[gh_173534cfbb51]]></ToUserName>
<FromUserName><![CDATA[oDAkQs9MlKWlk-d7jp4mqD0uaUuc]]></FromUserName>
<CreateTime>1422024521</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz/5XjU3aticharTicg58iadKKJIwBTBhDl09SD0947icUU21cFQhSGiajiaY1MQs6ajWwdwYhtWzODCzianoj8XS8BmnicIg/0]]></PicUrl>
<MsgId>6107548812009943426</MsgId>
<MediaId><![CDATA[CuRHNWVYrxW4chW0AlCOEjx3Ruy7XeNqj1fv4tH_AE67KIgtbpFv5ShF-LY4Mi5m]]></MediaId></xml>';
$url2='http://test.snewfly.com/wechat?signature=331a7515f3d784d9cf9482ed973ab71e1905e704&timestamp=1420954541&nonce=924120599';
$data2='<xml><ToUserName><![CDATA[gh_173534cfbb51]]></ToUserName>
<FromUserName><![CDATA[oDAkQs9MlKWlk-d7jp4mqD0uaUuc]]></FromUserName>
<CreateTime>1422024530</CreateTime>
<MsgType><![CDATA[voice]]></MsgType>
<MediaId><![CDATA[A5SzWi_2Y7Czaghsvo3tzNkeBoVmIlOLaZLalPBAcnudLG1d1rh4dZxUadMRNiYj]]></MediaId>
<Format><![CDATA[amr]]></Format>
<MsgId>6107548850459770880</MsgId>
<Recognition><![CDATA[哎]]></Recognition></xml>';
$fd = fopen('file.log', 'w+');
for ($i=0; $i < 1; $i++) {
	$data1 = http_request($url, $data);
	fwrite($fd, $data1);
	echo $i."\n";
	echo http_request($url2, $data2);
	echo $i."\n";
}
function http_request($url, $data = null)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$url.$data);  
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
?>