<?php
/**
 * Hello.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 9:49
 */

namespace app\http;


use app\Application;

class Hello extends Application
{
    public function index()
    {
        $this->negative("OK",["user" => "2333"]);
    }
}
