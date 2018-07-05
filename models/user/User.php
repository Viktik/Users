<?php

class Test
{
    public function connect()
    {
        $link = mysqli_connect('localhost', 'root', '', 'users');
        if (!$link) {
            echo "Connection failed";
            exit;
        }
        return $link;
    }

    public function getEmails()
    {
        $link = $this->connect();
        $sql = 'SELECT email FROM users';
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $emailsarr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $emails = array_column($emailsarr, 'email');
        return $emails;
    }

}

$user = new Test();
print_r($user->getEmails());
