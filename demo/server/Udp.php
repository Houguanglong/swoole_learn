<?php
/**
 * User: 侯光龙
 * FileName: 文件名称
 * Date: 2019/3/22
 * Time: 0:27
 */
$udp = new swoole_server('127.0.0.1',9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

$udp->set([
    'worker_num'=>4,
    'max_request'=>50
]);

/**
 * @param int $fd  客户端链接用户的唯一标识
 * @param int $reactor_id 线程id号
 */
//监听连接进入事件
$udp->on('connect', function ($udp, $fd,$reactor_id) {
    echo "Client: {$fd}-{$reactor_id}-Connect.\n";
});

$udp->on('Packet',function ($udp,$data,$clientInfo){
   $udp->sendto($clientInfo['address'],$clientInfo['port'],"Server ".$data);
   var_dump($clientInfo);exit();
});

//监听连接关闭事件
$udp->on('close', function ($udp, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$udp->start();


