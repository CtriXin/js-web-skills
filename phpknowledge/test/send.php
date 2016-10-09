<?php

echo sendMediaMsg('ouHUtt-U9QKebyp67XGB7ZiCROz0','egLBuTCNMUEodx6S51lUVZNce9TVvQnE3p5756bmG6F_oH4XatvivdZuac7jE0qE','image');

//主动发送语音消息
	function sendMediaMsg($fromUsername,$media_id,$type){
		$access_token ='OqRc1B_r2iNAVtKLDT7FzUzN-fAN9q3chs1so3bAhUllLakfdGV9U--OpkV_B2cr3ZmJaPJjTI6kZvHvbfO79WenoxhMXl1gOJJ8UAovaQw';
		$url="https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;
		$postData='{
	"touser":"'.$fromUsername.'",
	"msgtype":"'.$type.'",
	"'.$type.'":{"media_id":"'.$media_id.'"   }
}';
		
		$result=http_request($url,$postData);
		return $result;
	}


	//HTTP请求（支持HTTP/HTTPS，支持GET/POST）
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
?>