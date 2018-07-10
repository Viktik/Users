<?php

namespace classes\UserJson;

use classes\IUser\IUser;


class UserJson implements IUser
{
    public $name;
    public $email;
    public $phone;

    /**
     * @return array
     */
    private function getArray(): array
    {
        //$info = file_get_contents('../../users.json');
        $info = file_get_contents('C:\OSPanel\domains\Users\users.json');
        $users = json_decode($info, true);
        return $users;
    }

    /**
     * @return array
     */
    public function getEmails(): array
    {
        $arr = $this->getArray();
        foreach ($arr as $user) {
            $emails = array_column($user, 'email');
        }
        return $emails;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function getInfo(string $email)
    {
        /*$array = $this->getArray();

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
            return false;
        }
        $this->name = $info['name'];
        $this->email = $info['email'];
        $this->phone = $info['phone'];
        return true;*/
        $array = $this->getArray();
        $sorting = function ($item) use (&$sorting, $email) {
            if (is_array($item)) {
                if ($item['email'] !== $email) {
                    return array_filter($item, $sorting);
                } else {
                    $this->email = $item['email'];
                    $this->name = $item['name'];
                    $this->phone = $item['phone'];
                }
            }
            return true;
        };
        array_filter($array, $sorting);
        if (empty($this->email||$this->name||$this->phone)){
            return false;
        }
        return true;
    }
}

/*$user = new UserJson();
$user->getInfo('bill@yahoo.com');
echo $user->name;*/