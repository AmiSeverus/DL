<?php

class readersM extends model {
    public function getReaders(){
        return $this->db->querySelect('select * from readers where active = true');
    }
};
