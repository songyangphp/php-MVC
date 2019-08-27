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
    protected $table_name = "s_user";

    public function getRow()
    {
        return $this->getList();
    }

    public function insert($data = [])
    {
        return $this->insertData($data);
    }
}