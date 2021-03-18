<?php



class mainController extends controller {

    public function actionIndex(){        
        $model = $this->getModel();
        $this->templateName = $this->getTemplate();
        
        echo $this->renderPage(['CONTENT' => '']);
    }
}
