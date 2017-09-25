
## 敏感词服务模块(filter_service)

### 项目基础信息
    
    敏感词提供检测服务
    词库200万
    检测词 200文本
    耗时24ms

### 项目架构
    
    基础依赖扩展
        
        PHP环境 php >= 7.0
    
        swoole >= 2.0
    
        
    敏感词依赖扩展

        php-ext-trie-filter
    
        libdatrie-0.2.4
    
    
### 项目文档说明

SQL

CREATE TABLE `filter_keywords` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `keywords` varchar(16) NOT NULL DEFAULT '' COMMENT '关键词',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
    

敏感词检测

getBySensitive

参数 | 类型 | 必填 | 说明
---|---| --- | ---
keywords |string | Y | 关键词
replace     |string    |N  | 替换符号


敏感词生成

importSensitive

参数 | 类型 | 必填 | 说明
---|---| --- | ---

addSensitive 新增敏感词

参数 | 类型 | 必填 | 说明
---|---| --- | ---
keywords |string | Y | 关键词
replace     |string    |N  | 替换符号
