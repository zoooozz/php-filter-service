<?php

/**
 *   模块方法主入口.
 *
 *   @param getBySensitive  检索过滤词
 *   @param importSensitive 更新检索词
 *   @param addSensitive    敏感词新增 
 */

namespace app;

use app\sensitive\sensitive;

class Handler
{
    public function getBySensitive($params)
    {
        return sensitive::getBySensitive($params);
    }

    public function importSensitive()
    {
        return sensitive::importSensitive();
    }

    public function addSensitive($params)
    {
        return sensitive::addSensitive($params);

    }



}