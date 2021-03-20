<?php

spl_autoload_register(function ($name){
   //$name = str_replace('\\', '/', ltrim($name, '\\'));
   
   include __DIR__ . DIRECTORY_SEPARATOR . $name . '.php';
   //echo __DIR__ . DIRECTORY_SEPARATOR . $name . '.php' . '<br/>';
});

include 'request.php';

class core{
    
    public static $config = [];
    
    public function __construct($config) {
        self::$config = $config;
    }
    
    public function run(){
                
        try {
            $this->startAction(request::getInstance()->controller, request::getInstance()->action);
        } catch (Exception $e){
            $this->startAction ('error', 'index', $e->getMessage());
        }
    }
    
    public function startAction($controller, $action, $message = ''){
        
        $this->test ($controller);
        $this->test ($action);
        
        $controllerName = strtolower($controller).'Controller';
        $actionName = 'action' . ucfirst(strtolower($action));
        
        if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php')){
            throw new Exception('Controller ' . $controller . ' file does not exist ');
        }
        
        include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php';
        
        if (!class_exists($controllerName)){
            throw new Exception('Controller ' . $controller . ' file does not exist ');
        };
        
        $controllerClass = new $controllerName;

        if (!method_exists($controllerClass, $actionName)){
            throw new Exception('Action ' . $action . ' does not exist ');
        }
   
        $controllerClass->$actionName($message);
    }
    
    public function test ($str){
        for ($i=0; $i < strlen($str); $i++){
            if (!($str[$i] >= 'A' && $str[$i]<= 'z')){
                throw new Exception;
            }
        }
    }
}