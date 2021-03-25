<?php

class booksM extends model {
    
    public function getAllBooks(){
        return $this->db->querySelect('select * from books order by id');        
    }
    
    public function getBooks(){
        return $this->db->querySelect('select * from books where active = true order by id');
    }
    
    public function getBookByAttr($attr, $val){
        return $this->db->querySelect('select * from books where active = true and ' . "{$this->db->escape($attr)}" .'= ' . "{$this->db->escape($val)}");
    }
    
    public function setBookAtt($attr, $val, $id){
        $this->db->query("update books set {$this->db->escape($attr)} = '{$this->db->escape($val)}' where id = {$this->db->escape($id)}");
    }
    
    public function addBook($form){
        $this->db->query("insert into books (title,author,availamount) values ('{$this->db->escape(trim($form['title']))}' , '{$this->db->escape(trim($form['author']))}' , {$this->db->escape($form['availamount'])})");
    }
    
    public function findBook($field, $value){
        return $this->db->querySelect("select * from books where {$this->db->escape($field)} ilike '%{$this->db->escape(trim($value))}%' and active = true and availamount >0");
    }
    
    public function deleteBook($id){
        $this->db->query("update books set active = false where id = {$this->db->escape($id)}");
    }
    
    public function reactivateBook($id){
        $this->db->query("update books set active = true where id = {$this->db->escape($id)}");
    }
}