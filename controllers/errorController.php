<?php

//include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'controller.php';

class errorController extends controller 
{
    
    public function actionIndex ($message){
        echo $message . '<<>>';
    }
    
}

