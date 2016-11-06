<?php
class controller_Error extends Controller {
    public function Show($action = 'index', array $params = array()) {
        //В зависимости от $action, выполняем нужные действия
        $data = array('Message' => 'Not found');
        //Эти данные пойдут уже в представление (этого мы пока не делали)
        return $data;
        /*Можете раскомментировать для примера
        echo '<div>
                <i>'.$data['author'].'</i>';
        echo '<p>'.$data['title'].'</p></div>';*/
    }
}
?>