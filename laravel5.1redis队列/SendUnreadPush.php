<?php
namespace App\Jobs;
use App\Jobs\Job;
// use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Illuminate\Support\Facades\Redis as Redis;
class SendUnreadPush extends Job implements SelfHandling, ShouldQueue
{
  // use InteractsWithQueue, SerializesModels;
  use InteractsWithQueue;
  private $redis;
  private $arr;

  public function __construct($arrInfo)
  {
    $this->arr = $arrInfo;
    // $this->redis = new Redis();
    $this->redis = Redis::connection('default');
    // $this->redis->connect('127.0.0.1',6379);

  }

  /**
   * Execute the job.
   *  ['type'=>'bxj','msgId'=>'123','fNick'=>'小明','fromUser'=>'123','toUser'=>'123']
   * @return void
   */
  public function handle()
  {
    Log::info('SendUnreadPush handle'.json_encode($this->arr));
    // Log::info('Redis::set('.$this->redis->SETEX($this->arr['type'].$this->arr['msgId'],60,1));
    Log::info('Redis::ttl('.$this->redis->TTL($this->arr['type'].$this->arr['msgId']));
    Log::info('Redis::get('.$this->arr['type'].$this->arr['msgId'].$this->redis->get($this->arr['type'].$this->arr['msgId']));
    
  }
}