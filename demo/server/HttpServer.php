<?php
/**
 * User: 侯光龙
 * FileName: 文件名称
 * Date: 2019/3/23
 * Time: 13:54
 */
use Swoole\Http\Server;
//创建http_server服务器 监听127.0.0.1:8811端口
$http = new Server('0.0.0.0',8811);
$http->on('request',function ($request,$response){
    $response->end("<h1>Http-server</h1>");
});

$http->start();