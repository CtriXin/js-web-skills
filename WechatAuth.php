<?php

namespace App\Http\Middleware;

use Closure;

    /**
     * WechatAuth
     * weixin auth授权 session id（openid）校验用户是否登录状态
     * 15-12-23 by hgx bajian
     */
class WechatAuth
{

    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();  
        }  
    }

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (array_key_exists('id',$_SESSION)){
            return $next($request);//登录状态
        }else{
/*            //默认学生卡auth
            $url='http://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2683432074892f86&redirect_uri=http://bxj.snewfly.com/auth_card&response_type=code&scope=snsapi_base&state=SUISHI#wechat_redirect';
            $str=$_SERVER['REQUEST_URI'];
            $arr = pathinfo($str);
            switch ($arr['basename']) {
                case 'hzsb_login_zhihui'://伴学机auth
                    $url='http://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2683432074892f86&redirect_uri=http://bxj.snewfly.com/auth_bxj&response_type=code&scope=snsapi_base&state=SUISHI#wechat_redirect';
                    break;
                default:
                    break;
            }
            return $this->toLogin($url);*/
        }
    }

    private function toLogin($url){
        return '<!DOCTYPE html><html><head> <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"><title></title></head><body>登录超时，跳转登录中...</body><script type="text/javascript">document.location="'.$url.'";</script></html>';
    }

    private function toLoginJson(){
        return '{"code":"101","msg":"登录超时"}';
    }

}