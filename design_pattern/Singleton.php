<?php

class Singleton {
    private static $_instance = NULL;

    // 私有构造方法
    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Singleton();
        }
        return self::$_instance;
    }

    // 防止克隆实例
    public function __clone(){
        die('Clone is not allowed.' . E_USER_ERROR);
    }
}
?>