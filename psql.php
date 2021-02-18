<?php

class psql 
{
    private $connect = false;
    
    public function connect($dbParams = []){
        $this->connect = pg_connect
        (
            'host=' . $dbParams['host'] .
            'port=' . $dbParams['port'].
            'user=' . $dbParams['login'].
            'password=' . $dbParams['password'].
            'dbname=' . $dbParams['name']
        );
    }
}

