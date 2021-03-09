<?php

class model {
    
    private $db = false;
    
    public function __get($name) {
        if ($name == 'db' ){
            if (empty($this->db)){
                $this->db = new psql(core::$config['local_psql']);
            };
            return $this->db;
        };
        
    }
}