<?php

class booksM extends model {
    public function getBooks(){
        return $this->db->querySelect('select * from books where active = true');
    }
    
    public function addBook($form){
        $this->db->query("insert into books (title,author,availamount) values ('{$this->db->escape($form['title'])}' , '{$this->db->escape($form['author'])}' , {$this->db->escape($form['availamount'])})");
    }
    
    public function findBook($field, $value){
        return $this->db->querySelect("select * from books where {$this->db->escape($field)} ilike '%{$this->db->escape($value)}%'");
    }
    
    public function deleteBook($id){
        $this->db->query("update books set active = false where id = {$this->db->escape($id)}");
    }
    
    public function reactivateBook($id){
        $this->db->query("update books set active = true where id = {$this->db->escape($id)}");
    }
}