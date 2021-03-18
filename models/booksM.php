<?php

class booksM extends model {
    public function getBooks(){
        return $this->db->querySelect('select * from books where active = true');
    }
    
    public function addBook($form){
        return $this->db->query("insert into (title,author) books values (' . .',' . . ')");
    }
};

