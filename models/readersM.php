<?php

class readersM extends model {
    public function getReaders(){
        return $this->db->querySelect('select * from readers where active = true');
    }
    
    public function addReader($form){
        $this->db->query("insert into readers (given_name,surname) values ('{$this->db->escape($form['given_name'])}' , '{$this->db->escape($form['surname'])}')");
    }
};
