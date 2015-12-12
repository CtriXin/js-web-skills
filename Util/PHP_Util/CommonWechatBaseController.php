<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Log;
use DB;
use Memcache;
$logFile ='wechat.log';
set_time_limit(0);
Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/**
* CommonWechatBaseController 基于laravel5.1的log和db类的（可移除） 通用微信接口调用基类
* @author hgxbajian 2015-12-12 还有另一个静态类Class Wechat
* 如果只有一个公众号管理，直接配置DEFAULT_APP_ID等就行了。多个公众号可以传如APP_ID等
*/
class CommonWechatBaseController extends Controller{

	const DEFAULT_APP_ID='wx2683432074892f86';
	const DEFAULT_APP_KEY='9147009bbad321887c93b17cc1989c7e';
	const DEFAULT_MEM_KEY_JSAPI='zhjy_jsApiTicket';
	const DEFAULT_MEM_KEY_ACCESS_TOKEN='zhjy_access_token';
	const DEFAULT_MEM_EXPIRE_TIME=6000;//men过时时间

	//回复信息
	public function transmitText($fromUsername,$toUsername,$content){
		$textTpl = '<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[text]]></MsgType>
		<Content><![CDATA[%s]]></Content>
		<FuncFlag>0</FuncFlag>
	</xml>';
	$result = sprintf($textTpl, $fromUsername, $toUsername, $_SERVER['REQUEST_TIME'], $content);
	Log::info('result---'.$result);
	return $result;
}

//随机数
private function createNonceStr($length = 16) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$str = '';
	for ($i = 0; $i < $length; $i++) {
		$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	return $str;
}

/**
* getAccessToken
* @param $appid 
* @param $appsecret 
* @param $mem_key 缓存键名
* @return json
*/
public function getAccessToken($appid=self::DEFAULT_APP_ID ,$appsecret=self::DEFAULT_APP_KEY,$mem_key=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$mem = new Memcache;
	$mem->connect('localhost', 11211) or die ("Could not connect");
	$access_token = $mem->get($mem_key);
	Log::info('mem access_token----'.$access_token);
	if (empty($access_token)){
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
		$res = $this->http_request($url);
		$result = json_decode($res, true);
		$access_token = $result['access_token'];
		$mem->set($mem_key, $access_token, 0, self::DEFAULT_MEM_EXPIRE_TIME);
		Log::info('set mem access_token----'.$access_token);
	}
	$mem->close();
	return $access_token;
}


/**
* 发送模板消息
* @param $data json格式模板
* @return json
*/
private function sendTemplate($data,$appid=self::DEFAULT_APP_ID,$app_key=self::DEFAULT_APP_KEY){
	$access_token =$this->getAccessToken($appid,$app_key);
	$url='https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
	$res= $this->http_request($url,$data);
	Log::info('sendTemplate res----'.$res);
	return $res;
}

	/**
	*发送模板消息 入口
	*@param touser openid 其他参数参照微信模板协议
	*@return null
	*/
	public function sendTemplateMsg($touser,$template_id,$first,$keyword1,$keyword2,$keyword3,$remark,$url){
		$data=$this->createAttendanceTemplate($touser,$template_id,$first,$keyword1,$keyword2,$keyword3,$remark,$url);
		return $this->sendTemplate($data);
	}
	
	/**
	*返回协议模式的到校模板消息
	* 到校id 1BElgC9t0A1EWTgSJRsgVpyLUyZe2FzAqHxNglZeaPk，离校id bL65vNFAn0SGZT7MuZBANW12Cg3khu3gnXSSAakE-D4
	*@param touser 欲发送给目标openid
	*@param first 标题
	*@param keyword1 学生姓名
	*@param keyword2 到校类型 按时，迟到
	*@param keyword3 到校时间
	*@param remark 最低行 如点击查看历史记录
	*@param url 可空，用户点击消息显示的url
	*@return json
	*/
	private function createAttendanceTemplate($touser,$template_id,$first,$keyword1,$keyword2,$keyword3,$remark,$url=''){
		$data=['touser'=>$touser,'template_id'=>$template_id,'url'=>$url,'topcolor'=>'#FF0000',
		'data'=>['first'=>['value'=>$first,'color'=>'#173177'],
		'keyword1'=>['value'=>$keyword1,'color'=>'#173177'],
		'keyword2'=>['value'=>$keyword2,'color'=>'#173177'],
		'keyword3'=>['value'=>$keyword3,'color'=>'#173177'],
		'remark'=>['value'=>$remark,'color'=>'#173177']]];
		return urldecode(json_encode($data));
	}



