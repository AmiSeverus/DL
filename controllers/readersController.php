<?php

class readersController extends controller {
    
    public function actionIndex(){    
        $this->templateName = $this->getTemplate();
        $readers = $this->getModel()->getReaders();        
        if ($readers) {
            echo $this->renderPage(['CONTENT' => $this->renderTemplate($readers)]);
        } else {
            echo $this->renderPage(['CONTENT' => 'База данных пуста']);
        }
    }
    
    public function actionAdd(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $this->getModel()->addReader(request::getInstance()->post);
            echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Читатель добавлен'])]);
        } else {
            echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>''])]);            
        }
    }
    
    public function actionFind(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $readers = $this->getModel()->findReader(request::getInstance()->post['searchField'] == 'По имени'? 'given_name':'surname', request::getInstance()->post['searchValue']);    
            if (!$readers){
                echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Записей не найдено'])]);
            } else {
                $this->templateName = 'readersIndexT';
                $message = $this->renderTemplate($readers);
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
        $this->getModel()->deleteReader(request::getInstance()->id);
        echo $this->renderPage(['CONTENT'=> 'Запись удалена']);
    }
}

