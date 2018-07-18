<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Check Delete User</title>
</head>
<body>
<h2>Вы уверены, что хотите удалить этот пост?</h2>
<a href="../../actions/posts/delete.php?id=<?= $_GET['id']; ?>">Да</a>
<a href="../../allPosts.php">Нет</a>
</body>
</html>
