<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 10:46
 */
include_once "Db.php";

/**
 * Class Run
 * 应用程序引导类
 */
class Run
{
    const CONTROLLER_ROOT = "Controller/";
    const CONTROLLER_EXT = "Controller";

    private $controller;
    private $function;

    /**
     * 初始化 控制器
     * @param $controller
     * @param $function
     * @return $this
     */
    public function initController($controller, $function)
    {
        $this->controller = $controller ? $controller : "Index";
        $this->function = $function ? $function : "index";

        $controller_root = self::CONTROLLER_ROOT.$this->controller.self::CONTROLLER_EXT.".php";

        if(file_exists($controller_root)){
            include_once $controller_root;
            return $this;
        }else{
            exit($controller. " Controller not fund");
        }
    }

    /**
     * 初始化 数据库
     * @param $db_host
     * @param $db_user
     * @param $db_pass
     * @param $db_name
     * @return $this
     */
    public function initModel($db_host,$db_user,$db_pass,$db_name)
    {
        new Db($db_host,$db_user,$db_pass,$db_name);
        return $this;
    }

    /**
     * 驱动应用程序
     * @return mixed
     */
    public function appRun()
    {
        $path = $this->controller.self::CONTROLLER_EXT;
        $controller_obj = new $path();
        return $controller_obj->{$this->function}();
    }

    /**
     * 关闭数据库连接
     */
    public function __destruct()
    {
        $db = new Db();
        if($db) $db->close();
    }
}