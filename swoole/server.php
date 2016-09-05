<?php

//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501); 
//设置异步任务的工作进程数量
$serv->set(array('task_worker_num' => 4));

//监听连接进入事件
$serv->on('connect', function ($serv, $fd) {  
    echo "Client: Connect \n";
    var_dump($serv);
    // var_dump($fd);
});


$serv->on('receive', function($serv, $fd, $from_id, $data) {
    //投递异步任务
    $task_id = $serv->task($fd);
    
    echo "Dispath AsyncTask: id=$task_id\n";
});

//处理异步任务
$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    echo "New AsyncTask[id=$task_id]".PHP_EOL;
    //返回任务执行的结果
    sleep(5);
    $serv->finish("$data -> OK$from_id");
    $serv->send($data, "Server: ".$data);
});

//处理异步任务的结果
$serv->on('finish', function ($serv, $task_id, $data) {
    echo "AsyncTask[$task_id] Finish: $data".PHP_EOL;

});


//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$serv->start(); 