<?php
//Базовый класс контроллера
abstract class Controller implements IController {

    public $Logged = false;
    
    //Возвращает запрошенный в переменной $_GET['page'] контроллер
    public static function Get($controller) {
        $controller = 'controller_'.$controller;
        //Если такой класс подгрузить удалось, возвращаем новый объект контроллера
        if(class_exists($controller)) return new $controller();
        //Возвращаем ошибку
        return new controller_Error();
    }
    
    //Отображает результат
    //$action - определённое действие, переданное из $_GET['action'];
    //$params - массив $_REQUEST
    public function Show($action = 'index', array $params = array()) {
        return '';
    }

    //Мы залогинены?
    protected function IsLogged() {
        //Метод вызывается только там, где это нужно
        return Session::GetSession($_COOKIE['user_id'], $_COOKIE['user_session']);
    }

        //Выводим содержимое
    public function Output($file, array $vars = array()) {
        //Надо бы сделать проверку, есть ли такой файл
        $file = 'views/'.$file.'.html';
        $smarty = new Smarty();
        //Загружаем переменные
//        var_dump($vars);
//        exit;
        foreach($vars as $key => $value) {
            $smarty->assign($key, $value);
        }
        //Выводим на экран
        $smarty->Display($file);
        //Ещё можно вывести результат в строку:
        //return $smarty->fetch($file);
    }
    
    //Методы управления данными по-умолчанию
    //Массив $data в нижеследующих методах нужен, чтобы передать любые параметры
    protected function Index(array $data = array()) {
        //Получить и обработать все элементы, относящиеся к определённому контроллеру
    } 
    
    protected function Create(array $data = array()) {
        //Создать новый элемент, отправить на сохранение
    }
    
    protected function Read(array $data = array()) {
        //Получить данные о конкретном элементе
    }
    
    protected function Update(array $data = array()) {
        //Изменить данные какого-либо элемента
    }
    
    protected function Delete(array $data = array()) {
        //Удалить элемент
    }
}