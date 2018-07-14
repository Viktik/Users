<?php

namespace classes\UserJson;

use classes\IUser\IUser;


class UserJson implements IUser
{
    public $name;
    public $email;
    public $phone;
    public $allInfo = [];

    /**
     * @return array
     */
    private function getArray(): array
    {
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

        $sorting = function ($item) use (&$sorting) {
            if (empty($item['name'])) {
                return array_map($sorting, $item);
            } else {
                $this->allInfo[] = $item;
            }

            return true;
        };
        array_map($sorting, $array);
        if (empty($this->allInfo)) {
            return false;
        }
        return true;
    }
}

/*$user = new UserJson();
$user->getInfo('bill@yahoo.com');
echo $user->name;*/