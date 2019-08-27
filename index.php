<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-25
 * Time: 9:53
 */
/**
 * 入口文件
 */
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ALL ^ E_NOTICE);



include_once "Run.php";

function loopArrayWriteFile($array, $file, $no = 0)
{
    $j = $no;
    foreach ($array as $k => $v){
        $space = "";
        for ($i = 0; $i <= $no; $i++){
            $space .= "   ";
        }

        if(is_array($v)){
            file_put_contents($file,$space . $k . " => ".PHP_EOL , FILE_APPEND | LOCK_EX);
            $this->loopArrayWriteFile($v, $file, $j+1);
            continue;
        }

        file_put_contents($file,$space . $k . " => ". $v.PHP_EOL , FILE_APPEND | LOCK_EX);
    }
}

(new Run())->initController()->initModel()->appRun();