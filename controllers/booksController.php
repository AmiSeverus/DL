<?php

//include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'controller.php';

class booksController extends controller {
    
    public function actionIndex(){
        $this->templateName = $this->getTemplate();
        $books = $this->getModel()->getBooks();
        if ($books) {
            echo $this->renderPage(['CONTENT' => $this->renderTemplate($books)]);
        } else {
            echo $this->renderPage(['CONTENT' => 'База данных пуста']);
        }
    }
    
    public function actionAdd(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $this->getModel()->addBook(request::getInstance()->post);
            echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Книга добавлена'])]);
        } else {
            echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>''])]);            
        }
    }
    
    public function actionFind(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $books = $this->getModel()->findBook(request::getInstance()->post['searchField'] == 'По названию'? 'title':'author', request::getInstance()->post['searchValue']);    
            if (!$books){
                echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Записей не найдено'])]);
            } else {
                $this->templateName = 'booksIndexT';
                $message = $this->renderTemplate($books);
                $this->templateName = $this->getTemplate();
                echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=> $message])]);
            }
        } else {
            echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>''])]);
        } 
    }
    
    public function actionDelete(){
        if (!request::getInstance()->get[id]){
            throw new Exception('Что-то пошло не так');
        }
        $this->getModel()->deleteBook(request::getInstance()->id);
        echo $this->renderPage(['CONTENT'=> 'Запись удалена']);
    }
}


