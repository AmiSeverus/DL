<?php



class mainController extends controller {

    public function actionIndex(){        
        $model = $this->getModel(str_replace('Controller', '',__CLASS__) . 'M');
        $this->templateName = $this->getTemplate(__METHOD__);
        
        echo $this->renderPage(['CONTENT' => '']);
    }
}
