<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Check Delete User</title>
</head>
<body>
<h2>Вы уверены, что хотите удалить пользователя?</h2>
<!--<form action="../actions/user/delete.php" method="post">
    <input type='hidden' name='email' value='<?/*= $_GET['email']; */?>'>
    <input type="radio" name="agree" value="no" checked> Нет
    <input type="radio" name="agree" value="yes"> Да
    <p><input type="submit" value="Выполнить"/>
</form>-->

<a href="../../actions/user/delete.php?email=<?= $_GET['email'];?>">Да</a>
<a href="../../index.php">Нет</a>
</body>
</html>