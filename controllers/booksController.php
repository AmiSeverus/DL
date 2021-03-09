<?php

//include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'controller.php';

class booksController extends controller {
    
    public function actionIndex(){
        
        $model = $this->getModel(str_replace('Controller', '',__CLASS__) . 'M');
        $this->templateName = $this->getTemplate(__METHOD__);
        $books = $model->getBooks();
        echo $this->renderPage(['CONTENT' => $this->renderTemplate($books)]);
    }
}


