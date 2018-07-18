<?php
require '../../postsConfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty($_GET['id'])) {
        echo "Удаление не удалось<br/>";
    } else {
        $id = $_GET['id'];
        $result = $controller->deletePost($id);
        if (!$result) {
            echo "Удаление не удалось<br/>";
        } else {
            echo "Пост удален!<br/>";
        }
    }
    ?>
    <a href="../../allPosts.php">Вернуться к списку</a>
    <?
}
