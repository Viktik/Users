<?php

namespace classes\UserSQL;

use classes\IUser\IUser;


class UserSQL implements IUser
{
    public $name;
    public $email;
    public $phone;
    public $allInfo = [];

    /**
     * @return \mysqli
     */
    private function connect()
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
        $emailsarr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $emails = array_column($emailsarr, 'email');
        return $emails;
    }


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
        if (empty($info)) {
            return false;
        }
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

    /**
     * @return bool
     */
    public function getAllInfo()
    {
        $link = $this->connect();
        $sql = "SELECT name, phone, email
                FROM users";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $allInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (empty($allInfo)) {
            return false;
        }
        $this->allInfo = $allInfo;
        return true;
    }

    public function addNewUser(string $name, string $phone, string $email): bool
    {
        $link = $this->connect();
        $sql = 'INSERT INTO users( name, phone, email)
                VALUES (?, ?, ?)';
        $stmt = mysqli_prepare($link, $sql);
        if ($stmt == false) {
            return false;
        }
        mysqli_stmt_bind_param($stmt, "sss", $name, $phone, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }

    public function deleteUser(string $email): bool
    {
        $link = $this->connect();
        $sql = "DELETE FROM users
                WHERE email = '$email'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }

    public function updateUser(string $oldEmail, string $name, string $phone, string $email): bool
    {
        $link = $this->connect();
        $sql = "UPDATE users
                SET name = '$name', phone = '$phone', email = '$email'
                WHERE email = '$oldEmail'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }
}

/*$user = new UserSQL();
$user->getInfo('bob@gmail.com');
echo "$user->name $user->email $user->phone";*/