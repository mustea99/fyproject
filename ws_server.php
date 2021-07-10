<?php
use React\EventLoop\Factory;
use React\Http\Server;
use Reactificate\Websocket\Middleware;
use Reactificate\Websocket\Prebuilt\Servers\ChatServer;

require 'vendor/autoload.php';

$loop = Factory::create();

$wsServers = Middleware::create(new ChatServer());

$socket = new \React\Socket\Server(8001, $loop);
$server = new Server($loop, ...$wsServers);
$server->listen($socket);

echo "Websocket Server Started\n";

$loop->run();
