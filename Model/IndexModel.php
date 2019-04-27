<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 16:13
 */
include_once "Model.php";
class IndexModel extends Model
{
    protected $table_name = "qy_company";

    public function getRow()
    {
        return (new Model())->getList();
    }
}