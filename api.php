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

$router = new Router();
$router->get("/",function (){
    echo "HelloWorld";
});

$router->dispatch();