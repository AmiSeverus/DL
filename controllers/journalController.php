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
        if (!request::getInstance()->post){
            if (!array_key_exists('bookid', request::getInstance()->get) || !array_key_exists('bookid', request::getInstance()->get)){
                throw new Exception();
            } 
            if (!request::getInstance()->get['bookid'] > 0 || !request::getInstance()->get['readerid']) {
                throw new Exception;
            }
            if ($this->testArray($this->getModel()->getAvailBooks(), request::getInstance()->get['bookid']) && $this->testArray($this->getModel('readers')->getReaders(), request::getInstance()->get['readerid'])){
        
                $book = $this->getItem($this->getModel()->getAvailBooks(), request::getInstance()->get['bookid']);
                $reader = $this->getItem($this->getModel('readers')->getReaders(), request::getInstance()->get['readerid']);
                $this->templateName = $this->getTemplate();
                echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['book'=>$book, 'reader'=>$reader])]);       
            } else {throw new Exception;}
        } else {
            if (!array_key_exists('bookid', request::getInstance()->post) || !array_key_exists('bookid', request::getInstance()->post)){
                throw new Exception;
            }
            if (!request::getInstance()->post['bookid'] > 0 || !request::getInstance()->post['readerid'] > 0){
                throw new Exception;
            }
            $this->getModel()->giveOut(+request::getInstance()->post['bookid'], +request::getInstance()->post['readerid']);
            $amount = $this->getModel()->getBookAmount(+request::getInstance()->post['bookid'])[0]['availamount'];
            $this->getModel()->setBookAmount(+request::getInstance()->post['bookid'], $amount-1);
            echo $this->renderPage(['CONTENT'=> 'Книга выдана']);      
        }
    }
    
    public function actionIndex(){
        $data = $this->getModel()->getRecords();
        foreach ($data as $item) {
            if (!empty($item['return_date_actual'])){
                $item['form'] = '';
            }  else {
                $this->templateName='form';
                $form = $this->renderTemplate(['data'=>['id'=>$item['id'], 'bookid'=>$item['book_id']]]);
                $item['form'] = "$form";
            }          
            $res[]=$item;
        }
        $data = $res;
        $this->templateName = $this->getTemplate();
        echo $this->renderPage(['CONTENT'=>$this->renderTemplate(['data'=>$data])]);
    }
    
    public function actionReturn(){
        $dateStamp = date('Y-m-d');
        $this->getModel()->setDataStamp($dateStamp, +request::getInstance()->post['recordid']);
        $amount = $this->getModel()->getBookAmount(+request::getInstance()->post['bookid'])[0]['availamount'];
        $this->getModel()->setBookAmount(+request::getInstance()->post['bookid'], $amount+1);
        echo $this->renderPage(['CONTENT'=> 'Книга возвращена']);
    }
}
