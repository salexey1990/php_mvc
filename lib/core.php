<?php
class Core {
    // Выполняет роль посредника между окружением и контроллером
    private static $_instance;
    
    private function __construct() {
        
    }
    
    public static function Instance() {
        //Подключаем необходимые библиотеки и базу
        if(self::$_instance == null) {
            require_once 'lib/smarty/Smarty.class.php';
            require_once __DIR__.'/config.php';
            DB::Get()->Connect(Config::$db['host'],Config::$db['base'],Config::$db['user'],Config::$db['password']);
            self::$_instance = new Core();
        }
        return self::$_instance;
    }
    
    public function Call($page = 'Articles', $params = array()) {
        //Вызываем контроллер
        $controller = Controller::Get($page);
        if($controller) {
            echo $controller->Show(isset($params['action']) ? $params['action'] : 'index', $params); //Вызываем у него метод Show, туда спускаем действие и параметры $_GET и $_POST (внутри $_REQUEST)
        }
    }
    
    
}
?>