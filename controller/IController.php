<?php

//Интерфейс. Эти методы необходимо реализовать в каждом контроллере

interface IController {
    public function Show($action, array $params);
    public static function Get($controller);
    
    
}
?>