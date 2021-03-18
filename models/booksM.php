<?php

class booksM extends model {
    public function getBooks(){
        return $this->db->querySelect('select * from books where active = true');
    }
    
    public function addBook($form){
        $this->db->query("insert into books (title,author,availamount) values ('{$this->db->escape($form['title'])}' , '{$this->db->escape($form['author'])}' , {$this->db->escape($form['availamount'])})");
    }
}