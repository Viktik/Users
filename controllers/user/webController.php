<?php

namespace controllers\user\WebController;

class WebController
{
    public $model;
    public $allInfo = [];
    public $userInfo = [];

    /**
     * WebController constructor.
     * @param $class
     */
    public function __construct($class)
    {
        $this->model = $class;
    }

    public function getInfo(string $email): array
    {
        $this->model->getInfo($email);
        $this->userInfo['name'] = $this->model->name;
        $this->userInfo['phone'] = $this->model->phone;
        $this->userInfo['email'] = $this->model->email;
        return $this->userInfo;
    }

    /**
     * @return mixed
     */
    public function getAllInfo()
    {
        $this->model->getAllInfo();
        return $this->allInfo = $this->model->allInfo;
    }

    public function clearStr(string $string): string
    {
        return trim(strip_tags($string));
    }

    public function addNewUser(string $name, string $phone, string $email, string $password): bool
    {
        return $this->model->addNewUser($name, $phone, $email, $password);
    }

    public function deleteUser(string $email): bool
    {
        return $this->model->deleteUser($email);
    }

    public function updateUser(string $oldEmail, string $name, string $phone, string $email): bool
    {
        return $this->model->updateUser($oldEmail, $name, $phone, $email);
    }
}

/*$controller = new WebController($class);
var_dump($controller->getAllInfo());*/
