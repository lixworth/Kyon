<?php
/**
 * Router.php
 *
 * @project Kyon
 * @author lixworth <lixworth@outlook.com>
 * @copyright Kyon
 * @create 2021/4/6 9:22
 */
namespace kyon;

class Router{
    public array $router;

    public function __construct()
    {
        $this->router = [];
    }

    public function get($url,$target,$middleware = null){
        if(!isset($this->router[$url])){
            $this->router[$url] = [
                "method" => "GET",
                "target" => $target,
                "middleware" => $middleware
            ];
        }
    }

    public function post($url,$target,$middleware){
        if(!isset($this->router[$url])){
            $this->router[$url] = [
                "method" => "POST",
                "target" => $target,
                "middleware" => $middleware
            ];
        }
    }

    /**
     * @param mixed $router_type
     * @throws \Exception
     */
    public function dispatch($router_type = null)
    {
        $router_type = ($router_type == null) ? $_SERVER["PATH_INFO"] : $router_type;

        if(isset($this->router[$router_type])){
            if($_SERVER["REQUEST_METHOD"] == $this->router[$router_type]["method"]){
                if(is_callable($this->router[$router_type]["target"])){
                    call_user_func($this->router[$router_type]["target"]);
                }
            }else{
                throw new \Exception("Error 405");
            }
        }else{
            throw new \Exception("Error 404");
        }
    }
}
