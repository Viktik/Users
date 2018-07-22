<!DOCTYPE HTML>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Авторизация</h1>
<form action="../../actions/user/login.php" method="post">
    <div>
        <label>Email</label>
        <input type="text" name="email"/>
    </div>
    <div>
        <label>Пароль</label>
        <input type="password" name="password" />
    </div>
    <div>
        <button type="submit">Войти</button>
    </div>
</form>
</body>
</html>