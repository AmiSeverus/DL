<?php

//include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'controller.php';

class booksController extends controller {
    
    public function actionIndex(){
        $model = $this->getModel();
        $this->templateName = $this->getTemplate();
        $books = $model->getBooks();
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
}


