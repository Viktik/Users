<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
</head>
<body>
<h1>Редактирование пользователя</h1>
<form action="../../actions/user/update.php" method="post">
    <input type='hidden' name='oldEmail' value='<?= $_GET['email']; ?>'>
    <p>Новое Имя: <input type="text" name="name" size="50"/>
    <p>Новый Телефон: <input type="text" name="phone"
                             size="50"/>
    <p>Новый Email: <input type="text" name="email"
                           size="50"/>
    <p>Новый Пароль: <input type="text" maxlength="25" name="password" size="50"/></p>
    <p><input type="submit" value="Отредактировать"/>
</form>
</body>
</html>