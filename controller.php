<?php

include 'User.php';

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

$user = new User();

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
    foreach ($userInfo as $key => $value) {
        echo "$key - $value\n";
    }
}

if ($command == 'emails') {
    $emails = $user->getEmails();
    foreach ($emails as $email) {
        echo "$email\n";
    }
}

if ($command == 'emailssql') {
    $emails = $user->getEmailsSQL();
    foreach ($emails as $user) {
        foreach ($user as $email) {
            echo "$email\n";
        }
    }
}

if ($command == 'usersql') {
    if (empty($argv[2])) {
        echo "Email was not given";
        exit;
    }
    $email = trim($argv[2]);
    $userInfo = $user->getInfoSQL($email);
    if (empty($userInfo)) {
        echo "Wrong email given";
        exit;
    }
    foreach ($userInfo as $item) {
        foreach ($item as $key => $value) {
            echo "$key - $value\n";
        }
    }
}
