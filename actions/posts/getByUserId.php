<?php
require '../../postsConfig.php';

$userId = $_GET['id'];

$userPosts = $controller->getUserPosts($userId);
if (empty($userPosts)) {
    echo "<h2 align='center'>У пользователя нет постов</h2>";
    ?><a href="../../htmlForms/posts/newPost.php?userId=<?= $userId ?>"> Добавить пост</a>
    <?
    exit;
}
?>
<h2 align="center"> Посты пользователя <?= $userPosts[0]['name']?></h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?
    foreach ($userPosts as $post) {
        ?>
        <tr>
            <td><?= $post['title'] ?></td>
            <td><?= $post['description'] ?></td>
            <td><a href="../../htmlForms/posts/update.php?id=<?= $post['id'] ?>">Изменить</a> / <a
                    href="../../htmlForms/posts/delete.php?id=<?= $post['id'] ?>">Удалить</a></td>
        </tr>
        <?
    }
    ?>
</table>
<br/>
<a href="../../htmlForms/posts/newPost.php?userId=<?= $userId?>"> Добавить пост</a>
<p><a href="../../index.php"> Вернуться к списку</a></p>