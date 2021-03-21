<?php

class readersM extends model {
    
    public function getAllReaders(){
        return $this->db->querySelect('select * from readers');        
    }
    
    public function getReaders(){
        return $this->db->querySelect('select * from readers where active = true');
    }
    
    public function addReader($form){
        $this->db->query("insert into readers (given_name,surname) values ('{$this->db->escape($form['given_name'])}' , '{$this->db->escape($form['surname'])}')");
    }
    
    public function findReader($field, $value){
        return $this->db->querySelect("select * from readers where {$this->db->escape($field)} ilike '{$this->db->escape($value)}'");
    }
    
    public function deleteReader($id){
        $this->db->query("update readers set active = false where id = {$this->db->escape($id)}");
    }
    
    public function reactivateReader($id){
        $this->db->query("update readers set active = true where id = {$this->db->escape($id)}");
    }
}
