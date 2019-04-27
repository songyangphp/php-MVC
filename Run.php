<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 10:46
 */
include_once "Db.php";
include_once "Config/Config.php";
include_once "Config/DbConfig.php";
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

    private static $config;
    private static $db_config;

    public function __construct()
    {
        self::$config = Config::getConfig();
        self::$db_config = DbConfig::getConfig();
    }

    /**
     * 初始化 控制器
     * @param $controller
     * @param $function
     * @return $this
     */
    public function initController()
    {
        $controller = $_GET[self::$config['Web']['Controller_Name']] ? $_GET[self::$config['Web']['Controller_Name']] : self::$config['Web']['Controller_Def'];
        $function = $_GET[self::$config['Web']['Function_Name']] ? $_GET[self::$config['Web']['Function_Name']] : self::$config['Web']['Function_Def'];
        $this->controller = $controller;
        $this->function = $function;

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
    public function initModel()
    {
        new Db(self::$db_config['Db_HOST'],self::$db_config['Db_USER'],self::$db_config['Db_PASS'],self::$db_config['Db_NAME']);
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