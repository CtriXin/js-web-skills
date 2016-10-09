<?php
// $logFile = 'AppUser.log';
// Log::useDailyFiles(storage_path().'/logs/'.$logFile);
// include_once 'RongYun.php';
include_once 'lib/Ucpaas.php';
define('CHECK_CODE_COUNT', 4);//验证码长度
define('MSG_FAIL', 52);//过期的消息
define('MESSAGE_ALLOCATION_FINISH', 583);//reply表微信推送完成
define('MESSAGE_ALLOCATION_BEGIN', 50);//reply表微信开始处理
define('USERS_LOCK', 589);//reply表微信开始处理

define('REC_SCORE', 50);//app推荐获得积分
define('INVITE_LIMIT', 86400);//发送邀请缓存时间

define('UCS_APPID', '9a827597dd804894a9fe4c2ab1e6f096');//UCS的应用APPID，目前为测试应用！！
// include_once 'lib/CCPRestSmsSDK.php';

// require_once "lib/WechatDownloader.php";
header("Content-Type:text/html;charset=utf-8"); 
class Singleton extends BaseController{
	private $insertId;
	private static $_instance;

//创建__clone方法防止对象被复制克隆
	public function __clone(){
		trigger_error('Clone is not allow!',E_USER_ERROR);
	}
	private function __construct()
	{
		// $this->mem = new Memcache;
		// $this->mem->connect('localhost', 11211) or die ('Could not connect');
		Log::info('construct work');
	}

	private function __destruct()
	{
		Log::info('__destruct work');
	}

	/*单例模式*/
	public static function getInstance(){
		if (!self::$_instance instanceof self) {

			self::$_instance=new self();
			Log::info("new self...");
		}
		return self::$_instance;
	}

	public static function shout(){
		Log::info("shout");
		
		sleep(5);
		Log::info("shout2");
	}

	public function bake(){
		Log::info("bake");
		
		sleep(5);
		Log::info("bake2");
	}

/*调用的实例，表明调用非静态方法只实例化一次，静态方法不需要实例化
		public function testSingleton()
	{
		// Singleton::bake();
		Singleton::getInstance()->bake();
		Singleton::getInstance()->bake();
		Singleton::shout();




//用new实例化private标记构造函数的类会报错
//$danli = new Danli();
 
//正确方法,用双冒号::操作符访问静态方法获取实例
$danli = Danli::getInstance();
$danli->test();
 
//复制(克隆)对象将导致一个E_USER_ERROR
$danli_clone = clone $danli; 
}*/
}