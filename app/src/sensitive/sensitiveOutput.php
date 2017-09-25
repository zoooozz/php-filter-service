<?php 

/**
 * @var 敏感词处理器
 * @功能 
 * savekeywords 保存过滤词 
 * 
 */

namespace app\sensitive;

use app\models\filterKeywords;
use app\Enumeration;

class sensitiveOutput
{

   /**
    * @var 获取过滤词并保存
    */

	public static function savekeywords()
	{
		$keywords = (new filterKeywords())->getBykeywords();
		$resp = trie_filter_new();

		foreach ($keywords as $key => $value) {
			$item = trim($value['keywords']);
			if($item==""){
				continue;
			}
		    trie_filter_store($resp, $item);
		}
		
		$file = Enumeration::SENSSITVE_FILE;
		trie_filter_save($resp, $file);
		return true;
	}


	/**
	 * @var 根据树获取节点的文字
	 */

	public static function getByHitTxt($str, $resp)
	{
		$items = [];
        foreach ($resp as $key => $value) {
            $word = substr($str, $value[0], $value[1]);
            if (!in_array($word, $items)) {
                $items[] = $word;
            }
        }
        return $items;
	}

	/**
	 * @var 新增一个敏感词
	 */

	public static function addSensitive($params)
	{
		$items = (new filterKeywords())->addSensitive($params);
		return $items;
	}


	/**
	 * @var 获取敏感词
	 */
	
	public static function getBySensitiveName($keywords)
	{
		$items = (new filterKeywords())->getBySensitiveName($keywords);
		return $items;
	}
}