<?php
use React\EventLoop\Factory;
use React\Http\HttpServer;
use React\Http\Server;
use React\Socket\SocketServer;
use Reactificate\Websocket\Middleware;
use Reactificate\Websocket\Prebuilt\Servers\ChatServer;

require 'vendor/autoload.php';

$wsServers = Middleware::create(new ChatServer());

$socket = new SocketServer('127.0.0.1:8800');
$server = new HttpServer(...$wsServers);
$server->listen($socket);

echo "Websocket server started\n";
