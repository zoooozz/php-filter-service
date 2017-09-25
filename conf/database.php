<?php

/**
 * @var 数据库连接 
 * moon_filter 过滤词库
 * 
 */

return [

    'moon_filter' => [
        'connection_string' => 'mysql:host=127.0.0.1;dbname=moon_filter',
        'username' => 'root',
        'password' =>'root',
        'driver_options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_PERSISTENT => false, 
            PDO::ATTR_TIMEOUT => 3600,
        ],
    ],

];
