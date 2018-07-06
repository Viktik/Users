<?php

class Test
{
    public $name;
    public $email;
    public $phone;

    private function getArray(): array
    {
        $info = file_get_contents('../../users.json');
        $users = json_decode($info, true);
        return $users;
    }


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
                    return true;
                }
            }
        };
        array_filter($array, $sorting);
        /* $sorting = function ($item, $key) use ($email) {
             if ($item[$key] == 'email') {
                 return true;
             }
             return false;
         };*/
        /*foreach ($array as $user) {
            foreach ($user as $item) {
                if (in_array($email, $item)) {
                    foreach ($item as $key => $value) {
                        $info[$key] = $value;
                    }
                }
            }
        }*/
        /*$func = function ($var) use (&$func, $email) {
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
        print_r($inform);*/

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
$user->getInfo('rickM@gmail.com');
echo "$user->phone $user->name $user->email";

