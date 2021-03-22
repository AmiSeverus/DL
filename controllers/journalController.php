<?php

class journalController extends controller {
    
    private $books = [['title'=>'','author'=>'']];
    private $readers = [['given_name'=>'','surname'=>'']];
    private $bookId = 0;
    private $readerId = 0;
    
    public function actionGiveout(){
        if (!request::getInstance()->post){
            $this->templateName = $this->getTemplate();
            echo $this->renderPage(['CONTENT' => $this->renderTemplate()]);
        } elseif (preg_match('#^bookid=[1-9]+$#', array_keys(request::getInstance()->post)[0])) {
            echo '<pre>';
            echo 'bookId';
            print_r(request::getInstance()->post);
        } elseif (preg_match('#^readerid=[1-9]+$#', array_keys(request::getInstance()->post)[0])) {
            echo '<pre>';
            echo 'readerId';
            print_r(request::getInstance()->post);
        } else {
            echo '<pre>';
            echo 'find';
            print_r(request::getInstance()->post);
        }
    }
}

