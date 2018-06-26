<?php

/**
 * Class Users
 */
class Users
{
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
        return $info;
    }

}
/*$user=new Users();
print_r($user->getInfo("rickM@gmail.com"));*/