	/**
	*jsapiTicket 用于getSignPackage加密然后返回给web端jsSDK鉴权
	*@param appid 
	*@param appsecret
	*@param mem_key_js 
	*@param mem_key_access_token 
	*@return json
	*/
public function getJsApiTicket($appid=self::DEFAULT_APP_ID ,$appsecret=self::DEFAULT_APP_KEY,$mem_key_js=self::DEFAULT_MEM_KEY_JSAPI,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN) {
	$mem = new Memcache;
	$mem->connect('localhost', 11211) or die ('Could not connect');
	$hzsf_jsApiTicket = $mem->get($mem_key_js);
	Log::info('mem jsApiTicket----'.$hzsf_jsApiTicket);
	if (empty($hzsf_jsApiTicket)){
		$accessToken=$this->getAccessToken($appid,$appsecret,$mem_key_access_token);
		$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token='.$accessToken;
		$res = $this->http_request($url);
		$result = json_decode($res, true);
		if (array_key_exists('ticket', $result)) {
			$hzsf_jsApiTicket = $result['ticket'];
		}
		$mem->set($mem_key_js, $hzsf_jsApiTicket, 0, self::DEFAULT_MEM_EXPIRE_TIME);
		Log::info('set mem jsApiTicket----'.$hzsf_jsApiTicket);
	}
	$mem->close();
	return $hzsf_jsApiTicket;
}

  	/**
	*wx js sdk return array 用于getSignPackage加密然后返回给web端jsSDK鉴权
	*@param appid 
	*@param appsecret
	*@param mem_key_js 
	*@param mem_key_access_token 
	*@return array
	*/
public function getSignPackage($appid=self::DEFAULT_APP_ID ,$appsecret=self::DEFAULT_APP_KEY,$mem_key_js=self::DEFAULT_MEM_KEY_JSAPI,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN) {
	$jsapiTicket = $this->getJsApiTicket($appid,$appsecret,$mem_key_js,$mem_key_access_token);

    // 注意 URL 一定要动态获取，不能 hardcode.
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$timestamp = $_SERVER['REQUEST_TIME'];
	$nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
	$string = 'jsapi_ticket='.$jsapiTicket.'&noncestr='.$nonceStr.'&timestamp='.$timestamp.'&url='.$url;

	$signature = sha1($string);

	$signPackage = array(
		'appId'     => $appid,
		'nonceStr'  => $nonceStr,
		'timestamp' => $timestamp,
		'url'       => $url,
		'signature' => $signature,
		'rawString' => $string
		);
	return $signPackage; 
}

