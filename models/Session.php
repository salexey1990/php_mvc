<?php

//Модель сессий

class Session extends Model {
    protected static $Structure = array(
        'session_id' => array(
            'access'=>'public',
            'type' => 'string',
            'length' => 256,
            'description' => 'ID сессии',
        ),
        'last_active' => array(
            'access'=>'public',
            'type'=>'int',
            'length'=>11,
            'description'=> 'Timestamp',
            'is_null' => 'NOT NULL'
        ),
        'user_id' => array(
            'access'=>'public',
            'type'=>'int',
            'description' => 'Идентификатор пользователя'
        ),
    );
    
    //Получение текущей сессии
    public static function GetSession($user_id, $user_session) {
        $timeout = time() - 86400 * 7; //надо бы вынести время таймаута в конфиг
        $result = DB::Get()->Select('SELECT * FROM Session WHERE user_id=:user_id AND session_id=:user_session AND last_active > :timeout',array('user_id'=>$user_id,'user_session'=>$user_session,'timeout'=>$timeout));
        if(isset($result[0])) {
            //Если сессия в базе есть, то устанавливаем куки
            $expire = time() + 7 * 86400;
            setcookie('user_id', $user_id, $expire);
            setcookie('user_session',$user_session,$expire);
            
            //Обновляем время последней активности
            DB::Get()->Query('UPDATE Session SET last_active=:last_active WHERE session_id=:user_session',
            array('user_session'=>$user_session,'last_active'=>time()));
            return true;
        } else {
            //На всякий случай, убиваем куки
            setcookie('user_id', NULL, -1);
            setcookie('user_session',NULL,-1);
        }
        return false;
    }
    
    
    //Создание сессии
    public function CreateSession($user_id) {
        //Генерируем случайный хеш
        $session_id = md5(rand(0,999)*rand(0,99999999)+time());
        DB::Get()->Query('INSERT INTO Session (session_id, last_active, user_id)
        VALUES (:session_id,:last_active,:user_id)', array(
            'session_id'=>$session_id,
            'last_active'=>time(),
            'user_id'=>$user_id
        ));
        //Устанавливаем куки
        $expire = time() + 7 * 86400; //надо бы вынести время таймаута в конфиг
        setcookie('user_id', $user_id, $expire);
        setcookie('user_session',$session_id,$expire);
        return true;
    }
    
}
?>