<?php
require '../../postsConfig.php';

$id = $_GET['id'];
$postInfo = $controller->getPostByID($id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Post</title>
</head>
<body>
<h1>Редактирование поста</h1>
<form action="../../actions/posts/update.php" method="post">
    <input type='hidden' name='id' value='<?= $_GET['id']; ?>'>
    <p>Заголовок: <input type="text" name="title" size="50" value="<?= $postInfo['title'] ?>"/></p>
    <p>Содержание:</p>
    <p><textarea rows="8" cols="63" name="description"><?= $postInfo['description'] ?></textarea>
    <p><input type="submit" value="Отредактировать"/>
</form>
</body>
</html>