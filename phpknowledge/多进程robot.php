#!/bin/env php
<?php
set_time_limit(0);
ignore_user_abort(true);
$max = 100;
$child = 0;
require_once "pic2text.php";

$pid = posix_getpid();
$file = fopen('pid.file', 'w');
fwrite($file, $pid);
fclose($file);
class reply
{	
	private $user,$password,$db,$connection,$startTime;
	private $baseUrl = 'http://helper.snewfly.com';
	function __construct()
	{
		$this->user = "root";
		$this->password = 'slfy2014';
		// $this->password = "(2014FlyHelper)";
		$this->db = "flyhelper";
		$this->startTime = time();
	}

	public function getSource()
	{	
		$timestamp = time();
		// $oldTime = $timestamp - 300;
		$oldTime = $timestamp;
		$date = date('Y-m-d H:i:s',$oldTime);
		$oldDate = date('Y-m-d H:i:s',$timestamp);
		$workTime = $this->judgeTime(time());
		if ($workTime) {
			// SELECT * FROM `messages` inner join device on messages.device_id = device.id where 1;
			$sql = 'select messages.id,messages.pic,messages.state from messages inner join device on messages.device_id = device.id where device.ver = 3 and messages.update_time < \''.$date.'\' and messages.state = 382';
		}
		else{
			$sql = 'select messages.id,messages.pic,messages.state from messages inner join device on messages.device_id = device.id where device.ver = 3 and messages.update_time < \''.$oldDate.'\' and messages.state = 382';
		}
		
		// var_dump($sql);
		$res = $this->connection->query($sql);		
		// var_dump($res);
		// var_dump($res->num_rows);
		if ($res->num_rows > 0) {
			// echo "\n rows:".$res->num_rows;
			while ($row = $res->fetch_assoc()) {
				$duringTime = time() - $this->startTime;
				if ($duringTime > 60) {
					return;
					}
				$id = $row['id'];
				$state = $this->getState($id);
				if ($state != 382) {
					continue;
				}
				$this->connection->query("update messages set state = 9 where id =$id");
				$img_url = $this->baseUrl.'/'.$row['pic'];
				// 注释
				$translateRes = getresult($img_url);
				// echo "\n"."messages come: ".mb_detect_encoding($translateRes);
				// echo '对的';
				if ($translateRes != 'error') {
					$this->connection->query("set names utf8");
					// echo "update messages set reply = '$translateRes',state = 41 where id = $id";
					$this->connection->query("update messages set reply = '$translateRes',state = 41 where id = $id");

				}
				else{
					$this->connection->query("update messages set state = 42 where id = $id");
				}
			}
		}
		// print_r($res);
	}

	public function connect()
	{
		$this->connection = new mysqli('localhost',$this->user,$this->password,$this->db);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
			return false;
		}
		else{
			return true;
		}
	}

	public function close()
	{
		if ($this->connection) {
			$this->connection->close();
		}	
	}

	private function getState($id)
	{
		$src = $this->connection->query("select state from messages where id = $id ");
		$stateArr = $src->fetch_assoc();
		return $stateArr['state'];
	}

	private function judgeTime($timestamp)
	{
		$tag = false;
		$hour = date('H',$timestamp);
		$minus = date('i',$timestamp);
		switch ($hour) {
			case ($hour >=9)&&($hour <12):
				$tag = true;
				break;
			case 12:
				if ($minus < 30) {
					$tag = true;
				}
				else{
					$tag = false;
				}
				break;
			case 13:
				if ($minus <30) {
					$tag = false;
				}
				else{
					$tag = true;
				}
				break;
			case ($hour > 14)&&($hour < 18):
				$tag = true;
				break;
			case 18:
				if ($minus < 30) {
					$tag = true;
				}
				else{
					$tag = false;
				}
				break;
			default:
				$tag = false;
				break;
		}
		return $tag;
	}

}


function sig_handler($sig){
	global $child;
	switch ($sig) {
		case SIGCHLD:
			echo 'SIGHLD received'."\n";
			$child--;
			break;
		default:
			break;
	}
}
pcntl_signal(SIGPIPE, SIG_IGN);
pcntl_signal(SIGTTIN, SIG_IGN);
pcntl_signal(SIGTTOU, SIG_IGN);
pcntl_signal(SIGQUIT, SIG_IGN);
pcntl_signal(SIGALRM, SIG_IGN);
pcntl_signal(SIGINT, SIG_IGN);
pcntl_signal(SIGUSR1, SIG_IGN);
pcntl_signal(SIGUSR2, SIG_IGN);
pcntl_signal(SIGHUP, SIG_IGN);
pcntl_signal(SIGCHLD, "sig_handler");
pcntl_signal_dispatch();
while (true) {
	$child++;
	$pid = pcntl_fork();
	if ($pid) {
		echo 'starting new child'."\n";
		if ($child >= $max) {
			pcntl_wait($status);
		}
		
	}
	else{
		while (true) {
			$robot = new reply();
			$robot->connect();
			$robot->getSource();
			$robot->close();
			sleep(2);
			echo "query come \n";
		}
	}
}


