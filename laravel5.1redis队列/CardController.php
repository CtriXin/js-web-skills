<?php
namespace App\Http\Controllers;

use App\Http\Controllers\WechatBaseController;
use Log;
use Input;
use DB;
use Memcache;
use View;
require_once('lib/Tool.php');
require_once('lib/MyWechat.php');
require_once('lib/RongYun.php');
// require_once('lib/Card.php');
use MyWechat;
// use Card;
use Tool;
use RongYun;

use App\Jobs\SendUnreadPush;
use Illuminate\Support\Facades\Redis as Redis;

// define('KEY_HZSB_USERID', 'KEY_HZSB_USERID');

set_time_limit(0);

/**
 * Class CardController 学生卡消息推送接收入口
 * @package App\Http\Controllers
 * anthor hgx
 */
class CardController extends WechatBaseController{

    /**
     * @var Memcache
     */
    private $openid,$mem,$uid;
    // private static $appId='wx05336cfd4ec2ec5f';
    // private static $secret='6b7ac5a8f0637626230cde84cbd2e483';

    private static $EXTRA_REC_AUDIO_V1='0101001';

    public function __construct(){
    	if(!isset($_SESSION)){  
    		session_start();   //开启session
      }
      $this->mem = new Memcache;
      $this->mem->connect('localhost', 11211) or die ('Could not connect');
    }


    /**
    * 学生卡那边推送消息接口
    * @return json
    */
    public function card_msgcenter(){
      // if ($this->signatureCheck()) {

        $data=file_get_contents('php://input');
        Log::info($data);


        $msgType=Input::get('msgType');
        switch ($msgType) {
          case 'voice':
          $this->recAudio();
          break;
          
          default:
          break;
        }

        return Tool::getJson('1');
      // }
      // return Tool::getJson('0','无权限');
    }

    private function recAudio()
    {
      $user_id=Input::get('toUser');
      $fromUserNick=Input::get('fromUserNick');
      $fromUser=Input::get('fromUser');
      $msg_id=Input::get('msgId');
      $url=Input::get('url');

      $toUserTokenId=$this->getRongTokenIdByUserId($user_id);
      if ($toUserTokenId) {
        $content=$this->createAudioContent($fromUser,$fromUserNick,$msg_id,$url);
        // $RE=RongYun::messagePublish($fromUserNick,array($toUserTokenId),'RC:TxtMsg',$content);
        // Log::info("RongYun::messagePublish($fromUserNick,array($toUserTokenId),'RC:TxtMsg',$content); ".$RE);

        $arr=['type'=>'xsk','msgId'=>$msg_id,'fNick'=>$fromUserNick,'fromUser'=>$fromUser,'toUser'=>$user_id];
        $redis=Redis::connection('default');
        // Redis:set($arr['type'].$arr['msgId'],1);
        $redis->SETEX($arr['type'].$arr['msgId'],120,1);
        // Log::info('Redis:set'.$arr['type'].$arr['msgId']);
        // Log::info('Redis:get'.Redis::get($arr['type'].$arr['msgId']));
        $job=(new SendUnreadPush($arr))->delay(60);
         $this->dispatch($job);
      }

    }

    function createAudioContent($fromUser,$fromUserNick,$msg_id,$url){
      $content=json_encode(['user_id'=>$fromUser,'nick'=>$fromUserNick,'msg_id'=>$msg_id,'url'=>$url]);
      $extra=self::$EXTRA_REC_AUDIO_V1;
      return RongYun::createMsg($content,$extra);
    }

    //TODO 缓存用户tokenid
    function getRongTokenIdByUserId($user_id){
      $re=DB::select("select card_token_id from users where user_id='$user_id'");
      if ($re) {
        return $re[0]->card_token_id;
      }
      return '';
    }



  }
  ?>