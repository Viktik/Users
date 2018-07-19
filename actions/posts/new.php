<?php
require '../../postsConfig.php';

$userId = $_POST['userId'];

$title = $controller->clearStr($_POST['title']);
$description = $controller->clearStr($_POST['description']);

if (empty($title) || empty($description)) {
    echo "Ошибка! Заполните все поля формы!<br/>";
} else {
    if (!$controller->addNewPost($userId, $title, $description)) {
        echo "Ошибка при добавлении.<br/>";
    } else {
        echo "Пост успешно добавлен.<br/>";
    }
}
echo "<a href='../../allPosts.php'>Вернуться к списку</a>";
