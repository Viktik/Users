<?php
require '../../config.php';
//require '../../controllers/user/webController.php';

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['agree'] == 'no') {
        header("Location: ../../index.php");
    } elseif ($_POST['agree'] == 'yes') {
        $email = $_POST['email'];
        $controller = new WebController($class);
        $result = $controller->deleteUser($email);
        if (!$result) {
            echo "Удаление не удалось";
        } else {
            echo "Пользователь удален!<br/>";
        }
        */ ?><!--
        <a href="../../index.php">Вернуться к списку</a>
        --><? /*
        exit;
    }
}
*/

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty($_GET['email'])) {
        echo "Удаление не удалось<br/>";
    } else {
        $email = $_GET['email'];
        //$controller = new WebController($class);
        $result = $controller->deleteUser($email);
        if (!$result) {
            echo "Удаление не удалось<br/>";
        } else {
            echo "Пользователь удален!<br/>";
        }
    }
    ?>
    <a href="../../index.php">Вернуться к списку</a>
    <?
}