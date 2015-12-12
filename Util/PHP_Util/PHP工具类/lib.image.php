<?php 
	class Lib_Image
	{
		private $height = 0;
		private $width  = 0;
	
		public function __construct($height , $width)
		{
			$this->height = $height;
			$this->width = $width;
		}
		
		private function genCode($num)
		{
			for($i=0;$i<$num;$i++)//生成验证码
			{
				switch(rand(0,2))
				{
					case 0:$code[$i]=chr(rand(48,57));break;//数字
					case 1:$code[$i]=chr(rand(65,90));break;//大写字母
					case 2:$code[$i]=chr(rand(97,122));break;//小写字母
				}
			}
			$_SESSION["VerifyCode"]=$code;	
			return $code;		
		}
		
		private function genOther($image)
		{
			for($i=0;$i<80;$i++)//生成干扰像素
			{
				$dis_color=imagecolorallocate($image,rand(0,2555),rand(0,255),rand(0,255));
				imagesetpixel($image,rand(1,$this->width),rand(1,$this->height),$dis_color);
			}		
		}
		
		public function veryCode()
		{
			
			$image=imagecreate($this->width,$this->height);
			imagecolorallocate($image,255,255,255);
			//$this->genOther($image);
			
			$num = 4;
			$code = $this->genCode($num);
			for($i=0;$i<$num;$i++)//打印字符到图像
			{
				$char_color=imagecolorallocate($image,rand(0,2555),rand(0,255),rand(0,255));
				imagechar($image,60,($this->width/$num)*$i,rand(0,5),$code[$i],$char_color);
			}
			
			header("Content-type:image/png");
			imagepng($image);//输出图像到浏览器
			imagedestroy($image);//释放资源
		}
	}
	
	$image = new Lib_Image(25, 65);
	$image->veryCode();
?>