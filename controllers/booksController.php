<?php

//include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'controller.php';

class booksController extends controller {
    
    public function actionIndex(){
        $books = $this->getModel()->getBooks();
        if ($books) {
            $this->templateName = $this->getTemplate();
            $this->content = $this->renderTemplate($books);
        } else {
            $this->content = 'База данных пуста';
        }        
        echo $this->renderPage(['CONTENT'=> $this->content]);
    }
    
    public function actionAdd(){
        
        $key = 1;
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $this->checkInputData(request::getInstance()->post);
            $books = $this->getModel()->getAllBooks();
            foreach ($books as $book){
              if 
                (
                    strtolower($book['title']) == strtolower(trim(request::getInstance()->post['title'])) &&
                    strtolower($book['author']) == strtolower(trim(request::getInstance()->post['author'])) &&
                    $book['active'] == 'f'
                ){
                    $this->getModel()->reactivateBook($book['id']);
                    $key++;
                    $this->content= $this->renderTemplate(['message'=>'Книга восстановлена, количество не обновлено']);
                    break;
                } else if 
                (
                    strtolower($book['title']) == strtolower(trim(request::getInstance()->post['title'])) &&
                    strtolower($book['author']) == strtolower(trim(request::getInstance()->post['author'])) &&
                    $book['active'] == 't'                       
                ){
                    $key++;
                    $this->content = $this->renderTemplate(['message'=>'Книга уже существует']);
                    break;
                } 
            }
            
            if ($key == 1){
                $this->getModel()->addBook(request::getInstance()->post);
                $this->content = $this->renderTemplate(['message'=>'Книга добавлена']);
            } else {
                $key = 1;
            }              
        } else {
            $this->content = $this->renderTemplate(['message'=>'']);
        }
        
        echo $this->renderPage(['CONTENT'=> $this->content]);
    }
    
    public function actionFind(){
        $this->templateName = $this->getTemplate();
        if (request::getInstance()->post){
            $books = $this->getModel()->findBook(request::getInstance()->post['searchField'] == 'По названию'? 'title':'author', request::getInstance()->post['searchValue']);    
            if (!$books){
                $this->content = $this->renderTemplate(['message'=>'Записей не найдено']);
            } else {
                $this->templateName = 'booksIndexT';
                $message = $this->renderTemplate($books);
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
        $records = $this->getModel('journal')->getRecordsBySomeId(substr(request::getInstance()->controller, 0,-1),request::getInstance()->id);
        if (empty($records)){
            $this->getModel()->deleteBook(request::getInstance()->id);
            $this->content = 'Книга удалена';            
        } else {
            $key = 0;
            foreach ($records as $record) {
                if ($record['book_id'] == request::getInstance()->id && empty($record['return_date_actual'])) {
                    $key=1;
                }
            }
            if ($key > 0){
                $this->content = 'Книга не может быть удалена: не все были возвращены';
            } else {
                $this->getModel()->deleteBook(request::getInstance()->id);
                $this->content = 'Книга удалена';                
            }
        }
        
        echo $this->renderPage(['CONTENT'=> $this->content]);
    }
    
    public function actionItem(){
        
        if (empty(request::getInstance()->id) || request::getInstance()->id <=0){
            throw new Exception('Что-то пошло не так');
        }
        $book = $this->getModel()->getBookByAttr('id',request::getInstance()->id)[0];
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
        echo $this->renderPage(['CONTENT'=> $this->renderTemplate(['book'=>$book, 'records'=>$records])]);
    }
    
    public function actionChange(){
        if (!request::getInstance()->post){
            throw new Exception('Что-то пошло не так');
        }
        $this->checkInputData(request::getInstance()->post);
        
        $book = $this->getModel()->getBookByAttr('id',request::getInstance()->post['id'])[0];
        
        if (array_keys(request::getInstance()->post)[1] != 'availamount'){
            $newBook = $book;
            $newBook[array_keys(request::getInstance()->post)[1]] = trim(request::getInstance()->post[array_keys(request::getInstance()->post)[1]]);
            $checkLine = strtolower($newBook[array_keys($newBook)[1]] . $newBook[array_keys($newBook)[2]]);
            $allBooks = $this->getModel()->getAllBooks();
            echo '<pre>';
            foreach ($allBooks as $value){
                if (
                        $checkLine == strtolower($value[array_keys($value)[1]] . $value[array_keys($value)[2]]) && //сравнение новой строки с текущими из базы данных
                        strtolower(trim(request::getInstance()->post[array_keys(request::getInstance()->post)[1]])) != strtolower($book[array_keys(request::getInstance()->post)[1]]) //сравнение новой строки с со старой, чтоб не выкидывало исключения
                    ){
                    throw new Exception('Нельзя создать дубликат даже удаленной книги');
                }
            }
            $this->getModel()->setBookAtt(array_keys(request::getInstance()->post)[1], trim(request::getInstance()->post[array_keys(request::getInstance()->post)[1]]), request::getInstance()->post['id']);
        } else {
            $this->getModel('journal')->setBookAmount(request::getInstance()->post['id'], request::getInstance()->post['availamount']);
        }    
        
        header ('Location: /dl/index.php?controller=books&action=item&id=' . request::getInstance()->post['id']);
    }
}