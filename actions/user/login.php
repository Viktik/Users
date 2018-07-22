<?php
require '../../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $controller->clearStr($_POST["email"]);
    $password = $controller->clearStr($_POST["password"]);

    if ($email && $password) {
        if ($userInfo = $controller->getInfo($email)) {
            if (password_verify($password, $userInfo['password'])) {
                $_SESSION['user'] = true;
                header("Location: showProfile.php?info=".$userInfo);
                exit;
            } else {
                echo 'Неправильное имя пользователяили пароль!';
            }
        } else {
            echo 'Неправильное имя пользователяили пароль!';
        }
    } else {
        echo 'Заполните все поля формы!';
    }
}