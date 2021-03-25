<?php



class mainController extends controller {

    public function actionIndex(){        
        echo $this->renderPage(['CONTENT' => '']);
    }
}