	//HTTP请求（支持HTTP/HTTPS，支持GET/POST）
protected function http_request($url, $data = null)
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
	//主动发送消息
public function sentMsg($fromUsername,$content,$appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$access_token =$this->getAccessToken($appId,$appKey,$mem_key_access_token);
	$url='https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
	$postData='{"touser":"'.$fromUsername.'","msgtype":"text","text":{"content":"'.$content.'"}}';
	Log::info('postData--'.$postData.' access_token--'.$access_token);
	$result=$this->http_request($url,$postData);
	Log::info('result--'.$result);
	return $result;
}
	//主动发送语音消息
public function sendMediaMsg($fromUsername,$media_id,$type,$appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$access_token = $this->getAccessToken($appId,$appKey,$mem_key_access_token);
	$url='https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
	$postData='{"touser":"'.$fromUsername.'","msgtype":"'.$type.'","'.$type.'":{"media_id":"'.$media_id.'"}}';
	Log::info('postData----'.$postData.'access_token----'.$access_token);
	$result=$this->http_request($url,$postData);
	Log::info('result----'.$result);
	return $result;
}


/**
*获得用户昵称
* @param openid
* @return nickname
*/
public function getUserNickname($openid,$appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$access_token=$this->getAccessToken($appId,$appKey,$mem_key_access_token);
	$url='https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
	$jsonArr=json_decode($this->http_request($url),true);
	$nickname='';
	if (array_key_exists('nickname',$jsonArr)) {
		$nickname=$jsonArr['nickname'];
	}
	return $nickname;
}

/**
*获得用户所有信息
* @param openid
* @return json
*/
public function getUserInfo($openid,$appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$access_token=$this->getAccessToken($appId,$appKey,$mem_key_access_token);
	$url='https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
	return $this->http_request($url);
}

public function updateLoginTime($users_id)
{
	$ts=date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
	DB::update('update users set last_login='."'$ts'".' where id='.$users_id);
}

/**
* 获得推广二维码的ticket 用户phone作为scene_id
* @param users_id 用户id
* @param phone 用户手机号，作为scene_id还有一中是scene_str 自己看着版
* @return ticket
*/
public function getTicket($phone,$appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$ticket='';
	$reArr=DB::select('select ticket from ticket where phone='.$phone);
	if ($reArr) {//如果数据库存在，直接从数据库取出
		return $reArr[0]->ticket;
	}
	//否则获取并存入数据库
	$access_token=$this->getAccessToken($appId,$appKey,$mem_key_access_token);
	$url='https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token;
	$data='{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "'.$phone.'"}}}';

	$jsonArr=json_decode($this->http_request($url,$data),true);

	if (array_key_exists('ticket',$jsonArr)) {
		$ticket=$jsonArr['ticket'];
	}
	if ($ticket) {
		try {
			DB::insert("INSERT INTO `ticket` (`phone` ,`ticket`)VALUES ('$phone',  '$ticket')");
		} catch (Exception $e) {
			Log::info("error INSERT INTO `ticket` (`phone` ,`ticket`)VALUES ('$phone',  '$ticket')");
		}
	}
	
	return $ticket;
}


/**
* 更新微信小店订单到数据库 此api还可以抽取出业务无关的来
* 一次批量插入数据库
*/
public function updateOrder($appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY,$mem_key_access_token=self::DEFAULT_MEM_KEY_ACCESS_TOKEN){
	$access_token=$this->getAccessToken($appId,$appKey,$mem_key_access_token);
	$url='https://api.weixin.qq.com/merchant/order/getbyfilter?access_token='.$access_token;
	$data='';
	$re=DB::select('SELECT * FROM  `order` ORDER BY  `order`.`id` DESC LIMIT 0 , 1');
	if ($re) {
		$create_time=strtotime($re[0]->create_time);//转时间戳
		$data='{"begintime": '.$create_time.', "endtime": '.$_SERVER['REQUEST_TIME'].'}';
	}else{
		$data='{}';//首次初始化
	}
	$arr=json_decode($this->http_request($url,$data));
	$count=count($arr->order_list);
	if ($count==0) {
		return;
	}
	//插入数据库、一次插完
	$sql='INSERT INTO  `in_lamp`.`order` (`order_id` ,`status` ,`total_price` ,`order_create_time` ,`express_price` ,
			`buyer_openid` ,`buyer_nick` ,`product_id` ,`product_name` ,`product_count` ,`trans_id` ,`product_price`) VALUES ';
	
	for ($i=0; $i <$count ; $i++) { 
		$obj=$arr->order_list[$i];
		$sql.=" (
			'{$obj->order_id}',  '$obj->order_status',  '$obj->order_total_price'
			, '$obj->order_create_time' ,  '$obj->order_express_price',  '$obj->buyer_openid'
			,  '$obj->buyer_nick',  '$obj->product_id',  '$obj->product_name'
			,  '$obj->product_count',  '$obj->trans_id',  '$obj->product_price'),";
	}

	$sql=substr($sql,0,strlen($sql)-1);
	try {
		DB::insert($sql);
	} catch (Exception $e) {
		Log::info("error DB::insert($sql);");
	}

}


/**
* auth 认证回调的code
* @param $code 
* @return json 
*/
public function code2openid($code,$appId=self::DEFAULT_APP_ID,$appKey=self::DEFAULT_APP_KEY)
{
	$url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appId.'&secret='.$appKey.'&code='.$code.'&grant_type=authorization_code';
    return $this->http_request($url);//code->access_token
}


}
?>