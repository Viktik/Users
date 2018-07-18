<?php

namespace controllers\user\WebController;

class WebController
{
    public $allInfo = [];
    public $userInfo = [];

    /**
     * WebController constructor.
     * @param $class
     */
    public function __construct($class)
    {
        $this->base = $class;
    }

    public function getInfo(string $email): array
    {
        $this->base->getInfo($email);
        $this->userInfo['name'] = $this->base->name;
        $this->userInfo['phone'] = $this->base->phone;
        $this->userInfo['email'] = $this->base->email;
        return $this->userInfo;
    }

    /**
     * @return mixed
     */
    public function getAllInfo()
    {
        $this->base->getAllInfo();
        return $this->allInfo = $this->base->allInfo;
    }

    public function clearStr(string $string): string
    {
        return $str = trim(strip_tags($string));
    }

    public function addNewUser(string $name, string $phone, string $email): bool
    {
        return $this->base->addNewUser($name, $phone, $email);
    }

    public function deleteUser(string $email): bool
    {
        return $this->base->deleteUser($email);
    }

    public function updateUser(string $oldEmail, string $name, string $phone, string $email): bool
    {
        return $this->base->updateUser($oldEmail, $name, $phone, $email);
    }
}

/*$controller = new WebController($class);
var_dump($controller->getAllInfo());*/

