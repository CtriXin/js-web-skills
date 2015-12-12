<?php
/*
alertLocation js 弹窗并且跳转
alertBack js 弹窗返回
headerUrl 页面跳转
alertClose 弹窗关闭 
alert 弹窗
sysUploadImg 系统基本参数上传图片专用
htmlString html过滤
mysqlString 数据库输入过滤
unSession 清理session、
打开session sessionStart
validateEmpty 验证是否为空
validateAll 验证是否相同
validateId 验证数字ID
formatStr 格式化字符串（过滤特殊字符）
formatDate 格式化时间 timestamp->Y-m-d H:i:s
getTodayZeroTime 获取当天0点时间戳，可扩展成N天前
realIp 获得真实IP地址  
display 加载 Smarty 模板
createDir 创建目录 0777
createFile 创建文件（默认为空）eg:touch("test.txt");
getInput 正确获取http变量
delFile 删除文件
delDir 删除目录
delDirOfAll 删除目录及地下的全部文件
validateLogin 验证登陆
addMark 给已经存在的图片添加水印
cn_substr 中文截取2，单字节截取模式
cn_substr_utf8 utf-8中文截取，单字节截取模式
resizeImage 图片等比例缩放
downFile 下载文件
encode_json 中文编码JSON
getPatternResult 封装的单个正则匹配
getPatternResultAll 封装的正则全匹配
getStringMiddle 取文本中间
getJson 可中文 数组格式化返回json数据，用于常与app通信
randomkeys 生成a-zA-Z0-9随机数
getClientIp 获取客户端ip地址
todayLeftTime 返回今天到N（明）天0点剩余时间戳（常用于缓存）
currentTimeStr 返回当前标准的文本型时间戳

*/

/**  
* 常用工具类  
* author 黄桂旋.  
* Last modify $Date: 2015-5-14
*/
class Tool {
	/**
	 * js 弹窗并且跳转
	 * @param string $_info
	 * @param string $_url
	 * @return js
	 */
	public static function alertLocation($_info, $_url) {
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
		exit();
	}
	
	/**
	 * js 弹窗返回
	 * @param string $_info
	 * @return js
	 */
	public static function alertBack($_info) {
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit();
	}
	
	/**
	 * 页面跳转
	 * @param string $url
	 * @return js
	 */
	public static function headerUrl($url) {
		echo "<script type='text/javascript'>location.href='{$url}';</script>";
		exit();
	}
		
	/**
	 * 输出一段适应html5的话 <p4>
	 * @param string $str 
	 * @return js
	 */
	public static function h5($str) {
		return '<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /><p4>'.$str.'</p4>';
	}
	
	/**
	 * alertClose 弹窗关闭 
	 * @param string $_info
	 * @return js
	 */
	public static function alertClose($_info) {
		echo "<script type='text/javascript'>alert('$_info');close();</script>";
		exit();
	}
	
	/**
	 * alert 弹窗
	 * @param string $_info
	 * @return js
	 */
	public static function alert($_info) {
		echo "<script type='text/javascript'>alert('$_info');</script>";
		exit();
	}
	
	/**
	 * sysUploadImg 系统基本参数上传图片专用
	 * @param string $_path
	 * @return null
	 */
	public static function sysUploadImg($_path) {
		echo '<script type="text/javascript">document.getElementById("logo").value="'.$_path.'";</script>';
		echo '<script type="text/javascript">document.getElementById("pic").src="'.$_path.'";</script>';
		echo '<script type="text/javascript">$("#loginpop1").hide();</script>';
		echo '<script type="text/javascript">$("#bgloginpop2").hide();</script>';
	}
	
	/**
	 * htmlString html过滤
	 * @param array|object $_date
	 * @return string
	 */
	public static function htmlString($_date) {
		if (is_array($_date)) {
			foreach ($_date as $_key=>$_value) {
				$_string[$_key] = Tool::htmlString($_value);  //递归
			}
		} elseif (is_object($_date)) {
			foreach ($_date as $_key=>$_value) {
				$_string->$_key = Tool::htmlString($_value);  //递归
			}
		} else {
			$_string = htmlspecialchars($_date);
		}
		return $_string;
	}
	
	/**
	 * mysqlString 数据库输入过滤
	 * @param string $_data
	 * @return string
	 */
	public static function mysqlString($_data) {
		$_data = trim($_data);
		return !GPC ? addcslashes($_data) : $_data;
	}
	
