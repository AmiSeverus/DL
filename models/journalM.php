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
    
    public function getRecords(){
        return $this->db->querySelect('select 
                                            t1.*,
                                            t2.title,
                                            t2.author,
                                            t3.given_name,
                                            t3.surname
                                        from journal t1
                                        left join books t2
                                        on t1.book_id = t2.id
                                        left join readers t3
                                        on t1.reader_id = t3.id;');
    }
    
    public function setDataStamp($dateStamp, $id){
        $this->db->query("update journal set return_date_actual = '$dateStamp' where id = $id");
    }
}

