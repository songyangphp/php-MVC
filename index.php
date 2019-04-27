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
date_default_timezone_set('PRC');
ini_set('display_errors', 'On');

include_once "Run.php";

$controller = $_GET['c'];
$function = $_GET['f'];

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "123456";
$db_name = "qyjg";

(new Run())->initController($controller,$function)->initModel($db_host,$db_user,$db_pass,$db_name)->appRun();