<?php

/**
 * Class User
 */
class User
{
    /**
     * @return mysqli
     */
    public function connect()
    {
        $link = mysqli_connect('localhost', 'root', '', 'users') or die(mysqli_connect_error());
        return $link;
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        $info = file_get_contents('./users.json');
        $users = json_decode($info, true);
        return $users;
    }

    /**
     * @return array
     */
    public function getEmails(): array
    {
        $array = $this->getArray();

        foreach ($array as $user) {
            foreach ($user as $item) {
                foreach ($item as $key => $value) {
                    if ($key == "email") {
                        $emails[] = $value;
                    }
                }
            }
        }
        return $emails;
    }

    /**
     * @param string $email
     * @return array
     */
    public function getInfo(string $email): array
    {
        $array = $this->getArray();

        foreach ($array as $user) {
            foreach ($user as $item) {
                if (in_array($email, $item)) {
                    foreach ($item as $key => $value) {
                        $info[$key] = $value;
                    }
                }
            }
        }
        if (empty($info)) {
            $info = [];
        }
        return $info;
    }

    /**
     * @return array|bool
     */
    public function getEmailsSQL()
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
     * @return array|bool
     *
     */
    public function getInfoSQL($email)
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
        return $userInfo;
    }

}

/*$user = new User();
print_r($user->getInfoSQL('bill@yahoo.com'));*/

/*$user = new User();
print_r($user->getEmailsSQL());*/