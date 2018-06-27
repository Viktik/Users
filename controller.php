<?php

include 'Users.php';

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

$user = new Users();

if ($command == 'user') {
    if (empty($argv[2])) {
        echo "Email was not given";
        exit;
    }
    $email = trim($argv[2]);
    $userInfo = $user->getInfo($email);
    if (empty($userInfo)){
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
