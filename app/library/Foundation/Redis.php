<?php

/**
 * @var redis 实列
 * 功能  
 */

namespace app\Foundation;

class Redis
{
    private static $config;

    public static function configure($config)
    {
        static::$config = $config;

        return true;
    }

    public static function getRedisInstance()
    {
        $redis = new Redis();
        $redis->connect(self::$config['host'], self::$config['port']);
        return $redis;
    }
}
