<?php
require_once "vendor/autoload.php";
require 'config.php';
require 'controllers/user/webController.php';

$controller = new WebController($class);

$name = $controller->clearStr($_POST['name']);
$phone = $controller->clearStr($_POST['phone']);
$email = $controller->clearStr($_POST['email']);

if (empty($name) || empty($phone) || empty($email)) {
    echo "Заполните все поля формы!<br/>";
    echo "<a href=\"newUserForm.html\">Вернуться к заполнению</a><br/>";
    echo "<a href=\"index.php\">К списку</a>";
}else{
    if (!$controller->addNewUser($name,$phone,$email)){
        echo "Ошибка при добавлении пользователя";
    }else{
        echo "Пользователь успешно добавлен!<br/>";
        echo "<a href=\"index.php\">Вернуться к списку</a>";
    }
}
?>