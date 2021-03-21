<?php

class controller {
    
    private $models = [];
    
    protected $layoutName = 'mainL';
    protected $templateName = '';
    protected $modelName = '';
    protected $content = '';
       
    public function getTemplate(){
        return $this->templateName = request::getInstance()->controller . ucfirst(request::getInstance()->action) . 'T';       
    }
    
    public function getModel(){
        $this->modelName = request::getInstance()->controller . 'M';
        if (!isset($this->models[$this->modelName])){
            if(!file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $this->modelName . '.php')){
                throw new Exception('Model '. $this->modelName . 'does not exist');
            }
            include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $this->modelName . '.php';
            $this->models[$this->modelName]= new $this->modelName;
        }
        return $this->models[$this->modelName];
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

