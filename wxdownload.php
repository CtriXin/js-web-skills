<?php

// header('Content-disposition: attachment; filename=LearningPartner0.1.1.apk');

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Server: nginx');
// echo 'html123';
/*$file_path='/var/www/html/InLamp/public/LearningPartner0.1.1.apk';
$size=filesize($file_path);
if (file_exists($file_path)&&$size) {
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header("Accept-Ranges: bytes");
	header("Content-Length: {$size}");
	header("Accept-Length: {$size}");
	header("Content-Disposition: attachment;filename=LearningPartner0.1.1.apk");
	echo include $file_path;
	ob_flush();
}else{
	echo '文件不存在';exit;
}*/
$file_path='试客小兵和懒猫助手躲开越狱检测教程.doc';

downFile($file_path,'试客小兵和懒猫助手躲开越狱检测教程.doc');

  /**
   * downFile 下载文件
   * @param string $file_path 绝对路径
   * @param string $saveName 浏览器上下载完的附件名
   */
  function downFile($file_path,$saveName='') {
    //判断文件是否存在
    // $file_path = iconv('utf-8', 'gb2312', $file_path); //对可能出现的中文名称进行转码
  	if (!file_exists($file_path)) {
  		exit('文件不存在！');
  	}

  	if ($saveName=='') {
      $saveName = urldecode(basename($file_path)); //获取文件名称
  }

    // echo mb_detect_encoding($file_name,'utf-8, gb2312');
    // $file_name=mb_convert_encoding($file_name,'UTF-8','GB2312');
    $file_size = filesize($file_path); //获取文件大小
    $fp = fopen($file_path, 'r'); //以只读的方式打开文件
    // header("Content-type: application/octet-stream");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Accept-Ranges: bytes");
    header("Accept-Length: {$file_size}");
    header("Content-Length: {$size}");
    header("Content-Disposition: attachment;filename={$saveName}");
    $buffer = 1024;
    $file_count = 0;
    // ob_clean();
    //判断文件是否结束
    while (!feof($fp) && ($file_size-$file_count>0)) {
    	$file_data = fread($fp, $buffer);
    	$file_count += $buffer;
    	echo $file_data;
    }
    fclose($fp); //关闭文件
}