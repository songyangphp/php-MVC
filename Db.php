<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 10:20
 */

/**
 * Db类 （PDO）
 * Class Model
 */
class Db
{
    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_name;
    protected $db_type = "mysql";

    private static $pdo = null;
    private $dsn;

    public function __construct($db_host = '',$db_user = '',$db_pass = '',$db_name = '',$db_type = "")
    {
        if(self::$pdo){
            return self::$pdo; //保证唯一实例
        }

        if(!$db_host || !$db_user || !$db_pass || !$db_name){
            exit("Db init Error");
        }

        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        if($db_type){
            $this->db_type = $db_type;
        }

        $this->dsn = $this->db_type.":dbname="."$this->db_name".";"."host=".$this->db_host;
        self::$pdo = new PDO($this->dsn,$this->db_user,$this->db_pass);
    }

    /**
     * 查询方法
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        if(!$sql){
            exit("Sql is Null");
        }
        try{
            $sth = self::$pdo->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll();
            foreach ($result as $k => $v){
                foreach ($v as $key => $value){
                    if(is_int($key)){
                        unset($result[$k][$key]);
                    }
                }
            }
            return $result;
        }catch (Exception $exception){
            exit($exception->getMessage());
        }
    }

    public function close()
    {
        self::$pdo = null;
    }
}