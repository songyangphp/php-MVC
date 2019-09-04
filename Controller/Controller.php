<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 13:23
 */

class Controller
{
    private $_view_root;

    private $controller;
    private $function;

    public function __construct()
    {
        $this->controller = $_GET['c'] ? $_GET['c'] : "Index";
        $this->function = $_GET['f'] ? $_GET['f'] : "index";
        $this->_view_root = Run::$config['Web']['View_Root'].DIRECTORY_SEPARATOR;

        //定义 魔术常量
        define("_CONTROLLER_",$this->controller);
        define("_FUNCTION_",$this->function);
    }

    /**
     * 加载模板
     * @param string $tmp_file
     * @return mixed
     */
    protected function display($tmp_file = '')
    {
        $view = $this->_view_root;
        if(!$tmp_file){
            $view .= $this->controller.DIRECTORY_SEPARATOR.$this->function;
        }else{
            if(strpos($tmp_file,DIRECTORY_SEPARATOR) !== false){
                $array = explode(DIRECTORY_SEPARATOR,$tmp_file);
                $controller = $array[0];
                $function = $array[1];

                $view .= $controller.DIRECTORY_SEPARATOR.$function;
            }else{
                $view .= $this->controller.DIRECTORY_SEPARATOR.$tmp_file;
            }
        }

        $view .= ".html";
        if(file_exists($view)){
            return include_once $view;
        }else{
            exit($tmp_file. " View not fund");
        }
    }
}