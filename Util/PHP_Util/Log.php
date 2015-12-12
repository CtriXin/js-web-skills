<?php
/**
* 日志输出类
*@author hgx
*/
class Log 
{
    private static $fileName='log.txt';
    private static $handle=null;//文件句柄
    
    function __construct()
    {

    }
    
    function __destruct()
    {

    }
    /**
    * 设置日志文件名
    */
    public static function setFileName($fileName='log.txt'){
        self::$fileName=$fileName;
    }

    /**
    * 设置文件句柄
    */
    public static function _Instance(){
        if (!isset($handle)) {
            self::$handle=fopen(self::$fileName,'a');
        }
    }

    /**
    * 关闭文件句柄
    */
    public static function _Exit(){
        if (!isset($handle)) {
            fclose(self::handle);
        }
    }
    /**
    * 日志输出 不需要换行符
    */
    public static function info($logInfo){
        self::_Instance();
        fwrite(self::$handle,date('Y-m-d H:i:s ').$logInfo."\n");
    }
}