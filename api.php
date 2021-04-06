<?php
/**
 * api.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 9:00
 */

use kyon\Router;

echo "<pre>";
//print_r($_SERVER);
include "src/Router.php";
include "app/http/Hello.php";
include "app/middleware/TestMiddleware.php";

$router = new Router();
$router->get("/",function (){
    echo "HelloWorld";
});

$router->get('/hello',"app\http\Hello@index","app\middleware\TestMiddleware");
$router->dispatch();
