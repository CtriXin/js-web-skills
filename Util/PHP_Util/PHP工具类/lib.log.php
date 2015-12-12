<?php 
	class Lib_Log
	{
		private $logError = 0;
		private $logWarn = 1;
		private $logDebug = 2;
		private $logDir = 'log/';
		private $logFile = 'log';
		private $fileExt = '.txt';
		private $fileHander = null;    
		
		public function __construct()
		{
			if(!is_dir($this->logDir)){
				mkdir($this->logDir,0777);
			}
			$this->logFile .= date('Y-m-d').$this->fileExt;
			if(!$this->fileHander = @fopen($this->logDir.$this->logFile, 'a+')){
				die('the log file can not be open!');
			}
		}
		
		public  function writeLog($message)
		{
			$ip =  isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
			$debug = debug_backtrace(true);
			$string = date('Y-m-d H:i:s')."\t";
			$string .= $ip."\t";
			$string .=$debug[0]['file']."\t";
			$string .= "\tline" . $debug[0]['line']."\t";
			$string .= json_encode($message)."\r\n";
			if(!fwrite($this->fileHander, $string)){
				die('the log file can not be written!');
			}
		}
		
		public function __destruct()
		{
			if($this->fileHander!=null){
				fclose($this->fileHander);
			}
		}
		
	}
	
	$log = new Lib_Log();
	$log->writeLog('the error debug!');
	echo "</pre>";
	
?>