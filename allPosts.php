<?php
require 'postsConfig.php';

$allPosts = $controller->getAllPosts();
?>
<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?
    foreach ($allPosts as $post) {
        ?>
        <tr>
            <td><?= $post['title'] ?></td>
            <td><?= $post['description'] ?></td>
            <td><a href="htmlForms/posts/update.php?id=<?= $post['id'] ?>">Изменить</a> / <a
                        href="htmlForms/posts/delete.php?id=<?= $post['id'] ?>">Удалить</a></td>
        </tr>
        <?
    }
    ?>
</table>
<br/>
<!--<a href="">Добавить новый пост</a>-->
