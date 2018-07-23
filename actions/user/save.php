<?php
require '../../config.php';
//require '../../controllers/user/WebController.php';

//$controller = new WebController($class);

$name = $controller->clearStr($_POST['name']);
$phone = $controller->clearStr($_POST['phone']);
$email = $controller->clearStr($_POST['email']);
$password = password_hash($controller->clearStr($_POST['password']), PASSWORD_BCRYPT);

if (empty($name) || empty($phone) || empty($email) || empty($password)) {
    echo "Заполните все поля формы!<br/>";
    echo "<a href='../../htmlForms/user/new.html'>Вернуться к заполнению</a><br/>";
    echo "<a href='../../index.php'>К списку</a>";
} else {
    if (!$controller->addNewUser($name, $phone, $email, $password)) {
        echo "Ошибка при добавлении пользователя<br/>";
        echo "<a href='../../index.php'>Вернуться к списку</a>";
    } else {
        echo "Пользователь успешно добавлен!<br/>";
        echo "<a href='../../index.php'>Вернуться к списку</a>";
    }
}