	/**
	 *unSession 清理session
	 */
	public static function unSession() {
		if (session_start()) {
			session_destroy();
		}
	}
	/**
	*　打开session sessionStart
	* 打开session 注意防止多次打开
	*/
	public static function sessionStart(){
		if(!isset($_SESSION)){  
			session_start();  
		}  
	}
	
	
	/**
	 * validateEmpty 验证是否为空
	 * @param string $str
	 * @param string $name
	 * @return bool (true or false)
	 */
	static function validateEmpty($str, $name) {
		if (empty($str)) {
			self::alertBack('警告：' .$name . '不能为空！');
		}
	}
	
	/**
	 * validateAll 验证是否相同
	 * @param string $str1
	 * @param string $str2
	 * @param string $alert
	 * @return JS 
	 */
	static function validateAll($str1, $str2, $alert) {
		if ($str1 != $str2) self::alertBack('警告：' .$alert);
	}
	
	/**
	 * validateId 验证数字ID
	 * @param Number $id
	 * @return JS
	 */
	static function validateId($id) {
		if (empty($id) || !is_numeric($id)) self::alertBack('警告：参数错误！');
	}
	
	/**
	 * formatStr 格式化字符串（过滤特殊字符）
	 * @param string $str
	 * @return string
	 */
	public static function formatStr($str) {
		$arr = array(' ', '	', '&', '@', '#', '%',  '\'', '"', '\\', '/', '.', ',', '$', '^', '*', '(', ')', '[', ']', '{', '}', '|', '~', '`', '?', '!', ';', ':', '-', '_', '+', '=');
		foreach ($arr as $v) {
			$str = str_replace($v, '', $str);
		}
		return $str;
	}
	
	/**
	 * formatDate 格式化时间 timestamp->Y-m-d H:i:s
	 * @param int $time 时间戳
	 * @return string
	 */
	public static function formatDate($time='default') {
		$date = $time == 'default' ? date('Y-m-d H:i:s', time()) : date('Y-m-d H:i:s', $time);
		return $date;
	}
	
