<?php

class readersController extends controller {
    
    public function actionIndex(){    
        $this->templateName = $this->getTemplate();
        $readers = $this->getModel()->getReaders();        
        if ($readers) {
            $this->content = $this->renderTemplate($readers);
        } else {
            $this->content = 'База данных пуста';
        }
        
        echo $this->renderPage(['CONTENT' => $this->content]);
    }
    
    public function actionAdd(){
        $key = 1;
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $readers = $this->getModel()->getAllReaders();
            foreach ($readers as $reader){
              if 
                (
                    $reader['given_name'] == request::getInstance()->post['given_name'] &&
                    $reader['surname'] == request::getInstance()->post['surname'] &&
                    $reader['active'] == 'f'
                ){
                    $this->getModel()->reactivateReader($reader['id']);
                    $key++;
                    $this->content = $this->renderTemplate(['message'=>'Читатель восстановлен']);
                    break;
                } else if 
                (
                    $reader['given_name'] == request::getInstance()->post['given_name'] &&
                    $reader['surname'] == request::getInstance()->post['surname'] &&
                    $reader['active'] == 't'                         
                ){
                    $key++;
                    $this->content = $this->renderTemplate(['message'=>'Читатель уже существует']);
                    break;
                } 
            }
            
            if ($key == 1){
                $this->getModel()->addReader(request::getInstance()->post);
                $this->content = $this->renderTemplate(['message'=>'Читатель добавлен']);
            } else {
                $key = 1;
            }    
        } else {
            $this->content = $this->renderTemplate(['message'=>'']);            
        }
        
        echo $this->renderPage(['CONTENT' => $this->content]);
    }
    
    public function actionFind(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $readers = $this->getModel()->findReader(request::getInstance()->post['searchField'] == 'По имени'? 'given_name':'surname', request::getInstance()->post['searchValue']);    
            if (!$readers){
                $this->content = $this->renderTemplate(['message'=>'Записей не найдено']);
            } else {
                $this->templateName = 'readersIndexT';
                $message = $this->renderTemplate($readers);
                $this->templateName = $this->getTemplate();
                $this->content = $this->renderTemplate(['message'=> $message]);
            }
        } else {
            $this->content = $this->renderTemplate(['message'=>'']);
        }
        
        echo $this->renderPage(['CONTENT'=> $this->content]);
    }
    
    public function actionDelete(){
        if (!request::getInstance()->id){
            throw new Exception('Что-то пошло не так');
        }
        $records = $records = $this->getModel('journal')->getRecordsBySomeId(substr(request::getInstance()->controller, 0,-1),request::getInstance()->id);
        if (empty($records)){
            $this->getModel()->deleteReader(request::getInstance()->id);
            $this->content = 'Читатель удален';
        } else {
            $key = 0;
            foreach ($records as $record) {
                if ($record['reader_id'] == request::getInstance()->id && empty($record['return_date_actual'])) {
                    $key=1;
                }
            }
            if ($key > 0){
                $this->content = 'Читатель не может быть удален: на руках имеются книги';                
            } else {
                $this->getModel()->deleteReader(request::getInstance()->id);
                $this->content = 'Читатель удален';
            }
        }
        echo $this->renderPage(['CONTENT'=> $this->content]); 
    }
    
    public function actionItem(){
        $this->templateName = $this->getTemplate();
        echo $this->renderPage(['CONTENT'=>$this->renderTemplate()]);
    }
}

