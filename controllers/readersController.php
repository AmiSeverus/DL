<?php

class readersController extends controller {
    
    public function actionIndex(){
        
        $model = $this->getModel();
        $this->templateName = $this->getTemplate();
        $readers = $model->getReaders();        
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
}

