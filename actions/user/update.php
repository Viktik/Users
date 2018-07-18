<?php
require '../../config.php';
//require '../../controllers/user/webController.php';

//$controller = new WebController($class);

$oldEmail = $_POST['oldEmail'];
$name = $controller->clearStr($_POST['name']);
$phone = $controller->clearStr($_POST['phone']);
$email = $controller->clearStr($_POST['email']);

if (empty($name) || empty($phone) || empty($email)) {
    echo "Ошибка! Заполните все поля формы!<br/>";
    echo "<a href='../../index.php'>К списку</a>";
} else {
    if (!$result = $controller->updateUser($oldEmail, $name, $phone, $email)) {
        echo "Ошибка при редактировании пользователя.<br/>";
        echo "<a href='../../index.php'>Вернуться к списку</a>";
    } else {
        echo "Пользователь успешно отредактирован.<br/>";
        echo "<a href='../../index.php'>Вернуться к списку</a>";
    }
}
