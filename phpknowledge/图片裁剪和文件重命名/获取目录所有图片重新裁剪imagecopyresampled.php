<?php
// header("Content-type: image/jpeg");  


for ($i=0; $i <count(scandir('./'))-6 ; $i++) { 
	// echo scandir('./')[$i+3];
	echo 'begin';
	resample(scandir('./')[$i+3],'./resize/'.$i.'.jpeg');

	echo 'end';
	sleep(2);
}

//重新裁图http://php.net/manual/zh/function.imagecopyresampled.php
function resample($filename,$filerename){
	/* 读取图档 */ 
	$im = imagecreatefromjpeg($filename);  
	/* 图片要截多少, 长/宽 */ 
	$start_width=mt_rand(10,100); 
	$start_length=mt_rand(40,80); 
	$new_img_width = mt_rand(400,700); 

	$new_img_height = mt_rand(400,1100);  
	/* 先建立一个 新的空白图档 */ 
	$newim = imagecreate($new_img_width, $new_img_height);  
// 输出图要从哪边开始 x, y ，原始图要从哪边开始 x, y ，要画多大 x, y(resize) , 要抓多大 x, y 
	$re=imagecopyresampled($newim, $im, 0, 0,$start_width , $start_length, $new_img_width, $new_img_height, $new_img_width, $new_img_height);  
	/* 放大成 500 x 500 的图 */ 
// imagecopyresampled($newim, $im, 0, 0, 100, 30, 500, 500, $new_img_width, $new_img_height);  
	/* 将图印出来 */ 
	imagejpeg($newim,$filerename);  
	/* 资源回收 */ 
	imagedestroy($newim); 
	imagedestroy($im);
	if ($re) {
		echo 'succ';
	}else{
		echo 'fail';
	}
}


?>