<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

trait singleton 
{   
    private static $instance = null;
    
    private function __wakeup () {}
    private function __clone () {}
    private function __construct() {}
    
    public static function getInstance(){
        if (is_null(static::$instance)){
            static::$instance = new static;
        }
        return static::$instance;
    }
}

