<?php

include 'singleton.php';

class request {
    
    use singleton;
    
    public $controller;
    public $action;
    public $id;
    public $get = [];
    public $post = [];
    public $bookid = 0;
    public $readerid = 0;
    
    private function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->controller = $this->get['controller'] ?? 'main';
        $this->action = $this->get['action'] ?? 'index';
        $this->id = $this->get['id'] ?? '';
        unset($this->get['controller'], $this->get['action'], $this->get['id']);
    }
}
