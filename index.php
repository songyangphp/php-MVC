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

(new Run())->appRun();