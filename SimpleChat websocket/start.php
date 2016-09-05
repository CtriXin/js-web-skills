<?php 
use \Workerman\Worker;
use \Workerman\WebServer;
use \GatewayWorker\Gateway;
use \GatewayWorker\BusinessWorker;

// 自动加载类
require_once __DIR__ . '/../../Workerman/Autoloader.php';

// gateway 进程
$gateway = new Gateway("Websocket://0.0.0.0:1145");
// 名称，以便status时查看方便
$gateway->name = 'SenderGateway';
// 进程数，建议与cpu核数相同
$gateway->count = 1;
// 分布式部署时需要设置成内网ip
$gateway->lanIp = '127.0.0.1';
// 内部通讯起始端口，假如$gateway->count=4，起始端口为4000
// 则一般会使用4001 4002 4003 4004 4个端口作为内部通讯端口 
$gateway->startPort = 48000;
// 心跳间隔
$gateway->pingInterval = 10;
// 心跳数据
$gateway->pingData = '{"type":"ping"}';

/* 
// 当客户端连接上来时，设置连接的onWebSocketConnect，即在websocket握手时的回调
$gateway->onConnect = function($connection)
{
    $connection->onWebSocketConnect = function($connection , $http_header)
    {
        // 可以在这里判断连接来源是否合法，不合法就关掉连接
        // $_SERVER['HTTP_ORIGIN']标识来自哪个站点的页面发起的websocket链接
        if($_SERVER['HTTP_ORIGIN'] != 'http://www.workerman.net')
        {
            $connection->close();
        }
        // onWebSocketConnect 里面$_GET $_SERVER是可用的
        // var_dump($_GET, $_SERVER);
    };
}; 
*/

// bussinessWorker 进程
$worker = new BusinessWorker();
// 名称
$worker->name = 'SenderBusinessWorker';
// 进程数
$worker->count = 1;


// WebServer
$web = new WebServer('http://0.0.0.0:1146');
// WebServer进程数
$web->count = 1;
// 设置域名与站点目录映射关系
$web->addRoot('www.your_domain.com', __DIR__.'/Web');


// 如果不是在根目录启动，则运行runAll方法
if(!defined('GLOBAL_START'))
{
    Worker::runAll();
}
