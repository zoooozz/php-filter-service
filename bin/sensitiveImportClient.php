<?php
       
    /**
     * @var    敏感词定时写入
     * @param  importSensitive 生成新的过滤词
     */

    define('ROOT', __DIR__.'/..');
    require ROOT.'/vendor/autoload.php';
    use app\Foundation\Log;

    swoole_timer_tick(100000, function ($timer_id) {
		$config = include ROOT.'/conf/service.php';
    	echo "定时任务执行中....\n";
    	$client = new \Hprose\Socket\Client($config['host'].':'.$config['port'], false);
    	$items = $client->importSensitive();
    	Log::write('INFO',"测试");
  
    });

