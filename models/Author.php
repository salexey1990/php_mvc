<?php
class Author extends Model {

    protected static $Structure = array(
        'name' => array(
            'access'=>'public',
            'type' => 'string',
            'length' => 256,
            'description' => 'Имя автора',
        ),
        'article' => array(
            'access'=>'public',
            'value'=>false,
            'in_db' => false,
        )
    );


	
    public static function Get($key, $value) {
        $authors = array();
        DB::Get()->Connect('localhost', 'php2', 'root', '');
        $data = DB::Get()->Select('select * from author where id="'.$value.'"');
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['article'] = '';
            $authors[] = Author::Create($data[$i]);
        }
        return $authors; 
    } 

    //Создаёт модель автора, загружает в неё данные по идентификатору, возвращает
    public function GetArticle() {
        return Article::Get('author',$this->Properties['id']);
    }


    public static function All() {
        $authors = array();
        DB::Get()->Connect('localhost', 'php2', 'root', '');
        $data = DB::Get()->Select('select * from author');
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['article'] = '';
            $authors[] = Author::Create($data[$i]);
        }
        return $authors; 
    }
    
    // Создаём модель данных
    public static function Create(array $data = array()) {
        $model = parent::Create($data); //Вызываем родительский метод, где присваиваются базовые параметры и создаётся объект нужного класса
        return $model;
    }

    public function set_article() {
        $art = $this->GetArticle();
        $this->SetProperty('article',$art); 
    }



}
?>