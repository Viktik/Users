<?php
require_once "vendor/autoload.php";
require 'config.php';
require 'controllers/user/webController.php';
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Users</title>
        <meta charset="utf-8"/>
    </head>
    <body>
<?php
$controller = new WebController($class);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim(strip_tags($_POST['email']));
    $_GET['command'] = 'search';

    if (empty($email)) {
        echo "Укажите email!";
        unset($_GET['command']);
    } else {
        $userInfo = $controller->getInfo($email);
        if (empty($userInfo['name'])) {
            echo "Неверно указан email!<br/>";
            unset($_GET['command']);
        } else {
            ?>
            <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?= $userInfo['name'] ?></td>
                <td><?= $userInfo['phone'] ?></td>
                <td><?= $userInfo['email'] ?></td>
            </tr>
            </table>
            <a href="index.php">Назад</a>
            <?
            //exit;
        }
    }

}

if (empty($_GET['command'])) {
    $_GET['command'] = 'allinfo';
}

if ($_GET['command'] == 'allinfo') {
    $allInfo = $controller->getAllInfo();
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
<?
    foreach ($allInfo as $user) {
        ?>
        <tr>
            <td><?= $user['name']?></td>
            <td><?= $user['phone']?></td>
            <td><?= $user['email']?></td>
        </tr>
        <?
    }
    ?>
</table>
    <?
}
?>

    <h3>Поиск по email</h3>
    <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        Email: <br/><input type="text" name="email"/><br/>
        <br/>
        <input type="submit" value="Искать"/>
        <p></p>

<?
