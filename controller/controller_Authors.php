<?php
class controller_Authors extends Controller {
    public function Show($action = 'index', array $params = array()) {
        //В зависимости от $action, выполняем нужные действия
        $data = array();
        switch($action) {
            case 'index':
                
                $template = 'page';
                $data = $this->index($params);
                break;
            case 'read':
                
                $template = 'page';
                $data = $this->read($params);
                break;
        }
        //Эти данные пойдут уже в представление (этого мы пока не делали)
//        var_dump($data);
        return $this->Output($template,$data);
    }
    
    protected function index(array $data = array()) {
        //Запросить список всех статей
        $data = Author::All();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]->set_article();
        }
//        var_dump($data);
//        exit;
        return array('site_title'=>'Все статьи', 'authors'=> $data);
//        var_dump($data);
    }
    
    protected function read(array $data = array()) {
        //Читаем статью с идентификатором "2"
        $author_id = $_GET['id'];
        $data = Author::Get('id',$author_id);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]->set_article();
        }
//        var_dump($data);
//        exit;
        return array('site_title'=>'Все статьи', 'authors'=> $data);
//        var_dump($data); //раскомментируйте, чтобы увидеть все полученные данные
    }
    

}
?>