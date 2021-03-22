<?php

class journalController extends controller {
    
    public function actionIndex(){
        $this->templateName = $this->getTemplate();
        //$books = $this->getModel()->getBooks();
        //if ($books) {
        echo $this->renderPage(['CONTENT' => $this->renderTemplate()]);
        /*} else {
            echo $this->renderPage(['CONTENT' => 'База данных пуста']);
        }*/
    }    
}

