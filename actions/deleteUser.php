<?php
require_once "../vendor/autoload.php";
require '../config.php';
require '../controllers/user/webController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['agree'] == 'no') {
        header("Location: ../index.php");
    } elseif ($_POST['agree'] == 'yes') {
        $email = $_POST['email'];
        $controller = new WebController($class);
        $result = $controller->deleteUser($email);
        if (!$result){
            echo "Удаление не удалось";
        }else{
            echo "Пользователь удален!<br/>";
        }
        ?>
        <a href="../index.php">Вернуться к списку</a>
        <?
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Check Delete User</title>
</head>
<body>
<h2>Вы уверены, что хотите удалить пользователя?</h2>
<form action="deleteUser.php" method="post">
    <input type='hidden' name='email' value='<?=$_GET['email'];?>'>
    <input type="radio" name="agree" value="no" checked> Нет
    <input type="radio" name="agree" value="yes"> Да
    <p><input type="submit" value="Выполнить"/>
</form>
</body>
</html>