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
    public function any($url,$target,$middleware = null){
        if(!isset($this->router[$url])){
            $this->router[$url] = [
                "method" => "ANY",
                "target" => $target,
                "middleware" => $middleware
            ];
        }
    }

    public function post($url,$target,$middleware = null){
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
        $router_type = ($router_type == null) ? ((isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/")) : $router_type;

        if(isset($this->router[$router_type])){
            if($_SERVER["REQUEST_METHOD"] == $this->router[$router_type]["method"] || $this->router[$router_type]["method"] == "ANY"){
                if(is_callable($this->router[$router_type]["target"])){
                    call_user_func($this->router[$router_type]["target"]);
                }else{
                    $router = explode('@',$this->router[$router_type]["target"]);

                    if(!class_exists($router[0])){
                        throw new \Exception("Error class:{$router[0]} not found");
                    }
                    $class = new $router[0];
                    $action = $router[1];
                    if(!method_exists($class,$action)){
                        throw new \Exception("Error function:{$router[0]}:{$action} not found");
                    }
                    if($this->router[$router_type]["middleware"] == null){
                        $class->$action();
                    }else{
                        if(!class_exists($this->router[$router_type]["middleware"])){
                            throw new \Exception("Error middleware:{$this->router[$router_type]["middleware"]} not found");
                        }

                        $middleware_class = new $this->router[$router_type]["middleware"];
                        if(!method_exists($middleware_class,"handle")){
                            throw new \Exception("Error middleware:{$this->router[$router_type]["middleware"]}:handle not found");

                        }
                        if($middleware_class->handle()){
                            $class->$action();
                        }else{
                            if(!method_exists($middleware_class,"return")){
                                throw new \Exception("Error middleware:{$this->router[$router_type]["middleware"]}:return not found");
                            }
                            $middleware_class->return();
                        }
                    }
                }
            }else{
                throw new \Exception("Error 405");
            }
        }else{
            throw new \Exception("Error 404");
        }
    }
}
