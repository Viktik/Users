<?php
require_once "vendor/autoload.php";
require 'config.php';
require 'controllers/user/webController.php';
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Users</title>
        <meta charset="utf-8"/>
    </head>
<body>
<?php
$controller = new WebController($class);

if (empty($_GET['command'])) {
    $_GET['command'] = 'allinfo';
}

if ($_GET['command'] == 'allinfo') {
    $allInfo = $controller->getAllInfo();
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
<?
    foreach ($allInfo as $user) {
        ?>
        <tr>
            <td><?= $user['name']?></td>
            <td><?= $user['phone']?></td>
            <td><?= $user['email']?></td>
        </tr>
        <?
    }
}
?>