<?php

class readersController extends controller {
    
    public function actionIndex(){    
        $this->templateName = $this->getTemplate();
        $readers = $this->getModel()->getReaders();        
        if ($readers) {
            $this->content = $this->renderTemplate($readers);
        } else {
            $this->content = 'База данных пуста';
        }
        
        echo $this->renderPage(['CONTENT' => $this->content]);
    }
    
    public function actionAdd(){
        $key = 1;
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $this->checkInputData(request::getInstance()->post);
            $readers = $this->getModel()->getAllReaders();
            
            foreach ($readers as $reader){
                if //почему strtolower не работает для readers?
                (
                    strtolower(trim($reader['given_name'])) == strtolower(trim(request::getInstance()->post['given_name'])) &&
                    strtolower(trim($reader['surname'])) == strtolower(trim(request::getInstance()->post['surname'])) &&
                    $reader['active'] == 'f'
                ){
                    $this->getModel()->reactivateReader($reader['id']);
                    $key++;
                    $this->content = $this->renderTemplate(['message'=>'Читатель восстановлен']);
                    break;
                } else if 
                (
                    strtolower(trim($reader['given_name'])) == strtolower(trim(request::getInstance()->post['given_name'])) &&
                    strtolower(trim($reader['surname'])) == strtolower(trim(request::getInstance()->post['surname'])) &&
                    $reader['active'] == 't'                         
                ){
                    $key++;
                    $this->content = $this->renderTemplate(['message'=>'Читатель уже существует']);
                    break;
                } 
            }
            
            if ($key == 1){
                $this->getModel()->addReader(request::getInstance()->post);
                $this->content = $this->renderTemplate(['message'=>'Читатель добавлен']);
            } else {
                $key = 1;
            }    
        } else {
            $this->content = $this->renderTemplate(['message'=>'']);            
        }
        
        echo $this->renderPage(['CONTENT' => $this->content]);
    }
    
    public function actionFind(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $readers = $this->getModel()->findReader(request::getInstance()->post['searchField'] == 'По имени'? 'given_name':'surname', request::getInstance()->post['searchValue']);    
            if (!$readers){
                $this->content = $this->renderTemplate(['message'=>'Записей не найдено']);
            } else {
                $this->templateName = 'readersIndexT';
                $message = $this->renderTemplate($readers);
                $this->templateName = $this->getTemplate();
                $this->content = $this->renderTemplate(['message'=> $message]);
            }
        } else {
            $this->content = $this->renderTemplate(['message'=>'']);
        }
        
        echo $this->renderPage(['CONTENT'=> $this->content]);
    }
    
    public function actionDelete(){
        if (!request::getInstance()->id){
            throw new Exception('Что-то пошло не так');
        }
        $records = $records = $this->getModel('journal')->getRecordsBySomeId(substr(request::getInstance()->controller, 0,-1),request::getInstance()->id);
        if (empty($records)){
            $this->getModel()->deleteReader(request::getInstance()->id);
            $this->content = 'Читатель удален';
        } else {
            $key = 0;
            foreach ($records as $record) {
                if ($record['reader_id'] == request::getInstance()->id && empty($record['return_date_actual'])) {
                    $key=1;
                }
            }
            if ($key > 0){
                $this->content = 'Читатель не может быть удален: на руках имеются книги';                
            } else {
                $this->getModel()->deleteReader(request::getInstance()->id);
                $this->content = 'Читатель удален';
            }
        }
        echo $this->renderPage(['CONTENT'=> $this->content]); 
    }
    
    public function actionItem(){
        if (empty(request::getInstance()->id) || request::getInstance()->id <=0){
            throw new Exception('Что-то пошло не так');
        }
        $reader = $this->getModel()->getReaderByAttr('id',request::getInstance()->id)[0];
        $records = $this->getModel('journal')->getRecordsBySomeId(substr(request::getInstance()->controller, 0,-1),request::getInstance()->id);
        
        if (empty($records)){
            $records[] = [
                            'id' => '',
                            'reader_id' => '',
                            'book_id' => '',
                            'given_name'=> '',
                            'surname'=>'',
                            'given_date' => '',
                            'return_date' => '',
                            'return_date_actual' => '',
                            'form'=>''
                        ];
        } else {
            foreach ($records as $item) {
                if (!empty($item['return_date_actual'])){
                    $item['form'] = '';
                }  else {
                    $this->templateName='form';
                    $form = $this->renderTemplate(['data'=>['id'=>$item['id'], 'bookid'=>$item['book_id']]]);
                    $item['form'] = "$form";
                }          
                $res[]=$item;
            }
        $records = $res;            
        }        
        $this->templateName = $this->getTemplate();
        echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['reader'=>$reader, 'records'=>$records])]);
    }
    
    public function actionChange(){
        if (!request::getInstance()->post){
            throw new Exception('Что-то пошло не так');
        }
        $this->checkInputData(request::getInstance()->post);
        
        $reader = $this->getModel()->getReaderByAttr('id',request::getInstance()->post['id'])[0];
        
        $newReader = $reader;
        $newReader[array_keys(request::getInstance()->post)[1]] = trim(request::getInstance()->post[array_keys(request::getInstance()->post)[1]]);
            $checkLine = strtolower($newReader[array_keys($newReader)[1]] . $newReader[array_keys($newReader)[2]]);
            $allReaders = $this->getModel()->getAllReaders();
            foreach ($allReaders as $value){
                if (
                        $checkLine == strtolower($value[array_keys($value)[1]] . $value[array_keys($value)[2]]) //сравнение новой строки с текущими из базы данных
                    ){
                    throw new Exception('Нельзя создать дубликат даже удаленного читателя');
                }
            }
            $this->getModel()->setReaderAtt(array_keys(request::getInstance()->post)[1], trim(request::getInstance()->post[array_keys(request::getInstance()->post)[1]]), request::getInstance()->post['id']);
                  
        header ('Location: /dl/index.php?controller=readers&action=item&id=' . request::getInstance()->post['id']);
    }
}

