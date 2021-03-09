<?php

include 'singleton.php';

class request {
    
    use singleton;
    
    public $controller;
    public $action;
    public $get = [];
    public $post=[];
    
    private function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->controller = $this->get['controller'] ?? 'main';
        $this->action = $this->get['action'] ?? 'index';
        unset($this->get['controller'], $this->get['action']);
    }
};
