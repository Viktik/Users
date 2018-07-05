<?php

namespace classes\UserJson;

use classes\IUser\IUser;


class UserJson implements IUser
{
    public $name, $email, $phone;

    /**
     * @return array
     */
    private function getArray(): array
    {
        $info = file_get_contents('../users.json');
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
     * @return bool
     */
    public function getInfo(string $email): bool
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
            return false;
        }
        $this->name = $info['name'];
        $this->email = $info['email'];
        $this->phone = $info['phone'];
        return true;
    }
}

/*$user = new UserJson();
$user->getInfo('bill@yahoo.com');
echo $user->name;*/