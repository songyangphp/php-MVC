<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 11:10
 */

include_once "Controller.php";
include_once "Model/IndexModel.php";

class IndexController extends Controller
{
    private static $model;

    public function __construct()
    {
        parent::__construct();
        self::$model = (new IndexModel());
    }

    public function index()
    {
        /*var_dump(self::$model->getList());*/
        $this->display();
    }
}