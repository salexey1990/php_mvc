<?php

//Модель данных "Пользователь"

class User extends Model {
    
    protected static $Structure = array(
        'email' => array(
            'access'=>'public',
            'type' => 'string',
            'length' => 256,
            'description' => 'Email пользователя',
        ),
        'password' => array(
            'access'=>'private',
            'type'=>'string',
            'length'=>256,
            'description'=> 'Пароль',
            'is_null' => 'NOT NULL'
        ),
        'access' => array(
            'access'=>'public',
            'type'=>'int',  
        ),
    );
    
  
    //Логинимся
    public static function Login($username, $password) {
        $password = sha1($password); //Хорошо бы на SHA-2 заменить
        $userData = DB::Get()->Select('SELECT * FROM User WHERE email=:email AND `password`=:pass',array('email'=>$username,'pass'=>$password));
        if(isset($userData[0])) {
            Session::CreateSession($userData[0]['id']);
            return User::Create($userData[0]);
        }
        return false;
    }
    
    
    //Добавляем нового пользователя
    public static function AddUser($username, $password) {
        $password = sha1($password); //Хорошо бы на SHA-2 заменить
        return DB::Get()->Query('INSERT INTO User (email,`password`) VALUES (:email,:pass)',array('email'=>$username,'pass'=>$password));
    }
}
?>