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
            "Db_HOST" => "",
            "Db_USER" => "",
            "Db_PASS" => "",
            "Db_NAME" => "",
        ];

        return $Dbconfig;
    }
}
