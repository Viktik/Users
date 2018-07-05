<?php

class Test
{
    private function getArray(): array
    {
        $info = file_get_contents('../../users.json');
        $users = json_decode($info, true);
        return $users;
    }

    public function getInfo(string $email)
    {
        $array = $this->getArray();

        /*foreach ($array as $user) {
            foreach ($user as $item) {
                if (in_array($email, $item)) {
                    foreach ($item as $key => $value) {
                        $info[$key] = $value;
                    }
                }
            }
        }*/
        $func = function ($var) use (&$func, $email) {
            if (is_array($var)) {
                if (!in_array($email, $var)) {
                    return $func;
                } else {
                  $inform['name'] = $var['name'];
                  $inform['phone'] = $var['phone'];
                  $inform['email'] = $var['email'];
                }
            }
            return $inform;

        };

        $inform = array_filter($array,$func);
        print_r($inform);

        /*if (empty($info)) {
            return false;
        }
        $this->name = $info['name'];
        $this->email = $info['email'];
        $this->phone = $info['phone'];
        return true;*/
    }

}

$user = new Test();
$user->getInfo('bob@gmail.com');

