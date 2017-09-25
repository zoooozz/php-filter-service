<?php

/**
 * 	@var 统一错误码集合
 * 	功能:
 * 	错误码提供
 *  @todo  开发中 未完成
 */

namespace app\Foundation;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{

	
	protected static $config;
    protected static $data = [];
    protected static $level;

    public static function write($level, $params)
    {
        $item = [];
        $item['query'] = $params;
        $config = include ROOT.'/conf/service.php';        
        $logs = stripslashes(json_encode($item, JSON_UNESCAPED_UNICODE));
        static::$config = $config;
        static::$data = $logs;
        static::$level = strtoupper($level);

        $source_name = $config['name'];
        $file = date("Ymd");
        $basePath = $config['basePath']."/".$source_name.'/'.$file.'.log';
        $log = new Logger($source_name);
        $log->pushHandler(new StreamHandler($basePath));
        call_user_func_array(array(__NAMESPACE__ .'\Log', static::$level), array($log));
    }

   
    public static function __callStatic($name, $log)
    {
        return true;
    }

    public static function ERROR($log)
    {
        $log->addError(static::$data);
    }
    public static function INFO($log)
    {
        $log->addInfo(static::$data);
    }
    public static function DEBUG($log)
    {
        $log->addDebug(static::$data);
    }
    public static function WARNING($log)
    {
        $log->addWarning(static::$data);
    }

}