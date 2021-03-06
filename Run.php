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
    private $controller;
    private $function;

    private $controller_ext;
    private $controller_root;

    public static $config;
    public static $db_config;

    public static $db_instance;

    public function __construct()
    {
        self::$config = Config::getConfig();
        self::$db_config = DbConfig::getConfig();
        $this->controller_ext = self::$config['Web']['Controller_Root'];
        $this->controller_root = $this->controller_ext.DIRECTORY_SEPARATOR;
    }

    /**
     * 初始化 控制器
     * @return $this
     */
    private function initController()
    {
        $controller = trim($_GET[self::$config['Web']['Controller_Name']]) ? trim($_GET[self::$config['Web']['Controller_Name']]) : self::$config['Web']['Controller_Def'];
        $function = trim($_GET[self::$config['Web']['Function_Name']]) ? trim($_GET[self::$config['Web']['Function_Name']]) : self::$config['Web']['Function_Def'];
        $this->controller = $controller;
        $this->function = $function;

        $controller_root = $this->controller_root.$this->controller.$this->controller_ext.".php";
        if(file_exists($controller_root)){
            include_once $controller_root;
            return $this;
        }else{
            exit($controller. " Controller not fund");
        }
    }

    /**
     * 初始化 数据库
     * @return $this
     */
    private function initDb()
    {
        self::$db_instance = new Db(self::$db_config['Db_HOST'],self::$db_config['Db_USER'],self::$db_config['Db_PASS'],self::$db_config['Db_NAME']);
        return $this;
    }

    /**
     * 初始化 应用程式
     * @return $this
     */
    private function initApp()
    {
        date_default_timezone_set(self::$config['Web']['TimeZone']);
        if(self::$config['Web']['Debug'] == 'true'){
            ini_set('display_errors', 'On');
        }else{
            ini_set('display_errors', 'Off');
        }

        $this->initDb();
        $this->initController();

        return $this;
    }

    /**
     * 驱动应用程序
     * @return mixed
     */
    public function appRun()
    {
        $this->initApp();
        $path = $this->controller.$this->controller_ext;
        $controller_obj = new $path();
        return $controller_obj->{$this->function}();
    }
}