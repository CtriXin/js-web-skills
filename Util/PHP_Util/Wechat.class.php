<?php
/**
 * @version 1.0
 * @date 2015-05-21
 * @author hgx
 * Class Wechat 微信开发常用方法总结封装。调用方式：Wechat::transmitText(,,);
 * 大部分功能还没测试。。
 */

    /**
    * 目录：
    * 返回标准微信响应的文本消息格式 transmitText
    * 微信AccessToken获取 getAccessToken 有缓存设置
    * 微信主动发送文本消息 sentTextMsg
    * 微信上传文件返回media_id uploadMedia
    * 微信主动发送语音、图片消息（要先上传媒体获得id）sendMediaMsg
    * 通过media_id保存微信图片或语音 downloadWeixinFile
    * HTTP请求（支持HTTP/HTTPS，支持GET/POST）http_request
    * HTTP上传文件 https_file_upload
    */
    class Wechat
    {
    /**
     * 返回标准微信响应的文本消息格式 transmitText
     * @param string $fromUsername 来自openid
     * @param string $toUsername 发给openid
     * @param string $content 文本内容
     * @return string
     */
    public static function transmitText($fromUsername,$toUsername,$content){
        $textTpl = '<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        <FuncFlag>0</FuncFlag>
        </xml>';
    $result = sprintf($textTpl, $fromUsername, $toUsername, time(), $content);
    return $result;
}


    /**
     * 微信access_token获取 getAccessToken 有缓存设置
     * @param string $appid
     * @param string $appsecret
     * @param string $memName
     * @return access_token
     */
    public static function getAccessToken($appid ,$appsecret,$memName){
        //设置缓存，100分钟更新一次access_token
        $mem = new Memcache;
        $mem->connect('localhost', 11211) or die ('Could not connect');
        $access_token = $mem->get($memName);
        if (empty($access_token)){
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
            $res = self::http_request($url);
            $result = json_decode($res, true);
            $access_token = $result['access_token'];
            $mem->set($memName, $access_token, 0, 6000);
        }
        $mem->close();
        return $access_token;
    }

    /**
     * 微信主动发送文本消息 sentTextMsg
     * @param string $touser 发送给谁
     * @param string $content 文本内容
     * @param string $access_token
    * @return string  $result
     */
    public static function sentTextMsg($touser,$content,$access_token){
        $url='https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
        // $content=urlencode($content);
        $con = array('content' => $content);
        $arr = array('touser' => $touser, 'msgtype' => 'text','text' => $con);
        /*$postData=json_encode($arr);
        $postData=urldecode($postData);*/
        $postData=json_encode($arr,JSON_UNESCAPED_UNICODE);
        $result=self::http_request($url,$postData);
        return $result;
    }

    /**
     * 微信上传文件返回media_id uploadMedia
     * @param string $touser 发送给谁
     * @param string $content 文本内容
     * @param access_token
     * @return string  $media_id或失败返回空
     */
    public static function uploadMedia($access_token,$filepath,$type){
        $url = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token='.$access_token.'&type='.$type;
        $result = self::https_file_upload($url, $filepath);
        $jsoninfo = json_decode($result, true);
        if (array_key_exists('media_id', $jsoninfo)) {
            return $jsoninfo['media_id'];
        }
        return '';

    }

    /**
     * 微信主动发送语音、图片消息（要先上传媒体获得id）sendMediaMsg
     * @param string $touser 发送给谁
     * @param string $media_id 媒体id
     * @param string $type 图片image，语音voice
     * @param string $access_token
     * @return string  $result
     */
    public static function sendMediaMsg($touser,$media_id,$type,$access_token){
        $url='https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
        $typeCon = array('media_id' => $media_id);
        $arr = array('touser' => $touser, 'msgtype' => 'text',$type => $typeCon);
        $postData=json_encode($arr,JSON_UNESCAPED_UNICODE);
        $result=self::http_request($url,$postData);
        return $result;
    }

    /**
     * 通过media_id保存微信图片或语音 downloadWeixinFile
     * @param string $access_token 
     * @param string $media_id 媒体id
     * @param string $dir 绝对路劲末尾带'/',注意要有写权限，如 xxx/upload/wechat/voice/
     * @param string $fileName 文件名带jpg之类的后缀,如 xxximage.jpeg
     * @return boolean 成功返回true，失败返回假
     */
    public static function downloadWeixinFile($access_token,$media_id,$dir,$fileName){
        $url='http://file.api.weixin.qq.com/cgi-bin/media/get?access_token='.$access_token.'&media_id='.$media_id;
        $package=self::http_request($url);
        $local_file=fopen($dir.$fileName,'w');
        if ($local_file===false) {
            return false;
        }
        if (fwrite($local_file,$filecontent)===false) {
            return false;
        }
        return true;
    }

    /**
    * HTTP请求（支持HTTP/HTTPS，支持GET/POST）http_request
    * @param string $data post data 空则为GET
    * @param string $url 
    * @return string $result
    */    
    public static function http_request($url, $data = null)
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

    /**
    * HTTP上传文件 https_file_upload
    * @param $url 上传的url地址
    * @param $path 文件的绝对地址
    * @param $filename 文件的上传时取名 可空
    * @return string 返回上传结果
    */
    public static function https_file_upload($url,$path,$filename='media'){
        $curl=curl_init();
        $cfile = curl_file_create($path);
        $filedata = array($filename => $cfile);
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$filedata);
        curl_setopt($curl, CURLOPT_INFILESIZE,filesize($path)); 
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output=curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}