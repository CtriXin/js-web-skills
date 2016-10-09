<?php

// Swoole提供了多端口监听的机制，这样可以同时监听UDP和TCP，同时监听内网地址和外网地址。内网地址和端口用于管理，外网地址用于对外服务。

$serv = new swoole_server("0.0.0.0", 9501);

$serv->set(array(
    'daemonize' => 1, //
    'heartbeat_idle_time' => 600,//连接如果600秒内未向服务器发送任何数据，此连接将被强制关闭
    'heartbeat_check_interval' => 60,//每60秒遍历一次
));

//这里监听了一个UDP端口用来做内网管理
$serv->addlistener('127.0.0.1', 9502, SWOOLE_SOCK_UDP);


$serv->on('connect', function ($serv, $fd) {
    echo "Client:Connect.\n";
    // $serv->send($fd, 'server:hello world!');
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $info = $serv->connection_info($fd, $from_id);
    // var_dump($info);
    // $data=trim($data);
    if (strlen($data)<5) {
        return;
    }
    echo 'receive:'.$data;
    //来自9502的内网管理端口
    if($info['server_port'] == 9502) {
        $serv->send($fd, "welcome admin2\n");
    }
    //来自外网
    else {
        broadcast($serv,$data);
        // $serv->send($fd, $data);
    }
});

$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});
$serv->start();

function broadcast($serv,$msg){
    foreach($serv->connections as $fd)
    {
        $serv->send($fd, $msg);
    }

    echo "have sent $msg, current ".getCurrentUserCount($serv). " users\n";
}

function getCurrentUserCount($serv){
    return count($serv->connections);
}