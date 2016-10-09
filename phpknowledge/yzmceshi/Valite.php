<?php

define('WORD_WIDTH',8);
define('WORD_HIGHT',12);
define('OFFSET_X',6);
define('OFFSET_Y',4);
define('WORD_SPACING',5);

class valite
{
	public function setImage($Image)
	{
		$this->ImagePath = $Image;
	}
	public function getData()
	{
		return $data;
	}
	public function getResult()
	{
		return $this->DataArray;
	}
	public function getHec()
	{
		$res = imagecreatefromjpeg($this->ImagePath);
		$size = getimagesize($this->ImagePath);
		$data = array();
		for($i=0; $i < $size[1]; ++$i)
		{
			for($j=0; $j < $size[0]; ++$j)
			{
				$rgb = imagecolorat($res,$j,$i);
				$rgbarray = imagecolorsforindex($res, $rgb);
				if($rgbarray['red'] < 125 || $rgbarray['green']<125
				|| $rgbarray['blue'] < 125)
				{
					$data[$i][$j]=1;
				}else{
					$data[$i][$j]=0;
				}
			}
		}
		$this->DataArray = $data;
		$this->ImageSize = $size;
	}
	public function run()
	{
		$result="";
		// 查找4个数字
		$data = array("","","","");
		for($i=0;$i<4;++$i)
		{
			$x = ($i*(WORD_WIDTH+WORD_SPACING))+OFFSET_X;
			$y = OFFSET_Y;
			for($h = $y; $h < (OFFSET_Y+WORD_HIGHT); ++ $h)
			{
				for($w = $x; $w < ($x+WORD_WIDTH); ++$w)
				{
					$data[$i].=$this->DataArray[$h][$w];
				}
			}
			
		}

		// 进行关键字匹配
		foreach($data as $numKey => $numString)
		{
			$max=0.0;
			$num = 0;
			foreach($this->Keys as $key => $value)
			{
				$percent=0.0;
				similar_text($value, $numString,$percent);
				if(intval($percent) > $max)
				{
					$max = $percent;
					$num = $key;
					if(intval($percent) > 95)
						break;
				}
			}
			$result.=$num;
		}
		$this->data = $result;
		// 查找最佳匹配数字
		return $result;
	}

	public function Draw()
	{
		for($i=0; $i<$this->ImageSize[1]; ++$i)
		{
	        for($j=0; $j<$this->ImageSize[0]; ++$j)
		    {
			    echo $this->DataArray[$i][$j];
	        }
		    echo "\n";
		}
	}
	public function __construct()
	{
		$this->Keys = array(
		'0'=>'000111000011011000100010011000110110001101100011011000110110001101100011001000100011011000011100',
		'1'=>'000110000111100000011000000110000001100000011000000110000001100000011000000110000001100001111110',
		'2'=>'001111000100111010000110000001100000011000000100000011000000100000010000001000010111111111111110',
		'3'=>'001111000100111010000110000001100000110000011100000011100000011000000110000001101100110011111000',
		'4'=>'000001100000011000001110000101100010011000100110010001101000011011111111000001100000011000000110',
		'5'=>'000111100001111000100000001110000111110000001110000001100000001000000010000000100100010001111000',
		'6'=>'000001110001110000110000011000000101110011100110110000111100001111000011110000110110011000111100',
		'7'=>'011111110111111010000010000001000000010000000100000010000000100000010000000100000001000000100000',
		'8'=>'001111000110001111000011110000110111011000111000001111000100011011000011110000110110011000111100',
		'9'=>'001111000110011011000011110000111100001111000011011000110011111000000110000011000001100011100000',
	);
	}
	protected $ImagePath;
	protected $DataArray;
	protected $ImageSize;
	protected $data;
	protected $Keys;
	protected $NumStringArray;

}
?>