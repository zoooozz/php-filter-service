<?php

namespace app\models;
use app\Foundation\Model;

class filterKeywords extends Model
{   
    public function __construct()
    {
        parent::__construct('moon_filter');
    }

    public function getBykeywords()
    {
        $items = $this->query("SELECT `keywords` FROM filter_keywords")->fetchAll(\PDO::FETCH_ASSOC);
        return $items;
    }   

    public function getBySensitiveName($keywords)
    {
    	$keywords = "\"$keywords\"";
    	$items = $this->query("SELECT `keywords` FROM filter_keywords WHERE keywords = {$keywords}")->fetch(\PDO::FETCH_ASSOC);
        return $items;
    }

    public function addSensitive($params)
    {
		$mode = $this->prepare("INSERT INTO filter_keywords set keywords=:keywords");
        $mode->execute($params);
        return $this->lastInsertId();
    }
}
