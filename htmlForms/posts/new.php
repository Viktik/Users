<?php
require '../../postsConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
</head>
<body>
<h1>Создание поста</h1>
<form action="../../actions/posts/new.php" method="post">
    <? if ($_GET['userId']) {
        ?>
        <input type='hidden' name='userId' value='<?= $_GET['userId']; ?>'>
    <? } else {
        $usersInf = $controller->getUsersInf();
        ?>
        <p>Выберите пользователя: <select name="userId">
                <? foreach ($usersInf as $user) { ?>
                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                <? } ?>
            </select></p>
    <? } ?>
    <p>Заголовок: <input type="text" name="title" size="50"/></p>
    <p>Содержание:</p>
    <p><textarea rows="8" cols="63" name="description"></textarea>
    <p><input type="submit" value="Создать"/>
</form>
</body>
</html>