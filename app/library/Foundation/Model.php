<?php

/**
 *  pdo 链接数据库模式.
 *
 *  @param $database 数据库
 */

namespace app\Foundation;

class Model
{
    protected $_database = 'default';

    protected $_db;

    public function __construct($database = 'default')
    {
        $this->_database = $database;
        $this->connect();
    }

    protected function connect()
    {
        $db = include ROOT.'/conf/database.php';        
        $config = $db[$this->_database];

        try {
            $this->_db = new \PDO(
              $config['connection_string'],
              $config['username'],
              $config['password'],
              $config['driver_options']
            );
            $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $this;
        } catch (\PDOException $e) {
            echo '数据库连接失败：'.$e->getMessage();
            exit;
        }
    }

    public function __call($method, $arguments)
    {
        if ($this->_db && method_exists($this->_db, $method)) {
            return call_user_func_array([$this->_db, $method], $arguments);
        }

        return false;
    }
}
