<?php
require 'config.php';
//require 'controllers/user/WebController.php';
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Users</title>
        <meta charset="utf-8"/>
        <style>
            .leftstr, .rightstr {
                float: left;
                width: 50%;
            }
            .rightstr {
                text-align: right;
            }
        </style>
    </head>
    <body>
<?php
//$controller = new WebController($class);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim(strip_tags($_POST['email']));
    $_GET['command'] = 'search';
    $userInfo = $controller->getInfo($email);

    if (!empty($email) && !empty($userInfo['name'])) {
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
    }
    if (empty($email)) {
        echo "Укажите email!";
        unset($_GET['command']);
    }
    if (!empty($email) && empty($userInfo['name'])) {
        echo "Неверно указан email!";
        unset($_GET['command']);
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
        <th>Posts</th>
        <th>Action</th>
    </tr>
<?
    foreach ($allInfo as $user) {

        ?>
        <tr>
            <td><?= $user['name']?></td>
            <td><?= $user['phone']?></td>
            <td><?= $user['email']?></td>
            <td><a href="actions/posts/getByUserId.php?id=<?= $user['id']?>"><?= $user['count']?></a></td>
            <td><a href="htmlForms/user/update.php?email=<?=$user['email']?>">Изменить</a> / <a href="htmlForms/user/delete.php?email=<?=$user['email']?>">Удалить</a> </td>
        </tr>
        <?
    }
    ?>
</table>
    <br/>
    <p class="leftstr"><a href="htmlForms/user/new.html">Создать нового пользователя</a></p>
    <p class="rightstr"><a href="allPosts.php">Список постов</a></p>
    <?
}
?>

    <h3>Поиск по email</h3>
    <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        Email: <br/><input type="text" name="email"/><br/>
        <br/>
        <input type="submit" value="Искать"/>
        <p></p>

