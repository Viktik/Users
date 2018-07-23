<?php
require '../../postsConfig.php';

$id = $_POST['id'];

$title = $controller->clearStr($_POST['title']);
$description = $controller->clearStr($_POST['description']);

if (empty($title) || empty($description)) {
    echo "Ошибка! Заполните все поля формы!<br/>";
} else {
    if (!$controller->updatePost($id, $title, $description)) {
        echo "Ошибка при редактировании поста.<br/>";
    } else {
        echo "Пост успешно отредактирован.<br/>";
    }
}
echo "<a href='../../allPosts.php'>Вернуться к списку</a>";
