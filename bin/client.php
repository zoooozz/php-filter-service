<?php
       
    /**
     * @var    客户端调用调用实列
     * @param  SensitiveWords  过滤词 返回命中的过滤词
     * @param  sensitiveImport 生成新的过滤词
     */

    define('ROOT', __DIR__.'/..');
    require ROOT.'/vendor/autoload.php';
    $stime = microtime(true);
    $client = new \Hprose\Socket\Client('tcp://127.0.0.1:2017', false);
    



    // $params = [    
    //     'keywords'=> "李狗蛋",
    // ];

    // $client->addSensitive($params,function ($result, $args, $error) {
    //     print_r($result);
    // });



    // $params = [    
    //     'keywords'=> "李狗蛋",
    // ];



    // $client->getBySensitive($params,function ($result, $args, $error) {
    //     print_r($result);
    // });


 


    // $client->importSensitive(function ($result, $args, $error) {
    //     print_r($result);
    // });



   
    

