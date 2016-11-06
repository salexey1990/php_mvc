<?php

//Класс конфигурации

class Config {
    public static $path, $db;
    
}
//Пути
Config::$path['www'] = __DIR__.'/../';
Config::$path['public'] = '/php2/mvc/';
Config::$path['model'] = './models/';


//Работа с БД
Config::$db['user'] = 'user1';
Config::$db['password'] = '123456';
Config::$db['host'] = 'localhost';
Config::$db['base'] = 'php2';

if(is_file(__DIR__.'/dev')) include __DIR__.'/config.dev.php';
