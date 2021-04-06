<?php
/**
 * cmd.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 9:02
 */

use kyon\RunTime;

require_once "vendor/autoload.php";
Runtime::start();

$shell = new \app\http\Shell();

if(isset($argv[1]) && method_exists($shell,$argv[1])){
    call_user_func(array($shell,$argv[1]),[
        "argv" => $argv
    ]);
}else{
    $shell->help();
}
