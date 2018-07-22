<?php
require '../../session.php';
if (isset($_GET['logout'])){
    session_destroy();
    header('Location: ../../htmlForms/user/authorization.php');
    exit;
}
$userInfo = $_GET['info'];
$info = unserialize(base64_decode($userInfo));
?>
<p><strong>Имя пользователя: </strong><?= $info['name']?></p>
<p><strong>Email: </strong><?= $info['email']?></p>
<a href="showProfile.php?logout">Выйти</a>