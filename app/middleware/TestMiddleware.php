<?php
/**
 * TestMiddleware.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 10:05
 */

namespace app\middleware;

use kyon\Middleware;

class TestMiddleware extends Middleware
{
    public function handle()
    {
        return true;
    }

    public function return()
    {
        echo "AuthFiled";
    }
}
