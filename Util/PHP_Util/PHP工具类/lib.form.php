<?php 
	class Lib_Form
	{
		private $typeArr=array('isNotEmpty' , 'isInt'  , 'isStr' , 'isEmail' , 'isTel' , 'isOnlyNum' , 'hasSet', 'isOnlyChar' , 'isNumAndChar' , 'checkLength');
		private $msg = array();
		private $code = 0;
		
		public function validata($post)
		{
			if(!is_array($post))
			{
				$this->msg[] = 'data is not array';
			}
			else
			 {			
				foreach ($post as $field=>$value)
				{
					$func =  $post[$field]['valid'];
					$value = $post[$field]['value'];
					
					$checkLength = 'checkLength';
					if($pos = stripos($func , $checkLength)!==false)
					{
						$condition = substr($func, strlen($checkLength));
						$func = $checkLength;
						$lengthArr = explode('-', $condition);
						self::$func($value , $field , $lengthArr[0] , $lengthArr[1]);
					}
					else
					{				
						if(!in_array($func , $this->typeArr)) 
						{
							$this->msg = $func.'	isNotExists';
							break;
						}
						self::$func($value , $field);
					}
				}
			}
			return $this->showRestult();
		}
		
		private function showRestult()
		{
			if($this->msg && is_array($this->msg))	
			{
				$this->code = 1;
				$msg = implode(',', $this->msg);
				$ret =  array('code'=>$this->code , 'msg'=>$msg);
				return $ret;
			}
			return array('code'=>$this->code , 'msg'=>'success');
		}
		
		private function isNotEmpty($value,$field)
		{
			if(!$this->hasSet($value, $field)) return false;
			$value = trim($value);
			if(empty($value)) 
			{
				$this->msg[] = $field.'	isEmpty';
				return false;
			}
			return true;
		}
		
		private function isInt($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			if(!is_int($value))
			{
				$this->msg[] = $field.'	isNotInt';
				return false;
			}
			return true;
		}
		
		private function isStr($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			if(!is_string($value))	
			{
				$this->msg[] = $field.'	isNotStr';
				return false;
			}
			return true;
		}
		
		private function hasSet($value , $field)
		{
			if(!isset($value))
			{
				$this->msg[] = $field.'		isNotSet';
				return false;
			}
			return true;
		}
		
		private function isEmail($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			$pattern = "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)$/";
			if(!preg_match($pattern, $value))	
			{
				$this->msg[] = $field.'	isNotEmail';
				return false;
			}
			return true;
		}
		
		private function isTel($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			$pattern = '/^[0-9]{7,11}$/';
			if (!preg_match($pattern, $value)) 	
			{
				$this->msg[] = $field.'	isNotTel';
				return false;
			}
			return true;
		}
		
		private function isOnlyNum($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			$pattern = "/^[0-9]{1,}$/";
			if(!preg_match($pattern, $value))		
			{
				$this->msg[] = $field.'	isNotOnlyNum';
				return false;
			}
			return true;
		}
		
		private function isOnlyChar($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			$pattern = "/^[a-zA-Z]{1,}$/";
			if(!preg_match($pattern, $value))		
			{
				$this->msg[] = $field.'	isNotOnlyChar';
				return false;
			}
			return true;
		}
		
		private function isNumAndChar($value,$field)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			$pattern = "/^[a-zA-z0-9]{1,}$/";
			if(!preg_match($pattern , $value))	
			{
				$this->msg[] = $field.'	isNotNumAndChar';
				return false;
			}
			return true;
		}
		
		private function checkLength($value , $field ,  $minLength , $maxLength)
		{
			if(!$this->isNotEmpty($value,$field)) return false;
			$value = trim($value);
			$length = (strlen($value) + mb_strlen($value,'UTF8')) / 2; 
			if($length < $minLength || $length > $maxLength)
			{
				$this->msg[] = $field.'	isNotInLength';
				return false;
			}
			return true;
		}
	}

	if($_POST['submit'])
	{
		$form = new Lib_Form();
		$post['name'] = array('value'=>$_POST['name'] , 'valid'=>'checkLength6-12');
		$post['pwd'] = array('value'=>$_POST['pwd'] , 'valid'=>'checkLength4-12');
		$post['sex']	= array('value'=>$_POST['sex'] , 'valid'=>'hasSet');
		
		$ret = $form->validata($post);
		if($ret['code'])
		{
			echo $ret['msg'];
		}
	}
?>

