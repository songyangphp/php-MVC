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

(new Run())->initController()->initModel()->appRun();