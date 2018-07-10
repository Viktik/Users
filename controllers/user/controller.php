<?php
require_once "../../vendor/autoload.php";
require "../../config.php";

use classes\IUser\IUser, classes\UserJson\UserJson, classes\UserSQL\UserSQL;

switch ($base) {
    case 'json':
        $user = new UserJson();
        break;
    case 'sql':
        $user = new UserSQL();
        break;
}

if (empty($argv[1])) {
    echo "Empty statement given";
    exit;
}

$command = trim(strtolower($argv[1]));
$commands = ['user', 'emails'];

if (!in_array($command, $commands)) {
    echo "Wrong command given";
    exit;
}

if ($command == 'emails') {
    $emails = $user->getEmails();
    foreach ($emails as $email) {
        echo "$email\n";
    }
}

if ($command == 'user') {
    if (empty($argv[2])) {
        echo "Email was not given";
        exit;
    }
    $email = trim($argv[2]);
    $userInfo = $user->getInfo($email);
    if (empty($userInfo)) {
        echo "Wrong email given";
        exit;
    }
    echo " name - $user->name\n phone - $user->phone\n email - $user->email";
}

