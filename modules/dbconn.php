<?php
require_once "db.php";
class MySQL
{   
        //MySQL主机地址
        private $_host;
        //MySQL用户名
        private $_user;
        //MySQL用户密码
        private $_password;
        //指定数据库名称
        private $_database;
        //MySQL数据库端口号
        private $_port;
        private $_socket;
        //当前数据库对象
        private $_dbObj;
        //数据库表
        private $_table;
        //数据库表对象
        private $_tableObj;
        // 最近错误信息
        protected $error            =   '';
        // 数据信息
        protected $data             =   array();
        // 查询表达式参数
        protected $options          =   array();
        protected $_validate        =   array();  // 自动验证定义
        protected $_auto            =   array();  // 自动完成定义
        protected $_map             =   array();  // 字段映射定义
        protected $_scope           =   array();  // 命名范围定义
        // 链操作方法列表
        protected $methods          =   array('strict','order','alias','having','group','lock','distinct','auto','filter','validate','result','token','index','force');
    
        private $_host;
    public function __construct($host, $user, $passowrd, $database, $port = 3306)
    {
        $this->_initialize();
        if (!isset($host) || !isset($user) || !isset($passowrd) || !isset($database)) {
            return false;
        } else {
            $this->_host = $host;
            $this->_user = $user;
            $this->_password = $passowrd;
            $this->_database = $database;
            $this->_port = $port;
            $_dbObj = new mysqli($host, $user, $passowrd, $database, $port);
            if ($_dbObj->connect_errno) {
                $this->error = $_dbObj->connect_error;
                return false;
            } else {
                $this->_dbObj = $_dbObj;
                return $this;
            }
        }
    }
}
