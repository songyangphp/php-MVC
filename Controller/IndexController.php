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

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /*$last_id = (new IndexModel())->insert(['u_name' => "王龙" , 'u_tel' => '15832192235']);
        var_dump($last_id);*/
        /*var_dump((new IndexModel())->getRow());*/
        $this->display();
    }
}