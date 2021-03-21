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
        $key = 1;
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $books = $this->getModel()->getAllBooks();
            foreach ($books as $book){
              if 
                (
                    $book['title'] == request::getInstance()->post['title'] &&
                    $book['author'] == request::getInstance()->post['author'] &&
                    $book['active'] == 'f'
                ){
                    $this->getModel()->reactivateBook($book['id']);
                    $key++;
                    echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Книга восстановлена'])]);
                    break;
                } else if 
                (
                    $book['title'] == request::getInstance()->post['title'] &&
                    $book['author'] == request::getInstance()->post['author'] &&
                    $book['active'] == 't'                       
                ){
                    $key++;
                    echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Книга уже существует'])]);
                    break;
                } 
            }
            
            if ($key == 1){
                $this->getModel()->addBook(request::getInstance()->post);
                echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Книга добавлена'])]);
            } else {
                $key = 1;
            }              
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
        if (!request::getInstance()->id){
            throw new Exception('Что-то пошло не так');
        }
        $this->getModel()->deleteBook(request::getInstance()->id);
        echo $this->renderPage(['CONTENT'=> 'Запись удалена']);
    }
}


