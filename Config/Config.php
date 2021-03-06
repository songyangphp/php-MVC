<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-27
 * Time: 9:20
 */

/**
 * 框架惯例配置
 */
class Config{
    public static function getConfig()
    {
        $config = [
            "Web" => [
                "Controller_Def" => "Index", // 默认控制器
                "Controller_Root" => "controller", // 默认控制器目录
                "Function_Def" => "index", // 默认方法
                "TimeZone" => "PRC", // 默认时区 （中华人民共和国 东八区）
                "Controller_Name" => "c", // 默认控制器url参数名
                "Function_Name" => "f", // 默认方法url参数名
                "Debug" => "true", // 开发阶段建议开启
                "View_Root" => "View" // 默认模板目录
            ]

        ];

        return $config;
    }
}
