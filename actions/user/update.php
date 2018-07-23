<?php
require '../../config.php';
//require '../../controllers/user/WebController.php';

//$controller = new WebController($class);

$oldEmail = $_POST['oldEmail'];
$name = $controller->clearStr($_POST['name']);
$phone = $controller->clearStr($_POST['phone']);
$email = $controller->clearStr($_POST['email']);
$password = password_hash($controller->clearStr($_POST['password']), PASSWORD_BCRYPT);

if (empty($name) || empty($phone) || empty($email) || empty($password)) {
    echo "Ошибка! Заполните все поля формы!<br/>";
    echo "<a href='../../index.php'>К списку</a>";
} else {
    if (!$result = $controller->updateUser($oldEmail, $name, $phone, $email, $password)) {
        echo "Ошибка при редактировании пользователя.<br/>";
        echo "<a href='../../index.php'>Вернуться к списку</a>";
    } else {
        echo "Пользователь успешно отредактирован.<br/>";
        echo "<a href='../../index.php'>Вернуться к списку</a>";
    }
}
