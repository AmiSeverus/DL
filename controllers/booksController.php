<?php

include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'controller.php';

class booksController /*extends controller*/ {
    
    public function indexAction(){
        
        echo __METHOD__;
        
        /*echo 'Hi';
        
        $model = $this->getModel(str_replace('Controller', '',__CLASS__) . 'M');
        $this->templateName = $this->getTemplate(__METHOD__);
        
        //echo $model . '<br/>' . $this->layoutName . '<br/>' . $this->templateName;
                
        //echo $this->renderPage();*/
    }
}


