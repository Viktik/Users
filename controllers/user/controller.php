<?php
require_once "../../vendor/autoload.php";

use classes\IUser\IUser,classes\UserJson\UserJson, classes\UserSQL\UserSQL;

if (empty($argv[1])) {
    echo "Empty statement given";
    exit;
}

$command = trim(strtolower($argv[1]));
$commands = ['user', 'emails', 'emailssql', 'usersql'];

if (!in_array($command, $commands)) {
    echo "Wrong command given";
    exit;
}

//$user = new User();

if ($command == 'user') {
    if (empty($argv[2])) {
        echo "Email was not given";
        exit;
    }
    $user = new UserJson();
    $email = trim($argv[2]);
    $userInfo = $user->getInfo($email);
    if (empty($userInfo)) {
        echo "Wrong email given";
        exit;
    }
    echo " name - $user->name\n phone - $user->phone\n email - $user->email";

    /*foreach ($userInfo as $key => $value) {
        echo "$key - $value\n";
    }*/
}

if ($command == 'emails') {
    $user = new UserJson();
    $emails = $user->getEmails();
    foreach ($emails as $email) {
        echo "$email\n";
    }
}

if ($command == 'emailssql') {
    $user = new UserSQL();
    $emails = $user->getEmails();
    foreach ($emails as $email) {
        echo "$email\n";
    }
}

if ($command == 'usersql') {
    if (empty($argv[2])) {
        echo "Email was not given";
        exit;
    }
    $user = new UserSQL();
    $email = trim($argv[2]);
    $userInfo = $user->getInfo($email);
    if (empty($userInfo)) {
        echo "Wrong email given";
        exit;
    }
    echo " name - $user->name\n phone - $user->phone\n email - $user->email";

    /*foreach ($userInfo as $key => $value) {
        echo "$key - $value\n";
    }*/
}
