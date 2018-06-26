<?php

include 'Users.php';

if (empty($argv[1])) {
    echo "Empty statement given";
    exit;
}

$command = trim(strtolower($argv[1]));

$user = new Users();

if ($command == 'user') {
    $email = trim($argv[2]);
    $userInfo = $user->getInfo($email);
    foreach ($userInfo as $key => $value) {
        echo "$key - $value\n";
    }
}

if (trim(strtolower($argv[1])) == 'emails') {
    $emails = $user->getEmails();
    foreach ($emails as $email) {
        echo "$email\n";
    }
}
