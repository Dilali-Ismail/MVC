<?php

namespace Src\Http;

class Route{


    protected $response ;
    protected $request ;
    public static array $routes = [] ;


  public function __construct($response,$request)
  {
    $this->response = $response;
    $this->request = $request;
  }


   public static function get($route,$action){

    self::$routes['get'][$route] = $action ;
   }

   public static function post($route,$action){

    self::$routes['post'][$route] = $action ;

   }
    
   public function resolve() {
    
    $path = $this->request->path();
    $methode = $this->request->method();
    $action = self::$routes[$methode][$path] ?? false ;
    dump($action);
    if(!$action){
        return ;
    }
    if(is_callable($action)){
        call_user_func_array($action,[]);
    }
    if(is_array($action)){
        call_user_func_array([new $action[0],$action[1]],[]);
    }
   }

}

?>