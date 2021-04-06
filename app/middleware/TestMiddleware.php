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


class TestMiddleware
{
    public function handle()
    {
        return false;
    }

    public function return()
    {
        echo "AuthFiled";
    }
}
