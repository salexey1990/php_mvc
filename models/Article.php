<?php

//Модель данных "Статья"

class Article extends Model {


    protected static $Structure = array(
        'title' => array(
            'access'=>'public',
            'type' => 'string',
            'length' => 256,
            'description' => 'Заголовок статьи',
        ),
        'text' => array(
            'access'=>'public',
            'type'=>'text',
            'description'=>'Текст статьи',
        ),
        'author' => array(
            'access'=>'public',
            'type'=>'int',
            'length'=>10,
            'description'=> 'Идентификатор автора',
            'is_null' => 'NULL'
        ),
        'views' => array(
            'access'=>'public',
            'type'=>'int',
            'length'=>10,
            'description'=> 'Количество промотров статьи',
            'is_null' => 'NULL'
        )
    );


    //Создаёт модель автора, загружает в неё данные по идентификатору, возвращает
    public function GetAuthor() {
        return Author::Get('id',$this->Properties['author']);
    }
    
    public static function Get($key,$value) {
        $articles = array();
        DB::Get()->Connect('localhost', 'php2', 'root', '');
        DB::Get()->Query('update article set views=views+1 where '.$key.'="'.$value.'"');
        $data = DB::Get()->Select('select * from article where '.$key.'="'.$value.'"');
        for ($i=0; $i < count($data); $i++) { 
            $articles[] = Article::Create($data[$i]);
        }
        return $articles; 
    }


        
    public static function All() {
        $articles = array();
        DB::Get()->Connect('localhost', 'php2', 'root', '');
        $data = DB::Get()->Select('select * from article');
        for ($i=0; $i < count($data); $i++) { 
            $articles[] = Article::Create($data[$i]);
        }
        return $articles; 
    }
    
    // Создаём модель данных
    public static function Create(array $data = array()) {
        $model = parent::Create($data); //Вызываем родительский метод, где присваиваются базовые параметры и создаётся объект нужного класса
       return $model; 
    }

    public function set_authors() {
        $auth = $this->GetAuthor();
        $this->SetProperty('author',$auth); 
    }


 

}
?>