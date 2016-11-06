<?php
//Спецкласс для данных о выполненном запросе
class QueryResult {
    public $result; // query resource;
    public $affected; //affected rows
    public $id; // last insert id
    public $error = false; // error;
    
    public function __construct($result, $affected, $id, $error) {
        $this->result = $result;
        $this->affected = $affected;
        $this->id = $id;
        $this->error = $error;
    }
} 

class DB {
    
    // DB сделать по шаблону Singleton, поэтому, нам нужен всего 1 инстанс.
    private static $_instance; 
    private $_db; // PDO 
    
    private function __construct() {
        
    }
    
    public function Connect($host, $base, $username, $password) {
        // Подключаемся к БД
        $this->_db = new PDO('mysql:host='.$host.';dbname='.$base.';charset=utf8', $username, $password);
        //Выставляем способ обработки ошибок
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function Get() {
        // Получаем инстанс DB
        if(self::$_instance == null) self::$_instance = new DB();
        return self::$_instance;
    }
    
    public function Query($query, array $params = array()) {
        // Выполнение запроса
        try {
            $error = false; //Ошибки по-умолчанию нет
            $res = $this->_db->prepare($query); //Подготовить запрос
            $res->execute($params); //Выполнить
        } catch(PDOException $e) {
            $error = $e->getMessage();    
        }
        //Создать объект QueryResult с результатами выполнения запроса
        $result = new QueryResult($res, $res->rowCount(),$this->_db->lastInsertId(),$error);
        
        return $result;
    }
    
    //Выборка данных
    public function Select($query, array $params = array()) {
        //Выполняем запрос
        $res = $this->Query($query, $params);
        if($res->error) {
            //Вернуть ошибку
            return $res->error;
        } 
        //Вернуть ассоциативный массив с каждого ряда
        $result = array();
        while($row = $res->result->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
}

?>