<?php

/**
 *   @var 服务端
 *   php server.php.
 *   supervisor server.php
 */



define('ROOT', __DIR__.'/..');
require ROOT.'/vendor/autoload.php';
$config = include ROOT.'/conf/service.php';


use Hprose\Swoole\Server;
use app\Handler;

$server = new Server($config['host'].':'.$config['port']);
$server->addInstanceMethods(new Handler());

$server->setDebugEnabled = true;
$server->start();
