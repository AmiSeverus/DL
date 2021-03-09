<?php

class booksM extends model {
    public function getBooks(){
        return $this->db->querySelect('select * from books where active = true');
    }
};

