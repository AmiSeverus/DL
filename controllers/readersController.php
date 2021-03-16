<?php

class readersController extends controller {
    
    public function actionIndex(){
        
        $model = $this->getModel(str_replace('Controller', '',__CLASS__) . 'M');
        $this->templateName = $this->getTemplate(__METHOD__);
        $readers = $model->getReaders();        
        if ($readers) {
            echo $this->renderPage(['CONTENT' => $this->renderTemplate($readers)]);
        } else {
            echo $this->renderPage(['CONTENT' => 'База данных пуста']);
        }
    }
}

