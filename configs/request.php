<?php

include 'singleton.php';

class request {
    
    use singleton;
    
    public $controller;
    public $action;
    public $id;
    public $get = [];
    public $post = [];
    
    private function __construct() {
        $this->get = $_GET;
        test($this->get['controller']);
        test($this->get['action']);
        $this->post = $_POST;
        $this->controller = $this->get['controller'] ?? 'main';
        $this->action = $this->get['action'] ?? 'index';
        $this->id = $this->get['id'] ?? '';
        unset($this->get['controller'], $this->get['action'], $this->get['id']);
    }
    
    public function test ($str){
        for ($i=0; $i < strlen($str); $i++){
            if (!($str[$i] >= 'A' && $str[$i]<= 'z')){
                throw new Exception;
            }
        }
    }
}