	/**
	 * getTodayZeroTime 获取当天0点时间戳，可扩展成N天前
	 * @return string timestamp
	 */
	public static function getTodayZeroTime() {
		return strtotime('today');
	}
	/**  
	* realIp 获得真实IP地址  
	* @return string  
	*/
	public static function realIp() {   
		static $realip = NULL;   
		if ($realip !== NULL) return $realip;  
		if (isset($_SERVER)) {  
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
				$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
				foreach ($arr AS $ip) {  
					$ip = trim($ip);  
					if ($ip != 'unknown') {   
						$realip = $ip;   
						break;   
					}   
				}   
			} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {   
				$realip = $_SERVER['HTTP_CLIENT_IP'];  
			} else {   
				if (isset($_SERVER['REMOTE_ADDR'])) {   
					$realip = $_SERVER['REMOTE_ADDR'];   
				} else {   
					$realip = '0.0.0.0';   
				}  
			}  
		} else {  
			if (getenv('HTTP_X_FORWARDED_FOR')) {  
				$realip = getenv('HTTP_X_FORWARDED_FOR');  
			} elseif (getenv('HTTP_CLIENT_IP')) {  
				$realip = getenv('HTTP_CLIENT_IP');  
			} else {  
				$realip = getenv('REMOTE_ADDR');  
			}  
		}
		preg_match('/[\d\.]{7,15}/', $realip, $onlineip);  
		$realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';  
		return $realip;  
	}
	
	/**
	 * display 加载 Smarty 模板
	 * @param string $html
	 * @return null;
	 */
	public static function display() {
		global $tpl;$html = null;
		$htmlArr = explode('/', $_SERVER[SCRIPT_NAME]);
		$html = str_ireplace('.php', '.html', $htmlArr[count($htmlArr)-1]);
		$dir = dirname($_SERVER[SCRIPT_NAME]);
		$firstStr = substr($dir, 0, 1);
		$endStr = substr($dir, strlen($dir)-1, 1);
		if ($firstStr == '/' || $firstStr == '\\') $dir = substr($dir, 1);
		if ($endStr != '/' || $endStr != '\\') $dir = $dir . '/';
		$tpl->display($dir.$html);
	}
	
	/**
	 * createDir 创建目录 0777
	 * @param string $dir
	 */
	public static function createDir($dir) {
		if (!is_dir($dir)) {
			mkdir($dir, 0777);
		}
	}
	
	/**
	 * createFile 创建文件（默认为空）eg:touch("test.txt");
	 * @param unknown_type $filename
	 */
	public static function createFile($filename) {
		if (!is_file($filename)) touch($filename);
	}
	
	/**
	 * getInput 正确获取http变量
	 * @param string $param
	 * @param string $type
	 * @return string
	 */
	public static function getInput($param, $type='post') {
		$type = strtolower($type);
		if ($type=='post') {
			return self::mysqlString(trim($_POST[$param]));
		} elseif ($type=='get') {
			return self::mysqlString(trim($_GET[$param]));
		}
	}
	
	/**
	 * delFile 删除文件
	 * @param string $filename
	 */
	public static function delFile($filename) {
		if (file_exists($filename)) unlink($filename);
	}
	
	/**
	 * delDir 删除空的目录
	 * @param string $path
	 */
	public static function delDir($path) {
		if (is_dir($path)) rmdir($path);
	}
	
	/**
	 * delDirOfAll 删除目录及地下的全部文件
	 * @param string $dir
	 * @return bool
	 */
	public static function delDirOfAll($dir) {
		//先删除目录下的文件：
		if (is_dir($dir)) {
			$dh=opendir($dir);
			while (!!$file=readdir($dh)) {
				if($file!="." && $file!="..") {
					$fullpath=$dir."/".$file;
					if(!is_dir($fullpath)) {
						unlink($fullpath);
					} else {
						self::delDirOfAll($fullpath);
					}
				}
			}
			closedir($dh);
			//删除当前文件夹：
			if(rmdir($dir)) {
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 * validateLogin 验证登陆
	 */
	public static function validateLogin() {
		if (empty($_SESSION['admin']['user'])) header('Location:/admin/');
	}
	
	/**
	 * addMark 给已经存在的图片添加水印
	 * @param string $file_path加水印文件路劲
	 * @param string $mark_path 水印文件路劲
	 * @param string $store_path 保存文件路劲
	 * @return bool
	 */
	public static function addMark($file_path,$mark_path,$store_path) {
		if (file_exists($file_path) && file_exists($mark_path)) {
			//求出上传图片的名称后缀
			$ext_name = strtolower(substr($file_path, strrpos($file_path, '.'), strlen($file_path)));
			//$new_name='jzy_' . time() . rand(1000,9999) . $ext_name ;
			// $store_path = ROOT_PATH . UPDIR;
			//求上传图片高宽
			$imginfo = getimagesize($file_path);
			$width = $imginfo[0];
			$height = $imginfo[1];
			 //添加图片水印             
			switch($ext_name) {
				case '.gif':
				$dst_im = imagecreatefromgif($file_path);
				break;
				case '.jpg':
				$dst_im = imagecreatefromjpeg($file_path);
				break;
				case '.png':
				$dst_im = imagecreatefrompng($file_path);
				break;
			}
			$src_im = imagecreatefrompng($mark_path);
			//求水印图片高宽
			$src_imginfo = getimagesize($mark_path);
			$src_width = $src_imginfo[0];
			$src_height = $src_imginfo[1];
			//求出水印图片的实际生成位置
			$src_x = $width - $src_width - 10;
			$src_y = $height - $src_height - 10;
			//新建一个真彩色图像
			$nimage = imagecreatetruecolor($width, $height);               
			//拷贝上传图片到真彩图像
			imagecopy($nimage, $dst_im, 0, 0, 0, 0, $width, $height);          
			//按坐标位置拷贝水印图片到真彩图像上
			imagecopy($nimage, $src_im, $src_x, $src_y, 0, 0, $src_width, $src_height);
			//分情况输出生成后的水印图片
			switch($ext_name) {
				case '.gif':
				imagegif($nimage, $file_path);
				break;
				case '.jpg':
				imagejpeg($nimage, $file_path);
				break;
				case '.png':
				imagepng($nimage, $file_path);
				break;     
			}
			//释放资源 
			imagedestroy($dst_im);
			imagedestroy($src_im);
			unset($imginfo);
			unset($src_imginfo);
			//移动生成后的图片
			@move_uploaded_file($file_path, $file_path);
		}
	}
	
	/**
	* cn_substr 中文截取2，单字节截取模式
	* @access public
	* @param string $str  需要截取的字符串
	* @param int $slen  截取的长度
	* @param int $startdd  开始标记处
	* @return string
	*/
	public static function cn_substr($str, $slen, $startdd=0){
		$cfg_soft_lang = PAGECHARSET;
		if($cfg_soft_lang=='utf-8') {
			return self::cn_substr_utf8($str, $slen, $startdd);
		}
		$restr = '';
		$c = '';
		$str_len = strlen($str);
		if($str_len < $startdd+1) {
			return '';
		}
		if($str_len < $startdd + $slen || $slen==0) {
			$slen = $str_len - $startdd;
		}
		$enddd = $startdd + $slen - 1;
		for($i=0;$i<$str_len;$i++) {
			if($startdd==0) {
				$restr .= $c;
			} elseif($i > $startdd) {
				$restr .= $c;
			}
			if(ord($str[$i])>0x80) {
				if($str_len>$i+1) {
					$c = $str[$i].$str[$i+1];
				}
				$i++;
			} else {
				$c = $str[$i];
			}
			if($i >= $enddd) {
				if(strlen($restr)+strlen($c)>$slen) {
					break;
				} else {
					$restr .= $c;
					break;
				}
			}
		}
		return $restr;
	}

	/**
	*  cn_substr_utf8 utf-8中文截取，单字节截取模式
	*
	* @access public
	* @param string $str 需要截取的字符串
	* @param int $slen 截取的长度
	* @param int $startdd 开始标记处
	* @return string
	*/
	public static function cn_substr_utf8($str, $length, $start=0) {
		if(strlen($str) < $start+1) {
			return '';
		}
		preg_match_all("/./su", $str, $ar);
		$str = '';
		$tstr = '';
		//为了兼容mysql4.1以下版本,与数据库varchar一致,这里使用按字节截取
		for($i=0; isset($ar[0][$i]); $i++) {
			if(strlen($tstr) < $start) {
				$tstr .= $ar[0][$i];
			} else {
				if(strlen($str) < $length + strlen($ar[0][$i]) ) {
					$str .= $ar[0][$i];
				} else {
					break;
				}
			}
		}
		return $str;
	}
	
	/**
	 * 删除图片，根据图片ID
	 * @param int $image_id
	 */
	/*
	static function delPicByImageId($image_id) {
		$db_name = PREFIX . 'images i';
		$m = new Model();
		$data = $m->getOne($db_name, "i.id={$image_id}", "i.path as p, i.big_img as b, i.small_img as s");
		foreach ($data as $v) {
			@self::delFile(ROOT_PATH . $v['p']);
			@self::delFile(ROOT_PATH . $v['b']);
			@self::delFile(ROOT_PATH . $v['s']);
		}
		$m->del(PREFIX . 'images', "id={$image_id}");
		unset($m);
	}*/
	
	/**
	 * resizeImage 图片等比例缩放
	 *  比如  $im = ImageCreateFromJpeg($image);    $x = ImageSX($im);
	 * @param resource $im    新建图片资源(imagecreatefromjpeg/imagecreatefrompng/imagecreatefromgif)
	 * @param int $maxwidth   生成图像宽
	 * @param int $maxheight  生成图像高
	 * @param string $name    生成图像名称
	 * @param string $filetype文件类型(.jpg/.gif/.png)
	 */
	public static function resizeImage($im, $maxwidth, $maxheight, $name, $filetype) {
		$pic_width = imagesx($im);
		$pic_height = imagesy($im);
		if(($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
			if($maxwidth && $pic_width>$maxwidth) {
				$widthratio = $maxwidth/$pic_width;
				$resizewidth_tag = true;
			}
			if($maxheight && $pic_height>$maxheight) {
				$heightratio = $maxheight/$pic_height;
				$resizeheight_tag = true;
			}
			if($resizewidth_tag && $resizeheight_tag) {
				if($widthratio<$heightratio)
					$ratio = $widthratio;
				else
					$ratio = $heightratio;
			}
			if($resizewidth_tag && !$resizeheight_tag)
				$ratio = $widthratio;
			if($resizeheight_tag && !$resizewidth_tag)
				$ratio = $heightratio;
			$newwidth = $pic_width * $ratio;
			$newheight = $pic_height * $ratio;
			if(function_exists("imagecopyresampled")) {
				$newim = imagecreatetruecolor($newwidth,$newheight);
				imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
			} else {
				$newim = imagecreate($newwidth,$newheight);
				imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
			}
			$name = $name.$filetype;
			imagejpeg($newim,$name);
			imagedestroy($newim);
		} else {
			$name = $name.$filetype;
			imagejpeg($im,$name);
		}
	}

	/**
	 * downFile 下载文件
	 * @param string $file_path 绝对路径
	 */
	public static function downFile($file_path) {
		//判断文件是否存在
		$file_path = iconv('utf-8', 'gb2312', $file_path); //对可能出现的中文名称进行转码
		if (!file_exists($file_path)) {
			exit('文件不存在！');
		}
		$file_name = basename($file_path); //获取文件名称
		$file_size = filesize($file_path); //获取文件大小
		$fp = fopen($file_path, 'r'); //以只读的方式打开文件
		header("Content-type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length: {$file_size}");
		header("Content-Disposition: attachment;filename={$file_name}");
		$buffer = 1024;
		$file_count = 0;
		//判断文件是否结束
		while (!feof($fp) && ($file_size-$file_count>0)) {
			$file_data = fread($fp, $buffer);
			$file_count += $buffer;
			echo $file_data;
		}
		fclose($fp); //关闭文件
	}

/**
 * encode_json 中文编码JSON
 * @param $data 数组
 * @return string
 */
public static function encode_json($data){
	if(version_compare('5.4',PHP_VERSION,'<')){
        //5.4以上
		return json_encode($data,JSON_UNESCAPED_UNICODE);
	}else{
		return urldecode(json_encode(url_encode($data)));
	}
}

	/**
	 *  getPatternResult 封装的单个正则匹配
	 *	@param $pattern,$str 如$pattern = '#Sentence:</h4><ul><li>(.*)</li></ul><br/><h4>#';
	 * 	@return string
	 *  preg_match()返回 pattern 的匹配次数。 它的值将是0次（不匹配）或1次，因为preg_match()在第一次匹配后 将会停止搜索。preg_match_all()不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回
	 */			
	public static function getPatternResult($pattern,$str) {
		$re='';
		if(preg_match($pattern,$str,$re)){
			return $re[1];
		}
		else{
			return '';
		}
	}

	/**
	 *  getPatternResultAll 封装的正则全匹配
	 *	@param $pattern,$str 如$pattern = '#Sentence:</h4><ul><li>(.*)</li></ul><br/><h4>#';
	 * 	@return string $re[0][0] 匹配第一个，含左右边文本 $re[0][1];第二个...
	 *  preg_match()返回 pattern 的匹配次数。 它的值将是0次（不匹配）或1次，因为preg_match()在第一次匹配后 将会停止搜索。preg_match_all()不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回
	 */			
	public static function getPatternResultAll($pattern,$str) {
		$re='';
		if(preg_match_all($pattern,$str,$re)){
			return $re;
		}
		else{
			return '';
		}
	}


  /**
   *  getStringMiddle 取文本中间
   *  @param String $str,原文本
   *  @param String $left,左边文本
   *  @param String $right,右边文本
   *  @return 成功返回array $re，$re[0]包含文本左右边，$re[1]不包含文本左右边，
   *  preg_match()返回 pattern 的匹配次数。 它的值将是0次（不匹配）或1次，因为preg_match()在第一次匹配后 将会停止搜索。preg_match_all()不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回
   */     
  public static function getStringMiddle($str,$left,$right) {
  	$re='';
  	$pattern='#'.$left.'([\d\D]*?)'.$right.'#';
  	if(preg_match($pattern,$str,$re)){
  		return $re;
  	}
  	else{
  		return '';
  	}
  }

	/**
	 * @param $status,$message,$data
	 * getJson 可中文 数组格式化返回json数据，用于常与app通信
	 * @return Json str
	 */
	public static function getJson($state='',$msg='',$data=''){
		$arr=['state'=>$state,'msg'=>$msg,'data'=>$data];
		return json_encode($arr,JSON_UNESCAPED_UNICODE);
	}

	/**
	 * @param $length 随机数的位数
	 * randomkeys 生成a-zA-Z0-9随机数
	 * @return str 随机数
	 */
	public static function randomkeys($length){
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ'; //字符池
		for($i=0;$i<$length;$i++){
		$key .= $pattern{mt_rand(1,62)}; //生成php随机数
	}
	return $key;
}
	/**
	 * getClientIp 获取客户端ip地址
	 * @return realip 真实ip
	 */
	public static function getClientIp()
	{
		if (isset($_SERVER)){
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			} else {
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")){
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			} else if (getenv("HTTP_CLIENT_IP")) {
				$realip = getenv("HTTP_CLIENT_IP");
			} else {
				$realip = getenv("REMOTE_ADDR");
			}
		}
		return $realip;
	}

	/**
	 * currentTimeStr 返回当前标准的文本型时间戳
	 * @return str 
	 */
	public static function currentTimeStr(){
		return date('Y-m-d H:i:s');
	}
	
	/**
	 * todayLeftTime 返回今天到N（明）天0点剩余时间戳（常用于缓存）
	 * @return str 
	 */
	public static function todayLeftTime(){
		return strtotime('tomorrow')-time();
	}

	/**
	 * arrayParamToString 将数组转成post格式的参数
	 * @return str 
	 */
    public static function arrayParamToString($arr){
        $str='';
        foreach ($arr as $key => $value) {
            $str.=$key.'='.$value.'&';
        }
        if ($str!='') {
            $str=substr($str,0,strlen($str)-1);
        }
        echo $str;
        return $str;
    }

}
?>