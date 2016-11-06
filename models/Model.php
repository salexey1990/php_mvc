<?php
//Просто модель
abstract class Model {

        protected static $Structure = array();
        public $Properties = array();
    
    //Возвращает нам свойство, если это позволено структурой
    public function GetProperty($key) {
        if($key == 'id') {
            return $this->Properties['id'];
        }
        if(isset($this->Properties[$key])) {
            if(isset(static::$Structure[$key])) {
                if(static::$Structure[$key]['access'] == 'public') {
                    return $this->Properties[$key];
                }
            }
        }
        return NULL;
    }
    
    //Устанавливает свойство, если позволено структурой.
    //Внутри модели мы, в любом случае, имеем доступ к любому свойству.
    public function SetProperty($key,$value) {
        if(isset($this->Properties[$key])) {
            if(isset(static::$Structure[$key])) {
                if(static::$Structure[$key]['access'] == 'public') {
                    $this->Properties[$key] = $value;
                }
            }
        }
    }
    // Создаёт структуру базы для модели
    public static function Generate($type) {
        // Было бы здорово вызывать ядро, которое подключит нужные нам файлы и проинициализирует соединение
        DB::Get()->Connect(Config::$db['host'], Config::$db['base'], Config::$db['user'], Config::$db['password']);
        // Начинаем работу с моделью
        $instance = new $type();
        if(empty($instance::$Structure)) return;
        $tableName = get_class($instance);
        $queries = array();
        //Удаляем базу и создаём снова
        $queries[] = array('query'=>'DROP TABLE IF EXISTS '.$tableName);
        $queries[] = array('query'=>'CREATE TABLE IF NOT EXISTS '.$tableName.' (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(ID))');
        foreach($instance::$Structure as $field => $fieldData) {
            //В базу заносим только нужные нам свойства
            if(!isset($fieldData['in_db']) || $fieldData['in_db'] == true) {
                $type = NULL;
                $unsigned = '';
                $length = isset($fieldData['length']) ? $fieldData['length'] : '';
                $is_null = isset($fieldData['is_null']) ? $fieldData['is_null'] : 'NOT NULL';
                switch($fieldData['type']) {
                    case 'int':
                        $type = 'INT';
                        $value = isset($fieldData['value']) ? $fieldData['value'] : 'DEFAULT 0';
                        $unsigned = 'UNSIGNED';
                        $length = '('.$length.')';
                        break;
                    case 'string':
                        $type = 'VARCHAR';
                        $value = isset($fieldData['value']) ? $fieldData['value'] : '';
                        $length = '('.$length.')';
                        break;
                    case 'text':
                        $type = 'TEXT';
                        $value = isset($fieldData['value']) ? $fieldData['value'] : '';
                        break;
                }
                //Сохраняем запрос за создание поля
                if($type != NULL) {
                    $queries[] = array('query'=>
                        'ALTER TABLE '.$tableName.' ADD '.$field.' '.$type.' '.$length.' '.$unsigned.' '.$value.' '.$is_null, 
                    );
                }
            }
        }
        //Выполняем запросы
        foreach($queries as $query) {
            echo $query['query']."\n";
            DB::Get()->Query($query['query'],isset($query['variables']) ? $query['variables'] : array());
        }
    }
    
    
    public static function Create(array $data = array()) {
        //Получаем имя текущего класса (если вызвали в Author, например)
        $className = get_called_class();
        $model = new $className();
        //Перебираем массив $data, устанавливаем свойства
        foreach($data as $key => $value) {
            $model->Properties[$key] = $value;
        }
        return $model;
    }
}

?>