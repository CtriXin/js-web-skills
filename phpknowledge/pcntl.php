<?php


SignalIgnore();//linux 进程中运行，无视关闭命令窗口
ignore_user_abort(true);
$pid=pcntl_fork();
if($pid==-1) {
	die('cannot fork');
}elseif ($pid) {
	//parent
	
	// pcntl_wait($status);//父进程没用可以关闭
	echo 'parent_id'.getmygid();
	echo 'parent_id'.$pid;
}else{
	//child
	echo 'child_id'.$pid.'mypid '.getmygid();
	echo 'begin';
	for ($i=0; $i < 5; $i++) { 
		
		// $f=fopen('fork.txt', 'w+');//这个不好，会清空原有数据
		$f=fopen('fork.txt', 'a+');

		fwrite($f, $i.time()."\n");
		sleep(10);
	}
	echo 'end';
}


function SignalIgnore()
	{
		pcntl_signal(SIGPIPE, SIG_IGN);
		pcntl_signal(SIGTTIN, SIG_IGN);
		pcntl_signal(SIGTTOU, SIG_IGN);
		pcntl_signal(SIGQUIT, SIG_IGN);
		pcntl_signal(SIGALRM, SIG_IGN);
		pcntl_signal(SIGINT, SIG_IGN);
		pcntl_signal(SIGUSR1, SIG_IGN);
		pcntl_signal(SIGUSR2, SIG_IGN);
		pcntl_signal(SIGHUP, SIG_IGN);
		pcntl_signal_dispatch();
	}

// echo "\033[1A\n\033[K-----------------------\033[47;30m WORKERMAN \033[0m-----------------------------\n\033[0m";
// echo Test();
// echo Test();
// echo Test();
// echo Test();
// function Test()
//    {
//    static $w3sky = 0;
//    echo $w3sky;
//    $w3sky++;
//    return $w3sky;
//    }


// if ($a=0) {
// 	echo $a;
// 	echo 'aaa';
// }



// function foobar($arg, $arg2) {
//     echo __FUNCTION__, " got $arg and $arg2\n";
// }
// class foo {
//     function bar($arg, $arg2) {
//         echo __METHOD__, " got $arg and $arg2\n";
//     }
// }


// // Call the foobar() function with 2 arguments
// call_user_func_array('foobar', array('one', 'two'));

// // Call the $foo->bar() method with 2 arguments
// $foo = new foo;
// call_user_func_array(array($foo, 'bar'), array("three", "four"));




// function one($str1, $str2)
//  {
//  two("Glenn", "Quagmire");
//  }
// function two($str1, $str2)
//  {
//  three("Cleveland", "Brown");
//  }
// function three($str1, $str2)
//  {
//  print_r(debug_backtrace());
//  }

// one("Peter", "Griffin");





// echo addslashes('str aa');

// $arr=json_decode('{"errcode":40003,"errmsg":"invalid openid"}',true);
// echo $arr['errcode'];

// imei: 10731 | timestamp: 1428644482 | nonce: 0000000000 | signature: 0ea49d34b81011970e7bf50667679fd4ed7d3e05 [] []
// echo sha1('1073114286450745550000000000kcurimnfgmkfmfl');
//   num_to_avenue('1001');
//     //数据库查询的街道号转换成文字
//    function num_to_avenue($num){
//     $str='1001:翠竹街道\n1002:东湖街道\n1003:东门街道\n1004:东晓街道\n1005:桂园街道\n1006:黄贝街道\n1007:莲塘街道\n1008:南湖街道\n1009:清水河街道\n1010:笋岗街道\n2001:福田保税区\n2002:福田街道\n2003:华富街道\n2004:莲花街道\n2005:梅林街道\n2006:南园街道\n2007:沙头街道\n2008:香蜜湖街道\n2009:园岭街道\n2010:华强北街道\n3001:南山街道\n3002:南头街道\n3003:沙河街道\n3004:蛇口街道\n3005:桃源街道\n3006:西丽街道\n3007:粤海街道\n3008:招商街道\n4001:新安街道\n4002:福永街道\n4003:西乡街道\n4004:沙井街道\n4005:松岗街道\n4006:石岩街道\n5001:坂田街道\n5002:布吉街道\n5003:平湖街道\n5004:横岗街道\n5005:南湾街道\n5006:坪地街道\n5007:龙城街道\n5008:龙岗街道\n6001:海山街道\n6002:梅沙街道\n6003:沙头角街道\n6004:盐田街道\n7001:观澜街道\n7002:大浪街道\n7003:龙华街道\n7004:民治街道\n8001:光明街道\n8002:公明街道\n9001:坪山街道\n9002:坑梓街道\n10001:大鹏街道\n10002:葵涌街道\n10003:南澳街道';
// // var_dump(explode('\n', $str));
// $arr=explode('\n', $str);
// foreach ($arr as $key => $value) {
//   // echo $value.' ';
//   if (strpos($value,$num)===0) {
//     $arr1=explode(':', $value);
//     // echo $value;
//     var_dump($arr1);
//     break;
//   }
// }
//     echo $arr1[1];
//     return $arr1[1];
//   }



// if ((1100/10)==floor('11001'/100)) {
//   echo 'equal';
// }

// echo floor('5014'/100);


// echo '111',"\n";

// file_get_contents() 函数把整个文件读入一个字符串中。file() 函数把整个文件读入一个数组中。


// $path = "/testweb/home.php";
// //显示带有文件扩展名的文件名
// echo basename($path);
// //显示不带有文件扩展名的文件名
// echo basename($path,".php");


// if(!isset($argv[1]))
// {
//    exit("use php test.php \$file_path\n");
// }
// var_dump($argv);


// echo pi();

// echo strlen('<?xml version="1.0" encoding="ISO-8859-1"?
//   <request>
//   <module>user</module>
//   <action>getInfo</action>
//   </request>');

// echo 222&127;

// if ([]) {
// 	echo 'has';
// }

// echo 0+'';

// if (0!=='0') {
// 	echo '!';
// }
// if (0!=='') {
// 	echo '!';
// }


// echo ceil('50'/120);
// echo intval('2015-04-01 09:33:50');
// echo date('Y-m-d',time());
// echo strtotime("today");
// echo time();
// echo time()-strtotime("today");//获取0点到现在的秒数
// $arr=array();
// if ($arr) {
// 	echo '11';
// }else{
// 	echo '2';
// 
// $an=['这是什么验证码','验证码','验证码。','验证码，谢谢','验证码是多少','验证码是什么','这什么验证码','码','我想知道验证码','帮我读验证码','啥验证码','验证码呢','瞧下验证码','验证码帮我看看，谢谢','验证码多少呀','看下什么文字','谢谢','这什么','谢谢~~','帮我看下哈','验证码，多少？','验证马多少','验证码？？','什么字','什么东西','帮俺看下','这是多少呢'];
// echo $an[mt_rand(0,count($an)-1)];

// if (!'') {
// 	echo '!';
// }

