<?php
/**
 * LoggerTemplate.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 10:42
 */

namespace kyon;


class LoggerTemplate
{
    /**
     * @param $from
     * @param $type
     * @param $message
     * @return string
     */
    public static function template($from, $type, $message):string
    {
        return "[".date("Y/H/D h:m:s")."][".$type."][".$from."] ".$message."\n";
    }

    /**
     * @param $message
     * @param string $from
     * @return string
     */
    public static function info($message, $from = 'Server'): string
    {
        return self::template($from,"INFO",$message);
    }

    /**
     * @param $message
     * @param string $from
     * @return string
     */
    public static function success($message, $from = 'Server'): string
    {
        return self::template($from,"SUCCESS",$message);
    }

    /**
     * @param $message
     * @param string $from
     * @return string
     */
    public static function error($message, $from = 'Server'): string
    {
        return self::template($from,"ERROR",$message);
    }
}
