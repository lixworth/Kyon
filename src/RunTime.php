<?php
/**
 * RunTime.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 10:31
 */

namespace kyon;


class RunTime
{
    public static string $t;

    public static function start()
    {
        self::$t = microtime();
    }

    public static function end()
    {
        $t1 = microtime();
        list($m0, $s0) = explode(" ", self::$t);
        list($m1, $s1) = explode(" ", $t1);
        return sprintf("%.3f ms", ($s1 + $m1 - $s0 - $m0) * 1000);
    }
}

