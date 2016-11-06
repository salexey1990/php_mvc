<?php
class controller_Articles extends Controller {
    public function Show($action = 'index', array $params = array()) {
        $Logged = $this->IsLogged();
        //В зависимости от $action, выполняем нужные действия
        $data = array();
        switch($action) {
            case 'index':
                
                $template = 'index';
                $data = $this->index($params);
                break;
            case 'read':
                
                $template = 'index';
                $data = $this->read($params);
                break;
        }
        //Эти данные пойдут уже в представление (этого мы пока не делали)
//        var_dump($data);
        return $this->Output($template,$data);
    }
    
    protected function index(array $data = array()) {
        //Запросить список всех статей
        $data = Article::All();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]->set_authors();
        }
//        var_dump($data);
 //       exit;
        return array('site_title'=>'Все статьи', 'articles'=> $data);
        
    }
    
    protected function read(array $data = array()) {
        //Читаем статью с идентификатором "2"
        $article_id = $_GET['id'];
        $data = Article::Get('id',$article_id);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]->set_authors();
        }
//        var_dump($data);
//        exit;
        return array('site_title'=>'Статьzя', 'articles'=> $data);
//        var_dump($data); //раскомментируйте, чтобы увидеть все полученные данные
    }

}
?>