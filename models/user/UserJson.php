<?php

namespace classes\UserJson;

use classes\IUser\IUser;


class UserJson implements IUser
{
    public $name;
    public $email;
    public $phone;
    public $allInfo = [];

    private function getArray(): array
    {
        $info = file_get_contents('C:\OSPanel\domains\Users\users.json');
        $users = json_decode($info, true);
        return $users;
    }

    public function getEmails(): array
    {
        $arr = $this->getArray();
        $emails = array_column($arr, 'email');
        return $emails;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function getInfo(string $email): bool
    {
        $users = $this->getArray();
        $sorting = function ($item) use ($email) {
            if ($item['email'] === $email){
                return true;
            }
        };
        $user = array_filter($users, $sorting);
        $this->name = $user[0]['name'];
        $this->phone = $user[0]['phone'];
        $this->email = $user[0]['email'];
        if (empty($this->email || $this->name || $this->phone)) {
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function getAllInfo()
    {
        $array = $this->getArray();

        $sorting = function ($item) {
            if (!empty($item['name'])){
                return true;
            }
        };
        $this->allInfo = array_filter($array, $sorting);
        if (empty($this->allInfo)) {
            return false;
        }
        return true;
    }
}

/*$user = new UserJson();
$user->getInfo('bill@yahoo.com');
echo $user->name;*/