<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 15:54
 */

include_once "Db.php";
include_once "Run.php";

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
        self::$db = Run::$db_instance;
    }

    /**
     * 获取列表
     * @return array
     */
    protected function getList()
    {
        $sql = "SELECT * FROM `{$this->table_name}`";
        return self::$db->query($sql);
    }

    /**
     * 插入数据
     * @param array $data
     * @return mixed
     */
    protected function insertData($data = [])
    {
        if(is_array($data)){
            $key = '';
            $value = '';
            foreach ($data as $k => $v){
                $key .= trim($k) . ",";
                $value .= "'".trim($v)."'" . ',';
            }

            $key = rtrim($key,',');
            $value = rtrim($value,',');

            $sql = "INSERT INTO `{$this->table_name}` ({$key}) VALUES ({$value})";
            return self::$db->exec($sql);
        }else{
            exit("\$data is not an array");
        }
    }
}