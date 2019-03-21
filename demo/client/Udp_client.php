<?php
/**
 * User: 侯光龙
 * FileName: 文件名称
 * Date: 2019/3/22
 * Time: 0:27
 */
$udp_client = new swoole_client(SWOOLE_SOCK_UDP);

//php cli常量 STDOUT
fwrite(STDOUT,'请输入消息:');
//获取客户端输入的内容数据 STDIN可以拿到在dos下输入的内容，fgets读取这个STDIN文件句柄
$msg = trim(fgets(STDOUT));


$send_result = $udp_client->sendto('127.0.0.1',9502,$msg);
if($send_result == false){
    echo '发送数据失败!';
    exit;
}


$server_msg = $udp_client->recv($size=65535,$watill=0);
echo $server_msg;