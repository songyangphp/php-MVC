<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-27
 * Time: 9:27
 */

/**
 * 数据库配置
 */

class DbConfig{
    public static function getConfig()
    {
        $Dbconfig = [
            "Db_HOST" => "127.0.0.1",
            "Db_USER" => "root",
            "Db_PASS" => "123456",
            "Db_NAME" => "song",
        ];

        return $Dbconfig;
    }
}
