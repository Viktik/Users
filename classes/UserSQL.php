<?php

namespace classes\UserSQL;

use classes\IUser\IUser;


class UserSQL implements IUser
{
    public $name, $email, $phone;

    /**
     * @return \mysqli
     */
    public function connect()
    {
        $link = mysqli_connect('localhost', 'root', '', 'users');
        if (!$link) {
            echo "Connection failed";
            exit;
        }
        return $link;
    }

    /**
     * @return array|bool
     */
    public function getEmails()
    {
        $link = $this->connect();
        $sql = 'SELECT email FROM users';
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $emailsarr = mysqli_fetch_all($result, MYSQLI_NUM);
        foreach ($emailsarr as $user) {
            foreach ($user as $email) {
                $emails[] = $email;
            }
        }
        return $emails;
    }

    /**
     * @param $email
     * @return bool
     *
     */
    public function getInfo(string $email): bool
    {
        $link = $this->connect();
        $email = mysqli_real_escape_string($link, $email);
        $sql = "SELECT name, phone, email
                FROM users
                WHERE email = '$email'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $info = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($info as $item) {
            foreach ($item as $key => $value) {
                $userInfo[$key] = $value;
            }
        }
        $this->name = $userInfo['name'];
        $this->email = $userInfo['email'];
        $this->phone = $userInfo['phone'];
        return true;
    }
}

/*$user = new UserSQL();
$user->getInfo('bob@gmail.com');
echo "$user->name $user->email $user->phone";*/