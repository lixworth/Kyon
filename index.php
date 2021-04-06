<?php
/**
 * index.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 9:00
 */

use kyon\Router;
use kyon\RunTime;

require_once "vendor/autoload.php";
Runtime::start();
$router = new Router();
$router->get("/",function (){
    echo "HelloWorld";
});

$router->get('/hello',"app\http\Hello@index","app\middleware\TestMiddleware");
$router->dispatch();
