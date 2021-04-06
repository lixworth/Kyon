<?php
/**
 * Shell.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 10:41
 */

namespace app\http;


use kyon\LoggerTemplate;
use kyon\RunTime;

class Shell
{

    public function __construct()
    {
    }

    public function help()
    {
        echo LoggerTemplate::info("Shell Helper [1.0]");
        echo LoggerTemplate::info("+ php cmd.php create");
        echo LoggerTemplate::info("Done! (".Runtime::end().")");
    }

    public function create($data)
    {
        set_time_limit(0);
        echo LoggerTemplate::info("Shell Helper [1.0]");
        error_reporting(1);

        $argv = $data["argv"];

        print_r($argv);
        echo LoggerTemplate::info("Done! (".Runtime::end().")");


    }
}
