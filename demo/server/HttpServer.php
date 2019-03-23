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

//设置请求访问静态资源自动查找文件目录
$http->set([
    'enable_static_handler'=>true,
    'document_root'=>'/home/learn/bd_git/swoole_learn/demo/data'
]);

//监听http请求 $request 为http请求对象 $response为http响应对象
$http->on('request',function ($request,$response){
    print_r($request->get); //获取请求get数据
    $response->cookie('houguang','very good',120);  //设置客户端cookie时间
    $response->end("<h1>Http-server</h1>".$request->get['age']); //end方法响应返回内容
});

//开启httpserver服务
$http->start();