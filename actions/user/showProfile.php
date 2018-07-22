<?php
require '../../session.php';
$userInfo = $_GET['info']
?>
<p><strong>Имя пользователя: </strong><?= $userInfo['name']?></p>
<p><strong>Email: </strong><?= $userInfo['email']?></p>
