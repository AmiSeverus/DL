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
        $key = 1;
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $readers = $this->getModel()->getReaders();
            foreach ($readers as $reader){
              if 
                (
                    //почему не попадаю в первое условие???
                    $reader['given_name'] == request::getInstance()->post['given_name'] &&
                    $reader['surname'] == request::getInstance()->post['surname'] &&
                    $reader['active'] == false
                ){
                    $this->getModel()->reactivateReader($reader['id']);
                    $key++;
                    echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Читатель восстановлен'])]);
                    break;
                } else if 
                (
                    $reader['given_name'] == request::getInstance()->post['given_name'] &&
                    $reader['surname'] == request::getInstance()->post['surname'] &&
                    $reader['active'] == true                         
                ){
                    $key++;
                    echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Читатель уже существует'])]);
                    break;
                } 
            }
            
            if ($key == 1){
                $this->getModel()->addReader(request::getInstance()->post);
                echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['message'=>'Читатель добавлен'])]);                    
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

