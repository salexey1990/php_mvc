<?php
//Подключаем модели для создания в БД
include 'models/Model.php';
include 'lib/config.php';
include 'lib/DB.php';

$models = array();
//Считываем файлы моделей из директории
$handle = opendir(Config::$path['model']);
while($rd = readdir($handle)) {
    if($rd != '.' && $rd != '..' && $rd != 'Model.php') {
        $models[] = Config::$path['model'].$rd;
    }
}
//Обработка
foreach($models as $model) {
    require_once($model);
	//Очень злой хак. Надо бы убрать.
    $modelName = str_replace(array('./models/','.php'),'',$model);
    $modelName::Generate($modelName);
}
?>