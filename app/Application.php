<?php
/**
 * Application.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 10:29
 */

namespace app;

use kyon\Http;
use kyon\RunTime;

class Application extends Http
{
    public function positive(string $message,array $data = []): void
    {
        self::printResponse(1, $message,$data);
    }

    public function negative(string $message,array $data = []): void
    {
        self::printResponse(0, $message,$data);
    }

    public static function printResponse(int $status, string $message,array $data): void
    {
        header("content-type: application/json; charset=utf-8");
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'time' => time(),
            'memory_peak_usage' => memory_get_peak_usage(),
            'req_processing_delay' => Runtime::end(),
            "GKD_TM_API_version"=> "飂"
        ]);
        exit;
    }
}
