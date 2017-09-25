<?php 

/**
 * @var 敏感词模块
 * 功能 敏感词获取
 */

namespace app\sensitive;

use app\Foundation\Response;
use app\Foundation\Log;

use app\sensitive\sensitiveOutput;
use app\Enumeration;
use app\Foundation\Ecode;
class sensitive
{

    /**
     * @var 敏感词获取
     * @param array $params
     * $params ['keywords']
     */

    public static function getBySensitive($params)
    {
    	$items = [];
        if($params['keywords'] == ''){
        	return $items;
        }
        $content = $params['keywords'];
		$resp = trie_filter_load(Enumeration::SENSSITVE_FILE);

        $tree = trie_filter_search_all($resp, $content);
        $items = sensitiveOutput::getByHitTxt($content, $tree);

        if(isset($params['replace']) && trim($params['replace'])!=""){
            
            $keywords = array_combine($items,array_fill(0,count($items),$params['replace']));
            $content = strtr($content, $keywords);
            $items = [];
            $items['content'] = $content;

        }
        return Response::_end(['data'=>$items,'msg'=>'请求成功'],Ecode::SUCCESS);
    }

    /**
     * @var 更新敏感词
     * @param array []
     */

    public static function importSensitive()
    {
    	$items = sensitiveOutput::savekeywords();
    	return $items;
    }

    /**
     * @var 新增一个敏感词
     */

    public static function addSensitive($params)
    {
        $keywords = $params['keywords'];
        $items = sensitiveOutput::getBySensitiveName($keywords);
        if($items!=""){
            return Response::_end(['msg'=>'敏感词已存在'],Ecode::PARAM_ERROR);
        }
        $item['keywords'] = $keywords;
        $items = sensitiveOutput::addSensitive($item);
        if($items){
            sensitiveOutput::savekeywords();
            return Response::_end(['msg'=>'敏感词添加成功'],Ecode::SUCCESS);
        }
        return Response::_end(['msg'=>'敏感词添加失败'],Ecode::RET_ERROR);
    }

}