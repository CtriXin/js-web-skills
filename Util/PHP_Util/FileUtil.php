<?php

/**
 * FileUtil
 * @author bajian
 */
class FileUtil
{


	/**
	 * @param string $name
	 * @param string $size 限制文件大小单位byte 1000=1kb
	 * @return [state,saveDir] '-1','文件不存在' \'-2','文件大小不符合要求' \'-3','文件格式不符合要求'
	 */
	public static function saveFile($name,$size,$saveDir,$saveName='',$matchSuff='')
	{
		header("Content-Type:text/html;charset=utf-8");
		if (!isset($_FILES[$name])) return -1;
		$file=$_FILES[$name];
		$file_size=$file['size'];
		if ($file_size>$size||$file_size<=0) return -2;
		if ($matchSuff!='') {
			if(!strpos($file['name'], $matchSuff)) return -3;
		}
		$saveName='r'.time().mt_rand(1,999999);
		$dir=$saveDir.$saveName;
		// move_uploaded_file($file['tmp_name'],$dir);
		// var_dump($file);
		$sExtension = substr($file['name'], (strrpos($file['name'], '.') + 1));//找到扩展名
		$dir=$dir.'.'.$sExtension;
		move_uploaded_file($file['tmp_name'],$dir);
		// move_uploaded_file($file["tmp_name"], iconv("utf-8","gb2312",$dir));  //解决windows编码问题，不好解决跨平台问题，只好重命名了
		return [file_exists($dir)?1:-4,$dir];
	}


	public static function creatXlsxDir()
	{
		$dirDate = date('Y-m-d',$_SERVER['REQUEST_TIME']);
		$dir='upload';
		if(!is_dir($dir)) mkdir($dir);

		$dir='upload'.DIRECTORY_SEPARATOR.'xlsx';
		if(!is_dir($dir)) mkdir($dir);

		$dir='upload'.DIRECTORY_SEPARATOR.'xlsx'.DIRECTORY_SEPARATOR.$dirDate;
		if(!is_dir($dir)) mkdir($dir);

		return $dir.DIRECTORY_SEPARATOR;
	}



	public static function createImgDir()
	{
		$dirDate = date('Y-m-d',$_SERVER['REQUEST_TIME']);
		$dir='upload';
		if(!is_dir($dir)) mkdir($dir);

		$dir='upload'.DIRECTORY_SEPARATOR.'img';
		if(!is_dir($dir)) mkdir($dir);

		$dir='upload'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$dirDate;
		if(!is_dir($dir)) mkdir($dir);

		return $dir.DIRECTORY_SEPARATOR;
	}

	     /**
	     * 小文件下载
	     * @author bajian
	     * @param 
	     * @return boolean
	     * var_dump(saveFileByUrl('http://q.qlogo.cn/qqapp/1105343036/AB5A6A3498C8192AD7DB67527BF8A985/40','testdl/pic/test221.png'));
	     */
	public static function saveFileByUrl($url,$path){
		$data=self::getDataByUrl($url);
		return self::saveDataByPath($data,$path);
	}

	private static function saveDataByPath($data,$path){
		if (!$data) 
			return false;
		$dir=dirname($path);
		if(!is_dir($dir))
			mkdir($dir,'0777',TRUE);

		$fp = fopen($path, 'w');
		fwrite($fp, $data);
		fclose($fp);
		return file_exists($path);
	}

	private static function getDataByUrl($url)
	{
		$curl = curl_init($url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($curl);
		curl_close($curl);
		return $data;
	}

	/**
     * 下载大/小文件（升级版，支持重定向）
     * @author bajian
     * @param 
     * @return filesize
     * CURLOPT_FOLLOWLOCATION需要在安全模式关闭未设置open_basedir的情况下才能使用。open_basedir是php.ini中的一项设置，功能是将用户可操作的文件限制在某目录下。
     * var_dump(saveBigFileByUrl('https://github.com/Leon2012/phpqrencode/archive/master.zip','phpqrencode/archive/master.zip'));
     */
	private static function saveBigFileByUrl($url,$path)
	{
		$dir=dirname($path);
		if(!is_dir($dir))
			mkdir($dir,'0777',TRUE);

		$fp = fopen ($path, 'w+');
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 600);
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_MAXREDIRS,20);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//支持重定向
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		return filesize($path);
	}

}