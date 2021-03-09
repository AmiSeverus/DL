<?php

class controller {
    
    private $models = [];
    
    protected $layoutName = 'mainL';
    protected $templateName = '';
    
    public function getLayout($class) {
        return $this->layoutName = str_replace('Controller', '',$class) . 'L';
    }
    
    public function getTemplate($method){
        return $this->templateName = str_replace('Controller::action', '', $method) . 'T';      
    }
    
    public function getModel($modelName){
        if (!isset($this->models[$modelName])){
            if(!file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $modelName . '.php')){
                throw new Exception('Model '. $modelName . 'does not exist');
            }
            include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $modelName . '.php';
            $this->models[$modelName]= new $modelName;
        }
        return $this->models[$modelName];
    }
    
    protected function renderAll($dir, $template, $data = []) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $template . '.php';
        if (!file_exists($path)){
            throw new Exception ('Template' .$dir . '/' . $template . ' does not exist');
        }
        extract($data);
        ob_start();
        include $path;
        return ob_get_clean();
    }
    
    public function renderPage ($data = []){
        return $this->renderAll('layouts', $this->layoutName, $data);
    }
    
    public function renderTemplate ($data = []){
        return $this->renderAll('templates', $this->templateName, $data);
    }

}

