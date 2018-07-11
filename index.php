<?php
require 'controllers/user/webController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <meta charset="utf-8" />
</head>
<body>
<?php
if (empty($_GET['command'])){
    $_GET['command'] = 'allinfo';
}
?>