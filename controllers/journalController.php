<?php

class journalController extends controller {
    private $books = [['id'=>0,'title'=>'','author'=>'']];
    private $readers = [['id'=>0,'given_name'=>'--','surname'=>'--', 'bookid'=>0]];
    
    public function actionChoosebook(){
        
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $booksList = $this->getModel('books')->findBook(request::getInstance()->post['searchField'] == 'По названию'? 'title':'author', request::getInstance()->post['searchValue']);    
            if ($booksList){
                $this->books = $booksList;
            }    
        }
        echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['data'=>$this->books])]);
    }
    
    public function actionChoosereader(){

        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $readersList = $this->getModel('readers')->findReader(request::getInstance()->post['searchField'] == 'По имени'? 'given_name':'surname', request::getInstance()->post['searchValue']);    
            if ($readersList){
                $this->readers = $readersList;
            }
            foreach ($this->readers as $reader) {
                $reader['bookid'] = request::getInstance()->get['bookid'];
                $res[]=$reader;
            }
            $this->readers = $res;
        } 
        $url = '/dl/index.php?controller=journal&action=choosereader&bookid=' . request::getInstance()->get['bookid'];
        echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['data'=>$this->readers, 'url'=>"{$url}"])]);
    }
    
    public function actionGiveout(){
        print_r($_GET);
    }
}

