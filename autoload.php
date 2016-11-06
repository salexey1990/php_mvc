<?php

include_once 'lib/smarty/Smarty.class.php';

function autoloadClasses($class) {
    //Функция, которая будет подгружать нам классы
    $file = 'controller/'.$class.'.php';
    if(!is_file($file)) {
        $file = 'models/'.$class.'.php';
    }
    if(!is_file($file)) { 
        $file = 'lib/'.$class.'.php';
    }
    include_once($file);
}

spl_autoload_register('autoloadClasses'); //Зарегистрируем её.
?>