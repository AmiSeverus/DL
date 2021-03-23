<?php 

class journalM extends model {
    public function getAvailBooks (){
        return $this->db->querySelect('select * from books where active = true and availamount > 0');
    }
    
    public function getBookAmount($bookid){
        return $this->db->querySelect("select availamount from books where id = $bookid");
    }
    
    public function setBookAmount($bookid, $amount){
        $this->db->query("update books set availamount = $amount where id = $bookid");
    }
    
    public function giveOut($bookid,$readerid){
        $this->db->query("insert into journal (reader_id,book_id ) values ($readerid,$bookid)");
    }
}

