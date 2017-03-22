<?php

/**
 * @version 1.0
 * @date 2015-05-07
 * @date 2017-03-06 兼容https
 * @author bajian
 * Class Request 网络工具类,调用方式如Http::get(.....);
 */
class Http
{
    /**
     * HTTP GET 请求
     * @param string $url 请求地址
     * @param array $data 请求数据
     * @param null $cookie COOKIE
     * @param null $cookiefile COOKIE 请求所用的COOKIE文件位置
     * @param null $cookiesavepath 请求完成的COOKIE保存位置
     * @param bool $encode 是否对请求参数进行 urlencode 处理
     * @return mixed
     * @throws Exception
     */
    public static function get($url, $data = array(), $cookie = null, $cookiefile = null,$cookiesavepath = null, $encode = true)
    {
        //初始化句柄
        $ch = curl_init();
        //处理GET参数
        if(count($data)>0){
            $query = $encode?http_build_query($data):urldecode(http_build_query($data));
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $query);
        }else{
            curl_setopt($ch, CURLOPT_URL, $url);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36');
        //设置cookie
        if (isset($cookie)) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        //设置cookie请求文件
        if (isset($cookiefile)){
            if(!is_file($cookiefile)) throw new Exception('Cookie文件不存在');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        }
        //设置cookie保存路径
        if(isset($cookiesavepath)) curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiesavepath);
        //执行请求
        $resp = curl_exec($ch);
        //关闭句柄，释放资源
        curl_close($ch);
        return $resp;
    }

    /**
     * HTTP POST 请求
     * @param string $url 请求地址
     * @param array $data 请求数据,string拼接即可
     * @param null $cookie 请求COOKIE
     * @param null $cookiefile 请求时cookie文件位置
     * @param null $cookiesavepath 请求完成的COOKIE保存位置
     * @return string
     * @throws Exception
     */
    public static function post($url, $data = '', $cookie = null, $cookiefile = null,$cookiesavepath = null)
    {
        //初始化请求句柄
        $ch = curl_init();
        //参数设置
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36');
        //cookie设置
        if (isset($cookie)) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        //请求cookie设置
        if (isset($cookiefile)){
            if(!is_file($cookiefile)) throw new Exception('Cookie文件不存在');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        }
        //设置cookie保存路径
        if(isset($cookiesavepath)) curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiesavepath);
        $resp=curl_exec($ch);
        curl_close($ch);
        return $resp;
    }


/**
* HTTP请求（支持HTTP/HTTPS，支持GET/POST）
* @return string
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
    * HTTP上传文件
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