<?php
require "../../config.php";

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
    $emails = $class->getEmails();
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
    $userInfo = $class->getInfo($email);
    if (empty($userInfo)) {
        echo "Wrong email given";
        exit;
    }
    echo " name - $class->name\n phone - $class->phone\n email - $class->email";
}

