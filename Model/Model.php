<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 15:54
 */

include_once "Db.php";

/**
 * 模型类
 * Class Model
 */
class Model
{
    protected $table_name;
    protected static $db = null;

    public function __construct()
    {
        self::$db = (new Db());
    }

    /**
     * 获取列表
     * @return array
     */
    protected function getList()
    {
        $sql = "SELECT * FROM `".$this->table_name."`";
        return self::$db->query($sql);
    }
}