<?php
//require_once "../../vendor/autoload.php";
//require "../../config.php";

use classes\UserJson\UserJson;
use classes\UserSQL\UserSQL;

switch ($base) {
    case 'json':
        $class = new UserJson();
        break;
    case 'sql':
        $class = new UserSql();
        break;
}

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

    /*function getEmails(){
        return $this->base->getEmails();
    }*/

    /**
     * @param $email
     * @return array
     */
    public function getInfo($email)
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

    /**
     * @param $string
     * @return string
     */
    public function clearStr($string)
    {
        return $str = trim(strip_tags($string));;
    }

    /**
     * @param $name
     * @param $phone
     * @param $email
     * @return bool
     */
    public function addNewUser($name, $phone, $email): bool
    {
        return $this->base->addNewUser($name, $phone, $email);
    }

    /**
     * @param $email
     * @return bool
     */
    public function deleteUser($email)
    {
        return $this->base->deleteUser($email);
    }

    /**
     * @param $oldEmail
     * @param $name
     * @param $phone
     * @param $email
     * @return bool
     */
    public function updateUser($oldEmail, $name, $phone, $email)
    {
        return $this->base->updateUser($oldEmail, $name, $phone, $email);
    }
}

/*$controller = new WebController($class);
var_dump($controller->getAllInfo());*/

